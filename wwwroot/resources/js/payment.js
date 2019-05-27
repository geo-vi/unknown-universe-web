class payment
{
    constructor(USER_ID, PLAYER_ID) {
        payment.USER_ID = USER_ID;
        payment.PLAYER_ID = PLAYER_ID;
        payment.render()
    }

    static render() {
        $('#uridium-card .buy-now').click(function() {
           console.log('??');
        });

        $('#uridium-card .price').focus(function() {
            $(this).data("initialText", $(this).html());
            let finalPrice = parseFloat($(this).html());
            $(this).html(finalPrice.toLocaleString(window.document.documentElement.lang) + '€');
            $('#uridium-amount').html((finalPrice * 27500).toLocaleString(window.document.documentElement.lang) + ' Uridium');
        })
        // When you leave an item...
        .blur(function() {
            // ...if content is different...
            if ($(this).data("initialText") !== $(this).html()) {
                let finalPrice = parseFloat($(this).html());
                $(this).html(finalPrice.toLocaleString(window.document.documentElement.lang) + '€');
                $('#uridium-amount').html((finalPrice * 27500).toLocaleString(window.document.documentElement.lang) + ' Uridium');
            }
        }).keypress(function(e) {
            if (isNaN(String.fromCharCode(e.which) && e.which !== '.')) e.preventDefault();
        });
    }
}