<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
<?php include "menu.php";?>

<div class="container">
<?php 
$sql="select * from inscrits";
$inscrits=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);

?>
  <!-- Content here -->

  
<h1>Liste des inscrits</h1>

<?php 
if(!empty($_GET['message']))
echo "<div class='alert alert-".$_GET['type']."'>".$_GET['message']."</div>";


echo '
<table class="table table-striped table-dark table-bordered">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">E-mail</th>
      <th scope="col">Tel</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>';
foreach($inscrits as $inscrit){
    echo "<tr>
      <td>".$inscrit->nom."</td>
      <td>".$inscrit->prenom."</td>
      <td><a href='mailto:".$inscrit->email."'>".$inscrit->email."</a></td>
      <td>".$inscrit->tel."</td>
      <td>
      <button class='btn btn-success' title='Modifier'><i class='bi bi-pencil-square'></i></button>
      
      <form class='d-inline' method='post' action='delete.php'>
      <input type='hidden' name='id_inscrit' value='".$inscrit->id_inscrit."'>
      <button type='submit' name='submit_delete' class='btn btn-danger' onclick=\"return confirm('etes vous sure de supprimer?')\" title='supprimer'><i class='bi bi-trash3-fill'></i></button></a>
      </form>

      </td>
    </tr>";
} 
  echo "</tbody>
</table>";
?>
</body>
</html>