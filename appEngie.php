<?php

ini_set('memory_limit', -1);

ini_set('max_execution_time', 0);

use PhpOffice\PhpSpreadsheet\Spreadsheet;
require 'vendor/autoload.php';

/*ZONA HORARIA*/
date_default_timezone_set('America/Mexico_City');

/*UNIX*/
setlocale(LC_TIME,'es_ES.UTF-8');

//WINDOWS
setlocale(LC_TIME,'spanish');

//Definimos el nombre del archivo de lectura
$ExcelAx = "pruebaEngie.xlsx";

//extension especifica
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
$spreadsheet_lectura = $reader->load($ExcelAx);

//Se establece en que hoja se trabajara,
//getActiveSheet obtiene la hoja activa, por default es la primera
//y se maneja como arreglos osea getSheet(1) = segunda hoja

$sheet_lectura = $spreadsheet_lectura->getActiveSheet();
echo '<table border="1" cellpading="8" style="margin-left:250px;">';

//Variables de Lectura

$nombre_cliente=$sheet_lectura->getCellByColumnAndRow(3,9)->getValue();
$numero_cliente=$sheet_lectura->getCellByColumnAndRow(3,10)->getValue();
$fecha_inicio=$sheet_lectura->getCellByColumnAndRow(3,11)->getValue();
$fecha_final=$sheet_lectura->getCellByColumnAndRow(3,12)->getValue();
$numero_documento=$sheet_lectura->getCellByColumnAndRow(6,2)->getValue();
$fecha=$sheet_lectura->getCellByColumnAndRow(6,4)->getValue();
$revision=$sheet_lectura->getCellByColumnAndRow(6,6)->getValue();

echo '<tr>
        <td>'.$nombre_cliente.'</td>
        <td>'.$numero_cliente.'</td>
        <td>'.$fecha_inicio.'</td>
        <td>'.$fecha_final.'</td>
        <td>'.$numero_documento.'</td>
        <td>'.$fecha.'</td>
        <td>'.$revision.'</td>
      </tr>';


echo '</table>';

echo "Datos extraidos con exito";

?>