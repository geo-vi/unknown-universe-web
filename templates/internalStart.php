<div id="playerInfo-tv-container">

    <!-- Player info when you hover the ship -->
    <div id="player-info">
        <!-- First box -->
        <div id="player-info-profile" class="invisible">
            <div id="player-info-profile-header">
                <span style="color: <?=$System->User->getTitleColor()?>"><?=$System->User->getTitle()?></span>
                <img src="<?=PROJECT_HTTP_ROOT?>resources/images/factions/logo_<?=$System->User->getFactionName()?>.png" width="37" height="20" />
            </div><!-- /player-info-profile-header -->

            <div id="player-info-profile-body">
                <img src="<?=PROJECT_HTTP_ROOT?>resources/images/lel.gif" width="94" height="94" class="pull-left" />

                <ul class="pull-right">
                    <li><p><?=$System->User->PLAYER_NAME?></p></li>
                    <li><p>Beta Tester<span class="bold"> [BETA]</span></p></li>
                    <li><p class="bold">TOP 15</p></li>
                </ul>
            </div><!-- /player-info-profile-body -->

        </div> <!-- /player-info-profile -->

        <!-- Player name (BIG) -->
        <div id="player-info-name">
            <p class="bold title"><?=$System->User->PLAYER_NAME?></p>
        </div> <!-- /player-info-name -->


        <!-- Last box -->
        <div id="player-info-equipment" class="invisible">
            <div id="player-info-equipment-body">
                <p><?=$System->__('BODY_TEXT_DAMAGE')?>: <span id="ship-damage"><?=$System->User->CONFIG_1_DMG?></span></p>
                <p><?=$System->__('BODY_TEXT_SHIELD')?>: <span id="ship-shield"><?=$System->User->CONFIG_1_SHIELD?></span></p>
                <p><?=$System->__('BODY_TEXT_SPEED')?>: <span id="ship-speed"><?=$System->User->CONFIG_1_SPEED?></span></p>
                <p><?=$System->__('BODY_TEXT_HP')?>: <span id="ship-health"><?=$System->User->Hangars->CURRENT_HANGAR->SHIP_HP?></span></p>
            </div>  <!-- /player-info-equipment-body -->
        </div> <!-- /player-info-equipment -->

    </div> <!-- /player-info -->

    <div id="player-ship-box">
        <a target="_blank" href="./internalMapRevolution">
            <img src="<?=$System->User->getShipImage()?>" id="ship" />
        </a>
        <?php
        if(!$System->User->hasPet()){
            ?>
            <img src="<?=PROJECT_HTTP_ROOT?>/do_img/global/items/pet/pet10-15_top.png" id="pet" />
            <?php
        }
        ?>
    </div> <!-- /player-ship-box -->

    <div id="tv-box">
		<div id="tv-state">
			<div id="tv-off" onclick="switchTvOn();">

			</div> <!-- /tv-off -->

			<div id="tv-on" class="invisible">
			</div> <!-- /tv-on -->
		</div> <!-- /tv-state -->
    </div> <!-- /tv-box -->

</div> <!-- /playerInfo-tv-container -->


