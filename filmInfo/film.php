<?php 
    $title_name = "電影訂票系統";
    $css_name="../css/film.css";
    $js_name="#";
    require("../header/header.php");
?>   
<div class="content">
    <div class="movie-type">
        <button onclick="location.href='./film.php?type=now'">熱映中</button>
        <button onclick="location.href='./film.php?type=coming'">即將上映</button>
    </div>
    <div class="movie-content">
    <?php
        require_once "../connectDB/connect.php";
        if($_GET['type']=='coming'){
            $movieInfo = $connect->query("SELECT * FROM `movie_info` WHERE `movie_status` = 0");
        }
        else{
            $movieInfo = $connect->query('SELECT * FROM `movie_info` WHERE `movie_status` = 1');
        }  
        foreach($movieInfo as $movie){
            echo"
            <div class='movie-item'>
                <div class='movie-pic'>
                    <img src='$movie[movie_pic]'>
                </div>
                <div class='movie-desc'>
                    <button onclick=location.href='./filmdetail.php?id=$movie[movie_id]'>詳細介紹</button>
                </div>
            </div>";
        }
    ?>
    </div>
</div>
<?php require("../footer/footer.php"); ?>

