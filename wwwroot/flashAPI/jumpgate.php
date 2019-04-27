<?php
include_once( '../core/core.php' );

if ($System->isLoggedIn()) {
    if (isset($_GET['gate'])) {
        $REQUESTED_GATE_ID = $_GET['gate'];

        $PARTS = $System->User->GalaxyGates->getParts($REQUESTED_GATE_ID);
        $PREPARED = $System->User->GalaxyGates->getGatePrepared($REQUESTED_GATE_ID);

        if ($PREPARED) {
            $PARTS = array();
            $EQ = $System->User->GalaxyGates->getEquivalentGate($REQUESTED_GATE_ID);
            $MAX = $System->User->GalaxyGates->GATE_PARTS[$EQ];
            for ($i = 1; $i <= $MAX; $i++) {
                array_push($PARTS, $i);
            }
        }
        displayGateParts($REQUESTED_GATE_ID, $PARTS);
    }
}
else {
    $System->error_handler->throwError(ErrorID::ACCESS_DENIED);
}

function displayGateParts($GGID, $PARTS)
{
    $merged_image = imagecreatetruecolor(235, 290);

    imagesavealpha($merged_image, true);
    $color = imagecolorallocatealpha($merged_image, 0, 0, 0, 127);
    imagefill($merged_image, 0, 0, $color);

    foreach ($PARTS as $PART) {
        $partImage = imagecreatefrompng('../resources/images/gg/gate_' . $GGID . '_' . $PART . '.png');
        imagealphablending($partImage, true);
        imagesavealpha($partImage, true);
        imagecopy($merged_image, $partImage, 0, 0, 0, 0, 235, 290);
        imagedestroy($partImage);
    }


    header('Content-Type: ' . image_type_to_mime_type(IMAGETYPE_PNG));
    imagepng($merged_image);
}