<?php
$database = new database();
$database->type_db = "2";
if(!$database->connect()){
	echo mysql_error();
}
?>