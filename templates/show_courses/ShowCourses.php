<?php
    require_once(__DIR__."/../functions.php");
    require_once("course_items/CourseItems.php");
    class ShowCourses{
        private static self $instance;

        public static function getInstance(){
            if(!isset(self::$instance)){
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function userCourses($userId){
            $showCourses = getTemplate("show_courses.html", "templates/show_courses/");

            return parseTemplate($showCourses, [
                'showCourse' => CourseItems::getInstance()->userCourses($userId)
            ]);
        }

        public function generate(string $courseName = "", int $categoryId = 0, int $limit = 8){
            $showCourses = getTemplate("show_courses.html", "templates/show_courses/");

            return parseTemplate($showCourses, [
                'showCourse' => CourseItems::getInstance()->generate($courseName, $categoryId, $limit)
            ]);
        }
    }

?>