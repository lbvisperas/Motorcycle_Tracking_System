
<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow text-center">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-6">
							<h4 class="pull-left ">Search Franchises To Approve/Disapprove...</h4>
						</div>
						
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">          
						<table class="table table-striped table-hover" style="margin-bottom: 6px" id="table">
							<thead>
								<tr>
									<td>
										<button style="color:black" type="button" class="btn btn-link btn-md"><b>City Plate No</b></button>
									</td>
									<td>
										<button style="color:black" type="button" class="btn btn-link btn-md"><b>Name</b></button>
									</td>
									<td>
										<button style="color:black" type="button" class="btn btn-link btn-md"><b>Approval</b></button>
									</td>
									<td>
										<button style="color:black" type="button" class="btn btn-link btn-md"><b>Status</b></button>
									</td>
									<td>
										<button style="color:black" type="button" class="btn btn-link btn-md"><b>Association</b></button>
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
								if ($row['requirements'] === "Complete" and $row['franchise_approval'] === "Pending")
									{
										echo "<tr>";
										$var = $row['franchise_id'];
											$var = str_pad($var,4,'0',STR_PAD_LEFT);
											echo "<td style='padding-top:12px'>$var</td>";
										echo "<td style='padding-top:12px'>$row[first_name] $row[last_name]</td>";
										if ($row['franchise_approval'] === "Approved")
											{
												echo "<td style='padding-top:12px ; color:green'>$row[franchise_approval]</td>";
											}
											else {echo "<td style='padding-top:12px ; color:red'>$row[franchise_approval]</td>";}
											if ($row['franchise_status'] === "Expired")
											{
												echo "<td style='padding-top:12px ; color:red'>$row[franchise_status]</td>";
											}
											else if ($row['franchise_status'] === "Active")
											{
												echo "<td style='padding-top:12px ; color:green'>$row[franchise_status]</td>";
											} else {echo "<td style='padding-top:12px ; color:blue'>$row[franchise_status]</td>";}
						
										echo "<td style='padding-top:12px'>$row[association_name]</td>";
										echo "<td>";
										echo "<a style='width:100%' href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_completeinfoforapprove/$row[franchise_id]' type = 'button' role = 'button' class='btn btn-primary'><span class='glyphicon glyphicon-thumbs-up'></span> Approve</a>";
										echo "</td>";
									echo "</tr>";
									}
									
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
		$('#table').dataTable();
	});
</script>
