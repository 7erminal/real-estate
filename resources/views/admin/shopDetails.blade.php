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

             <form method="post" action="{{ url('/admin2/saveShopDetails') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Shop Name:</label>
                    <input type="text" class="form-control" placeholder="Enter Shop Name" id="shopname" name="shopname" value="{{ optional($data['shopdetails'])->shop_name }}">
                </div>
                <div class="form-group">
                    <label for="contact">Contact Number:</label>
                    <input type="text" class="form-control" placeholder="Enter Contact Number" id="contact" name="contactnumber" value="{{ optional($data['shopdetails'])->contact_number }}">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" placeholder="Enter Address" id="address" name="address" value="{{ optional($data['shopdetails'])->address }}">
                </div>
                <div class="form-group">
                    <label for="logo">Logo:</label>
                    <div style="width:80px; height: 84px; overflow: hidden; border: 1px solid #eff1f2; border-radius: 3px; background-color: white;">
                        <img src="{{ Storage::url(optional($data['shopdetails'])->logo) }}" class='logoimg' width="100%"/>
                    </div>
                    <label for="logo">Change Logo:</label>
                    <input type="file" id="file-input" name="imageFile" class="form-control-file form-control-sm">
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
