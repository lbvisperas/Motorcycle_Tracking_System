<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow">
				<div class="panel-heading text-center"><b class="">Print Information</b></div>
				<div class="panel-body">
					<div class="col-sm-12">
						<h4 style="margin-top:5px">Print Information for: <strong><i><?php echo $franchise['first_name']," ",ucfirst($franchise['middle_name'][0]),". ",$franchise['last_name'];?></i></strong></h4>
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
						<div class="col-sm-4">
									<a href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_printmtop' type = 'button' role = 'button' class='btn btn-danger'><span class='glyphicon glyphicon-search'></span>Go back to Print Other</a>
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
				<div class="panel-heading text-center"><b class="">Print and Preview Documents</b></div>
				<div class="panel-body">
					<div class="container-fluid">
						
						
						<ul class="nav nav-tabs">
						  <li class="active"><a data-toggle="tab" href="#home">MTOP</a></li>
						  <?php
							  echo "<li><a data-toggle='tab' href='#menu1'>APPLICATION</a></li>";
							  echo "<li><a data-toggle='tab' href='#menu2'>LEGALIZATION</a></li>";
							  echo "<li><a data-toggle='tab' href='#menu3'>CERTIFICATION</a></li>";
						  ?>
						</ul>
						
						<div class="tab-content">
						  <div id="home" class="tab-pane fade in active">
								<br>
								
								<div class="col-sm-12">
								
								<div class="col-sm-1">
										<h4>Options: </h4>
								</div>
									<div class="col-sm-2">
										<form action="https://www.tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/mtopcopy">
											<button style="width: 100%" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-print"></span>Print via Download</button>
										</form>
									</div>
									<div class="col-sm-2">
									<a href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_printmtop' type = 'button' role = 'button' class='btn btn-primary'><span class='glyphicon glyphicon-list-alt'></span>Print Other Documents</a>
									</div>
									<div class="col-sm-7"></div>
								</div>
								<div class="col-sm-1"></div>
								<div class="col-sm-10">
								<h4> Note: These are preview of the documents to be printed.</h4>
								<h5> <i> Please download the documents for the respective target information to be printed via Excel. </i> </h4>
								<hr>
								 <object width="100%" height="1000px" data="https://www.tricyclefranchisingsorsogon.online/ph/documents/temp/mtop1.htm"></object> 
								</div>
								<div class="col-sm-1"></div>
						  </div>

							<div id="menu1" class="tab-pane fade">
								<br>
								<div class="col-sm-12">
									<div class="col-sm-1">
											<h4>Options: </h4>
									</div>
									<div class="col-sm-2">
										<form action="https://www.tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/appcopy">
											<button style="width: 100%" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-print"></span>Print via Download</button>
										</form>
									</div>
									<div class="col-sm-2">
									<a href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_printmtop' type = 'button' role = 'button' class='btn btn-primary'><span class='glyphicon glyphicon-list-alt'></span>Print Other Documents</a>
									</div>
									<div class="col-sm-7"></div>
								</div>
								<div class="col-sm-1"></div>
								<div class="col-sm-10">
								<h4> Note: These are preview of the documents to be printed.</h4>
								<h5> <i> Please download the documents for the respective target information to be printed via Excel. </i> </h4>
								<hr>
								 <object width="100%" height="1000px" data="https://www.tricyclefranchisingsorsogon.online/ph/documents/temp/application.htm"></object> 
								</div>
								<div class="col-sm-1"></div>
							</div>

							<div id="menu2" class="tab-pane fade">
								<br>
								<div class="col-sm-12">
									<div class="col-sm-1">
											<h4>Options: </h4>
									</div>
									<div class="col-sm-2">
										<form action="https://www.tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/legalcopy">
											<button style="width: 100%" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-print"></span>Print via Download</button>
										</form>
									</div>
									<div class="col-sm-2">
									<a href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_printmtop' type = 'button' role = 'button' class='btn btn-primary'><span class='glyphicon glyphicon-list-alt'></span>Print Other Documents</a>
									</div>
									<div class="col-sm-7"></div>
								</div>
								<div class="col-sm-1"></div>
								<div class="col-sm-10">
								<h4> Note: These are preview of the documents to be printed.</h4>
								<h5> <i> Please download the documents for the respective target information to be printed via Excel. </i> </h4>
								<hr>
								 <object width="100%" height="1000px" data="https://www.tricyclefranchisingsorsogon.online/ph/documents/temp/legalization.htm"></object> 
								</div>
								<div class="col-sm-1"></div>
							</div>

							<div id="menu3" class="tab-pane fade">
								<br>
								<div class="col-sm-12">
									<div class="col-sm-1">
											<h4>Options: </h4>
									</div>
									
									<div class="col-sm-2">
										<form action="https://www.tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/certcopy">
											<button style="width: 100%" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-print"></span>Print via Download</button>
										</form>
									</div>
									<div class="col-sm-2">
									<a href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_printmtop' type = 'button' role = 'button' class='btn btn-primary'><span class='glyphicon glyphicon-list-alt'></span>Print Other Documents</a>
									</div>
									<div class="col-sm-7"></div>
								</div>
								<div class="col-sm-1"></div>
								<div class="col-sm-10">
								<h4> Note: These are preview of the documents to be printed.</h4>
								<h5> <i> Please download the documents for the respective target information to be printed via Excel. </i> </h4>
								<hr>
								 <object width="100%" height="1000px" data="https://www.tricyclefranchisingsorsogon.online/ph/documents/temp/certification.htm"></object> 
								</div>
								<div class="col-sm-1"></div>
									
							</div>
						</div>
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>
</div> <!--End for Main Panels-->

					<?php
						include ("./include/insertdataMTOP.php");
						include ("./include/insertdataAPP.php");
						include ("./include/insertdataLEGAL.php");
						include ("./include/insertdataCERT.php");
					?>
