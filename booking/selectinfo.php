<?php
    $title_name = "電影訂票系統";
    $css_name="../css/selectinfo.css";
    $js_name="../js/selectinfo.js";
    require("../header/header.php");
    require("../connectDB/connect.php");
    $sess=$connect->query("SELECT `session_id` FROM `session` WHERE $_GET[time] like 'start_time' and $_GET[day] like `session_day`");
    $result = $sess->fetch(PDO::FETCH_ASSOC);
    $seats = $connect->query("SELECT * FROM `seat` WHERE $result[session_id] like `session_id`");
    $index=0;
?>
<div class="seat-container">
    <form action="./bookinfocheck.php" method="get">
        <div class="ticket-content">
            <div class="movie-name"></div>
            <div class="function-title">選擇電影票</div>
            <div class="ticket">
                <table>
                    <thead>
                        <tr>
                            <th>票種</th>
                            <th>價格</th>
                            <th>數量</th>
                            <th>合計</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>全票</td>
                            <td>$290</td>
                            <td>
                                <select name="fullTicket" id="fullTicket"  onchange="final('fullTicket','full-price',290)" >
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </td>
                            <td id="full-price">0</td>
                        </tr>
                        <tr>
                            <td>優待票</td>
                            <td>$260</td>
                            <td>
                                <select name="saleTicket" id="saleTicket"  onchange="final('saleTicket','sale-price',260)">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </td>
                            <td id="sale-price">0</td>
                        </tr>
                        <tr>
                            <td>敬老票</td>
                            <td>$200</td>
                            <td>
                                <select name="oldTicket" id="oldTicket"  onchange="final('oldTicket','old-price',260)">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </td>
                            <td id="old-price">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="function-title">選擇餐飲</div>
            <div class="food">
                <table>
                    <thead>
                        <tr>
                            <th>餐點</th>
                            <th>價格</th>
                            <th>數量</th>
                            <th>合計</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>大爆米花</td>
                            <td>$129</td>
                            <td>
                                <select name="popcorn" id="popcorn" onchange="change('popcorn','popcorn-price',129)">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </td>
                            <td id="popcorn-price">0</td>
                        </tr>
                        <tr>
                            <td>吉拿棒</td>
                            <td>$85</td>
                            <td>
                                <select name="ginarod" id="ginarod" onchange="change('ginarod','ginarod-price',85)">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </td>
                            <td id="ginarod-price">0</td>
                        </tr>
                        <tr>
                            <td>牛肉捲</td>
                            <td>$109</td>
                            <td>
                                <select name="beffroll" id="beffroll" onchange="change('beffroll','beffroll-price',109)">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </td>
                            <td id="beffroll-price">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="seat-map">
            <div class="locate-screen">銀幕位置</div>
            <div class="locate-left">
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="A1" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>A1</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="A2" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>A2</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="A3" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>A3</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="A4" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>A4</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="B1" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B1</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="B2" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B2</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="B3" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B3</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="B4" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B4</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="C1" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>C1</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="C2" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>C2</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="C3" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>C3</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="C4" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>C4</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="D1" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>D1</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="D2" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>D2</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="D3" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>D3</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="D4" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>D4</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="E1" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>E1</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="E2" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>E2</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="E3" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>E3</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="E4" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>E4</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="F1" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>F1</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="F2" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>F2</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="F3" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>F3</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="F4" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>F4</span>
                </label>
                <label class="locate-space">
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="G1" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>G1</span>
                </label>
                <label class="locate-space">
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="G2" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>G2</span>
                </label>
                <label class="locate-space">
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="G3" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>G3</span>
                </label>
                <label class="locate-space">
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="G4" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>G4</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="H1" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>H1</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="H2" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>H2</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="H3" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>H3</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="H4" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>H4</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="I1" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>I1</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="I2" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>I2</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="I3" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>I3</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="I4" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>I4</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="J1" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>J1</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="J2" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>J2</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="J3" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>J3</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="J4" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>J4</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="K1" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>K1</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="K2" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>K2</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="K3" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>K3</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="K4" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>K4</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="L1" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>L1</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="L2" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>L2</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="L3" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>L3</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="L4" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>L4</span>
                </label>
            </div>
            <div class="locate-middle">
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="A7" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>A7</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="A8" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>A8</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="A9" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>A9</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="A10" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>A10</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="A11" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>A11</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="A12" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>A12</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="A13" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>A13</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="A14" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>A14</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="A15" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>A15</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="A16" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>A16</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="A17" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>A17</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="B7" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B7</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="B8" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B8</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="B9" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B9</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="B10" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B10</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="B11" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B11</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="B12" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B12</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="B13" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B13</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="B14" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B14</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="B15" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B15</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="B16" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B16</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="B17" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B17</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="C7" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>C7</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="C8" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>C8</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="C9" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B9</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="C10" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>C10</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="C11" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>C11</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="C12" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>C12</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="C13" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>C13</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="C14" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>C14</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="C15" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>C15</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="C16" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>C16</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="C17" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>C17</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="D7" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>D7</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="D8" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>D8</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="D9" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>D9</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="D10" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>D10</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="D11" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>D11</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="D12" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>D12</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="D13" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>D13</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="D14" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>D14</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="D15" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>D15</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="D16" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>D16</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="D17" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>D17</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="E7" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>E7</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="E8" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>E8</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="E9" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>E9</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="E10" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>E10</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="E11" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>E11</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="E12" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>E12</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="E13" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>E13</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="E14" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>E14</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="E15" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>E15</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="E16" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>E16</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="E17" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>E17</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="F7" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>F7</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="F8" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>F8</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="F9" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>F9</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="F10" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>F10</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="F11" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>F11</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="F12" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>F12</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="F13" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>F13</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="F14" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>F14</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="F15" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>F15</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="F16" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>F16</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="F17" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>F17</span>
                </label>
                <label class="locate-space">
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="G7" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>G7</span>
                </label>
                <label class="locate-space">
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="G8" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>G8</span>
                </label>
                <label class="locate-space">
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="G9" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>G9</span>
                </label>
                <label class="locate-space">
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="G10" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>G10</span>
                </label>
                <label class="locate-space">
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="G11" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>G11</span>
                </label>
                <label class="locate-space">
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="G12" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>G12</span>
                </label>
                <label class="locate-space">
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="G13" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>G13</span>
                </label>
                <label class="locate-space">
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="G14" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>G14</span>
                </label>
                <label class="locate-space">
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="G15" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>G15</span>
                </label>
                <label class="locate-space">
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="G16" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>G16</span>
                </label>
                <label class="locate-space">
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="G17" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>G17</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="H7" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>H7</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="H8" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>H8</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="H9" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>H9</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="H10" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B10</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="H11" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>H11</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="H12" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>H12</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="H13" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>H13</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="H14" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>H14</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="H15" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>H15</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="H16" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>H16</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="H17" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>H17</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="I7" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>I7</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="I8" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>I8</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="I9" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>I9</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="I10" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>I10</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="I11" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>I11</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="I12" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>I12</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="I13" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>I13</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="I14" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>I14</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="I15" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>I15</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="I16" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>I16</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="I17" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>I17</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="J7" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>J7</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="J8" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>J8</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="J9" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>J9</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="J10" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>J10</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="J11" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>J11</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="J12" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>J12</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="J13" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>J13</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="J14" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>J14</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="J15" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>J15</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="J16" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>J16</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="J17" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>J17</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="K7" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>K7</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="K8" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>K8</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="K9" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>K9</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="K10" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>K10</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="K11" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>K11</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="K12" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>K12</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="K13" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>K13</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="K14" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>K14</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="K15" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>K15</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="K16" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>K16</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="K17" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>K17</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="L7" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>L7</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="L8" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>L8</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="L9" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>L9</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="L10" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>L10</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="L11" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>L11</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="L12" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>L12</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="L13" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>L13</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="L14" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>L14</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="L15" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>L15</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="L16" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>L16</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="L17" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>L17</span>
                </label>
            </div>
            <div class="locate-right">
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="A20" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>A20</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="A21" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>A21</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="A22" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>A22</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="A23" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>A23</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="B20" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B20</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="B21" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B21</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="B22" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B22</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="B23" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>B23</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="C20" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>C20</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="C21" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>C21</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="C22" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>C22</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="C23" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>C23</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="D20" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>D20</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="D21" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>D21</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="D22" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>D22</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="D23" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>D23</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="E20" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>E20</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="E21" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>E21</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="E22" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>E22</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="E23" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>E23</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="F20" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>F20</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="F21" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>F21</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="F22" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>F22</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="F23" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>F23</span>
                </label>
                <label class="locate-space">
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="G20" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>G20</span>
                </label>
                <label class="locate-space">
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="G21" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>G21</span>
                </label>
                <label class="locate-space">
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="G22" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>G22</span>
                </label>
                <label class="locate-space">
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="G23" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>G23</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="H20" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>H20</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="H21" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>H21</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="H22" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>H22</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="H23" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>H23</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="I20" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>I20</span>
                </label>
                <label>
                    <input type="checkbox" name="seat[][]" value="I21" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>I21</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="I22" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>I22</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="I23" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>I23</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="J20" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>J20</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="J21" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>J21</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="J22" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>J22</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="J23" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>J23</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="K20" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>K20</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="K21" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>K21</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="K22" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>K22</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="K23" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>K23</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="L20" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>L20</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="L21" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>L21</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="L22" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>L22</span>
                </label>
                <label>
                    <input type="checkbox" name="<?php echo $seat[$index]['seat_id'];?>" value="L23" onload="check(<?php echo $seat[$index]['sold_status']; $index++;?>)">
                    <span>L23</span>
                </label>
            </div>  
        </div>
        <div style=display:none;>
            <input type="day" value="<?php echo $_GET['day']?>" name="day">
            <input type="text" value="<?php echo $_GET['time']?>" name="time">
        </div>
        <div class="form-button">
            <input type="submit" value="下一步">
        </div>
    </form>
