class equipment {
    constructor(USER_ID, PLAYER_ID, SERVER_IP){
		equipment.USER_ID = USER_ID;
		equipment.PLAYER_ID = PLAYER_ID;
		equipment.SERVER_IP = SERVER_IP;
        equipment.config = 1;
        equipment.display = "ship";
        equipment.data = null;
        equipment.render();
    }

    /**
     * preRender Function
     * Clear HTML
     */
    static preRender(){
        $(".ship-inventory-content > div > div").first().empty();
        $("#config-"+equipment.config+" > div."+equipment.display+"-equipment-container  > ."+equipment.display+"-equipment-slots").empty();
        $("#config-"+equipment.config+" > .drone-equipment-container > div > div").first().empty();
    }

    /**
     * render Function
     * renders the Equipment (displays everything)
     *
     * @param data
     */
    static render(data = null){
        if(equipment.data === null && data === null){
            equipment.sendRequest('render','load');
        }else{
            if(data !== null){
                equipment.data = data;
            }

            equipment.preRender();
            let SLOTS = this.data.SHIP.SLOTS["CONFIG_"+equipment.config],
                DESIGNS = this.data.SHIP.DESIGNS,
                CURRENT_CONFIG = this.data.SHIP.CURRENT_CONFIGS["CONFIG_"+equipment.config],
                CURRENT_DESIGN = this.data.SHIP.DESIGN_ID,
                ITEMS_UNUSED = equipment.data["CONFIG_"+equipment.config].ITEMS,
                DRONES =  equipment.data.DRONES,
                ITEMS_COLLACTION = {
                    "drone": equipment.data["CONFIG_"+equipment.config]['ON_DRONE_ID_'+equipment.config],
                    "ship": equipment.data["CONFIG_"+equipment.config]['ON_CONFIG_'+equipment.config],
                    "pet": equipment.data["CONFIG_"+equipment.config]['ON_PET_'+equipment.config],
                };

            //CREATE DESIGN SWITCH
            $('#design-select').empty();
            for(let DESIGN in DESIGNS){
                let optionItem = $('<option>').attr('value',DESIGN).text(DESIGNS[DESIGN].NAME);

                if(CURRENT_DESIGN == DESIGN){
                    $(optionItem).attr('selected','');
                }
                $('#design-select').append(optionItem);
            }

            //RENDER SHIP INFO
            $('.player-ship-info #ship-damage').text(CURRENT_CONFIG.DAMAGE);
            $('.player-ship-info #ship-shield').text(CURRENT_CONFIG.SHIELD);
            $('.player-ship-info #ship-speed').text(CURRENT_CONFIG.SPEED);

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
           };

            for(let ITEM in ITEMS_COLLACTION[equipment.display]) {
                let item = ITEMS_COLLACTION[equipment.display][ITEM];
                SORTED_ITEMS[item.CATEGORY].push(item);
            }

            if(equipment.display === "ship" || equipment.display === "pet"){
                //RENDER SHIP / PET SLOTS
                for(let SLOT_TYPE in SLOTS) {

                    let equipmentSlots = $("#config-"+equipment.config+" > div."+equipment.display+"-equipment-container > ."+equipment.display+"-equipment-slots."+SLOT_TYPE.toLowerCase()+"-slots");

                    //CREATE EQUIPMENT SLOTS
                    for(let i = 0; i < parseInt(SLOTS[SLOT_TYPE]);i++){
                        let equipmentSlot = $('<div>'),
                            levelText = $('<span>'),
                            ITEM = null,
                            CURRENT_ITEMS = SORTED_ITEMS[SLOT_TYPE.toLowerCase()];

                        //CHECKS FOR EQUIPED ITEMS
                        if(i < CURRENT_ITEMS.length){
                            ITEM = CURRENT_ITEMS[i];
                            if(ITEM.LVL > 1){
                                $(levelText).text(ITEM.LVL);
                            }
                            $(equipmentSlot)
                                .attr("data-type",ITEM.CATEGORY.toLowerCase())
                                .attr("data-item-id",ITEM.ID)
                                .attr("data-item-name",ITEM.ITEM_NAME.toLowerCase())
                                .addClass("equiped-item")
                                .append($(levelText));
                        }else {
                            $(equipmentSlot).addClass("equipment-slot");
                        }

                        //APPEND SLOT TO EQUIPMENT
                        $(equipmentSlots).append(equipmentSlot);
                    }
                }
            }else if(equipment.display === "drone"){
                let SORTED_DRONES = [];

                //SORT DRONES BY DRONE_ID
                for(let DRONE in DRONES){
                    let CURRENT_DRONE = DRONES[DRONE];
                    SORTED_DRONES[CURRENT_DRONE.ID] = CURRENT_DRONE;
                    SORTED_DRONES[CURRENT_DRONE.ID]["ITEMS"] = [];
                    SORTED_DRONES[CURRENT_DRONE.ID]["DRONE_DESIGN"] = null;
                }

                //ADD ITEMS TO EACH DRONE
                for(let ITEM_TYPE in SORTED_ITEMS){
                    if(ITEM_TYPE === "laser" || ITEM_TYPE === "generator" || ITEM_TYPE === "drone_design"){
                        let CURRENT_ITEMS = SORTED_ITEMS[ITEM_TYPE];
                        for(let ITEM in CURRENT_ITEMS) {
                            ITEM = CURRENT_ITEMS[ITEM];
                            if(ITEM_TYPE === "drone_design"){
                                SORTED_DRONES[ITEM.DRONE_ID]["DRONE_DESIGN"] = ITEM;
                            }else{
                                if(SORTED_DRONES[ITEM.DRONE_ID] !== undefined){
                                    SORTED_DRONES[ITEM.DRONE_ID]["ITEMS"].push(ITEM);
                                }
                            }
                        }
                    }
                }

                //RENDER DRONES
                for (let DRONE in SORTED_DRONES){
                    DRONE = SORTED_DRONES[DRONE];
                    if(DRONE.LEVEL == 6) DRONE.LEVEL--;
                    //PREPARE HTML
                    let droneContainer = $("<div>").addClass("drone-container").attr("data-drone-id",DRONE.ID),
                        droneImageDiv = $('<div>').addClass("drone-image"),
                        droneImageUrl = "./do_img/global/items/drone/"+DRONE.NAME.toLowerCase()+"-"+DRONE.LEVEL+"_top.png",
                        droneImage = $('<img>').attr("src",droneImageUrl),
                        droneEquipmentSlots = $('<div>').addClass("drone-equipment-slots laser-slots generator-slots").data('category','laser|generator'),
                        droneDesignSlots = $('<div>').addClass("drone-equipment-slots drone_design-slots").data('category','drone_design');

                    //PUT TOGETHER DRONE IMAGE
                    $(droneImageDiv).append(droneImage);
                    $(droneContainer).append(droneImageDiv);

                    //CREATE EQUIPMENT SLOTS
                    for(let slots = 0; slots < parseInt(DRONE.SLOTS); slots++){
                        let equipmentSlot = $('<div>'),
                            levelText = $('<span>');

                        if(slots < DRONE.ITEMS.length){
                            let ITEM = DRONE.ITEMS[slots];
                            if(ITEM.LVL > 1){
                                $(levelText).text(ITEM.LVL);
                            }
                            $(equipmentSlot)
                                .attr("data-type",ITEM.CATEGORY)
                                .attr("data-drone-id",DRONE.ID)
                                .attr("data-item-id",ITEM.ID)
                                .attr("data-item-name",ITEM.ITEM_NAME.toLowerCase())
                                .addClass("equiped-item")
                                .append($(levelText));

                        }else {
                            $(equipmentSlot).addClass("equipment-slot");
                        }

                        //APPEND SLOT
                        $(droneEquipmentSlots).append(equipmentSlot);
                    }

                    //APPEND ALL SLOTS
                    $(droneContainer).append(droneEquipmentSlots);

                    //CREATE DESIGN SLOT
                    let designSlot = $('<div>');
                    if(DRONE.DRONE_DESIGN !== null && DRONE.DRONE_DESIGN !== undefined){
                        $(designSlot)
                            .attr("data-type",DRONE.DRONE_DESIGN.CATEGORY.toLowerCase())
                            .attr("data-drone-id",DRONE.ID)
                            .attr("data-item-id",DRONE.DRONE_DESIGN.ID)
                            .attr("data-item-name",DRONE.DRONE_DESIGN.ITEM_NAME.toLowerCase())
                            .addClass("equiped-item");
                    }
                    else {
                        $(designSlot).addClass("equipment-slot");
                    }

                    //APPEND DESIGN SLOT
                    $(droneDesignSlots).append(designSlot);
                    $(droneContainer).append(droneDesignSlots);

                    //APPEND DRONE TO HANGAR
                    $("#config-"+equipment.config+" > .drone-equipment-container > div > div").first().append(droneContainer);
                }
            }

            //CREATE INVENTORY (UNUSED ITEMS)
            for(let ITEM in ITEMS_UNUSED) {
                ITEM = ITEMS_UNUSED[ITEM];

                //SKIP ITEMS WHICH ARENT AVAILIBE ON DRONE
                if(equipment.display === 'drone'){
                    if(ITEM.ATTRIBUTES.SPEED !== null || ITEM.CATEGORY === 'heavy' || ITEM.CATEGORY === 'extra'){
                        continue;
                    }
                }

                let inventoryContainer = $(".ship-inventory-content > div > div").first(),
                    itemDiv = $('<div>')
                                    .addClass("inventory-item")
                                    .attr("data-type",ITEM.CATEGORY.toLowerCase())
                                    .attr("data-item-id",ITEM.ID)
                                    .attr("data-item-credits",ITEM.SELLING_CREDITS)
                                    .attr("data-item-name",ITEM.ITEM_NAME.toLocaleLowerCase());

                if(ITEM.LVL > 1){
                    $(itemDiv).append($('<span>').text(ITEM.LVL));
                }
                $(inventoryContainer).append(itemDiv);
            }

            //SHOW CURRENT DISPLAY
            $("#config-"+equipment.config+" > div").hide();
            $("#config-"+equipment.config+" > ."+equipment.display+"-equipment-container").show();
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
    static switchDisplay(config, display = null){
        equipment.config = config;
        if(display !== null){
            equipment.display = display;
        }

        $(".loading-screen").show();

        let Tabs = $("#config-tabs-content > ul.nav.nav-tabs > li").removeClass("active");
        $(".config-tab-content > div").removeClass("active");
        $("#config-"+equipment.config).addClass("active");

        if(equipment.config === 1){
            $(Tabs[0]).addClass("active");
        }else if(equipment.config === 2){
            $(Tabs[1]).addClass("active");
        }

        //SET GLOW EFFECT
        $('#hangar-info-container .player-ship-view .ship-box, #hangar-info-container .player-ship-view .drone-box, #hangar-info-container .player-ship-view .pet-box').removeClass('active');
        $('#hangar-info-container .player-ship-view .'+equipment.display+'-box').addClass('active');

        //SWITCH TABS
        $(Tabs[0]).find("a").attr("onclick","equipment.switchDisplay(1,'"+equipment.display+"')");
        $(Tabs[1]).find("a").attr("onclick","equipment.switchDisplay(2, '"+equipment.display+"')");

        //RENDER EQUIPMENT
        equipment.render();
    }


    /**
     * activateEquipment Function
     * registers all needed Event-Listners for Inventory like
     * Drag & Drop, Click, Design Switch, Hangar Switch
     *
     */
    static activateEquipment(){
        let selected = [];

        //MAKE INVETORY ITEMS DRAGABLE
        $( ".inventory-item, .equiped-item").draggable({
            revert: "invalid",
            containment: '#hangar-equipment-container',
            scroll: false,
            helper:"clone",
            appendTo: '#hangar-equipment-container',
            zIndex: 100,
            start: function (event, ui) {
                if ($(this).hasClass("ui-selected")) {
                    selected = $(".ui-selected:not(.ui-draggable-dragging)").each(function() {});
                } else {
                    selected = [];
                    $( ".ship-inventory-content > .inventory-item" ).removeClass("ui-selected");
                }
            }
        })
        //RESGISTER CLICK EVENTS
        .click(function (event) {

            let moveToIventory = true;
            if($(this).hasClass('inventory-item')){
                moveToIventory = false;
                $('.equiped-item').removeClass("ui-selected");
            }else{
                $('.inventory-item').removeClass("ui-selected");
            }

            //ON CONTROL-CLICK MOVE ALL SELECTED ITEMS
            if (event.metaKey || event.ctrlKey) {
                //GET SELECTED ITEMS
                selected = $(".ui-selected:not(.ui-draggable-dragging)").each(function() {});
                let ITEMS = [],
                    ITEM_CATEGORY = null,
                    ITEM = null,
                    ITEM_NAME = null,
                    ITEM_ID = null;

                if(selected.length > 1){
                    for(let i = 0;i < selected.length;i++){
                        ITEM_NAME = $(selected[i]).data("item-name");
                        ITEM_CATEGORY = $(selected[i]).data("type");
                        ITEM_ID = $(selected[i]).data("item-id");
                        ITEM = {
                            'NAME':     ITEM_NAME,
                            'CATEGORY': ITEM_CATEGORY,
                            'ID':       ITEM_ID
                        };
                        ITEMS.push(ITEM);
                    }
                }else{
                    ITEM_NAME = $(this).data("item-name");
                    ITEM_CATEGORY = $(this).data("type");
                    ITEM_ID = $(this).data("item-id");
                    ITEM = {
                        'NAME':     ITEM_NAME,
                        'CATEGORY': ITEM_CATEGORY,
                        'ID':       ITEM_ID
                    };
                    ITEMS.push(ITEM);
                }

                if(moveToIventory){
                    equipment.moveItemsTo(null, ITEMS);
                }else{
                    equipment.moveItemsTo(null, ITEMS, 'equip');
                }

            }
            //ON SHIFT-CLICK SELECT ALL SAME ITEM
            else if(event.shiftKey){
                $(".ui-selected").removeClass("ui-selected");
                if(!moveToIventory){
                    $(".ship-inventory-content .inventory-item[data-item-name="+$(this).data("item-name")+"]").addClass("ui-selected");
                }else{
                    $("."+equipment.display+"-equipment-container .equiped-item[data-item-name="+$(this).data("item-name")+"]").addClass("ui-selected");
                }
            }
            //ON NORMAL CLICK UNSELECT ALL
            else {
                if(!moveToIventory){
                    $(".ship-inventory-content .inventory-item").removeClass("ui-selected");
                }else{
                    $(".equiped-item").removeClass("ui-selected");
                }
            }
        });

        //REGISTER DROPZONES FOR IVENTORY ITEMS
        $( ".ship-equipment-slots, .drone-equipment-slots" ).droppable({
            accept: ".inventory-item",
            drop: function( event, ui ) {
               let categories = $(this).data('category').split('|');

               if(categories.includes($(ui.draggable).data('type'))){
                   //GET SELECTED ITEMS
                   selected = $('.ui-selected:not(.ui-draggable-dragging)[data-type="'+$(ui.draggable).data('type')+'"]').each(function() {});
                   let ITEMS = [],
                       ITEM_CATEGORY = null,
                       ITEM = null,
                       ITEM_NAME = null,
                       ITEM_ID = null,
                       DRONE_ID = null;

                   if(selected.length > 1){
                       for(let i = 0;i < selected.length;i++){
                           ITEM_NAME = $(selected[i]).data("item-name");
                           ITEM_CATEGORY = $(selected[i]).data("type");
                           ITEM_ID = $(selected[i]).data("item-id");
                           DRONE_ID = $(this).parent().data("drone-id");
                           ITEM = {
                               'NAME':     ITEM_NAME,
                               'CATEGORY': ITEM_CATEGORY,
                               'ID':       ITEM_ID
                           };

                           if(DRONE_ID !== undefined){
                               ITEM.DRONE_ID = DRONE_ID;
                           }

                           ITEMS.push(ITEM);
                       }
                   }else{
                       ITEM_NAME = $(ui.draggable).data("item-name");
                       ITEM_CATEGORY = $(ui.draggable).data("type");
                       ITEM_ID = $(ui.draggable).data("item-id");
                       DRONE_ID = $(this).parent().data("drone-id");
                       ITEM = {
                           'NAME':     ITEM_NAME,
                           'CATEGORY': ITEM_CATEGORY,
                           'ID':       ITEM_ID
                       };

                       if(DRONE_ID !== undefined){
                           ITEM.DRONE_ID = DRONE_ID;
                       }

                       ITEMS.push(ITEM);
                   }

                   equipment.moveItemsTo(null, ITEMS, 'equip');
               }
            }
        });

        $( ".ship-inventory-container" ).droppable({
            accept: ".equiped-item",
            drop: function( event, ui ) {

                //GET SELECTED ITEMS
                selected = $(".ui-selected:not(.ui-draggable-dragging)").each(function() {});
                let ITEMS = [],
                    ITEM_CATEGORY = null,
                    ITEM = null,
                    ITEM_NAME = null,
                    ITEM_ID = null,
                    DRONE_ID = null;

                if(selected.length > 1){
                    for(let i = 0;i < selected.length;i++){
                        ITEM_NAME = $(selected[i]).data("item-name");
                        ITEM_CATEGORY = $(selected[i]).data("type");
                        ITEM_ID = $(selected[i]).data("item-id");
                        ITEM = {
                            'NAME':     ITEM_NAME,
                            'CATEGORY': ITEM_CATEGORY,
                            'ID':       ITEM_ID
                        };
                        ITEMS.push(ITEM);
                    }
                }else{
                    ITEM_NAME = $(ui.draggable).data("item-name");
                    ITEM_CATEGORY = $(ui.draggable).data("type");
                    ITEM_ID = $(ui.draggable).data("item-id");
                    DRONE_ID = $(ui.draggable).parent().data("drone-id");
                    ITEM = {
                        'NAME':     ITEM_NAME,
                        'CATEGORY': ITEM_CATEGORY,
                        'ID':       ITEM_ID
                    };
                    ITEMS.push(ITEM);
                }

                equipment.moveItemsTo(null, ITEMS);
            }
        });

        //MAKE INVENTROY TIEMS SELECTABLE
        $(".ship-inventory-content").selectable({filter: '.inventory-item'});

        //ACTIVATE HANGAR SWITCH
        $('.hangar-slot').off('click').click(function (event) {
            let hangarID = $(this).data('hangar-id');

            if(hangarID !== undefined && !$(this).hasClass('active')){
                equipment.switchHangar(null, hangarID);
            }
        });

        //ACTIVATE DESIGN SWITCH
        $('#design-select').off('change').change(function (event) {
            let designID = $(this).val();

            if(designID !== undefined && !$(this).selected){
                equipment.switchDesign(null, designID);
            }
        });

        //ITEM MENU
        $('.inventory-item').contextmenu(function (event) {
           event.preventDefault();
            let itemID = parseInt($(this).data('item-id')),
                itemName = $(this).data('item-name'),
                itemSell = parseInt($(this).data('item-credits'));
            swal('Sell item?','For selling '+itemName+' you will get '+itemSell+' Credits.', {
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
        });

        //DRONE MENU
        $('.drone-container').click(function (event) {
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
    }

    /**
     * sellItem Function
     * sends request to sellDrone
     *
     * @param data
     * @param itemID
     */
    static sellItem(data = null, itemID){
        if(data !== null){
            if(!data.error){
                swal('Success!', 'Sucessfully sold your Item!','success')
                equipment.reload();
            }else{
                swal('Error!', data.error_msg, 'error');
                equipment.reload();
            }
        }else{
            $(".loading-screen").show();
            let params = {
                'ITEM_ID' : itemID,
            };
            equipment.sendRequest('sellItem', 'sell_item', JSON.stringify(params));
        }
    }

    /**
     * sellDrone Function
     * sends request to sellDrone
     *
     * @param data
     * @param droneID
     */
    static sellDrone(data = null, droneID){
        if(data !== null){
            if(!data.error){
                swal('Success!', 'Sucessfully sold your drone!','success')
                equipment.reload();
            }else{
                swal('Error!', data.error_msg, 'error');
            }
        }else{
            $(".loading-screen").show();
            let params = {
                'DRONE_ID' : droneID,
            };
            equipment.sendRequest('sellDrone', 'sell_drone', JSON.stringify(params));
        }
    }

    /**
     * switchDesign Function
     * sends request to switch Design
     *
     * @param data
     * @param designID
     */
    static switchDesign(data = null, designID){
        if(data !== null){
            if(!data.error){
                //SET NEW SHIPIMAGE
                let shipIMAGE = data.NEW_SHIP;
                $('.player-ship-view > .ship-box > img').attr('src', shipIMAGE);
                $('.hangar-slot[data-hangar-id="'+data.HANGAR_ID+'"] > img').attr('src', shipIMAGE);
                equipment.reload();
            }else{
                swal('Error!', data.error_msg, 'error');
            }
        }else{
            $(".loading-screen").show();
            let params = {
                'TO' : designID,
            };
            equipment.sendRequest('switchDesign', 'switch_design', JSON.stringify(params));
        }
    }


    /**
     * switchHangar Function
     * sends request to switch Hangar
     *
     * @param data
     * @param hangarID
     */
    static switchHangar(data = null, hangarID){
        if(data !== null){
            if(!data.error){

                //SET NEW SHIPIMAGE
                let shipIMAGE = data.NEW_SHIP;
                $('.player-ship-view > .ship-box > img').attr('src', shipIMAGE);
                $('.hangar-slot').removeClass('active');
                $('.hangar-slot[data-hangar-id="'+data.HANGAR_ID+'"]').addClass('active');

                equipment.reload();
            }else{
               swal('Error!', data.error_msg, 'error');
            }
        }else{
            $(".loading-screen").show();
            let params = {
                'HANGAR_ID' : hangarID,
            };
            equipment.sendRequest('switchHangar', 'switch_hangar', JSON.stringify(params));
        }
    }

    /**
     * moveItemsTo Function
     * sends request to move all ITEMS (array of ITEMS) to selected destination
     *
     * @param data
     * @param ITEMS
     * @param TO
     */
    static moveItemsTo(data = null, ITEMS, TO = 'inv'){
        if(data !== null){
            if(!data.error){
                equipment.reload();
            }else{
                swal('Error!', data.error_msg, 'error');
                equipment.reload();
            }
        }else{
            $(".loading-screen").show();
            let params = {
                    'ITEMS' : ITEMS,
                    'CONFIG' : equipment.config,
                    'DISPLAY' : equipment.display,
                    'TO' : TO,
                };
            equipment.sendRequest('moveItemsTo', 'move_items', JSON.stringify(params));
        }
    }

    /**
     * reload Function
     * refreshs equipment data by ajax call
     *
     * @param data
     */
    static reload(data = null){
        if(data === null){
            $(".loading-screen").show();
            equipment.sendRequest('reload','load');
        }else{
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
    static sendPacket(){
        if(equipment.ws == undefined){
            equipment.ws = new WebSocket("ws://"+atob(equipment.SERVER_IP)+":666/cmslistener");
        }

        setTimeout( function () {
            if(equipment.ws.readyState === 1){
                equipment.ws.send('user|eq|'+equipment.PLAYER_ID);
            }else{
                equipment.sendPacket(action);
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
    static sendRequest(callback, action, params = ""){
        equipment.sendPacket();
		
		let data ={
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
            success: function(resultData){
               equipment[callback](resultData);
            }
        });
    }
}
