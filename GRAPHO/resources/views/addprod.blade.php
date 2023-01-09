<?php
session_start();
?><html>
<head>
    
<link rel="icon" href="{!!asset('images/grapho.jpg')!!}"/>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>




</head>
<body>

  
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
    border:3px solid black;
    border-radius:20px;
    margin:10px;
}
.btn{
    margin:30px;
    border:3px solid black;
    border-radius:6px;
    padding:1px 5px 1px 5px;
}
</style>
    

<p><center><b>This page is used to add the product details in your store records</b></center></p>
    
<div class="container">
   
    <form action="alterphp" method="POST">
        @csrf
      
   
        <table class="table table-bordered" id="dynamicTable">  
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