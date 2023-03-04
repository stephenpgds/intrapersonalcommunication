<?php
session_start();
include "connectionlog.php";
if(isset($_POST['email']) && isset($_POST['password'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;


    }
    $email=$_POST['email'];
    $password=$_POST['password'];

    if(empty($email)){
        header("Location:logins.php?error=Email name is required");
        exit();

    }elseif (empty($password)) {
        header("Location:logins.php?error=Password is required");
        exit();
       
    }else {
        $sql = "SELECT * FROM registration WHERE email='$email' AND  password = '$password'";
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $password) {
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                header("Location: index.php");
                exit();
               
            }else {
                header("Location:logins.php?error=Incorrect Email or Password");
            exit();
            }
        }else {
            header("Location:logins.php?error=Incorrect Email or Password");
            exit();
            
        }
    }










}else{
    header("Location:logins.php");
    exit();
}