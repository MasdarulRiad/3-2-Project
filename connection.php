<?php
$host="localhost";
$dbName="attnd";
$user="root";
$pass="";
$link=new mysqli($host,$user,$pass,$dbName);
if($link){
	echo "connection establish";
}
else{
	echo "error";
}
?>