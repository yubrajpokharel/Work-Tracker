<style type="text/css">
  .error {border-color:#f68ca6;};
  .form-group .mandatory{color:red;}
</style>
<div class="err"></div>
<div class="row bg-primary" style="padding:5px;"><h4><i class="fa fa-clock-o"></i> Update your tasks</h4></div>
<div class="row table-bordered" style="padding:10px;">
	<div class="col-lg-12">

	
	<form class="form-inline" id="tasks">
	  <div class="form-group hidden">
	    <label for="pwdate">User Id</label>
	    <input type="number" class="form-control" value="<?php echo $this->session->userdata('user_id'); ?>" name="id" id="id">
	  </div>&nbsp;

	  <div class="form-group">
	    <label for="pwdate">Date</label>
	    <input type="date" class="form-control" name="pwdate" id="pwdate" placeholder="2015/1/1">
	  </div>&nbsp;

	  <div class="form-group">
	    <label for="pwtask">Task</label>
	    <input type="text" class="form-control" name="pwtask" id="pwtask" placeholder="Making Coffee">
	  </div>&nbsp;

	  <div class="form-group">
	    <label for="st_time">Start Time</label>
	    <select class="form-control" id="st_time" name="st_time">
	    	<option value="">-- -- --</option>
	    	<option value="00:00 AM">00:00 AM</option>
	    	<option value="01:00 AM">01:00 AM</option>
	    	<option value="02:00 AM">02:00 AM</option>
	    	<option value="03:00 AM">03:00 AM</option>
	    	<option value="04:00 AM">04:00 AM</option>
	    	<option value="05:00 AM">05:00 AM</option>
	    	<option value="06:00 AM">06:00 AM</option>
	    	<option value="07:00 AM">07:00 AM</option>
	    	<option value="08:00 AM">08:00 AM</option>
	    	<option value="09:00 AM">09:00 AM</option>
	    	<option value="10:00 AM">10:00 AM</option>
	    	<option value="11:00 AM">11:00 AM</option>
	    	<option value="12:00 PM">12:00 PM</option>
	    	<option value="13:00 PM">13:00 PM</option>
	    	<option value="14:00 PM">14:00 PM</option>
	    	<option value="15:00 PM">15:00 PM</option>
	    	<option value="16:00 PM">16:00 PM</option>
	    	<option value="17:00 PM">17:00 PM</option>
	    	<option value="18:00 PM">18:00 PM</option>
	    	<option value="19:00 PM">19:00 PM</option>
	    	<option value="20:00 PM">20:00 PM</option>
	    	<option value="21:00 PM">21:00 PM</option>
	    	<option value="22:00 PM">22:00 PM</option>
	    	<option value="23:00 PM">23:00 PM</option>
	    	<option value="24:00 PM">24:00 PM</option>
	    </select>
	  </div>&nbsp;

	  <div class="form-group">
	    <label for="ed_time">End Time</label>
	     <select class="form-control" id="ed_time" name="ed_time">
	    	<option value="">-- -- --</option>
	    	<option value="00:00 AM">00:00 AM</option>
	    	<option value="01:00 AM">01:00 AM</option>
	    	<option value="02:00 AM">02:00 AM</option>
	    	<option value="03:00 AM">03:00 AM</option>
	    	<option value="04:00 AM">04:00 AM</option>
	    	<option value="05:00 AM">05:00 AM</option>
	    	<option value="06:00 AM">06:00 AM</option>
	    	<option value="07:00 AM">07:00 AM</option>
	    	<option value="08:00 AM">08:00 AM</option>
	    	<option value="09:00 AM">09:00 AM</option>
	    	<option value="10:00 AM">10:00 AM</option>
	    	<option value="11:00 AM">11:00 AM</option>
	    	<option value="12:00 PM">12:00 PM</option>
	    	<option value="13:00 PM">13:00 PM</option>
	    	<option value="14:00 PM">14:00 PM</option>
	    	<option value="15:00 PM">15:00 PM</option>
	    	<option value="16:00 PM">16:00 PM</option>
	    	<option value="17:00 PM">17:00 PM</option>
	    	<option value="18:00 PM">18:00 PM</option>
	    	<option value="19:00 PM">19:00 PM</option>
	    	<option value="20:00 PM">20:00 PM</option>
	    	<option value="21:00 PM">21:00 PM</option>
	    	<option value="22:00 PM">22:00 PM</option>
	    	<option value="23:00 PM">23:00 PM</option>
	    	<option value="24:00 PM">24:00 PM</option>
	    </select>
	  </div>&nbsp;

	  <button type="submit" class="add_time btn btn-default">Update</button>
	</form>
	</div>
</div>
&nbsp;

<!-- list of timetable -->
<div class="row bg-primary" style="padding:5px;"><h4>Your Daily Tasks</h4></div>

	<div class="row table-bordered" style="padding:10px;">
		<div class="col-lg-12">
			<table id="table_user" class="table">
				<thead>
				<tr>
					<th> Date </th>
					<th> Task Name </th>
					<th> Start Time </th>
					<th> End Time </th>
					<th> Hours </th>
					<th> Status</th>
				</tr>
				</thead>
				<tbody>
				<!-- actual data starts from here -->
				<?php 
					if(count($tasks) > 0 ){ 
						foreach($tasks as $t) { ?>
							<tr id="<?php echo $t->task_date;?>" data-date="<?php echo $t->task_date;?>">
								<td class="col-lg-2"><?php echo $t->task_date?></td>
								<td class="col-lg-3"><?php echo $t->task?></td>
								<td class="col-lg-2"><?php echo $t->start?></td>
								<td class="col-lg-2"><?php echo $t->end?></td>
								<td class="col-lg-2"><?php echo ($t->end - $t->start)?> Hours</td>
								<td class="col-lg-1"><?php if($t->status == 1 ) echo '<span class="label label-success">paid</span>'; else echo '<span class="label label-danger">pending</span>'; ?></td>
							</tr>
				<?php   } 
					}
				?>
			</tbody>
			</table>
		</div>
	</div>

<script type="text/javascript">
	$(document).ready(function(){
		console.log("Document is ready");

		$("#tasks").submit(function(){
			event.preventDefault();

			console.log("Update button clicked");

			var pw_date = $("#pwdate").val();
			var pw_task = $("#pwtask").val();
			var start_time = $("#st_time").val();
			var end_time = $("#ed_time").val();
			

			if(pw_date == ''){$('#pwdate').addClass('error');}else{$('#pwdate').removeClass('error');}
			if(pw_task == ''){$('#pwtask').addClass('error');}else{$('#pwtask').removeClass('error');}
			if(start_time == ''){$('#st_time').addClass('error'); }else{$('#st_time').removeClass('error');}
			if(end_time == ''){$('#ed_time').addClass('error');}else{$('#ed_time').removeClass('error');}
			if(((new Date("1970-1-1 "+end_time) - new Date("1970-1-1 "+start_time) ) / 1000 / 60 / 60) < 0){$('#ed_time').addClass('error');$('.err').html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error! End time must be greater then the start time.</div>');}else{$('#ed_time').removeClass('error');}

			if(pw_date != "" && pw_task!="" && start_time!="" && end_time!="" && ((new Date("1970-1-1 "+end_time) - new Date("1970-1-1 "+start_time) ) / 1000 / 60 / 60 > 0) ){
				console.log("all feilds are valid");
				 $.ajax({
		           url:'<?php echo base_url("/employee/save_record")?>',
		           type: 'POST',
		           data: $("#tasks").serialize(),
		           success: function(reply){
		           	//alert(reply);
		               if(reply == 'success'){
		                  $('.err').html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Success!</strong> Task Added sucessfully for '+pw_date+'.</div>');
		                  $("#pwdate").val('');
		                  $("#pwdate").val('');
		                  $("#st_time").val('');
		                  $("#ed_time").val('');
		                  // ***********************************************
		                  var date_list = []; //create an array will contains all <tr> dates
						    $("tr").each(function() {
						        tr_date = $(this).attr("data-date"); //get data value of <tr>
						        date_list.push(tr_date); //put date in array
						    });
						    var your_date = pw_date;

						    var big_to_small = false;  //Flag value set false = your <tr> are from small to big
						    $("table").after(big_to_small);
						    //Check the case if your <tr> are from big to small
						    if (date_list[0] > date_list[date_list.length-1]){
						        big_to_small=true;    //Set Flag value to true = your <tr> are from big to small
						    }

						    //Case 1: <tr> from big to small
						    if (big_to_small){
						        date_list = date_list.sort(); //Sort array
						        date_list = date_list.reverse(); //Reverse array from big to small
						        $.each(date_list, function(index ,value){
						            //Insert <tr> up on top (of biggest date) or middle
						            if (your_date > value){
						                $("#"+value).before("<tr id='"+your_date+"' data-date='"+your_date+"'> <td>"+your_date+"</td><td>"+pw_task+"</td><td>"+start_time+"</td><td>"+end_time+"</td><td>"+((new Date("1970-1-1 "+end_time) - new Date("1970-1-1 "+start_time) ) / 1000 / 60 / 60) +" hours</td><td><span class='label label-danger'>pending</span></td></tr> ");
						                return false;
						            }
						            //Insert <tr> down the smallest date
						            if (your_date < date_list[date_list.length-1]){
						            	$("#"+date_list[date_list.length-1]).after("<tr id='"+your_date+"' data-date='"+your_date+"'> <td>"+your_date+"</td><td>"+pw_task+"</td><td>"+start_time+"</td><td>"+end_time+"</td><td>"+((new Date("1970-1-1 "+end_time) - new Date("1970-1-1 "+start_time) ) / 1000 / 60 / 60) +" hours</td><td><span class='label label-danger'>pending</span></td></tr> ");
						                return false;
						            }
						        });
						    }

						    //Case 2: <tr> from small to big
						    else{
						    date_list = date_list.sort(); //Sort array
						    $.each(date_list, function(index ,value){
						            //Insert <tr> up on top (of smallest date) or middle
						            if (your_date < value){
						                $("#"+value).before("<tr id='"+your_date+"' data-date='"+your_date+"'> <td>"+your_date+"</td><td>"+pw_task+"</td><td>"+start_time+"</td><td>"+end_time+"</td><td>"+((new Date("1970-1-1 "+end_time) - new Date("1970-1-1 "+start_time) ) / 1000 / 60 / 60) +" hours</td><td><span class='label label-danger'>pending</span></td></tr> ");
						                return false;
						            }
						            //Insert <tr> down the bigger date
						            if (your_date > date_list[date_list.length-1]){
						            	$("#"+date_list[date_list.length-1]).after("<tr id='"+your_date+"' data-date='"+your_date+"'> <td>"+your_date+"</td><td>"+pw_task+"</td><td>"+start_time+"</td><td>"+end_time+"</td><td>"+((new Date("1970-1-1 "+end_time) - new Date("1970-1-1 "+start_time) ) / 1000 / 60 / 60) +" hours</td><td><span class='label label-danger'>pending</span></td></tr> ");
						                return false;
						            }
						        });
						        }
		                  // ***********************************************
		                  
		               }else{
		                  $('.err').html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Alert!</strong> Task already added for '+pw_date+'.</div>');
		               }  
		           },
		           error: function(){
		                $('.err').html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Opps!</strong> Something went wrong. Please try again later.</div>');
		           }
		       });
			}

		})
	})
</script>

