<?php
use DB\MySQL;

class Translation
{
    private $LANGUAGE_LOOT_ID = 'translations_en';
    public $LANGUAGE_NAME = 'English';
    public $LANGUAGE_SHORT = 'en';
    public $LANGUAGE_ID = 1;

    private $LOADED_FILES = [];

    public $TRANSLATIONS = [];

    /** @var MySQL  */
    private $mysql;

    function __construct($mysql)
    {
        $this->mysql = $mysql;

        if(isset(getallheaders()['Accept-Language'])){
            $_SERVER['HTTP_ACCEPT_LANGUAGE'] = getallheaders()['Accept-Language'];
        }

        if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
            $LANG = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            $LANG_ID = (int) $this->getLanguageID($LANG);
            if($LANG_ID) {
                $this->setLanguage($LANG_ID);
            }
        }
    }


    public function setLanguage($ID){
        if($ID == $this->LANGUAGE_ID) return true;

        $Language = $this->getLanguage($ID);
        if($Language && !empty($Language) && isset($Language[0])){
            //SET LANGUAGE DATA
            $this->LANGUAGE_NAME = $Language[0]['NAME'];
            $this->LANGUAGE_ID = $Language[0]['ID'];
            $this->LANGUAGE_LOOT_ID = $Language[0]['LOOT_ID'];
            $this->LANGUAGE_SHORT = $Language[0]['SHORTCODE'];

            //RELOAD LOADED FILES
            $this->TRANSLATIONS = [];
            foreach ($this->LOADED_FILES as $FILE){
                $this->loadTranslation($FILE);
            }
            return true;
        }else{
            return false;
        }
    }

    public function getLanguage($ID){
        return $this->mysql->QUERY('SELECT * FROM server_languages WHERE ID = ?', array($ID));
    }

    public function getLanguageID($SHORT_CODE) {
        $result = $this->mysql->QUERY('SELECT * FROM server_languages WHERE SHORTCODE = ?', array($SHORT_CODE));
        if(isset($result[0])){
            return $result[0]['ID'];
        }else{
            return false;
        }
    }

    public function getLanguages(){
        return $this->mysql->QUERY('SELECT * FROM server_languages');
    }

    /**
     * @param $File
     */
    public function loadTranslation($File){
        $pathArray = explode('_', $this->LANGUAGE_LOOT_ID);

        $PATH = PROJECT_DOCUMENT_ROOT."core/";
        foreach ($pathArray as $key => $pathItem){
            $PATH .= $pathItem."/";
        }
        $PATH .= $File;

        try {
            if(!file_exists($PATH)) return;

            $XML_STRING = file_get_contents($PATH);
             if($XML_STRING){
                $XML = simplexml_load_string($XML_STRING);
                /* @var $translation SimpleXMLElement */
                foreach ($XML->children() as $translation){
                    $ID = (string) $translation->attributes()->ID;
                    $this->TRANSLATIONS[$ID] = (string) $translation;
                }
                $this->LOADED_FILES[] = $File;
            }
        }
        catch (Exception $exception){
            DEBUG ? var_dump($exception) : '';
        }
    }

    public function translate($TRANSLATE_ID){
        if(isset($this->TRANSLATIONS[$TRANSLATE_ID])){
            return $this->TRANSLATIONS[$TRANSLATE_ID];
        }else{
            return $TRANSLATE_ID;
        }
    }
}