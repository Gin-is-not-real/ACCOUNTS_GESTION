
<?php

    session_start();
/*
    if(isset($_SESSION['pseudo'])) {
        echo $_SESSION['pseudo'];
    }
*/
    if(!isset($_SESSION['pseudo'])) {
?>

<div id="formulaire_inscription">
    <form action="inscription.php" method="post">
        Pseudo: 
        <input type="text" name="pseudo" value="" autocomplete="off" required >

        Mot de mdpe:
        <input type="mdpword" name="mdp" value="" autocomplete="off" required >

        Repeter le Mot de mdpe:
        <input type="mdpword" name="mdp_repeat" autocomplete="off" required >

        <input type="submit" value="S'enregistrer" >
    </form>
</div>

<?php    
    }
    else {
        echo 'Bienvenue ' . $_SESSION['pseudo'];
?>
        <p><a href="deconnection.php">Deconnection</a></p>
<?php
    }

    //si pseudo posté
    if(isset($_POST['pseudo'])) {
        
        //pseudo posté mais mdp !=
        //on notifie
        if($_POST['mdp'] != $_POST['mdp_repeat']) {
            echo 'wrong mdp repeated';
        }

        //pseudo posté et mdp valides
        else {

            //connexion bdd
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=pers_projects;charset=utf8', 'admin', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }

            //recherche si pseudo deja dans bdd et notifie
            $req = $bdd->prepare('SELECT pseudo FROM stockfish_logs WHERE pseudo= :pseudo');
            $req->execute(array(
                'pseudo' => $_POST['pseudo']
            ));

            //si pseudo présent dans la bdd
            //on notifie
            if($reponse = $req->fetch()) {
                echo 'Pseudo déja pris';
            }

            //sinon (pseudo pas dans la bdd)
            //rec dans la base de donnée
            else{
                $req = $bdd->prepare('INSERT INTO stockfish_logs
(pseudo, mdp) VALUES(:pseudo, :mdp)');
                $req->execute(array(
                    'pseudo' => $_POST['pseudo'],
                    'mdp' => $_POST['mdp']
                ));
                //rec du pseudo SESSION
                $_SESSION['pseudo'] = $_POST['pseudo'];

                echo 'Vous êtes maintenant enregistré en tant que membre, ' . $_SESSION['pseudo'];
        ?>
                <br />
                <em>(en cours de redirection...)</em>
                <meta http-equiv="refresh" content="5, url=inscription.php/" />
        <?php
            }

            $req->closeCursor();

        }

    }

    
?>
