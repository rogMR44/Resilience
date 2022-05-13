<x-app-layout>
    <div class="flex flex-col items-center">
        <h1 class="text-xl font-bold">Categorias de Ejercicios</h1>
        @if (session('info'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success</strong>
                <span class="block sm:inline">{{session('info')}}</span>
            </div>
        @endif
        <div>
            <div class="flex items-center justify-start mt-4">
                <a href="{{route('admin.exercise_guide_category.create')}}">
                    <button class="px-6 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Crear Categoria de Ejercicio
                    </button>
                </a>
            </div>
        </div>
    </div>   
    <div class="flex flex-col items-center">        
        <div class="mt-4 flex items-center">
            <table class="shadow-lg bg-white">
                <thead>
                    <tr>
                        <th class="border px-8 py-4">ID</th>
                        <th class="border px-8 py-4">Slug</th>
                        <th class="border px-8 py-4 col-span-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exercise_categories as $exercise_category)
                        <tr>
                            <td class="border px-8 py-4">{{$exercise_category->id}}</td>
                            <td class="border px-8 py-4">{{$exercise_category->name}}</td>
                            <td>
                                <a href="{{ route('admin.exercise_guide_category.edit',$exercise_category)}}">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 m-1 rounded">
                                        Edit
                                    </button>
                                </a>
                            </td>
                            <td>                        
                                <form class="form-post-admin" action="{{ route('admin.exercise_guide_category.destroy',$exercise_category)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 m-1 rounded">
                                        Delete
                                    </button>
                                </form>                        
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>