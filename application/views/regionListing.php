<table class="table" id="categorytable" >
  <thead>
   <tr>
    <th>Region</th>
	<th>City</th>
	<th>State</th>
    <th>Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($Region as $region_data){?>
     <tr><td><?=$region_data->region;?></td>
	 <td><?=$region_data->city_name;?></td>
	 <td><?=$region_data->city_state;?></td>
	 <td>
	 <button type="button" class="btn btn-danger btn-xs btn-mini deleteCat" name="deleteCat" onclick="showPrompt('are your sure you you want to delete', 'Are you ready?');" regionid= <?=$region_data->regionid;?>  value=<?=$region_data->region;?> data-target="#myModal">Edit</button>
	 
	  <button type="button" class="btn btn-danger btn-xs btn-mini deleteCat" name="deleteCat" onclick="showPrompt('are your sure you you want to delete', 'Are you ready?');"  regionid= <?=$region_data->regionid;?>  value=<?=$region_data->region;?>  data-target="#myModal">Delete</button>
	 </td>
     </tr>     
     <?php }?>  
 </tbody>
 </table>