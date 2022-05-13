<div class="m-6 grid grid-cols-3 gap-4 ">
    <div class="form-group">
        {!!Form::label('cuello','Cuello',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('cuello',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('pecho','Pecho',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('pecho',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('hombro','Hombro',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('hombro',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('bicep_derecho_r','Bicep Derecho Relajado',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('bicep_derecho_r',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('bicep_izquierdo_r','Bicep Izquierdo Relajado',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('bicep_izquierdo_r',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('bicep_derecho_c','Bicep Derecho Contraido',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('bicep_derecho_c',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('bicep_izquierdo_c','Bicep Izquierdo Contraido',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('bicep_izquierdo_c',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('antebrazo_derecho','Antebrazo Derecho',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('antebrazo_derecho',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('antebrazo_izquierdo','Antebrazo Izquierdo',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('antebrazo_izquierdo',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('muneca_derecha','Muñeca Derecho',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('muneca_derecha',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('muneca_izquierda','Muñeca Izquierda',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('muneca_izquierda',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('cintura','Cintura',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('cintura',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('gluteo','Gluteo',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('gluteo',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('muslo_derecho','Muslo Derecho',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('muslo_derecho',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('muslo_izquierdo','Muslo Izquierdo',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('muslo_izquierdo',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('pantorilla_derecha','Pantorilla Derecha',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('pantorilla_derecha',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('peso','Peso',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('peso',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('estatura','Estatura Izquierda',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('estatura',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group hidden">
        {!!Form::label('date_recorded','Fecha',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::date('date_recorded',$now,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>
</div>