class equipment {
    constructor(USER_ID, PLAYER_ID, SERVER_IP) {
        equipment.USER_ID = USER_ID;
        equipment.PLAYER_ID = PLAYER_ID;
        equipment.SERVER_IP = SERVER_IP;
        equipment.config = 1;
        equipment.display = "ship";
        equipment.filter = null;
        equipment.filterID = '0';
        equipment.data = null;
        equipment.render();
    }

    /**
     * preRender Function
     * Clear HTML
     */
    static preRender() {
        $(".ship-inventory-content > div > div").first().empty();
        $("#config-" + equipment.config + " > div." + equipment.display + "-equipment-container  > ." + equipment.display + "-equipment-slots").empty();
        $("#config-" + equipment.config + " > ." + equipment.display + "-equipment-container > div > div").first().empty();
    }

    /**
     * render Function
     * renders the Equipment (displays everything)
     *
     * @param data
     */
    static render(data = null) {
        if (equipment.data === null && data === null) {
            equipment.sendRequest('render', 'load');
        } else {
            if (data !== null) {
                equipment.data = data;
            }

            equipment.preRender();
            let SLOTS = this.data.SHIP.SLOTS["CONFIG_" + equipment.config],
                DESIGNS = this.data.SHIP.DESIGNS,
                CURRENT_CONFIG = this.data.SHIP.CURRENT_CONFIGS["CONFIG_" + equipment.config],
                PET_CURRENT_CONFIG = this.data.PET.CURRENT_CONFIGS["CONFIG_" + equipment.config],
                CURRENT_DESIGN = this.data.SHIP.DESIGN_ID,
                ITEMS_UNUSED = equipment.data["CONFIG_" + equipment.config].ITEMS,
                DRONES = equipment.data.DRONES,
                ITEMS_COLLACTION = {
                    "drone": equipment.data["CONFIG_" + equipment.config]['ON_DRONE_ID_' + equipment.config],
                    "ship": equipment.data["CONFIG_" + equipment.config]['ON_CONFIG_' + equipment.config],
                    "pet": equipment.data["CONFIG_" + equipment.config]['ON_PET_' + equipment.config],
                };
            let PETS = this.data.PET.length !== 0
                ? this.data.PET.SLOTS["CONFIG_" + equipment.config]
                : [];

            //CREATE DESIGN SWITCH
            $('#design-select').empty();
            for (let DESIGN in DESIGNS) {
                let optionItem = $('<option>').attr('value', DESIGN).text(DESIGNS[DESIGN].NAME);

                if (CURRENT_DESIGN == DESIGN) {
                    $(optionItem).attr('selected', '');
                }
                $('#design-select').append(optionItem);
            }

            //CREATE EQUIPMENT SWITCH
            $('#filter-select').empty();
            let optionItem1 = $('<option>').attr('value', '0').text('DEFAULT'),
                optionItem2 = $('<option>').attr('value', '1').text('Ammo'),
                optionItem3 = $('<option>').attr('value', '2').text('Drone Info'),
                optionItem4 = $('<option>').attr('value', '3').text('Extras'),
                optionItem5 = $('<option>').attr('value', '4').text('Generators'),
                optionItem6 = $('<option>').attr('value', '5').text('Modules'),
                optionItem7 = $('<option>').attr('value', '6').text('Pet Related'),
                optionItem8 = $('<option>').attr('value', '7').text('Resources'),
                optionItem9 = $('<option>').attr('value', '8').text('Weapons');

            $('#filter-select').append(optionItem1);
            $('#filter-select').append(optionItem2);
            $('#filter-select').append(optionItem3);
            $('#filter-select').append(optionItem4);
            $('#filter-select').append(optionItem5);
            $('#filter-select').append(optionItem6);
            $('#filter-select').append(optionItem7);
            $('#filter-select').append(optionItem8);
            $('#filter-select').append(optionItem9);

            $('#filter-select')[0].selectedIndex = equipment.filterID;

            /**
             * SORTED_ITEMS
             * Containes all Items inuse sorted by ITEM.CATEGORY
             *
             * @type {{heavy: Array, laser: Array, extra: Array, generator: Array, drone_design: Array}}
             */
            let SORTED_ITEMS = {
                "heavy": [],
                "laser": [],
                "extra": [],
                "generator": [],
                "drone_design": [],
                "gear": [],
                "protocols": [],
            };

            for (let ITEM in ITEMS_COLLACTION[equipment.display]) {
                let item = ITEMS_COLLACTION[equipment.display][ITEM];
                SORTED_ITEMS[item.CATEGORY].push(item);
            }

            if (equipment.display === "ship") {
                //RENDER SHIP / PET SLOTS
                for (let SLOT_TYPE in SLOTS) {

                    let equipmentSlots = $("#config-" + equipment.config + " > div." + equipment.display + "-equipment-container > ." + equipment.display + "-equipment-slots." + SLOT_TYPE.toLowerCase() + "-slots");

                    //CREATE EQUIPMENT SLOTS
                    for (let i = 0; i < parseInt(SLOTS[SLOT_TYPE]); i++) {
                        let equipmentSlot = $('<div>'),
                            levelText = $('<span>'),
                            ITEM = null,
                            CURRENT_ITEMS = SORTED_ITEMS[SLOT_TYPE.toLowerCase()];

                        //CHECKS FOR EQUIPED ITEMS
                        if (i < CURRENT_ITEMS.length) {
                            ITEM = CURRENT_ITEMS[i];
                            if (ITEM.LVL >= 1 && ITEM.CATEGORY !== 'extra' && ITEM.ATTRIBUTES.SPEED === null) {
                                $(levelText).text(ITEM.LVL);
                            }
                            $(equipmentSlot)
                                .attr("data-type", ITEM.CATEGORY.toLowerCase())
                                .attr("data-item-id", ITEM.ID)
                                .attr("data-item-name", ITEM.ITEM_NAME.toLowerCase())
                                .addClass("equiped-item")
                                .append($(levelText));
                        } else {
                            $(equipmentSlot).addClass("equipment-slot");
                        }

                        //APPEND SLOT TO EQUIPMENT
                        $(equipmentSlots).append(equipmentSlot);
                    }
                }

                //RENDER SHIP INFO
                $('.player-ship-info #ship-damage').text(CURRENT_CONFIG.DAMAGE);
                $('.player-ship-info #ship-shield').text(CURRENT_CONFIG.SHIELD);
                $('.player-ship-info #ship-speed').text(CURRENT_CONFIG.SPEED);

                $("#ship-info-container").show(1000);
            } else if (equipment.display === "pet") {
                //RENDER SHIP / PET SLOTS
                for (let SLOT_TYPE in PETS) {

                    let equipmentSlots = $("#config-" + equipment.config + " > div.pet-equipment-container > .pet-equipment-slots." + SLOT_TYPE.toLowerCase() + "-slots");

                    //CREATE EQUIPMENT SLOTS
                    for (let i = 0; i < parseInt(PETS[SLOT_TYPE]); i++) {
                        let equipmentSlot = $('<div>'),
                            levelText = $('<span>'),
                            ITEM = null,
                            CURRENT_ITEMS = SORTED_ITEMS[SLOT_TYPE.toLowerCase()];

                        //CHECKS FOR EQUIPPED ITEMS
                        if (i < CURRENT_ITEMS.length) {
                            ITEM = CURRENT_ITEMS[i];
                            if (ITEM.LVL >= 1 && ITEM.CATEGORY !== 'extra') {
                                $(levelText).text(ITEM.LVL);
                            }
                            $(equipmentSlot)
                                .attr("data-type", ITEM.CATEGORY.toLowerCase())
                                .attr("data-item-id", ITEM.ID)
                                .attr("data-item-name", ITEM.ITEM_NAME.toLowerCase())
                                .addClass("equiped-item")
                                .append($(levelText));
                        } else {
                            $(equipmentSlot).addClass("equipment-slot");
                        }

                        //APPEND SLOT TO EQUIPMENT
                        $(equipmentSlots).append(equipmentSlot);
                    }
                }
                //RENDER SHIP INFO
                console.log(PET_CURRENT_CONFIG);
                $('.player-ship-info #ship-damage').text(PET_CURRENT_CONFIG.DAMAGE);
                $('.player-ship-info #ship-shield').text(PET_CURRENT_CONFIG.SHIELD);
                $('.player-ship-info #ship-speed').text(CURRENT_CONFIG.SPEED * 2);

                $("#ship-info-container").show(1000);
            } else if (equipment.display === "drone") {
                let SORTED_DRONES = [];

                //SORT DRONES BY DRONE_ID
                for (let DRONE in DRONES) {
                    let CURRENT_DRONE = DRONES[DRONE];
                    SORTED_DRONES[CURRENT_DRONE.ID] = CURRENT_DRONE;
                    SORTED_DRONES[CURRENT_DRONE.ID]["ITEMS"] = [];
                    SORTED_DRONES[CURRENT_DRONE.ID]["DRONE_DESIGN"] = null;
                }

                //ADD ITEMS TO EACH DRONE
                for (let ITEM_TYPE in SORTED_ITEMS) {
                    if (ITEM_TYPE === "laser" || ITEM_TYPE === "generator" || ITEM_TYPE === "drone_design") {
                        let CURRENT_ITEMS = SORTED_ITEMS[ITEM_TYPE];
                        for (let ITEM in CURRENT_ITEMS) {
                            ITEM = CURRENT_ITEMS[ITEM];
                            if (ITEM_TYPE === "drone_design") {
                                SORTED_DRONES[ITEM.DRONE_ID]["DRONE_DESIGN"] = ITEM;
                            } else {
                                if (SORTED_DRONES[ITEM.DRONE_ID] !== undefined) {
                                    SORTED_DRONES[ITEM.DRONE_ID]["ITEMS"].push(ITEM);
                                }
                            }
                        }
                    }
                }

                //RENDER DRONES
                for (let DRONE in SORTED_DRONES) {
                    DRONE = SORTED_DRONES[DRONE];
                    if (DRONE.LEVEL == 6) DRONE.LEVEL--;
                    //PREPARE HTML
                    let droneContainer = $("<div>").addClass("drone-container").attr("data-drone-id", DRONE.ID),
                        droneImageDiv = $('<div>').addClass("drone-image"),
                        droneImageUrl = "./resources/images/items/drone/" + DRONE.NAME.toLowerCase() + "-" + DRONE.LEVEL + "_top.png",
                        droneImage = $('<img>').attr("src", droneImageUrl),
                        droneULevel = $('<div>').addClass("drone-upgrade-level").text(DRONE.UPGRADE_LEVEL),
                        droneLevel = $('<div>').addClass("drone-level").text("Level: " + parseInt(DRONE.LEVEL)),
                        droneDesignName = $("<div>").addClass("drone-design-name").text("Design"),
                        droneEffect = $('<div>').addClass("drone-effect").text("Experience: " + DRONE.EXPERIENCE),
                        droneDamage = $('<div>').addClass("drone-damage").text("Damage: " + DRONE.DAMAGE),
                        droneEquipmentSlots = $('<div>').addClass("drone-equipment-slots laser-slots generator-slots").data('category', 'laser|generator'),
                        droneDesignSlots = $('<div>').addClass("drone-equipment-slots drone_design-slots").data('category', 'drone_design');

                    //PUT TOGETHER DRONE IMAGE
                    $(droneImageDiv).append(droneImage);
                    $(droneContainer).append(droneImageDiv);

                    //CREATE EQUIPMENT SLOTS
                    for (let slots = 0; slots < parseInt(DRONE.SLOTS); slots++) {
                        let equipmentSlot = $('<div>'),
                            levelText = $('<span>');

                        if (slots < DRONE.ITEMS.length) {
                            let ITEM = DRONE.ITEMS[slots];
                            if (ITEM.LVL >= 1 && ITEM.CATEGORY !== 'extra') {
                                $(levelText).text(ITEM.LVL);
                            }
                            $(equipmentSlot)
                                .attr("data-type", ITEM.CATEGORY)
                                .attr("data-drone-id", DRONE.ID)
                                .attr("data-item-id", ITEM.ID)
                                .attr("data-item-name", ITEM.ITEM_NAME.toLowerCase())
                                .addClass("equiped-item")
                                .append($(levelText));

                        } else {
                            $(equipmentSlot).addClass("equipment-slot");
                        }

                        //APPEND SLOT
                        $(droneEquipmentSlots).append(equipmentSlot);
                    }

                    //APPEND ALL SLOTS
                    $(droneContainer).append(droneEquipmentSlots);
                    var droneDetailContainer = $("<div>").addClass("drone-detail-container");
                        $(droneDetailContainer).append(droneLevel);
                        $(droneDetailContainer).append(droneDesignName);
                        $(droneDetailContainer).append(droneEffect);
                        $(droneDetailContainer).append(droneDamage);

                    $(droneContainer).append(droneDetailContainer);
                    $(droneContainer).append(droneULevel);

                    //CREATE DESIGN SLOT
                    let designSlot = $('<div>').html('c');
                    if (DRONE.DRONE_DESIGN !== null && DRONE.DRONE_DESIGN !== undefined) {
                        $(designSlot)
                            .attr("data-type", DRONE.DRONE_DESIGN.CATEGORY.toLowerCase())
                            .attr("data-drone-id", DRONE.ID)
                            .attr("data-item-id", DRONE.DRONE_DESIGN.ID)
                            .attr("data-item-name", DRONE.DRONE_DESIGN.ITEM_NAME.toLowerCase())
                            .addClass("equiped-item");
                    }
                    else {
                        $(designSlot).addClass("equipment-slot");
                    }

                    //APPEND DESIGN SLOT
                    $(droneDesignSlots).append(designSlot);
                    $(droneContainer).append(droneDesignSlots);

                    //APPEND DRONE TO HANGAR
                    $("#config-" + equipment.config + " > .drone-equipment-container > div > div").first().append(droneContainer);
                }

                $("#ship-info-container").hide(1000);
            }

            //CREATE INVENTORY (UNUSED ITEMS)
            for (let ITEM in ITEMS_UNUSED) {
                ITEM = ITEMS_UNUSED[ITEM];

                // filter select
                if (equipment.filter !== null) {
                    if (equipment.filter.indexOf(ITEM.CATEGORY) === -1) {
                        continue;
                    }
                }

                //SKIP ITEMS WHICH ARENT AVAILIBE ON DRONE/PET
                if (equipment.display === 'drone') {
                    if (ITEM.CATEGORY === 'drone_formation' || ITEM.ATTRIBUTES.SPEED !== null || ITEM.CATEGORY === 'heavy' || ITEM.CATEGORY === 'extra' ||
                        ITEM.CATEGORY === 'gear' || ITEM.CATEGORY === 'protocols') {
                        continue;
                    }
                }

                if (equipment.display === 'ship') {
                    if (ITEM.CATEGORY === 'drone_formation' || ITEM.CATEGORY === 'gear' || ITEM.CATEGORY === 'protocols' || ITEM.CATEGORY === 'drone_design') {
                        continue;
                    }
                }

                // items not available on pets
                if (equipment.display === 'pet') {
                    if (ITEM.CATEGORY === 'drone_formation' || ITEM.ATTRIBUTES.SPEED !== null || ITEM.CATEGORY === 'heavy' || ITEM.CATEGORY === 'extra' || ITEM.CATEGORY === 'drone_design') {
                        continue;
                    }
                }

                let inventoryContainer = $(".ship-inventory-content > div > div").first(),
                    itemDiv = $('<div>')
                        .addClass("inventory-item")
                        .attr("data-type", ITEM.CATEGORY.toLowerCase())
                        .attr("data-item-id", ITEM.ID)
                        .attr("data-item-credits", ITEM.SELLING_CREDITS)
                        .attr("data-item-name", ITEM.ITEM_NAME.toLocaleLowerCase());

                if (ITEM.LVL >= 1 && ITEM.CATEGORY !== 'extra' && ITEM.ATTRIBUTES.SPEED === null) {
                    $(itemDiv).append($('<span>').text(ITEM.LVL));
                }
                $(inventoryContainer).append(itemDiv);
            }

            //SHOW CURRENT DISPLAY
            $("#config-" + equipment.config + " > div").hide();
            $("#config-" + equipment.config + " > ." + equipment.display + "-equipment-container").show();
            $(".loading-screen").hide();

            equipment.activateEquipment();
        }
    }

