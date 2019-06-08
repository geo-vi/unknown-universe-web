<div id="nanoTechFactory">
    <div class="nanoTechFactory">

        <div id="ntf_left">
            <div id="title_factory_left" title="Construction">Construction</div>
            <div id="title_buff" title="Tech items">Tech items</div>
            <div id="factory_list_main">
                <div id="factory_apis" class="buff" onclick="jQuery('#ntf_right_tech').hide(); jQuery('#ntf_right_factory').show(); User.nanoTechFactoryShowApis(3,'')">
                    <div class="factory_apis_hover" title="Apis drone"></div>
                </div>
                <div id="factory_zeus" class="buff" onclick="jQuery('#ntf_right_tech').hide(); jQuery('#ntf_right_factory').show(); User.nanoTechFactoryShowApis(4,'')">
                    <div class="factory_zeus_hover" title="Zeus drone"></div>
                </div>
            </div>
            <div id="buff_list_main">
                <div id="buff_list_scroll">
                    <div id="buff_ELA_1" class="buff" onclick="jQuery('#ntf_right_factory').hide(); jQuery('#ntf_right_tech').show(); User.nanoTechFactoryShowBuff('ELA','1')">
                        <div class="buff_hover" title="Energy leech"></div>
                    </div>
                    <div id="buff_ECI_1" class="buff" onclick="jQuery('#ntf_right_factory').hide(); jQuery('#ntf_right_tech').show(); User.nanoTechFactoryShowBuff('ECI','1')">
                        <div class="buff_hover" title="Chain impulse"></div>
                    </div>
                    <div id="buff_RPM_1" class="buff" onclick="jQuery('#ntf_right_factory').hide(); jQuery('#ntf_right_tech').show(); User.nanoTechFactoryShowBuff('RPM','1')">
                        <div class="buff_hover" title="Precision targeter"></div>
                    </div>
                    <div id="buff_SBU_1" class="buff" onclick="jQuery('#ntf_right_factory').hide(); jQuery('#ntf_right_tech').show(); User.nanoTechFactoryShowBuff('SBU','1')">
                        <div class="buff_hover" title="Backup shields"></div>
                    </div>
                    <div id="buff_BRB_1" class="buff" onclick="jQuery('#ntf_right_factory').hide(); jQuery('#ntf_right_tech').show(); User.nanoTechFactoryShowBuff('BRB','1')">
                        <div class="buff_hover" title="Battle repair bot"></div>
                    </div>

                    <br class="clearMe">
                </div>
            </div>
        </div>

        <div id="buffcontainer">
            <div id="ntf_center">

                <div id="ntf_help_scroll" style="overflow: hidden; padding: 0px; width: 383px;" class="jspScrollable" tabindex="0"><div class="jspContainer" style="width: 383px; height: 335px;"><div class="jspPane" style="padding: 0px; width: 363px; top: -654.653px;">
                            <div id="ntf_help_content">
                                Tech Center info
                                <p>The Tech Center is a factory where you can use various materials to produce hi-tech defense and attack items, including <strong><a href="#faq_techs">Tech items</a></strong> and drones.<br><br>
                                </p><ul>
                                    <li>Select an item to produce from the left-hand menu in the <strong><a href="#faq_tf">Factory</a></strong>.</li>
                                    <li>Click on Produce to make the item: Make sure you have all the required <strong><a href="#tf_resources">materials</a></strong> for production.</li>
                                    <li>Build extra <strong><a href="#tf_factory">production facilities</a></strong> to produce multiple items simultaneously.</li>
                                </ul><p></p>
                                <p>
                                    Or:<br>
                                </p><ul>
                                    <li>Select a drone type in the Factory</li>
                                    <li>and build the drone instantly for Uridium.</li>
                                    <li>In the pirate booty you'll sometimes find pieces of the blueprints. The advantage: You can build a drone with them without additional costs.</li>
                                    <li>Tip: Each piece of the blueprints that you find reduces the price for buying it immediately.</li>
                                </ul><br>
                                Use tech items in <strong><a href="#tf_factory">battle</a></strong> directly on the space map. Start now and turn your ship into the ultimate spacefighter!<br><br>
                                For more information, take a look in our <strong><a href="#faq_tf">FAQ</a></strong>!<p></p>
                                <br class="linecountSix">
                                <a name="faq_tf"></a>
                                <span class="text_headline">What exactly is the Tech Center?</span><br><p>The Tech Center is a factory where you can produce hi-tech items that can be used to acquire new skills or enhance existing ones. There are many different tech items available.</p>
                                <span class="text_headline">Where is the Tech Center located?</span><br>
                                <p>The Tech Center can be found in the Skylab. Click on Skylab in the main menu and the Skylab page will open. There are two tabs on this page: One for the Skylab and one for the Tech Center. Click on the Tech Center tab to go there.</p>
                                <a name="faq_techs"></a>
                                <span class="text_headline">What type of tech items can be produced?</span><br>
                                <p>There are many different items that can be produced in the Tech Center, such as:
                                </p><ol>

                                    <li><a href="#help_subnav_ELA_1">Energy leech</a></li>

                                    <li><a href="#help_subnav_ECI_1">Chain impulse</a></li>

                                    <li><a href="#help_subnav_RPM_1">Precision targeter</a></li>

                                    <li><a href="#help_subnav_SBU_1">Backup shields</a></li>

                                    <li><a href="#help_subnav_BRB_1">Battle repair bot</a></li>

                                </ol>



                                <a name="help_subnav_ELA_1"></a><strong class="text_subheadline">Energy leech</strong><br>
                                <p>Plain and simple: The more damage you inflict on your enemy, the more the energy leech will repair your ship.<br>
                                    This item transforms a certain percentage of the laser damage you cause into HP and transfers it back to your ship in the form of energy, thus allowing you to repair your ship.</p>



                                <a name="help_subnav_ECI_1"></a><strong class="text_subheadline">Chain impulse</strong><br>
                                <p>When you shoot at an enemy with the chain impulse, it emits an energy pulse which inflicts damage on your target. The pulse then ricochets to your next adversary, and the next one, causing each one less damage than the one before.
                                    It can inflict damage on a maximum of 7 opponents, after which it dissipates, becoming too weak to damage further ships. The chain impulse penetrates through all shields, causing direct damage to the ships in its path.</p>



                                <a name="help_subnav_RPM_1"></a><strong class="text_subheadline">Precision targeter</strong><br>
                                <p>This tech item increases your hit ratio to 100% for a certain amount of time.</p>



                                <a name="help_subnav_SBU_1"></a><strong class="text_subheadline">Backup shields</strong><br>
                                <p>The backup shields are a type of reserve shield. If your regular shield is destroyed in battle, the backup shields will replace some of your shield defenses instantly.</p>



                                <a name="help_subnav_BRB_1"></a><strong class="text_subheadline">Battle repair bot</strong><br>
                                <p>The battle repair bot functions like a normal repair bot, but it was developed for use in battle situations. It can resist enemy fire for a short time, repairing 10,000 HP per second for 10 seconds.</p>



                                <span class="text_headline">How many tech items can be produced?</span><br>
                                <p>At the beginning, you can only produce one tech item at a time. If you build multiple production facilities, you can produce multiple items simultaneously. Once your Tech Center has been completely expanded, you'll be able to produce three tech items at once.</p>
                                <a name="tf_resources"></a><span class="text_headline">What materials are needed to produce tech items?</span><br>
                                <p>The materials needed to make tech items are Credits, Seprom and log-disks. Credits and log-disks can be collected in the game and Seprom has to created in the Skylab.</p>
                                <span class="text_headline">Can tech items be produced if all required materials aren't available?</span><br>
                                <p>Yes. In this case, you can replace the missing materials with Uridium. Uridium helps to speed up the production process.</p>
                                <a name="tf_factory"></a><span class="text_headline">Where do the finished tech items go? How can they be used?</span><br>
                                <p>Your tech items will appear in a special box on the space map once they have been manufactured. There you'll be able to see how long you can use them for and how long the cool-down time is. Click on the tech item symbol to use the item.</p>
                                <span class="text_headline">Can I use multiple tech items at once?</span><br>
                                <p>Yes. Using multiple tech items at once will turn your ship into an ultimate starfighter. Remember to use your tech items effectively: Combine different types of tech items for a killer effect. Combining the same type of tech items won't do much for you.</p>
                            </div>
                        </div><div class="jspVerticalBar"><div class="jspCap jspCapTop"></div><a class="jspArrow jspArrowUp"></a><div class="jspTrack" style="height: 303px;"><div class="jspDrag" style="height: 61.4065px; top: 120px;"><div class="jspDragTop"></div><div class="jspDragBottom"></div></div></div><a class="jspArrow jspArrowDown"></a><div class="jspCap jspCapBottom"></div></div></div></div>
            </div>
        </div>
        <script>

            jQuery(document).ready(function() {
                var pane = jQuery('#ntf_help_scroll');
                jQuery(function() {
                    pane.jScrollPane({showArrows: true});
                    pane.each(function(i,obj){
                        var pane  = jQuery(obj);
                        var api   = pane.data('jsp');
                        var links = pane.find("a");
                        links.bind('click', function() {
                            console.log(this);
                            var uriParts = this.href.split('#');
                            if (2 == uriParts.length) {
                                var target = jQuery('a[name]=' + uriParts[1]);
                                try{ api.scrollToElement(target, true); } catch(e){ }
                                return false;
                            }
                        });
                    });
                });
            })
        </script>



    </div>

    <div id="ntf_right_tech">
        <div id="title_factory_right" title="Production">Production</div>
        <div id="hall_list_main">
            <script>
                counter = new Array();
            </script>



            <div id="hall_1" class="hall_list">
                <div class="hall_singleView hall_active">


                </div>

                <div class="hall_info">waiting ...</div>

            </div>



            <div id="hall_2" class="hall_list">
                <div class="hall_singleView hall_inactive">

                </div>

                <div class="hall_buy" onclick="do_redirect('indexInternal.es?action=internalNanoTechFactory&amp;subaction=expandHall&amp;facilityID=2&amp;reloadToken=a8fffad6b105fb1c3207410ba310b850')">50,000 U.</div>

            </div>




        </div>
    </div>
    <div id="ntf_right_factory" style="display:none">
        <div id="title_factory_right" title="Progress"><strong>Progress</strong></div>
        <div id="factory_progress_main">

        </div>
        <div id="factory_progress_count" class="dronePartsDisplay"></div>
    </div>
</div>