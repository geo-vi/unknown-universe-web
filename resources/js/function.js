if (typeof console == "undefined") {
    window.console = {
        log: function () {

        }
    };
}

function redirect(destination, newWindow, target)
{
    if (destination)
    {
        if (newWindow && target === undefined)
        {
            window.open(destination, '_blank');
        }
        else if (target !== undefined) {
            window.open(destination, target);
        }
        else
        {
            window.open(destination, '_self');
        }


    }
    else
    {
        return false;
    }
}


function redirectToExternalHome()
{
    redirect('/index.es?action=externalHome&loginError=99');
}

function openShopCategory(category)
{
    redirect('/indexInternal.es?action=internalDock&category=' + category);
}

function redirectToEquipment()
{
    redirect('/indexInternal.es?action=internalDock&tpl=internalDockEquipment');
}

function redirectToItemUpgradeSystem()
{
    redirect('/indexInternal.es?action=internalItemUpgradeSystem');
}

function translate(s)
{
    return s;
}

var browserType = 'unknown';
if (navigator.userAgent.match(/Opera/)) {
    browserType = 'opera';
} else if (navigator.userAgent.match(/MSIE/)) {
    browserType = 'ie';
} else if (navigator.userAgent.match(/Mozilla/)) {
    browserType = 'ns';
}


function domGet(id)

{

    if (typeof(id) != 'string') {

        return id;

    } else {

        return document.getElementById(id);

    }

}

function domGetChild(obj, id)

{

    for (var i=0; i<obj.childNodes.length; i++) {

        var n = obj.childNodes[i];

        if (n.nodeType != 1) continue;

        if (n.id == id) return n;

        var r = domGetChild(n, id);

        if (r != false) return r;

    }

    return false;

}



function domGetBody()

{

    var tmp = document.getElementsByTagName('BODY');

    return tmp[0];

}



function domGetOffset(obj)

{

    obj = domGet(obj);

    var offset = {
        x:0,
        y:0
    };

    if (obj.offsetX) return {
        x:obj.offsetX,
        y:obj.offsetY
    };

    while (obj) {

        offset.x += obj.offsetLeft;

        offset.y += obj.offsetTop;

        obj = obj.offsetParent;

    }

    return offset;

}



function domFireEvent(obj, name)

{

    if (browserType == 'ns') {

        //      var evnt = createEventObject(); //obj.ownerDocument.createEventObject();

        //      evnt.initEvent(name.slice(2), false, false);

        //      obj.dispatchEvent(evnt);

        /*

        if (!event) event = obj.ownerDocument.createEventObject();

        event.initEvent(name.slice(2), false, false);

        obj.dispatchEvent(event);

         */

        if (typeof(obj[name]) == 'function') {

            obj[name]();

        } else if (obj.getAttribute(name)) {

            eval(obj.getAttribute(name));

        }

    } else {

        obj.fireEvent(name, window.event);

    }

}



function domAttachEvent(obj, name, handler)

{

    if (browserType == 'ns') {

        obj.addEventListener(name.slice(2), handler, false);

    } else {

        obj.attachEvent(name, handler);

    }

}



function domDetachEvent(obj, name, handler)

{

    if (browserType == 'ns') {

        obj.removeEventListener(name.slice(2), handler, false);

    } else {

        obj.removeEvent(name, handler);

    }

}



function domOnLoad(handler)

{

    domAttachEvent(window, 'onload', handler);

}



function domEventGetCoords()

{

    if (window.event) {

        return {
            x:window.event.clientX,
            y:window.event.clientY
        };

    } else {

        return {
            x:window.nsevent.pageX,
            y:window.nsevent.pageY
        };

    }

}



function domEventGetTarget()

{

    if (window.event) {

        return window.event.srcElement;

    } else {

        return window.nsevent.target;

    }

}



function domEventPreventDefault()

{

    if (window.event) {

        window.event.returnValue = false;

    } else {

        window.nsevent.preventDefault();

    }

}



function domEventCancelBubble()

{

    if (window.event) {

        window.event.cancelBubble = true;

    } else {

        window.nsevent.stopPropagation();

    }

}



function domGetParent(obj, tagName)

{

    if (!tagName) {

        while (obj && obj.nodeType && obj.nodeType != 1) obj = obj.parentNode;

    } else {

        while (obj && obj.tagName && obj.tagName.toLowerCase() != tagName.toLowerCase()) obj = obj.parentNode;

    }

    return obj;

}



function domGetPrevious(obj, tagName)

{

    obj = domGet(obj);

    while (true) {

        if (obj.nodeType == 1) {

            if (typeof(tagName) == 'object') {

                for (var i=0; i<tagName.length; i++) if (tagName[i].toLowerCase() == obj.tagName.toLowerCase()) return obj;

            } else if (typeof(tagName) == 'string') {

                if (tagName.toLowerCase() == obj.tagName.toLowerCase()) return obj;

            } else {

                return obj;

            }

        }

        if (obj.previousSibling) {

            obj = obj.previousSibling;

        } else if (obj.parentNode) {

            obj = obj.parentNode;

        } else {

            return null;

        }

    }

}



function domGetNext(obj, tagName)

{

    obj = domGet(obj);

    while (true) {

        if (obj.nodeType == 1) {

            if (typeof(tagName) == 'object') {

                for (var i=0; i<tagName.length; i++) if (tagName[i].toLowerCase() == obj.tagName.toLowerCase()) return obj;

            } else if (typeof(tagName) == 'string') {

                if (tagName.toLowerCase() == obj.tagName.toLowerCase()) return obj;

            } else {

                return obj;

            }

        }

        if (obj.nextSibling) {

            obj = obj.nextSibling;

        } else if (obj.parentNode) {

            obj = obj.parentNode;

        } else {

            return null;

        }

    }

}



function domSetAlpha(obj, alpha)

{

    obj = domGet(obj);

    if (document.addEventListener) {

        obj.style.MozOpacity = parseInt(alpha)/100;

    } else {

        obj.style.filter = 'alpha(opacity='+parseInt(alpha)+', finishopacity=0, style=0)';

    }

}



function domRemove(obj)

{

    obj = domGet(obj);

    obj.parentNode.removeChild(obj);

}











var gDomSetFlashVarQueue = new Array();

var gDomSetFlashVarTimer = false;



function domSetFlashVarTimer()

{

    if (gDomSetFlashVarQueue.length == 0) {

        clearInterval(gDomSetFlashVarTimer);

        gDomSetFlashVarTimer = false;

        return;

    }

    var queueItem = gDomSetFlashVarQueue.pop();

    try {

        queueItem.obj.SetVariable(queueItem.name, queueItem.value);

    } catch (e) {

    }

    try {

        queueItem.obj.SetVariable('c.'+queueItem.name, queueItem.value);

    } catch (e) {

    }

    queueItem.count--;

    if (queueItem.count > 0) {

        gDomSetFlashVarQueue.unshift(queueItem);

    }

}



function domSetFlashVar(id, name, value)

{

    var obj = false;

    if (document.embeds) obj = document.embeds[id];

    if (!obj) obj = document.getElementById(id);

    if (!obj) return;

    var queueItem = new Object();

    queueItem.obj = obj;

    queueItem.name = name;

    queueItem.value = value;

    queueItem.count = 3;

    gDomSetFlashVarQueue.unshift(queueItem);

    if (!gDomSetFlashVarTimer) {

        gDomSetFlashVarTimer = setInterval('domSetFlashVarTimer()', 20);

    }

}
/**
 * DEPRECATED! ~ wtimme
function setShopdetailsText(textfieldName, textfieldValue){
    var flashMovieName = "shopdetails";
    var obj = false;
    obj = document.getElementById(flashMovieName);

//    if (document.embeds) obj = document.embeds[flashMovieName];
//
//    if (!obj) obj = document.getElementByName(flashMovieName);

    if (!obj) return;

    obj.setProperties(textfieldName, textfieldValue);

}
*/





if (browserType == 'ns') {

    document.addEventListener('mousedown', function(e) {
        window.nsevent=e;
    }, true);

    document.addEventListener('mouseup', function(e) {
        window.nsevent=e;
    }, true);

    document.addEventListener('mousemove', function(e) {
        window.nsevent=e;
    }, true);

    document.addEventListener('click', function(e) {
        window.nsevent=e;
    }, true);

    document.addEventListener('keyup', function(e) {
        window.nsevent=e;
    }, true);

    document.addEventListener('keydown', function(e) {
        window.nsevent=e;
    }, true);

    document.addEventListener('keypressed', function(e) {
        window.nsevent=e;
    }, true);

    document.addEventListener('blur', function(e) {
        window.nsevent=e;
    }, true);

    document.addEventListener('focus', function(e) {
        window.nsevent=e;
    }, true);

}



////////////////////////////////////////////////////////////////////////////////

function popup(width, height, name, url)
{
    if (!url) {
        var a = domGetParent(domEventGetTarget(), 'A');
        if (a) url = a.href;
    }
    if (url) {
        if (!name) name = '';
        var w = window.open(url, name, 'width='+width+',height='+height+',menubar=no,location=no,status=yes,toolbar=no');
        if (w) {
            w.focus();
            if (window.event || window.nsevent) {
                domEventPreventDefault();
                domEventCancelBubble();
            }
            return false;
        }
    }
    return false;
}
function popupAbo(width, height, name, url)
{
    if (!url) {
        var a = domGetParent(domEventGetTarget(), 'A');
        if (a) url = a.href;
    }
    if (url) {
        if (!name) name = '';
        var w = window.open(url, name, 'width='+width+',height='+height+',menubar=no,location=no,status=yes,toolbar=no');
        if (w) {
            w.focus();
            if (window.event || window.nsevent) {
                domEventPreventDefault();
                domEventCancelBubble();
            }
            return false;
        }
    }
}

function popupClose(reload)
{
    if (window.opener) {
        if (reload) if (window.opener.location) window.opener.location.reload();
        window.close();
    } else {
        history.back();
    }
}



////////////////////////////////////////////////////////////////////////////////

function changeButtons(welchen) {
    var image = welchen.src;
    var endung = (image.substr(image.length-3,3));
    if((image.substr(image.length-5,1)) == 0)  var teil = 1;
    else teil = 0;
    var newImage = (image.substring(0,image.length-5)) + teil + "." +endung;
    welchen.src = newImage;
}
/*
var F1;
function popup(ziel,breite,hoehe) {
    if(F1 && !F1.closed) {
        F1.close();
    }
    F1 = window.open(ziel, "Fenster1", "width="+breite+",height="+hoehe+",left=0,top=0");
}
 */


function bilderVorladen() {
    document.Vorladen = new Array();
    if(document.images) {
        for(var i = 0; i < bilderVorladen.arguments.length; i++) {
            document.Vorladen[i] = new Image();
            document.Vorladen[i].src = bilderVorladen.arguments[i];
        }
    }
}

function popMap(width, height, name, url)
{
    if (!url) {
        var a = domGetParent(domEventGetTarget(), 'A');
        if (a) url = a.href;
    }
    if (url) {
        if (!name) name = '';
        var w = window.open(url, name, 'width='+width+',height='+height+',menubar=no,location=no,status=yes,toolbar=no');
        if (w) {
            w.focus();
            if (window.event || window.nsevent) {
                domEventPreventDefault();
                domEventCancelBubble();
            }
            return false;
        }
        else
        {
            nextpage =confirm('Bitte Deaktiviere bei deinem Browser den Popupblocker. Dieser verhindert das die Karte geladen wird. Soll nun die Karte ohne Popup angezeigt werden');
            if (nextpage) window.location.href=url;
        }
    }
}

// ############################################################
// Seitenabdeckung bei infolayern #############################
// ############################################################

// DEPRECATED - Use /js/tools.js instead!

// Use: Tools.Popup.showModalLayer();

// Tools works in global scope as it is initialized in this file
// when document ready line 3616

function showBusyLayer() {
    var busyLayer = jQuery("#busy_layer");

    if (busyLayer != null) {
        busyLayer.css("visibility","visible");
        busyLayer.css("display","block");

    }
}

// Use: Tools.Popup.hideModalLayer();

function hideBusyLayer() {
    var busyLayer = jQuery("#busy_layer");
    if (busyLayer != null) {
        busyLayer.css("visibility","hidden");
        busyLayer.css("display","none");
    }
}


/***********************************************
 * Bookmark site script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
 * This notice MUST stay intact for legal use
 * Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
 ***********************************************/
function bookmarkDO(title,url){
    if (window.sidebar) {// firefoxwww/js/function.js
        window.sidebar.addPanel(title, url, "");
    } else if(window.opera && window.print) { // opera
        var elem = document.createElement('a');
        elem.setAttribute('href',url);
        elem.setAttribute('title',title);
        elem.setAttribute('rel','sidebar');
        elem.click();
    } else if(document.all) {// ie
        window.external.AddFavorite(url, title);
    }
}

