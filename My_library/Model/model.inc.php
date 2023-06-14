<?php
    class Model{
       public $db;
        private static $instance;
   
    function __construct(){ //connection a la base de donnee
        
        try {
            $this->db=new PDO("mysql:host=localhost;dbname=gl",'root','');
	        echo "connexion a la bdd faite avec succes";
            } 
            catch (Exception $e) 
            {
	            die("erreur : ".$e->getMessage());
            }
    }

    public static function getInstance(){
        if(empty(self::$instance)){self::$instance=new Model();}
        return self::$instance;
    }
    public function viewAllManuels(){ //Voir tous les Manuels
        $sql="SELECT * FROM manuel";
        $query=$this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();

    }

    public function oneManuel($id){//Voir seulement les manuels d'un client
        $sql="SELECT * FROM manuel WHERE id_manuel = ?";
        $query=$this->db->prepare($sql);
        $query->execute(array($id));
        return $query->fetchALL();

    }
    public function oneManuelName($titre){  //Voir seulement les demandes d'un club
        $sql="SELECT * FROM manuel WHERE titre_manuel = ?";
        $query=$this->db->prepare($sql);
        $query->execute([$titre]);
        return $query->fetchALL();
    }

    public function oneMatiereManuel($matière){  //Voir seulement les manuels d'une matière
        $sql="SELECT * FROM manuel WHERE matière = ?";
        $query=$this->db->prepare($sql);
        $query->execute([$matière]);
        return $query->fetchALL();
    }
    public function addManuel($manuel){  //Ajouter un manuel a la base de donnee
        $sql = "INSERT INTO manuel(titre_manuel, description, matière, niveau, édition, prix, quantité_de_stock) VALUES (?,?,?,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->execute(array($manuel[0],$manuel[1], $manuel[2],$manuel[3],$manuel[4],$manuel[5],$manuel[6]));
    }
    

    public function deleteManuelID($id){  //Supprimer un manuel de la base de donnee selon ID
        $query = $this->db->prepare('DELETE FROM manuel WHERE id_manuel = ?');
        $a=array($id);
        $query->execute($a);
      
    }

    public function deleteManuelName($titre_manuel){  //Supprimer tous les manuels de la librairie de la base de donnee
        $query = $this->db->prepare("DELETE FROM manuel WHERE titre_manuel = ?");
        $query->execute([$titre_manuel]);
    }

    public function editManuel($id, $titre_manuel, $description, $matière, $niveau, $édition, $prix, $quantité_de_stock){   //Modifer le manuel selon ID
        $sql = "UPDATE manuel SET titre_manuel = ?, description = ?, matière = ?, niveau = ? , édition = ? , prix = ? , quantité_de_stock = ? WHERE id_manuel = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$titre_manuel, $description, $matière, $niveau, $édition, $prix, $quantité_de_stock]);
    }
    
    public function findByMatiere($matiere){

    }

    public function findByNiveau($niveau){

    }

    public function findByTitre($titre_manuel){
        
    }

    public function findByStock($stock){
        
    }

    public function updatestock($id, $newstock){
        
    }

    public function getQuantitéCommandée($id, $newstock){
        
    }

    public function createCommande($montant){
        
    }

    public function getCommande($id_commande){
        
    }

    public function connfirmerCommande($id_commande){
        
    }
    public function viewCart(){}

    public function addToCart(){}

    public function RemoveFromCart(){}

    public function calculateTotal(){}

    public function placeOrder(){}

    public function  allClients()
    {
        $query = $this->db->prepare("SELECT * FROM client ");
        $query->execute();

        return $query->fetchAll();
    }

    public function login($login, $password){
        $sql = "SELECT * FROM users WHERE login = :login AND password = :password";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteClient($id)
    {
        $query = $this->db->prepare("DELETE FROM client where 	id_client = ?");
        $query->execute(array($id));
    }


    public function editClient($id)
    {
        $query=$this->db->prepare("SELECT * FROM  client  where id_client = ?");
        $query->execute(array($id));

        return $query->fetch();
    }

    public function updateClient($client)
    {
        $query = $this->db->prepare("UPDATE client
            SET nom = ?, prenom = ?, adresse = ?, email = ?, num_telephone = ?, ville = ?, code_postal = ? ,password = ? WHERE id_client = ? ");
        $query->execute(array($client[0],$client[1],$client[2],$client[3],$client[4],$client[5],$client[6],$client[7]));
    }

    
    public function validAddClient($client){
        $query=$this->db->prepare('INSERT INTO client (nom, prenom, adresse, email, num_telephone, ville, code_postal ,password) VALUES(?,?,?,?,?,?,?,?)');
        
        $query->execute($client);
        
    }
    public function validAddUser($user){
        $query1=$this->db->prepare('INSERT INTO users ( login,password) VALUES(?,?)');
        $query1->execute($user); 
}
}
?>