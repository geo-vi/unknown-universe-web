class payment
{
    constructor(USER_ID, PLAYER_ID) {
        payment.USER_ID = USER_ID;
        payment.PLAYER_ID = PLAYER_ID;
        payment.render()
    }

    static render() {
        $('#uridium-card .buy-now').click(function() {
            $("#gateway").modal();
            let finalPrice = parseFloat($(this).data('total'));
            $('#due-amount').html(finalPrice.toLocaleString(window.document.documentElement.lang) + '€');
            $('#buying-item').html((finalPrice * 27500).toLocaleString(window.document.documentElement.lang) + ' Uridium');
        });

        $('#uridium-card .price').focus(function() {
            $(this).data("initialText", $(this).html());
            let finalPrice = parseFloat($(this).html());
            $(this).html(finalPrice.toLocaleString(window.document.documentElement.lang) + '€');
            $('#uridium-amount').html((finalPrice * 27500).toLocaleString(window.document.documentElement.lang) + ' Uridium');
            $('#uridium-card .buy-now').data('total', finalPrice);
        })
        // When you leave an item...
        .blur(function() {
            // ...if content is different...
            if ($(this).data("initialText") !== $(this).html()) {
                let finalPrice = parseFloat($(this).html());
                $(this).html(finalPrice.toLocaleString(window.document.documentElement.lang) + '€');
                $('#uridium-amount').html((finalPrice * 27500).toLocaleString(window.document.documentElement.lang) + ' Uridium');
                $('#uridium-card .buy-now').data('total', finalPrice);
            }
        }).keypress(function(e) {
            if (isNaN(String.fromCharCode(e.which) && e.which !== '.')) e.preventDefault();
        });

        paypal.Buttons({
            style: {
                color:  'blue',
                shape:  'pill',
                label:  'pay',
                height: 40
            },

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '0.01',
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    $("#gateway").modal('hide');
                    swal('Thank you for your donation, ' + details.payer.name.given_name + '!', 'Please ensure you received everything you ordered.', 'success');
                });
            },

            onCancel: function (data) {
                $("#gateway").modal('hide');
                swal('Transaction have been canceled', '', 'warning');
            },

            onError: function (err) {
                $("#gateway").modal('hide');
                swal('Error have occurred!', "Please contact Heisenberg on the game's Discord and report the issue. Additionally you can also try another payment method. Error can be found in your console.", 'error');
                console.log(err);
            }
        }).render('#paypal-button-container');
    }
}