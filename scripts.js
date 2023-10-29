$(document).ready(function () {
    $('#generate-button').click(function (event) {
        event.preventDefault(); // Az alapértelmezett űrlap beküldés megszakítása

        var numPrimes = $('#numPrimes').val();
        var lastDigit = $('#lastDigit').val();

        if (numPrimes > 0) {
            $('#loading').show();
            $('#results').empty();

            $.ajax({
                type: 'POST',
                url: 'ajax.php',
                data: { numPrimes: numPrimes, lastDigit: lastDigit },
                success: function (data) {
                    console.log('Ajax success function ran.'); // Ezt a sort add hozzá
                    $('#loading').hide();
                    $('#results').html(data);
                }
            });
        }
    });

    $('#results').on('click', '.result', function () {
        $('.result').not(this).remove();
    });
});
