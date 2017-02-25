<?php
	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['sa_username'])){
		header("Location:admin.php");
	}
?>
<?php
include_once "lib/webdesign.php";
htmlHeader('Dashboard','dashboard','');
pageHeader('Dashboard','dashboard','');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
			<?php
			include "model/config.php";
			$conn = mysqli_connect($host,$user,$pass,$db);

			//check
			if( mysqli_connect_errno($conn) ){
				echo "Error in DB";
			}else{
			}
			//prepare
			$sql = "SELECT COUNT(*) FROM questions";

			//display
			$result = mysqli_query($conn, $sql);
			$cout_alert = mysqli_fetch_array($result);
			?>
              <h3><?php echo $cout_alert[0];?></h3>

              <p>TOTAL INQUIRIES</p>
            </div>
            <div class="icon">
              <i class="fa fa-list-alt"></i>
            </div>
            <a href="admin.php?action=inquiries" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
		<div class="col-xs-12">
			<!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">YEARLY INQUIRIES</h3>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
        <!-- ./col -->
		<div 
      </div>
      
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php
pageFooter();
?>
<script src="plugins/chartjs/Chart.min.js"></script>
<script>
$(function () {
//--------------
    //- AREA CHART -
    //--------------

    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);

	$.ajax({
		url: "report_monthly.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var month = [];
			var qty = [];
			for(var i in data) {
				month.push(data[i].month);
				qty.push(data[i].qty);
			}
			var barChartData = {
			  labels: month,
						datasets : [
							{
								label: 'Month',
								fillColor: "rgba(60,141,188,0.9)",
								strokeColor: "rgba(60,141,188,0.8)",
								pointColor: "#3b8bba",
								pointStrokeColor: "rgba(60,141,188,1)",
								pointHighlightFill: "#fff",
								pointHighlightStroke: "rgba(60,141,188,1)",
								data: qty
							}
						]
			};

    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);

		}
	});
	
	
    

});


</script>
<?php
htmlFooter();
?>