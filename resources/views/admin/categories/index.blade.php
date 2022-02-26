<x-app-layout>   
    <div class="flex flex-col items-center py-10">
        <h1 class="text-xl font-bold py-2">Categories</h1>
        <div class="flex items-center justify-start mt-4">
            <a href="{{route('admin.categories.create')}}">
                <button class="m-6 px-6 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Create category
                </button>
            </a>
        </div>
        @if (session('info'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative" role="alert">
                <strong class="font-bold">Success</strong>
                <span class="block sm:inline">{{session('info')}}</span>
            </div>
        @endif
        <table class="self-center shadow-lg bg-white">
            <thead>
                <tr>
                    <th class="border px-8 py-4">ID</th>
                    <th class="border px-8 py-4">Name</th>
                    <th class="border px-8 py-4 col-span-2"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="border px-8 py-4">{{ $category->id}}</td>
                        <td class="border px-8 py-4">{{ $category->name}}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit',$category)}}">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 m-1 rounded">
                                    Edit
                                </button>
                            </a>
                        </td>
                        <td>                        
                            <form class="form-category-admin" action="{{ route('admin.categories.destroy',$category)}}" method="POST">
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function () {
        $('.form-category-admin').submit(function (e) {
            e.preventDefault();
            //SWAL
            const swalCustom = Swal.mixin({
            customClass: {
                confirmButton: 'custom-confirm',
                cancelButton: 'custom-cancel'
            },
            buttonsStyling: false
        });
        swalCustom.fire({
            icon: 'question',
            html: '<strong class="html-message">Are you sure you want to delete the category?</strong>',
            background: '#e9e9e8',
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed){
                //Se redirige
                $(this).unbind('submit').submit()
            }
        });
        });
    })
</script>