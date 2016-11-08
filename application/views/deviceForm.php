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
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<?php if ($title=="NEW DEVICE") {?>
    <form enctype="multipart/form-data" id="deviceForm" method="post" action="<?=base_url();?>device/createDevice">
<?php } else if ($title=="EDIT DEVICE") {?>
    <form enctype="multipart/form-data" id="deviceForm" method="post" action="<?=base_url();?>device/saveDevice">
<?php } ?>

    <?php if ($title=="EDIT DEVICE") {?>
        <input type="hidden" id="deviceId" name="deviceId" value="<?=$device->id;?>">
    <?php } ?>
    <div class="container text-center">
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
        <div class="row">
            <h6>Device Photo</h6>
            <label for='photo'>
            <?php if ($title=="NEW DEVICE") {?>
                <img id="preview" src="//placehold.it/100" alt="your image" height="100" style="cursor:pointer;"/>
            <?php } else if ($title=="EDIT DEVICE") {?>
                <img id="preview" src="<?=base_url().'images/devices/'.$device->photo;?>" alt="your image" height="100" style="cursor:pointer;"//>
            <?php } ?>
            </label>
            <input type='file' id="photo" name='photo' style="display:none;"/>
        </div>
        <div class="row">
            <div class="col-md-2"><label class="control-label">NAME</label></div>
            <div class="col-md-2">
            <?php if ($title=="NEW DEVICE") {?>
                <input class="form-control input-sm" placeholder="NAME" type="text" name="device_name" id="device_name" required>
            <?php } else if ($title=="EDIT DEVICE") {?>
                <input class="form-control input-sm" value="<?=$device->device_name;?>" type="text" name="device_name" id="device_name">
            <?php } ?>                   
            </div>
            <div class="col-md-2"><label class="control-label">LOCATION</label></div>
            <div class="col-md-2">
            <?php if ($title=="NEW DEVICE") {?>
                <input class="form-control input-sm" placeholder="LOCATION" type="text" name="location" id="location" required>
            <?php } else if ($title=="EDIT DEVICE") {?>
                <input class="form-control input-sm" value="<?=$device->location;?>" type="text" name="location" id="location" required>
            <?php } ?>
            </div>
            <br/>
            <div class="col-md-2"><label class="control-label">TYPE</label></div>
            <div class="col-md-2">
                <select class="form-control" id="device_type" name="device_type">
                    <option value="DEFAULT">DEFAULT</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"><label class="control-label">NOTIFICATION</label></div>
            <div class="col-md-2">
                <input type="checkbox" name="allow_notif" id="allow_notif" checked>
            </div>
            <div class="col-md-2"><label class="control-label">AUDIO FILE</label></div>
            <div class="col-md-2">
                <input type="file" id="audioFile" name="audioFile">
            </div>
            <div class="col-md-2">
                <?php if ($title=="EDIT DEVICE") {?>
                    <label>Current File:</label>
                    <audio controls>
                        <source src="<?=base_url();?>audio/<?=$device->audioFile;?>" type="audio/mp3">
                    </audio> 
                <?php } ?>
            </div>           
        </div>
        <div class="row">
            <?php if ($title=="NEW DEVICE") {?>
                <input type="submit" class="btn btn-info" value="Create Device">
            <?php } else if ($title=="EDIT DEVICE") {?>
                <input type="submit" class="btn btn-info" value="Save Changes">
                <a href="<?=base_url().'device/delete/'.$device->id; ?>" class="btn btn-danger" role="button">Delete Device</a>
            <?php } ?>
        </div>
    </div>
</form>

</body>
<script>
$(function(){
    // enable bootstrap switch
    $("#allow_notif").bootstrapSwitch();

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#photo").change(function(){
        readURL(this);
    });
});
</script>
</html>