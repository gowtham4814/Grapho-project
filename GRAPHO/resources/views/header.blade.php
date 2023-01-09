<title>{{ config('', 'GRAPHO') }}</title>
    <link rel="icon" href="{!!asset('images/grapho.jpg')!!}"/>
<div id=head><a href="/" class=logo>GRAPHO</a>

    <a class="child1" style="margin-left:27%;" href="https://graphographo9.wixsite.com/my-site-2">GUIDE  </a>   |
    <a class="child1" href="https://en.wikipedia.org/wiki/Retail">RETAIL  </a>   |
    <a class="child1" href="/aboutus">ABOUT US  </a>   |
    <a class="child1" href="mailto:graphographo9@gmail.com">CONTACT US</a></p>
    <a href="{{ route('login') }}" class="child" ><img  src="/images/account.jpeg" width='25px' height='25px'></a>
</div>

<hr class=header></hr>
<style>
    .header{
        opacity: 0.5;
        color:black;
    }
    #head{
        padding:8px;
        font-family:sans-serif;
        padding-top:17px;
        align:center;
        display: flex;
        opacity: 0.7;
        
    }
    .logo{
        float:left;
        margin-left:25px;
        text-decoration:none;
        padding-right:20px;
        padding-left:20px;
        color:black;
        
    }
    .child1{
        text-decoration:none;
        padding-right:20px;
        padding-left:20px;
        color:black;
    }
    
    .child{
       margin-left:450px;
    }

</style>