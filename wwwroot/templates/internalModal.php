<?php
include_once('internalSettings/internalCountries.php');

if (isset($_POST['action']) && $_POST['action'] == "changePetName" && isset($_POST['subAction']) && $_POST['subAction'] == "changename") {
    $System->User->changePetName($_POST['userName']);
}

if (isset($_POST['action']) && $_POST['action'] == "changePilotName" && isset($_POST['subAction']) && $_POST['subAction'] == "changename") {
    $System->User->changeName($_POST['userName']);
}

if (isset($_POST['action']) && $_POST['action'] == "send" && isset($_POST['subAction'])
    && $_POST['subAction'] == "sendmessage") {
    $System->User->sendMessage($_POST['userName'], $_POST['Content'], $_POST['Header']);
}

?>

<script src="../resources/ckeditor/ckeditor.js"></script>

<div class="modal fade" id="composeMessageModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-image:url(../do_img/global/bg_event_winter.jpg);">
            <!-- Modal Header -->

            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h2 class="modal-title" id="myModalLabel">
                    New Message
                </h2>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group" style="text-align:center; margin-left:10px; top:20px; left:50px;">
                        <label class="col-sm-2 control-label" style="left:100px; top:-3px;"
                               for="recipient">recipient: </label>
                        <div class="col-sm-10">
                            <input class="col-sm-10" type="text" id="recipient" value=""
                                   style="margin-left:-100px;background-color: black;color:#fff;"/>
                        </div>
                    </div>

                    <div class="form-group" style="text-align:center; margin-left:10px; margin-top:0;">
                        <label class="col-sm-2 control-label" style="left: 100px; top:-5px;"
                               for="headert">Header: </label>
                        <div class="col-sm-10" style="top:-25px;">
                            <input id="headert" type="text" value=""
                                   style="margin-left:-100px; margin-top:20px; background-color: black;color:#fff;">
                        </div>
                    </div>


                    <div class="form-group" style="margin-left:0; width:700px;">
                        <div class="col-sm-10">
                            <textarea id="editornew" name="Content" style="width: 700px; height: 200px;"
                                      placeholder="Message..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                    Close
                </button>
                <button id="send" type="submit" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="userSettingsModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-image:url(../do_img/global/bg_event_winter.jpg);">
            <!-- Modal Header -->

            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h2 class="modal-title" id="myModalLabel">
                    Edit Pilot Profile
                </h2>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <form class="form-horizontal" role="form">

                    <div class="form-group" style="text-align:center; margin-left:10px; top:20px; left:50px;">
                        <label class="col-sm-2 control-label" style="left:-15px;"
                               for="userNameTextBox">Name: </label>
                        <div class="col-sm-10">
                            <input type="text" id="userNameTextBox" value="<?= $System->User->__get('PLAYER_NAME') ?>"
                                   style="background-color: black;color:#fff;"/>
                        </div>
                    </div>

                    <div class="form-group" style="text-align:center; top:20px; left:50px;">
                        <div class="col-sm-10" style="top: -13px;  left: 110px; text-align: center;">
                            <button id="changename" type="submit" class="btn btn-primary">Change Name</button>
                        </div>
                    </div>

                    <div class="form-group" style="text-align:center; margin-left:10px; left:50px;">
                        <label class="col-sm-2 control-label" style="left: 12px; top:-25px;"
                               for="userUsernameTextBox">Username: </label>
                        <div class="col-sm-10" style="top:-25px;">
                            <input type="text" id="userUsernameTextBox" value="<?= $System->User->__get('USERNAME') ?>"
                                   style="background-color: black;color:#fff;" disabled>
                        </div>
                    </div>

                    <div class="form-group" style="text-align:center; margin-left:10px;  left:50px;">
                        <label id="birthday" style="width:130px; float:left;" class="col-sm-2 control-label">
                            Date of Birth:
                        </label>
                        <div class="col-sm-10" style="top:-23px; left:85px;">
                            <select style="background-color:black; width:100px;" name="day" id="day"
                                    class="clan-list fliess10px-black" aria-label="birthday">
                                <?php
                                print "<option value='0'>--</option>";
                                for ($i = 1; $i <= 31; $i++) {
                                    print "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                            <select style="background-color:black; width:100px;" name="month" id="month"
                                    class="clan-list fliess10px-black" aria-label="birthday">
                                <option value="0">--</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <select id="year" name="year" class="styled"
                                    style="width:95px; background:#000000; color:#A0A0A0;" aria-label="birthday">
                                <?php
                                print "<option value='0'>--</option>";
                                for ($i = 2005; $i <= 1950; $i--) {
                                    print "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" style="text-align:center; margin-left:10px; top:20px; left:50px;">
                        <label class="col-sm-2 control-label" style="left: -5px;"
                               for="gender">Gender: </label>
                        <div class="col-sm-10">
                            <select style="background-color:black; width:100px;" name="gender" id="gender"
                                    class="clan-list fliess10px-black">
                                <option value="0">--</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Potato</option>
                                <option value="4">N/A</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" style="text-align:center; margin-left:10px; top:20px; left:50px;">
                        <label class="col-sm-2 control-label" style="left: 5px;"
                               for="country">Country: </label>
                        <div class="col-sm-10">
                            <select style="background-color:black; width:100px;" name="country" id="country"
                                    class="clan-list fliess10px-black">
                                <?php
                                foreach ($countries as $code => $name) {
                                    print "<option value='$code'>$name</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" style="text-align:center; margin-left:10px; top:20px; left:50px;">
                        <label class="col-sm-2 control-label"
                               for="discord">Discord: </label>
                        <div class="col-sm-10">
                            <input type="text" id="discord" value="<?= $System->User->__get('DISCORD_ID') ?>"
                                   style="background-color: black;color:#fff;">
                        </div>
                    </div>

                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                    Close
                </button>
                <a class="btn btn-primary"
                   style="cursor: pointer; top:0; position:relative">Save Changes</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changePetNameModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true" style="position: absolute; top:200px;">
    <div class="modal-dialog">
        <div class="modal-content" style="background-image:url(../do_img/global/bg_event_winter.jpg);">
            <!-- Modal Header -->

            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h2 class="modal-title" id="myModalLabel">
                    Change Pet Name
                </h2>
            </div>
            <form class="form-horizontal" role="form">
                <!-- Modal Body -->
                <div class="modal-body">

                    <div class="form-group" style="text-align:center; margin-left:10px; top:20px; left:50px;">
                        <label class="col-sm-2 control-label" style="left:-15px;"
                               for="inputEmail3">Pet Name: </label>
                        <div class="col-sm-10">
                            <input type="text" id="petNameTextBox" value="<?= $System->User->getPetName() ?>"
                                   style="background-color: black;color:#fff;"/>
                        </div>
                    </div>

                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                        Close
                    </button>
                    <button id="changePetName" type="submit" class="btn btn-primary">
                        Change Name
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>

<!--suppress JSUnresolvedFunction -->
<script type="text/javascript">

    $('#send').click(function () {
        $.ajax({
            type: "POST",
            url: "",
            data: {
                action: 'send',
                subAction: 'sendmessage',
                userName: $('#recipient').val(),
                Content: $('#editornew').val(),
                Header: $('#headert').val()
            },
            success: function () {
                swal('Success!', 'Sent message!', 'success');
                setTimeout(location.reload.bind(location), 1000);
            },
            error: function () {
                console.log(data);
            }
        });
    });

    $('#changename').click(function () {
        $.ajax({
            type: "POST",
            url: "",
            data: {action: 'changePilotName', subAction: 'changename', userName: $('#userNameTextBox').val()},
            success: function () {
                console.log(data);
            },
            error: function () {
                console.log(data);
            }
        });
    });

    $('#changePetName').click(function () {
        $('#popup-modalBackground').css({'z-index': 1050}).show();
        $.ajax({
            type: "POST",
            url: "",
            data: {action: 'changePetName', subAction: 'changename', userName: $('#petNameTextBox').val()},
            success: function (data) {
                data = $.parseJSON(data);
                if (data.status == 'OK') {
                    alert("Okey");
                } else {
                    alert("Not okey");
                }
            },
            error: function () {
                console.log(data);
            }
        });
    });

    CKEDITOR.replace('editornew');
</script>