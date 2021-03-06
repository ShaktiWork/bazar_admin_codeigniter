    

    
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
    


               <div id="firstmaincategorydiv">
                  <div class="col-md-4" >
                     <div class="form-group">
                      <label class="form-label">Search By Category Name</label>
                       <div class="controls">
                      <select id="category" style="width:100%" onchange="searchbyCategory();">
                         <option value="-1">Select Category</option>
                         <?php foreach($Category as $category){?>
                         <option value=<?=$category->categoryname;?>><?=$category->categoryname;?></option>
                        <?php }?>  
                     </select>
                      </div>
                  </div>
                </div>
                <div>
<?php 

 if(sizeof($subCategory)>0){
  ?>
 <table class="table" id="subCategorytable">
  <thead>
   <tr>
    <th>Category Name</th>
    <th>Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($subCategory as $subcategory){?>
     <tr><td><?=$subcategory->subcategoryname;?></td>
   <td><button type="button" class="btn btn-primary btn-xs btn-mini editcat" value=<?=$subcategory->subcatid;?> name="editCat" id=catidedit<?=$subcategory->subcatid;?>>Edit</button>
   <button type="button" class="btn btn-danger btn-xs btn-mini deleteCat" name="deleteCat" onclick="showPrompt('are your sure you you want to delete', 'Are you ready?');"  value=<?=$subcategory->subcatid;?> id=catiddel<?=$subcategory->subcatid;?> data-target="#myModal">Delete</button>
   </td>
     </tr>     
     <?php }?>  
 </tbody>
  </table>
<?php } 

else{
  echo "No Records Found.";
}
?>
</div>
</div>


    
      <form  name="addcategory" id="addcategorygform">
    <div class="row" id="addsubcategory" style="display:none;">
        <div class="col-md-8 col-sm-8 col-xs-8">



                  <div class="form-group">
                      <label class="form-label">Category Namee</label>
                       <div class="controls">
                      <select id="category2"  data-init-plugin="select2"   class="select2 form-control" style="width:100%" required >
                         <option value="">Select Category</option>
                         <?php foreach($Category as $category){?>
                         <option value=<?=$category->categoryname;?>><?=$category->categoryname;?></option>
                        <?php }?>  
                     </select>
                      </div>
                  </div> 
                
           <div class="form-group">
               <label class="form-label">Sub Category Name</label>
                  <span class="help">e.g. "Bus"</span>
                  <div class="controls">
                  <input type="text" id="subcategoryname" name="subcategoryname" required class="form-control">
                  </div>
          </div>

            <div id="fine-uploader-gallery"></div>

           <div class="form-group">
                    <div class="pull-right">
                      <button class="btn btn-success btn-cons" onclick="createsubCategory();" type="button"><i class="icon-ok"></i> Save</button>
                       <button class="btn btn-white btn-cons deleteCat" type="button" id="cancelButton" onclick="showPrompt('are your sure you you want to delete', 'Are you ready?');">Cancel</button>
                    </div>
                  </div>
           </div>
    </div>
  </div>

     <input type="text" name="imageLink" id="imageLink">





    <!-- Your code to create an instance of Fine Uploader and bind to the DOM/template
    ====================================================================== -->
    <script>

          $( document ).ready(function() {
               $( "#cancelButton" ).click(function() {
               $("#firstmaincategorydiv").css('display','block');
               $("#addsubcategory").css('display','none');
                $("#addsubcategorybutton").show();
      
           });
        });
   




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
      $("#imageLink").val(responseJSON.imgepath);
      
          if (responseJSON.success) {
            $('#thumbnail-fine-uploader').append('<img src="img/success.jpg" alt="' + fileName + '">');
          }
    }}
        });
    </script>
</body>

    <script>
    $( document ).ready(function() {
       $('select').select2();
       $('.select2', "#addcategorygform").change(function () {
        $('#addcategorygform').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
    });
    });

     function searchbyCategory(){
        
        var category=$("#category").val();
        //alert(category)
       $.post('<?php echo base_url();?>category/loadsubCategory', {category:category}, function (data){
         //alert(data);
          $("#showsubcategory").html(data)
          //$('#subCategorytable').dataTable();
       });
   }
     

     function createsubCategory(){
var isValid=$("#addcategorygform").valid();
       if(isValid){
      categoryname=$("#category2").val();
      subcategoryname=$("#subcategoryname").val();
      imageLink=$("#imageLink").val();
      
      $.post('<?php echo base_url();?>category/addsubCategory', {categoryname:categoryname,subcategoryname:subcategoryname,imageLink:imageLink}, function (data){
      if(data==200){
       ohSnap("Category Has been deleted successfully.", {'color':'green'})
         
     }if(data==400){
      ohSnap("Oops. Something went wrong.Please try again later.", {'color':'red'}) 
     }
      displaysubCategory();
   });
 }
}

    var subcatid="";
   $().ready(function() {
         $( ".deleteCat" ).click(function() {
         subcatid=$(this).val();
       });
    });
    
   function confirmDeleteSubCategory(){
      $.post('<?php echo base_url();?>category/deletesubCategory', {subcatid:subcatid}, function (data){
    
      if(data==200){
       ohSnap("Category Has been deleted successfully.", {'color':'green'})
         
     }if(data==400){
      ohSnap("Oops. Something went wrong.Please try again later.", {'color':'red'}) 
     }
         //displayCategory();
        });
    }

     function showPrompt(msg, title){
        $.prompt(msg, {
            title: title,
      buttons: { "Yes": true, "No": false },
         submit: function(e,v,m,f){
    // use e.preventDefault() to prevent closing when needed or return false. 
    // e.preventDefault(); 
        if(v){
         confirmDeleteSubCategory();
      }
   
        console.log("Value clicked was: "+ v);
        displaysubCategory();
       }
        });
    }
   


</script>  