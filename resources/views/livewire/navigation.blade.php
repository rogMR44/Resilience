<nav class="bg-blue-300" x-data="{open:false}">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-16">
        <!-- Mobile menu button-->
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">        
        <button x-on:click="open=true" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Heroicon name: outline/menu

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <!--
            Icon when menu is open.

            Heroicon name: outline/x

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      {{-- Menu when big --}}
      <div class="flex-1 flex items-center justify-center sm:justify-start">
            {{-- Logotipo --}}
            <a href="/" class="flex-shrink-0 flex items-center">
                <img class="block lg:hidden h-20 w-auto" src="/images/logos/Website_Ispeakable.png" alt="iSPEAKABLE">
                <img class="hidden lg:block h-32 w-auto" src="/images/logos/Website_Ispeakable.png" alt="iSPEAKABLE">
            </a>
            <div class="hidden sm:block items-center justify-center">
            {{-- Menu items --}}
                <div class="flex space-x-4">
                    {{-- <a href="{{ route('') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Teachers</a> --}}
                    <a href="{{ route('blog') }}" class="text-white hover:underline hover:text-red-400 block px-3 py-2 rounded-md font-bold text-xl">Blog</a>  
                    <a href="{{ route('teachers') }}" class="text-white hover:underline hover:text-red-400 block px-3 py-2 rounded-md font-bold text-xl">Teachers</a>  
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    @auth
                      @if (Auth::user()->hasRole('student'))                                          
                        <a href="{{ route('classplans') }}" class="text-white hover:underline hover:text-red-400 block px-3 py-2 rounded-md font-bold text-xl">Buy classes</a>                                     
                      @endif                                                                
                    @endauth
                </div>
            </div>
      </div>
      @auth
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">              
          @if (Auth::user()->hasRole('student'))
            <p class="text-white hover:underline hover:text-red-400 block px-3 py-2 rounded-md font-bold text-xl">Available credits: {{auth()->user()->num_classes}}</p>
          @endif          
                @if (Auth::user()->hasRole('admin'))
              
                  <div class="" x-data="{open:false}">
                    <div>
                      <button x-on:click="open = true" type="button" class="text-white hover:underline hover:text-red-400 flex text-sm rounded-md focus:outline-none" id="user-menu" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                          {{-- add user profile picture --}}
                          <label for="" class="text-white hover:underline hover:text-red-400 block px-3 py-2 rounded-md font-bold text-xl">Blog Administration</label>
                        </button>
                    </div>                    
                    <div x-show="open" x-on:click.away="open=false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">                      
                      <a href="{{ route('admin.posts.index')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Posts</a>
                      <a href="{{ route('admin.categories.index')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Categories</a>
                      <a href="{{ route('admin.tags.index')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Tags</a>
                    </div>
                  </div>                          
                @endif                              
              
                <!-- Profile dropdown -->
                <div class="ml-3 relative" x-data="{open:false}">
                  <div>
                    <button x-on:click="open = true" type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-expanded="false" aria-haspopup="true">
                    <span class="sr-only">Open user menu</span>
                      {{-- add user profile --}}
                      <img class="h-8 w-8 rounded-full" src="@if(auth()->user()->userImage) {{ url('storage/' . auth()->user()->userImage->url) }} @else https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png @endif" alt="Profile">
                    </button>
                  </div>

                <!--
                    Dropdown menu, show/hide based on menu state.

                    Entering: "transition ease-out duration-100"
                    From: "transform opacity-0 scale-95"
                    To: "transform opacity-100 scale-100"
                    Leaving: "transition ease-in duration-75"
                    From: "transform opacity-100 scale-100"
                    To: "transform opacity-0 scale-95"
                -->
                  <div x-show="open" x-on:click.away="open=false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                    @if (Auth::user()->hasRole('student'))             
                      <a href="{{ route('dashboard') }}" class="text-gray-700 hover:bg-gray-100 block px-4 py-2 rounded-md">Dashboard</a>
                      <a href="{{ route('student.profile') }}" class="text-gray-700 hover:bg-gray-100 block px-4 py-2 rounded-md">Profile</a>
                    @endif
                    @if (Auth::user()->hasRole('teacher'))
                      <a href="{{ route('dashboard') }}" class="text-gray-700 hover:bg-gray-100 block px-4 py-2 rounded-md">Dashboard</a>
                      <a href="{{ route('teacher.profile') }}" class="text-gray-700 hover:bg-gray-100 block px-4 py-2 rounded-md">Profile</a>    
                    @endif
                    @if (Auth::user()->hasRole('admin'))
                      <a href="{{ route('admin.products.index')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Product Administration</a>
                      <a href="{{ route('adminadd') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">User Administration</a>
                      <a href="{{ route ('admin.languages.index')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Language Administration</a>            
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <a href="route('logout')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" onclick="event.preventDefault();
                      this.closest('form').submit();">
                      Sign out
                      </a>
                     </form>
                </div>
              </div>
            </div>
            @else
            <div>
                <a href="{{ route('login') }}" class="text-white hover:underline hover:text-red-400 px-3 py-2 rounded-md font-bold text-xl">Login</a>
                <a href="{{ route('register') }}" class="text-white hover:underline hover:text-red-400 px-3 py-2 rounded-md font-bold text-xl">Register</a>
        </div>    
        @endauth
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" x-show="open" x-on:click.away="open=false">
    <div class="px-2 pt-2 pb-3 space-y-1">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="{{ route('dashboard') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
      <a href="{{ route('teachers') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Teachers</a>
      <a href="{{ route('blog') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Blog</a>      
    </div>
  </div>
</nav>