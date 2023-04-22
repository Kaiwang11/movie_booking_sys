<?php
    $title_name = "電影訂票系統";
    $css_name="../css/membercenter.css";
    $js_name="../js/myProfile.js";
    require("../header/header.php");
    require_once "../connectDB/connect.php";
    if ($_SESSION['user_identifier']==null) {
        header("location:./login.php");
    }
    $userInfo = $connect->query("SELECT * FROM `user_info` WHERE `user_identifier` = '$_SESSION[user_identifier]'");
    $user = $userInfo -> fetch(PDO::FETCH_ASSOC);
?>
<div class="content">
    <div class="member-content">
        <div class="basis-change">
            <form action="./changeInfo.php?func=0" method="post">
                <h3>修改基本資料</h3>
                <div class="name">
                    <label for="">姓:</label>
                    <input type="text" value="<?php echo $user['user_lname']?>" name="lname">
                    <label for="">名:</label>
                    <input type="text" value="<?php echo $user['user_fname']?>" name="fname">
                </div>
                <div class="birthday">
                    <label for="">生日:</label>
                    <input type="date" min="1920-01-01" max="<?php echo date('Y-m-d');?>" value="<?php echo $user['user_birthday']?>" name="birthday">
                </div>
                <div>
                    <label for="gender">性別:</label>
                    <select name="gender" id="">
                        <option value="1">男</option>
                        <option value="2">女</option>
                    </select>
                </div>
                <div class="address">
                    <label for="">地址:</label>
                    <input type="text" value="<?php echo $user['user_gender']?>" name="address">
                </div>
                <div class="submit">
                    <input type="submit" value="修改">
                </div>
            </form>
        </div>
    
        <div class="pwd-change">
            <form action="./changeInfo.php?func=1" method="post" onsubmit="return check()" id="changeInfo">
                <h3>修改密碼</h3>
                <div class="password">
                    <label for="">舊密碼</label>
                    <input type="password" name="oldPwd" required>
                </div>
                <div class="password">
                    <label for="">新密碼</label>
                    <input type="password" name="newPwd" id="pwd1" required>
                </div>
                <div class="password">
                    <label for="">二次確認</label>
                    <input type="password" name="checkPwd" id="pwd2" required>
                </div>
                <div class="submit">
                    <input type="submit" id="submit" value="修改">
                </div>
            </form>
        </div>
        <div class="ticket-info">
            <h3>訂票紀錄</h3>
            <table>
                <thead>
                    <tr>
                        <th width="12%">訂票序號</th>
                        <th width="28%">片名</th>
                        <th width="20%">場次</th>
                        <th width="20%">品項</th>
                        <th width="10%">總價</th>
                        <th width="10%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        echo"
                        <tr><td>327861</td>
                        <td>(IMAX)天能</td>
                        <td>09月01日 星期二 09:00</td>
                        <td>學生票X1</td>
                        <td>400元</td>
                        <td><button onclick=location.href='#'>明細</button></td></tr>
                        ";
                    ?>              
                </tbody>
            </table>
        </div>
    </div>
</div>
