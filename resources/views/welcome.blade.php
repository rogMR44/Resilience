<x-app-layout>
    <div class="bg-gray-700 flex items-center justify-center h-screen">                    
        <div class="w-1/2 mx-4 flex justify-center">
            <div class="p-24">
                <p class="text-8xl font-black">TITLE</p>
                <P class="font-bold">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, Nonea! Maiores et perferendis eaque, exercitationem praesentium nihil.</P>
                <div class="flex items-center justify-start mt-4">            
                    <a href="{{route('login')}}">
                        <button class="bg-blue-400 px-6 py-2 my-4 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 active:bg-orange-400 focus:outline-none focus:border-orange-400 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Iniciar Sesion
                        </button>
                    </a>
                </div>
            </div>
        </div>
    
        <div class="w-1/2 mx-4 flex justify-center">
            <div class="">
                <div class="mx-w-sm overflow-hidden shadow-lg">
                    <img class="h-auto w-auto flex bg-sky-400" src="/images/logos/Image.png" alt="img example">
                </div>
            </div>
        </div>
    </div>


    <div class="bg-gray-300 py-20">
        <div class="ml-10 mb-8">
            <h1 class="font-bold text-4xl">Lorem Ipsum</h1>
            <p class="text-2xl">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, Nonea! Maiores et perferendis eaque, exercitationem praesentium nihil</p>
        </div>
        <div class="flex items-center justify-center mx-20">
            <div class="w-1/3 mx-4 flex justify-center">
                <div class="py-4">
                    <div class="mx-w-sm rounded-full overflow-hidden shadow-lg">
                        <img class="h-60 w-60 flex bg-sky-400" src="/images/logos/Image.png" alt="img example">
                    </div>
                </div>
            </div>

            <div class="w-1/3 mx-4 flex justify-center">
                <div class="py-4">
                    <div class="mx-w-sm rounded-full overflow-hidden shadow-lg">
                        <img class="h-60 w-60 flex bg-sky-400" src="/images/logos/Image.png" alt="img example">
                    </div>
                </div>
            </div>

            <div class="w-1/3 mx-4 flex justify-center">
                <div class="py-4">
                    <div class="mx-w-sm rounded-full overflow-hidden shadow-lg">
                        <img class="h-60 w-60 flex bg-sky-400" src="/images/logos/Image.png" alt="img example">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-center mx-20">
            <div class="w-1/3 mx-4 flex justify-center text-center">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, Nonea! Maiores et perferendis eaque, exercitationem praesentium nihil.
            </div>

            <div class="w-1/3 mx-4 flex justify-center text-center">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, Nonea! Maiores et perferendis eaque, exercitationem praesentium nihil.
            </div>

            <div class="w-1/3 mx-4 flex justify-center text-center">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, Nonea! Maiores et perferendis eaque, exercitationem praesentium nihil.
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
                <div>
                    <img class="object-cover w-full rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="/images/icons/edit.png" alt="">
                </div>
                <div class="flex flex-col justify-between leading-normal">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white m-4">“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.”</h5>
                    <p class=" font-normal text-gray-700 dark:text-gray-400 m-4">Magna Aliqua</p>
                </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="flex flex-col m-4 bg-white rounded-lg border shadow-md md:flex-row md:max-w-3xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="w-2/6">
                    <img class="object-cover overflow-hidden w-full rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="/images/icons/file.png" alt="">
                </div>
                <div class="flex flex-col justify-between leading-normal w-4/6">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white m-4">“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.”</h5>
                    <p class=" font-normal text-gray-700 dark:text-gray-400 m-4">Magna Aliqua</p>
                </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="flex flex-col m-4 bg-white rounded-lg border shadow-md md:flex-row md:max-w-3xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="w-2/6">
                    <img class="object-cover w-full rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="/images/icons/search.png" alt="">
                </div>
                <div class="flex flex-col justify-between leading-normal w-4/6">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white m-4">“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.”</h5>
                    <p class=" font-normal text-gray-700 dark:text-gray-400 m-4">Magna Aliqua</p>
                </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="flex flex-col m-4 bg-white rounded-lg border shadow-md md:flex-row md:max-w-3xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="w-2/6">
                    <img class="object-cover w-full rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="/images/icons/delete.png" alt="">                    
                </div>
                <div class="flex flex-col justify-between leading-normal w-4/6">
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

    <div class="grid grid-cols-3 p-4">
        <div class="">
            <h1 class="text-xl font-bold text-center mb-4">Redes Sociales</h1>
            <div class="grid grid-cols-3 ">
                <a class="place-self-center" href=""><img class="h-10 w-10" src="/images/logos/image.png" alt="facebook"></a>
                <a class="place-self-center" href=""><img class="h-10 w-10" src="/images/logos/image.png" alt="instagram"></a>
                <a class="place-self-center" href=""><img class="h-10 w-10" src="/images/logos/image.png" alt="youtube"></a>
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