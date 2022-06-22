<?php
    class Enrollment {
        public int $userId;
        public int $courseId;
        public int $eval;
        public int $result;

        public function __construct(int $userId, int $courseId, int $eval = 0, int $result = 0){
            $this->userId = $userId;
            $this->courseId = $courseId;
            $this->eval = $eval;
            $this->result = $result;
        }
    }