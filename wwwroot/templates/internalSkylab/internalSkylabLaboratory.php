    <div id="skylab_shadow"></div>

    <div id="backgroundPrometiumCollector"></div>
    <div id="uplinkPrometiumCollector"></div>
    <div id="backgroundEnduriumCollector"></div>
    <div id="uplinkEnduriumCollector"></div>
    <div id="backgroundTerbiumCollector"></div>
    <div id="uplinkTerbiumCollector"></div>
    <div id="backgroundPrometidRefinery"></div>
    <div id="uplinkPrometidRefinery"></div>
    <div id="backgroundDuraniumRefinery"></div>
    <div id="uplinkDuraniumRefinery"></div>
    <div id="backgroundPromeriumRefinery"></div>
    <div id="uplinkPromeriumRefinery"></div>
    <div id="backgroundSepromRefinery"></div>
    <div id="uplinkSepromRefinery"></div>
    <div id="backgroundXenoModule"></div>
    <div id="uplinkXenoModule"></div>

    <div id="view_prometium" class="view_generally">
        <div id="view_prometium_stock">
            <span class="ore_prometium">Prometium:</span><br />
            <?=number_format($System->User->Skylab->getOreCount(0), 0, '.', ',')?>
        </div>
        <div id="view_prometium_maximal">
            <div class="view_generally_maximal_bg" style="width: <?=$System->User->Skylab->getOreCapacityProgress(0) * 100 ?>%;"></div>
            <div class="view_generally_maximal_number view_promerium_maximal_number"><?= number_format($System->User->Skylab->getOreMaxCapacity(0), 0, '.', ',') ?></div>
        </div>
    </div>
    <div id="view_endurium" class="view_generally">
        <div id="view_endurium_stock">
            <span class="ore_endurium">Endurium:</span><br />
            <?=number_format($System->User->Skylab->getOreCount(1), 0, '.', ',')?>
        </div>
        <div id="view_endurium_maximal">
            <div class="view_generally_maximal_bg" style="width: <?=$System->User->Skylab->getOreCapacityProgress(1) * 100 ?>%;"></div>
            <div class="view_generally_maximal_number view_promerium_maximal_number"><?= number_format($System->User->Skylab->getOreMaxCapacity(1), 0, '.', ',') ?></div>
        </div>
    </div>
    <div id="view_terbium" class="view_generally">
        <div id="view_terbium_stock">
            <span class="ore_terbium">Terbium:</span><br />
            <?=number_format($System->User->Skylab->getOreCount(2), 0, '.', ',')?>
        </div>
        <div id="view_terbium_maximal">
            <div class="view_generally_maximal_bg" style="width: <?=$System->User->Skylab->getOreCapacityProgress(2) * 100 ?>%;"></div>
            <div class="view_generally_maximal_number view_promerium_maximal_number"><?= number_format($System->User->Skylab->getOreMaxCapacity(2), 0, '.', ',') ?></div>
        </div>
    </div>
    <div id="view_prometid" class="view_generally">
        <div id="view_prometid_stock">
            <span class="ore_prometid">Prometid:</span><br />
            <?=number_format($System->User->Skylab->getOreCount(3), 0, '.', ',')?>
        </div>
        <div id="view_prometid_maximal">
            <div class="view_generally_maximal_bg" style="width: <?=$System->User->Skylab->getOreCapacityProgress(3) * 100 ?>%;"></div>
            <div class="view_generally_maximal_number view_promerium_maximal_number"><?= number_format($System->User->Skylab->getOreMaxCapacity(3), 0, '.', ',') ?></div>
        </div>
    </div>
    <div id="view_duranium" class="view_generally">
        <div id="view_duranium_stock">
            <span class="ore_duranium">Duranium:</span><br />
            <?=number_format($System->User->Skylab->getOreCount(4), 0, '.', ',')?>
        </div>
        <div id="view_duranium_maximal">
            <div class="view_generally_maximal_bg" style="width: <?=$System->User->Skylab->getOreCapacityProgress(4) * 100 ?>%;"></div>
            <div class="view_generally_maximal_number view_promerium_maximal_number"><?= number_format($System->User->Skylab->getOreMaxCapacity(4), 0, '.', ',') ?></div>
        </div>
    </div>
    <div id="view_xenomit" class="view_generally">
        <div id="view_xenomit_stock">
            <span class="ore_xenomit">Xenomit:</span><br />
            <?=number_format($System->User->Skylab->getOreCount(5), 0, '.', ',')?>
        </div>
        <div id="view_xenomit_maximal">
            <div class="view_generally_maximal_bg" style="width: <?=$System->User->Skylab->getOreCapacityProgress(5) * 100 ?>%;"></div>
            <div class="view_generally_maximal_number view_promerium_maximal_number"><?= number_format($System->User->Skylab->getOreMaxCapacity(5), 0, '.', ',') ?></div>
        </div>
    </div>
    <div id="view_promerium" class="view_generally">
        <div id="view_promerium_stock">
            <span class="ore_promerium">Promerium:</span><br />
            <?=number_format($System->User->Skylab->getOreCount(6), 0, '.', ',')?>
        </div>
        <div id="view_promerium_maximal">
            <div class="view_generally_maximal_bg" style="width: <?=$System->User->Skylab->getOreCapacityProgress(6) * 100 ?>%;"></div>
            <div class="view_generally_maximal_number view_promerium_maximal_number"><?= number_format($System->User->Skylab->getOreMaxCapacity(6), 0, '.', ',') ?></div>
        </div>
    </div>
    <div id="view_seprom" class="view_generally">
        <div id="view_seprom_stock">
            <span class="ore_seprom">Seprom:</span><br />
            <?=number_format($System->User->Skylab->getOreCount(7), 0, '.', ',')?>
        </div>
        <div id="view_seprom_maximal">
            <div class="view_generally_maximal_bg" style="width: <?=$System->User->Skylab->getOreCapacityProgress(7) * 100 ?>%;"></div>
            <div class="view_generally_maximal_number view_seprom_maximal_number"><?= number_format($System->User->Skylab->getOreMaxCapacity(7), 0, '.', ',') ?></div>
        </div>
    </div>


    <div id="skylabReloader" onclick="skylab.reload()"></div>
    <div id="modules">
        <div id="module_baseModule_small" class="module module_small" onclick="skylab.showModule('baseModule');" "="">

        <table cellpadding="0" cellspacing="0" border="0">
            <tbody><tr>
                <td id="corner_small_top_left_active">
                    <div class="name">Basic module</div>
                </td>
                <td id="corner_small_top_right_active"></td>
            </tr>
            <tr>
                <td id="corner_small_bottom_left_active">
                    <table cellpadding="0" cellspacing="0">
                        <tbody><tr>
                            <td>
                                <div class="level_icon"></div>
                                <div class="level skylab_font_level"><?=$System->User->Skylab->getModuleLevel('SOLAR_MODULE') ?></div>
                            </td>
                            <td class="cellview">
                                <div class="power_icon"></div>
                                <div class="power skylab_font_power"><?=$System->User->Skylab->getConsumption( 'SOLAR_MODULE') ?></div>
                            </td>
                            <td><br></td>
                        </tr>
                        </tbody></table>
                </td>
                <td id="corner_small_bottom_right_active"></td>
            </tr>
            </tbody></table>

    </div>

    <div id="module_baseModule_large" class="module module_large" style="display: none;">
        <div class="skylab_module_header">
            <div class="name">Basic module</div>
            <div class="skylab_module_close"></div>
        </div>

        <div id="module_infobox_baseModule" class="skylab_module_middle">
            <div class="skylab_module_tabs">
                <div class="tab_first skylab_module_tab tab_active" onclick="skylab.changeToTab('first', 'baseModule')">Info</div>
                <div class="tab_second skylab_module_tab" onclick="skylab.changeToTab('second', 'baseModule')">Upgrade</div>
            </div>

            <div id="module_infobox_baseModule_content" class="skylab_module_content">
                <div id="module_infobox_baseModule_overview_large" class="tabContent skylab_standard">
                    <table class="module_infobox_baseModule" cellpadding="2" cellspacing="0">
                        <tbody><tr>
                            <td style="width:160px"><strong>Basic module</strong></td>
                            <td style="width:65px;">
                                <div class="iteminfo_overview_progressbar" style="width:<?=$System->User->Skylab->getModuleLevelProgress('BASIC_MODULE') * 0.6 ?>px;"></div>
                                <div class="iteminfo_overview_progressgrid"></div>
                                <div style="width:<?=$System->User->Skylab->getModuleLevelProgress('BASIC_MODULE') * 0.6 ?>px;position:absolute;height:152px;margin-top:-6px;border-right:1px solid #989898;z-index:100;"></div>
                            </td>
                            <?php
                            $level = $System->User->Skylab->getModuleLevel('BASIC_MODULE');
                            $active = $level > 0 ? 'ACTIVE' : 'INACTIVE';
                            ?>
                            <td class="baseModul_level baseModul_level_<?=$active ?>"><strong><?=$level ?></strong></td>
                        </tr>
                        <tr>
                            <td><strong>Solar module</strong></td>
                            <td><div class="iteminfo_overview_progressbar" style="width:<?=$System->User->Skylab->getModuleLevelProgress('SOLAR_MODULE') * 0.6 ?>px;"></div>
                                <div class="iteminfo_overview_progressgrid"></div></td>
                            <?php
                            $level = $System->User->Skylab->getModuleLevel('SOLAR_MODULE');
                            $active = $level > 0 ? 'ACTIVE' : 'INACTIVE';
                            ?>
                            <td class="baseModul_level baseModul_level_<?=$active ?>"><strong><?=$level ?></strong></td>
                        </tr>
                        <tr>
                            <td><strong>Storage module</strong></td>
                            <td><div class="iteminfo_overview_progressbar" style="width:<?=$System->User->Skylab->getModuleLevelProgress('STORAGE_MODULE') * 0.6 ?>px;"></div>
                                <div class="iteminfo_overview_progressgrid"></div></td>
                            <?php
                            $level = $System->User->Skylab->getModuleLevel('STORAGE_MODULE');
                            $active = $level > 0 ? 'ACTIVE' : 'INACTIVE';
                            ?>
                            <td class="baseModul_level baseModul_level_<?=$active ?>"><strong><?=$level ?></strong></td>
                        </tr>
                        <tr>
                            <td><strong>Xeno module</strong></td>
                            <td><div class="iteminfo_overview_progressbar" style="width:<?=$System->User->Skylab->getModuleLevelProgress('XENOMIT_MODULE') * 0.6 ?>px;"></div>
                                <div class="iteminfo_overview_progressgrid"></div></td>
                            <?php
                            $level = $System->User->Skylab->getModuleLevel('XENOMIT_MODULE');
                            $active = $level > 0 ? 'ACTIVE' : 'INACTIVE';
                            ?>
                            <td class="baseModul_level baseModul_level_<?=$active ?>"><strong><?=$level ?></strong></td>
                        </tr>
                        <tr>
                            <td><strong>Prometium collector</strong></td>
                            <td><div class="iteminfo_overview_progressbar" style="width:<?=$System->User->Skylab->getModuleLevelProgress('PROMETIUM_COLLECTOR') * 0.6 ?>px;"></div>
                                <div class="iteminfo_overview_progressgrid"></div></td>
                            <?php
                            $level = $System->User->Skylab->getModuleLevel('PROMETIUM_COLLECTOR');
                            $active = $level > 0 ? 'ACTIVE' : 'INACTIVE';
                            ?>
                            <td class="baseModul_level baseModul_level_<?=$active ?>"><strong><?=$level ?></strong></td>
                        </tr>
                        <tr>
                            <td><strong>Endurium collector</strong></td>
                            <td><div class="iteminfo_overview_progressbar" style="width:<?=$System->User->Skylab->getModuleLevelProgress('ENDURIUM_COLLECTOR') * 0.6 ?>px;"></div>
                                <div class="iteminfo_overview_progressgrid"></div></td>
                            <?php
                            $level = $System->User->Skylab->getModuleLevel('ENDURIUM_COLLECTOR');
                            $active = $level > 0 ? 'ACTIVE' : 'INACTIVE';
                            ?>
                            <td class="baseModul_level baseModul_level_<?=$active ?>"><strong><?=$level ?></strong></td>
                        </tr>
                        <tr>
                            <td><strong>Terbium collector</strong></td>
                            <td><div class="iteminfo_overview_progressbar" style="width:<?=$System->User->Skylab->getModuleLevelProgress('TERBIUM_COLLECTOR') * 0.6 ?>px;"></div>
                                <div class="iteminfo_overview_progressgrid"></div></td>
                            <?php
                            $level = $System->User->Skylab->getModuleLevel('TERBIUM_COLLECTOR');
                            $active = $level > 0 ? 'ACTIVE' : 'INACTIVE';
                            ?>
                            <td class="baseModul_level baseModul_level_<?=$active ?>"><strong><?=$level ?></strong></td>
                        </tr>
                        <tr>
                            <td><strong>Prometid refinery</strong></td>
                            <td><div class="iteminfo_overview_progressbar" style="width:<?=$System->User->Skylab->getModuleLevelProgress('PROMETID_COLLECTOR') * 0.6 ?>px;"></div>
                                <div class="iteminfo_overview_progressgrid"></div></td>
                            <?php
                            $level = $System->User->Skylab->getModuleLevel('PROMETID_COLLECTOR');
                            $active = $level > 0 ? 'ACTIVE' : 'INACTIVE';
                            ?>
                            <td class="baseModul_level baseModul_level_<?=$active ?>"><strong><?=$level ?></strong></td>
                        </tr>
                        <tr>
                            <td><strong>Duranium refinery</strong></td>
                            <td><div class="iteminfo_overview_progressbar" style="width:<?=$System->User->Skylab->getModuleLevelProgress('DURANIUM_COLLECTOR') * 0.6 ?>px;"></div>
                                <div class="iteminfo_overview_progressgrid"></div></td>
                            <?php
                            $level = $System->User->Skylab->getModuleLevel('DURANIUM_COLLECTOR');
                            $active = $level > 0 ? 'ACTIVE' : 'INACTIVE';
                            ?>
                            <td class="baseModul_level baseModul_level_<?=$active ?>"><strong><?=$level ?></strong></td>
                        </tr>
                        <tr>
                            <td><strong>Promerium refinery</strong></td>
                            <td><div class="iteminfo_overview_progressbar" style="width:<?=$System->User->Skylab->getModuleLevelProgress('PROMERIUM_COLLECTOR') * 0.6 ?>px;"></div>
                                <div class="iteminfo_overview_progressgrid"></div></td>
                            <?php
                            $level = $System->User->Skylab->getModuleLevel('PROMERIUM_COLLECTOR');
                            $active = $level > 0 ? 'ACTIVE' : 'INACTIVE';
                            ?>
                            <td class="baseModul_level baseModul_level_<?=$active ?>"><strong><?=$level ?></strong></td>
                        </tr>
                        <tr>
                            <td><strong>Seprom refinery</strong></td>
                            <td><div class="iteminfo_overview_progressbar" style="width:<?=$System->User->Skylab->getModuleLevelProgress('SEPROM_COLLECTOR') * 0.6 ?>px;"></div>
                                <div class="iteminfo_overview_progressgrid"></div></td>
                            <?php
                            $level = $System->User->Skylab->getModuleLevel('SEPROM_COLLECTOR');
                            $active = $level > 0 ? 'ACTIVE' : 'INACTIVE';
                            ?>
                            <td class="baseModul_level baseModul_level_<?=$active ?>"><strong><?=$level ?></strong></td>
                        </tr>
                        </tbody></table>

                </div>

                <div id="module_infobox_baseModule_upgrade_large" class="tabContent skylab_standard" style="display: none;">


                    <table class="module_infobox_upgrade" cellpadding="0" cellspacing="0">
                        <tbody><tr>
                            <td class="firstRow"><br></td>
                            <td class="secondRow">Instant</td>
                            <td class="thirdRow skylab_price_normal" style="width:1px;">
                                <div style="position:absolute;width:1px;height:124px;background-image: url(./resources/images/internalSkylab/lab/seperator_vertical.jpg?__cv=0f3388b877b7ef4dd20df64be8699800);"></div>
                                <br>
                            </td>
                            <td>Normal</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                        </tr>
                        <tr>
                            <td class="firstRow">Uridium</td>
                            <td class="secondRow">2,468</td>
                            <td><br></td>
                            <td class="thirdRow skylab_price_normal">0</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                        </tr>
                        <tr>
                            <td class="firstRow">Credits</td>
                            <td class="secondRow">27,144</td>
                            <td><br></td>
                            <td class="thirdRow skylab_price_normal">27,144</td>
                        </tr>
                        <tr>
                            <td class="firstRow">Time</td>
                            <td class="secondRow">0:00</td>
                            <td><br></td>
                            <td class="thirdRow skylab_price_normal">3:44</td>
                        </tr>
                        <tr>
                            <td class="firstRow">Prometium</td>
                            <td class="secondRow">2,923</td>
                            <td><br></td>
                            <td class="thirdRow skylab_price_normal">2,923</td>
                        </tr>
                        <tr>
                            <td class="firstRow">Endurium</td>
                            <td class="secondRow">2,923</td>
                            <td><br></td>
                            <td class="thirdRow skylab_price_normal">2,923</td>
                        </tr>
                        <tr>
                            <td class="firstRow">Terbium</td>
                            <td class="secondRow">2,923</td>
                            <td><br></td>
                            <td class="thirdRow skylab_price_normal">2,923</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding:8px 3px">
                                <div class="button_standard" style="float:right;">
                                    <a style="display:block;" onfocus="this.blur()" onclick="setConfirmButtonText('confirmText', 'OK'); setCancelButtonText('cancelText', 'Cancel'); openConfirm('indexInternal.es?action=internalSkylab&amp;subaction=instantUpgrade&amp;construction=baseModule&amp;reloadToken=707059008f089e49905b4272e94bd346', 'Confirm upgrade?')">Instant build</a>
                                </div>
                            </td>
                            <td colspan="2" style="padding:8px 5px">
                                <div class="button_standard">
                                    <a style="display:block" onfocus="this.blur()" href="indexInternal.es?action=internalSkylab&amp;subaction=upgrade&amp;construction=baseModule&amp;reloadToken=707059008f089e49905b4272e94bd346">Build</a>
                                </div>
                            </td>
                        </tr>
                        </tbody></table>

                </div>

                <div id="module_infobox_baseModule_resourceWarning_large" class="tabContent skylab_standard module_resourceWarning">
                    <div id="module_infobox_baseModule_infomessage" class="module_resourceWarning_text"></div>
                    <div class="button_standard module_resourceWarning_button">
                        <a style="display: block;" onfocus="this.blur()" onclick="jQuery('#module_infobox_baseModule_resourceWarning_large').hide();" href="#">
                            <strong>OK</strong>
                        </a>
                    </div>
                </div>
            </div>

            <div id="module_infobox_baseModule_footer" class="skylab_module_footer">
                <div class="module_info_active_state module_infobox_info">
                    <img src="./resources/images/internalSkylab/lab/power_disabled.png?__cv=b0a4878430feb41ac03c5a6d796fda00" width="14" height="14">
                </div>

                <div class="module_info_level module_infobox_info">
                    <div class="level_icon"><?=$System->User->Skylab->getModuleLevel('SOLAR_MODULE') ?></div>
                </div>

                <div class="module_info_power_usage module_infobox_info">
                    <?=$System->User->Skylab->getConsumption('BASIC_MODULE') ?>
                </div>

            </div>
        </div>

    </div>
    <script type="text/javascript">
    </script>


    <div id="module_solarModule_small" class="module module_small" onclick="skylab.showModule('solarModule');" "="">

    <table cellpadding="0" cellspacing="0" border="0">
        <tbody><tr>
            <td id="corner_small_top_left_active">
                <div class="name">Solar module</div>
            </td>
            <td id="corner_small_top_right_active"></td>
        </tr>
        <tr>
            <td id="corner_small_bottom_left_active">
                <table cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td>
                            <div class="level_icon"></div>
                            <div class="level skylab_font_level"><?=$System->User->Skylab->getModuleLevel('SOLAR_MODULE') ?></div>
                        </td>
                        <td class="cellview">
                            <div class="power_icon"></div>
                            <div class="power skylab_font_power"><?= number_format($System->User->Skylab->getTotalPowerConsumption(), 0, '.', ',') ?> / <?= number_format($System->User->Skylab->getSolarModuleMaxPower(), 0, '.', ',') ?></div>
                        </td>
                        <td><br></td>
                    </tr>
                    </tbody></table>
            </td>
            <td id="corner_small_bottom_right_active"></td>
        </tr>
        </tbody></table>

