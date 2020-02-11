<?php
$title="Ajout de l'utilisateur";
include("header.php");
?>
<p class="error"><?= $error??""?></p>
<head>
  <meta charset="UTF-8">
  <title>Bootstrap Snippet: Login Form</title>
  
  
  <link rel='stylesheet' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

      <link rel="stylesheet" href="style/login.css">

  
</head>


<div class="wrapper">
    
    <form method="post" class="form-signin">
                <h2 class="form-signin-heading">Please login</h2>     <!--legend>Inscription</legend-->
        
                   
                         <input type="text" name="nom" class="form-control" id="inputNom" placeholder="Nom" required value="<?= $data['nom']??""?>">
                   
                       
                        <input type="text" name="prenom" class="form-control" id="inputPrenom" placeholder="Prénom" required aria-required="true" value="<?= $data['prenom']??""?>">
              
                   
                    
                        <td><input type="text" name="login" class="form-control" id="inputLogin" placeholder="login" required value="<?= $data['login']??""?>">
                  
                        <input type="password" name="mdp" class="form-control" id="inputMDP" placeholder="Mot de passe" required value="">
                        <input type="password" name="mdp2" class="form-control" id="inputMDP" placeholder="Répéter le mot de passe" required value="">
                
     
                    <div class="form-group">
                            <button type="submit" class="btn btn-primary">S'enregistrer</button>
                    </div>
    </form>
    </div>
<?php

include("footer.php");
