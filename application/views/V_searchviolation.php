
	<div class="col-sm-10"> <!--Begin for Main Panels-->
		<div class="row">
		
			<div class="col-sm-12">
				<div class="panel panel-primary text-center shadow">
					<div class="panel-heading"><b class="">Manage Violations</b></div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-stripped table-condensed table-hover" style="margin-bottom: 6px" id="advance-table">
								<thead>
									<tr>
										<td>
											<button style="color:black" type="button" class="btn btn-link btn-md"><b>Violation ID</b></button>
										</td>
										<td>
											<button style="color:black" type="button" class="btn btn-link btn-md"><b>Violation Name</b></button>
										</td>
										<td>
											<button style="color:black" type="button" class="btn btn-link btn-md"><b>Violation Details</b></button>
										</td>
										<td>
											<button style="color:black" type="button" class="btn btn-link btn-md"><b>Options</b></button>
										</td>
									</tr>
								</thead>
								<tbody>
								<?php
									foreach ($violation as $row)
									{
										echo "<tr>";
											
											echo "<td style='padding-top:12px'>$row[violation_id]</td>";
											echo "<td style='padding-top:12px'>$row[violation_name]</td>";
											echo "<td style='padding-top:12px'>$row[violation_detail]</td>"; 
											
											echo "<td>";
												echo "<a href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_getviolationinfo/$row[violation_id]' type = 'button' role = 'button' class='btn btn-success '><span class='glyphicon glyphicon-edit'></span> Edit</a>";
												echo "<a href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_deleteviolation/$row[violation_id]' type = 'button' role = 'button' class='btn btn-danger '><span class='glyphicon glyphicon-trash'></span> Delete</a>";
											echo "</td>";
										echo "</tr>";
									}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!--End for Main Panels-->
	<script>
		$(document).ready(function () {
			$('#advance-table').dataTable();
		});
	</script>
