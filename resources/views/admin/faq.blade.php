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
                            <li><a href="#">FAQs</a></li>
                            <li class="active">FAQs</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">

                <!-- content -->

               <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">FAQs</strong>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach($data['FAQs'] as $i=>$FAQ)
                                    <form method="post" action="{{ url('/admin2/postAnswer') }}">
                                        {{ csrf_field() }}
                                        <input type='hidden' name='id' value="{{ $FAQ->id }}"/>
                                    <li class="list-group-item">
                                        <button data-toggle="collapse" data-target="#demo" class="btn btn-block" type="button">{{ $FAQ->comment }}</button>
                                    <div id="demo" class="collapse">
                                        <div class="form-group">
                                            <label for="comment">Answer:</label>
                                            <textarea class="form-control" rows="4" id="answer" name="answer" required>{{ $FAQ->answer }}</textarea>
                                        </div>
                                        <button class="btn btn-info" type='submit'>Save</button>
                                    </div>
                                </li>
                                </form>
                                @endforeach
                            </ul>  
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
