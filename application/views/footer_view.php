<!DOCTYPE html>
<html lang="en">
 <head>
  <title>Display Records From Database Using Codeigniter</title>
  <link href="<?= base_url();?>css/bootstrap.css" rel="stylesheet">
 </head>
 <body>
  <div class="row">
   <div style="width:500px;margin:50px;">
    <h4>Display Records From Database Using Codeigniter</h4>
    <table class="table table-striped table-bordered">
     <tr><td><strong>Employee Id</strong></td><td><strong>First Name</strong></td><td><strong>Last Name</strong></td><td><strong>Email</strong></td></tr> 
     <?php foreach($EMPLOYEES as $employee){?>
     <tr><td><?=$employee->EMPLOYEE_ID;?></td><td><?=$employee->FIRST_NAME;?></td><td><?=$employee->LAST_NAME;?></td><td><?=$employee->EMAIL;?></td></tr>     
        <?php }?>  
    </table>
   </div> 
  </div> 
 </body>
</html>