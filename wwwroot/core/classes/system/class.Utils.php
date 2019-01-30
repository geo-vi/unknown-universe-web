<?php

class Utils
{

    /**
     * getPathByLootId Function
     * gets Image Path by LootID
     *
     * @param        $LootID
     * @param string $View
     *
     * @param string $Level
     * @return string
     */
    public static function getPathByLootId($LootID, $View = "top", $Level = "")
    {
        $pathArray = explode('_', $LootID);

        $imageLink = PROJECT_HTTP_ROOT . "resources/images/items/";
        foreach ($pathArray as $key => $pathItem) {
            if ($key + 1 == count($pathArray)) {
                $imageLink = $imageLink . $pathItem;
            } else {
                $imageLink = $imageLink . $pathItem . "/";
            }
        }

        if ($Level != "") {
            return $imageLink . '-' . $Level . '_' . $View . '.png';
        } else {
            return $imageLink . '_' . $View . '.png';
        }
    }

}