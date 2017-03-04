<script>
$().ready(function() {
	
 });
function test(){
	alert();
$.post('<?php echo base_url();?>user/test', {type: 'downloadCustomerInfo',download:true}, function (data){
	
	$("#test").html(data)
		 });
}

</script>
<div class="content">
	<h2>Welcome Back, <?php echo $this->session->userdata('user_email'); ?>!</h2>
     <p>This section represents the area that only logged in members can access.</p>
	<h4><?php echo anchor('user/logout', 'Logout'); ?></h4>

</div>
<div id="test">
</div>

<button type="button" onclick="test();" class="btn btn-default btn-cons">Default</button>
<!--<div class="content">-->