<x-app>
  <div class="container p-20 mx-auto">
    <div class="w-1/3 rounded overflow-hidden shadow-lg rounded-all mx-auto bg-btn-green">
      <div class="px-6 py-4">
        <div class="text-center mb-4 flex flex-col justify-between h-64">
          <h2 class="font-bold tracking-wider">Share your home cookin'!</h2>
          <hr>

          <h3>Delight your local neighbors with your home creations.</h3>
          <h3>They win. You win.</h3>
          <hr>

          <h3 class="tracking-wider">Special Starter Promotion</h3>

          <h1 class="font-bold">$50/month</h1>
          <h3>Run your own store, share up to 3 items!</h3>

        </div>

        <h3 class="flex justify-center font-oxygen mt-6 font-bold">Enter your payment info below:</h3>

        <div class="mt-6">

          <div class="w-2/3 mx-auto py-2 mb-4">
            <label for="card-holder-name">Card Holder Name:</label>
            <input id="card-holder-name" type="text" class="w-full py-2 px-4 mb-2 text-sm border border-gray-300">

            <label for="card-element">Credit or Debit Card:</label>
            <div id="card-element" class="border border-gray-300 px-4 py-2 bg-white">
              <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert" class="mb-4"></div>
            <div>
              <button type="submit" id="card-button" data-secret="{{ $intent->client_secret }}" class="inline-block bg-gray-200 rounded-lg px-4 py-2 text-sm font-semibold">Add Payment</button>
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

          // this doesn't feel right, when i make a post request this way, it never hits the controller.
          axios.post('payment', {
            payment_method: setupIntent.payment_method,
            plan: 'standard',
          }).then(res => console.log(res, 'axios post success')).catch(err => console.log('error', err))
        }
      })
    })
  </script>

</x-app>