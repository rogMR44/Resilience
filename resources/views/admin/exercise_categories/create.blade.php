<x-app-layout>    
    <div class="flex flex-col items-center py-10">
        <h1 class="text-xl font-bold pt-2 pb-4">Crear Categoria</h1>
        <div class="container xl">
            {!! Form::open(['route'=>'admin.exercise_guide_category.store','autocomplete'=>'off','files'=>true]) !!}
            
                {!! Form::hidden('user_id',auth()->user()->id) !!}
            
                @include('admin.exercise_categories.partials.form')        
                
                {!! Form::submit('Create Category',['class'=>'mt-6 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) !!}
            {!! Form::close() !!}
        </div>
    </div>

</x-app-layout>