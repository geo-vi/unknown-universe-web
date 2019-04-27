<?php
$alpha = 0;
$beta = 0;
$gamma = 0;
$delta = 0;
$epsilon = 0;
$zeta = 0;
$kappa = 0;
$lambda = 0;
$kuiper = 0;

$pre_alpha = false;
$pre_beta = false;
$pre_gamma = false;
$pre_delta = false;
$pre_epsilon = false;
$pre_zeta = false;
$pre_kappa = false;
$pre_lambda = false;
$pre_kuiper = false;

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
    $alpha = intval($getGatesDetail['ALPHA_PARTS']);
    $beta = intval($getGatesDetail['BETA_PARTS']);
    $gamma = intval($getGatesDetail['GAMMA_PARTS']);
    $delta = intval($getGatesDetail['DELTA_PARTS']);
    $epsilon = intval($getGatesDetail['EPSILON_PARTS']);
    $zeta = intval($getGatesDetail['ZETA_PARTS']);
    $kappa = intval($getGatesDetail['KAPPA_PARTS']);
    $lambda = intval($getGatesDetail['LAMBDA_PARTS']);
    $kuiper = intval($getGatesDetail['KUIPER_PARTS']);

    if($getGatesDetail['ALPHA_PREPARED']>0){
        $pre_alpha = json_decode($getGatesDetail['ALPHA_WAVE'],true);
        $pre_alpha['lives'] = $getGatesDetail['ALPHA_LIVES'];
    }

    if($getGatesDetail['BETA_PREPARED']>0){
        $pre_beta = json_decode($getGatesDetail['BETA_WAVE'],true);
        $pre_beta['lives'] = $getGatesDetail['BETA_LIVES'];
    }

    if($getGatesDetail['GAMMA_PREPARED']>0){
        $pre_gamma = json_decode($getGatesDetail['GAMMA_WAVE'],true);
        $pre_gamma['lives'] = $getGatesDetail['GAMMA_LIVES'];
    }

    if($getGatesDetail['DELTA_PREPARED']>0){
        $pre_delta = json_decode($getGatesDetail['DELTA_WAVE'],true);
        $pre_delta['lives'] = $getGatesDetail['DELTA_LIVES'];
    }

    if($getGatesDetail['EPSILON_PREPARED']>0){
        $pre_epsilon = json_decode($getGatesDetail['EPSILON_WAVE'],true);
        $pre_epsilon['lives'] = $getGatesDetail['EPSILON_LIVES'];
    }

    if($getGatesDetail['ZETA_PREPARED']>0){
        $pre_zeta = json_decode($getGatesDetail['ZETA_WAVE'],true);
        $pre_zeta['lives'] = $getGatesDetail['ZETA_LIVES'];
    }

    if($getGatesDetail['KAPPA_PREPARED']>0){
        $pre_kappa = json_decode($getGatesDetail['KAPPA_WAVE'],true);
        $pre_kappa['lives'] = $getGatesDetail['KAPPA_LIVES'];
    }

    if($getGatesDetail['LAMBDA_PREPARED']>0){
        $pre_lambda = json_decode($getGatesDetail['LAMBDA_WAVE'],true);
        $pre_lambda['lives'] = $getGatesDetail['LAMBDA_LIVES'];
    }

    if($getGatesDetail['KUIPER_PREPARED']>0){
        $pre_kuiper = json_decode($getGatesDetail['KUIPER_WAVE'],true);
        $pre_kuiper['lives'] = $getGatesDetail['KUIPER_LIVES'];
    }
}