</div>

<div id="module_solarModule_large" class="module module_large" style="display: none;">
    <div class="skylab_module_header">
        <div class="name">Solar module</div>
        <div class="skylab_module_close"></div>
    </div>

    <div id="module_infobox_solarModule" class="skylab_module_middle">
        <div class="skylab_module_tabs">
            <div class="tab_first skylab_module_tab tab_active" onclick="skylab.changeToTab('first', 'solarModule')">Info</div>
            <div class="tab_second skylab_module_tab" onclick="skylab.changeToTab('second', 'solarModule')">Upgrade</div>
        </div>

        <div id="module_infobox_solarModule_content" class="skylab_module_content">
            <div id="module_infobox_solarModule_overview_large" class="tabContent skylab_standard">
                <table id="solarModul_overview_content" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td class="firstRow label">Total energy consumption:</td>
                        <td class="secondRow value"><?= number_format($System->User->Skylab->getTotalPowerConsumption(), 0, '.', ',') ?> / <?= number_format($System->User->Skylab->getSolarModuleMaxPower(), 0, '.', ',') ?></td>
                    </tr>
                    <tr>
                        <td class="firstRow label">Basic module:</td>
                        <td class="secondRow value"><?=$System->User->Skylab->getConsumption('BASIC_MODULE') ?></td>
                    </tr>
                    <tr>
                        <td class="firstRow label">Storage module:</td>
                        <td class="secondRow value"><?=$System->User->Skylab->getConsumption('STORAGE_MODULE') ?></td>
                    </tr>
                    <tr>
                        <td class="firstRow label">Transport module:</td>
                        <td class="secondRow value"><?=$System->User->Skylab->getConsumption('TRANSPORT_MODULE') ?></td>
                    </tr>
                    <tr>
                        <?php
                        $power = $System->User->Skylab->getConsumption('PROMETIUM_COLLECTOR');
                        $active = $power > 0 ? '' : 'inactive';
                        ?>
                        <td class="firstRow <?=$active ?> label">Prometium collector:</td>
                        <td class="secondRow <?=$active ?> value"><?=$power ?></td>
                    </tr>
                    <tr>
                        <?php
                        $power = $System->User->Skylab->getConsumption('ENDURIUM_COLLECTOR');
                        $active = $power > 0 ? '' : 'inactive';
                        ?>
                        <td class="firstRow <?=$active ?> label">Endurium collector:</td>
                        <td class="secondRow <?=$active ?> value"><?=$power ?></td>
                    </tr>
                    <tr>
                        <?php
                        $power = $System->User->Skylab->getConsumption('TERBIUM_COLLECTOR');
                        $active = $power > 0 ? '' : 'inactive';
                        ?>
                        <td class="firstRow <?=$active ?> label">Terbium collector:</td>
                        <td class="secondRow <?=$active ?> value"><?=$power ?></td>
                    </tr>
                    <tr>
                        <?php
                        $power = $System->User->Skylab->getConsumption('PROMETID_COLLECTOR');
                        $active = $power > 0 ? '' : 'inactive';
                        ?>
                        <td class="firstRow <?=$active ?> label">Prometid refinery:</td>
                        <td class="secondRow <?=$active ?> value"><?=$power ?></td>
                    </tr>
                    <tr>
                        <?php
                        $power = $System->User->Skylab->getConsumption('DURANIUM_COLLECTOR');
                        $active = $power > 0 ? '' : 'inactive';
                        ?>
                        <td class="firstRow <?=$active ?> label">Duranium refinery:</td>
                        <td class="secondRow <?=$active ?> value"><?=$power ?></td>
                    </tr>
                    <tr>
                        <?php
                        $power = $System->User->Skylab->getConsumption('PROMERIUM_COLLECTOR');
                        $active = $power > 0 ? '' : 'inactive';
                        ?>
                        <td class="firstRow <?=$active ?> label">Promerium refinery:</td>
                        <td class="secondRow <?=$active ?> value"><?=$power ?></td>
                    </tr>
                    <tr>
                        <?php
                        $power = $System->User->Skylab->getConsumption('SEPROM_COLLECTOR');
                        $active = $power > 0 ? '' : 'inactive';
                        ?>
                        <td class="firstRow <?=$active ?> label">Seprom refinery:</td>
                        <td class="secondRow <?=$active ?> value"><?=$power ?></td>
                    </tr>
                    <tr>
                        <?php
                        $power = $System->User->Skylab->getConsumption('XENOMIT_MODULE');
                        $active = $power > 0 ? '' : 'inactive';
                        ?>
                        <td class="firstRow <?=$active ?> label">Xeno module:</td>
                        <td class="secondRow <?=$active ?> value"><?=$power ?></td>
                    </tr>
                    </tbody></table>
            </div>

            <div id="module_infobox_solarModule_upgrade_large" class="tabContent skylab_standard" style="display: none;">


                <table class="module_infobox_upgrade" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="firstRow"><br></td>
                        <td class="secondRow">Instant</td>
                        <td class="thirdRow skylab_price_normal" style="width:1px;">
                            <div style="position:absolute;width:1px;height:124px;background-image: url(./resources/images/internalSkylab/lab/seperator_vertical.jpg?__cv=0f3388b877b7ef4dd20df64be8699800);"></div>
                            <br>
                        </td>
                        <td>Normal</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Uridium</td>
                        <td class="secondRow">1,487</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">0</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Credits</td>
                        <td class="secondRow">16,352</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">16,352</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Time</td>
                        <td class="secondRow">0:00</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">2:18</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Prometium</td>
                        <td class="secondRow">707</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">707</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Endurium</td>
                        <td class="secondRow">707</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">707</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Terbium</td>
                        <td class="secondRow">707</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">707</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding:8px 3px">
                            <div class="button_standard" style="float:right;">
                                <a style="display:block;" onfocus="this.blur()" onclick="setConfirmButtonText('confirmText', 'OK'); setCancelButtonText('cancelText', 'Cancel'); openConfirm('indexInternal.es?action=internalSkylab&amp;subaction=instantUpgrade&amp;construction=solarModule&amp;reloadToken=707059008f089e49905b4272e94bd346', 'Confirm upgrade?')">Instant build</a>
                            </div>
                        </td>
                        <td colspan="2" style="padding:8px 5px">
                            <div class="button_standard">
                                <a style="display:block" onfocus="this.blur()" href="indexInternal.es?action=internalSkylab&amp;subaction=upgrade&amp;construction=solarModule&amp;reloadToken=707059008f089e49905b4272e94bd346">Build</a>
                            </div>
                        </td>
                    </tr>
                    </tbody></table>

            </div>

            <div id="module_infobox_solarModule_resourceWarning_large" class="tabContent skylab_standard module_resourceWarning">
                <div id="module_infobox_solarModule_infomessage" class="module_resourceWarning_text"></div>
                <div class="button_standard module_resourceWarning_button">
                    <a style="display: block;" onfocus="this.blur()" onclick="jQuery('#module_infobox_solarModule_resourceWarning_large').hide();" href="#">
                        <strong>OK</strong>
                    </a>
                </div>
            </div>
        </div>

        <div id="module_infobox_solarModule_footer" class="skylab_module_footer">
            <div class="module_info_active_state module_infobox_info">
                <img src="./resources/images/internalSkylab/lab/power_disabled.png?__cv=b0a4878430feb41ac03c5a6d796fda00" width="14" height="14">
            </div>

            <div class="module_info_level module_infobox_info">
                <div class="level_icon"><?=$System->User->Skylab->getModuleLevel('SOLAR_MODULE') ?></div>
            </div>

            <div class="module_info_power_usage module_infobox_info">
                <?=$System->User->Skylab->getConsumption('SOLAR_MODULE') ?>
            </div>

        </div>
    </div>

