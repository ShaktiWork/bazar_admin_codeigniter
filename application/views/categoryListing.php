
<script>
 $( document ).ready(function() {
          $(".noimage_found").on("error", function(){
          $(this).attr('src', '<?php echo base_url();?>assets/img/noimage.jpg');
          
       });

    });
</script>


 <script type="text/template" id="qq-template-gallery">
        <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Drop files here">
            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
            </div>
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span class="qq-upload-drop-area-text-selector"></span>
            </div>
            <div class="qq-upload-button-selector qq-upload-button">
                <div>Upload a file</div>
            </div>
            <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Processing dropped files...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
            <ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">
                <li>
                    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                    <div class="qq-progress-bar-container-selector qq-progress-bar-container">
                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                    </div>
                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                    <div class="qq-thumbnail-wrapper">
                        <img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale>
                    </div>
                    <button type="button" class="qq-upload-cancel-selector qq-upload-cancel btn btn-primary btn-xs btn-mini">X</button>
                    <button type="button" class="qq-upload-retry-selector qq-upload-retry">
                        <span class="qq-btn qq-retry-icon" aria-label="Retry"></span>
                        Retry
                    </button>

                    <div class="qq-file-info">
                        <div class="qq-file-name">
                            <span class="qq-upload-file-selector qq-upload-file"></span>
                            <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                        </div>
                        <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                        <span class="qq-upload-size-selector qq-upload-size"></span>
                        <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">
                            <span class="qq-btn qq-delete-icon" aria-label="Delete"></span>
                        </button>
                        <button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">
                            <span class="qq-btn qq-pause-icon" aria-label="Pause"></span>
                        </button>
                        <button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">
                            <span class="qq-btn qq-continue-icon" aria-label="Continue"></span>
                        </button>
                    </div>
                </li>
            </ul>

            <dialog class="qq-alert-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Close</button>
                </div>
            </dialog>

            <dialog class="qq-confirm-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">No</button>
                    <button type="button" class="qq-ok-button-selector">Yes</button>
                </div>
            </dialog>

            <dialog class="qq-prompt-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <input type="text">
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Cancel</button>
                    <button type="button" class="qq-ok-button-selector">Ok</button>
                </div>
            </dialog>
        </div>
    </script>

<div class="table-responsive" id="cataegorytablediv">
<table class="table" id="categorytable" >
  <thead>
   <tr>
    <th>Category Name</th>
     <th>Image</th>
    <th>Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($Category as $category){?>
     <tr><td><?=$category->categoryname;?></td>
      <td><img src="<?php echo base_url();?><?=$category->imagepath;?>" class="noimage_found" alt="Smiley face" width="42" height="42"></td>
   <!--   <td><img scr="<?php echo base_url();?><?=$category->imagepath;?>"/></td> -->
   <td><button type="button" class="btn btn-primary btn-xs btn-mini editcat" value=<?=$category->catid;?>  onclick="editCategory('<?=$category->categoryname;?>','<?=$category->catid;?>')" name="editCat" id=catidedit<?=$category->catid;?>>Edit</button>
   <button type="button" class="btn btn-danger btn-xs btn-mini deleteCat" name="deleteCat" onclick="showPrompt('are your sure you you want to delete', 'Are you ready?');"  value=<?=$category->catid;?> id=catiddel<?=$category->catid;?> data-target="#myModal">Delete</button>
   </td>
     </tr>     
     <?php }?>  
 </tbody>
</table>
</div>
    <form  name="addcategory" id="addcategorygform">
    <div class="row" id="addcategory">
        <div class="col-md-8 col-sm-8 col-xs-8">
            <input type="hidden" name="imageLink" id="imageLink">



           <div class="form-group">
               <label class="form-label">Category Name</label>
                  <span class="help">e.g. "Bus"</span>
                  <div class="controls">
                  <input type="text" id="categoryname" name="categoryname" required class="form-control">
                   <input type="hidden" id="catid" name="catid" required class="form-control">
                  </div>
          </div>


          <div id="fine-uploader-gallery"></div>



           <div class="form-group">
                    <div class="pull-right">
                      <button class="btn btn-success btn-cons" onclick="createCategory();" id="addNewCategory" type="button"><i class="icon-ok"></i> Save</button>
                      <button class="btn btn-success btn-cons" onclick="editCategoryButton();" id="updateSaveCategory" style="display:none;" type="button"><i class="icon-ok"></i> Update</button>
                     
                       <button class="btn btn-white btn-cons cancleaddCategory"  onclick="cancleaddCategory();"type="button" id="cancleaddCategory">Cancel</button>
                    </div>
                  </div>
        </div>
     </div>
