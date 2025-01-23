@include('header')
	<section class="itemsHome">
    	<img src="{{ asset('images/big-slider.jpg') }}" width="100%" />
    </section>

    <div class="pageBar">
        <div class="container">
            <div class="d-flex" style="padding: 15px;">
                <div class="mr-auto p-2">home / my account</div>
                <div class="p-2">
                	my account
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="container-fluid mt-4" style="position: relative;">
    	<div class="row" style="position: relative; padding-top: 55px; padding-bottom: 52px;">
            <div class="col-lg-8 col-md-8 col-sm-12">

                <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th>Transaction ID</th>
                        <th>Amount</th>
                        <th>Quantity</th>
                        <th>Processed</th>
                        <th>Date Purchased</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($data['transactions'] as $transaction)
                      <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>₵{{ $transaction->total_price }}</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>{{ $transaction->processed }}</td>
                        <td>{{ $transaction->created_at }}</td>
                      </tr>
                        @endforeach
                    </tbody>
                </table> 

            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">hi {{ Auth::user()->name }}</h4>
                      @foreach($data['stats'] as $stat)
                        <ul class="list-group">
                          <li class="list-group-item">Total Orders: <b>{{ $stat->numberoftransactions }}</b></li>
                          <li class="list-group-item">Total Items bought: <b>{{ $stat->totalquantity }}</b></li>
                          <li class="list-group-item">Total amount spent: <b>₵{{ $stat->totalprice }}</b></li>
                        </ul> 
                        @endforeach
                    </div>
                </div>
            </div>
    		
        </div>
    </div>
@include('newsletter')
@include('footer')