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
        <form action="/receipt" method="post" class="needs-validation">
            {{ csrf_field() }}
        <input type="hidden" name="cartItems" value="{{ json_encode($data['cart']) ?? '' }}" id='cartHidden' class="cartItems"/>
    	<div class="row">
            <div class="col-lg-2 col-md-2 col-sm-1">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-11">
                 
                    <div class="row">
                        <h3>Billing Details</h3>
                    </div>
                <div class="form-row">
                    <div class="col">
                        <label for="firstname">First Name:</label>
                      <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname" value="{{ $data['user']->name ?? '' }}" required>
                    </div>
                    <div class="col">
                        <label for="lastname">Last Name:</label>
                      <input type="text" class="form-control" placeholder="Last Name" name="lastname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" class="form-control" placeholder="Enter Country" id="country" name="country"  required>
                </div>
                <div class="form-group">
                    <label for="state">State:</label>
                    <input type="text" class="form-control" placeholder="Enter State" id="state" name="state"  required>
                </div>
                <div class="form-group">
                    <label for="zip">Zip:</label>
                    <input type="text" class="form-control" id="zip" name="zip">
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="email">Email:</label>
                      <input type="email" class="form-control" id="email" placeholder="First Email" name="email" value="{{ $data['user']->email ?? '' }}" required>
                    </div>
                    <div class="col">
                        <label for="contact">Contact:</label>
                      <input type="text" class="form-control" placeholder="Contact Number" name="contact"  value="{{$data['user']->contact_number ?? '' }}" required>
                    </div>
                </div>
                 
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="row amount-div mx-auto my-3">
                    <input type="hidden" name="totalQuantity" value="{{ $data['quantity'] }}">
                    <input type="hidden" name="totalPrice" value="{{ $data['price'] }}">
                    <div class="col-12">
                    <div class="row my-2">
                        <h4>Cart Totals</h4>
                    </div>
                    <div class="row my-4">
                        <span><b>Sub Total</b>: </span> ₵{{ $data['price'] }}
                    </div>
                    <div class="row my-4">
                        <span><b>Shipping</b>: </span> ₵0
                    </div>
                    <div class="row my-4">
                        <span><b>Total</b>: </span> ₵{{ $data['price'] }}
                    </div>
                    <hr/>
                    <div class="row my-4">
                        @foreach($data['paymentmethods'] as $paymentmethod)
                        <div class="form-check mx-1">
                            <label class="form-check-label">
                                @if($paymentmethod->payment_method=="cash on delivery")
                                <input type="radio" class="form-check-input" name="paymentmethod" value="{{ $paymentmethod->id }}" checked>
                                @else
                                <input type="radio" class="form-check-input" name="paymentmethod" value="{{ $paymentmethod->id }}" >
                                @endif
                                {{ $paymentmethod->payment_method }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-dark form-control mx-auto" width="80%">Place Order</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    @include('footer')