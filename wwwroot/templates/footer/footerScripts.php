<script>
    $(document).ready(function () {
        $(window).on("load", function () {
            $('.chosen-select').chosen();
            $(".custom-scroll").mCustomScrollbar({
                 axis: "y",
                 scrollbarPosition: "inside",
                 theme: "light-3"
            });
            $(".custom-scroll-x").mCustomScrollbar({
               axis: "x",
               scrollbarPosition: "inside",
               alwaysShowScrollbar: 1,
               advanced: {
                   autoExpandHorizontalScroll: true
               },
               theme: "light-3"
            });
        });

        <?php

        if ($System->routing->login_req)
        {
        ?>

        var tabOpen = !Visibility.hidden();
        if (tabOpen) {
            updateUser();
        }
        Visibility.change(function (e, state) {
            if (state === 'visible') {
                tabOpen = true;
                updateUser();
            } else {
                tabOpen = false;
            }

            if (!tabOpen) {
                document.title = '<?=WEBSITE_TITLE?> - Inactive';
            } else {
                document.title = '<?=WEBSITE_TITLE?>';
            }
        });

        function updateUser(data = null) {
            if (!tabOpen) return;
            let TIMESTAMP = 1;
            if (data !== null) {
                if (data.error) {
                    setTimeout(updateUser(), 2000);
                    return;
                }
                $('.user-stats .uri').text('URI ' + data.URIDIUM);
                $('.user-stats .cre').text('CRE ' + data.CREDITS);
                $('.user-stats .lvl').text('LVL ' + data.LVL);
                $('.user-stats .exp').text('EXP ' + data.EXP);
                $('.user-stats .hon').text('HON ' + data.HONOR);
                TIMESTAMP = data.TIMESTAMP;
            }

            let request = {
                'action': 'refresh',
                'handler': 'user',
                'params': JSON.stringify({ "TIMESTAMP": TIMESTAMP })
            };
            $.ajax({
               type: "POST",
               url: './core/ajax/ajax.php',
               data: request,
               cache: false,
               async: true,
               xhrFields: {
                   withCredentials: true
               },
               success: function (resultData) {
                   updateUser(resultData);
               }
           }).fail(function () {
                updateUser();
            });
        }

        <?php
        }
        ?>
    });
</script>
