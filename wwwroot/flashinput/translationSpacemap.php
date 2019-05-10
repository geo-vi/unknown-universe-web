<?php
include_once("../core/core.php");
header("Content-type: text/xml");

//CHANGE THAT FOR EACH PHP FILE
$TRANSLATION_XML = 'translationSpacemap.xml';

$PATH = PROJECT_DOCUMENT_ROOT . '/core/translations/';
$PATH .= strtolower($System->translation->LANGUAGE_SHORT) . '/';
$PATH .= $TRANSLATION_XML;

if (file_exists($PATH)) {
    //IF TRANSLATION FOUND ECHO IT
    echo file_get_contents($PATH);
} else {
    //DEFAULT FALLBACK
    $PATH = PROJECT_DOCUMENT_ROOT . '/core/translations/en/' . $TRANSLATION_XML;
    if (file_exists($PATH)) {
        echo file_get_contents($PATH);
    }
}