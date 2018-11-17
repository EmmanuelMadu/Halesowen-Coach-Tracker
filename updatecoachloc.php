<?php
session_start();
include 'dbp.php';

$routeid = mysqli_real_escape_string($conn,$_GET['routeid']);
$latitude = mysqli_real_escape_string($conn,$_GET['latitude']);
$longitude = mysqli_real_escape_string($conn,$_GET['longitude']);

$query = "UPDATE coachlocation SET latitude = '$latitude', longitude ='$longitude'  WHERE routeid='$routeid' ";

$result = mysqli_query($conn,$query) or tigger_error("Query MySQL Error: " . mysqli_error($conn));

mysqli_close($conn);
?>