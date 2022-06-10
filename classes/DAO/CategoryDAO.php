<?php
    require_once(__DIR__."/../Banco.php");
    class CategoryDAO{
        public static self $instance;

        public static function getInstance(){
            if(!isset(self::$instance)){
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function getCategories($categoryId){
            $stm = Banco::getConnection()->query("
                SELECT * FROM Categories 
                WHERE parentCategoryId =\"$categoryId\"", PDO::FETCH_OBJ
            );
            
            $stm->execute();

            return $stm->fetchAll();

        }

    }
?>