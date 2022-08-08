<x-app-layout>
    <div class="m-6 grid grid-cols-3 gap-4">
        <div class="flex justify-center">
            <label for="cuello" class="mr-4">Cuello: </label>
            <p>{{$user_measurement->cuello}}</p>
        </div>
        <div class="flex justify-center">
            <label for="pecho" class="mr-4">Pecho: </label>
            <p>{{$user_measurement->pecho}}</p>
        </div>
        <div class="flex justify-center">
            <label for="hombro" class="mr-4">Hombro: </label>
            <p>{{$user_measurement->hombro}}</p>
        </div>
    </div>
    <div class="m-6 grid grid-cols-2 gap-4">  
        <div class="flex justify-center">
            @if (!empty($user_measurement->bicep_derecho_r))
                <label for="bicep_derecho_r" class="mr-4">Bicep Derecho Relajo: </label>
                <p>{{$user_measurement->bicep_derecho_r}}</p>
            @else
                <label for="bicep_derecho_r" class="mr-4">Bicep Derecho Relajo: </label>
                <p>No registrado</p>
            @endif
        </div>
        <div class="flex justify-center">
            <label for="bicep_izquierdo_r" class="mr-4">Bicep Izquierdo Relajo: </label>
            <p>{{$user_measurement->bicep_izquierdo_r}}</p>
        </div>

        <div class="flex justify-center">
            <label for="bicep_derecho_c" class="mr-4">Bicep Derecho Contraido: </label>
            <p>{{$user_measurement->bicep_derecho_c}}</p>
        </div>
        <div class="flex justify-center">
            <label for="bicep_izquierdo_c" class="mr-4">Bicep Izquierdo Contraido: </label>
            <p>{{$user_measurement->bicep_izquierdo_c}}</p>
        </div>

        <div class="flex justify-center">
            <label for="antebrazo_derecho" class="mr-4">Antebrazo Derecho: </label>
            <p>{{$user_measurement->antebrazo_derecho}}</p>
        </div>
        <div class="flex justify-center">
            <label for="antebrazo_izquierdo" class="mr-4">Antebrazo Izquierdo: </label>
            <p>{{$user_measurement->antebrazo_izquierdo}}</p>
        </div>
        <div class="flex justify-center">
            <label for="muneca_derecha" class="mr-4">Muneca Derecha: </label>
            <p>{{$user_measurement->muneca_derecha}}</p>
        </div>
        <div class="flex justify-center">
            <label for="menuca_izquierda" class="mr-4">Menuca Izquierda: </label>
            <p>{{$user_measurement->menuca_izquierda}}</p>
        </div>
        <div class="flex justify-center">
            <label for="cintura" class="mr-4">Cintura: </label>
            <p>{{$user_measurement->cintura}}</p>
        </div>
        <div class="flex justify-center">
            <label for="gluteo" class="mr-4">Gluteo: </label>
            <p>{{$user_measurement->gluteo}}</p>
        </div>
        <div class="flex justify-center">
            <label for="muslo_derecho" class="mr-4">Muslo Derecho: </label>
            <p>{{$user_measurement->muslo_derecho}}</p>
        </div>
        <div class="flex justify-center">
            <label for="muslo_izquierdo" class="mr-4">Muslo Izquierdo: </label>
            <p>{{$user_measurement->muslo_izquierdo}}</p>
        </div>
        <div class="flex justify-center">
            <label for="pantorilla_derecha" class="mr-4">Pantorilla Derecha: </label>
            <p>{{$user_measurement->pantorilla_derecha}}</p>
        </div>
        <div class="flex justify-center">
            <label for="pantorilla_izquierda" class="mr-4">Pantorilla Izquierda: </label>
            <p>{{$user_measurement->pantorilla_izquierda}}</p>
        </div>
        <div class="flex justify-center">
            <label for="peso" class="mr-4">Peso: </label>
            <p>{{$user_measurement->peso}}</p>
        </div>
        <div class="flex justify-center">
            <label for="estatura" class="mr-4">Estatura: </label>
            <p>{{$user_measurement->estatura}}</p>
        </div>
    </div> 
</x-app-layout>


    {{-- </div class="m-6 grid grid-cols-2 gap-4">
        
    </div> --}}