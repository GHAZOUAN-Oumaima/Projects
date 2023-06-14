<?php
    require_once "view.inc.php";
    require_once "../Controller/control.inc.php";
    class ViewAll extends View{

        public function __construct($title){
            parent::__construct($title);
            
        }

        public function all($requests){
          $this->content .= "<div class='table-container'><table class='my-table' align='center'>
                              <tr>
                                  <th>ID</th>
                                  <th>Titre du manuel</th>
                                  <th>Description</th>
                                  <th>Matière</th>
                                  <th>Niveau</th>
                                  <th>Edition</th>
                                  <th>Prix</th>
                                  <th>Quantité de stock</th>
                                  <th>Suppression</th>
                                  <th>Affichage</th>
                                  <th>Modifier</th>
                              </tr>";
      
          foreach ($requests as $request){
              $this->content .= "<tr>
                                  <td>$request[0]</td>
                                  <td>$request[1]</td>
                                  <td>$request[2]</td>
                                  <td>$request[3]</td>
                                  <td>$request[4]</td>
                                  <td>$request[5]</td>
                                  <td>$request[6]</td>
                                  <td>$request[7]</td>
                                  <td><form action='../Controller/control.inc.php' method='POST'><input value='del' name='action' type='submit' > <input value=$request[0] name='id' type='hidden' > </form></td>
                                  <td><button ><a href='../Controller/control.inc.php'><img src='../controller/images/view.png' alt='Afficher'></a></button></td>
                                  <td><td><form action='../Controller/control.inc.php' method='POST'><input value='edit' name='action' type='submit' > <input value=$request[0] name='id' type='hidden' >  </form></td></td>
                              </tr>";
          }
      
          $this->content .= "<tr class='total'>
                                  <th colspan='10'>Nombre de demandes : " . count($requests) . "</th>
                              </tr>
                          </table></div>";
      }
      
    }
?>
<script>
    function handleDelete(e) {
        const res = confirm("Are u sure u wanna delete this employer ?");

        if(!res) e.preventDefault();
    };
    function handleEdit(e) {
        const res = confirm("Are u sure u wanna edit this employer ?");

        if(!res) e.preventDefault();
    };
</script>
<style>
  
.product-grid {
  display: flex;
  flex-wrap: wrap; /* Ajoutez cette ligne */
  justify-content: space-between; /* Ajoutez cette ligne */
  gap: 10px;
  
}

.product {
  flex: 0 0 calc(5% - 10px); 
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  max-width: 25%; /* Ajoutez cette ligne */
  
}

.product-image img {
  width: 200px;
  height: 300px;
  object-fit: cover;
  margin-bottom: 10px;
}

.product h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

.product p {
  font-size: 16px;
  margin-bottom: 5px;
}

.product button {
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}

.product button:hover {
  background-color: #0062cc;
}
.table-container {
  margin-left: auto;
  margin-right: auto;
  max-width: 1800px; /* Ajustez la largeur maximale selon vos besoins */
}

.my-table {
  width: 100%;
  border-collapse: collapse;
  font-family: Arial, sans-serif;
  border-collapse: collapse;
    
    letter-spacing: 1px;
    font-size: 13px;

}

.my-table th,
.my-table td {
  padding: 10px;
  border: 1px solid #ccc;
}

.my-table th {
  background-color: #f2f2f2;
  
  text-align: left;
  padding: 10px 0;
    font-weight: 400;
    text-align: center;
}

.my-table td {
  background-color: #f2f2f2;
  text-align: center;
  font-weight: bold;
  border-top: 0.5px solid #999;
    
    
}
.my-table tr {
    border-bottom: 0.5px solid #999;
}
.my-table .total th {
    border: 0;
    float: left;
    font-weight: 500;
    
    padding: 10px;
}
.my-table .delete-btn {
  padding: 6px 12px;
  background-color: #ff0000;
  color: #fff;
  border: none;
  cursor: pointer;
}

.my-table .delete-btn:hover {
  background-color: #e60000;
}

.my-table img {
  height: 20px;
  width: 20px;
}

</style>