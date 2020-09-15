<?php
require('pdf/fpdf.php');
class PDF extends FPDF
{
	function Header()
    {
$this->SetFont('Arial','B',9);
$this->Cell(30,25,'',0,0,'C',$this->Image('../img/itsch.jpg',10,10, 19));
$this->Cell(30,25,'',0,0,'C',$this->Image('../img/2.jpg',30,10, 19));
$this->Cell(30,25,'',0,0,'C',$this->Image('../img/3.jpg',120,10, 19));
$this->Ln(25);

//*******************++copia
/*
$this->Cell(30,25,'',0,0,'C',$this->Image('../img/itsch.jpg',10,155, 19));
$this->Cell(30,25,'',0,0,'C',$this->Image('../img/2.jpg',30,155, 19));
$this->Cell(30,25,'',0,0,'C',$this->Image('../img/3.jpg',120,155, 19));
$this->Ln(25);
*/
    }
//******************************************++GOBIERNO DEL DESTADO DE MICHOACAN
function cabecerarecibo($cabecera1){
        $this->SetXY(43, 8); //Seleccionamos posición
		//$this->SetFillColor(2,157,116);
        $this->SetFont('Arial','',9); //Fuente, Negrita, tamaño
		$this->SetFillColor(250, 270, 250);
        foreach($cabecera1 as $columna)
        {
			$this->SetFillColor(2,157,116);
            //Parámetro con valor 2, cabecera vertical
            $this->Cell(73,10, utf8_decode($columna),0,0 ,0);
        }
    }
	//*********************************COPIA DE LA FICHA
	function cabecerarecibo6($cabecera2)
    {
        $this->SetXY(43, 153); //Seleccionamos posición
		//$this->SetFillColor(2,157,116);
        $this->SetFont('Arial','',9); //Fuente, Negrita, tamaño
		$this->SetFillColor(250, 270, 250);
        foreach($cabecera2 as $columna)
        {
			$this->SetFillColor(2,157,116);
            //Parámetro con valor 2, cabecera vertical
            $this->Cell(73,10, utf8_decode($columna),0,0 ,0);
        }
    }
	//*************************************ITSCH
	function cabecerarecibo1($cabecera1)
    {
        $this->SetXY(40, 13); //Seleccionamos posición
		//$this->SetFillColor(2,157,116);
        $this->SetFont('Arial','B',9); //Fuente, Negrita, tamaño
		$this->SetFillColor(250, 270, 250);
        foreach($cabecera1 as $columna)
        {
			$this->SetFillColor(2,157,116);
            //Parámetro con valor 2, cabecera vertical
            $this->Cell(73,10, utf8_decode($columna),0,0 ,0);
        }
    }
	//********************************************COPIA
	function cabecerarecibo16($cabecera2)
    {
        $this->SetXY(40, 158); //Seleccionamos posición
		//$this->SetFillColor(2,157,116);
        $this->SetFont('Arial','B',9); //Fuente, Negrita, tamaño
		$this->SetFillColor(250, 270, 250);
        foreach($cabecera2 as $columna)
        {
			$this->SetFillColor(2,157,116);
            //Parámetro con valor 2, cabecera vertical
            $this->Cell(73,10, utf8_decode($columna),0,0 ,0);
        }
    }
	//*************************************ITSCH
	function cabecerarecibo11($cabecera1)
    {
        $this->SetXY(27, 18); //Seleccionamos posición
		//$this->SetFillColor(2,157,116);
        $this->SetFont('Arial','B',9); //Fuente, Negrita, tamaño
		$this->SetFillColor(250, 270, 250);
        foreach($cabecera1 as $columna)
        {
			$this->SetFillColor(2,157,116);
            //Parámetro con valor 2, cabecera vertical
            $this->Cell(73,10, utf8_decode($columna),0,0 ,0);
        }
    }
	//**************************************COPIA
	function cabecerarecibo116($cabecera2)
    {
        $this->SetXY(27, 163); //Seleccionamos posición
		//$this->SetFillColor(2,157,116);
        $this->SetFont('Arial','B',9); //Fuente, Negrita, tamaño
		$this->SetFillColor(250, 270, 250);
        foreach($cabecera2 as $columna)
        {
			$this->SetFillColor(2,157,116);
            //Parámetro con valor 2, cabecera vertical
            $this->Cell(73,10, utf8_decode($columna),0,0 ,0);
        }
    }

