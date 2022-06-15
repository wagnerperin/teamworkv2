<?php

    require_once(__DIR__."/../Banco.php");

    class CoursesDAO {
        private static $instance;

        public static function getInstance() {
            if(self::$instance === null) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function findCourses(){
            $stmt= Banco::getConnection()->query("
                SELECT * FROM Courses 
                LEFT JOIN Users ON Users.userId=Courses.creatorId",
            );
            
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function findCourse($id){
            $stmt= Banco::getConnection()->prepare("
                SELECT * FROM Courses 
                LEFT JOIN Users ON Users.userId=Courses.creatorId
                WHERE Courses.courseId = :id"
            );

            $stmt->bindParam('id', $id);
            
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ);
        }

    }

?>