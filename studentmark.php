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
<a href="studenthome.php"class="btn btn-primary">Back</a>
</div>
<div class="container">
<form method="post">
<table class="table">
<thead>
<tr>
<th>Sr No.</th>
<th>Name</th>
<th>Roll</th>
<th>Email</th>
<th>CT1</th>
<th>CT2</th>
<th>CT3</th>
<th>CT4</th>
</tr>
</thead>
<?php
 $query="select * from ctmarkone";
 $result=$link->query($query);
 if($result->num_rows>0){
	 $i=0;
	 while($val=$result->fetch_assoc()){
		 $i++;
?>
<tr>
    <td><?php echo $i; ?></td>
	<td><?php echo $val['sname']; ?></td>
    <td><?php echo $val['sroll']; ?></td>
	<td><?php echo $val['semail']; ?></td>
	<td><?php echo $val['sctone']; ?></td>
	<td><?php echo $val['scttwo']; ?></td>
	<td><?php echo $val['sctthree']; ?></td>
	<td><?php echo $val['sctfour']; ?></td>
	</tr>
 <?php } } ?>
 


</table>

</form>


</div>

</body>
</html>