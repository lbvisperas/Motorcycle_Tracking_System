<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow">
				<div class="panel-heading text-center"><b class="">Create New Franchise</b></div>
				<div class="panel-body">
					<div class="col-sm-2"></div>
					<div class="col-sm-7">
						<form id="myform" class="form-horizontal" role="form" action="https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_newfranchiserequire" enctype="multipart/form-data" method="post" autocomplete="off"> <!--form begin-->
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
										foreach ($franchise as $row)
										{
											echo "<option>$row[association_name]</option>";
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
									<input style="display: button-only;" name="operatorpic" id="operatorpic" data-validation="required mime size" data-validation-allowing="jpg, png" data-validation-max-size="2M" type="file">
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
					
					<hr>
					<h4 class="text-center"><strong>Unit Info:</strong></h4>
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
							<br>
							<div class="form-group text-left">
								<div class="col-sm-offset-4 col-sm-8">
									<button type="submit" name="submit" id="submit" class="btn btn-primary">Proceed To Requirements Page <span class="glyphicon glyphicon-arrow-right"></span></button>
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
