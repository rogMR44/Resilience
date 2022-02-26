<div class="container py-10">
    <div class="flex flex-col items-center">
        <h1 class="text-xl font-bold">Posts</h1>
        @if (session('info'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success</strong>
                <span class="block sm:inline">{{session('info')}}</span>
            </div>
        @endif
        <div>
            <div class="flex items-center justify-start mt-4">
                <a href="{{route('admin.posts.create')}}">
                    <button class="px-6 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Create post
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="flex flex-col items-center">        
        <div>
            <label class="font-medium text-sm text-gray-700">Search for a post</label>
            <input wire:model="search" class="w-96 mt-6 ml-2 px-4 py-2 bg-gray-100 border rounded-md font-semibold text-xs text-black tracking-widest hover:bg-gray-100 active:bg-gray-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" placeholder="Enter post name">
        </div>
    </div>
    
    @if ($posts->count())
        <div class="flex flex-col items-center">        
            <div class="mt-4 flex items-center">
                <table class="shadow-lg bg-white">
                    <thead>
                        <tr>
                            <th class="border px-8 py-4">ID</th>
                            <th class="border px-8 py-4">Name</th>
                            <th class="border px-8 py-4 col-span-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td class="border px-8 py-4">{{$post->id}}</td>
                                <td class="border px-8 py-4">{{$post->name}}</td>
                                <td>
                                    <a href="{{ route('admin.posts.edit',$post)}}">
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 m-1 rounded">
                                            Edit
                                        </button>
                                    </a>
                                </td>
                                <td>                        
                                    <form class="form-post-admin" action="{{ route('admin.posts.destroy',$post)}}" method="POST">
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
        <div class="mt-6">
            {{$posts->links()}}
        </div>  
    @else      
        <strong class="flex flex-col items-center mt-8">No posts match the search</strong>
    @endif
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function () {
        $('.form-post-admin').submit(function (e) {
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
            html: '<strong class="html-message">Are you sure you want to delete the post?</strong>',
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
