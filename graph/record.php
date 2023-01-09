<?php

$con  = mysqli_connect("localhost","root","","gp");
$table=$_SESSION['email'];
         $sql ="SELECT * FROM ".$table."bills ORDER BY date";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         $a=array();
         $month='0';
         $total='0';
         for($i=1;$i<=12;$i++){
        $a[$i]=0; 
        }
         while ($row = mysqli_fetch_array($result)) { 
            $temp=$row['date'] ;
            list($year,$month,$day)=explode('-',$temp);
            if($year==date("Y")){
            for($i=1;$i<=12;$i++){
                if($i==$month){
                    $a[$i]=$a[$i]+$row['totalprice'];
                }
            }

            }
        }
        for($j=1;$j<=12;$j++){
            if($a[$j]!=0){
                $date[]  = $j;
                $sales[] = $a[$j];
            }
        }
 
 
?>