<body>
@include('header')
<div id="navbar-full">
    <div class="container">
        @include('navbar')
    </div><!--  end container-->

</div>
	<section class="itemsHome" style="background-image: url('/images/condo.jpg');">
    	<!-- <img src="{{ asset('/images/GettyImages-1151832961.jpg') }}" width="100%" /> -->
    </section>

    <input type="hidden" id="categoryid-items" value="{{ $data['categoryid'] }}"/> 
    <input type="hidden" id="category-type" value="{{ $data['type'] }}"/>
    <input type="hidden" id="sub-categoryid-items" value="{{ $data['subCatType'] }}"/>
    <div id="categoryItemsDiv">
    	</div>
@include('footer')
</body>