</div>
<script type="text/javascript">
</script>


<div id="module_storageModule_small" class="module module_small" onclick="skylab.showModule('storageModule');" "="">

<table cellpadding="0" cellspacing="0" border="0">
    <tbody><tr>
        <td id="corner_small_top_left_active">
            <div class="name">Storage module</div>
        </td>
        <td id="corner_small_top_right_active"></td>
    </tr>
    <tr>
        <td id="corner_small_bottom_left_active">
            <table cellpadding="0" cellspacing="0">
                <tbody><tr>
                    <td>
                        <div class="level_icon"></div>
                        <div class="level skylab_font_level"><?=$System->User->Skylab->getModuleLevel('STORAGE_MODULE') ?></div>
                    </td>
                    <td class="cellview">
                        <div class="power_icon"></div>
                        <div class="power skylab_font_power"><?=$System->User->Skylab->getConsumption('STORAGE_MODULE') ?></div>
                    </td>
                    <td><br></td>
                </tr>
                </tbody></table>
        </td>
        <td id="corner_small_bottom_right_active"></td>
    </tr>
    </tbody></table>

</div>

<div id="module_storageModule_large" class="module module_large" style="display: none;">
    <div class="skylab_module_header">
        <div class="name">Storage module</div>
        <div class="skylab_module_close"></div>
    </div>

    <div id="module_infobox_storageModule" class="skylab_module_middle">
        <div class="skylab_module_tabs">
            <div class="tab_first skylab_module_tab tab_active" onclick="skylab.changeToTab('first', 'storageModule')">Info</div>
            <div class="tab_second skylab_module_tab" onclick="skylab.changeToTab('second', 'storageModule')">Upgrade</div>
        </div>

        <div id="module_infobox_storageModule_content" class="skylab_module_content">
            <div id="module_infobox_storageModule_overview_large" class="tabContent skylab_standard">
                <table>
                    <tbody><tr>
                        <td width="140px"><strong>Prometium</strong></td>
                        <td width="76px">71,881</td>
                        <td width="54px"><span>+-0</span></td>
                    </tr>
                    <tr>
                        <td><strong>Endurium</strong></td>
                        <td>71,881</td>
                        <td><span>+-0</span></td>
                    </tr>
                    <tr>
                        <td><strong>Terbium</strong></td>
                        <td>71,881</td>
                        <td><span>+-0</span></td>
                    </tr>
                    <tr>
                        <td><strong>Prometid</strong></td>
                        <td>5,280</td>
                        <td><span style="color: #69bf67">+110</span></td>
                    </tr>
                    <tr>
                        <td><strong>Duranium</strong></td>
                        <td>5,280</td>
                        <td><span style="color: #69bf67">+110</span></td>
                    </tr>
                    <tr>
                        <td><strong>Promerium</strong></td>
                        <td>0</td>
                        <td><span>+-0</span></td>
                    </tr>
                    <tr>
                        <td><strong>Seprom</strong></td>
                        <td>0</td>
                        <td><span>+-0</span></td>
                    </tr>
                    </tbody></table>
            </div>

            <div id="module_infobox_storageModule_upgrade_large" class="tabContent skylab_standard" style="display: none;">


                <table class="module_infobox_upgrade" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="firstRow"><br></td>
                        <td class="secondRow">Instant</td>
                        <td class="thirdRow skylab_price_normal" style="width:1px;">
                            <div style="position:absolute;width:1px;height:124px;background-image: url(./resources/images/internalSkylab/lab/seperator_vertical.jpg?__cv=0f3388b877b7ef4dd20df64be8699800);"></div>
                            <br>
                        </td>
                        <td>Normal</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Uridium</td>
                        <td class="secondRow">1,487</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">0</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Credits</td>
                        <td class="secondRow">16,352</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">16,352</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Time</td>
                        <td class="secondRow">0:00</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">2:18</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Prometium</td>
                        <td class="secondRow">707</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">707</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Endurium</td>
                        <td class="secondRow">707</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">707</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Terbium</td>
                        <td class="secondRow">707</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">707</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding:8px 3px">
                            <div class="button_standard" style="float:right;">
                                <a style="display:block;" onfocus="this.blur()" onclick="setConfirmButtonText('confirmText', 'OK'); setCancelButtonText('cancelText', 'Cancel'); openConfirm('indexInternal.es?action=internalSkylab&amp;subaction=instantUpgrade&amp;construction=storageModule&amp;reloadToken=707059008f089e49905b4272e94bd346', 'Confirm upgrade?')">Instant build</a>
                            </div>
                        </td>
                        <td colspan="2" style="padding:8px 5px">
                            <div class="button_standard">
                                <a style="display:block" onfocus="this.blur()" href="indexInternal.es?action=internalSkylab&amp;subaction=upgrade&amp;construction=storageModule&amp;reloadToken=707059008f089e49905b4272e94bd346">Build</a>
                            </div>
                        </td>
                    </tr>
                    </tbody></table>

            </div>

            <div id="module_infobox_storageModule_resourceWarning_large" class="tabContent skylab_standard module_resourceWarning">
                <div id="module_infobox_storageModule_infomessage" class="module_resourceWarning_text"></div>
                <div class="button_standard module_resourceWarning_button">
                    <a style="display: block;" onfocus="this.blur()" onclick="jQuery('#module_infobox_storageModule_resourceWarning_large').hide();" href="#">
                        <strong>OK</strong>
                    </a>
                </div>
            </div>
        </div>

        <div id="module_infobox_storageModule_footer" class="skylab_module_footer">
            <div class="module_info_active_state module_infobox_info">
                <img src="./resources/images/internalSkylab/lab/power_disabled.png?__cv=b0a4878430feb41ac03c5a6d796fda00" width="14" height="14">
            </div>

            <div class="module_info_level module_infobox_info">
                <div class="level_icon"><?=$System->User->Skylab->getModuleLevel('STORAGE_MODULE') ?></div>
            </div>

            <div class="module_info_power_usage module_infobox_info">
                <?=$System->User->Skylab->getConsumption('STORAGE_MODULE') ?>
            </div>

        </div>
    </div>

</div>
<script type="text/javascript">
</script>


<div id="module_transportModule_small" class="module module_small" onclick="skylab.showModule('transportModule');" "="">

<table cellpadding="0" cellspacing="0" border="0">
    <tbody><tr>
        <td id="corner_small_top_left_active">
            <div class="name">Transport module</div>
        </td>
        <td id="corner_small_top_right_active"></td>
    </tr>
    <tr>
        <td id="corner_small_bottom_left_active">
            <table cellpadding="0" cellspacing="0">
                <tbody><tr>
                    <td>
                        <div class="level_icon"></div>
                        <div class="level skylab_font_level"><?=$System->User->Skylab->getModuleLevel('TRANSPORT_MODULE') ?></div>
                    </td>
                    <td class="cellview">
                        <div class="power_icon"></div>
                        <div class="power skylab_font_power"><?=$System->User->Skylab->getConsumption('TRANSPORT_MODULE') ?></div>
                    </td>
                    <td><br></td>
                </tr>
                </tbody></table>
        </td>
        <td id="corner_small_bottom_right_active"></td>
    </tr>
    </tbody></table>

</div>

