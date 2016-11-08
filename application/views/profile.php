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
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<form enctype="multipart/form-data" id="userForm" action='<?=base_url();?>device/saveUser' method='post'>
	<div class="container text-center">
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
					<li><a href='#'>TBD</a></li>
				</ul>
			</div>
		</nav>
		<div class="col-md-3">
            <h6>Profile Photo</h6>
            <label for='photo'>
	            <img id="preview" src="<?=base_url().'images/users/'.$user->photo; ?>" alt="your image" height="100" style="cursor:pointer;"/>
            </label>
            <input type='file' id="photo" name='photo' style="display:none;"/>
        </div>
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-3"><label class="control-label">NAME</label></div>
				<div class="col-md-3"><input class="form-control input-sm" value="<?=$user->fname; ?>" type="text" name="fname" id="fname" required></div>
				<div class="col-md-3"><input class="form-control input-sm" value="<?=$user->lname; ?>" type="text" name="lname" id="lname" required></div>
			</div>
			<div class="row">
				<div class="col-md-3"><label class="control-label">EMAIL</label></div>
				<div class="col-md-6"><input class="form-control input-sm" value="<?=$user->email; ?>" type="text" name="email" id="email" required></div>
			</div>
			<div class="row">
				<div class="col-md-3"><label class="control-label">PHONE</label></div>
				<div class="col-md-6"><input class="form-control input-sm" value="<?=$user->phone; ?>" type="text" name="phone" id="phone" required></div>
			</div>
			<br/>
			<div class="row text-center">
				<input type="submit" class="btn btn-info" value="Save Changes">
			</div>
		</div>		
	</div>
</form>
<script>
$(function(){
	//callback handler for form submit
	$("#userForm").submit(function(e){
	    var formURL = $(this).attr("action");
	    var formData = new FormData(this);
	    $.ajax(
	    {
	        url : formURL,
	        type: "POST",
	        data : formData,
	        success:function(data, textStatus, jqXHR) 
	        {
	            alert("Changes saved successfully");
	        },
	        error: function(jqXHR, textStatus, errorThrown) 
	        {
	            alert("Error saving changes");     
	        }
	    });
	    e.preventDefault(); //STOP default action
	    e.unbind(); //unbind. to stop multiple form submit.
	});


	// photo upload previewer
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
})
</script>
</body>
