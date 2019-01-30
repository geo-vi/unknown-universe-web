<?php

    if (isset($_POST['action']) && $_POST['action'] == "changePetName" && isset($_POST['subAction']) && $_POST['subAction'] == "changename") {
        $System->User->changePetName($_POST['userName']);
    }

    if (isset($_POST['action']) && $_POST['action'] == "changePilotName" && isset($_POST['subAction']) && $_POST['subAction'] == "changename") {
        $System->User->changeName($_POST['userName']);
    }

    if(isset($_POST['action']) && $_POST['action'] == "send" && isset($_POST['subAction'])
        && $_POST['subAction'] == "sendmessage")
    {
        $System->User->sendMessage($_POST['userName'], $_POST['Content'], $_POST['Header'] );
    }

?>

<script src="../resources/ckeditor/ckeditor.js"></script>

<div class="modal fade" id="composeMessageModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
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
                            <input class="col-sm-10" type="text" id="recipient" value="" style="margin-left:-100px;background-color: black;color:#fff;"/>
                        </div>
                    </div>

                    <div class="form-group" style="text-align:center; margin-left:10px; margin-top:0;">
                        <label  class="col-sm-2 control-label" style="left: 100px; top:-5px;"
                                for="headert">Header: </label>
                        <div class="col-sm-10" style="top:-25px;">
                            <input id="headert" type="text" value="" style="margin-left:-100px; margin-top:20px; background-color: black;color:#fff;">
                        </div>
                    </div>


                    <div class="form-group" style="margin-left:0; width:700px;">
                        <div class="col-sm-10">
                            <textarea id="editornew" name="Content" style="width: 700px; height: 200px;" placeholder="Message..." ></textarea>
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
    <div class="modal-dialog" >
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
                    <label  class="col-sm-2 control-label" style="left:-15px;"
                              for="userNameTextBox">Name: </label>
                    <div class="col-sm-10">
                        <input type="text" id="userNameTextBox" value="<?= $System->User->__get('PLAYER_NAME') ?>" style="background-color: black;color:#fff;"/>
                    </div>
                 </div>
                  <div class="form-group" style="text-align:center; top:20px; left:50px;">
                    <div class="col-sm-10" style="top: -13px;  left: 110px; text-align: center;">
                        <button id="changename" type="submit" class="btn btn-primary">Change Name</button>
                  </div>
                 </div>

                <div class="form-group" style="text-align:center; margin-left:10px; left:50px;">
                    <label  class="col-sm-2 control-label" style="left: 12px; top:-25px;"
                              for="userUsernameTextBox">Username: </label>
                    <div class="col-sm-10" style="top:-25px;">
                        <input type="text" id="userUsernameTextBox" value="<?= $System->User->__get('USERNAME') ?>" style="background-color: black;color:#fff;" disabled>
                    </div>
                </div>

                  <div class="form-group" style="text-align:center; margin-left:10px;  left:50px;">
                    <label id="birthday" style="width:130px; float:left;" class="col-sm-2 control-label">
                        Date of Birth:
                    </label>
                    <div class="col-sm-10" style="top:-23px; left:85px;">
                        <select style="background-color:black; width:100px;" name="day" id="day" class="clan-list fliess10px-black" aria-label="birthday">
                            <option value="0">--</option><option value="1">1</option><option value="2">2</option>
                            <option value="3">3</option><option value="4">4</option><option value="5">5</option>
                            <option value="6">6</option><option value="7">7</option><option value="8">8</option>
                            <option value="9">9</option><option value="10">10</option><option value="11">11</option>
                            <option value="12">12</option><option value="13">13</option><option value="14">14</option>
                            <option value="15">15</option><option value="16">16</option><option value="17">17</option>
                            <option value="18">18</option><option value="19">19</option><option value="20">20</option>
                            <option value="21">21</option><option value="22">22</option><option value="23">23</option>
                            <option value="24">24</option><option value="25">25</option><option value="26">26</option>
                            <option value="27">27</option><option value="28">28</option><option value="29">29</option>
                            <option value="30">30</option><option value="31">31</option>
                        </select>
                        <select style="background-color:black; width:100px;" name="month" id="month" class="clan-list fliess10px-black" aria-label="birthday">
                            <option value="0">--</option><option value="1">January</option><option value="2">February</option><option value="3">March</option>
                            <option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option>
                            <option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select id="year" name="year" class="styled" style="width:95px; background:#000000; color:#A0A0A0;" aria-label="birthday">
                            <option>----</option>
                            <option value="1">2005</option><option value="2">2004</option><option value="3">2003</option><option value="4">2002</option><option value="5">2001</option>
                            <option value="6">2000</option><option value="7">1999</option><option value="8">1998</option><option value="9">1997</option><option value="10">1996</option>
                            <option value="11">1995</option><option value="12">1994</option><option value="13">1993</option><option value="14">1992</option><option value="15">1991</option>
                            <option value="16">1990</option><option value="17">1989</option><option value="18">1988</option><option value="19">1987</option><option value="20">1986</option>
                            <option value="21">1985</option><option value="22">1984</option><option value="23">1983</option><option value="24">1982</option><option value="25">1981</option>
                            <option value="26">1980</option><option value="27">1979</option><option value="28">1978</option><option value="29">1977</option><option value="30">1976</option>
                            <option value="31">1975</option><option value="32">1974</option><option value="33">1973</option><option value="34">1972</option><option value="35">1971</option>
                            <option value="36">1970</option><option value="37">1969</option><option value="38">1968</option><option value="39">1967</option><option value="40">1966</option>
                            <option value="41">1965</option><option value="42">1964</option><option value="43">1963</option><option value="44">1962</option><option value="45">1961</option>
                            <option value="46">1960</option><option value="47">1959</option><option value="48">1958</option><option value="49">1957</option><option value="50">1956</option>
                            <option value="51">1955</option><option value="52">1954</option><option value="53">1953</option><option value="54">1952</option><option value="55">1951</option>
                            <option value="56">1950</option>
                        </select>
                    </div>
                  </div>

                  <div class="form-group" style="text-align:center; margin-left:10px; top:20px; left:50px;">
                    <label  class="col-sm-2 control-label" style="left: -5px;"
                              for="gender">Gender: </label>
                    <div class="col-sm-10">
                        <select style="background-color:black; width:100px;" name="gender" id="gender" class="clan-list fliess10px-black">
                            <option value="0">--</option><option value="1">Male</option><option value="2">Female</option><option value="3">Potato</option><option value="4">N/A</option>
                        </select>
                  </div>
                </div>

                <div class="form-group" style="text-align:center; margin-left:10px; top:20px; left:50px;">
                    <label  class="col-sm-2 control-label" style="left: 5px;"
                              for="country">Country: </label>
                    <div class="col-sm-10">
                        <select style="background-color:black; width:100px;" name="country" id="country" class="clan-list fliess10px-black">
                                <option value="CA">Canada</option>
                                <option value="CV">Cape Verde</option>
                                <option value="KY">Cayman Islands</option>
                                <option value="CF">Central African Republic</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CX">Christmas Island</option>
                                <option value="CC">Cocos (Keeling) Islands</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comoros</option>
                                <option value="CG">Congo</option>
                                <option value="CD">Congo, the Democratic Republic of the</option>
                                <option value="CK">Cook Islands</option>
                                <option value="CR">Costa Rica</option>
                                <option value="CI">Côte d'Ivoire</option>
                                <option value="HR">Croatia</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Curaçao</option>
                                <option value="CY">Cyprus</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="DK">Denmark</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="DO">Dominican Republic</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">Egypt</option>
                                <option value="SV">El Salvador</option>
                                <option value="GQ">Equatorial Guinea</option>
                                <option value="ER">Eritrea</option>
                                <option value="EE">Estonia</option>
                                <option value="ET">Ethiopia</option>
                                <option value="FK">Falkland Islands (Malvinas)</option>
                                <option value="FO">Faroe Islands</option>
                                <option value="FJ">Fiji</option>
                                <option value="FI">Finland</option>
                                <option value="FR">France</option>
                                <option value="GF">French Guiana</option>
                                <option value="PF">French Polynesia</option>
                                <option value="TF">French Southern Territories</option>
                                <option value="GA">Gabon</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="DE">Germany</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GR">Greece</option>
                                <option value="GL">Greenland</option>
                                <option value="GD">Grenada</option>
                                <option value="GP">Guadeloupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GG">Guernsey</option>
                                <option value="GN">Guinea</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Haiti</option>
                                <option value="HM">Heard Island and McDonald Islands</option>
                                <option value="VA">Holy See (Vatican City State)</option>
                                <option value="HN">Honduras</option>
                                <option value="HK">Hong Kong</option>
                                <option value="HU">Hungary</option>
                                <option value="IS">Iceland</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IR">Iran, Islamic Republic of</option>
                                <option value="IQ">Iraq</option>
                                <option value="IE">Ireland</option>
                                <option value="IM">Isle of Man</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italy</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japan</option>
                                <option value="JE">Jersey</option>
                                <option value="JO">Jordan</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="KE">Kenya</option>
                                <option value="KI">Kiribati</option>
                                <option value="KP">Korea, Democratic People's Republic of</option>
                                <option value="KR">Korea, Republic of</option>
                                <option value="KW">Kuwait</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="LA">Lao People's Democratic Republic</option>
                                <option value="LV">Latvia</option>
                                <option value="LB">Lebanon</option>
                                <option value="LS">Lesotho</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libya</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="MO">Macao</option>
                                <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                <option value="MG">Madagascar</option>
                                <option value="MW">Malawi</option>
                                <option value="MY">Malaysia</option>
                                <option value="MV">Maldives</option>
                                <option value="ML">Mali</option>
                                <option value="MT">Malta</option>
                                <option value="MH">Marshall Islands</option>
                                <option value="MQ">Martinique</option>
                                <option value="MR">Mauritania</option>
                                <option value="MU">Mauritius</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">Mexico</option>
                                <option value="FM">Micronesia, Federated States of</option>
                                <option value="MD">Moldova, Republic of</option>
                                <option value="MC">Monaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="ME">Montenegro</option>
                                <option value="MS">Montserrat</option>
                                <option value="MA">Morocco</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MM">Myanmar</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NL">Netherlands</option>
                                <option value="NC">New Caledonia</option>
                                <option value="NZ">New Zealand</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Niger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NF">Norfolk Island</option>
                                <option value="MP">Northern Mariana Islands</option>
                                <option value="NO">Norway</option>
                                <option value="OM">Oman</option>
                                <option value="PK">Pakistan</option>
                                <option value="PW">Palau</option>
                                <option value="PS">Palestinian Territory, Occupied</option>
                                <option value="PA">Panama</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippines</option>
                                <option value="PN">Pitcairn</option>
                                <option value="PL">Poland</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="RE">Réunion</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russian Federation</option>
                                <option value="RW">Rwanda</option>
                                <option value="BL">Saint Barthélemy</option>
                                <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                <option value="KN">Saint Kitts and Nevis</option>
                                <option value="LC">Saint Lucia</option>
                                <option value="MF">Saint Martin (French part)</option>
                                <option value="PM">Saint Pierre and Miquelon</option>
                                <option value="VC">Saint Vincent and the Grenadines</option>
                                <option value="WS">Samoa</option>
                                <option value="SM">San Marino</option>
                                <option value="ST">Sao Tome and Principe</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="SN">Senegal</option>
                                <option value="RS">Serbia</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SG">Singapore</option>
                                <option value="SX">Sint Maarten (Dutch part)</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SO">Somalia</option>
                                <option value="ZA">South Africa</option>
                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                <option value="SS">South Sudan</option>
                                <option value="ES">Spain</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SD">Sudan</option>
                                <option value="SR">Suriname</option>
                                <option value="SJ">Svalbard and Jan Mayen</option>
                                <option value="SZ">Swaziland</option>
                                <option value="SE">Sweden</option>
                                <option value="CH">Switzerland</option>
                                <option value="SY">Syrian Arab Republic</option>
                                <option value="TW">Taiwan, Province of China</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TZ">Tanzania, United Republic of</option>
                                <option value="TH">Thailand</option>
                                <option value="TL">Timor-Leste</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad and Tobago</option>
                                <option value="TN">Tunisia</option>
                                <option value="TR">Turkey</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TC">Turks and Caicos Islands</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UG">Uganda</option>
                                <option value="UA">Ukraine</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="GB">United Kingdom</option>
                                <option value="US">United States</option>
                                <option value="UM">United States Minor Outlying Islands</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VE">Venezuela, Bolivarian Republic of</option>
                                <option value="VN">Viet Nam</option>
                                <option value="VG">Virgin Islands, British</option>
                                <option value="VI">Virgin Islands, U.S.</option>
                                <option value="WF">Wallis and Futuna</option>
                                <option value="EH">Western Sahara</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
                            </select>
                  </div>
                </div>
                <div class="form-group" style="text-align:center; margin-left:10px; top:20px; left:50px;">
                    <label  class="col-sm-2 control-label"
                              for="discord">Discord: </label>
                    <div class="col-sm-10">
                        <input type="text" id="discord" value="<?= $System->User->__get('DISCORD_ID') ?>" style="background-color: black;color:#fff;">
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
    <div class="modal-dialog" >
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
                        <label  class="col-sm-2 control-label" style="left:-15px;"
                                for="inputEmail3">Pet Name: </label>
                        <div class="col-sm-10">
                            <input type="text" id="petNameTextBox" value="<?= $System->User->getPetName() ?>" style="background-color: black;color:#fff;"/>
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

    $('#send').click(function(){
        $.ajax({
            type: "POST",
            url: "",
            data: { action: 'send', subAction: 'sendmessage', userName: $('#recipient').val(), Content: $('#editornew').val(), Header: $('#headert').val() },
            success: function() {
                swal('Success!', 'Sent message!', 'success');
                setTimeout(location.reload.bind(location), 1000);
            },
                error: function() {
                console.log(data);
            }
        });
    });

    $('#changename').click(function() {
        $.ajax({
            type: "POST",
            url: "",
            data: { action: 'changePilotName', subAction: 'changename',userName: $('#userNameTextBox').val() },
            success: function() {
                console.log(data);
            },
            error: function() {
                console.log(data);
            }
        });
    });

    $('#changePetName').click(function() {
        $('#popup-modalBackground').css({'z-index':1050}).show();
        $.ajax({
            type: "POST",
            url: "",
            data: { action: 'changePetName', subAction: 'changename', userName: $('#petNameTextBox').val() },
            success: function(data){
                data = $.parseJSON(data);
                if (data.status == 'OK') {
                    alert("Okey");
                } else {
                    alert("Not okey");
                }
            },
            error: function(){
                console.log(data);
            }
        });
    });

    CKEDITOR.replace('editornew');
</script>