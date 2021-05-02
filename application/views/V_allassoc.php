
	<div class="col-sm-10"> <!--Begin for Main Panels-->
		<div class="row">
		
			<div class="col-sm-12">
				<div class="panel panel-primary shadow text-center">
					<div class="panel-heading"><b class="">Associations</b></div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-stripped table-condensed table-hover" style="margin-bottom: 6px" id="advance-table">
								<thead>
									<tr>
										<td>
											<button style="color:black" type="button" class="btn btn-link btn-md"><b>Association Name</b></button>
										</td>
										<td>
											<button style="color:black" type="button" class="btn btn-link btn-md"><b>Route</b></button>
										</td>
										<td>
											<button style="color:black" type="button" class="btn btn-link btn-md"><b>District</b></button>
										</td>
										<td>
											<button style="color:black" type="button" class="btn btn-link btn-md"><b>No Of Units</b></button>
										</td>
										<td>
											<button style="color:black" type="button" class="btn btn-link btn-md"><b>Approval</b></button>
										</td>
										<td>
											<button style="color:black" type="button" class="btn btn-link btn-md"><b>Options</b></button>
										</td>
									</tr>
								</thead>
								<tbody>
								<?php
									foreach ($franchise as $row)
									{
										echo "<tr>";
											
											echo "<td style='padding-top:12px'>$row[association_name]</td>";
											echo "<td style='padding-top:12px'>$row[route]</td>"; 
											echo "<td style='padding-top:12px'>$row[district]</td>";
											
											echo "<td style='padding-top:12px'>$row[no_units]</td>";
											
											if ($row['assoc_approval'] === "Pending")
											{
												echo "<td style='padding-top:12px ; color:blue'>$row[assoc_approval]</td>";
											}
											else if ($row['assoc_approval'] === "Approved")
											{
												echo "<td style='padding-top:12px ; color:green'>$row[assoc_approval]</td>";
											}
											else if ($row['assoc_approval'] === "Disapproved")
											{
												echo "<td style='padding-top:12px ; color:red'>$row[assoc_approval]</td>";
											}
										
											echo "<td>";
												echo "<a href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_assoccomplete/$row[association_id]' type = 'button' role = 'button' class='btn btn-primary '><span class='glyphicon glyphicon-edit'></span> Info</a>";
												
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