function hideQuestDetails()
{
    $('questDetails').innerHTML = '<img src="'+CDN+'do_img/global/intro/loader_anim.gif" alt="" style="position: absolute; left: -118px; top: 28px;" />';
};

function toggleQuestChildrenVisibility(idToToggle, idOfImage, type)
{
    $('list_' + idToToggle).toggle();
    if ($('list_' + idToToggle).style.display == 'none')
    {
        $(type + '_' + idOfImage).src = CDN+'do_img/global/quests/condition_closed.gif';
    }
    else
    {
        $(type + '_' + idOfImage).src = CDN+'do_img/global/quests/condition_open.gif';
    }
}

function preloadImg() {
    document.Vorladen = new Array();

    if(document.images) {
        for(var i = 0; i < preloadImg.arguments.length; i++) {
            document.Vorladen[i] = new Image();
            document.Vorladen[i].src = preloadImg.arguments[i];
        }
    }
}

function questDetailToggle()
{
    $('questDetailTasks').toggle();
    $('questDetailDescription').toggle();
    if (!$('questDetailTasks').visible())
    {
        $('questDetailToggle').style.backgroundImage = 'url(' + CDN + '../do_img/global/quests/toggle_list.png)';
    }
    else
    {
        $('questDetailToggle').style.backgroundImage = 'url(' + CDN + '../do_img/global/quests/toggle_text.png)';
    }
}


function closeLayer (layer) {
    jQuery('#' + layer).hide();
    hideBusyLayer();
}

/**
 *
 * set focus in opener window.
 *
 * Not use this instance function
 * Please move this function to the current Javascript
 * you are working to deprecate function.js. Together we can!
 *
 * @param webURL
 */
function referToURL(webURL)
{
    if(webURL.indexOf("//") == 0) {
        webURL = webURL.substr(1,webURL.length);
    }

    if (window.opener) {
		referOpenerToUrl(webURL);
    } else if(document.isOpenSocial) {
        showGame(document.webHost + '/' + webURL + "&openSocial=1");
    }
}

/**
 *
 * child of the previous window to set focus in opener window.
 *
 * Not use this instance function
 * Please move this function to the current Javascript
 * you are working to deprecate function.js. Together we can!
 *
 * @param webURL
 */

var windowWebpage;
function referOpenerToUrl(webURL)
{
	if(window.opener.name == "do_webpage") {
		if(windowWebpage == null) {
			windowWebpage = window.open("", "do_webpage");
			if (windowWebpage.location != webURL) {
				windowWebpage.location = webURL;
			}
		} else if(windowWebpage.closed) {
			windowWebpage = window.open(webURL, "do_webpage");
		} else {
			if (windowWebpage.location != webURL) {
				windowWebpage.location = webURL;
			}
		}
		windowWebpage.focus();
	} else {
        window.opener.location.href = webURL;
        window.opener.focus();
	}
}

function referToExternalURLInNewWindow(webURL, focus)
{
	if(typeof(focus)==='undefined') focus = true;
    if (window.opener && !focus) {
		window.opener.open(webURL, '_blank');
	} else {
		window.open(webURL, '_blank');
	}
}

function referToShopItem(lootId, focus, inSameTab)
{
    var webURL = '/indexInternal.es?action=internalDock&shopItem=';
    webURL += lootId;

    if (!inSameTab) {
        if (window.opener && !focus) {
            window.opener.open(webURL, '_blank');
        } else {
            window.open(webURL, '_blank');
        }
    } else {
        window.location.href = webURL;
    }
}

function openPaymentFromExternal(section)
{
    webURL = '/flashAPI/openPayment.php?section=' + section;

    var external = window.open(
        webURL.replace(/\+/g,"%2B"), "paymentglobal", "width=1000,height=535,left=100,top=200,scrollbars=no"
    );
    external.focus();
}

function openPaymentLinkFromExternal(link)
{
    webURL = link;

    var external = window.open(
        webURL.replace(/\+/g,"%2B"), "paymentglobal", "width=1000,height=535,left=100,top=200,scrollbars=no"
    );
    external.focus();
}

/**
 *
 * @deprecated
 * @use InternalMapRevolution.referToURL
 * @param webURL
 */


function referToExternalURL(webURL)
{
    if (window.opener) {
        window.opener.location.href = webURL;
        window.opener.focus();
    }
}


function openContextHelp() {
    showHelp();
}

/**
 *
 * @deprecated
 * @use InternalMapRevolution.referToURL
 * @param webURL
 */


function showHangar () {
    if (window.opener) {
        window.opener.location.href = 'indexInternal.es?action=internalDock';
        window.opener.focus();
    } else {
// todo: öffne neue seite mit dock-startseite
}
}

/**
 *
 * @deprecated
 * @use InternalMapRevolution.referToURL
 * @param webURL
 */


function showPetFuel () {
    if (window.opener) {
        window.opener.location.href = 'indexInternal.es?action=internalDock&category=petGear&itemId=PET_FUEL';
        window.opener.focus();
    } else {
// todo: öffne neue seite mit dock-startseite
}
}

function Evoucher(){
    if(jQuery('.evoucherInputField').val() != '' ){
        jQuery('.evoucherInputField').val('');
        if(jQuery('.evoucherInputField').hasClass('redText') || jQuery('.evoucherInputField').hasClass('greenText')){
            jQuery('.evoucherInputField').removeClass('greenText');
            jQuery('.evoucherInputField').removeClass('redText');
            jQuery('.evoucherInputField').addClass('whiteText');
        }
    }
}

/* Breaking News */
function BreakingNews()
{
    this.breakingNewsInterval = false;
    this.currentIconID        = 0;
    this.maxIconID            = 0;
    this.keys                 = false;
    this.images               = false;
    this.titles               = false;
    this.links                = false;
    this.durations            = false;
    this.secondsCounter       = 0;
    this.titlePosition        = 12;

    breakingNewsObject = this;

    this.setMaxIconID = function(iconCount)
    {
        this.maxIconID = iconCount - 1;
        if (this.maxIconID == 0) {
            $('breakingNewsIconContainer').hide();
        }
    };

    this.setKeys = function(array)
    {
        this.keys = array;
    };

    this.setImages = function(array)
    {
        this.images = array;
    };

    this.setTitles = function(array)
    {
        this.titles = array;
    };

    this.setLinks = function(array)
    {
        this.links = array;
    };

    this.setDurations = function(array)
    {
        this.durations = array;
    };

    this.init = function()
    {
        this.currentIconID = this.maxIconID;
        this.hardRedraw();
        window.setInterval('breakingNewsObject.scrollTitle()', 50);
    };

    this.start = function()
    {
        if (this.breakingNewsInterval == false && this.maxIconID > 0) {
            this.breakingNewsInterval = window.setInterval('breakingNewsObject.changeHighlight()', 1000);
        }
    };

    this.stop = function()
    {
        window.clearInterval(this.breakingNewsInterval);
        this.breakingNewsInterval = false;
    };

    this.changeHighlight = function()
    {
        this.secondsCounter++;
        if (this.durations[this.currentIconID] <= this.secondsCounter) {
            this.secondsCounter = 0;
            this.currentIconID--;
            if (this.currentIconID < 0) this.currentIconID = this.maxIconID;
            this.smoothRedraw();
            this.titlePosition = 12;
        }
    };

    this.smoothRedraw = function()
    {
        var myArray = $$('.breakingNewsTitle');
        for (var i = 0; i < myArray.length; i++) {
            myArray[i].innerHTML = ' --- ' + this.titles[this.currentIconID] + ' --- ' + this.titles[this.currentIconID] + ' --- ' + this.titles[this.currentIconID] + ' --- ' + this.titles[this.currentIconID] + ' --- ' + this.titles[this.currentIconID] + ' --- ' + this.titles[this.currentIconID] + ' --- ' + this.titles[this.currentIconID] + ' --- ' + this.titles[this.currentIconID] + ' --- ' + this.titles[this.currentIconID] + ' --- ' + this.titles[this.currentIconID] + ' --- ';
        }

        var helperDiv = $('breakingNewsContainer').cloneNode(true);
        helperDiv.setAttribute('id', 'breakingNewsContainerHelper');
        helperDiv.style.display = 'none';
        helperDiv.style.backgroundImage = 'url(do_img/global/events/' + this.images[this.currentIconID] + ')';

        $('breakingNewsContainer').parentNode.appendChild(helperDiv);

        Effect.Fade('breakingNewsContainer', {
            duration: 0.5
        } );
        Effect.Appear('breakingNewsContainerHelper', {
            duration: 0.5
        } );
        window.setTimeout('$(\'breakingNewsContainer\').remove(); $(\'breakingNewsContainerHelper\').setAttribute(\'id\', \'breakingNewsContainer\');', 1100);

        $('currentIconID').value = this.keys[this.currentIconID];
        $('breakingNewsContainerFrame').onclick = function() {
            showNews($('currentIconID').value)
        }

        this.redrawIcons();
    };

    this.hardRedraw = function()
    {
        var myArray = $$('.breakingNewsTitle');
        for (var i = 0; i < myArray.length; i++) {
            myArray[i].innerHTML = ' --- ' + this.titles[this.currentIconID] + ' --- ' + this.titles[this.currentIconID] + ' --- ' + this.titles[this.currentIconID] + ' --- ' + this.titles[this.currentIconID] + ' --- ' + this.titles[this.currentIconID] + ' --- ' + this.titles[this.currentIconID] + ' --- ' + this.titles[this.currentIconID] + ' --- ' + this.titles[this.currentIconID] + ' --- ' + this.titles[this.currentIconID] + ' --- ' + this.titles[this.currentIconID] + ' --- ';
        }

        $('breakingNewsContainer').style.backgroundImage = 'url(do_img/global/events/' + this.images[this.currentIconID] + ')';
        if ($('breakingNewsContainerHelper')) $('breakingNewsContainerHelper').style.backgroundImage = 'url(do_img/global/events/' + this.images[this.currentIconID] + ')';

        $('currentIconID').value = this.keys[this.currentIconID];
        $('breakingNewsContainerFrame').onclick = function() {
            showNews($('currentIconID').value)
        }

        this.redrawIcons();
        this.titlePosition = 12;
    };

    this.redrawIcons = function()
    {
        $$('.breakingNewsIcon').each(
            function(e)
            {
                e.style.border = '1px solid black';
            }
            );
        $('breakingNewsIcon' + (this.currentIconID + 1)).style.border = '1px solid #dcdcdc';
    };

    this.scrollTitle = function()
    {
        this.titlePosition -= 2;

        var titles = $$('.breakingNewsTitle');
        for (var i = 0; i < titles.length; i++) {
            titles[i].setStyle( {
                left: this.titlePosition + 'px'
            } );
        }
    };

    this.over = function(id)
    {
        this.currentIconID = id - 1;
        this.stop();
        this.hardRedraw();
    };

    this.out = function()
    {
        this.start();
    };
}

var confirmButtonText = {
    'confirmText': ""
}

function setConfirmButtonText(key, val) {
    confirmButtonText[key] = val;
}

function getConfirmButtonText(key) {
    return confirmButtonText[key];
}

var cancelButtonText = {
    'cancelText': ""
}

function setCancelButtonText(key, val) {
    cancelButtonText[key] = val;
}

function getCancelButtonText(key) {
    return cancelButtonText[key];
}

function openConfirm(myURI, text) {
    Dialog.confirm(text,
    {
        height: 100,
        width:300,
        //className: "alphacube",
        okLabel: getConfirmButtonText('confirmText'),
        cancelLabel: getCancelButtonText('cancelText'),
        ok:function(win) {
            location.href=myURI;
            return true;
        }
    });
}

function openConfirmSkillTreeReset(text) {
    Dialog.confirm(text,
    {
        height: 100,
        width:300,
        //className: "alphacube",
        okLabel: getConfirmButtonText('confirmText'),
        cancelLabel: getCancelButtonText('cancelText'),
        ok:function(win) {
            Main.resetSkillTree();
            return true;
        }
    });
}

function showFooterLayer(layer) {

    showBusyLayer();
    document.getElementById(layer).style.display = "block";
}


function closeInfo(welcher) {

    hideBusyLayer();
    document.getElementById(welcher).style.display = "none";
}

function checkTransportTime(value, isPremium) {

    var countElements = 0;

    for (j = 0; j < $('sendTransport').elements.length; j++) {
        if ($('sendTransport').elements[j].type == 'text') {
            if (isNaN(parseInt($('sendTransport').elements[j].value)) === false) {
                countElements = countElements + parseInt($('sendTransport').elements[j].value);
            }
        }
    }

    // premium users has the half transport time.
    if (isPremium == true) {
        countElements = countElements/2;
    }

    time = (countElements * value);

    var h = Math.floor(time/60);
    var m = Math.round(time%60);

    if (m < 10) {
        m = "0" + m;
    }

    if (m == 60) {
        m = '00';
        h = h + 1;
    }

    // if you send less then 5 item the time would be 0.
    if ( countElements > 0 && h == 0 && m == 0) {
        m = "01";
    }

    if ( countElements > 0) {
        $('timeForTransport').innerHTML = h +":"+ m;
    } else {
        $('timeForTransport').innerHTML = "?";
    }
}

