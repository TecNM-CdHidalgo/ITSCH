<?php

namespace App\Http\Controllers\Utilities;

use Illuminate\Http\Request;
use InvalidArgumentException;

class DataTableColumn {

    private $data; // Contiene el nombre dado a la columna
    private $name;
    private $searchable;
    private $searchValue;
    private $searchRegex;
    private $orderable;

    public function __construct($column) {
        $this->data = $column['data'];
        $this->name = $column['name'];
        $this->searchable = $column['searchable'];
        $this->searchValue = strval($column['search']['value']);
        $this->searchRegex = $column['search']['regex'];
    }

    public function getData() {
        return $this->data;
    }

    public function getFieldName() {
        return $this->data;
    }

    public function getName() {
        return $this->name;
    }

    public function isSearchable() {
        return $this->searchable == 'true';
    }

    public function getSearchValue() {
        return $this->searchValue;
    }

    public function getSearchRegex() {
        return $this->searchRegex == 'true';
    }

    public function isOrderable() {
        return $this->orderable;
    }
}

class DataTableAttr {

    private $draw;
    private $columns = Array();
    private $orderColumn; // Indice de la columna a ordenar
    private $dir; // Direccion para ordenar (ASC/DESC)
    private $start; // Indice donde inicia la paginacion
    private $length; // Numero de filas que la tabla puede mostrar
    private $searchValue;
    private $searchRegex;
    private $selectColumns;

    public function __construct(Request $request, array $selectColumns) {
        $this->draw = (int)$request->draw;
        $this->initColumns($request->columns);
        $this->start = (int)$request->start;
        $this->length = (int)$request->length;
        $this->orderColumn = (int)$request->order[0]['column'];
        $this->dir = $request->order[0]['dir'];
        $this->searchValue = strval($request->search['value']);
        $this->searchRegex = (bool)$request->search['regex'];
        $this->selectColumns = $selectColumns;
    }

    private function initColumns($columns) {
        if (!isset($columns)) {
            throw new InvalidArgumentException('No columns where received from Client.');
        }

        foreach ($columns as $item) {
            $dtColumn = new DataTableColumn($item);
            array_push($this->columns, $dtColumn);
        }
    }

    public function getDraw() : int {
        return (int)$this->draw;
    }

    public function getPageNumber() : int {
        return ($this->start / $this->length) + 1;
    }

    public function getColumns() {
        return $this->columns;
    }

    public function getStart() {
        return $this->start;
    }

    public function getLength() {
        return $this->length;
    }

    public function getPaginate() {
        return $this->length;
    }

    public function getOrderColumnIndex() {
        return $this->orderColumn;
    }

    public function getOrderColumnName() {
        return $this->columns[$this->getOrderColumnIndex()]->getData();
    }

    public function getDir() {
        return $this->dir;
    }

    public function getSearchValue() {
        return $this->searchValue;
    }

    public function getSearchRegex() {
        return $this->searchRegex;
    }

    public function getSelectColumns() {
        return $this->selectColumns;
    }

    public function getAllResults() : bool {
        return $this->length == -1;
    }
}