<div id="module_transportModule_large" class="module module_large" style="display: none;">
    <div class="skylab_module_header">
        <div class="name">Transport module</div>
        <div class="skylab_module_close"></div>
    </div>

    <div id="module_infobox_transportModule" class="skylab_module_middle">
        <div class="skylab_module_tabs">
            <div class="tab_first skylab_module_tab tab_active" onclick="skylab.changeToTab('first', 'transportModule')">Info</div>
            <div class="tab_second skylab_module_tab" onclick="skylab.changeToTab('second', 'transportModule')">Upgrade</div>
        </div>

        <div id="module_infobox_transportModule_content" class="skylab_module_content">
            <div id="module_infobox_transportModule_overview_large" class="tabContent skylab_standard">


                <div id="boxTimeForTransport" style="padding:30px 0 0 3px;">Arriving in: <span id="timeForTransport">?</span></div>

                <div id="sendTransport">
                    <div id="transport_left">
                        <table class="module_infobox_transportModule">
                            <tbody><tr>
                                <td style="width:83px;"><label for="count_prometium">Prometium:</label></td>
                                <td style="width:49px;"><input type="text" name="count_prometium" id="count_prometium" onkeyup="skylab.checkTransportTime(0.12, 0);" class="skylab_standard" placeholder="0" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td><label for="count_endurium">Endurium:</label></td>
                                <td><input type="text" name="count_endurium" id="count_endurium" onkeyup="skylab.checkTransportTime(0.12, 0);" class="skylab_standard" placeholder="0" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td><label for="count_terbium">Terbium:</label></td>
                                <td><input type="text" name="count_terbium" id="count_terbium" onkeyup="skylab.checkTransportTime(0.12, 0);" class="skylab_standard" placeholder="0" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td><label for="count_prometid">Prometid:</label></td>
                                <td><input type="text" name="count_prometid" id="count_prometid" onkeyup="skylab.checkTransportTime(0.12, 0);" class="skylab_standard" placeholder="0" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td><label for="count_duranium">Duranium:</label></td>
                                <td><input type="text" name="count_duranium" id="count_duranium" onkeyup="skylab.checkTransportTime(0.12, 0);" class="skylab_standard" placeholder="0" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td><label for="count_xenomit">Xenomit:</label></td>
                                <td><input type="text" name="count_xenomit" id="count_xenomit" onkeyup="skylab.checkTransportTime(0.12, 0);" class="skylab_standard" placeholder="0" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td><label for="count_promerium">Promerium:</label></td>
                                <td><input type="text" name="count_promerium" id="count_promerium" onkeyup="skylab.checkTransportTime(0.12, 0);" class="skylab_standard" placeholder="0" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td><label for="count_seprom">Seprom:</label></td>
                                <td><input type="text" name="count_seprom" id="count_seprom" onkeyup="skylab.checkTransportTime(0.12, 0);" class="skylab_standard" placeholder="0" autocomplete="off"></td>
                            </tr>
                            </tbody></table>
                    </div>

                    <div id="transport_right">
                        <table>
                            <tbody><tr>
                                <td style="width:41px;"><img id="to_skylab" src="./resources/images/internalSkylab/lab/to_skylab_0.png?__cv=1f08c141b032cd3f3800247fe3f58100" width="41" height="36"></td>
                                <td style="width:23px;"><img id="direction_but" src="./resources/images/internalSkylab/lab/but_right_0.png?__cv=ac1391c5509c09a46cc9bd5e36c51400" width="17" height="17"></td>
                                <td style="width:29px"><img id="to_ship" src="./resources/images/internalSkylab/lab/to_ship_0.png?__cv=b76cfb40c24b488ac9f685627faad600" width="29" height="36"></td>
                            </tr>
                            <tr>
                                <td colspan="3" style="padding-top:20px;">
                                    <div class="button_standard">
                                        <a style="display:block" onfocus="this.blur()" href="javascript:skylab.sendTransport('fast', 'Confirm transport?','OK','Cancel');">Instant send</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="padding-top:5px;"><strong class="cost">1250 U.</strong></td>
                            </tr>
                            <tr>
                                <td colspan="3" style="padding-top:25px;">
                                    <div class="button_standard">
                                        <a style="display:block" onfocus="this.blur()" href="javascript:skylab.sendTransport('normal');">Send</a>
                                    </div></td>
                            </tr>
                            </tbody></table>
                    </div>
                    <div class="clearMe"></div>
                </div>


            </div>

            <div id="module_infobox_transportModule_upgrade_large" class="tabContent skylab_standard" style="display: none;">
                <div class="upgrade_container_max">
                    Maximum upgrade level attained
                </div>

            </div>

            <div id="module_infobox_transportModule_resourceWarning_large" class="tabContent skylab_standard module_resourceWarning">
                <div id="module_infobox_transportModule_infomessage" class="module_resourceWarning_text"></div>
                <div class="button_standard module_resourceWarning_button">
                    <a style="display: block;" onfocus="this.blur()" onclick="jQuery('#module_infobox_transportModule_resourceWarning_large').hide();" href="#">
                        <strong>OK</strong>
                    </a>
                </div>
            </div>
        </div>

        <div id="module_infobox_transportModule_footer" class="skylab_module_footer">
            <div class="module_info_active_state module_infobox_info">
                <img src="./resources/images/internalSkylab/lab/power_disabled.png?__cv=b0a4878430feb41ac03c5a6d796fda00" width="14" height="14">
            </div>

            <div class="module_info_level module_infobox_info">
                <div class="level_icon">1</div>
            </div>

            <div class="module_info_power_usage module_infobox_info">
                16
            </div>

        </div>
    </div>

</div>
<script type="text/javascript">
</script>


<div id="module_xenoModule_small" class="module module_small" onclick="skylab.showModule('xenoModule');" "="">

<table cellpadding="0" cellspacing="0" border="0">
    <tbody><tr>
        <td id="corner_small_top_left_active">
            <div class="name">Xeno module</div>
        </td>
        <td id="corner_small_top_right_active"></td>
    </tr>
    <tr>
        <td id="corner_small_bottom_left_active">
            <table cellpadding="0" cellspacing="0">
                <tbody><tr>
                    <td>
                        <div class="level_icon"></div>
                        <div class="level skylab_font_level"><?=$System->User->Skylab->getModuleLevel('XENOMIT_MODULE') ?></div>
                    </td>
                    <td class="cellview">
                        <div class="power_icon"></div>
                        <div class="power skylab_font_power"><?=$System->User->Skylab->getConsumption('XENOMIT_MODULE') ?></div>
                    </td>
                    <td><br></td>
                </tr>
                </tbody></table>
        </td>
        <td id="corner_small_bottom_right_active"></td>
    </tr>
    </tbody></table>

</div>

<div id="module_xenoModule_large" class="module module_large" style="display: none;">
    <div class="skylab_module_header">
        <div class="name">Xeno module</div>
        <div class="skylab_module_close"></div>
    </div>

    <div id="module_infobox_xenoModule" class="skylab_module_middle">
        <div class="skylab_module_tabs">
            <div class="tab_first skylab_module_tab tab_active" onclick="skylab.changeToTab('first', 'xenoModule')">Info</div>
            <div class="tab_second skylab_module_tab" onclick="skylab.changeToTab('second', 'xenoModule')">Upgrade</div>
        </div>

        <div id="module_infobox_xenoModule_content" class="skylab_module_content">
            <div id="module_infobox_xenoModule_overview_large" class="tabContent skylab_standard">
                <table class="module_infobox_xenoModule" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="firstRow"><strong>Xeno module</strong></td>
                        <td class="secondRow"><strong>Active</strong></td>
                        <td class="thirdRow skylab_price_normal">
                            <div style="position:absolute;width:1px;height:124px;background-image: url(./resources/images/internalSkylab/lab/seperator_vertical_short.png?__cv=b73ea38fd4a85fa2799b1ebde1973a00);background-repeat: no-repeat;background-position: 0px 5px"></div>
                            <strong>Inactive</strong></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow"><strong>Xenomit consumption:</strong></td>
                        <td class="secondRow"><strong>0</strong></td>
                        <td class="thirdRow skylab_price_normal"><strong>0</strong></td>
                    </tr>
                    <tr>
                        <td class="firstRow"><strong>Efficiency:</strong></td>
                        <td class="secondRow"><strong>100%</strong></td>
                        <td class="thirdRow skylab_price_normal"><strong>0%</strong></td>
                    </tr>
                    <tr>
                        <td class="firstRow"><strong>Energy:</strong></td>
                        <td class="secondRow"><strong>16</strong></td>
                        <td class="thirdRow skylab_price_normal"><strong>0</strong></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;"></td>
                    </tr>
                    </tbody></table>

            </div>

            <div id="module_infobox_xenoModule_upgrade_large" class="tabContent skylab_standard" style="display: none;">


                <table class="module_infobox_upgrade" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="firstRow"><br></td>
                        <td class="secondRow">Instant</td>
                        <td class="thirdRow skylab_price_normal" style="width:1px;">
                            <div style="position:absolute;width:1px;height:124px;background-image: url(./resources/images/internalSkylab/lab/seperator_vertical.jpg?__cv=0f3388b877b7ef4dd20df64be8699800);"></div>
                            <br>
                        </td>
                        <td>Normal</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Uridium</td>
                        <td class="secondRow">1,784</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">0</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Credits</td>
                        <td class="secondRow">19,622</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">19,622</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Time</td>
                        <td class="secondRow">0:00</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">2:18</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Prometium</td>
                        <td class="secondRow">849</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">849</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Endurium</td>
                        <td class="secondRow">849</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">849</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Terbium</td>
                        <td class="secondRow">849</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">849</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding:8px 3px">
                            <div class="button_standard" style="float:right;">
                                <a style="display:block;" onfocus="this.blur()" onclick="setConfirmButtonText('confirmText', 'OK'); setCancelButtonText('cancelText', 'Cancel'); openConfirm('indexInternal.es?action=internalSkylab&amp;subaction=instantUpgrade&amp;construction=xenoModule&amp;reloadToken=707059008f089e49905b4272e94bd346', 'Confirm upgrade?')">Instant build</a>
                            </div>
                        </td>
                        <td colspan="2" style="padding:8px 5px">
                            <div class="button_standard">
                                <a style="display:block" onfocus="this.blur()" href="indexInternal.es?action=internalSkylab&amp;subaction=upgrade&amp;construction=xenoModule&amp;reloadToken=707059008f089e49905b4272e94bd346">Build</a>
                            </div>
                        </td>
                    </tr>
                    </tbody></table>

            </div>

            <div id="module_infobox_xenoModule_resourceWarning_large" class="tabContent skylab_standard module_resourceWarning">
                <div id="module_infobox_xenoModule_infomessage" class="module_resourceWarning_text"></div>
                <div class="button_standard module_resourceWarning_button">
                    <a style="display: block;" onfocus="this.blur()" onclick="jQuery('#module_infobox_xenoModule_resourceWarning_large').hide();" href="#">
                        <strong>OK</strong>
                    </a>
                </div>
            </div>
        </div>

        <div id="module_infobox_xenoModule_footer" class="skylab_module_footer">
            <div class="module_info_active_state module_infobox_info">
                <img src="./resources/images/internalSkylab/lab/power_on.png?__cv=4eeda785991deb1830052b0d935d3d00" width="14" height="14" onclick="javascript: do_redirect('indexInternal.es?action=internalSkylab&amp;subaction=setInactive&amp;construction=xenoModule&amp;reloadToken=707059008f089e49905b4272e94bd346');" style="cursor: pointer">
            </div>

            <div class="module_info_level module_infobox_info">
                <div class="level_icon"><?=$System->User->Skylab->getModuleLevel('XENOMIT_MODULE') ?></div>
            </div>

            <div class="module_info_power_usage module_infobox_info">
                16
            </div>

        </div>
    </div>

</div>
<script type="text/javascript">
</script>


<div id="module_prometiumCollector_small" class="module module_small" onclick="skylab.showModule('prometiumCollector');" "="">

<table cellpadding="0" cellspacing="0" border="0">
    <tbody><tr>
        <td id="corner_small_top_left_active">
            <div class="name">Prometium collector</div>
        </td>
        <td id="corner_small_top_right_active"></td>
    </tr>
    <tr>
        <td id="corner_small_bottom_left_active">
            <table cellpadding="0" cellspacing="0">
                <tbody><tr>
                    <td>
                        <div class="level_icon"></div>
                        <div class="level skylab_font_level"><?=$System->User->Skylab->getModuleLevel('PROMETIUM_COLLECTOR') ?></div>
                    </td>
                    <td class="cellview">
                        <div class="power_icon"></div>
                        <div class="power skylab_font_power"><?=$System->User->Skylab->getConsumption('PROMETIUM_COLLECTOR') ?></div>
                    </td>
                    <td><br></td>
                </tr>
                </tbody></table>
        </td>
        <td id="corner_small_bottom_right_active"></td>
    </tr>
    </tbody></table>

</div>

