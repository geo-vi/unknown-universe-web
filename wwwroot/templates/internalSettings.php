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
                <form class="form-horizontal" role="form" id="frmAccountInfo">
                    <div id="nameFormGroup" class="form-group">
                        <div class="col-sm-4 text-right">
                            <label class="control-label" for="txtShipName">
                                Ship Name:
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control"
                                   type="text"
                                   id="txtShipName"
                                   value="<?= $System->User->__get('PLAYER_NAME') ?>"/>
                        </div>
                        <div class="col-sm-4">
                            <button id="changeName" type="button" class="btn-block btn-primary btn-md">
                                Change Name
                            </button>
                        </div>
                    </div>

                    <hr/>

                    <input type="hidden" name="action" value="change_account_info">
                    <div id="usernameFormGroup" class="form-group">
                        <div class="col-sm-4 text-right">
                            <label class="control-label" for="txtUserName">
                                Username:
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control"
                                   type="text"
                                   id="txtUserName"
                                   value="<?= $System->User->__get('USERNAME') ?>"
                                   disabled/>
                        </div>
                        <div class="col-sm-4">
                            <!--<button id="changeUsername" type="submit" class="btn-block btn-info btn-md" disabled>
                                Change Userame
                            </button>-->
                        </div>
                    </div>

                    <div id="userInformationFormGroup" class="form-group">
                        <div class="col-sm-4 text-right">
                            <label for="txtFirstName" class="control-label">
                                First/Last Name:
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control"
                                   type="text"
                                   id="txtFirstName" name="first_name" placeholder="First Name"
                                   value="<?= $System->User->__get('FIRST_NAME') ?>"
                            />
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control"
                                   type="text"
                                   id="txtLastName" name="last_name" placeholder="Last Name"
                                   value="<?= $System->User->__get('LAST_NAME') ?>"
                            />
                        </div>
                    </div>

                    <div id="birthdayFormGroup" class="form-group">
                        <div class="col-sm-4 text-right">
                            <label for="birthday" class="control-label">
                                Date of Birth:
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <?php
                            $day = 0;
                            $month = 0;
                            $year = 0;
                            if ($System->User->__get('BIRTHDATE') != '') {
                                $exp = explode('-',$System->User->__get('BIRTHDATE'));
                                $year = $exp[0];
                                $month = $exp[1];
                                $day = $exp[2];
                            }
                            ?>
                            <div class="row">
                                <div class="col-sm-3">
                                    <select name="day" id="day" class="select-dark form-control" aria-label="birthday">
                                        <?php
                                        echo '<option value="0">--</option>';
                                        for ($i = 1; $i <= 31; $i++) {
                                            $selectedDay = '';
                                            if ($day == $i) {
                                                $selectedDay = 'selected';
                                            }
                                            echo '<option value="' . $i . '" ' . $selectedDay . '>' . $i . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <select name="month" id="month" class="select-dark form-control"
                                            aria-label="birthday">
                                        <option value="0">--</option>
                                        <?php
                                        $months = array(
                                            '01' => 'January',
                                            '02' => 'February',
                                            '03' => 'March',
                                            '04' => 'April',
                                            '05' => 'May',
                                            '06' => 'June',
                                            '07' => 'July',
                                            '08' => 'August',
                                            '09' => 'September',
                                            '10' => 'October',
                                            '11' => 'November',
                                            '12' => 'December'
                                        );
                                        foreach($months as $m => $m_name){
                                            $selectedMonth = '';
                                            if(intval($m) == intval($month)){
                                                $selectedMonth = 'selected';
                                            }
                                            echo '<option value="'.$m.'" '.$selectedMonth.'>'.$m_name.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <select id="year" name="year" class="select-dark form-control"
                                            aria-label="birthday">
                                        <?php
                                        echo '<option value="0">--</option>';
                                        $n_year = date('Y');
                                        for ($i = $n_year; $i >= 1950; $i--) {
                                            $selectedYear = '';
                                            if($i == $year){
                                                $selectedYear = 'selected';
                                            }
                                            echo '<option value="'.$i.'" '.$selectedYear.'>'.$i.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
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
                                <?php
                                $types = array(
                                    0 => '--',
                                    1 => 'Male',
                                    2 => 'Female',
                                    3 => 'Potato',
                                    4 => 'Other'
                                );

                                foreach ($types as $id => $name) {
                                    ($System->User->__get('GENDER') == $id) ? $selected = ' selected' : $selected = '';
                                    echo '<option value="' . $id . '" '.$selected.'>' . $name . '</option>';
                                }
                                ?>
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
                                foreach ($countries as $code => $c_name) {
                                    $selectedCountry = '';
                                    if($System->User->__get('COUNTRY_NAME') == $code){
                                        $selectedCountry = 'selected';
                                    }
                                    echo '<option value="'.$code.'" '.$selectedCountry.'>'.$c_name.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div id="discordFormGroup" class="form-group">
                        <div class="col-sm-4 text-right">
                            <label class="control-label" for="discord">
                                Discord ID:
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text"
                                   id="discord" name="discord"
                                   class="form-control"
                                   value="<?= $System->User->__get('DISCORD_ID') ?>">
                        </div>
                    </div>
                </form>

                <a class="btn-block btn-success btn-lg text-center" id="btnSaveUserProfile" style="cursor: pointer;">
                    Save Changes
                </a>
            </div>
        </div>
    </div>
</div>