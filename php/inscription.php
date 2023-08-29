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

</head>
<body>
<?php include "menu.php";?>
<div class="container">

  <!-- Content here -->

  
<h1>Inscription</h1>
<?php
if(!empty($_GET['message']))
echo "<div class='alert alert-".$_GET['type']."'>".$_GET['message']."</div>";
?>
    <form action="traitement.php" method="post">
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3">
    <label class="form-label" for="nom">Nom</label>
    <input  class="form-control" type="text" name="nom" id="nom" required>
</div>
<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3">
    <label class="form-label" for="prenom">Prenom</label>
    <input class="form-control" type="text" name="prenom" id="prenom" required>
</div>


    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3">
    <label class="form-label" for="email">Email</label>
    <input class="form-control" onblur="verif_email(this.value)" type="email" name="email" id="email" required>
<div id="email_error" class="text text-danger"></div>
</div>

<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3">
    <label class="form-label" for="tel">Telephone</label>
    <input class="form-control" type="number" name="tel" id="tel" required>
    </div>
</div>
    <button id="submit" class="btn btn-primary" name="submit" type="submit">Inscription</button>
    <button class="btn btn-secondary" type="reset">Annuler</button>

    </form>
    </div>
    <script>
        function verif_email(email){

    $.ajax({
        type:"post",
        url: "api/verif_email.php", 
        data:{email:email},

        success: function(result){
          var res=JSON.parse(result);
            if(result){
        document.getElementById('email').classList.add("border-danger");
        document.getElementById('email_error').innerHTML="Email existe deja!";    
        document.getElementById('submit').setAttribute("disabled","disabled");    
        }
        else{
        document.getElementById('email').classList.remove("border-danger");
        document.getElementById('email_error').innerHTML="";    
        document.getElementById('submit').removeAttribute("disabled"); 
        }
           
           
        }}
  );

        }
    </script>
</body>
</html>