<?php
 echo "Entre";
 $ciudades=$_REQUEST['ciudades'];
 echo "Llame";
 $ciudades=split(';',$ciudades);
 echo "rompi";
 $conexion2= mysql_connect("localhost", "rociodec", "cucucita");
 mysql_select_db("rociodec_mariposa", $conexion2);
 foreach($ciudades as $ciudad){
	 $que3 = "insert into ciudades values('','$ciudad',1,1)";
   $resEmp = mysql_query($que3, $conexion2) or die(mysql_error()); 
 }
 echo "termino"
 /*
 foreach($ciudades as $ciudad){
  
 }
 ;*/
?>