function do_redirect(destination, newWindow) {
    if (destination) {
        if (newWindow) {
            window.open(destination, '_blank');
        } else {
            window.open(destination, '_self');
        }
    } else {
        return false;
    }
}

var openSocial = 0;
function bpCloseWindow () {
    if (openSocial == 1) {
        document.location.reload();
    } else {
        self.close();
    }
}

function bpReloadOpener () {
    opener.document.location.reload();
}

function changeView4July(divID) {
    $('july4thFireworksUser').hide();
    $('july4thFireworksFaction').hide();
    $('july4thFireworksClan').hide();
    if (divID == 'july4thFireworksUser') {
        $('july4thFireworksUser').show();
    } else if (divID == 'july4thFireworksFaction') {
        $('july4thFireworksFaction').show();
    } else if (divID == 'july4thFireworksClan') {
        $('july4thFireworksClan').show();

    }
}

//function openPayment(type, id) {
//
//   var external = window.open('/indexInternal.es?action=internalPayment&subaction=showDynamicItem&type='+escape(type)+'&itemID='+escape(id), "paymentglobal", "width=840,height=680,left=100,top=200");
//    external.focus();
//}

/**
 *
 * @deprecated
 * @use InternalMapRevolution.showFeedbackForm();
 *
 * and Dont use function.js anymore!! is deprecated!
 */
function showFeedbackForm(){
    window.opener.FeedBackForm.Events.onFeedBackLayerClick();
    window.opener.focus();

}

function refreshPage(pageId){
    if (window.opener) {
        if(pageId == 0){
            window.opener.location.href = "indexInternal.es?action=internalNanoTechFactory";
        }



    }
}

var imgObj = {
    'imgUrl': ""
}

function setImgUrl(key, val) {
    imgObj[key] = val;
}

function getImgUrl(key) {
    return imgObj[key];
}

var pilotSheet = new PilotSheet();
var skillId = false;

