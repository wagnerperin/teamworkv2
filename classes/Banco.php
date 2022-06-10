<?php
    class Banco{
        private static $instance;

        public static function getConnection(){
            if(!isset(self::$instance)){
                self::$instance = new PDO('mysql:host=localhost;dbname=teamwork', "root", "");
            }
            return self::$instance;
        }
    }
?>