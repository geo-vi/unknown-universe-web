<script src="<?= PROJECT_HTTP_ROOT ?>resources/js/payment.js"></script>
<script>
    $(document).ready(function () {
        new payment(
            <?=$System->User->__get('USER_ID')?>,
            <?=$System->User->__get('PLAYER_ID')?>
        );
    });
</script>

<div class="payment-container">
    <div class="col-xs-3 settings-menu-container">
        <div class="menu-header">
            <h1>Payment</h1>
        </div>
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#packages" aria-controls="packages" role="tab" data-toggle="tab">
                    Packages
                </a>
            </li>
            <li role="presentation">
                <a href="#uridium" aria-controls="uridium" role="tab" data-toggle="tab">
                    Uridium
                </a>
            </li>
            <li role="presentation">
                <a href="#vouchers" aria-controls="support" role="tab" data-toggle="tab">
                    Vouchers
                </a>
            </li>
            <li role="presentation">
                <a href="#logs" aria-controls="logs" role="tab" data-toggle="tab">
                    Logs
                </a>
            </li>
        </ul>
    </div>
    <div class="col-xs-9 settings-content">
        <div class="settings-header">
            <h3 class="settings-username pull-right">welcome, <?= $System->User->__get('PLAYER_NAME') ?>!</h3>
        </div>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="packages">
                <div id="premium-package" class="card card-price">
                    <div class="card-img">
                        <a href="#">
                            <img src="https://cdn.discordapp.com/attachments/497385960816771082/559112711741505539/unknown.png" class="img-responsive">
                            <div class="card-caption">
                                <span class="h2">Premium Package</span>
                                <p>Absolute advantage for low price</p>
                            </div>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="lead">So many choices.</div>
                        <ul class="details">
                            <li>Half the cooldown time.</li>
                            <li>Secondary slotbar.</li>
                            <li>Free repairs.</li>
                            <li>-20% SHOP Discount</li>
                            <li>PET FREE REPAIR</li>
                        </ul>
                        <table class="table">
                            <tr><th></th><th>Price</th><th>Addon</th></tr>
                            <tr><td>Monthly</td><td class="price">6.99€</td><td class="note">Pure premium</td></tr>
                            <tr><td>Boosters addition</td><td class="price">15,00€</td><td class="note">Choice of 2 boosters</td></tr>
                        </table>
                        <a href="#" class="btn btn-primary btn-lg btn-block buy-now">
                            Buy now <span class="glyphicon glyphicon-triangle-right"></span>
                        </a>
                    </div>
                </div>
                <div id="booster-package" class="card card-price">
                    <div class="card-body">
                        <div class="price">5.00€ / week</div>
                        <div class="lead">Bonus Box Doubler</div>
                        <p class="details">Doubles the amount of reward from boxes.</p>
                        <a href="#" class="btn btn-primary btn-lg btn-block buy-now">
                            Buy now <span class="glyphicon glyphicon-triangle-right"></span>
                        </a>
                    </div>
                </div>
                <div id="booster-package" class="card card-price">
                    <div class="card-body">
                        <div class="price">5.00€ / week</div>
                        <div class="lead">50% MORE EP AND HONOR</div>
                        <p class="details">Both boosters for 50% more experience points and 50% more honor points from rewards.</p>
                        <a href="#" class="btn btn-primary btn-lg btn-block buy-now">
                            Buy now <span class="glyphicon glyphicon-triangle-right"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="uridium">
                <div id="uridium-card" class="card card-price">
                    <div class="card-body">
                        <div class="price" contenteditable="true">0.01€</div>
                        <div id="uridium-amount" class="lead">275 Uridium</div>
                        <p class="details">Buy the amount Uridium for your needs!</p>
                        <a href="#" class="btn btn-primary btn-lg btn-block buy-now">
                            Buy now <span class="glyphicon glyphicon-triangle-right"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="vouchers">
                <div class="form-group">
                    <label for="voucher">Voucher code:</label>
                    <input type="text" class="form-control" id="voucher">
                </div>
                <div class="form-group recaptcha">
                    <div class="g-recaptcha" data-sitekey="<?= GOOGLE_CLIENT_CAPTCHA_KEY ?>" data-theme="dark"></div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-info form-control" value="Submit Code">
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="logs">
            </div>
        </div>
    </div>
</div>