<x-app-layout>
    <h1 class="text-center mt-4 text-2xl font-bold pt-2 pb-4">Registro de Medidas</h1>
    @if (session('info'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
            <strong class="font-bold">Success</strong>
            <span class="block sm:inline">{{session('info')}}</span>
        </div>
    @endif
    <div class="grid grid-cols-2">
        {!!Form::model($measurement,['route'=>['student.measurements.update',$measurement],'method'=>'put'])!!}
            {!! Form::hidden('student_id',auth()->user()->id) !!}

            @include('student.measurements.partials.form')
            
            {!! Form::submit('Editar Medidas',['class'=>'m-6 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) !!}
        {!! Form::close() !!}
        <div class="items-center container m-6">
            <img src="/images/logos/Image.png" alt="">
            <p class="text-center">Image Description</p>
        </div>
    </div>    
</x-app-layout>