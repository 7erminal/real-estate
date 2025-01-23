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
    	<div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="table-responsive">
                <table class="table table-hover table-striped cart-items">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Item Info</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($data['cart'] as $cart)
                        <form method="post" action="/removeCartItem">
                            {{ csrf_field() }}
                      <tr class="itemRows">
                        <input type="hidden" name="itemid" class="itemid" value="{{ $cart[0]->iid }}">
                        <input type="hidden" name="itemquantity" class="itemquantity" value="{{ $cart[1]->quantity }}">
                        <input type="hidden" name="cart" value="{{ json_encode($data['cart']) }}" class="cartItems">
                        <td>
                            <div style="width: 80px;">
                                <img src="{{ Storage::url($cart[0]->image_path) }}" width="100%" />
                            </div>
                        </td>
                        <td>
                            <div><b><a href="/viewItemdesc/{{ $cart[0]->iid }}" class="linkToItems3">{{ $cart[0]->item_name }}</a></b></div>
                            <div style="position: relative; width: 75%" class="mx-auto"><small>{{ $cart[0]->description }}</small></div>
                            <div class="mx-auto"><button class="btn btn-outline-danger btn-sm" type="submit">Remove</button></div>
                        </td>
                        <td>
                            <div class="product_quantity ml-lg-auto mr-lg-auto text-center">
                            <span class="product_text product_num col">{{ $cart[1]->quantity }}</span>
                            <div class="qty_sub qty_button trans_200 text-center" onclick="quantityIncreaseOrDecrease({!! $cart[0]->iid !!},'decrease',{!! $cart[0]->quantity_available !!})"><span>-</span></div>
                            <div class="qty_add qty_button trans_200 text-center" onclick="quantityIncreaseOrDecrease({!! $cart[0]->iid !!},'increase',{!! $cart[0]->quantity_available !!})"><span>+</span></div>
                            </div>
                        </td>
                        <td class="totalamount">₵{{ $cart[0]->item_price * $cart[1]->quantity }}</td>
                      </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table> 
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <form action="/checkout" method="get">
                    {{ csrf_field() }}
                <input type="hidden" name="cartItems" class="cartItems" value="{{ json_encode($data['cart']) }}" id='cartHidden'/>
                <div class="row amount-div">
                    <div class="col-12">
                    <div class="row my-2">
                        <h4>Cart Totals</h4>
                    </div>
                    <div class="row my-4">
                        <span><b>Sub Total</b>: </span> ₵<span class="subTotal">{{ $data['price'] }}</span>
                    </div>
                    <div class="row my-4">
                        <span><b>Shipping</b>: </span> ₵0
                    </div>
                    <div class="row my-4">
                        <span><b>Total</b>: </span> ₵<span class="overallTotal">{{ $data['price'] }}</span>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-dark form-control mx-auto" width="80%">Place Order</button>
                    </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    @include('footer')