<div id="module_prometiumCollector_large" class="module module_large" style="display: none;">
    <div class="skylab_module_header">
        <div class="name">Prometium collector</div>
        <div class="skylab_module_close"></div>
    </div>

    <div id="module_infobox_prometiumCollector" class="skylab_module_middle">
        <div class="skylab_module_tabs">
            <div class="tab_first skylab_module_tab tab_active" onclick="skylab.changeToTab('first', 'prometiumCollector')">Info</div>
            <div class="tab_second skylab_module_tab" onclick="skylab.changeToTab('second', 'prometiumCollector')">Upgrade</div>
            <div class="tab_third skylab_module_tab" onclick="skylab.changeToTab('third', 'prometiumCollector')">Productivity</div>
        </div>

        <div id="module_infobox_prometiumCollector_content" class="skylab_module_content">
            <div id="module_infobox_prometiumCollector_overview_large" class="tabContent skylab_standard">
                <div class="collector_info collector_info_prometiumCollector">
                    Level:
                    <?=$System->User->Skylab->getModuleLevel('PROMETIUM_COLLECTOR') ?>
                    - Production: <?=$System->User->Skylab->getProduction('PROMETIUM_COLLECTOR')?>

                </div>
            </div>

            <div id="module_infobox_prometiumCollector_upgrade_large" class="tabContent skylab_standard" style="display: none;">


                <table class="module_infobox_upgrade" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="firstRow"><br></td>
                        <td class="secondRow">Instant</td>
                        <td class="thirdRow skylab_price_normal" style="width:1px;">
                            <div style="position:absolute;width:1px;height:124px;background-image: url(./resources/images/internalSkylab/lab/seperator_vertical.jpg?__cv=0f3388b877b7ef4dd20df64be8699800);"></div>
                            <br>
                        </td>
                        <td>Normal</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Uridium</td>
                        <td class="secondRow"><?=number_format($System->User->Skylab->getUridiumCost('PROMETIUM_COLLECTOR'), 0, '.', ',')?></td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">0</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Credits</td>
                        <td class="secondRow"><?=number_format($System->User->Skylab->getCreditsCost('PROMETIUM_COLLECTOR'), 0, '.', ',')?></td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal"><?=number_format($System->User->Skylab->getCreditsCost('PROMETIUM_COLLECTOR'), 0, '.', ',')?></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Time</td>
                        <td class="secondRow">0:00</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal"><?=$System->User->Skylab->getTimeCost('PROMETIUM_COLLECTOR') ?></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Prometium</td>
                        <td class="secondRow"><?=$System->User->Skylab->getPETCost('PROMETIUM_COLLECTOR') ?></td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal"><?=$System->User->Skylab->getPETCost('PROMETIUM_COLLECTOR') ?></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Endurium</td>
                        <td class="secondRow"><?=$System->User->Skylab->getPETCost('PROMETIUM_COLLECTOR') ?></td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal"><?=$System->User->Skylab->getPETCost('PROMETIUM_COLLECTOR') ?></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Terbium</td>
                        <td class="secondRow"><?=$System->User->Skylab->getPETCost('PROMETIUM_COLLECTOR') ?></td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal"><?=$System->User->Skylab->getPETCost('PROMETIUM_COLLECTOR') ?></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding:8px 3px">
                            <div class="button_standard" style="float:right;">
                                <a style="display:block;" onfocus="this.blur()" onclick="setConfirmButtonText('confirmText', 'OK'); setCancelButtonText('cancelText', 'Cancel'); openConfirm('indexInternal.es?action=internalSkylab&amp;subaction=instantUpgrade&amp;construction=prometiumCollector&amp;reloadToken=707059008f089e49905b4272e94bd346', 'Confirm upgrade?')">Instant build</a>
                            </div>
                        </td>
                        <td colspan="2" style="padding:8px 5px">
                            <div class="button_standard">
                                <a style="display:block" onfocus="this.blur()" href="indexInternal.es?action=internalSkylab&amp;subaction=upgrade&amp;construction=prometiumCollector&amp;reloadToken=707059008f089e49905b4272e94bd346">Build</a>
                            </div>
                        </td>
                    </tr>
                    </tbody></table>

            </div>
            <div id="module_infobox_prometiumCollector_productivity_large" class="tabContent skylab_standard" style="display: none;">

                <script>
                    $(document).ready(function(){
                        $('#tdActiveRobts, #prometiumCollector_showActiveRobots').mouseover(function(){
                            $('#prometiumCollector_showActiveRobots').show();
                        });
                        $('#tdActiveRobts, #prometiumCollector_showActiveRobots').mouseout(function(){
                            $('#prometiumCollector_showActiveRobots').hide();
                        });
                    });
                </script>

                <div id="productivity_container">


                    <div id="prometiumCollector_showActiveRobots" class="showActiveRobots" style="display:none;">

                        <?php
                            $robots = $System->User->Skylab->getRobots('PROMETIUM_COLLECTOR');
                            $efficiency = 0;
                            for ($i = 0; $i < 12; $i++) {
                                if ($i == 11) {
                                    ?>
                                    <br class="clearMe">
                                    <?php
                                }
                                if (sizeof($robots) > $i) {
                                    $efficiency += intval($robots[$i]['EFFICIENCY']);
                                    if ($robots[$i]['TYPE'] == 'CRE_ROBOT') {
                                        ?>
                                        <div class="container_robot_small">
                                            <img src="./resources/images/internalSkylab/lab/icon_robot_big.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                                        </div>
                                        <?php
                                    }
                                    else if ($robots[$i]['TYPE'] == 'URI_ROBOT') {
                                        ?>
                                        <div class="container_robot_small">
                                            <img src="./resources/images/internalSkylab/lab/icon_robot_big_elite.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                                        </div>
                                    <?php
                                    }
                                }
                                else {
                                    ?>
                                    <div class="container_robot_small">
                                        <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                                        <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                                    </div>
                                    <?php
                                }
                            }
                        ?>

                    </div>

                    <table cellpadding="0" cellspacing="1">
                        <tbody><tr>
                            <td colspan="2">Efficiency:</td>
                            <td>Bonus:</td>
                            <td style="text-align:right;">Robots:</td>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td style="width:70px;background-color:#1f2022;padding-left:5px;cursor:pointer;">100%</td>
                            <td style="width:15px;cursor:pointer;">+</td>
                            <td style="width:50px;background-color:#1f2022;padding-left:5px;cursor:pointer;color:#23fd10"><span id="prometiumCollector_skylabRobotBonus"><?=$efficiency ?></span>%</td>
                            <td style="width:70px;text-align:right;padding-right:3px;cursor:pointer;">Active</td>
                            <td id="tdActiveRobts" style="width:45px;background-color:#1f2022;text-align:center;cursor:pointer;"><span id="prometiumCollector_skylabActiveRobots" style="color:#23fd10"><?=sizeof($robots) ?></span>/<?=$System->User->Skylab->getMaxRobots('PROMETIUM_COLLECTOR') ?></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align:right;padding-right:3px;">in storage</td>
                            <td style="background-color:#1f2022;text-align:center;" id="prometiumCollector_skylabPendingRobots">1</td>
                        </tr>
                        </tbody></table>

                    <div class="productivity_robotShop">
                        <div class="productivity_robotShop_credits">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_big.png?__cv=29d973635304fd6902b88e3678b88400" width="66" height="57">
                            <div class="skylab_robot_price">250 Credits</div>
                            <div class="button_standard" style="margin: auto;">
                                <a style="display: block;" onfocus="this.blur()" onclick="skylab.buySkylabRobot('1','prometiumCollector');" href="javascript:void(0);">Buy</a>
                            </div>
                        </div>
                        <div class="productivity_robotShop_uridium">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_big_elite.png?__cv=8d70dd00ac084d814c347beb80267400" width="66" height="57">
                            <div class="skylab_robot_price">50 Uridium</div>
                            <div class="button_standard" style="margin: auto;">
                                <a style="display: block;" onfocus="this.blur()" onclick="skylab.buySkylabRobot('2','prometiumCollector');" href="javascript:void(0);">Buy</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div id="module_infobox_prometiumCollector_resourceWarning_large" class="tabContent skylab_standard module_resourceWarning">
                <div id="module_infobox_prometiumCollector_infomessage" class="module_resourceWarning_text"></div>
                <div class="button_standard module_resourceWarning_button">
                    <a style="display: block;" onfocus="this.blur()" onclick="$('#module_infobox_prometiumCollector_resourceWarning_large').hide();" href="#">
                        <strong>OK</strong>
                    </a>
                </div>
            </div>
        </div>

        <div id="module_infobox_prometiumCollector_footer" class="skylab_module_footer">
            <div class="module_info_active_state module_infobox_info">
                <img src="./resources/images/internalSkylab/lab/power_on.png?__cv=4eeda785991deb1830052b0d935d3d00" width="14" height="14" onclick="javascript: do_redirect('indexInternal.es?action=internalSkylab&amp;subaction=setInactive&amp;construction=prometiumCollector&amp;reloadToken=707059008f089e49905b4272e94bd346');" style="cursor: pointer">
            </div>

            <div class="module_info_level module_infobox_info">
                <div class="level_icon"><?=$System->User->Skylab->getModuleLevel('PROMETIUM_COLLECTOR') ?></div>
            </div>

            <div class="module_info_power_usage module_infobox_info">
                <?=$System->User->Skylab->getConsumption('PROMETIUM_COLLECTOR') ?>
            </div>

        </div>
    </div>

</div>
<script type="text/javascript">
</script>


<div id="module_enduriumCollector_small" class="module module_small" onclick="skylab.showModule('enduriumCollector');" "="">

<table cellpadding="0" cellspacing="0" border="0">
    <tbody><tr>
        <td id="corner_small_top_left_active">
            <div class="name">Endurium collector</div>
        </td>
        <td id="corner_small_top_right_active"></td>
    </tr>
    <tr>
        <td id="corner_small_bottom_left_active">
            <table cellpadding="0" cellspacing="0">
                <tbody><tr>
                    <td>
                        <div class="level_icon"></div>
                        <div class="level skylab_font_level"><?=$System->User->Skylab->getModuleLevel('ENDURIUM_COLLECTOR') ?></div>
                    </td>
                    <td class="cellview">
                        <div class="power_icon"></div>
                        <div class="power skylab_font_power"><?=$System->User->Skylab->getConsumption('ENDURIUM_COLLECTOR') ?></div>
                    </td>
                    <td><br></td>
                </tr>
                </tbody></table>
        </td>
        <td id="corner_small_bottom_right_active"></td>
    </tr>
    </tbody></table>

</div>

