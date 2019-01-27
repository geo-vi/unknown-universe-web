<div id="extBg">
    <div id="logo"></div>
    <div class="login-form-wrapper">
        <nav>
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li role="presentation" class="active"><a href="#login-container" aria-controls="login-container"
                                                          role="tab"
                                                          data-toggle="tab"><?= $System->__('TEXT_LOGIN') ?></a></li>
                <li role="presentation"><a href="#sign_up-container" aria-controls="sign_up-container" role="tab"
                                           data-toggle="tab"><?= $System->__('TEXT_REGISTER') ?></a></li>
            </ul>
        </nav>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="login-container">
                <form class="login-form" method="post" action="login.php">
                    <input type="hidden" name="login" value="true">
                    <input type="text" id="loginUsername" name="loginUsername" class="form-input"
                           placeholder="<?= $System->__('BODY_TEXT_USERNAME') ?>" required autofocus>
                    <input type="password" id="loginPassword" name="loginPassword" class="form-input"
                           placeholder="<?= $System->__('BODY_TEXT_PASSWORD') ?>" required>

                    <button class="form-button" type="submit">Login</button>
                    <a href="#"><?= $System->__('BUTTON_FORGOT_PW'); ?></a>
                </form>
            </div>
            <div role="tabpanel" class="tab-pane" id="sign_up-container">
                <script>
                    $(document).ready(function () {
                        $(".register-form > input.form-button").click(function (event) {
                            $.ajax({
                                type: "POST",
                                url: 'register.php',
                                data: $(this).parent().serialize(),
                                success: function (resultData) {
                                    console.log(resultData);
                                    if (resultData.error) {
                                        grecaptcha.reset();
                                        swal('Error!', resultData.error_msg, 'error');
                                    } else {
                                        swal('Success!', resultData.msg, 'success');
                                    }
                                }
                            });
                        });
                    });
                </script>
                <form class="register-form" method="post">
                    <input type="hidden" name="register" value="true">
                    <input type="text" id="registerUsername" name="registerUsername" class="form-input"
                           placeholder="<?= $System->__('BODY_TEXT_USERNAME') ?>" required autofocus>
                    <input type="password" id="registerPassword" name="registerPassword" class="form-input"
                           placeholder="<?= $System->__('BODY_TEXT_PASSWORD') ?>" required>
                    <input type="email" id="registerEmail" class="form-input" name="registerEmail"
                           placeholder="<?= $System->__('BODY_TEXT_EMAIL') ?>" required>
                    <?php
                    if (NEED_INVITATION) {
                        ?>
                        <input type="text" id="registerInvation" class="form-input" name="registerInvation"
                               placeholder="<?= $System->__('BODY_TEXT_INVITATIONCODE') ?>" required>
                        <?php
                    }
                    ?>
                    <div class="g-recaptcha" data-sitekey="<?= GOOGLE_CLIENT_CAPTCHA_KEY ?>"></div>
                    <p class="text-xs-center">* By <?= $System->__('BODY_TEXT_TOC_NOTE') ?></p>
                    <input type="button" class="form-button" value="Register">
                </form>
            </div>
        </div>
    </div>
</div>