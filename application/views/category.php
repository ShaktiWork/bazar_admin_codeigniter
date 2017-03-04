
<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="ie ie6 lte9 lte8 lte7"> <![endif]-->
<!--[if IE 7]>     <html class="ie ie7 lte9 lte8 lte7"> <![endif]-->
<!--[if IE 8]>     <html class="ie ie8 lte9 lte8"> <![endif]-->
<!--[if IE 9]>     <html class="ie ie9 lte9"> <![endif]-->
<!--[if gt IE 9]>  <html> <![endif]-->
<!--[if !IE]><!--> 
<html>             <!--<![endif]-->

<!-- BEGIN BODY -->

    <head>
       <script>
        $( document ).ready(function() {
         displayCategory();
          $( "#addcategorybutton" ).click(function() {
            
              $("#cataegorytablediv").hide();
               $("#addcategorybutton").hide();
              $("#addcategory").show();
    
         });

         
    });
       
       function cancleaddCategory(){
        
               $("#cataegorytablediv").show();
               $("#addcategorybutton").show();
               $("#addcategory").hide();
       }

        function displayCategory () {

    
    $.post('<?php echo base_url();?>category/loadCategory', {}, function (data){
     // alert(data);
      $("#showctegory").html(data);
         $('#categorytable').dataTable();
      //$('#example3').dataTable();
       });
   }

  
     </script>



    </head>
       
<body class="">



  <!-- BEGIN PAGE CONTAINER-->
  <div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">
      <ul class="breadcrumb">
        <li>
          <p>YOU ARE HERE</p>
        </li>
        <li><a href="#" class="active">Form Elements</a> </li>
      </ul>
      <div class="page-title"> <i class="icon-custom-left"></i>
        <h3>Form - <span class="semi-bold">Elements</span></h3>
      </div>
    <!-- BEGIN BASIC FORM ELEMENTS-->
      






           <div class="row" id="maincategorydiv">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Category <span class="semi-bold">Listing</span></h4>
                  <button class="btn btn-primary btn-cons videoDiv-link" id="addcategorybutton">Add category</button>
                </div>
                <div class="grid-body no-border"> <br>
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12" id="showctegory">
                     </div>

                   </div>
                </div>
              </div>
            </div>
          </div> 


     
    </div>
   <div id="ohsnap"></div>
  </div> 


</body>
</html>  
   


<!-- <table class="table" id="example3" >
  <thead>
   <tr>
    <th>Category Name</th>
    <th>Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($Category as $category){?>
     <tr><td><?=$category->categoryname;?></td>
	 <td><button type="button" class="btn btn-primary btn-xs btn-mini editcat" value=<?=$category->catid;?> name="editCat" id=catidedit<?=$category->catid;?>>Edit</button>
	 <button type="button" class="btn btn-danger btn-xs btn-mini deleteCat" name="deleteCat" onclick="showPrompt('are your sure you you want to delete', 'Are you ready?');"  value=<?=$category->catid;?> id=catiddel<?=$category->catid;?> data-target="#myModal">Delete</button>
	 </td>
     </tr>     
     <?php }?>  
 </tbody>
</table>
    <div class="row" id="addcategory">
        <div class="col-md-8 col-sm-8 col-xs-8">
           <div class="form-group">
               <label class="form-label">Category Name</label>
                  <span class="help">e.g. "Bus"</span>
                  <div class="controls">
                  <input type="text" id="categoryname" name="categoryname" class="form-control">
                  </div>
          </div>


           <div class="form-group">
                    <div class="pull-right">
                      <button class="btn btn-success btn-cons" onclick="createCategory();" type="submit"><i class="icon-ok"></i> Save</button> <button class=
                      "btn btn-white btn-cons" type="button">Cancel</button>
                    </div>
                  </div>
        </div>
    </div>


   <script>

   //$("#addcategory").hide();
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

      categoryname=$("#categoryname").val();
      $.post('<?php echo base_url();?>category/addCategory', {categoryname:categoryname}, function (data){
      if(data==200){
       ohSnap("Category Has been deleted successfully.", {'color':'green'})
         
     }if(data==400){
      ohSnap("Oops. Something went wrong.Please try again later.", {'color':'red'}) 
     }
         displayCategory();
        });

    }
   </script>   -->