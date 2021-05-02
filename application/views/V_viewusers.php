
	<div class="col-sm-10"> <!--Begin for Main Panels-->
		<div class="row">
		
			<div class="col-sm-12">
				<div class="panel panel-primary text-center shadow">
					<div class="panel-heading"><b class="">Manage Users</b></div>
					<div class="panel-body">
						<div class="table-responsive">          
							<table class="table table-stripped table-condensed table-hover" style="margin-bottom: 6px" id="advance-table">
								<thead>
									<tr>
										<td>
											<button style="color:black" type="button" class="btn btn-link btn-md"><b>User ID</b></button>
										</td>
										<td>
											<button style="color:black" type="button" class="btn btn-link btn-md"><b>Name</b></button>
										</td>
										<td>
											<button style="color:black" type="button" class="btn btn-link btn-md"><b>Email</b></button>
										</td>
										<td>
											<button style="color:black" type="button" class="btn btn-link btn-md"><b>Account Type</b></button>
										</td>
										<td>
											<button style="color:black" type="button" class="btn btn-link btn-md"><b>Username</b></button>
										</td>
										<td>
											<button style="color:black" type="button" class="btn btn-link btn-md"><b>Image</b></button>
										</td>
										<td>
											<button style="color:black" type="button" class="btn btn-link btn-md"><b>Options</b></button>
										</td>
									</tr>
								</thead>
								<tbody>
								<div class='col-sm-12 text-center'>
								<?php
									foreach ($users as $row)
									{
										echo "<tr>";
									
											echo "<td style='padding-top:25px'>$row[user_id]</td>";
											echo "<td style='padding-top:25px'>$row[first_name] $row[last_name]</td>";
											echo "<td style='padding-top:25px'>$row[email]</td>"; 
											echo "<td style='padding-top:25px'>$row[acctype]</td>"; 
											echo "<td style='padding-top:25px'>$row[username]</td>";
											echo "<td style='padding-top:12px'><img style='width:64px;height:64px' class='thumbnail img-block img-responsive' src='$row[profile_pic]' alt='cannot load'></td>";
											echo "<td>";
												echo "<a style='margin-top:25px' href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_getuserinfo/$row[user_id]' type = 'button' role = 'button' class='btn btn-success'><span class='glyphicon glyphicon-edit'></span> Edit</a>";
												echo "<a style='margin-top:25px' href='https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/C_deleteuser/$row[user_id]' type = 'button' role = 'button' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> Delete</a>";
											echo "</td>";
										echo "</tr>";
									}
								?>
									</div>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!--End for Main Panels-->
	<script>
		$(document).ready(function () {
			$('#advance-table').dataTable();
		});
	</script>
