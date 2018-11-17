<?php
session_start();

if(isset($_GET['us']) && !empty($_GET['us']) AND isset($_GET['c']) && !empty($_GET['c'])){
    include 'dbp.php';
    $username = $_GET['us']; // Set username variable
    $code = $_GET['c']; // Set code variable
    
    $username = $conn->real_escape_string($username);
    $code = $conn->real_escape_string($code);
    
    $sql = "SELECT * FROM `ctuser` WHERE username = '$username' AND confirmed = '0' ";
    
    $query = mysqli_query($conn,$sql);
    
    $row = mysqli_fetch_assoc($query);
    
    if($row > 0){
        if($row['confirmcode'] == $code){
            $sql = "UPDATE `ctuser` SET `confirmed`='1',`confirmcode`='0' WHERE username = '$username'";
            $query = mysqli_query($conn,$sql);
            
            $_SESSION['sesh_fname'] = $row['firstname'];
            $_SESSION['sesh_verified'] = $row['username'];
            
            header("Location: verified.php");

        }else{
            echo "Invalid Verification Code";
        }
    }else{
            echo "Invalid Verification Code";
        }

}else{
    echo "Verification Code is not set";
}


?>