<x-app-layout>
    <div class="mx-4">
        <div class="flex items-center justify-start mt-4">
            <h1 class="text-xl font-bold py-2">Asesorados</h1>            
        </div>
        @if (session('info'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded" role="alert">
                <strong class="font-bold">Success</strong>
                <span class="block sm:inline">{{session('info')}}</span>
            </div>
        @endif
        <table class="self-center p-4 shadow-lg bg-white">
            <thead>
                <tr>                    
                    <th class="border px-8 py-4">Name</th>
                    <th class="border px-8 py-4">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($asesorados as $user_measurement)
                    <tr>                                                                     
                        <td class="border px-8 py-4">{{$user_measurement->name}}</td>                        
                        <td class="px-8 py-4 grid gap-2 md:grid-cols-3">
                            {{-- <a href="{{ route('',$asesorado)}}"> --}}
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 m-1 rounded">
                                    Plan de Entrenamiento
                                </button>
                            </a>
                            {{-- <a href="{{ route('',$asesorado)}}"> --}}
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 m-1 rounded">
                                    Plan Alimenticio
                                </button>
                            </a>
                            <a href="{{ route('admin.a_measurements.show',$user_measurement)}}">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 m-1 rounded">
                                    Medidas
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>