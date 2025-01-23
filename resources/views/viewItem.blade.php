<body>
@include('header')
<div id="navbar-full">
    <div class="container">
        <nav class="navbar navbar-ct-blue navbar-transparent navbar-fixed-top" role="navigation">
          
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/">
                     <div class="logo-container">
                        <div class="logo">
                            <img src="/images/UrbanLeaf.jpg">
                        </div>
                        <!-- <div class="brand">
                            Urban Leaf Properties
                        </div> -->
                    </div>
                </a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                    <li><a href="/categories?categoryid=all&type=category&subtype=0">Listings</a></li>
                    
                    <li><a href="#" class="btn btn-round btn-default">About</a></li>
               </ul>
              
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    </div><!--  end container-->

</div>
	<section class="itemsHome" style="background-image: url('/images/beachHouse.jpg');">
    	<!-- <img src="{{ asset('images/ladyFashion.jpg') }}" width="100%" /> -->
    </section>

    <div class="pageBar">
        <div class="container">
            <div class="d-flex" style="padding: 15px;">
                <div class="mr-auto p-2">home / properties / {{ $data['item'][0]->item_name }}</div>
                <div class="p-2">Test</div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="container my-4" style="position: relative;">
    	@foreach($data['item'] as $item)
    	<div class="row">
    		<input type="hidden" id="item" value="{{ $item }}">
            <div class="col-lg-1 col-md-1 col-sm-12">
            	@foreach($data['images'] as $image)
                <div class="row mb-1">
                	<div class="col-lg-12 col-md-12 col-sm-2">
                		<div class="small-view-item">
                			<img src="{{ Storage::url($image->image_path) }}" width="100%" />
                		</div>
                	</div>
                </div>
                @endforeach
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="single-item">
                    <img src="{{ Storage::url($item->image_path) }}" width="100%" />
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12">
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12">		
                <div class="row">
                    <h1>{{ $item->item_name }}</h1>
                </div>
                <div class="row mb-4">
                    <p>
                        <small>{{ $item->description }}</small>
                    </p>
                </div>
                <div class="row item-stats">
                    <div class="col-sm-4" style="display: flex; flex-direction: row; justify-content: center;">
                        <div>
                            <h6>Number of Rooms</h6>
                            <h4>{{ $item->number_of_rooms }}</h4>
                        </div>
                    </div>
                    <div class="col-sm-4" style="display: flex; flex-direction: row; justify-content: center;">
                        <div>
                            <h6>Number of Washrooms</h6>
                            <h4>{{ $item->number_of_washrooms }}</h4>
                        </div>
                    </div>
                    <div class="col-sm-4" style="display: flex; flex-direction: row; justify-content: center;">
                        <div>
                            <h6>Number of Balconies</h6>
                            <h4>{{ $item->number_of_rooms }}</h4>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <h3>₵{{ $item->item_price }}</h3>
                </div>
                <div class="row">
                    <div id="addToCartButtonDiv" class="my-3"></div>
                </div>
            </div>
        </div>
        @endforeach
        <hr/>

        <div class="row">
            <div class="col-12 relatedItems">
                <div class="row">
                    <span class="mx-auto"><h4>Related Items</h4></span>
                </div>

        <div class="row my-4">
        	@foreach($data['relatedItems'] as $item)
                @include('item-col')
            @endforeach 
        </div>
            </div>
        </div>
    </div>
@include('footer')
</body>