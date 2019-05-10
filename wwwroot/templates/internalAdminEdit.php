<?php
if (isset($_POST['action']) && $_POST['action'] == "edit") {
    $ship_id      = $_POST['ship_id'];
    $shop         = $_POST['inShop'];
    $shiphp       = $_POST['ship_hp'];
    $nano         = $_POST['nanohull'];
    $shield       = $_POST['shield'];
    $lootid       = $_POST['loot_id'];
    $shieldAbsorb = $_POST['shield_abs'];
    $minDamage    = $_POST['minDmg'];
    $maxDamage    = $_POST['maxDmg'];
    $speed        = $_POST['base_speed'];
    $lasers       = $_POST['lasers'];
    $heavy        = $_POST['heavy'];
    $generator    = $_POST['generator'];
    $batteries    = $_POST['batteries'];
    $rockets      = $_POST['rockets'];
    $extra        = $_POST['extras'];
    $gear         = $_POST['gear'];
    $protocols    = $_POST['protocols'];
    $cargo        = $_POST['cargo'];
    $credits      = $_POST['credits'];
    $uri          = $_POST['uri'];
    if (isset($_POST['sub_action']) && $_POST['sub_action'] == 'edit_ship') {
        $System->Game->editShip($shop, $lootid, $shiphp, $nano, $shield, $shieldAbsorb, $minDamage, $maxDamage, $speed, $lasers, $heavy, $generator, $batteries, $rockets, $extra, $gear, $protocols, $cargo, $credits, $uri, $ship_id);
    } else if (isset($_POST['sub_action']) && $_POST['sub_action'] == 'create_ship') {
        $System->Game->createShip($name, $shop, $lootid, $shiphp, $nano, $shield, $shieldAbsorb, $minDamage, $maxDamage, $speed, $laserid, $lasers, $heavy, $generator, $batteries, $rockets, $extra, $gear, $protocols, $cargo, $credits, $uri, $ship_id);
    }
}
$variable = [['id' => '2', 'class' => 'NPC', 'title' => 'NPC Editor', 'sub_action' => 'edit_npc',],
             ['id' => '3', 'class' => 'PET', 'title' => 'PET Editor', 'sub_action' => 'edit_pet',],]
