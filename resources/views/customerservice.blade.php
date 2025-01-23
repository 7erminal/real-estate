@include('header')
<section class="itemsHome">
        <img src="{{ asset('images/shoesandbag4.jpg') }}" width="100%" />
    </section>

    <div class="pageBar">
        <div class="container">
            <div class="d-flex" style="padding: 15px;">
                <div class="mr-auto p-2">home / customer service </div>
                <div class="p-2">Customer Service</div>
            </div>
        </div>
    </div>
    <hr/>

    <div class="container-fluid my-4" style="position: relative;">
        <form action="/addComment" method="post" class="needs-validation">
            {{ csrf_field() }}
        <input type="hidden" name="cartItems" value="{{ json_encode($data['cart']) }}" id='cartHidden'/>
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-1">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-11">
                 
                    <div class="row">
                        <h2>Customer experience is taken seriously here and we make sure to respond to enquiries and help out with your orders</h2><br/>
                        <h5>You can reach us through email, phone or simply fill the form below and we'll respond as soon as possible.</h5>
                    </div>
                <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input type="text" class="form-control" placeholder="First Name" id="firstname" name="firstname"  value="{{ $data['user']->name ?? '' }}" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name:</label>
                    <input type="text" class="form-control" placeholder="Last Name" id="lastname" name="lastname">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $data['user']->email ?? '' }}" required>
                </div>
                <div class="form-group">
                    <label for="contact">Contact:</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="{{ $data['user']->contact_number ?? '' }}" required>
                </div>

                <div class="form-group">
                    <label for="comment">Question or Comment:</label>
                    <textarea class="form-control" rows="4" id="comment" name="comment" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="row amount-div mx-auto my-3">
                    <div class="col-12">
                    <div class="row my-2">
                        <h4>Contact Us</h4>
                    </div>
                    <div class="row my-4">
                        <span>
                            <a href="{{ url('/') }}"><img src="{{ Storage::url($data['shopdetails']->logo) }}" class="logoImg3"/></a>
                        </span>
                    </div>
                    <div class="row my-4">
                        <span><b>Contact Number</b>: </span> {{$data['shopdetails']->contact_number }}
                    </div>
                    <div class="row my-4">
                        <span><b>Total</b>: </span>{{ $data['shopdetails']->address }}
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    @include('footer')