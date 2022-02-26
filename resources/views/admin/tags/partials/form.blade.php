<div class="form-group">                                
    {!!Form::label('name','Name',['class'=>'block font-medium text-sm text-gray-700'])!!}
    {!!Form::text('name',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter tag name'])!!}
    <div>
        @error('name')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>
</div>
<div class="form-group">
    {{-- fill the slug using - instead of space              --}}
    {!!Form::label('slug','Slug',['class'=>'block mt-4 font-medium text-sm text-gray-700'])!!}
    {!!Form::text('slug',null,['class'=>'form-control disabeld mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter slug name','readonly'])!!}                           
    <div>
        @error('slug')
            <span class="text-red-600">{{$message}}</span>
        @enderror
    </div>
</div>
<div class="form-group mt-4">
    {!! Form::label('color','Color:', [ 'class'=>'text-sm text-gray-700']) !!}
    {!! Form::select('color', $colors, null, ['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}
    <div>
        @error('color')
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
      });</script>