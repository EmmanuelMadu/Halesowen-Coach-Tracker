<?php

session_start();
include 'dbp.php';

$username = $_GET['user'];
$password = $_GET['pass'];

$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);

$encPass = md5($password);
$sql = "SELECT * FROM ctuser WHERE username='$username' AND password='$encPass'";
$result = mysqli_query($conn,$sql);

if (!$row = mysqli_fetch_assoc($result)) {
    $sql = "SELECT * FROM ctuser WHERE studentid='$username' AND password='$encPass'";
}

$result = mysqli_query($conn,$sql);
if (!$row = mysqli_fetch_assoc($result)) {
    echo("INCOREECTLOGIN");
}else{
    if($row['confirmed'] == 0){
        $_SESSION['sesh_id'] = $row['id'];
        $_SESSION['sesh_fname'] = $row['firstname'];
        $_SESSION['sesh_mail'] = $row['email'];
        echo("UNVERIFIED");
    }else{
    	$_SESSION['sesh_id'] = $row['id'];
        $_SESSION['sesh_username'] = $row['username'];
        $_SESSION['sesh_fname'] = $row['firstname'];
        $_SESSION['sesh_lname'] = $row['lastname'];
        $_SESSION['sesh_coachid'] = $row['routeid'];
        $_SESSION['sesh_studentid'] = $row['studentid'];
        $_SESSION['sesh_mail'] = $row['email'];
        $_SESSION['sesh_tou'] = $row['tou'];
        echo("CORRECT");
    }

}
