@include('admin.head')

@include ('admin.modals')

<body>
    <!-- Left Panel -->
        @include ('admin.left-panel')
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header -->
            @include ('admin.right-panel-header')
        <!-- Header -->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Transactions</a></li>
                            <li class="active">Transactions</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">

                <!-- content -->

               <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">All Transactions</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Transaction ID</th>
                                            <th>Number of Items</th>
                                            <th>Unique items</th>
                                            <th>Total Price</th>
                                            <th>Payment Method</th>
                                            <th>Processed</th>
                                            <th>Ordered at</th>
                                            <th>Processed at</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data['transactions'] as $transaction)
                                        <form action="/admin2/processTransaction" method="post">
                                        {{ csrf_field() }}
                                        <input type='hidden' name='transactionid' value="{{ $transaction->t_id }}">
                                        <tr>
                                            <td>{{ $transaction->t_id }}</td>
                                            <td>{{ $transaction->quantity }}</td>
                                            <td>{{ $transaction->unique_item_quantity }}</td>
                                            <td>{{ $transaction->total_price }}</td>
                                            <td>{{ $transaction->payment_method }}</td>
                                        @if( $transaction->processed ==1)
                                            <td>Processed</td>
                                        @elseif($transaction->processed==0 || $transaction->processed==2)
                                            <td>
                                            <select name="processStatus" id="SelectCr" class="form-control-sm form-control">
                                                <option value="0">Pending</option>
                                               
                                                <option value="1">Processed</option>

                                                
                                            </select>
                                            </td>
                                            @endif
                                            <td>{{ $transaction->created_at }}</td>
                                            <td>{{ $transaction->updated_at }}</td>
                                            @if( $transaction->processed ==0)
                                            <td><button type="submit" class="btn btn-info edit-transaction mx-auto">Save</button></td>
                                            @elseif( $transaction->processed ==1)
                                            <td></td>
                                            @endif
                                        </tr>
                                        </form>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                {{ $data['transactions']->links() }}
                            </div>
                        </div>
                    </div>
               </div>
                    
            </div><!-- .animated -->
        </div><!-- .content -->

    </div><!-- /#right-panel -->

    <!-- Right Panel -->



<!-- <script src="{{ asset('admin/vendors/jquery/dist/jquery.min.js') }}"></script> -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('admin/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('admin/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/main.js') }}"></script>
<script src="{{ asset('admin/vendors/chosen/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/main.js') }}"></script>
<script src="{{ asset('admin/assets/js/customAdmin.js') }}"></script>

</body>

</html>
