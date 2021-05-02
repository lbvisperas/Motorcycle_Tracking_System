<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow text-center">
				<div class="panel-heading"><b class="">Options</b></div>
				<div class="panel-body">
				<div class='col-sm-12'>
					<div class="col-sm-4">
						<?php echo "<a href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/approvefranchises/$franchise[franchise_id]' type = 'button' role = 'button' class='btn btn-block btn-success'><span class='glyphicon glyphicon-thumbs-up'></span> Approve</a>"; ?>
					</div>
					<div class="col-sm-4">
						<?php echo "<a href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/disapprovefranchises/$franchise[franchise_id]' type = 'button' role = 'button' class='btn btn-block btn-warning'><span class='glyphicon glyphicon-thumbs-down'></span> Disapprove</a>"; ?>
					</div>
					<div class="col-sm-4">
						<?php echo "<a href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_editfranchiserecord/$franchise[franchise_id]' type = 'button' role = 'button' class='btn btn-block btn-primary'><span class='glyphicon glyphicon-edit'></span> Edit Records</a>"; ?>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow">
				<div class="panel-heading text-center"><b class="">Review Franchise Information</b></div>
				<div class="panel-body">
					<div class="container-fluid">
					
						<ul class="nav nav-tabs">
						  <li class="active"><a data-toggle="tab" href="#home">Franchise</a></li>
						  <?php
						  if ($franchise['application_type'] === "Operator")
						  {
							  echo "<li><a data-toggle='tab' href='#menu1'>Operator</a></li>";
							  echo "<li><a data-toggle='tab' href='#menu2'>Driver</a></li>";
							  echo "<li><a data-toggle='tab' href='#menu3'>Association</a></li>";
							  echo "<li><a data-toggle='tab' href='#menu4'>Unit</a></li>";
						  }
						  else
						  {
							  echo "<li><a data-toggle='tab' href='#menu1'>Driver/Operator</a></li>";
							  echo "<li><a data-toggle='tab' href='#menu3'>Association</a></li>";
							  echo "<li><a data-toggle='tab' href='#menu4'>Unit</a></li>";
						  }
						  ?>
						</ul>
						
						<div class="tab-content">
						  <div id="home" class="tab-pane fade in active">
								<br>
								<em><h4> Franchise Information: </h4></em>
								<br>
								<div class="col-sm-12">
									<?php
										echo "<p style='font-size:17px'><strong>Case No:</strong> $franchise[case_no] </p>";
										$var = $franchise['franchise_id'];
										$var = str_pad($var,4,'0',STR_PAD_LEFT);
										echo "<p style='font-size:17px'><strong>Application Type:</strong> $franchise[application_type]</p>";
										echo "<p style='font-size:17px'><strong>City Plate:</strong> $var</p>";
										echo "<p style='font-size:17px'><strong>Franchise Status:</strong> $franchise[franchise_status]</p>";
										echo "<p style='font-size:17px'><strong>Franchise Approval:</strong> $franchise[franchise_approval]</p>";
										
										if ($franchise['franchise_status'] === "Expired")
										{
											$var = $franchise['time_elapsed_since_expire'];
											$day = substr($var, -2);
											$month = substr($var, 3,-3);
											$year = substr($var, 0, -6);
											echo "<p style='font-size:17px;color:green'><strong>Franchise Begin Date:</strong> $franchise[date_applied]</p>";
											echo "<p style='font-size:17px;color:red'><strong>Franchise Expire Date:</strong> $franchise[expire_date]</p>";
											echo "<p style='font-size:17px;color:blue'><strong>Time Elapsed Since Expire:</strong> $year years, $month months, $day days</p>";
										}
										else if ($franchise['franchise_status'] === "Active")
										{
										
											$seconds= strtotime($franchise['expire_date']) - time();
											
											$days = floor($seconds / 86400);
											$seconds %= 86400;

											$hours = floor($seconds / 3600);
											$seconds %= 3600;

											$minutes = floor($seconds / 60);
											$seconds %= 60;
											echo "<p style='font-size:17px;color:blue'><strong>Franchise Begin Date:</strong> $franchise[date_applied]</p>";
										echo "<p style='font-size:17px;color:red'><strong>Franchise Expire Date:</strong> $franchise[expire_date]</p>";
										
											echo "<p style='font-size:17px;color:green'><strong> Time Remaining: </strong>$days days, $hours hours, $minutes minutes and $seconds seconds'></p>";
										}
	
									?>
								</div>
						  </div>
		<?php
		if ($franchise['application_type'] === "Operator")
		{
						  echo "<div id='menu1' class='tab-pane fade'>";
							echo "<br><h4><strong><em>Operator Information:</em></strong></h4>";
								echo "<br>";
								
								echo "<div class='col-sm-4'>";
									
										echo "<p style='font-size:17px'><strong>First Name:</strong> $franchise[first_name]</p>";
										echo "<p style='font-size:17px'><strong>Middle Name:</strong> $franchise[middle_name]</p>";
										echo "<p style='font-size:17px'><strong>Last Name:</strong> $franchise[last_name]</p>";
										echo "<p style='font-size:17px'><strong>Birthday:</strong> $franchise[birthday]</p>";
										echo "<p style='font-size:17px'><strong>Age:</strong> $franchise[age]</p>";
									
					
										echo "<p style='font-size:17px'><strong>Address:</strong> $franchise[address]</p>";
										echo "<p style='font-size:17px'><strong>Gender:</strong> $franchise[gender]</p>";
										echo "<p style='font-size:17px'><strong>Contact Number:</strong> $franchise[contact_num]</p>";
								echo "</div>";
								echo "<div class='col-sm-7'>";
										echo "<img src='$franchise[operator_picture]' alt='operator_pic' style='width:230px;height:230px;'><hr>";
									
								echo "</div>";
						  echo "</div>";
						  
						  echo "<div id='menu2' class='tab-pane fade'>";
							echo "<br><h4><strong><em>Driver Information:</em></strong></h4>";
								echo "<br>";
								
								echo "<div class='col-sm-4'>";
										echo "<p style='font-size:17px'><strong>First Name:</strong> $franchise[d_first_name]</p>";
										echo "<p style='font-size:17px'><strong>Middle Name:</strong> $franchise[d_middle_name]</p>";
										echo "<p style='font-size:17px'><strong>Last Name:</strong> $franchise[d_last_name]</p>";
								
										echo "<p style='font-size:17px'><strong>Address:</strong> $franchise[d_address]</p>";
										echo "<p style='font-size:17px'><strong>Contact Number:</strong> $franchise[d_contact_num]</p>";
										echo "<p style='font-size:17px'><strong>Licence Number:</strong> $franchise[d_licence_num]</p>";
								echo "</div>";
								echo "<div class='col-sm-7'>";
										echo "<img src='$franchise[driver_picture]' alt='operator_pic' style='width:230px;height:230px;'><hr>";
									
								echo "</div>";
						  echo "</div>";
		}	
		else
		{
			 echo "<div id='menu1' class='tab-pane fade'>";
							echo "<br><h4><strong><em>Driver/Operator Information:</em></strong></h4>";
								echo "<br>";
								
								echo "<div class='col-sm-4'>";
										echo "<p style='font-size:17px'><strong>First Name:</strong> $franchise[first_name]</p>";
										echo "<p style='font-size:17px'><strong>Middle Name:</strong> $franchise[middle_name]</p>";
										echo "<p style='font-size:17px'><strong>Last Name:</strong> $franchise[last_name]</p>";
										echo "<p style='font-size:17px'><strong>Birthday:</strong> $franchise[birthday]</p>";
										echo "<p style='font-size:17px'><strong>Age:</strong> $franchise[age]</p>";
										echo "<p style='font-size:17px'><strong>Address:</strong> $franchise[address]</p>";
										echo "<p style='font-size:17px'><strong>Gender:</strong> $franchise[gender]</p>";
										echo "<p style='font-size:17px'><strong>Contact Number:</strong> $franchise[contact_num]</p>";
										echo "<p style='font-size:17px'><strong>Licence Number:</strong> $franchise[licence_num]</p>";
								echo "</div>";
								echo "<div class='col-sm-7'>";
										echo "<img src='$franchise[operator_picture]' alt='operator_pic' style='width:230px;height:230px;'><hr>";
								echo "</div>";
						  echo "</div>";
		}
		?>
						  <div id="menu3" class="tab-pane fade">
							<br><h4><strong><em>Association Information:</em></strong></h4>
							<br>
								<div class="col-sm-12">
								<?php
									echo "<p style='font-size:17px'><strong>Association Name:</strong> $franchise[association_name]</p>";
									echo "<p style='font-size:17px'><strong> Barangay:</strong> $franchise[barangay]</p>";
									echo "<p style='font-size:17px'><strong>Route:</strong> $franchise[route]</p>";
									echo "<p style='font-size:17px'><strong>District:</strong> $franchise[district]</p>";
									echo "<p style='font-size:17px'><strong>No of Registered Franchises:</strong> $franchise[no_units]</p>";
								?>
								</div>
						  </div>
						  <div id="menu4" class="tab-pane fade">
							<br><h4><strong><em>Unit Information:</em></strong></h4>
								<br>
								<div class="col-sm-12">
								<?php
									echo "<p style='font-size:17px'><strong>Classification:</strong> $franchise[classification]</p>";
									echo "<p style='font-size:17px'><strong>Unit Model:</strong> $franchise[unit_model]</p>";
									echo "<p style='font-size:17px'><strong>Plate Number:</strong> $franchise[plate_num]</p>";
									echo "<p style='font-size:17px'><strong>Registration Number:</strong> $franchise[registration_num]</p>";
								
									echo "<p style='font-size:17px'><strong>Chassis Number:</strong> $franchise[chassis_no]</p>";
									echo "<p style='font-size:17px'><strong>Year Model:</strong> $franchise[year_model]</p>";
									echo "<p style='font-size:17px'><strong>Motor Number:</strong> $franchise[motor_no]</p>";
									echo "<p style='font-size:17px'><strong>Unit Color:</strong> $franchise[unit_color]</p>";
								?>
								</div>
						  </div>
						  <div id="menu5" class="tab-pane fade">
							<br><h4><strong><em>Committed Violations:</em></strong></h4>
								<br>
								<div class="col-sm-12">
								<?php
								$ctr = 1;
								foreach ($violation as $row)
								{
										echo"<div class='col-sm-6'>";
										echo "<p style='font-size:13px'><strong>Entry Number:</strong> $ctr</p>";
										echo "<p style='font-size:13px'><strong>Violation Name:</strong> $row[violation_name]</p>";
										foreach ($violationdata as $wor)
										{
											if ($wor['violation_name'] == $row['violation_name'])
											{echo "<p style='font-size:13px'><strong>Violation Details:</strong> $wor[violation_detail]</p>";}
										}
										echo "<p style='font-size:13px'><strong>Complainant Name:</strong> $row[complainant_fullname]</p>";
										echo "<p style='font-size:13px'><strong>Complainant Contact Number:</strong> $row[com_contact_num]</p>";
										echo "<p style='font-size:13px'><strong>Complainant Report:</strong> $row[complainant_detailed_report]</p>";
										echo "<p style='font-size:13px'><strong>Date:</strong> $row[date]</p>";
										echo "<hr>";
										echo "</div>";
									
									$ctr=$ctr+1;
								}
								?>
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
