<script src="<?= PROJECT_HTTP_ROOT ?>resources/js/chart.bundle.min.js"></script>

<div class="modal fade" id="auction" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="color:black;background-color:rgba(0, 0, 0, 0.7);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">START AUCTION</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="sel1">Select Item:</label>
                    <select class="form-control" id="sel1" style="width:100%;">
                        <option style="color:black;">Goliath Bastion</option>
                        <option style="color:black;">Goliath Enf</option>
                        <option style="color:black;">Goliath Veteran</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sel1">Select Time:</label>
                    <select class="form-control" id="sel2">
                        <option style="color:black;">12 Hours</option>
                        <option style="color:black;">6 Hours</option>
                        <option style="color:black;">3 Hours</option>
                    </select>
                </div>
                <input type="button" class="uu_button" value="START">
            </div>
            <div class="modal-footer">
                <button type="button" class="uu_button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="auction-container">

    <div class="auction col-md-12 aside text-center" style="padding:15px;">
        <button class="uu_button2" onclick="auction('player_auction');">PLAYER AUCTION</button>
        <button class="uu_button2" onclick="auction('server_auction');">SERVER AUCTION</button>
        <button type="button" class="uu_button2" data-toggle="modal" data-target="#auction">START AUCTION</button>
        <button class="uu_button2" onclick="auction('player_auction');">MY BIDS</button>
        <button class="uu_button2" onclick="auction('player_auction');">MY ITEMS</button>
    </div>

</div>

<br />