<div id="module_enduriumCollector_large" class="module module_large" style="display: none;">
    <div class="skylab_module_header">
        <div class="name">Endurium collector</div>
        <div class="skylab_module_close"></div>
    </div>

    <div id="module_infobox_enduriumCollector" class="skylab_module_middle">
        <div class="skylab_module_tabs">
            <div class="tab_first skylab_module_tab tab_active" onclick="skylab.changeToTab('first', 'enduriumCollector')">Info</div>
            <div class="tab_second skylab_module_tab" onclick="skylab.changeToTab('second', 'enduriumCollector')">Upgrade</div>
            <div class="tab_third skylab_module_tab" onclick="skylab.changeToTab('third', 'enduriumCollector')">Productivity</div>
        </div>

        <div id="module_infobox_enduriumCollector_content" class="skylab_module_content">
            <div id="module_infobox_enduriumCollector_overview_large" class="tabContent skylab_standard">
                <div class="collector_info collector_info_enduriumCollector">
                    Level:
                    1
                    - Production: 2200

                </div>
            </div>

            <div id="module_infobox_enduriumCollector_upgrade_large" class="tabContent skylab_standard" style="display: none;">


                <table class="module_infobox_upgrade" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="firstRow"><br></td>
                        <td class="secondRow">Instant</td>
                        <td class="thirdRow skylab_price_normal" style="width:1px;">
                            <div style="position:absolute;width:1px;height:124px;background-image: url(./resources/images/internalSkylab/lab/seperator_vertical.jpg?__cv=0f3388b877b7ef4dd20df64be8699800);"></div>
                            <br>
                        </td>
                        <td>Normal</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Uridium</td>
                        <td class="secondRow">1,189</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">0</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Credits</td>
                        <td class="secondRow">13,081</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">13,081</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Time</td>
                        <td class="secondRow">0:00</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">2:18</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Prometium</td>
                        <td class="secondRow">566</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">566</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Endurium</td>
                        <td class="secondRow">566</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">566</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Terbium</td>
                        <td class="secondRow">566</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">566</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding:8px 3px">
                            <div class="button_standard" style="float:right;">
                                <a style="display:block;" onfocus="this.blur()" onclick="setConfirmButtonText('confirmText', 'OK'); setCancelButtonText('cancelText', 'Cancel'); openConfirm('indexInternal.es?action=internalSkylab&amp;subaction=instantUpgrade&amp;construction=enduriumCollector&amp;reloadToken=707059008f089e49905b4272e94bd346', 'Confirm upgrade?')">Instant build</a>
                            </div>
                        </td>
                        <td colspan="2" style="padding:8px 5px">
                            <div class="button_standard">
                                <a style="display:block" onfocus="this.blur()" href="indexInternal.es?action=internalSkylab&amp;subaction=upgrade&amp;construction=enduriumCollector&amp;reloadToken=707059008f089e49905b4272e94bd346">Build</a>
                            </div>
                        </td>
                    </tr>
                    </tbody></table>

            </div>
            <div id="module_infobox_enduriumCollector_productivity_large" class="tabContent skylab_standard" style="display: none;">

                <script>
                    $(document).ready(function(){
                        let activeRobots = $('#tdActiveRobts, #enduriumCollector_showActiveRobots')
                        activeRobots.mouseover(function(){
                            $('#enduriumCollector_showActiveRobots').show();
                        });
                        activeRobots.mouseout(function(){
                            $('#enduriumCollector_showActiveRobots').hide();
                        });
                    });
                </script>

                <div id="productivity_container">


                    <div id="enduriumCollector_showActiveRobots" class="showActiveRobots" style="display:none;">

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>
                        <br class="clearMe">
                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>


                    </div>

                    <table cellpadding="0" cellspacing="1">
                        <tbody><tr>
                            <td colspan="2">Efficiency:</td>
                            <td>Bonus:</td>
                            <td style="text-align:right;">Robots:</td>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td style="width:70px;background-color:#1f2022;padding-left:5px;cursor:pointer;">100%</td>
                            <td style="width:15px;cursor:pointer;">+</td>
                            <td style="width:50px;background-color:#1f2022;padding-left:5px;cursor:pointer;color:#23fd10"><span id="enduriumCollector_skylabRobotBonus">0</span>%</td>
                            <td style="width:70px;text-align:right;padding-right:3px;cursor:pointer;">Active</td>
                            <td id="tdActiveRobts" style="width:45px;background-color:#1f2022;text-align:center;cursor:pointer;"><span id="enduriumCollector_skylabActiveRobots" style="color:#23fd10">0</span>/12</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align:right;padding-right:3px;">in storage</td>
                            <td style="background-color:#1f2022;text-align:center;" id="enduriumCollector_skylabPendingRobots">0</td>
                        </tr>
                        </tbody></table>

                    <div class="productivity_robotShop">
                        <div class="productivity_robotShop_credits">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_big.png?__cv=29d973635304fd6902b88e3678b88400" width="66" height="57">
                            <div class="skylab_robot_price">250 Credits</div>
                            <div class="button_standard" style="margin: auto;">
                                <a style="display: block;" onfocus="this.blur()" onclick="skylab.buySkylabRobot('1','enduriumCollector');" href="javascript:void(0);">Buy</a>
                            </div>
                        </div>
                        <div class="productivity_robotShop_uridium">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_big_elite.png?__cv=8d70dd00ac084d814c347beb80267400" width="66" height="57">
                            <div class="skylab_robot_price">50 Uridium</div>
                            <div class="button_standard" style="margin: auto;">
                                <a style="display: block;" onfocus="this.blur()" onclick="skylab.buySkylabRobot('2','enduriumCollector');" href="javascript:void(0);">Buy</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div id="module_infobox_enduriumCollector_resourceWarning_large" class="tabContent skylab_standard module_resourceWarning">
                <div id="module_infobox_enduriumCollector_infomessage" class="module_resourceWarning_text"></div>
                <div class="button_standard module_resourceWarning_button">
                    <a style="display: block;" onfocus="this.blur()" onclick="jQuery('#module_infobox_enduriumCollector_resourceWarning_large').hide();" href="#">
                        <strong>OK</strong>
                    </a>
                </div>
            </div>
        </div>

        <div id="module_infobox_enduriumCollector_footer" class="skylab_module_footer">
            <div class="module_info_active_state module_infobox_info">
                <img src="./resources/images/internalSkylab/lab/power_on.png?__cv=4eeda785991deb1830052b0d935d3d00" width="14" height="14" onclick="javascript: do_redirect('indexInternal.es?action=internalSkylab&amp;subaction=setInactive&amp;construction=enduriumCollector&amp;reloadToken=707059008f089e49905b4272e94bd346');" style="cursor: pointer">
            </div>

            <div class="module_info_level module_infobox_info">
                <div class="level_icon"><?=$System->User->Skylab->getModuleLevel('ENDURIUM_COLLECTOR') ?></div>
            </div>

            <div class="module_info_power_usage module_infobox_info">
                <?=$System->User->Skylab->getConsumption('ENDURIUM_COLLECTOR') ?>
            </div>

        </div>
    </div>

</div>
<script type="text/javascript">
</script>


<div id="module_terbiumCollector_small" class="module module_small" onclick="skylab.showModule('terbiumCollector');" "="">

<table cellpadding="0" cellspacing="0" border="0">
    <tbody><tr>
        <td id="corner_small_top_left_active">
            <div class="name">Terbium collector</div>
        </td>
        <td id="corner_small_top_right_active"></td>
    </tr>
    <tr>
        <td id="corner_small_bottom_left_active">
            <table cellpadding="0" cellspacing="0">
                <tbody><tr>
                    <td>
                        <div class="level_icon"></div>
                        <div class="level skylab_font_level"><?=$System->User->Skylab->getModuleLevel('TERBIUM_COLLECTOR') ?></div>
                    </td>
                    <td class="cellview">
                        <div class="power_icon"></div>
                        <div class="power skylab_font_power"><?=$System->User->Skylab->getConsumption('TERBIUM_COLLECTOR') ?></div>
                    </td>
                    <td><br></td>
                </tr>
                </tbody></table>
        </td>
        <td id="corner_small_bottom_right_active"></td>
    </tr>
    </tbody></table>

</div>

<div id="module_terbiumCollector_large" class="module module_large" style="display: none;">
    <div class="skylab_module_header">
        <div class="name">Terbium collector</div>
        <div class="skylab_module_close"></div>
    </div>

    <div id="module_infobox_terbiumCollector" class="skylab_module_middle">
        <div class="skylab_module_tabs">
            <div class="tab_first skylab_module_tab tab_active" onclick="skylab.changeToTab('first', 'terbiumCollector')">Info</div>
            <div class="tab_second skylab_module_tab" onclick="skylab.changeToTab('second', 'terbiumCollector')">Upgrade</div>
            <div class="tab_third skylab_module_tab" onclick="skylab.changeToTab('third', 'terbiumCollector')">Productivity</div>
        </div>

        <div id="module_infobox_terbiumCollector_content" class="skylab_module_content">
            <div id="module_infobox_terbiumCollector_overview_large" class="tabContent skylab_standard">
                <div class="collector_info collector_info_terbiumCollector">
                    Level:
                    1
                    - Production: 2200

                </div>
            </div>

            <div id="module_infobox_terbiumCollector_upgrade_large" class="tabContent skylab_standard" style="display: none;">


                <table class="module_infobox_upgrade" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="firstRow"><br></td>
                        <td class="secondRow">Instant</td>
                        <td class="thirdRow skylab_price_normal" style="width:1px;">
                            <div style="position:absolute;width:1px;height:124px;background-image: url(./resources/images/internalSkylab/lab/seperator_vertical.jpg?__cv=0f3388b877b7ef4dd20df64be8699800);"></div>
                            <br>
                        </td>
                        <td>Normal</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Uridium</td>
                        <td class="secondRow">1,189</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">0</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Credits</td>
                        <td class="secondRow">13,081</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">13,081</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Time</td>
                        <td class="secondRow">0:00</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">2:18</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Prometium</td>
                        <td class="secondRow">566</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">566</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Endurium</td>
                        <td class="secondRow">566</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">566</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Terbium</td>
                        <td class="secondRow">566</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">566</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding:8px 3px">
                            <div class="button_standard" style="float:right;">
                                <a style="display:block;" onfocus="this.blur()" onclick="setConfirmButtonText('confirmText', 'OK'); setCancelButtonText('cancelText', 'Cancel'); openConfirm('indexInternal.es?action=internalSkylab&amp;subaction=instantUpgrade&amp;construction=terbiumCollector&amp;reloadToken=707059008f089e49905b4272e94bd346', 'Confirm upgrade?')">Instant build</a>
                            </div>
                        </td>
                        <td colspan="2" style="padding:8px 5px">
                            <div class="button_standard">
                                <a style="display:block" onfocus="this.blur()" href="indexInternal.es?action=internalSkylab&amp;subaction=upgrade&amp;construction=terbiumCollector&amp;reloadToken=707059008f089e49905b4272e94bd346">Build</a>
                            </div>
                        </td>
                    </tr>
                    </tbody></table>

            </div>
            <div id="module_infobox_terbiumCollector_productivity_large" class="tabContent skylab_standard" style="display: none;">

                <script>
                    jQuery(document).ready(function(){
                        jQuery('#tdActiveRobts, #terbiumCollector_showActiveRobots').mouseover(function(){
                            jQuery('#terbiumCollector_showActiveRobots').show();
                        });
                        jQuery('#tdActiveRobts, #terbiumCollector_showActiveRobots').mouseout(function(){
                            jQuery('#terbiumCollector_showActiveRobots').hide();
                        });
                    });
                </script>

                <div id="productivity_container">


                    <div id="terbiumCollector_showActiveRobots" class="showActiveRobots" style="display:none;">

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>
                        <br class="clearMe">
                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>

                        <div class="container_robot_small">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_empty.png?__cv=f7ff82658232a01263ae70afb4011400" width="39" height="34">
                            <div style="width:33px;text-align:center;margin-left:5px;"><br></div>
                        </div>


                    </div>

                    <table cellpadding="0" cellspacing="1">
                        <tbody><tr>
                            <td colspan="2">Efficiency:</td>
                            <td>Bonus:</td>
                            <td style="text-align:right;">Robots:</td>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td style="width:70px;background-color:#1f2022;padding-left:5px;cursor:pointer;">100%</td>
                            <td style="width:15px;cursor:pointer;">+</td>
                            <td style="width:50px;background-color:#1f2022;padding-left:5px;cursor:pointer;color:#23fd10"><span id="terbiumCollector_skylabRobotBonus">0</span>%</td>
                            <td style="width:70px;text-align:right;padding-right:3px;cursor:pointer;">Active</td>
                            <td id="tdActiveRobts" style="width:45px;background-color:#1f2022;text-align:center;cursor:pointer;"><span id="terbiumCollector_skylabActiveRobots" style="color:#23fd10">0</span>/12</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align:right;padding-right:3px;">in storage</td>
                            <td style="background-color:#1f2022;text-align:center;" id="terbiumCollector_skylabPendingRobots">0</td>
                        </tr>
                        </tbody></table>

                    <div class="productivity_robotShop">
                        <div class="productivity_robotShop_credits">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_big.png?__cv=29d973635304fd6902b88e3678b88400" width="66" height="57">
                            <div class="skylab_robot_price">250 Credits</div>
                            <div class="button_standard" style="margin: auto;">
                                <a style="display: block;" onfocus="this.blur()" onclick="skylab.buySkylabRobot('1','terbiumCollector');" href="javascript:void(0);">Buy</a>
                            </div>
                        </div>
                        <div class="productivity_robotShop_uridium">
                            <img src="./resources/images/internalSkylab/lab/icon_robot_big_elite.png?__cv=8d70dd00ac084d814c347beb80267400" width="66" height="57">
                            <div class="skylab_robot_price">50 Uridium</div>
                            <div class="button_standard" style="margin: auto;">
                                <a style="display: block;" onfocus="this.blur()" onclick="skylab.buySkylabRobot('2','terbiumCollector');" href="javascript:void(0);">Buy</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div id="module_infobox_terbiumCollector_resourceWarning_large" class="tabContent skylab_standard module_resourceWarning">
                <div id="module_infobox_terbiumCollector_infomessage" class="module_resourceWarning_text"></div>
                <div class="button_standard module_resourceWarning_button">
                    <a style="display: block;" onfocus="this.blur()" onclick="jQuery('#module_infobox_terbiumCollector_resourceWarning_large').hide();" href="#">
                        <strong>OK</strong>
                    </a>
                </div>
            </div>
        </div>

        <div id="module_infobox_terbiumCollector_footer" class="skylab_module_footer">
            <div class="module_info_active_state module_infobox_info">
                <img src="./resources/images/internalSkylab/lab/power_on.png?__cv=4eeda785991deb1830052b0d935d3d00" width="14" height="14" onclick="javascript: do_redirect('indexInternal.es?action=internalSkylab&amp;subaction=setInactive&amp;construction=terbiumCollector&amp;reloadToken=707059008f089e49905b4272e94bd346');" style="cursor: pointer">
            </div>

            <div class="module_info_level module_infobox_info">
                <div class="level_icon"><?=$System->User->Skylab->getModuleLevel('TERBIUM_COLLECTOR') ?></div>
            </div>

            <div class="module_info_power_usage module_infobox_info">
                <?=$System->User->Skylab->getConsumption('TERBIUM_COLLECTOR') ?>
            </div>

        </div>
    </div>

</div>
<script type="text/javascript">
</script>


<div id="module_prometidRefinery_small" class="module module_small" onclick="skylab.showModule('prometidRefinery');" "="">

