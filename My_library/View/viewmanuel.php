<?php
include_once "../model/model.inc.php";?>
<!DOCTYPE <html> 
    <html lang="en">
      
        
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport " content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title> Ajouter un manuel </title>
            
            <link rel="stylesheet" href="style4.css">
            <link rel="stylesheet" href="style3.css">
            <link rel= "stylesheet" href="form_style.css">
            <link rel="stylesheet" href="style2.css">

            
          
        </head>
        

        <body>
        <header class="main-head">
            <nav>
                <h1>My_Library</h1>
                <ul>
                    <li></li>
                    <li><a href="index.php" id="home">Accueil</a></li>
                    <li><a href="../view/form_manuel.html">Ajouter Un employe</a></li>
                </ul>
            </nav>
        </header>
            
<table border="1px">
    <tr>
        <th>CODE</th>
        <th>NOM</th>
        <th>PRENOM</th>
        <th>SERVICE</th>
        <th>DELETE</th>
        
        <th>UPDATE</th>
    </tr>
    <?php 
        foreach($requests as $request){
            echo
                '<tr>
                    <td><a href="..Controller/control.inc.php?action=&id='.$request["id"].'">'.$request["id"].'</a></td>
                    <td>'.$request["nom"].'</td>
                    <td>'.$request["prenom"].'</td>
                    <td>'.$request["numServ"].'</td>
                    <td><a href="../Controller/control.inc.php?action=delete&id='.$requestrequest["id"].'">Supprimer</a></td>
                    
                    <td><a href="../Controller/control.inc.php?action=edit">Modifier</a></td>
                 </tr>';
        }
    ?>
</table>
<footer>
                <div class="contact-info">
                  <div class="info-item">
                    <div class="icon">
                      <i class="fa fa-map-marker"></i>
                    </div>
                    <h5>Vous allez nous trouver à</h5>
                    <p>Madinat Al Irfane - Rabat<br>80000 Morocco</p>
                  </div>
                  <div class="info-item">
                    <div class="icon">
                      <i class="fa fa-envelope"></i>
                    </div>
                    <h5>Envoyez-nous un mail sur</h5>
                    <p><a href="mailto:oumaghazouan@gmail.com">oumaghazouan@gmail.com</a><br>
                       <a href="mailto:oumayma070502@gmail.com">oumayma070502@gmail.com</a></p>
                  </div>
                  <div class="info-item">
                    <div class="icon">
                      <i class="fa fa-phone"></i>
                    </div>
                    <h5>Appelez-nous sur</h5>
                    <p class="phone-number">Phone: (+212) 13 58 99 88</p>
                  </div>
                </div>
              </footer>
        </body>
    </html>
</html>