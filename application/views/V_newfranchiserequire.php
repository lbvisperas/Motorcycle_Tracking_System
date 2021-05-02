
<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow">
				<div class="panel-heading text-center"><b class="">Requirements For New Franchise</b></div>
				<br>
				<div class="panel-body">
					<div class="container-fluid">

						<h4 style="margin-top:0px">New Franchise Will Be Created For: <strong><i><?php echo $_POST["name"]," ",ucfirst($_POST["mname"][0]),". ",$_POST["lname"]?></i></strong></h4>
						<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#content" data-toggle="tooltip" title="Show more details about this franchise">Show Info <small><span class="caret"></span></small></button>
						
						<div id="content" class="collapse"><br>
							<div class="row">
								<div class="col-sm-11">
								
								<?php 
									$today = getdate();
									$calendar[0] = $today['mon'];
									$calendar[1] = $today['mday'];
									$calendar[2] = $today['year'];

									if ($_POST["bdaymonth"] === "January"){$_POST["bdaymonth"]= "01";}
									else if ($_POST["bdaymonth"] === "February"){$_POST["bdaymonth"]= "02";}
									else if ($_POST["bdaymonth"] === "March"){$_POST["bdaymonth"]= "03";}
									else if ($_POST["bdaymonth"] === "April"){$_POST["bdaymonth"]= "04";}
									else if ($_POST["bdaymonth"] === "May"){$_POST["bdaymonth"]= "05";}
									else if ($_POST["bdaymonth"] === "June"){$_POST["bdaymonth"]= "06";}
									else if ($_POST["bdaymonth"] === "July"){$_POST["bdaymonth"]= "07";}
									else if ($_POST["bdaymonth"] === "August"){$_POST["bdaymonth"]= "08";}
									else if ($_POST["bdaymonth"] === "September"){$_POST["bdaymonth"]= "09";}
									else if ($_POST["bdaymonth"] === "October"){$_POST["bdaymonth"]= "10";}
									else if ($_POST["bdaymonth"] === "November"){$_POST["bdaymonth"]= "11";}
									else if ($_POST["bdaymonth"] === "December"){$_POST["bdaymonth"]= "12";}
									
									$birthday[0] = $_POST["bdaymonth"];
									
									if (strlen($_POST["bdayday"]) == 1)
									{
										$array[0] = $_POST["bdayday"];
										$array[1] = "0";
										$_POST["bdayday"] = implode("",$array);
										$_POST["bdayday"] = strrev($_POST["bdayday"]);
									}
									
									$birth[0] = $_POST["bdaymonth"];
									$birth[1] = $_POST["bdayday"];
									$birth[2] = $_POST["bdayyear"];
									$bday = implode("/",$birth);
									
									$GLOBALS['bday']  = $bday;
									
									$year = $_POST["bdayyear"];
									$day = $_POST["bdayday"];
									$month = $_POST["bdaymonth"];

									$age = $calendar[2] - $year;
									
									if ($calendar[0] < $month)
									{
										$age--;
									}
									else if ($calendar[0] == $month)
									{
										if ($calendar[1] < $day)
										{
											$age--;
										}
									}
									$GLOBALS['age']  = $age;
								?>
									
									
								<?php
									
									if ($_POST["cstatus"] === "Operator")
									{
									echo "<div class='col-sm-4'>";
										echo "<h4><b>Operator's Info: </b></h4>";
										echo "<br>";
										echo "<p style=';'><b>Name:</b> $_POST[name] "; echo ucfirst($_POST ["mname"][0]); echo ". $_POST[lname]</p>";
										echo "<p style=';'><b>Birthday:</b> $GLOBALS[bday]</p>";
										echo "<p style=';'><b>Age:</b> $GLOBALS[age]</p>";
										echo "<p style=';'><b>Address:</b> $_POST[address]</p>";
										echo "<p style=';'><b>Contact Number:</b> $_POST[ci]</p>";
										echo "<p style=';'><b>Gender:</b> $_POST[gender]</p>";
										echo "<p style=';'><b>Association:</b> $_POST[assoc]</p>";
										echo "<br>";
									echo "</div>";
									echo "<div class='col-sm-4'>";
										echo "<h4><b>Driver's Info: </b></h4>";
										echo "<br>";
										echo "<p style=';'><b>Name:</b> $_POST[dname] "; echo ucfirst($_POST ["dmname"][0]); echo ". $_POST[dlname]</p>";
										echo "<p style=';'><b>Address:</b> $_POST[daddress]</p>";
										echo "<p style=';'><b>Contact Number:</b> $_POST[dcn]</p>";
										echo "<p style=';'><b>Licence Number:</b> $_POST[ln1] - $_POST[ln2] - $_POST[ln3]</p>";
									echo "</div>";
									
									}
									else if ($_POST["cstatus"] === "Driver/Operator")
									{
										echo "<div class='col-sm-5'>";
										echo "<h4><b>Driver/Operator's Info: </b></h4>";
										echo "<br>";
										echo "<p style=';'><b>Name:</b> $_POST[name] "; echo ucfirst($_POST ["mname"][0]); echo ". $_POST[lname]</p>";
										echo "<p style=';'><b>Birthday:</b> $GLOBALS[bday]</p>";
										echo "<p style=';'><b>Age:</b> $GLOBALS[age]</p>";
										echo "<p style=';'><b>Address:</b> $_POST[address]</p>";
										echo "<p style=';'><b>Contact Number:</b> $_POST[ci]</p>";
										echo "<p style=';'><b>Gender:</b> $_POST[gender]</p>";
										echo "<p style=';'><b>Association:</b> $_POST[assoc]</p>";
										echo "<p style=';'><b>Licence Number:</b> $_POST[ln1] - $_POST[ln2] - $_POST[ln3]</p>";
										echo "<br>";
									echo "</div>";
									}
								?>
								
									<div class="col-sm-4">
										<h4><b>Unit's Info: </b></h4><br>
										<p style=";"><b>Classification:</b> <?php echo $_POST["classification"]?></p>
										<p style=";"><b>Unit Model:</b> <?php echo $_POST["un"]?></p>
										<p style=";"><b>Plate Number:</b> <?php echo $_POST["plt"]?></p>
										<p style=";"><b>Registration Number:</b> <?php echo $_POST["rn"]?></p>
										<p style=";"><b>Unit Color:</b> <?php echo $_POST["uc"]?></p>
										<p style=";"><b>Motor Number:</b> <?php echo $_POST["mn"]?></p>
										<p><b>YEAR MODEL:</b> <?php echo $_POST["en"]?></p>
										<p style=";"><b>Chassis Number:</b> <?php echo $_POST["cn"]?></p>
									</div>
								</div>
							</div>
						</div>
						<hr>
							<h4>Requirements:</h4>
					
						<div class="row">
							<div class="col-sm-6">
							<form class="form-horizontal" role="form" action="https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_createfranchise" method="post"> <!--form begin-->		
								<input type="hidden" value="<?php echo $_POST["name"];?>" name="name">
								<input type="hidden" value="<?php echo $_POST["mname"];?>" name="mname">
								<input type="hidden" value="<?php echo $_POST["lname"];?>" name="lname">
								<input type="hidden" value="<?php echo $_POST["cstatus"]?>" name="cstatus">
								<input type="hidden" value="<?php echo $GLOBALS['bday'];?>" name="bday">
								<input type="hidden" value="<?php echo $GLOBALS['age'];?>" name="age">
								<input type="hidden" value="<?php echo $_POST["address"];?>" name="address">
								<input type="hidden" value="<?php echo $_POST["ci"];?>" name="ci">
								<input type="hidden" value="<?php echo $_POST["gender"];?>" name="gender">
								<input type="hidden" value="<?php echo $_POST["assoc"];?>" name="assoc">
								
								<input style=";" type="hidden" value="<?php echo $_POST["casen1"],"-",$_POST["casen2"],"-",$_POST["casen3"];?>" name="casen">
								<input style=";" type="hidden" value="<?php echo $_POST["ln1"],"-",$_POST["ln2"],"-",$_POST["ln3"];?>" name="ln">
								<input type="hidden" value="<?php if ($_POST["cstatus"] === "Operator") {echo $_POST["dname"];} else {echo "NULL";}?>" name="dname">
								<input type="hidden" value="<?php if ($_POST["cstatus"] === "Operator") {echo $_POST["dmname"];} else {echo "NULL";}?>" name="dmname">
								<input type="hidden" value="<?php if ($_POST["cstatus"] === "Operator") {echo $_POST["dlname"];} else {echo "NULL";}?>" name="dlname">
								<input type="hidden" value="<?php if ($_POST["cstatus"] === "Operator") {echo $_POST["daddress"];} else {echo "NULL";}?>" name="daddress">
								<input type="hidden" value="<?php if ($_POST["cstatus"] === "Operator") {echo $_POST["dcn"];} else {echo "NULL";}?>" name="dcn">
								
								<input style=";" type="hidden" value="<?php echo $_POST["un"];?>" name="un">
								<input style=";" type="hidden" value="<?php echo $_POST["plt"];?>" name="plt">
								<input style=";" type="hidden" value="<?php echo $_POST["rn"];?>" name="rn">
								
								<input style=";" type="hidden" value="<?php echo $_POST["classification"];?>" name="classification">
								<input style=";" type="hidden" value="<?php echo $_POST["uc"];?>" name="uc">
								<input style=";" type="hidden" value="<?php echo $_POST["mn"];?>" name="mn">
								<input style=";" type="hidden" value="<?php echo $_POST["cn"];?>" name="cn">
								<input style=";" type="hidden" value="<?php echo $_POST["en"];?>" name="en">
								<?php include './include/picupload.php' ?>
								
								<label><input type="checkbox" id="ckbCheckAll"> Check All</label>
								<br>
								<div class="checkbox" id="r1">
									<label><input  type="checkbox" class="checkBoxClass" value="True" name="r1">Photocopy of the community tax certificate of the applicant</label>
								</div>
								<br>
								<div class="checkbox" id="r2">
									<label><input class="checkBoxClass" type="checkbox" value="True" name="r2">Photocopy of the motorcycle certificate of registration</label>
								</div>
								<br>
								<div class="checkbox" id="r3">
									<label><input class="checkBoxClass" type="checkbox" value="True" name="r3">Photocopy of the official receipt for certificate of registration</label>
								</div>
								<br>
								<div class="checkbox" id="r4">
									<label><input class="checkBoxClass" type="checkbox" value="True" name="r4">Photocopy of the insurance coverage</label>
								</div>
								<br>
								<div class="checkbox" id="r5">
									<label><input class="checkBoxClass" type="checkbox" value="True" name="r5">Police clearance</label>
								</div>
								<br>
								<button type="submit" class="btn btn-success pullright"><span class="glyphicon glyphicon-floppy-disk"></span> Save Franchise</button>
							  
							</div>
							<br><br>
							<div class="col-sm-6">
								<div class="checkbox" id="r6">
									<label><input class="checkBoxClass" type="checkbox" value="True" name="r6">Proof of membership in any transport association</label>
								</div>
								 <br>
								<div class="checkbox" id="r7">
									<label><input class="checkBoxClass" type="checkbox" value="True" name="r7">Road worthiness clearance</label>
								</div>
								  <br>
								<div class="checkbox" id="r8">
									<label><input class="checkBoxClass" type="checkbox" value="True" name="r8">Voter's Identification/Certificate of Comelec</label>
								</div>
								<br>
								<div class="checkbox" id="r9">
									<label><input class="checkBoxClass" type="checkbox" value="True" name="r9">Proof of Residence/Brgy. Clearance issued by the brgy. captain</label>
								</div>
							</form>
							</div>
						</div>
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>
</div> <!--End for Main Panels-->
