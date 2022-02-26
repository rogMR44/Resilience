<x-app-layout>
    <div class="grid sm:grid-cols-1 md:grid-cols-8">
        <div class="flex items-center justify-center col-span-4">
            <div class="card mt-4 max-w-sm justify-center">
                <div class="px-4 py-2 bg-red-400 flex justify-between items-center">                    
                    <p class="text-gray-200 font-bold text-xl">${{$product->price}} USD</p>                    
                </div>
                <img class="rounded-full w-50 h-50" src="@if($product->productImage) {{ url('storage/' . $product->productImage->url) }} @else https://cdn.pixabay.com/photo/2020/09/10/14/43/kids-5560586_960_720.jpg @endif" alt="user avatar">
                <div class="card-body">
                    <h1 class="text-gray-900 font-bold text-xl uppercase">20 {{$product->title}}</h1>
                    <p class="text-gray-600 text-sm mt-1">{!! $product->description !!}</p>
                </div>
            </div>
        </div>
        <div class="col-span-4 max-w-lg mt-4">            
                @livewire('product-pay', ['product' => $product])            
        </div>
    </div>
</x-app-layout>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function () {
        //  $('#card-form').submit(function (e) {
        //     e.preventDefault();
        //     //Ocupar alertas de SweetAlert, espera que se acepte el campo
        
        // const swalCustom = Swal.mixin({
        //     customClass: {
        //         confirmButton: 'custom-confirm',
        //         cancelButton: 'custom-cancel'
        //     },
        //     buttonsStyling: false
        // });
        // swalCustom.fire({
        //     icon: 'question',
        //     html: '<strong class="html-message">Are you sure you want to proceed to pay?</strong>'+
        //     '<p>This action is not reversible.</p>',
        //     background: '#e9e9e8',
        //     showCancelButton: true,
        //     confirmButtonText: 'Confirm',
        //     cancelButtonText: 'Cancel',
        // }).then((result) => {
        //     if (result.isConfirmed){
        //         //Se hace la operación normal de enviar datos
        //         $(this).unbind('submit').submit()
        //     }
        // });
        // });
    })
</script>