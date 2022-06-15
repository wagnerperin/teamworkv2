<?php
    require_once(__DIR__."/../../../classes/DAO/CategoryDAO.php");
    require_once(__DIR__."/../../functions.php");
    class SubMenu{
        private static self $instance;

        public static function getInstance(){
            if(!isset(self::$instance)){
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function generate($parentCategoryId){
            $submenus = CategoryDAO::getInstance()->getCategories($parentCategoryId);

            $subMenuItemTemplate = getTemplate("submenu_item.html", "templates/menu/submenu/");
            
            $subMenu = "";
            foreach($submenus as $item){
                $subMenu = $subMenu . parseTemplate($subMenuItemTemplate, ['item' => $item->name]);
            }

            return $subMenu;
        }
    }
?>