    /**
     * switchDisplay
     * switches Config / Display and renders equipment
     *
     * @param config
     * @param display
     */
    static switchDisplay(config, display = null) {
        equipment.config = config;
        if (display !== null) {
            equipment.display = display;
        }

        $(".loading-screen").show();

        let Tabs = $("#config-tabs-content > ul.nav.nav-tabs > li").removeClass("active");
        $(".config-tab-content > div").removeClass("active");
        $("#config-" + equipment.config).addClass("active");

        if (equipment.config === 1) {
            $(Tabs[0]).addClass("active");
        } else if (equipment.config === 2) {
            $(Tabs[1]).addClass("active");
        }

        //SET GLOW EFFECT
        $('#hangar-info-container .player-ship-view .ship-box, #hangar-info-container .player-ship-view .drone-box, #hangar-info-container .player-ship-view .pet-box').removeClass('active');
        $('#hangar-info-container .player-ship-view .' + equipment.display + '-box').addClass('active');

        //SWITCH TABS
        $(Tabs[0]).find("a").attr("onclick", "equipment.switchDisplay(1,'" + equipment.display + "')");
        $(Tabs[1]).find("a").attr("onclick", "equipment.switchDisplay(2, '" + equipment.display + "')");


        //RENDER EQUIPMENT
        equipment.render();
    }


