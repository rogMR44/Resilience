<div class="m-6 grid grid-cols-2 gap-4 ">
    <div class="form-group">
        {!!Form::label('name','Name',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('name',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter post name'])!!}
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!!Form::label('slug','Slug',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!!Form::text('slug',null,['class'=>'form-control disabled mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter slug name','readonly'])!!}
        @error('slug')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('category_id','Category',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!! Form::select('category_id', $categories , null, ['class'=>'form-control orm-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}
        @error('category_id')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>
    
    <div class="form-group">
        {!! Form::label('description','Description',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!! Form::textarea('description', null, ['class'=>'form-control h-24 mt-4 block font-medium text-sm text-gray-700 rounded-md']) !!}
        @error('description')
        <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>
    
    <div class="mt-6 mb-6 grid grid-cols-3 col-span-2 gap-4">
        <div class="flex justify-center">
            <div class="max-w-sm rounded overflow-hidden">
                <div class="flex justify-center">
                    {{-- isset verifica si esta definido --}}
                    @isset ($exercise->imageX)
                        <img id="picture_x" src="{{ url('storage/' . $exercise->imageX->url) }}" alt="">
                    @else
                        <img id="picture_x" src="/images/logos/Image.png" class="max-h-40" alt="">
                    @endisset
                </div>   
                <div class="px-6 py-4">              
                  <div class="form-group">
                    {!! Form::label('file_x','Image to show in post',['class'=>'block font-bold text-sm text-gray-700']) !!}
                    {!! Form::file('file_x',['class'=>'form-control-file','accept'=>'image/*']) !!}
                    @error('file_x')
                        <br>
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                    </div> 
                 </div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="max-w-sm rounded overflow-hidden">
                <div class="flex justify-center">
                    {{-- isset verifica si esta definido --}}
                    @isset ($exercise->imageY)
                        <img id="picture_y" src="{{ url('storage/' . $exercise->imageY->url) }}" alt="">
                    @else
                        <img id="picture_y" src="/images/logos/Image.png" class="max-h-40" alt="">
                    @endisset
                </div>   
                <div class="px-6 py-4">              
                  <div class="form-group">
                    {!! Form::label('file_y','Image to show in post',['class'=>'block font-bold text-sm text-gray-700']) !!}
                    {!! Form::file('file_y',['class'=>'form-control-file','accept'=>'image/*']) !!}
                    @error('file_y')
                        <br>
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                    </div> 
                 </div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="max-w-sm rounded overflow-hidden">
                <div class="flex justify-center">
                    {{-- isset verifica si esta definido --}}
                    @isset ($exercise->imageZ)
                        <img id="picture_z" src="{{ url('storage/' . $exercise->imageZ->url) }}" alt="">
                    @else
                        <img id="picture_z" src="/images/logos/Image.png" class="max-h-40" alt="">
                    @endisset
                </div>   
                <div class="px-6 py-4">              
                  <div class="form-group">
                    {!! Form::label('file_z','Image to show in post',['class'=>'block font-bold text-sm text-gray-700']) !!}
                    {!! Form::file('file_z',['class'=>'form-control-file','accept'=>'image/*']) !!}
                    @error('file_z')
                        <br>
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                    </div> 
                 </div>
            </div>
        </div>        
    </div>

    <div class="form-group col-span-2">
        {!! Form::label('benefits','Beneficios',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!! Form::textarea('benefits', null, ['class'=>'form-control mt-4 block font-medium text-sm text-gray-700 rounded-md']) !!}
        @error('benefits')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group col-span-2">
        {!! Form::label('execution','Execution',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
        {!! Form::textarea('execution', null, ['class'=>'form-control mt-4 block font-medium text-sm text-gray-700 rounded-md']) !!}
        @error('execution')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>
</div>
<script>
    $(document).ready( function() {
        $("#name").stringToSlug({
          setEvents: 'keyup keydown blur',
          getPut: '#slug',
          space: '-'
        });
      });
</script>