<?php
    class Banco{
        private static $instance;

        public static function getConnection(){
            if(!isset(self::$instance)){
                self::$instance = new PDO('mysql:host=localhost;dbname=teamwork', "root", "mscode@2022");
            }
            return self::$instance;
        }
    }
?>