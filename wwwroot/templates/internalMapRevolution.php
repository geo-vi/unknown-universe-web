<div class="page-content">
    <div id="page-container" class="map-container"></div>

    <script>
        <?php
        if(!$System->User->__get('CLIENT_VERSION')){
        ?>
        flashembed("page-container",
            {
                "src": "<?=PROJECT_HTTP_ROOT?>spacemap/loadingscreen.swf",
                "version": [11, 0],
                "expressInstall": "<?=PROJECT_HTTP_ROOT?>swf_global/expressInstall.swf",
                "width": "1140px",
                "height": "675px",
                "wmode": "direct",
                "bgcolor": "#000000",
                "id": "preloader",
                "allowfullscreen": "true",
                "allowFullScreenInteractive": "true"
            },
            {
                "lang": "en",
                "loadingClaim": "UNIV3RSE",
                "userID": "<?=$System->User->PLAYER_ID?>",
                "sessionID": "<?=session_id()?>",
                "basePath": "spacemap",
                "pid": "390",
                "resolutionID": "<?=$System->User->__get('ASSETS_VERSION')?>",
                "boardLink": "?boardLink",
                "helpLink": "?helpLink",
                "chatHost": "<?=PROJECT_WEB_IP?>",
                "cdn": "<?=PROJECT_HTTP_ROOT?>",
                "useHash": "1",
                "host": "<?=PROJECT_WEB_IP?>",
                "localGS": "0",
                "browser": "Chrome",
                "fullscreen": "1",
                "errortracking": "1",
                "gameXmlHash": "8308af173e550899b2c22cc7a7334f00",
                "resourcesXmlHash": "2bb6860545fe461c6607203218288a00",
                "profileXmlHash": "e6c5f6627f9a7b9bb7bf5471e08a1500",
                "loadingscreenHash": "ddc84a3e9bd358b9af65859114631900",
                'gameclientHash': "none",
                "gameclientPath": "spacemap",
                "loadingscreenAssetsXmlHash": "1c540d399333ca7cc1755735a6082100",
                "showAdvertisingHint": "",
                "gameclientAllowedInitDelay": "100",
                "eventStreamContext": "eyJwaWQiOjM5MCwidWlkIjoxNjAwNTI5NjUsInRpZCI6IjMyYjY5Y2FhYzg3MWU1MmVhNTg4ZmIyZjA4NjY0ZmIzIiwiaWlkIjoiN2VjYzhjYjQxZTg5M2EwMTE1YzQ5NzhhNTM5OWY5ODMiLCJzaWQiOiI3YjA2MmIxNTQ2OGE1ZWNlMmU2NTAzMzI5ODNkNDYwOCIsImN0aW1lIjoxNDAzNTM0NDQ5NjE3fQ",
                "useDeviceFonts": "1",
                "factionID": "1",
                "autoStartEnabled": "0",
                "mapID": "<?=$System->User->Hangars->CURRENT_HANGAR->SHIP_MAP_ID?>",
                "allowChat": "1"
            });
        <?php
        }else{
        ?>
        flashembed("page-container",
            {
                "src": "http://dev.univ3rse.com/newclient/spacemap/preloader.swf",
                "version": [11, 0],
                "expressInstall": "http://dev.univ3rse.com/newclient/swf_global/expressInstall.swf",
                "width": "1140px",
                "height": "675px",
                "wmode": "direct",
                "bgcolor": "#000000",
                "id": "preloader",
                "allowfullscreen": "true",
                "allowFullScreenInteractive": "true"
            },
            {
                "lang": "us",
                "userID": "<?=$System->User->PLAYER_ID?>",
                "sessionID": "<?=session_id()?>",
                "basePath": "spacemap",
                "pid": "89",
                "boardLink": "",
                "helpLink": "",
                "loadingClaim": "cri11ple",
                "chatHost": "<?=PROJECT_WEB_IP?>",
                "cdn": "http://dev.univ3rse.com/newclient/",
                "useHash": "1",
                "host": "127.0.0.1",
                "browser": "Chrome",
                "fullscreen": "1",
                "gameXmlHash": "",
                "resourcesXmlHash": "252475c240ec76a4e1e0ea41861f4200",
                "profileXmlHash": "d77d1a04740e7a5b23d0602dd1c30300",
                "languageXmlHash": "47342756a7914febc0a3562435d2ab00",
                "loadingscreenHash": "9f1d0689a62675eb04e5edc65788c900",
                "gameclientHash": "900ad0c95299418c7138aec826259200",
                "gameclientPath": "spacemap",
                "loadingscreenAssetsXmlHash": "1c540d399333ca7cc1755735a6082100",
                "showAdvertisingHint": "",
                "gameclientAllowedInitDelay": "10",
                "eventStreamContext": "",
                "useDeviceFonts": "0",
                "display2d": "0",
                "autoStartEnabled": "0",
                "mapID": "<?=$System->User->Hangars->CURRENT_HANGAR->SHIP_MAP_ID?>",
                "allowChat": "1"
            });
        <?php
        }
        ?>
    </script>
</div>