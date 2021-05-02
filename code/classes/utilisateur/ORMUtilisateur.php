<?php

require_once("classes/donnees/Database.php");

require_once("Utilisateur.php");

include("requetesSQL.php");

    class ORMUtilisateur extends Database {
                
        /**
         * Get all user accounts
         */
        public function getAllAccounts() {
            global $selectAllUsers;

            $users = self::select($selectAllUsers, [], 'Utilisateur', false);

            return $users;
        }

        public function getNbActivitesEnCharge() {
            global $countActivitesEncadrant;

            $n = self::count($countActivitesEncadrant, 
            [
                Session::get('nomcompte'), 
                Session::get('prenomcompte')
            ]);
            return $n;
        }

        public function getActivitesSousEncadrant() {
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
         * function to login user where he valid login form
         * @param  Parameters $params a $_POST array issue from the Parameters class
         * @return bool       true if success login, false otherwise
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