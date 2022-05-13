<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold">
           {{$exercise->name}} 
        </h1>
        <div class="tect-lg my-2">
            {!! $exercise->description !!}
        </div>
        <div class="grid grid-cols-1 gap-6">
            {{-- contenido principal --}}
            <div class="">
                <p class="text-lg font-black">Beneficios</p>
                <div class="text-base">
                    {!! $exercise->benefits !!}
                </div>
                <div class="grid grid-cols-3 my-4">
                    <figure class="flex justify-center items-center">
                        @if ($exercise->imageX)
                            <img class="h-3/4 object-cover" src="{{url('storage/' . $exercise->imageX->url)}}">
                        @else
                            <img class="w-full h-80 object-cover object-center" src="/images/logos/Image.png">
                        @endif                                         
                    </figure>
                    <figure class="flex justify-center items-center">
                        @if ($exercise->imageY)
                            <img class="h-3/4 object-cover" src="{{url('storage/' . $exercise->imageY->url)}}">
                        @else
                            <img class="w-full h-80 object-cover object-center" src="/images/logos/Image.png">
                        @endif                                         
                    </figure>
                    <figure class="flex justify-center items-center">
                        @if ($exercise->imageZ)
                            <img class="h-3/4 object-cover" src="{{url('storage/' . $exercise->imageZ->url)}}">
                        @else
                            <img class="w-full h-80 object-cover object-center" src="/images/logos/Image.png">
                        @endif                  
                    </figure>
                </div>
                <p class="text-lg font-black">Ejecucion</p>
                <div class="text-base">
                    {!! $exercise->execution !!}
                </div>
            </div>
        </div>
</x-app-layout>