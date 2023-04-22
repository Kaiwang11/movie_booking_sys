<?php
    require("../connectDB/connect.php");
    $fulltic = $_GET['fullTicket'];
    $saletic = $_GET['saleTicket'];
    $oldtic = $_GET['oldTicket'];
    $popcorn = $_GET['popcorn'];
    $ginarod = $_GET['ginarod'];
    $beffroll = $_GET['beffroll'];
    $day = $_GET['day'];
    $session = $_GET['time'];
    $seat = $_GET['seat'];
    $userId = 1;

    $totalPrice = $fulltic * 290 + $saletic * 260 + $oldtic* 230;
    $ticketNum = $fulltic + $saletic + $oldtic;
    
    $book_sql = "INSERT INTO `book_record`(`user_id`, `total_price`, `ticket_number`) VALUES ($userId,$totalPrice,$ticketNum)";
    $connect -> query($book_sql);

    $bookObj = $connect -> query("SELECT MAX(`book_id`) AS `book_id` FROM `book_record` WHERE `user_id`= $userId");
    $book = $bookObj->fetch(PDO::FETCH_ASSOC);
    $bookId = $book['book_id'];

    booking($fulltic,1,$bookId,$seat,$session,$connect);
    booking($saletic,2,$bookId,$seat,$session,$connect);
    booking($oldtic,3,$bookId,$seat,$session,$connect);


    function booking($ticKind,$ticKindNum,$bookId,$seat,$session,$connect){
        for ($i=0;$i<$ticKind;$i++) {
            $ticket_sql = "INSERT INTO `ticket_info` (`book_id`,`seat_id`, `session_id`, `ticket_kind`) VALUES ($bookId,'$seat[$i]',$session,$ticKindNum)";
            $seat_sql = "UPDATE `seat` SET `sold_status`= 1 WHERE `seat_id` = '$seat[$i]' AND `session_id` = $session";
            $connect -> exec($ticket_sql);
            $connect -> exec($seat_sql);
            echo $ticket_sql,$seat_sql;
        }
    }
?>