    /**
     * activateEquipment Function
     * registers all needed Event-Listners for Inventory like
     * Drag & Drop, Click, Design Switch, Hangar Switch
     *
     */
    static activateEquipment() {
        let selected = [];

        //MAKE INVETORY ITEMS DRAGABLE
        $(".inventory-item, .equiped-item").draggable({
            revert: "invalid",
            containment: '#hangar-equipment-container',
            scroll: false,
            helper: "clone",
            appendTo: '#hangar-equipment-container',
            zIndex: 100,
            start: function (event, ui) {
                if ($(this).hasClass("ui-selected")) {
                    selected = $(".ui-selected:not(.ui-draggable-dragging)").each(function () {
                    });
                } else {
                    selected = [];
                    $(".ship-inventory-content > .inventory-item").removeClass("ui-selected");
                }
            }
        })
            //RESGISTER CLICK EVENTS
            .click(function (event) {

                let moveToIventory = true;
                if ($(this).hasClass('inventory-item')) {
                    moveToIventory = false;
                    $('.equiped-item').removeClass("ui-selected");
                } else {
                    $('.inventory-item').removeClass("ui-selected");
                }

                //ON CONTROL-CLICK MOVE ALL SELECTED ITEMS
                if (event.metaKey || event.ctrlKey) {
                    //GET SELECTED ITEMS
                    selected = $(".ui-selected:not(.ui-draggable-dragging)").each(function () {
                    });
                    let ITEMS = [],
                        ITEM_CATEGORY = null,
                        ITEM = null,
                        ITEM_NAME = null,
                        ITEM_ID = null;

                    if (selected.length > 1) {
                        for (let i = 0; i < selected.length; i++) {
                            ITEM_NAME = $(selected[i]).data("item-name");
                            ITEM_CATEGORY = $(selected[i]).data("type");
                            ITEM_ID = $(selected[i]).data("item-id");
                            ITEM = {
                                'NAME': ITEM_NAME,
                                'CATEGORY': ITEM_CATEGORY,
                                'ID': ITEM_ID
                            };
                            ITEMS.push(ITEM);
                        }
                    } else {
                        ITEM_NAME = $(this).data("item-name");
                        ITEM_CATEGORY = $(this).data("type");
                        ITEM_ID = $(this).data("item-id");
                        ITEM = {
                            'NAME': ITEM_NAME,
                            'CATEGORY': ITEM_CATEGORY,
                            'ID': ITEM_ID
                        };
                        ITEMS.push(ITEM);
                    }

                    if (moveToIventory) {
                        equipment.moveItemsTo(null, ITEMS);
                    } else {
                        equipment.moveItemsTo(null, ITEMS, 'equip');
                    }

                }
                //ON SHIFT-CLICK SELECT ALL SAME ITEM
                else if (event.shiftKey) {
                    $(".ui-selected").removeClass("ui-selected");
                    if (!moveToIventory) {
                        $(".ship-inventory-content .inventory-item[data-item-name=" + $(this).data("item-name") + "]").addClass("ui-selected");
                    } else {
                        console.log("MoveToInventory");
                        $("." + equipment.display + "-equipment-container .equiped-item[data-item-name=" + $(this).data("item-name") + "]").addClass("ui-selected");
                    }
                }
                //ON NORMAL CLICK UNSELECT ALL
                else {
                    if (!moveToIventory) {
                        $(".ship-inventory-content .inventory-item").removeClass("ui-selected");
                    } else {
                        $(".equiped-item").removeClass("ui-selected");
                    }
                }
            });

        //REGISTER DROPZONES FOR IVENTORY ITEMS
        $(".ship-equipment-slots, .drone-equipment-slots, .pet-equipment-slots").droppable({
            accept: ".inventory-item",
            drop: function (event, ui) {
                let categories = $(this).data('category').split('|');

                if (categories.includes($(ui.draggable).data('type'))) {
                    //GET SELECTED ITEMS
                    selected = $('.ui-selected:not(.ui-draggable-dragging)[data-type="' + $(ui.draggable).data('type') + '"]').each(function () {
                    });
                    let ITEMS = [],
                        ITEM_CATEGORY = null,
                        ITEM = null,
                        ITEM_NAME = null,
                        ITEM_ID = null,
                        DRONE_ID = null,
                        PET_ID = null;

                    if (selected.length > 1) {
                        for (let i = 0; i < selected.length; i++) {
                            ITEM_NAME = $(selected[i]).data("item-name");
                            ITEM_CATEGORY = $(selected[i]).data("type");
                            ITEM_ID = $(selected[i]).data("item-id");
                            PET_ID = $(this).parent().data("pet-id");
                            ITEM = {
                                'NAME': ITEM_NAME,
                                'CATEGORY': ITEM_CATEGORY,
                                'ID': ITEM_ID
                            };

                            if (PET_ID !== undefined) {
                                ITEM.PET_ID = PET_ID;
                            }

                            ITEMS.push(ITEM);
                        }
                    } else {
                        ITEM_NAME = $(ui.draggable).data("item-name");
                        ITEM_CATEGORY = $(ui.draggable).data("type");
                        ITEM_ID = $(ui.draggable).data("item-id");
                        PET_ID = $(this).parent().data("pet-id");
                        ITEM = {
                            'NAME': ITEM_NAME,
                            'CATEGORY': ITEM_CATEGORY,
                            'ID': ITEM_ID
                        };

                        if (PET_ID !== undefined) {
                            ITEM.PET_ID = PET_ID;
                        }

                        ITEMS.push(ITEM);
                    }

                    if (selected.length > 1) {
                        for (let i = 0; i < selected.length; i++) {
                            ITEM_NAME = $(selected[i]).data("item-name");
                            ITEM_CATEGORY = $(selected[i]).data("type");
                            ITEM_ID = $(selected[i]).data("item-id");
                            DRONE_ID = $(this).parent().data("drone-id");
                            ITEM = {
                                'NAME': ITEM_NAME,
                                'CATEGORY': ITEM_CATEGORY,
                                'ID': ITEM_ID
                            };

                            if (DRONE_ID !== undefined) {
                                ITEM.DRONE_ID = DRONE_ID;
                            }

                            ITEMS.push(ITEM);
                        }
                    } else {
                        ITEM_NAME = $(ui.draggable).data("item-name");
                        ITEM_CATEGORY = $(ui.draggable).data("type");
                        ITEM_ID = $(ui.draggable).data("item-id");
                        DRONE_ID = $(this).parent().data("drone-id");
                        ITEM = {
                            'NAME': ITEM_NAME,
                            'CATEGORY': ITEM_CATEGORY,
                            'ID': ITEM_ID
                        };

                        if (DRONE_ID !== undefined) {
                            ITEM.DRONE_ID = DRONE_ID;
                        }

                        ITEMS.push(ITEM);
                    }

                    equipment.moveItemsTo(null, ITEMS, 'equip');
                }
            }
        });

        $(".ship-inventory-container").droppable({
            accept: ".equiped-item",
            drop: function (event, ui) {

                //GET SELECTED ITEMS
                selected = $(".ui-selected:not(.ui-draggable-dragging)").each(function () {
                });
                let ITEMS = [],
                    ITEM_CATEGORY = null,
                    ITEM = null,
                    ITEM_NAME = null,
                    ITEM_ID = null,
                    DRONE_ID = null,
                    PET_ID = null;

                if (selected.length > 1) {
                    for (let i = 0; i < selected.length; i++) {
                        ITEM_NAME = $(selected[i]).data("item-name");
                        ITEM_CATEGORY = $(selected[i]).data("type");
                        ITEM_ID = $(selected[i]).data("item-id");
                        ITEM = {
                            'NAME': ITEM_NAME,
                            'CATEGORY': ITEM_CATEGORY,
                            'ID': ITEM_ID
                        };
                        ITEMS.push(ITEM);
                    }
                } else {
                    ITEM_NAME = $(ui.draggable).data("item-name");
                    ITEM_CATEGORY = $(ui.draggable).data("type");
                    ITEM_ID = $(ui.draggable).data("item-id");
                    DRONE_ID = $(ui.draggable).parent().data("drone-id");
                    ITEM = {
                        'NAME': ITEM_NAME,
                        'CATEGORY': ITEM_CATEGORY,
                        'ID': ITEM_ID
                    };
                    ITEMS.push(ITEM);
                }

                if (selected.length > 1) {
                    for (let i = 0; i < selected.length; i++) {
                        ITEM_NAME = $(selected[i]).data("item-name");
                        ITEM_CATEGORY = $(selected[i]).data("type");
                        ITEM_ID = $(selected[i]).data("item-id");
                        ITEM = {
                            'NAME': ITEM_NAME,
                            'CATEGORY': ITEM_CATEGORY,
                            'ID': ITEM_ID
                        };
                        ITEMS.push(ITEM);
                    }
                } else {
                    ITEM_NAME = $(ui.draggable).data("item-name");
                    ITEM_CATEGORY = $(ui.draggable).data("type");
                    ITEM_ID = $(ui.draggable).data("item-id");
                    PET_ID = $(ui.draggable).parent().data("pet-id");
                    ITEM = {
                        'NAME': ITEM_NAME,
                        'CATEGORY': ITEM_CATEGORY,
                        'ID': ITEM_ID
                    };
                    ITEMS.push(ITEM);
                }

                equipment.moveItemsTo(null, ITEMS);
            }
        });

        //MAKE INVENTROY TIEMS SELECTABLE
        $(".ship-inventory-content").selectable({ filter: '.inventory-item' });

        //ACTIVATE HANGAR SWITCH
        $('.hangar-slot').off('click').click(function (event) {
            let hangarID = $(this).data('hangar-id');

            if (hangarID !== undefined && !$(this).hasClass('active')) {
                equipment.switchHangar(null, hangarID);
            }
        });

        //ACTIVATE DESIGN SWITCH
        $('#design-select').off('change').change(function (event) {
            let designID = $(this).val();

            if (designID !== undefined && !$(this).selected) {
                equipment.switchDesign(null, designID);
            }
        });

        //ACTIVATE FILTER SWITCH
        $('#filter-select').off('change').change(function (event) {
            let filterID = $(this).val();

            if (filterID !== undefined && !$(this).selected) {
                equipment.switchFilter(filterID);
            }
        });

        //ITEM MENU
        $('.inventory-item').contextmenu(function (event) {
            let selected = $(".ui-selected:not(.ui-draggable-dragging)").each(function () {
            });

            if (selected.length > 1) {
                let ITEMS = [],
                    ITEM_CATEGORY = null,
                    ITEM = null,
                    ITEM_NAME = null,
                    ITEM_ID = null,
                    SELL_VALUE = 0;

                for (let i = 0; i < selected.length; i++) {
                    ITEM_NAME = $(selected[i]).data("item-name");
                    ITEM_CATEGORY = $(selected[i]).data("type");
                    ITEM_ID = $(selected[i]).data("item-id");
                    SELL_VALUE += parseInt($(selected[i]).data('item-credits'));
                    ITEM = {
                        'NAME': ITEM_NAME,
                        'CATEGORY': ITEM_CATEGORY,
                        'ID': ITEM_ID
                    };
                    ITEMS.push(ITEM);
                }

                swal('Sell item?', 'For selling ' + selected.length + ' of  ' + ITEM_NAME + ' you will get ' + SELL_VALUE + ' Credits.', {
                    buttons: {
                        sell: {
                            text: "Sell Item"
                        },
                        cancel: true
                    }
                }).then((value) => {
                    switch (value) {
                        case "sell":
                            equipment.sellItems(null, ITEMS);
                            break;
                    }
                });
            } else {
                event.preventDefault();
                let itemID = parseInt($(this).data('item-id')),
                    itemName = $(this).data('item-name'),
                    itemSell = parseInt($(this).data('item-credits'));
                swal('Sell item?', 'For selling ' + itemName + ' you will get ' + itemSell + ' Credits.', {
                    buttons: {
                        sell: {
                            text: "Sell Item"
                        },
                        cancel: true
                    }
                }).then((value) => {
                    switch (value) {
                        case "sell":
                            equipment.sellItem(null, itemID);
                            break;
                    }
                });
            }
        });

        //DRONE MENU
        $('.drone-container').contextmenu(function (event) {
            event.preventDefault();
            let droneID = parseInt($(this).data('drone-id'));
            swal('What do you want to do?', {
                buttons: {
                    sell: {
                        text: "Sell Drone"
                    },
                    repair: {
                        text: "Repair Drone"
                    },
                    cancel: true
                }
            }).then((value) => {
                switch (value) {
                    case "sell":
                        equipment.sellDrone(null, droneID);
                        break;
                    case "repair":
                        swal("Error!", "Repair Function not in yet!", "error");
                        break;
                }
            });
        });

        //SHIP MENU
        $('.ship-equipment-box').click(function (event) {
            swal('What do you want to do?', {
                buttons: {
                    sell: {
                        text: "Sell Ship"
                    },
                    cancel: true
                }
            }).then((value) => {
                switch (value) {
                    case "sell":
                        equipment.sellShip(null, 0);
                        break;
                }
            });
        });

        //PET MENU
        $('.pet-equipment-box').click(function (event) {
            swal('What do you want to do?', {
                buttons: {
                    sell: {
                        text: "Sell Pet"
                    },
                    change: {
                        text: "Change Name"
                    },
                    cancel: true
                }
            }).then((value) => {
                switch (value) {
                    case "sell":
                        equipment.sellPet(null);
                        break;
                    case "change":
                        equipment.changeName(null);
                        break;
                }
            });
        });
    }

