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
<a href="home.php" class="btn btn-primary">Back</a>
</div>
<div class="panel panel-defult container">
<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
	$roll=$_POST['roll'];
	$stdemail=$_POST['stdemail'];
	$passward=$_POST['passward'];
	
	
	if($roll=="" || $stdemail=="" || $passward==""){
	echo "<div class='alert alert-danger'>
	Fields must not be empty;
	</div>";
	}
	else if(!filter_var($stdemail,FILTER_VALIDATE_EMAIL)){
		echo"<div class='alert alert-danger'>
		Invalid email!!;
		</div>";
	}
	else{

	$query="insert into stusign(roll,stdemail,passward)values('$roll','$stdemail','$passward')";
    $result=$link->query($query);
	if($result){
		echo "<div class='alert slert-success'>
		you are signed in successfully;
		</div>";
	
	}
	}
	}
	?>
<form method="post">
<div class="container">
  <p>sign In here </p>
  <div class="container ">
    <label for="number">Roll:</label>
    <input type="number" name="roll" class="form-control" id="roll" placeholder="Enter roll">
  </div>
<div class="container">
    <label for="email">Email:</label>
    <input type="email" name="stdemail" class="form-control" id="stdemail" placeholder="Enter email">
  </div>
  <div class="container">
    <label for="pwd">Passward:</label>
    <input type="pwd" name="passward" class="form-control" id="pwd" placeholder="passward">
  </div>
  <div class="container form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
	<button type="submit" class="btn btn-primary">Sign In</button>
	</div>
	</form>


</div>

</body>



</html>