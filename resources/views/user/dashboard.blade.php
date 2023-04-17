@include('user.layouts.app')

<div class="wrapper">
    <title>Laravel 5 - Stripe Payment Gateway Integration Example - ItSolutionStuff.com</title>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    @include('user.layouts.mobile-navigation')

    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
<script>
$(function() {
    $('.paymentSuccessful').modal('show');
});
</script>
@endif

        <!-- banner section starts here -->
        <section class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 my-auto">
                        <h1>Business Training</h1>
                        <p class="m-grey-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>

                        @if($payment_status==0)
                        <button class="site-btn green-btn py-2 px-5" data-toggle="modal" data-target=".paymentMethod">Pay</button>
                        @else
                        <a class="site-btn green-btn py-2 px-5" href="{{ url('vendor/trainingdetails/'.$user->training_id)}}">View</a>
                        @endif
                    </div>
                    <div class="col-lg-8 py-5">
                        <img src="{{asset('user/images/banner.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <img src="{{asset('user/images/circle.png')}}" alt="" class="img-fluid banner-circle">
            <img src="{{asset('user/images/triangle-comp.png')}}" alt="" class="img-fluid banner-triangle">
        </section>
        <!-- banner section ends here -->
        
        <!-- explainer section starts here -->
        <section class="explainer">
            <div class="container px-lg-5">
                <h3>Explainer Video</h3>
                <img src="{{asset('user/images/banner-video.png')}}" alt="" class="img-fluid mt-4 w-100" data-toggle="modal" data-target=".viewVideo">
            </div>
            <img src="{{asset('user/images/arrow.png')}}" alt="" class="img-fluid banner-circle">
            <img src="{{asset('user/images/circle-sm.png')}}" alt="" class="img-fluid banner-triangle">
        </section>
        <!-- explainer section ends here -->

        <div class="modal fade paymentMethod" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content site-modal">
                    <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>
                    <div class="text-center">
                        <h6>Payment</h6>
                        <p class="p-lg bold grey-text">Choose A Payment Method</p>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary left-round px-4 py-2 active">
                                <input type="radio" name="options" id="option1" checked> Credit/Debit Card
                            </label>
                            <label class="btn btn-secondary right-round px-5 py-2">
                                <input type="radio" name="options" id="option2"> Visa Card
                            </label>
                        </div>
                        <div class="pay-card mt-4 mx-lg-5">
                            <div class="d-flex justify-content-between align-items-center p-4">
                                <div>
                                    <h4 class="p-sm bold mb-0">{{$user->trainings->training_name}}</h4>
                                    <h6>${{$user->amount}}</h6>
                                </div>
                                <img src="{{asset('user/images/payment.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <form role="form" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_test_SXt8FbbMML39oxl7DSe0Hovs" id="payment-form">
                         @csrf
                            <div class="container-fluid">
                                <div class="row">
                                    <input type="hidden" id="amount" value="{{$user->amount}}"> 
                                    <div class="col-12">
                                        <input type="text" class="site-input mt-5 w-100 py-3" placeholder="Card Holder Name">
                                        <input type="number" class="site-input w-100 mt-3 py-3 card-number" placeholder="Card Number">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="number" class="site-input w-100 mt-3 py-3 card-cvc" placeholder="CVV">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="site-input w-100 mt-3 py-3 card-expiry-month" placeholder='MM'>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="site-input w-100 mt-3 py-3 card-expiry-year" placeholder="YYYY">
                                    </div>
                                    <div class="col-12">
                                        <p class="mt-3">
                                            <input type="checkbox" id="c1" name="cb">
                                            <label for="c1" class="m-grey-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @if($payment_status!=null)
                            <button class="site-btn d-inline-block mt-4 py-3 px-5" type="submit">
                            Pay</button>    
                            @else
                            <button class="site-btn d-inline-block mt-4 py-3 px-5" type="submit">
                            Pay</button>    
                            @endif    
                        </form>   
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade paymentSuccessful" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content site-modal">
                    <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

                    <div class="text-center">
                        <div class="modal-icon-div">
                            <i class="fas fa-check modal-icon"></i>
                        </div>
                        <h6 class="grey-text">Payment Successful</h6>
                        <a href="{{route('vendor.dashboard')}}" class="site-btn d-inline-block mt-4 py-3 px-5">Okay</a>
                    </div>
                </div>
            </div>
        </div>

         <div class="modal fade paymentFailed" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content site-modal">
                    <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

                    <div class="text-center">
                        <div class="modal-icon-div">
                            <i class="fas fa-check modal-icon"></i>
                        </div>
                        <h6 class="grey-text">Payment Failed</h6>
                        <a href="{{route('vendor.dashboard')}}" class="site-btn d-inline-block mt-4 py-3 px-5">Okay</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade viewVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content site-modal">
                    <i class="fas fa-times close modal-close" data-dismiss="modal" aria-label="Close"></i>
                    <div class="text-center">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/EngW7tLk6R8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>


    @include('user.layouts.site-footer')
    </div>

    <div class="overlay"></div>


  
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
           $('.paymentMethod').removeClass('show');
            $('.paymentFailed').modal('show');
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            let amount = $('#amount').val();
            // insert the token into the form so it gets submitted to the server
            $.ajax({
          url: "{{route('stripe.post')}}",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            stripeToken:token,
            amount:amount,
          },
          success:function(response){
            $('.paymentMethod').removeClass('show');
            $('.paymentSuccessful').modal('show');
          },
         });
        }
    }
  
});
</script>
</html>



@include('user.layouts.footer')
