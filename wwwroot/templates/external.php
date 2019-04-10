<div id="extBg">
    <div id="logo"></div>
    <div class="login-form-wrapper">
        <nav>
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li role="presentation" class="active">
                    <a href="#login-container" aria-controls="login-container" role="tab" data-toggle="tab">
                        <?= $System->__('TEXT_LOGIN') ?>
                    </a>
                </li>
                <li role="presentation">
                    <a href="#sign_up-container" aria-controls="sign_up-container" role="tab" data-toggle="tab">
                        <?= $System->__('TEXT_REGISTER') ?>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="login-container">
                <form class="login-form" method="post" action="../login.php">
                <form class="login-form" method="post" >
                    <input type="text" id="loginUsername" name="username" class="form-input"
                           placeholder="<?= $System->__('BODY_TEXT_USERNAME') ?>" required autofocus>
                    <input type="password" id="loginPassword" name="password" class="form-input"
                           placeholder="<?= $System->__('BODY_TEXT_PASSWORD') ?>" required>

                    <button class="form-button" type="submit">Login</button>
                    <a href="/externalRecovery"><?= $System->__('BUTTON_FORGOT_PW'); ?></a>
                </form>
            </div>
            <div role="tabpanel" class="tab-pane" id="sign_up-container">
                <form class="register-form" method="post">
                    <input type="text" id="registerUsername" name="username" class="form-input"
                           placeholder="<?= $System->__('BODY_TEXT_USERNAME') ?>" required autofocus>
                    <input type="password" id="registerPassword" name="password" class="form-input"
                           placeholder="<?= $System->__('BODY_TEXT_PASSWORD') ?>" required>
                    <input type="email" id="registerEmail" class="form-input" name="email"
                           placeholder="<?= $System->__('BODY_TEXT_EMAIL') ?>" required>
                    <?php
                    if (NEED_INVITATION) {
                        ?>
                        <input type="text" id="registerInvation" class="form-input" name="invitationCode"
                               placeholder="<?= $System->__('BODY_TEXT_INVITATIONCODE') ?>" required>
                        <?php
                    }
                    ?>
                    <div class="g-recaptcha" data-sitekey="<?= GOOGLE_CLIENT_CAPTCHA_KEY ?>" data-theme="dark"></div>
                    <p class="text-xs-center">* <?= $System->__('BODY_TEXT_TOC_NOTE') ?></p>
                    <input type="button" class="form-button" value="Register">
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {
        $(".register-form > input.form-button").click(function () {
            sendRegisterRequest($(this).parent().serializeObject(), grecaptcha.reset());
        });
    });

</script>
