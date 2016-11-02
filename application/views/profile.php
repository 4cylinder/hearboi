<html>
<title>Profile</title>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="<?=base_url();?>css/navbar_style.css">

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
		<span class="navbar-brand">PROFILE</span>
	</div>
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav navbar-left">
			<li><a id='backLink' href="<?=base_url();?>device">BACK</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a id='saveLink' href="#">SAVE</a></li>
		</ul>
	</div>
</nav>

<form id="userForm">
	<div class="container text-center">
		<div class="col-md-3">
			<img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
			<h6>Change Profile Photo</h6>
			<label for="upload">
				<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
				<input type="file" id="newPhoto" name="newPhoto" style="display:none">
			</label>
		</div>
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-3"><label class="control-label">NAME</label></div>
				<div class="col-md-3"><input class="form-control input-sm" placeholder="FIRST NAME" type="text" name="fName" id="fName"></div>
				<div class="col-md-3"><input class="form-control input-sm" placeholder="LAST NAME" type="text" name="lName" id="lName"></div>
			</div>
			<div class="row">
				<div class="col-md-3"><label class="control-label">EMAIL</label></div>
				<div class="col-md-6"><input class="form-control input-sm" placeholder="EXAMPLE@DOMAIN.COM" type="text" name="email" id="email"></div>
			</div>
			<div class="row">
				<div class="col-md-3"><label class="control-label">PHONE</label></div>
				<div class="col-md-6"><input class="form-control input-sm" placeholder="123-456-7890" type="text" name="phone" id="phone"></div>
			</div>
		</div>		
	</div>
</form>
<script>
$(function(){
	// listener for BACK link to pop up
	$('#backLink').click(function(e){
		e.preventDefault();
		console.log("back link clicked");
	});
	// listener for SAVE link to validate form fields and send AJAX request to back end
	$('#saveLink').click(function(e){
		e.preventDefault();
		console.log("save link clicked");
	});
})
</script>
</body>
