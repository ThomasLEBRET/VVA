<?php

require_once("classes/donnees/Database.php");

require_once("Utilisateur.php");

include("requetesSQL.php");

    /**
     * Classe static ORM pour la classe objet Utilisateur 
     */
    class ORMUtilisateur extends Database {
                
        /**
         * Retourne un tableau contenant l'ensemble des comptes sous forme d'objets Utilisateur
         */
        public static function getAllAccounts() {
            global $selectAllUsers;

            $users = self::select($selectAllUsers, [], 'Utilisateur', false);

            return $users;
        }

        /**
         * Retourne un entier représentant le nombre d'activité à charge pour un utilisateur en fonction de son nom de compte et de son mot de passe (s'applique pour un encadrant)
         */
        public static function getNbActivitesEnCharge() {
            global $countActivitesEncadrant;

            $n = self::count($countActivitesEncadrant, 
            [
                Session::get('nomcompte'), 
                Session::get('prenomcompte')
            ]);
            return $n;
        }

        /**
         * Retourne un tableau contenant les activités à la charge d'un encadrant en fonction de son nom de compte et de son prénom de compte
         * sous la forme d'objet Activite
         * @param void
         * @return array Le tableau des activités
         */
        public static function getActivitesSousEncadrant() {
            global $activitesSousEncadrant;

            $activites = self::select($activitesSousEncadrant,
            [
                Session::get('nomcompte'),
                Session::get('prenomcompte')
            ],
            'Activite',
            false
        );
            return $activites;
        }

        /**
         * Retourne un tableau contenant des objets Activite où le vacancier possède une inscription non annulée
         * @param void
         * @return array Le tableau des activités
         */
        public function getActivitesValidesVacancier() {
            global $activitesValidesVacancier;

            $activites = self::select($activitesValidesVacancier, 
            [
                Session::get('user')
            ],
            'Activite',
            false
        );
            return $activites;
            
        }

        /**
         * Connecte un utilisateur
         * @param Superglobal Un objet Superglobal représentant la variable $_POST
         * @return bool true si la connection s'est opérée pour l'utilisateur, false sinon
         */
        public function connexion($params) {
            global $selectUser;

            $login = $params->get("login");
            $password = $params->get("password");

            $user = self::select($selectUser, [$login, $password], 'Utilisateur', true);

            if(Session::get('typeprofil') != NULL) {
                return true;
            }
            return false;
        }
    }

?>