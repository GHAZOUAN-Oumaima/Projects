<?php
    include_once "../Model/model.inc.php";
    include_once "../View/viewform.inc.php";
    include_once "../Controller/control.php";

    class Login extends viewform{
        private $login;
        private $pwd;
        private $model;
        private $view;
        private $control;

        public function __construct(){
            $this->model= new Model();
        }

        public function loginCheck(){
            $this->login=filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
            $this->pwd=filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $sql="SELECT * FROM users WHERE login = ?";
            $query=$this->model->prepare($sql);
            $query->execute([$this->login]);
            $result=$query->fetch();
            if (empty($result)){
                header('location:../view/login.html');
                exit();
            }
            return $result;
        }

        public function passCheck(){
            $result=$this->logincheck();
            if (!password_verify($this->pwd, $result['password'])){
                header('location:../view/login.html');
                exit();
            }
            switch($this->login){
                case 'admin':
                    session_start();
                    $_SESSION['user'] = $this->login;
                    header('location:../controller/control.inc.php');
                    break;
                
                default:
                    session_start();
                    $_SESSION['user'] = $this->login;
                    header('location:../view/logincheck.html');
                    break;
            }
        }
    }
    $login=new Login();
    $login->passCheck();
?>
