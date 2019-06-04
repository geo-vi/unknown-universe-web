<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="audience" content="all">
    <meta name="expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="{{ env('APP_NAME', 'Not Configured') }}" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index, follow" />
    <meta name="language" content="EN" />
    <meta name="reply-to" content="support@univ3rse.com">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <title>{{ env('APP_NAME', 'Not Configured') }}</title>

    <!-- Include Styles -->
    <link rel="stylesheet" href="{{ asset('less/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

    <!-- Include JS -->
    <script src="{{ asset('js/jQuery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jQuery/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jQuery/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('js/jQuery/jquery.serializeObject.js') }}"></script>
    <script src="{{ asset('js/jQuery/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/jQuery/visibility.min.js') }}"></script>
    <script src="{{ asset('js/jQuery/jquery.tools.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<div id="extBg">
    <div id="logo"></div>
    <div class="login-form-wrapper">
        <nav>
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li role="presentation" class="active">
                    <a href="#login-container" aria-controls="login-container" role="tab" data-toggle="tab">
                        {{ __('TEXT_LOGIN') }}
                    </a>
                </li>
                <li role="presentation">
                    <a href="#sign_up-container" aria-controls="sign_up-container" role="tab" data-toggle="tab">
                        {{ __('TEXT_REGISTER') }}
                    </a>
                </li>
            </ul>
        </nav>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="login-container">
                <form class="login-form" method="post" action="../login.php">
                    <form class="login-form" method="post" >
                        <input type="text" id="loginUsername" name="username" class="form-input"
                               placeholder="{{ __('BODY_TEXT_USERNAME') }}" required autofocus>
                        <input type="password" id="loginPassword" name="password" class="form-input"
                               placeholder="{{ __('BODY_TEXT_PASSWORD') }}" required>

                        <button class="form-button" type="submit">Login</button>
                        <a href="/externalRecovery">{{ __('BUTTON_FORGOT_PW') }}</a>
                    </form>
            </div>
            <div role="tabpanel" class="tab-pane" id="sign_up-container">
                <form class="register-form" method="post">
                    <input type="text" id="registerUsername" name="username" class="form-input"
                           placeholder="{{ __('BODY_TEXT_USERNAME') }}" required autofocus>
                    <input type="password" id="registerPassword" name="password" class="form-input"
                           placeholder="{{ __('BODY_TEXT_PASSWORD') }}" required>
                    <input type="email" id="registerEmail" class="form-input" name="email"
                           placeholder="{{ __('BODY_TEXT_EMAIL') }}" required>

                    <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_CLIENT_CAPTCHA_KEY')  }}" data-theme="dark"></div>
                    <p class="text-xs-center">* {{ __('BODY_TEXT_TOC_NOTE') }}</p>
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
