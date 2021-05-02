<?php

    /**
     * Classe static permettant de débuguer une variable ou un résultat de requête avec formattage de l'affichage
     */
    class Debug {
        public static function see($o) {
            echo "<pre>";
            var_dump($o);
            echo "</pre>";
        }
    }

?>