@include('header')
	<section class="itemsHome">
    	<img src="{{ asset('images/big-slider.jpg') }}" width="100%" />
    </section>

    <div class="pageBar">
        <div class="container">
            <div class="d-flex" style="padding: 15px;">
                <div class="mr-auto p-2">home / FAQs</div>
                <div class="p-2">
                	FAQs
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="container-fluid mt-4" style="position: relative;">
    	<div class="row" style="position: relative; padding-top: 55px; padding-bottom: 52px;">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <ul class="list-group">
                    @foreach($data['FAQs'] as $FAQ)
                    <li class="list-group-item">
                        <button data-toggle="collapse" data-target="#demo" class="btn btn-block">{{ $FAQ->comment }}</button>
                        <div id="demo" class="collapse">
                            {{ $FAQ->answer }}
                        </div>
                    </li>
                    @endforeach
                </ul>       
            </div>
    		
        </div>
    </div>
@include('newsletter')
@include('footer')