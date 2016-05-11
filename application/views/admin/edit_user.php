<style type="text/css">
  .error {border-color:#f68ca6;};
  .form-group .mandatory{color:red;}
</style>


<div class="row">
    <div class="col-md-12">
      <form method="post" class="form-horizontal" action="<?php echo base_url('index.php/admin/update_employee')?>" id="adduser" role="form">
        <br>
        <div class="text-danger add-error text-center"></div>
        <div class="text-success add-success text-center"></div><br>
        <fieldset>
          <!-- Form Name -->
          <legend>Employee Personal Details</legend>

          <div class="col-sm-4 hidden">
              <input type="text" name="uid" value="<?php echo $user->uid;?>" id="uid" class="form-control imp" required>
            </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Name <span style="color:#f68ca6">*</span> </label>
            <div class="col-sm-4">
              <input type="text" name="fname" value="<?php echo $user->f_name;?>" id="fname" placeholder="First Name" title="Please fill the name." class="form-control imp" required>
            </div>

            <div class="col-sm-2">
              <input type="text" name="mname" value="<?php echo $user->m_name;?>" value="<?php echo $user->m_name?>" id="mname" placeholder="Middle Name" class="form-control">
            </div>

            <div class="col-sm-4">
              <input type="text" name="lname" value="<?php echo $user->l_name;?>" id="lname" placeholder="Last Name" title="Please fill the last name" class="form-control imp" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Username</label>
            <div class="col-sm-4">
              <input type="text" name="username" value="<?php echo $user->username;?>" id="username" placeholder="username" title="Please select the username" class="form-control imp" required>
            </div>

            <label class="col-sm-2 control-label" for="textinput">Email</label>
            <div class="col-sm-4">
              <input type="email" name="email" value="<?php echo $user->email;?>" id="email" placeholder="E-mail Address" title="Please fill the valid E-mail addredd" class="form-control imp" required>
            </div>
          </div>

          

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Sex <span style="color:#f68ca6">*</span></label>
            <div class="col-sm-4">
              <select name="sex" id="sex" class="form-control imp" required>
                <option value=""></option>
                <option value="1" <?php if($user->sex==1) echo "selected"?>>Male</option>
                <option value="2" <?php if($user->sex==2) echo "selected"?>>Female</option>
            </select>
            </div>

            <label class="col-sm-2 control-label" for="textinput">D.O.B</label>
            <div class="col-sm-4">
              <input type="date" name="dob"  value="<?php echo $user->dob;?>" id="dob" placeholder="D.O.B" class="form-control" title="mm/dd/yyyy">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Mobile</label>
            <div class="col-sm-4">
              <input type="text" name="mobile"  value="<?php echo $user->mobile;?>" id="mobile" placeholder="Mobile" class="form-control">
            </div>

            <label class="col-sm-2 control-label" for="textinput">Landline</label>
            <div class="col-sm-4">
              <input type="text" name="landline"  value="<?php echo $user->landline;?>" id="landline" placeholder="Landline" class="form-control">
            </div>
          </div>

           

          <legend>Address Details</legend>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Country</label>
            <div class="col-sm-4">
              <input type="text" name="country"  value="<?php echo $user->country;?>" id="country" placeholder="Country" class="form-control">
            </div>

            <label class="col-sm-2 control-label" for="textinput">City</label>
            <div class="col-sm-4">
              <input type="text" name="city"  value="<?php echo $user->city;?>" id="city" placeholder="City" class="form-control">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">State</label>
            <div class="col-sm-4">
              <input type="text" name="state" id="state"  value="<?php echo $user->state;?>" placeholder="State" class="form-control">
            </div>

            <label class="col-sm-2 control-label" for="textinput">Street</label>
            <div class="col-sm-4">
              <input type="text" name="street" id="street"  value="<?php echo $user->street;?>" placeholder="Street" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Block Details</label>
            <div class="col-sm-10">
              <input type="text" name="block" value="<?php echo $user->block_no;?>" id="block" placeholder="Block Detail" class="form-control">
            </div>
          </div>

           <legend>Company Details</legend>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Post <span style="color:#f68ca6">*</span></label>
            <div class="col-sm-4">
              <input type="text" name="post" id="post"  value="<?php echo $user->post;?>" placeholder="Job Post" class="form-control imp" required>
            </div>

            <label class="col-sm-2 control-label" for="textinput">Join Date <span style="color:#f68ca6">*</span></label>
            <div class="col-sm-4">
              <input type="date" name="join_date"  value="<?php echo $user->join_date;?>" id="join_date" placeholder="Join Date" class="form-control imp" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Start Time</label>
            <div class="col-sm-4">
              <input type="time" name="stime" id="stime"  value="<?php echo $user->start_time;?>" placeholder="Start Time" class="form-control">
            </div>

            <label class="col-sm-2 control-label" for="textinput">End Time</label>
            <div class="col-sm-4">
              <input type="time" name="etime" value="<?php echo $user->end_time;?>" id="etime" placeholder="End Time" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Assign Role <span style="color:#f68ca6">*</span></label>
            <div class="col-sm-4">
            <select name="role" class="form-control imp" id="role" required>
              <option value=""></option>
              <option value="1" <?php if($user->role==1) echo "selected"?>>Admin</option>
              <option value="2" <?php if($user->role==2) echo "selected"?>>Manager</option>
              <option value="3" <?php if($user->role==3) echo "selected"?>>Employee</option>
            </select>
            </div>

            <label class="col-sm-2 control-label" for="textinput">Status <span style="color:#f68ca6">*</span></label>
            <div class="col-sm-4">
             <select name="status" id="status" class="form-control imp" required>
              <option value=""></option>
              <option value="1" <?php if($user->activated==1) echo "selected"?>>Active</option>
              <option value="2" <?php if($user->activated==2) echo "selected"?>>Inactive</option>
            </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Employee Type <span style="color:#f68ca6">*</span></label>
            <div class="col-sm-4">
            <select name="emp_type" class="form-control imp" id="emp_type" required>
              <option value=""></option>
              <option value="1" <?php if($user->emp_type==1) echo "selected"?>>Full-Time</option>
              <option value="2" <?php if($user->emp_type==2) echo "selected"?>>Pat-Time</option>
            </select>
            </div>

            
            <label class="col-sm-2 control-label" for="textinput">Banned-Status <span style="color:#f68ca6">*</span></label>
            <div class="col-sm-4">
            <select name="ban" class="form-control imp" id="ban" required>
              <option value="0" <?php if($user->banned==0) echo "selected"?>>Not Banned Since</option>
              <option value="1" <?php if($user->banned==1) echo "selected"?>>Banned</option>
              <option value="2" <?php if($user->banned==2) echo "selected"?>>Not Banned</option>
            </select>
            </div>
            

          </div>



          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
                <button type="clear" class="btn btn-default">Cancel</button>
                <button type="submit" id="submitbutton" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>

        </fieldset>
      </form>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

