<?php
$con  = mysqli_connect("localhost","root","","gp");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="SELECT * FROM bills";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $productname[]  = $row['totalproducts']  ;
            $sales[] = $row['totalprice'];
        }
 
 }
?>