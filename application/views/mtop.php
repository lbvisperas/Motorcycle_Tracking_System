<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow">
				<div class="panel-heading text-center"><b class="">Issuance</b></div>
				<div class="panel-body">
					<div class="col-sm-12">
						<h4 style="margin-top:5px">Issue MTOP (SET) For: <strong><i><?php echo $franchise['first_name']," ",ucfirst($franchise['middle_name'][0]),". ",$franchise['last_name'];?></i></strong></h4>
							
								<button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#content1" data-toggle="tooltip" title="Show more details about this franchise">Show Info <span class="caret"</span></button>
							
							<div><br>
								<div class="row">
									<div class="col-sm-3">
										<h4><b>Franchise Info: </b></h4><br>
										<p><b>Application Type:</b> <?php echo $franchise['application_type']?></p>
										<p><b>Case Number:</b> <?php echo $franchise['case_no']?></p>
										<?php
									        $var = $franchise['franchise_id'];
											$var = str_pad($var,4,'0',STR_PAD_LEFT);
											echo "<p><b>Franchise Plate No: </b> $var</p>";
										?>
										
										
									</div>
									
									
									<?php
									if ($franchise['application_type'] === "Driver/Operator")
									{
										echo "<div class='col-sm-3'>";
											echo "<h4><b>Driver/Operator's Info: </b></h4><br>";
											echo "<p><b>Name:</b> $franchise[first_name] "; echo ucfirst($franchise['middle_name'][0]); echo ". $franchise[last_name]</p>";
											echo "<p><b>Association:</b> $franchise[association_name]</p>";
											echo "<p><b>Licence Number:</b> $franchise[licence_num]</p>";
											echo "<p><b>Address:</b> $franchise[address]</p>";
										echo "</div>";
									}
									else
									{
										echo "<div class='col-sm-3'>";
											echo "<h4><b>Operator's Info: </b></h4><br>";
											echo "<p><b>Name:</b> $franchise[first_name] "; echo ucfirst($franchise['middle_name'][0]); echo ". $franchise[last_name]</p>";
											echo "<p><b>Association:</b> $franchise[association_name]</p>";
											echo "<p><b>Address:</b> $franchise[address]</p>";
											
										echo "</div>";
										echo "<div class='col-sm-3'>";
											echo "<h4><b>Driver's Info: </b></h4><br>";
											echo "<p><b>Name:</b> $franchise[d_first_name] "; echo ucfirst($franchise['d_middle_name'][0]); echo ". $franchise[d_last_name]</p>";
											echo "<p><b>Licence Number:</b> $franchise[d_licence_num]</p>";
											echo "<p><b>Address:</b> $franchise[d_address]</p>";
										echo "</div>";
									}
									?>
									
									<div class="col-sm-3">
										<h4><b>Units's Info: </b></h4><br>
										<p><b>Unit Model:</b> <?php echo $franchise['unit_model']?></p>
										<p><b>Plate Number:</b> <?php echo $franchise['plate_num']?></p>
										<p><b>Chassis Number:</b> <?php echo $franchise['chassis_no']?></p>
										<p><b>Motor Number:</b> <?php echo $franchise['motor_no']?></p>
									</div>

								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow">
				<div class="panel-heading text-center"><b class="">Options</b></div>
				<div class="panel-body">
						<div class="col-sm-4">
						
						</div>
					
						<div class="col-sm-4">
							<form action="https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/setasissued" method="post">
								<input type="hidden" value="<?php echo $franchise['franchise_id'] ?>" name="id">
								<input type="hidden" value="<?php echo $franchise['association_name'] ?>" name="assoc_name">
								<input type="hidden" value="<?php echo $franchise['first_name'] ?>" name="franchiser_name">
								<button style="width: 100%" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Set This Franchise As Issued</button>
							</form>
						</div>
							<div class="col-sm-4">
							
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
 <!--End for Main Panels-->

					<?php
						include ("./include/insertdataMTOP.php");
						include ("./include/insertdataAPP.php");
						include ("./include/insertdataLEGAL.php");
						include ("./include/insertdataCERT.php");
					?>