function PilotSheet(){
    var checkedIn = false;
    this.friendRequest = new Array();
    this.arrayLength = 0;
    this.messageStats = null;

//    this.friendList = function(type, userFriendID, text){
//          if(type == 'friend' || type == 'denied'){
//              var requestRow = jQuery('#friend_' + userFriendID);
//              var rowToChange = jQuery('#friend_' + userFriendID + '_accepted');
//              var rowToDelete = jQuery('#friend_' + userFriendID + '_denied');
//              rowToDelete.remove();
//              rowToChange.removeAttr('onclick');
//              rowToChange.html('');
//              rowToChange.html(text);
//              rowToChange.removeClass('confirmButton');
//              rowToChange.addClass('doneFriendRequest');
//              var requestNumber = jQuery('.requestNumber');
//              var currentNumber = requestNumber.html() - 1;
//              requestNumber.html('');
//              requestNumber.html(currentNumber);
//
//              var formValues = new Array();
//              formValues['type'] = 'answerFriendshipRequest';
//              formValues['key'] = userFriendID;
//              formValues['status'] = type;
//              xajax_pilotSheet(formValues);
//          }else if(type == 'makeAjaxCall'){
//              this.friendRequest['type'] = type;
//              if(this.arrayLength != 0){
//                xajax_pilotSheet(this.friendRequest);
//                  this.arrayLength = 0;
//              }
//          }
//    };

    this.answerFriendRequest = function(type, userFriendID, text) {
        var requestRow = jQuery('#friend_' + userFriendID);
        var rowToChange = jQuery('#friend_' + userFriendID + '_accepted');
        var rowToDelete = jQuery('#friend_' + userFriendID + '_denied');
        rowToDelete.remove();
        rowToChange.removeAttr('onclick');
        rowToChange.html('');
        rowToChange.html(text);
        rowToChange.removeClass('confirmButton');
        rowToChange.addClass('doneFriendRequest');
        var requestNumber = jQuery('.requestNumber');
        var currentNumber = requestNumber.html() - 1;
        requestNumber.html('');
        requestNumber.html(currentNumber);

        var formValues = new Array();
        formValues['type'] = 'answerFriendshipSL';
        formValues['key'] = userFriendID;
        formValues['status'] = type;
        this.handlePilotSheetAjax(formValues);
    };

//    this.inviteAsFriend = function(userFriendID, isEncoded) {
//        var formValues = new Array();
//        formValues['type'] = 'answerFriendshipSL';
//        formValues['key'] = userFriendID;
//        formValues['status'] = 'invite';
//        formValues['encoded'] = isEncoded;
//        xajax_pilotSheet(formValues);
//    };

    this.hideInviteButton = function(flag){
        var element = $('inviteButt');
        if(element){
            switch(flag){
                case 'show':
                    element.style.display = 'block';
                    break;
                case 'hide':
                    element.style.display = 'none';
                    break;
            }
        }
    };

    this.setSkilltreeNavigationTabActive = function(){
        if(jQuery('#tabButton1')){
            if(jQuery('#tabButton1').hasClass('tabButtonActive')){
                jQuery('#tabButton1').removeClass('tabButtonActive');
                jQuery('#tabLabel1').removeClass('tabLabel1Active');
                jQuery('#tabButton1').addClass('tabButtonInActive');
                jQuery('#tabLabel1').addClass('tabLabel1InActive');
            }
        } else if(jQuery('#tabButton2')){
            if(jQuery('#tabButton2').hasClass('tabButtonActive2')){
                jQuery('#tabButton2').removeClass('tabButtonActive2');
                jQuery('#tabLabel2').removeClass('tabLabel2Active');
                jQuery('#tabButton2').addClass('tabButtonInActive');
                jQuery('#tabLabel2').addClass('tabLabe21InActive');
            }
        } else if(jQuery('#tabButton4')){
            if(jQuery('#tabButton4').hasClass('tabButtonActive1')){
                jQuery('#tabButton4').removeClass('tabButtonActive1');
                jQuery('#tabLabel4').removeClass('tabLabel4Active');
                jQuery('#tabButton4').addClass('tabButtonInActive');
                jQuery('#tabLabel4').addClass('tabLabel4InActive');
            }
        }

        if(jQuery('#tabButton3')){
            if(jQuery('#tabButton3').hasClass('tabButtonInActive')){
                jQuery('#tabButton3').removeClass('tabButtonInActive');
                jQuery('#tabLabel3').removeClass('tabLabel3InActive');
                jQuery('#tabButton3').addClass('tabButtonActive');
                jQuery('#tabLabel3').addClass('tabLabel3Active');
            }
        }
        jQuery('#pppAjaxLoaderMask').css('left', -33);
    }

    this.ajaxLoader = function(flag){
        var mask = jQuery('#pppAjaxLoaderMask');
        var loader = jQuery('#pppAjaxLoader');
        switch(flag){
            case 'show':
                mask.css('display', 'block');
                loader.css('display', 'block');
                break;
            case 'hide':
                mask.css('display', 'none');
                loader.css('display', 'none');
                break;
        }
    }

    this.bgMask = function(flag){
        var mask = $('pppAjaxLoaderMask');
        switch(flag){
            case 'show':
                mask.style.display = 'block';
                break;
            case 'hide':
                mask.style.display = 'none';
                break;
        }
    }

    this.successTimer = null;
    this.failureTimer = null;
    this.editMessage = function(flag, stat, type){
        var statDivSucess;
        var statDivFailed;
        var miscDiv;
        var delay = 5000;
        if(type == 'profile'){
            statDivSucess = jQuery('#editStatsSuccessProfile');
            statDivFailed = jQuery('#editStatsFailedProfile');
            miscDiv= jQuery('#externalPPPLinkDialog');
        }else if(type == 'statusMessage'){
            statDivSucess = jQuery('#editStatsSuccessMess');
            statDivFailed = jQuery('#editStatsFailedMess');
        }else if(type == 'imgUpload'){
            statDivSucess = jQuery('#imgUploadSuccess');
            statDivFailed = jQuery('#imgUploadError');
            delay = 10000;
        }else if(type == 'bonusLog'){
            statDivFailed = jQuery('#bonuslogBookStatus');
        }

        switch(flag){
            case 'show':
                switch(stat){
                    case 'success':
                        if(statDivFailed){
                            if(statDivFailed.hasClass('showStatus')){
                                statDivFailed.removeClass('showStatus');
                                statDivFailed.addClass('hideStatus');
                            }
                            if(miscDiv){
                                if(miscDiv.hasClass('hideStatus')){
                                    miscDiv.removeClass('hideStatus')
                                    miscDiv.addClass('showStatus')
                                }
                            }
                        }
                        if(statDivSucess){
                            if(statDivSucess.hasClass('hideStatus')){
                                statDivSucess.removeClass('hideStatus');
                                statDivSucess.addClass('showStatus');
                            }
                            if(miscDiv){
                                if(miscDiv.hasClass('showStatus')){
                                    miscDiv.removeClass('showStatus')
                                    miscDiv.addClass('hideStatus')
                                }
                            }
                        }
                        pilotSheet.successTimer = window.setTimeout(function(){
                            pilotSheet.editMessage('hide', 'success', type);
                        }, delay);
                        break;
                    case 'failed':
                        if(statDivSucess){
                            if(statDivSucess.hasClass('showStatus')){
                                statDivSucess.removeClass('showStatus');
                                statDivSucess.addClass('hideStatus');
                            }
                            if(miscDiv){
                                if(miscDiv.hasClass('hideStatus')){
                                    miscDiv.removeClass('hideStatus')
                                    miscDiv.addClass('showStatus')
                                }
                            }
                        }

                        if(statDivFailed){
                            if(statDivFailed.hasClass('hideStatus')){
                                statDivFailed.removeClass('hideStatus');
                                statDivFailed.addClass('showStatus');
                            }
                            if(miscDiv){
                                if(miscDiv.hasClass('showStatus')){
                                    miscDiv.removeClass('showStatus')
                                    miscDiv.addClass('hideStatus')
                                }
                            }
                        }
                        pilotSheet.failureTimer = window.setTimeout(function(){
                            pilotSheet.editMessage('hide', 'failed', type);
                        }, delay);
                        break;
                }
                break;
            case 'hide':
                if(stat == 'success'){
                    if(statDivSucess){
                        if(statDivSucess.hasClass('hideStatus')){
                            return;
                        }
                    }
                }else if(stat == 'failed'){
                    if(statDivFailed){
                        if(statDivFailed.hasClass('hideStatus')){
                            return;
                        }
                    }
                }
                if(statDivFailed){
                    if(statDivFailed.hasClass('showStatus')){
                        statDivFailed.removeClass('showStatus');
                        statDivFailed.addClass('hideStatus');
                    }
                    clearTimeout(pilotSheet.failureTimer);
                }
                if(statDivSucess){
                    if(statDivSucess.hasClass('showStatus')){
                        statDivSucess.removeClass('showStatus');
                        statDivSucess.addClass('hideStatus');
                    }
                    clearTimeout(pilotSheet.successTimer);
                }
                if(miscDiv){
                    if(miscDiv.hasClass('hideStatus')){
                        miscDiv.removeClass('hideStatus')
                        miscDiv.addClass('showStatus')
                    }
                }
                if(jQuery('#optimalSizeHint').is(':hidden')){
                    jQuery('#optimalSizeHint').css('display', 'block');
                }
                break;
        }
    }

    this.initialiseCustomSelectElements = function(){
        this.checkedIn = false;
        this.checkedIn = false;
        this.checkedIn = false;
    }

//    this.handleProfileSearch = function(type){
//        var formValues = new Array();
//        formValues['type'] = type;
//        if(jQuery('#searchProfileField')){
//            formValues['profileUsername'] = jQuery('#searchProfileField').val();
//        }
//        xajax_pilotSheet(formValues);
//    }

    this.handleProfileEditForm = function(id, id1, className, type){
        var element = jQuery('#'+id);
        var editElement = jQuery('#editFormProfileAll');
        var formElement = jQuery('#editFormProfile');
        var closeElement = jQuery('#closeButtonEdit');
        var statDivSucess = jQuery('#editStatsSuccessProfile');
        var statDivFailed = jQuery('#editStatsFailedProfile');
        var mask = jQuery('#pppAjaxLoaderMask');
        var formValues = new Array();
        formValues['type'] = 'editProfileForm';
        switch(type){
            case 'show':
                pilotSheet.initCustomInputElements();
                pilotSheet.editMessage("hide", "failed", "profile");
                pilotSheet.editMessage("hide", "success", "profile");
                pilotSheet.editMessage("hide", "success", "imgUpload");
                pilotSheet.editMessage("hide", "failed", "imgUpload");

                if(!jQuery.browser.msie ){
                    jQuery('#privacySettingsTitle').addClass('privacySettingsHint');
                    jQuery('#privacySettingsHint').addClass('privacySettingsHint');
                }

                /*showBusyLayer();*/
                inviteIncentives.busyLayer('show');
                editElement.css('display', 'block');
                closeElement.css('display', 'block');

                tooltip.destroyEventListerners();
                tooltip.init();
                break;
            case 'hide':
                element.style.display = 'none';
                pilotSheet.ajaxLoader('show');
                break;
        }
    };

    /* Flag to show that image hast been succesfully uploaded and a page reload should be done no matter what*/

    this.imageUpload == false;

    this.resetImageUpload = function(){
        this.imageUpload = false;
    }

    this.radiod = false;

    this.initCustomInputElements = function(){
        if(!checkedIn){
            Custom.init();
            checkedIn = true;
        }
    };

    this.unInitCustomInputElements = function(){
        if(checkedIn){
            Custom.clear();
            checkedIn = false;
        }
    };

//    this.handleImageUpload = function(name, error, imgUrl){
//         alert(imgUrl + ' , ' + error);
//        alert(error);
//        return;
//        /* show status message of the upload to the user. In case od success also change the value of the
//              * hidden field which hold the image name. This is to prevent the user from trying to upload thesame
//              * image again.*/
//
//        var img_00 = jQuery('#img_00').val();
//        var img_0 = jQuery('#img_0').val();
//
//
//        if(error == 'error'){
//            jQuery('#imgLoader').removeClass('showStatus');
//            jQuery('#imgLoader').addClass('hideStatus');
//            pilotSheet.editMessage("show", "failed", "imgUpload");
//        }else if(error == 'no_error'){
//            this.imageUpload = true;
//            var formValues = new Array();
//            jQuery('#imgLoader').removeClass('showStatus');
//            jQuery('#imgLoader').addClass('hideStatus');
//            pilotSheet.editMessage("show", "success", "imgUpload");
//
//            formValues['profileID'] = jQuery('#userID').val();
//            formValues['type'] = 'updateAvatar';
//            formValues['imgUrl'] = imgUrl;
//            xajax_pilotSheet(formValues);
//        }
//    };

    this.handleFormUpload = function(type, error, misc) {
        switch (type) {
            case 'imgUpload':
                var img_00 = jQuery('#img_00').val();
                var img_0 = jQuery('#img_0').val();

                if (error == 'error') {
                    jQuery('#img_00').val('change_failed');
                    jQuery('#imgLoader').removeClass('showStatus');
                    jQuery('#imgLoader').addClass('hideStatus');
                    pilotSheet.editMessage("show", "failed", "imgUpload");
                } else if (error == 'no_error') {
                    jQuery('#img_00').val('change_success');
                    jQuery('#imgLoader').removeClass('showStatus');
                    jQuery('#imgLoader').addClass('hideStatus');
                    pilotSheet.editMessage("show", "success", "imgUpload");
                }
                break;
            case 'profileEdit':
                if (error == 'error') {
                    pilotSheet.handleProfilePage('closeButton', 'closeEditProfile');
                    pilotSheet.editMessage("show", "failed", "profile");
                } else if (error == 'no_error') {
                    jQuery('#img_00').val('no_change');
                    var formValues = Array();
                    formValues['type'] = 'showProfilePage';
                    formValues['actionType'] = 'edited';
                    this.handlePilotSheetAjax(formValues);
                }
                break;
            case 'statusMessage':
                if (error == 'error') {
                    pilotSheet.editMessage("show", "failed", "statusMessage")
                } else {
                    pilotSheet.editMessage("show", "success", "statusMessage")
                }
                jQuery('#changeStatusMessage').val('no');
                break;
            case 'profileSearch':
                if (jQuery('#searchProfileField')) {
                    jQuery('#searchProfileField').val(misc)
                }
                if (error != 'error') {
                    if (jQuery('#searchProfileFieldStatus')) {
                        if (jQuery('#searchProfileFieldStatus').hasClass('searchProfileAjaxLoader')) {
                            jQuery('#searchProfileFieldStatus').removeClass('searchProfileAjaxLoader');
                            jQuery('#searchProfileFieldStatus').addClass('searchProfileSuccess');
                        }
                        do_redirect(error, 'newWindow');
                    }
                } else {
                    if (jQuery('#searchProfileFieldStatus').hasClass('searchProfileAjaxLoader')) {
                        jQuery('#searchProfileFieldStatus').removeClass('searchProfileAjaxLoader');
                        jQuery('#searchProfileFieldStatus').addClass('searchProfileFailure');
                    }
                }
                break;
        }
    }

    this.handleProfilePage = function(id, type, imgName) {
        var formValues = new Array();
        formValues['type'] = type;
        var element = jQuery('#' + id);
        var formElement = jQuery('#editFormProfile');
        var editForm = jQuery('#editForm');
        var closeElement = jQuery('#closeButtonEdit');
        var len = 0;

        switch (type) {
            case 'imgUpload':
                var fileName = imgName.replace(/^C:\\fakepath\\/i, '');
                jQuery('#fakefilepc').val(fileName);
                jQuery('#img_00').val('change_inProgress');
                jQuery('#imgLoader').removeClass('hideStatus');
                jQuery('#imgLoader').addClass('showStatus');
                if (jQuery('#imgUpload').val() != '') {
                    jQuery('#optimalSizeHint').css('display', 'none');
                    element.submit();
                }
                break;
            case 'imgUploadReload':
                pilotSheet.editMessage("show", "success", "imgUpload");
                break;
            case 'editUserProfile':
                pilotSheet.handleProfilePage('saveButton', 'closeEditProfile');
                pilotSheet.ajaxLoader('show');
                jQuery('#editForm').submit();
                inviteIncentives.busyLayer('hide');
                /*hideBusyLayer();*/
                break;
            case 'closeEditProfile':
                if(id == 'closeButton'){
                    jQuery('#img_00').val('no_change');
                }
                if (jQuery('#editFormProfileAll')) {
                    jQuery('#editFormProfileAll').css('display', 'none');
                }
                closeElement.css('display', 'none');
                /*hideBusyLayer();*/
                inviteIncentives.busyLayer('hide');
                break;
            case 'profilePage':
                pilotSheet.ajaxLoader('show');
                formValues['type'] = 'showProfilePage';
                console.log(formValues);
                this.handlePilotSheetAjax(formValues);
                break;
        }
    };

    this.performProfileSearch = function() {
        if(jQuery('#searchProfileField').val().length == 0){
            return;
        };

        if (jQuery('#searchProfileFieldStatus')) {
            if (jQuery('#searchProfileFieldStatus').hasClass('hideElement')) {
                jQuery('#searchProfileFieldStatus').removeClass('hideElement');
                jQuery('#searchProfileFieldStatus').addClass('showELement');
            }
            if (jQuery('#searchProfileFieldStatus').hasClass('searchProfileSuccess')) {
                jQuery('#searchProfileFieldStatus').removeClass('searchProfileSuccess');
                jQuery('#searchProfileFieldStatus').addClass('searchProfileAjaxLoader');
            }
            if (jQuery('#searchProfileFieldStatus').hasClass('searchProfileFailure')) {
                jQuery('#searchProfileFieldStatus').removeClass('searchProfileFailure');
                jQuery('#searchProfileFieldStatus').addClass('searchProfileAjaxLoader');
            }
        }

        jQuery('#searchProfileForm').submit();
    }

    this.upLoadStatusMessage = function() {
        jQuery('#changeStatusMessage').val('yes');
        jQuery('#statusMessageForm').submit();
    }

    this.handleAchievementPage = function(id, type, imgName){
        switch (type) {
            case 'achievementPage':
                //tooltip.destroyEventListerners();
                pilotSheet.ajaxLoader('show');
                User.getAchievementPage();
                pilotSheet.hideInviteButton('hide');
                pilotSheet.ajaxLoader('hide');
                break;
            default:
                break;
        }
    };

    this.handlePilotSheetAjax = function(formValues) {
        var type = formValues.type;
        var imgUrl = formValues.imgUrl;
        var actionType = formValues.actionType;
        var label = formValues.label;
        var key = formValues.key;
        var status = formValues.status;

        jQuery.ajax({
            type: 'POST',
            url: '/ajax/pilotprofil.php',
            dataType: 'json',
            data: {command: "getInternalProfilPage", type: type, imgUrl: imgUrl, actionType: actionType,
                    label: label, key: key, status: status},
            success: function(response) {
                if (response.result == 'OK') {
                    if(type == 'showSkilltree') {
                        jQuery('#pageContent').html(response.code);
                        pilotSheet.hideInviteButton('hide');
                        tooltip.init();
                        pilotSheet.setSkilltreeScrollbar();
                        pilotSheet.ajaxLoader('hide');
                    } else if (type == 'showProfilePage') {
                        jQuery('#pageContent').html(response.code);
                        pilotSheet.hideInviteButton('hide');
                        pilotSheet.ajaxLoader('hide');
                        misc.initialiseScrollBar();
                        if (response.edited) {
                            pilotSheet.editMessage('show', 'success', 'profile');
                        }
                    } else if (type == 'convertPoints') {
                        jQuery('#logFileUpdated').html(response.logFileUpdated);
                        jQuery('#requiredForNextPoints').html(response.requiredForNextPoints);
                        jQuery('#researchpoints').html(response.researchpoints);
                        if(response.hasEnoughLogfiles == 'no') {
// @ TODO for Ronny: Equipment in Client (pilotSheet = SkillTree + kill ajax loader
                            pilotSheet.handleSkilltree("deactivateLogButton", label);
                        }
                        pilotSheet.handleSkilltree("showSkilltree");
                    } else if (type == 'answerFriendshipSL') {

                    }

                }
            }
        });

    }

    this.handleSkilltree = function(type, flag){
        var formValues = new Array();
        formValues['type'] = type;
        formValues['imgUrl'] = getImgUrl('imgUrl');
        var tag = 'new cv';
        switch(type){
            case 'showSkilltree':
                tooltip.destroyEventListerners();
                pilotSheet.ajaxLoader('show');
                this.handlePilotSheetAjax(formValues);
                break;
            case 'convertPoints':
                tooltip.destroyEventListerners();
                pilotSheet.ajaxLoader('show');
                var element = $('researchpoints');
                var current = element.innerHTML;
                formValues['label'] = flag;
                this.handlePilotSheetAjax(formValues);
                break;
            case 'deactivateLogButton':
                var logButton = $('researchPoints_button_1');
                var logArrow = $('arrow_logfile_1');
                var researchPointArrow = $('researchPoints_arrow_1');
                logArrow.id = 'arrow_logfile_0';
                researchPointArrow.id = 'researchPoints_arrow_0';
                var logButtonLink = logButton.firstChild;
                logButton.innerHTML = '';

                var logSpan = new Element('span', {
                    'class':'font_inactive'
                });

                logButton.appendChild(logSpan);

                var strongEle = new Element('strong', {});
                logSpan.appendChild(strongEle);
                strongEle.innerHTML= flag;
                logButton.id = 'researchPoints_button_0';
                break;
        }
    }

    this.sendSkillTreeUpdate = function(skill, e) {
        skillId = jQuery(e).attr("id");
        // deactivate pointerevent on skill to prevent sending several times
        document.getElementById(skillId).style.pointerEvents = 'none';
        Main.skillTreePurchaseLevelUp(skill);

    }

    this.updateSkillHasFinished = function() {
        // activate pointerevent after success from skill update
        document.getElementById(skillId).style.pointerEvents = 'auto';
    }

    this.setSkilltreeScrollbar = function(){
        jQuery('#skillTreeHorScrollable').jScrollPane();
    }

    // scroll the element horizontally based on its width and the slider maximum value
    this.scrollHorizontal = function(value, element, slider){
        element.scrollLeft = Math.round(value/slider.maximum*(element.scrollWidth-element.offsetWidth));
    }

    // show the link to the external PPP
    this.handleShowExternalPPPLink = function(){
        /*inviteIncentives.handleIncentives('showIncentivePage');*/
        if(jQuery('#userProfileInfoPopup').hasClass('hideinviteInfoPopup')){
            jQuery('#userProfileInfoPopup').removeClass('hideinviteInfoPopup');
            jQuery('#userProfileInfoPopup').addClass('showinviteInfoPopup');
        }
    }
}

