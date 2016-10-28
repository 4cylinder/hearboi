<html>
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

<div id="home" class="container">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
		    <div class="navbar-header">
		    	<a class="navbar-brand" href="#">HearBoi</a>
		    </div>
		    <ul class="nav navbar-nav">
		     	<li class="active"><a href="#">Home</a></li>
		     	<li><a href="<?=base_url();?>device/config">Device Configuration</a></li>
		     	<li class="dropdown">
		        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Account
		    		<span class="caret"></span></a>
		        	<ul class="dropdown-menu">
		          		<li><a href="#">Billing</a></li>
		          		<li><a href="#">User Settings</a></li>
		          		<li><a href="#">Logout</a></li> 
		        	</ul>
		    	</li>
		    </ul>
		</div>
	</nav>
	<div class="row">
		<div class="col-md-8"><img src="<?=base_url();?>images/sketch.jpg"/></div>
		<div class="col-md-4"><img src="<?=base_url();?>images/render.jpg"/></div>
	</div>

	<footer>
	<p>Created by Team Totally Badass Designers</p>
	</footer>
</div>

</body>
