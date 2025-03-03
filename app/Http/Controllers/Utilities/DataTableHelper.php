<?php

namespace App\Http\Controllers\Utilities;

use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use InvalidArgumentException;

class DataTableHelper {

    const WHERE = 'whereLike';
    const ORDER_BY = 'sortBy';
    const PAGINATE = 'paginate';
    const PAGINATOR = 'paginatorResponse';

    static function applyAllExcept(Builder &$query, DataTableAttr &$dtAttr, array $except = []) {
        if (!(in_array(self::WHERE, $except)))
            self::whereLike($query, $dtAttr);

        if (!(in_array(self::ORDER_BY, $except)))
            self::sortBy($query, $dtAttr);

        if (!(in_array(self::PAGINATE, $except)))
            self::paginate($query, $dtAttr);

        if (!(in_array(self::PAGINATOR, $except)))
            return self::paginatorResponse($query, $dtAttr);
    }

    static function applyOnly(Builder &$query, DataTableAttr &$dtAttr, array $only) {
        if (in_array(self::WHERE, $only))
            self::whereLike($query, $dtAttr);

        if (in_array(self::ORDER_BY, $only))
            self::sortBy($query, $dtAttr);

        if (in_array(self::PAGINATE, $only))
            self::paginate($query, $dtAttr);

        if (in_array(self::PAGINATOR, $only))
            return self::paginatorResponse($query, $dtAttr);
    }

    static function applyAllSqlFilters(Builder &$query, DataTableAttr &$dtAttr) {
        self::whereLike($query, $dtAttr);
        self::sortBy($query, $dtAttr);
        self::paginate($query, $dtAttr);
    }

    static function sortBy(Builder &$query, DataTableAttr &$dtAttr) {
        $query->orderBy($dtAttr->getOrderColumnName(), $dtAttr->getDir());
    }

    static function paginate(Builder &$query, DataTableAttr &$dtAttr) {
        if ($dtAttr->getAllResults()) {
            $query = $query->get();
        } else {
            $query = $query->paginate($dtAttr->getLength(), ['*'], 'page', $dtAttr->getPageNumber());
        }
    }

    static function whereLike(Builder &$query, DataTableAttr &$dtAttr) {
        if (!$dtAttr->getSearchRegex() || $dtAttr->getSearchValue() == '')
            return;

        $whereLikeClausesList = [];
        $searchValue = $dtAttr->getSearchValue();
        foreach ($dtAttr->getColumns() as $column) {
            if ($column->isSearchable()) {
                $canonicalFieldName = self::getCanonicalColumn($dtAttr->getSelectColumns(), $column->getFieldName());
                if (!is_null($canonicalFieldName)) {
                    array_push($whereLikeClausesList, [$canonicalFieldName, 'LIKE', "%$searchValue%"]);
                }
            }
        }

        if (!empty($whereLikeClausesList)) {
            $query->where(function($query) use ($whereLikeClausesList) {
                $sql = [];
                $params = [];
                foreach ($whereLikeClausesList as $whereLikeClause) {
                    $sql[] = "{$whereLikeClause[0]} LIKE ?";
                    $params[] = $whereLikeClause[2];
                }
                $query->whereRaw(implode(' OR ', $sql), $params);
            });
        }

    }

    static function paginatorResponse(&$queryResults, DataTableAttr &$dtAttr) {
        if ($queryResults instanceof LengthAwarePaginator) {
            $paginatorDecode = json_decode(json_encode($queryResults));
            return [
                'draw' => $dtAttr->getDraw(),
                'data' => $paginatorDecode->data,
                'recordsTotal' => $paginatorDecode->total,
                'recordsFiltered' => $paginatorDecode->total
            ];
        } else {
            return [
                'draw' => $dtAttr->getDraw(),
                'data' => $queryResults,
                'recordsTotal' => $queryResults->count(),
                'recordsFiltered' => $queryResults->count()
            ];
        }
    }

    static private function getCanonicalColumn($selectColumns, $alias) {
        foreach ($selectColumns as $selCol) {
            if ($selCol instanceof \Illuminate\Database\Query\Expression) {
                $selCol = self::DBRaw2String($selCol);
            }
            $pos = strpos($selCol, $alias);
            if ($pos !== false) {
                // Caso 1: la columna tiene prefijo
                preg_match('/[a-zA-Z_]+\.[a-zA-Z_]+/', $selCol, $matches);
                if (!empty($matches)) {
                    return $matches[0];
                }

                // Caso 2: si a columna seleccionada no tiene alias, entonces esta es la que estamos buscando
                $alias_keywork_pos = strpos($selCol, ' as ');
                if ($alias_keywork_pos === false) {
                    return $selCol;
                }

                // Caso 3: si tiene alias 'as' returnamos la columna que se encuentra antes del alias
                if ($alias_keywork_pos < $pos)
                    return trim(substr($selCol, 0, $alias_keywork_pos));
            }
        }
        return null;
    }

    static private function DBRaw2String($rawStmt) : string {
        $reflection = new \ReflectionClass($rawStmt);
        $property = $reflection->getProperty('value');
        $property->setAccessible(true);
        return strval($property->getValue($rawStmt));
    }
}