<div id="tabs-container">
    <div id="tabs-content">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#stats" aria-controls="stats" role="tab" data-toggle="tab" class="bold"><?=$System->__('BODY_TEXT_STATS')?></a></li>
            <li role="presentation"><a href="#events" aria-controls="events" role="tab" data-toggle="tab" class="bold"><?=$System->__('BODY_TEXT_EVENTS')?></a></li>
            <li role="presentation"><a href="#pilot-profile" aria-controls="pilot-profile" role="tab" data-toggle="tab" class="bold"><?=$System->__('BODY_TEXT_PILOTPROFILE')?></a></li>
        </ul>

        <div class="tab-content">
            <!-- STATS TAB -->
            <div role="tabpanel" class="tab-pane active" id="stats">
                <table>
                    <tr>
                        <th><?=$System->__('BODY_TEXT_STATS_PVPRANK')?></th>
                        <th><?=$System->__('BODY_TEXT_STATS_GLOBALRANK')?></th>
                    </tr>
                    <tr>
                        <td class="bold">--</td>
                        <td class="bold">#<?=$System->User->RANKING?></td>
                    </tr>
                </table>
                <div id="level-progress" class="progress">
                    <span><?=$System->__(BODY_TEXT_STATS_LEVEL)?> <?=$System->User->LVL?></span>
                    <div class="progress-bar" role="progressbar" style="width: <?=$System->User->getLevelProgress()?>%;"></div>
                </div>
            </div> <!-- /stats -->

            <!-- EVENTS TAB -->
            <div role="tabpanel" class="tab-pane" id="events">
				<?php if ($System->Game->getEventRunning() == -1) {
					?>
                <table id="roster">
                    <tr id="event-days">
                        <th></th>
                        <th><?=$System->__('BODY_TEXT_EVENTS_SUNDAY')?></th>
                        <th><?=$System->__('BODY_TEXT_EVENTS_MONDAY')?></th>
                        <th><?=$System->__('BODY_TEXT_EVENTS_TUESDAY')?></th>
                        <th><?=$System->__('BODY_TEXT_EVENTS_WEDNESDAY')?></th>
                        <th><?=$System->__('BODY_TEXT_EVENTS_THURSDAY')?></th>
                        <th><?=$System->__('BODY_TEXT_EVENTS_FRIDAY')?></th>
                        <th><?=$System->__('BODY_TEXT_EVENTS_SATURDAY')?></th>
                    </tr>
                    <tr>
                        <th>00:00</th>
                        <td>this is a larger text</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                    </tr>
                    <tr>
                        <th>10:00</th>

                        <td>Test</td>
                        <td></td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                    </tr>
                    <tr style="color: chartreuse">
                        <th>14:00</th>

                        <td>I</td>
                        <td>Made</td>
                        <td>This</td>
                        <td>Because</td>
                        <td>I</td>
                        <td>Fucking</td>
                        <td>Want</td>
                    </tr>
                    <tr>
                        <th>18:00</th>

                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                    </tr>
                    <tr>
                        <th>22:00</th>

                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                    </tr>
                </table>
				<?php } else { 
				?> 
				<div id="eventdetails">
				</div>
				<?php }
				?>
            </div> <!-- /events -->

            <!-- PILOT PROFILE TAB -->
            <div role="tabpanel" class="tab-pane" id="pilot-profile">
                <div id="pilot-profile-user" class="tab-content">
                    <img src="<?=PROJECT_HTTP_ROOT?>resources/images/lel.gif" width="94" height="94" class="pull-left" />
                    <div id="pilot-profile-user-column1" class="pilot-profile-column">
                        <table>
                            <tr>
                                <th><?=$System->__('BODY_TEXT_PP_NAME')?></th>
                                <td><?= $System->User->PLAYER_NAME ?></td>
                            </tr>
                            <tr>
                                <th><?=$System->__('BODY_TEXT_PP_SINCE')?></th>
                                <td><?= $System->User->REGISTERED ?></td>
                            </tr>
                            <tr>
                                <th href="#" data-toggle="modal" data-target="#titleChangeModal"><?=$System->__('BODY_TEXT_PP_TITLE')?></th>
                                <td id="player-title" style="color: <?=$System->User->getTitleColor()?> !important"><?=$System->User->getTitle()?></td>
                            </tr>
                            <tr>
                                <th><?=$System->__('BODY_TEXT_PP_RANK')?></th>
                                <td><?=$System->User->getRankName()?></td>
                            </tr>
                        </table>
                    </div> <!-- pilot-profile-user-column1 -->

                    <div id="pilot-profile-user-column2" class="pilot-profile-column">
                        <table>
                            <tr>
                                <th><?=$System->__('BODY_TEXT_PP_ORIGIN')?></th>
                                <td><?=$System->User->COUNTRY_NAME != NULL ? $System->User->COUNTRY_NAME : '- No Informations -'?></td>
                            </tr>
                            <tr>
                                <th><?=$System->__('BODY_TEXT_PP_AGE')?></th>
                                <?php
                                $age = '- No Informations -';

                                if(isset($System->User->BIRTHDATE)){
                                    $today = new DateTime();
                                    $birthdate = new DateTime($System->User->BIRTHDATE);
                                    $interval = $today->diff($birthdate);
                                    $age = $interval->y;
                                }

                                ?>
                                <td>
                                    <?=$age?>
                                </td>
                            </tr>
                            <tr>
                                <th><?=$System->__('BODY_TEXT_PP_GENDER')?></th>
                                <?php
                                    $gender = '- No Informations -';

                                    if($System->User->GENDER != 0){
                                        if($System->User->GENDER == 1){
                                            $gender = 'Male';
                                        }
                                        elseif($System->User->GENDER == 2){
                                            $gender = 'Female';
                                        }
                                        else{
                                            $gender = 'Other';
                                        }
                                    }
                                ?>
                                <td>
                                <?=$gender?>
                                </td>
                            </tr>
                            <tr>
                                <th><?=$System->__('BODY_TEXT_PP_CONTACT')?></th>
                                <td>- No Informations -</td>
                            </tr>
                        </table>
                    </div> <!-- pilot-profile-user-column2 -->
                </div> <!-- /pilot-profile-user -->

                <div id="pilot-profile-skills-text">
                    <a href="#" data-toggle="modal" data-target="#skillTreeModal" class="title"><?=$System->__('BODY_TEXT_PP_SKILLTREE')?></a>
                </div>

                <div id="pilot-profile-skills" class="custom-scroll">
                    <!-- <div class="row">
                      <div class="col-xs-4 skill">Skill 1</div>
                      <div class="col-xs-4 skill">Skill 1</div>
                      <div class="col-xs-4 skill">Skill 1</div>
                    </div> -->
                    <div class="skill skill_effect_inactive" id="skill_5a">
                        <div class="">
                            <div class="skillPoints">0/2</div>
                        </div>
                    </div>
                    <div class="skill" id="skill_2">
                        <div class="">
                            <div class="skillPoints">0/5</div>
                        </div>
                    </div>
                    <div class="skill" id="skill_18a">
                        <div class="">
                            <div class="skillPoints">0/2</div>
                        </div>
                    </div>

                    <div class="skill" id="skill_13">
                        <div class="skill_effect_inactive">
                            <div class="skillPoints">0/5</div>
                        </div>
                    </div>
                    <div class="skill" id="skill_4">
                        <div class="skill_effect_inactive">
                            <div class="skillPoints">0/5</div>
                        </div>
                    </div>
                    <div class="skill" id="skill_4">
                        <div class="skill_effect_inactive">
                            <div class="skillPoints">0/5</div>
                        </div>
                    </div>

                    <div class="skill" id="skill_13">
                        <div class="skill_effect_inactive">
                            <div class="skillPoints">0/5</div>
                        </div>
                    </div>
                    <div class="skill" id="skill_4">
                        <div class="skill_effect_inactive">
                            <div class="skillPoints">0/5</div>
                        </div>
                    </div>
                    <div class="skill" id="skill_4">
                        <div class="skill_effect_inactive">
                            <div class="skillPoints">0/5</div>
                        </div>
                    </div>

                </div> <!-- /pilot-profile-skills -->

            </div> <!-- /pilot-profile -->

        </div> <!-- /tab-content -->

    </div> <!-- /tabs-content -->
