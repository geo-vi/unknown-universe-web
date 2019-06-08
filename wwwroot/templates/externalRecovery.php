<div id="logo"></div>

<div class="login-form-wrapper">
    <nav>
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="active">
                <a href="#account-recovery" aria-controls="account-recovery" role="tab" data-toggle="tab">
                    Account Recovery
                </a>
            </li>
        </ul>
    </nav>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="account-recovery">
            <form class="recovery-form" method="post">
                <input type="text"
                       id="recoveryUsername"
                       name="username"
                       class="form-input"
                       placeholder="Username"
                       required
                       autofocus>
                <input type="email"
                       id="recoveryEmail"
                       class="form-input"
                       name="email"
                       placeholder="Email"
                       required>
                <div class="g-recaptcha" data-sitekey="<?= GOOGLE_CLIENT_CAPTCHA_KEY ?>" data-theme="dark"></div>
                <input type="button" class="form-button" value="Recover my Account">
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".recovery-form > input.form-button").click(function () {
            sendCoreRequest(
                'session',
                'recover',
                $(this).parent().serializeObject(),
                null,
                grecaptcha.reset(),
            );
        });
    });
</script>
