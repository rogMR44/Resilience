<x-app-layout>      

    <div class="flex items-center justify-center bg-green-400 mx-40 mt-10">        
        <div class="max-w-sm rounded overflow-hidden">
            <div class="flex justify-center">
                {{-- isset verifica si esta definido --}}
                @isset ($post->image)
                    <img id="picture" src="{{ url('storage/' . $post->image->url) }}" alt="">
                @else
                    <img id="picture" src="https://cdn.pixabay.com/photo/2018/05/19/01/23/online-3412498_960_720.jpg" class="max-h-40" alt="">
                @endisset
            </div>   
            <div class="px-6 py-4">              
              <div class="form-group bg-blue-500">
                {!! Form::label('file','Image to show in post',['class'=>'block font-bold text-sm text-gray-700']) !!}
                {!! Form::file('file',['class'=>'form-control-file','accept'=>'image/*']) !!}
                @error('file')
                    <br>
                    <span class="text-red-600">{{$message}}</span>
                @enderror
                </div> 
             </div>
        </div>
    </div>

    <div class="flex items-center justify-center mt-2 mx-20 bg-green-300">
        <div class="bg-red-500 w-1/3 mx-4 flex justify-center">
            <div class="flex items-center justify-center bg-green-400 mx-40 mt-10">        
                <div class="max-w-sm rounded overflow-hidden">
                    <div class="flex justify-center">
                        {{-- isset verifica si esta definido --}}
                        @isset ($post->image)
                            <img id="picture" src="{{ url('storage/' . $post->image->url) }}" alt="">
                        @else
                            <img id="picture" src="https://cdn.pixabay.com/photo/2018/05/19/01/23/online-3412498_960_720.jpg" class="max-h-40" alt="">
                        @endisset
                    </div>   
                    <div class="px-6 py-4">              
                      <div class="form-group bg-blue-500">
                        {!! Form::label('file','Image to show in post',['class'=>'block font-bold text-sm text-gray-700']) !!}
                        {!! Form::file('file',['class'=>'form-control-file','accept'=>'image/*']) !!}
                        @error('file')
                            <br>
                            <span class="text-red-600">{{$message}}</span>
                        @enderror
                        </div> 
                     </div>
                </div>
            </div>
        </div>

        <div class="bg-blue-500 w-1/3 mx-4 flex justify-center">
            <div class="flex items-center justify-center bg-green-400 mx-40 mt-10">        
                <div class="max-w-sm rounded overflow-hidden">
                    <div class="flex justify-center">
                        {{-- isset verifica si esta definido --}}
                        @isset ($post->image)
                            <img id="picture" src="{{ url('storage/' . $post->image->url) }}" alt="">
                        @else
                            <img id="picture" src="https://cdn.pixabay.com/photo/2018/05/19/01/23/online-3412498_960_720.jpg" class="max-h-40" alt="">
                        @endisset
                    </div>   
                    <div class="px-6 py-4">              
                      <div class="form-group bg-blue-500">
                        {!! Form::label('file','Image to show in post',['class'=>'block font-bold text-sm text-gray-700']) !!}
                        {!! Form::file('file',['class'=>'form-control-file','accept'=>'image/*']) !!}
                        @error('file')
                            <br>
                            <span class="text-red-600">{{$message}}</span>
                        @enderror
                        </div> 
                     </div>
                </div>
            </div>
        </div>

        <div class="bg-green-500 w-1/3 mx-4 flex justify-center">
            <div class="flex items-center justify-center bg-green-400 mx-40 mt-10">        
                <div class="max-w-sm rounded overflow-hidden">
                    <div class="flex justify-center">
                        {{-- isset verifica si esta definido --}}
                        @isset ($post->image)
                            <img id="picture" src="{{ url('storage/' . $post->image->url) }}" alt="">
                        @else
                            <img id="picture" src="https://cdn.pixabay.com/photo/2018/05/19/01/23/online-3412498_960_720.jpg" class="max-h-40" alt="">
                        @endisset
                    </div>   
                    <div class="px-6 py-4">              
                      <div class="form-group bg-blue-500">
                        {!! Form::label('file','Image to show in post',['class'=>'block font-bold text-sm text-gray-700']) !!}
                        {!! Form::file('file',['class'=>'form-control-file','accept'=>'image/*']) !!}
                        @error('file')
                            <br>
                            <span class="text-red-600">{{$message}}</span>
                        @enderror
                        </div> 
                     </div>
                </div>
            </div>
        </div>
    </div>           

    <div>
        <div class="flex items-center justify-center bg-green-400 mx-40 mt-10">
             <div class="bg-white p-14 my-4 mx-4 rounded w-1/6">1</div>
             <div class="bg-red-500 p-3 my-4 mr-4 rounded w-full">
                 <div class="text-xl font-bold">
                     <h1>Title</h1>
                 </div>
                 <div class="my-2">
                    <h1>Subtitle</h1>
                </div>
                <div class="text-sm">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
             </div>
        </div>

        <div class="flex items-center justify-center mt-2 mx-20 bg-green-300">
            <div class="bg-red-500 w-1/3 mx-4 flex justify-center">
                <div class="p-10">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <img class="h-auto w-auto flex bg-sky-400" src="/images/icons/Edit.png" alt="img example">
                        <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">Mountain</div>                        
                        <p class="text-gray-700 text-base">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, Nonea! Maiores et perferendis eaque, exercitationem praesentium nihil.                            
                        </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-blue-500 w-1/3 mx-4 flex justify-center">
                <div class="p-10 self-start">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <img class="h-auto w-auto flex bg-sky-400" src="/images/logos/Image.png" alt="img example">
                        <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">Mountain</div>                        
                        <p class="text-gray-700 text-base">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, Nonea! Maiores et perferendis eaque, exercitationem praesentium nihil.
                        </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-green-500 w-1/3 mx-4 flex justify-center">
                <div class="p-10">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <img class="h-auto w-auto flex bg-sky-400" src="/images/logos/Image.png" alt="img example">
                        <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">Mountain</div>                        
                        <p class="text-gray-700 text-base">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, Nonea! Maiores et perferendis eaque, exercitationem praesentium nihil.
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>                
    </div>    
    <link rel="stylesheet" href="/css/slider.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <!-- Slider main container -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="flex flex-col m-4 bg-white rounded-lg border shadow-md md:flex-row md:max-w-3xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-cover w-full rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="/images/icons/search.png" alt="">
                <div class="flex flex-col justify-between leading-normal">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white m-4">“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.”</h5>
                    <p class=" font-normal text-gray-700 dark:text-gray-400 m-4">Magna Aliqua</p>
                </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="flex flex-col m-4 bg-white rounded-lg border shadow-md md:flex-row md:max-w-3xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-cover w-full rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="/images/icons/search.png" alt="">
                <div class="flex flex-col justify-between leading-normal">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white m-4">“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.”</h5>
                    <p class=" font-normal text-gray-700 dark:text-gray-400 m-4">Magna Aliqua</p>
                </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="flex flex-col m-4 bg-white rounded-lg border shadow-md md:flex-row md:max-w-3xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-cover w-full rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="/images/icons/search.png" alt="">
                <div class="flex flex-col justify-between leading-normal">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white m-4">“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.”</h5>
                    <p class=" font-normal text-gray-700 dark:text-gray-400 m-4">Magna Aliqua</p>
                </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="flex flex-col m-4 bg-white rounded-lg border shadow-md md:flex-row md:max-w-3xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-cover w-full rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="/images/icons/search.png" alt="">
                <div class="flex flex-col justify-between leading-normal">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white m-4">“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.”</h5>
                    <p class=" font-normal text-gray-700 dark:text-gray-400 m-4">Magna Aliqua</p>
                </div>
            </div>
          </div>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
      </div>

      <div class="grid grid-cols-3">
        <div class="">
            <h1 class="text-xl font-bold text-center">Redes Sociales</h1>
            <div class="grid grid-cols-3">
                <img src="/images/logos/image.png" alt="facebook">
                <img src="/images/logos/image.png" alt="youtube">
                <img src="/images/logos/image.png" alt="instagram">
            </div>
        </div>
        <div class="flex items-center justify-center">
            <img class="w-52" src="/images/logos/image.png" alt="facebook">
        </div>
        <div>
         <div class="grid grid-cols-2">
             <div>
                 <span class="block"><p class="font-bold">Links Interiores</p></span>
                 <span class="block"><a href="">Ipsum</a></span>
                 <span class="block"><a href="">Adipiscing</a></span>
                 <span class="block"><a href="">Nostrud</a></span>
                 <span class="block"><a href="">Ulamanco</a></span>
             </div>
             <div class="">
                 <span class="block"><p class="font-bold">Mas links</p></span>
                 <span class="block"><a href="">Ipsum</a></span>
                 <span class="block"><a href="">Adipiscing</a></span>
                 <span class="block"><a href="">Nostrud</a></span>
                 <span class="block"><a href="">Ulamanco</a></span>
             </div>
         </div>
        </div>
     </div>

     <div class="bg-black py-8 grid grid-cols-2">
         <span class="text-white font-medium ml-10">Resilience 2022</span>
         <span class="text-white font-medium mr-10 justify-self-end"><a class="hover:text-yellow-300" href="">Lorem ipsum dolor</a> | <a class="hover:text-yellow-300" href="">Adipiscing elit</a></span>
     </div>
      <!-- Swiper JS -->
      <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  
      <!-- Initialize Swiper -->
      <script>
        var swiper = new Swiper(".mySwiper", {
          spaceBetween: 30,
          centeredSlides: true,
          autoplay: {
            delay: 2500,
            disableOnInteraction: false,
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
        });
      </script>
</x-app-layout>