</div> <!-- /tabs-container -->

<div id="stats-corner">
    <div id="best-pilots" class="custom-scroll col-xs-6">
        <?= $System->User->createRankingList() ?>
    </div> <!-- /best-pilots -->

    <div id="logbook" class="col-xs-6">
        <!-- Yeah, it's a cool text bg bug it caused an annoying bug -->
        <!-- <div id="logbook-bg" class="bold">Logbook</div> -->

        <div id="logbook-entries" class="custom-scroll" dir="rtl">
            <?php
                $logs = $System->logging->getLogs(
                    $System->User->USER_ID,
                    $System->User->PLAYER_ID,
                    $System->User->SERVER_DB,
                    LogType::NORMAL
                );

               // if($System->User->USER_ID == 677) $System->User->fixDB();
                foreach ($logs as $log){
                    ?>
                    <div class="log-entry">
                        <div class="log-entry-date bold"><?=$log['LOG_DATE']?></div>
                        <div class="log-entry-body"><?=$log['LOG_DESCRIPTION']?></div>
                    </div>
                    <?php
                }
            ?>
        </div> <!-- /logbook-entries -->
    </div> <!-- /logbook -->
</div> <!-- /stats-corner -->

<div id="skillTreeModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="modalTitle" class="modal-title">Skill tree</h4>
      </div>
      <div id="skillTreeContent" class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</div> <!-- /skillTreeModal -->
<script>
	
    $('#player-ship-box').mouseenter(function() {
        // Hides the player info box
        $('#player-info-profile').toggleClass('invisible');

        // Shows player name
        $('#player-info-name').toggleClass('invisible');

        // Hides the equipment box
        $('#player-info-equipment').toggleClass('invisible');
    }).mouseleave(function () {
        // Hides the player info box
        $('#player-info-profile').toggleClass('invisible');

        // Shows player name
        $('#player-info-name').toggleClass('invisible');

        // Hides the equipment box
        $('#player-info-equipment').toggleClass('invisible');
    });

    $('#player-title').mousedown(function() {
        //TODO: Find a way to implement a dropdown menu
        //$('#player-title').toggleClass('dropdown');
    });
	
	function switchTvOn() {
		$('#tv-off').toggleClass('invisible');
		$('#tv-on').toggleClass('invisible');
	}
</script>