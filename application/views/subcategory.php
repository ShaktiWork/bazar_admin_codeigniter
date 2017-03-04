
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
         displaysubCategory();
            $( "#addsubcategorybutton" ).click(function() {
              $("#addsubcategory").css('display','block');
               $("#firstmaincategorydiv").css('display','none');
               $("#firstmaincategorydiv").css('display','none');
               $("#addsubcategorybutton").hide();

               
             });

            
        });


       function displaysubCategory () {
    
       $.post('<?php echo base_url();?>category/loadsubCategory', {}, function (data){
          $("#showsubcategory").html(data);
          $("#subCategorytable").css('display','');
         // $('#subCategorytable').dataTable();
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
                  <h4>Sub Category <span class="semi-bold">Listing</span></h4>
                  <button class="btn btn-primary btn-cons" id="addsubcategorybutton">Add Sub category</button>
                </div>
                <div class="grid-body no-border"> <br>
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12" id="showsubcategory">
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
   
