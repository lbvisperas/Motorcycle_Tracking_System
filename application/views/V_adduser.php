
	<div class="col-sm-10"> <!--Begin for Main Panels-->
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-primary shadow text-center">
					<div class="panel-heading"><b class="">Create New Account</b></div>
					<div class="panel-body">
						<div class="col-sm-2"></div>
						<div class="col-sm-8">
							<form class="form-horizontal" role="form" action="https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_adduser"  enctype="multipart/form-data" method="post" autocomplete="off"> <!--form begin-->
								<hr>
								<div class="form-group">
									<label class="control-label col-sm-3" for="fname">First Name:</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="lname">Last Name:</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="mail">Email:</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" id="mail" placeholder="Enter Email" name="mail" data-validation="email">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="username">Username:</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" data-validation="required alphanumeric" data-validation-allowing="!.,@#'">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="pass">Password:</label>
									<div class="col-sm-9">
										<input type="password" class="form-control" id="pass" placeholder="Enter Password" name="pass" data-validation="required strength length" data-validation-strength="1" data-validation-length="min5">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="pass">Confirm Password:</label>
									<div class="col-sm-9">
										<input type="password" class="form-control" id="passconfirm" placeholder="Re-enter Password" name="passconfirm" data-validation="required confirmation" data-validation-confirm="pass">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="ci">Profile Pic: </label>
									<div class="col-sm-9">
										<input name="profile_pic" id="profile_pic" data-validation="required mime size" data-validation-allowing="jpg, png" data-validation-max-size="2M" type="file">
									</div>
								</div>
								<div class="form-group">
								  <label class="control-label col-sm-3" for="acctype">Account Type:</label>
								  <div class="col-sm-9">
								  <select class="form-control" id="acctype" name="acctype" data-validation="required">
									<option value="" disabled selected style="display: none;">(Select Account Type)</option>
									<option>User</option>
									<option>Administrator</option>
								  </select>
								  </div>
								</div>
								<hr>
								<button type="submit" class="btn btn-success" style="width:50%"><span class="glyphicon glyphicon-check"></span> Create Account</button>
							</form> <!--form end-->
						</div>
						<div class="col-sm-2"></div>
						
					</div>
					<br>
				</div>
			</div>
		</div>
	</div> <!--End for Main Panels-->
	<script src="https://tricyclefranchisingsorsogon.online/ph/bootstrap/js/jquery.form-validator.min.js"></script>
<script src="https://tricyclefranchisingsorsogon.online/ph/bootstrap/js/jquery.form-validator-file.min.js"></script>
<script src="https://tricyclefranchisingsorsogon.online/ph/bootstrap/js/security.js"></script>

<script>
$(function(){
	$.validate({
  modules : 'security',
  onModulesLoaded : function() {
  var optionalConfig = {
    fontSize: '12pt',
    padding: '4px',
    bad : 'Not Secure',
    weak : 'Weak',
    good : 'Good',
    strong : 'Strong'
  };

  $('input[name="pass"]').displayPasswordStrength(optionalConfig);
  }
});
});
</script>
