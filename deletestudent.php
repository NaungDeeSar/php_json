<?php 

 $id=$_POST['id'];
 $strJson=file_get_contents("student.json");
 if($strJson){
 	$data_arr=json_decode($strJson,true);
 	unset($data_arr[$id]);
 	$jsonstr=json_encode($data_arr,JSON_PRETTY_PRINT);
 	file_put_contents("student.json", $jsonstr);
 }

 ?>