<table cellpadding="0" cellspacing="0" border="0">
    <tbody><tr>
        <td id="corner_small_top_left_active">
            <div class="name">Prometid refinery</div>
        </td>
        <td id="corner_small_top_right_active"></td>
    </tr>
    <tr>
        <td id="corner_small_bottom_left_active">
            <table cellpadding="0" cellspacing="0">
                <tbody><tr>
                    <td>
                        <div class="level_icon"></div>
                        <div class="level skylab_font_level"><?=$System->User->Skylab->getModuleLevel('PROMETID_COLLECTOR') ?></div>
                    </td>
                    <td class="cellview">
                        <div class="power_icon"></div>
                        <div class="power skylab_font_power"><?=$System->User->Skylab->getConsumption('PROMETID_COLLECTOR') ?></div>
                    </td>
                    <td class="cellview">
                        <div class="efficiency_icon"></div>
                        <div class="efficiency skylab_font_efficiency">100%</div>
                    </td>
                </tr>
                </tbody></table>
        </td>
        <td id="corner_small_bottom_right_active"></td>
    </tr>
    </tbody></table>

</div>

<div id="module_prometidRefinery_large" class="module module_large" style="display: none;">
    <div class="skylab_module_header">
        <div class="name">Prometid refinery</div>
        <div class="skylab_module_close"></div>
    </div>

    <div id="module_infobox_prometidRefinery" class="skylab_module_middle">
        <div class="skylab_module_tabs">
            <div class="tab_first skylab_module_tab tab_active" onclick="skylab.changeToTab('first', 'prometidRefinery')">Info</div>
            <div class="tab_second skylab_module_tab" onclick="skylab.changeToTab('second', 'prometidRefinery')">Upgrade</div>
        </div>

        <div id="module_infobox_prometidRefinery_content" class="skylab_module_content">
            <div id="module_infobox_prometidRefinery_overview_large" class="tabContent skylab_standard">
                <div style="height:135px;background-image: url(./resources/images/internalSkylab/lab/bg_refinery_3.png?__cv=8a7c8d311f248f5e62d247296cbdc300); background-repeat:no-repeat;background-position: center 25px">
                    <div style="position:absolute;left:75px;top:90px;" class="ore_prometium"><strong>Prometium<br>
                            2200</strong></div>
                    <div style="position:absolute;left:235px;top:90px;text-align:right;" class="ore_endurium"><strong>Endurium<br>
                            1100</strong></div>
                    <div style="position:absolute;left:100px;top:150px;">100%</div>
                    <div style="position:absolute;left:155px;top:185px;" class="ore_prometid"><strong>Prometid<br>
                            110</strong></div>
                    <div class="icon_efficiency icon_efficiency_100"></div>
                </div>
            </div>

            <div id="module_infobox_prometidRefinery_upgrade_large" class="tabContent skylab_standard" style="display: none;">


                <table class="module_infobox_upgrade" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="firstRow"><br></td>
                        <td class="secondRow">Instant</td>
                        <td class="thirdRow skylab_price_normal" style="width:1px;">
                            <div style="position:absolute;width:1px;height:124px;background-image: url(./resources/images/internalSkylab/lab/seperator_vertical.jpg?__cv=0f3388b877b7ef4dd20df64be8699800);"></div>
                            <br>
                        </td>
                        <td>Normal</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Uridium</td>
                        <td class="secondRow">1,784</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">0</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Credits</td>
                        <td class="secondRow">19,622</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">19,622</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Time</td>
                        <td class="secondRow">0:00</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">3:49</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Prometium</td>
                        <td class="secondRow">849</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">849</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Endurium</td>
                        <td class="secondRow">849</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">849</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Terbium</td>
                        <td class="secondRow">849</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">849</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding:8px 3px">
                            <div class="button_standard" style="float:right;">
                                <a style="display:block;" onfocus="this.blur()" onclick="setConfirmButtonText('confirmText', 'OK'); setCancelButtonText('cancelText', 'Cancel'); openConfirm('indexInternal.es?action=internalSkylab&amp;subaction=instantUpgrade&amp;construction=prometidRefinery&amp;reloadToken=707059008f089e49905b4272e94bd346', 'Confirm upgrade?')">Instant build</a>
                            </div>
                        </td>
                        <td colspan="2" style="padding:8px 5px">
                            <div class="button_standard">
                                <a style="display:block" onfocus="this.blur()" href="indexInternal.es?action=internalSkylab&amp;subaction=upgrade&amp;construction=prometidRefinery&amp;reloadToken=707059008f089e49905b4272e94bd346">Build</a>
                            </div>
                        </td>
                    </tr>
                    </tbody></table>

            </div>

            <div id="module_infobox_prometidRefinery_resourceWarning_large" class="tabContent skylab_standard module_resourceWarning">
                <div id="module_infobox_prometidRefinery_infomessage" class="module_resourceWarning_text"></div>
                <div class="button_standard module_resourceWarning_button">
                    <a style="display: block;" onfocus="this.blur()" onclick="jQuery('#module_infobox_prometidRefinery_resourceWarning_large').hide();" href="#">
                        <strong>OK</strong>
                    </a>
                </div>
            </div>
        </div>

        <div id="module_infobox_prometidRefinery_footer" class="skylab_module_footer">
            <div class="module_info_active_state module_infobox_info">
                <img src="./resources/images/internalSkylab/lab/power_on.png?__cv=4eeda785991deb1830052b0d935d3d00" width="14" height="14" onclick="javascript: do_redirect('indexInternal.es?action=internalSkylab&amp;subaction=setInactive&amp;construction=prometidRefinery&amp;reloadToken=707059008f089e49905b4272e94bd346');" style="cursor: pointer">
            </div>

            <div class="module_info_level module_infobox_info">
                <div class="level_icon"><?=$System->User->Skylab->getModuleLevel('PROMETID_COLLECTOR') ?></div>
            </div>

            <div class="module_info_power_usage module_infobox_info">
                <?=$System->User->Skylab->getConsumption('PROMETID_COLLECTOR') ?>
            </div>

            <div class="module_info_efficiency module_infobox_info">
                100 %
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
</script>


<div id="module_duraniumRefinery_small" class="module module_small" onclick="skylab.showModule('duraniumRefinery');" "="">

<table cellpadding="0" cellspacing="0" border="0">
    <tbody><tr>
        <td id="corner_small_top_left_active">
            <div class="name">Duranium refinery</div>
        </td>
        <td id="corner_small_top_right_active"></td>
    </tr>
    <tr>
        <td id="corner_small_bottom_left_active">
            <table cellpadding="0" cellspacing="0">
                <tbody><tr>
                    <td>
                        <div class="level_icon"></div>
                        <div class="level skylab_font_level"><?=$System->User->Skylab->getModuleLevel('DURANIUM_COLLECTOR') ?></div>
                    </td>
                    <td class="cellview">
                        <div class="power_icon"></div>
                        <div class="power skylab_font_power"><?=$System->User->Skylab->getConsumption('DURANIUM_COLLECTOR') ?></div>
                    </td>
                    <td class="cellview">
                        <div class="efficiency_icon"></div>
                        <div class="efficiency skylab_font_efficiency">100%</div>
                    </td>
                </tr>
                </tbody></table>
        </td>
        <td id="corner_small_bottom_right_active"></td>
    </tr>
    </tbody></table>

</div>

<div id="module_duraniumRefinery_large" class="module module_large" style="display: none;">
    <div class="skylab_module_header">
        <div class="name">Duranium refinery</div>
        <div class="skylab_module_close"></div>
    </div>

    <div id="module_infobox_duraniumRefinery" class="skylab_module_middle">
        <div class="skylab_module_tabs">
            <div class="tab_first skylab_module_tab tab_active" onclick="skylab.changeToTab('first', 'duraniumRefinery')">Info</div>
            <div class="tab_second skylab_module_tab" onclick="skylab.changeToTab('second', 'duraniumRefinery')">Upgrade</div>
        </div>

        <div id="module_infobox_duraniumRefinery_content" class="skylab_module_content">
            <div id="module_infobox_duraniumRefinery_overview_large" class="tabContent skylab_standard">
                <div style="height:135px;background-image: url(./resources/images/internalSkylab/lab/bg_refinery_3.png?__cv=8a7c8d311f248f5e62d247296cbdc300); background-repeat:no-repeat;background-position: center 25px">
                    <div style="position:absolute;left:75px;top:90px;" class="ore_endurium"><strong>Endurium<br>
                            1100</strong></div>
                    <div style="position:absolute;left:235px;top:90px;text-align:right;" class="ore_terbium"><strong>Terbium<br>
                            2200</strong></div>
                    <div style="position:absolute;left:100px;top:150px;">100%</div>
                    <div style="position:absolute;left:155px;top:185px;" class="ore_duranium"><strong>Duranium<br>
                            110</strong></div>
                    <div class="icon_efficiency icon_efficiency_100"></div>
                </div>
            </div>

            <div id="module_infobox_duraniumRefinery_upgrade_large" class="tabContent skylab_standard" style="display: none;">


                <table class="module_infobox_upgrade" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="firstRow"><br></td>
                        <td class="secondRow">Instant</td>
                        <td class="thirdRow skylab_price_normal" style="width:1px;">
                            <div style="position:absolute;width:1px;height:124px;background-image: url(./resources/images/internalSkylab/lab/seperator_vertical.jpg?__cv=0f3388b877b7ef4dd20df64be8699800);"></div>
                            <br>
                        </td>
                        <td>Normal</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Uridium</td>
                        <td class="secondRow">1,784</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">0</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Credits</td>
                        <td class="secondRow">19,622</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">19,622</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Time</td>
                        <td class="secondRow">0:00</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">3:49</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Prometium</td>
                        <td class="secondRow">849</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">849</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Endurium</td>
                        <td class="secondRow">849</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">849</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Terbium</td>
                        <td class="secondRow">849</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">849</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding:8px 3px">
                            <div class="button_standard" style="float:right;">
                                <a style="display:block;" onfocus="this.blur()" onclick="setConfirmButtonText('confirmText', 'OK'); setCancelButtonText('cancelText', 'Cancel'); openConfirm('indexInternal.es?action=internalSkylab&amp;subaction=instantUpgrade&amp;construction=duraniumRefinery&amp;reloadToken=707059008f089e49905b4272e94bd346', 'Confirm upgrade?')">Instant build</a>
                            </div>
                        </td>
                        <td colspan="2" style="padding:8px 5px">
                            <div class="button_standard">
                                <a style="display:block" onfocus="this.blur()" href="indexInternal.es?action=internalSkylab&amp;subaction=upgrade&amp;construction=duraniumRefinery&amp;reloadToken=707059008f089e49905b4272e94bd346">Build</a>
                            </div>
                        </td>
                    </tr>
                    </tbody></table>

            </div>

            <div id="module_infobox_duraniumRefinery_resourceWarning_large" class="tabContent skylab_standard module_resourceWarning">
                <div id="module_infobox_duraniumRefinery_infomessage" class="module_resourceWarning_text"></div>
                <div class="button_standard module_resourceWarning_button">
                    <a style="display: block;" onfocus="this.blur()" onclick="jQuery('#module_infobox_duraniumRefinery_resourceWarning_large').hide();" href="#">
                        <strong>OK</strong>
                    </a>
                </div>
            </div>
        </div>

        <div id="module_infobox_duraniumRefinery_footer" class="skylab_module_footer">
            <div class="module_info_active_state module_infobox_info">
                <img src="./resources/images/internalSkylab/lab/power_on.png?__cv=4eeda785991deb1830052b0d935d3d00" width="14" height="14" onclick="javascript: do_redirect('indexInternal.es?action=internalSkylab&amp;subaction=setInactive&amp;construction=duraniumRefinery&amp;reloadToken=707059008f089e49905b4272e94bd346');" style="cursor: pointer">
            </div>

            <div class="module_info_level module_infobox_info">
                <div class="level_icon"><?=$System->User->Skylab->getModuleLevel('DURANIUM_COLLECTOR') ?></div>
            </div>

            <div class="module_info_power_usage module_infobox_info">
                <?=$System->User->Skylab->getConsumption('DURANIUM_COLLECTOR') ?>
            </div>

            <div class="module_info_efficiency module_infobox_info">
                100 %
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
</script>


<div id="module_promeriumRefinery_small" class="module module_small" onclick="skylab.showModule('promeriumRefinery');" "="">

