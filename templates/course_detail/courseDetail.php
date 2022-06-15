<?php

    require_once(__DIR__."/../../classes/DAO/CoursesDAO.php");
    require_once(__DIR__."/../functions.php");

    class CourseDetail{
        private static self $instance;

        public static function getInstance(){
            if(!isset(self::$instance)){
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function generate($courseId){
            $template = getTemplate('course_detail.html', 'templates/course_detail/');
            $details = CoursesDAO::getInstance()->findCourse($courseId);

            $output = parseTemplate($template, [
                'image' => $details->image,
                'title' => $details->title,
                'subtitle' => $details->subtitle,
                'description' => $details->description,
                'name' => $details->name,
                'courseId' => $courseId
            ]);

            return $output;

        }
        
    }

?>