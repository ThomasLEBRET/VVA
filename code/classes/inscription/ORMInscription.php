<?php

require_once("classes/donnees/Database.php");

require_once("Inscription.php");

require_once("classes/utilisateur/Utilisateur.php");

include("requetesSQL.php");

/**
 * Classe ORM static pour la classe objet Inscription
 */
class ORMInscription extends Database {

    /**
     * Renvoi l'inscription d'un utilisateur 
     * @param string la clé primaire de l'utilisateur 
     * @param int le numéro de l'activité
     * @return Inscription un objet Inscription
     */
    public static function get(string $user, int $noact) {
        global $getInscription;

        return self::select($getInscription, [$user, $noact], 'Inscription', 1);
    } 

    /**
     * Met à jour l'inscription à l'activité d'un utilisateur 
     * @param int le numéro de l'inscription
     * @return bool true si la modification a réussi, false sinon
     */
    public static function unscribeActRegisteredUser(int $noinscrip) {

        global $unscribeUserForActivite;

        if(self::update($unscribeUserForActivite, [$noinscrip])) 
            return true;

        return false;
    }

    /**
     * Met à jour l'inscription d'un utilisateur en fonction de son ancien numéro d'inscription
     * @param int son ancien numéro d'inscription
     * @return true si la modification a réussi, false sinon
     */
    public static function againRegister(int $noinscrip) {
        global $registerAgainUser;
        
        if(self::update($registerAgainUser, [$noinscrip])) 
            return true;

        return false;
    }

    /**
     * Récupère la liste des utilisateurs inscrits à une activité
     * @param int le numéro de l'activité
     * @return array un tableau d'Utilisateur inscrit à l'activité $noAct
     */
    public static function getInscritsActivite(int $noAct) {
        global $getInscritsActivite;

        return self::select($getInscritsActivite, [$noAct], 'Utilisateur', false);
    }

}

?>