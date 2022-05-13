<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard for admin') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
                <div class="p-6">
                    <div class="flex items-top justify-center mt-2 mx-20">
                        <div class=" w-1/3 mx-4 flex justify-center">
                            <div class="p-10">
                                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                    <img class="h-auto w-auto flex bg-sky-400" src="/images/logos/Image.png" alt="img example">
                                    <div class="px-6 py-4 bg-white">
                                        <div class="font-bold text-xl mb-2 text-center ">
                                            <a href="{{ route('student.workout_plan.index') }}">Mi Rutina</a>
                                        </div>
                                        <p class="text-gray-700 text-base text-center">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                        <div class=" w-1/3 mx-4 flex justify-center">
                            <div class="p-10 self-start">
                                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                    <img class="h-auto w-auto flex bg-sky-400" src="/images/logos/Image.png" alt="img example">
                                    <div class="px-6 py-4 bg-white">
                                        <div class="font-bold text-xl mb-2 text-center ">
                                            <a href="{{ route('student.measurements.index') }}">Mis Medidas</a>
                                        </div>                                                              
                                        <p class="text-gray-700 text-base text-center">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                        <div class="w-1/3 mx-4 flex justify-center">
                            <div class="p-10">
                                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                    <img class="h-auto w-auto flex bg-sky-400" src="/images/logos/Image.png" alt="img example">
                                    <div class="px-6 py-4 bg-white">
                                        <div class="font-bold text-xl mb-2 text-center ">
                                            <a href="{{ route('student.food_plan.index') }}">Mi Plan Alimenticio</a>
                                        </div>
                                        <p class="text-gray-700 text-base text-center">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                
            
                </div>
            {{-- </div> --}}
        </div>
    </div>
</x-app-layout>