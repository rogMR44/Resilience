<x-app-layout>
    <div class="flex justify-center items-center">
        <h2 class="uppercase text-4xl font-bold text-blue-900 my-4">
            Guia de Ejercicios
        </h2>
    </div>
    <div class="container">
        <h2 class="uppercase text-xl font-bold my-4 text-indigo-900">
            Filtrar por categoria
        </h2>
        @foreach($categories as $category)
            <a href="{{ route('exercise_category',$category)}}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{$category->name}}</a>
        @endforeach
    </div>
    <div class="container py-4">
        <div class="">
            @foreach($exercises as $exercise)
                <article>                    
                    <div class="flex items-center justify-center bg-gray-300 mt-10">
                        {{-- <div class="flex items-center justify-center bg-white p-14 my-4 mx-4 rounded w-1/6">{{$exercise->id}}</div> --}}
                        <div class="bg-gray-700 p-3 my-4 mx-4 rounded w-full">
                            <div class="text-xl font-bold">
                                <div class="text-xl font-bold text-white">
                                    <a href="{{route('exercise_show', $exercise)}}">{{$exercise->name}}</a>
                                </div> 
                            </div>
                            <div class="my-2 text-white">
                               <h1>{!! $exercise->benefits !!}</h1>
                            </div>                           
                        </div>
                   </div>
                </article>                     
            @endforeach
        </div>              
    </div>
</x-app-layout>