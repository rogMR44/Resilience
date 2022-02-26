<style>
    .boton:hover{
        color: #ffffff;
        background-color: orange;
    }
    </style>
    <x-app-layout>
        <div>
            <div class="font-bold pt-6 text-3xl text-center">
                <p>Your class</p>
            </div>
            @foreach ($list as $classInf)
                    <article>                    
                        <div class="flex items-center justify-center bg-blue-200 mx-0 mt-10 md:mx-16 lg:mx-28">
                            <div class="bg-blue-400 my-4 mx-4 rounded w-1/2 flex items-center justify-center">
                                <div id="data">            
                                    <p class="flex items-center justify-center text-5xl" date="{{$classInf->class_date}}" starthour="{{$classInf->class_start}}" endhour="{{$classInf->class_end}}">{{$classInf->class_date}}</p>
                                    <p class="flex items-center justify-center text-2xl mt-3 "><span>{{$classInf->class_start}}</span><span>-</span><span>{{$classInf->class_end}}</span></p>
                                </div>
                            </div>
                            <div class="bg-blue-500 p-3 my-4 mr-4 rounded w-1/2">
                                <div class="text-xl font-bold bg-blue-300 my-2 mx-6 rounded-md text-white flex items-center justify-center boton">
                                    <a id="classLink" href="{{ $classInf->class_link}}">Join Class</a>
                                </div>
                                <form id="cancelForm" action="{{route('cancelclass')}}" method="post" class="text-xl font-bold bg-blue-300 my-2 mx-6 rounded-md text-white flex items-center justify-center boton">
                                    @csrf
                                    <div>
                                        <input type="hidden" name="class_id" value="{{$classInf->id}}">
                                        <button id="cancelClass">Cancel Class</button>
                                    </div>
                                </form>                                            
                            </div>
                        </div>                      
                    </article>
                @endforeach
        </div>
    </x-app-layout>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function () {
        //{{$classInf->class_date}} devuelve la misma fecha?
        // {{$classInf->class_start}} devuelve siempre los mismos datos?
    
        //Llamar a la función
        deactivateButton();
    
        function deactivateButton() {
            //Fecha actual
            var actual = new Date();
            //Encontrar el valor de fecha
            var startDate = $('#data p:first').attr("date");
            //Encontrar el valor de hora
            var startHour = $('#data p:first').attr("starthour");
            //Encontrar el valor de la hora final
            var endHour = $('#data p:first').attr("endhour");
            //Separar cada dato particular
            startDate = startDate.split("-");
            startHour = startHour.split(":");
            endHour = endHour.split(":");
            //Crear una fecha de JS AAAA,MM,DD,HH,MM,SS
            //Se le resta uno al mes y a la hora
            var long_startDate = new Date(startDate[0], (startDate[1] - 1), startDate[2],
                (startHour[0]), startHour[1], startHour[2]);
            var long_endDate = new Date(startDate[0], (startDate[1] - 1), startDate[2],
                (endHour[0]), endHour[1], endHour[2]);
            var actual = new Date();
            //Resultado en milisegundos para que sean más de 12 horas tendrían que ser menor a 12*3600*1000
            if ((long_startDate.getTime() - actual.getTime()) >= (12*3600*1000)) {
                //Si faltan más de 12 horas
                DisponibleClass("#cancelClass", "Cancel class");
            }else{
                //Si faltan menos de 12 horas
                UnableClass("#cancelClass", "Not able to cancel");
            }
            //Si cae en el intervalo de la hora de inicio y fin
            if (actual.getTime() >= long_startDate.getTime() && actual.getTime() < long_endDate.getTime()) {
                DisponibleClass("#classLink", "Join class!")
            } else {
                UnableClass("#classLink", "Unable to join")
            }
            //Llamar cada segundo
            //console.log("res: " + (long_startDate.getTime() - actual.getTime()));
            setTimeout(deactivateButton, 1000);
        }
    
        function DisponibleClass(idDOM, message) {
            $(idDOM).text(message);
            $(idDOM).css('pointer-events', 'auto');
            $(idDOM).css('cursor', 'auto');
        }
    
        function UnableClass(idDOM, message) {
            $(idDOM).text(message);
            $(idDOM).css('pointer-events', 'none');
            $(idDOM).css('cursor', 'default');
            $(idDOM).css('color', '#6a7173');
        }

        $('#cancelForm').submit(function (e) {
            e.preventDefault();
            //Ocupar alertas de SweetAlert, espera que se acepte el campo
        
        const swalCustom = Swal.mixin({
            customClass: {
                confirmButton: 'custom-confirm',
                cancelButton: 'custom-cancel'
            },
            buttonsStyling: false
        });
        swalCustom.fire({
            icon: 'question',
            html: '<strong class="html-message">Are you sure you want to cancel the class?</strong>',
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