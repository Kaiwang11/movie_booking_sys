<?php 
    $title_name = "電影訂票系統";
    $css_name="css/index.css";
    $js_name="js/index.js";
    require("./header/header.php");
    require_once "./connectDB/connect.php";
    $theaterInfo = $connect->query("SELECT * FROM `theater` WHERE 1");
?>
<div class="content">
    <div class="content-b">
        <form action="" method="GET">
            <div class="bookTic">
                <div class="bookTic-title">快速訂票</div>
                <div class="bookTic-item">
                    <select name="theater" id="theater">
                        <option value='0'>請選擇影城</option>
                        <?php 
                            foreach($theaterInfo as $theater){
                                echo"<option value=$theater[theater_id] >$theater[theater_name]</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="bookTic-item">
                    <select name="film" id="film" >
                        <option value="" >請選擇影片</option>
                        <?php
                            $temp=0;
                            $cinema=$connect->query("SELECT `session_id` from `cinema` where $_COOKIE[th_id] like `theater_id`  ");
                            $sess=$connect->query("SELECT `movie_id` from `session` where $cinema like `session_id` ");
                            
                        ?>
                    </select>
                </div>
                <div class="bookTic-item">
                    <select name="date" id="date" >
                        <option value="">請選擇日期</option>
                        <?php/*
                            $sessi=$connect->query("SELECT `session_day`,`session_id` from `session` where $_COOKIE[film_id] like movie_id and $_COOKIE[th_id]");
                            foreach($sessi as $s)
                            {
                                echo "<option value=$s[session_id]>$s[session_day]</option>";
                            }                
                            */    
                        ?>
                    </select>
                </div>
                <div class="bookTic-item">
                    <select name="" id="">
                        <option value="">請選擇場次</option>
                        <?php
                           // $sessio=$connect->query("SELECT `session_day`,`session_id` from `session` where $_COOKIE[date_id] like `session_day`");
                        ?>
                    </select>
                </div>
                <div class="bookTic-item">
                    <input type="button" value="前往訂票">
                </div>
            </div>
        </form>
    </div>
</div>
<script src=<?php echo $js_name?>></script>
<?php require("./footer/footer.php"); ?>

