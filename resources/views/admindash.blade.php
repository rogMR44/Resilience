<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard for admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
                <div class="p-6">
                    <div class="flex items-top justify-center mt-2 mx-20">
                        <div class=" w-1/3 mx-4 justify-center bg-gray-200">                        
                            <p class="text-black font-black text-xl text-center mb-4">
                                Administracion de Blog
                            </p>
                            <a href="{{ route('admin.posts.index')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-300" role="menuitem">Posts</a>
                            <a href="{{ route('admin.categories.index')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-300" role="menuitem">Categorias</a>
                            <a href="{{ route('admin.tags.index')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-300" role="menuitem">Etiquetas</a>
                        </div>
            
                        <div class=" w-1/3 mx-4 justify-cente bg-gray-200">                        
                            <p class="text-black font-black text-xl text-center mb-4">
                                Administracion de Guia de Ejercicios
                            </p>
                            <a href="{{ route('admin.exercise_guide.index')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-300" role="menuitem">Ejercicios</a>
                            <a href="{{ route('admin.exercise_guide_category.index')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-300" role="menuitem">Categorias</a>
                        </div>
            
                        <div class=" w-1/3 mx-4 justify-center bg-gray-200">                        
                            <p class="text-black font-black text-xl text-center mb-4">
                                Administracion de Usuarios
                            </p>
                            <a href="{{ route('admin.users.index')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Usuarios</a>                     
                            <a href="{{ route('admin_user_dash')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-300" role="menuitem">Planes</a>                         
                        </div>
                    </div>                
            
                </div>
            {{-- </div> --}}
        </div>
    </div>
</x-app-layout>