<script src="https://tricyclefranchisingsorsogon.online/ph/bootstrap/js/Chart.min.js"></script>
<script src="https://tricyclefranchisingsorsogon.online/ph/bootstrap/js/Chartlabel.min.js"></script>
<script src="https://tricyclefranchisingsorsogon.online/ph/bootstrap/js/utils.js"></script>
<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow">
				<div class="panel-heading text-center"><b class="">Monitor Amount of Units by Association</b></div>
				<div class="panel-body">
					<div class="container-fluid">
					<div class="col-sm-3"></div>
					<div class="col-sm-6" id="canvas-holder" style="width:50%">
						<canvas id="chart-area" />
					</div>
					<div class="col-sm-3"></div>
					
					<div class="col-sm-12 text-center">
					<br>
					</div>
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>
</div> <!--End for Main Panels-->
<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow">
				<div class="panel-heading text-center"><b class="">Data In Table Form</b></div>
					<div class="table-responsive text-center">          
					<br>
							<table class="table table-stripped table-condensed table-hover" style="margin-bottom: 6px" id="advance-table">
								<thead>
									<tr>
										<td>
										<button style="color:black" type="button" class="btn btn-link btn-md"><b>Association Name</b></button>
										</td>
										<td>
											<button style="color:black" type="button" class="btn btn-link btn-md"><b>No of Registered Units</b></button>
										</td>
									</tr>
								</thead>
								<tbody>
								<?php
									$counter = 0;
									foreach ($franchise as $row)
									{
									
										$counter++;
										echo "<tr>";
										echo "<td id='a_$counter'>$row[association_name]</td>";
										echo "<td id='b_$counter'>$row[no_units]</td>";
										echo "</tr>";
										
									}
									echo "<p id='counter' style='display:none'>$counter</p>";
								?>
								</tbody>
							</table>
						</div>
				<div class="panel-body">
				</div>
			</div>
		</div>
	</div>
</div>


<script>

    var range = document.getElementById("counter").innerHTML;
	var sum = 0; 
	var sum2 = 0;
	//for (var i=0; i<9; i++){
	//	var g = toString(i);
	//	sum += document.getElementById('b_' + g).innerHTML;
	//	sum2 += document.getElementById('a_' + g).innerHTML;
	//}
    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [

					document.getElementById("b_1").innerHTML,
					document.getElementById("b_2").innerHTML,
					document.getElementById("b_3").innerHTML,
					document.getElementById("b_4").innerHTML,
					document.getElementById("b_5").innerHTML,
					document.getElementById("b_7").innerHTML,
					document.getElementById("b_6").innerHTML,
					document.getElementById("b_8").innerHTML,
					document.getElementById("b_9").innerHTML

                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
					window.chartColors.white,
					window.chartColors.violet
                ],
                label: 'Dataset 1'
            }],
            labels: [
			//for (var i = 0; i <= range; i++) {
				//sum2
				document.getElementById("a_1").innerHTML,
				document.getElementById("a_2").innerHTML,
				document.getElementById("a_3").innerHTML,
				document.getElementById("a_4").innerHTML,
				document.getElementById("a_5").innerHTML,
				document.getElementById("a_7").innerHTML,
				document.getElementById("a_6").innerHTML,
				document.getElementById("a_8").innerHTML,
				document.getElementById("a_9").innerHTML
		   ]
        },
        options: {
        tooltips: {
            enabled: true
        },
        pieceLabel: {
            mode: 'percentage',
			arc: true,
			fontColor: '#000',
			position: 'outside',
			precision: 2
        },
        responsive: true,
        legend: {
            position: 'bottom',
        },
        title: {
            display: true,
            text: 'Statistics',
            fontSize: 20
        },
        animation: {
            animateScale: true,
            animateRotate: true
        }
    }
    };

    window.onload = function() {
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx, config);
    };

    document.getElementById('randomizeData').addEventListener('click', function() {
        config.data.datasets.forEach(function(dataset) {
            dataset.data = dataset.data.map(function() {
                return randomScalingFactor();
            });
        });

        window.myPie.update();
    });

    var colorNames = Object.keys(window.chartColors);
    document.getElementById('addDataset').addEventListener('click', function() {
        var newDataset = {
            backgroundColor: [
				window.chartColors.red,
                window.chartColors.orange,
                window.chartColors.yellow,
                window.chartColors.green,
                window.chartColors.blue,
				window.chartColors.orange,
				window.chartColors.white,
				window.chartColors.violet
			],
            data: [],
            label: 'New dataset ' + config.data.datasets.length,
        };

        for (var index = 0; index < config.data.labels.length; ++index) {
            newDataset.data.push(randomScalingFactor());

            var colorName = colorNames[index % colorNames.length];;
            var newColor = window.chartColors[colorName];
            newDataset.backgroundColor.push(newColor);
        }

        config.data.datasets.push(newDataset);
        window.myPie.update();
    });

    document.getElementById('removeDataset').addEventListener('click', function() {
        config.data.datasets.splice(0, 1);
        window.myPie.update();
    });
    </script>

	<script>
		$(document).ready(function () {
			$('#advance-table').dataTable();
		});
	</script>