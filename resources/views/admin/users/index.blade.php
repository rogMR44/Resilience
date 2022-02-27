<x-app-layout>
    <div class="mx-4">
        <div class="flex items-center justify-start mt-4">
            <h1 class="text-xl font-bold py-2">Users</h1>            
        </div>
        <div class="flex items-center justify-start mt-4">            
            <a href="{{route('admin.users.create')}}">
                <button class="px-6 py-2 my-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Create User
                </button>
            </a>
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
                    <th class="border px-8 py-4">ID</th>
                    <th class="border px-8 py-4">Name</th>
                    <th class="border px-8 py-4">Email</th>                            
                    <th class="border px-8 py-4">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border px-8 py-4">{{$user->id}}</td>                                                
                        <td class="border px-8 py-4">{{$user->name}}</td>                                                
                        <td class="border px-8 py-4">{{$user->email}}</td>                                                                               
                        <td class="px-8 py-4 grid gap-2 md:grid-cols-2">
                            <a href="{{ route('admin.users.edit',$user)}}">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 m-1 rounded">
                                    Edit
                                </button>
                            </a>
                            <form action="{{ route('admin.users.destroy',$user)}}" method="POST">
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
</x-app-layout>