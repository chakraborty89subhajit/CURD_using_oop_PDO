<?php
try{$db= new PDO('mysql:
	          host=localhost:3306;
	          dbname=mydb;',
	          'root',
	          'project');
}catch(Exception $e){
	echo $e->getMessage();
}
include './class_curd.php';

$curd= new curd($db);

?>