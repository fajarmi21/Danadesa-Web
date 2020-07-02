<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<div class="row">
		<div class="col-md-6">
			<h3>Selamat Datang <b>Bendahara</b></h3>
			<legend></legend>
		</div>
		<div class="col-md-6" >

		</div>

		<div class="col-md-12">
			<a href="<?php echo site_url('admin/c_dusun/');?>">
				<button type="button" class="btn btn-success"><i class="fa fa-eye fa-fw"></i> Lihat Data Dusun</button>
			</a>
		</div>
	</div>
	<br>
<div class="row">
	<!-- <div class="col-md-6" id="keluarga" style="margin: 0 auto;"></div>
	<div class="col-md-6" id="penduduk" style="margin: 0 auto;"></div>
    <span>&nbsp;</span> -->
    <!-- <div class="col-md-6" id="graph" style="margin: 0 auto;"></div> -->
    <div class="col-md"></div>
    <!-- <div class="col-md-2" id="chartbiasa" style="height: 300px; width: 40%;"></div> -->

    <div class="col-md-6" style="margin-bottom: 30px;"><canvas id="desa" style="background-color:white;"></canvas></div>
    <div class="col-md-6" style="margin-bottom: 50px;"><canvas id="angdesa" style="background-color:white;"></canvas></div>
    <div style="width: 60%; margin: 0px auto;"><canvas id="dusun" style="background-color:white;"></canvas></div>
</div>
<script>
function nav_active(){
	document.getElementById("a-admin").className = "collapsed active";
	}

// very simple to use!
$(document).ready(function() {
  nav_active();
});
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assetku/highchart/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assetku/highchart/highcharts-3d.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assetku/highchart/exporting.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script type="text/javascript">
var canvas = document.getElementById("dusun");
var ctx = canvas.getContext('2d');

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 12;

var data = {
  labels: [<?php foreach ($tahun as $key) { echo $key['tahun'].","; } ?>],
  datasets: [{
      label: "Dusun Krajan",
      fill: true,
      lineTension: 0.1,
      backgroundColor: "rgba(128, 128, 128,0.4)",
      borderColor: "grey", // The main line color
      borderCapStyle: 'square',
      borderDash: [], // try [5, 15] for instance
      borderDashOffset: 0.0,
      borderJoinStyle: 'grey',
      pointBorderColor: "white",
      pointBackgroundColor: "grey",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "grey",
      pointHoverBorderColor: "black",
      pointHoverBorderWidth: 2,
      pointRadius: 4,
      pointHitRadius: 10,
      // notice the gap in the data and the spanGaps: true
      data: [<?php foreach ($krajan as $key) { echo $key['anggaran'].","; } ?>],
      spanGaps: true,
    }, {
      label: "Dusun Dukuh Utara",
      fill: true,
      lineTension: 0.1,
      backgroundColor: "rgba(0, 128, 0,0.4)",
      borderColor: "green",
      borderCapStyle: 'butt',
      borderDash: [],
      borderDashOffset: 0.0,
      borderJoinStyle: 'green',
      pointBorderColor: "white",
      pointBackgroundColor: "green",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "green",
      pointHoverBorderColor: "black",
      pointHoverBorderWidth: 2,
      pointRadius: 4,
      pointHitRadius: 10,
      // notice the gap in the data and the spanGaps: false
      data: [<?php foreach ($dukut as $key) { echo $key['anggaran'].','; } ?>],
      spanGaps: true,
    }, {
      label: "Dusun Dukuh Selatan",
      fill: true,
      lineTension: 0.1,
      backgroundColor: "rgba(255, 255, 0,0.4)",
      borderColor: "yellow",
      borderCapStyle: 'butt',
      borderDash: [],
      borderDashOffset: 0.0,
      borderJoinStyle: 'yellow',
      pointBorderColor: "white",
      pointBackgroundColor: "yellow",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "yellow",
      pointHoverBorderColor: "black",
      pointHoverBorderWidth: 2,
      pointRadius: 4,
      pointHitRadius: 10,
      // notice the gap in the data and the spanGaps: false
      data: [<?php foreach ($dukse as $key) { echo $key['anggaran'].','; } ?>],
      spanGaps: true,
    }, {
      label: "Dusun Ngadirejo",
      fill: true,
      lineTension: 0.1,
      backgroundColor: "rgba(0, 0, 255,0.4)",
      borderColor: "blue",
      borderCapStyle: 'butt',
      borderDash: [],
      borderDashOffset: 0.0,
      borderJoinStyle: 'blue',
      pointBorderColor: "white",
      pointBackgroundColor: "blue",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "blue",
      pointHoverBorderColor: "black",
      pointHoverBorderWidth: 2,
      pointRadius: 4,
      pointHitRadius: 10,
      // notice the gap in the data and the spanGaps: false
      data: [<?php foreach ($ngadirejo as $key) { echo $key['anggaran'].','; } ?>],
      spanGaps: true,
    }

  ]
};

