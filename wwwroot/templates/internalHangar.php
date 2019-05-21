<?php
include_once( 'internalModal.php' );
?>

<script src="<?= PROJECT_HTTP_ROOT ?>resources/js/equipment.js"></script>
<script>
    $(document).ready(function () {
        new equipment(
            <?=$System->User->__get('USER_ID')?>,
            <?=$System->User->__get('PLAYER_ID')?>,
            '<?=base64_encode($System->Server['SERVER_IP'])?>',
        );
    });
</script>

<div id="hangar-info-container" class="clearfix">
    <?php $Lvl = $System->User->getPetLevel(); ?>

    <div id="ship-info-container" class="col-xs-3 player-ship-info">
        <div class="ship-info"><h3>Damage:</h3> <span id="ship-damage">0</span></div>

        <div class="ship-info"><h3>HP:</h3> <span id="ship-hp">0/0</span>
        </div>

        <div class="ship-info"><h3>Shield:</h3> <span id="ship-shield">0/0</span>
        </div>
        <div class="ship-info"><h3>Speed:</h3> <span id="ship-speed">0</span></div>
    </div>

    <div class="col-xs-4 player-ship-view">

        <?php
        if ($System->User->hasDrones()) {
            $dlevel = $System->User->getDroneLevel();
            $dtype = $System->User->getDroneType();
            ?>
            <div class="drone-box" onclick="equipment.switchDisplay(1, 'drone')">
                <img src="<?= Utils::getPathByLootId($dtype, 'top', $dlevel) ?>" alt='drone_iris' />
            </div>
            <?php
        }
        ?>

        <div class="ship-box active" onclick="equipment.switchDisplay(1, 'ship')">
            <img src="<?= $System->User->getShipImage(); ?>" alt='ship_image'/>
        </div>

        <?php
        if ($System->User->hasPet()) {
            $level = $System->User->getPetLevel();
            ?>
            <div class="pet-box" onclick="equipment.switchDisplay(1, 'pet')">
                <img src="<?= Utils::getPathByLootId('pet_pet10', 'top', $level) ?>" alt='pet_img'/>
            </div>
            <?php
        }
        ?>
    </div>

    <div class="col-xs-4 col-xs-offset-1">
        <div class="hangar-container custom-scroll" style="height: 220px">
            <?php
            $playerHangars = $System->User->Hangars->getHangars();

            foreach ($playerHangars as $hangar) {
                if ($hangar->ACTIVE) {
                    ?>
                    <div class="hangar-slot col-xs-4 active" data-hangar-id="<?= $hangar->ID ?>">
                        <img src="<?= $System->User->getShipImage($hangar->SHIP_DESIGN) ?>" alt='ship_design'/>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="hangar-slot col-xs-4" data-hangar-id="<?= $hangar->ID ?>">
                        <img src="<?= $System->User->getShipImage($hangar->SHIP_DESIGN) ?>" alt='ship_design'/>
                    </div>
                    <?php
                }
            }

            $hangarCount = count($playerHangars);
            if ($hangarCount < 12) {
                for ($i = 0; $i < 12 - $hangarCount; $i++) {
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
            <select id="design-select" class="form-control" aria-label='designSelect'>
            </select>
            <button id="reset-config" class="btn btn-primary">Reset</button>
        </div>
        <div id="config-tabs-content">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#config-1" aria-controls="config-1" role="tab"
                       data-toggle="tab" onclick="equipment.switchDisplay('1');"
                       class="bold">1
                    </a>
                </li>
                <li role="presentation">
                    <a href="#config-2" aria-controls="config-2" role="tab"
                       onclick="equipment.switchDisplay('2');" data-toggle="tab"
                       class="bold">2
                    </a>
                </li>
            </ul>
        </div>
        <div class="config-tab-content tab-content">
            <div role="tabpanel" class="tab-pane config-tab row active" id="config-1">
                <div class="col-xs-12 ship-equipment-container">
                    <div class="ship-equipment-box">
                        <img src="<?= $System->User->getShipImage(); ?>" alt='ship_image'/>
                    </div>
                    <div class="ship-equipment-slots laser-slots" data-category="laser">

                    </div>
                    <div class="ship-equipment-slots heavy-slots" data-category="heavy">

                    </div>
                    <div class="ship-equipment-slots generator-slots" data-category="generator">

                    </div>
                    <div class="ship-equipment-slots extra-slots" data-category="extra">

                    </div>
                </div>
                <div class="col-xs-12 pet-equipment-container" data-pet-id="<?= $System->User->__get('USER_ID') ?>">
                    <div class="pet-equipment-name">
                        <span id="pet-name"><?= $System->User->getPetName() ?></span>
                    </div>
                    <div class="pet-equipment-box">
                        <img src="<?= Utils::getPathByLootId('pet_pet10', 'top', $Lvl) ?>" alt='pet_img'/>
                    </div>
                    <div class="pet-equipment-slots laser-slots" data-category="laser">

                    </div>
                    <div class="pet-equipment-slots generator-slots" data-category="generator">

                    </div>
                    <div class="pet-equipment-name-change-btn">
                        <a class="btn btn-primary name-btn"
                           style="cursor: pointer;" data-toggle="modal"
                           data-target="#changePetNameModal">
                            Change Name
                        </a>
                    </div>
                    <div class="pet-equipment-slots gear-slots" data-category="gear">

                    </div>
                    <div class="pet-equipment-slots protocols-slots" data-category="protocols">

                    </div>
                </div>
                <div class="col-xs-12 drone-equipment-container custom-scroll">
                    <div class="drone-level">
                        WHAT
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane config-tab row" id="config-2">
                <div class="col-xs-12 ship-equipment-container">
                    <div class="ship-equipment-box">
                        <img src="<?= $System->User->getShipImage(); ?>" alt='ship_image'/>
                    </div>
                    <div class="ship-equipment-slots laser-slots" data-category="laser">

                    </div>
                    <div class="ship-equipment-slots heavy-slots" data-category="heavy">

                    </div>
                    <div class="ship-equipment-slots generator-slots" data-category="generator">

                    </div>
                    <div class="ship-equipment-slots extra-slots" data-category="extra">

                    </div>
                </div>
                <div class="col-xs-12 pet-equipment-container" data-pet-id="<?= $System->User->__get('USER_ID') ?>">
                    <div class="pet-equipment-name">
                        <?= $System->User->getPetName() ?>
                    </div>
                    <div class="pet-equipment-box">
                        <img src="<?= Utils::getPathByLootId('pet_pet10', 'top', $Lvl) ?>" alt='pet_img'/>
                    </div>
                    <div class="pet-equipment-slots laser-slots" data-category="laser">

                    </div>
                    <div class="pet-equipment-slots generator-slots" data-category="generator">

                    </div>
                    <div class="pet-equipment-name-change-btn">
                        <a class="btn btn-primary name-btn"
                           style="cursor: pointer;" data-toggle="modal"
                           data-target="#changePetNameModal">Change Name
                        </a>
                    </div>
                    <div class="pet-equipment-slots gear-slots" data-category="gear">

                    </div>
                    <div class="pet-equipment-slots protocols-slots" data-category="protocols">

                    </div>
                </div>
                <div class="col-xs-12 drone-equipment-container custom-scroll" style="display: none;">
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-4 ship-inventory-container">
        <select id="filter-select" class="form-control" aria-label='filterSelect'>
        </select>
        <div class="ship-inventory-content custom-scroll">
        </div>
    </div>
</div>