var achievement = new Achievements();
function Achievements(){
    this.saveUserTitleChange = function(){
        jQuery('#editTitleForm').submit();
    };

    this.changeTitleDisplay = function(action, title, oldTitle, newTitle){
        jQuery('#achievementCurrentTitleLabel').html(title);
        jQuery('#' + oldTitle).removeClass('titleAchievementBoxSelected');
        jQuery('#' + newTitle).addClass('titleAchievementBoxSelected');
    };

    this.showFilter = function(){
        jQuery('#filter_dropdownLayer').toggle();
    }

    this.onMouseOver = function(id){
        jQuery('#' + id).addClass('filter_onMouseOver');
    }

    this.onMouseOut = function(id){
        jQuery('#' + id).removeClass('filter_onMouseOver');
    }

    this.selectedCategory = function(id){
        jQuery('.selectedCategory').removeClass('selectedCategory');
        jQuery('.selectedSubCategory').removeClass('selectedSubCategory');
        if(id.indexOf('activity') != -1){
            jQuery('#achievement_activity').addClass('selectedCategory');
            jQuery('#' + id).addClass('selectedSubCategory');
        }else if(id.indexOf('event') != -1){
            jQuery('#achievement_event').addClass('selectedCategory');
            jQuery('#' + id).addClass('selectedSubCategory');
        }else{
            jQuery('#' + id).addClass('selectedCategory');
        }
    }
}

var inviteIncentives = new PilotInviteIncentives();
function PilotInviteIncentives(){
    this.initialiseScrollBar = function(){
        jQuery('.scroll-pane').jScrollPane({showArrows: true});
    };


    this.busyLayer = function(flag) {
        var busyLayer = jQuery('#busyLayerPilotSheet');
        switch (flag) {
            case 'show':
                    busyLayer.css('display', 'block');
                    busyLayer.css('height', 1180);
                    busyLayer.css('width', 2000);
                    busyLayer.css('top', -500);
                    busyLayer.css('left', -500);
                break
            case 'hide':
                    busyLayer.css('display', 'none');
                    busyLayer.css('height', 0);
                    busyLayer.css('width', 0);
                    busyLayer.css('top', 0);
                    busyLayer.css('left', 0);
                break;
        }


    }

    this.hideInfoLayerPermanently = function(id){
        var val = document.inviteInfoDisplayOpton.inviteInfoCheckbox.checked;
        if(val){
            var formValues = new Array();
            formValues['type'] = 'hideInviteInfo';
            this.handleAjax(formValues);
            inviteIncentives.handleIncentives("setInfoValue", '',  1);
        }else{
            return;
        }
    }

    this.redirectToBonusPage = function()
    {
        redirect('/indexInternal.es?action=internalBonus');
    }

    this.handleIncentives = function(type, id, flag){
        if(id && id != ''){
           var element = jQuery('#' + id);
        }

        var inviteInfo = null;
        var inviteInfoInput = null;
        var formValues = new Array();
        var busyLayer = jQuery('#busy_layer');
        formValues['type'] = type;

        var inputs = jQuery('#inviteInfoForm :input');
        jQuery.each(inputs, function(){
            if(this.name == 'inviteInfo'){
                inviteInfo = jQuery(this).val();
            }
        });
        switch(type){
            case 'showIncentivePage':
                formValues['inviteType'] = 'Email';
                formValues['flag'] = flag;
                if(flag != 'callback'){
                    if(inviteInfo != 1 || inviteInfo ==''){
                        this.checkedIn = true;
                        //pilotSheet.initCustomInputElements();
                        inviteIncentives.handleIncentives('showInfoLayer', id);
                    }
                }
                /*if(jQuery('#inviteInfoCheckbox')){
                    jQuery('#inviteInfoCheckbox').addClass('styled');
                }*/
                this.handleAjax(formValues);
                tooltip.destroyEventListerners();
                pilotSheet.ajaxLoader('show');
                break;
            case 'closeInfoLayer':
                inviteIncentives.hideInfoLayerPermanently('inviteInfoDisplayOpton');
                if(element != null){
                    if(element.hasClass('showinviteInfoPopup')){
                        element.removeClass('showinviteInfoPopup');
                        element.addClass('hideinviteInfoPopup');
                    }
                }

                /*hideBusyLayer();*/
                inviteIncentives.busyLayer('hide');
                break;
            case 'showInfoLayer':
                /*showBusyLayer();*/
                inviteIncentives.busyLayer('show');
                if(element != null){
                    if(element.hasClass('hideinviteInfoPopup')){
                        element.removeClass('hideinviteInfoPopup');
                        element.addClass('showinviteInfoPopup');
                    }
                }
                break;
            case 'setInfoValue':
                   jQuery.each(inputs, function(){
                        if(this.name == 'inviteInfo'){
                            inviteInfo = jQuery(this).val(flag);
                        }
                    });
                break;
        }
    };

    this.handleRemoveInvitee = function(id, type, flag){
        var element = $(id);
        var formValues = new Array();
        formValues['type'] = type;
        switch(type){
            case 'handleImage':
                if(element.hasClassName('hideRemoveInvitee')){
                    element.removeClassName('hideRemoveInvitee');
                    element.addClassName('showRemoveInvitee');
                }else if(element.hasClassName('showRemoveInvitee')){
                    element.removeClassName('showRemoveInvitee');
                    element.addClassName('hideRemoveInvitee');
                }
                break;
            case 'imageEffect':
                switch(flag){
                    case 'rollin':
                        if(element.hasClassName('hideRemoveInvitee')){
                            element.removeClassName('hideRemoveInvitee');
                            element.addClassName('showRemoveInvitee');
                        }
                        if(element.hasClassName('removeInviteeInActive')){
                            element.removeClassName('removeInviteeInActive');
                            element.addClassName('removeInviteeActive');
                        }else if(element.hasClassName('removeInviteeActive')){
                            return;
                        }
                        break;
                    case 'rollout':
                        if(element.hasClassName('showRemoveInvitee')){
                            element.removeClassName('showRemoveInvitee');
                            element.addClassName('hideRemoveInvitee');
                        }
                        if(element.hasClassName('removeInviteeActive')){
                            element.removeClassName('removeInviteeActive');
                            element.addClassName('removeInviteeInActive');
                        }else if(element.hasClassName('removeInviteeInActive')){
                            return;
                        }
                        break;
                }
                break;
            case 'removeInvitee':
                var parts = id.split('_');
                var inviteeID = parts[1];
                var rightEle = $('middleRight_' + parts[1]);
                formValues['inviteeID'] = inviteeID;
                if(element && rightEle){
                    element.addClassName('hideListElement');
                    rightEle.addClassName('hideListElement');
                }
                this.handleAjax(formValues);
                break;
        }
    };

    this.handleAjax = function(formValues) {
        var type = formValues['type'];
        var inviteeId = formValues['inviteeID'];

        jQuery.ajax({
            type: 'POST',
            url: '/ajax/pilotprofil.php',
            dataType: 'json',
            data: {command: "handle", type: type, inviteeId: inviteeId, inviteType: inviteType, flag: flag},
            success: function(response) {
                if (response.result == 'OK') {

                }

            }
        });
    };

    this.handleLogBook = function(id, type, no){
        var logElementDiv = jQuery('#bonusLogBook');
        var logElementClose = jQuery('#closeButtonBonusLog');

        switch(type){
            case 'toggleLink':
                var logLink = jQuery('#'+id);
                if(logLink.hasClass('bonusLogBookLinkActive')){
                    logLink.removeClass('bonusLogBookLinkActive');
                    logLink.addClass('bonusLogBookLinkInActive');
                }else if(logLink.hasClass('bonusLogBookLinkInActive')){
                    logLink.removeClass('bonusLogBookLinkInActive');
                    logLink.addClass('bonusLogBookLinkActive');
                }
                break;
            case 'showLog':
                if(jQuery('#inviteLogCount').val() <= 0){
                    pilotSheet.editMessage('show', 'failed', 'bonusLog');
                }else{
                    jQuery('.jspVerticalBar').css('z-index', 1);
                    showBusyLayer();
                    if(logElementDiv.hasClass('hideBonusLogBook')){
                        logElementDiv.removeClass('hideBonusLogBook');
                        logElementDiv.removeClass('removeForm');
                        logElementDiv.addClass('showBonusLogBook');
                        logElementDiv.addClass('elevateForm');
                    }
                    if(logElementClose){
                        if(logElementClose.hasClass('removeForm')){
                            logElementClose.removeClass('removeForm');
                            logElementClose.removeClass('hideBonusLogBook');
                            logElementClose.addClass('showBonusLogBook');
                            logElementClose.addClass('elevateForm');
                        }
                    }
                    this.initialiseScrollBar();
                }
                break;
            case 'closeLogBook':
                if(logElementDiv){
                    if(logElementDiv.hasClass('showBonusLogBook')){
                        logElementDiv.removeClass('showBonusLogBook');
                        logElementDiv.addClass('hideBonusLogBook');
                        logElementDiv.addClass('removeForm');
                    }
                    if(logElementClose){
                        if(logElementClose.hasClass('elevateForm')){
                            logElementClose.removeClass('elevateForm');
                            logElementClose.removeClass('showBonusLogBook');
                            logElementClose.addClass('hideBonusLogBook');
                            logElementClose.addClass('removeForm');
                        }
                    }
                    hideBusyLayer();
                }
                break;
        }
    }
}

var pilotInvites = new PilotInvites();

function PilotInvites() {
    this.handleInvites = function(type, flag) {
        var formValues        = new Array();
        var element           = $('pilotInvitePage');
        var inviteTab         = $('inviteTab');
        var dailyLoginTab     = $('loginBonusTab');
        var subTabInvite      = $('subTabInvite');
        var invitePageDiv     = $('inviteContent')
        var dailyLoginPageDiv = $('loginBonus');
        
        formValues['type'] = type;
        
        if (type == 'hideInvitePage') {
            element.removeClassName('pilotInvitePageShow');
            subTabInvite.removeClassName('subTabLabelActive');
            inviteTab.removeClassName('inviteTabActive');
            inviteTab.addClassName('inviteTabInActive');
            element.addClassName('pilotInvitePageHide');
            subTabInvite.addClassName('subTabLabelInActive');
        }
    }

    this.handleShowInviteMask = function(messLabel, lang) {
        jQuery('#exposeMask').css('display', 'block');
        jQuery('#exposeMask').addClass('changeBGColor');

        var buttElement = jQuery('.button-area');

        var formEle = jQuery('#invite-form');
        formEle.css('display', 'block');

        var inviteSend = jQuery('#invite-send');
        inviteSend.html('');

        var imgTag = jQuery(document.createElement('img'))
            .attr({src: '/do_img/global/text_tf.esg?l=' + lang + '&s=13&t=pilot_invite_incentive_page_send_invitation&f=eurostyle_tmed&bgcolor=green&color=white'})
            .addClass('imgButtonMailInvite')
            .appendTo(inviteSend);

        var spanEle = jQuery(document.createElement('span')).appendTo(inviteSend);
        var divEle = jQuery(document.createElement('text')).addClass('messLabel').appendTo(spanEle).html(messLabel);

        var inviteNew = jQuery('.invite-new');
        inviteNew.html('');
        var spanEleNew = jQuery(document.createElement('span')).appendTo(inviteNew);
        var imgTagNew = jQuery(document.createElement('img'))
            .attr({src: '/do_img/global/text_tf.esg?l=' + lang + '&s=11&t=pilot_invite_incentive_page_invite_more&f=eurostyle_tmed&bgcolor=green&color=white'})
            .addClass('imgButtonMailInvite')
            .appendTo(spanEleNew);
    }

    this.showEmailInviteDialog = function(messLabel, lang, flag) {
        if(flag == 'external'){
            jQuery('#exposeMask').css('display', 'block');
            jQuery('#exposeMask').addClass('changeBGColor');
        }else{
           showBusyLayer();
        }

        var inviteDialog = jQuery('#invite-dialog');
        var buttElement = jQuery('.button-area');
        var shareDiv = jQuery('#share-invite-url');
        var formEle = jQuery('#invite-form');

        inviteDialog.css('display', 'block');
        formEle.css('display', 'block');
        shareDiv.css('display', 'block');

        var inviteSend = jQuery('#invite-send');
        inviteSend.html('');

        var imgTag = jQuery(document.createElement('img'))
            .attr({src: '/do_img/global/text_tf.esg?l=' + lang + '&s=13&t=pilot_invite_incentive_page_send_invitation&f=eurostyle_tmed&bgcolor=green&color=white'})
            .addClass('imgButtonMailInvite')
            .appendTo(inviteSend);

        var spanEle = jQuery(document.createElement('span')).appendTo(inviteSend);
        var divEle = jQuery(document.createElement('text')).addClass('messLabel').appendTo(spanEle).html(messLabel);

        var inviteNew = jQuery('.invite-new');
        inviteNew.html('');
        var spanEleNew = jQuery(document.createElement('span')).appendTo(inviteNew);
        var imgTagNew = jQuery(document.createElement('img'))
            .attr({src: '/do_img/global/text_tf.esg?l=' + lang + '&s=11&t=pilot_invite_incentive_page_invite_more&f=eurostyle_tmed&bgcolor=green&color=white'})
            .addClass('imgButtonMailInvite')
            .appendTo(spanEleNew);
    }
}

