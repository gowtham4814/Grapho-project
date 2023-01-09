
    <title>{{ config('', 'GRAPHO') }}</title>
    <link rel="icon" href="{!!asset('images/grapho.jpg')!!}"/>
<style>
.all{
    background-color:rgba(200,200,200,0.2);
}
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
    background-color:white;
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
   margin-left:525px;
}
.drop1{
    float:right;
    margin-left:1250px;
    background-color:white;

}

</style>
 <div class="all">
<div id=head><a href="/" class=logo>GRAPHO</a>




<hr class=header></hr>
                <!-- Settings Dropdown -->
                <div class="drop1">
                    <x-jet-dropdown class="drop" align="right" width="48">
                        <x-slot name="trigger">
                          
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>       
</div>
</div>