<div class="m-6 grid grid-cols-3 gap-4">
    <div class="form-group">
        {!!Form::label('name','Nombre',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('name',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('description','Descripcion',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('description',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('description')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('meal_time','Hora',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::time('meal_time',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('meal_time')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>
</div>