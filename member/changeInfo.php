<?php
    require_once "../connectDB/connect.php";
    if ($_GET['func']==1) {
        updatePwd($connect);
    } else {
        updateInfo($connect);
    }

    function updateInfo($connect)
    {
        $updateSql = "UPDATE `user_info` SET `user_lname`='$_POST[lname]',`user_fname`='$_POST[fname]'
        ,`user_gender`= '$_POST[gender]',`user_birthday`='$_POST[birthday]',`user_address`='$_POST[address]' 
        WHERE `user_identifier` = '$_SESSION[user_identifier]'";
        $connect->exec($updateSql);
        $_SESSION['user_name'] = $_POST['lname'].$_POST['fname'];
        header("location:./myProfile.php");
    }

    function updatePwd($connect)
    {
        $updateSql = "UPDATE `user_info` SET `user_pwd` = '$_POST[newPwd]' 
        WHERE `user_identifier` = '$_SESSION[user_identifier]'";
        echo $updateSql;
        $connect->exec($updateSql);
        header("location:./myProfile.php");
    }
