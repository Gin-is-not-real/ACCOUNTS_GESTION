<?php 
    session_start();
    if(isset($_SESSION['pseudo'])) {
        echo 'Connecté(e) en tant que '. $_SESSION['pseudo'] . '<br/>';
    }
    else {
        echo 'Vous n\'êtes pas connecté(e) <br/>';
    }
    //connection bdd
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=pers_projects;charset=utf8', 'admin', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }        
    
    //requete le pseudo dans la bdd
    $req = $bdd->prepare('SELECT pseudo, mdp FROM stockfish_logs WHERE pseudo = :pseudo');
    $req->execute(array(
        'pseudo' => $_POST['pseudo']
    ));
    
    //si pseudo inconnu ou mauvais mdp

    //si pseudo present dans la bdd et si mdp ok
    if($reponse = $req->fetch() AND $_POST['mdp'] == $reponse['mdp']) {

            echo 'CONNECTION OK';
            $_SESSION['pseudo'] = $_POST['pseudo'];
?>
            <br />
            <em>(chargement du site...)</em>
            <meta http-equiv="refresh" content="3, url=site.php/" />
<?php
    }
    else {

        echo 'Pseudo inconnu ou mauvais mot de passe <br/>';
    }

?>