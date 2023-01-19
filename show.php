<?php
include 'database.php';
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
} 

$query = "SELECT name, email, phone, city, language, sList FROM crud";

$result = $con->query($query);

if ($result->num_rows > 0) {
  // output data of each row

/* fetch associative array */
while ($row = $result->fetch_assoc()) {
    echo $row["name"]. " " . $row["email"]. " " . $row["phone"]. " " . $row["city"]. " " . $row["language"].  " " . $row["sList"] . "<br>";
}
} else {
  echo "0 results";
}
  

$result -> free_result();
$con->close();
?>