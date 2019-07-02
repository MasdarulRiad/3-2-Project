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
		
	$emaill=$_POST['email'];
	$passwardd=$_POST['passward'];
	
	
	if($emaill=="" || $passwardd==""){
	echo "<div class='alert alert-danger'>
	Fields must not be empty;
	</div>";
	}
	else if(!filter_var($emaill,FILTER_VALIDATE_EMAIL)){
		echo"<div class='alert alert-danger'>
		Invalid email!!;
		</div>";
	}
	else{

	$query="insert into sign(email,passward)values('$emaill','$passwardd')";
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
<div class="container">
    <label for="email">Email:</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
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
</body>.
</html>