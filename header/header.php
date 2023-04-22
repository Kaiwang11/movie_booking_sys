<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <link rel="icon" href="#" type="image/x-icon">
    <link rel="stylesheet" href=<?php echo $css_name;?>>
    <script src=<?php echo $js_name;?>></script>
    <title><?php echo $title_name;?></title>
</head>
<body>
    <div class="header">
        <div class="main-menu">
            <ul>
                <li><a href="../booking/timetable.php?theater=1">線上訂票</a></li>
                <li><a href="#">電影介紹</a>
                    <ul>
                        <li><a href="../filmInfo/film.php?type=now">熱映中</a></li>
                        <li><a href="../filmInfo/film.php?type=coming">即將上映</a></li>
                    </ul>
                </li>
                <li><a href="../member/myProfile.php">會員中心</a></li>   
                <li><a href="../filmInfo/ticketprice.php">票價資訊</a></li>
                <li><a href="">團體訂票</a></li>
            </ul>
        </div>
        <?php
            if($_SESSION['user_identifier']!=null){
                echo"
                <div class='member-menu'>
                    <div>$_SESSION[user_name]</div>
                    <input type='button' value='登出' onclick=location.href='../member/logout.php'>
                </div>
                ";
            }
            else{
                echo
                "<div class='login-menu'>
                    <input type='button' value='登入' onclick=location.href='../member/login.php'>
                    <input type='button' value='註冊' onclick=location.href='../member/register.php'>
                </div>";
            }
        ?>
    </div>
