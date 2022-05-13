<x-app-layout>        
    <div class="flex justify-center items-center">        
        <h1 class="uppercase text-4xl font-bold text-blue-900 my-4">{{ $user->name}}'s Profile</h1>        
    </div>
    <div class="grid sm:grid-cols-1 md:grid-cols-8 mt-10 pb-10">
        <div class="flex items-center justify-center sm:col-span-1  md:col-span-4 mt-2">
            <div class="flex items-center justify-center ml-10">                                    
                <div class="flex items-center justify-center">
                    <div class="image-wrapper">
                        @isset ($user->userImage)
                            <img id="picture" class="rounded-full w-28" src="{{ url('storage/' . $user->userImage->url) }}" alt="">
                        @else
                            <img id="picture" class="rounded-full w-28" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="">
                        @endisset
                    </div>
                    {{-- <img src="@if($user->userImage) {{ url('storage/' . $user->userImage->url) }} @else https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png @endif" alt="user image" class="rounded-full w-28"> --}}
                    <div class="ml-4">
                        {!! Form::model($user,['route'=>['updateavatar',$user],'autocomplete'=>'off','files'=>true,'method'=>'put']) !!}
                
                            {!! Form::hidden('user_id',auth()->user()->id) !!}
                
                            <div class="form-group">
                                {!! Form::label('file','Update image profile',['class'=>'text-lg font-bold py-5 text-center']) !!}
                                {!! Form::file('file',['class'=>'form-control-file block','accept'=>'image/*']) !!}
                            </div>            
                            
                            {!! Form::submit('Save',['class'=>'inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>                   
            </div>
        </div>
        <div class="md:flex items-center justify-center col-span-4 mx-4">            
            <x-auth-card class="rounded-3xl">
                <h1 class="text-lg font-bold text-center">Edit details</h1>  
                <x-slot name="logo">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </x-slot>
                @if (session('message1'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 my-2 rounded relative" role="alert">
                        <strong class="font-bold">Success</strong>
                        <span class="block sm:inline">{{session('message1')}}</span>
                    </div>
                @endif
                <form action="\updateprofile" method="POST" class="">            
                    @csrf
                    <input type="hidden" name="userid" value="{{$user->id}}">
                    <div>
                        <x-label for="name" :value="__('User Name')" />
        
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{Auth::user()->name}}" autofocus />
                    </div>                    
        
                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />
        
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$user->email}}" />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Save') }}
                        </x-button>
                    </div>
                </form>
            </x-auth-card>                                    
        </div>        
         
        <div class="hidden md:flex items-center justify-center col-span-4">
            <div class="flex items-center justify-center">                                    
                <p class="text-gray-600 text-sm mt-1">img</p>                        
            </div>
        </div>

        <div class="md:flex items-center justify-center col-span-4 mx-4">            
            <x-auth-card class="rounded-3xl">            
                <x-slot name="logo">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </x-slot>
                <div class="flex flex-col items-center">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />             
                    @if (session('message'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 my-2 rounded relative" role="alert">
                            <strong class="font-bold">Success</strong>
                            <span class="block sm:inline">{{session('message')}}</span>
                        </div>
                    @endif          
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-2 rounded relative" role="alert">
                            <strong class="font-bold">Success</strong>
                            <span class="block sm:inline">{{session('error')}}</span>
                        </div>
                    @endif         
                </div>  
                <h1 class="text-lg font-bold text-center">Edit password</h1>          
                <form action="\updatepw" method="POST" class=""> 
                    @csrf
                    <input type="hidden" name="userid" value="{{$user->id}}">
                    
                    <div class="mt-4">
                        <x-label for="old_password" :value="__('Old Password')" />
    
                        <x-input id="old_password" class="block mt-1 w-full"
                                        type="password"
                                        name="old_password"
                                        required />
                    </div>          
                    
                    <div class="mt-4">
                        <x-label for="password" :value="__('New Password')" />
    
                        <x-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                    </div>
    
                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm New Password')" />
    
                        <x-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required />
                    </div>
                    
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Save') }}
                        </x-button>
                    </div>            
                </form>
            </x-auth-card>
        </div>    
    </div>



    <script>
        //Cambiar imagen
            document.getElementById("file").addEventListener('change', cambiarImagen);
    
            function cambiarImagen(event){
                var file = event.target.files[0];
    
                var reader = new FileReader();
                reader.onload = (event) => {
                    document.getElementById("picture").setAttribute('src', event.target.result); 
                };
    
                reader.readAsDataURL(file);
            }
    </script>
</x-app-layout>