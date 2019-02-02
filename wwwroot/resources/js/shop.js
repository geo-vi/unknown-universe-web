class shop {
    constructor(USER_ID, PLAYER_ID, SERVER_IP, PET, ADMIN) {
        shop.USER_ID = USER_ID;
        shop.PLAYER_ID = PLAYER_ID;
        shop.SERVER_IP = SERVER_IP;
        shop.IS_ADMIN = ADMIN;
        shop.pet = PET;
        shop.category = "SHIPS";
        shop.data = null;
        shop.render();
    }

    /**
     * preRender Function
     * Clear HTML
     */
    static preRender() {
        $('.item-list .mCSB_container > div').remove();
        $('.single-item .single-item-content .single-item-buy-menu .buy-btn').unbind('click');
        $('.amount-select .item-quantity').unbind('change');
        $('.amount-select .add-button').unbind('click');
        shop.clearItemView();
    }


    /**
     * render Function
     * renders the Shop (displays everything)
     *
     * @param data
     */
    static render(data = null) {
        if (shop.data === null && data === null) {
            let params = {
                "CATEGORY": shop.category
            };
            shop.sendRequest('render', 'load', params);
        } else {
            if (data !== null) {
                shop.data = data;
            }

            shop.preRender();

            let ITEMS = shop.data;
            ITEMS.forEach(function (ITEM, INDEX) {
                if (ITEM.SHOW_FUEL ||
                    ITEM.SHOW_CATS ||
                    ITEM.HAS_PET ||
                    ITEM.HAS_MAX_IRIS ||
                    ITEM.NAME ===
                    'Flax' ||
                    ITEM.hasShip ||
                    ITEM.hasDesign
                    ||
                    ITEM.hasFormation) {

                } else {
                    let ItemDIV = $('<div>').addClass('item').attr('data-item-id', INDEX),
                        ItemIMG = $('<div>').addClass('item-image'),
                        ItemPRICE = $('<span>').addClass('item-price');

                    let IMG_URL = ITEM.IMAGE_URL;
                    $(ItemIMG).attr('style', 'background-image: url("' + IMG_URL + '")');

                    let CURRENCY = (
                        ITEM.CURRENCY === 1 ? "C" : "U"
                    );
                    $(ItemPRICE).text(parseFloat(ITEM.PRICE).format(2, 3, ',', '.') + CURRENCY);

                    $('.item-list .mCSB_container').append($(ItemDIV).append(ItemIMG).append(ItemPRICE));
                }
            });

            shop.activateShop();
        }
    }

    /**
     * activateShop Function
     * registers all needed Event-Listners for Shop
     *
     */
    static activateShop() {
        $('.item-list .item').click(() => {
            let ITEM_ID = $(this).data('item-id'),
                ITEM = shop.data[ITEM_ID];

            shop.clearItemView();

            if (ITEM.AMOUNT_SELECTABLE) {
                $('.single-item .single-item-content .single-item-buy-menu .amount-select').show();
            } else {
                $('.single-item .single-item-content .single-item-buy-menu .amount-select').hide();
            }

            if (ITEM.IS_PET) {
                $('.single-item .single-item-content .pet-name').show();
                $('.single-item .single-item-content .pet-name-label').show();
            } else {
                $('.single-item .single-item-content .pet-name').hide();
                $('.single-item .single-item-content .pet-name-label').hide();
            }

            $('.single-item .single-item-content .single-item-description h3').text(ITEM.NAME);
            $('.single-item .single-item-content .single-item-description p').text(ITEM.DESCRIPTION);
            $('.single-item .single-item-image').append($('<img>').attr('src', ITEM.SHOP_IMAGE_URL).attr(
                'alt',
                ITEM.NAME
            ));

            let CURRENCY = (
                ITEM.CURRENCY === 1 ? "C" : "U"
            );

            $('.single-item .single-item-content .single-item-buy-menu .item-price').text(parseFloat(ITEM.PRICE).format(
                2,
                0,
                ',',
                '.'
            ) + CURRENCY);
            $('.single-item .single-item-content .single-item-buy-menu .buy-btn').data('item-id', ITEM_ID);

            for (let ATTRIBUTE in ITEM.ATTRIBUTES) {
                if (ITEM.ATTRIBUTES.hasOwnProperty(ATTRIBUTE)) {
                    let ATTR_NAME = ATTRIBUTE,
                        ATTR_VAL = ITEM.ATTRIBUTES[ATTRIBUTE];
                    if (ATTR_VAL === 'NULL' || ATTR_VAL === null) continue;
                    $('.single-item .single-item-content .single-item-description ul').append($('<li>').text(ATTR_NAME +
                                                                                                             ": " +
                                                                                                             ATTR_VAL));
                }
            }
        });

        $('.amount-select .add-button').click(() => {
            const QTY = $('.amount-select .item-quantity');
            let TO_ADD = parseInt($(this).data('add')),
                CURRENT = parseInt(QTY.val());

            QTY.val(TO_ADD + CURRENT).change();
        });

        $('.amount-select .item-quantity').on('change', () => {
            let ITEM_ID = $('.single-item .single-item-content .single-item-buy-menu .buy-btn').data('item-id'),
                ITEM = shop.data[ITEM_ID],
                AMOUNT = parseInt($(this).val());
            let CURRENCY = (
                ITEM.CURRENCY === 1 ? "C" : "U"
            );
            $('.single-item .single-item-content .single-item-buy-menu .item-price').text((
                                                                                              ITEM.PRICE * AMOUNT
                                                                                          ).format(2, 0, ',', '.') +
                                                                                          CURRENCY);
        });


        $('.single-item .single-item-content .single-item-buy-menu .buy-btn').click(() => {
            let ITEM_ID = $(this).data('item-id');
            if (ITEM_ID !== undefined) {
                shop.buyItem(null, shop.data[ITEM_ID].ID, $('.amount-select .item-quantity').val());
            }
        });
    }

    /**
     * clearItemView Function
     * clears Single Item HTML
     *
     */
    static clearItemView() {
        $('.single-item .single-item-content .single-item-description h3').text("-- No Item selected --");
        $('.single-item .single-item-content .single-item-description p').text("Select an item in the list below.");
        $('.single-item .single-item-content .single-item-description ul li').remove();
        $('.single-item .single-item-image img').remove();
        $('.single-item .single-item-content .single-item-buy-menu .buy-btn').removeData('item-id');
        $('.single-item .single-item-content .single-item-buy-menu .item-price').text("");
        $('.amount-select .item-quantity').val(1);
    }

    /**
     * reload Function
     * refreshs shop data by ajax call
     *
     * @param data
     */
    static reload(data = null) {
        if (data === null) {
            let params = {
                "CATEGORY": shop.category
            };
            shop.sendRequest('reload', 'load', params);
        } else {
            shop.data = data;
            shop.render();
        }
    }


    /**
     * switchCategory
     * switches category
     *
     * @param category
     */
    static switchCategory(category = null) {
        if (category !== null) {
            shop.category = category;
            shop.reload();
        }
    }

    /**
     * buyItem
     * sends a request to buy an Item
     *
     * @param data
     * @param ITEM_ID
     * @param AMOUNT
     */
    static buyItem(data = null, ITEM_ID, AMOUNT) {
        if (data === null) {
            let params = {
                "CATEGORY": shop.category,
                "ITEM_ID": ITEM_ID,
                "AMOUNT": AMOUNT,
            };
            shop.sendRequest('buyItem', 'buy', params);
        } else {
            if (data.status === "success") {
                swal("Success!", data.message, "success");
                if (shop.category === 'ammo' || shop.category === 'drones' || shop.category === 'pet'
                    || shop.category === 'gear' || shop.category === 'protocols' || shop.category === 'pet_fuel'
                    || shop.category === 'generator' || shop.category === 'extra' || shop.category === 'notlisted') {
                    shop.sendPacket(shop.category);
                }
                shop.reload();
                // setTimeout(location.reload.bind(location), 1000);
            } else {
                swal("Error!", data.message, "error");
            }
        }
    }

    /**
     * sendPacket Function
     * sends packet to emulator
     *
     * @param action
     */
    static sendPacket(action) {
        if (shop.ws === undefined) {
            shop.ws = new WebSocket("ws://" + atob(shop.SERVER_IP) + ":666/cmslistener");
        }

        setTimeout(function () {
            if (shop.ws.readyState === 1) {
                shop.ws.send('user|' + action + '|' + shop.PLAYER_ID);
            } else {
                shop.sendPacket(action);
            }
        }, 5);
    }


    /**
     * sendRequest Function
     * sends request to ajax handler
     *
     * @param callback
     * @param action
     * @param params
     */
    static sendRequest(callback, action, params = "") {
        let data = {
            'handler': 'shop',
            'action': action,
            'params': params
        };

        $.ajax({
            type: "POST",
            url: './core/ajax/ajax.php',
            data: data,
            cache: false,
            xhrFields: {
                withCredentials: true
            },
            success: function (data, statusText) {
                data.status = statusText;
                shop[callback](data);
            },
            error: (errorData, _, errorThrown) => {
                if (data !== null) {
                    swal(
                        errorThrown + '!',
                        errorData.responseJSON.message || errorThrown,
                        'error'
                    );
                }
            },
        });
    }
}
