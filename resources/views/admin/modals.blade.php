
<!-- The Modal -->
<div class="modal" id="removeItems">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
     <!--  <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div> -->

      <!-- Modal body -->
      <form method="get" action="{{ url('/admin2/selecteditems') }}" id="remove-form">
                            {{ csrf_field() }}
        <div class="modal-body">
          <input type='hidden' value="item[]" class="selectedItems" name="itemid" />
          <input type='hidden' value="" class="itemtype" name="itemtype" />
          <div class="container-fluid">
            <div class="row">
              <span class="mx-auto">
                Are you sure you want to remove these items?
              </span>
            </div>
            <div class="row mt-2">
              <div class="mx-auto">
                <button type="submit" class="btn btn-primary mx-2">Yes</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
 -->
    </div>
  </div>
</div>




<!-- The Item Images Modal -->
<div class="modal" id="itemImages">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit more items</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
        <div class="modal-body">
          <input type="hidden" name="itemid-images" class="itemid-images" value="">
          <div class="row my-1 no-gutters otherImagesRow">
              <input type="hidden" class="imagesAll" />
          </div>
          <div class="row my-2">
            <div class="form-group col">
              <div><label for="file-multiple-input" class=" form-control-label">Upload More Images</label></div>
              <div><input type="file" id="image-upload" name="image_upload[]" multiple="" class="image-upload"></div>
            </div>
          </div>
          <div class="btn-group">
            <button type="submit" class="update btn btn-primary mx-2">Save</button>
            <button type="button" class="edit btn btn-primary mx-2">Edit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
          </div>
          </form>
    </div>   
  </div>
</div>
  


<!-- The View Image Modal -->
<div class="modal" id="viewImage">
  <div class="modal-dialog">
    <div class="modal-content">
        <img src="" width="100%" class="expanded-image" />   
    </div>   
  </div>
</div>