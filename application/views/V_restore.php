
<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow">
				<div class="panel-heading text-center"><b class="">Restore Database</b></div>
				<div class="panel-body" style="margin:0%">
					<div class="container-fluid">
					
					<?php
						if ($num == 1)
						{
							echo "<div class='alert alert-success col-sm-12'>";
							echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
							echo "<p><b>Database Succesfully Restored!</b></p><br>";
							echo "</div>";
						}
					?>
					
					<p><b>Select SQL File: (Max: 2,048KiB)</b></p>
					<form class="form-horizontal" role="form" action="https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/restore_db" method="post" enctype="multipart/form-data">
						
					<div class="form-group">
						
						<div class="col-sm-12">
							
							<input type="file" name="sqlpath" data-validation="required mime size" data-validation-allowing="sql" data-validation-max-size="2M"> 
						</div>
					</div>
						
					<div class="form-group">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-primary" name="upload" value="Upload SQL"><span class="glyphicon glyphicon-upload"></span> Restore Database
						</div>
					</div>
					
					
				</form>
					
					
					
				</div>
				
				</div>
				<br>
			</div>
		</div>
	</div>
</div> <!--End for Main Panels-->
<script src="http://localhost:8080/project/bootstrap/js/jquery.form-validator.min.js"></script>
<script src="http://localhost:8080/project/bootstrap/js/jquery.form-validator-file.min.js"></script>
<script>
$(function(){
	$.validate();
});
</script>
