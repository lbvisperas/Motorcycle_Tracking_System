
	<div class="col-sm-10"> <!--Begin for Main Panels-->
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-primary shadow">
					<div class="panel-heading text-center"><b class="">Transfer Franchise</b></div>
					<div class="panel-body">
						
						<div class="container-fluid">
						
							<h4 style="margin-top:5px"><b>Transfer Franchise Of: </b><i><?php echo $franchise['first_name']," ",ucfirst($franchise['middle_name'][0]),". ",$franchise['last_name'];?></i></h4>
							<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#content1" data-toggle="tooltip" title="Show more details about this franchise">Review Info <small><span class="caret"></span></small></button>
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
							
							<h4 style="margin-top:5px"><b>Will Be Transfered To:</b></h4>
							<div class="col-sm-2"></div>
							<div class="col-sm-7">
							
							<form class="form-horizontal" role="form" action="https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/transferrequire" method="post" autocomplete="off"> <!--form begin-->
							<?php
							if ($franchise['application_type'] === "Operator")
							{
								echo "<input type='hidden' name='fid' value='$franchise[franchise_id]'>";
								echo "<input type='hidden' name='oldname' value='$franchise[first_name]'>"; //need to
								echo "<input type='hidden' name='oldmname' value='$franchise[middle_name]'>"; //need to transfer this
								echo "<input type='hidden' name='oldlname' value='$franchise[last_name]'>";
								echo "<input type='hidden' name='oldbday' value='$franchise[birthday]'>";
								echo "<input type='hidden' name='oldage' value='$franchise[age]'>";
								echo "<input type='hidden' name='oldci' value='$franchise[contact_num]'>";
								echo "<input type='hidden' name='oldaddress' value='$franchise[address]'>";
								echo "<input type='hidden' name='oldcstatus' value='$franchise[application_type]'>";
								echo "<input type='hidden' name='oldgender' value='$franchise[gender]'>";
								
								echo "<input type='hidden' name='oldassoc' value='$franchise[association_name]'>";
								
								echo "<input type='hidden' name='olddci' value='$franchise[d_contact_num]'>";
								echo "<input type='hidden' name='olddaddress' value='$franchise[d_address]'>";
								echo "<input type='hidden' name='olddname' value='$franchise[d_first_name]'>";
								echo "<input type='hidden' name='olddmname' value='$franchise[d_middle_name]'>";
								echo "<input type='hidden' name='olddlname' value='$franchise[d_last_name]'>";
								echo "<input type='hidden' name='olddln' value='$franchise[d_licence_num]'>";
							}
							else
							{
								echo "<input type='hidden' name='oldln' value='$franchise[licence_num]'>";
								
							}
							?>
							
									
								
								<input type="hidden" name="oldrn" value="<?php echo $franchise['registration_num']?>">
								
								<input type="hidden" name="da" value="<?php echo $franchise['date_applied']?>">
								<input type="hidden" name="ed" value="<?php echo $franchise['expire_date']?>">
								
								<br>
								
							<h4><strong>Please Fill These First: </strong></h4>
							<hr>
							<div class="form-group">
								<label class="control-label col-sm-3" for="cstatus">Applied as:</label>
								<div class="col-sm-9">
								<div class="radio">
								  <label><input id="operator" type="radio" value="Operator" name="cstatus" required>Operator</label>
								  <label style="padding-left:40px"><input type="radio" name="cstatus" id="driver" value="Driver/Operator" required>Driver/Operator</label>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="casen3">Case No:</label>
								<div class="col-sm-2">
									<input type="text" class="form-control" id="casen1" value="COS" name="casen1" readonly>
								</div>
								<div style="padding-left: 0px" class="col-sm-3">
									<input type="text" class="form-control" id="casen2" value='<?php $today = getdate(); echo $today['year']; ?>' name="casen2" data-validation="required number length" data-validation-length="4" maxLength="4">
								</div>
								<div style="padding-left: 0px" class="col-sm-4">
									<input type="text" class="form-control" id="casen3" placeholder="e.g. 0001" name="casen3" data-validation="required number length" data-validation-length="4" maxLength="4">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="sel1">Membership:</label>
								<div class="col-sm-9">
								  <select class="form-control chosen-select" data-placeholder="Select Association" id="sel1" name="assoc" required>
									<option></option>
									<?php
										foreach ($assoc as $row)
										{
											if (strlen($row['association_name']) != 1)
											{
												echo "<option>$row[association_name]</option>";
											}
										}
									?>
								  </select>
								</div>
							</div>
							<hr>
							<h4 class="text-center" id="type"><strong>Operator's Info:</strong></h4>
							<h4 class="text-center" id="type1" hidden><strong>Driver/Operator's Info:</strong></h4>
							<hr>
							<div class="form-group">
								<label class="control-label col-sm-3" for="name">First Name:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="name" placeholder="Enter name" name="name" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="mname">Middle Name: </label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="mname" placeholder="Enter middle name" name="mname" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="lname">Last Name:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
								</div>
							</div>
							
								<div class="form-group">
									<label class="control-label col-sm-3" for="bday">Birthday:</label>
									
									<div class="col-sm-4">
										<select class="form-control chosen-select" data-placeholder="Month" id="bday" name="bdaymonth" required>
										<option></option>
										<?php
											echo "<option>January</option>";
											echo "<option>February</option>";
											echo "<option>March</option>";
											echo "<option>April</option>";
											echo "<option>May</option>";
											echo "<option>June</option>";
											echo "<option>July</option>";
											echo "<option>August</option>";
											echo "<option>September</option>";
											echo "<option>October</option>";
											echo "<option>November</option>";
											echo "<option>December</option>";
										?>
										</select>
									</div>
								
									<div style="padding-left:0px" class="col-sm-2">
										<select class="form-control chosen-select" data-placeholder="Day" id="bday" name="bdayday" required>
										<option></option>
										<?php
											for ($num = 1; $num !=32 ; $num++)
											{echo "<option>$num</option>";}
										?>
										</select>
									</div>
									<div style="padding-left:0px" class="col-sm-3">
										<select class="form-control chosen-select" data-placeholder="Year" id="bday" name="bdayyear" required>
										<option></option>
										<?php
											$today = getdate();
											$year = $today['year'];
											$range = $year - 90;
										
											for ($num = $year; $num != $range ; $num--)
											{echo "<option>$num</option>";}
										?>
										</select>
									</div>
								</div>
							
							<div class="form-group">
								<label class="control-label col-sm-3" for="address">Address:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="address" placeholder="Enter address" name="address" data-validation="required">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="ci">Contact No:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="ci" name="ci" placeholder="Enter mobile number e.g. 09067114953" data-validation="required number length" data-validation-length="11" maxLength="11">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="gender">Gender:</label>
								<div class="col-sm-9">
								<div class="radio">
								  <label><input type="radio" name="gender" value="Male" required>Male</label>
								  <label style="padding-left:40px"><input type="radio" name="gender" value="Female" required>Female</label>
								</div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label col-sm-3" for="ci">ID Picture: </label>
								<div class="col-sm-9">
									<input style="display: button-only;" type="file" name="operatorpic" id="operatorpic" data-validation="required mime size" data-validation-allowing="jpg, png" data-validation-max-size="2M" type="file">
								</div>
							</div>
							
							<div id="div1">
							<hr>
							<h4 class="text-center"><strong>Driver's Info:</strong></h4>
							<hr>
							<div class="form-group">
								<label class="control-label col-sm-3" for="dname">First Name:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="dname" placeholder="Enter first name" name="dname" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="dmname">Middle Name:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="dmname" placeholder="Enter middle name" name="dmname" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="dlname">Last Name:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="dlname" placeholder="Enter last name" name="dlname" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="daddress">Address:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="daddress" placeholder="Enter address" name="daddress" data-validation="required">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="dcn">Contact No:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="dcn" name="dcn" placeholder="Enter mobile number e.g. 09067114953" data-validation="required number length" data-validation-length="11"  maxLength="11">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="ci">ID Picture: </label>
								<div class="col-sm-9">
									<input name="driverpic" id="driverpic" data-validation="required mime size" data-validation-allowing="jpg, png" data-validation-max-size="2M" type="file">
								</div>
							</div>
							</div>
							<p id="above"></p>
							
							<div class="form-group">
								<label class="control-label col-sm-3" for="ln1">License No:</label>
								<div class="col-sm-3">
									<input style=";" type="text" class="form-control" placeholder="e.g. E05" id="ln1" name="ln1" maxLength="3" data-validation="required alphanumeric length" data-validation-length="3">
								</div>
								<div style="padding-left: 0px" class="col-sm-3">
									<input style=";" type="text" class="form-control" id="ln2" placeholder="01" name="ln2" maxLength="2" data-validation="required alphanumeric length" data-validation-length="2">
								</div>
								<div style="padding-left: 0px" class="col-sm-3">
									<input style=";" type="text" class="form-control" id="ln3" placeholder="000001" name="ln3" maxLength="6" data-validation="required alphanumeric length" data-validation-length="6">
								</div>
							</div>
						<!--form continue-->
					
					
								<br>
								<div class="form-group text-left">
									<div class="col-sm-offset-4 col-sm-8">
									<button type="submit" name="submit" id="submit" class="btn btn-primary">Proceed To Requirements Page <span class="glyphicon glyphicon-arrow-right"></span></button>
								</div>
								</div>
							</form> <!--form end-->
						</div>
						<div class="col-sm-2"></div>
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