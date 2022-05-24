<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/mokejimas.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
@include('layouts.header')
<body>
    @php
    $stripe_key = 'pk_test_51Kb1UtJjjYTuymbzvuD2CdgDIoyLZVD3WZw07zKEyXIEQXnDQLuRezb2BSAPrQ3QWodSuR8J6skxSIzQIIaVu9KF00qvKDaXn8';
    @endphp
<div class="container mt-5 px-5">
    <div class="mb-4">
        <h2>Užpildykite laukus, norint nusipirkti <b>{{ $data }}€</b> - (3%+0.30€ mokestis) platformos valiutos</h2>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card p-3">
                <h6 class="text-uppercase">Banko kortelės duomenys</h6>
                <form action="{{route('mokejimas')}}"  method="post" id="payment-form">
                @csrf  
                <div class="inputbox mt-3"> <input type="text" name="name" id="name" class="form-control" required="required" placeholder="Vardas Pavardė ant kortelės"></div>
                        <div class="form-group">
                            <div class="card-header">
                                <label for="card-element">
                                    Banko kortelės duomenys
                                </label>
                            </div>
                            <div class="card-body">
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                                <input type="hidden" name="plan" value="" />
                            </div>
                        </div>

                <div class="mt-4 mb-4">
                    <h6 class="text-uppercase">Mokėtojo adresas</h6>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="inputbox mt-3 mr-2"> <input type="text" name="street" id="street" class="form-control" placeholder="Gatvė"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="inputbox mt-3 mr-2"> <input type="text" name="city" id="city" class="form-control" placeholder="Miestas"></div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="inputbox mt-3 mr-2"> <input type="text" name="country" id="country" class="form-control" placeholder="Šalis"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="inputbox mt-3 mr-2"> <input type="text" name="post-code" id="post-code" class="form-control" placeholder="Pašto kodas"></div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="suma" value="{{ $data }}" />
            <div class="mt-4 mb-4 d-flex justify-content-between"> <span></span> <button class="btn btn-success px-3" id="card-button" type="submit" data-secret="{{ $intent }}">Apmokėti {{ $data }}€</button></div>
        </div>
    </div>
</div>
<script src="js/main.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script>
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        
        const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
        
        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.
        
        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        
        // Handle form submission.
        var form = document.getElementById('payment-form');
        
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            
            stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                    //billing_details: { name: cardHolderName.value }
                }
            })
            .then(function(result) {
                console.log(result);
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    console.log(result);
                    form.submit();
                }
            });
        });
    </script>
        @include('layouts.footer')
    </body>
</html>