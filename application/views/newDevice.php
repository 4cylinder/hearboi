<html>
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

<div id="config" class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">HearBoi</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="<?=base_url();?>">Home</a></li>
                <li class="active"><a href="#">Device Configuration</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Account<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Billing</a></li>
                        <li><a href="#">User Settings</a></li>
                        <li><a href="#">Logout</a></li> 
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row text-center"><h2>Network</h2></div>

    <div class="row">
        <div class="col-md-3"><label for="phoneNumber">Phone Number (SMS):</label></div>
        <div class="col-md-3"><input type="text" id="phoneNumber" class="form-control"/></div>

        <div class="col-md-3"><label for="macAddress">HearBoi MAC Address:</label></div>
        <div class="col-md-3"><input type="text" id="macAddress" class="form-control"/></div>
    </div>

    <div class="row text-center"><h2>Audio</h2></div>

    <div class="row">
        <div class="col-md-3"><label for="profile">Audio Profile:</label></div>
        <div class="col-md-3">
            <select class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>

        <div class="col-md-3"><label for="audioFile">Audio File:</label></div>
        <div class="col-md-3"><input type="file" id="audioFile" class="form-control"/></div>
    </div>

</div>

</body>

</html>