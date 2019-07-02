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
<th>Date</th>
<th>View</th>
</tr>
</thead>
<?php
 $query="select distinct date from attendance";
 $result=$link->query($query);
 if($result->num_rows>0){
	 $i=0;
	 while($val=$result->fetch_assoc()){
		 $i++;
?>
<tr>
    <td><?php echo $i; ?></td>
	<td><?php echo $val['date']; ?></td>
	<td><a href="viewdate.php ?date=<?php echo $val['date']?>"class="btn btn-primary">View </a></td>
</tr>
 <?php } } ?>
 
</table>
</form>
</div>
</div>
</body>
</html>