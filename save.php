<?php
	include 'database.php';
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$city=$_POST['city'];
	$language=$_POST['language'];
  $sql = $con->prepare("INSERT INTO `crud`( `name`, `email`, `phone`, `city`, `language`) VALUES (?,?,?,?,?)");
$sql->bind_param("sssss", $name, $email, $phone, $city, $language);
$rc = $sql->execute();

    if (true===$rc) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
      //connection closed.
$sql->close();
 $con->close();
?>