<script src="<?= PROJECT_HTTP_ROOT ?>resources/js/galaxygate.js"></script>
<script>
    $(document).ready(function () {
        new galaxygate(
            <?=$System->User->__get('USER_ID')?>,
            <?=$System->User->__get('PLAYER_ID')?>,
            '<?=base64_encode($System->Server['SERVER_IP'])?>',
        );
    });
</script>

<div id="gate-container" class="clearfix">
    <div id="galaxygate-choice">
        <ul class="gate-separator">
            <li class="selected" data-gate-id="1">Alpha</li>
            <li data-gate-id="2">Beta</li>
            <li data-gate-id="3">Gamma</li>
        </ul>
        <ul class="gate-separator">
            <li data-gate-id="4">Delta</li>
        </ul>
        <ul class="gate-separator">
            <li data-gate-id="5">Epsilon</li>
        </ul>
        <ul class="gate-separator">
            <li data-gate-id="6">Zeta</li>
        </ul>
        <ul class="gate-separator">
            <li data-gate-id="7">Kappa</li>
        </ul>
        <ul class="gate-separator">
            <li data-gate-id="8">Lambda</li>
        </ul>
        <ul class="gate-separator">
            <li data-gate-id="13">Hades</li>
        </ul>
    </div>

    <div id="gate-info">
        <div class="loading-screen"></div>
        <div id="gate-smoke">
            <img src="../resources/images/gg/spins/1.webp" alt="Gate is on map" style="display:none">
        </div>
        <div id="gate-preparation">
            <div id="gate-button">
                <a id="prepare-gate" class="btn btn-info active">Prepare</a>
                <h3 id="collected-parts"></h3>
                <h4 id="current-wave"></h4>
                <h4 id="lives-left"></h4>
            </div>
        </div>
    </div>

    <div id="user-info">
        <div id="stats">
            <p>Uridium: <span id="uridium-amount"></span></p>
            <p>Energy: <span id="ggenergy-amount"></span></p>
        </div>
        <div id="clicker">
            <div id="gate-multiply">
                <label id="multiply-label"><div id="cross"><h4>X</h4></div>Use Multiplier</label>
                <div id="gate-progress-bar" class="progress">
                    <div class="progress-bar" role="progressbar" style="width:20%">
                        1/5
                    </div>
                </div>
            </div>
            <div id="buttons">
                <div id="energy-selectors" class="dropdown">
                    <button id="energy-dropdown" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        <span id="energy-amount-selector">x1</span><span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a data-amount="1">x1</a></li>
                        <li><a data-amount="5">x5</a></li>
                        <li><a data-amount="10">x10</a></li>
                        <li><a data-amount="100">x100</a></li>
                    </ul>
                </div>
                <button id="use-energy" type="button" class="btn btn-primary active">10,000 U.</button>
            </div>
            <div id="log">
                <ul>
                </ul>
            </div>
        </div>
    </div>
</div>