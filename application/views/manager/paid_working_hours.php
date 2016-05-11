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
				<th class="col-lg-2">Total Hours</th>
				<th class="col-lg-2">Salary/Hour</th>
				<th class="col-lg-2">Total Amount</th>
				<th class="col-lg-1">History</th>
				<th class="col-lg-1">Action</th>
			</tr>
			</thead>
			<tbody>
				<?php 
					$counter = 0;
					foreach ($hours as $hour) {
					$counter++;
				 ?>
				<tr>
					<td><?php echo $counter;?></td>
					<td><a href="<?php echo base_url('index.php/viewEmpManager'.'/'.$hour->user_id);?>"><?php echo $hour->f_name.' '.$hour->l_name?></a></td>
					<td><?php echo $hour->post ?></td>
					<td><?php echo ($hour->diff/10000); ?> hours</td>
					<td>$ <?php if($hour->per_hour == '') echo '0'; else echo $hour->per_hour; ?></td>
					<td>$ <?php echo (($hour->diff/10000)*($hour->per_hour)); ?></td>
					<td><a href="<?php echo base_url('index.php/viewEmpHistory'.'/'.$hour->user_id);?>"><i class="fa fa-history"></i></a></td>
					<td><button type="button" data-id="<?php echo $hour->user_id;?>" class="checkout btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">Paid</button></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
