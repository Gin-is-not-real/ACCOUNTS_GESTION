<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Deconnection</title>
    </head>

<?php
    //supression de la session des variables de session
    $_SESSION['pseudo'] = array();
    session_destroy();

    echo 'Vous êtes déconnecté(e) <br/>';

?>
    <!--    redirection -->
    <em>redirection vers accueil...</em>
    <meta http-equiv="refresh" content="3, url=index.php/" />

</html>