$activeGates = array(
    1 => 'Alpha',
    2 => 'Beta',
    3 => 'Gamma',
    4 => 'Delta',
    5 => 'Epsilon',
    6 => 'Zeta',
    7 => 'Kappa',
    8 => 'Lambda',
    9 => 'Kuiper'
);
$total_parts = array(
    1 => 34,
    2 => 48,
    3 => 82,
    4 => 128,
    5 => 99,
    6 => 111,
    7 => 120,
    8 => 45,
    9 => 100
);

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
                    <button class="ggButton" id="btnGGEpsilon" data-id="ggEpsilon" data-gate_id="5">Epsilon</button>
                </div>
                <div>
                    <button class="ggButton" id="btnGGZeta" data-id="ggZeta" data-gate_id="6">Zeta</button>
                </div>
                <div>
                    <button class="ggButton" id="btnGGKappa" data-id="ggKappa" data-gate_id="7">Kappa</button>
                </div>
                <div>
                    <button class="ggButton" id="btnGGLambda" data-id="ggLambda" data-gate_id="8">Lambda</button>
                </div>
                <div>
                    <button class="ggButton" id="btnGGKuiper" data-id="ggKuiper" data-gate_id="9">Kuiper</button>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-xs-6">
                <div class="ggGatePanel ggAlpha">
                    <img src="/resources/images/gg/gate_1_<?php echo $alpha; ?>.png"
                         id="imgGGAlpha">
                    <div class="ggStats" id="ggStatAlpha">
                        <small>GG α</small>
                        <?php echo $alpha; ?>/34
                        <div<?php if($alpha!=$total_parts[1]){ echo ' style="display:none;"'; }?> id="divPreAlpha">
                            <button class="btn <?php if($pre_alpha){ echo 'btn-danger'; }else{ echo 'btn-info'; } ?> btnGGPrepare" id="btnPreAlpha" data-id="1">PREPARE</button>
                        </div>
                    </div>
                </div>
                <div class="ggGatePanel ggBeta" style="display: none;">
                    <img src="/resources/images/gg/gate_2_<?php echo $beta; ?>.png"
                         id="imgGGBeta">
                    <div class="ggStats" id="ggStatBeta">
                        <small>GG β</small>
                        <?php echo $beta; ?>/48
                        <div<?php if($beta!=$total_parts[2]){ echo ' style="display:none;"'; }?> id="divPreBeta">
                            <button class="btn <?php if($pre_beta){ echo 'btn-danger'; }else{ echo 'btn-info'; } ?> btnGGPrepare" id="btnPreBeta" data-id="2">PREPARE</button>
                        </div>
                    </div>
                </div>
                <div class="ggGatePanel ggGama" style="display: none;">
                    <img src="/resources/images/gg/gate_3_<?php echo $gamma; ?>.png"
                         id="imgGGGamma">
                    <div class="ggStats" id="ggStatGama">
                        <small>GG γ</small>
                        <?php echo $gamma; ?>/82
                        <div<?php if($gamma!=$total_parts[3]){ echo ' style="display:none;"'; }?> id="divPreGamma">
                            <button class="btn <?php if($pre_gamma){ echo 'btn-danger'; }else{ echo 'btn-info'; } ?> btnGGPrepare" id="btnPreGamma" data-id="3">PREPARE</button>
                        </div>
                    </div>
                </div>
                <div class="ggGatePanel ggDelta" style="display: none;">
                    <img src="/resources/images/gg/gate_4_<?php echo $delta; ?>.png"
                         id="imgGGDelta">
                    <div class="ggStats" id="ggStatDelta">
                        <small>GG δ</small>
                        <?php echo $delta; ?>/128
                        <div<?php if($delta!=$total_parts[4]){ echo ' style="display:none;"'; }?> id="divPreDelta">
                            <button class="btn <?php if($pre_delta){ echo 'btn-danger'; }else{ echo 'btn-info'; } ?> btnGGPrepare" id="btnPreDelta" data-id="4">PREPARE</button>
                        </div>
                    </div>
                </div>

                <div class="ggGatePanel ggEpsilon" style="display: none;">
                    <img src="/resources/images/gg/gate_5_<?php echo $epsilon; ?>.png"
                         id="imgGGEpsilon">
                    <div class="ggStats" id="ggStatEpsilon">
                        <small>GG ε</small>
                        <?php echo $epsilon; ?>/99
                        <div<?php if($epsilon!=$total_parts[5]){ echo ' style="display:none;"'; }?> id="divPreEpsilon">
                            <button class="btn <?php if($pre_epsilon){ echo 'btn-danger'; }else{ echo 'btn-info'; } ?> btnGGPrepare" id="btnPreEpsilon" data-id="5">PREPARE</button>
                        </div>
                    </div>
                </div>

                <div class="ggGatePanel ggZeta" style="display: none;">
                    <img src="/resources/images/gg/gate_6_<?php echo $zeta; ?>.png"
                         id="imgGGZeta">
                    <div class="ggStats" id="ggStatZeta">
                        <small>GG ζ</small>
                        <?php echo $zeta; ?>/111
                        <div<?php if($zeta!=$total_parts[6]){ echo ' style="display:none;"'; }?> id="divPreZeta">
                            <button class="btn <?php if($pre_zeta){ echo 'btn-danger'; }else{ echo 'btn-info'; } ?> btnGGPrepare" id="btnPreZeta" data-id="6">PREPARE</button>
                        </div>
                    </div>
                </div>

                <div class="ggGatePanel ggKappa" style="display: none;">
                    <img src="/resources/images/gg/gate_7_<?php echo $kappa; ?>.png"
                         id="imgGGKappa">
                    <div class="ggStats" id="ggStatKappa">
                        <small>GG κ</small>
                        <?php echo $kappa; ?>/120
                        <div<?php if($kappa!=$total_parts[7]){ echo ' style="display:none;"'; }?> id="divPreKappa">
                            <button class="btn <?php if($pre_kappa){ echo 'btn-danger'; }else{ echo 'btn-info'; } ?> btnGGPrepare" id="btnPreKappa" data-id="7">PREPARE</button>
                        </div>
                    </div>
                </div>

                <div class="ggGatePanel ggLambda" style="display: none;">
                    <img src="/resources/images/gg/gate_8_<?php echo $lambda; ?>.png"
                         id="imgGGLambda">
                    <div class="ggStats" id="ggStatLambda">
                        <small>GG λ</small>
                        <?php echo $lambda; ?>/45
                        <div<?php if($lambda!=$total_parts[8]){ echo ' style="display:none;"'; }?> id="divPreLambda">
                            <button class="btn <?php if($pre_lambda){ echo 'btn-danger'; }else{ echo 'btn-info'; } ?> btnGGPrepare" id="btnPreLambda" data-id="8">PREPARE</button>
                        </div>
                    </div>
                </div>

                <div class="ggGatePanel ggKuiper" style="display: none;">
                    <img src="/resources/images/gg/gate_9_<?php echo $kuiper; ?>.png"
                         id="imgGGKuiper">
                    <div class="ggStats" id="ggStatKuiper">
                        <small>GG ς</small>
                        <?php echo $kuiper; ?>/100
                        <div<?php if($kuiper!=$total_parts[9]){ echo ' style="display:none;"'; }?> id="divPreKuiper">
                            <button class="btn <?php if($pre_kuiper){ echo 'btn-danger'; }else{ echo 'btn-info'; } ?> btnGGPrepare" id="btnPreKuiper" data-id="9">PREPARE</button>
                        </div>
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