@props(['post'])
<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    @if ($post->image)
        <img class="w-full h-72 object-cover object-center" src="{{ url('storage/' . $post->image->url)}}" alt="">
    @else
    <img class="w-full h-72 object-cover object-center" src="https://cdn.pixabay.com/photo/2014/05/03/00/46/notebook-336634_960_720.jpg" alt="">
    @endif
<div class="px-6 py-4">
    <h1 class="font-bold text-xl mb-2">
        <a href="{{route('postshow',$post)}}">{{$post->name}}</a>
    </h1>
    <div class="text-gray-700 text-base">
        {{-- para que laravel tome los elementos como html en el formato correcto y no texto plano {!! content !!} --}}
        {!! $post->description !!} 
    </div>
    <div class="px-6 pt-4 pb-2">
        @foreach ($post->tags as $tag)
            <a href="{{route('poststag',$tag)}}" class="inline-block bg-{{$tag->color}}-500 bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-4">{{$tag->name}}</a>
        @endforeach
    </div>
</div>                
</article>