<?php
    class User {
        public string $name;
        public string $email;
        public string $cpf;
        public string $password;
        public int $userType;
        public string $createdAt;

        public function __construct(string $name, string $email, string $cpf, string $password, int $userType){
            $this->name = $name;
            $this->email = $email;
            $this->cpf = $cpf;
            $this->password = password_hash($password, PASSWORD_BCRYPT);
            $this->userType = $userType;
            $dataAtual = new DateTime();
            $this->createdAt = $dataAtual->format("Y-m-d");
        }
    }
?>