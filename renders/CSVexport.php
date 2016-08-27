<?php
  require'Classes/PHPExcel/IOFactory.php'; 

  $time = time();
  header("Pragma: public");
  header("Expires: 0");
  header('Content-type: application/ms-excel'); 
  header('Content-Disposition: attachment; filename= MiArchivoExcel.xls'); 
  //unlink('MiArchivoExcel.xls');
  //unlink('exceltempfile.csv');
  $csv_string = $_REQUEST['exp'];
  $objReader = PHPExcel_IOFactory::createReader('CSV');
  $csv_file = fopen("exceltempfile.csv", "w");
  fwrite($csv_file, $csv_string);
  
 $objPHPExcel = $objReader->load('exceltempfile.csv');
 $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
 $objWriter->save('MiArchivoExcel.xls');
 fclose($csv_file);
 readfile('MiArchivoExcel.xls');

  


 
  
  
  


  

?>

