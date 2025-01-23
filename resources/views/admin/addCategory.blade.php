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
                <form action="{{ url('/admin2/postCategory') }}" method="post" id="saveForm" enctype="multipart/form-data" class="form-horizontal">
                                {{ csrf_field() }}
                <div class="row">
                    <div class="col-1">
                        <div id="addCategoryButton"></div>
                    </div>
                    <div class="col-4">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search item names" id="myInput" onkeyup="searchCategories()">
                    </div>
                </div>
                </form>
            </div>
        </div>
            <hr/>
        <div id="categories_div"></div> 
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
