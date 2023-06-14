<?php
require '../newnew/model.php'; 

class Ctrl {
    private $action;
    private $model;
    private $vue;
    
    public function __construct(){
        $this->model = new model();
        $this->action = "all";
    }
    
    public function allEmployesAction() {
        $employes = $this->model->allEmployes();
        require '../newnew/allEmployes.php';
    }

    function deleteEmployeAction(){ ///
        $par = $_GET['id'];
        $this->model->deleteEmploye($par);//
        //header('Location: Ctrl.php');
    }
    // function formProdAction(){
    //     require 'views/FormNewEmploye.php';
    // }
    function addNewEmployeAction(){
        $data = array(NULL,
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['sexe'],
        $_POST['adresse'],
        $_POST['dateNaissance'],
        $_POST['numServ']);
        $this->model->addNewEmploye($data);
        header('Location: ctrl.php');
    }
    function UpdateEmployeAction(){
        $this->model->updateEmploye($_GET['nom']);
        header('Location: Ctrl.php');
    }
    function copierEmpAction(){
        $emp = $this->model->oneEmploye($_GET['nom']);
        require '../newnew/FormUpdateEmploye.php';
    }
    function Action(){
        $action="all";
        if(isset($_GET['action'])){
        $action = $_GET['action'];}
        switch ($action) {
            case 'addEmp':
                $this->addNewEmployeAction();
                break;
            // case 'oneEmp':
            //     $this->oneProdAction();
            //     break;
            case 'delEmp':
                $this->deleteEmployeAction();
                break;
            case 'copEmp':
                $this->copierEmpAction();
                break;
            case 'ediEmp':
                $this->UpdateEmployeAction();
                break;
            default :
                $this->allEmployesAction();
                break;
        }
    }
}
$controlleur = new Ctrl();
$controlleur->Action();
?>