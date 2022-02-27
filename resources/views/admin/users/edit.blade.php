<x-app-layout>
    <div class="flex flex-col items-center py-10">
        <h1 class="text-xl font-bold py-5">Edit User Information</h1>
        @if (session('info'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
                <strong class="font-bold">Success</strong>
                <span class="block sm:inline">{{session('info')}}</span>
            </div>
        @endif
        <div class="container-xl">
            {!!Form::model($user,['route'=>['admin.users.update',$user],'method'=>'put'])!!}
            
            <div class="container">                        
                <div class="grid">
                    <article>
                        <div class="form-group">                                
                            {!!Form::label('name','Name',['class'=>'block font-medium text-sm text-gray-700'])!!}
                            {!!Form::text('name',null,['class'=>'form-control mb-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Name'])!!}
                            <div>
                                @error('name')
                                    <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </article>

                    <article>
                        <div class="form-group">                                
                            {!!Form::label('email','Email',['class'=>'block font-medium text-sm text-gray-700'])!!}
                            {!!Form::email('email',null,['class'=>'form-control mb-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Email'])!!}
                            <div>
                                @error('email')
                                    <span class="text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </article>

                </div>
            </div>                
            <div class="container">
                {!! Form::submit('Update information', ['class' => 'mt-6 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) !!}            
            </div>              
            {!!Form::close()!!}
        </div>

        
    </div>    
</x-app-layout>