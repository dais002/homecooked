<x-app>
  <div class="container p-16 mx-auto">
    <div class="w-full md:w-3/4 lg:w-1/2 xl:w-1/3 rounded overflow-hidden shadow-lg rounded-all mx-auto bg-storecard p-6">
      <div class="px-6 py-4">
        <div class="text-center flex flex-col justify-between font-bold">
          <h1 class="tracking-widest font-black border-b-8 border-nav">HOME-CHEF PROGRAM</h1>
          <h3 class="tracking-wide py-2 font-oxygen">Begin sharing your home creations!</h3>
          <h3 class="tracking-wide py-1 font-oxygen">Special Starter Package</h3>

          <h1 class="tracking-wide py-4">$50/month</h1>
          <h4 class="border-b-2 border-gray-300 py-2 tracking-wide font-oxygen">Run your own store, share up to 3 items!</h4>
        </div>

        <div class="flex justify-center">
          <div class="tracking-wide mt-4 font-bold text-xl">Subscribe below:</div>
        </div>

        <div class="mt-6">
          <div class="w-full mx-auto py-2 mb-4">
            <label for="card-holder-name" class="tracking-wide">Card Holder Name:</label>
            <input id="card-holder-name" type="text" class="w-full py-2 px-4 mb-2 text-sm border border-gray-300">

            <label for="card-element" class="tracking-wide">Credit or Debit Card:</label>
            <div id="card-element" class="border border-gray-300 px-4 py-2 bg-white">
              <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert" class="mb-4"></div>
            <div>
              <button type="submit" id="card-button" data-secret="{{ $intent->client_secret }}" class="bg-darkblue text-white rounded py-2 px-4 hover:bg-blue-700 mr-4 tracking-wider">Add Payment</button>
              <a href="{{ URL::previous() }}" class="hover:underline tracking-wider">Cancel</a>
              <x-modal submit-label="Ok">
                <x-slot name="trigger">
                  <button hidden @click="on = true" id="subscribed-modal"></button>
                </x-slot>
                Subscribed! Proceed to creating your store.
              </x-modal>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    console.log('script ran');
    window.addEventListener('load', () => {
      console.log('script inside listener');
      // Create a Stripe client.
      const stripe = Stripe('{{env("STRIPE_KEY")}}');

      // Create an instance of Elements.
      const elements = stripe.elements();

      // Create an instance of the card Element.
      const cardElement = elements.create('card');

      // Add an instance of the card Element into the `card-element` <div>.
      cardElement.mount('#card-element');

      // adding subscription payment method.
      const cardHolderName = document.getElementById('card-holder-name');
      const cardButton = document.getElementById('card-button');
      const clientSecret = cardButton.dataset.secret;

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
          console.log('card verification success', setupIntent.payment_method);

          axios.post('subscribe', {
              payment_method: setupIntent.payment_method,
              plan: 'standard',
            })
            .then(res => {
              console.log('axios post success');
              window.location.replace('http://localhost:8000/stores/create');
              document.getElementById('subscribed-modal').click();
            })
            .catch(err => alert('Subscription Unsuccessful.  Please check your payment method.'));
        }
      })
    })
  </script>
</x-app>