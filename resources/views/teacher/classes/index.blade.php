<x-app-layout>
    <div class="flex flex-col items-center py-10 bg-backimg">
        <h1 class="text-xl font-bold text-blue-900 py-5">My classes</h1>
        <div class="items-center justify-start">
            <a href="{{route('teacher.create.class')}}">
                <button class="mb-6 px-6 py-2 bg-yellow-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Create a new class
                </button>
            </a>
        </div>
        @if (session('info'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success</strong>
                <span class="block sm:inline">{{session('info')}}</span>
            </div>
        @endif
        <table class="self-center shadow-lg bg-white">
            <thead class="bg-red-400 text-white">
                <th class="border px-8 py-4">ID</th>
                <th class="border px-8 py-4">Class Date</th>
                <th class="border px-8 py-4">Class Start</th>
                <th class="border px-8 py-4">Class End</th>
                <th class="border px-8 py-4">Class Status</th>                
                <th class="border px-8 py-4">Actions</th>
            </thead>
            <tbody>
                @foreach($list as $item)
                <tr>
                    <td class="border px-8 py-4">{{$item->id}}</td>
                    <td class="border px-8 py-4">{{$item->class_date}}</td>
                    <td class="border px-8 py-4">{{$item->class_start}}</td>
                    <td class="border px-8 py-4">{{$item->class_end}}</td>
                    <td class="border px-8 py-4 flex flex-col items-center">{{$item->status}}</td>                     
                    <td>
                        <a href="{{route('teacher.edit.class',$item->id)}}">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 m-1 rounded">
                                Edit
                            </button>
                        </a>
                        <a class="deleteclass" valId="{{$item->id}}">
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 m-1 rounded">
                                Delete
                            </button>
                        </a>
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
        $('.deleteclass').click(function (e) {
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
                //Se elimina la clase
                window.location.href = "http://127.0.0.1:8000/teacher/deleteclass/"+$(this).attr("valId");
            }
        });
        });
    })
</script>