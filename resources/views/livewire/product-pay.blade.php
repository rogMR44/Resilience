<div>
    <div class="card">
        <div class="card-body">

            <div class="flex justify-between items-center mb-4">
                <h1 class="text-lg font-bold text-gray-700">Payment Method</h1>
                <img class="h-8" src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" alt="">
            </div>
            
            <form id="card-form">
                <form-group>
                    <label class="form-label">Card Name</label>
                    <input class="form-control" id="card-holder-name" type="text" placeholder="Enter the card owner's name" required>
                </form-group>
                <!-- Stripe Elements Placeholder -->
                <div class="form-group mt-2">
                    <label class="form-label">Card Number</label>
                    <div class="form-control" id="card-element"></div>
                    <span class="invalid-feedback" id="card-error"></span>
                </div>
    
                <button class="btn btn-primary" id="card-button">
                    Process Payment
                </button>
            </form>
        </div>
    </div>

    @slot('js')       
        <script>
            document.addEventListener('livewire:load',function(){
                stripe();
            })
            Livewire.on('resetStripe',function(){
                document.getElementById('card-form').reset();
                stripe();
                alert('Purchase successful');
            })
            Livewire.on('errorPayment',function(){
                document.getElementById('card-form').reset();
                stripe();
                alert('There was an error while performing transaction, please try again');
            });

        </script> 
        <script>
            function stripe(){
                const stripe = Stripe("pk_test_51IuRmHJYXILAdvXFIabdtQtRckqG4XsqKchHdV6hqZ06l5DiEn6Fseu3m1YWpa4YQKUSqQfIPLdL3dSSGUsLDTuA00wWBDWeaq");
        
                const elements = stripe.elements();
                const cardElement = elements.create('card');
            
                cardElement.mount('#card-element');

                //payment method
                const cardHolderName = document.getElementById('card-holder-name');
                const cardButton = document.getElementById('card-button');
                const cardForm = document.getElementById('card-form');

                cardForm.addEventListener('submit', async (e) => {

                    e.preventDefault();

                    const { paymentMethod, error } = await stripe.createPaymentMethod(
                        'card', cardElement, {
                            billing_details: { name: cardHolderName.value }
                        }
                    );

                    if (error) {
                        // Display "error.message" to the user...
                        document.getElementById('card-error').textContent=error.message;
                    } else {
                        // The card has been verified successfully...
                        Livewire.emit('paymentMethodCreate', paymentMethod.id);
                    }
                });
                }
        </script>
    @endslot    
</div>
