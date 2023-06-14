<?PHP 
include_once "../model/model.inc.php";
class control{
        private $action;
        private $model;
        private $view;
        public function __construct(){
            $this->model= new Model();
            $this->action="all";
        }
        public function allClientAction()
    {
        session_start();
        if(!$_SESSION["login"])
            header("Location: controller.inc.php");

        $tabemp = $this->model->allClient();
        $nbe = count($tabemp);
        require '../view/viewAllClients.php';
    }
        public function validAddClient(){
        $a=array($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['email'],$_POST['num_telephone'],$_POST['ville'],
        $_POST['code_postal'],$_POST['password']);
        
        
        $b=array($_POST['email'],$_POST['password']);
      
        
        
       $this->model->validAddClient($a);
       $this->model->validAddUser($b);
       header("Location: ../View/login.html");
    
    }
    public function signOut()
    {
        session_start();
        session_destroy();
        header("Location:controller.inc.php");
    }
    public function loginAction()
    {
       
            $this->login=array($_POST['login']);
            $this->pwd=$_POST['password'];
           
            $query=$this->model->db->prepare('SELECT * FROM users WHERE login = ?');
            $query->execute($this->login);
            $result=$query->fetch();
            if (empty($result)){
                
                header('location:../view/login.html');
                exit();
            }
            
           
            if (  strcmp ($this->pwd,$result['password'])!=0  ){
                header('location:../view/login.html');
                exit();
            }
            elseif ($this->login =='oumaghazouan@gmail.com') {
                header('location:../view/viewall.inc.php');
            }
            else{
          header('location:../view/form_manuel.html');}
        }
    
    public function verifAction()
    {
        
        $login = $_POST['login'];
        $password = $_POST['password'];
        $model = new Model();
        $result = $model->login($login, $password);
        $user = $this->model->login();
        $exist = count($user);
        echo "exist";
        session_start();
        if($exist==0){
            echo"log off";
            $_SESSION["connect"]=false;
            header("Location: control.inc.php?action=login");
        }
        else{
            if($user[0]["password"]==$_POST["password"]){
                echo"log on";
                $_SESSION["connect"]=true;
                
                $_SESSION["login"]=$user[0]["login"];
                
                header("Location: controller.inc.php?action=allClients");
            }
            else{
                echo"log off";
                $_SESSION["connect"]=false;
                header("Location: control.inc.php?action=login");
            }
        }
    }
    public function deletClient()
    {
        session_start();

        $code = $_POST["id_del"];
        $this->model->deletClient($code);

        $_SESSION["supe"] = 1;
        header("location:controller.inc.php?action=allClients");

    }
    public function editClient()
    {
        session_start();
        $_SESSION["id_client"]= $_POST["id_client"];
        $code = $_POST["id_client"];
        $client=$this->model->editClient($code);
        require '../view/viewEditClient.php';
    }
    public function updateClient()
    {
        session_start();

        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $adresse=$_POST['adresse'];
        $email=$_POST['email'];
        $num_telephone=$_POST['num_telephone'];
        $ville=$_POST['ville'];
        $code_postal=$_POST['code_postal'];
        $password=$_POST['password'];
        $id = $_SESSION["id_client"];
        $client = array($nom,$prenom,$adresse,$email,$num_telephone,$ville,$code_postal,$password);

        $this->model->updateClient($client);

        header("Location: controller.INC.php?action=allClients");


        function authenticate() {
            if (!isset($_SESSION['user_id'])) {
                header('Location: login.php');
                exit();
            }
        
            // Vérifiez si l'utilisateur a le rôle d'administrateur
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT role FROM users WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $user_id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($result['login'] !== 'oumaghazouan@gmail.com') {
                header('Location: catalogue_admin.html');
                exit();
            }
        }

    }
    public function addClient()
    {
        require '../view/form_client.html';
    }



    public function action()
    {
        $action = "login";
        
        if(isset($_POST['action'])) $action = $_POST['action'];

        switch($action)
        {
            case 'login':
                $this->loginAction();
                break;

            case 'verif':
                
                $this->verifAction();
                break;

            case 'allClients':
                $this->allClientAction();
                break;

            case 'signOut':
                $this->signOut();
                break;
            
            case 'deleteClient':
                $this->deleteClient();
                break;

            case 'editClient':
                $this->editClient();
                break;

            case 'addClient':
                $this->addClient();
                break;

            case 'validAddClient':
                $this->validAddClient();
                break;

            case 'updatClient':
                $this->updatClient();
                break;
        }
    }
}
$c1=new control();
$c1->action();