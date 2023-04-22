<?php 
    $title_name = "登入";
    $css_name="../css/login.css";
    $js_name="../js/login.js";
    require("../header/header.php");
?>
<div class="content">
    <div class="login-area">
        <form action="./memberCheck.php" method="post">
            <div class="login-title">
                <h3>登入</h3>
                <div>請輸入帳號密碼</div>
            </div>
            <div class="login-acc">
                <label for="">帳號：</label>
                <input type="text" name="account" value="" id="account" required>
            </div>
            <div class="login-pwd">
                <label for="">密碼：</label>
                <input type="password" name="password" value="" id="password" required>
            </div>
            <div class="login-submit">
                <div class="go-register">
                    <a href="">忘記密碼</a>
                    <a href="./register.php">註冊會員</a>
                </div>
                <input type="submit" value="登入">
            </div>
        </form>
    </div>
</div>