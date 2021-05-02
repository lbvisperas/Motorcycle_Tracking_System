<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow text-center">
				<div class="panel-heading"><b class="">Edit Association Info</b></div>
				<div class="panel-body">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<form class="form-horizontal" role="form" action="https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/insertassoc" method="post" autocomplete="off"> <!--form begin-->
							<br>
							<div class="form-group">
								<label class="control-label col-sm-3" for="aname">Association Name:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control"  style=";" id="aname" placeholder="Enter Association Name Ex: PTODA" name="aname" data-validation="required custom" data-validation-regexp="^([A-Za-z]+)$" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="adetail">Barangay:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="adetail" placeholder="Enter Barangay" name="adetail" data-validation="required">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="route">Route:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="route" placeholder="Enter Association Route" name="route" data-validation="required">
								
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="district">District:</label>
								<div class="col-sm-9">
								  <select class="form-control" id="district" name="district" data-validation="required">
									<option value="" disabled selected style="display: none;">(Select District)</option>
									<option>East District</option>
									<option>West District</option>
									<option>Bacon District</option>
								  </select>
								</div>
							</div>
					
								<input type="hidden" class="form-control" id="no_units" value="0" name="no_units" required>
							<hr>
							<div class="col-sm-12">
								<button type="submit" class="btn btn-success" style="width:40%"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
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