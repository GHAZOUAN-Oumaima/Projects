<td><center> <a href="javascript:comfirmation('<?php echo $donnees['NS'];?>'">supprimer</a><br>
<SCRIPT LANGUAGE="JavaScript">
function confirmation(elem) {
var msg = "Etes-vous sur de vouloir supprimer ce enregistrement ?";
if (confirm(msg)){
window.location.href="delEmpl.php?NS="+elem;
}else{
return false;
}
}
</SCRIPT>