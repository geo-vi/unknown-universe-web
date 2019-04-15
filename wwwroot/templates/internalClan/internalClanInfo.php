<div class="clan-body clearfix">
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
                <h3>NAME OF CLAN</h3>
                <table>
                    <tr>
                        <th>Name</th>
                        <td>[CLAN] NAME OF CLAN</td>
                        <th>Company</th>
                        <td>VRU</td>
                    </tr>
                    <tr>
                        <th>Leader</th>
                        <td>general_Rejection</td>
                        <th>Description</th>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet imperdiet ultrices.</td>
                    </tr>
                    <tr>
                        <th>Ranking</th>
                        <td>#0</td>
                    </tr>
                    <tr>
                        <th>Date of creation</th>
                        <td>0/0/0 0:00:00</td>
                    </tr>
                </table>
                <div class="edit-clan"><a id="edit_clan_button" class="btn btn-block btn-primary" data-toggle="modal"
                                          data-target="#userSettingsModal">Edit Clan</a></div>
            </div>
        </div> <!-- /clan-info -->

        <div role="tabpanel" class="tab-pane" id="clan-members">
            <h3>Clan Members [1/50]</h3>
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
                <tbody></tbody>
            </table>
        </div> <!-- /clan-members -->

        <div role="tabpanel" class="tab-pane" id="diplomacy">
        </div> <!-- /diplomacy -->

        <div role="tabpanel" class="tab-pane" id="messages">
        </div> <!-- /messages -->

        <div role="tabpanel" class="tab-pane" id="administration">
        </div> <!-- /administration -->

        <div role="tabpanel" class="tab-pane" id="battlestation">
        </div> <!-- /battlestation -->
    </div>
</div>

<script>
    clan.renderInternal();
</script>