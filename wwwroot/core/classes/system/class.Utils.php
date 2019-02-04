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
     *
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

    /**
     * shortcut to die + json_encode with 'message' as the only field
     *
     * `die(json_encode(['message' => $msg]))`
     *
     * @param string $msg
     */
    public static function dieM($msg)
    {
        die(json_encode(['message' => $msg]));
    }

    /**
     * **die**s with **S**tatus
     *
     * shortcut to response + die + json_encode
     * with 'message' as the only response field
     *
     * `http_response_code($code);`
     *
     * `die(json_encode(['message' => $msg]))`
     *
     * @param int    $code
     * @param string $msg
     */
    public static function dieS($code, $msg)
    {
        http_response_code($code);
        die(json_encode(['message' => $msg]));
    }

}
