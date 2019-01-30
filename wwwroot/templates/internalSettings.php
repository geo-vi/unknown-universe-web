<?php
require_once("internalSettings/internalCountries.php");
?>

<div class="page-content" clearfix>
    <div class="col-xs-3 settings-menu-container">
        <div class="menu-header">
            <h1>settings</h1>
        </div>
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#dashboard" aria-controls="dashboard" role="tab" data-toggle="tab">
                    Dashboard
                </a>
            </li>
            <li role="presentation">
                <a href="#support" aria-controls="support" role="tab" data-toggle="tab">
                    Support
                </a>
            </li>
            <li role="presentation">
                <a href="#account" aria-controls="account" role="tab" data-toggle="tab">
                    Account
                </a>
            </li>
        </ul>
    </div>
    <div class="col-xs-9 settings-content">
        <div class="settings-header">
            <h3 class="settings-username pull-right">welcome, <?= $System->User->__get('PLAYER_NAME') ?>!</h3>
        </div>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="dashboard">

            </div>
            <div role="tabpanel" class="tab-pane" id="support">

            </div>
            <div role="tabpanel" class="tab-pane" id="account">
                <form class="form-horizontal" role="form">

                    <div id="nameFormGroup" class="form-group">
                        <div class="col-sm-4 text-right">
                            <label class="control-label" for="userNameTextBox">
                                Name:
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" id="userNameTextBox" value="<?= $System->User->__get('PLAYER_NAME') ?>"/>
                        </div>
                        <div class="col-sm-4">
                            <button id="changeName" type="submit" class="btn-block btn-primary btn-md">
                                Change Name
                            </button>
                        </div>
                    </div>

                    <div id="usernameFormGroup" class="form-group">
                        <div class="col-sm-4 text-right">
                            <label class="control-label" for="userUsernameTextBox">
                                Username:
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" id="userUsernameTextBox" value="<?= $System->User->__get('USERNAME') ?>" disabled/>
                        </div>
                        <div class="col-sm-4">
                            <button id="changeUsername" type="submit" class="btn-block btn-info btn-md" disabled>Change Userame</button>
                        </div>
                    </div>

                    <div id="birthdayFormGroup" class="form-group">
                        <div class="col-sm-4 text-right">
                            <label id="birthday" class="control-label">
                                Date of Birth:
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <select name="day" id="day" class="select-dark" aria-label="birthday">
                                <?php
                                    print "<option value='0'>--</option>";
                                    for ($i = 1; $i <= 31; $i++) {
                                        print "<option value='$i'>$i</option>";
                                    }
                                ?>
                            </select>
                            <select name="month" id="month" class="select-dark" aria-label="birthday">
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
                            <select id="year" name="year" class="select-dark" aria-label="birthday">
                                <?php
                                print "<option value='0'>--</option>";
                                for ($i = 2005; $i <= 1950; $i--) {
                                    print "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div id="genderFormGroup" class="form-group">
                        <div class="col-sm-4 text-right">
                            <label class="control-label" for="gender">
                                Gender:
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <select name="gender" id="gender" class="select-dark form-control">
                                <option value="0">--</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Potato</option>
                                <option value="4">Other</option>
                            </select>
                        </div>
                    </div>

                    <div id="countryFormGroup" class="form-group">
                        <div class="col-sm-4 text-right">
                            <label class="control-label" for="country">
                                Country:
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <select name="country" id="country" class="select-dark form-control">
                                <?php
                                foreach ($countries as $code => $name) {
                                    print "<option value='$code'>$name</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div id="discordFormGroup" class="form-group">
                        <div class="col-sm-4 text-right">
                            <label class="control-label" for="discord">
                                Discord:
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" id="discord" class="form-control" value="<?= $System->User->__get('DISCORD_ID') ?>">
                        </div>
                    </div>
                </form>

                <a class="btn-block btn-success btn-lg text-center" style="cursor: pointer;">
                    Save Changes
                </a>
            </div>
        </div>
    </div>
</div>