<?php

    class Debug {
        public static function see($o) {
            echo "<pre>";
            var_dump($o);
            echo "</pre>";
        }
    }

?>