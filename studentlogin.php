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
<a href="home.php"class="btn btn-primary">Back</a>
</div>
<div class="container">

 <?php
 if(isset($_REQUEST['submit'])){
	 if($_REQUEST['stdemail']=="" || $_REQUEST['pwd']==""){
		 echo "field must not be empty";
	 }
	 else{
		 //$value="select * from sign where email='".$_REQUEST['email']."' && passward='".$_REQUEST['pwd']."'";
		 //$result=mysql_query($value) or 
		  //exit("Sql Error".mysql_error());
		  $query="select * from stusign where stdemail='".$_REQUEST['stdemail']."' && passward='".$_REQUEST['pwd']."'";
		  $result=$link->query($query);
		 //$num_rows=mysql_num_rows($result);
		 if($result->num_rows>0){
			 echo "you are loggin successfully";
			 header("location: studenthome.php");
		 }
		 else{
			 echo " email or passward incorrect";
		 }
	 }
 }
		
 
 ?>
   <form action="studenthome.php" method="post">
  <p>students Log In here </p>
<div class="container">
    <label for="email">Email:</label>
    <input type="email" name="stdemail" class="form-control" id="stdemail" placeholder="Enter email">
  </div>
  <div class="container">
    <label for="pwd">Passward:</label>
    <input type="pwd" name="pwd" class="form-control" id="pwd" placeholder="passward">
  </div>
  <div class="container form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
	<button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
	</form>
	</div>
</body>.
</html>