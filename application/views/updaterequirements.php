
	<div class="col-sm-10"> <!--Begin for Main Panels-->
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-primary shadow">
					<div class="panel-heading text-center"><b class="">Update Requirements</b></div>
					<div class="panel-body">
						
						<div class="container-fluid">
							<div class="col-sm-6">
							<h4>Incomplete Requirements:</h4>
							
							<form class="form-horizontal" role="form" action="https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/updaterequire/<?php echo $franchise['requirement_id']?>" method="post"> <!--form begin-->		
								<div class="checkbox">
								<?php
									if ($franchise['community_tax'] === "True")
									{
										echo "<label style='color:green'><input type='checkbox' value='True' checked  name='r1'>Photocopy of the community tax certificate of the applicant (DONE!)</label>";
									}
									else
									{
										echo "<label><input type='checkbox' value='True' name='r1'>Photocopy of the community tax certificate of the applicant</label>";
									}
								?>
								</div>
								<br>
								<div class="checkbox">
								<?php
									if ($franchise['certificate_registration'] === "True")
									{
										echo "<label style='color:green'><input type='checkbox' value='True' checked  name='r2'>Photocopy of the motorcycle certificate of registration (DONE!)</label>";
									}
									else
									{
										echo "<label><input type='checkbox' value='True' name='r2'>Photocopy of the motorcycle certificate of registration</label>";
									}
								?>
								</div>
								<br>
								<div class="checkbox">
								<?php
									if ($franchise['OR_certificate_registration'] === "True")
									{
										echo "<label style='color:green'><input type='checkbox' value='True' checked  name='r3'>Photocopy of the official receipt for certificate of registration (DONE!)</label>";
									}
									else
									{
										echo "<label><input type='checkbox' value='True' name='r3'>Photocopy of the official receipt for certificate of registration</label>";
									}
								?>
									
								</div>
								<br>
								<div class="checkbox">
								<?php
									if ($franchise['insurance_coverage'] === "True")
									{
										echo "<label style='color:green'><input type='checkbox' value='True' checked  name='r4'>Photocopy of the insurance coverage (DONE!)</label>";
									}
									else
									{
										echo "<label><input type='checkbox' value='True' name='r4'>Photocopy of the insurance coverage</label>";
									}
								?>
									
								</div>
								<br>
								<div class="checkbox">
								<?php
									if ($franchise['police_clearance'] === "True")
									{
										echo "<label style='color:green'><input type='checkbox' value='True' checked  name='r5'>Police clearance (DONE!)</label>";
									}
									else
									{
										echo "<label><input type='checkbox' value='True' name='r5'>Police clearance</label>";
									}
								?>
								</div>
								<br>
								  
								<button type="submit" class="btn btn-success pullright"><span class="glyphicon glyphicon-check"></span> Finish</button>
							  
							</div>
							<div class="col-sm-6">
								<br><br>
								<div class="checkbox">
								<?php
									if ($franchise['proof_membership'] === "True")
									{
										echo "<label style='color:green'><input type='checkbox' value='True' checked  name='r6'>Proof of membership in any transport association (DONE!)</label>";
									}
									else
									{
										echo "<label><input type='checkbox' value='True' name='r6'>Proof of membership in any transport association</label>";
									}
								?>
								</div>
								 <br>
								<div class="checkbox">
								<?php
									if ($franchise['road_clearance'] === "True")
									{
										echo "<label style='color:green'><input type='checkbox' value='True' checked  name='r7'>Road worthiness clearance (DONE!)</label>";
									}
									else
									{
										echo "<label><input type='checkbox' value='True' name='r7'>Road worthiness clearance</label>";
									}
								?>
								</div>
								  <br>
								<div class="checkbox">
								<?php
									if ($franchise['certificate_comelec'] === "True")
									{
										echo "<label style='color:green'><input type='checkbox' value='True' checked  name='r8'>Voter's Identification/Certificate of Comelec (DONE!)</label>";
									}
									else
									{
										echo "<label><input type='checkbox' value='True' name='r8'>Voter's Identification/Certificate of Comelec</label>";
									}
								?>
								</div>
								<br>
								<div class="checkbox">
								<?php
									if ($franchise['brgy_clearance'] === "True")
									{
										echo "<label style='color:green'><input type='checkbox' value='True' checked  name='r9'>Proof of Residence/Brgy. Clearance issued by the brgy. captain (DONE!)</label>";
									}
									else
									{
										echo "<label><input type='checkbox' value='True' name='r9'>Proof of Residence/Brgy. Clearance issued by the brgy. captain</label>";
									}
								?>
								</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!--End for Main Panels-->