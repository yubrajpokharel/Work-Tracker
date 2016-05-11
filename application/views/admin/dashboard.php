<?php foreach($total_working_hours as $t){?>

<?php } ?>
<div class="row">
	<div class="col-lg-4 col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-group fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $total_admins;?></div>
                        <div>Admins</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url('index.php/listEmpManager');?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-group fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $total_managers;?></div>
                        <div>Managers</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url('index.php/listEmpManager');?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-group fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $total_users;?></div>
                        <div>Employees</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url('index.php/listEmpManager');?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<hr>

<div class="row" style="padding:10px;">
  <?php if(!empty($total_working_hours)) { ?>
	<div class="col-lg-6 bg-danger" id="chartdiv" style="height:400px;"></div>
  <?php } else { ?>
  <div class="col-lg-6 bg-danger" style="padding:10px;">No any data to generate statictics.</div>
  <?php } ?>

  <?php if(!empty($total_salary)) { ?>
  <div class="col-lg-6 bg-success" id="chartdiv2" style="height:400px;"></div>
  <?php } else { ?>
  <div class="col-lg-6 bg-success" style="padding:10px;">No any data to generate statictics.</div>
  <?php } ?>
</div>

<script type="text/javascript">
$(document).ready(function(){
  var line1=[<?php foreach($total_working_hours as $t){?>['<?php echo date('d-M-y', strtotime($t->date));?>',<?php echo round($t->diff,2);?>],<?php }?>];
  var plot1 = $.jqplot('chartdiv', [line1], {
      title:'Working hour / day',
      axes:{
        xaxis:{
          renderer:$.jqplot.DateAxisRenderer,
          tickOptions:{
            formatString:'%b&nbsp;%#d'
          } 
        },
        yaxis:{
          tickOptions:{
            formatString:'&nbsp;&nbsp;%.0f hrs'
            }
        }
      },
      highlighter: {
        show: true,
        sizeAdjust: 7.5
      },
      cursor: {
        show: false
      }
  });

  var line1=[<?php foreach($total_salary as $t){?>['<?php echo date('d-M-y', strtotime($t->month));?>',<?php echo round($t->total,2);?>],<?php }?>];
  var plot1 = $.jqplot('chartdiv2', [line1], {
      title:'Salary / month',
      axes:{
        xaxis:{
          renderer:$.jqplot.DateAxisRenderer,
          tickOptions:{
            formatString:'%b&nbsp;%#d'
          } 
        },
        yaxis:{
          tickOptions:{
            formatString:'&nbsp;&nbsp;$ %.0f'
            }
        }
      },
      highlighter: {
        show: true,
        sizeAdjust: 7.5
      },
      cursor: {
        show: false
      }
  });
});
</script>