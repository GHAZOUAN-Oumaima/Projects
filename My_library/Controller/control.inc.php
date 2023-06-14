<?php
    include_once "../model/model.inc.php";
    include_once "../view/viewall.inc.php";
    
   

    class ControlManuel {
        private $action;
        private $model;
        private $view;

        public function __construct(){
            $this->model= new Model();
            $this->action="all";
        }

        public function indexAction(){
            $manuels= manuel::findALl($this->pdo);
            include('views/index.php');
        }
        public function form_manuel(){
            include('views/form_manuel.html');
        }
        
        public function allManuelsAction(){
            session_start();
            if(!$_SESSION["email"])
            
            $manuels=$this->model->viewAllManuels();
            $nbr=count($manuels);
            $this->view=new ViewAll("Tous les manuels");
            $this->view->all($manuels);
            $this->view->display();
           
        }
        public function oneManuelAction(){
            $id=$_GET["id"];
            $manuels=$this->model->oneManuel($id);
            $this->view=new ViewAll("Search: $id");
            $this->view->one($manuels);
            $this->view->display();
        }
        public function oneManuelNameAction(){
            $titre=$_GET["titre_manuel"];
            $manuels=$this->model->oneManuelName($titre);
            $this->view=new ViewAll("Search: $titre");
            $this->view->one($manuels);
            $this->view->display();
        }
        public function oneMatiereManuelAction(){
            $matiere=$_GET["matière"];
            $manuels=$this->model->oneMatiereManuel($matiere);
            $this->view=new ViewAll("Search: $matiere");
            $this->view->one($manuels);
            $this->view->display();
        }

        public function deleteManuelIDAction($id){ 
            
            echo "yes";
            
            $this->model->deleteManuelID($id);
            
           header('location: ../View/supp.html');
           
        }

        public function deleteManuelNameAction(){
            session_start();
            $nom=$_GET["nom"];
            $this->model->deleteManuelName($nom);
            $_SESSION["supe"] = 1;
            header('location:control.inc.php');
        }
        public function editManuelAction()
    {
       $code=$_POST['id'];
        
       /* $manuel=$this->model->editManuel($code);**/
       $data=$this->model->oneManuel($code);
        require '../view/viewidit.inc.php';
    }

        public function updateManuelAction(){
            $titre_manuel=$_POST["titre_manuel"];
            $description = $_POST["description"];
            $matière = $_POST["matière"];
            $niveau=$_POST['niveau'];
            $édition=$_POST['édition'];
            $prix=$_POST['prix'];
            $quantité_de_stock	=$_POST['quantité_de_stock	'];
            $manuel = array($titre_manuel,$description,$matière,$niveau,$édition,$prix,$quantité_de_stock);
            $this->model->updateManuel($manuel );
            header('location:control.inc.php');
        }
        public function addManuelAction()
    {
        require '../view/viewAddManuel.php';
    }


    public function validAddManuelAction()
{
    $titre_manuel=$_POST["titre_manuel"];
    $description = $_POST["description"];
    $matière = $_POST["matière"];
    $niveau=$_POST['niveau'];
    $édition=$_POST['édition'];
    $prix=$_POST['prix'];
   
    $quantité_de_stock	=$_POST['quantité_de_stock'];
    
    
    $manuel=array($titre_manuel,$description,$matière,$niveau,$édition,$prix,$quantité_de_stock);
    $this->model->addManuel($manuel);

    header("Location: control.inc.php");
}
public function acheterAction($idProduit) {
    // Appeler la méthode du modèle pour effectuer l'achat
    $this->modele->effectuerAchat($idProduit);

    // Répondre avec un code de statut HTTP approprié (par exemple, 200 pour OK)
    http_response_code(200);
}
        
        public function action(){
            $action='all';

            

            if(isset($_POST['action']))
            $action=$_POST['action'];

            switch($action){

                case 'all':
                    $this->allManuelsAction();
                    break;
                case 'del':
                    $this->deleteManuelIDAction($_POST['id']);
                    break;
                case 'one':
                    $this->oneManuelAction();
                    break;
                case 'index':
                    $this->indexAction();
                    break;
                case 'form':
                    $this->form_manuel();
                    break;
                case 'del_name':
                    $this->deleteManuelNameAction();
                    break;
                case 'edit':
                    $this->editManuelAction();
                    break;
                case'update':
                    $this->updateManuelAction();
                    break;
                case'add':
                    $this->addManuelAction();
                    break;
                case'valid_add':
                    $this->validAddManuelAction();
                    break;
                case 'acheter':
                    $this->acheterAction();
                    break;
            }
        }
    }
    
    $c2=new ControlManuel();
    $c2->action();
    
    