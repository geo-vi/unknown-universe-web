<?php
/**
 * Created by PhpStorm.
 * User: savasyildirim
 * Date: 11.03.2019
 * Time: 23:37
 */

$requireds = array(
    'gate_id' => 'Galaxy Gate',
    'energy'  => 'Energy'
);
foreach ($requireds as $required => $name) {
    if (!isset($_POST[$required])) {
        response(array('success' => false, 'message' => 'Please select ' . $name));
    }
}

$activeGates = array(
    1 => 'Alpha',
    2 => 'Beta',
    3 => 'Gamma',
    4 => 'Delta',
    6 => 'Zeta'
);

$gate_id = intval($_POST['gate_id']);
$energy = intval($_POST['energy']);
if (!isset($activeGates[$gate_id])) {
    response(array('success' => false, 'message' => 'This gate is not activated!'));
}

if ($energy <= 0 OR ($energy != 1 ANd $energy != 5 AND $energy != 10 AND $energy != 50 AND $energy != 100)) {
    response(array('success' => false, 'message' => 'Select Energy!'));
}

// Ammo:  %67 (1-66)
// Xenomit: %12  (67-78)
// GG Parts: %21 (79-100)

$won_ammo_list = array(
    array('cat' => 'laser', 'name' => 'UCB-100', 'column' => 'UCB_100', 'piece' => 200),
    array('cat' => 'laser', 'name' => 'UCB-100', 'column' => 'UCB_100', 'piece' => 280),
    array('cat' => 'laser', 'name' => 'SAB-50', 'column' => 'SAB_50', 'piece' => 300),
    array('cat' => 'laser', 'name' => 'SAB-50', 'column' => 'SAB_50', 'piece' => 320),
    array('cat' => 'laser', 'name' => 'MCB-50', 'column' => 'MCB_50', 'piece' => 400),
    array('cat' => 'laser', 'name' => 'MCB-50', 'column' => 'MCB_50', 'piece' => 450),
    array('cat' => 'laser', 'name' => 'MCB-25', 'column' => 'MCB_25', 'piece' => 500),
    array('cat' => 'laser', 'name' => 'MCB-25', 'column' => 'MCB_25', 'piece' => 600),
    array('cat' => 'rocket', 'name' => 'PLT-2021', 'column' => 'PLT_2021', 'piece' => 100),
);

//Where is xenom? I cant found in DB. Give ECO-10 now...
$won_xenomit_list = array(
    array('cat' => 'rocket', 'name' => 'ECO-10', 'column' => 'ECO_10', 'piece' => 150),
    array('cat' => 'rocket', 'name' => 'ECO-10', 'column' => 'ECO_10', 'piece' => 200),
    array('cat' => 'rocket', 'name' => 'ECO-10', 'column' => 'ECO_10', 'piece' => 250),
    array('cat' => 'rocket', 'name' => 'ECO-10', 'column' => 'ECO_10', 'piece' => 300),
);


$won_gate_part = array(
    'alpha',
    'beta',
    'gamma'
);

$won_list = array();

