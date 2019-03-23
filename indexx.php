<?php include('server.php');
if(isset($_GET['edit'])){
	$id= $_GET['edit'];
	$edit_state= true;
	$rec=mysqli_query($db,"SELECT * FROM info WHERE id=$id");
	$record=mysqli_fetch_array($rec);
	$name=$record['name'];
	$amount=$record['amount'];
	$id=$record['id'];

}

?>

 
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>
	<?php 
	if(isset($_SESSION['msg'])):?>
	<div class="msg">
		<?php
		echo $_SESSION['msg'];
		unset($_SESSIN['msg']);

		?>
	</div>
	<?php endif  ?>





<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Amount</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<tbody>
		<?php while($row= mysqli_fetch_array($results)){?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['amount']; ?></td>
			<td><a href="#">Edit</a></td>
			<td><a href="#">Delete</a></td>
		</tr>
	<?php }?>
		<tr>
			<td>Yash</td>
			<td>1000000</td>
			<td><a   href="indexx.php?edit=<?php echo $row['id'];?>">Edit</a></td>
			<td><a href="#">Delete</a></td>
		</tr>
	</tbody>
</table>
<form method="post" action="server.php">
	<input type="hidden" name="id" value="<?php echo  $id; ?>">
	<div class="input-group">
		<label>Name</label>
		<input type="text" name="name" value="<?php echo $name;?>">
	</div>
	<div class="input-group">
		<label>Amount</label>
		<input type="text" name="amount" value="<?php echo $amount;?>">
	</div>
	<div class="input-group">
<?php if($edit_state==false):?>
	<button type="submit" name="save" class="btn">Save</button>
	<?php else: ?>
		<button type="submit" name="update" class="btn">Update</button>
	<?php endif ?>
	</div>
</form>
</body>
</html>