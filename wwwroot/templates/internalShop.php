<script src="<?= PROJECT_HTTP_ROOT ?>resources/js/shop.js"></script>
<script>
    $(document).ready(function () {
        new shop(
            <?=$System->User->USER_ID?>,
            <?=$System->User->PLAYER_ID?>,
            '<?=base64_encode($System->Server['SERVER_IP'])?>',
            <?=$System->User->hasPet()?>,
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
                                    href="#"><?= $System->__('SHOP_NAV_' . $CATEGORY) ?></a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </nav>
    </div>

    <div class="shop-inner clearfix">
        <div class="single-item col-xs-12">
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
                            <a href="#" class="add-button" data-add="1">+1</a>
                            <a href="#" class="add-button" data-add="10">+10</a>
                            <a href="#" class="add-button" data-add="100">+100</a>
                            <a href="#" class="add-button" data-add="1000">+1000</a>
                            <input type="number" min="1" value="1" class="item-quantity form-control">
                            <span class="item-quantity-label">(Item Amount)</span>
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