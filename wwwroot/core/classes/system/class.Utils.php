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
     * @return string
     */
    public static function getPathByLootId($LootID, $View = "top", $Level = "")
    {
        $pathArray = explode('_', $LootID);

        $imageLink = PROJECT_HTTP_ROOT . "do_img/global/items/";
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