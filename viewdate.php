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
<th>Sr No.</th>
<th>Name</th>
<th>Father Name</th>
<th>Email</th>
<th>Attendance</th>

</tr>
</thead>
<?php
if($_GET['date']){
	$date=$_GET['date'];
 $query="select studentlist.*,attendance.* from attendance inner join studentlist on attendance.emp_id=studentlist.stu_id and attendance.date='$date'";
 $result=$link->query($query);
 if($result->num_rows>0){
	 $i=0;
	 while($val=$result->fetch_assoc()){
		 $i++;
?>
<tr>
    <td><?php echo $i; ?></td>
	<td><?php echo $val['name']; ?></td>
	<td><?php echo $val['fname']; ?></td>
	<td><?php echo $val['email']; ?></td>
	<td>
	present <input type="radio" value="Present" 
	<?php
	 if($val['value']=='Present')
     echo "checked";		 
	?>
	>
	Absent <input type="radio" value="Absent" 
	<?php
	 if($val['value']=='Absent')
     echo "checked";		 
	?>
	>
	</td>
	
	
</tr>
<?php } } } ?>
 
</table>
</form>
</div>
<div class="panel-footer">
</div>

</div>
</body>
</html>