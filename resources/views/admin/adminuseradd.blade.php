<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar nuevo usuario') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <h1 class="text-xl font-bold py-5 text-center">Add a teacher</h1>
        <form action="\adduser" method="POST" class="px-96"> 
            @if(Session::get('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success</strong>
                    <span class="block sm:inline">User created successfully.</span>
                </div>
            @endif
            @if(Session::get('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error</strong>
                    <span class="block sm:inline">Something went wrong while creating the user.</span>                    
                </div>
            @endif
            @csrf
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
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
                    {{ __('Register') }}
                </x-button>
            </div>            
        </form>
    </div>

    <div class="flex flex-col items-center py-10">
        <h1 class="text-xl font-bold py-5">Users</h1>
        @if (session('info'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success</strong>
                <span class="block sm:inline">{{session('info')}}</span>
            </div>
        @endif
        <table class="self-center shadow-lg bg-white">
            <thead>
                <th class="border px-8 py-4">Name</th>
                <th class="border px-8 py-4">Email</th>
                <th class="border px-8 py-4">User Type</th>
                <th class="border px-8 py-4">Actions</th>
            </thead>
            <tbody>
                @foreach($list as $item)
                <tr>
                    <td class="border px-8 py-4">{{$item->name}}</td>
                    <td class="border px-8 py-4">{{$item->email}}</td>  
                    <td class="border px-8 py-4">{{$item->display_name}}</td>                    
                    <td>
                        <a href="/edit/{{$item->id}}">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 m-1 rounded">
                                Editar
                            </button>
                        </a>
                        <a href="/delete/{{$item->id}}">
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 m-1 rounded">
                                Eliminar
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>