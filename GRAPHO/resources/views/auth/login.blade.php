<?php
session_start();
unset($_SESSION['email']);
?><title>{{ config('', 'GRAPHO') }}</title>
    <link rel="icon" href="{!!asset('images/grapho.jpg')!!}"/>
<style>
    html{
        background-color:#eaecee;
        font-family:sans-serif;
    }
    .container{
        background-color:white;
        margin-top:80px;
        margin-left:160px;
        width:1250px;
        height:600px;
        border-radius:6px;
       
        
     
    }
    .img{
        float:left;
        height:600px;
        width:650px;
        border-radius:5px 100px 100px 5px;
        padding-left:115px;
    }
    .part{
        float:right;
        padding-right:135px;
        margin:25px;
        font-family:sans-serif;
        margin-left:100px;
        
    }
    h3{
        margin-top:15px;
        text-align:center;
    }
    .input2{
        width:325px;
        padding-bottom:7px;
        padding-top:30px;
        background: transparent;
        border:none;
        border-bottom:1px solid #000000;
        opacity: 0.5;
       
    }
    .input2:focus{
        opacity: 1;
        outline: none;
    }
   .create{
    margin-top:25px;
    width:325px;
    padding:7px;
    border:none;
    background-color:lite grey;
    color:black;
    border-radius:6px;
   }
   .create:hover{
    background-color:black;
    color:white;
   }
   .txt{
    margin-top:15px;
    margin-left:75px;
    opacity: 0.7;
    font-size:13px;
   }
   .lo{
    margin-top:15px;
    opacity: 0.5;
    color:light blue;
    font-size:15px;
   }
   .lo:hover{
    opacity: 0.7;
   }
   a{
    color:light blue;
    text-decoration:none;
   }
   a:active{
    color:lightblue;
   }
    </style>
           <?php 
     $_SESSION['check']="0";
        ?>

        @if (session('status'))
            <div >
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            </div><img class="img" src="/images/loginimg.jpg"></div>
            <div class="container"><div class="part"><h3 >Login</h3><br>
            <x-jet-validation-errors class="mb-4" />
            <div style="margin-top:100px;">
            <div>
                <!-- <x-jet-label for="email" value="{{ __('Email') }}" /> -->
                <x-jet-input id="email" class="input2" placeholder="Email" type="email" name="email" :value="old('email')" autocomplete="on" required autofocus />
            </div>

           
            <div >
                <!-- <x-jet-label for="password" value="{{ __('Password') }}" /> -->
                <x-jet-input id="password" class="input2" placeholder="Password"  type="password" name="password" required autocomplete="current-password" />
            </div>

            <div style="margin-top:25px; opacity:0.5;">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Rememnber me') }}</span>
                </label>
            </div>

            <x-jet-button class="create" >
                    {{ __('Log in') }}
                </x-jet-button>

            <div class="lo">
                @if (Route::has('password.request'))
                    <a style="text-size:15;" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                </div>
                <div class="txt">Need to create an account? <a class="lo"  href="{{ route('register') }}">signup</a></div>
             

</div></div>
        </form>
    
