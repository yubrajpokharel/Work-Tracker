<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Working Hour Details</h4>
	      </div>
	      <div class="modal-body"  id="working_hour_content">
	      	<table class="table">
	      		<thead>
	      		<tr>
	      			<th class="col-lg-1">S.No</th>
	      			<th class="col-lg-2">Date</th>
	      			<th class="col-lg-2">Task</th>
	      			<th class="col-lg-2">Start time</th>
	      			<th class="col-lg-2">End time</th>
	      			<th class="col-lg-3">Total hours</th>
	      			<th class="col-lg-1">Status</th>
	      		</tr>
	      		</thead>
	      		<tbody id="contents">
	      		</tbody>
	      	</table>
	        
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" id="paynow" class="btn btn-primary paynow">Pay Now</button>
	      </div> 
    </div>
  </div>
</div>

<!-- modal ends hre -->

<div class="row" style="padding:5px;">
	<div class="col-lg-12 bg-primary"  style="padding:5px;"><h4>Employee Working Hours</h4></div>
	&nbsp;
	<div class="col-lg-12">
		<table id="table_user" class="display" style="font-size:12px">
			<thead>
			<tr>
				<th class="col-lg-1">S.No</th>
				<th class="col-lg-2">Name</th>
				<th class="col-lg-1">Post</th>
				<th class="col-lg-1">Contact</th>
				<th class="col-lg-2">Total Hours</th>
				<th class="col-lg-2">Salary/Hour</th>
				<th class="col-lg-2">Total Amount</th>
				<th class="col-lg-1">Action</th>
			</tr>
			</thead>
			<tbody>
				<?php 
					if(!empty($hours)){
						$counter = 0;
						foreach ($hours as $hour) {
						$counter++;
					 ?>
						<tr>
							<td><?php echo $counter;?></td>
							<td><a href="<?php echo base_url('index.php/viewEmpManager'.'/'.$hour->user_id);?>"><?php echo $hour->f_name.' '.$hour->l_name?></a></td>
							<td><?php echo $hour->post ?></td>
							<td><?php echo $hour->mobile ?></td>
							<td><?php echo ($hour->diff/10000); ?> hours</td>
							<td>$ <?php if($hour->per_hour == '') echo '0'; else echo $hour->per_hour; ?></td>
							<td>$ <?php echo (($hour->diff/10000)*($hour->per_hour)); ?></td>
							<td><button type="button" data-id="<?php echo $hour->user_id;?>" class="checkout btn btn-success btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">Check Out</button></td>
						</tr>
					<?php } 
					} ?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".checkout").click(function(){
			var id = $(this).attr('data-id');
			//alert(id);
			$.ajax({
		           url:'<?php echo base_url("index.php/manager/checkout/'+id+'")?>',
		           type: 'POST',
		           
		           success: function(reply){
		           		if(reply == "false"){
		           			$('#contents').html('<tr><td colspan="6">Bad request</td></tr>');	
		           		}else{
		           			$('#contents').html(reply);
		           			$('#paynow').attr('data-id', id);
		           		}
		           }
		    });
		})

		$('#paynow').click(function(){
			var r=confirm("Procees to payment?");
		    if (r==true)   {  
		       var uid = $(this).attr('data-id');
				$.ajax({
					url:'<?php echo base_url("index.php/manager/paybill/'+uid+'")?>',
					type: 'POST',
					success: function(reply){
						if(reply == "success"){
							window.location = "<?php echo base_url("index.php/Emphours")?>";
						}else if(reply == "fail"){
							alert('Something went wrong! Please try again later.');
						}
					}

				});
		    }
			
		})
	})
</script>
