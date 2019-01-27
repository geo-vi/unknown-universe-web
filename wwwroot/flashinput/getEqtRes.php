<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <title>Darkorbit | Pełna przygód i akcji kosmiczna gra na przeglądarkę.</title>
    <meta http-equiv="X-UA-Compatible" content="IE=9"/>

    <meta name="keywords"
          content="Gry na przeglądarkę, DarkOrbit, kosmiczna strzelanka, gry, games, darmowe, gry online, gra akcji, strzelanka"/>
    <meta name="robots" content="">

    <meta http-equiv="Content-Language" content="at, de, ch  ">
    <meta name="language" content="polski, pl, at, ch    ">
    <meta name="Content-Type" content="text/html; charset=utf-8  ">
    <meta http-equiv="content-type" content="text/html; charset=utf-8  ">
    <meta name="author" content="Bigpoint GmbH  ">
    <meta name="publisher" content="Bigpoint GmbH  ">
    <meta name="revisit-after" content="10 dni  ">
    <meta name="page-topic" content="Czas wolny, zabawa  ">
    <meta name="reply-to" content="webmaster@darkorbit.com  ">
    <meta name="distribution" content="globalne  ">
    <meta name="company" content="Bigpoint GmbH  ">
    <meta name="verify-v1" content="njd00njcbI0Oz5wKmO0nGZcd04JLO3s7Fsx4YvU7CsU="/>
    <link rel="canonical" href="http://www.darkorbit.pl/"/>
    <meta property="og:title" content="DarkOrbit"/>
    <meta property="og:type" content="game"/>
    <meta property="og:url" content="http://darkorbit.bigpoint.com?aid=2640"/>
    <meta property="og:image"
          content="http://darkorbit-22.level3.bpcdn.net/do_img/global/fb_icon.jpg?__cv=3474204cf94bfb7665556ed92f602200"/>
    <meta property="og:site_name" content="DarkOrbit"/>
    <meta property="fb:admins" content="100002458879178"/>
    <meta property="fb:app_id" content="364160817714"/>
    <meta property="og:description"
          content="DarkOrbit will keep you coming back for more! Explore the infinite expanses of outer space in one of the best browser-based, action-packed space shooters ever made. Fly into the face of danger and go where nobody has ever gone before - either on your own or with others. Set a course to discover new galaxies and new lifeforms."/>
    <meta property="og:locale" content="pl"/>
    <meta property="og:locale:alternate" content="pl"/>
    <link rel="SHORTCUT ICON" href="http://darkorbit-22.level3.bpcdn.net/favicon.ico" type="image/x-icon">
    <link href="http://sharedservices.bpcdn.net/bgc/css/bgc-0.10.8.min.css?0001" rel="stylesheet" type="text/css"
          media="screen"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"
            charset="UTF-8"></script>
    <script type="text/javascript" src="http://sharedservices.bpcdn.net/bgc/js/bgc-0.10.8.min.js?0001"
            charset="UTF-8"></script>
    <script type="text/javascript" src="http://www.google.com/recaptcha/api/js/recaptcha_ajax.js"
            charset="UTF-8"></script>


    <link rel="stylesheet" media="all"
          href="http://darkorbit-22.level3.bpcdn.net/css/cdn/bgc.css?__cv=4ad64e77410f2252615aadee071b9100"/>
    <link rel="stylesheet" media="all"
          href="http://darkorbit-22.level3.bpcdn.net/css/cdn/externalHomeNew.css?__cv=eee2e1b1c7943918defa3430ce3bc200"/>
    <link rel="stylesheet" media="all"
          href="http://darkorbit-22.level3.bpcdn.net/css/cdn/jQuery/colorbox-1.3.15.css?__cv=da644e3772f52496bf8edc1724b08c00"/>
    <script type="text/javascript"
            src="http://darkorbit-22.level3.bpcdn.net/js/jQuery/jquery-1.4.4.min.js?__cv=73a9c334c5ca71d70d092b42064f6400"></script>
    <script type="text/javascript"
            src="http://darkorbit-22.level3.bpcdn.net/js/jQuery/colorbox-1.3.15.js?__cv=a194fc92be610b91fcfb885968691800"></script>
    <script type="text/javascript"
            src="http://darkorbit-22.level3.bpcdn.net/sharedpages/static/plugin/social/slayer/js/v1/slayer-min.js"></script>
    <script language="javascript">
        var CDN = "http://darkorbit-22.level3.bpcdn.net/";
    </script>
    <script type="text/javascript"
            src="http://darkorbit-22.level3.bpcdn.net/js/externalHomeNew.js?__cv=270288210fead54b7f01782a22c39d00"></script>

    <script type="text/javascript">
        // remote scripting library
        // (c) copyright 2005 modernmethod, inc
        var sajax_debug_mode = false;
        var sajax_request_type = "POST";
        var sajax_target_id = "";
        var sajax_failure_redirect = "";

        function sajax_debug(text) {
            if (sajax_debug_mode)
                alert(text);
        }

        function sajax_init_object() {
            sajax_debug("sajax_init_object() called..")

            var A;

            var msxmlhttp = new Array(
                'Msxml2.XMLHTTP.5.0',
                'Msxml2.XMLHTTP.4.0',
                'Msxml2.XMLHTTP.3.0',
                'Msxml2.XMLHTTP',
                'Microsoft.XMLHTTP');
            for (var i = 0; i < msxmlhttp.length; i++) {
                try {
                    A = new ActiveXObject(msxmlhttp[i]);
                } catch (e) {
                    A = null;
                }
            }

            if (!A && typeof XMLHttpRequest != "undefined")
                A = new XMLHttpRequest();
            if (!A)
                sajax_debug("Could not create connection object.");
            return A;
        }

        var sajax_requests = new Array();

        function sajax_cancel() {
            for (var i = 0; i < sajax_requests.length; i++)
                sajax_requests[i].abort();
        }

        function sajax_do_call(func_name, args) {
            var i, x, n;
            var uri;
            var post_data;
            var target_id;

            sajax_debug("in sajax_do_call().." + sajax_request_type + "/" + sajax_target_id);
            target_id = sajax_target_id;
            if (typeof(sajax_request_type) == "undefined" || sajax_request_type == "")
                sajax_request_type = "GET";

            uri = "/sajaxAPI.php?sid=2e79d41053cd80ba2cef207b4357dfee";
            if (sajax_request_type == "GET") {

                if (uri.indexOf("?") == -1)
                    uri += "?rs=" + escape(func_name);
                else
                    uri += "&rs=" + escape(func_name);
                uri += "&rst=" + escape(sajax_target_id);
                uri += "&rsrnd=" + new Date().getTime();

                for (i = 0; i < args.length - 1; i++)
                    uri += "&rsargs[]=" + escape(args[i]);

                post_data = null;
            }
            else if (sajax_request_type == "POST") {
                post_data = "rs=" + escape(func_name);
                post_data += "&rst=" + escape(sajax_target_id);
                post_data += "&rsrnd=" + new Date().getTime();

                for (i = 0; i < args.length - 1; i++)
                    post_data = post_data + "&rsargs[]=" + escape(args[i]);
            }
            else {
                alert("Illegal request type: " + sajax_request_type);
            }

            x = sajax_init_object();
            if (x == null) {
                if (sajax_failure_redirect != "") {
                    location.href = sajax_failure_redirect;
                    return false;
                } else {
                    sajax_debug("NULL sajax object for user agent:\n" + navigator.userAgent);
                    return false;
                }
            } else {
                x.open(sajax_request_type, uri, true);
                // window.open(uri);

                sajax_requests[sajax_requests.length] = x;

                if (sajax_request_type == "POST") {
                    x.setRequestHeader("Method", "POST " + uri + " HTTP/1.1");
                    x.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                }

                x.onreadystatechange = function () {
                    if (x.readyState != 4)
                        return;

                    sajax_debug("received " + x.responseText);

                    var status;
                    var data;
                    var txt = x.responseText.replace(/^\s*|\s*$/g, "");
                    status = txt.charAt(0);
                    data = txt.substring(2);

                    if (status == "") {
                        // let's just assume this is a pre-response bailout and let it slide for now
                    } else if (status == "-")
                        alert("Error: " + data);
                    else {
                        if (target_id != "")
                            document.getElementById(target_id).innerHTML = eval(data);
                        else {
                            try {
                                var callback;
                                var extra_data = false;
                                if (typeof args[args.length - 1] == "object") {
                                    callback = args[args.length - 1].callback;
                                    extra_data = args[args.length - 1].extra_data;
                                } else {
                                    callback = args[args.length - 1];
                                }
                                callback(eval(data), extra_data);
                            } catch (e) {
                                sajax_debug("Caught error " + e + ": Could not eval " + data);
                            }
                        }
                    }
                }
            }

            sajax_debug(func_name + " uri = " + uri + "/post = " + post_data);
            x.send(post_data);
            sajax_debug(func_name + " waiting..");
            delete x;
            return true;
        }


        // wrapper for searchUser
        function x_searchUser() {
            sajax_do_call("searchUser",
                x_searchUser.arguments);
        }


        // wrapper for getInstances
        function x_getInstances() {
            sajax_do_call("getInstances",
                x_getInstances.arguments);
        }


        // wrapper for updateAutoUpdate
        function x_updateAutoUpdate() {
            sajax_do_call("updateAutoUpdate",
                x_updateAutoUpdate.arguments);
        }


        // wrapper for changeBookmarkStatus
        function x_changeBookmarkStatus() {
            sajax_do_call("changeBookmarkStatus",
                x_changeBookmarkStatus.arguments);
        }


        // wrapper for closeNewsUpdate
        function x_closeNewsUpdate() {
            sajax_do_call("closeNewsUpdate",
                x_closeNewsUpdate.arguments);
        }


        // wrapper for closeGuestLayer
        function x_closeGuestLayer() {
            sajax_do_call("closeGuestLayer",
                x_closeGuestLayer.arguments);
        }


        // wrapper for changeCash_UK
        function x_changeCash_UK() {
            sajax_do_call("changeCash_UK",
                x_changeCash_UK.arguments);
        }

    </script>
    <script type="text/javascript" charset="UTF-8">
        /* <![CDATA[ */
        try {
            if (undefined == xajax.config) xajax.config = {};
        } catch (e) {
            xajax = {};
            xajax.config = {};
        }
        ;
        xajax.config.requestURI = "xajaxAPI.php?sid=2e79d41053cd80ba2cef207b4357dfee";
        xajax.config.statusMessages = false;
        xajax.config.waitCursor = true;
        xajax.config.version = "xajax 0.5";
        xajax.config.legacy = false;
        xajax.config.defaultMode = "asynchronous";
        xajax.config.defaultMethod = "POST";
        /* ]]> */
    </script>
    <script type="text/javascript"
            src="http://darkorbit-22.level3.bpcdn.net/js/xajax_js/xajax_core.js?__cv=7d18ea9cdeb1f1b391cff64cb943d300"
            charset="UTF-8"></script>
    <script type="text/javascript" charset="UTF-8">
        /* <![CDATA[ */
        window.setTimeout(
            function () {
                var scriptExists = false;
                try {
                    if (xajax.isLoaded) scriptExists = true;
                }
                catch (e) {
                }
                if (!scriptExists) {
                    alert("Error: the xajax Javascript component could not be included. Perhaps the URL is incorrect?\nURL: http://darkorbit-22.level3.bpcdn.net/js/xajax_js/xajax_core.js?__cv=7d18ea9cdeb1f1b391cff64cb943d300");
                }
            }, 2000);
        /* ]]> */
    </script>

    <script type='text/javascript' charset='UTF-8'>
        /* <![CDATA[ */
        xajax_disableTradeLayer = function () {
            return xajax.request({xjxfun: 'disableTradeLayer'}, {parameters: arguments});
        };
        xajax_saveOldClientUsage = function () {
            return xajax.request({xjxfun: 'saveOldClientUsage'}, {parameters: arguments});
        };
        xajax_buySkylabRobot = function () {
            return xajax.request({xjxfun: 'buySkylabRobot'}, {parameters: arguments});
        };
        xajax_skillTreePurchaseSkillReset = function () {
            return xajax.request({xjxfun: 'skillTreePurchaseSkillReset'}, {parameters: arguments});
        };
        xajax_skillTreePurchaseLevelUp = function () {
            return xajax.request({xjxfun: 'skillTreePurchaseLevelUp'}, {parameters: arguments});
        };
        xajax_nanoTechFactoryShowBuff = function () {
            return xajax.request({xjxfun: 'nanoTechFactoryShowBuff'}, {parameters: arguments});
        };
        xajax_nanoTechFactoryShowApis = function () {
            return xajax.request({xjxfun: 'nanoTechFactoryShowApis'}, {parameters: arguments});
        };
        xajax_handleImageUpload = function () {
            return xajax.request({xjxfun: 'handleImageUpload'}, {parameters: arguments});
        };
        xajax_pilotSheet = function () {
            return xajax.request({xjxfun: 'pilotSheet'}, {parameters: arguments});
        };
        xajax_achievement = function () {
            return xajax.request({xjxfun: 'achievement'}, {parameters: arguments});
        };
        xajax_pilotInvite = function () {
            return xajax.request({xjxfun: 'pilotInvite'}, {parameters: arguments});
        };
        xajax_pilotInviteIncentives = function () {
            return xajax.request({xjxfun: 'pilotInviteIncentives'}, {parameters: arguments});
        };
        xajax_externalPPP = function () {
            return xajax.request({xjxfun: 'externalPPP'}, {parameters: arguments});
        };
        xajax_socialInviteDispatch = function () {
            return xajax.request({xjxfun: 'socialInviteDispatch'}, {parameters: arguments});
        };
        xajax_tooltipAjaxHandler = function () {
            return xajax.request({xjxfun: 'tooltipAjaxHandler'}, {parameters: arguments});
        };
        xajax_showHelpNeverAgain = function () {
            return xajax.request({xjxfun: 'showHelpNeverAgain'}, {parameters: arguments});
        };
        xajax_loadUserInfo = function () {
            return xajax.request({xjxfun: 'loadUserInfo'}, {parameters: arguments});
        };
        xajax_switchHangar = function () {
            return xajax.request({xjxfun: 'switchHangar'}, {parameters: arguments});
        };
        xajax_loadHangarInfo = function () {
            return xajax.request({xjxfun: 'loadHangarInfo'}, {parameters: arguments});
        };
        xajax_setHangarSelected = function () {
            return xajax.request({xjxfun: 'setHangarSelected'}, {parameters: arguments});
        };
        xajax_changeHangarName = function () {
            return xajax.request({xjxfun: 'changeHangarName'}, {parameters: arguments});
        };
        xajax_feedbackForm = function () {
            return xajax.request({xjxfun: 'feedbackForm'}, {parameters: arguments});
        };
        xajax_setFeedBackForm = function () {
            return xajax.request({xjxfun: 'setFeedBackForm'}, {parameters: arguments});
        };
        xajax_getCompanionAppCode = function () {
            return xajax.request({xjxfun: 'getCompanionAppCode'}, {parameters: arguments});
        };
        xajax_signupArena = function () {
            return xajax.request({xjxfun: 'signupArena'}, {parameters: arguments});
        };
        xajax_loadAuctionQuantityManager = function () {
            return xajax.request({xjxfun: 'loadAuctionQuantityManager'}, {parameters: arguments});
        };
        xajax_getListOfInstances = function () {
            return xajax.request({xjxfun: 'getListOfInstances'}, {parameters: arguments});
        };
        xajax_loadClanInfo = function () {
            return xajax.request({xjxfun: 'loadClanInfo'}, {parameters: arguments});
        };
        /* ]]> */
    </script>


    <!-- affiliateHeadTag -->
    <script type="text/javascript" language="javascript">
        var lplocaleMEB = "PL";
        var SemTmLocale = "PL";
        var SemTmAid = "1129";
        var SemTmAip = "";
        var SemTmPpid = "22";
        var SemTmCtype = "1";
        var SemTmMid = "67070343";
        var SemTmCountry = "PL";
        var SemTmPid = "87";
        var SemTmUid = "38241327";
        var SemTmAreaID = "external.home";
    </script>
    <link rel="meta" href="http://pl1.darkorbit.bigpoint.com/sharedpages/icra/labels.php" type="application/rdf+xml"
          title="ICRA labels"/>
    <meta http-equiv="pics-Label"
          content='(pics-1.1 "http://www.icra.org/pics/vocabularyv03/" l gen true for "http://pl1.darkorbit.bigpoint.com" r (n 0 s 0 v 0 l 1 oa 0 ob 0 oc 0 od 1 oe 0 of 0 og 0 oh 0 c 1))'/>
    <script type="text/javascript"
            src="/sharedpages/static/plugin/social/slayer/js/v1/pl/slayer-min.js?__cv=d2c07b329a3c3977099373ae35665f00"></script>


    <style>

        .bgc_signup_container_form input.bgc_signup_form_register {
            background: url("http://darkorbit-22.level3.bpcdn.net/do_img/pl/externalDefault/cta.png?__cv=abf8f74806d5fb9895318f09d67a9200") no-repeat;
        }

    </style>
