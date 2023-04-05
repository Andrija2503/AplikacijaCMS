<?php 

require_once 'trait/connect.php';

class User {
    public $loggedUser =NULL;
    public $register_result = NULL;
    use connectdb;

    public function registerUser(){
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $level = $_POST['level'];

        $sql = "INSERT INTO users VALUES(NULL, ?, ?, ?, ?, ?)";
        $query = $this->db()->prepare($sql);
        $query->execute([$f_name,$l_name, $password, $email, $level]);

        if($query){
            $this->register_result = true;
        }
    }

    public function logUser(){
        $email = $_POST['login_email'];
        $password = $_POST['login_password'];

        $sql = "SELECT * FROM users where email = ? and password = ?";
        $query = $this->db()->prepare($sql);
        $query->execute([$email,$password]);
        $loggedUser = $query->fetch(PDO::FETCH_OBJ);

        if($loggedUser != NULL){
            $_SESSION['loggedUser'] = $loggedUser;
            $this->loggedUser = $loggedUser;
        }

    }

    
}



?>