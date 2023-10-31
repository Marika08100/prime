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

    <form class="prime-form" id="prime-form" action="" method="post" required>
        <div class="how_much">
            <img src="images/assets/ENNYI PRÍMSZÁMOT KÉREK.png" style="width: 216px; height: 23px;">
        </div>

        <div class="input-container">
            <input class="input-text" type="text" placeholder="32" id="numPrimes" name="numPrimes">
        </div>

        <div class="number_end">
            <img src="images/assets/AMI EZZEL A SZÁMMJEGGYEL VÉGZŐDIK.png">
        </div>

        <div class="choose">
            <div class="custom-select">
                <select class="choose_number" id="lastDigit" name="lastDigit">
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
            <button class="custom-button" id="generate-button" type="submit">
                <img src="images/assets/generalas rectangle yellow.png">
                <span class="button-text">GENERÁLÁS</span>
            </button>
        </div>
    </form>
    <div id="loading" style="display: none;">Kérlek várj, eredmények generálása...</div>

    <div id="result-container"></div>

    <script>
        $(document).ready(function() {
            $('#prime-form').submit(function(event) {
                event.preventDefault();

                var numPrimes = $('#numPrimes').val();
                var lastDigit = $('#lastDigit').val();

                $.ajax({
                    type: 'POST',
                    url: 'ajax.php',
                    data: {
                        numPrimes: numPrimes,
                        lastDigit: lastDigit
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $('#loading').show();
                        $('#result-container').hide();
                        $('#result-container').empty();

                        // Az üzenet megjelenítése késleltetve
                        setTimeout(function() {
                            $('#loading').text('Kérlek várj, eredmények generálása...');
                        }, 2000);
                    },
                    success: function(data) {
                        $('#loading').hide();
                        $('#result-container').show();

                        if (data.eredmenyek.length > 0) {
                            for (var i = 0; i < data.eredmenyek.length; i++) {
                                var eredmenyElem = $('<div class="result-number">' + data.eredmenyek[i] + '</div>');
                                $('#result-container').append(eredmenyElem);
                            }

                            // Az eredményekre hover és click eseményfigyelők hozzáadása
                            $('.result-number').hover(function() {
                                $(this).css('background-color', '#FFA500');
                                $(this).css('border-color', '#FF0000');
                            }, function() {
                                $(this).css('background-color', '#33485D');
                                $(this).css('border-color', '#000');
                            }).click(function() {
                                $('.result-number').not(this).hide();
                            });
                        } else {
                            $('#result-container').html('<div class="no-result-message" style="background-color: #33485D; color: #FFFFFF; padding: 10px;">Nincs eredmény a kiválasztott feltételek alapján.</div>');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('AJAX hiba:', errorThrown);
                    }
                });
            });
        });
    </script>

</body>

</html>