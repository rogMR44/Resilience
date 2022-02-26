<x-app-layout>            
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> 
            <a href="{{route('teacher.allclasses')}}">
                <button class="mb-6 px-6 py-2 bg-yellow-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Class Administration
                </button>
            </a>   
            <h1 class="text-xl font-bold py-5">Your classes that have been reserved</h1>        
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($list as $teacherClasses)
                    <article>                                                   
                            <div class="flex items-center justify-center">   
                                <div class="bg-white font-bold w-96">
                                    <div class="text-xl font-bold bg-red-400 text-white">
                                        <a class="ml-10" href="/classinfo/{{$teacherClasses->teacher_class_id}}">View class info</a>
                                    </div>
                                    <div class="grid sm:grid-cols-1 md:grid-cols-12">
                                        <div class="items-center justify-center col-span-3">
                                            <div class="flex items-center justify-center m-4">                                    
                                                <img class="w-5 h-5" src="/images/icons/date.png" alt="">
                                            </div>
                                        </div>
                                        <div class="items-center justify-center col-span-9">
                                            <div class="flex items-center justify-start m-4">                                    
                                                <p>Class date: {{$teacherClasses->class_date}}</p>
                                          </div>
                                        </div>                                            
    
                                        <div class="items-center justify-center col-span-3 ">
                                            <div class="flex items-center justify-center m-4">                                    
                                                <img class="w-5 h-5" src="/images/icons/clock.png" alt="">
                                            </div>
                                        </div>
                                        <div class="items-center justify-center col-span-9 ">
                                            <div class="flex items-center justify-start m-4">                                    
                                                <p>Class starts at: {{$teacherClasses->class_start}}</p>
                                            </div>
                                        </div>
    
                                        <div class="items-center justify-center col-span-3 ">
                                            <div class="flex items-center justify-center m-4">                                    
                                                <img class="w-5 h-5" src="/images/icons/clock.png" alt="">
                                            </div>
                                        </div>
                                        <div class="items-center justify-center col-span-9 ">
                                            <div class="flex items-center justify-start m-4">                                    
                                                <p>Class ends at: {{$teacherClasses->class_end}}</p>
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