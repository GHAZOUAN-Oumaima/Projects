<?php


class model
{
    private $db;

    public function __construct()
    {
        $host = "localhost";
        $dbname = "grh";
        $username = "root";
        $password = "";
        
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
    }

    
    public function allEmployes()
    {
        $query = $this->db->prepare("SELECT * FROM employes");
        $query->execute();
        return $query->fetchAll();
    }

    public function allServices(){ ///
        $query = $this->db->prepare("SELECT * FROM services");
        $query->execute();
        return $query->fetchAll();
    }
    public function oneEmploye($par){ ///
        $query = $this->db->prepare("SELECT * FROM employes where id = ?");
        $query->execute([$par]);
        return $query->fetch();
    }
    public function addNewEmploye($data){ ///
        $query = $this->db->prepare("INSERT INTO employes values(?,?,?,?,?,?,?)");
        $query->execute($data);
    }
    public function deleteEmploye($par){ ///
        $query = $this->db->prepare("DELETE FROM employes WHERE id = ?");
        $query->execute([$par]);
    }
    public function updateEmploye($par){
        $nom =$_POST['nom'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['sexe'];
        $adresse = $_POST['adresse'];
        $dateNaissance = $_POST['dateNaissance'];
        $numServ= $_POST['numServ'];
        $query = $this->db->prepare
        ("update employes set 
            nom = ?,
            prenom = ?,
            sexe = ?,
            adresse = ?,
            dateNaissance = ?,
            numServ = ?
            where id = ?");
        $query->execute([$par,$nom,$prenom,$sexe,$adresse,$dateNaissance,$numServ]);
    }


}
?>