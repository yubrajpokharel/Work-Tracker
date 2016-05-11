<!DOCTYPE html>
<html>
<head>
	<title>User Task Management Inc.</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link href="<?php echo base_url('assets/css/metisMenu.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/sb-admin-2.css') ?>" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('#table_user').DataTable();
        });
     </script>
     <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="<?php echo base_url('assets/js/graph')?>/excanvas.js"></script><![endif]-->
    
    <script language="javascript" type="text/javascript" src="<?php echo base_url('assets/js/graph')?>/jquery.jqplot.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/graph')?>/jquery.jqplot.css" />
    <script type="text/javascript" src="<?php echo base_url('assets/js/graph')?>/plugins/jqplot.highlighter.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/graph')?>/plugins/jqplot.cursor.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/graph')?>/plugins/jqplot.dateAxisRenderer.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="fb-root"></div>


<?php 
    $role =  $this->users->get_user_role($this->session->userdata('user_id')); 
    $name =  $this->users->get_user_full_name($this->session->userdata('user_id'));                            
?>

   <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Powerclean EMS</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                     Welcome <?php echo ucfirst($name);?> ( <?php if($role == 1) echo "Admin"; else if($role == 2) echo "Manager"; else if($role == 3) echo "Employee";?> ) <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url('/profile')?>"><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('/auth/logout');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo base_url('/dashboard'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                       
                        <?php if($role == ADMIN) {?>
                        <li>
                            <a href="<?php echo base_url('/addEmp');?>"><i class="fa fa-plus fa-fw"></i> Add Employee</a>
                        </li>
                        <?php }?>
                        

                        <?php if($role == MANAGER) {?>
                        <li>
                            <a href="<?php echo base_url('/addEmpManager');?>"><i class="fa fa-plus fa-fw"></i> Add Employee</a>
                        </li>
                        <?php }?>


                        <?php if($role == ADMIN) {?>
                        <li>
                            <a href="<?php echo base_url('/listEmp');?>"><i class="fa fa-reorder  fa-fw"></i> View Employee</a>
                        </li>
                        <?php }?>

                        <?php if($role == MANAGER) {?>
                        <li>
                            <a href="<?php echo base_url('/listEmpManager');?>"><i class="fa fa-reorder  fa-fw"></i> View Employee</a>
                        </li>
                        <?php }?>

                        <?php if($role == MANAGER) {?>
                        <li>
                            <a href="<?php echo base_url('/puncher');?>"><i class="text-clock fa fa-arrow-circle-down fa-fx"></i> Punch in task</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/manager_remaining');?>"><i class="text-danger fa fa-money fa-fx"></i> My Remaining Hours</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/manager_paid');?>"><i class="text-success fa fa-money fa-fw"></i> My Paid Hours</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/Emphours');?>"><i class="text-success fa fa-clock-o  fa-fw"></i> Employee New Working hours</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/PaidEmphours');?>"><i class="text-danger fa fa-clock-o  fa-fw"></i> Employee Paid Working hours</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/stats');?>"><i class="text-success fa fa-line-chart fa-fw"></i> Insights</a>
                        </li>
                        <?php }?>

                        <?php if($role == EMPLOYEE) { ?>
                        <li>
                            <a href="<?php echo base_url('/profile');?>"><i class="fa fa-user fa-fw"></i> My Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/remaining');?>"><i class="text-danger fa fa-money fa-fx"></i> My Remaining Hours</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/paid');?>"><i class="text-success fa fa-money fa-fw"></i> My Paid Hours</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/stats');?>"><i class="text-success fa fa-line-chart fa-fw"></i> Insights</a>
                        </li>
                        <?php }?>
                        <li>
                            <a href="<?php echo base_url('/auth/logout');?>"><i class="fa fa-lock fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            <br>
			<?=$content_for_layout?>      
        </div>
        <!-- /#page-wrapper -->
        <!-- footer -->
	<hr>
	<div class="row-fluid">
		<div class="col-lg-12"  style="padding:20px;">
			<div class="col-lg-8">
				<a href="#">Terms of Service</a>    
				<a href="#">Privacy</a>    
				<a href="#">Security</a>
			</div>
			<div class="span4">
				<p class="muted pull-right">© <?php echo date('Y')?> PowerClean Inc.. All rights reserved</p>
			</div>
		</div>
	</div>
        <!-- footer ends -->
    </div>

</body>

<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
 <script src="<?php echo base_url('assets/js/metisMenu.min.js')?>"></script>
 <script src="<?php echo base_url('assets/js/sb-admin-2.js')?>"></script>
 
 

</html>
