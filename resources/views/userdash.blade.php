<x-app-layout>
    <div class="py-12">
        <div>
            @if (session('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 my-2 rounded relative" role="alert">
                    <strong class="font-bold">Success</strong>
                    <span class="block sm:inline">{{session('message')}}</span>
                </div>
            @endif 
        </div>        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-xl font-bold text-blue-900 py-5">Classes you have reserved</h1>      
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($list as $studentClass)
                    <article>
                        <div class="flex items-center justify-center">   
                            <div class="bg-white font-bold w-96">
                                <div class="text-xl font-bold bg-red-400 text-white">
                                    <a class="ml-10" href="/classinfo/{{$studentClass->teacher_class_id}}">View class info</a>
                                </div>
                                <div class="grid sm:grid-cols-1 md:grid-cols-12">
                                    <div class="items-center justify-center col-span-3">
                                        <div class="flex items-center justify-center m-4">                                    
                                            <img class="w-5 h-5" src="/images/icons/date.png" alt="">
                                        </div>
                                    </div>
                                    <div class="items-center justify-center col-span-9">
                                        <div class="flex items-center justify-start m-4">                                    
                                            <p>Class date: {{$studentClass->class_date}}</p>
                                        </div>
                                    </div>

                                    <div class="items-center justify-center col-span-3 ">
                                        <div class="flex items-center justify-center m-4">                                    
                                            <img class="w-5 h-5" src="/images/icons/user.png" alt="">
                                        </div>
                                    </div>
                                    <div class="items-center justify-center col-span-9 ">
                                        <div class="flex items-center justify-start m-4">                                    
                                            <p>Teacher: {{$studentClass->realname}}</p>
                                      </div>
                                    </div>

                                    <div class="items-center justify-center col-span-3 ">
                                        <div class="flex items-center justify-center m-4">                                    
                                            <img class="w-5 h-5" src="/images/icons/clock.png" alt="">
                                        </div>
                                    </div>
                                    <div class="items-center justify-center col-span-9 ">
                                        <div class="flex items-center justify-start m-4">                                    
                                            <p>Class starts at: {{$studentClass->class_start}}</p>
                                        </div>
                                    </div>

                                    <div class="items-center justify-center col-span-3 ">
                                        <div class="flex items-center justify-center m-4">                                    
                                            <img class="w-5 h-5" src="/images/icons/clock.png" alt="">
                                        </div>
                                    </div>
                                    <div class="items-center justify-center col-span-9 ">
                                        <div class="flex items-center justify-start m-4">                                    
                                            <p>Class ends at: {{$studentClass->class_end}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>                
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>