<?php

require_once("class/datas/Database.php");
include("sqlRequests.php");
require_once("Inscription.php");
require_once("class/user/User.php");

class ORMInscription extends Database {

    /**
     * get an Inscription object with his PK
     * @return Inscription an Inscription object
     */
    public static function get($user, $noact) {
        global $getInscription;

        return self::select($getInscription, [$user, $noact], 'Inscription', 1);
    } 

    public static function unscribeActRegisteredUser($noinscrip) {

        global $unscribeUserForActivite;

        if(self::update($unscribeUserForActivite, [$noinscrip])) 
            return true;

        return false;
    }

    public static function againRegister($noinscrip) {
        global $registerAgainUser;
        
        if(self::update($registerAgainUser, [$noinscrip])) 
            return true;

        return false;
    }

    public static function getInscritsActivite(int $noAct) {
        global $getInscritsActivite;

        return self::select($getInscritsActivite, [$noAct], 'User', false);
    }

}

?>