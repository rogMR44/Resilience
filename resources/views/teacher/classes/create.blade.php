<x-app-layout>
    <div class="grid sm:grid-cols-1 md:grid-cols-2">
        <div class="hidden md:flex items-center justify-center">
            <div class="flex items-center justify-center">
                <img src="/images/front_page/teacherCreateEdit.png" alt="">
            </div>
        </div>
        <div class="items-center justify-center px-36">
            <h1 class="text-xl font-bold py-5 text-blue-900">Create a new class</h1>
            @if (session('info'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success</strong>
                <span class="block sm:inline">{{session('info')}}</span>
            </div>
            @endif
            {!!Form::open(['route'=>'teacher.class.create'])!!}

            <div class="form-group">
                {!!Form::label('class_date','Class date',['class'=>'block font-medium text-sm text-gray-700'])!!}
                {!!Form::date('class_date',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300
                focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'])!!}
                <div>
                    @error('class_date')
                    <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                {!!Form::label('class_start','Class start',['class'=>'block mt-4 font-medium text-sm text-gray-700'])!!}
                {!!Form::time('class_start',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300
                focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'])!!}
                <div>
                    @error('class_start')
                    <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                {!!Form::label('class_end','Class end',['class'=>'block mt-4 font-medium text-sm text-gray-700'])!!}
                {!!Form::time('class_end',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300
                focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'])!!}
                <div>
                    @error('class_end')
                    <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <button id="add-class-teacher"
                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-2 m-1 rounded">
                Add class
            </button>
            {{-- {!! Form::submit('Create class', ['class' => 'mt-6 px-4 py-2 bg-yellow-400 border border-transparent
            rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900
            focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out
            duration-150']) !!} --}}
            {!!Form::close()!!}
        </div>
    </div>
    <div>
        {{-- teacher.testing , esta ruta la use para testear el return--}}
        <form action="{{route('teacher.class.create')}}">
        <table class="self-center shadow-lg bg-white">
            <thead class="bg-red-400 text-white">
                <th class="border px-8 py-4">Class Date</th>
                <th class="border px-8 py-4">Class Start</th>
                <th class="border px-8 py-4">Class End</th>
                <th class="border px-8 py-4">Actions</th>
            </thead>
            <tbody id="table-class-teacher">
            </tbody>
        </table>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 m-1 rounded">
                Save all classes
            </button>
            {{-- Es muy importante que el botón quede fuera de la tabla para verlo mejor
            y al mismo tiempo antes del cierre de form para enviar la data --}}
        </form>
    </div>
</x-app-layout>
<script>
    $(function () {
        //Añadir registros al DOM en forma de table row y dentro sus respectivos inputs
        $('#add-class-teacher').parent().submit(function (e) {
            e.preventDefault();
            var template = '';
            //Cada input lleva un name en forma de arreglo con el valor del nombre del campo de la BD
            template += '<tr>'+
                    '<td class="border px-8 py-4"> <input type="text" name="class_date[]" value="'+$('#class_date').val()+'"></td>'+
                    '<td class="border px-8 py-4"> <input type="text" name="class_start[]" value="'+$('#class_start').val()+'"></td>'+
                    '<td class="border px-8 py-4"> <input type="text" name="class_end[]" value="'+$('#class_end').val()+'"></td>'+
                    '<td>'+
                        '<button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 m-1 rounded deletebtn">Delete</button>'+
                    '</td>'+
                '</tr>';
            //Se meten los datos al tbody
            $('#table-class-teacher').append(template);
            //Evento del botón, literal si lo quitas de aquí ya no se bindea con el button,
            //eso pasa por que primero se debe crear el elemento del dom y despues manipular sus eventos
            fila();
        });
        //Eliminar una fila
        function fila() {
            $('.deletebtn').click(function () {
                //btn>td>tr
                $(this).parent().parent().remove();
            })
        }
    })
</script>