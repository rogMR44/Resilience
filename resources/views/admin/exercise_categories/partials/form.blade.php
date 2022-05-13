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

<script>
    $(document).ready( function() {
        $("#name").stringToSlug({
          setEvents: 'keyup keydown blur',
          getPut: '#slug',
          space: '-'
        });
      });
</script>