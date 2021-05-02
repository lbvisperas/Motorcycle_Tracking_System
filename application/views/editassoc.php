<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow text-center">
				<div class="panel-heading"><b class="">Edit Association Info</b></div>
				<div class="panel-body">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<form class="form-horizontal" role="form" action="https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/updateassoc" method="post" autocomplete="off"> <!--form begin-->
							<div class="form-group">
								<label class="control-label col-sm-3" for="id"></label>
								<div class="col-sm-9">
									<input type="hidden" class="form-control" id="id" value="<?php echo $franchise['association_id']?>" name="id">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="aname">Association Name:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="aname" value="<?php echo $franchise['association_name']?>" name="aname" data-validation="required custom" data-validation-regexp="^([A-Za-z ]+)$" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="adetail">Barangay:</label>
								<div class="col-sm-9">
									<input type="textarea" class="form-control" id="adetail" value="<?php echo $franchise['barangay']?>" name="adetail" data-validation="required">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="route">Route:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="route" value="<?php echo $franchise['route']?>" name="route" data-validation="required">
								
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label col-sm-3" for="district">District:</label>
								<div class="col-sm-9">
								  <select class="form-control" id="district" name="district" data-validation="required">
								    <?php
									if ($franchise['district'] === "East District")
									{
										echo "<option>East District</option>";
										echo "<option>West District</option>";
										echo "<option>Bacon District</option>";
									}
									else if ($franchise['district'] === "West District")
									{
										echo "<option>West District</option>";
										echo "<option>East District</option>";
										echo "<option>Bacon District</option>";
									}
									else if ($franchise['district'] === "Bacon District")
									{
										echo "<option>Bacon District</option>";
										echo "<option>East District</option>";
										echo "<option>West District</option>";
									}
									?>
								  </select>
								</div>
							</div>
							
							<hr>
							<div class="col-sm-12">
								<button type="submit" class="btn btn-success" style="width:40%"><span class="glyphicon glyphicon-floppy-disk"></span> Save Changes</button>
							</div>
							<div class="col-sm-12">
							<br>
							<a type='button' style='width:40%' class='btn btn-warning' href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/searchassoc'><span class='glyphicon glyphicon-arrow-left'></span> Cancel</a>
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