
      <?php
    session_start();
    ?>
    <head>
    <script>src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
      <title>{{ config('', 'GRAPHO') }}</title>
    <link rel="icon" href="{!!asset('images/grapho.jpg')!!}"/>
    <body onclick="auto();">
    <x-app-layout>
 
    <style>
        #a{
            font-size:19px;
            opacity: 1.5;
            margin-top:20px;
            color:black;
        }
        #b{
            font-size:20px;
            margin-right:60px;
            margin-top:20px;
        }
        #d{
            font-size:20px;
       
            margin-top:34px;
        }
        #c{
           
            font-size:20px;
            margin-right:300px;
            margin-top:18px;
      
        }
        .tl button{
            margin:20px;
            margin-right:80px;
            font-size:18px;
            margin-top:40px;
            border:none;
        }
        .tp:hover{
            border-bottom:2px solid #000000; 
            border-radius:2px;
        }
        .right button:hover{
            border-bottom:2px solid #ffffff; 
            border-radius:2px;
        }
        .right input:hover{
            border-bottom:2px solid #ffffff; 
            border-radius:2px;
        }
      .tl{
        font-family:sans-serif;
        font-family:cursive;
      } 
      .ad{
            float:right;
            height:694px;
            width:1%;
            background-color:black;
        }
        .right{
            float:left;
            background:url('images/bg1.jpg');
            height:694px;
            width:49%;
            background-size:800px 720px;
        }
        .left{
            float:left;
            background-color:white;
            height:694px;
            width:50%;
        }
        .txt{
            margin-top:175px;
            margin-left:75px;
            margin-right:180px;
          
        }
        .agree{
            margin-top:250px;
            margin-left:150px;
            
            padding:15px 20px 15px 20px;
            background-color:black;
            color:white; 
            border-color:black;
        }

        #announcement{
            margin-left:75px;
            width:400px;
            padding:20px;
            border:2px solid black;
        }
    
    </style>
    <div class="tl">
    <div class="left">
    <?php 
    if(isset($_REQUEST['cusemail'])){
    $_SESSION['check']++;
    }
    ?>
    <?php if( $_SESSION['check']==0):?>
      <input type="hidden" id="check" value="0"/>
      <?php endif; ?>
        
        
       
    <form name="form1" method="get" id="auto" action="/dashboard" >
<input type="hidden" name="cusemail" value={{ Auth::user()->email }}> </form>
      


    <a href="/product"><button  style="float:right;" id="a"class="tp">Add & Update</button></a>
    <form action="http://localhost/ajax-live-search/bill.php" method="get">
        <input type="hidden"  name="customer" value= {{ Auth::user()->name }}>
        <input type="hidden"  name="email" value= {{ Auth::user()->email }}>
   <input type="submit" value="Billing"  style="float:right;" id="b" class="tp"/>
    </form>
    <div class="txt">
    <h1 style="font-size:40px; margin-bottom:10px;" ><strong>GRAPHO</strong></h1>
    <h4 style="font-size:20px;  line-height:2;" >We are glad to serve you, {{ Auth::user()->name }}. This is a web application which is used for 
    Billing, Sales analyse and to predict and analyze future growth of your store.</h4>
    
    </div><button onclick="Data();" style="margin-left: 75px;"class="agree">Announcements</button> 
    <div id="announcement"><marquee scrollamount="3/" direction="down"><?php
    if(isset($_REQUEST['cusemail'])){
    	$h=$_REQUEST['cusemail'];
        list($w,$un)=explode('@',$h);
        $connect = mysqli_connect("localhost", "root", "", "gp");
        $query = "
	SELECT * FROM ".$w."products
	WHERE total='0'
	";
    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_array($result))
	{
        echo "".$row["name"]." is out of stock<br/>";
    }
    ?><br/>
    <?php
    $query = "
	SELECT * FROM ".$w."products
	";
    $result = mysqli_query($connect, $query);
    while($val = mysqli_fetch_array($result))
	{
        if($val["total"]<='5' && $val["total"]!='0')
        echo "".$val["name"]." is going to be out of stock<br/>" ;
    }
    ?><br/>

    <?php
    $tdy=date("Y-m-d");
    $query = "
	SELECT * FROM ".$w."products
	";
    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_array($result))
	{
       
        if($row['updated']==$tdy){
        echo "".$row["name"]." is Expired today<br/>" ;
        }
    }
}
    ?> </marquee></div></div>

<div class="right" >
<form action="http://localhost/ajax-live-search/salesreport.php" method="get">
        <input type="hidden"  name="customer" value= {{ Auth::user()->name }}>
        <input type="hidden"  name="email" value= {{ Auth::user()->email }}>
   <input type="submit" value="Sales Record"  style="float:left; color:white; margin-left:70px;" id="d" /></form>
 <form action="http://localhost/graph/index.php" method="get">
        <input type="hidden"  name="customer" value= {{ Auth::user()->name }}>
        <input type="hidden"  name="email" value= {{ Auth::user()->email }}>
   <input type="submit" value="Records"  style="float:left; color:white; margin-left:70px;" id="c" /></form>
   
</div>
<div class="ad"></div>
    </div>
 
</x-app-layout>
<script>
var a=document.getElementById("check").value;
    if(a==0){
        document.getElementById("auto").submit();
    }
function Data(){
    document.getElementById("auto").submit();
}

</script>
 </body>
