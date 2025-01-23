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
                            <li><a href="#">Items</a></li>
                            <li class="active">Add Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">

                <!-- content -->
        <div class="row mt-3" style="font-size: 19px; font-weight: 500;">
            <div class="col-12">
                <form action="{{ url('/admin2/addImages') }}" method="post" id="saveForm" enctype="multipart/form-data" class="form-horizontal">
                                {{ csrf_field() }}
                    <input type="hidden" name="mediatype" value="picture">
                <div class="row">
                    <div class="col-3">
                        <div><label for="file-input" class=" form-control-label">Upload Images</label></div>
                        <div><input type="file" id="image-upload" name="imageFiles[]" class="image-upload" multiple></div>
                    </div>
                    <div class="col-1">
                        <button class="ml-1 button-item-env" type="submit" style="border: none; color: black;">
                            <i class="fas fa-plus fa-lg button-item-inv" style="color: #0ea2fc;"></i>&nbsp; <span class="button-item-inv">Add</span>
                        </button>
                    </div>

                </div>
                </form>
            </div>
        </div>
            <hr/>
        <div class="row">
            @foreach($data['media'] as $image)
                <div class="col-lg-3 col-sm-6 my-2">
                    <img src="{{ Storage::url($image->path) }}" width="100%" />
                </div>
            @endforeach
        </div> <!-- /#content -->
                
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
