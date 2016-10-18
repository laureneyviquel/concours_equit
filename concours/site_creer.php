<?php include("include.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Site cible du formulaire, creer</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <p>Bonjour !</p>
    </body>


    <?php
    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)//test si le fichier existe
    {
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['photo']['size'] <= 1000000)//1Mo
            {
                    // Testons si l'extension est autorisée
                    $infosfichier = pathinfo($_FILES['photo']['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                    if (in_array($extension_upload, $extensions_autorisees))
                    {
                            // On peut valider le fichier et le stocker définitivement
                            move_uploaded_file($_FILES['photo']['tmp_name'], 'image/' . basename($_FILES['photo']['name']));
                            $chemin_photo = 'image/' . basename($_FILES['photo']['name']);
                            echo "L'envoi a bien été effectué !";
                    }
            }
    }



    // Create a new inscription object
        $inscription = ORM::for_table('tournoi')->create();
        // SHOULD BE MORE ERROR CHECKING HERE!
        // Set the properties of the object
        $inscription->cavalier = $_POST['cavalier'];
        $inscription->note = $_POST['note'];
        $inscription->cheval = $_POST['cheval'];
        $inscription->photo = $chemin_photo;
        // Save the object to the database
        $inscription->save();


    // Redirection du visiteur vers la page du minichat
    header('Location: site03.php');
    
    ?>

</html>