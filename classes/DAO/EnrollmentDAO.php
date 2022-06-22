<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require_once(__DIR__ . "/../Banco.php");

    require_once(__DIR__ . "/../models/Enrollment.php"); 

    class EnrollmentDAO {
        private static $instance;

        public static function getInstance() {
            if(self::$instance === null) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function save(Enrollment $enrollment) {

            $stmt = Banco::getConnection()->prepare("
                INSERT INTO Enrollment (enrollId, userId, courseId, eval, result) 
                VALUES (:enrollId, :userId, :courseId, NULL, 0)
            ");
            $stmt->bindParam("enrollId", $enrollment->enrollId);
            $stmt->bindParam("userId", $enrollment->userId);
            $stmt->bindParam("courseId", $enrollment->courseId);
            
            $stmt->execute();
        }
        
    }