var buttonHandler = new ButtonHandler();
function ButtonHandler(){
    this.toggleButtons = function(buttonId, buttonClass, labelId){
        if(!$(buttonId).hasClassName(buttonClass + 'Active')){
            if($(labelId)){
                $(labelId).classNames().each(
                    function(name, index) {
                        if (name.endsWith('InActive')) {
                            $(labelId).removeClassName(name);
                            $(labelId).addClassName(name.sub("InActive", "Active"));
                        } else {
                            $(labelId).removeClassName(name);
                            $(labelId).addClassName(name.sub("Active", "InActive"));
                        }
                    }
                );
            }

            $(buttonId).classNames().each(
                function(name, index) {
                    if (name.endsWith('InActive')) {
                        $(buttonId).removeClassName(name);
                        $(buttonId).addClassName(name.sub("InActive", "RollOver"));
                    } else {
                        $(buttonId).removeClassName(name);
                        $(buttonId).addClassName(name.sub("RollOver", "InActive"));
                    }
                }
            );
        }
    }

    this.toggleCloseButton = function(id, className){
        var element = $(id);
        element.cleanWhitespace(element);
        if(!element.hasClassName(className + 'RollOver')){
            element.removeClassName(className + 'InActive');
            element.addClassName(className + 'RollOver');
        }else{
            element.removeClassName(className + 'RollOver');
            element.addClassName(className + 'InActive');
        }
    }

    this.clickedTabButton = function(id, number, className, labelID, classNameLabel, classNameLabelClicked){
        var tabArray = new Array();
        var tabLabelArray = new Array();

        while(number != 0){
            tabArray.push(className + number);
            tabLabelArray.push(classNameLabel + number);
            number--;
        }
        tabArray.each(function(item){
            if(item != id){
                if(jQuery('#' + item).hasClass('deactivateCursor')){
                    jQuery('#' + item).removeClass('deactivateCursor');
                    jQuery('#' + item).addClass('activateCursor');
                }
                jQuery('#' + item).removeClass(className + 'Active');
                jQuery('#' + item).removeClass(className + 'RollOver');
                jQuery('#' + item).addClass(className + 'InActive');
            } else {
                jQuery('#' + item).removeClass(className + 'InActive');
                jQuery('#' + item).removeClass(className + 'RollOver');
                jQuery('#' + item).addClass(className + 'Active');
            }
        });

        tabLabelArray.each(function(item){
            if(item != labelID){
                if(jQuery('#' + item)){
                    jQuery('#' + item).removeClass(item + 'Active');
                    jQuery('#' + item).addClass(item + 'InActive');
                }
            } else {
                jQuery('#' + item).removeClass(item + 'InActive');
                jQuery('#' + item).addClass(item + 'Active');
            }
        });
    }
}

var handleButtons = new HandleButtons();
function HandleButtons(){
    this.toggleCloseButton = function(id, className){
        var element = jQuery('#' + id);
        if(!element.hasClass(className + 'RollOver')){
            element.removeClass(className + 'InActive');
            element.addClass(className + 'RollOver');
        }else{
            element.removeClass(className + 'RollOver');
            element.addClass(className + 'InActive');
        }
    }
}

/**
 * externalPPP contains all functions that handle actions or user interactions with the external profile page
 * */
var externalPPP = new ExternalPilotProfilePage();

function ExternalPilotProfilePage() {
    this.toggleField = function(id) {
        var element = $(id);
        if (element.hasClassName('hideSection')) {
            element.removeClassName('hideSection');
            element.addClassName('showSection');
        } else if (element.hasClassName('showSection')) {
            element.removeClassName('showSection');
            element.addClassName('hideSection');
        }
        Scroller.updateAll();
    };

    this.busyLayer = function(flag) {
        var busyLayer = jQuery('#busyLayer');
        switch (flag) {
            case 'show':
                if (busyLayer != null) {
                    busyLayer.css('visibility', 'visible');
                    if (jQuery('#equipmentContainer') && jQuery('#equipmentContainer').hasClass('showElement')) {
                        busyLayer.css('height', 1180);
                    } else {
                        busyLayer.css('height', 900);
                    }
                }
                break
            case 'hide':
                if (busyLayer != null) {
                    busyLayer.css('visibility', 'hidden');
                    busyLayer.css('height', 0);
                }
                break;
        }


    }

    this.handleProfileSearch = function(type) {
        if(jQuery('#searchProfileField').val().length == 0){
            return;
        };

        if (jQuery('#searchProfileFieldStatus')) {
            if (jQuery('#searchProfileFieldStatus').hasClass('hideElement')) {
                jQuery('#searchProfileFieldStatus').removeClass('hideElement');
                jQuery('#searchProfileFieldStatus').addClass('showELement');
            }
            if (jQuery('#searchProfileFieldStatus').hasClass('searchProfileSuccess')) {
                jQuery('#searchProfileFieldStatus').removeClass('searchProfileSuccess');
                jQuery('#searchProfileFieldStatus').addClass('searchProfileAjaxLoader');
            }
            if (jQuery('#searchProfileFieldStatus').hasClass('searchProfileFailure')) {
                jQuery('#searchProfileFieldStatus').removeClass('searchProfileFailure');
                jQuery('#searchProfileFieldStatus').addClass('searchProfileAjaxLoader');
            }
        }

        var formValues = new Array();
        formValues['type'] = type;
        if (jQuery('#searchProfileField')) {
            formValues['profileUsername'] = jQuery('#searchProfileField').val();
        }

        var inputs = jQuery('#profileForm :input');
        jQuery.each(inputs, function() {
            if (this.name == 'profileID') {
                formValues['profileID'] = jQuery(this).val();
            }
            if (this.name == 'instanceID') {
                formValues['instanceID'] = jQuery(this).val();
            }
            if (this.name == 'language') {
                formValues['language'] = jQuery(this).val();
            }
        });

        if (type == 'searchProfileFromExternalPPP') {
            this.searchProfileFromExternalPPP(formValues);
        }
    }

    this.handleExternalPilotSheetAjax = function(formValues) {

        var jsonArr = {};
        jsonArr['command'] = 'checkPrivacySetting';
        for (key in formValues) {
            jsonArr[key] = formValues[key];
        }

        jQuery.ajax({
            type: 'POST',
            url: '/ajax/pilotprofil.php',
            dataType: 'json',
            data: jsonArr,
            success: function(response) {
                if (response.result == 'OK') {

                    if (response.status == 'forbidden') {
                        externalPPP.showAccessForbidden();
                    } else {
                        jQuery('#mainInfo').html(response.code);
                        if (formValues.tab == 'userInfo' || formValues.tab == 'clan') {
                            misc.initialiseScrollBar();
                        } else if (formValues.tab == 'equipment') {
                            externalPPP.switchConfigView(formValues.show, formValues.hide);
                            misc.handleTooltip("extras");
                            misc.handleTooltip("gears");
                            misc.handleTooltip("protocols");
                        } else if (formValues.tab == 'skilltree') {
                            misc.handleTooltip("skill");
                        }
                        externalPPP.hideShowLoader('hide');
                        externalPPP.showInfoArea();

                    }

                    externalPPP.resetAjaxRequestFlag();

                } else {
                    console.log('response.error');
                }
            }
        });
    }
    this.inviteAsFriend = function(formValues) {
        var jsonArr = {};
        jsonArr['command'] = 'inviteAsFriend';
        for (key in formValues) {
            jsonArr[key] = formValues[key];
        }
        jQuery.ajax({
            type: 'POST',
            url: '/ajax/pilotprofil.php',
            dataType: 'json',
            data: jsonArr,
            success: function(response) {
                if (response.result == 'ERROR') {
                    externalPPP.updateInviteButton("declined");
                }
            }
        });
    }
    this.answerFriendshipSL = function(formValues) {
        var jsonArr = {};
        jsonArr['command'] = 'answerFriendshipSL';
        for (key in formValues) {
            jsonArr[key] = formValues[key];
        }
        jQuery.ajax({
            type: 'POST',
            url: '/ajax/pilotprofil.php',
            dataType: 'json',
            data: jsonArr,
            success: function(response) {
                if (response.result == 'OK') {
                }
            }
        });
    }

    this.searchProfileFromExternalPPP = function(formValues) {
        var jsonArr = {};
        jsonArr['command'] = 'searchProfileFromExternalPPP';
        for (key in formValues) {
            jsonArr[key] = formValues[key];
        }
        jQuery.ajax({
            type: 'POST',
            url: '/ajax/pilotprofil.php',
            dataType: 'json',
            data: jsonArr,
            success: function(response) {
                if (response.result == 'OK') {
                    externalPPP.handleProfileSearchReturn(response.url, response.status);
                }
            }
        });
    }

    this.handleProfileSearchReturn = function(type, status) {
        if (type) {
            if (jQuery('#searchProfileFieldStatus')) {
                if (jQuery('#searchProfileFieldStatus').hasClass('searchProfileAjaxLoader')) {
                    jQuery('#searchProfileFieldStatus').removeClass('searchProfileAjaxLoader');
                    jQuery('#searchProfileFieldStatus').addClass('searchProfileSuccess');
                }
            }
            do_redirect(type, 'newWindow');
        } else {
            if (jQuery('#searchProfileFieldStatus')) {
                if (jQuery('#searchProfileFieldStatus').hasClass('searchProfileAjaxLoader')) {
                    jQuery('#searchProfileFieldStatus').removeClass('searchProfileAjaxLoader');
                    jQuery('#searchProfileFieldStatus').addClass('searchProfileFailure');
                }
            }
        }
        if (jQuery('#searchProfileField')) {
            jQuery('#searchProfileField').val(status)
        }
    }

    this.handleLanguageSelection = function() {
        if (jQuery.browser.msie) {
            jQuery('#languageBoxBody').css('padding-left', 0);
            jQuery('#languageBoxBody').css('width', 160);
        }
    }

    this.registrationAction = 'false';


    this.checked = false;

    this.switchConfigView = function(showId, hideId) {
        var showElement = jQuery('#' + showId);
        var hideElement = jQuery('#' + hideId);
        hideElement.removeClass('configBarClicked');
        showElement.addClass('configBarClicked');
    };

    this.handleFriendRequest = function(status, keyId) {
        var formValues = new Array();
        formValues['profileOwner'] = jQuery('#profileOwner').val();
        var openRequest = jQuery('#openRequest');
        var openRequestText = jQuery('#openRequestText');
        if (openRequest) {
            if (openRequest.hasClass('showElement')) {
                openRequest.removeClass('showElement');
                openRequest.addClass('hideElement');
                openRequestText.removeClass('hideElement');
                openRequestText.addClass('showElement');
            }
        }
        formValues['type'] = 'answerFriendshipSL';
        formValues['status'] = status;
        formValues['key'] = keyId;
        formValues['instanceID'] = jQuery('#instanceID').val();
        formValues['language'] = jQuery('#language').val();
        this.answerFriendshipSL(formValues);
    }

    this.handleFriendShipRequest = function() {
        var formValues = new Array();
        formValues['sessionOwner'] = jQuery('#sessionOwner').val();
        formValues['profileOwner'] = jQuery('#profileOwner').val();
        formValues['type'] = 'inviteAsFriend';

        var mainElement = jQuery('#addAsFriend');
        var labelImage = jQuery('#addAFriendLabel');
        var labelImageActive = jQuery('#addAsFriend');
        var labelImageInactive = jQuery('#addAsFriendLabelInactive');
        var statusMess = jQuery('#friendshipStatus');
        if (mainElement) {
            if (mainElement.hasClass('friendshipRequest')) {
                mainElement.removeClass('friendshipRequest');
                mainElement.addClass('spriteInactiveBig');
            }
        }
        if (labelImageActive) {
            if (labelImageActive.hasClass('showElement')) {
                labelImageActive.removeClass('showElement');
                labelImageActive.addClass('hideElement');
            }
            if (labelImageInactive.hasClass('hideElement')) {
                labelImageInactive.removeClass('hideElement');
                labelImageInactive.addClass('showElement');
            }
        }
        if (statusMess) {
            if (statusMess.hasClass('hideElement')) {
                statusMess.removeClass('hideElement');
                statusMess.addClass('showElement');
            }
        }

        formValues['instanceID'] = jQuery('#instanceID').val();
        formValues['language'] = jQuery('#language').val();
        this.inviteAsFriend(formValues);
    }


    this.handleStatusMessage = function(show, hide) {
        var elementShow = jQuery('#' + show);
        var elementHide = jQuery('#' + hide).css('display', 'none');
    };

    this.ajaxRequestSent = false;

    this.resetAjaxRequestFlag = function() {
        this.ajaxRequestSent = false;
    }
    this.updateInviteButton = function(status) {
        if('declined' == status) {
            message = Tools.Text.get('userInfo_userBlockContacts_text');
            jQuery('#profileInfoLeft').find('#friendshipStatus').text(message);
        }
    }

    this.handleDetailInfo = function(type, configID) {
        if (!this.ajaxRequestSent) {
            var formValues = {};

            var infoContainer = jQuery('#' + type + 'Container');
            var tab = jQuery('#' + type + 'Tab');
            var label = jQuery('#' + type + 'Label');
            var labelID = type + 'Label';

            var tabsArray = ['userInfoTab', 'clanTab', 'equipmentTab', 'skilltreeTab'];
            var tabsLabel = ['userInfoLabel', 'clanLabel', 'equipmentLabel', 'skilltreeLabel'];

            if (infoContainer && type != 'equipmentIn') {
                if (infoContainer.hasClass('showElement')) {
                    jQuery('#mainInfo').hide('slow');
                    infoContainer.removeClass('showElement');
                    infoContainer.addClass('hideElement');
                    tab.removeClass('infoTabsClicked');
                    tab.addClass('infoTabsEffect');
                    label.removeClass(labelID + 'Active');
                    label.addClass(labelID + 'InActive');
                    return;
                }
            }

            if (jQuery('#privacyError').css('display') == 'block') {
                jQuery('#privacyError').hide('slow');
            }

            jQuery.each(tabsArray, function() {
                if (jQuery('#' + this).hasClass('infoTabsClicked')) {
                    jQuery('#' + this).removeClass('infoTabsClicked');
                    jQuery('#' + this).addClass('infoTabsEffect');
                }
            });
            jQuery.each(tabsLabel, function() {
                if (jQuery('#' + this).hasClass(this + 'Active')) {
                    jQuery('#' + this).removeClass(this + 'Active');
                    jQuery('#' + this).addClass(this + 'InActive');
                }
            });

            tab.removeClass('infoTabsEffect');
            tab.addClass('infoTabsClicked');
            label.removeClass(labelID + 'InActive');
            label.addClass(labelID + 'Active');

            if (type == 'equipment' || type == 'equipmentIn') {
                type = 'equipment';
                switch (configID) {
                    case 1:
                        formValues['show'] = 'configBar1';
                        formValues['hide'] = 'configBar2';
                        break;
                    case 2:
                        formValues['show'] = 'configBar2';
                        formValues['hide'] = 'configBar1';
                        break;
                }
            }

            jQuery('#mainInfo').hide('slow');
            jQuery('#mainInfo').children(':first').removeClass('showElement');
            jQuery('#mainInfo').children(':first').addClass('hideElement');

            jQuery('#loadAnimation').show('slow');

            formValues['type'] = 'checkPrivacySetting';
            formValues['tab'] = type;
            formValues['configId'] = configID;
            formValues['sessionOwner'] = jQuery('#sessionOwner').val();
            formValues['profileOwner'] = jQuery('#profileOwner').val();
            formValues['instanceID'] = jQuery('#instanceID').val();
            formValues['language'] = jQuery('#language').val();
            formValues['baseHost'] = jQuery('#baseHost').val();
            this.ajaxRequestSent = true;
            this.handleExternalPilotSheetAjax(formValues);
        }
    }

    this.showAccessForbidden = function() {
        jQuery('#mainInfo').hide('slow');
        jQuery('#mainInfo').children(':first').removeClass('showElement');
        jQuery('#mainInfo').children(':first').addClass('hideElement');
        jQuery('#loadAnimation').hide('slow');
        jQuery('#privacyError').show('slow');
        jQuery('#privacyError').css('display', 'block');
        return;
    }

    this.repositionFooter = function() {
        var footer = jQuery('#bottomSection');
        if (footer) {
            if (!footer.hasClass('bottomSectionRollOut')) {
                footer.addClass('bottomSectionRollOut')
            }
        }
    }

    this.openShareContainer = function(id, flag) {
        var elementShow = jQuery('#' + id);
        if (flag == 'show') {
            externalPPP.busyLayer('show');
            if (elementShow) {
                if (elementShow.hasClass('hideHeader')) {
                    elementShow.removeClass('hideHeader');
                    elementShow.addClass('showHeader');
                }
            }
        } else if (flag == 'hide') {
            externalPPP.busyLayer('hide');
            if (elementShow) {
                if (elementShow.hasClass('showHeader')) {
                    elementShow.removeClass('showHeader');
                    elementShow.addClass('hideHeader');
                }
            }
        }
    };

    this.showInfoArea = function() {
        jQuery('#mainInfo').show('slow');
    }

    this.hideShowLoader = function(type) {
        if (type == 'show') {
            jQuery('#loadAnimation').show('slow');
        } else if (type == 'hide') {
            jQuery('#loadAnimation').hide('slow');
        }
    }

    this.toggleImprint = function(flag) {
        switch (flag) {
            case 'show':
                if (jQuery('#imprintContainer').hasClass('hideElement')) {
                    externalPPP.busyLayer('show');
                    jQuery('#imprintContainer').removeClass('hideElement');
                    jQuery('#imprintContainer').addClass('showElement');
                }
                break;
            case 'hide':
                if (jQuery('#imprintContainer').hasClass('showElement')) {
                    externalPPP.busyLayer('hide');
                    jQuery('#imprintContainer').removeClass('showElement');
                    jQuery('#imprintContainer').addClass('hideElement');
                }
                break;
        }
    }
}

