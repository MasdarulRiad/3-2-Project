<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];
}
 ?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
</head>
<body>
<div class="container">
<div class="container">
<a href="read.php" class="btn btn-primary" >display data</a>
</div>

<?php 
    include_once("connection.php");
   if($_SERVER['REQUEST_METHOD']=='POST'){
	$id=$_POST['id'];
	$sname=$_POST['sname'];
	$sroll=$_POST['sroll'];
	$semail=$_POST['semail'];
	$sctone=$_POST['sctone'];
	$scttwo=$_POST['scttwo'];
	$sctthree=$_POST['sctthree'];
	$sctfour=$_POST['sctfour'];
	
	if($sname=="" || $sroll=="" || $semail==""){
	echo "<div class='alert alert-danger'>
	name roll email must not be empty;
	</div>";
	}
	else if(!filter_var($semail,FILTER_VALIDATE_EMAIL)){
		echo"<div class='alert alert-danger'>
		Invalid email!!;
		</div>";
	}
	
	else {
	$query="update ctmarkone set sname='$sname',sroll='$sroll',semail='$semail', sctone='$sctone',scttwo='$scttwo',sctthree='$sctthree',sctfour='$sctfour' where id='$id'";
    $updated_data=mysqli_query($link,$query);
	if($updated_data){
		echo "data updated  successfully";
	}
	else{
		echo "data not updated";
	}
	}
	}
   ?>
   
   <?php
   $sql="select * from ctmarkone where id='$id'";
   $sresult=mysqli_query($link,$sql);
   if($sresult){
	   while($data=mysqli_fetch_array($sresult)){
   ?>
<form method="post">
<input type="hidden" name="id" value="<?php echo $data['id'];?>">
<div class="container">
<label for="name">Name:</label>
<input type="text" name="sname" id="sname" value="<?php echo $data['sname'];?>">
</div>
<div class="container">
<label for="number">Roll:</label>
<input type="number" name="sroll" id="sroll" value="<?php echo $data['sroll'];?>" >
</div>
<div class="container">
<label for="email">Email:</label>
<input type="email" name="semail" id="semail" value="<?php echo $data['semail'];?>">
</div>
<div class="container">
<label for="text">ClassTest1:</label>
<input type="text" name="sctone" id="sctone" value="<?php echo $data['sctone'];?>">
</div>
<div class="container">
<label for="text">ClassTest2:</label>
<input type="text" name="scttwo" id="scttwo" value="<?php echo $data['scttwo'];?>">
</div>
<div class="container">
<label for="text">ClassTest3:</label>
<input type="text" name="sctthree" id="sctthree" value="<?php echo $data['sctthree'];?>">
</div>
<div class="container">
<label for="text">ClassTest4:</label>
<input type="text" name="sctfour" id="sctfour" value="<?php echo $data['sctfour'];?>">
</div>
<div class="container">
<input type="submit" class="btn btn-primary">
</div>

</form>
   <?php }} ?>
  </div>


</body>
</html>