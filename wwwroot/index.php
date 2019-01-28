<?php

include_once('./core/core.php');

//Load Head
include_once('./templates/head/head.php');

//Need Login
if ($System->routing->login_req) {
    include_once('./core/guard.php');
}

//ADMIN ACCESS LVL
if ($System->routing->AdminLVL != 0) {
    if ($System->isLoggedIn()) {
        if ($System->User->RANK != 21) {
            $System->error_handler->throwError(ErrorID::ACCESS_DENIED);
        }
    } else {
        $System->error_handler->throwError(ErrorID::ACCESS_DENIED);
    }
}
?>

<body class="<?= $System->Server['XMAS'] ? 'xmas' : '' ?> <?= $System->routing->template ?>">
    <?php
    //Load nav
    if ($System->routing->includeNav) {
        include_once('./templates/nav/nav.php');
    }
    ?>

    <main class="container">
        <?php
        //Load External
        include_once('./templates/' . $System->routing->template . '.php');
        ?>
    </main>

    <?php
    //Load Footer
    if ($System->routing->includeFooter) {
        include_once('./templates/footer/footer.php');
    }
    ?>

    <?php
    //EPVP - Backlink for external
    if (!$System->routing->login_req) {
    ?>
        <div id="external-backlink">
            <a target="_blank"
               href="http://www.elitepvpers.com/forum/darkorbit/4202122-unknown-universe-15-12-16-a.html">EPVP
                BACKLINK</a>
        </div>
    <?php
    }
    ?>
</body>

<?php
//Load FooterScripts
include_once('./templates/footer/footerscripts.php');