<?php
//connexion a un serveur mysql avec PDO

include "config.php";

function controle($tabvar,$tabfield){
    $errors="";
    foreach($tabvar as $indice=>$var){
    if(empty($var)){
        $errors.="Le champ ".$tabfield[$indice]." est obligatoire!<br>";
    }
}
    return $errors;

}

//recuperer les données du form
if(isset($_POST['submit'])){

    $nom=htmlentities($_POST['nom']);
    $prenom=htmlentities($_POST['prenom']);
    $email=htmlentities($_POST['email']);
    $tel=htmlentities($_POST['tel']);

    $message=controle([$nom,$prenom,$email,$tel],["nom","prenom","email","telephone"]);

    if(!empty($message))
    header("location:inscription.php?message=$message&type=danger");
    else{
        //insertion dans la base de données
        $sql="insert into inscrits (nom,prenom,email,tel) values('$nom','$prenom','$email','$tel')";
        if($cnx->exec($sql)){
            $message="insertion effectuée avec success!";
            header("location:inscription.php?message=$message&type=success");
        }
    }
}else{
header("location:inscription.php");
}
?>