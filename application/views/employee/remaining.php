<div class="row" style="padding:5px;">
	<div class="col-lg-12 bg-primary"  style="padding:5px;"><h4><a style="color:#FFF;" href="<?php echo base_url('index.php/viewEmpManager'.'/'.$user->user_id);?>"><?php echo $user->f_name?> 's</a> payment history</h4></div>
	&nbsp;
	<div class="col-lg-12">
		<div class="jumbotron" style="padding: 10px;">
		  <p class="text-primary" style="font-sixe: 12px;">Total remaining Amount : $<?php echo round($total_amount->total, 2);?></p>
		  <p class="text-primary" style="font-sixe: 12px;">Total Working hours : <?php echo round($total_amount->total_hours, 2);?> hours</p>
		</div>
	</div>
	<div class="col-lg-12">
		<table id="table_user" class="display" style="font-size:12px">
			<thead>
			<tr>
				<th class="col-lg-1">S.No</th>
				<th class="col-lg-4">Date</th>
				<th class="col-lg-3">Total Hours</th>
				<th class="col-lg-3">Amount need to Paid</th>
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
							<td><?php echo date( 'l jS F, Y \o\n g:ia ', strtotime($p->last_update)) ?></td>
							<td><?php echo round($p->total_hours, 2) ?> hours</td>
							<td>$ <?php echo $p->total_hours * $p->per_hour; ?></td>
						</tr>
					<?php } 
					} ?>
			</tbody>
		</table>
	</div>
</div>