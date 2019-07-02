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
<div class="panel panel-defult container">
<div class="panel-heading">
<h1 style="text-align:center">attendance management system<h1>
</div>
<div class="panel-body">
<a href="view.php" class="btn btn-primary">View</a>
<a href="add.php" class="btn btn-primary pull-right">Add</a>
<a href="main.php" class="btn btn-primary pull-right">Back</a>

<form method="post">
<table class="table">
<thead>
<tr>
<th>Name</th>
<th>Father Name</th>
<th>Email</th>
<th>Attendance</th>
</tr>
</thead>
<tbody>
<?php 
$query="select * from studentlist";
$result=$link->query($query);
while($show=$result->fetch_assoc()){
?>
<tr>
<td><?php echo $show['name']; ?></td>
<td><?php echo $show['fname']; ?></td>
<td><?php echo $show['email']; ?></td>
<td>
Present<input required type="radio" name="attendance[<?php echo $show['stu_id']; ?>]"value="present">
Absent<input required type="radio" name="attendance[<?php echo $show['stu_id']; ?>]"value="absent">
</td>
</tr>
<?php } ?>
</tbody>

<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
	$att=$_POST['attendance'];
	$date=date('d-m-y');
	$query="select distinct date from attendance";
	$result=$link->query($query);
	$b=false;
	if($result->num_rows>0){
		while($check=$result->fetch_assoc()){
			if($date==$check['date']){
				$b=true;
				echo "<div class='alert alert-danger'>
				attendance already taken;
	</div>";
			}
		}
		}
		if(!$b){
			foreach($att as $key=>$value){
				if($value=="present"){
					$query="insert into attendance(value,stu_id,date) values('Present',$key,'$date')";
					$insertResult=$link->query($query);
				}
				else
					$query="insert into attendance(value,stu_id,date) values('Absent',$key,'$date')";
					$insertResult=$link->query($query);
			}
		}
		if($insertResult){
			echo "<div class='alert alert-success'>
				attendance taken sucessfully;
	</div>";
	
		}
		}
		

?>


</table>
<input type="submit" class="btn btn-primary" value="Take attendance">
</form>
</div>

</div>
</body>
</html>