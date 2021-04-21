<?php 
    session_start();
    if(isset($_SESSION['pseudo'])) {
        echo 'Connecté(e) en tant que '. $_SESSION['pseudo'] . '<br/>';
    }
    else {
        echo 'Vous n\'êtes pas connecté(e) <br/>';
    }
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Site</title>
    </head>

    <body>
        <p>Ici le site</p>
    </body>

</html>