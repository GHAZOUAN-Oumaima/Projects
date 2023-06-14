<form action="../newnew/Ctrl.php?action=ediEmp&id=<?php echo $emp['id']?>" method="POST">
    <table>
        <tr>
            <td>Nom :</td>
            <td><input type="text" name="nom" value="<?php echo $emp['nom'] ?>" required></td>
        </tr>
        <tr>
            <td>Prenom :</td>
            <td><input type="text" name="prenom" value="<?php echo $emp['prenom'] ?>" required></td>
        </tr>
        <?php   if ($emp['sexe']=='H') {
                        echo '
                        <tr>
                            <td>Femme : </td>
                            <td><input type="radio" name="sexe" value="F"></td>
                            </tr>
                            <tr>
                            <td>Homme : </td>
                            <td><input type="radio" name="sexe" value="H" checked></td>
                        </tr>
                        ';
                }else{
                        echo '
                        <tr>
                            <td>Femme : </td>
                            <td><input type="radio" name="sexe" value="F" checked></td>
                            </tr>
                            <tr>
                            <td>Homme : </td>
                            <td><input type="radio" name="sexe" value="H"></td>
                        </tr>
                        ';
        }?>
        <tr>
            <td>Adresse : </td>
            <td><textarea name="adresse"><?php echo $emp['adresse']?></textarea></td>
        </tr>
        <tr>
            <td>Date de daissance : </td>
            <td><textarea id="txtarea" name="dateNaissance"><?php echo $emp['adresse']?></textarea></td>
        </tr>
        <tr>
            <td rowspan="2"></td>
            <td><input type="submit"></td>
        </tr>
    </table>
</form>