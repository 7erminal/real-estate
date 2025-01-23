<body>
@include('header')
<div id="navbar-full">
    <div class="container">
        @include('navbar')
    </div><!--  end container-->

</div>
	<section class="itemsHome" style="background-image: url('/images/construction-real-estate-contractor-concept-residential-house-building-drawings-free-photo.jpg');">
    </section>

    <div class="pageBar">
        <div class="container">
            <div class="d-flex" style="padding: 15px;">
                <div class="mr-auto p-2">home / about</div>
                <div class="p-2">
                	about
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="container-fluid mt-4">
    	<div class="row" style="position: relative; width: 100%; padding-top: 55px; padding-bottom: 52px;">
            <div class="col-lg-6 col-md-8 col-sm-10 mx-auto">
                <div class="container">
                {{ $data['shopdetails']->about }}
                </div>
            </div>
        </div>
    </div>
@include('footer')
</body>