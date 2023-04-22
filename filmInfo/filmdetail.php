<?php 
    $title_name = "電影訂票系統";
    $css_name="../css/filmdetail.css";
    $js_name="#";
    require("../header/header.php");
    require_once "../connectDB/connect.php";
    $movieInfo = $connect->query("SELECT * FROM `movie_info` WHERE `movie_id` = $_GET[id]");
    $movie = $movieInfo -> fetch(PDO::FETCH_ASSOC);
?>
<div class="content">
    <div class="film-detail">
        <div class="film-pic">
            <img src="<?php echo $movie['movie_pic']?>">
        </div>
        <div class="film-desc">
            <div class="film-genre">
                <button><?php echo $movie['movie_genre']?></button>
                <button><?php echo $movie['movie_rate']?></button>
            </div>
            <div class="film-name">
                <div><?php $movie['movie_name']?></div>
            </div>        
            <div class="film-item">
                <div class="film-release">
                    上映日期：<?php echo $movie['movie_release']?>
                </div>
                <div class="film-length">
                    片長：<?php echo $movie['movie_length']?>分鐘
                </div>
            </div>
            <div class="film-score">
                IMDb 評分：<?php echo $movie['movie_score']?>
            </div>
            <div class="film-director">
                導演：<?php echo $movie['movie_director']?>
            </div>
            <div class="film-actor">
                演員：<?php echo $movie['movie_actor']?>
            </div>
        </div>

        <div class="film-intro">
            <div class="intro-title">
                電影介紹
            </div>
            <div class="intro-text"><?php echo $movie['movie_desc']?></div>
        </div>
    </div>
</div>