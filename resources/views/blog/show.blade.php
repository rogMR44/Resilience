<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">
           {{$post->name}} 
        </h1>
        <div class="tect-lg text-gray-500 mb-2">
            {!! $post->description !!}
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3  gap-6">
            {{-- contenido principal --}}
            <div class="lg:col-span-2">
                <figure>
                    @if ($post->image)
                        <img class="w-full h-80 object-cover object-center" src="{{url('storage/' . $post->image->url)}}">
                    @else
                        <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2014/05/03/00/46/notebook-336634_960_720.jpg">
                    @endif
                </figure>
                <div class="text-base text-gray-500 mt-4">
                    {!! $post->body !!}
                </div>
            </div>

            {{-- contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">
                    More in {{$post->category->name}}
                </h1>
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{route('postshow',$similar)}}">
                                @if ($similar->image)
                                    <img class="w-36 h-20 object-cover object-center" src="{{url('storage/' . $similar->image->url)}}">
                                @else
                                <img class="w-36 h-20 object-cover object-center" src="https://cdn.pixabay.com/photo/2014/05/03/00/46/notebook-336634_960_720.jpg">
                                @endif

                                <span class="w-40 h-25 ml-2 text-gray-600">{{$similar->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>
    </div>
</x-app-layout>