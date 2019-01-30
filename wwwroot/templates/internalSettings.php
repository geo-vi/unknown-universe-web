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

            </div>
        </div>
    </div>
</div>