<x-app-layout>
    <div class="grid sm:grid-cols-1 md:grid-cols-2">
        <div class="hidden md:flex items-center justify-center">
            <div class="flex items-center justify-center m-4">                                    
                    <img src="/images/auth/sittingChair.png" alt="chair">                   
            </div>
        </div>
        <div class="m-28 md:flex items-center justify-center">
                <x-auth-card class="rounded-3xl p-20">
                    {{-- <x-slot name="logo">
                        <a href="/">
                            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                        </a>
                    </x-slot> --}}
            
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
            
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
            
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
            
                        <!-- Email Address -->
                        <div>
                            <x-label for="email" :value="__('Email')" />
            
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
            
                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />
            
                            <x-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />
                        </div>
            
                        <!-- Remember Me -->
                        <div class="block mt-4 justify-self-start">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
            
                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-red-400" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                            <x-button class="ml-4">
                                {{ __('Login') }}
                            </x-button>
                        </div>        
                    </form>
                </x-auth-card>                   
        </div>
    </div>


    
</x-app-layout>
