<?php
    require_once "../connectDB/connect.php";
    session_destroy();
    header("location:../index.php");
?>