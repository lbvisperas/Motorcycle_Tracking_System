
	<div class="col-sm-10"> <!--Begin for Main Panels-->
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-primary shadow text-center">
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-6">
								<h4 class="pull-left ">Search Franchise To Delete...</h4>
							</div>
							
						</div>
					</div>
					
					<div class="panel-body">

						<div class="table-responsive">          
							<table class="table table-stripped table-condensed table-hover" style="margin-bottom: 6px"id="advance-table">
								<thead>
									<tr>
										<td>
											<b>City Plate No</b>
										</td>
										<td>
											<b>Name</b>
										</td>
										<td>
											<b>Approval</b>
										</td>
										<td>
											<b>Status</b>
										</td>
										<td>
											<b>Begin Date</b>
										</td>
										<td>
											<b>Expire Date</b>
										</td>
										<td>
											<b>Association</b>
										</td>
										<td>
											<b>Options</b>
										</td>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($franchise as $row)
									{
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
											
										$year = substr($row['date_applied'], -4);
										$day = substr($row['date_applied'], 3,-5);
										$month = substr($row['date_applied'], 0, -8);
										
										if ($month == "01"){$month="January";}
										else if ($month == "02"){$month="February";}
										else if ($month == "03"){$month="March";}
										else if ($month == "04"){$month="April";}
										else if ($month == "05"){$month="May";}
										else if ($month == "06"){$month="June";}
										else if ($month == "07"){$month="July";}
										else if ($month == "08"){$month="August";}
										else if ($month == "09"){$month="September";}
										else if ($month == "10"){$month="October";}
										else if ($month == "11"){$month="November";}
										else if ($month == "12"){$month="December";}
										echo "<td style='padding-top:12px'>$month $day, $year</td>";
										
										$year1 = substr($row['expire_date'], -4);
										$day1 = substr($row['expire_date'], 3, -5);
										$month1 = substr($row['expire_date'], 0, -8);
										
										if ($month1 == "01"){$month1="January";}
										else if ($month1 == "02"){$month1="February";}
										else if ($month1 == "03"){$month1="March";}
										else if ($month1 == "04"){$month1="April";}
										else if ($month1 == "05"){$month1="May";}
										else if ($month1 == "06"){$month1="June";}
										else if ($month1 == "07"){$month1="July";}
										else if ($month1 == "08"){$month1="August";}
										else if ($month1 == "09"){$month1="September";}
										else if ($month1 == "10"){$month1="October";}
										else if ($month1 == "11"){$month1="November";}
										else if ($month1 == "12"){$month1="December";}
								
										echo "<td style='padding-top:12px'>$month1 $day1, $year1</td>";
										echo "<td style='padding-top:12px'>$row[association_name]</td>";
										echo "<td>";
										echo "<a style='width:100%' href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_droprequire/$row[franchise_id]' type = 'button' role = 'button' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> Drop</a>";
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