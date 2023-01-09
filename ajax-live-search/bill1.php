<?php
session_start();
?>
<?php

$conn = mysqli_connect("localhost", "root", "", "gp");
$totalproducts =0;
$totalprice =0;
$table=$_SESSION['email'];
if($conn === false){
	die("ERROR: Could not connect. "
		. mysqli_connect_error());
}
try{
    $query = "CREATE TABLE ".$table."temp (
        billno int(111),
        PRIMARY KEY  (billno)
        )";
    $sql = "  INSERT INTO ".$table."temp VALUES('1')";
    mysqli_query($conn,$query);
    mysqli_query($conn,$sql);
   }catch(Exception $e){

    }
$sql = "SELECT * FROM ".$table."temp";
$result = $conn->query($sql);	
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $billno=$row['billno'];
    }
}
$customername=$_REQUEST['customername'];
$count=$_REQUEST['sa'];
$data=array();
for($i=0;$i<=$count;$i++){

    $data[''.$i.''][0]=$_REQUEST['id'.$i.''];
    $temp=$_REQUEST['id'.$i.''];
    $data[''.$i.''][1]=$_REQUEST['prod'.$i.''];
    $t1=$_REQUEST['prod'.$i.''];
    $sql = "SELECT price,qnt,updated FROM ".$table."products WHERE id='".$temp."'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $data[''.$i.''][2]=$row["price"];
        $data[''.$i.''][3]=$row["qnt"];
        $data[''.$i.''][4]=$row["updated"];
        

      }
    } 
    $data[''.$i.''][5]=$_REQUEST['ttl'.$i.''];
    $t2=$_REQUEST['ttl'.$i.''];
$t3=$data[''.$i.''][2]*$t2;
$totalproducts=$t2+$totalproducts;
$totalprice=$t3+$totalprice;
$t4= date("y/m/d");
$iddd=0;

try{
    $query = "CREATE TABLE ".$table."list (
        id int(111) AUTO_INCREMENT,
        customername varchar(225) NULL,
        billno int(225) NOT NULL,
        totalproducts int(225) NOT NULL,
        name varchar(225) NOT NULL,
        price varchar(225) NOT NULL,
        date date NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
        )";
    $result = mysqli_query($conn, $query);
    }catch(Exception $e){

    }
    $sql = "    INSERT INTO  ".$table."list VALUES('$iddd','$customername','$billno','$t2','$t1','$t3','$t4')";
	if(mysqli_query($conn, $sql)){
	}	
}
$sql = "SELECT total FROM ".$table."products WHERE id='".$temp."'";
$result = $conn->query($sql);	
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $ttlprod=$row['total'];
    }
}
$ttlprod=$ttlprod-$t2;
$sql = "update ".$table."products SET total='".$ttlprod."' WHERE id='".$temp."'";
if(mysqli_query($conn, $sql)){
}

$idd=0;
try{

    $query = "CREATE TABLE ".$table."bills (
        id int(111) AUTO_INCREMENT,
        customername varchar(225) NULL,
        totalproducts int(225) NOT NULL,
        totalprice	 varchar(225) NOT NULL,
        date date NOT NULL DEFAULT CURRENT_TIMESTAMP,
        billnumber	int(225) NOT NULL,
        PRIMARY KEY  (id)
        )";
    $result = mysqli_query($conn, $query);
    }catch(Exception $e){

    }
    $sql = "  DELETE FROM ".$table."temp WHERE billno=".$billno."";
    if(mysqli_query($conn, $sql)){
    }
$sql = " INSERT INTO ".$table."bills VALUES('$idd','$customername','$totalproducts','$totalprice','$t4','$billno')";
if(mysqli_query($conn, $sql)){
}

$billno++;
$sql = "    INSERT INTO ".$table."temp VALUES('$billno')";
if(mysqli_query($conn, $sql)){
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <style>
       #tb{
        margin-top:50px;
        margin-left:50px;
        margin-right:50px;
       }
       #cus{
        float:right;
        margin-right:50px;
       }
       @media print{
       .a{
        display:none;
       }
    }
    .a{
        border:2px solid black;
        border-radius:8px;
    }
    </style>
    <meta charset="UTF-8">

    <title>Document</title>
</head>
<body>

    <?php 
    if($customername!=''):?>
    <div id="cus">Customer Name  :<?php echo $customername ?></div>
    <?php endif;?>
 
    <div id="tb">
   <table class="table table-striped">
    <tr >
        
        <th>Id  </th>
        <th>Name  </th>
        <th>Product price  </th>
        <th>Quantity  </th>
        <th>Expirey date  </th>
        <th>Total products  </th>
        <th>Amount </th>
        
</tr>
<?php for($j=0;$j<=$count;$j++):?>
    <tr>
<td><?php echo $data[''.$j.''][0] ?></td>
<td><?php echo $data[''.$j.''][1] ?></td>
<td><?php echo $data[''.$j.''][2] ?></td>
<td><?php echo $data[''.$j.''][3] ?></td>
<td><?php echo $data[''.$j.''][4] ?></td>
<td><?php echo $data[''.$j.''][5] ?></td>
<td><?php echo $data[''.$j.''][2]*$data[''.$j.''][5] ?></td>
</tr>
<?php endfor;?>
<!-- <tr style="float:right;">
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td><td><b>Total Amount: </b><?php echo $totalprice ?></td></tr> -->
   </table>
   <div style="float:right; margin-right:25px"><b>Total Amount: </b><?php echo $totalprice ?></div></div><br/><br/>
   <form action="http://127.0.0.1:8000/dashboard" method="get">
    <input type="hidden" name="cusemail"  value=<?php echo $_SESSION['aemail']?>>
    <center><input type="submit" class="a" value="back"/><center/>
</form>

   <script>
    window.print();
   </script>
</body>
</html>