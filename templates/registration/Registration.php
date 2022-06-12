<?php
    require_once("templates/functions.php");

    class Registration{
        private static self $instance;

        public static function getInstance(){
            if(!isset(self::$instance)){
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function registration(){
            $records = getTemplate("default.html", "templates/");
            $record = getTemplate("registration.html", "templates/registration/");

            $records = $record . parseTemplate($record, [
                'content' => $record
            ]);


            return $record;
        }
    }


?>