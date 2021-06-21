<nav id="header" class="fixed w-full z-30 top-0 text-white">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2 mt-1 mb-1">
        <div class="pl-4 flex items-center">
            <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="{{ route('dashboard') }}">
                <img class="block lg:hidden h-8 w-auto" src="{{ asset('Foto/loghi/logo_small_icon_whiteandyellow.png') }}">
                <img class="hidden lg:block h-8 w-auto" src="{{ asset('Foto/loghi/logo_small.png') }}">
            </a>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
                @if (Route::has('login'))
                    <li class="mr-3">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm underline text-black">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm underline text-black">Log in</a>
                        </li>
                        
                            @if (Route::has('register'))
                                <li class="mr-3">
                                <a href="{{ route('register') }}" class="ml-4 text-sm underline text-black">Register</a>
                            @endif
                        @endauth
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
</nav>