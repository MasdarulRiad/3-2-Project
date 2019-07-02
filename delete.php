<a href="read.php">Display Data</a>
<br>
<?php
include_once("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="delete from ctmarkone where id='$id'";
	$deleted_data=mysqli_query($link,$sql);
	if($deleted_data){
		echo "data deleted successfully";
	}
	else{
		echo "data not deleted";
	}
}
 ?>