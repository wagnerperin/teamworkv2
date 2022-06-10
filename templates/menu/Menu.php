<?php
    require_once(__DIR__."/../../classes/DAO/CategoryDAO.php");
    require_once(__DIR__."/../functions.php");
    require_once(__DIR__."/../submenu/SubMenu.php");
    class Menu{
        private static self $instance;

        public static function getInstance(){
            if(!isset(self::$instance)){
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function generate(){
            $main = CategoryDAO::getInstance()->getCategories(1);
            $menuItemTemplate= getTemplate("menu_item.html", "templates/menu/");
            
            $menus = "";
            foreach($main as $item){
                $subMenu = SubMenu::getInstance()->generate($item->categoryId);

                $menus = $menus . parseTemplate($menuItemTemplate, [
                    'name' => $item->name,
                    'subMenu' => $subMenu
                ]);
            }

            return $menus;
        }
    }
?>