<main class="main-container">

    <div id="tabs-container">
        <div id="tabs-content" style="height:100%;">
            <div id="player_auction" class="none" style="display:block;">
                <div class="row">

                    <div class="auction col-md-8 aside"
                         style="position: relative; overflow: auto; box-sizing: border-box;height:650px;">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="border-bottom: 2px solid #1790AB;">Item</th>
                                <th style="border-bottom: 2px solid #1790AB;">Amount</th>
                                <th style="border-bottom: 2px solid #1790AB;">Asking Price</th>
                                <th style="border-bottom: 2px solid #1790AB;">Owner</th>
                                <th style="border-bottom: 2px solid #1790AB;">Time left</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="item item_light" id="0">
                                <td style="border-top:none;">
                                    <img
                                            src="https://darkorbit-22.bpsecure.com/do_img/global/items/ammunition/laser/mcb-25_30x30.png?__cv=becac3718527c5212ffbaef4de6beb00">
                                </td>
                                <td style="border-top:none;">Ammo</td>
                                <td style="border-top:none;">1000</td>
                                <td style="border-top:none;">general_Rejection</td>
                                <td style="border-top:none;">09:10</td>
                            </tr>
                            <tr class="item item_dark" id="1">
                                <td style="border-top:none;">
                                    <img
                                            src="https://darkorbit-22.bpsecure.com/do_img/global/items/ammunition/laser/mcb-50_30x30.png?__cv=becac3718527c5212ffbaef4de6beb00">
                                </td>
                                <td style="border-top:none;">Ammo</td>
                                <td style="border-top:none;">1000</td>
                                <td style="border-top:none;">general_Rejection</td>
                                <td style="border-top:none;">09:10</td>
                            </tr>
                            <tr class="item item_light" id="2">
                                <td style="border-top:none;">
                                    <img
                                            src="https://darkorbit-22.bpsecure.com/do_img/global/items/ammunition/laser/ucb-100_30x30.png?__cv=becac3718527c5212ffbaef4de6beb00">
                                </td>
                                <td style="border-top:none;">Ammo</td>
                                <td style="border-top:none;">1000</td>
                                <td style="border-top:none;">general_Rejection</td>
                                <td style="border-top:none;">09:10</td>
                            </tr>
                            <tr class="item item_dark" id="3">
                                <td style="border-top:none;">
                                    <img
                                            src="https://darkorbit-22.bpsecure.com/do_img/global/items/ammunition/laser/rsb-75_30x30.png?__cv=becac3718527c5212ffbaef4de6beb00">
                                </td>
                                <td style="border-top:none;">Ammo</td>
                                <td style="border-top:none;">1000</td>
                                <td style="border-top:none;">general_Rejection</td>
                                <td style="border-top:none;">09:10</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="auction col-md-4 aside text-center"
                         style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;height:650px;">
                        <div class="item_box">
                            <div class="item_img">
                                <img
                                        src="https://darkorbit-22.bpsecure.com/do_img/global/items/ammunition/laser/mcb-50_100x100.png?__cv=becac3718527c5212ffbaef4de6beb00">
                            </div>
                            <div class="item_desc">THIS IS THE BEST STANDARD LASER AMMO ON THE MARKET. X3 LASER DAMAGE PER ROUND. (1.000 Units)
                            </div>
                            <br />
                            <div class="item_bid_input"><input class="uu_input" type="text" id="#" name="#"
                                                               value="10000"> C.
                            </div>
                            <br />
                            <div class="item_bid_button"><button type="button" class="btn btn-primary">Bid</button>
                            </div>
                            <div class="item_instantbuy_button">
                                <button type="button" class="btn btn-primary">Instant Buy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="server_auction" class="none" style="display:none;">
            <div class="row">

                <div class="auction col-md-6 aside"
                     style="position: relative; overflow: auto; box-sizing: border-box;height:650px;">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="border-bottom: 2px solid #1790AB;">Item</th>
                            <th style="border-bottom: 2px solid #1790AB;">Type</th>
                            <th style="border-bottom: 2px solid #1790AB;">Current offer</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="item_light">
                            <td style="border-top:none;">
                                <img
                                        src="https://darkorbit-22.bpsecure.com/do_img/global/items/ammunition/laser/mcb-25_30x30.png?__cv=becac3718527c5212ffbaef4de6beb00">
                            </td>
                            <td style="border-top:none;">Ammo</td>
                            <td style="border-top:none;">100,000 C.</td>
                        </tr>
                        <tr class="item_dark">
                            <td style="border-top:none;">
                                <img
                                        src="https://darkorbit-22.bpsecure.com/do_img/global/items/ammunition/laser/mcb-50_30x30.png?__cv=becac3718527c5212ffbaef4de6beb00">
                            </td>
                            <td style="border-top:none;">Ammo</td>
                            <td style="border-top:none;">120,000 C.</td>
                        </tr>
                        <tr class="item_light">
                            <td style="border-top:none;">
                                <img
                                        src="https://darkorbit-22.bpsecure.com/do_img/global/items/ammunition/rocket/plt-2021_30x30.png?__cv=becac3718527c5212ffbaef4de6beb00">
                            </td>
                            <td style="border-top:none;">Ammo</td>
                            <td style="border-top:none;">320,000 C.</td>
                        </tr>
                        <tr class="item_dark">
                            <td style="border-top:none;">
                                <img
                                        src="https://darkorbit-22.bpsecure.com/do_img/global/items/ship/aegis-eic_30x30.png?__cv=becac3718527c5212ffbaef4de6beb00">
                            </td>
                            <td style="border-top:none;">Ship</td>
                            <td style="border-top:none;">9,999,999 C.</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="auction col-md-6 aside text-center"
                     style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;height:650px;">
                    <div class="item_box">
                        <div class="item_img">
                            <img
                                    src="https://darkorbit-22.bpsecure.com/do_img/global/items/ammunition/laser/mcb-50_100x100.png?__cv=becac3718527c5212ffbaef4de6beb00">
                        </div>
                        <div class="item_desc">THIS IS THE BEST STANDARD LASER AMMO ON THE MARKET. X3 LASER DAMAGE PER ROUND. (1.000 Units)
                        </div>
                        <div class="item_desc" style="color:orange;font-size:20px;">100.000 C. <br /> STOCK LEFT: 1
                            <br />
                            <input type="submit" class="uu_button" value="Buy Now"></div>

                        <canvas id="myChart"></canvas>
                        <script>
                            var ctx = document.getElementById("myChart").getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: ['0:00', '6:00', '12:00', '18:00'],
                                    datasets: [{
                                        label: '# of Credits',
                                        data: [10000, 15000, 13000, 14500],
                                        backgroundColor: [
                                            'rgba(192, 192, 192, 0.1)',
                                        ],
                                        borderColor: [
                                            'rgba(192, 192, 192, 0.1)',
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    function auction(id) {
        var list = document.getElementsByClassName("none");
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

