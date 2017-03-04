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
        $("#state").select2();
         $("#statemodaldropdown").select2();
        

       var oTable3 = $('#viewcitystatetable').dataTable( {
       "sDom": "<'row'<'col-md-6'l <'toolbar'>><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
            "oTableTools": {
        "aButtons": [
          {
            
          }
        ]
      }
   });

       $("div.toolbar").html('<div class="table-tools-actions"><button  class="btn btn-danger"  data-toggle="modal" data-target="#addcitymodal"   data-toggle="modal" data-target="#myModal" style="margin-left:12px" id="test2">Add City</button></div>');
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
                  <h4>Listing <span class="semi-bold">City & State</span></h4>
                  <!--   <select id="state" style="width:100%" onchange="getCityByState()">
                         <option value="-1">Select Category</option>
                         <?php foreach($State as $state){?>
                         <option value=<?=$state->city_id;?>><?=$state->city_state ;?></option>
                        <?php }?>  
                     </select> -->
                  </div>
                <div class="grid-body no-border"> <br>
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12" id="normalusers">


<?php 

 if(sizeof($CityState)>0){
  ?>
 <table class="table" id="viewcitystatetable">
  <thead>
   <tr>
     <th>City</th>
     <th>State</th>
     <th>Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($CityState as $citystate){?>
     <tr><td><?=$citystate->city_name;?></td>
     <td><?=$citystate->city_state;?> </td>
      <td><button type="button" class="btn btn-primary btn-xs btn-mini edititybutton"  data-toggle="modal" data-target="#myModal" cityid= <?=$citystate->city_id;?> value=<?=$citystate->city_name;?> name="edit"   id="edititybutton">Edit</button>
       
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


       <div class="modal fade" id="myModal" role="dialog">
           <div class="modal-dialog">
       <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit City</h4>
                  </div>
                  <div class="modal-body">
                 <p>City Name</p>
                   <input type="text" id="cityname" class="form-control">
                  <input type="text" id="city_id" class="form-control">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal" onclick="editCity();">Save</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
        </div>
      </div>


      <div class="modal fade" id="addcitymodal" role="dialog">
           <div class="modal-dialog">
       <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add City</h4>
                  </div>
                  <div class="modal-body">
                    <p>State Name</p>

                     <select id="statemodaldropdown" style="width:100%">
                         <option value="-1">Select Category</option>
                         <?php foreach($State as $state){?>
                         <option value="<?=$state->city_state;?>"><?=$state->city_state ;?></option>
                        <?php }?>  
                     </select> 
                 <p>City Name</p>
                   <input type="text" id="citynametextname" class="form-control">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal" onclick="addCity();">Save</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
        </div>
      </div>

	 <div id="ohsnap"></div>
  </div> 


</body>
</html>  
     <script>
     

     function getCityByState(){

      var city_id=$("#state").val();
      alert(city_id)
     /* message=""
     if(active==1){
     	active=0
     	message="User  Has been De-aciveted successfully."
     }else{
     	active=1
     	message="User  Has been Aciveted successfully."
     }
     */
     $.post('<?php echo base_url();?>ManageLocation/displayCity', {city_id:city_id}, function (data){
		  if(data==200){
             ohSnap(message, {'color':'green'})
			 setTimeout(function(){ location.reload(); }, 2000);
		 }if(data==400){
			ohSnap("Oops. Something went wrong.Please try again later.", {'color':'red'}) 
		 }
         //displayCategory();
        });
     }


$( ".edititybutton" ).click(function() {
     var city_name=$(this).val();
     var city_id=$(this).attr("cityid");
      $("#cityname").val(city_name);
      $("#city_id").val(city_id);
});


       function editCity(){
       // alert();

      var city_name= $("#cityname").val();
      var city_id=$("#city_id").val();
     //  console.log("EditCity");
       $.post('<?php echo base_url();?>ManageLocation/editCity', {city_id:city_id,city_name,city_name}, function (data){
       console.log(data)
             if(data==200){
             ohSnap("City Name Has been successfully Edited", {'color':'green'})
       setTimeout(function(){ location.reload(); }, 2000);
     }if(data==400){
      ohSnap("Oops. Something went wrong.Please try again later.", {'color':'red'}) 
     }
         //displayCategory();
        });


       }



       function addCity(){
       var city_name=$("#citynametextname").val();
       var city_state=$("#statemodaldropdown").val();
      // alert(city_name)
       //alert(city_state)
       
         $.post('<?php echo base_url();?>ManageLocation/addCity', {city_state:city_state,city_name,city_name}, function (data){
          console.log(data)
             if(data==200){
                ohSnap("City Name Has been successfully Added", {'color':'green'})
                setTimeout(function(){ location.reload(); }, 2000);
              }
              if(data==400){
             ohSnap("Oops. Something went wrong.Please try again later.", {'color':'red'}) 
            }
        });
      }

     </script>