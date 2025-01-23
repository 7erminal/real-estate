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
                            <li class="active">Add Features</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">

                <!-- content -->
    <div class="row">
        <div class="col-6">
            <section class="card">
                <div class="card-header">
                                <strong class="card-title">Add Features</strong>
                            </div>
                <div class="card-body text-secondary">
        <div class="row mt-3" style="font-size: 19px; font-weight: 500;">
            <div class="col-12">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search Features" id="myInput" onkeyup="searchCategories()">
                    </div>
            <div class="col-12 mt-2">
                <form action="{{ url('/admin2/postFeature') }}" method="post" id="saveForm" enctype="multipart/form-data" class="form-horizontal">
                                {{ csrf_field() }}
                <div class="row">

                    <div class="col-5">
                        <input class="form-control mr-sm-2" type="text" placeholder="Add Feature" id="featureInput" name="featurename">
                    </div>
                    <div class="col-5">
                        <div><label for="file-input" class=" form-control-label">Upload Image</label></div>
                        <div><input type="file" id="file-input" name="imageFile" class="form-control-file form-control-sm"></div>
                    </div>
                    <div class="col-1">
                        <button class="ml-1 button-item-env" type="submit" style="border: none; color: black;">
                            <i class="fas fa-plus fa-lg button-item-inv" style="color: #0ea2fc;"></i>
                        </button>
                    </div>

                    <div class="col-1">      
                            <div class="mx-auto button-item-env" >
                                <i class="fas fa-minus fa-lg button-item-inv" style="color: #fc4f0e; border: none;" data-type='features' data-toggle="modal" data-target="#removeItems"></i>
                            </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
            <hr/>
        <div class="row">
            <table class="table table-hover">
                <thead class="thead-light">
                  <tr>
                    <th></th>
                    <th>Feature</th>
                    <th>Image</th>
                    <th></th>
                  </tr>
                </thead>
                
                <tbody id="feature-data">
                    @foreach ($data['features'] as $id=>$feature)
                    <input class="featureid" type="hidden" name='categoryid' value="{{ $feature->id }}" />
                  <tr class="noneditFields row{{ $id }}" value="row{{ $id }}">
                    <td><input type="checkbox" name='itemidcheck' value="{{ $feature->id }}" class='featureidcheck'></td>
                    <td>{{ $feature->feature }}</td>
                    <td><div style="width:80px; height: 84px; overflow: hidden; border: 1px solid #eff1f2; border-radius: 3px; background-color: white;"><img src='{{ Storage::url($feature->image_path) }}' alt='{{ Storage::url("noimage.jpg") }}' width="100%"/></div></td>
                    <td></td>
                  </tr>               
                    @endforeach
                </tbody>
            </table>
        </div>
                </div>
            </section>
        </div>


        <div class="col-6">
            <section class="card">
                <div class="card-header">
                                <strong class="card-title">Add Purposes</strong>
                            </div>
                <div class="card-body text-secondary">
        <div class="row mt-3" style="font-size: 19px; font-weight: 500;">
            <div class="col-12">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search purposes" id="myInput" onkeyup="searchCategories()">
                    </div>
            <div class="col-12 mt-2">
                <form action="{{ url('/admin2/postPurpose') }}" method="post" id="saveForm" enctype="multipart/form-data" class="form-horizontal">
                                {{ csrf_field() }}
                <div class="row">

                    <div class="col-5">
                        <input class="form-control mr-sm-2" type="text" placeholder="Add Purpose" id="purposeInput" name="purposename">
                    </div>
                    <div class="col-5">
                        <div><label for="file-input" class=" form-control-label">Upload Image</label></div>
                        <div><input type="file" id="file-input" name="imageFile" class="form-control-file form-control-sm"></div>
                    </div>
                    <div class="col-1">
                        <button class="ml-1 button-item-env" type="submit" style="border: none; color: black;">
                            <i class="fas fa-plus fa-lg button-item-inv" style="color: #0ea2fc;"></i>
                        </button>
                    </div>

                    <div class="col-1">      
                            <div class="mx-auto button-item-env" >
                                <i class="fas fa-minus fa-lg button-item-inv" style="color: #fc4f0e; border: none;" data-type='purposes' data-toggle="modal" data-target="#removeItems"></i>
                            </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
            <hr/>
        <div class="row">
            <table class="table table-hover">
                <thead class="thead-light">
                  <tr>
                    <th></th>
                    <th>Purpose</th>
                    <th>Image</th>
                    <th></th>
                  </tr>
                </thead>
                
                <tbody id="purpose-data">
                    @foreach ($data['purposes'] as $id=>$purpose)
                    <input class="categoryid" type="hidden" name='categoryid' value="{{ $purpose->id }}" />
                  <tr class="noneditFields row{{ $id }}" value="row{{ $id }}">
                    <td><input type="checkbox" name='itemidcheck' value="{{ $purpose->id }}" class='categoryidcheck'></td>
                    <td>{{ $purpose->purpose }}</td>
                    <td><div style="width:80px; height: 84px; overflow: hidden; border: 1px solid #eff1f2; border-radius: 3px; background-color: white;"><img src='{{ Storage::url($purpose->image_path) }}' alt='{{ Storage::url("noimage.jpg") }}' width="100%"/></div></td>
                    <td></td>
                  </tr>               
                    @endforeach
                </tbody>
            </table>
        </div>
                </div>
            </section>
        </div>
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
