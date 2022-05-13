<x-app-layout>
    <div class="flex flex-col items-center">
        <h1 class="text-xl font-bold mt-8">Mis Medidas</h1>
        @if (session('info'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success</strong>
                <span class="block sm:inline">{{session('info')}}</span>
            </div>
        @endif
        <div>
            <div class="flex items-center justify-start mt-4">
                <a href="{{route('student.measurements.create')}}">
                    <button class="px-6 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Agregar Medidas
                    </button>
                </a>
            </div>
        </div>
    </div>   
    {{-- @empty($measurements) --}}
    <div class="flex flex-col items-center">        
        <div class="mt-4 flex items-center">
            <table class="shadow-lg bg-white">
                <thead>
                    <tr>
                        <th class="border px-8 py-4">ID</th>
                        <th class="border px-8 py-4">Visualizar</th>
                        <th class="border px-8 py-4">Fecha</th>
                        <th class="border px-8 py-4 col-span-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($measurements as $measurement)
                        <tr>
                            <td class="border px-8 py-4">{{$measurement->id}}</td>
                            <td class="border px-8 py-4">
                                <a href="{{ route('student.measurements.show',$measurement)}}">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 m-1 rounded">
                                        Ver datos
                                    </button>
                                </a>
                            </td>
                            <td class="border px-8 py-4">{{$measurement->date_recorded}}</td>
                            <td>
                                <a href="{{ route('student.measurements.edit',$measurement)}}">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 m-1 rounded">
                                        Edit
                                    </button>
                                </a>
                            </td>
                            <td>                        
                                <form class="form-tag-admin" action="{{ route('student.measurements.destroy',$measurement)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 m-1 rounded">
                                        Delete
                                    </button>
                                </form>                        
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- @else
        <p class="mt-10 text-xl font-bold text-center">Parece que no tienes ningun registro de medidas, comienza agregando una.</p>
    @endempty --}}
</x-app-layout>