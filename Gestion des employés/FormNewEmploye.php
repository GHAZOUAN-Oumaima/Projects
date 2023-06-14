<form action="../newnew/Ctrl.php?action=addEmp" method="POST">
    <table>
        <tr>
            <td>Nom :</td>
            <td><input type="text" name="nom" required></td>
        </tr>
        <tr>
            <td>Prenom :</td>
            <td><input type="text" name="prenom" required></td>
        </tr>
        <tr>
            <td>Femme : </td>
            <td><input type="radio" name="sexe" value="F"></td>
            </tr>
            <tr>
            <td>Homme : </td>
            <td><input type="radio" name="sexe" value="H" checked></td>
        </tr>
        <tr>
            <td>Adresse : </td>
            <td><textarea name="adresse"></textarea></td>
        </tr>
        <tr>
            <td>Date de daissance : </td>
            <td><input type="date" required id="dateNaissance" name="dateNaissance"></td>
        </tr>
        <tr>
            <td>Service : </td>
            <td>
        <select required id="numServ" name="numServ">
          <option value="">Sélectionnez une service</option>
          <option value="1">vente</option>
          <option value="2">approvisionnement</option>
          <option value="3">réclamation</option>
        </select>
      </td>
        </tr>
        <tr>
            <td rowspan="2"></td>
            <td><input type="submit"></td>
        </tr>
    </table>
</form>