</div>
<script >
let totalticket = 0;
var stuff=document.getElementsByTagName("input") 
function myTicket() {
    var f = document.getElementById("fullTicket").value;
    var s = document.getElementById("saleTicket").value;
    var o = document.getElementById("oldTicket").value;
    totalticket=parseInt(f)+parseInt(s)+parseInt(o);
    console.log(totalticket);
}
console.log(totalticket)
function check(obj) { 
}
function change(obj, obj2, price) {
    let popItem = document.getElementById(obj);
    let popIndex = popItem.selectedIndex;
    let popValue = popItem.options[popIndex].value;
    document.getElementById(obj2).innerHTML = price * popValue;
}
function final(obj, obj2, price)
{
    change(obj, obj2, price);
    myTicket();
}
var sum=0;
var temp=totalticket;
var selected=document.querySelectorAll("input[type='checkbox']").forEach((item)=>{
    var pre=item.checked
    item.addEventListener('click', () => {
        if(sum>=totalticket)
        {
            if(item.checked==true)
            {
                item.checked=false;
                //console.log("a :"+sum,pre,item.checked)
            }
            else  
            {
                sum--;
                //console.log("b :"+sum,pre,item.checked)
            }   
        }
        else if(sum<totalticket)
        {
            if(item.checked==false)
            {
                sum=sum-2;
                //item.checked=true;
            }
            sum++;
            temp--;
            console.log("c "+sum,pre,item.checked)
        }
      console.log(item.checked)
    })
});
</script>