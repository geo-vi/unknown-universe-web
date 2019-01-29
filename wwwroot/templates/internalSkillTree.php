<div class="skill-body clearfix">
    <div class="skill-inner clearfix">
        <div class="single-item col-xs-12">
            <div class="single-item-inner" >
                <div class="single-item-content">

                <?php
                $skills = $System->User->getSkills();
                $hasSkill = $System->User->hasSkill();
                foreach ($skills as $skill)
                {
                    ?>
                    <div id="skill_<?= $skill['ID']?>" class="skill" data-skill-id="<?= $skill['ID']?>">
                        <div class="skill_effect">
                            <div class="skillPoints">
                                <?php echo $hasSkill[$skill['SKILL_NAME']]; echo "/"; echo $skill['MAX_POINTS'];?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.skill').click(function (event) {
        let skillID = $(this).data('skill-id');
        swal('Do you want to use a point on this skill??', {
            buttons: {
                Yes: {
                    text: "Use point"
                },
                No: {
                    text: "No"
                },
                cancel: true
            }
        }).then((value) => {
            switch (value) {
                case "Yes":
                    upgrade_skill(null, skillID);
                    break;
                case "No":
                    swal("Error!", "Couldn't upgrade skill!", "error");
                    break;
            }
        });
    });

    $('.exchange').click(function (event) {
        let userID = $(this).data('user-id');
        swal('Do you want to use your log disks to get a research point??', {
            buttons: {
                Yes: {
                    text: "Exchange Log Disks"
                },
                No: {
                    text: "No"
                },
                cancel: true
            }
        }).then((value) => {
            switch (value) {
                case "Yes":
                    exchange(null, userID);
                    setTimeout(location.reload.bind(location), 1000);
                    break;
                case "No":
                    swal("Error!", "Couldn't exchange log disks!", "error");
                    break;
            }
        });
    });

    function exchange(data = null, playerID) {
        if (data !== null){
            if(!data.error){
                swal('Success!', 'Successfully exchanged log files for point!', 'success')
            } else {
                swal('Error', data.error_msg, 'error');
            }
        } else {
            let params = {
                'PLAYER_ID' : playerID,
            };
            sendRequest('exchange', 'exchange', JSON.stringify(params));
        }
    }

    function upgrade_skill(data = null, skillID) {
        if (data !== null){
            if(!data.error){
                swal('Success!', 'Successfully upgraded skill!', 'success')
            } else {
                swal('Error', data.error_msg, 'error');
            }
        } else {
            let params = {
                'SKILL_ID' : skillID,
            };
            sendRequest('upgrade_skill', 'upgrade_skill', JSON.stringify(params));
        }
    }

    function sendRequest(callback, actionName, params = "") {
        $.ajax({
            type: "POST",
            url: './core/ajax/ajax.php',
            data: { action : actionName , params : params, handler: 'profile'},
            cache: false,
            xhrFields: {
                withCredentials: true
            },
            success: function (data) {
                console.log(data);
                if (data.error) {
                    swal('Error!', data.error_msg, 'error');
                } else {
                    swal('Success!', data.msg, 'success');
                }
            }
        });
    }
</script>