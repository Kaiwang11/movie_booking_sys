<?php
    require_once "connect.php";
    $updateSql = "UPDATE `user_info` SET `user_lname`='$_POST[lname]',`user_fname`='$_POST[fname]'
    ,`user_gender`= '$_POST[gender]',`user_birthday`='$_POST[birthday]'
    ,`user_address`='$_POST[address]' WHERE user_identifier = '$_COOKIE[user_identifier]'";
    $connect->exec($updateSql);
    header("location:./membercenter.php");
?>