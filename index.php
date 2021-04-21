<?php 
    
    session_start(); 
    session_destroy();

    if(isset($_SESSION['pseudo'])) {
        echo 'Bonjour, ' . $_SESSION['pseudo'] . '<br/>';
?>
        <p><a href="deconnection.php">Deconnection</a></p>
<?php
    }
    else {
        echo 'Vous n\'êtes pas connecté';
    //}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Page D'Accueil</title>
    </head>
        <!--    
            entete 
            si(session) -> "connecté en tant que"
            sinon -> "vous n'etes pas connecté"
        -->
    <body>
        <!--  
            page de connexion
            lien vers inscription
          -->
          <p>Veuillez vous connecter: </p>
          <p>
              <form action="connection.php" method="post">
                  Pseudo: 
                  <input type="text" name="pseudo" required autocomplete="off">
                  Mot de passe:
                  <input type="password" name="mdp" required autocomplete="off">

                  <input type="submit" value="Se connecter">
              </form>
          </p>

          <p>Ou creer un compte <a href="inscription.php">ici</a></p>
    <?php } ?>
    </body>

    <nav>
        
    </nav>


</html>