<br>
      <div class="row">      
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $user->f_name.' '.$user->m_name.' '.$user->l_name?></h3>
            </div>
            <div class="panel-body">
              <!--  -->
              <div class="row">
              <?php if($user->profile_pic == NULL){ ?>
                <div class="col-md-12 col-lg-12 " align="left"> <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"> </div>
              <?php } else {?>
                <div class="col-md-12 col-lg-12 " align="left"> <img alt="User Pic" src="<?php echo base_url('uploads/users')."/".$user->profile_pic;?>"  style="height:150px;"> </div>
              <?php }?>
                
                <!-- user change profile picture  -->
                <?php 
                  if($user->user_id == $this->session->userdata('user_id'))
                   {
                ?>
                <div class="col-md-12 col-lg-12 " align="left"><br>
                  <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">
                    Change Picture
                  </button>
                </div>
                <?php } ?>
              </div>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Change Profile Picture</h4>
                      </div>
                      <div class="modal-body">
                        <?php $attributes = array('class' => 'form-horizontal');?>
                        <?php echo form_open_multipart('employee/change_pro_pic',$attributes); ?>
                        <div class="control-group hidden">
                            <label class="control-label" for="id">User ID</label>    
                            <div class="controls">
                              <input type="text" name="id" id="id" value="<?php echo $user->user_id;?>" required/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="pic">Select Image:</label>    
                            <div class="controls">
                              <input type="file" name="pic" id="pic" title="Where is the image?"required/>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- profile picture ends -->
              </div>
              <div class="panel panel-primary">
              <div class="panel-heading">
              <h3>Personal Information</h3>
              </div>
                <div class="panel-body">

                  <table class="table">
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
                  </table>
                </div>
               
              </div>
              <!--  -->
             
            </div>
          </div>
        </div>
      </div>
