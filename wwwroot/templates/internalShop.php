<script src="<?= PROJECT_HTTP_ROOT ?>resources/js/shop.js"></script>
<script>
    $(document).ready(function () {
        new shop(
            <?=$System->User->__get('USER_ID')?>,
            <?=$System->User->__get('PLAYER_ID')?>,
            '<?=base64_encode($System->Server['SERVER_IP'])?>',
            <?=$System->User->hasPet() ? 1 : 0;?>,
            <?=$System->User->isAdmin()?>,
        );
    });
</script>

<div class="shop-body clearfix">
    <div class="shop-header">
        <nav class="shop-navigation">
            <ul class="nav nav-justified">
                <?php
                $CNT = 0;
                foreach ($System->Shop->CATEGORIES as $CATEGORY => $DATA) {
                    $CNT++;
                    if ($CATEGORY == 'ADMINITEM' || $CATEGORY == 'ADMINSHIP') {
                        if ($System->User->isAdmin()) {
                            ?>
                            <li class="category-<?= strtolower($CATEGORY) ?> <?= $CNT == 1 ? 'active' : '' ?>">
                                <a
                                        onclick="shop.switchCategory('<?= strtolower($CATEGORY) ?>');"
                                        href="#"><?= $System->__('SHOP_NAV_' . $CATEGORY) ?></a>
                            </li>
                            <?php
                        }
                    } else {
                        ?>
                        <li class="category-<?= strtolower($CATEGORY) ?> <?= $CNT == 1 ? 'active' : '' ?>">
                            <a
                                    onclick="shop.switchCategory('<?= strtolower($CATEGORY) ?>');"
                                    href="#"><?php if ($CATEGORY == 'ammo' && $System->Game->getEventRunningNow()) { ?><span class="discounted-item"></span><?php } ?><?= $System->__('SHOP_NAV_' . $CATEGORY) ?></a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </nav>
    </div>

    <div class="shop-inner clearfix">
        <div id="item-info-box" class="single-item col-xs-12">
            <div class="single-item-inner">
                <div class="single-item-image">

                </div>
                <div class="single-item-content">
                    <div class="single-item-description col-xs-8">
                        <h3>-- No Item selected --</h3>
                        <p>Select an item from the list below.</p>
                        <ul>

                        </ul>
                    </div>
                    <div class="single-item-buy-menu col-xs-4">
                        <div class="amount-select">
                            <span class="add-button" data-add="1">+1</span>
                            <span class="add-button" data-add="10">+10</span>
                            <span class="add-button" data-add="100">+100</span>
                            <span class="add-button" data-add="1000">+1000</span>
                            <input type="number"
                                   min="1"
                                   value="1"
                                   class="item-quantity form-control"
                                   aria-label='quantity'>
                            <span class="item-quantity-label">(Item Amount)</span>
                        </div>
                        <div class="level-select">
                            <a class="btn lvl-btn selected" data-level="1">Level 1</a>
                            <a class="btn lvl-btn" data-level="2">Level 2</a>
                            <a class="btn lvl-btn" data-level="3">Level 3</a>
                        </div>
                        <span class="item-price"></span>
                        <a class="btn btn-primary buy-btn">Buy now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="item-list col-xs-12 custom-scroll">
        </div>
    </div>
</div>
