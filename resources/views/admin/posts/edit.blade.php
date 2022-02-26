<x-app-layout>
    <div class="flex flex-col items-center py-10">
        <h1 class="text-xl font-bold pt-2 pb-4">Edit post</h1>

        @if (session('info'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success</strong>
                <span class="block sm:inline">{{session('info')}}</span>
            </div>
        @endif

        <div class="container xl">
            {!! Form::model($post,['route'=>['admin.posts.update',$post],'autocomplete'=>'off','files'=>true,'method'=>'put']) !!}

                {!! Form::hidden('user_id',auth()->user()->id) !!}

                @include('admin.posts.partials.form')
                
                {!! Form::submit('Save changes',['class'=>'mt-6 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        //Cambiar imagen
            document.getElementById("file").addEventListener('change', cambiarImagen);
    
            function cambiarImagen(event){
                var file = event.target.files[0];
    
                var reader = new FileReader();
                reader.onload = (event) => {
                    document.getElementById("picture").setAttribute('src', event.target.result); 
                };
    
                reader.readAsDataURL(file);
            }
    </script>
</x-app-layout>