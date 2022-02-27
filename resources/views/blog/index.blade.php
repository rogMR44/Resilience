<x-app-layout>
    <div class="flex justify-center items-center">
        <h2 class="uppercase text-4xl font-bold text-blue-900 my-4">
            BLOG
        </h2>
    </div>
    <div class="container">
        <h2 class="uppercase text-xl font-bold my-4 text-indigo-900">
            Filter by category
        </h2>
        @foreach($categories as $category)
            <a href="{{ route('postscategory',$category)}}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{$category->name}}</a>
        @endforeach
    </div>
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-3 @endif" style="background-image:url(@if ($post->image) {{ url('storage/' . $post->image->url) }} @else https://cdn.pixabay.com/photo/2018/05/19/01/23/online-3412498_960_720.jpg @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center">                        
                        <div>
                            @foreach($post->tags as $tag)
                                <a href="{{ route('poststag',$tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">{{$tag->name}}</a>
                            @endforeach
                        </div>

                        <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="{{route('postshow',$post)}}">
                                {{$post->name}}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>             
        <div class="my-6">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>