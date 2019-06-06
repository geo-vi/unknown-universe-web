@include('layouts._master')

<body class="external">

<main class="container">
    <div id="extBg">
        <div id="logo"></div>
        <div class="login-form-wrapper">
            <nav>
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#login-container" aria-controls="login-container" role="tab" data-toggle="tab">{{ __('pages.auth.login') }}</a>
                    </li>
                    <li role="presentation">
                        <a href="#sign_up-container" aria-controls="sign_up-container" role="tab" data-toggle="tab">{{ __('pages.auth.register') }}</a>
                    </li>
                </ul>
            </nav>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="login-container">
                    <form class="login-form" method="post" action="../login.php">
                        <form class="login-form" method="post" >
                            <input type="text" id="loginUsername" name="username" class="form-input"
                                   placeholder="{{ __('pages.auth.username') }}" required autofocus>
                            <input type="password" id="loginPassword" name="password" class="form-input"
                                   placeholder="{{ __('pages.auth.password') }}" required>

                            <button class="form-button" type="submit">{{ __('pages.auth.login') }}</button>
                            <a href="/externalRecovery">{{ __('pages.auth.forgot_password') }}  </a>
                        </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="sign_up-container">
                    <form class="register-form" method="post">
                        <input type="text" id="registerUsername" name="username" class="form-input"
                               placeholder="{{ __('pages.auth.username') }}" required autofocus>
                        <input type="password" id="registerPassword" name="password" class="form-input"
                               placeholder="{{ __('pages.auth.password') }}" required>
                        <input type="email" id="registerEmail" class="form-input" name="email"
                               placeholder="{{ __('pages.auth.email') }}" required>
                        <div class="g-recaptcha" data-sitekey="6LcXBw8UAAAAAL9dV2vHcUZ7ZgfDDQFotIYV1Ivw" data-theme="dark"></div>
                        <p class="text-xs-center"></p>
                        <input type="button" class="form-button" value="{{ __('pages.auth.register') }}">
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
</main>


@include('layouts.epvp')
</body>

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

    });
</script>
