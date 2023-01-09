<?php
session_start();
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" href="../grapho.jpg"/>
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
			#search_text{
				border: 1px solid black;
				border-radius:15px;
				width:800px;
				height:20px;
				padding:15px;
			}
			#btn{
				border: 1px solid black;
				border-radius:15px;
				width:100px;
				height:32px;

			}
			#btn1{
				float:right;
				border: 1px solid black;
				border-radius:15px;
				width:150px;
				height:32px;
				margin-right:50px;
				padding:10px;
				margin-bottom:15px;
			}
			#btn:hover{
				color:white;
				background-color:black;
			}
			a{
				font-size:17px;
			}
			a:hover{
				text-decoration:none;
				color:black
			}
			#sub{
				border: 1px solid black;
				border-radius:15px;
				width:100px;
				height:32px;
			}
			#sub:hover{
				background-color:black;
				color:white;
			}
			.row{
				
				display:inline-block;
			}
			select{
				border: 1px solid black;
				border-radius:15px;
				width:200px;
				height:30px;
			}
			
			.del{
				border: 1px solid black;
				border-radius:15px;
				width:200px;
				height:20px;
				padding:15px;
				padding-right:50px;
			}
			tr{
				padding:50px;
			}
       
            .input{
                border-color:black;
    color:black;
    margin:13px;
    background-color:white;
    border:2px solid black;
    border-radius:6px;
    padding:5px;
            }
			.inputt{
				border-color:black;
    color:black;
    margin:13px;
    background-color:white;
    border:2px solid black;
    border-radius:6px;
    padding:5px;
			}
			body{
			background:url('./bill.jpeg');
			background-size:100% 100%;
			object-fit:cover;
			
			backdrop-filter: blur(3px);
			height:100%;
			width:100%;
			}
			#update{
				
				background-color:white;
				border-radius:15px;
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
        </style>
	</head>
	<body>
	<div class="rh">
	<div id=head><a href="http://127.0.0.1:8000/dashboard" class=logo>GRAPHO</a><a href="http://127.0.0.1:8000/user/profile" id="name"><?php  
	$a=$_REQUEST['customer'];
	echo $a;
	?></a></div>
		<form action="bill1.php" method="POST">
		<div class="container">
			<br />
			
			<div class="form-group" ><h2 style="color:white;">Billing</h2><br/>
		<form action="bill1.php" method="POST">
		<div class="container">
			<br />
		
			<div  id="all">
				<div class="input-group">
					<?php  
	$h=$_REQUEST['email'];
	$customer=$_REQUEST['customer'];
	list($w,$un)=explode('@',$h);
	$_SESSION['email']=$w;
	$_SESSION['aemail']=$_REQUEST['email'];
	 ?>
					<label><b style="font-color:black; color:white">Choose your product:</b>
<input list="browsers" class="input" autocomplete="off" id="search_text" name="myBrowser" /></label>
<datalist id="browsers">

</datalist><input type="button"  class="input" id="btn" value="search"><br/><br/>
			<input type="text" id="btn1" name="customername"><b style="float:right; margin-top:7px;margin-right:5px;">Customer Name</b>
			<table id="update" class="table table-striped"><thead><tr ><th>Id</th><th>Product Name</th><th>Total product</th></tr></thead></table>
					<input type="submit" class="input" id="btn" value="submit"/>
</form>		
		</div>
	</body>
</html>


<script>

$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch1.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#browsers').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});


var c=0;
var t;
$(document).ready(function(){
$('#btn').click(function(){
var a= $("#find").val();
var b;

var search = $("#search_text").val();
for(b=0;b<a;b++)
{
var temp=$('#m'+b+'').val();
	if(temp==search){
		var dta = $('#m'+b+'').attr('name');
	$("#update").append('<tr style="border-radius:15px;"><tr><td><input type="text" value="'+dta+'" class="input" name="id'+c+'"/></td><td><input type="text"  class="input" value="'+temp+'" name="prod'+c+'"/></td><td><input type="text" class="inputt" placeholder="Enter total products" name="ttl'+c+'"/></td><input type="hidden" name="sa" value='+c+'/></tr>');
document.getElementById("search_text").value='';
c++;

	
	}
	}
	});
});



</script>