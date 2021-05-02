<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow">
				<div class="panel-heading text-center"><b class="">Edit Franchise</b></div>
				<div class="panel-body">
				
				<div class="container-fluid">
							
							<h4 style="margin-top:5px">Substitute Unit Of: <strong><i><?php echo $franchise['first_name']," ",ucfirst($franchise['middle_name'][0]),". ",$franchise['last_name'];?></i></strong></h4>
							<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#content1" data-toggle="tooltip" title="Show more details about this franchise">Show Info <small><span class="caret"></span></small></button><br>
							<div id="content1" class="collapse"><hr>
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
							</div><hr>
				
					<div class="col-sm-2"></div>
					<div class="col-sm-7">
						<form id="myform" class="form-horizontal" role="form" action="https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_updateunitrecord" enctype="multipart/form-data" method="post" autocomplete="off"> <!--form begin-->
						<input type="hidden" name="id" value="<?php echo "$franchise[franchise_id]"; ?>">
					<h4 class="text-center"><strong>Enter New Unit Info:</strong></h4>
					<hr>
							<div class="form-group">
								<label class="control-label col-sm-3" for="gender">Classification:</label>
								<div class="col-sm-9">
								<div class="radio">
								  <label><input type="radio" name="classification" value="Private" required>Private</label>
								  <label style="padding-left:40px"><input type="radio" name="classification" value="For Hire" required>For Hire</label>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="mn">Motor No:</label>
								<div class="col-sm-9">
									<input style=";" type="text" class="form-control" id="mn" placeholder="Enter motor number" name="mn" data-validation="required length alphanumeric" data-validation-length="12" maxLength="12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="un">Unit Model:</label> 
								<div class="col-sm-9">
									<input style=";" style="color:black;" type="text" class="form-control" id="un" placeholder="Enter unit model" name="un" data-validation="required alphanumeric" data-suggestions="KAWASAKI, HONDA, FOSHAN, YAMAHA, SUZUKI" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="plt">Plate No:</label>
								<div class="col-sm-9">
									<input style=";" type="text" class="form-control" id="plt" placeholder="Enter plate number" name="plt" data-validation="required alphanumeric" data-validation-allowing=" ">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="rn">Registration No:</label>
								<div class="col-sm-9">
									<input style=";" type="text" class="form-control" id="rn" placeholder="Enter registration number" name="rn" data-validation="required alphanumeric length" data-validation-length="10" maxLength="10">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="cn">Chassis No:</label>
								<div class="col-sm-9">
									<input style=";" type="text" class="form-control" id="cn" maxlength="17" placeholder="Enter chassis number" name="cn" data-validation="required alphanumeric length" data-validation-length="17">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="en">Year Model:</label>
								<div class="col-sm-9">
									<input style=";" type="text" class="form-control" id="en" placeholder="ENTER YEAR MODEL" name="en" data-validation="number required length" data-validation-length="4" maxLength="4">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="uc">Unit Color:</label>
								<div class="col-sm-9">
									<input style=";" type="text" class="form-control" id="uc" placeholder="Enter unit color" name="uc"  data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" data-suggestions="RED, BLUE, YELLOW, ORANGE, GREEN, VIOLET, MAROON, WHITE, BLACK" >
								</div>
							</div>
							<hr>
							<div style="padding-left:20%">
							<h4>Requirements For Unit Substitution:</h4>
							
								<label><input type="checkbox" id="ckbCheckAll"> Check All</label>
								<br>
								<div class="checkbox text-left">
								
								<label><input class="checkBoxClass" type="checkbox" required>OR/CR</label>
								</div>
							
								<div class="checkbox text-left">
								<label><input class="checkBoxClass" type="checkbox" required>CEDULA</label>
								</div>
								
								<div class="checkbox text-left">
								<label><input class="checkBoxClass" type="checkbox" required>BARANGAY CERTIFICATION</label>
								</div>
								
								<div class="checkbox text-left">
								<label><input class="checkBoxClass" type="checkbox" required>PROOF OF MEMBERSHIP</label>
								</div>
								
								<div class="checkbox text-left">
								<label><input class="checkBoxClass" type="checkbox" required>ROADWORTHY</label>
								</div>
								
								<div class="checkbox text-left">
								<label><input class="checkBoxClass" type="checkbox" required>MTOP SET</label>
								</div>
								
								<div class="checkbox text-left">
								<label><input class="checkBoxClass" type="checkbox" required>ONE BROWN LONG FOLDER</label>
								</div>
								
								<div class="checkbox text-left">
								<label><input class="checkBoxClass" type="checkbox" required>OPERATOR'S VALID ID (1 photocopy)</label>
								</div>
								
								<div class="checkbox text-left">
								<label><input class="checkBoxClass" type="checkbox" required>1 pc. Operator 2x2 picture</label>
								</div>
								
								<div class="checkbox text-left">
								<label><input class="checkBoxClass" type="checkbox" required>DRIVER'S LICENCE</label>
								</div>
								
								<div class="checkbox text-left">
								<label><input class="checkBoxClass" type="checkbox" required>1 pc. Driver 2x2 picture</label>
								</div>
								
							</div>
								<hr>
							
							<div class="form-group text-left">
								<div class="col-sm-offset-4 col-sm-8">
									<button style="width:50%" type="submit" name="submit" id="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update Records</button>
								</div>
							</div>
						</form> <!--form end-->
					</div>
					<div class="col-sm-3"></div>
					</div>
				</div>
			
			</div>
		</div>
	</div>
</div> <!--End for Main Panels-->

<script src="https://tricyclefranchisingsorsogon.online/ph/bootstrap/js/jquery.form-validator.min.js"></script>
<script src="https://tricyclefranchisingsorsogon.online/ph/bootstrap/js/jquery.form-validator-file.min.js"></script>
<script>
$(function(){
	$.validate();
	$(".chosen-select").chosen({allow_single_deselect: true});
});
</script>
