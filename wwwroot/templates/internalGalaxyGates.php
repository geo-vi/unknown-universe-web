<main class="container">
    <div class="main">
        <div class="box">
            <div class="nav">
                <button class="nav-button">ALPHA</button>
                <button class="nav-button">BETA</button>
                <button class="nav-button">GAMMA</button>
                <button class="nav-button">DELTA</button>
                <button class="nav-button">EPSILON</button>
                <button class="nav-button">ZETA</button>
                <button class="nav-button">KAPPA</button>
                <button class="nav-button">LAMBDA</button>
            </div>
            <div class="gate-container"></div>

            <div class="menu">
                <div class="info">
                    <label class="font">ENERGY: <?= number_format($System->User->__get('SPINS'), 0, ',', ','); ?></label><br>
                    <label class="font"> URIDIUM: <?= number_format($System->User->__get('URIDIUM'), 0, '.', '.'); ?></label>
                </div>
                <div class="spin-amount">
                    <label class="font" for='chargeCount'>ENERGY CHARGE</label>
                    <select id='chargeCount' class="charge-select">
                        <option value="1">1</option>
                        <option value="5">5</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <button class="spin-button">SPIN</button>
                <div class="log">
                    <div class="drop-list">
                        <div class="drop x2">
                            <label class="font">500x MCB-25</label>
                        </div>
                        <div class="drop x3">
                            <label class="font">500x MCB-50</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
