<header class="container">
    <nav id="userinfo-nav">
        <ul class="pull-left">
            <li>
                <img src="../../resources/images/buttons/icon_stats_ID.png" width="16" height="13" alt="">
                <span>ID <?= $System->User->USER_ID ?></span>
            </li>
            <li>
                <a href="./internalSettings">
                    <img src="<?= PROJECT_HTTP_ROOT ?>resources/images/settings-icon.png" width="12" height="13" alt="">
                    <?= $System->__('NAV_TEXT_SETTINGS') ?>
                </a>
            </li>
            <li><span><?= $System->translation->LANGUAGE_NAME ?></span></li>
            <li><span><a href="./login.php?l"><?= $System->__('NAV_TEXT_LOGOUT') ?></a></span></li>
            <?php
            if ($System->User->hasPremium()) {
                ?>
                <li>
                    <span title="Premium until <?= date("m/d/Y", strtotime($System->User->PREMIUM_UNTIL)) ?>"
                          class="gold-text"><?= $System->__('NAV_TEXT_PREMIUM') ?></span>
                </li>
                <?php
            }
            if ($System->User->isAdmin()) {
                ?>
                <li>
                    <a href="./internalAdmin">
                        <span title="You're an administrator" class="red-text">
                            <?= $System->__('NAV_TEXT_ADMIN') ?>
                        </span>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>

        <ul class="pull-right user-stats">
            <li>
                <img src="../../resources/images/buttons/icon_stats_lvl.png" width="16" height="13" alt="">
                <span data-toggle="tooltip" title="Level" class="lvl">LVL <?= $System->User->LVL ?></span>
            </li>
            <li>
                <img src="../../resources/images/buttons/icon_stats_exp.png" width="16" height="13" alt="">
                <span data-toggle="tooltip"
                      title="Still need <?= $System->User->expToNextLevel() ?> EXP to next level"
                      class="exp">EXP <?= number_format($System->User->EXP, 0, '.', '.'); ?></span>
            </li>
            <li>
                <img src="../../resources/images/buttons/icon_stats_hon.png" width="16" height="13" alt="">
                <span class="hon">HON <?= number_format($System->User->HONOR, 0, '.', '.'); ?></span>
            </li>
            <li>
                <span class="cre">CRE <?= number_format($System->User->CREDITS, 0, '.', '.'); ?></span>
            </li>
            <li>
                <span class="uri">URI <?= number_format($System->User->URIDIUM, 0, '.', '.'); ?></span>
            </li>
        </ul>
    </nav>

    <nav id="main-nav">
        <ul id="left-buttons" class="header-buttons bold">
            <ul class="main-right-buttons">
                <li class="header_button header_disabled_button">
                    <a href="#"><?= $System->__('NAV_TEXT_CLAN') ?></a>
                </li>
                <li class="header_button header_disabled_button">
                    <a href="#"><?= $System->__('NAV_TEXT_SKYLAB') ?></a>
                </li>
            </ul>

            <ul class="main-left-buttons">
                <li class="header_button header_normal_button">
                    <a
                            href="./internalHangar"><?= $System->__('NAV_TEXT_HANGAR') ?></a>
                </li>
                <li class="header_button header_disabled_button">
                    <a href="#"><?= $System->__('NAV_TEXT_UPGRADES') ?></a>
                </li>
            </ul>
            <div class="inbox">
                <p>
                    <?php
                    if ($System->User->hasMessages()) {
                        ?>
                        <a href="./internalMessaging"><span id="icon"
                                                            class="inbox_new"
                                                            title="You have <?= $System->User->hasMessages(
                                                            ) ?> new messages">(<?= $System->User->hasMessages(
                                ) ?>)</span></a>
                        <?php
                    } else {
                        ?>
                        <a href="./internalMessaging"><span id="icon"
                                                            class="inbox_read"
                                                            title="You have 0 new messages">(0)</span></a>
                        <?php
                    }
                    ?>
                </p>
            </div>
        </ul>

        <a class="main-logo" href="./internalStart">
            <img src="<?= PROJECT_HTTP_ROOT ?>resources/images/logos/main_logo.png" />
        </a>

        <ul id="right-buttons" class="header-buttons bold">
            <ul class="main-left-buttons">
                <li class="header_button header_disabled_button">
                    <a href="#"><?= $System->__('NAV_TEXT_PREMIUM') ?></a>
                </li>
                <li class="header_button header_disabled_button">
                    <a
                            href="#"><?= $System->__('NAV_TEXT_GALAXYGATES') ?></a>
                </li>
            </ul>

            <ul class="main-right-buttons">
                <li class="header_button header_normal_button">
                    <a
                            href="./internalShop"><?= $System->__('NAV_TEXT_SHOP') ?></a>
                </li>
                <li class="header_button header_disabled_button">
                    <a href="#"><?= $System->__('NAV_TEXT_AUCTION') ?></a>
                </li>
            </ul>
        </ul>
    </nav>

</header>