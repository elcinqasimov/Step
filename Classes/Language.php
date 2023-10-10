<?php
////////////////////////////////////////
//                                    //
// Kriminalistik Tədqiqatlar İdarəsi  //
//        baş mühəndis-proqramçı      //
//          Elçin Qasımov             //
//                                    //
////////////////////////////////////////  


class Langs 
{
    

    /** @var string $currentLang for detecting current language */

    public $currentLang = '';

    /** @var array $allLangs all possible languages */
    public $allLangs ;

    /**
     * Langs constructor.
     */
    public function __construct() 
    {   

        // get lang from url
        if(isset($_GET['lang']) && $this->_langIsAvailable($_GET['lang'])) {
            setcookie("lang", $_GET['lang'], time() + 3600 * 24 * 30);

            // store current language
            $this->currentLang = $_GET['lang'];

            return;
        }

        // get lang from cookie
        if(isset($_COOKIE['lang']) && $this->_langIsAvailable($_COOKIE['lang'])) {

            // store current language from COOKIE
            $this->currentLang = $_COOKIE['lang'];
            return;
        }

        // if no lang is set
        if(empty($this->currentLang)) {
            // get first two letters from string
            $browserLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

            // tries to detect browser language, if browser language exists in possible languages array and if language file exists
            if($this->_langIsAvailable($browserLang)) {

                // set current language from browser language
                $this->currentLang = $browserLang;
                return;
            }
        }

        // set it to english by default
        $this->currentLang = 'az';
    }

    /**
     * @return string
     */
    public function getCurrentLang()
    {
        return $this->currentLang;
    }

    /**
     * @param string $lang
     * @param string $lang
     * @return bool
     */
    public function _langIsAvailable($lang) 
    {
        
        global $allLangs;
        return in_array($lang, $allLangs) && $this->_langFileExist($lang);
    }

    /**
     * @param string $lang
     * @return bool
     */
    private function _langFileExist($lang) 
    {
        return file_exists('./Lang/'.strtolower($lang.'.php'));

    }
}