var externalPPPAdvert = new PPPAdvert();
function PPPAdvert(){
    this.breakingNewsInterval = false;
    this.currentIconID        = 0;
    this.textSwitch        = 0;
    this.imageSwitch        = 0;
    this.titleSwitch        = 0;
    this.durationSwitch        = 0;
    this.maxIconID            = 0;
    this.ids                  = false;
    this.keys                 = false;
    this.textIcons            = false;
    this.images               = false;
    this.titles               = false;
    this.links                = false;
    this.durations            = false;
    this.language            = false;
    this.secondsCounter       = 0;
    this.titlePosition        = 12;

    this.setLanguage = function(language){
        this.language = language;
    }

    this.setMaxIconID = function(iconCount)
    {
        this.maxIconID = iconCount;
    };

     this.setIds = function(array)
    {
        this.ids = array;
    };

    this.setKeys = function(array)
    {
        this.keys = array;
    };


    this.setTextIcons = function(array)
    {
        this.textIcons = array;
    }

    this.setImages = function(array)
    {
        this.images = array;
    };

    this.setTitles = function(array)
    {
        this.titles = array;
    };

    this.setLinks = function(array)
    {
        this.links = array;
    };

    this.setDurations = function(array)
    {
        this.durations = array;
    };

    this.advertCon = null;
    this.mainCon = null;
    this.textImg = null;
    this.imgCon = null;
    this.arrowDiv = null;
    this.leftArrow = null;
    this.rightArrow = null;

    this.init = function()
    {
        this.advertCon = jQuery('#externalPPPHeaderLeftAd');
        this.mainCon = jQuery(document.createElement('div')).attr('id', 'mainCon').appendTo(this.advertCon);
        this.textImg = jQuery(document.createElement('img')).attr('id', 'textImg').appendTo(this.mainCon);
        this.imgCon = jQuery(document.createElement('img')).attr('id', 'imgCon').appendTo(this.mainCon);
        this.arrowDiv = jQuery(document.createElement('div')).attr('id', 'arrowDiv').addClass('hideElement').appendTo(this.mainCon);
        this.leftArrow = jQuery(document.createElement('div')).attr('id', 'leftArrow').appendTo(this.arrowDiv);
        this.rightArrow = jQuery(document.createElement('div')).attr('id', 'rightArrow').appendTo(this.arrowDiv);
    };

    this.switchInterval = null;
    this.start = function(){
        setInterval(function () {
            externalPPPAdvert.textImg.attr('src', externalPPPAdvert.textIcons[++externalPPPAdvert.textSwitch % externalPPPAdvert.maxIconID]);
            externalPPPAdvert.imgCon.attr('src', externalPPPAdvert.images[++externalPPPAdvert.imageSwitch % externalPPPAdvert.maxIconID]);
            externalPPPAdvert.imgCon.attr('title', externalPPPAdvert.titles[++externalPPPAdvert.titleSwitch % externalPPPAdvert.maxIconID]);
            }, externalPPPAdvert.durations[++externalPPPAdvert.durationSwitch % externalPPPAdvert.maxIconID]);
    }

    this.showAdvert = function(){
        this.imgCon.attr('src', 'yes');
    }

    this.showArrows = function(){

    }
}

var misc = new Miscellaneous();


function Miscellaneous(){
    this.initialiseScrollBar = function(){
        jQuery('.scroll-pane').jScrollPane({showArrows: true});
    };

    this.testForScrollbar = function(id){
        if($(id)){
            var element = $(id).childElements();
            if(!$(element[0]).hasClassName('scroll-innerBox')){
                Scroller.reset(id);
            }
        }
    };

    this.testToolie = function(){
        /*alert('hhhh');*/
    }

    this.handleTooltip= function(selector){
        var offsetEle
        var targetEle = null;
        var tooltipEle = null;
        jQuery('.' + selector).each(function(){
            var id = this.id;
            if(id == 'skill_23b' || id == 'skill_21b' || id == 'skill_16b' || id == 'skill_15'){
                targetEle = 'leftMiddle';
                tooltipEle = 'rightMiddle';
            }else if(id == 'skill_19' || id == 'skill_22b'){
                targetEle = 'leftBottom';
                tooltipEle = 'rightBottom';
            }else if(id == 'skill_1' || id == 'skill_5' || id == 'skill_5a' || id == 'skill_5b' || id == 'skill_6' || id == 'skill_11' || id == 'skill_20' || id == 'skill_22a'){
                targetEle = 'rightBottom';
                tooltipEle = 'leftBottom';
            }else{
                targetEle = 'rightMiddle';
                tooltipEle = 'leftMiddle';
            }
            var content = jQuery('#'+id+'_info').html();
            jQuery(this).qtip({
                content: content,
                position:{
                  target: 'mouse',
                  corner:{
                      target:targetEle,
                      tooltip: tooltipEle
                  },
                  adjust:{
                      mouse: true
                  }
                },
                style:{
                    width:265,
                    background:'none',
                    border: 'none'
                }
            })
        })
    };

    this.eventMouseOver = null;
    this.handleInviteButton = function(){
        var element = $('social-invite-default-container').getElementsBySelector('span');
        element.observe('mouseover', function(){
        })
    };

    this.limitTextSize = function(field, limit){
           if(field.value.length > limit){
               field.value = field.value.substring(0, limit);
           }
    };

    this.createJsCssElement = function(filename, filetype){
        var fileref;
        switch(filetype){
            case 'js':
                fileref=document.createElement('script')
                fileref.setAttribute("type","text/javascript")
                fileref.setAttribute("src", filename)
                break;
            case'css':
                fileref=document.createElement("link")
                fileref.setAttribute("rel", "stylesheet")
                fileref.setAttribute("type", "text/css")
                fileref.setAttribute("href", filename)
                break;
        }
        return fileref;
    };

    this.replaceJsCssFile = function(oldFilename, newFilename, filetype){
        var targetAttribute;
        var elementsOfInterest;
        var newElement;

        switch(filetype){
            case 'js':
                targetAttribute = 'src';
                elementsOfInterest = $$('script');
                break;
            case 'css':
                targetAttribute = 'href';
                elementsOfInterest = $$('link');
                break;
        }

        elementsOfInterest.each(function(item){
            var itemElement = $(item);
            if(itemElement && itemElement.getAttribute(targetAttribute) != null && itemElement.getAttribute(targetAttribute).indexOf(oldFilename) != -1){
                newElement = misc.createJsCssElement(newFilename, filetype);
                itemElement.parentNode.replaceChild(newElement, itemElement);
            }
        });
    }

    this.addJsCssFile = function(newFilename, filetype){

        var targetAttribute;
        var elementsOfInterest;
        var newElement;

        switch(filetype){
            case 'js':
                targetAttribute = 'src';
                elementsOfInterest = $$('script');
                break;
            case 'css':
                targetAttribute = 'href';
                elementsOfInterest = $$('link');
                break;
        }
        var itemElement = $(elementsOfInterest[0]);
        newElement = misc.createJsCssElement(newFilename, filetype);
        itemElement.parentNode.appendChild(newElement);
    }


    this.removeJsCssFile = function(filename, filetype){
        var targetAttribute;
        var elementsOfInterest;
        var newElement;
        switch(filetype){
            case 'js':
                targetAttribute = 'src';
                elementsOfInterest = $$('script');
                break;
            case 'css':
                targetAttribute = 'href';
                elementsOfInterest = $$('link');
                break;
        }

        elementsOfInterest.each(function(item){
            var itemElement = $(item);
            if(itemElement && itemElement.getAttribute(targetAttribute) != null && itemElement.getAttribute(targetAttribute).indexOf(filename) != -1){
                itemElement.parentNode.removeChild(itemElement);
            }
        });
    }

    this.customScrollbar = function(){
        var scrollbar = new Control.ScrollBar('scrollbar_content','scrollbar_track');
    }

    this.customScrollbarLog = function(){
        var scrollbarLogBook = new Control.ScrollBar('scrollbar_content_logBook','scrollbar_track_logBook');
    }
}

