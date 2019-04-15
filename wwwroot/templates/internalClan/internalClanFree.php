<div class="clan-body clearfix">
    <script>
        clan.renderExternal();
    </script>
    <div class="clan-top-header">
        <h1>Create a Clan</h1>
    </div>
    <div class="clan-top-cotainer">
        <div class="clan-top-content clearfix">
            <div class="main-clan-info">
                <input id="clan_tag" class="form-control clan-textbox" maxlength="4" placeholder="Clan Tag">
                <input id="clan_name" class="form-control clan-textbox" maxlength="24" placeholder="Clan Name">
                <textarea id="clan_desc" class="form-control clan-textbox" maxlength="128" placeholder="Clan Description"></textarea>
            </div>
            <div class="clan-top-send col-xs-12 margin-top">
                <a id="create_clan" class="btn btn-block btn-primary">Create</a>
            </div>
        </div>
    </div>
    <div class="clan-bottom-header">
        <h1>Find Clan</h1>
    </div>
    <div class="clan-bottom-cotainer">
        <div class="clan-bottom-content  col-xs-12">
            <div class="clan-bottom-input-container">
                <input id="clan_search_text" class="form-control">
                <a class="btn btn-block btn-primary margin-top" id="clan_search">Search</a>
            </div>
            <div class="clearfix clan-bottom-list-container custom-scroll margin-top">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Clan Tag</th>
                        <th>Clan Name</th>
                        <th>Short Clan Description</th>
                        <th>Members</th>
                        <th>Faction</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>