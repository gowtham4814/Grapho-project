<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GRAPHO</title> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
        <style>
            	.logo{
        float:left;
        margin-left:25px;
        text-decoration:none;
        padding-right:20px;
        padding-left:20px;
        color:black;
        
    }
            #chart1{
                margin-left:110px;
                float:left;
                width:680px;
                background-color:rgba(244,244,244,0.9);
                padding:35px;
                border-radius:15px;
            }
            #chart2{
                float:right;
                width:700px;
                margin-right:-550px;
                background-color:rgba(244,244,244,0.9);
                padding:35px;
                padding-bottom:25px;
                border-radius:15px;

            }
            .l{
                width:100%;
                border: 0.2px solid white;
            }
            #chart3{
                margin-left:110px;
                float:left;
                width:680px;
                background-color:rgba(244,244,244,0.9);
                padding:35px;
                border-radius:15px;

            }
            #chart4{
                float:right;
                width:700px;
                margin-right:125px;
                background-color:rgba(244,244,244,0.9);
                padding:35px;
                padding-bottom:25px;
                border-radius:15px;

            }
            body{
			background:url('./graph.jpg');
			background-size:100% 100%;
			object-fit:cover;
			background-attachment: fixed;
			
			
			}
            #name{
			float:right;
			margin-right:35px;
			color:grey

		}
		#name:hover{
			color:black;
		}
		#head{
        padding:8px;
		width:100%;
        font-family:sans-serif;
        padding-top:25px;
		padding-bottom:20px;
        align:center;
		padding-bottom:50px;
        opacity: 0.7;
		background-color:#F0FFFF;
        
    }
    .t{
        width:60%;
        height:20%;
        text-align:center;
    }
    .p{
        display:flex;
    }
        </style>
    </head>
    <body>
    <div class="rh">
	<div id=head><a href="http://127.0.0.1:8000/dashboard" class=logo>GRAPHO</a><a href="http://127.0.0.1:8000/user/profile" id="name"><?php  
	$a=$_REQUEST['customer'];
	echo $a;
	?></a></div>
    <?php  
	$h=$_REQUEST['email'];
	$customer=$_REQUEST['customer'];
	list($w,$un)=explode('@',$h);
	$_SESSION['email']=$w;
	 ?>

        <div class="t">
            <h2 class="h"  style="width:100%;color:white;">Product Sales Reports </h2></div>
            <div  class="a"><div class="l"></div><br/><br/><div class="t"><p id="chart1">Total amount of sale per month<canvas  id="chartjs_bar"></canvas></p>
            <p id="chart2">Total sale per month<canvas class="barchart" id="chartjs_bar2"></canvas></p></div>
            <div ><p id="chart3" style="text-align:center;">Total amount of sale per year<canvas  id="chartjs_bar1"></canvas></p>
            <p id="chart4" style="text-align:center;">Total sale per year<canvas  id="chartjs_bar3"></canvas></p></div>

        </div>    
    </body>
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
                    $a[$i]=$a[$i]+$row['totalproducts'];
                }
            }

            }
        }
        for($j=1;$j<=12;$j++){
            if($a[$j]!=0){
                $date2[]  = $j;
                $sales2[] = $a[$j];
            }
        }
 
 
?>

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
                $total=$row['totalproducts']+$total;
            }
            else if($total!=0){
            $date3[]  = $temp1 ;
             $sales3[] = $total;
            $total='0';
            }
        }
        $date3[]  = $year ;
            $sales3[] = $total;
 
 

 
 
?>
  <script src="js/jquery.js"></script>
  <script src="js/Chart.min.js"></script>
<script type="text/javascript">
 
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($date); ?>,
                        datasets: [{
                            backgroundColor: [
                           
                            <?php for($j=0;$j<='20';$j++):?>
                                "<?php 
                                
                                    $rand =str_pad(dechex(rand(0x000000,0xFFFFFF)),6,0,STR_PAD_LEFT);
                                    echo('#'.$rand);
                                     ?>",
                            <?php endfor;?>
                           
                            ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });

                var ctx = document.getElementById("chartjs_bar1").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($date1); ?>,
                        datasets: [{
                            backgroundColor: [
                                <?php for($j=0;$j<='20';$j++):?>
                                "<?php 
                                
                                    $rand =str_pad(dechex(rand(0x000000,0xFFFFFF)),6,0,STR_PAD_LEFT);
                                    echo('#'.$rand);
                                     ?>",
                            <?php endfor;?>
                            ],
                            data:<?php echo json_encode($sales1); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                
                });

                var ctx = document.getElementById("chartjs_bar2").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($date2); ?>,
                        datasets: [{
                            backgroundColor: [
                                <?php for($j=0;$j<='20';$j++):?>
                                "<?php 
                                
                                    $rand =str_pad(dechex(rand(0x000000,0xFFFFFF)),6,0,STR_PAD_LEFT);
                                    echo('#'.$rand);
                                     ?>",
                            <?php endfor;?>
                            ],
                            data:<?php echo json_encode($sales2); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                
                });

                var ctx = document.getElementById("chartjs_bar3").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($date3); ?>,
                        datasets: [{
                            backgroundColor: [
                                <?php for($j=0;$j<='20';$j++):?>
                                "<?php 
                                
                                    $rand =str_pad(dechex(rand(0x000000,0xFFFFFF)),6,0,STR_PAD_LEFT);
                                    echo('#'.$rand);
                                     ?>",
                            <?php endfor;?>
                            ],
                            data:<?php echo json_encode($sales3); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                
                });
    </script>
</html>