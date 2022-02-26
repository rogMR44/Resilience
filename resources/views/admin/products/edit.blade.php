<x-app-layout>
    <div class="flex flex-col items-center py-10">
        <h1 class="text-xl font-bold pt-2 pb-4">Edit a product</h1>
        <div class="container xl">
            {!!Form::model($product,['route'=>['admin.products.update',$product],'method'=>'put','files'=>true])!!}
                
                <div class="form-group">
                    {!!Form::label('title','Name',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
                    {!!Form::text('title',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter product name'])!!}
                    @error('title')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>                                      
                                            
                <div class="mt-6 mb-6 grid grid-cols-2 grid-flow-col gap-4">
                    <div class="image-wrapper">
                        {{-- isset verifica si esta definido --}}
                        @isset ($product->productImage)
                            <img id="picture" src="{{ url('storage/' . $product->productImage->url) }}" alt="">
                        @else
                            <img id="picture" src="https://cdn.pixabay.com/photo/2020/09/10/14/43/kids-5560586_960_720.jpg" alt="">
                        @endisset
                    </div>
                    <div>
                        <div class="form-group">
                            {!! Form::label('file','Image to show in product',['class'=>'block font-bold text-sm text-gray-700']) !!}
                            {!! Form::file('file',['class'=>'form-control-file','accept'=>'image/*']) !!}
                        </div>
                        @error('file')
                            <br>
                            <span class="text-red-600">{{$message}}</span>
                        @enderror
                        <p>Instructions:</p>
                        <p>Please select the picture that will serve as cover for the product</p>
                        <div class="form-group">
                            {!!Form::label('price','Price in USD',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
                            {!!Form::number('price',null,['class'=>'form-control mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50','placeholder'=>'Enter product name'])!!}
                            @error('price')
                                <span class="text-red-600">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('description','Description',['class'=>'mt-4 block font-medium text-sm text-gray-700'])!!}
                            {!! Form::textarea('description', null, ['class'=>'form-control mt-4 block font-medium text-sm text-gray-700 rounded-md']) !!}
                            @error('description')
                                <span class="text-red-600">{{$message}}</span>
                            @enderror
                        </div>
                    </div> 
                </div>                            
                
                {!! Form::submit('Update Product',['class'=>'mt-6 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) !!}
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