for ($i = 1; $i <= $energy; $i++) {

    // Check Energy and Uri:
    $user_energy = 0;
    $user_uridium = 0;

    $energyQuery = $serverSQL->QUERY("SELECT * FROM player_extra_data WHERE USER_ID=? AND PLAYER_ID=?",array($_SESSION['USER_ID'],$playerDetail['PLAYER_ID']));
    if(count($energyQuery)>0){
        $user_energy = $energyQuery[0]['GG_ENERGY'];
    }

    $uridiumQuery = $serverSQL->QUERY("SELECT * FROM player_data WHERE USER_ID=? AND PLAYER_ID=?",array($_SESSION['USER_ID'],$playerDetail['PLAYER_ID']));
    if(count($uridiumQuery)>0){
        $user_uridium = $uridiumQuery[0]['URIDIUM'];
    }

    $use_energy = true;
    $use_uridium = false;
    if ($user_energy < 1) {
        $use_energy = false;
        $use_uridium = true;
        if ($user_uridium < 100) {
            response(array('success' => false, 'message' => "You don't have enough uridium."));
        }
    }

    if ($use_energy) {
        $new_energy = $user_energy - 1;
        if ($new_energy < 0) {
            $new_energy = 0;
        }
        // Set new Energy:
        $serverSQL->QUERY("UPDATE player_extra_data SET GG_ENERGY=? WHERE USER_ID=? AND PLAYER_ID=?",array($new_energy,$_SESSION['USER_ID'],$playerDetail['PLAYER_ID']));
    }

    if ($use_uridium) {
        $new_uridium = $user_uridium - 100;
        if ($new_uridium < 0) {
            $new_uridium = 0;
        }
        // Set new uridium.
        $serverSQL->QUERY("UPDATE player_data SET URIDIUM=? WHERE USER_ID=? AND PLAYER_ID=?",array($new_uridium,$_SESSION['USER_ID'],$playerDetail['PLAYER_ID']));
    }

    $random = rand(1, 100);
    $ammo = false;
    $xenomit = false;
    $gate_part = false;

    if ($random <= 66) {
        $ammo = true;
    } elseif ($random > 66 AND $random <= 78) {
        $xenomit = true;
    } else {
        $gate_part = true;
    }

    if ($ammo) {
        # Win Ammo. Get Random in list:
        $end = count($won_ammo_list) - 1;
        $ammos = $won_ammo_list[rand(0, $end)];
        $won_list[] = $ammos;
        $getOldAmmoQuery = $serverSQL->QUERY("SELECT * FROM player_ammo WHERE USER_ID=? AND PLAYER_ID=?",
            array($_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));
        $getOldAmmo = $getOldAmmoQuery[0];
        $newAmmo = $getOldAmmo[$ammos['column']] + $ammos['piece'];
        $serverSQL->QUERY("UPDATE player_ammo SET " . $ammos['column'] . "=? WHERE USER_ID=? AND PLAYER_ID=?",
            array($newAmmo, $_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));
    }

    if ($xenomit) {
        # Win Xenomit. Get Random in list:
        $end = count($won_xenomit_list) - 1;
        $xenoms = $won_xenomit_list[rand(0, $end)];
        $won_list[] = $xenoms;

        # !!!!! TODO: CHANGE THIS IF YOU FIND XENOMIT !!!!
        $getOldAmmoQuery = $serverSQL->QUERY("SELECT * FROM player_ammo WHERE USER_ID=? AND PLAYER_ID=?",
            array($_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));
        $getOldAmmo = $getOldAmmoQuery[0];
        $newAmmo = $getOldAmmo[$xenoms['column']] + $xenoms['piece'];
        $serverSQL->QUERY("UPDATE player_ammo SET " . $xenoms['column'] . "=? WHERE USER_ID=? AND PLAYER_ID=?",
            array($newAmmo, $_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));
        # END OF AMMO
    }

    if ($gate_part) {
        // If user selected Alpha, Beta and Gamma Gates;
        if ($gate_id <= 3) {
            $get_random_part = $won_gate_part[rand(0, 2)];
            if ($get_random_part == 'alpha') {
                # Alpha Control
                $getGates = $serverSQL->QUERY("SELECT * FROM player_galaxy_gates WHERE USER_ID=?",
                    array($_SESSION['USER_ID']));

                if (count($getGates) > 0) {
                    $getGatesDetail = $getGates[0];
                    $alpha_parts = $getGatesDetail['ALPHA_PARTS'];
                    if ($alpha_parts >= 34) {
                        // Alpha is finished but user not click "Ready" button. Give ammo.
                        $end = count($won_ammo_list) - 1;
                        $ammos = $won_ammo_list[rand(0, $end)];
                        $won_list[] = $ammos;

                        $getOldAmmoQuery = $serverSQL->QUERY("SELECT * FROM player_ammo WHERE USER_ID=? AND PLAYER_ID=?",
                            array($_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));
                        $getOldAmmo = $getOldAmmoQuery[0];
                        $newAmmo = $getOldAmmo[$ammos['column']] + $ammos['piece'];
                        $serverSQL->QUERY("UPDATE player_ammo SET " . $ammos['column'] . "=? WHERE USER_ID=? AND PLAYER_ID=?",
                            array($newAmmo, $_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));

                    } else {
                        $won_list[] = array('name' => 'alpha', 'piece' => $alpha_parts + 1);
                        $serverSQL->QUERY("UPDATE player_galaxy_gates SET ALPHA_PARTS=? WHERE USER_ID=? AND PLAYER_ID=?",
                            array(($alpha_parts + 1), $_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));
                    }
                } else {
                    $serverSQL->QUERY("INSERT INTO player_galaxy_gates (USER_ID,PLAYER_ID,ALPHA_PARTS,ALPHA_PREPARED,BETA_PARTS,BETA_PREPARED,GAMMA_PARTS,GAMMA_PREPARED,DELTA_PARTS,DELTA_PREPARED) VALUES (?,?,?,?,?,?,?,?,?,?)",
                        array($_SESSION['USER_ID'], $playerDetail['PLAYER_ID'], 1, 0, 0, 0, 0, 0, 0, 0));
                    $won_list[] = array('name' => 'alpha', 'piece' => 1);
                }

            } elseif ($get_random_part == 'beta') {
                # Beta Control

                $getGates = $serverSQL->QUERY("SELECT * FROM player_galaxy_gates WHERE USER_ID=?",
                    array($_SESSION['USER_ID']));

                if (count($getGates) > 0) {
                    $getGatesDetail = $getGates[0];
                    $beta_parts = $getGatesDetail['BETA_PARTS'];
                    if ($beta_parts >= 48) {
                        // Beta is finished but user not click "Ready" button. Give ammo.
                        $end = count($won_ammo_list) - 1;
                        $ammos = $won_ammo_list[rand(0, $end)];
                        $won_list[] = $ammos;

                        $getOldAmmoQuery = $serverSQL->QUERY("SELECT * FROM player_ammo WHERE USER_ID=? AND PLAYER_ID=?",
                            array($_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));
                        $getOldAmmo = $getOldAmmoQuery[0];
                        $newAmmo = $getOldAmmo[$ammos['column']] + $ammos['piece'];
                        $serverSQL->QUERY("UPDATE player_ammo SET " . $ammos['column'] . "=? WHERE USER_ID=? AND PLAYER_ID=?",
                            array($newAmmo, $_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));

                    } else {
                        $won_list[] = array('name' => 'beta', 'piece' => $beta_parts + 1);
                        $serverSQL->QUERY("UPDATE player_galaxy_gates SET BETA_PARTS=? WHERE USER_ID=? AND PLAYER_ID=?",
                            array(($beta_parts + 1), $_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));
                    }
                } else {
                    $serverSQL->QUERY("INSERT INTO player_galaxy_gates (USER_ID,PLAYER_ID,ALPHA_PARTS,ALPHA_PREPARED,BETA_PARTS,BETA_PREPARED,GAMMA_PARTS,GAMMA_PREPARED,DELTA_PARTS,DELTA_PREPARED) VALUES (?,?,?,?,?,?,?,?,?,?)",
                        array($_SESSION['USER_ID'], $playerDetail['PLAYER_ID'], 0, 0, 1, 0, 0, 0, 0, 0));
                    $won_list[] = array('name' => 'beta', 'piece' => 1);
                }

            } else {
                # Gamma Control

                $getGates = $serverSQL->QUERY("SELECT * FROM player_galaxy_gates WHERE USER_ID=? AND PLAYER_ID=?",
                    array($_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));

                if (count($getGates) > 0) {
                    $getGatesDetail = $getGates[0];
                    $gamma_parts = $getGatesDetail['GAMMA_PARTS'];
                    if ($gamma_parts >= 82) {
                        // Gamma is finished but user not click "Ready" button. Give ammo.
                        $end = count($won_ammo_list) - 1;
                        $ammos = $won_ammo_list[rand(0, $end)];
                        $won_list[] = $ammos;

                        $getOldAmmoQuery = $serverSQL->QUERY("SELECT * FROM player_ammo WHERE USER_ID=? AND PLAYER_ID=?",
                            array($_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));
                        $getOldAmmo = $getOldAmmoQuery[0];
                        $newAmmo = $getOldAmmo[$ammos['column']] + $ammos['piece'];
                        $serverSQL->QUERY("UPDATE player_ammo SET " . $ammos['column'] . "=? WHERE USER_ID=? AND PLAYER_ID=?",
                            array($newAmmo, $_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));

                    } else {
                        $won_list[] = array('name' => 'gamma', 'piece' => $gamma_parts + 1);
                        $serverSQL->QUERY("UPDATE player_galaxy_gates SET GAMMA_PARTS=? WHERE USER_ID=? AND PLAYER_ID=?",
                            array(($gamma_parts + 1), $_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));
                    }
                } else {
                    $serverSQL->QUERY("INSERT INTO player_galaxy_gates (USER_ID,PLAYER_ID,ALPHA_PARTS,ALPHA_PREPARED,BETA_PARTS,BETA_PREPARED,GAMMA_PARTS,GAMMA_PREPARED,DELTA_PARTS,DELTA_PREPARED) VALUES (?,?,?,?,?,?,?,?,?,?)",
                        array($_SESSION['USER_ID'], $playerDetail['PLAYER_ID'], 0, 0, 0, 0, 1, 0, 0, 0));
                    $won_list[] = array('name' => 'gamma', 'piece' => 1);
                }

            }
            // for Delta and Zeta Gates
        } else {
            # Set +1 by gate id (Control first)

            if ($gate_id == 4) {
                # Delta:

                $getGates = $serverSQL->QUERY("SELECT * FROM player_galaxy_gates WHERE USER_ID=?",
                    array($_SESSION['USER_ID']));

                if (count($getGates) > 0) {
                    $getGatesDetail = $getGates[0];
                    $delta_parts = $getGatesDetail['DELTA_PARTS'];
                    if ($delta_parts >= 128) {
                        // Delta is finished but user not click "Ready" button. Give ammo.
                        $end = count($won_ammo_list) - 1;
                        $ammos = $won_ammo_list[rand(0, $end)];
                        $won_list[] = $ammos;

                        $getOldAmmoQuery = $serverSQL->QUERY("SELECT * FROM player_ammo WHERE USER_ID=? AND PLAYER_ID=?",
                            array($_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));
                        $getOldAmmo = $getOldAmmoQuery[0];
                        $newAmmo = $getOldAmmo[$ammos['column']] + $ammos['piece'];
                        $serverSQL->QUERY("UPDATE player_ammo SET " . $ammos['column'] . "=? WHERE USER_ID=? AND PLAYER_ID=?",
                            array($newAmmo, $_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));

                    } else {
                        $won_list[] = array('name' => 'delta', 'piece' => $delta_parts + 1);
                        $serverSQL->QUERY("UPDATE player_galaxy_gates SET DELTA_PARTS=? WHERE USER_ID=? AND PLAYER_ID=?",
                            array(($delta_parts + 1), $_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));
                    }
                } else {
                    $serverSQL->QUERY("INSERT INTO player_galaxy_gates (USER_ID,PLAYER_ID,ALPHA_PARTS,ALPHA_PREPARED,BETA_PARTS,BETA_PREPARED,GAMMA_PARTS,GAMMA_PREPARED,DELTA_PARTS,DELTA_PREPARED) VALUES (?,?,?,?,?,?,?,?,?,?)",
                        array($_SESSION['USER_ID'], $playerDetail['PLAYER_ID'], 0, 0, 0, 0, 0, 0, 1, 0));
                    $won_list[] = array('name' => 'delta', 'piece' => 1);
                }

            } else {
                # Zeta

                $getGates = $serverSQL->QUERY("SELECT * FROM player_galaxy_gates WHERE USER_ID=?",
                    array($_SESSION['USER_ID']));

                if (count($getGates) > 0) {
                    $getGatesDetail = $getGates[0];
                    $delta_parts = $getGatesDetail['DELTA_PARTS'];
                    if ($delta_parts >= 128) {
                        // Zeta is finished but user not click "Ready" button. Give ammo.
                        $end = count($won_ammo_list) - 1;
                        $ammos = $won_ammo_list[rand(0, $end)];
                        $won_list[] = $ammos;

                        $getOldAmmoQuery = $serverSQL->QUERY("SELECT * FROM player_ammo WHERE USER_ID=? AND PLAYER_ID=?",
                            array($_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));
                        $getOldAmmo = $getOldAmmoQuery[0];
                        $newAmmo = $getOldAmmo[$ammos['column']] + $ammos['piece'];
                        $serverSQL->QUERY("UPDATE player_ammo SET " . $ammos['column'] . "=? WHERE USER_ID=? AND PLAYER_ID=?",
                            array($newAmmo, $_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));

                    } else {
                        $won_list[] = array('name' => 'delta', 'piece' => $delta_parts + 1);
                        $serverSQL->QUERY("UPDATE player_galaxy_gates SET DELTA_PARTS=? WHERE USER_ID=? AND PLAYER_ID=?",
                            array(($delta_parts + 1), $_SESSION['USER_ID'], $playerDetail['PLAYER_ID']));
                    }
                } else {
                    $serverSQL->QUERY("INSERT INTO player_galaxy_gates (USER_ID,PLAYER_ID,ALPHA_PARTS,ALPHA_PREPARED,BETA_PARTS,BETA_PREPARED,GAMMA_PARTS,GAMMA_PREPARED,DELTA_PARTS,DELTA_PREPARED) VALUES (?,?,?,?,?,?,?,?,?,?)",
                        array($_SESSION['USER_ID'], $playerDetail['PLAYER_ID'], 0, 0, 0, 0, 0, 0, 1, 0));
                    $won_list[] = array('name' => 'delta', 'piece' => 1);
                }
            }
        }
    }
}



$user_last_energy = 0;
$user_last_uridium = 0;

$energyQuery2 = $serverSQL->QUERY("SELECT * FROM player_extra_data WHERE USER_ID=? AND PLAYER_ID=?",array($_SESSION['USER_ID'],$playerDetail['PLAYER_ID']));
if(count($energyQuery2)>0){
    $user_last_energy = $energyQuery2[0]['GG_ENERGY'];
}

$uridiumQuery2 = $serverSQL->QUERY("SELECT * FROM player_data WHERE USER_ID=? AND PLAYER_ID=?",array($_SESSION['USER_ID'],$playerDetail['PLAYER_ID']));
if(count($uridiumQuery2)>0){
    $user_last_uridium = $uridiumQuery2[0]['URIDIUM'];
}

response(array('success' => true, 'message' => '', 'data' => $won_list,'energy'=>$user_last_energy,'uridium'=>$user_last_uridium));