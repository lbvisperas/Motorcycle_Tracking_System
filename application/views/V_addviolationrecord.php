
	<div class="col-sm-10"> <!--Begin for Main Panels-->
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-primary shadow">
					<div class="panel-heading text-center"><b class="">Add Violation Record</b></div>
					<div class="panel-body">
						
						<div class="container-fluid">
							<h4 style="margin-top:5px"><strong>Add Violation Record For: </strong><i><?php echo $franchise['first_name']," ",ucfirst($franchise['middle_name'][0]),". ",$franchise['last_name'];?></i></h4>
							<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#content1" data-toggle="tooltip" title="Show more details about this franchise">Show Info <small><span class="caret"></span></small></button>
							<div id="content1" class="collapse"><br>
								<div class="row">
									<div class="col-sm-3">
										<h4><b>Franchise Info: </b></h4><br>
										<p><b>Application Type:</b> <?php echo $franchise['application_type']?></p>
										<p><b>Case Number:</b> <?php echo $franchise['case_no']?></p>
										<?php
									        $var = $franchise['franchise_id'];
											$var = str_pad($var,4,'0',STR_PAD_LEFT);
											echo "<p><b>Franchise Plate No: </b> $var</p>";
										?>
										<p style="color: green"><b>Franchise Begin Date:</b> <?php echo $franchise['date_applied']?></p>
										<p style="color: red"><b>Franchise Expire Date:</b> <?php echo $franchise['expire_date']?></p>
										
										<?php
										if ($franchise['franchise_status'] === "Expired")
										{
											$var = $franchise['time_elapsed_since_expire'];
											$day = substr($var, -2);
											$month = substr($var, 3,-3);
											$year = substr($var, 0, -6);
											echo"<p style='color: blue'><b>Time Elapsed: </b> $year year(s), $month month(s), $day day(s)</p>";
										}
										else
										{
											$seconds= strtotime($franchise['expire_date']) - time();
											
											$days = floor($seconds / 86400);
											$seconds %= 86400;

											$hours = floor($seconds / 3600);
											$seconds %= 3600;

											$minutes = floor($seconds / 60);
											$seconds %= 60;
											echo "<p style='color:blue'><strong>Franchise Time Remaining:</strong> $days days, $hours hours, $minutes minutes and $seconds seconds</p>";
										}
										?>
									</div>
									<?php
									if ($franchise['application_type'] === "Driver/Operator")
									{
										echo "<div class='col-sm-3'>";
											echo "<h4><b>Driver/Operator's Info: </b></h4><br>";
											echo "<p><b>Name:</b> $franchise[first_name] "; echo ucfirst($franchise['middle_name'][0]); echo ". $franchise[last_name]</p>";
											echo "<p><b>Association:</b> $franchise[association_name]</p>";
											echo "<p><b>Licence Number:</b> $franchise[licence_num]</p>";
											echo "<p><b>Birthday:</b> $franchise[birthday]</p>";
											echo "<p><b>Age:</b> $franchise[age]</p>";
											echo "<p><b>Address:</b> $franchise[address]</p>";
											echo "<p><b>Contact Number:</b> $franchise[contact_num]</p>";
											echo "<p><b>Gender:</b> $franchise[gender]</p>";
										echo "</div>";
									}
									else
									{
										echo "<div class='col-sm-3'>";
											echo "<h4><b>Operator's Info: </b></h4><br>";
											echo "<p><b>Name:</b> $franchise[first_name] "; echo ucfirst($franchise['middle_name'][0]); echo ". $franchise[last_name]</p>";
											echo "<p><b>Association:</b> $franchise[association_name]</p>";
											echo "<p><b>Birthday:</b> $franchise[birthday]</p>";
											echo "<p><b>Age:</b> $franchise[age]</p>";
											echo "<p><b>Address:</b> $franchise[address]</p>";
											echo "<p><b>Contact Number:</b> $franchise[contact_num]</p>";
											echo "<p><b>Gender:</b> $franchise[gender]</p>";
											
										echo "</div>";
										echo "<div class='col-sm-3'>";
											echo "<h4><b>Driver's Info: </b></h4><br>";
											echo "<p><b>Name:</b> $franchise[d_first_name] "; echo ucfirst($franchise['d_middle_name'][0]); echo ". $franchise[d_last_name]</p>";
											echo "<p><b>Licence Number:</b> $franchise[d_licence_num]</p>";
											echo "<p><b>Address:</b> $franchise[d_address]</p>";
											echo "<p><b>Contact Number:</b> $franchise[d_contact_num]</p>";
										echo "</div>";
									}
									?>
									
									<div class="col-sm-3">
										<h4><b>Units's Info: </b></h4><br>
										<p><b>Classification:</b> <?php echo $franchise['classification']?></p>
										<p><b>Unit Model:</b> <?php echo $franchise['unit_model']?></p>
										<p><b>Plate Number:</b> <?php echo $franchise['plate_num']?></p>
										<p><b>Registration Number:</b> <?php echo $franchise['registration_num']?></p>
										<p><b>Chassis Number:</b> <?php echo $franchise['chassis_no']?></p>
										<p><b>Motor Number:</b> <?php echo $franchise['motor_no']?></p>
										<p><b>Year Model:</b> <?php echo $franchise['year_model']?></p>
										<p><b>Unit Color:</b> <?php echo $franchise['unit_color']?></p>
									</div>

								</div>
							</div>
							<hr>
						
								
								<div class="col-sm-2"></div>
							<div class="col-sm-8">
								<form class="form-horizontal" role="form" action="https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_insertviolationrecord" method="post" autocomplete="off"> <!--form begin-->
									<input type='hidden' value='<?php echo "$franchise[first_name]"; ?>' name='name'></input>
									<?php
										$var = $franchise['franchise_id'];
										echo "<input type='hidden' name='app_id' value='$var'>";
									?>
									<div class="form-group">
										<label class="control-label col-sm-3" for="v_name">Violation Name:</label>
										<div class="col-sm-9">
											<select class="form-control chosen-select" data-placeholder="Select Violation Name" id="v_name" name="v_name" required>
											<option></option>
											<?php
												foreach ($violation as $row)
												{
													echo "<option>$row[violation_name]</option>";
												}
											?>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-sm-3" for="vn">Complainant Name:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="vn" placeholder="Enter Full Name" name="vn" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="vc">Contact Num:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="vc" placeholder="Enter Contact Number..." name="vc" data-validation="required number length" data-validation-length="11" maxlength="11">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="vr"> Report Details:</label>
										<div class="col-sm-9">
											<textarea class="form-control" rows="3" id="vr" placeholder="Enter Report Details..." name="vr" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$"></textarea>
										</div>
									</div>
									<hr>
									<div class="form-group text-left">
									<div class="col-sm-offset-5 col-sm-7">
										<button type="submit" name="submit" id="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save Record </button>
									</div>
									</div>
								</form>
							</div>
							<div class="col-sm-2"></div>
							</div>
						<br>
					</div>
				</div>
			</div>
		</div>
	</div> <!--End for Main Panels-->

	<script src="https://tricyclefranchisingsorsogon.online/ph/bootstrap/js/jquery.form-validator.min.js"></script>
<script>
$(function(){
	$.validate();
	$(".chosen-select").chosen({allow_single_deselect: true});
});
</script>