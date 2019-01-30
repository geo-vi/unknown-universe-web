<div class="shop-body clearfix">
    <div class="shop-header">
        <nav class="shop-navigation">
            <ul class="nav nav-justified">
                <li class="your-rank active">
                    <a onclick="hof('rank');" href="#"></a>
                </li>
                <li class="top-exp">
                    <a onclick="hof('ep');" href="#"></a>
                </li>
                <li class="top-honor">
                    <a onclick="hof('hon');" href="#"></a>
                </li>
                <li class="top-user">
                    <a onclick="hof('topuser');" href="#"></a>
                </li>
                <li class="top-clan">
                    <a onclick="hof('player_auction');" href="#"></a>
                </li>
                <li class="top-gg">
                    <a onclick="hof('player_auction');" href="#"></a>
                </li>
                <li class="top-event">
                    <a onclick="hof('player_auction');" href="#"></a>
                </li>
            </ul>
        </nav>
    </div>
    <?php
    $itemid = [
        [
            'id'   => 'ep',
            'h3'   => 'Top Experience Home',
            'proc' => $System->User->getTopExp(),
            'th'   => 'Experience',
        ],
        [
            'id'   => 'hon',
            'h3'   => 'Top Honor Home',
            'proc' => $System->User->getTopHon(),
            'th'   => 'Honor',
        ],
        [
            'id'   => 'topuser',
            'h3'   => 'Top User Home',
            'proc' => $System->User->getTopUser(),
            'th'   => 'Rank Points',
        ],
    ]
    ?>

    <div class="shop-inner clearfix">
        <div class="single-item col-xs-12">
            <div id="rank" class="single-item-inner" style="display:block">
                <div class="single-item-header">
                    <?php
                    $nextrank   = $System->User->getNextRankN();
                    $rankbelow  = $System->User->getRankBelow();
                    $rankbelowp = $System->User->getRankBelowPT();
                    ?>
                    <h3>Your rank</h3>
                    <div class="single-item-headert">
                        You are a <?php echo $System->User->getRankName($System->User->RANK) ?>. Your rank is calculated
                        as follows:
                    </div>
                </div>
                <br />
                <?php
                $Hangars = $System->User->Hangars->getHangars();
                foreach ($Hangars as $Hangar) {
                    /** @var $Hangar Hangar */
                    if ($Hangar->ACTIVE) {
                        $hasShip  = $Hangar->SHIP_ID;
                        $shipname = $System->User->getShipName($hasShip);
                    }
                }

                $variable = [
                    [
                        'class'    => 'exp',
                        'variable' => 'Experience Points',
                        'math'     => '+',
                        'divident' => '/100,000',
                        'value'    => number_format($System->User->EXP, 0, '.', ','),
                        'color'    => 'orange',
                    ],
                    [
                        'class'    => 'hon',
                        'variable' => 'Honor Points',
                        'math'     => '+',
                        'divident' => '/100',
                        'value'    => number_format($System->User->HONOR, 0, '.', ','),
                        'color'    => 'orange',
                    ],
                    [
                        'class'    => 'lvl',
                        'variable' => 'Level',
                        'math'     => '+',
                        'divident' => 'x 100',
                        'value'    => $System->User->LVL,
                        'color'    => 'orange',
                    ],
                    [
                        'class'    => 'reg',
                        'variable' => 'Days Since Registration',
                        'math'     => '+',
                        'divident' => 'x 6',
                        'value'    => floor(( time() - strtotime($System->User->REGISTERED) ) / ( 60 * 60 * 24 )),
                        'color'    => 'orange',
                    ],
                    [
                        'class'    => 'ship',
                        'variable' => 'Your ship type (' . $shipname . ')',
                        'math'     => '+',
                        'divident' => 'x 1,000',
                        'value'    => $hasShip,
                        'color'    => 'orange',
                    ],
                    [
                        'class'    => 'deathpvp',
                        'variable' => 'Destroyed by enemies',
                        'math'     => '-',
                        'divident' => 'x 4',
                        'value'    => $System->User->getDeathsPvP(0),
                        'color'    => 'red',
                    ],
                    [
                        'class'    => 'deathpvp',
                        'variable' => 'Destroyed by radiation zone',
                        'math'     => '-',
                        'divident' => 'x 8',
                        'value'    => $System->User->getDeathsPvP(2),
                        'color'    => 'red',
                    ],
                    [
                        'class'    => 'deathpvp',
                        'variable' => 'Phoenix Destroyed',
                        'math'     => '-',
                        'divident' => 'x 2',
                        'value'    => $System->User->getDeathsPvP(1),
                        'color'    => 'red',
                    ],
                ]

                ?>
                <div class="single-item-content custom-scroll">
                    <div class="single-item-description col-xs-8">
                        <h3>Ranking points you've achieved:</h3>
                        <div class="ranking-points">
                            <?= $System->User->RANK_POINTS; ?>
                        </div>
                        <?php foreach ($variable as $var) { ?>

                            <div style="color:<?php echo $var['color']; ?>"
                                 class="plus-minus-<?php echo $var['class']; ?>">
                                <?php echo $var['math']; ?>
                            </div>

                            <div style="color:<?php echo $var['color']; ?>" class="<?php echo $var['class']; ?>">
                                <?php echo $var['variable']; ?>
                            </div>

                            <div style="color:<?php echo $var['color']; ?>" class="value-<?php echo $var['class']; ?>">
                                <?php echo $var['value']; ?>
                            </div>

                            <div style="color:<?php echo $var['color']; ?>"
                                 class="divident-<?php echo $var['class']; ?>">
                                <?php echo $var['divident']; ?>
                            </div>
                        <?php } ?>
                        <Br />
                        <div class="explanation">
                            <div class="none">
                                <?php
                                if ( $System->User->isAdmin() ){ ?>
                                <center>You currently have the highest rank.
                                    <img class="ranking-icon"
                                         src="/do_img/global/ranks/rank_<?php echo( $System->User->RANK ); ?>.gif">
                                    <?php
                                    } else {

                                    ?>
                                        You can see how your score will be calculated in the table pictured above. Each
                                        value will be balanced using a predetermined factor. Experience Points, for
                                        instance, are divided by 100,000 and added to other balanced values, which is
                                        how we
                                        determine your total Rank Points.<p><br />

                                        <?php if ( $System->User->RANK == 1 ){ ?>

                                    <p><?php echo "You need approximately " .
                                                  number_format($System->User->RANK_POINTS -
                                                                $System->User->getNextRank(),
                                                                0,
                                                                '.',
                                                                ','
                                                  ) .
                                                  " rank points to reach the next rank of <b>" .
                                                  $System->User->getNextRankN() .
                                                  "</b>"; ?>
                                        <img class="ranking-icon"
                                             src="/do_img/global/ranks/rank_<?php echo( $System->User->RANK +
                                                                                        1 ); ?>.gif">
                                        .<br />
                                    <p>

                                        You currently have the lowest rank.<br />
                                    <p>

                                        <?php } else {
                                        if ( $System->User->RANK == 20 ) { ?>

                                        You currently have the highest rank.
                                        <img class="ranking-icon"
                                             src="/do_img/global/ranks/rank_<?php echo( $System->User->RANK ); ?>.gif">
                                        <br />
                                    <p>

                                        The rank directly below yours is that of <b><?php echo $rankbelow; ?></b>
                                        <img
                                                class="ranking-icon"
                                                src="/do_img/global/ranks/rank_<?php echo( $System->User->RANK -
                                                                                           1 ); ?>.gif">
                                        .
                                        Space pilots with this rank have
                                        approximately <?php echo number_format($rankbelowp, 0, '.', ',') ?> rank points.<Br />
                                    <p>

                                        <?php } else { ?>

                                    <p><?php echo "You need approximately " .
                                                  number_format($System->User->RANK_POINTS -
                                                                $System->User->getNextRank(),
                                                                0,
                                                                '.',
                                                                ','
                                                  ) .
                                                  " rank points to reach the next rank of <b>" .
                                                  $System->User->getNextRankN() .
                                                  "</b>"; ?>
                                        <img class="ranking-icon"
                                             src="/do_img/global/ranks/rank_<?php echo( $System->User->RANK +
                                                                                        1 ); ?>.gif">
                                        .<br />
                                    <p>

                                        <br />
                                    <p>The rank directly below yours is that of <b><?php echo $rankbelow; ?></b>
                                        <img
                                                class="ranking-icon"
                                                src="/do_img/global/ranks/rank_<?php echo( $System->User->RANK -
                                                                                           1 ); ?>.gif">
                                       .
                                       Space pilots with this rank have
                                       approximately <?php echo number_format($rankbelowp, 0, '.', ',') ?> rank
                                       points.<br />
                                    <p>

                                        <?php }
                                        } ?>

                                        Note: The rank is only calculated once a day. The figures listed here are only
                                        meant as a rough estimate. There is no guarantee that you'll automatically
                                        change ranks if you've reached a certain number of points, since the values of
                                        the other players are also constantly changing.<br />
                                    <p>

                                        Total Ranking Points: <?= $System->User->RANK_POINTS ?>
                                        <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            foreach ($itemid as $var) {
                $proc = $var['proc'];
                $h3   = $var['h3'];
                $id   = $var['id'];
                ?>

                <div id="<?php echo $id ?>" class="single-item-inner" style="display:none">
                    <div class="single-item-header">
                        <p>
                        <h3><?php echo $h3 ?></h3>
                    </div>
                    <br />
                    <div class="single-item-content custom-scroll">
                        <div class="single-item-description col-xs-8">
                            <table class="table" style="margin-left:150px;">
                                <thead style="text-align:center">
                                <th>Rank</th>
                                <th>Player</th>
                                <th><?php echo $var['th']; ?></th>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                foreach ( $proc

                                as $r )
                                {
                                switch ($id) {
                                    case 'ep':
                                        $result = number_format($r['EXP'], 0, '.', ',');
                                        break;
                                    case 'hon':
                                        $result = number_format($r['HONOR'], 0, '.', ',');
                                        break;
                                    case 'topuser':
                                        $result = number_format($r['RANK_POINTS'], 0, '.', ',');
                                        break;
                                }
                                ?>
                                <td><?php echo $i;
                                    $i++; ?></td>
                                <td><?= $r['PLAYER_NAME']; ?></td>
                                <td><?= $result; ?></td>
                                </tbody><?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    function hof(id) {
        var list = document.getElementsByClassName("single-item-inner");
        for (var i = 0; i < list.length; i++) {
            list[i].style.display = 'none';
        }
        var e = document.getElementById(id);
        if (e.style.display == 'block') {
            e.style.display = 'none';
        } else {
            e.style.display = 'block';
        }
    }
</script>