</head>
<body>

<script>
    function checkMyCookies() {

        var cookieLeMess = 'Włącz Cookies w swojej przeglądarce';

        var cookieEnabled = (navigator.cookieEnabled) ? '' : cookieLeMess

        //if not IE4+ nor NS6+
        if (typeof navigator.cookieEnabled == "undefined" && !cookieEnabled) {

            cookieEnabled = (document.cookie.indexOf("testcookie") != -1) ? '' : cookieLeMess
        }

        return cookieEnabled;
    }
</script>
<noscript>
    <div id="noScript">Uruchom JavaScript w swojej przeglądarce</div>
</noscript>

<script type="text/javascript">

    var cookieMessage = checkMyCookies()
    if ("" != cookieMessage) {
        document.write('<div id="noCookie">' + cookieMessage + '</div>');
    }

</script>
<div id="busy_layer"></div>

<!-- EventStream ServerAdapter getJavascriptPageTag -->
<script language="javascript">window.BpEventStream = window.BpEventStream || {
        "time": new Date().getTime(),
        "context": {
            "pid": 87,
            "uid": 38241327,
            "tid": "9e509820cb8782e53a2992ccff4a5259",
            "iid": "e8e838d01426f798bbd8dd2149a2d1d9",
            "sid": "2e79d41053cd80ba2cef207b4357dfee",
            "ctime": 1402496581968
        }
    };</script>
