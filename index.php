<?php
if(empty($_POST == false)){
    echo 'submitted';
}
?>






<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prímszám Generátor</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="logo"></div>

    <div class="test_box">
        <div class="test_text"></div>
    </div>

    <form class="prime-form" id="prime-form" action="ajax.php" method="post">
        <div class="how_much">
            <img src="images/assets/ENNYI PRÍMSZÁMOT KÉREK.png" style="width: 216px; height: 23px;">
        </div>

        <div class="input-container">
            <input class="input-text" type="text" placeholder="32" id="numPrimes">
        </div>

        <div class="number_end">
            <img src="images/assets/AMI EZZEL A SZÁMMJEGGYEL VÉGZŐDIK.png">
        </div>

        <div class="choose">
            <div class="custom-select">
                <select class="choose_number" id="lastDigit">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
            </div>
        </div>

        <div class="button-container">
            <button class="custom-button" id="generate-button" method="Post">
                <img src="images/assets/generalas rectangle yellow.png">
                <span class="button-text">GENERÁLÁS</span>
            </button>
        </div>
    </form>
    <div id="loading" style="display: none;">Kérlek várj, eredmények generálása...</div>
    <div id="results"></div>
  
</body>
</html>
