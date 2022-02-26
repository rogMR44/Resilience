<x-app-layout>
    <div class="grid sm:grid-cols-1 md:grid-cols-2">
        <div class="hidden md:flex items-center justify-center">
            <div class="flex items-center justify-center">                                    
                <img src="/images/front_page/teacherCreateEdit.png" alt="">                   
            </div>
        </div>
        <div class="items-center justify-center px-36">
            <h1 class="text-xl font-bold text-blue-900 py-5">Edit class</h1>
            @if (session('info'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success</strong>
                    <span class="block sm:inline">{{session('info')}}</span>
                </div>
            @endif
            {!!Form::model($id,['route'=>'teacher.class.update'])!!}
            <input type="hidden" name="class_id" value="{{$id->id}}">
            <input type="hidden" name="teacher_id" value="{{$id->teacher_id}}">   
            <input type="hidden" name="class_link" value="{{$id->class_link}}">        
            <div class="form-group">                                
                {!!Form::label('class_date','Class date',['class'=>'block font-medium text-sm text-gray-700'])!!}
                {!!Form::date('class_date',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'])!!}
                <div>
                    @error('class_date')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">            
                {!!Form::label('class_start','Class start',['class'=>'block mt-4 font-medium text-sm text-gray-700'])!!}
                {!!Form::time('class_start',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'])!!}                           
                <div>
                    @error('class_start')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">            
                {!!Form::label('class_end','Class end',['class'=>'block mt-4 font-medium text-sm text-gray-700'])!!}
                {!!Form::time('class_end',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'])!!}                           
                <div>
                    @error('class_end')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
            </div>        
            
                {!! Form::submit('Save changes', ['class' => 'mt-6 px-4 py-2 bg-yellow-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) !!}            
            
            {!!Form::close()!!}
        </div>
    </div>
</x-app-layout>