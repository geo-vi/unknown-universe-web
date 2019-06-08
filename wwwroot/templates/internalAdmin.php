<?php
$verified = true;

if (!$verified) {
?>

<div class="form-group key-verification">
    <label for="key">Key:</label>
    <input type="text" class="form-control" id="key">
</div>
<div class="form-group submit-button">
    <button id="verify-btn" type="button" class="btn btn-info">Verify</button>
</div>

<?php } else { ?>
    <p class="upper-box"> Logged in as general_Rejection; IP: 0.0.0.0; Verification time: 12:29 PM <a>[Click here to logout]</a></p>
    <div class="box">
        <div class="sky-header">
            <ul class="nav nav-justified" role="tablist">
                <li role="presentation" class="active">
                    <a href="#main-tab" aria-controls="main-tab" role="tab" data-toggle="tab" class="bold">
                        Home
                    </a>
                </li>
                <li role="presentation">
                    <a href="#user-tab" aria-controls="user-tab" role="tab" data-toggle="tab" class="bold">
                        User
                    </a>
                </li>
                <li role="presentation">
                    <a href="#logs-tab" aria-controls="logs-tab" role="tab" data-toggle="tab" class="bold">
                        Logs
                    </a>
                </li>
                <li role="presentation">
                    <a href="#events-tab" aria-controls="events-tab" role="tab" data-toggle="tab" class="bold">
                        Events
                    </a>
                </li>
                <li role="presentation">
                    <a href="#chat-tab" aria-controls="chat-tab" role="tab" data-toggle="tab" class="bold">
                        Chat
                    </a>
                </li>
                <li role="presentation">
                    <a href="#penalties-tab" aria-controls="penalties-tab" role="tab" data-toggle="tab" class="bold">
                        Penalties
                    </a>
                </li>
                <li role="presentation">
                    <a href="#tickets-tab" aria-controls="tickets-tab" role="tab" data-toggle="tab" class="bold">
                        Tickets
                    </a>
                </li>
                <li role="presentation">
                    <a href="#clan-tab" aria-controls="clan-tab" role="tab" data-toggle="tab" class="bold">
                        Clan
                    </a>
                </li>
                <li role="presentation">
                    <a href="#game-tab" aria-controls="game-tab" role="tab" data-toggle="tab" class="bold">
                        Game
                    </a>
                </li>
                <li role="presentation">
                    <a href="#packages-tab" aria-controls="packages-tab" role="tab" data-toggle="tab" class="bold">
                        Packages
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="main-tab">
                <div class="welcome-msg"><h3>Welcome general_Rejection to the Admin Control Panel</h3><p>Please keep
                        the panel secret and do not attempt to share it with anyone otherwise you'll instantly have it revoked.</p></div>
                <div class="tasks">
                    You currently have 2 assigned tasks
                </div>
                <div class="list-group">
                    <a href="#" class="list-group-item">Finished tasks <span class="badge">12</span></a>
                    <a href="#" class="list-group-item">Check with Heisenberg on Discord about the next updates</a>
                    <a href="#" class="list-group-item">Announce the updates</a>
                    <a href="#" class="list-group-item">Check with Heisenberg on Discord about the next updates</a>
                    <a href="#" class="list-group-item">Announce the updates</a>
                    <a href="#" class="list-group-item">Check with Heisenberg on Discord about the next updates</a>
                    <a href="#" class="list-group-item">Announce the updates</a>
                    <a href="#" class="list-group-item">Check with Heisenberg on Discord about the next updates</a>
                    <a href="#" class="list-group-item">Announce the updates</a>
                    <a href="#" class="list-group-item">Check with Heisenberg on Discord about the next updates</a>
                    <a href="#" class="list-group-item">Announce the updates</a>
                    <a href="#" class="list-group-item">Check with Heisenberg on Discord about the next updates</a>
                    <a href="#" class="list-group-item">Announce the updates</a>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="chat-tab">
                <?php
                include_once('internalAdmin/internalAdminChat.php');
                ?>
            </div> <!-- /chat -->
        </div>
    </div>
<?php } ?>
