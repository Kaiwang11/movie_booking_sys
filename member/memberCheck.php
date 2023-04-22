<?php
    require_once "../connectDB/connect.php";
    $account = $_POST['account'];
    $password = $_POST['password'];
    $select = $connect->prepare("SELECT `user_email`,`user_pwd`,`user_lname`,`user_fname` FROM `user_info` WHERE user_email = :acc AND user_pwd = :pw");
    $select -> execute(array(':acc' => $account,':pw' => $password));
    $result = $select -> fetch(PDO::FETCH_ASSOC);

    if ($result['user_email']==$account&&$result['user_pwd']==$password) {
        $identifier = sha1($result['user_email']);
        $register_sql = "UPDATE `user_info` SET `user_identifier` = '$identifier' WHERE `user_email` = '$account'";
        $connect -> exec($register_sql);
        setcookie("user_identifier", $identifier, "time()+600");
        $_SESSION['user_identifier'] = $identifier;
        $_SESSION['user_name'] = $result['user_lname'].$result['user_fname'];
        header("location:../index.php");
    } 
    elseif ($result['user_pwd']!=$password||$result['user_email']!=$account) {
        header("location:./login.php");
    }
?>