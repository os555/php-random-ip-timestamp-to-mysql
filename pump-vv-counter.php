<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Start point of our date range.
$start = strtotime("10 September 2019");
//End point of our date range.
$end = strtotime("16 June 2020");

//Number of visitor to add for loop 
for ($i = 1; $i <= 50000; $i++) {

//Random date and timestamp
$timestamp = mt_rand($start, $end);
//Random date and timestamp
$randDate = date("Y-m-d H:i:s", $timestamp);
//Random IP Address
$randIP = "".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255);

$sql = "INSERT INTO `wp_vcp_log` (`LogID`, `IP`, `Time`) VALUES (NULL, '$randIP', '$randDate')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?> 
