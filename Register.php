<?php


session_start();
header('location:logins.php');
$con =mysqli_connect('localhost:3309','root','');
mysqli_select_db($con,'intra');

$name=$_POST['user']; 
$email=$_POST['email'];
$password=$_POST['password'];
$confirmpassword=$_POST['confirmpassword'];

$user_data='email='.$email.'&user='.$name;

if(empty($name)){
    header("Location:Register1.php?error=User Name is required&$user_data");
    exit();
}elseif(empty($email)){
    header("Location:Register1.php?error=email is required&$user_data");
    exit();
}elseif(empty($password )){
    header("Location:Register1.php?error=password is required&$user_data");
    exit();
}elseif(empty($confirmpassword)){
    header("Location:Register1.php?error=confirmpassword is required&$user_data");
    exit();
}elseif($password!==$confirmpassword){
    header("Location:Register1.php?error=Password and confirmation password doesn't match&$user_data");
    exit();
}
else{
    $s =" select * from registration where email ='$email'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if($num > 0){

    header("Location:Register1.php?error=email is taken try another&$user_data");
    exit();

    

}else{
    
    $reg=" insert into registration(user,password,confirmpassword,email) values ('$name','$password','$confirmpassword','$email')";
    $aru=mysqli_query($con, $reg);
    if($aru){
        header("Location:Register1.php?success=your account has been created successfully");
        exit();

        
    }else{
        header("Location:Register1.php?error=Unknown error occured&$user_data");
        exit();
        

    }

    }

}//else{
//     header("Location: Register1.php");
//     exit();
// }


?>