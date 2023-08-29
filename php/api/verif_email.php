<?php
include "../config.php";
$email=$_POST['email'];
//créer une requete select de verification de l'"email
$sql="select * from inscrits where email='$email'";
//fetch s'il s'agit d'une seule ligne
//fetchAll s'il s'agit de plusieurs lignes
$res=$cnx->query($sql)->fetch(PDO::FETCH_OBJ);
//convertir un tableau ou objet php vers un format JSON

//echo json_encode($res);

if(!empty($res))
echo true;
else
echo false;
?>