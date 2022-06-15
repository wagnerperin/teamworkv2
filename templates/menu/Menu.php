<?php
    require_once(__DIR__."/../../classes/DAO/CategoryDAO.php");
    require_once(__DIR__."/../functions.php");
    require_once(__DIR__."/submenu/SubMenu.php");
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
            $menuTemplate= getTemplate("menu.html", "templates/menu/");
            $menuItemTemplate = getTemplate("menu_item.html", "templates/menu/");
            
            $menus = "";
            foreach($main as $item){
                $subMenu = SubMenu::getInstance()->generate($item->categoryId);

                $menus = $menus . parseTemplate($menuItemTemplate, [
                    'name' => $item->name,
                    'subMenu' => $subMenu
                ]);
            }

            $right_menu = '';
            if(isset($_SESSION['logedIn'])){
                $loggedInMenuTemplate = getTemplate('loggedIn.html', 'templates/menu/rightmenu/');
                $right_menu = parseTemplate($loggedInMenuTemplate, [
                    'name' => $_SESSION['name'],
                    'userId' => $_SESSION['userId']
                ]);
            } else {
                $right_menu = getTemplate('loggedOut.html', 'templates/menu/rightmenu/');
            }


            $output = parseTemplate($menuTemplate, [
                'menu_items' => $menus,
                'right_menu' => $right_menu
            ]);
            

            return $output;
        }
    }
?>