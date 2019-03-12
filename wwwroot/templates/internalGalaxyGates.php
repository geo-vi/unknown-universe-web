<?php
$alpha = 0;
$beta = 0;
$gamma = 0;
$delta = 0;

$userSQL = new \DB\MySQL(MYSQL_IP, MYSQL_DB_NAME, MYSQL_USER, MYSQL_PW);
$userQuery = $userSQL->QUERY("SELECT * FROM users WHERE USER_ID = ?", array($_SESSION['USER_ID']));
$user = $userQuery[0];

$lastServerQuery = $userSQL->QUERY("SELECT * FROM server_infos WHERE SHORTCUT = ?", array($user['LAST_SERVER']));
$lastServer = $lastServerQuery[0];

$serverSQL = new \DB\MySQL($lastServer['SERVER_IP'], $lastServer['DB_NAME'], MYSQL_USER, MYSQL_PW);
$playerDetailQuery = $serverSQL->QUERY("SELECT * FROM player_data WHERE USER_ID=?", array($_SESSION['USER_ID']));
$playerDetail = $playerDetailQuery[0];

$getGates = $serverSQL->QUERY("SELECT * FROM player_galaxy_gates WHERE USER_ID=? AND PLAYER_ID=?",
    array($_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));

if (count($getGates) > 0) {
    $getGatesDetail = $getGates[0];
    $alpha = $getGatesDetail['ALPHA_PARTS'];
    $beta = $getGatesDetail['BETA_PARTS'];
    $gamma = $getGatesDetail['GAMMA_PARTS'];
    $delta = $getGatesDetail['DELTA_PARTS'];
}

?>
<main class="container" id="ggMain">
    <div class="main">
        <div class="row">
            <div class="col-sm-3 col-md-3 col-xs-3">
                <div>
                    <button class="ggButton active" id="btnGGAlpha" data-id="ggAlpha" data-gate_id="1">Alpha</button>
                </div>
                <div>
                    <button class="ggButton" id="btnGGBeta" data-id="ggBeta" data-gate_id="2">Beta</button>
                </div>
                <div>
                    <button class="ggButton" id="btnGGGama" data-id="ggGama" data-gate_id="3">Gama</button>
                </div>
                <div>
                    <button class="ggButton" id="btnGGDelta" data-id="ggDelta" data-gate_id="4">Delta</button>
                </div>
                <div>
                    <button class="ggButton" id="btnGGZeta" data-id="ggZeta" data-gate_id="6">Zeta</button>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-xs-6">
                <div class="ggGatePanel ggAlpha">
                    <img src="/resources/images/gg/gate_1_<?php echo $alpha; ?>.png"
                         id="imgGGAlpha">
                    <div class="ggStats" id="ggStatAlpha">
                        <small>GG α</small>
                        <?php echo $alpha; ?>/34
                    </div>
                </div>
                <div class="ggGatePanel ggBeta" style="display: none;">
                    <img src="/resources/images/gg/gate_2_<?php echo $beta; ?>.png"
                         id="imgGGBeta">
                    <div class="ggStats" id="ggStatBeta">
                        <small>GG β</small>
                        <?php echo $beta; ?>/48
                    </div>
                </div>
                <div class="ggGatePanel ggGama" style="display: none;">
                    <img src="/resources/images/gg/gate_3_<?php echo $gamma; ?>.png"
                         id="imgGGGamma">
                    <div class="ggStats" id="ggStatGama">
                        <small>GG γ</small>
                        <?php echo $gamma; ?>/82
                    </div>
                </div>
                <div class="ggGatePanel ggDelta" style="display: none;">
                    <img src="/resources/images/gg/gate_4_<?php echo $delta; ?>.png"
                         id="imgGGDelta">
                    <div class="ggStats" id="ggStatDelta">
                        <small>GG δ</small>
                        <?php echo $delta; ?>/128
                    </div>
                </div>
                <div class="ggGatePanel ggZeta" style="display: none;">
                    <div class="ggStats" id="ggStatZeta">
                        <small>GG ζ</small>
                        0/111
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-xs-3">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12 ggUriEnergyBar">
                        Uridium: <b id="ggUridium"><?php echo number_format($System->User->__get('URIDIUM'), 0, '.',
                                ','); ?></b>
                        <hr style="margin-top: 8px; margin-bottom: 8px;"/>
                        Energy: <b id="ggEnergy"><?php echo number_format($System->User->__get('GG_ENERGY'), 0, '.',
                                ','); ?></b>
                    </div>
                </div>

                <div class="row" style="    margin-top: 10px;">
                    <div class="col-sm-12" style="padding: 0px">
                        <select id="useEnergy" class="form-control">
                            <option value="1">1</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-info" id="btnGetGG">
                            <?php if ($System->User->__get('GG_ENERGY') > 0): ?>
                                Energy (0 U.)
                            <?php else: ?>
                                Energy (100 U.)
                            <?php endif; ?>
                        </button>
                    </div>
                </div>

                <div class="row" style="margin-top: 10px;" id="wonItems">

                </div>
            </div>
        </div>
    </div>
</main>