</form>





   <script>

     

        $('#fine-uploader-gallery').fineUploader({
            template: 'qq-template-gallery',
            request: {
                endpoint: '<?php echo base_url();?>category/upload_file'
            },
            thumbnails: {
                placeholders: {
                    waitingPath: '/source/placeholders/waiting-generic.png',
                    notAvailablePath: '/source/placeholders/not_available-generic.png'
                }
            },
            validation: {
                allowedExtensions: ['jpeg', 'jpg', 'gif', 'png']
            },
      callbacks: {
        onComplete: function(id, fileName, responseJSON) {
      alert(responseJSON.imgepath)
       console.log(responseJSON.imgepath)
      $("#imageLink").val(responseJSON.imgepath);
      
          if (responseJSON.success) {
            $('#thumbnail-fine-uploader').append('<img src="img/success.jpg" alt="' + fileName + '">');
          }
    }}
        });



    $("#addcategory").hide();
    function showPrompt(msg, title){
        $.prompt(msg, {
            title: title,
      buttons: { "Yes": true, "No": false },
         submit: function(e,v,m,f){
    // use e.preventDefault() to prevent closing when needed or return false. 
    // e.preventDefault(); 
        if(v){
         confirmDeleteCategory();
      }
   
        console.log("Value clicked was: "+ v);
       }
        });
    }
   
   var catid="";
   $().ready(function() {
         $( ".deleteCat" ).click(function() {
         catid=$(this).val();
        });
    });
    
   function confirmDeleteCategory(){
      $.post('<?php echo base_url();?>category/deleteCategory', {catid:catid}, function (data){
    
      if(data==200){
       ohSnap("Category Has been deleted successfully.", {'color':'green'})
         
     }if(data==400){
      ohSnap("Oops. Something went wrong.Please try again later.", {'color':'red'}) 
     }
         displayCategory();
        });
    }

    function createCategory(){
      alert("1")

     /* categoryname=$("#categoryname").val();
     var  imageLink=$("#imageLink").val();
      
      var isValid=$("#addcategorygform").valid();
       if(isValid){
      $.post('<?php echo base_url();?>category/addCategory', {categoryname:categoryname,imageLink:imageLink}, function (data){
      if(data==200){
       ohSnap("Category Has been Added successfully.", {'color':'green'})
         
     }if(data==400){
      ohSnap("Oops. Something went wrong.Please try again later.", {'color':'red'}) 
     }
         displayCategory();
        });
    }*/

    }
    


    function editCategoryButton(){
      alert("11")


        categoryname=$("#categoryname").val();
      var  imageLink=$("#imageLink").val();
      var  catid=$("#catid").val();
      
      var isValid=$("#addcategorygform").valid();
       if(isValid){
      $.post('<?php echo base_url();?>category/editCategory', {categoryname:categoryname,imageLink:imageLink,catid:catid}, function (data){
      if(data==200){
       ohSnap("Category Updated been Added successfully.", {'color':'green'})
         
     }if(data==400){
      ohSnap("Oops. Something went wrong.Please try again later.", {'color':'red'}) 
     }
         displayCategory();
        });
   }
    }
     function editCategory(categoryname,catid){
      alert(categoryname);
               $("#cataegorytablediv").hide();
               $("#addcategorybutton").hide();
               $("#addcategory").show();

               $("#categoryname").val(categoryname);
                $("#addNewCategory").css("display","none");
                $("#updateSaveCategory").css("display","block");
               
                 $("#catid").val(catid);
               
      }





      function updateSaveCategory(){

alert();
     /* categoryname=$("#categoryname").val();
      var  imageLink=$("#imageLink").val();
      var  catid=$("#catid").val();
      
      var isValid=$("#addcategorygform").valid();
       if(isValid){
      $.post('<?php echo base_url();?>category/updateSaveCategory', {categoryname:categoryname,imageLink:imageLink,catid:catid}, function (data){
      if(data==200){
       ohSnap("Category Updated been Added successfully.", {'color':'green'})
         
     }if(data==400){
      ohSnap("Oops. Something went wrong.Please try again later.", {'color':'red'}) 
     }
         displayCategory();
        });*/
  //  }

    }

   </script>  