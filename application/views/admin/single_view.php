<br>
      <div class="row">      
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $user->f_name.' '.$user->m_name.' '.$user->l_name?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <?php if($user->profile_pic == NULL){ ?>
                <div class="col-md-12 col-lg-12 " align="left"> <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"> </div>
              <?php } else {?>
                <div class="col-md-12 col-lg-12 " align="left"> <img alt="User Pic" src="<?php echo base_url('uploads/users')."/".$user->profile_pic;?>"  style="height:150px;"> </div>
              <?php }?>
                <div class="col-md-12 col-lg-12 ">&nbsp;</div>
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Full Name:</td>
                        <td><?php echo $user->f_name.' '.$user->m_name.' '.$user->l_name?></td>
                      </tr>
                      <tr>
                        <td>Username</td>
                        <td><?php echo $user->username;?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><?php echo $user->email;?></td>
                      </tr>
                      <tr>
                        <td>Sex</td>
                        <td><?php echo $user->sex?"Male":"Female";?></td>
                      </tr>
                      <tr>
                        <td>D.O.B</td>
                        <td>01/24/1988</td>
                      </tr>
                      <tr>
                        <td>Contact Information</td>
                        <td>
                            <?php echo $user->mobile?> (Mobile) <br>
                            <?php echo $user->landline?> (Landline) 
                        </td>
                      </tr>
                      <tr>
                        <td>Address</td>
                        <td>
                          <?php echo $user->country.' ,'.$user->city.' ,'.$user->state.' ,'.$user->street;?><br>
                          <?php echo $user->block_no?>
                        </td>
                      </tr>
                      <tr>
                        <td>Post</td>
                        <td><?php echo $user->post; ?></td>
                      </tr>
                      <tr>
                        <td>Company Role</td>
                        <td><?php if($user->role == 1) echo "Admin"; else if($user->role == 2) echo "Manager"; else echo "Employee"; ?></td>
                      </tr>
                      <tr>
                        <td>Start Date</td>
                        <td><?php echo $user->join_date?></td>
                      </tr>
                      <tr>
                        <td>Start time</td>
                        <td><?php echo $user->start_time?></td>
                      </tr>
                      <tr>
                        <td>Emd Time</td>
                        <td><?php echo $user->end_time?></td>
                      </tr>
                      <tr>
                        <td>Salary/Hour</td>
                        <td>$ <?php echo $user->salary?></td>
                      </tr>
                      <tr>
                        <td>Status</td>
                        <td><?php echo $user->activated?"Active":"Unactive"; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