    /**
     * sellItem Function
     * sends request to sellDrone
     *
     * @param data
     * @param itemID
     */
    static sellItem(data = null, itemID) {
        if (data !== null) {
            if (!data.error) {
                swal('Success!', 'Sucessfully sold your Item!', 'success')
                equipment.reload();
            } else {
                swal('Error!', data.error_msg, 'error');
                equipment.reload();
            }
        } else {
            $(".loading-screen").show();
            let params = {
                'ITEM_ID': itemID,
            };
            equipment.sendRequest('sellItem', 'sell_item', params);
        }
    }

    /**
     * sellItems Function
     * sends request to sellItems
     *
     * @param data
     * @param items
     */
    static sellItems(data = null, items) {
        if (data !== null) {
            if (!data.error) {
                swal('Success!', 'Sucessfully sold your Item!', 'success')
                equipment.reload();
            } else {
                swal('Error!', data.error_msg, 'error');
                equipment.reload();
            }
        } else {
            $(".loading-screen").show();
            let params = {
                'ITEMS': items,
            };
            equipment.sendRequest('sellItems', 'sell_items', params);
        }
    }

    /**
     * sellDrone Function
     * sends request to sellDrone
     *
     * @param data
     * @param droneID
     */
    static sellDrone(data = null, droneID) {
        if (data !== null) {
            if (!data.error) {
                swal('Success!', 'Sucessfully sold your drone!', 'success')
                equipment.reload();
            } else {
                swal('Error!', data.error_msg, 'error');
            }
        } else {
            $(".loading-screen").show();
            let params = {
                'DRONE_ID': droneID,
            };
            equipment.sendRequest('sellDrone', 'sell_drone', params);
        }
    }