// DEPRECATED - use Shop.openPaymentWindow instead!
function openExternal (address) {
    //alert('openExternal is a deprecated function!');
    var external = window.open(address.replace(/\+/g,"%2B"), "paymentglobal", "width=1000,height=680,left=100,top=200");
    external.focus();
}

function schliessen(layerID) {
    $(layerID).hide();
    hideBusyLayer();
}

function checkKey(code) {
    if (code==27) {
        if ($("infoPopup").style.display = "block") {
            $("infoPopup").style.display = "none";
            hideBusyLayer();
        }
    }
}

function showMessageDeleteOtherQuests(text) {
    alert(text);
}

function number_format( number, decimals, dec_point, thousands_sep ) {

    var n = number, prec = decimals, dec = dec_point, sep = thousands_sep;
    n = !isFinite(+n) ? 0 : +n;
    prec = !isFinite(+prec) ? 0 : Math.abs(prec);
    sep = sep == undefined ? ',' : sep;

    var s = n.toFixed(prec),
        abs = Math.abs(n).toFixed(prec),
        _, i;

    if (abs > 1000) {
        _ = abs.split(/\D/);
        i = _[0].length % 3 || 3;

        _[0] = s.slice(0,i + (n < 0)) +
              _[0].slice(i).replace(/(\d{3})/g, sep+'$1');

        s = _.join(dec || '.');
    } else {
        s = abs.replace('.', dec_point);
    }

    return s;
}

function isChrome() {
    return  navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
}

function showAchievementTooltip(tooltip, toolttipId) {
    var pos = jQuery('#'+toolttipId).position();

    if (tooltip == 'general') {
        offsetLeft = 65;
        offsetTop = 15;
    }

    toolTipElement = jQuery('#tooltip_'+toolttipId);
    toolTipElement.css({
        position: 'absolute',
        top: (pos.top + offsetTop) + 'px',
        left: (pos.left + offsetLeft) + 'px'
    });

    toolTipElement.show();
}

function hideAchievementTooltip(toolttipId) {
    jQuery('#tooltip_'+toolttipId).hide();
}

function showUserInfo(userID) {
    Main.loadUserInfo(userID);
}

// Quick fix to reduce the number of HTTP calls
var hangarTooltipCache      = {},
    tooltipsLoading         = {};

/**
 * Queries the server for hangar tooltip HTML.
 *
 * @param hangarId Id Hangar
 */
function showHangarInfo(hangarId) {
    var tooltipHtml;

    if ('undefined' === typeof hangarTooltipCache[hangarId]) {
        // Check wether the HTML has already been cached.
        if ('undefined' !== typeof tooltipsLoading[hangarId]) {
            // Tooltip is loading; don't query the server!
        } else {
            // Store that this tooltip is being loaded
            tooltipsLoading[hangarId] = true;
            // Get tooltip HTML from server
            User.loadHangarInfo(hangarId);
        };
    } else {
        // Get tooltip HTML from cache
        tooltipHtml = hangarTooltipCache[hangarId];

        // Call callback function that XAJAX would call
        hangarInfoLayerLoaded(hangarId, tooltipHtml, false);
    };
}

function showClanInfo(clanID) {
    Main.loadClanInfo(clanID);
}


function hangarInfoLayerLoaded (hangarId, tooltipHtml, storeInCache) {
    var tooltipContainer    = jQuery('#hangarInfoLayer'),
        storeInCache        = ('undefined' === typeof storeInCache || true === storeInCache) ? true : false;

    if ('undefined' !== typeof tooltipHtml) {
        tooltipContainer.html(tooltipHtml);

        if (storeInCache) {
            hangarTooltipCache[hangarId] = tooltipHtml;
        };
    };

    tooltipContainer.css({'top': m.y-15 + 'px', 'left': m.x-150 + 'px'}) //.show();

    if(tooltipContainer.attr("parent") == "hangarSlots"){

        jQuery('#switchActiveHangar').hide();
        jQuery('#viewActiveHangar').show();

    } else if (tooltipContainer.attr("parent") == "header_hangar_slots"){

        jQuery('#switchActiveHangar').show();
        jQuery('#viewActiveHangar').hide();
    }
}

var m = {x: 0, y: 0};

/**
 * Only interact with jQuery if it is loaded.
 */
if ('undefined' !== typeof jQuery) {
    jQuery(document).ready(function(){
        executeDocumentReadyFunctions();
    });
};

function executeDocumentReadyFunctions () {
    jQuery("*[showUser]").live('click', function(e) {
	   if(e) {
		   m.x = e.pageX;
		   m.y = e.pageY;
	   }
	   showUserInfo(jQuery(this).attr('showUser'));
	   jQuery('.qtip-active').hide();
   });

    // Only use jQuery 'livequery' plugin if it is loaded.
    if ('function' === typeof jQuery.livequery) {
        jQuery("*[showUser]").livequery(function() {
    		var title = jQuery(this).find('.userInfoName').attr('title');
            if(title != '') {
                jQuery(this).qtip({content: title,style: 'dohdr',position: {target: 'mouse'}});
                jQuery(this).find('.userInfoName').attr('title', '');
            }
        });
    };

    jQuery("*[showHangarInfo]").live('mouseover', function(e) {
        if(e) {
            m.x = e.pageX;
            m.y = e.pageY;
        }
        showHangarInfo(jQuery(this).attr('showHangarInfo'));

        //set in container a new atrribute that maks where the hangar info context layer is called from.
        jQuery("#hangarInfoLayer").attr("parent", jQuery(this).parent("div").attr("id"));

    });

    jQuery("*[showClanInfo]").live('click', function(e) {
        if(e) {
            m.x = e.pageX;
            m.y = e.pageY;
        }
        showClanInfo(jQuery(this).attr('showClanInfo'));

        //set in container a new atrribute that maks where the hangar info context layer is called from.
        jQuery("#clanInfoLayer").attr("parent", jQuery(this).parent("div").attr("id"));

    });

    /**
     * Standard way for implementing javascript events.
     * plesase dont populate event more this file.
     *
     * [newJavascriptObject].initialize();
     *
     */

        // Initialize Tools.Popup
    Tools.Popup.Initialize();


} // executeDocumentReadyFunctions


function gotoWriteMessage(recipient, type) {
	if(recipient.constructor == Array) recipient = recipient.join('_');
	typeID = (type=='user')?'recipientID':'clanID';
    do_redirect('indexInternal.es?action=internalMessaging&subaction=writeMessage&'+typeID+'='+recipient);
}

//function userInfoLayerInvite(invitedID)
//{
//    var buttonElm = jQuery('#userInfoButtonAddToFriends');
//    buttonElm.attr('onclick', 'return false;');
//    buttonElm.addClass('userInfoFriendRequested');
//    buttonElm.css('cursor', 'default');
//    buttonElm.qtip('destroy');
//    jQuery('.qtip-active').hide();
//
//    pilotSheet.inviteAsFriend(invitedID, 'base');
//}

function userInfoLayerLoad(userName, userIsBlocked) {

    jQuery("#userInfoUsername").attr("title",decodeURIComponent(userName));
    jQuery("#userInfoUsername").text((decodeURIComponent(userName).substring(0,28)));

    //Set tooltips
    jQuery('#userInfoButtonAddToFriends').qtip({content: header_ttips.userInfo_addFriend,style: 'dohdr',position: {target: 'mouse'}});
    jQuery('#userInfoButtonSendMessage').qtip({content: header_ttips.userInfo_sendMessage,style: 'dohdr',position: {target: 'mouse'}});
    jQuery('#userInfoButtonShowProfil').qtip({content: header_ttips.userInfo_showProfile,style: 'dohdr',position: {target: 'mouse'}});
    if(userIsBlocked) {
        jQuery('#userInfoButtonBlacklistUser').qtip({content: header_ttips.userInfo_blacklistUserListed,style: 'dohdr',position: {target: 'mouse'}});
    } else {
        jQuery('#userInfoButtonBlacklistUser').qtip({content: header_ttips.userInfo_blacklistUser,style: 'dohdr',position: {target: 'mouse'}});
    }
    jQuery('.userInfoFriendRequested').qtip('destroy');

    //position layer
    jQuery('#userInfoLayer').css({'top': m.y-15 + 'px', 'left': m.x-150 + 'px'}).show();

    //delay 6 seconds prior fadeOut
    jQuery('#userInfoBox').delay(6000).fadeOut();

}

/**
 *
 *
 * function call back for clan context info layer
 *
 */
function clanInfoLayerLoaded(clanName) {

    jQuery("#clanInfoClanName").attr("title",decodeURIComponent(clanName));
    jQuery("#clanInfoClanName").text((decodeURIComponent(clanName).substring(0,28)));

    //Set tooltips
    jQuery('#clanInfoButtonApplyMembership').qtip({content: header_ttips.clanInfo_contactClan,style: 'dohdr',position: {target: 'mouse'}});
    //jQuery('.userInfoFriendRequested').qtip('destroy');

    //position layer
    jQuery('#clanInfoLayer').css({'top': m.y-15 + 'px', 'left': m.x-150 + 'px'}).show();

    //delay 3 seconds prior fadeOut
    jQuery('#clanInfoBox').delay(3000).fadeOut();


}

var PepsiPromotion = {
    validateCode: function(errMsg) {
        var code = jQuery('#pepsiPromoCode').val();
        if (code.length < 8 || code.length > 10) {
            jQuery('#pepsiPromoInfoIcon').addClass('promo_pepsi_icon_error');
            jQuery('#pepsiPromoCodeMessage').addClass('promo_pepsi_font_error');
            jQuery('#pepsiPromoCode').css('color','#ff0000');
            jQuery('#pepsiPromoCodeMessage').html(errMsg);
            return false;
        }

        showBusyLayer();
        Main.showSpinner();

        jQuery('#pepsiPromoCodeMessage').removeClass('promo_pepsi_font_success promo_pepsi_font_error promo_pepsi_icon_success promo_pepsi_icon_error');
        jQuery('#pepsiPromoCodeMessage').empty();
        jQuery.ajax({
            type: 'POST',
            url: '/ajax/promo.php',
            dataType: 'json',
            data: {'command': 'validateCode', 'code': code},
            success: function(response) {
                jQuery('#pepsiPromoCode').css('color','white');
                if (response.result == 'OK') {
                    jQuery('#pepsiPromoInfoIcon').addClass('promo_pepsi_icon_success');
                    jQuery('#pepsiPromoCodeMessage').addClass('promo_pepsi_font_success');
                    jQuery('#pepsiPromoCode').css('color','#3CE800');
                } else {
                    jQuery('#pepsiPromoInfoIcon').addClass('promo_pepsi_icon_error');
                    jQuery('#pepsiPromoCodeMessage').addClass('promo_pepsi_font_error');
                    jQuery('#pepsiPromoCode').css('color','#ff0000');
                }
                jQuery('#pepsiPromoCodeMessage').html(response.message);
                Main.hideSpinner();
                hideBusyLayer();
            },
            error: function(){}//'' //DoMessaging.getInstance().systemError
        });
    }
}

var arenaHandler = new ArenaHandler();
function ArenaHandler()
{
    this.signup = function(userId, arenaId)
    {
        var firstname = jQuery('#firstname').val();
        if(firstname == "") {
            jQuery('#firstname').addClass('error');
            return;
        }
        jQuery('#firstname').removeClass('error');

        var lastname = jQuery('#lastname').val();
        if(lastname == "") {
            jQuery('#lastname').addClass('error');
            return;
        }
        jQuery('#lastname').removeClass('error');

        if(!jQuery('#tcs').attr('checked')) {
            jQuery('#tcsContainer').addClass('error');
            return;
        }
        jQuery('#tcsContainer').removeClass('error');

        this.saveSignup(userId, arenaId, firstname, lastname);
    }

    this.saveSignup = function(userId, arenaId, firstName, lastName)
    {
        jQuery.ajax({
            type: 'POST',
            url: '/ajax/system.php',
            dataType: 'json',
            data: {'command': 'signupArena', 'userId': userId, 'arenaId': arenaId, 'firstName': firstName, 'lastName' : lastName},
            success: function(response) {
                jQuery('#tcsContainer').hide();
                jQuery('#button_signup').hide();
                jQuery('#bn_text').hide();
                if (response.result == 'OK') {
                    jQuery('#bn_success').show();
                    jQuery('#button_main').show();
                } else {
                    jQuery('#bn_error').show();
                    jQuery('#button_main').show();
                }

            },
            error: function(){}//'' //DoMessaging.getInstance().systemError
        });
    }
}
