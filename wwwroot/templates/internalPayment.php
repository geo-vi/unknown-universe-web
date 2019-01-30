<?php
if (isset($_POST['action']) && $_POST['action'] == "redeem" && isset($_POST['sub_action']) && $_POST['sub_action'] == "redeem_code") {
    $System->User->redeem($_POST['code'], $_POST['userid']);
}
?>
<div class="container">
    <div class="auction col-md-12 aside text-center" style="padding:15px;">
        <button style="display:none;" class="uu_button2" onclick="payment('banking');">BANKING</button>
        <button style="display:none;" class="uu_button2" onclick="payment('server_auction');">BALANCE</button>
        <button style="display:none;" class="uu_button2" onclick="payment('subscription');">SUBSCRIPTION</button>
        <button class="uu_button2" onclick="payment('vouchers');">VOUCHERS</button>
    </div>

</div>

<br/>

<main class="container">
    <div id="tabs-container">
        <div id="tabs-content" style="height:100%;">

            <div id="banking" class="none" style="display:none;">
                <div class="row" style="margin-left:0; margin-right:0;">
                    <h3><b>Banking</b></h3>
                    <div style="margin-left:300px;width:300px;height:100px;border: 2px solid rgba(204, 204, 204, 0.51);">
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="custom" value="<?php echo $_SESSION['UserUID']; ?>">
                            <input type="hidden" name="hosted_button_id" value="GZ5329BLZ28GG">
                            <table>
                                <tr>
                                    <td><input type="hidden" name="on0" value="DP"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <select style="background-color:transparent;color:white;" name="os0" aria-label="Uridium">
                                            <option style="background-color:transparent;color:black;" value="5000">
                                                5,000 Uridium for €1.99 EUR
                                            </option>
                                            <option style="background-color:transparent;color:black;" value="15000">
                                                15,000 Uridium for €4.99 EUR
                                            </option>
                                            <option style="background-color:transparent;color:black;" value="30000">
                                                30,000 Uridium for €9.99 EUR
                                            </option>
                                            <option style="background-color:transparent;color:black;" value="75000">
                                                75,000 Uridium for €24.99 EUR
                                            </option>
                                            <option style="background-color:transparent;color:black;"
                                                    value="150000">150,000 Uridium for €49.99 EUR
                                            </option>
                                            <option style="background-color:transparent;color:black;"
                                                    value="330000">330,000 Uridium for €99.99 EUR
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <input type="hidden" name="currency_code" value="EUR">
                            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif"
                                   name="submit" alt="PayPal - The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif"
                                 width="1" height="1">
                        </form>
                    </div>
                </div>
            </div>

            <div id="server_auction" class="none" style="display:none;">
            </div>

            <div id="subscription" class="none" style="display:none;">
            </div>

            <div id="vouchers" class="none" style="display:block;">
                <div class="row" style="margin-left:0; margin-right:0;">
                    <form action="" method="POST">
                        <input type="hidden" name="sub_action" value="redeem_code">
                        <input type="hidden" name="action" value="redeem">
                        <input type="hidden" name="userid" value="<?= $System->User->USER_ID ?>">
                        <h3><b>Voucher</b> Code</h3>
                        <div class="col-md-8 aside"
                             style=" overflow: auto; box-sizing: border-box;width:100%;height:300px;">
                            <div class="item_dark">
                                <label style="margin-left:380px;" for="voucherCode">Please enter your voucher code here
                                    to redeem
                                    it:</label>
                                <input type="text" name="code" id="voucherCode" style="margin-left:390px;"
                                       class="ii_text" value="">
                            </div>
                            <?php if ($System->User->hasPremium()) { ?>
                                <input class="uu_button" type="submit" value="Redeem">
                                <a class="uu_button3" onclick="log('logbook');">Logbook</a>
                                <a class="uu_button4" onclick="log('codes');">Codes</a>
                            <?php } else { ?>
                                <input class="uu_button" type="submit" value="Redeem">
                                <a class="uu_button3" onclick="log('logbook');">Logbook</a>
                                <a class="uu_button4" onclick="log('codes');">Codes</a>
                            <?php } ?>
                        </div>
                    </form>

                    <div id="logbook" class="col-xs-6" style="display:none">
                        <div id="logbook-entries" class="custom-scroll" dir="rtl">
                            <?php
                            $logs = $System->logging->getLogs(
                                $System->User->__get('USER_ID'),
                                $System->User->__get('PLAYER_ID'),
                                $System->User->__get('SERVER_DB'),
                                LogType::VOUCHER
                            );
                            foreach ($logs as $log) {
                                ?>
                                <div class="log-entry">
                                    <div class="log-entry-date bold"><?= $log['LOG_DATE'] ?></div>
                                    <div class="log-entry-body"><?= $log['LOG_DESCRIPTION'] ?></div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>

                    <div id="codes" class="col-xs-6" style="display:none;">
                        <div id="logbook-entries" class="custom-scroll">
                            <table class="codes" style="width:100%;">
                                <tr>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Reward</th>
                                    <th>Available</th>
                                </tr>
                                <?php
                                $codes = $System->User->getCodes();
                                foreach ($codes as $code) {
                                    $r = $System->Shop->getItemInfo($code['REWARD']);
                                    $i = $System->User->getUserCode($code['CODE']);
                                    switch ($i) {
                                        case '1':
                                            $i = "<span style='color:red'>Code already used</span>";
                                            break;
                                        case '';
                                            $i = "<span style='color:lawngreen'>Code available</span>";
                                            break;
                                    }
                                    ?>
                                    <tr>
                                        <td style="color:rgba(255,127,80, 0.8)"><?= $code['CODE'] ?></td>
                                        <td style="color:rgba(255,215,0, 0.8)"><?= $code['CODE_DESC'] ?></td>
                                        <td style="color:rgba(255,215,0, 1)"><?php echo 'x' . $code['AMOUNT'] . ' ' . $r[0]['NAME']; ?></td>
                                        <td><?php echo $i ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    function payment(id) {
        const list = document.getElementsByClassName("none");
        for (let i = 0; i < list.length; i++) {
            list[i].style.display = 'none';
        }
        const e = document.getElementById(id);
        if (e.style.display === 'block') {
            e.style.display = 'none';
        } else {
            e.style.display = 'block';
        }
    }

    function log(id) {
        const e = document.getElementById(id);
        const d = document.getElementById('logbook');
        const c = document.getElementById('codes');
        if (e.style.display === 'block') {
            e.style.display = 'none';
        } else {
            if (d.style.display === 'block') {
                d.style.display = 'none';
            }
            if (c.style.display === 'block') {
                c.style.display = 'none';
            }
            e.style.display = 'block';
        }
    }
</script>