
<h2>Employee's List</h2>

<div class="well">
    <table id="table_user" class="display" style="font-size:12px">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Post</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $counter = 1;
            foreach($users as $user) { ?>
            <tr>
                <td><?php echo $counter; ?></td>
                <td><?php echo $user->f_name.' '.$user->m_name.' '.$user->l_name?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->post; ?></td>
                <td><?php if($user->role == 1)echo "Admin"; else if($user->role == 2) echo "Manager"; else echo "Employee"; ?> </td>

                <td><?php 
                        if($user->banned == 1 ) {
                            echo '<p class="text-danger">Banned</p>';
                        }else{
                            if($user->activated == 1)echo '<p class="text-success">Active</p>'; else echo '<p class="text-primary">Unactive</p>'; 
                        }
                    ?>
                </td>

                <td>
                    <a href="<?php echo base_url('index.php/viewEmpManager'.'/'.$user->user_id);?>"><i title="View" class="fa fa-eye text-success"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php if($user->role != 1) {?>
                    <a href="<?php echo base_url('index.php/editEmpManager'.'/'.$user->user_id);?>"><i title="Edit" class="fa fa-edit text-primary"> </i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php }?>
                    
                    <?php if($user->role != 1) {?>
                        <?php if($user->banned != 1) { ?>
                    <a href="<?php echo base_url('index.php/deleteEmpManager'.'/'.$user->user_id);?>"><i title="Delete" class="fa fa-times text-danger"></i></a>
                        <?php }?>
                    <?php }?>
                </td>
            </tr>
            <?php
                $counter++; 
            }?>
        </tbody>
    </table>
</div>

 
