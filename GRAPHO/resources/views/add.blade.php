<?php
session_start();
?><html>
<head>
    
<link rel="icon" href="{!!asset('images/grapho.jpg')!!}"/>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>






    <style>
        
        .add2{
           height:400px;
            width:400px;
            float:left;
            margin-left:15px;
            margin-top:50px;
            overflow:hidden;
            margin:0 auto; 
        }
        .add1{
            height:400px;
            width:400px;
          
        }
        .add2 img{
            transition:0.3s all ease-in-out;
        }
        .add2:hover  img{
            transform:scale(1.1);
        }
        .alt{
            margin-top:125px;
            margin-left:150px;
        }
        .word{
            margin-left:100px;
        }
        .words{
            margin-left:250px;
        }
      
		#loader {
            margin:300px;
            margin-left:700px;
		    border: 5px solid white;
    border-top: 4px solid black;
    border-radius: 89%;
    width: 120px;
    height: 120px;
			animation: spinloader 1s linear infinite;
           
		}

		#loader img {
            border: 2px solid black;
		    height: 112px;
			width: 120px;
            border-radius:100%;
			animation: spinlogo 1s linear infinite;
		}

		@keyframes spinloader {
			0% {
				transform: rotate(0deg);
			}

			100% {
				transform: rotate(360deg);
			}
            border-radius:100%;
		}

		@keyframes spinlogo {
			0% {
				transform: rotate(360deg);
			}

			100% {
				transform: rotate(0deg);
			}
            border-radius:100%;
		}
      
        
        </style>
        </head>
        <body style="background-color:black"  onload="myFunction()">
  <div id="loader" >
		<img src="
images/grapho.jpg" />
	</div>
    <div id="new" style="display:none;">
    <x-app-layout>
        <div class="alt" >
    <div class="add2"><form action="http://localhost/ajax-live-search/addprod.php" method="get">
        <input type="hidden"  name="customer" value= {{ Auth::user()->name }}>
        <input type="hidden"  name="email" value= {{ Auth::user()->email }}>
        <button type="submit" ><img src="/images/add.jpg" class="add1"/></button> </form></div>

        <div class="add2"><form action="http://localhost/ajax-live-search/update.php" method="get">
    <input type="hidden"  name="customer" value= {{ Auth::user()->name }}>
        <input type="hidden"  name="email" value= {{ Auth::user()->email }}>
        <button type="submit" > <img src="/images/update.jpg" class="add1"/></button></form>
    </div>
    <div class="add2"><form action="http://localhost/ajax-live-search/remove.php" method="get">
    <input type="hidden"  name="customer" value= {{ Auth::user()->name }}>
        <input type="hidden"  name="email" value= {{ Auth::user()->email }}>
        <button type="submit" > <img src="/images/remove.jpg" class="add1"/></button></form>
    </div>
</div><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<b class="word">
   
    <b class="words">Add product</b>
    <b class="words">Update product</b>
    <b class="words">Remove product</b>
    </b>
    <?php
    $_SESSION['check']="0";
    ?>
    </x-app-layout></div>
    <script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 250);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("new").style.display = "block";
 
}
</script>
    </body>
</html>