<?php
$variable = [
    [
        'cat'        => 'heavy',
        'class'      => 'Heavy',
        'title'      => 'Heavy Weapon Editor',
        'sub_action' => 'edit_heavy',
    ],
    [
        'cat'        => 'generator',
        'class'      => 'Generator',
        'title'      => 'Generators Editor',
        'sub_action' => 'edit_generator',
    ],
    [
        'cat'        => 'extra',
        'class'      => 'Extra',
        'title'      => 'Extras Editor',
        'sub_action' => 'edit_extra',
    ],
    [
        'cat'        => 'ammo',
        'class'      => 'Ammo',
        'title'      => 'Ammo Editor',
        'sub_action' => 'edit_ammo',
    ],
    [
        'cat'        => 'drone',
        'class'      => 'Drone',
        'title'      => 'Drone Editor',
        'sub_action' => 'edit_drone',
    ],
    [
        'cat'        => 'pet',
        'class'      => 'Pet',
        'title'      => 'Pet Editor',
        'sub_action' => 'edit_pet',
    ],
]
?>
<div class="shop-body clearfix">
    <div class="shop-header">
        <nav class="shop-navigation">
            <ul class="nav nav-justified">
                <li class="nav-lasers active">
                    <a onclick="admin('lasers');" href="#"></a>
                </li>
                <li class="nav-heavy">
                    <a onclick="admin('Heavy');" href="#"></a>
                </li>
                <li class="nav-generator">
                    <a onclick="admin('Generator');" href="#"></a>
                </li>
                <li class="nav-extra">
                    <a onclick="admin('Extra');" href="#"></a>
                </li>
                <li class="nav-ammo">
                    <a onclick="admin('Ammo');" href="#"></a>
                </li>
                <li class="nav-drone">
                    <a onclick="admin('Drone');" href="#"></a>
                </li>
                <li class="nav-pet">
                    <a onclick="admin('Pet');" href="#"></a>
                </li>
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

    <div id="lasers" style="display: block;" class="shop-inner clearfix">
        <div class="single-item-header">
            <div class="single-item-headert">
                <h3>Item Editor</h3>
            </div>
        </div>
        <?php
        $id = $System->Game->getItemsByCat('laser');
        foreach ($id as $go) {
            $items = $System->Game->getItemsById($go['ID']);
            foreach ($items as $item) {
                $name = $item['LOOT_ID'];
                $name = str_replace('_', '/', $name);
                ?>
                <div class="single-item col-xs-12">
                    <div class="single-item-inner">
                        <div class="single-item-image">
                            <img id="ship_img" src="../resources/images/items/<?php echo $name ?>_shop.png">
                        </div>
                        <div class="single-item-content">
                            <form action="" method="POST">
                                <input type="hidden" name="ship_id" value="<?= $item['ship_id'] ?>">
                                <input type="hidden" name="action" value="edit">
                                <input type="hidden" name="sub_action" value="edit_ship">
                                <div class="single-item-description col-xs-8">
                                    <h3><?= $item['NAME']; ?></h3>
                                    <label style="margin-top:20px;">Description:</label><input style="width:500px;height:50px;position: absolute;"
                                                                                               type="text"
                                                                                               name="item_desc"
                                                                                               value="<?= $item['DESCRIPTION']; ?>"><br />
                                    <ul style="margin-top:25px;">
                                        <li>Loot ID:
                                            <input style="margin-left: 61px;width:200px;"
                                                   type="text"
                                                   id="loot_id"
                                                   name="loot_id"
                                                   value="<?= $item['LOOT_ID'] ?>"></li>
                                        <p>
                                        <li>Type: <input style="margin-left: 125px;"
                                                         type="text"
                                                         name="item_type"
                                                         value="<?= $item['TYPE']; ?>"></li>
                                        <p>
                                        <li>Category: <input style="margin-left: 96px;"
                                                             type="text"
                                                             name="item_category"
                                                             value="<?= $item['CATEGORY']; ?>"></li>
                                        <p>
                                        <li>Uiridum Price: <input style="margin-left: 73px;"
                                                                  type="text"
                                                                  name="item_p_u"
                                                                  value="<?= $item['PRICE_U']; ?>"></li>
                                        <p>
                                        <li>Credit Price: <input style="margin-left: 50px;"
                                                                 type="text"
                                                                 name="item_p_c"
                                                                 value="<?= $item['PRICE_C']; ?>"></li>
                                        <p>
                                        <li>Selling Credits: <input style="margin-left: 30px;"
                                                                    type="text"
                                                                    name="item_s_c"
                                                                    value="<?= $item['SELLING_CREDITS']; ?>"></li>
                                        <p>
                                        <li>Damage: <input style="margin-left: 76px;"
                                                           type="text"
                                                           name="item_dmg"
                                                           value="<?= $item['DAMAGE']; ?>"></li>
                                        <p>
                                        <li>Effect: <input style="margin-left: 83px;"
                                                           type="text"
                                                           name="item_effect"
                                                           value="<?= $item['Effect']; ?>"></li>
                                        <p>
                                    </ul>
                                </div>
                                <div class="single-item-buy-menu col-xs-4">
                                    <input class="btn-primary-laser btn-block btn-lg" type="submit" value="Edit Item">
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
        $id        = $var['cat'];
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
            $id = $System->Game->getItemsByCat($id);
            foreach ($id as $go) {
                $items = $System->Game->getItemsById($go['ID']);
                foreach ($items as $item) {
                    $name      = $item['LOOT_ID'];
                    $name      = str_replace('_', '/', $name);
                    $item_type = $item['TYPE'];
                    ?>
                    <div class="single-item col-xs-12">
                        <div class="single-item-inner">
                            <div class="single-item-image-<?= $type ?>">
                                <img id="ship_img" src="../resources/images/items/<?php echo $name ?>_shop.png">
                            </div>
                            <div class="single-item-content-<?= $type ?>">
                                <form action="" method="POST">
                                    <input type="hidden" name="ship_id" value="<?= $item['ship_id'] ?>">
                                    <input type="hidden" name="action" value="edit">
                                    <input type="hidden" name="sub_action" value="<?= $subaction ?>">
                                    <div class="single-item-description-<?= $type ?> col-xs-8">
                                        <h3><?= $item['NAME']; ?></h3>
                                        <label style="margin-top:20px;">Description:</label><input style="width:500px;height:50px;position: absolute;"
                                                                                                   type="text"
                                                                                                   name="item_desc"
                                                                                                   value="<?= $item['DESCRIPTION']; ?>"><br />
                                        <ul style="margin-top:25px;">
                                            <li>Loot ID:
                                                <input style="margin-left: 61px;width:250px;"
                                                       type="text"
                                                       id="loot_id"
                                                       name="loot_id"
                                                       value="<?= $item['LOOT_ID'] ?>"></li>
                                            <p>
                                            <li>Type: <input style="margin-left: 125px;"
                                                             type="text"
                                                             name="item_type"
                                                             value="<?= $item['TYPE']; ?>"></li>
                                            <p>
                                            <li>Category: <input style="margin-left: 96px;"
                                                                 type="text"
                                                                 name="item_category"
                                                                 value="<?= $item['CATEGORY']; ?>"></li>
                                            <p>
                                            <li>Uiridum Price: <input style="margin-left: 73px;"
                                                                      type="text"
                                                                      name="item_p_u"
                                                                      value="<?= $item['PRICE_U']; ?>"></li>
                                            <p>
                                            <li>Credit Price: <input style="margin-left: 50px;"
                                                                     type="text"
                                                                     name="item_p_c"
                                                                     value="<?= $item['PRICE_C']; ?>"></li>
                                            <p>
                                            <li>Selling Credits: <input style="margin-left: 30px;"
                                                                        type="text"
                                                                        name="item_s_c"
                                                                        value="<?= $item['SELLING_CREDITS']; ?>"></li>
                                            <p>
                                                <?php if ( $item_type == '2' ){ ?>
                                            <li>Shield: <input style="margin-left: 50px;"
                                                               type="text"
                                                               name="item_shield"
                                                               value="<?= $item['SHIELD']; ?>"></li>
                                            <p>
                                            <li>Shield Absorb: <input style="margin-left: 30px;"
                                                                      type="text"
                                                                      name="base_speed"
                                                                      value="<?= $item['SHIELD_ABSORBATION']; ?>"></li>
                                            <p>
                                                <?php }else {
                                                if ( $item_type == '3' ){ ?>
                                            <li>Speed: <input style="margin-left: 50px;"
                                                              type="text"
                                                              name="item_speed"
                                                              value="<?= $item['SPEED']; ?>"></li>
                                            <p>
                                                <?php }else {
                                                if ( $type == 'Extra' ){ ?>
                                            <li>Slots: <input style="margin-left: 50px;"
                                                              type="text"
                                                              name="item_slots"
                                                              value="<?= $item['SLOTS']; ?>"></li>
                                            <p>
                                            <li>Effects: <input style="margin-left: 30px;"
                                                                type="text"
                                                                name="item_effect"
                                                                value="<?= $item['EFFECT']; ?>"></li>
                                            <p>
                                            <li>Uses: <input style="margin-left: 50px;"
                                                             type="text"
                                                             name="item_uses"
                                                             value="<?= $item['USES']; ?>"></li>
                                            <p>
                                                <?php }
                                                }
                                                } ?>
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