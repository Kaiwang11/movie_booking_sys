<?php 
    $title_name = "註冊";
    $css_name="../css/register.css";
    $js_name="../js/register.js";
    require("../header/header.php");
?>
<div class="content">
    <form action="../member/registerCheck.php" method="post" id="form" onclick="check();">
        <div class="register-area">
            <div class="title-area">            
                <h3>註冊</h3>
                <div>建立您的會員資料</div>
            </div>
            <div class="name-area">
                <label for="">姓氏：</label>
                <input type="text" name="fname" maxlength="10" required>
                <label for="">名字：</label>
                <input type="text" name="lname" maxlength="10" required>
            </div>
            <div class="gender-area">
                <label for="">性別：</label>
                <select name="gender" id="">
                    <option value="1">男</option>
                    <option value="2">女</option>
                </select>
            </div>
            <div class="address-area">
                <label for="">地址：</label>
                <input type="address" name="address" maxlength="50" required>
            </div>
            <div class="email-area">
                <label for="">電子信箱(帳號)：</label>
                <input type="email" name="email" maxlength="50" required>
            </div>
            <div class="phone-area">
                <label for="">手機：</label>
                <input type="text" name="phone" minlength="10" maxlength="10" required>
            </div>
            <div class="pwd-area">
                <label for="">密碼：</label>
                <input type="password" name="password" maxlength="16" id="pwd1" required>
            </div>
            <div class="pwd-area">
                <label for="">確認密碼：</label>
                <input type="password" name="password2" maxlength="16" id="pwd2" required>
            </div>
            <div class="submit-area">
                <a href="../member/login.php">返回會員登入</a>
                <input type="submit" value="註冊">
            </div>
        </div>
    </form>
</div>
