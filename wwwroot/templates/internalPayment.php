<script src="<?= PROJECT_HTTP_ROOT ?>resources/js/galaxygate.js"></script>
<script>
    $(document).ready(function () {
        new galaxygate(
            <?=$System->User->__get('USER_ID')?>,
            <?=$System->User->__get('PLAYER_ID')?>,
            '<?=base64_encode($System->Server['SERVER_IP'])?>',
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
                <a href="#dashboard" aria-controls="dashboard" role="tab" data-toggle="tab">
                    Packages
                </a>
            </li>
            <li role="presentation">
                <a href="#vouchers" aria-controls="support" role="tab" data-toggle="tab">
                    Vouchers
                </a>
            </li>
            <li role="presentation">
                <a href="#account" aria-controls="account" role="tab" data-toggle="tab">
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
            <div role="tabpanel" class="tab-pane active" id="dashboard">

            </div>
            <div role="tabpanel" class="tab-pane" id="vouchers">
                <div class="form-group">
                    <label for="voucher">Voucher code:</label>
                    <input type="text" class="form-control" id="voucher">
                </div>
                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="<?= GOOGLE_CLIENT_CAPTCHA_KEY ?>" data-theme="dark"></div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-info form-control" value="Submit Code">
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="account">
            </div>
        </div>
    </div>
</div>