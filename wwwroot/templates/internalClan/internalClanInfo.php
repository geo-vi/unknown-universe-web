<?php
    $CLAN_ID = $System->User->__get('CLAN_ID');
    $CLAN = $System->Clan->getClanById($CLAN_ID);
    $CLAN_MEMBERS = $System->Clan->getClanMembers($CLAN_ID);
    $LEADER = $System->Clan->getLeader($CLAN_ID);

    ?>
<div class="clan-body clearfix">
    <div class="clan-content">
        <div class="loading-screen loading">
            <div class="loading-screen-inner">
                <h3 class="loading-screen-caption">Loading...</h3>
            </div>
        </div>
        <div class="clan-header">
                <ul class="nav nav-justified" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#clan-info" aria-controls="clan-info" role="tab" data-toggle="tab" class="bold">
                            Info
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#clan-members" aria-controls="clan-members" role="tab" data-toggle="tab" class="bold">
                            Members
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#diplomacy" aria-controls="diplomacy" role="tab" data-toggle="tab" class="bold">
                            Diplomacy
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab" class="bold">
                            Messages
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#administration" aria-controls="administration" role="tab" data-toggle="tab" class="bold">
                            Administration
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#battlestation" aria-controls="battlestation" role="tab" data-toggle="tab" class="bold">
                            Battle Station
                        </a>
                    </li>
                </ul>
        </div>
        <div id="clan-inner" class="tab-content">

            <div role="tabpanel" class="tab-pane active" id="clan-info">
                <div id="clan-avatar"></div>
                <div id="clan-details">
                    <h3><?=$CLAN['NAME'] ?></h3>
                    <table>
                        <tr>
                            <th>Name</th>
                            <td>[<?=$CLAN['TAG'] ?>] <?=$CLAN['NAME']?></td>
                            <th>Company</th>
                            <td id="faction" data-value="<?=$CLAN['FACTION']?>">NONE</td>
                        </tr>
                        <tr>
                            <th>Leader</th>
                            <td><?=$LEADER['PLAYER_NAME'] ?></td>
                            <th>Description</th>
                            <td><?=$CLAN['DESCRIPTION'] ?></td>
                        </tr>
                        <tr>
                            <th>Ranking</th>
                            <td>#<?=$CLAN['RANK'] ?></td>
                        </tr>
                        <tr>
                            <th>Date of creation</th>
                            <td><?=$CLAN['CREATED'] ?></td>
                        </tr>
                    </table>
                    <div class="edit-clan"><a id="edit_clan_button" class="btn btn-block btn-primary" data-toggle="modal"
                                              data-target="#editClanInfo">Edit Clan</a></div>
                </div>
            </div> <!-- /clan-info -->

            <div role="tabpanel" class="tab-pane" id="clan-members">
                <h3>Clan Members [<?=count($CLAN_MEMBERS)?>/50]</h3>
                <table>
                    <thead>
                    <tr>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Experience</th>
                        <th>Honor</th>
                        <th>Level</th>
                        <th>Rank</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div> <!-- /clan-members -->

            <div role="tabpanel" class="tab-pane" id="diplomacy">
                <div class="diplomacies">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Clan name</th>
                            <th>Members</th>
                            <th>Rank</th>
                            <th>Company</th>
                            <th>Diplomacy</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr><td>No Diplomacies</td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-inline col-lg-6 col-lg-offset-3 text-center">
                    <div class="form-group">
                        <label for="usr" class="col-xs-2">Name:</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" id="usr">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Diplomacy
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Alliance</a></li>
                                <li><a href="#">NAP</a></li>
                                <li><a href="#">War</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary">Apply</button>
                    </div>
                </div>
            </div> <!-- /diplomacy -->

            <div role="tabpanel" class="tab-pane" id="messages">
            </div> <!-- /messages -->

            <div role="tabpanel" class="tab-pane" id="administration">
                <div class="container col-lg-6 col-lg-offset-3">
                    <div id="members-list" class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Choose a player
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                        </ul>
                    </div>
                    <div class="control-group controls span2">
                        <div class="checkbox">
                            <label><input type="checkbox" value="" disabled>Update Clan Info</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="" disabled>Kick Members</label>
                        </div>
                        <div class="checkbox disabled">
                            <label><input type="checkbox" value="" disabled>Accept Members</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="" disabled>Delete clan</label>
                        </div>
                    </div>
                </div>
            </div> <!-- /administration -->

            <div role="tabpanel" class="tab-pane" id="battlestation">
            </div> <!-- /battlestation -->
        </div>
    </div>
</div>