	//*************************************RECIBO OFICIAL DE COBRO
	function cabecerarecibo2($cabecera1)
    {
        $this->SetXY(32, 23); //Seleccionamos posición
		//$this->SetFillColor(2,157,116);
        $this->SetFont('Arial','B',9); //Fuente, Negrita, tamaño
		$this->SetFillColor(200, 270, 250);
		//$this->SetTextColor(100, 100, 150);
        foreach($cabecera1 as $columna)
        {
			$this->SetFillColor(2,157,116);
            //Parámetro con valor 2, cabecera vertical
            $this->Cell(73,10, utf8_decode($columna),0,0 ,0);
        }
    }
	//***********************************COPIA
	function cabecerarecibo26($cabecera1)
    {
        $this->SetXY(32, 168); //Seleccionamos posición
		//$this->SetFillColor(2,157,116);
        $this->SetFont('Arial','B',9); //Fuente, Negrita, tamaño
		$this->SetFillColor(200, 270, 250);
		//$this->SetTextColor(100, 100, 150);
        foreach($cabecera1 as $columna)
        {
			$this->SetFillColor(2,157,116);
            //Parámetro con valor 2, cabecera vertical
            $this->Cell(73,10, utf8_decode($columna),0,0 ,0);
        }
    }
	//*************************************direccion
	function cabecerarecibo3($cabecera1)
    {
        $this->SetXY(63, 32); //Seleccionamos posición
		//$this->SetFillColor(2,157,116);
        $this->SetFont('Arial','',7); //Fuente, Negrita, tamaño
		$this->SetFillColor(250, 250, 250);
        foreach($cabecera1 as $columna)
        {
			$this->SetFillColor(2,157,116);
            //Parámetro con valor 2, cabecera vertical
            $this->Cell(73,10, utf8_decode($columna),0,0 ,0);
        }
    }
	//+++++++++++++++++++++++++++++++++COPIA
	function cabecerarecibo36($cabecera2)
    {
        $this->SetXY(63, 176); //Seleccionamos posición
		//$this->SetFillColor(2,157,116);
        $this->SetFont('Arial','',7); //Fuente, Negrita, tamaño
		$this->SetFillColor(250, 250, 250);
        foreach($cabecera2 as $columna)
        {
			$this->SetFillColor(2,157,116);
            //Parámetro con valor 2, cabecera vertical
            $this->Cell(73,10, utf8_decode($columna),0,0 ,0);
        }
    }
	//*************************************direccion
	function cabecerarecibo4($cabecera1)
    {
        $this->SetXY(33, 36); //Seleccionamos posición
		//$this->SetFillColor(2,157,116);
        $this->SetFont('Arial','',7); //Fuente, Negrita, tamaño
		$this->SetFillColor(250, 250, 250);
        foreach($cabecera1 as $columna)
        {
			$this->SetFillColor(2,157,116);
            //Parámetro con valor 2, cabecera vertical
            $this->Cell(73,10, utf8_decode($columna),0,0 ,0);
        }
    }
	//**********************************COPIA
	function cabecerarecibo46($cabecera2)
    {
        $this->SetXY(33, 180); //Seleccionamos posición
		//$this->SetFillColor(2,157,116);
        $this->SetFont('Arial','',7); //Fuente, Negrita, tamaño
		$this->SetFillColor(250, 250, 250);
        foreach($cabecera2 as $columna)
        {
			$this->SetFillColor(2,157,116);
            //Parámetro con valor 2, cabecera vertical
            $this->Cell(73,10, utf8_decode($columna),0,0 ,0);
        }
    }
	//*************************************direccion
	function cabecerarecibo5($cabecera1)
    {
        $this->SetXY(40, 40); //Seleccionamos posición
		//$this->SetFillColor(2,157,116);
        $this->SetFont('Arial','',7); //Fuente, Negrita, tamaño
		$this->SetFillColor(250, 250, 250);
        foreach($cabecera1 as $columna)
        {
			$this->SetFillColor(2,157,116);
            //Parámetro con valor 2, cabecera vertical
            $this->Cell(73,10, utf8_decode($columna),0,0 ,0);
        }
    }
	//*************************************COPIA
	function cabecerarecibo56($cabecera2)
    {
        $this->SetXY(40, 184); //Seleccionamos posición
		//$this->SetFillColor(2,157,116);
        $this->SetFont('Arial','',7); //Fuente, Negrita, tamaño
		$this->SetFillColor(250, 250, 250);
        foreach($cabecera2 as $columna)
        {
			$this->SetFillColor(2,157,116);
            //Parámetro con valor 2, cabecera vertical
            $this->Cell(73,10, utf8_decode($columna),0,0 ,0);
        }
    }
	//****************************************************************************************************************
	function cabeceraFecha($cabecera1)
    {
        $this->SetXY(145, 15); //Seleccionamos posición
		//$this->SetFillColor(2,157,116);

        $this->SetFont('Arial','B',10); //Fuente, Negrita, tamaño

        foreach($cabecera1 as $columna)
        {
			$this->SetFillColor(2,157,116);
            //Parámetro con valor 2, cabecera vertical
            $this->Cell(33,10, utf8_decode($columna),1, 2 , 'C' );
        }
    }
	//********************************copia
	function cabeceraFecha1($cabecera2)
    {
        $this->SetXY(145,158); //Seleccionamos posición
		//$this->SetFillColor(2,157,116);

        $this->SetFont('Arial','B',10); //Fuente, Negrita, tamaño

        foreach($cabecera2 as $columna)
        {
			$this->SetFillColor(2,157,116);
            //Parámetro con valor 2, cabecera vertical
            $this->Cell(33,10, utf8_decode($columna),1, 2 , 'C' );
        }
    }
 //*****************************************************************************datos de fecha
 function datosFecha($datos1)
    {
        $this->SetXY(178,15); //40 = 10 posiciónX_anterior + 30ancho Celdas de cabecera
        $this->SetFont('Arial','',10); //Fuente, Normal, tamaño
        foreach($datos1 as $columna)
        {
           $this->Cell(26,10, utf8_decode($columna),1, 2 , 'C' );
		   //$this->Cell(32,7, utf8_decode($columna['fecha']),1, 2 , 'L' );

        }
    }
	//****************************************************copia
	 function datosFecha1($datos2)
    {
        $this->SetXY(178,158); //40 = 10 posiciónX_anterior + 30ancho Celdas de cabecera
        $this->SetFont('Arial','',10); //Fuente, Normal, tamaño
        foreach($datos2 as $columna)
        {
           $this->Cell(26,10, utf8_decode($columna),1, 2 , 'C' );
		   //$this->Cell(32,7, utf8_decode($columna['fecha']),1, 2 , 'L' );

        }
    }

//************************tabla conceptos*********************************************
//*******************************************************************************************************************************************************************************************************
	function cabeceraConceptos($cabecera)
    {
        $this->SetXY(10, 83);
        $this->SetFont('Arial','B',10);
        foreach($cabecera as $fila)
        {
            $this->Cell(32,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }
	//******************++copia
	function cabeceraConceptos4($cabecera1)
    {
        $this->SetXY(10, 227);
        $this->SetFont('Arial','B',10);
        foreach($cabecera1 as $fila)
        {
            $this->Cell(32,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }
	//*******************+
	function cabeceraConceptos1($cabecera)
    {
        $this->SetXY(42, 83);
        $this->SetFont('Arial','B',10);
        foreach($cabecera as $fila)
        {
            $this->Cell(19,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }
	//***********************copia
	function cabeceraConceptos14($cabecera1)
    {
        $this->SetXY(42, 227);
        $this->SetFont('Arial','B',10);
        foreach($cabecera1 as $fila)
        {
            $this->Cell(19,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }
	//*************************************
	function cabeceraConceptos2($cabecera)
    {
        $this->SetXY(42, 83);
        $this->SetFont('Arial','B',10);
        foreach($cabecera as $fila)
        {
            $this->Cell(142,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }
	//*************************+copia
	function cabeceraConceptos24($cabecera1)
    {
        $this->SetXY(42, 227);
        $this->SetFont('Arial','B',10);
        foreach($cabecera1 as $fila)
        {
            $this->Cell(142,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }
	//**********************************
	function cabeceraConceptos3($cabecera)
    {
        $this->SetXY(184, 83);
        $this->SetFont('Arial','B',10);
		$this->SetTextColor(3, 3, 3);
        foreach($cabecera as $fila)
        {
            $this->Cell(19,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }
	//*****************************copia
	function cabeceraConceptos34($cabecera1)
    {
        $this->SetXY(184, 227);
        $this->SetFont('Arial','B',10);
		$this->SetTextColor(3, 3, 3);
        foreach($cabecera1 as $fila)
        {
            $this->Cell(19,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }
    function datosConceptos($datos)
    {
        $this->SetXY(10,90);
        $this->SetFont('Arial','',8);
        //$this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $ejeY = 17; //Aquí se encuentra la primer CellFitSpace e irá incrementando
        $letra = 'D'; //'D' Dibuja borde de cada CellFitSpace -- 'FD' Dibuja borde y rellena
        foreach($datos as $fila)
        {
            $this->Cell(32,7, utf8_decode($fila['clave']),1,0,'C');
			$this->Cell(142,7, utf8_decode($fila['concepto'])." (".utf8_decode($fila['obs']).")",1,0,'L');
            $this->Cell(19,7, utf8_decode($fila['importe']),1,0,'C');
			//$this->Cell(19,7, utf8_decode($fila['cantidad']),1,0,'C');
			$this->Ln();
            //Condición ternaria que cambia el valor de $letra
            ($letra == 'D') ? $letra = 'FD' : $letra = 'D';
            //Aumenta la siguiente posición de Y (recordar que X es fijo)
            //Se suma 7 porque cada celda tiene esa altura
            $ejeY = $ejeY + 7;
        }


    }
	//***********************************************copiaa
	function datosConceptos4($datos1)
    {
        $this->SetXY(10,234);
        $this->SetFont('Arial','',8);
        //$this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $ejeY = 17; //Aquí se encuentra la primer CellFitSpace e irá incrementando
        $letra = 'D'; //'D' Dibuja borde de cada CellFitSpace -- 'FD' Dibuja borde y rellena
        foreach($datos1 as $fila)
        {
            $this->Cell(32,7, utf8_decode($fila['clave']),1,0,'C');
						//$this->Cell(19,7, utf8_decode($fila['cantidad']),1,0,'C');
						$this->Cell(142,7, utf8_decode($fila['concepto']),1,0,'L');
            $this->Cell(19,7, utf8_decode($fila['importe']),1,0,'C');
						$this->Ln();
            //Condición ternaria que cambia el valor de $letra
            ($letra == 'D') ? $letra = 'FD' : $letra = 'D';
            //Aumenta la siguiente posición de Y (recordar que X es fijo)
            //Se suma 7 porque cada celda tiene esa altura
            $ejeY = $ejeY + 7;
        }


    }
	//END CONCEPTOS
//***************************************************************************************************************************************************************************************************************************************************************************
//***************************************************************************
	function cabeceranombre($cabecera)
    {
        $this->SetXY(8, 50);
        $this->SetFont('Arial','B',10);
        foreach($cabecera as $fila)
        {

            $this->Cell(158,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }


	//*********************************++copia
	function cabeceranombre1($cabecera1)
    {
        $this->SetXY(8, 194);
        $this->SetFont('Arial','B',10);
        foreach($cabecera1 as $fila)
        {

            $this->Cell(158,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }
	function datosnombre($datos)
    {
        $this->SetXY(8, 57);
        $this->SetFont('Arial','',10);
        foreach($datos as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell(158,7, utf8_decode($fila),1, 0 , 'L' );
        }
    }
	//********************************copia
	function datosnombre1($datos1)
    {
        $this->SetXY(8,201);
        $this->SetFont('Arial','',10);
        foreach($datos1 as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell(158,7, utf8_decode($fila),1, 0 , 'L' );
        }
    }
//********************************************************************************************************************************************************************************
function cabeceraobserv($cabecera)
    {
        $this->SetXY(8, 67);
        $this->SetFont('Arial','B',10);
        foreach($cabecera as $fila)
        {

            $this->Cell(196.3,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }


	//*********************************++copia
	function cabeceraobserv1($cabecera1)
    {
        $this->SetXY(8, 210);
        $this->SetFont('Arial','B',10);
        foreach($cabecera1 as $fila)
        {

            $this->Cell(196.3,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }
	function datosobserv($datos)
    {
        $this->SetXY(8, 74);
        $this->SetFont('Arial','',6.9);
        foreach($datos as $fila)
        {
					$this->Cell(196.3,7, utf8_decode($fila),1, 0 , 'L' );
        }

    }
	//********************************copia
	function datosobserv1($datos1){
        $this->SetXY(8,217);
        $this->SetFont('Arial','',6.9);
				foreach($datos1 as $fila)
				{
						$this->Cell(196.3,7, utf8_decode($fila),1, 0 , 'L' );
				}

    }	//*********************************************************************************************************
	 function cabeceraMatricula($cabecera)
    {
        $this->SetXY(168, 50);
        $this->SetFont('Arial','B',10);
        foreach($cabecera as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell(36,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }
	//******************************+copia
	 function cabeceraMatricula1($cabecera1)
    {
        $this->SetXY(168, 194);
        $this->SetFont('Arial','B',10);
        foreach($cabecera1 as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell(36,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }
	//****************************************************************************
	function datosMatricula($datos)
    {
        $this->SetXY(168,57); // 77 = 70 posiciónY_anterior + 7 altura de las de cabecera
        $this->SetFont('Arial','',10); //Fuente, normal, tamaño
        foreach($datos as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell(36,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }
	//***************++copia
	function datosMatricula1($datos1)
    {
        $this->SetXY(168,201); // 77 = 70 posiciónY_anterior + 7 altura de las de cabecera
        $this->SetFont('Arial','',10); //Fuente, normal, tamaño
        foreach($datos1 as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell(36,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }
//*********************************************************************************
function cabeceratotalletra($cabecera)
    {
        $this->SetXY(8, 114);
        $this->SetFont('Arial','B',10);
        foreach($cabecera as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell(40.5,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }
	//*******************************copia
	function cabeceratotalletra1($cabecera1)
    {
        $this->SetXY(8, 258);
        $this->SetFont('Arial','B',10);
        foreach($cabecera1 as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell(40.5,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }
	//***********************************************************
	function datostotalletra($datos)
    {
        $this->SetXY(8, 121);
        $this->SetFont('Arial','',10);
        foreach($datos as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell(40.5,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }
	//*****************************************copia
	function datostotalletra1($datos1)
    {
        $this->SetXY(8, 265);
        $this->SetFont('Arial','',10);
        foreach($datos1 as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell(40.5,7, utf8_decode($fila),1, 0 , 'C' );
        }
    }
	//*********************************************************************************
function cabeceraletra($cabecera)
    {
        $this->SetXY(50, 114);
        $this->SetFont('Arial','B',10);
        foreach($cabecera as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell(154.6,7, utf8_decode($fila),1, 0 , 'L' );
        }
    }
	//***************************+copia
	function cabeceraletra1($cabecera1)
    {
        $this->SetXY(50, 258);
        $this->SetFont('Arial','B',10);
        foreach($cabecera1 as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell(154.6,7, utf8_decode($fila),1, 0 , 'L' );
        }
    }
	//*******************************
	function datosletra($datos)
    {
        $this->SetXY(50, 121);
        $this->SetFont('Arial','',10);

        foreach($datos as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell(154.6,7, utf8_decode($fila),1, 0 , 'L' );
        }

    }
	////////////////////*********copia
	function datosletra1($datos1)
    {
        $this->SetXY(50, 265);
        $this->SetFont('Arial','',10);
		//$this->SetFillColor(200, 270, 250);
        foreach($datos1 as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell(154.6,7, utf8_decode($fila),1, 0 , 'L' );
        }

    }

//Pie de página
function Footer()
{
//Posición: a 1,5 cm del final
$this->SetY(-20);
$this->SetX(195);
//Arial italic 8
$this->SetFont('Arial','I',8);
//Número de página
$this->Cell(0,10,'Version 2',0,0,'C');
}
} // FIN Class PDF
?>