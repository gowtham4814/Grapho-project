<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "gp");

$table=$_SESSION['email'];
if($conn === false){
	die("ERROR: Could not connect. "
		. mysqli_connect_error());
}
$find = $_REQUEST['find'];

for($i=0;$i<=$find;$i++){
$name = $_REQUEST['rem'.$i.''];
$sql = "DELETE FROM ".$table."products WHERE name='".$name."'";
	if(mysqli_query($conn, $sql)){
	}	
}
mysqli_close($conn);
	header("location:http://127.0.0.1:8000/dashboard");
	exit();
?>