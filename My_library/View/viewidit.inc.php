<?php
require_once "view.inc.php";
class viewEdit extends view{
    public function __construct($title){
        parent::__construct($title);
        $this->content.="
        <form class='form' action='../controller/controluser.inc.php' method='post'>
            <input type='text' class='name formEntry' name='titre_manuel' placeholder='titre....' required><br>
            <input type='text' name='description' placeholder='description....' required><br>
            <input type='text' name='matière' placeholder='matière....'  required><br>
            <input type='text' name='niveau' placeholder='niveau....' required><br>
            <input type='text' name='édition' placeholder='édition....' required><br>
            <input type='text' name='prix' placeholder='prix....' required><br>
            <input type='text' name='quantité_de_stock' placeholder='quantité_de_stock....'required><br>
            
           
            <button class='submit formEntry' type='submit'>Valider</button>
            <style>body{background: url('images/nature.jpeg')};</style>
          ";

    }
}

$V = new viewEdit("Tous les manuels");
$V->display();

?>
