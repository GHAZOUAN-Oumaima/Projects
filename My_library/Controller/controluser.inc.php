<?php
    include_once "../model/model.inc.php";
    include_once "../view/viewallusers.inc..php";
    include_once "../view/viewidit.inc.php";

    class ControlUser extends Model{
        private $action;
        private $model;
        private $view;
        public function __construct(){
            $this->model= new Model();
            $this->action="all";
        }
        public function viewCartAction(){}

        public function addToCartAction(){}

        public function removeFromCartAction(){}

        public function calculateTotalAction(){}

        public function placeOrderAction(){}

        public function userform(){
            
                $name=$_GET['nom'];
                $results=$this->model->dateSalle();
                $this->view=new ViewForm("Nouvelle Demande","$name",$results);
                $this->view->display();
            }
        
        
        public function actionUser(){
            $action='all';

            if(isset($_GET['action']))
            $action=$_GET['action'];

            if(isset($_POST['action']))
            $action=$_POST['action'];

            switch($action){

                case 'view':
                    $this->viewCartAction();
                    break;
                case 'add':
                    $this->addToCartAction();
                    break;
                case 'remove':
                    $this->removeFromCartAction();
                    break;
                case 'calculate':
                    $this->calculateTotalAction();
                    break;
                case 'place':
                    $this->placeOrderAction();
                    break;
                
                case 'new':
                    $this->userform();
                    break;    
            }
        }
    }
$control= new ControlUser();
$control->actionUser();