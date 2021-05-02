
<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow text-center">
				<div class="panel-heading"><b class="">Edit Account Info</b></div>
				<div class="panel-body">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<form class="form-horizontal" role="form" action="https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_updateuserinfo" enctype="multipart/form-data" method="post" autocomplete="off"> <!--form begin-->
							<div class="form-group">
								<label class="control-label col-sm-3" for="id"></label>
								<div class="col-sm-9">
									<input type="hidden" class="form-control" id="id" value="<?php echo $userinfo['user_id']?>" name="id">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="fname">First Name:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="fname" value="<?php echo $userinfo['first_name']?>" name="fname" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="lname">Last Name:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="lname" value="<?php echo $userinfo['last_name']?>" name="lname" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="mail">Email:</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="mail" value="<?php echo $userinfo['email']?>" name="mail" data-validation="email">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="username">Username:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="username" value="<?php echo $userinfo['username']?>" name="username" data-validation="required alphanumeric" data-validation-allowing="!.,@#'">
								</div>
							</div>
							<div class="form-group">
									<label class="control-label col-sm-3" for="pass">Password:</label>
									<div class="col-sm-9">
										<input type="password" class="form-control" id="pass" value="<?php echo $userinfo['password']?>" name="pass" data-validation="required strength length" data-validation-strength="1" data-validation-length="min5">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="pass">Confirm Password:</label>
									<div class="col-sm-9">
										<input type="password" class="form-control" id="passconfirm" value="<?php echo $userinfo['password']?>" name="passconfirm" data-validation="required confirmation" data-validation-confirm="pass">
									</div>
								</div>
								
								<div class="form-group text-left">
									<label class="control-label col-sm-3" for="ci">Current Profile Pic: </label>
									<div class="col-sm-9">
										<?php
											echo "<img src='$userinfo[profile_pic]' class='thumbnail img-block' height='125' width='125' alt='cannot load'>";
										?>
										<hr>
										<p>Change profile picture here...</p><input name="profile_pic" id="profile_pic" data-validation="mime size" data-validation-allowing="jpg, png" data-validation-max-size="2M" type="file">
										
									</div>
								</div>
								
								<?php 
								if ($first_name[2] == "Administrator")  
								{
									echo "<div class='form-group'>";
									  echo "<label class='control-label col-sm-3' for='acctype'>Account Type:</label>";
									  echo "<div class='col-sm-9'>";
									  echo "<select class='form-control' id='acctype' value='$userinfo[acctype]' name='acctype' data-validation='required'>";
										if ($userinfo['acctype'] == "Administrator")
										{
											echo "<option>Administrator</option>";
											echo "<option>User</option>";
										}
										else
										{
											echo "<option>User</option>";
											echo "<option>Administrator</option>";
										}
									  echo "</select>";
									  echo "</div>";
									echo "</div>";
								}
								else
								{
									 echo "<input type='hidden' class='form-control' id='acctype' value='$userinfo[acctype]' name='acctype'>";
								}
								?>
								<hr>
							<div class="col-sm-6 text-center">
								<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-floppy-disk"></span> Save Changes</button>
							</div>
							
							<div class="col-sm-6">
								
								<?php
								if ($first_name[2] == "Administrator")
								{
									echo "<a type='button' class='btn btn-warning btn-block' href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_viewusers'><span class='glyphicon glyphicon-arrow-left'></span> Cancel</a>";
								}
								else
								{
									echo "<a type='button' class='btn btn-warning btn-block' href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/home'><span class='glyphicon glyphicon-arrow-left'></span> Cancel</a>";
								}
								?>
							</div>
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