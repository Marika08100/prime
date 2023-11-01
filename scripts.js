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
