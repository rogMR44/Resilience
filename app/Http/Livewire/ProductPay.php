<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductPay extends Component
{
    public $product;

    protected $listeners = ['paymentMethodCreate'];

    public function mount(Product $product){
        $this->$product = $product;
    }
    public function render()
    {
        return view('livewire.product-pay');
    }

    public function paymentMethodCreate($paymentMethod){

        try {            
            $user = Auth::user();
                $user_id = $user->id;
                $currentclasses = $user->num_classes;
            auth()->user()->charge($this->product->price*100,$paymentMethod);
            
            $updating = DB::table('users')
                ->where('id',$user_id)
                ->update([
                    'num_classes' => $currentclasses+10                
                ]);
                return redirect()->route('purchase_success');                           
        } catch (Exception $e) {
            $this->emit('errorPayment');
        }

    }
}
