<?php

    require_once(__DIR__."/../../classes/DAO/CoursesDAO.php");
    require_once(__DIR__."/../functions.php");
    require_once(__DIR__."/../Courses/Course.php");

    class Course{
        private static self $instance;

        public static function getInstance(){
            if(!isset(self::$instance)){
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function showCourses(){
            $courses = CoursesDAO::getInstance()->findCourses();
            $showCourse = getTemplate("courses.html", "templates/Courses/");
            
            $course = "";
            foreach($courses as $item){
                $course = $course . parseTemplate($showCourse, [
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