<script language="javascript" src="//assets.bpsecure.com/eventstream/eventstream.js?ts=4674988"></script>

<!-- affiliateStartTag -->


<script type="text/javascript">


    jQuery(document).ready(function () {
        /* slayer   */
        var initParameter = {
            jQueryLibrary: jQuery, // Pass the jQuery object, the way you named it
            google: {language: 'pl'},
            facebook: {language: 'pl_PL'},
            gameId: 22,
            gameTitle: 'Darkorbit'
        }

        // Initialize SLAYER
        SLAYER.init(initParameter);

        var plusoneParameter = {
            renderPlaceholder: false,                     // Render placeholder according to german law. Default 'false'
            container: 'DOGooglePlus',                // Div tag where the button should be rendered
            annotation: 'bubble',                     // Rendering of the count. Options: none, bubble, inline
            href: 'http://darkorbit.bigpoint.com',  // The link you want to plus one
            size: 'medium',                 // Size of the button. Can be: small, medium, standard, tall
            onstartinteraction: function (json) {
            },          // This function gets called if the user hovers the +1 button
            onendinteraction: function (json) {
            },          // This function gets called if the user unhovers the +1 button
            expandto: 'top, right, bottom, left' // The preferred positions in which to display hover and confirmation bubbles, relative to the button.
        }
        SLAYER.renderPlusOne(plusoneParameter);

        var facebooklikeParameter = {
            container: 'DOFacebookLike',            			// Div container where the button will be rendered
            href: 'http://darkorbit.bigpoint.com',    	// Default is current URL
            send: false,                     			// Show the send button. Default false
            layout: 'button_count',                		// You can use 'standard', 'button_count' or 'box_count'
            show_faces: false,                      			// Show profile pictures of people who liked. Only works with standard layout.
            width: 100,                     				// Width of the button.
            action: 'like',                   			// What to display on the button. Default 'like'. Options: 'like', 'recommend'
            font: 'arial',                   			// The font on the button. Available fonts: 'arial', 'lucida grande', 'segoe ui', 'tahoma', 'trebuchet ms', 'verdana'
            colorscheme: 'light'                  				// Colors for the button. Default 'like'. Options: 'light', 'dark'
        }
        SLAYER.renderLike(facebooklikeParameter);
    });

    /* open ID */

    function showOpenId() {
        jQuery('#loginForm_openId_container').show();
    }

    function hideOpenId() {
        jQuery('#loginForm_openId_container').hide();
    }

