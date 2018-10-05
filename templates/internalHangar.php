<script src="<?=PROJECT_HTTP_ROOT?>resources/js/equipment.js"></script>
<script>
    $(document).ready(function () {
        new equipment(
			<?=$System->User->USER_ID?>,
            <?=$System->User->PLAYER_ID?>,
            '<?=base64_encode($System->Server['SERVER_IP'])?>',
		);
    });
</script>

<div id="hangar-info-container" class="clearfix">
    <div class="col-xs-3 player-ship-info">
        <div class="ship-info"><h3>Damage:</h3> <span id="ship-damage"><?=$System->User->CONFIG_1_DMG?></span></div>
        <div class="ship-info"><h3>Shield:</h3> <span id="ship-shield"><?=$System->User->CONFIG_1_SHIELD?></span></div>
        <div class="ship-info"><h3>Speed:</h3> <span id="ship-speed"><?=$System->User->CONFIG_1_SPEED?></span></div>
    </div>


    <div class="col-xs-4 player-ship-view">

        <?php
        if($System->User->hasDrones()){
            ?>
            <div class="drone-box" onclick="equipment.switchDisplay(1, 'drone')">
                <img src="<?=Utils::getPathByLootId('drone_iris', 'top', 5)?>"/>
            </div>
            <?php
        }
        ?>

        <div class="ship-box active" onclick="equipment.switchDisplay(1, 'ship')">
            <img src="<?= $System->User->getShipImage(); ?>" />
        </div>

        <?php
        if($System->User->hasPet()){
            ?>
            <div class="pet-box" onclick="equipment.switchDisplay(1, 'pet')">
                <img src="<?=Utils::getPathByLootId('pet_pet10', 'top', 1)?>"/>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="col-xs-4 col-xs-offset-1">
        <div class="hangar-container custom-scroll" style="height: 220px">
            <?php
            $playerHangars = $System->User->Hangars->getHangars();

            foreach($playerHangars as $hangar){

                if($hangar->ACTIVE){
                    ?>
                    <div class="hangar-slot col-xs-4 active" data-hangar-id="<?=$hangar->ID?>">
                    <?php
                }else{
                    ?>
                    <div class="hangar-slot col-xs-4" data-hangar-id="<?=$hangar->ID?>">
                    <?php
                }
                ?>
                        <img src="<?=$System->User->getShipImage($hangar->SHIP_DESIGN)?>" />
                    </div>
                <?php
            }

            $hangarCount = count($playerHangars);
            if($hangarCount < 10){
                for($i = 0; $i < 10 - $hangarCount;$i++){
                    ?>
                    <div class="hangar-slot col-xs-4"></div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<div id="hangar-equipment-container">
    <div class="loading-screen loading">
        <div class="loading-screen-inner">
            <h3 class="loading-screen-caption">Loading...</h3>
        </div>
    </div>
    <div id="config-tabs-container" class="col-xs-8">
        <div id="config-navbar">
            <select id="design-select" class="form-control">
            </select>
            <!-- <ul class="config-navbar">
                        <li class="icon">
                            <img src="<?php echo PROJECT_HTTP_ROOT; ?>/images/save_icon-ConvertImage.png">
                        </li>
                        <li class="icon">
                            <img src="<?php echo PROJECT_HTTP_ROOT; ?>/images/delete-icon-ConvertImage.png">
                        </li>
                        <li class="button">
                            <a href="#">Saved Configs</a>
                        </li>
                    </ul>-->
        </div>
        <div id="config-tabs-content">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#config-1" aria-controls="config-1" role="tab" data-toggle="tab" onclick="equipment.switchDisplay('1');" class="bold">1</a></li>
                <li role="presentation"><a href="#config-2" aria-controls="config-2" role="tab" onclick="equipment.switchDisplay('2');" data-toggle="tab" class="bold">2</a></li>
            </ul>
        </div>
        <div class="config-tab-content tab-content">
            <div role="tabpanel" class="tab-pane config-tab row active" id="config-1">
                <div class="col-xs-12 ship-equipment-container">
                    <div class="ship-equipment-slots laser-slots" data-category="laser">

                    </div>
                    <div class="ship-equipment-slots heavy-slots" data-category="heavy">

                    </div>
                    <div class="ship-equipment-slots generator-slots" data-category="generator">

                    </div>
                    <div class="ship-equipment-slots extra-slots" data-category="extra">

                    </div>
                </div>
                <div class="drone-equipment-container custom-scroll col-xs-12 " style="display: none;">
                </div>
            </div>
            <div role="tabpanel" class="tab-pane config-tab row" id="config-2">
                <div class="col-xs-12 ship-equipment-container" >
                    <div class="ship-equipment-slots laser-slots" data-category="laser">

                    </div>
                    <div class="ship-equipment-slots heavy-slots" data-category="heavy">

                    </div>
                    <div class="ship-equipment-slots generator-slots" data-category="generator">

                    </div>
                    <div class="ship-equipment-slots extra-slots" data-category="extra">

                    </div>
                </div>
                <div class="drone-equipment-container custom-scroll col-xs-12 " style="display: none;">
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-4 ship-inventory-container">
        <div class="ship-inventory-content custom-scroll">
        </div>
    </div>
</div>