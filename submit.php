<?php
include 'dbp.php';

$routeid = mysqli_real_escape_string($conn,$_GET['routeid']);
$latitude = mysqli_real_escape_string($conn,$_GET['latitude']);
$longitude = mysqli_real_escape_string($conn,$_GET['longitude']);
$coachid = mysqli_real_escape_string($conn,$_GET['coachid']);

$sql = "INSERT INTO coachlocation (routeid,latitude,longitude,coachid)
VALUES ('$routeid','$latitude','$longitude','$coachid')";

$result = mysqli_query($conn,$sql);
header("Location: index.php");
?>