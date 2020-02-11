
<?php
$title="Authentification";
echo "<p class=\"error\">".($error??"")."</p>";
?>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Bootstrap Snippet: Login Form</title>
  
  
  <link rel='stylesheet' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

      <link rel="stylesheet" href="style/login.css">

  
</head>



    <div class='center'>
                    <form method="post" class="form-signin">
                        <!--legend>Authentifiez-vous</legend-->
                       
                          <h2 class="form-signin-heading">Please login</h2>
                            <input type="text" class="form-control" name="login" placeholder="Login" required="" autofocus=""/>
      						<input type="password" class="form-control" name="password" placeholder="Password" required=""/>     
                          
                     
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Connexion</button>
                            <span ><a href="<?= $pathFor['adduser'] ?>">S'enregistrer</a></span>
                        </div>
                        <p><a href="index.php">Home</a></p>
                    </form>
    </div>
<?php

include("footer.php");