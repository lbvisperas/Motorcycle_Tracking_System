<div class="col-sm-10"> <!--Begin for Main Panels-->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary shadow">
				<div class="panel-heading text-center"><b class="">Requirements For Franchise Transfer</b></div>
				<br>
				<div class="panel-body">
					<div class="container-fluid">
						<h4 style="margin-top:0px">Franchise Of: <strong><i><?php echo $_POST["oldname"]," ",ucfirst($_POST["oldmname"][0]),". ",$_POST["oldlname"]?></i></strong></h4>
						<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#content" data-toggle="tooltip" title="Show more details about this franchise">Show Info <small><span class="caret"></span></small></button>
						<div id="content" class="collapse"><br>
							<div class="row">
								<div class="col-sm-3">
									<p><b>Applied As:</b> <?php echo $_POST["oldcstatus"]?></p>
									<p><b>Operator Name:</b> <?php echo $_POST["oldname"]," ",ucfirst($_POST["oldmname"][0]),". ",$_POST["oldlname"]?></p>
									<p><b>Birthday:</b> <?php echo $_POST["oldbday"]?></p>
									<p><b>Age:</b> <?php echo $_POST["oldage"]?></p>
									<p><b>Address:</b> <?php echo $_POST["oldaddress"]?></p>
									<p><b>Contact Number:</b> <?php echo $_POST["oldci"]?></p>
									<p><b>Gender:</b> <?php echo $_POST["oldgender"]?></p>
								</div>
								
								<div class="col-sm-3">
									<p><b>Franchise No:</b> <?php echo $_POST["fid"]?></p>
									<p><b>Application No:</b> <?php echo $_POST["aid"]?></p>
									<p><b>Association:</b> <?php echo $_POST["oldassoc"]?></p>
									<p><b>Unit Model:</b> <?php echo $_POST["oldun"]?></p>
									<p><b>Licence Num:</b> <?php echo $_POST["oldln"]?></p>
									<p><b>Plate Number:</b> <?php echo $_POST["oldplt"]?></p>
									<p><b>Registration Number:</b> <?php echo $_POST["oldrn"]?></p>
								</div>
								<div class="col-sm-6">
									<p style="color: green"><b>Franchise Begin Date:</b> <?php echo $_POST["da"]?></p>
									<p style="color: red"><b>Franchise Expire Date:</b> <?php echo $_POST["ed"]?></p>
								</div>
							</div>
						</div>
						
						<hr>
						<h4 style="margin-top:0px">Will Be Transfered To: <strong><i><?php echo $_POST["name"]," ",ucfirst($_POST["mname"][0]),". ",$_POST["lname"]?></i></strong></h4>
						<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#content1" data-toggle="tooltip" title="Show more details about this franchise">Show Info <span class="caret"></span></button>
						<div id="content1" class="collapse"><br>
							<div class="row">
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
										echo "<p><b>Name:</b> $_POST[name] "; echo ucfirst($_POST ["mname"][0]); echo ". $_POST[lname]</p>";
										echo "<p><b>Birthday:</b> $GLOBALS[bday]</p>";
										echo "<p><b>Age:</b> $GLOBALS[age]</p>";
										echo "<p><b>Address:</b> $_POST[address]</p>";
										echo "<p><b>Contact Number:</b> $_POST[ci]</p>";
										echo "<p><b>Gender:</b> $_POST[gender]</p>";
										echo "<p><b>Association:</b> $_POST[assoc]</p>";
										echo "<br>";
									echo "</div>";
									echo "<div class='col-sm-4'>";
										echo "<h4><b>Driver's Info: </b></h4>";
										echo "<br>";
										echo "<p><b>Name:</b> $_POST[dname] "; echo ucfirst($_POST ["dmname"][0]); echo ". $_POST[dlname]</p>";
										echo "<p><b>Address:</b> $_POST[daddress]</p>";
										echo "<p><b>Contact Number:</b> $_POST[dcn]</p>";
										echo "<p><b>Licence Number:</b> $_POST[ln1] - $_POST[ln2] - $_POST[ln3]</p>";
									echo "</div>";
									}
									else if ($_POST["cstatus"] === "Driver/Operator")
									{
										echo "<div class='col-sm-5'>";
										echo "<h4><b>Driver/Operator's Info: </b></h4>";
										echo "<br>";
										echo "<p><b>Name:</b> $_POST[name] "; echo ucfirst($_POST ["mname"][0]); echo ". $_POST[lname]</p>";
										echo "<p><b>Birthday:</b> $GLOBALS[bday]</p>";
										echo "<p><b>Age:</b> $GLOBALS[age]</p>";
										echo "<p><b>Address:</b> $_POST[address]</p>";
										echo "<p><b>Contact Number:</b> $_POST[ci]</p>";
										echo "<p><b>Gender:</b> $_POST[gender]</p>";
										echo "<p><b>Association:</b> $_POST[assoc]</p>";
										echo "<p><b>Licence Number:</b> $_POST[ln1] - $_POST[ln2] - $_POST[ln3]</p>";
										echo "<br>";
									echo "</div>";
									}
								?>
									<div class="col-sm-4">
										<h4><b>Unit's Info: </b></h4><br>
										<p><b>Classification:</b> <?php echo $_POST["classification"]?></p>
										<p><b>Unit Model:</b> <?php echo $_POST["un"]?></p>
										<p><b>Plate Number:</b> <?php echo $_POST["plt"]?></p>
										<p><b>Registration Number:</b> <?php echo $_POST["rn"]?></p>
										<p><b>Unit Color:</b> <?php echo $_POST["uc"]?></p>
										<p><b>Motor Number:</b> <?php echo $_POST["mn"]?></p>
										<p><b>Year Model:</b> <?php echo $_POST["en"]?></p>
										<p><b>Chassis Number:</b> <?php echo $_POST["cn"]?></p>
									</div>
							</div>
						</div>
						<hr>
						<h4>Requirements:</h4>
					<div class="row">
					<div class="col-sm-6">
					<form method="post" action="https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/transferfranchise/<?php echo $_POST["fid"]?>">
						<input type="hidden" name="name" value="<?php echo $_POST["name"]?>">
						<input type="hidden" name="mname" value="<?php echo $_POST["mname"]?>">
						<input type="hidden" name="lname" value="<?php echo $_POST["lname"]?>">
						<input type="hidden" name="bday" value="<?php echo $GLOBALS['bday']?>">
						<input type="hidden" name="age" value="<?php echo $GLOBALS['age']?>">
						<input type="hidden" name="address" value="<?php echo $_POST["address"]?>">
						<input type="hidden" name="ci" value="<?php echo $_POST["ci"]?>">
						<input type="hidden" name="cstatus" value="<?php echo $_POST["cstatus"]?>">
						<input type="hidden" name="gender" value="<?php echo $_POST["gender"]?>">
						<input type="hidden" name="assoc" value="<?php echo $_POST["assoc"]?>">
						<input type="hidden" name="ln" value="<?php echo "$_POST[ln1]-$_POST[ln2]-$_POST[ln3]";?>">
						<input type="hidden" name="un" value="<?php echo $_POST["un"]?>">
						<input type="hidden" name="plt" value="<?php echo $_POST["plt"]?>">
						<input type="hidden" name="rn" value="<?php echo $_POST["rn"]?>">
						
						<input type="hidden" name="oldname" value="<?php echo $_POST["oldname"]?>">
						<input type="hidden" name="oldmname" value="<?php echo $_POST["oldmname"]?>">
						<input type="hidden" name="oldlname" value="<?php echo $_POST["oldlname"]?>">
						<input type="hidden" name="oldbday" value="<?php echo $_POST["oldbday"]?>">
						<input type="hidden" name="oldage" value="<?php echo $_POST["oldage"]?>">
						<input type="hidden" name="oldaddress" value="<?php echo $_POST["oldaddress"]?>">
						<input type="hidden" name="oldci" value="<?php echo $_POST["oldci"]?>">
						<input type="hidden" name="oldgender" value="<?php echo $_POST["oldgender"]?>">
						<input type="hidden" name="oldassoc" value="<?php echo $_POST["oldassoc"]?>">
						<input type="hidden" name="oldln" value="<?php echo $_POST["oldln"]?>">
						<input type="hidden" name="oldun" value="<?php echo $_POST["oldun"]?>">
						<input type="hidden" name="oldplt" value="<?php echo $_POST["oldplt"]?>">
						<input type="hidden" name="oldrn" value="<?php echo $_POST["oldrn"]?>">
						<input type="checkbox" id="ckbCheckAll" /> Check All
						<hr>
						<div class="checkbox">
						<label><input class="checkBoxClass" type="checkbox" value="" required>Photocopy of the community tax certificate of the new and old franchise holder</label>
						</div>
						<br>
						<div class="checkbox">
						<label><input class="checkBoxClass" type="checkbox" value="" required>Photocopy of the Brgy. Certification</label>
						</div>
						<br>
						<div class="checkbox">
						<label><input class="checkBoxClass" type="checkbox" value="" required>Photocopy of the official receipt for certificate of registration</label>
						</div>
						<br>
						<div class="checkbox">
						<label><input class="checkBoxClass" type="checkbox" value="" required>1 Long Brown Folder</label>
						</div>
						<br>
						<div class="checkbox">
						<label><input class="checkBoxClass" type="checkbox" value="" required>MTOP Set (Original)</label>
						</div>
						<br>

						<button type="submit" class="btn btn-success pullright"><span class="glyphicon glyphicon-transfer"></span> Transfer Franchise</button>

						</div>
						
						<br>
						<hr>
						<div class="col-sm-6">
						<div class="checkbox">
						<label><input type="checkbox" class="checkBoxClass" value="" required>Proof of membership in any transport association recognized by the
						city, if the operator or driver is a member whose organization shall issue a certificate or clearance in case the 
						member opts to transfer to any tricycle organization or different zone or route
						</label>
						</div>
						<br>
						<div class="checkbox">
						<label><input type="checkbox" class="checkBoxClass" value="" required>Road worthiness clearance which will be conducted by well trained
						and compitent personel of the permit and licensing section in close coordination with the staff assigned
						for the purpose at the office of the sanguniang panglungsod</label>
						</div>
						<br>
						<div class="checkbox">
						<label><input type="checkbox" class="checkBoxClass" value="" required>Deed of Sale/Deed of Donation</label>
						</div>

						<div class="checkbox">
						<label><input type="checkbox" class="checkBoxClass" value="" required>TGM Clearance</label>

						</div>
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
