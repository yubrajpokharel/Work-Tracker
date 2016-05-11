<div class="row" style="padding:5px;">
	<div class="col-lg-12 bg-primary"  style="padding:5px;"><h4><a style="color:#FFF;" href="<?php echo base_url('index.php/viewEmpManager'.'/'.$user->user_id);?>"><?php echo $user->f_name?> 's</a> payment history</h4></div>
	&nbsp;
	<div class="col-lg-12">
		<div class="jumbotron" style="padding: 10px;">
		  <p class="text-primary" style="font-sixe: 14px;">Total paid : $<?php echo $total_amount->total;?>&nbsp;&nbsp;&nbsp;<a class="btn btn-primary btn-xs text-right" href="<?php echo base_url('index.php/viewEmpManager'.'/'.$user->user_id);?>" role="button">View Profile</a></p>
		</div>
	</div>
	<div class="col-lg-12">
		<table id="table_user" class="display" style="font-size:12px">
			<thead>
			<tr>
				<th class="col-lg-1">S.No</th>
				<th class="col-lg-4">Date</th>
				<th class="col-lg-3">Total Hours</th>
				<th class="col-lg-3">Amount Paid</th>
			</tr>
			</thead>
			<tbody>
				<?php 
					if(!empty($payments)){
						$counter = 0;
						foreach ($payments as $p) {
						$counter++;
					 ?>
						<tr>
							<td><?php echo $counter;?></td>
							<td><?php echo date( 'l jS F, Y \o\n g:ia ', strtotime($p->paid_date)) ?></td>
							<td><?php echo $p->hours ?> hours</td>
							<td>$ <?php echo $p->amount; ?></td>
						</tr>
					<?php } 
					} ?>
			</tbody>
		</table>
	</div>
</div>