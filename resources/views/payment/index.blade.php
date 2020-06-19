<x-app>
  <div class="w-1/2 rounded overflow-hidden shadow-lg mx-auto">
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2 text-center">Subscribe</div>

      <div class="flex justify-around m-0 ">
        <select name="plan" id="subscription" class="w-full border border-gray-300 px-4 py-2 mb-4">
          @foreach ($plans as $key=>$plan)
          <option value="{{ $key }}">{{ $plan }}</option>
          @endforeach
        </select>
      </div>

      <input id="card-holder-name" type="text" placeholder="cardholder name..." class="w-full border border-gray-300 px-4 py-2 mb-4">

      <!-- Stripe Elements Placeholder -->
      <div id="card-element" class="border border-gray-300 px-4 py-2"></div>
    </div>
    <div class="px-6 py-4">
      <button id="card-button" class="inline-block bg-gray-200 rounded-lg px-3 py-1 text-sm font-semibold text-gray-700 mr-2" data-secret="{{ $intent->client_secret }}">
        Subscribe
      </button>
    </div>
  </div>

  @section('js')
  <script>
    window.addEventListener('load', function() {

      const stripe = Stripe('{{env("STRIPE_KEY")}}');

      const elements = stripe.elements();
      const cardElement = elements.create('card');

      cardElement.mount('#card-element');

      const cardHolderName = document.getElementById('card-holder-name');
      const cardButton = document.getElementById('card-button');
      const clientSecret = cardButton.dataset.secret;

      const plan = document.getElementById('subscription').value;

      cardButton.addEventListener('click', async (e) => {
        const {
          setupIntent,
          error
        } = await stripe.confirmCardSetup(
          clientSecret, {
            payment_method: {
              card: cardElement,
              billing_details: {
                name: cardHolderName.value
              }
            }
          }
        );

        if (error) {
          // Display "error.message" to the user...
        } else {
          console.log('handling success', setupIntent.payment_method);

          axios.post('/subscribe', {
            payment_method: setupIntent.payment_method,
            plan,
          })
        }
      });
    })
  </script>
  @endsection

</x-app>