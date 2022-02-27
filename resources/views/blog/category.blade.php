<x-app-layout>
    <div class="flex justify-center items-center">
        <h2 class="uppercase text-4xl font-bold text-blue-900 my-4">
            BLOG
        </h2>
    </div>
    
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8py-8">
        <h2 class="uppercase text-xl font-bold text-blue-900 my-4">
            OTHER CATEGORIES
        </h2>
        @foreach($categories as $category)
            <a href="{{ route('postscategory',$category)}}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{$category->name}}</a>
        @endforeach
    </div>

    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold my-4">Category {{ $category->name }} <h1>
            
            @foreach ($posts as $post)
                <x-card-post :post="$post"/>
            @endforeach

            <div class="mt-4 mb-4">
                {{$posts->links()}}
            </div>
    </div>
</x-app-layout>