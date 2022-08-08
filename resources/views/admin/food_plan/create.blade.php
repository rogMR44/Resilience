<x-app-layout>
    <h1 class="text-center mt-4 text-2xl font-bold pt-2 pb-4">Registro de Medidas</h1>    
    <div class="">
        
        {!! Form::open(['route'=>'admin.a_food_plan.store']) !!}
                    
            
            {!! Form::hidden('student_id',$user_id) !!}
            
            @include('admin.food_plan.partials.form')
            
            {!! Form::submit('Guardar Comida',['class'=>'m-6 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) !!}
        {!! Form::close() !!}       
    </div>    
</x-app-layout>