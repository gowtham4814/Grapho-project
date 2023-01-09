<?php
session_start();
$table=$_SESSION['email'];
$conn = mysqli_connect("localhost", "root", "", "gp");


if($conn === false){
	die("ERROR: Could not connect. "
		. mysqli_connect_error());
}
$count = $_REQUEST['count'];
for($i=0;$i<=$count;$i++){
    if(isset($_REQUEST['name'.$i.''] )){
       $data=$_REQUEST['name'.$i.''];
       $id=$_REQUEST['id'.$i.''];
       $sql = "update ".$table."products SET name='".$data."' WHERE id='".$id."'";
    }
   else if(isset($_REQUEST['total'.$i.''])){
        $data=$_REQUEST['total'.$i.''];
        $id=$_REQUEST['id'.$i.''];
        $sql = "update ".$table."products SET total='".$data."' WHERE id='".$id."'";
     }
    else if(isset($_REQUEST['price'.$i.''])){
        $data=$_REQUEST['price'.$i.''];
        $id=$_REQUEST['id'.$i.''];
        $sql = "update ".$table."products SET price='".$data."' WHERE id='".$id."'";
     }
    else if(isset($_REQUEST['quantity'.$i.''])){
        $data=$_REQUEST['quantity'.$i.''];
        $id=$_REQUEST['id'.$i.''];
        $sql = "update ".$table."products SET qnt='".$data."' WHERE id='".$id."'";
     }
    else if(isset($_REQUEST['expirey'.$i.''])){
        $data=$_REQUEST['expirey'.$i.''];
        $id=$_REQUEST['id'.$i.''];
        $sql = "update ".$table."products SET updated='".$data."' WHERE id='".$id."'";
     }
  

	if(mysqli_query($conn, $sql)){
	}	
}


  
mysqli_close($conn);
	header("location:http://127.0.0.1:8000/dashboard");
	exit();
?>