    static sellPet(data = null) {
        if (data !== null) {
            if (!data.error) {
                swal('Success!', 'Successfully sold your pet!', 'success')
                equipment.reload();
            } else {
                swal('Error', data.error_msg, 'error');
            }
        } else {
            $(".loading-screen").show();
            equipment.sendRequest('sellPet', 'sell_pet');
        }
    }

    static changeName(data = null, newName) {
        if (data == null && newName !== undefined) {
            if (newName.length > 15) {
                swal('Name too long', 'Please reduce the characters in your P.E.T name', 'error');
                return;
            }
            $(".loading-screen").show();

            let params = {
                'NEW_PET_NAME': newName,
            };
            equipment.sendRequest('changeName', 'change_pet_name', params);
        }
        else {
            if (data.error) {
                swal('Error', data.error_msg, 'error');
            }
            else {
                $('#pet-name').text(data['new_name']);
                swal('Success!', 'Pet name changed successfully!', 'success');
                equipment.reload();
            }
        }
    }

    /**
     * switchDesign Function
     * sends request to switch Design
     *
     * @param data
     * @param designID
     */
    static switchDesign(data = null, designID) {
        if (data !== null) {
            if (!data.error) {
                //SET NEW SHIPIMAGE
                let shipIMAGE = data.NEW_SHIP;
                $('.player-ship-view > .ship-box > img').attr('src', shipIMAGE);
                $('.hangar-slot[data-hangar-id="' + data.HANGAR_ID + '"] > img').attr('src', shipIMAGE);
                $('.ship-equipment-box > img').attr('src', shipIMAGE);
                equipment.reload();
            } else {
                swal('Error!', data.error_msg, 'error');
            }
        } else {
            $(".loading-screen").show();
            let params = {
                'TO': designID,
            };
            equipment.sendRequest('switchDesign', 'switch_design', params);
        }
    }


