<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow">
				<div class="panel-heading text-center"><b class="">Edit Franchise</b></div>
				<div class="panel-body">
					<div class="col-sm-2"></div>
					<div class="col-sm-7">
						<form id="myform" class="form-horizontal" role="form" action="https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_editfranchiserecord" enctype="multipart/form-data" method="post" autocomplete="off"> <!--form begin-->
							<hr>
							<div class="form-group">
								<label class="control-label col-sm-3" for="cstatus">Applied as:</label>
								<div class="col-sm-9">
								<div class="radio">
								<?php
								if ($franchise['application_type'] === "Operator")
								{
								  echo "<label><input id='operator' checked clicked type='radio' value='Operator' name='cstatus' required>Operator</label>";
								  echo "<label style='padding-left:40px'><input type='radio' name='cstatus' id='driver' value='Driver/Operator' required>Driver/Operator</label>";
								}
								else
								{
								  echo "<label><input id='operator' type='radio' value='Operator' name='cstatus' required>Operator</label>";
								  echo "<label style='padding-left:40px'><input checked type='radio' name='cstatus' id='driver' value='Driver/Operator' required>Driver/Operator</label>";
								}
								?>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="casen3">Case No:</label>
								<div class="col-sm-2">
									<input type="text" class="form-control" id="casen1" value="COS" name="casen1" readonly>
								</div>
								<?php
								$str = $franchise['case_no'];
								$second = substr($str, 4, -5);
								$third = substr($str, -4);
									echo "<div style='padding-left: 0px' class='col-sm-3'>
										<input type='text' class='form-control' id='casen2' value='$second' name='casen2' data-validation='required number length' data-validation-length='4' maxLength='4'>
									</div>
									<div style='padding-left: 0px' class='col-sm-4'>
										<input type='text' class='form-control' id='casen3' value='$third' name='casen3' data-validation='required number length' data-validation-length='4' maxLength='4'>
									</div>";
								?>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="sel1">Membership:</label>
								<div class="col-sm-9">
								  <select class="form-control chosen-select" data-placeholder="Select Association" id="sel1" name="assoc" required>
									<option></option>
									<?php
										foreach ($assoc as $row)
										{
											if ($franchise['association_name'] == $row['association_name'])
											{echo "<option selected>$row[association_name]</option>";}
											else {echo "<option>$row[association_name]</option>";}
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
									<input type="text" class="form-control" id="name" value="<?php echo "$franchise[first_name]";?>" name="name" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="mname">Middle Name: </label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="mname" value="<?php echo "$franchise[middle_name]";?>" name="mname" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="lname">Last Name:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="lname" value="<?php echo "$franchise[last_name]";?>" name="lname" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
								</div>
							</div>
							
								<div class="form-group">
									<label class="control-label col-sm-3" for="bday">Birthday:</label>
									
									<div class="col-sm-4">
										<select class="form-control chosen-select" data-placeholder="Month" id="bday" name="bdaymonth" required>
										<option></option>
										<?php
											$months= array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", );
											$str = $franchise['birthday'];
											
											$mon = substr($str,0, 2);
											$mon = $months[$mon-1];
											
											foreach ($months as $row)
											{
												if ($row == $mon) {echo "<option selected>$row</option>";}
												else{echo "<option>$row</option>";}
											}
										?>
										</select>
									</div>
								
									<div style="padding-left:0px" class="col-sm-2">
										<select class="form-control chosen-select" data-placeholder="Day" id="bday" name="bdayday" required>
										<option></option>
										<?php
											$str = $franchise['birthday'];
											$day = substr($str, 3,-5);
										
											for ($num = 1; $num !=32 ; $num++)
											{
												if ($day == $num)
												{echo "<option selected>$num</option>";}
												else {echo "<option>$num</option>";}
											}
										?>
										</select>
									</div>
									<div style="padding-left:0px" class="col-sm-3">
										<select class="form-control chosen-select" data-placeholder="Year" id="bday" name="bdayyear" required>
										<option></option>
										<?php
											$today = getdate();
											$year = $today['year'];
											$range = $year - 100;
											
											$str = $franchise['birthday'];
											$yearko = substr($str, -4);
										
											for ($num = $year; $num != $range ; $num--)
											{
												if ($num == $yearko)
												{echo "<option selected>$num</option>";}
												else {echo "<option>$num</option>";}
											}
										?>
										</select>
									</div>
								</div>
							
							<div class="form-group">
								<label class="control-label col-sm-3" for="address">Address:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="address" value="<?php echo "$franchise[address]";?>" name="address" data-validation="required">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="ci">Contact No:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="ci" name="ci" value="<?php echo "$franchise[contact_num]";?>" data-validation="required number length" data-validation-length="11" maxLength="11">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="gender">Gender:</label>
								<div class="col-sm-9">
								<div class="radio">
								<?php
								if ($franchise['gender'] === "Male")
								{
								  echo "<label><input checked type='radio' name='gender' value='Male' required>Male</label>
								  <label style='padding-left:40px'><input type='radio' name='gender' value='Female' required>Female</label>";
								}
								else
								{
									echo "<label><input type='radio' name='gender' value='Male' required>Male</label>
								  <label style='padding-left:40px'><input checked type='radio' name='gender' value='Female' required>Female</label>";
								}
								?>
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
									<input type="text" class="form-control" id="dname" value="<?php echo "$franchise[d_first_name]";?>" name="dname" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="dmname">Middle Name:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="dmname" value="<?php echo "$franchise[d_middle_name]";?>" name="dmname" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="dlname">Last Name:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="dlname" value="<?php echo "$franchise[d_last_name]";?>" name="dlname" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="daddress">Address:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="daddress" value="<?php echo "$franchise[d_address]";?>" name="daddress" data-validation="required">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="dcn">Contact No:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="dcn" name="dcn" value="<?php echo "$franchise[d_contact_num]";?>" data-validation="required number length" data-validation-length="11"  maxLength="11">
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
								<?php
								if ($franchise['application_type']==="Operator")
								{$str = $franchise['d_licence_num'];}
								else {$str = $franchise['licence_num'];}
								$first = substr($str,0,-10);
								$second = substr($str,4,-7);
								$third = substr($str,-6);
								
								echo "<div class='col-sm-3'>
									<input style=';' type='text' class='form-control' value='$first' id='ln1' name='ln1' maxLength='3' data-validation='required alphanumeric length' data-validation-length='3'>
								</div>
								<div style='padding-left: 0px' class='col-sm-3'>
									<input style=';' type='text' class='form-control' id='ln2' value='$second' name='ln2' maxLength='2' data-validation='required alphanumeric length' data-validation-length='2'>
								</div>
								<div style='padding-left: 0px' class='col-sm-3'>
									<input style=';' type='text' class='form-control' id='ln3' value='$third' name='ln3' maxLength='6' data-validation='required alphanumeric length' data-validation-length='6'>
								</div>";
								?>
							</div>
						<!--form continue-->
					
					<hr>
					<h4 class="text-center"><strong>Unit Info:</strong></h4>
					<hr>
							<div class="form-group">
								<label class="control-label col-sm-3" for="gender">Classification:</label>
								<div class="col-sm-9">
								<div class="radio">
								<?php
									if ($franchise['classification'] === "Private")
									{
									  echo "<label><input type='radio' name='classification' value='Private' checked required>Private</label>";
									  echo "<label style='padding-left:40px'><input type='radio' name='classification' value='For Hire' required>For Hire</label>";
									}
									else
									{
									  echo "<label><input type='radio' name='classification' value='Private' required>Private</label>";
									  echo "<label style='padding-left:40px'><input type='radio' checked name='classification' value='For Hire' required>For Hire</label>";
									}
								?>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="mn">Motor No:</label>
								<div class="col-sm-9">
									<input style=";" type="text" class="form-control" id="mn" value="<?php echo "$franchise[motor_no]";?>" name="mn" data-validation="required length alphanumeric" data-validation-length="12" maxLength="12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="un">Unit Model:</label> 
								<div class="col-sm-9">
									<input style=";" style="color:black;" type="text" class="form-control" id="un" value="<?php echo "$franchise[unit_model]";?>"name="un" data-validation="required alphanumeric" data-suggestions="KAWASAKI, HONDA, FOSHAN, YAMAHA, SUZUKI" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="plt">Plate No:</label>
								<div class="col-sm-9">
									<input style=";" type="text" class="form-control" id="plt" value="<?php echo "$franchise[plate_num]";?>" name="plt" data-validation="required alphanumeric" data-validation-allowing=" ">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="rn">Registration No:</label>
								<div class="col-sm-9">
									<input style=";" type="text" class="form-control" id="rn" value="<?php echo "$franchise[registration_num]";?>" name="rn" data-validation="required alphanumeric length" data-validation-length="10" maxLength="10">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="cn">Chassis No:</label>
								<div class="col-sm-9">
									<input style=";" type="text" class="form-control" id="cn" maxlength="17" value="<?php echo "$franchise[chassis_no]";?>" name="cn" data-validation="required alphanumeric length" data-validation-length="17">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="en">Year Model:</label>
								<div class="col-sm-9">
									<input style=";" type="text" class="form-control" id="en" value="<?php echo "$franchise[year_model]";?>" name="en" data-validation="number required length" data-validation-length="4" maxLength="4">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="uc">Unit Color:</label>
								<div class="col-sm-9">
									<input style=";" type="text" class="form-control" id="uc" value="<?php echo "$franchise[unit_color]";?>" name="uc"  data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" data-suggestions="RED, BLUE, YELLOW, ORANGE, GREEN, VIOLET, MAROON, WHITE, BLACK" >
								</div>
							</div>
							<br>
							<div class="form-group text-left">
								<div class="col-sm-offset-4 col-sm-8">
									<button style="width:50%" type="submit" name="submit" id="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save Records</button>
								</div>
							</div>
						</form> <!--form end-->
					</div>
					<div class="col-sm-3"></div>
					
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
