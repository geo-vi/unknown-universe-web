<?php
/**
 * Created by PhpStorm.
 * User: savasyildirim
 * Date: 13.03.2019
 * Time: 01:30
 */

$getGates = $serverSQL->QUERY("SELECT * FROM player_galaxy_gates WHERE USER_ID=? AND PLAYER_ID=?",
    array($_SESSION['USER_ID'],$playerDetail['PLAYER_ID']));

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

if(count($getGates)>0){
    $gates = $getGates[0];
    switch ($_POST['gate_id']){
        case 1:
            if($gates['ALPHA_PREPARED']>0){
                response(array('success'=>false,'message'=>'You cant prepared. You have a gate now. Finish it first.'));
            }else{
                if($gates['ALPHA_PARTS'] == $total_parts[1]){
                    $zero_wave = json_encode(array('wave'=>1,'total_died'=>0));
                    $serverSQL->QUERY("UPDATE player_galaxy_gates SET ALPHA_PARTS=?,ALPHA_PREPARED=?,ALPHA_WAVE=?,ALPHA_LIVES=?",array(0,1,$zero_wave,5));
                    response(array('success'=>true,'message'=>'Gate is prepared!'));
                }else{
                    response(array('success'=>false,'message'=>'Error! Your gate is not ready!'));
                }
            }
            break;
        case 2:
            if($gates['BETA_PREPARED']>0){
                response(array('success'=>false,'message'=>'You cant prepared. You have a gate now. Finish it first.'));
            }else{
                if($gates['BETA_PARTS'] == $total_parts[2]){
                    $zero_wave = json_encode(array('wave'=>1,'total_died'=>0));
                    $serverSQL->QUERY("UPDATE player_galaxy_gates SET BETA_PARTS=?,BETA_PREPARED=?,BETA_WAVE=?,BETA_LIVES=?",array(0,1,$zero_wave,5));
                    response(array('success'=>true,'message'=>'Gate is prepared!'));
                }else{
                    response(array('success'=>false,'message'=>'Error! Your gate is not ready!'));
                }
            }
            break;
        case 3:
            if($gates['GAMMA_PREPARED']>0){
                response(array('success'=>false,'message'=>'You cant prepared. You have a gate now. Finish it first.'));
            }else{
                if($gates['GAMMA_PARTS'] == $total_parts[3]){
                    $zero_wave = json_encode(array('wave'=>1,'total_died'=>0));
                    $serverSQL->QUERY("UPDATE player_galaxy_gates SET GAMMA_PARTS=?,GAMMA_PREPARED=?,GAMMA_WAVE=?,GAMMA_LIVES=?",array(0,1,$zero_wave,5));
                    response(array('success'=>true,'message'=>'Gate is prepared!'));
                }else{
                    response(array('success'=>false,'message'=>'Error! Your gate is not ready!'));
                }
            }
            break;
        case 4:
            if($gates['DELTA_PREPARED']>0){
                response(array('success'=>false,'message'=>'You cant prepared. You have a gate now. Finish it first.'));
            }else{
                if($gates['DELTA_PARTS'] == $total_parts[4]){
                    $zero_wave = json_encode(array('wave'=>1,'total_died'=>0));
                    $serverSQL->QUERY("UPDATE player_galaxy_gates SET DELTA_PARTS=?,DELTA_PREPARED=?,DELTA_WAVE=?,DELTA_LIVES=?",array(0,1,$zero_wave,5));
                    response(array('success'=>true,'message'=>'Gate is prepared!'));
                }else{
                    response(array('success'=>false,'message'=>'Error! Your gate is not ready!'));
                }
            }
            break;
        case 5:
            if($gates['EPSILON_PREPARED']>0){
                response(array('success'=>false,'message'=>'You cant prepared. You have a gate now. Finish it first.'));
            }else{
                if($gates['EPSILON_PARTS'] == $total_parts[5]){
                    $zero_wave = json_encode(array('wave'=>1,'total_died'=>0));
                    $serverSQL->QUERY("UPDATE player_galaxy_gates SET EPSILON_PARTS=?,EPSILON_PREPARED=?,EPSILON_WAVE=?,EPSILON_LIVES=?",array(0,1,$zero_wave,5));
                    response(array('success'=>true,'message'=>'Gate is prepared!'));
                }else{
                    response(array('success'=>false,'message'=>'Error! Your gate is not ready!'));
                }
            }
            break;
        case 6:
            if($gates['ZETA_PREPARED']>0){
                response(array('success'=>false,'message'=>'You cant prepared. You have a gate now. Finish it first.'));
            }else{
                if($gates['ZETA_PARTS'] == $total_parts[6]){
                    $zero_wave = json_encode(array('wave'=>1,'total_died'=>0));
                    $serverSQL->QUERY("UPDATE player_galaxy_gates SET ZETA_PARTS=?,ZETA_PREPARED=?,ZETA_WAVE=?,ZETA_LIVES=?",array(0,1,$zero_wave,5));
                    response(array('success'=>true,'message'=>'Gate is prepared!'));
                }else{
                    response(array('success'=>false,'message'=>'Error! Your gate is not ready!'));
                }
            }
            break;
        case 7:
            if($gates['KAPPA_PREPARED']>0){
                response(array('success'=>false,'message'=>'You cant prepared. You have a gate now. Finish it first.'));
            }else{
                if($gates['KAPPA_PARTS'] == $total_parts[7]){
                    $zero_wave = json_encode(array('wave'=>1,'total_died'=>0));
                    $serverSQL->QUERY("UPDATE player_galaxy_gates SET KAPPA_PARTS=?,KAPPA_PREPARED=?,KAPPA_WAVE=?,KAPPA_LIVES=?",array(0,1,$zero_wave,5));
                    response(array('success'=>true,'message'=>'Gate is prepared!'));
                }else{
                    response(array('success'=>false,'message'=>'Error! Your gate is not ready!'));
                }
            }
            break;
        case 8:
            if($gates['LAMBDA_PREPARED']>0){
                response(array('success'=>false,'message'=>'You cant prepared. You have a gate now. Finish it first.'));
            }else{
                if($gates['LAMBDA_PARTS'] == $total_parts[8]){
                    $zero_wave = json_encode(array('wave'=>1,'total_died'=>0));
                    $serverSQL->QUERY("UPDATE player_galaxy_gates SET LAMBDA_PARTS=?,LAMBDA_PREPARED=?,LAMBDA_WAVE=?,LAMBDA_LIVES=?",array(0,1,$zero_wave,5));
                    response(array('success'=>true,'message'=>'Gate is prepared!'));
                }else{
                    response(array('success'=>false,'message'=>'Error! Your gate is not ready!'));
                }
            }
            break;
        case 9:
            if($gates['KUIPER_PREPARED']>0){
                response(array('success'=>false,'message'=>'You cant prepared. You have a gate now. Finish it first.'));
            }else{
                if($gates['KUIPER_PARTS'] == $total_parts[9]){
                    $zero_wave = json_encode(array('wave'=>1,'total_died'=>0));
                    $serverSQL->QUERY("UPDATE player_galaxy_gates SET KUIPER_PARTS=?,KUIPER_PREPARED=?,KUIPER_WAVE=?,KUIPER_LIVES=?",array(0,1,$zero_wave,5));
                    response(array('success'=>true,'message'=>'Gate is prepared!'));
                }else{
                    response(array('success'=>false,'message'=>'Error! Your gate is not ready!'));
                }
            }
            break;
        default:
            response(array('success'=>false,'message'=>'Hey!! Stop or ban!'));
            break;
    }
}else{
    response(array('success'=>false,'message'=>'Error! Your gate is not ready!'));
}