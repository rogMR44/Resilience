<x-app-layout>
    <div class="flex flex-col items-center">
        <h1 class="text-xl font-bold mt-8">Mis Plan Alimenticio</h1>
    </div>
    <div class="sm:grid grid-cols-1 lg:grid-cols-2 mt-10">    
        <div class="ml-10">            
            <table class="self-center shadow-lg bg-white">
                <thead>
                    <tr>
                        <th class="border px-8 py-4">Comida</th>                    
                        <th class="border px-8 py-4">Descripcion</th>
                        <th class="border px-8 py-4">Hora</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($meals as $meal)
                        <tr>
                            <td class="border px-8 py-4">{{ $meal->name}}</td>                        
                            <td class="border px-8 py-4">{{ $meal->description}}</td>
                            <td class="border px-8 py-4">{{ $meal->meal_time}}</td>           
                        </tr>
                    @endforeach
                </tbody>
            </table>       
        </div>                                
        <div class="sm:ml-10 lg:mr-10">                     
            @isset ($student->userMealPlan)
                <img id="picture" src="{{ url('storage/' . $student->userMealPlan->url) }}" alt="">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2018/05/19/01/23/online-3412498_960_720.jpg" alt="">
            @endisset     
        </div>
    </div>
</x-app-layout>