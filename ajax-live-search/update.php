<?php
session_start();
?><html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="icon" href="C:/xampp/htdocs/ajax-live-search/grapho.jpg"/>
		<title>GRAPHO</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	
		<style>
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
				width:1000px;
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
			
			#inp{
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
			background:url('./update.jpeg');
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
    .logo{
        float:left;
        margin-left:25px;
        text-decoration:none;
        padding-right:20px;
        padding-left:20px;
        color:black;
        
    }
	table{
		border-radius:15px;
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
		<form action="upd1.php" method="POST">
		<div class="container">
			<br />
			<br />
			<br />
			<div class="form-group"><h2  style="color:white;">Update</h2><br/>
				<div class="input-group">
					<?php  
	$h=$_REQUEST['email'];
	$customer=$_REQUEST['customer'];
	list($w,$un)=explode('@',$h);
	$_SESSION['email']=$w;
	 ?>
					<label>
<input list="browsers" autocomplete="off"id="search_text" name="myBrowser" /></label>
<datalist id="browsers">

</datalist><input type="button" id="btn" value="search"><br/><br/><br/><br/>
				<table id="update" class="table table-striped"><thead><tr><th>Product name</th><th>Need to change</th><th>Value</th></tr></thead></table><br/><br/>
					<input type="submit" id="sub"value="submit"/>
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
	if(temp==search){
		var dta = $('#m'+b+'').attr('name');
	$("#update").append('<tr><td>'+temp+'</td><td><select class="row" id='+c+' onchange="Re(this.id,this.value);" class="drp"><option>--select--</option><option id="a1" value="name">name</option><option id="a2" value="total products">total products</option><option id="a3" value="price">price</option><option id="a4" value="quantity">quantity</option><option id="a5" value="expirey date">expirey date</option></select></td><input type="hidden" value='+dta+' name="id'+c+'"><td class="row" id=l'+c+'></td></tr><input type="hidden" value='+c+' name="count">');
	
	document.getElementById("search_text").value='';
c++;

	
	}
	}
	});
});
var v;
var sel;
function Re(v,sel){
	
	$(document).ready(function(){
	$('.m'+v+'').remove();
	
	switch(sel){
case "name": 
	$('#l'+v+'').append("<input type='input' class=m"+v+" id='inp' name='name"+v+"' >");
	break;
case "total products": 
	$('#l'+v+'').append("<input type='input' class=m"+v+" id='inp' name='total"+v+"' >");
	break;
case "price": 
	$('#l'+v+'').append("<input type='input' class=m"+v+"  id='inp' name='price"+v+"' >");
	break;
case "quantity": 
	$('#l'+v+'').append("<input type='input' class=m"+v+" id='inp' name='quantity"+v+"' >");
	break;
case "expirey date": 
	$('#l'+v+'').append("<input type='date' class=m"+v+" id='inp' name='expirey"+v+"' >");
	break;
}

});
		}


</script>