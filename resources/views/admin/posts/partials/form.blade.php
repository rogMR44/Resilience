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
    <p class="mt-4 mb-2 block font-medium text-sm text-gray-700">Tags</p>
    @foreach ($tags as $tag)
        <label class="mt-4 mr-4 font-normal text-sm text-gray-700">
            {!! Form::checkbox('tags[]',$tag->id,null) !!}
            {{$tag->name}}
        </label>
    @endforeach
    
    @error('tags')
        <br>
        <span class="text-red-600">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <p class="mt-6 mb-2 block font-medium text-sm text-gray-700">Status</p>
    <label>
        {!! Form::radio('status', '1', true) !!}
        Draft
    </label>
    <label class="ml-4">
        {!! Form::radio('status', '2') !!}
        Published
    </label>
    
    @error('status')
        <br>
        <span class="text-red-600">{{$message}}</span>
    @enderror
</div>

<div class="mt-6 mb-6 grid grid-cols-2 grid-flow-col gap-4">
    <div class="image-wrapper">
        {{-- isset verifica si esta definido --}}
        @isset ($post->image)
            <img id="picture" src="{{ url('storage/' . $post->image->url) }}" alt="">
        @else
            <img id="picture" src="https://cdn.pixabay.com/photo/2018/05/19/01/23/online-3412498_960_720.jpg" alt="">
        @endisset
    </div>
    <div>
        <div class="form-group">
            {!! Form::label('file','Image to show in post',['class'=>'block font-bold text-sm text-gray-700']) !!}
            {!! Form::file('file',['class'=>'form-control-file','accept'=>'image/*']) !!}
        </div>
        @error('file')
            <br>
            <span class="text-red-600">{{$message}}</span>
        @enderror
        <p>Instructions:</p>
        <p>Please select the picture that will serve as cover for the post that is about to be created</p>
    </div> 
</div>

<div class="form-group">
    {!! Form::label('description','Description',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
    {!! Form::textarea('description', null, ['class'=>'form-control mt-4 block font-medium text-sm text-gray-700 rounded-md']) !!}
    @error('description')
        <span class="text-red-600">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('body','Post Body',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
    {!! Form::textarea('body', null, ['class'=>'form-control mt-4 block font-medium text-sm text-gray-700 rounded-md']) !!}
    @error('body')
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