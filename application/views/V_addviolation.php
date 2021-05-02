<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow text-center">
				<div class="panel-heading"><b class="">Add Violation</b></div>
				<div class="panel-body">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
					<br>
						<form class="form-horizontal" role="form" action="https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_insertviolation" method="post" autocomplete="off"> <!--form begin-->
							
							<div class="form-group">
								<label class="control-label col-sm-3" for="vname">Violation Name:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="vname" placeholder="Enter Violation Name" name="vname" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="vdetail">Violation Details:</label>
								<div class="col-sm-9">
									<textarea class="form-control" rows="3" id="vdetail" placeholder="Enter Violation Details..." name="vdetail" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" ></textarea>
								</div>
							</div>
							<hr>
							<div class="form-group text-left">
								<div class="col-sm-offset-5 col-sm-7">
									<button type="submit" name="submit" style="width:30%" id="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
								</div>
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