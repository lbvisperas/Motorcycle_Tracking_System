
<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow">
				<div class="panel-heading text-center"><b class="">Complete Association Information</b></div>
				<div class="panel-body">
					<div class="container-fluid">
					
						<ul class="nav nav-tabs">
						  <li class="active"><a data-toggle="tab" href="#home">Association Info</a></li>
						  <li><a data-toggle="tab" href="#home1">Members</a></li>
						</ul>
						
						<div class="tab-content">
						  <div id="home" class="tab-pane fade in active">
						  <hr>
								<div class="col-sm-12">
									<?php
										echo "<p style='font-size:17px'><strong>Association Name:</strong> $complete[association_name] </p>";
										echo "<p style='font-size:17px'><strong>Barangay:</strong> $complete[barangay]</p>";
										echo "<p style='font-size:17px'><strong>Route:</strong> $complete[route]</p>";
										echo "<p style='font-size:17px'><strong>District:</strong> $complete[district]</p>";
											if ($complete['assoc_approval'] === "Pending")
											{
												echo "<p style='font-size:17px ; color:blue'><strong>Approval: </strong>$complete[assoc_approval]</p>";
											}
											else if ($complete['assoc_approval'] === "Approved")
											{
												echo "<p style='font-size:17px ; color:green'><strong>Approval: </strong>$complete[assoc_approval]</p>";
											}
											else if ($complete['assoc_approval'] === "Disapproved")
											{
												echo "<p style='font-size:17px ; color:red'><strong>Approval: </strong>$complete[assoc_approval]</p>";
											}
										echo "<p style='font-size:17px'><strong>No of Members:</strong> $complete[no_units]</p>";
									?>
								</div>
						  </div>
						  <div id="home1" class="tab-pane fade">
					<br>
								<div class="col-sm-12">
									<?php
										
							echo "<div class='table-responsive text-center'> ";
							echo "<table class='table table-stripped table-condensed table-hover' id='advance-table' style='margin-bottom: 6px'>";
							echo "<thead>";
							echo "<tr>";
							echo "<td>";
							echo "<b>City Plate No</b>";
							echo "</td>";
							echo "<td>";
							echo "<b>Name</b>";
							echo "</td>";
							echo "<td>";
							echo "<b>Last Name</b>";
							echo "</td>";
							echo "</tr>";
							echo "</thead>";
							echo "<tbody>";
							
							foreach ($franchisers as $row)
							{
								echo "<tr>";
								$var = $row['applicant_id'];
										$var = str_pad($var,4,'0',STR_PAD_LEFT);
										echo "<td style='padding-top:12px'>$var</td>";
								echo "<td style='padding-top:12px'>$row[first_name] </td>";
								echo "<td style='padding-top:12px'>$row[last_name]</td>";
							}
							echo "</tbody>";
							echo "</table>";
										
									?>
									</div>
								</div>
						  </div>
						</div>
						  
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>
</div> <!--End for Main Panels-->

<script>
	$(document).ready(function () {
		$('#advance-table').dataTable();
	});
</script>
