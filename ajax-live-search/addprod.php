<?php
session_start();
?><html>
<head>
    <title>GRAPHO</title>
<link rel="icon" href="{!!asset('images/grapho.jpg')!!}"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<style>

.add{
    border-color:black;
    color:black;
    margin:13px;
    background-color:white;
    border:2px solid black;
    border-radius:6px;
    padding:5px;
}
.rem {
    border-color:black;
    color:black;
    border-radius:6px;
    background-color:white;
    border:2px solid black;
    padding:5px;
}
table{
    margin-left:25px;
    border:none;
    background-color:white;
    border:3px solid black;
    border-radius:20px;
    margin-left:-200px;
    padding-bottom:35px;
}
th{
    padding:10px;
    padding-left:40px;
}
td{
   padding:10px;
   padding-left:40px;
}
p{
    margin:20px;

}
.container{
 
}
.btn{
    margin:30px;
    border:3px solid black;
    border-radius:6px;
    padding:1px 5px 1px 5px;
}
input[type=text],input[type=date]{
    border:3px solid black;
    border-radius:6px;
    width:220px;
    padding:3px 8px 3px 8px;
    margin-left:15px;
}
body{
			background:url('./add1.jpeg');
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
</style>
</head>
<body>
<div class="rh">
	<div id=head><a href="http://127.0.0.1:8000/dashboard" class=logo>GRAPHO</a><a href="http://127.0.0.1:8000/user/profile" id="name"><?php  
	$a=$_REQUEST['customer'];
	echo $a;
	?></a></div>
<p><center><b  style="color:white;">This page is used to add the product details in your store records</b></center></p>
    
<div class="container">
   
    <form action="http://127.0.0.1:8000/alter.php" method="POST">
       
      
   
        <table  id="dynamicTable">  
            <tr>
                <th>Name</th>
                <th>Total no of products</th>
                <th>Price</th>
                <th>Product Quantity</th>
                <th>Exp date</th>
               
            </tr>
            <tr>  
                <td><input type="text" name="addname0" placeholder="Enter your product name" class="prod-name" /></td>  
                <input type="hidden" name="addid0" placeholder="Enter your product id" class="prod-id" />
                <td><input type="text" name="addqty0" placeholder="Total products to add" class="no-qty" /></td>  
                <td><input type="text" name="addprice0" placeholder="Enter MRP" class="price" /></td>  
                <td><input type="text" name="addqnt0" placeholder="Enter your quantity" class="qnt" /></td>  
                <td><input type="date" name="addexp0" placeholder="Enter current date" class="expdate" /></td>  
                <input type="hidden" value="0" name="key"/><input type="hidden" name="sl" value="0">
                <td style="text-align:center;"><button type="button" name="add" id="add" class="add">Add</button></td>  
            </tr>  
            <div class="un"><div>
        </table> 
        </div>
        
        <center><input type="submit" value="Save" class="btn"/></center>

    </form>

    <?php  
	$h=$_REQUEST['email'];
	$customer=$_REQUEST['customer'];
	list($w,$un)=explode('@',$h);
	$_SESSION['email']=$w;
	 ?>

<script type="text/javascript">
   
    var i = 0;
    var j = 1;
    $("#add").click(function(){
        
        ++i;
   
        $("#dynamicTable").append('<tr> <td><input type="text" name="addname'+i+'" placeholder="Enter your product name" class="prod-name" /></td> <input type="hidden" name="addid'+i+'" placeholder="Enter your product id" class="prod-id" /><td><input type="text" name="addqty'+i+'" placeholder="Total products to add" class="no-qty" /></td> <td><input type="text" name="addprice'+i+'" placeholder="Enter MRP" class="price" /></td> <td><input type="text" name="addqnt'+i+'" placeholder="Enter your quantity" class="qnt" /></td> <td><input type="date" name="addexp'+i+'" placeholder="Enter expirey date" class="exdate" /></td><td style="text-align:center;"><button type="button" id='+i+' class="rem">Remove</button></td></tr><input type="hidden" value='+i+' name="key">');
    });
   
    $(document).on('click', '.rem', function(){
        var m=this.id;
        $("#dynamicTable").append(' <input type="hidden" name="sl" value="1">');
        $(".un").append('<input type="hidden" name="re'+j+'" value='+m+'>');
        $(".un").append('<input type="hidden" name="h" value='+j+'>');
        $(this).parents('tr').remove();
        j++;
    });  
   
</script>
  



</body>
</html>