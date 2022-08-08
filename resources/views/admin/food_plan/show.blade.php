<x-app-layout>      
    <div>
        <div class="flex flex-col items-center">
            <h1 class="text-xl font-bold mt-8">Plan alimenticio de {{$user_food_plan->name}}</h1>
            @if (session('info'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success</strong>
                    <span class="block sm:inline">{{session('info')}}</span>
                </div>
            @endif        
        </div>
        <div class="sm:grid grid-cols-1 lg:grid-cols-2">    
            <div class="ml-10">
                <div>
                    <div class="my-4">
                        <a href="{{route('admin.a_food_plan.createMeal',$user_id)}}">
                            <button class="px-6 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Agregar Comida                        
                            </button>
                        </a>                
                    </div>
                </div>
                <table class="self-center shadow-lg bg-white">
                    <thead>
                        <tr>
                            <th class="border px-8 py-4">Comida</th>                    
                            <th class="border px-8 py-4">Hora</th>
                            <th class="border px-8 py-4 col-span-2">Acciones</th>
                        </tr>
                    </thead>
        
                    <tbody>
                        @foreach ($meals as $meal)
                            <tr>
                                <td class="border px-8 py-4">{{ $meal->name}}</td>                        
                                <td class="border px-8 py-4">{{ $meal->meal_time}}</td>
                                <td class="flex px-2">                            
                                    <a href="{{ route('admin.a_food_plan.editMeal',$meal)}}">
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 m-1 rounded">
                                            Edit
                                        </button>
                                    </a>
                                    <form action="{{ route('admin.a_food_plan.deleteMeal',$meal)}}" method="POST">
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
            <div class="sm:ml-10 lg:mr-10">
                <div class="container xl">
                    {!! Form::model($user_food_plan,['route'=>['admin.a_food_plan.update',$user_food_plan],'autocomplete'=>'off','files'=>true,'method'=>'put']) !!}
        
                        {!! Form::hidden('user_id',auth()->user()->id) !!}
        
                        <div class="mt-6 mb-6 grid grid-cols-2 grid-flow-col gap-4">
                            <div class="image-wrapper">
                                {{-- isset verifica si esta definido --}}
                                @isset ($user_food_plan->userMealPlan)
                                    <img id="picture" src="{{ url('storage/' . $user_food_plan->userMealPlan->url) }}" alt="">
                                @else
                                    <img id="picture" src="https://cdn.pixabay.com/photo/2018/05/19/01/23/online-3412498_960_720.jpg" alt="">
                                @endisset
                            </div>
                            <div>
                                <div class="form-group">
                                    {!! Form::label('file','Image to show in post',['class'=>'block font-bold text-sm text-gray-700']) !!}
                                    {!! Form::file('file',['class'=>'form-control-file','accept'=>'image/*']) !!}
                                </div>
                                @error('file')
                                    <br>
                                    <span class="text-red-600">{{$message}}</span>
                                @enderror
                                <p>Instrucciones</p>
                                <p>Seleccionar la imagen que contenga el plan alimenticio del asesorado para ser guardada.</p>
                            </div> 
                        </div>                        
                        
                        {!! Form::submit('Guardar Plan',['class'=>'mt-6 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>  
    <script>
        //Cambiar imagen
            document.getElementById("file").addEventListener('change', cambiarImagen);
    
            function cambiarImagen(event){
                var file = event.target.files[0];
    
                var reader = new FileReader();
                reader.onload = (event) => {
                    document.getElementById("picture").setAttribute('src', event.target.result); 
                };
    
                reader.readAsDataURL(file);
            }
    </script>
</x-app-layout>