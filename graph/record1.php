<?php

$con  = mysqli_connect("localhost","root","","gp");
$table=$_SESSION['email'];
         $sql ="SELECT * FROM ".$table."bills ORDER BY date";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         $temp1='0';
         $month='0';
         $total='0';
         while ($row = mysqli_fetch_array($result)) { 
            $temp1=$year;
            $temp=$row['date'] ;
            list($year,$month,$day)=explode('-',$temp);
            if($temp1==$year){
                $total=$row['totalprice']+$total;
            }
            else if($total!=0){
            $date1[]  = $temp1 ;
             $sales1[] = $total;
            $total='0';
            }
        }
        $date1[]  = $year ;
            $sales1[] = $total;
 
 

 
 
?>