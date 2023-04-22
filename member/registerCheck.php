<?php
    require_once "../connectDB/connect.php";
    ini_set("display_errors", "On");
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $check_sql = "SELECT * FROM `user_info` WHERE `user_email` = '$email' OR `user_phone` = '$phone'";
    $register_sql="INSERT INTO `user_info`(`user_lname`,`user_fname`,`user_email`,`user_gender`,`user_pwd`,
    `user_address`,`user_phone`) VALUES ('$lname','$fname','$email','$gender','$password','$address','$phone')";
    $connect->query($check_sql);
    if($connect!=null){
        header("location:../index.php?error=註冊失敗");
    }
    else{
        $connect->query($register_sql);
        header("location:../index.php?error=註冊成功");
    }
?>