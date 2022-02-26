<x-app-layout>
    <div class="flex flex-col items-center py-10">
        <h1 class="text-xl font-bold py-5">Edit tag</h1>
        @if (session('info'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 my-2 rounded relative" role="alert">
                <strong class="font-bold">Success</strong>
                <span class="block sm:inline">{{session('info')}}</span>
            </div>
        @endif
        {!!Form::model($tag,['route'=>['admin.tags.update',$tag],'method'=>'put'])!!}
            
            @include('admin.tags.partials.form')    
        
            {!! Form::submit('Edit tag', ['class' => 'mt-6 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) !!}            
        {!!Form::close()!!}
    </div>
</x-app-layout>