    /**
     * switchHangar Function
     * sends request to switch Hangar
     *
     * @param data
     * @param hangarID
     */
    static switchHangar(data = null, hangarID) {
        if (data !== null) {
            if (!data.error) {

                //SET NEW SHIPIMAGE
                let shipIMAGE = data.NEW_SHIP;
                $('.player-ship-view > .ship-box > img').attr('src', shipIMAGE);
                $('.hangar-slot').removeClass('active');
                $('.hangar-slot[data-hangar-id="' + data.HANGAR_ID + '"]').addClass('active');

                equipment.reload();
                location.reload();
            } else {
                swal('Error!', data.error_msg, 'error');
            }
        } else {
            $(".loading-screen").show();
            let params = {
                'HANGAR_ID': hangarID,
            };
            equipment.sendRequest('switchHangar', 'switch_hangar', params);
        }
    }

    /**
     * switchFilter Function
     * re-renders the page while applying a filter
     *
     * @param filterID
     */
    static switchFilter(filterID) {
        let filter = '';

        switch (filterID) {
            case "0":
                // ALL
                filter = null;
                break;
            case "1":
                // Ammo
                filter = ['ammo'];
                break;
            case "2":
                // Drone Related
                filter = ['drone_design', 'drone_formation'];
                break;
            case "3":
                // Extras
                filter = ['extra'];
                break;
            case "4":
                // Generators
                filter = ['generator'];
                break;
            case "5":
                // Modules
                filter = ['module'];
                break;
            case "6":
                // PET
                filter = ['gear', 'protocols', 'pet_fuel'];
                break;
            case "7":
                // Resources
                filter = ['pet_fuel'];
                break;
            case "8":
                // Weapons
                filter = ['laser', 'heavy'];
                break;

            default:
                filter = null;
                break;
        }

        equipment.filter = filter;
        equipment.filterID = filterID;
        equipment.reload();
    }

