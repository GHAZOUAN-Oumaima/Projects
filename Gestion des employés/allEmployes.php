<a href="../newnew/FormNewEmploye.php">Ajouter Un employe</a>
<table border="1px">
    <tr>
        <th>CODE</th>
        <th>NOM</th>
        <th>PRENOM</th>
        <th>SERVICE</th>
        <th>DELETE</th>
        <th>COPY</th>
        <th>UPDATE</th>
    </tr>
    <?php 
        foreach($employes as $emp){
            echo
                '<tr>
                    <td><a href="..Ctrl.php?action=oneEmp&id='.$emp["id"].'">'.$emp["id"].'</a></td>
                    <td>'.$emp["nom"].'</td>
                    <td>'.$emp["prenom"].'</td>
                    <td>'.$emp["numServ"].'</td>
                    <td><a href="../newnew/Ctrl.php?action=delEmp&id='.$emp["id"].'">Supprimer</a></td>
                    <td><a href="../newnew/Ctrl.php?action=copEmp&id='.$emp["id"].'">Copier</a></td>
                    <td><a href="../newnew/FormUpdateEmploye.php">Modifier</a></td>
                 </tr>';
        }
    ?>
</table>