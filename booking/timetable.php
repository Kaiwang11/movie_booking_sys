<?php 
    $title_name = "電影訂票系統";
    $css_name="../css/timetable.css";
    $js_name="#";
    require("../header/header.php");
    require("../connectDB/connect.php");
?>
<div class="content">
    <div class="movie-content">
        <div class="movie-theater">
            <?php OutputTheater($connect)?>
        </div>
        <?php OutputMovieInfo($connect)?>
    </div>
</div>


<?php
require("../footer/footer.php");

function OutputTheater($connect){
    $theater = $connect->query("SELECT `theater_name`,`theater_id` FROM `theater` WHERE 1");
    foreach ($theater as $th) {
        echo "<button onclick=location.href='./timetable.php?theater=$th[theater_id]'>$th[theater_name]</button>";
    }
}

function OutputMovieInfo($connect){
    $movieInfo = $connect->query("SELECT * FROM `cinema` NATURAL JOIN `session` NATURAL JOIN `movie_info` WHERE `movie_status` = 1 AND `theater_id` = $_GET[theater]");
    foreach ($movieInfo as $movie) {
        if(strlen($movie['movie_desc'])>187){
            $movie['movie_desc'] = mb_substr($movie['movie_desc'],0,187,'utf-8').'…';
        }
        echo"
        <div class='time-table'>
            <div class='movie-pic'>
                <img src='$movie[movie_pic]'>
            </div>
            <div class='movie-button'>
                <button onclick=location.href='../filmInfo/filmdetail.php?id=$movie[movie_id]'>電影介紹</button>
            </div>
            <div class='movie-info'>
                <div class='movie-name'>
                    <h2>$movie[movie_name]</h2>
                </div>
                <div class='movie-length'>
                    片長:$movie[movie_length]分鐘
                </div>
                <div class='movie-genre'>
                    <button>$movie[movie_genre]</button>
                </div>
                <div class='movie-desc'>
                    $movie[movie_desc]
                </div>
            </div>
            <div class='movie-session'>
                <form action='./selectinfo.php' method='get'>
                    <div class='select-session'>";
                        printDay($movie['movie_id'],$connect,$_GET['theater']);
                        printTime($movie['movie_id'],$connect,$_GET['theater']);echo"
                    </div>
                </form>
            </div>
        </div>
        ";
    }
}




function printDay($movieId,$connect,$theaterId){
    echo"<p>請選擇日期:</p>";
    $info = $connect->query("SELECT `session_day` FROM `cinema` NATURAL JOIN `session` WHERE `movie_id` = $movieId AND `theater_id` = $theaterId");
    while($day = $info->fetch(PDO::FETCH_ASSOC)) {
        $day['session_day'] = substr($day['session_day'],5,9);
        echo"<label class='select-day'>
            <input type='radio' name='day' value='$day[session_day]' required>
            <span>$day[session_day]</span>
        </label>";
    }
}
function printTime($movieId,$connect,$theaterId){
    echo"<p>請選擇場次:</p>";
    $info = $connect->query("SELECT `session_id`,`start_time` FROM `cinema` NATURAL JOIN `session` WHERE `movie_id` = $movieId AND `theater_id` = $theaterId");
    while($time = $info->fetch(PDO::FETCH_ASSOC)) {
        $time['start_time'] = substr($time['start_time'],0,-3);
        echo"<label class='select-time'>
            <input type='submit' class='time' value='$time[session_id]' name='time'>
            <span>$time[start_time]</span>
        </label>";
    }
}
?>
