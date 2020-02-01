<?php

ini_set('memory_limit', -1);

ini_set('max_execution_time', 0);

use PhpOffice\PhpSpreadsheet\Spreadsheet;
//Clase para escritura de excel
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require 'vendor/autoload.php';

/*ZONA HORARIA*/
date_default_timezone_set('America/Mexico_City');

/*UNIX*/
setlocale(LC_TIME,'es_ES.UTF-8');

//WINDOWS
setlocale(LC_TIME,'spanish');

//Estableceremos la ruta donde se guardara el archivo
$ruta="carpetas/";

//Creamos un libro de trabajo
$spreadsheet = new Spreadsheet();

//Accedemos al objeto de la hoja
$sheet =  $spreadsheet->getActiveSheet();

//Definimos el JSON a leer

$read = new jason_file_decode();
$json = $read->json("fechas.json");

echo "La primera fecha es: ". $json["fechas"];

/*$fecha =date("d/m/Y");
$sheet ->setCellValue('A1',0.5);
$sheet ->setCellValue('A2',10);
$sheet ->setCellValue('A3',$fecha);
$sheet ->setCellValue('B1','Fecha');

$writer = new Xlsx($spreadsheet);

try{
    $writer->save($ruta.'librotest.xlsx');
    echo "Archivo creado";
}
catch(Exception $e){
    echo $e->getMessage();
}*/

?>