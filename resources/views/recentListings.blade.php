<section class="recent-listing-section">
    <div class="container-fluid">
            <div class="col-12">
                <h1 class="title">
                    View our recent listings
                    <br>
                    <small>There’s no place like home.</small>
                </h1>
                <div class="col-sm-10 col-sm-offset-1">
                @foreach($data['newListings'] as $item)
                    @include('item-col')
                @endforeach
                </div> 
            </div>
        <div class="space-200"></div>
    </div>
</section>