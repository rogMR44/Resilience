<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar usuario') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
            <h1 class="text-xl font-bold py-5 text-center">Edit user information</h1>
            <form action="\updateuser" method="POST" class="px-96">            
            @csrf
            <input type="hidden" name="userid" value="{{$Info->id}}">
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$Info->name}}" autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$Info->email}}" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Save') }}
                </x-button>
            </div>
        </form>
    </div>

    <div class="pt-5 pb-12">  
        <h1 class="text-xl font-bold text-center">Edit password</h1>          
        <form action="\updateuserpw" method="POST" class="px-96"> 
            @csrf
            <input type="hidden" name="userid" value="{{$Info->id}}">
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

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
    </div>    
</x-app-layout>