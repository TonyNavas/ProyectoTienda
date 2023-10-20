<div>
    <div class="card shadow border-0 bg-light position-relative">
        <div class="card-body">
                <div wire:loading.flex class="spinner-grow text-primary p-2" role="status"></div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="fs-5 fw-bold text-muted">Método de pago</h1>
                <img style="width: 200px;" src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png"
                    alt="">
            </div>
            <form id="card-form">
                <div class="form-group mb-3">
                    <label class="form-label fw-semibold text-muted">Nombre de la targeta</label>
                    <input class="form-control" id="card-holder-name" type="text"
                        placeholder="Ingrese el nombre del titular de la targeta" required>
                </div>

                <!-- Stripe Elements Placeholder -->
                <div class="form-group">
                    <label class="form-label fw-semibold text-muted">Número de targeta</label>
                    <div class="form-control" id="card-element"></div>
                    <small class="text-danger" id="card-error"></small>
                </div>
                <button class="btn btn-primary mt-4" id="card-button">
                    Process Payment
                </button>
            </form>
        </div>
    </div>

</div>
<script>
    document.addEventListener('livewire:load', function() {
        stripe();

        Livewire.on('resetStripe', function() {
            document.getElementById('card-form').reset();
            stripe();

            alert('La compra se realizó con éxito')
        })
    });
</script>
<script>
    function stripe() {
        const stripe = Stripe("{{ env('STRIPE_KEY') }}");

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');

        // Método de pago
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const cardForm = document.getElementById('card-form');

        cardForm.addEventListener('submit', async (e) => {

            e.preventDefault();
            const {
                paymentMethod,
                error
            } = await stripe.createPaymentMethod(
                'card', cardElement, {
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            );

            if (error) {
                // Display "error.message" to the user...
                document.getElementById('card-error').textContent = error.message;
            } else {
                Livewire.emit('paymentMethodCreate', paymentMethod.id)
            }
        });
    }
</script>
