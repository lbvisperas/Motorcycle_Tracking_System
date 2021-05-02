<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow text-center">
				<div class="panel-heading"><b class="">Edit Violation Info</b></div>
				<div class="panel-body">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<form class="form-horizontal" role="form" action="hhttps://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_updateviolation" method="post" autocomplete="off"> <!--form begin-->
							<div class="form-group">
								<label class="control-label col-sm-3" for="id"></label>
								<div class="col-sm-9">
									<input type="hidden" class="form-control" id="id" value="<?php echo $violation['violation_id']?>" name="id">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="vname">Violation Name:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="vname" value="<?php echo $violation['violation_name']?>" name="vname" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="vdetail">Violation Details:</label>
								<div class="col-sm-9">
									<input type="textarea" class="form-control" id="vdetail" value="<?php echo $violation['violation_detail']?>" name="vdetail" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
								</div>
							</div>
							<hr>
							<div class="col-sm-12">
								<button type="submit" class="btn btn-success" style="width:40%"><span class="glyphicon glyphicon-floppy-disk"></span> Save Changes</button>
							</div>
							<div class="col-sm-12">
							<br>
							<a type='button' style='width:40%' class='btn btn-warning' href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_searchviolation'><span class='glyphicon glyphicon-arrow-left'></span> Cancel</a>
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
<script>
$(function(){
	$.validate();
});
</script>