<?php
include "config.php";

if(isset($_POST['submit_delete'])){
$id_inscrit=$_POST['id_inscrit'];

$sql="delete from inscrits where id_inscrit='$id_inscrit'";
if($cnx->exec($sql))
header("location:list_inscrits.php?message=Supression effectuée avec success!&type=success");
}else{
    header("location:list_inscrits.php");
}
