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
                            <li><a href="#">Add Item</a></li>
                            <li class="active">Items</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">

                <!-- content -->
        <div class="row mt-3" style="font-size: 19px; font-weight: 500;">
            <div class="col-12" id="accordion">
                <div class="row">
                    <div class="col-3">
                        <div id="addItemButton"></div>
                        <input type="hidden" value="{{ $data['categories'] }}" id="categories" />
                        <input type="hidden" value="{{ $data['features'] }}" id="features" />
                        <input type="hidden" value="{{ $data['purposes'] }}" id="purposes" />
                    </div>
                    <div class="col-3">      
                            <div class="mx-auto button-item-env" >
                                <button class="btn button-item-inv removeItemBtn" type='button' style="border: none; color: black;" data-toggle="modal" data-target="#removeItems" data-type='items' disabled><i class="fas fa-minus fa-lg" style="color: #fc4f0e; border: none;"></i>&nbsp; Remove Items</button>
                            </div>
                    </div>
                    <div class="col-6">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search item names" id="myInput" onkeyup="searchItems()">
                    </div>
                </div>
            </div>
        </div>
            <hr/>
        <div class="row">
            <table class="table table-hover">
                <thead class="thead-light">
                  <tr>
                    <th></th>
                    <th>Item Name</th>
                    <th>Item Category</th>
                    <th>Quantity</th>
                    <th>Available Sizes</th>
                    <th>Number of rooms</th>
                    <th>Images</th>
                    <th>Number of washrooms</th>
                    <th>Price</th>
                    <th>Date Added</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                
                <tbody id="item-data">
                    @foreach ($data['items'] as $id=>$item)
                    <form action="/admin2/saveItem" method="get">
                    {{ csrf_field() }}
                    <input class="itemid" type="hidden" name='itemid' value="{{ $item->it_id }}" />
                  <tr class="noneditFields row{{ $id }}" value="row{{ $id }}">
                    <td><input type="checkbox" name='itemidcheck' value="{{ $item->it_id }}" class='itemidcheck'></td>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->quantity_available }}</td>
                    <td>{{ $item->available_sizes }}</td>
                    <td>{{ $item->number_of_rooms }}</td>
                    <td><div style="width:80px; height: 84px; overflow: hidden; border: 1px solid #eff1f2; border-radius: 3px; background-color: white;"><img src='{{ Storage::url($item->image_path) }}' width="100%"/></div></td>
                    <td>{{ $item->number_of_washrooms }}</td>
                    <td>{{ $item->symbol }} {{ $item->item_price }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td></td>
                    <td><button type="button" class="btn btn-info edit-item" value="row{{ $id }}">edit</button></td>
                  </tr>

                  <tr class="editFields row{{ $id }}e">
                    <td></td>
                    <td><input type="text" class="form-control form-control-sm" name="itemname" value="{{ $item->item_name }}"></td>
                    <td>
                        <input type="hidden" value="{{ $item->category }}" id="selectedCatVal" class="selectedCatVal" name="category" />
                        <div id="catChangeButton" class="catChangeButton"></div>
                    </td>
                    <td><input type="text" class="form-control form-control-sm" name="quantity" value="{{ $item->quantity_available }}"></td>
                    <td><input type="text" class="form-control form-control-sm" name="sizes" value="{{ $item->available_sizes }}"></td>
                    <td><input type="text" class="form-control form-control-sm" name="noOfRooms" value="{{ $item->number_of_rooms }}"></td>
                    <td>

                        <div class="imageDiv">
                            <img src='{{ Storage::url($item->image_path) }}' width="100%"/>
                            <!-- <div class="blue"></div> -->
                            <div class='addMorePicsEdit' data-toggle='modal' data-target="#itemImages" data-itemid="{{ $item->it_id }}"><i class="fas fa-dice-d6 fa-2x"></i></div>
                        </div>

                    </td>
                    <td><input type="text" class="form-control form-control-sm" name="noOfWashrooms" value="{{ $item->number_of_washrooms }}"></td>
                    <td class="btn-group">
                        <select name="currency" id="SelectCr" class="form-control-sm form-control">
                            <option value="{{ $item->cr_id }}">{{ $item->symbol }}</option>
                                @foreach($data['currencies'] as $currency)
                                <option value="{{ $currency->id }}">{{ $currency->symbol }}</option>
                                @endforeach
                        </select>
                        <input type="text" class="form-control form-control-sm" name="price" value="{{ $item->item_price }}" style="width: 55px;">
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td><i class="fas fa-caret-right moreDetails-caret" data-toggle="modal" data-target="#otherDetails" data-purpose="{{ $item->suitable_purposes }}" data-description="{{ $item->description }}" data-itemid="{{ $item->it_id }}"></i></td>
                    <td><button type="submit" class="btn btn-primary">save</button></td>
                  </tr>
                  </form>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- /#content -->
                
            </div><!-- .animated -->
        </div><!-- .content -->

    </div><!-- /#right-panel -->

    <!-- Right Panel -->





    <!-- The Other Details Modal -->
<div class="modal" id="otherDetails">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit more items</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form method="get" action="{{ url('/admin2/saveMore') }}">
                            {{ csrf_field() }}
        <div class="modal-body">
          <input type='hidden' value="" class="selectedItemId" name="itemid" />
          <div class="row">
            <div class="form-group col">
                <div><label for="selectSm" class=" form-control-label">Select Purpose</label></div>
                <div class="form-group">
                    <select name="purpose" id="SelectLm" class="form-control-sm form-control modalEditPurpose">
                        @foreach($data['purposes'] as $id=>$purpose)
                        <option value="{{ $purpose->purpose }}">{{ $purpose->purpose }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="textarea-input" class="form-control-label">Description</label>
                    <textarea name="description" id="textarea-input" rows="2" placeholder="description..." class="form-control form-control-sm modalEditDescription"></textarea>
                </div>
            </div>

        
            </div>
            <button type="submit" class="btn btn-primary mx-2">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


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
