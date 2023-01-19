<!DOCTYPE html>
<html>
<head>
	<title>Insert data in MySQL database using Ajax</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div style="margin: auto;width: 60%;">
	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<form id="fupForm" name="form1" method="post">
		<div class="form-group">
			<label for="email">Name:</label>
			<input type="text" class="form-control" id="name" placeholder="Name" name="name">
		</div>
		<div class="form-group">
			<label for="pwd">Email:</label>
			<input type="email" class="form-control" id="email" placeholder="Email" name="email">
		</div>
		<div class="form-group">
			<label for="pwd">Phone:</label>
			<input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
		</div>
		<div class="form-group" >
			<label for="pwd">City:</label>
			<select name="city" id="city" class="form-control">
				<option value="">Select</option>
				<option value="Delhi">Delhi</option>
				<option value="Mumbai">Mumbai</option>
				<option value="Pune">Pune</option>
			</select>
		</div>
<div class="form-group">
  <p>Please select your favorite Web language:</p>
  <input type="radio" id="HTML" name="language" value="HTML">
  <label for="HTML">HTML</label><br>
  <input type="radio" id="CSS" name="language" value="CSS">
  <label for="CSS">CSS</label><br>
  <input type="radio" id="Javascript" name="language" value="JavaScript">
  <label for="Javascript">JavaScript</label><br>
  <input type="radio" id="None" name="language" value="None">
  <label for="None">None</label>
</div>
<div class="form-group">
  <input type="checkbox" id="vehicle1" name="vehicle" value="Bike">
<label for="vehicle1"> I have a bike</label><br>
<input type="checkbox" id="vehicle2" name="vehicle" value="Car">
<label for="vehicle2"> I have a car</label><br>
<input type="checkbox" id="vehicle3" name="vehicle" value="Boat">
<label for="vehicle3"> I have a boat</label><br>
</div>
		<input type="button" name="save" class="btn btn-primary" value="Save to database" id="butsave">
	</form>
</div>
<p id="target">
</p>

<script>
$(document).ready(function() {
$('#butsave').on('click', function() {
var name = $('#name').val();
var email = $('#email').val();
var phone = $('#phone').val();
var city = $('#city').val();
var sList = $('input[name="vehicle"]:checked').val();
$('input[type=checkbox]').each(function () {
    sList += "(" + $(this).val() + "-" + (this.checked ? "checked" : "not checked") + ")";
});
if(name!="" && email!="" && phone!="" && city!="" && sList!=""){
	$.ajax({
		url: "save.php",
		type: "POST",
		data: {
			name: name,
			email: email,
			phone: phone,
			city: city,	
			sList: sList
		},
		cache: false,
		success: function(dataResult){
			var dataResult = JSON.parse(dataResult);
			if(dataResult.statusCode==200){
				$("#butsave").removeAttr("disabled");
				$('#fupForm').find('input:text').val('');
				$("#success").show();
				$('#success').html('Data added successfully !'); 	
$('#target').load('show.php');
			}
			else if(dataResult.statusCode==201){
				alert("Error occured !");
			}
			
		
	}

	});
}
else {
alert('Please fill all the fields !');
}
;
});
});
</script>
</body>
</html>