?>
<div class="shop-body clearfix">
    <div class="shop-header">
        <nav class="shop-navigation">
            <ul class="nav nav-justified">
                <li class="nav-ships active"><a
                            onclick="admin('ship');" href="#"></a></li>
                <li class="nav-npc"><a
                            onclick="admin('NPC');" href="#"></a></li>
                <li class="nav-pet"><a
                            onclick="admin('PET');" href="#"></a></li>
                <li class="top-user"><a
                            onclick="hof('topuser');" href="#"></a></li>
                <!--
            <li class="top-clan"><a
                onclick="hof('player_auction');" href="#"></a></li>
            <li class="top-gg"><a
                onclick="hof('player_auction');" href="#"></a></li>
            <li class="top-event"><a
                onclick="hof('player_auction');" href="#"></a></li>
            -->
            </ul>
        </nav>
    </div>

    <div id="ship" style="display: block;" class="shop-inner clearfix">
        <div class="single-item-header">
            <div class="single-item-headert">
                <h3>Ship Editor</h3>
            </div>
        </div>
        <?php
        $id = $System->Game->getShipsByType(1);
        foreach ($id as $go) {
            $ships = $System->Game->getShipsByID($go['ship_id']);
            foreach ($ships as $ship) {
                $name = $ship['ship_lootid'];
                if ($name == 'ship_aegis' || $name == 'ship_citadel' || $name == 'ship_spearhead') {
                    $name .= '-' . $System->User->getFactionName();
                }
                $name = str_replace('_', '/', $name);
                switch ($ship['inShop']) {
                    case 1:
                        $shop   = 'Yes';
                        $value  = '0';
                        $saying = 'No';
                        break;
                    case 0:
                        $shop   = 'No';
                        $value  = '1';
                        $saying = 'Yes';
                        break;
                }
                ?>
                <div class="single-item col-xs-12">
                    <div class="single-item-inner">
                        <div class="single-item-image">
                            <img id="ship_img" src="../resources/images/items/<?php echo $name ?>_top.png">
                        </div>
                        <div class="single-item-content">
                            <form action="" method="POST">
                                <input type="hidden" name="ship_id" value="<?= $ship['ship_id'] ?>">
                                <input type="hidden" name="action" value="edit">
                                <input type="hidden" name="sub_action" value="edit_ship">
                                <div class="single-item-description col-xs-8">
                                    <h3><?= $ship['name']; ?></h3>
                                    <ul>
                                        <li>Shield Absorbtion: <input style="margin-left: 18px;"
                                                                      type="text"
                                                                      name="shield_abs"
                                                                      value="<?= $ship['shieldAbsorb']; ?>"></li>
                                        <p>
                                        <li>Loot ID:
                                            <input style="margin-left: 86px;"
                                                   type="text"
                                                   id="loot_id"
                                                   name="loot_id"
                                                   value="<?= $ship['ship_lootid'] ?>"></li>
                                        <p>
                                        <li>Ship HP: <input style="margin-left: 84px;"
                                                            type="text"
                                                            name="ship_hp"
                                                            value="<?= $ship['ship_hp']; ?>"></li>
                                        <p>
                                        <li>Nanohull: <input style="margin-left: 68px;"
                                                             type="text"
                                                             name="nanohull"
                                                             value="<?= $ship['nanohull']; ?>"></li>
                                        <p>
                                        <li>Shield: <input style="margin-left: 89px;"
                                                           type="text"
                                                           name="shield"
                                                           value="<?= $ship['shield']; ?>"></li>
                                        <p>
                                        <li>Speed: <input style="margin-left: 93px;"
                                                          type="text"
                                                          name="base_speed"
                                                          value="<?= $ship['base_speed']; ?>"></li>
                                        <p>
                                        <li>Min Damage: <input style="margin-left: 57px;"
                                                               type="text"
                                                               name="minDmg"
                                                               value="<?= $ship['minDamage']; ?>"></li>
                                        <p>
                                        <li>Max Damage: <input style="margin-left: 18px;"
                                                               type="text"
                                                               name="maxDmg"
                                                               value="<?= $ship['maxDamage']; ?>"></li>
                                        <p>
                                        <li>Lasers: <input style="margin-left: 51px;"
                                                           type="text"
                                                           name="lasers"
                                                           value="<?= $ship['laser']; ?>"></li>
                                        <p>
                                        <li>Heavy: <input style="margin-left: 56px;"
                                                          type="text"
                                                          name="heavy"
                                                          value="<?= $ship['heavy']; ?>"></li>
                                        <p>
                                        <li>Extras: <input style="margin-left: 50px;"
                                                           type="text"
                                                           name="extras"
                                                           value="<?= $ship['extra']; ?>"></li>
                                        <p>
                                        <li>Generators: <input style="margin-left: 21px;"
                                                               type="text"
                                                               name="generator"
                                                               value="<?= $ship['generator']; ?>"></li>
                                        <p>
                                        <li>Gear: <input style="margin-left: 63px;"
                                                         type="text"
                                                         name="gear"
                                                         value="<?= $ship['gear']; ?>"></li>
                                        <p>
                                        <li>Protocols: <input style="margin-left: 27px;"
                                                              type="text"
                                                              name="protocols"
                                                              value="<?= $ship['protocols']; ?>"></li>
                                        <p>
                                        <li>Batteries: <input style="margin-left: 15px;"
                                                              type="text"
                                                              name="batteries"
                                                              value="<?= $ship['batteries']; ?>"></li>
                                        <p>
                                        <li>Rockets: <input style="margin-left: 23px;"
                                                            type="text"
                                                            name="rockets"
                                                            value="<?= $ship['rockets']; ?>"></li>
                                        <p>
                                        <li>cargo: <input style="margin-left: 35px;"
                                                          type="text"
                                                          name="cargo"
                                                          value="<?= $ship['cargo']; ?>"></li>
                                        <p>
                                        <li>Credits: <input style="margin-left: 28px;"
                                                            type="text"
                                                            name="credits"
                                                            value="<?= $ship['price_cre']; ?>"></li>
                                        <p>
                                        <li>Uridium: <input style="margin-left: 27px;"
                                                            type="text"
                                                            name="uri"
                                                            value="<?= $ship['price_uri']; ?>"></li>
                                        <p>
                                        <li style="margin-top:15px;">In Shop:
                                            <select name="inShop" style="background:transparent;margin-left:50px;">
                                                <option value='<?= $ship['inShop'] ?>'
                                                        selected="selected"
                                                        style="background:transparent;color:black;"><?php echo $shop; ?></option>
                                                <option value='<?= $value ?>'
                                                        style="background:transparent;color:black;"><?php echo $saying; ?></option>
                                            </select>
                                        </li>
                                        <p>
                                    </ul>
                                </div>
                                <div class="single-item-buy-menu col-xs-4">
                                    <input class="btn-primary btn-block btn-lg" type="submit" value="Edit Ship">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
    </div>

    <?php
    foreach ($variable as $var) {
        $id        = $var['id'];
        $type      = $var['class'];
        $h3        = $var['title'];
        $subaction = $var['sub_action'];

        ?>
        <div id="<?php echo $type ?>" style="display:none" class="shop-inner clearfix">
            <div class="single-item-header">
                <div class="single-item-headert">
                    <h3><?= $h3 ?></h3>
                </div>
            </div>
            <?php
            $id = $System->Game->getShipsByType($id);
            foreach ($id as $go) {
                $ships = $System->Game->getShipsByID($go['ship_id']);
                foreach ($ships as $ship) {
                    $name = $ship['ship_lootid'];
                    if ($name == 'ship_aegis' || $name == 'ship_citadel' || $name == 'ship_spearhead') {
                        $name .= '-' . $System->User->getFactionName();
                    }
                    $name = str_replace('_', '/', $name);
                    switch ($ship['inShop']) {
                        case 1:
                            $shop   = 'Yes';
                            $value  = '0';
                            $saying = 'No';
                            break;
                        case 0:
                            $shop   = 'No';
                            $value  = '1';
                            $saying = 'Yes';
                            break;
                    }
                    ?>
                    <div class="single-item col-xs-12">
                        <div class="single-item-inner">
                            <div class="single-item-image-<?= $type ?>">
                                <img id="ship_img" src="../resources/images/items/<?php echo $name ?>.png">
                            </div>
                            <div class="single-item-content-<?= $type ?>">
                                <form action="" method="POST">
                                    <input type="hidden" name="ship_id" value="<?= $ship['ship_id'] ?>">
                                    <input type="hidden" name="action" value="edit">
                                    <input type="hidden" name="sub_action" value="<?= $subaction ?>">
                                    <div class="single-item-description-<?= $type ?> col-xs-8">
                                        <h3><?= $ship['name']; ?></h3>
                                        <ul>
                                            <li>Shield: <input style="margin-left: 89px;"
                                                               type="text"
                                                               name="shield"
                                                               value="<?= $ship['shield']; ?>"></li>
                                            <p>
                                            <li>Shield Absorbtion: <input style="margin-left: 18px;"
                                                                          type="text"
                                                                          name="shield_abs"
                                                                          value="<?= $ship['shieldAbsorb']; ?>"></li>
                                            <p>
                                            <li>Loot ID:
                                                <input style="margin-left: 86px;"
                                                       type="text"
                                                       id="loot_id"
                                                       name="loot_id"
                                                       value="<?= $ship['ship_lootid'] ?>"></li>
                                            <p>
                                            <li><?= $type ?> HP: <input style="margin-left: 88px;"
                                                                        type="text"
                                                                        name="ship_hp"
                                                                        value="<?= $ship['ship_hp']; ?>"></li>
                                            <p>
                                            <li>Speed: <input style="margin-left: 93px;"
                                                              type="text"
                                                              name="base_speed"
                                                              value="<?= $ship['base_speed']; ?>"></li>
                                            <p>
                                                <?php if ( $type == 'PET' ){ ?>
                                            <li>Protocols: <input style="margin-left: 27px;"
                                                                  type="text"
                                                                  name="protocols"
                                                                  value="<?= $ship['protocols']; ?>"></li>
                                            <p>
                                            <li>Generators: <input style="margin-left: 21px;"
                                                                   type="text"
                                                                   name="generator"
                                                                   value="<?= $ship['generator']; ?>"></li>
                                            <p>
                                            <li>Gear: <input style="margin-left: 62px;"
                                                             type="text"
                                                             name="gear"
                                                             value="<?= $ship['gear']; ?>"></li>
                                            <p>
                                            <li>Lasers: <input style="margin-left: 50px;"
                                                               type="text"
                                                               name="lasers"
                                                               value="<?= $ship['laser']; ?>"></li>
                                            <p>
                                                <?php }else if ( $type == 'NPC' ){ ?>
                                            <li>Heavy: <input style="margin-left: 92px;"
                                                              type="text"
                                                              name="heavy"
                                                              value="<?= $ship['heavy']; ?>"></li>
                                            <p>
                                            <li>Min Damage: <input style="margin-left: 57px;"
                                                                   type="text"
                                                                   name="minDmg"
                                                                   value="<?= $ship['minDamage']; ?>"></li>
                                            <p>
                                            <li>Max Damage: <input style="margin-left: 17px;"
                                                                   type="text"
                                                                   name="maxDmg"
                                                                   value="<?= $ship['maxDamage']; ?>"></li>
                                            <p>
                                            <li>Experience: <input style="margin-left: 25px;"
                                                                   type="text"
                                                                   name="protocols"
                                                                   value="<?= $ship['experience']; ?>"></li>
                                            <p>
                                            <li>Honor: <input style="margin-left: 52px;"
                                                              type="text"
                                                              name="generator"
                                                              value="<?= $ship['honor']; ?>"></li>
                                            <p>
                                            <li>Credits: <input style="margin-left: 46px;"
                                                                type="text"
                                                                name="lasers"
                                                                value="<?= $ship['credits']; ?>"></li>
                                            <p>
                                            <li>Uridium: <input style="margin-left: 46px;"
                                                                type="text"
                                                                name="lasers"
                                                                value="<?= $ship['uridium']; ?>"></li>
                                            <p>
                                            <li>Rank Points: <input style="margin-left: 19px;"
                                                                    type="text"
                                                                    name="lasers"
                                                                    value="<?= $ship['rankPoints']; ?>"></li>
                                            <p>
                                                <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="single-item-buy-menu-<?= $type ?> col-xs-4">
                                        <input class="btn-primary btn-block btn-lg"
                                               type="submit"
                                               value="Edit <?= $type ?>">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="item-list col-xs-12 custom-scroll">
                    </div>
                <?php }
            } ?>
        </div>
    <?php } ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#loot_id").change(function () {
            var new_loot = document.getElementById("loot_id").value;
            var res = new_loot.replace('_', '/');
            var str = "../resources/images/items/" + res + "_top.png";
            $("#ship_img").attr('src', str);
        });
    });

    function admin(id) {
        var list = document.getElementsByClassName("shop-inner");
        for (var i = 0; i < list.length; i++) {
            list[i].style.display = 'none';
        }
        var e = document.getElementById(id);
        if (e.style.display == 'block') {
            e.style.display = 'none';
        } else {
            e.style.display = 'block';
        }
    }
</script>