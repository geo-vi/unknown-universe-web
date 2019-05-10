<div class="skill-body clearfix">
    <div id='exchange-panel' class='col-lg-12'>

    </div>

    <?php
    $skills = $System->User->SkillTree->getServerSkills();
    ?>
    <div class="tree-content">
        <div class='col-29'>
            <div class='skill-row'>
                <?php for ($j = 0; $j < 3; $j++) {
                    $i            = $skills[$j];
                    $id           = $i['ID'];
                    $playerSkills = $System->User->SkillTree->__get('SKILL_LIST');
                    if ($id > 0 && $id <= 25) { ?>
                        <div id="skill_<?= $i['ID'] ?>" class="skill" data-skill-id="<?= $i['ID'] ?>">
                            <div class="skill-effect">
                                <div class="skillPoints">
                                    <?php echo $playerSkills[$i['SKILL_NAME']];
                                    echo "/";
                                    echo $System->User->SkillTree->getSkillMaxLevel($i['ID']); ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
            <div class='skill-row'>
                <?php for ($j = 3; $j < 5; $j++) {
                    $i            = $skills[$j];
                    $id           = $i['ID'];
                    $playerSkills = $System->User->SkillTree->__get('SKILL_LIST');
                    if ($id > 0 && $id <= 25) { ?>
                        <div id="skill_<?= $i['ID'] ?>" class="skill" data-skill-id="<?= $i['ID'] ?>">
                            <div class="skill-effect">
                                <div class="skillPoints">
                                    <?php echo $playerSkills[$i['SKILL_NAME']];
                                    echo "/";
                                    echo $System->User->SkillTree->getSkillMaxLevel($i['ID']); ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
            <div class='skill-row'>
                <?php for ($j = 5; $j < 8; $j++) {
                    $i            = $skills[$j];
                    $id           = $i['ID'];
                    $playerSkills = $System->User->SkillTree->__get('SKILL_LIST');
                    if ($id > 0 && $id <= 25) { ?>
                        <div id="skill_<?= $i['ID'] ?>" class="skill" data-skill-id="<?= $i['ID'] ?>">
                            <div class="skill-effect">
                                <div class="skillPoints">
                                    <?php echo $playerSkills[$i['SKILL_NAME']];
                                    echo "/";
                                    echo $System->User->SkillTree->getSkillMaxLevel($i['ID']); ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
        <div class='col-29'>
            <div class='skill-row'>
                <?php for ($j = 8; $j < 10; $j++) {
                    $i            = $skills[$j];
                    $id           = $i['ID'];
                    $playerSkills = $System->User->SkillTree->__get('SKILL_LIST');
                    if ($id > 0 && $id <= 25) { ?>
                        <div id="skill_<?= $i['ID'] ?>" class="skill" data-skill-id="<?= $i['ID'] ?>">
                            <div class="skill-effect">
                                <div class="skillPoints">
                                    <?php echo $playerSkills[$i['SKILL_NAME']];
                                    echo "/";
                                    echo $System->User->SkillTree->getSkillMaxLevel($i['ID']); ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
            <div class='skill-row'>
                <?php for ($j = 10; $j < 13; $j++) {
                    $i            = $skills[$j];
                    $id           = $i['ID'];
                    $playerSkills = $System->User->SkillTree->__get('SKILL_LIST');
                    if ($id > 0 && $id <= 25) { ?>
                        <div id="skill_<?= $i['ID'] ?>" class="skill" data-skill-id="<?= $i['ID'] ?>">
                            <div class="skill-effect">
                                <div class="skillPoints">
                                    <?php echo $playerSkills[$i['SKILL_NAME']];
                                    echo "/";
                                    echo $System->User->SkillTree->getSkillMaxLevel($i['ID']); ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
            <div class='skill-row'>
                <?php for ($j = 13; $j < 16; $j++) {
                    $i            = $skills[$j];
                    $id           = $i['ID'];
                    $playerSkills = $System->User->SkillTree->__get('SKILL_LIST');
                    if ($id > 0 && $id <= 25) { ?>
                        <div id="skill_<?= $i['ID'] ?>" class="skill" data-skill-id="<?= $i['ID'] ?>">
                            <div class="skill-effect">
                                <div class="skillPoints">
                                    <?php echo $playerSkills[$i['SKILL_NAME']];
                                    echo "/";
                                    echo $System->User->SkillTree->getSkillMaxLevel($i['ID']); ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
        <div class='col-42'>
            <div class='skill-row'>
                <?php for ($j = 16; $j < 18; $j++) {
                    $i            = $skills[$j];
                    $id           = $i['ID'];
                    $playerSkills = $System->User->SkillTree->__get('SKILL_LIST');
                    if ($id > 0 && $id <= 25) { ?>
                        <div id="skill_<?= $i['ID'] ?>" class="skill" data-skill-id="<?= $i['ID'] ?>">
                            <div class="skill-effect">
                                <div class="skillPoints">
                                    <?php echo $playerSkills[$i['SKILL_NAME']];
                                    echo "/";
                                    echo $System->User->SkillTree->getSkillMaxLevel($i['ID']); ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
            <div class='skill-row'>
                <?php for ($j = 18; $j < 22; $j++) {
                    $i            = $skills[$j];
                    $id           = $i['ID'];
                    $playerSkills = $System->User->SkillTree->__get('SKILL_LIST');
                    if ($id > 0 && $id <= 25) { ?>
                        <div id="skill_<?= $i['ID'] ?>" class="skill" data-skill-id="<?= $i['ID'] ?>">
                            <div class="skill-effect">
                                <div class="skillPoints">
                                    <?php echo $playerSkills[$i['SKILL_NAME']];
                                    echo "/";
                                    echo $System->User->SkillTree->getSkillMaxLevel($i['ID']); ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
            <div class='skill-row'>
                <?php for ($j = 22; $j < 25; $j++) {
                    $i            = $skills[$j];
                    $id           = $i['ID'];
                    $playerSkills = $System->User->SkillTree->__get('SKILL_LIST');
                    if ($id > 0 && $id <= 25) { ?>
                        <div id="skill_<?= $i['ID'] ?>" class="skill" data-skill-id="<?= $i['ID'] ?>">
                            <div class="skill-effect">
                                <div class="skillPoints">
                                    <?php echo $playerSkills[$i['SKILL_NAME']];
                                    echo "/";
                                    echo $System->User->SkillTree->getSkillMaxLevel($i['ID']); ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.skill').click(function () {
        let skillID = $(this).data('skill-id');
        swal('Are you sure you want to use a point on this skill?', {
            buttons: {
                yes: {
                    text: "Yes"
                },
                no: {
                    text: "No"
                },
                cancel: false
            }
        }).then((value) => {
            switch (value) {
                case "yes":
                    sendCoreRequest('skilltree', 'upgrade', { sID: skillID });
                    break;
                case "no":
                    break;
            }
        });
    });

    $('.exchange').click(function () {
        swal('Do you want to use your log disks to get a research point??', {
            buttons: {
                yes: {
                    text: "Exchange"
                },
                no: {
                    text: "Cancel"
                },
                cancel: false
            }
        }).then((value) => {
            switch (value) {
                case "yes":
                    sendCoreRequest(
                        'skilltree',
                        'exchange',
                        {},
                        () => setTimeout(location.reload.bind(location), 1000)
                    );
                    break;
                case "no":
                    break;
            }
        });
    });
</script>
