<div class="clan-body clearfix">
    <?php
    if (isset($_POST['action']) && $_POST['action'] == "create_clan") {
        echo $System->Clan->foundClan($_POST);
    }
    ?>
    <div class="clan-top-header">
        <h1>Create a Clan</h1>
    </div>
    <div class="clan-top-cotainer">
        <div class="clan-top-content clearfix">
            <form method="post" action="">
                <input type="hidden" name="action" value="create_clan">
                <div class="clan-top-input-container clan-tag col-xs-5">
                    <input name="clan_tag" class="form-control" placeholder="Clan Tag">
                </div>
                <div class="clan-top-input-container clan-name col-xs-7">
                    <input name="clan_name" class="form-control" placeholder="Clan Name">
                </div>
                <div class="clan-top-send col-xs-12 margin-top">
                    <input class="btn btn-block btn-primary" type="submit" name="clan_search" value="Create">
                </div>
            </form>
        </div>
    </div>
    <div class="clan-bottom-header">
        <h1>Find Clan</h1>
    </div>
    <div class="clan-bottom-cotainer">
        <div class="clan-bottom-content  col-xs-12">
            <div class="clan-bottom-input-container">
                <form action="" method="post">
                    <input type="hidden" name="action" value="search_clan">
                    <input name="clan_search_text" class="form-control" placeholder="Searching for..."
                           value="<?= isset($_POST['action']) ? $_POST['clan_search_text'] : '' ?>">
                    <input class="btn btn-block btn-primary margin-top" type="submit" name="clan_search" value="Search">
                </form>
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
                    <?php
                    $Clans = [];
                    if (isset($_POST['action']) && $_POST['action'] == "search_clan") {
                        $Clans = $System->Clan->searchClan($_POST['clan_search_text']);
                    } else {
                        $Clans = $System->Clan->getClans(50);
                    }
                    if (count($Clans) == 0) {
                        ?>
                        <td>No clans found</td>
                        <?php
                    }
                    foreach ($Clans as $rank => $clan) {

                        $json_members  = $clan['MEMBERS'];
                        $members_array = json_decode($json_members, true);
                        $members       = 0;
                        if ($members_array == null) {
                            $members = 0;
                        } else {
                            $members = count($members_array);
                        }
                        ?>
                        <tr onclick="showAdditionalInfo(<?= $clan['ID'] ?>);">
                            <td><?= $clan['TAG'] ?></td>
                            <td><?= $clan['NAME'] ?></td>
                            <td><?= $clan['DESCRIPTION'] ?></td>
                            <td><?= $members ?>/50</td>
                            <td><?php if ($clan['FACTION'] == 1) {
                                    echo 'MMO';
                                } else {
                                    if ($clan['FACTION'] == 2) {
                                        echo 'EIC';
                                    } else {
                                        if ($clan['FACTION'] == 3) {
                                            echo 'VRU';
                                        } else {
                                            echo 'ALL';
                                        }
                                    }
                                }
                                ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function showAdditionalInfo(id) {

    }
</script>