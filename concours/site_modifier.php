<?php include("include.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Site cible du formulaire, Modifier</title>
        <meta charset="utf-8" />
    </head>
    <body>
    <!--test
        <p>Bonjour !</p>

        <p>Vous avez donner une nouvelle note au couple cavalier-cheval pour le concours d'équitation</p>

        <p>Le nom du cavalier est <?php echo $_POST['cavalier']; ?> !</p>
        <p>Le note est <?php echo $_POST['note']; ?> !</p>
        <p>Le nom du cheval est <?php echo $_POST['cheval']; ?> !</p>


        <p>Si tu veux lire la liste des cavaliers déjà inscrit, <a href="site.php">clique ici</a> pour revenir à la page précédente site.php.</p>
                </p>
                -->
    </body>


    <?php


    $person = ORM::for_table('tournoi')->find_one($_POST['id']);
    // The following two forms are equivalent
    $person->set('cavalier', $_POST['cavalier']);
    $person->note = $_POST['note'];
    $person->set('cheval', $_POST['cheval']);
    $person->set('id', $_POST['id']);
    // Syncronise the object with the database
    $person->save();


    // Redirection du visiteur vers la page du minichat
    header('Location: site03.php');
    
    ?>

</html>