


<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "gp");


if($conn === false){
	die("ERROR: Could not connect. "
		. mysqli_connect_error());
}
if($_REQUEST['sl']==1){
$ido=$_REQUEST['h'];
for($j=1;$j<=$ido;$j++){
	$fi[$j] = $_REQUEST['re'.$j.''];
}
}
else{
	$ido=0;
}
$find =$_REQUEST['key'];
for($i=0;$i<=$find;$i++){
	$temp=0;
	for($m=1;$m<=$ido;$m++){
		if($i==$fi[$m]){
			$temp=1;
		}
	}
	if($temp==0){
$name = $_REQUEST['addname'.$i.''];
$id = $_REQUEST['addid'.$i.''];
$total = $_REQUEST['addqty'.$i.''];
$price = $_REQUEST['addprice'.$i.''];
$qnt = $_REQUEST['addqnt'.$i.''];
$exp = $_REQUEST['addexp'.$i.''];

$table=$_SESSION['email'];
try{
$query = "CREATE TABLE ".$table."products (
	Id int(111) AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	total varchar(255) NOT NULL,
	price varchar(255) NOT NULL,
	qnt  varchar(255) NOT NULL,
	updated date NULL,
	PRIMARY KEY  (Id)
	)";
$result = mysqli_query($conn, $query);
}catch(Exception $e){
}
$sql = "INSERT INTO ".$table."products VALUES ('$id','$name',
	'$total','$price','$qnt','$exp')";
	$result = mysqli_query($conn, $sql);
	
}
	}

	mysqli_close($conn);
	header("location:/dashboard");
	exit();
?>

