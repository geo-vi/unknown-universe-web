<script src="<?= PROJECT_HTTP_ROOT ?>resources/js/skylab.js"></script>
<script>
    $(document).ready(function () {
        new skylab(
            <?=$System->User->__get('USER_ID')?>,
            <?=$System->User->__get('PLAYER_ID')?>
        );
    });
</script>

<div class="box">
    <div class="sky-header">
        <ul class="nav nav-justified" role="tablist">
            <li role="presentation" class="active">
                <a href="#skylab-tab" aria-controls="skylab-tab" role="tab" data-toggle="tab" class="bold">
                    Skylab
                </a>
            </li>
<!--            <li role="presentation">-->
<!--                <a href="#techfactory-tab" aria-controls="techfactory-tab" role="tab" data-toggle="tab" class="bold">-->
<!--                    Tech Factory-->
<!--                </a>-->
<!--            </li>-->
<!--            <li role="presentation">-->
<!--                <a href="#upgrades-tab" aria-controls="upgrades-tab" role="tab" data-toggle="tab" class="bold">-->
<!--                    Upgrades-->
<!--                </a>-->
<!--            </li>-->
        </ul>
    </div>
    <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="skylab-tab">
        <div id="skylab">
        <?php
            include_once("internalSkylab/internalSkylabLaboratory.php");
        ?>
        </div>
    </div> <!-- /skylab -->

    <div role="tabpanel" class="tab-pane" id="techfactory-tab">
        <div id="tech-factory">
        <?php
                include_once("internalSkylab/internalTechFactory.php");
            ?>
        </div>
    </div> <!-- /tech-factory -->

    <div role="tabpanel" class="tab-pane" id="upgrades-tab">
            <?php
                include_once("internalSkylab/internalUpgrades.php");
            ?>
    </div> <!-- /upgrades -->
    </div>
</div>