    /**
     * moveItemsTo Function
     * sends request to move all ITEMS (array of ITEMS) to selected destination
     *
     * @param data
     * @param ITEMS
     * @param TO
     */
    static moveItemsTo(data = null, ITEMS, TO = 'inv') {
        if (data !== null) {
            if (!data.error) {
                equipment.reload();
            } else {
                swal('Error!', data.error_msg, 'error');
                equipment.reload();
            }
        } else {
            $(".loading-screen").show();
            let params = {
                'ITEMS': ITEMS,
                'CONFIG': equipment.config,
                'DISPLAY': equipment.display,
                'TO': TO,
            };
            equipment.sendRequest('moveItemsTo', 'move_items', params);
        }
    }

    /**
     * reload Function
     * refreshs equipment data by ajax call
     *
     * @param data
     */
    static reload(data = null) {
        if (data === null) {
            $(".loading-screen").show();
            equipment.sendRequest('reload', 'load');
        } else {
            equipment.data = data;
            equipment.render();
        }
    }

    /**
     * sendPacket Function
     * sends packet to emulator
     *
     * @param action
     */
    static sendPacket() {
        if (equipment.ws === undefined) {
            equipment.ws = new WebSocket("ws://" + atob(equipment.SERVER_IP) + ":666/cmslistener");

            equipment.onmessage = function(e) {
                console.log('Message:', e.data);
            };

            equipment.onclose = function(e) {
                console.log('Socket is closed. Reconnect will be attempted in 1 second.', e.reason);
                setTimeout(function() {
                    connect();
                }, 1000);
            };

            equipment.onerror = function(err) {
                console.error('Socket encountered error: ', err.message, 'Closing socket');
                equipment.close();
            };
        }

        setTimeout(function () {
            if (equipment.ws.readyState === 1) {
                equipment.ws.send('user|eq|' + equipment.PLAYER_ID);
            } else {
                equipment.sendPacket();
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
        equipment.sendPacket();

        let data = {
            'action': action,
            'handler': 'equipment',
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
            success: function (resultData) {
                equipment[callback](resultData);
            }
        });
    }
}