// Notice the scaleLabel at the same level as Ticks
var options = {
  scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                },
                scaleLabel: {
                     display: true,
                     labelString: 'Anggaran dusun per tahun',
                     fontSize: 20 
                  }
            }]            
        }  
};

// Chart declaration:
var myBarChart = new Chart(ctx, {
  type: 'line',
  data: data,
  options: options
});


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////


var canvas = document.getElementById("angdesa");
var ctx = canvas.getContext('2d');

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 12;

var data = {
  labels: [<?php foreach ($angdesa as $key) { echo $key['tahun_pendapatan'].','; } ?>],
  datasets: [{
      label: "Desa Dukuh",
      fill: true,
      lineTension: 0.1,
      backgroundColor: "rgba(0,128,0,0.4)",
      borderColor: "green", // The main line color
      borderCapStyle: 'square',
      borderDash: [], // try [5, 15] for instance
      borderDashOffset: 0.0,
      borderJoinStyle: 'green',
      pointBorderColor: "white",
      pointBackgroundColor: "green",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "green",
      pointHoverBorderColor: "black",
      pointHoverBorderWidth: 2,
      pointRadius: 4,
      pointHitRadius: 10,
      // notice the gap in the data and the spanGaps: true
      data: [<?php foreach ($angdesa as $key) { echo $key['jml'].','; } ?>],
      spanGaps: true,
    }

  ]
};

// Notice the scaleLabel at the same level as Ticks
var options = {
  scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                },
                scaleLabel: {
                     display: true,
                     labelString: 'Anggaran desa per hari',
                     fontSize: 20 
                  }
            }]            
        }  
};

// Chart declaration:
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: options
});

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


var canvas = document.getElementById("desa");
var ctx = canvas.getContext('2d');

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 12;

var data = {
  labels: [<?php foreach ($desa as $key) { echo $key['tahun'].','; } ?>],
  datasets: [{
      label: "Desa Dukuh",
      fill: true,
      lineTension: 0.1,
      backgroundColor: "rgba(255,0,0,0.4)",
      borderColor: "red", // The main line color
      borderCapStyle: 'square',
      borderDash: [], // try [5, 15] for instance
      borderDashOffset: 0.0,
      borderJoinStyle: 'red',
      pointBorderColor: "white",
      pointBackgroundColor: "red",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "red",
      pointHoverBorderColor: "black",
      pointHoverBorderWidth: 2,
      pointRadius: 4,
      pointHitRadius: 10,
      // notice the gap in the data and the spanGaps: true
      data: [<?php foreach ($desa as $key) { echo $key['anggaran'].','; } ?>],
      spanGaps: true,
    }

  ]
};

// Notice the scaleLabel at the same level as Ticks
var options = {
  scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                },
                scaleLabel: {
                     display: true,
                     labelString: 'Anggaran desa per tahun',
                     fontSize: 20 
                  }
            }]            
        }  
};

// Chart declaration:
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: options
});
</script>


