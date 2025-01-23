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
                            <li><a href="#">Personal Customizations</a></li>
                            <li class="active">Shop Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">

                <!-- content -->

             <form method="post" action="{{ url('/admin2/saveShopAboutDetails') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name"><img src="{{ Storage::url(optional($data['shopdetails'])->logo) }}" style="position: relative; width: 30px; border-radius: 2px;"/> {{ optional($data['shopdetails'])->shop_name }}</label>
                </div>
                <div class="form-group">
                    <label for="name">About:</label>
                    <textarea class="form-control" rows="5" name="about">{{ optional($data['shopdetails'])->about }}</textarea> 
                </div>
               
                    <button type="submit" class="btn btn-primary">Save</button>
            </form> 
        <!-- /#content -->
                
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