<table cellpadding="0" cellspacing="0" border="0">
    <tbody><tr>
        <td id="corner_small_top_left_active">
            <div class="name">Promerium refinery</div>
        </td>
        <td id="corner_small_top_right_active"></td>
    </tr>
    <tr>
        <td id="corner_small_bottom_left_active">
            <table cellpadding="0" cellspacing="0">
                <tbody><tr>
                    <td>
                        <div class="level_icon"></div>
                        <div class="level skylab_font_level"><?=$System->User->Skylab->getModuleLevel('PROMERIUM_COLLECTOR') ?></div>
                    </td>
                    <td class="cellview">
                        <div class="power_icon"></div>
                        <div class="power skylab_font_power"><?=$System->User->Skylab->getConsumption('PROMERIUM_COLLECTOR') ?></div>
                    </td>
                    <td class="cellview">
                        <div class="efficiency_icon"></div>
                        <div class="efficiency skylab_font_efficiency">100%</div>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td id="corner_small_bottom_right_active"></td>
    </tr>
    </tbody></table>

</div>

<div id="module_promeriumRefinery_large" class="module module_large" style="display: none;">
    <div class="skylab_module_header">
        <div class="name">Promerium refinery</div>
        <div class="skylab_module_close"></div>
    </div>

    <div id="module_infobox_promeriumRefinery" class="skylab_module_middle">
        <div class="skylab_module_tabs">
            <div class="tab_first skylab_module_tab tab_active" onclick="skylab.changeToTab('first', 'promeriumRefinery')">Info</div>
            <div class="tab_second skylab_module_tab" onclick="skylab.changeToTab('second', 'promeriumRefinery')">Upgrade</div>
        </div>

        <div id="module_infobox_promeriumRefinery_content" class="skylab_module_content">
            <div id="module_infobox_promeriumRefinery_overview_large" class="tabContent skylab_standard">
                <div style="height:135px;background-image: url(./resources/images/internalSkylab/lab/bg_refinery_4.png?__cv=9dd223956044f647ac612c7c50752200); background-repeat:no-repeat;background-position: 115px 25px">
                    <div style="position:absolute;left:75px;top:90px;" class="ore_prometid"><strong>Prometid<br>
                            0</strong></div>
                    <div style="position:absolute;left:235px;top:90px;text-align:right;" class="ore_duranium"><strong>Duranium<br>
                            0</strong></div>
                    <div style="position:absolute;left:260px;top:136px;text-align:right;" class="ore_xenomit"><strong>Xenomit<br>
                            0</strong></div>
                    <div style="position:absolute;left:100px;top:150px;">0%</div>
                    <div style="position:absolute;left:160px;top:190px;" class="ore_promerium"><strong>Promerium<br>
                            0</strong></div>
                    <div class="icon_efficiency icon_efficiency_0"></div>
                    <div class="icon_attention"></div>
                </div>

            </div>

            <div id="module_infobox_promeriumRefinery_upgrade_large" class="tabContent skylab_standard" style="display: none;">


                <table class="module_infobox_upgrade" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="firstRow"><br></td>
                        <td class="secondRow">Instant</td>
                        <td class="thirdRow skylab_price_normal" style="width:1px;">
                            <div style="position:absolute;width:1px;height:124px;background-image: url(./resources/images/internalSkylab/lab/seperator_vertical.jpg?__cv=0f3388b877b7ef4dd20df64be8699800);"></div>
                            <br>
                        </td>
                        <td>Normal</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Uridium</td>
                        <td class="secondRow">1,250</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">0</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Credits</td>
                        <td class="secondRow">13,750</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">13,750</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Time</td>
                        <td class="secondRow">0:00</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">3:0</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Prometium</td>
                        <td class="secondRow">125</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">125</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Endurium</td>
                        <td class="secondRow">125</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">125</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Terbium</td>
                        <td class="secondRow">125</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">125</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding:8px 3px">
                            <div class="button_standard" style="float:right;">
                                <a style="display:block;" onfocus="this.blur()" onclick="setConfirmButtonText('confirmText', 'OK'); setCancelButtonText('cancelText', 'Cancel'); openConfirm('indexInternal.es?action=internalSkylab&amp;subaction=instantUpgrade&amp;construction=promeriumRefinery&amp;reloadToken=707059008f089e49905b4272e94bd346', 'Confirm upgrade?')">Instant build</a>
                            </div>
                        </td>
                        <td colspan="2" style="padding:8px 5px">
                            <div class="button_standard">
                                <a style="display:block" onfocus="this.blur()" href="indexInternal.es?action=internalSkylab&amp;subaction=upgrade&amp;construction=promeriumRefinery&amp;reloadToken=707059008f089e49905b4272e94bd346">Build</a>
                            </div>
                        </td>
                    </tr>
                    </tbody></table>

            </div>

            <div id="module_infobox_promeriumRefinery_resourceWarning_large" class="tabContent skylab_standard module_resourceWarning">
                <div id="module_infobox_promeriumRefinery_infomessage" class="module_resourceWarning_text"></div>
                <div class="button_standard module_resourceWarning_button">
                    <a style="display: block;" onfocus="this.blur()" onclick="jQuery('#module_infobox_promeriumRefinery_resourceWarning_large').hide();" href="#">
                        <strong>OK</strong>
                    </a>
                </div>
            </div>
        </div>

        <div id="module_infobox_promeriumRefinery_footer" class="skylab_module_footer">
            <div class="module_info_active_state module_infobox_info">
                <img src="./resources/images/internalSkylab/lab/power_disabled.png?__cv=b0a4878430feb41ac03c5a6d796fda00" width="14" height="14">
            </div>

            <div class="module_info_level module_infobox_info">
                <div class="level_icon"><?=$System->User->Skylab->getModuleLevel('PROMERIUM_COLLECTOR') ?></div>
            </div>

            <div class="module_info_power_usage module_infobox_info">
                <?=$System->User->Skylab->getConsumption('PROMERIUM_COLLECTOR') ?>
            </div>

            <div class="module_info_efficiency module_infobox_info">
                0 %
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
</script>


<div id="module_sepromRefinery_small" class="module module_small" onclick="skylab.showModule('sepromRefinery');" "="">

<table cellpadding="0" cellspacing="0" border="0">
    <tbody><tr>
        <td id="corner_small_top_left_active">
            <div class="name">Seprom refinery</div>
        </td>
        <td id="corner_small_top_right_active"></td>
    </tr>
    <tr>
        <td id="corner_small_bottom_left_active">
            <table cellpadding="0" cellspacing="0">
                <tbody><tr>
                    <td>
                        <div class="level_icon"></div>
                        <div class="level skylab_font_level"><?=$System->User->Skylab->getModuleLevel('SEPROM_COLLECTOR') ?></div>
                    </td>
                    <td class="cellview">
                        <div class="power_icon"></div>
                        <div class="power skylab_font_power"><?=$System->User->Skylab->getConsumption('SEPROM_COLLECTOR') ?></div>
                    </td>
                    <td class="cellview">
                        <div class="efficiency_icon"></div>
                        <div class="efficiency skylab_font_efficiency">100%</div>
                    </td>
                </tr>
                </tbody></table>
        </td>
        <td id="corner_small_bottom_right_active"></td>
    </tr>
    </tbody></table>

</div>

<div id="module_sepromRefinery_large" class="module module_large" style="display: none;">
    <div class="skylab_module_header">
        <div class="name">Seprom refinery</div>
        <div class="skylab_module_close"></div>
    </div>

    <div id="module_infobox_sepromRefinery" class="skylab_module_middle">
        <div class="skylab_module_tabs">
            <div class="tab_first skylab_module_tab tab_active" onclick="skylab.changeToTab('first', 'sepromRefinery')">Info</div>
            <div class="tab_second skylab_module_tab" onclick="skylab.changeToTab('second', 'sepromRefinery')">Upgrade</div>
        </div>

        <div id="module_infobox_sepromRefinery_content" class="skylab_module_content">
            <div id="module_infobox_sepromRefinery_overview_large" class="tabContent skylab_standard">
                <div style="height:135px;background-image: url(./resources/images/internalSkylab/lab/bg_refinery_2.png?__cv=5a25a0c14d434545e396a7fc9d45e000); background-repeat:no-repeat;background-position: center 25px">
                    <div style="position:absolute;left:75px;top:90px;" class="ore_promerium"><strong>Promerium<br>
                            0</strong></div>
                    <div style="position:absolute;left:100px;top:150px;">0%</div>
                    <div style="position:absolute;left:155px;top:185px;" class="ore_seprom"><strong>Seprom<br>
                            0</strong></div>
                    <div class="icon_efficiency icon_efficiency_0"></div>
                    <div class="icon_attention"></div>
                </div>

            </div>

            <div id="module_infobox_sepromRefinery_upgrade_large" class="tabContent skylab_standard" style="display: none;">


                <table class="module_infobox_upgrade" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="firstRow"><br></td>
                        <td class="secondRow">Instant</td>
                        <td class="thirdRow skylab_price_normal" style="width:1px;">
                            <div style="position:absolute;width:1px;height:124px;background-image: url(./resources/images/internalSkylab/lab/seperator_vertical.jpg?__cv=0f3388b877b7ef4dd20df64be8699800);"></div>
                            <br>
                        </td>
                        <td>Normal</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Uridium</td>
                        <td class="secondRow">2,500</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">0</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td class="firstRow">Credits</td>
                        <td class="secondRow">27,500</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">27,500</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Time</td>
                        <td class="secondRow">0:00</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">6:0</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Prometium</td>
                        <td class="secondRow">250</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">250</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Endurium</td>
                        <td class="secondRow">250</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">250</td>
                    </tr>
                    <tr>
                        <td class="firstRow">Terbium</td>
                        <td class="secondRow">250</td>
                        <td><br></td>
                        <td class="thirdRow skylab_price_normal">250</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:1px;background-image: url(./resources/images/internalSkylab/lab/seperator_horizontal.jpg?__cv=b7a2175510ce6023a12e11870f954500);background-repeat:no-repeat;background-position: 65px;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding:8px 3px">
                            <div class="button_standard" style="float:right;">
                                <a style="display:block;" onfocus="this.blur()" onclick="setConfirmButtonText('confirmText', 'OK'); setCancelButtonText('cancelText', 'Cancel'); openConfirm('indexInternal.es?action=internalSkylab&amp;subaction=instantUpgrade&amp;construction=sepromRefinery&amp;reloadToken=707059008f089e49905b4272e94bd346', 'Confirm upgrade?')">Instant build</a>
                            </div>
                        </td>
                        <td colspan="2" style="padding:8px 5px">
                            <div class="button_standard">
                                <a style="display:block" onfocus="this.blur()" href="indexInternal.es?action=internalSkylab&amp;subaction=upgrade&amp;construction=sepromRefinery&amp;reloadToken=707059008f089e49905b4272e94bd346">Build</a>
                            </div>
                        </td>
                    </tr>
                    </tbody></table>

            </div>

            <div id="module_infobox_sepromRefinery_resourceWarning_large" class="tabContent skylab_standard module_resourceWarning" style="display: block;">
                <div id="module_infobox_sepromRefinery_infomessage" class="module_resourceWarning_text">Before you upgrade your Seprom refinery, you should build a Promerium refinery so that you'll have enough resources to refine. This refinery is located on the right in the Skylab.</div>
                <div class="button_standard module_resourceWarning_button">
                    <a style="display: block;" onfocus="this.blur()" onclick="jQuery('#module_infobox_sepromRefinery_resourceWarning_large').hide();" href="#">
                        <strong>OK</strong>
                    </a>
                </div>
            </div>
        </div>

        <div id="module_infobox_sepromRefinery_footer" class="skylab_module_footer">
            <div class="module_info_active_state module_infobox_info">
                <img src="./resources/images/internalSkylab/lab/power_disabled.png?__cv=b0a4878430feb41ac03c5a6d796fda00" width="14" height="14">
            </div>

            <div class="module_info_level module_infobox_info">
                <div class="level_icon"><?=$System->User->Skylab->getModuleLevel('SEPROM_COLLECTOR') ?></div>
            </div>

            <div class="module_info_power_usage module_infobox_info">
                <?=$System->User->Skylab->getConsumption('SEPROM_COLLECTOR') ?>
            </div>

            <div class="module_info_efficiency module_infobox_info">
                0 %
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    jQuery('#module_infobox_sepromRefinery_infomessage').html("Before you upgrade your Seprom refinery, you should build a Promerium refinery so that you'll have enough resources to refine. This refinery is located on the right in the Skylab.");
    jQuery('#module_infobox_sepromRefinery_resourceWarning_large').show();
</script>

</div>