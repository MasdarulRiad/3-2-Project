<?php 
include_once("connection.php");
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
<?php 
   if($_SERVER['REQUEST_METHOD']=='POST'){
	$sname=$_POST['sname'];
	$sroll=$_POST['sroll'];
	$semail=$_POST['semail'];
	$sctone=$_POST['sctone'];
	$scttwo=$_POST['scttwo'];
	$sctthree=$_POST['sctthree'];
	$sctfour=$_POST['sctfour'];
	
	if($sname=="" || $sroll=="" || $semail==""){
	echo "<div class='alert alert-danger'>
	name roll must not be empty;
	</div>";
	}
	else if(!filter_var($semail,FILTER_VALIDATE_EMAIL)){
		echo"<div class='alert alert-danger'>
		Invalid email!!;
		</div>";
	}
	
	else {
	$query="insert into ctmark(sname,sroll,semail,sctone,scttwo,sctthree,sctfour)values('$sname','$sroll','$semail','$sctone','$scttwo','$sctthree','$sctfour')";
    $result=$link->query($query);
	if($result){
		echo "<div class='alert slert-success'>
		data inserted successfully;
		</div>";
	}
	}
	}
   ?>
<form method="post">
<div class="container">
<p>insert data here</p>
<div class="container">
<label for="name">Name:</label>
<input type="text" name="sname" id="sname" class="form-control">

</div>
<div class="container">
<label for="number">Roll:</label>
<input type="number" name="sroll" id="sroll" class="form-control">
</div>
<div class="container">
<label for="email">Email:</label>
<input type="email" name="semail" id="semail" class="form-control">
</div>
<div class="container">
<label for="number">ClassTest1:</label>
<input type="number" name="sctone" id="sctone" class="form-control">
</div>
<div class="container">
<label for="number">ClassTest2:</label>
<input type="number" name="scttwo" id="scttwo" class="form-control">
</div>
<div class="container">
<label for="number">ClassTest3:</label>
<input type="number" name="sctthree" id="sctthree" class="form-control">
</div>
<div class="container">
<label for="number">ClassTest4:</label>
<input type="number" name="sctfour" id="sctfour" class="form-control">
</div>

<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>

</body>
</html>