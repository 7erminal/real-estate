@include('header')
<section class="itemsHome">
        <img src="{{ asset('images/shoesandbag4.jpg') }}" width="100%" />
    </section>

    <div class="pageBar">
        <div class="container">
            <div class="d-flex" style="padding: 15px;">
                <div class="mr-auto p-2">home / cart </div>
                <div class="p-2">Test</div>
            </div>
        </div>
    </div>
    <hr/>

    <div class="container-fluid my-4" style="position: relative;">
        <form action="post" method="/receipt">
            {{ csrf_field() }}
        <input type="hidden" name="cart" value="{{ json_encode($data['cart']) }}" id='cartHidden'/>
    	<div class="row">
            <div class="col-lg-2 col-md-2 col-sm-1">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-11"> 
                <div style="position: relative; width: 100%;">
                    <img src="{{ asset('images/shoppingBag.jpg') }}" width="100%" />
                </div>
                <div class="jumbotron text-center">
                    <h1 class="display-3">Thank You for shopping!</h1>
                    <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>
                    <hr>
                    <p>
                        Having trouble? <a href="">Contact us</a>
                    </p>
                    <p class="lead">
                        <a class="btn btn-primary btn-sm" href="{{ url('/') }}" role="button">Continue shopping</a>
                    </p>
                </div>

                <div class="row">
                    <span>Follow Us</span>
                    <div class="social-icons mx-auto">
                        <i class="fab fa-facebook-f fa-lg"></i>
                        <i class="fab fa-twitter fa-lg mx-2"></i>
                        <i class="fab fa-instagram-square fa-lg"></i>
                    </div>
                </div>
                 
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="row amount-div mx-auto my-3">
                    <div class="col-12">
                    <div class="row my-2">
                        <h4>Order Details</h4>
                    </div>
                    <div class="row my-4">
                        <span><b>Sub Total</b>: </span> ₵{{ $data['totalPrice'] }}
                    </div>
                    <div class="row my-4">
                        <span><b>Shipping</b>: </span> ₵0
                    </div>
                    <div class="row my-4">
                        <span><b>Total</b>: </span> ₵{{ $data['totalPrice'] }}
                    </div>
                    <!-- <div class="row">
                        <button type="button" class="btn btn-dark form-control mx-auto" width="80%">Place Order</button>
                    </div> -->
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    @include('footer')