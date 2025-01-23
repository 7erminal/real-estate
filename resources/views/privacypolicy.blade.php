@include('header')
	<section class="itemsHome">
    	<img src="{{ asset('images/big-slider.jpg') }}" width="100%" />
    </section>

    <div class="pageBar">
        <div class="container">
            <div class="d-flex" style="padding: 15px;">
                <div class="mr-auto p-2">home / privacy policy</div>
                <div class="p-2">
                	Privacy Policy
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="container-fluid mt-4" style="position: relative;">
    	<div class="row" style="position: relative; padding-top: 55px; padding-bottom: 52px;">
            <div class="col-lg-6 col-md-8 col-sm-10 mx-auto">
                {{ $data['shopdetails']->privacy_policy }}
            </div>
    		
        </div>
    </div>
@include('newsletter')
@include('footer')