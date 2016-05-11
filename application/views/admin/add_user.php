<style type="text/css">
  .error {border-color:#f68ca6;};
  .form-group .mandatory{color:red;}
</style>

<div class="row">
    <div class="col-md-12">
      <form class="form-horizontal" id="adduser" role="form">
        <br>
        <div class="text-danger add-error text-center"></div>
        <div class="text-success add-success text-center"></div><br>
        <fieldset>
          <!-- Form Name -->
          <legend>Employee Personal Details</legend>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Name <span style="color:#f68ca6">*</span> </label>
            <div class="col-sm-4">
              <input type="text" name="fname" id="fname" placeholder="First Name" title="Please fill the name." class="form-control imp" required>
            </div>

            <div class="col-sm-2">
              <input type="text" name="mname" id="mname" placeholder="Middle Name" class="form-control">
            </div>

            <div class="col-sm-4">
              <input type="text" name="lname" id="lname" placeholder="Last Name" title="Please fill the last name" class="form-control imp" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Username</label>
            <div class="col-sm-4">
              <input type="text" name="username" id="username" placeholder="username" title="Please select the username" class="form-control imp" required>
            </div>

            <label class="col-sm-2 control-label" for="textinput">Email</label>
            <div class="col-sm-4">
              <input type="email" name="email" id="email" placeholder="E-mail Address" title="Please fill the valid E-mail addredd" class="form-control imp" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Password <span style="color:#f68ca6">*</span></label>
            <div class="col-sm-4">
              <input type="password" name="password" id="password" placeholder="password" class="form-control imp" required>
            </div>

            <label class="col-sm-2 control-label" for="textinput">Confirm Pass <span style="color:#f68ca6">*</span></label>
            <div class="col-sm-4">
              <input type="password" name="repassword" id="repassword" placeholder="repassword" class="form-control imp" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Sex <span style="color:#f68ca6">*</span></label>
            <div class="col-sm-4">
              <select name="sex" id="sex" class="form-control imp" required>
                <option value=""></option>
                <option value="1">Male</option>
                <option value="2">Female</option>
            </select>
            </div>

            <label class="col-sm-2 control-label" for="textinput">D.O.B</label>
            <div class="col-sm-4">
              <input type="date" name="dob" id="dob" placeholder="D.O.B" class="form-control" title="mm/dd/yyyy">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Mobile</label>
            <div class="col-sm-4">
              <input type="text" name="mobile" id="mobile" placeholder="Mobile" class="form-control">
            </div>

            <label class="col-sm-2 control-label" for="textinput">Landline</label>
            <div class="col-sm-4">
              <input type="text" name="landline" id="landline" placeholder="Landline" class="form-control">
            </div>
          </div>

           

          <legend>Address Details</legend>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Country</label>
            <div class="col-sm-4">
              <input type="text" name="country" id="country" placeholder="Country" class="form-control">
            </div>

            <label class="col-sm-2 control-label" for="textinput">City</label>
            <div class="col-sm-4">
              <input type="text" name="city" id="city" placeholder="City" class="form-control">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">State</label>
            <div class="col-sm-4">
              <input type="text" name="state" id="state" placeholder="State" class="form-control">
            </div>

            <label class="col-sm-2 control-label" for="textinput">Street</label>
            <div class="col-sm-4">
              <input type="text" name="street" id="street" placeholder="Street" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Block Details</label>
            <div class="col-sm-10">
              <input type="text" name="block" id="block" placeholder="Block Detail" class="form-control">
            </div>
          </div>

           <legend>Company Details</legend>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Post <span style="color:#f68ca6">*</span></label>
            <div class="col-sm-4">
              <input type="text" name="post" id="post" placeholder="Job Post" class="form-control imp" required>
            </div>

            <label class="col-sm-2 control-label" for="textinput">Join Date <span style="color:#f68ca6">*</span></label>
            <div class="col-sm-4">
              <input type="date" name="join_date" id="join_date" placeholder="Join Date" class="form-control imp" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Start Time</label>
            <div class="col-sm-4">
              <input type="time" name="stime" id="stime" placeholder="Start Time" class="form-control">
            </div>

            <label class="col-sm-2 control-label" for="textinput">End Time</label>
            <div class="col-sm-4">
              <input type="time" name="etime" id="etime" placeholder="End Time" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Assign Role <span style="color:#f68ca6">*</span></label>
            <div class="col-sm-4">
            <select name="role" class="form-control imp" id="role" required>
              <option value=""></option>
              <option value="1">Admin</option>
              <option value="2">Manager</option>
              <option value="3">Employee</option>
            </select>
            </div>

            <label class="col-sm-2 control-label" for="textinput">Status <span style="color:#f68ca6">*</span></label>
            <div class="col-sm-4">
             <select name="status" id="status" class="form-control imp" required>
              <option value=""></option>
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Employee Type <span style="color:#f68ca6">*</span></label>
            <div class="col-sm-4">
            <select name="emp_type" class="form-control imp" id="emp_type" required>
              <option value=""></option>
              <option value="1">Full-Time</option>
              <option value="2">Pat-Time</option>
            </select>
            </div>
            
            <label class="col-sm-2 control-label" for="salary">Salary <span style="color:#f68ca6">*</span></label>
            <div class="col-sm-4">
              <input type="number" name="salary" id="salary" placeholder="Salary in $" class="form-control imp" required>
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

<script type="text/javascript">
  $(document).ready(function(){
    $("#submitbutton").click(function(e){  // passing down the event o form submit

      var fname = $('#fname').val();
      var lname = $('#lname').val();
      var username = $('#username').val();
      var email = $('#email').val();
      var post = $('#post').val();
      var role = $('#role').val();
      var status = $('#status').val();
      var pass = $('#password').val();
      var repass = $('#repassword').val();


      if(fname == "" || lname=='' || email=='' || post=='' || status=='' || role=='' || pass==''){
        if(pass != repass){
          alert('password not matched');
        }
          $('.add-error').html('<h3>Please provide the mandatory feilds.</h3>');
          $('.imp').addClass('error');
      }
      else{

        $.ajax({
           url:'<?php echo base_url("index.php/admin/save_employee")?>',
           type: 'POST',
           data: $("#adduser").serialize(),
           success: function(reply){
               if(reply == 'success'){
                   $('.add-error').html('');
                   $('.add-success').html('<h3>User added sucessfully</h3>');
                   document.getElementById("adduser").reset();
                   $('.imp').removeClass('error');
                   alert("User added sucessfully");
               }else{
                  alert("Something went wrong");
               }  
           },
           error: function(){
                alert("Fail Please try again later");
           }
       });
      }

   e.preventDefault(); // could also use: return false;

 });
  })
</script>
