<?php

    require_once(__DIR__."/../../../classes/DAO/CoursesDAO.php");
    require_once(__DIR__."/../../functions.php");

    class CourseItems{
        private static self $instance;

        public static function getInstance(){
            if(!isset(self::$instance)){
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function generate(string $courseName = "", int $categoryId = 0, int $limit = 8){
            $courses = CoursesDAO::getInstance()->findCoursesWithFilters($courseName, $categoryId, $limit);
            $courseItemsTemplate = getTemplate("course_items.html", "templates/show_courses/course_items/");
            
            $course = "";
            foreach($courses as $item){
                $course = $course . parseTemplate($courseItemsTemplate, [
                    'title' => $item->title,
                    'courseId' => $item->courseId,
                    'image' => $item->image,
                    'name' => $item->name
                ]);

            }

            return $course;

        }

        public function userCourses($userId){
            $courses = CoursesDAO::getInstance()->findCoursesByUserId($userId);
            $courseItemsTemplate = getTemplate("course_items.html", "templates/show_courses/course_items/");
            
            $course = "";
            foreach($courses as $item){
                $course = $course . parseTemplate($courseItemsTemplate, [
                    'title' => $item->title,
                    'courseId' => $item->courseId,
                    'image' => $item->image,
                    'name' => $item->name
                ]);

            }

            return $course;
        }       
    }

?>