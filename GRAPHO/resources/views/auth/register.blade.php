<title>{{ config('', 'GRAPHO') }}</title>
    <link rel="icon" href="{!!asset('images/grapho.jpg')!!}"/>
    <style>
    html{
        background-color:#eaecee;
        font-family:sans-serif;
    }
    .container{
        background-color:white;
        margin-top:80px;
        margin-left:120px;
        width:1250px;
        height:600px;
        border-radius:6px;
        display:flex;
        
     
    }
    .img{

        height:600px;
        width:650px;
        border-radius: 100px 5px 5px 100px;
    }
    .part{
        
        padding-right:195px;
        margin:25px;
        font-family:sans-serif;
        margin-left:100px;
        
    }
    h3{
        margin-top:15px;
        padding-left:117px;
        text-align:center;
    }
    .input1{
        width:325px;
        padding-bottom:7px;
        padding-top:30px;
        background: transparent;
        border:none;
        border-bottom:1px solid #000000;
        opacity: 0.5;
        text-transform:capitalize;
    }
    .input1:focus{
        opacity: 1;
        outline: none;
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
    opacity: 0.5;
    color:blue;
    font-size:15px;
   }
   .lo:hover{
    opacity:0.7;
   }
   a{
    color:light blue;
    text-decoration:none;
   }
    </style>
    <x-jet-authentication-card>


        

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="container"><div class="part"><h3>Create an account</h3>
            <div>
                <x-jet-input id="name" autocomplete="off" class="input1" placeholder="Name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <input type="text" autocomplete="off" class="input1" name="mobileno" placeholder="Mobile no"/><br>
            <input type="text" autocomplete="off" class="input1" name="sector" placeholder="Your sector"/><br>
            <input type="text" autocomplete="off" class="input1" name="city" placeholder="City"/><br>

            <div class="mt-4">
                <x-jet-input id="email"  autocomplete="off" class="input2" placeholder="Email" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-input id="password"   class="input1" placeholder="Password" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-input id="password_confirmation" placeholder="Re-enter Password"  class="input1" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

           

                <x-jet-button class="create">
                    {{ __('Create account') }}
                </x-jet-button>
            <div class="txt">Already have an account! <a class="lo" href="/login">Login</a></div> <br/><x-jet-validation-errors class="mb-4" /></div>
           
        <img style="float:right;" class="img" src="/images/loginimg.jpg"></div>  </div>
        </form>
    </x-jet-authentication-card>

