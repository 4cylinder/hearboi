<html>
<title><?php echo $title;?></title>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url();?>css/navbar_style.css">
    <link rel="stylesheet" href="<?=base_url();?>css/bootstrap-switch.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="<?=base_url();?>js/bootstrap-switch.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <span class="navbar-brand"><?php echo $title;?></span>
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

<form id="deviceForm">
    <div class="container text-center">
        <div class="col-md-3">
            <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
            <h6>Change Device Photo</h6>
            <label for="upload">
                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                <input type="file" id="newPhoto" name="newPhoto" style="display:none">
            </label>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3"><label class="control-label">NAME</label></div>
                <div class="col-md-6"><input class="form-control input-sm" placeholder="NAME" type="text" name="deviceName" id="deviceName"></div>
            </div>
            <div class="row">
                <div class="col-md-3"><label class="control-label">LOCATION</label></div>
                <div class="col-md-6"><input class="form-control input-sm" placeholder="LOCATION" type="text" name="location" id="location"></div>
            </div>
        </div>     
    </div>
    <br/>
    <div class="container text-center">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-2"><label class="control-label">TYPE</label></div>
                <div class="col-md-4">
                    <select class="form-control" id="deviceType" name="deviceType">
                        <option value="DEFAULT">DEFAULT</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"><label class="control-label">TIMING</label></div>
                <div class="col-md-4">
                    <select class="form-control" id="timing" name="timing">
                        <option value="30">30</option>
                        <option value="60">60</option>
                        <option value="90">90</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"><label class="control-label">NOTIFICATION</label></div>
                <div class="col-md-4">
                    <input type="checkbox" name="notification" id="notification">
                </div>
            </div>
        </div>   
        <div class="col-md-6">
            <audio controls>
                <source src="<?=base_url();?>audio/default.mp3" type="audio/mp3">
            </audio> 
        </div>
    </div>
</form>

</body>
<script>
$(function(){
    $("#notification").bootstrapSwitch();
});
</script>
</html>