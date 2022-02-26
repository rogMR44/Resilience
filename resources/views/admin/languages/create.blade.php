<x-app-layout>
    <div class="flex flex-col items-center py-10">
        <h1 class="text-xl font-bold py-5">Create language</h1>
        @if (session('info'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success</strong>
                <span class="block sm:inline">{{session('info')}}</span>
            </div>
        @endif
        {!!Form::open(['route'=>'admin.languages.store'])!!}
        
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
            
            {!! Form::submit('Create language', ['class' => 'mt-6 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) !!}            
        
        {!!Form::close()!!}
    </div>
</x-app-layout>