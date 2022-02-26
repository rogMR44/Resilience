<x-app-layout>
    <div class="flex justify-center items-center">
        <h2 class="uppercase text-4xl font-bold text-blue-900 my-4">
            ISPEAKABLE TEACHERS
        </h2>
    </div>
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8py-8">
        <h2 class="uppercase text-xl text-blue-900 font-bold my-4">
            View teachers by language
        </h2>
            <a href="{{ route('teachers')}}" class="inline-block bg-yellow-400 rounded-full px-3 py-1 text-sm text-white mr-2">All</a>
        @foreach($languages1 as $language)
            <a href="{{ route('teacherlanguage',$language)}}" class="inline-block bg-{{$language->color}}-500 rounded-full px-3 py-1 text-sm text-white mr-2">{{$language->name}}</a>
        @endforeach
    </div>
    <div class="container">
        @foreach ($teachers as $teacher)
            <article>
                <div class="flex items-center justify-center bg-blue-200 mx-0 mt-10 md:mx-16 lg:mx-28 rounded-xl">
                    <div class="image-wrapper">
                        <img class="rounded-full w-40 h-40 py-2 px-2 mr-10" src="@if($teacher->userImage) {{ url('storage/' . $teacher->userImage->url) }} @else https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png @endif" alt="user avatar">
                    </div>
                    <div class="bg-blue-500 p-3 my-4 mr-4 w-full rounded-xl">
                        <div class="text-xl font-bold  text-white">
                            <a href="{{route('teachershow', $teacher)}}">{{$teacher->realname}}</a>
                        </div>
                        <div class="my-2">                            
                            @foreach ($teacher->languages as $language)
                                <a href="{{ route('teacherlanguage',$language)}}"  class="inline-block px-3 h-6 bg-{{$language->color}}-600 text-white rounded-full">{{$language->name}}</a>                          
                            @endforeach
                       </div>
                       <div class="text-sm  text-white">
                           {!! $teacher->introduction !!}
                       </div>
                    </div>
               </div>                
            </article>
        @endforeach
    </div>
    <div class="my-6 mx-10">
        {{$teachers->links()}}
    </div>
</x-app-layout>