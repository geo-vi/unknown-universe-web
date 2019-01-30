<?php
if (isset($_POST['action']) && $_POST['action'] == "reward") {
    $System->Game->claimReward($_POST['ItemID'],
                               $_POST['Quantity'],
                               $_POST['Type'],
                               $_POST['Name'],
                               $_POST['Day'],
                               $_POST['Month']
    );
}
?>
<div class="calendar-body clearfix">
    <div class="calendar-inner clearfix">
        <div class="single-item col-xs-12">
            <div class="single-item-inner">
                <?php
                $data = $System->Game->getCalendar();
                foreach ($data as $d) {
                    $r     = $d['Reward'];
                    $month = json_decode($r, true);
                    foreach ($month as $i) {
                        $itemid    = $i['ItemID'];
                        $di        = json_decode($itemid, true);
                        $qe        = $i['Q'];
                        $qd        = json_decode($qe, true);
                        $et        = $i['Type'];
                        $de        = $i['Day'];
                        $dd        = json_decode($de, true);
                        $item      = $System->Shop->getItemInfo($di);
                        $IMAGE_URL = \Utils::getPathByLootId($item[0]['LOOT_ID'], '100x100');
                        $date      = date('d');
                        $checkuser = $System->Game->checkUser($d['Month'], $dd);
                        if ($i['Day'] == $date && !$checkuser) {
                            ?>
                            <div data-fpdt="<?= $et ?>"
                                 data-fipmm="<?= $d['Month'] ?>"
                                 data-fpid="<?= $di ?>"
                                 data-fpq="<?= $qd ?>"
                                 data-fpn="<?= $item['NAME'] ?>"
                                 data-fpdd="<?= $dd ?>"
                                 title="<?= $di ?>"
                                 class="single-item-header">
                                Day <?= $i['Day']; ?>
                                <img src="<?= $IMAGE_URL ?>">
                                <span style="position:relative;top:-12px;"><?= $qd ?></span>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="single-item-header" style="pointer-events: none; filter: brightness(40%);">
                                Day <?= $i['Day']; ?>
                                <img src="<?= $IMAGE_URL ?>">
                                <span style="position:relative;top:-12px;"><?= $qd ?></span>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery('.single-item-header').click(function () {
        var mID = $(this).data("fpid");
        var Q = $(this).data("fpq");
        var type = $(this).data("fpdt");
        var name = $(this).data("fpn");
        var day = $(this).data("fpdd");
        var month = $(this).data("fipmm");
        jQuery.ajax({
            type: "POST",
            url: "",
            data: {action: 'reward', ItemID: mID, Quantity: Q, Type: type, Name: name, Day: day, Month: month},
            success: function (data) {
                swal('Success!', 'Received reward', 'success');
                setTimeout(location.reload.bind(location), 500);
            },
            error: function () {
                console.log(data);
            }
        });
    });
</script>