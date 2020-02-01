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

//Se abre el fopen para poder escribir en el buffer de los archivos 
$handler=fopen("fechas.json", "w+");

foreach ($sheet_lectura->getRowIterator(15) as $row) {

  if(($sheet_lectura->getCellByColumnAndRow(2,$row->getRowIndex())->getCalculatedValue()<>0) && ($sheet_lectura->getCellByColumnAndRow(2,$row->getRowIndex())->getCalculatedValue() <> null)){
    $date=$sheet_lectura->getCellByColumnAndRow(2,$row->getRowIndex())->getValue();
    $date1=\PhpOffice\PhpSpreadsheet\Shared\Date::ExcelToTimestamp($date);
    $fecha=date("d-m-y",$date1);

    echo '<tr>
      <td>'.$fecha.'</td>
      </tr>';
  }
  //Creación del JSON
  $arreglo = array('fechas' => $fecha);
  $nuevojson = json_encode($arreglo);
  var_dump($nuevojson);
  
  //Escritura del JSON
  fwrite($handler, $nuevojson);
  
}

//Se cierra el buffer de escritura
fclose($handler);

echo '</table>';
echo "Datos extraidos con exito";

?>