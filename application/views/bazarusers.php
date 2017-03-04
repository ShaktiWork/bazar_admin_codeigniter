<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="ie ie6 lte9 lte8 lte7"> <![endif]-->
<!--[if IE 7]>     <html class="ie ie7 lte9 lte8 lte7"> <![endif]-->
<!--[if IE 8]>     <html class="ie ie8 lte9 lte8"> <![endif]-->
<!--[if IE 9]>     <html class="ie ie9 lte9"> <![endif]-->
<!--[if gt IE 9]>  <html> <![endif]-->
<!--[if !IE]><!--> 
<html>             <!--<![endif]-->

 <script>


$( document ).ready(function() {
    $('#userstable').dataTable();
});
     
 </script>
<!-- BEGIN BODY -->
       
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
      






           <div class="row" id="usersdiv">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Listing <span class="semi-bold">Users</span></h4>
                  </div>
                <div class="grid-body no-border"> <br>
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12" id="normalusers">


<?php 

 if(sizeof($Users)>0){
  ?>
 <table class="table" id="userstable">
  <thead>
   <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($Users as $users){?>
     <tr><td><?=$users->name;?></td>
     <td><?=$users->email;?></td>
     <td><?=$users->mobile;?></td>
     <?php if($users->active=="1"){?>
        <td><button type="button" class="btn btn-primary btn-xs btn-mini deactivate" value=<?=$users->userid;?> name="deactivate" onclick="activeDeavtiveusers(<?=$users->userid; ?>,<?=$users->active; ?>)"  id=<?=$users->userid;?>>De-activate</button>
 <?php }
  else{ ?>
      <td><button type="button" class="btn btn-primary btn-xs btn-mini activate" value=<?=$users->userid;?> name="Active" onclick="activeDeavtiveusers(<?=$users->userid; ?>,<?=$users->active; ?>)"  id=<?=$users->userid;?>>Acive</button>
<?php } ?>

	
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
                </div>
              </div>
            </div>
          </div>      



	   
    </div>
	 <div id="ohsnap"></div>
  </div> 


</body>
</html>  
     <script>
     

     function activeDeavtiveusers(userId,active){
      message=""
     if(active==1){
     	active=0
     	message="User  Has been De-aciveted successfully."
     }else{
     	active=1
     	message="User  Has been Aciveted successfully."
     }
     
     $.post('<?php echo base_url();?>Bazarusers/activeInactiveUsers', {userId:userId,active:active}, function (data){
		  if(data==200){
             ohSnap(message, {'color':'green'})
			 setTimeout(function(){ location.reload(); }, 2000);
		 }if(data==400){
			ohSnap("Oops. Something went wrong.Please try again later.", {'color':'red'}) 
		 }
         //displayCategory();
        });
     }


     </script>