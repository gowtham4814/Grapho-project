<?php
session_start();
?><html>
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
			    #head{
        padding:8px;
        font-family:sans-serif;
        padding-top:25px;
		padding-bottom:20px;
        align:center;
       
        opacity: 0.7;
		background-color:#F0FFFF;
        
    }
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
			body{
			background:url('./remove.jpeg');
			background-size:100% 100%;
			object-fit:cover;
			backdrop-filter: blur(3px);
			height:96%;
			width:98%;
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
		width:102%;
        font-family:sans-serif;
        padding-top:25px;
		padding-bottom:20px;
        align:center;
		padding-bottom:50px;
        opacity: 0.7;
		background-color:#F0FFFF;
        
    }
	th{
		background-color:white;
	}
			</style>
	</head>
	<body style="background-color:white;">
	<div class="rh">
	<div id=head><a href="http://127.0.0.1:8000/dashboard" class=logo>GRAPHO</a><a href="http://127.0.0.1:8000/user/profile" id="name"><?php  
	$a=$_REQUEST['customer'];
	echo $a;
	?></a></div>
		<form action="rem1.php" method="POST">
		<div class="container">
			<br />
			<br />
			<br />
			<div class="form-group"><h2  style="color:white;">Remove</h2><br/>
		<form action="rem1.php" method="POST">
		<div class="container">
			<br />
			<br />
			<?php  
	$h=$_REQUEST['email'];
	$customer=$_REQUEST['customer'];
	list($w,$un)=explode('@',$h);
	$_SESSION['email']=$w;
	 ?>
			<div class="form-group">
				<div class="input-group">
					
<input list="browsers" id="search_text" autocomplete="off" name="myBrowser" />
<datalist id="browsers">

</datalist><input type="button" id="btn" value="search"><br /><br />
				<table id="update" class="table table-striped"><thead><tr><th>Id</th><th>Product Name</th></tr></thead></table>
					<input type="submit" id="btn" value="submit"/>
</form>		
	</body>
</html>


<script>

$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch.php",
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

var dta = $('#m'+b+'').attr('name');
	$("#update").append('<tr><td><input type="text" class="del" value="'+dta+'" /></td><td><input type="text" value="'+temp+'" name=rem'+c+' class="del"><input type="hidden" name="find" value='+c+'></td></tr>');
document.getElementById("search_text").value='';
c++;
// $('.del').prop('disabled',true);
	

	}
	});

   
});



</script>







