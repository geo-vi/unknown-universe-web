<?php 
$maps = $System->Game->getMaps();
?>
<div class="map-body clearfix">
    <div class="map-header">
            <nav class="map-navigation">
            </nav>
        </div>

    <div id="alls" style="display: block;" class="map-inner clearfix">
        <div class="single-item-header">
            <div class="single-item-headert">
                        <h3>smth</h3>
            </div>
        </div>

        <div class="single-item col-xs-12">
            <div class="single-item-inner">
                <div class="single-item-image">
                    <!--img here-->
                </div>
                <?php  
                    foreach ($maps as $map){
                        $id = $map['ID'];
                ?>
                <div class="single-item-content">
                    <form action="" method="POST">
                    <div class="single-item-description col-xs-8">
                        <h3></h3>
                        <ul>
                             <li><a
                            onclick="map('<?php echo $id; ?>');" href="#">ID: <?= $id ?></a></li>
                            <li>Name: <?= $map['NAME']; ?></li>
                            
                        </ul>
                    </div>

                    <div class="single-item-buy-menu col-xs-4">
                    </div>

                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php foreach ($maps as $info) { 
        $id = $info['ID'];
        $mapinfo = $System->Game->getMap($id);
        foreach ($mapinfo as $map){
            $npcids = $map['NPCS'];
            $portalids = $map['PORTALS'];
            $portl = json_decode($portalids, true);
            $npc = json_decode($npcids, true);
            $arr = list($x, $y) = explode('x', $map['LIMITS']);
            $sx = ($x * 3.5) . "px";
            $sy = ($y * 3.5) . "px";
            $playersmap = $System->Game->getPlayerMap($map['ID'], 1);
            ?>
        <div id="<?php echo $map['ID']; ?>" style="display: none;" class="map-inner clearfix">
            <div class="single-item-header">
                <div class="single-item-headert">
                            <h3><?= $map['NAME'];?></h3>
                </div>
            </div>

            <div class="single-item col-xs-12">
                <div class="single-item-inner">
                    <div class="single-item-content">                     
                        <div class="single-map-minimap col-xs-8" style="background-image: url(./templates/admin/maps/images/<?= $map['NAME'];?>.jpg);background-size:cover; width:<?php echo $sx;?>;height:<?php echo $sy;?>;">
                            <div class="single-minimap">
                                 
                                <ul>
                                    <?php 
                                    foreach ($playersmap as $pmap) {
                                        $check_players = $System->Game->getPlayerMap($pmap['PLAYER_ID'], 2);
                                        foreach ($check_players as $cp){
                                            $playerid = $cp['PLAYER_ID']; 
                                            $playerx = $cp['SHIP_X'] / 10 . "px";
                                            $playery = $cp['SHIP_Y'] / 10 . "px";
                                            $player_info = $System->User->getInfo($playerid, 5);
                                            foreach($player_info as $info){
                                                $get_ship_info = $System->Game->getShipsByID($cp['SHIP_ID']);
                                                foreach($get_ship_info as $si){
                                                $lootid = $si['ship_lootid'];
                                                $name = str_replace('_', '/', $lootid); ?>
                                            <li style="position:relative;top:<?= $playerx;?>;left:<?= $playery;?>">
                                                <img title="<?= $info['PLAYER_NAME'];?>" id="ship_img" src="../do_img/global/items/<?php echo $name ?>_top.png" width="30" height="30" >
                                            </li>
                                    <?php 
                                                }
                                            } 
                                        }
                                    }
                                    foreach ($portl as $portals){
                                        $portal = $portals['Id'];
                                        $portalx = number_format($portals['x'] / 350, 0) . '%';
                                        $portaly = number_format($portals['y'] / 350, 0) . '%';
                                        $portal_to_x = $portals['newX'];
                                        $portal_to_y = $portals['newY'];
                                        $portal_to_map = $portals['Map'];
                                        ?>
                                        <li style="position:absolute;z-index: 1; top:<?= $portalx;?>;left:<?= $portaly;?>">
                                        <img src="./templates/admin/maps/images/portal.png" width="30" height="30" >
                                        </li>
                                    <?php }?>
                                </ul>
                            </div>   
                        </div>
                        <?php foreach ($npc as $npc_r) { 
                            $npx = $npc_r['NpcId'];
                            $npc_count = $npc_r['Count'];
                            $npc_info = $System->Game->getNpcName($npx);
                            $lootid = $npc_info['ship_lootid'];
                            $npc_name = $npc_info['name'];
                            $pic = str_replace('_', '/', $lootid);
                        ?>
                        <form action="" method="POST">
                        <div class="single-map-content col-xs-8">
                            <div class="single-item-image">
                                <img id="ship_img" height="75" width="75" src="../do_img/global/items/<?php echo $pic ?>.png">
                            </div>
                                <ul>
                                <li>Npc: <?= $npc_name?></li>
                                <li><a href="#">Delete</a></li>
                                <li>Count: <input type="number" value="<?= $npc_count?>"></li>
                                <li><a href="#">Save</a></li>
                                </ul>
                            </ul>
                                
                        </div>
                        <?php
                            }?>

                        <div class="single-item-buy-menu col-xs-4">
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } 
    }?>
</div>
<script type="text/javascript">
    function map(id) {
        var list = document.getElementsByClassName("map-inner");
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