<?php 
error_reporting(0);
session_start();
	//session_start();
$name="";
$amount="";
$id= 0;
//$edit_state= false;
$db = mysqli_connect('localhost','root', '', 'crud');
 

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$amount = $_POST['amount'];
$query="INSERT INTO info (name, amount) VALUES ('$name', '$amount')"; 
	mysqli_query($db,$query);
$_SESSION['msg'] = "Details saved"; 
	header('location: indexx.php');
}
if(isset($_POST['update'])){
	$name=mysql_real_escape_string($_POST['name']);
$address=mysql_real_escape_string($_POST['amount']);
	$id=mysql_real_escape_string($_POST['id']);

 mysqli_query($db, "UPDATE info SET name='$name', amount='$amount' WHERE id=$id");
		$_SESSION['msg'] = "Details updated"; 
		header('location: indexx.php');

}
		 
		
		
	

$results= mysqli_query($db, "SELECT * FROM info");
?>