</script>
<style>
    /* smarty fix for lang placeholder */

    .signup_submit {
        background: url("http://darkorbit-22.level3.bpcdn.net/do_img/pl/externalDefault/cta.png?__cv=abf8f74806d5fb9895318f09d67a9200") center center no-repeat;
    }

    .bgcdw_login_form_buttons .bgcdw_login_form_login {
        background: url("http://darkorbit-22.level3.bpcdn.net/do_img/pl/externalDefault/button_login.png?__cv=ffbacf3fd34fd3b2a62bc7d977084100") center center no-repeat;
    }

    #loginForm_openId_container #loginForm_openId_loginButton {
        background: url("http://darkorbit-22.level3.bpcdn.net/do_img/pl/externalDefault/button_login.png?__cv=ffbacf3fd34fd3b2a62bc7d977084100") no-repeat scroll center center transparent;
    }

</style>

<form id="bgc_sasform_config"><input type="hidden" name="reloadToken" value="62b44818be333c0eea133b4e25a94651">
    <input type="hidden" name="placeholder" value="login">
</form>

<input type="hidden" id="tucReplacementTxt" value="Gra podlega regulacjom zawartym w następujących dokumentach:"/>

<div id="eh_main_wrapper">


    <div id="eh_head_wrapper">
        <div id="eh_head_info">
            <div id="eh_lang_selection_wrapper" class="fontStyle">
                <div id="selectedLanguageBox" onclick="jQuery('#languageBox').slideToggle(300);">
                    <img src="http://darkorbit-22.level3.bpcdn.net/do_img/global/flaggen/plain/pl.png?__cv=f258bd02b53305188cf170dead593f00"
                         alt="Polski" id="currentLanguageFlag"/>
                    <div id="currentLanguageText">Polski</div>
                    <div id="languageArrow"></div>
                </div>

                <div id="languageBox" style="display: none">
                    <div class="languageList" onclick="location.href = 'index.es?lang=pl';">
                        <div class="languageFlag"
                             style="background-image: url(http://darkorbit-22.level3.bpcdn.net/do_img/global/flaggen/plain/pl.png?__cv=f258bd02b53305188cf170dead593f00);"></div>
                        <div class="languageName">Polski</div>
                    </div>
                </div>
            </div>
            <div id="eh_reg_display" class="fontStyle">
                Zarejestrowani: 2,328,887
            </div>
        </div>


        <div id="do_cobrand_container">
            <img id="PartnerCobrandLogo" src="http://pit-835.a.bpcdn.net/published/cobrands/0_22_3.png"/>
        </div>
    </div>

    <div id="eh_top_overlay">
        <div id="eh_top_wrapper">
            <div id="eh_login_container">
                <input type="hidden" id="autoFocus" value="loginForm"/>


                <!-- contains login -->
                <div class="bgcdw_login_container bgc">

                    <div class="bgcdw_login_container_form">
                        <form name="bgcdw_login_form" method="post" class="bgcdw_login_form"
                              action="https://auth3.bpsecure.com/Sas/Authentication/Bigpoint?authUser=22&amp;token=TBnwODfEV_ix-gRjYbEJQUFgizUXdw-IqxIo6DKwdDVInDRdaSy2t_4c3xoBsD8DLmvrSwM1ct7WiMNHqi-lzPLcLV0BX1n4Ube-1uLjbQFO_O8NEO8eQuM4J6eJg5wZnsgvlIfTqag8wENaAkYR6mlXUDZfLCpQT1mHnBAAZXXEk98F0PRu6xwg4ZIjUnbsRYHhI2vlCvhWCFWheUi5OEXt0DDUffOEb0pzJo-D8Wdh03bgYZB33WVNjEhk6niSuhL-XP9hnImXSjMeutRVeFEt8lYyGV0RJhIk6GQf-1TUQP6nZ5NcmXJoMUUtdlbwDJM4KHUglifISX_2NqfF8lsGDxBPS6aJSt4caI6ESFQCIpquQ7Fh65W-QSddVxuaGhLX0rPWvBfRMGlxtII0xgy-O6sAd7-vU-AFIdY_KoeqRvWg0m5EIYTF">
                            <div class="bgc_error_translations" style="display:none">
                                <div data-error-key="gl.error.username_1">Wybrana przez Ciebie nazwa u&#380;ytkownika
                                    jest za kr&oacute;tka. Podaj prosz&#281; now&#261; nazw&#281; u&#380;ytkownika sk&#322;adaj&#261;c&#261;
                                    si&#281; z 4 do 20 znak&oacute;w.
                                </div>
                                <div data-error-key="gl.error.username_2">Wybrana przez Ciebie nazwa u&#380;ytkownika
                                    jest za d&#322;uga. Podaj prosz&#281; now&#261; nazw&#281; u&#380;ytkownika sk&#322;adaj&#261;c&#261;
                                    si&#281; z 4 do 20 znak&oacute;w.
                                </div>
                                <div data-error-key="gl.error.username_6">Podaj prosz&#281; swoj&#261; nazw&#281; u&#380;ytkownika.</div>
                                <div data-error-key="gl.error.password_1">Podane przez Ciebie has&#322;o jest za kr&oacute;tkie.
                                    Podaj prosz&#281; nowe has&#322;o sk&#322;adaj&#261;ce si&#281; z 4 do 45 znak&oacute;w.
                                </div>
                                <div data-error-key="gl.error.password_2">Podane przez Ciebie has&#322;o jest za d&#322;ugie.
                                    Podaj prosz&#281; nowe has&#322;o sk&#322;adaj&#261;ce si&#281; z 4 do 45 znak&oacute;w.
                                </div>
                                <div data-error-key="gl.error.password_8">Podaj prosz&#281; swoje has&#322;o.</div>
                                <div data-error-key="gl.error.email_1">Podany adres e-mail zdaje si&#281; by&#263;
                                    nieprawid&#322;owy. Podaj prosz&#281; prawid&#322;owy adres e-mail.
                                </div>
                                <div data-error-key="gl.error.checkbox_tick">Prosz&#281; zaznaczy&#263; pole
                                    kontrolne.
                                </div>
                            </div>
                            <fieldset class="bgcdw_login_form_login">
                                <div class="bgcdw_input_text bgcdw_login_form_username">
                                    <label for="bgcdw_login_form_username">Nazwa</label>
                                    <input id="bgcdw_login_form_username" name="username" type="text" maxlength="20">
                                </div>
                                <div class="bgcdw_input_password bgcdw_login_form_password">
                                    <label for="bgcdw_login_form_password">Has&#322;o</label>
                                    <input id="bgcdw_login_form_password" name="password" type="password"
                                           maxlength="45">
                                </div>
                            </fieldset>
                            <div class="bgcdw_login_container_remindpassword">
                                <a class="bgcdw_remindpassword" target="_self"
                                   href="https://account.bpsecure.com/PasswordReminder?pid=87&amp;lang=pl">Zapomnia&#322;e&#347;
                                    has&#322;a?</a>
                            </div>
                            <fieldset class="bgcdw_login_form_buttons">
                                <input class="bgcdw_button bgcdw_login_form_login" type="submit"
                                       value="Logowanie"><input class="bgcdw_button bgcdw_login_form_register"
                                                                type="button"
                                                                onclick="window.location='/';return false;"
                                                                value="Rejestracja">
                            </fieldset>
                        </form>
                    </div>
                </div>


            </div>

            <div id="eh_reg_container">
                <br/>
                <img id="do_registration_container_titel"
                     src="http://darkorbit-22.level3.bpcdn.net/do_img/pl/externalDefault/txt_form.png?__cv=7cb6d6a95193a39679b528183a7bfa00"
                     alt="Regform title"/>
                <img id="do_registration_container_splitter"
                     src="http://darkorbit-22.level3.bpcdn.net/do_img/global/externalHome/assets/blue_splitter.png?__cv=c93b27f6423b60b4d94bc1cc3331b500"/>

                <div id="bgc_signup_short_container" class="bgc_signup_container bgc">
                    <div class="bgc_signup_container_form">
                        <form method="post" name="bgc_signup_form" class="bgc_signup_form" autocomplete="off"
                              action="https://auth3.bpsecure.com/Sas/User/ShortReg?authUser=22&amp;token=uFppUIN5G9etEqxaItfscu9KD5x8YqOxiUR-it5Hgdfi714023PnRx8Agi6fmmEfVYRw5GQgQ8CAqFg6cHYb6Z9M_jctTPYYBanFqZrxZLuqr3dyy6ZzXHNAXswcK-fAaJx9pDwtL_x7RkAFgI2Bi3ENoiNdUuLPZBaeyxPvGhOg1pZm_YUz3XfKTSQF2fUxGsrsu4XOvqoVRvzQxMApvieH-sC2GeoH8VPPvM4LFG0302V6rvCS_XwNZzK6AMz_xk7utDPunR8Nb01afZsmHLU-8P6uKVvCwBgg1oUfnCu9-qzpBG4lhJ_MBcNSegXvT4FKcL4ZZz_oVsFSdHpp9d5asL4UHGOs5DyzmiUWwnGzfc0px0yywHQ_xjM7gLAmnOjTfkk4d4lii7FYyGNEIpbl5Oin6nMYdpTZGolocaE34zt3b4ywc1FTz6bTKOV-SDYL8GG_4ASuGW3BQyTLsuPxOSz6IYZvo3xCbp0aQvlFS8fIRHW4DEzWxGg5j2QMMNHuVCfT2EOfKSR25jWVtsn0Nz8t67b4Q32r5hJj5fV24R93hmBJWjVOzJpP5DKsE8QbEkYYA6H8QKF6yxgSxBizt_-8oxi-D-RKJOOZ7_NP8cLLj3Oo_uaY-Yp70mLifkuWy79nQRXm7g">
                            <div class="bgc_error_translations" style="display:none">
                                <div data-error-key="gl.error.username_1">Wybrana przez Ciebie nazwa u&#380;ytkownika
                                    jest za kr&oacute;tka. Podaj prosz&#281; now&#261; nazw&#281; u&#380;ytkownika sk&#322;adaj&#261;c&#261;
                                    si&#281; z 4 do 20 znak&oacute;w.
                                </div>
                                <div data-error-key="gl.error.username_2">Wybrana przez Ciebie nazwa u&#380;ytkownika
                                    jest za d&#322;uga. Podaj prosz&#281; now&#261; nazw&#281; u&#380;ytkownika sk&#322;adaj&#261;c&#261;
                                    si&#281; z 4 do 20 znak&oacute;w.
                                </div>
                                <div data-error-key="gl.error.username_3">Twoja wybrana nazwa u&#380;ytkownika zawiera
                                    niedozwolone znaki. Nie mo&#380;esz w niej u&#380;ywa&#263; spacji, ani specjalnych
                                    znak&oacute;w jak np. @.
                                </div>
                                <div data-error-key="gl.error.password_1">Podane przez Ciebie has&#322;o jest za kr&oacute;tkie.
                                    Podaj prosz&#281; nowe has&#322;o sk&#322;adaj&#261;ce si&#281; z 4 do 45 znak&oacute;w.
                                </div>
                                <div data-error-key="gl.error.password_2">Podane przez Ciebie has&#322;o jest za d&#322;ugie.
                                    Podaj prosz&#281; nowe has&#322;o sk&#322;adaj&#261;ce si&#281; z 4 do 45 znak&oacute;w.
                                </div>
                                <div data-error-key="gl.error.password_3">Podane przez Ciebie has&#322;o zawiera
                                    nieprawid&#322;owe znaki.
                                </div>
                                <div data-error-key="gl.error.password_6">Podane has&#322;a nie s&#261; takie same.
                                </div>
                                <div data-error-key="gl.error.password_7">Twoje has&#322;o nie mo&#380;e brzmie&#263;
                                    tak samo jak Twoja nazwa u&#380;ytkownika.
                                </div>
                                <div data-error-key="gl.error.login_1">Konto z t&#261; kombinacj&#261; nazwy u&#380;ytkownika
                                    i has&#322;a nie zosta&#322;o odnalezione.
                                </div>
                                <div data-error-key="gl.error.email_1">Podany adres e-mail zdaje si&#281; by&#263;
                                    nieprawid&#322;owy. Podaj prosz&#281; prawid&#322;owy adres e-mail.
                                </div>
                                <div data-error-key="gl.error.captcha_1">Nie uda&#322;o si&#281;. Podaj prosz&#281;
                                    znaki z bia&#322;ego pola.
                                </div>
                            </div>
                            <fieldset class="bgc_signup_form_signup">
                                <div class="bgc_input_text bgc_signup_form_username">
                                    <label for="bgc_signup_form_username">Nazwa</label>
                                    <input maxlength="20" minlength="4" id="bgc_signup_form_username" name="username"
                                           type="text">
                                </div>
                                <div class="bgc_input_password bgc_signup_form_password">
                                    <label for="bgc_signup_form_password">Has&#322;o</label>
                                    <input maxlength="45" minlength="4" id="bgc_signup_form_password" name="password"
                                           type="password">
                                </div>
                                <div class="bgc_input_email bgc_signup_form_email">
                                    <label for="bgc_signup_form_email">E-mail:</label>
                                    <input maxlength="64" id="bgc_signup_form_email" name="email" type="email">
                                </div>

                            </fieldset>
                            <div class="bgcdw_captcha" id="id17DD3B63_0">
                                <p bgc_translate_param="">Aby pomy&#347;lnie dokona&#263; zmian, nale&#380;y wprowadzi&#263;
                                    poni&#380;ej kod zabezpieczaj&#261;cy, kt&oacute;ry widnieje na obrazku.<br/><br/>
                                </p>
                                <div id="recaptcha_image" style="width:300px;height:57px;"></div>
                                <a class="bgcdw_captcha_reload" onclick="Recaptcha.reload();return false;">Wygeneruj
                                    nowy kod</a>
                                <div class="bgcdw_captcha_response_container">
                                    <label for="recaptcha_response_field">Podaj kod</label><input type="text"
                                                                                                  name="recaptcha_response_field"
                                                                                                  id="recaptcha_response_field">
                                </div>
                                <script type="text/javascript">var RecaptchaOptions = {
                                        'theme': 'custom',
                                        'custom_theme_widget': 'id17DD3B63_0'
                                    };
                                    Recaptcha.create('6Ldud8cSAAAAAM5W4-JHqa2vEQuqEX19LN8HLQIl', 'id17DD3B63_0', RecaptchaOptions);</script>
                            </div>

                            <fieldset class="bgc_signup_form_legal">
                                <div class="bgc_input_checkbox bgc_signup_form_newsletterPartner">
                                    <input type="checkbox" value="1" name="newsletterPartner"
                                           id="bgc_signup_form_newsletterPartner"><label
                                            for="bgc_signup_form_newsletterPartner">Tak, chce otrzymywac wiadomosci z
                                        WyspaGier.pl. Na przyklad ekscytujace informacje o najnowszych grach. Zgadzam
                                        sie aby Bigpoint GmbH przekazal m&oacute;j adres e-mailowy Jaludo Group B.V.
                                        (wydawca Wyspagier.pl)</label>
                                </div>
                                <div class="bgc_signup_form_policies">
                                    <span>Gra podlega regulacjom zawartym w nast&#281;puj&#261;cych dokumentach:</span><br><a
                                            class="link_tac" target="_blank"
                                            href="/sharedpages/termsofuse/?lang=pl">OWH</a>
                                    <a class="link_dataPrivacy" target="_blank"
                                       href="/sharedpages/privacypolicy/?lang=pl">O&#347;wiadczenie o ochronie danych
                                        osobowych</a>

                                </div>
                            </fieldset>
                            <fieldset class="bgc_signup_form_buttons">
                                <input class="bgc_button bgc_signup_form_back" type="button"
                                       onclick="window.location='/';return false;" value="Powr&oacute;t"><input
                                        class="bgc_button bgc_signup_form_register" type="submit" value="Rejestracja">
                            </fieldset>
                        </form>
                    </div>
                </div>
                <script language="javascript">if (window.BpEventStream && window.jQuery) (function () {
                        window.jQuery(".bgcdw_remindpassword").click(function () {
                            window.BpEventStream.track("account.forgotpassword.click");
                        });
                        window.jQuery(".bgc_signup_form_register").click(function () {
                            var e = [];
                            window.jQuery("div.bgcdw_errors ul").each(function (_, i) {
                                e.push(window.jQuery(i).attr("data-error"));
                            });
                            if (!e || e.join("") == "") return;
                            window.BpEventStream.track("account.signup.error", {"error": e.join(",")});
                        });

                        function isVisible(elm) {
                            if (!elm.is(":visible")) return false;
                            var w = window.jQuery(window);
                            if (elm.offset().top < w.scrollTop()) return false;
                            if (elm.offset().top > w.scrollTop() + w.height()) return false;
                            return true;
                        }

                        window.setTimeout(function () {
                            if (isVisible(window.jQuery(".bgcdw_login_container"))) {
                                window.BpEventStream.track("account.login.visible");
                            } else {
                                window.setTimeout(arguments.callee, 500);
                            }
                        }, 100);
                        window.setTimeout(function () {
                            if (isVisible(window.jQuery(".bgc_signup_container"))) {
                                window.BpEventStream.track("account.signup.visible");
                            } else {
                                window.setTimeout(arguments.callee, 500);
                            }
                        }, 100);
                    })()</script>
            </div>

            <div id="eh_trailer_container">
                <div id="eh_trailer">
                    <object width="475" height="297" id="_5634699166" name="_5634699166"
                            data="http://darkorbit-22.level3.bpcdn.net/do_img/global/externalHome/assets/trailer.swf?__cv=761c8c6f9ebf43539a0b0a89736ed100"
                            type="application/x-shockwave-flash" style="display: block; margin: 0 auto;">
                        <param name="allowfullscreen" value="true">
                        <param name="allowscriptaccess" value="always">
                        <param name="quality" value="high">
                        <param name="wmode" value="transparent">
                        <param name="flashVars"
                               value="ordner=http://darkorbit-22.level3.bpcdn.net/do_img/global/externalHome/assets/trailer_do.flv?__cv=4a10f9c0810ffb9282adc7c4078ea500">
                    </object>
                </div>
            </div>

            <div id="eh_screenshot_container_left">
                <a class="eh_screen_trigger"
                   href="http://darkorbit-22.level3.bpcdn.net/do_img/global/externalHome/assets/screenshots/screen_1.jpg?__cv=a8501044bad4f3ffd0debffaa98e5700"
                   rel="screenshots"></a>
                <a class="eh_screen_trigger"
                   href="http://darkorbit-22.level3.bpcdn.net/do_img/global/externalHome/assets/screenshots/screen_2.jpg?__cv=ac3d2e41d6497e50f145b2a85740b400"
                   rel="screenshots"></a>
            </div>
            <div id="eh_screenshot_container_right">
                <a class="eh_screen_trigger"
                   href="http://darkorbit-22.level3.bpcdn.net/do_img/global/externalHome/assets/screenshots/screen_3.jpg?__cv=d14f6455dd0a8d06f9c4b1bf90937400"
                   rel="screenshots"></a>
                <a class="eh_screen_trigger"
                   href="http://darkorbit-22.level3.bpcdn.net/do_img/global/externalHome/assets/screenshots/screen_4.jpg?__cv=9cd2c2338e13d2231584a5a8b29e1300"
                   rel="screenshots"></a>
            </div>

        </div>
    </div>

    <div id="eh_bg_v2" class="eh_company_bg"></div>

    <div id="footerContainer">

        <div id="eh_description_txt">
            <h1>DarkOrbit – Dołącz do wielkiej batalii o władzę nad galaktyką
                <h1>
                    <h2>Uruchom dopalacze, przygotuj się do walki w otwartej grze MMO i dołącz do milionów innych
                        pilotów toczących zaciekłą batalię na śmierć i życie
                        <h2> Kosmiczny pilocie! Czeka na ciebie bezkresna przestrzeń świata DarkOrbit! Wybierz statek i
                            ruszaj czym prędzej na swoje stanowisko bojowe, by pomóc w walce z hordami kosmitów
                            zagrażających istnieniu rasy ludzkiej. Podejmij wyzwanie i przemierzaj galaktykę własnym
                            pojazdem. Zarejestruj się już dziś w DarkOrbit, zostań kosmicznym pilotem i dołącz do jednej
                            z trzech frakcji. Zbieraj cenne surowce, zniszcz obcych i poprowadź swoją firmę do
                            zwycięstwa, łącząc siły z innymi pilotami lub tworząc klan w darmowej grze kosmicznej
                            dostępnej w przeglądarkach!

                            <h3>Wybierz firmę, której pomożesz w walce o galaktykę
                                <h3>Okrutni kosmici to nie jedyne zagrożenie kryjące się w przestrzeni kosmicznej tej
                                    wypełnionej akcją gry studia Bigpoint! Rozpocznij swoją podróż przez wszechświat
                                    DarkOrbit od wybrania jednej z trzech rywalizujących ze sobą frakcji. Każda z nich
                                    kieruje się odmienną filozofią i ma własny pomysł na osiągnięcie zwycięstwa w tej
                                    międzygwiezdnej walce. Wykorzystaj moc, siłę i agresję w "Mars Mining Operations",
                                    osiągaj cele za pomocą pieniędzy w "Earth Industries Corporation" lub posługuj się
                                    sprytem i dyplomacją w "Venus Resources Unlimited". Niezależnie od wybranej strony
                                    twoja misja pozostaje niezmienna: gromadzić cenne zasoby i przechylić szalę
                                    zwycięstwa na korzyść swojej firmy.

                                    <h3>Obejmij dowodzenie nad dowolnym statkiem
                                        <h3> Oprócz możliwości wyboru frakcji, ta doskonała gra kosmiczna studia
                                            Bigpoint zapewnia mnóstwo niezwykłych opcji nadania kosmicznej rozgrywce
                                            indywidualnego charakteru. W DarkOrbit to ty dowodzisz. Do wyboru masz jeden
                                            z wyspecjalizowanych statków kosmicznych. Dostępne są statki umożliwiające
                                            błyskawiczne niszczenie całych rojów nieprzyjacielskich maszyn, szybkie
                                            pojazdy przeznaczone do gromadzenia bezcennych danych wywiadowczych oraz
                                            wielkie maszyny najnowszej generacji o potężnej sile rażenia umożliwiające
                                            osłanianie statków sojuszniczych.

                                            <h3>Dołącz do niezwykłej społeczności graczy
                                                <h3> Tym, co naprawdę wyróżnia grę DarkOrbit od podobnych gier, jesteś
                                                    TY! Pozostałe gry przeglądarkowe mogą tylko aspirować do miana
                                                    prawdziwej rozgrywki wieloosobowej i nie są w stanie prześcignąć
                                                    potężnej społeczności graczy DarkOrbit: codziennie w grze
                                                    uczestniczy ponad 80 milionów użytkowników. Dzięki tobie i tobie
                                                    podobnym DarkOrbit to kultowa gra kosmiczna online. Dołącz do
                                                    milionów innych kosmicznych pilotów i staw czoła wrogom dążącym do
                                                    unicestwienia cię. Odbezpiecz broń i pozostań w gotowości.
                                                    Niebezpieczeństwo czai się na każdym kroku, a moment zawahania może
                                                    zdecydować o zwycięstwie lub porażce.

                                                    <h3>Walcz u boku znajomych lub przeciwko nim<h3> Przemierzaj
                                                            niezliczone galaktyki w jednej z najpopularniejszych
                                                            kosmicznych strzelanek w historii. Świat gry jest pełen
                                                            zagrożeń, dlatego podczas poszukiwań surowców, odkrywania
                                                            nowych map lub wykonywania kolejnych misji należy zachować
                                                            najwyższą czujność. Aby zwiększyć swoje szanse na zwycięstwo
                                                            i przetrwanie w starciu z galaktycznymi bestiami, stwórz
                                                            klan razem ze znajomymi i innymi szanowanymi pilotami lub
                                                            podejmuj się niebezpiecznych misji, dzięki którym wraz z
                                                            załogą błyskawicznie awansujesz na wyższy poziom.
        </div>

        <div id="eh_footer">

            <!--gl footer-->
            <div id="gl_footer">


                <span id="gl_footer_element_copyright" class="gl_footer_element">&copy; Bigpoint</span>

                <span class="gl_footer_element_separator">&nbsp;·&nbsp;</span>
                <span id="gl_footer_element_allrights" class="gl_footer_element">Wszystkie prawa zastrzeżone</span>

                <span class="gl_footer_element_separator">&nbsp;·&nbsp;</span>
                <span id="gl_footer_element_terms" class="gl_footer_element"><a class="gl_footer_element_link"
                                                                                id="gl_footer_element_link_terms"
                                                                                href="/sharedpages/termsofuse/?locale=pl"
                                                                                target="_blank">OWH</a></span>

                <span class="gl_footer_element_separator">&nbsp;·&nbsp;</span>
                <span id="gl_footer_element_privacy" class="gl_footer_element"><a class="gl_footer_element_link"
                                                                                  id="gl_footer_element_link_privacy"
                                                                                  href="/sharedpages/privacypolicy/?locale=pl"
                                                                                  target="_blank">Oświadczenie o ochronie danych osobowych</a></span>

                <span class="gl_footer_element_separator">&nbsp;·&nbsp;</span>
                <span id="gl_footer_element_imprint" class="gl_footer_element"><a class="gl_footer_element_link"
                                                                                  id="gl_footer_element_link_imprint"
                                                                                  href="index.es?action=info"
                                                                                  target="_blank">Impressum</a></span>

                <span class="gl_footer_element_separator">&nbsp;·&nbsp;</span>
                <span id="gl_footer_element_support" class="gl_footer_element"><a class="gl_footer_element_link"
                                                                                  id="gl_footer_element_link_support"
                                                                                  href="index.es?action=support"
                                                                                  target="_blank">Pomoc techniczna</a></span>

                <span class="gl_footer_element_separator">&nbsp;·&nbsp;</span>
                <span id="gl_footer_element_forum" class="gl_footer_element"><a class="gl_footer_element_link"
                                                                                id="gl_footer_element_link_forum"
                                                                                href="/GameAPI.php?action=portal.redirectToBoard"
                                                                                target="_blank">Forum</a></span></div>


            <div id="affiliateEndTag">
                <!-- affiliateEndTag -->
                <!-- Google Tag Manager -->
                <noscript>
                    <iframe src="//www.googletagmanager.com/ns.html?id=GTM-T9RP2T"
                            height="0" width="0" style="display:none;visibility:hidden"></iframe>
                </noscript>
                <script>(function (w, d, s, l, i) {
                        w[l] = w[l] || [];
                        w[l].push({
                            'gtm.start':
                                new Date().getTime(), event: 'gtm.js'
                        });
                        var f = d.getElementsByTagName(s)[0],
                            j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                        j.async = true;
                        j.src =
                            '//www.googletagmanager.com/gtm.js?id=' + i + dl;
                        f.parentNode.insertBefore(j, f);
                    })(window, document, 'script', 'dataLayer', 'GTM-T9RP2T');</script>
                <!-- End Google Tag Manager --><!-- BPID -->
                <script language="javascript">window.bpid = window.bpid || {};
                    window.bpid.callbacks = window.bpid.callbacks || [];
                    window.bpid.callbacks.push(function (bpid) {
                        document.cookie = "__bpid=" + bpid + ";path=/;expires=Fri, 03 Jun 2022 13:59:24 GMT;";
                        if (bpid != "532877f5qjmhV3PUphmh5En8rs9GV1eB") {
                            try {
                                var xhr = new XMLHttpRequest();
                                xhr.open("GET", "\/GameAPI.php?action=core.bpid&bpid=" + bpid, true);
                                xhr.send(null);
                            } catch (e) {
                            }
                        }
                    });</script>
                <script language="javascript" src="//assets.bpsecure.com/bpid/bpid.js?ts=389582" defer="defer"></script>
                <!-- /BPID -->

                <!-- Begin GA Tracking -->

                <script type='text/javascript'>

                    var _gaq = _gaq || [];
                    _gaq.push(['_setAllowLinker', true]);
                    _gaq.push(['_gat._anonymizeIp']);
                    _gaq.push(['_setCustomVar', 1, 'aid', '1129', 2]);
                    _gaq.push(['_setCustomVar', 2, 'aip', '', 2]);
                    _gaq.push(['_setCustomVar', 3, 'ait', 'partner', 2]);
                    _gaq.push(['_setCustomVar', 4, 'areaID', 'external.home', 2]);
                    _gaq.push(['_setDomainName', 'darkorbit.bigpoint.com']);
                    _gaq.push(['_setAccount', 'UA-17685913-1']);
                    _gaq.push(['_trackPageview']);


                    (function () {
                        var ga = document.createElement('script');
                        ga.type = 'text/javascript';
                        ga.async = true;
                        ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
                        var s = document.getElementsByTagName('script')[0];
                        s.parentNode.insertBefore(ga, s);
                    })();

                </script>

                <!-- End GA Tracking -->

            </div>

        </div>


    </div>
</div>

<script>
</script>

</body>
</html>