<html>
<title>Profile</title>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>    
		<span class="navbar-brand">MY HOME</span>
	</div>
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav navbar-left">
			<li><a href="<?=base_url();?>">EDIT</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
			<li><a href="<?=base_url();?>device/user"><span class="glyphicon glyphicon-user"></span></a></li>
		</ul>
	</div>
</nav>

<form>
<div class="container">
	<div class="row text-center">
		<img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
		<h6>Change Profile Photo</h6>
		<input class="form-control" type="file" name="profilePic" id="profilePic">
	</div>
	<div class="row">
		
	</div>
</div>
</form>

</body>
