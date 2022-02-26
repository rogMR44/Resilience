<style>
    /*Ocultar los inputs, esto iría mejor en css*/
    .hide{
        display: none;
    }
</style>
<x-app-layout>
    @auth
        @if (Auth::user()->hasRole('student'))
            <p id="user" data="{{$student}}" class="hidden">Number of classes user has available: {{$student}}</p>        
        @endif
    @endauth
    <div class="items-center justify-center mt-10 px-4">
        <div class="container lg:flex">
            <div class="image-wrapper">
                <img class="rounded-full w-40 h-40 py-2 px-2 mr-10" src="@if($teacher->userImage) {{ url('storage/' . $teacher->userImage->url) }} @else https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png @endif" alt="user avatar">
            </div>
            <div class="rounded w-full ml-2">
                <h1 class="text-4xl font-bold text-gray-900">
                    {{$teacher->realname}}
                </h1>
                <div class="my-4">                            
                    @foreach ($teacher->languages as $language)
                        <a href=""  class="inline-block px-3 h-6 bg-{{$language->color}}-600 text-white rounded-full">{{$language->name}}</a>                          
                    @endforeach
                </div> 
                <div class="text-lg text-gray-900 mb-2">
                    {!! $teacher->introduction !!}
                </div>
            </div>
        </div>
     </div>
    <div class="items-center justify-center mt-10 mx-10 lg:mx-20">
        <div>
            {{-- contenido principal --}}
            <div class="lg:col-span-2">
                <div class="text-base text-gray-900 mt-4">
                    {!! $teacher->about !!}
                </div>
            </div>
        </div>
    </div>
    <div class="container my-8">
    <form id="form_reservedClass" action="reserve" method="POST">
        <h1 class="text-xl font-bold py-5 text-center" data="">Available classes</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($list as $teacherClass)
                <article>
                    <div class="flex items-center justify-center bg-red-400">                        
                        <div class="bg-red-400 flex items-center justify-center my-4 mx-4 rounded w-3/6 md:w-2/6 lg:w-1/6">
                            <input type="checkbox">
                            <fieldset disabled="disabled" class="hide">
                                <input type="text" name="id[]" value="{{$teacherClass->id}}">
                            </fieldset>
                        </div>
                        <input type="hidden" name="teacher_id" value="{{$teacherClass->teacher_id}}">
                        <div class="bg-white w-5/6">
                            <div class="grid sm:grid-cols-1 md:grid-cols-12">
                                <div class="items-center justify-center col-span-3">
                                    <div class="flex items-center justify-center m-4">                                    
                                        <img class="w-5 h-5" src="/images/icons/date.png" alt="">
                                    </div>
                                </div>
                                <div class="items-center justify-center col-span-9">
                                    <div class="flex items-center justify-start m-4">                                    
                                        <p class="font-bold">Class date: {{$teacherClass->class_date}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid sm:grid-cols-1 md:grid-cols-12">
                                <div class="items-center justify-center col-span-3">
                                    <div class="flex items-center justify-center m-4">                                    
                                        <img class="w-5 h-5" src="/images/icons/clock.png" alt="">
                                    </div>
                                </div>
                                <div class="items-center justify-center col-span-9">
                                    <div class="flex items-center justify-start m-4">                                    
                                        <p class="font-bold">Class date: {{$teacherClass->class_start}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid sm:grid-cols-1 md:grid-cols-12">
                                <div class="items-center justify-center col-span-3">
                                    <div class="flex items-center justify-center m-4">                                    
                                        <img class="w-5 h-5" src="/images/icons/clock.png" alt="">
                                    </div>
                                </div>
                                <div class="items-center justify-center col-span-9">
                                    <div class="flex items-center justify-start m-4">                                    
                                        <p class="font-bold">Class date: {{$teacherClass->class_end}}</p>
                                    </div>
                                </div>
                            </div>                                                    
                        </div>
                    </div>                
                </article>
            @endforeach
        </div>        
            @csrf
            <x-button id="reserve" class="mt-4">Reserve</x-button>
            <div id="message" class="hide"></div>
            <input class="hide" name="availableClass" id="availableClass">
        </form>
    </div>
</x-app-layout>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(function () {
    var count = 0;
    checkCount();
    //Se ejecuta siempre que se seleccionen los checks
    $('article input:checkbox').click(function() {
        if( $(this).is(':checked') ){
            console.log($(this).val());
            //Activar inputs del click
            $(this).parent().find('fieldset').removeAttr("disabled");
            count++;
            //Verificar que el contador sea igual o menor al numerode clases
            checkCount();
            //Numero de clases en pantalla
            $('#user').text("Number of classes user has available: "+classes());
            //Numero de clases en el input
            $('#availableClass').val(classes());
            //console.log($(this).parent());
        } else {
            //Desactivar los inputs para que no se manden
            $(this).parent().find('fieldset').attr("disabled", "");
            count-=1;
            checkCount();
            //Numero de clases en pantalla
            $('#user').text("Number of classes user has available: "+ classes());
            //Numero de clases en el input
            $('#availableClass').val(classes());
        } 
    });

    function checkCount() {
        if (count == 0) {
            $('#message').text("You need to select a class to reserve");
            $('#message').addClass("hide");
            $('#message').removeClass("hide");
            $("#reserve").attr('disabled','disabled');
        }
        if (count > 0 ) {
            $("#reserve").removeAttr('disabled');
            $('#message').addClass("hide");
        }
        if (count > $('#user').attr('data')) {
            $('#message').text("You have have insuficient credits to reserve these classes");
            // $('#message').text("You are allowed to select only up to " + $('#user').attr('data') + " classes");
            $('#message').removeClass("hide");
            $("#reserve").attr('disabled','disabled');
        }
    }

    function classes() {
        var res = Number.parseInt($('#user').attr('data')) - count;
        var res = res < 1 ? 0: res;
        return res;
    }

    $('#form_reservedClass').submit(function (e) {
        //Prevenir el evento
        e.preventDefault();
        //Ocupar alertas de SweetAlert, espera que se acepte el campo
        
        const swalCustom = Swal.mixin({
            customClass: {
                confirmButton: 'custom-confirm',
                cancelButton: 'custom-cancel'
            },
            buttonsStyling: false
        });
        //Este fragmento es el que se copiará en las diferentes pantallas
        swalCustom.fire({
            icon: 'question',
            html: '<strong class="html-message">Are you sure you want to reserve these classes?</strong>',
            background: '#e9e9e8',
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed){
                //Se hace la operación normal de enviar datos
                $(this).unbind('submit').submit()
            }
        });
    });
})
</script>