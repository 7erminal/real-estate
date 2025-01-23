// Search for an item in the search pane
function searchItems() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("item-data");
  li = ul.getElementsByTagName('tr');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("td")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
} // Fin

// Search for a category in the search pane
function searchCategories() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("category-data");
  li = ul.getElementsByTagName('tr');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("td")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
} // Fin

var removableItems = [];

jQuery('input[type="checkbox"][name="itemidcheck"]').change(function() {
    var the_id = jQuery(this).val();
     if(this.checked) {
         // do something when checked

         removableItems.push(the_id);

         

         jQuery('.selectedItems').val(removableItems);

         console.log("selected is "+jQuery('.selectedItems').val());
     }
     else {
         // do something when checked

         console.log("unnchecked is ");
         for( var i = 0; i < removableItems.length; i++){ 
          if ( removableItems[i] === the_id) { 
            removableItems.splice(i, 1); 
          }
        }

        jQuery('.selectedItems').val(removableItems);
     }

     if(removableItems.length>0){
        jQuery('.removeItemBtn').prop('disabled',false);
     } else {
        jQuery('.removeItemBtn').prop('disabled',true);
     }
 });

jQuery('.button-item-inv').off('click').on('click',function(){
  jQuery('.itemtype').val(jQuery(this).data('type'));
});

jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });

        console.log("Path out is "+jQuery('.logoimg').prop('src'));

        // This is test code to test the 
        // behavior of image display from jQuery to
        // laravel blade
        // jQuery('.testImage').attr('src','/storage/item-images/1585691174adidas2.jpg'); // Fin

        // console.log("Source url is "+jQuery('.rowz0').attr('src'));
        // console.log("Source url2 is "+jQuery('.testImage').attr('src'));

        // Edit Item
        jQuery('.editFields').hide();
        jQuery('.addMorePics').hide();
        // when you click on the edit button in the add items page, 
        //this code should execute
        jQuery('.edit-item').on('click',function(){

          var selectedClass = jQuery(this).val();

          // Execute this code to close all open edited items. 
        //Later Caching should be implemented here so when the 
        //user comes back, the items he/she edited in the previous 
        //edit item would still be there.
            jQuery('.editFields').css({
            "opacity":"0"
          });
            jQuery('.editFields').hide();
            jQuery('.noneditFields').css({
            "opacity":"1"
          });
            jQuery('.noneditFields').show();
        

          console.log("selected class is "+selectedClass);
          jQuery('.'+selectedClass).css({
            "opacity":"0"
          });
          jQuery('.'+selectedClass).hide();

          jQuery('.'+selectedClass+'e').css({
            "opacity":"1"
          });
          jQuery('.'+selectedClass+'e').show();

      
        }); // Fin

        // Click to show the edit modal for details that are
        // not showing in the main row
        jQuery('.moreDetails-caret').off('click').on('click',function(){
          var purpose = jQuery(this).data('purpose');
          var description = jQuery(this).data('description');
          var itemid = jQuery(this).data('itemid');

          jQuery('.modalEditPurpose').val(purpose);
          jQuery('.modalEditPurposeValue').html(purpose);
          jQuery('.selectedItemId').val(itemid);

          jQuery('.modalEditDescription').val(description);
          console.log("purpose is "+purpose+" and description is "+description);
        }); // Fin


        /*
          On click to add more images or view the other images of the 
          item being edited. The code below will execute once the 
          picture has been clicked.
        */
        jQuery('.addMorePicsEdit').off('click').on('click', addMorePicsModalExecute);


          function addMorePicsModalExecute (){
          
          // Execute the code below to wipe the images row clean
          jQuery('.otherImagesRow').html("<input type='hidden' class='imagesAll' />");

          // Get the item ID
          itemid=jQuery(this).data('itemid')
          itemid==undefined ? itemid=jQuery('.itemid-images').val(): "";
        
          // Set the item ID
          jQuery('.itemid-images').val(itemid);

          var formData = { 'id' : itemid }
          // Ajax call to get all the images for this item
          jQuery.ajax({
            type        : 'GET', // define the type of HTTP verb we want to use
            url         : '/admin2/itemimages', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
          error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
      }
            })
          .done(function(data) {

              console.log('items are '+data.images);

              jQuery('.image-upload').val("");
              
              jQuery.each(data.images, function(k, v){
                
                // var imagePath = "{{ Storage::url("+this.image_path+") }}";
                // var imagePath = "{{ url('storage/') }}"+this.image_path;
                var imagePath = "/storage/"+this.image_path;
                imageid = this.id;
                let isDefault = this.is_default;

                loadImage(imageid,imagePath,isDefault);

                // jQuery.when(imagePath)
                // .then(function(){
                //   console.log("Sending "+imageid+" to be configured");
                //   loadImage(imageid,imagePath);
                // });

              });
              
                });
        } // Fin

        function loadImage(imageid,imagePath,isDefault){
          console.log("image id received to be configured is "+imageid);
          let html = "<div class='col-2 imagesCol' data-imageid='"+imageid+"'><i class='fas fa-minus button-remove-image' data-imageid='"+imageid+"'></i><img src='"+imagePath+"' width='100%' class='ajaxImage' data-imageid='"+imageid+"'/><div class='ajaxImageButton' data-srcurl='"+imagePath+"' data-toggle='modal' data-target='#viewImage'></div><input type='radio' class='form-check-input isDefault' name='isdefault' data-imageid='"+imageid+"' data-isdefault='"+isDefault+"' value='"+imageid+"'/></div>";

          jQuery('.imagesAll').after(html);

          //Hide additional edit buttons
          jQuery('.button-remove-image').hide();
          jQuery('.isDefault').hide();

          // Click to view image in large format
        jQuery('.ajaxImageButton').off('click').on('click',expandImage);

        // check the default image
        jQuery('.isDefault').each(function(){
          if(jQuery(this).data('isdefault')==1){
            console.log("is default value is "+jQuery(this).data('isdefault'));
            jQuery(this).prop('checked',true);
          } 
        });

        // Click to remove image
        jQuery('.button-remove-image').off('click').on('click',function(){
          // Send image id to be removed
          removeImage(jQuery(this).data('imageid'));
        });

        imagestoremove = [];
        }


        // Upload an image or more images on
        /*Upload file::*/
      // Full Ajax request
        jQuery(".update").off('click').on('click',function(e) {
      // Stops the form from reloading
          e.preventDefault();
          jQuery.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="_token"]').attr('content')
              }
          });
            let itemid = jQuery('.itemid-images').val();
            let image_upload = new FormData();
            let TotalImages = jQuery('#image-upload')[0].files.length;  //Total Images
            let images = jQuery('#image-upload')[0];  
            let isdefault = jQuery('.isDefault:checked').val();

            console.log("is default id is "+isdefault);
            for (let i = 0; i < TotalImages; i++) {
            image_upload.append('images' + i, images.files[i]);
            }
            image_upload.append('TotalImages', TotalImages);

            image_upload.append('itemid', itemid);

            // for (let i = 0; i < imagestoremove.length; i++) {
            image_upload.append('imagestoremove', imagestoremove);
            // }

            image_upload.append('isdefault', isdefault);

            console.log("image upload data is "+image_upload);
        
            jQuery.ajax({
            url: '/admin2/saveMoreImages',
            type: 'POST',
            contentType:false,
            processData: false,
            data:image_upload,
                success: function(result) {
                alert(result.message);
                addMorePicsModalExecute(itemid);
                },
                error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
      }
            });
});
 /*Upload file::*/

        // Click to view image in large format
        jQuery('.ajaxImageButton').off('click').on('click',expandImage);

          function expandImage(){
          let imageurl = jQuery(this).data('srcurl');
          jQuery('.expanded-image').attr('src',imageurl);
        }

        // Click to edit images
        jQuery('.edit').off('click').on('click',editImages);

        /*
          Images can be edited in 2 ways.
          1. Remove image 
          2. Set default Image. A default image is the image that will be shown as the first image at all times for the customer. He/she will be able to view the other images only by checking more details of that item.

          The Configuration below displays these settings
        */
        function editImages(){
          //Show additional edit buttons
          jQuery('.button-remove-image').show();
          jQuery('.isDefault').show();
        }

        let imagestoremove = [];
        // To delete an image
        // On click to remove image via ajax
        jQuery('.button-remove-image').off('click').on('click',removeImage);


          function removeImage(imageid){

            jQuery('.imagesCol').each(function(){
              
              if(jQuery(this).data("imageid")==imageid){
                imagestoremove.push(imageid);
                jQuery(this).remove();

                console.log("images to remove array is "+imagestoremove);
                return false;
              } 
            });
          

      //     jQuery.ajaxSetup({
      //         headers: {
      //           'X-CSRF-TOKEN': jQuery('meta[name="_token"]').attr('content')
      //         }
      //     });

      //     var formData = {"imageid" : imageid};

      //     console.log('image ID being sent to process is '+formData.imageid);

      //     jQuery.ajax({
      //       url: '/admin2/removeImage',
      //       type: 'POST',
      //       data:formData,
      //       dataType    : 'json',
      //           error: function(xhr, desc, err) {
      //       console.log(xhr);
      //       console.log("Details: " + desc + "\nError:" + err);
      // }
      //       })
      //     .done(function(data) {
      //       jQuery('.imagesCol').each(function(){
      //         console.log("value is "+jQuery(this).val()+" and image id is "+imageid);
      //         if(jQuery(this).val()==imageid){
      //           jQuery(this).remove();
      //           return false;
      //         } 
      //       });
      //       console.log("returned data is "+data);
      //     });
        }

        jQuery( "#remove-form" ).submit(function( event ) {
          
          if(Array.isArray(removableItems) && removableItems.length){
          } else {
            event.preventDefault();
          }
        });

    }); // Fin Document Ready
