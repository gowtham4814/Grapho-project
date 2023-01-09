<?php 
session_start();
?>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>GRAPHO</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	<style>
	
::-webkit-scrollbar {
  width: 10px;

}


::-webkit-scrollbar-track {
  background: #f1f1f1; 


}
 

::-webkit-scrollbar-thumb {
  background: #888; 

}


::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
		#list,#bill,#search{
			border-color:black;
    color:black;
    margin:13px;
    background-color:white;
    border:2px solid black;
    border-radius:6px;
    padding:5px;
		}
		.table-responsive{
			padding-left:10px;
			padding-top:2px;
			border-radius:15px;
			width:1150px;
		
			border:2px solid black;
			
		}
		body{
			background:url('./1668173578510.jpg');
			background-size:100% 100%;
			object-fit:cover;
			background-attachment: fixed;
			backdrop-filter: blur(5px);
			height:100%;
			width:100%;
			}
		#update{
			background-color:white;
			
		}
		#result{
			background-color: white;
			border-radius:15px;
			margin-left:-8px;
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
	.logo{
        float:left;
        margin-left:25px;
        text-decoration:none;
        padding-right:20px;
        padding-left:20px;
        color:black;
        
    }
	h1{
		color:white;
	}
	</style>
	</head>
	<body>
	<div class="rh">
	<div id=head><a href="http://127.0.0.1:8000/dashboard" class=logo>GRAPHO</a><a href="http://127.0.0.1:8000/user/profile" id="name"><?php  
	$a=$_REQUEST['customer'];
	echo $a;
	?></a></div>
		<div class="container">
			<br />
			<br />
			<br />
		
			<div class="form-group">
			<?php  
	$h=$_REQUEST['email'];
	$customer=$_REQUEST['customer'];
	list($w,$un)=explode('@',$h);
	$_SESSION['email']=$w;
	 ?>
	 <h1>Sales Report</h1>
				<div class="input-group"><input type="month" id="search">
					<button id="list">products bill</button><input type="button" id="bill" value="over all bills">
					<input type="hidden" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
				</div>
			</div>
			<br />
			<div id="result"></div>
		</div>
		<div style="clear:both"></div>
		<br />
		
		<br />
		<br />
		<br />
	</body>
</html>


<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"salesreport1.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#list').click(function(){
		var search = $('#search').val();
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
$(document).ready(function(){
function load_data(query)
	{
		$.ajax({
			url:"salesreport2.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#bill').click(function(){
		var search = $('#search').val();
		$('#first').remove();
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
</script>




