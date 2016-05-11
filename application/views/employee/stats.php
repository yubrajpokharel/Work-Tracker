<div class="row" style="padding:10px;">
  <h3 class="bg-primary" style="padding:10px;">Working hours insights</h3>
  <?php if(!empty($my_hours_stats)) {?>
	<div class="col-lg-12 bg-success" id="chartdiv" style="height:400px;"></div>
  <?php } else {?>
  <h4 class="bg-danger" style="padding:10px;">You haven't update  your timesheet yet!</h4>
  <?php }?>

  <hr>&nbsp;

  <?php if(!empty($my_paid_salary)) {?>
  <div class="col-lg-12 bg-success" id="chartdiv2" style="height:400px;"></div>
  <?php } else {?>
  <h4 class="bg-danger" style="padding:10px;">You haven't get salary yet!</h4>
  <?php }?>
</div>

<script type="text/javascript">
$(document).ready(function(){
  var line1=[<?php foreach($my_hours_stats as $t){?>['<?php echo date('d-M-y', strtotime($t->date));?>',<?php echo $t->diff;?>],<?php }?>];
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

var line1=[<?php foreach($my_paid_salary as $t){?>['<?php echo date('d-M-y', strtotime($t->month));?>',<?php echo $t->total;?>],<?php }?>];
  var plot1 = $.jqplot('chartdiv2', [line1], {
      title:'salary / month',
      axes:{
        xaxis:{
          renderer:$.jqplot.DateAxisRenderer,
          tickOptions:{
            formatString:'%b&nbsp;%#d'
          } 
        },
        yaxis:{
          tickOptions:{
            formatString:'&nbsp;&nbsp;$%.0f'
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