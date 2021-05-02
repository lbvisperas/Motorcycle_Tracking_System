<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tricycle Franchising</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link id="stylesheet" href="https://tricyclefranchisingsorsogon.online/ph/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://tricyclefranchisingsorsogon.online/ph/bootstrap/js/datatables/dataTables.bootstrap.css" rel="stylesheet">
  <link rel="icon" href="https://tricyclefranchisingsorsogon.online/ph/bootstrap/img/icon.jpg" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="https://tricyclefranchisingsorsogon.online/ph/mycss.css">
  <script src="https://tricyclefranchisingsorsogon.online/ph/bootstrap/js/jquery-3.1.1.min.js"></script>
  <script src="https://tricyclefranchisingsorsogon.online/ph/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://tricyclefranchisingsorsogon.online/ph/bootstrap/js/jquery.form-validator.min.js"></script>
</head>
<body>


<div class="container-fluid w3-headercolor img-responsive"> <!--Header-->
	<div class="row">
		<div class="col-sm-1">
			<img class="img-circle" alt="logo" src="https://tricyclefranchisingsorsogon.online/ph/bootstrap/img/logo.jpg" width="110px" height="110px" style="margin-top: 18px">
		</div>
		
		<div class="col-sm-11">
			<h2>Tricycle Franchising Information System</h2>
			<hr>
			<p>Public Order and Safety Office City Of Sorsogon</p>
		</div>
	</div>
	<br>
</div> <!--End Of Headers-->

<nav class="navbar navbar-inverse shadow w3-navcolor">
</nav>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<h1 class="tshadow" style="color:white">Login</h1>
			  <?php 
					if ($errormsg == true)
					{
						echo "<p style='color:yellow'>Wrong Username/Password!</p>"; 
					}
			  ?>
			<hr>

			<form role="form" method="post" action="https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/login" autocomplete="off">
				<div class="form-group">
					<label style="color:white" for="username" class="tshadow"><span class="glyphicon glyphicon-user"></span> Username:</label>
					<input type="text" class="form-control" autofocus placeholder="Enter Username" id="username" name="username" data-validation="required alphanumeric" data-validation-allowing="!.,@#'">
				</div>
				<div class="form-group">
					<label style="color:white" for="pwd" class="tshadow"><span class="glyphicon glyphicon-lock"></span> Password:</label>
					<input type="password" class="form-control" placeholder="Enter Password" id="pwd" name="password" data-validation="required">
				</div>
				<div class="checkbox">
					<label style="color:white"><input type="checkbox"> Remember me</label>
					<label style="color:white" class="pull-right"><a href="#">Lost your password?</a></label>
				</div>
				<br>
				<button type="submit" class="btn btn-success" style="width:100%"><span class="glyphicon glyphicon-log-in"></span> Login</button>
			</form>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>

<br><br><br><br>



<footer class="container-fluid text-center fshadow w3-footercolor" >
	<br>
	<p>University Of The Philippines - Open University <em>&copy; 2018-2019</em></p>
</footer>
<script>
$(function(){
	$.validate();
});
</script>
</body>
</html>
