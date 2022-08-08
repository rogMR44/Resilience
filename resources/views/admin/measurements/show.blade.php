<x-app-layout>
    <div class="flex flex-col items-center">
        <h1 class="text-xl font-bold mt-8">Mis Medidas</h1>
        @if (session('info'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success</strong>
                <span class="block sm:inline">{{session('info')}}</span>
            </div>
        @endif        
    </div>   
    @if (!empty($measurements))
    <div class="flex flex-col items-center">        
        <div class="mt-4 flex items-center">
            <table class="shadow-lg bg-white">
                <thead>
                    <tr>
                        <th class="border px-8 py-4">ID</th>
                        <th class="border px-8 py-4">Visualizar</th>
                        <th class="border px-8 py-4">Fecha</th>                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($measurements as $user_measurement)
                        <tr>
                            <td class="border px-8 py-4">{{$user_measurement->id}}</td>                            
                            <td class="border px-8 py-4">{{$user_measurement->date_recorded}}</td>
                            <td class="border px-8 py-4">
                                <a href="{{ route('admin.a_measurements.edit', $user_measurement)}}">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 m-1 rounded">
                                        Ver datos
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
        <p class="mt-10 text-xl font-bold text-center">Parece que no el usuario no tiene ningun registro de medidas.</p>
    @endif
</x-app-layout>