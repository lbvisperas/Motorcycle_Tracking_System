
<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary text-center shadow">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-6">
							<h4 class="pull-left ">Search Franchise...</h4>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">          
						 <table class="table table-striped table-hover" style="margin-bottom: 6px" id="advance-table">
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
										<button style="color:black" type="button" class="btn btn-link btn-md"><b>Begin Date</b></button>
									</td>
									<td>
										<button style="color:black" type="button" class="btn btn-link btn-md"><b>Expire Date</b></button>
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
									echo "<tr>";
										$year = substr($row['date_applied'], -4); //breakdown year, month, day numbers (date applied)
										$day = substr($row['date_applied'], 3, -5);
										$month = substr($row['date_applied'], 0, -8);
										
										if ($month == "01"){$month="January";}  //convert month numbers to Words
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
										
										$year1 = substr($row['expire_date'], -4);  //breakdown year, month, day numbers (expire date)
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
											
											echo "<td style='padding-top:12px'>$month $day, $year</td>";
											echo "<td style='padding-top:12px'>$month1 $day1, $year1</td>";
											echo "<td style='padding-top:12px'>$row[association_name]</td>";
											echo "<td>";
											echo "<a href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_completeinfo/$row[franchise_id]' type = 'button' role = 'button' class='btn btn-primary'><span class='glyphicon glyphicon-info-sign'></span> Franchise Info</a>";
									
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
