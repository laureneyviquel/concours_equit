<?php include("include.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Site cible du formulaire, Supprimer</title>
        <meta charset="utf-8" />
    </head>

    <?php
    

    $person = ORM::for_table('tournoi')->find_one($_POST['id']);
    $person->delete();
    // Syncronise the object with the database
    $person->save();

    // Redirection du visiteur vers la page du minichat
    header('Location: site03.php');
    
    ?>

</html>