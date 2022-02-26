<x-app-layout>
    <div class="flex items-center justify-center my-10 font-bold text-3xl px-10 text-blue-900">
        <p class="text-center">iSPEAKABLE uses credits so our students and partake in classes</p>
    </div>
    <div class="container">        
        <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-6">         
            @foreach ($products as $product)
                <div class="flex items-center justify-center">
                    <div class="card mt-4 max-w-sm justify-center">
                        <div class="px-4 py-2 bg-red-400 flex justify-between items-center">                    
                            <p class="text-gray-200 font-bold text-xl">${{$product->price}} USD</p>
                            <a href="{{route('pay',$product)}}" class="btn text-white hover:bg-gray-900 bg-yellow-400">Buy Credits</a>
                        </div>
                        {{-- <div class="max-h-10"> --}}
                        <div>
                            <img class="w-full h-50" src="@if($product->productImage) {{ url('storage/' . $product->productImage->url) }} @else https://cdn.pixabay.com/photo/2020/09/10/14/43/kids-5560586_960_720.jpg @endif" alt="user avatar">
                        </div>
                        <div class="card-body">
                            <h1 class="text-gray-900 font-bold text-xl uppercase">{{$product->title}}</h1>
                            <p class="text-gray-600 text-sm mt-1">{!! $product->description !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach              
        </div>
    </div>
</x-app-layout>