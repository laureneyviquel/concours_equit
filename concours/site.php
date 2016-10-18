<?php
session_start(); // On démarre la session AVANT toute chose
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="style_entete.css" />
        <link rel="stylesheet" href="style_liens.css" />
        <link rel="stylesheet" href="style_banniere.css" />
        <link rel="stylesheet" href="style_corps.css" />
        <link rel="stylesheet" href="style_footer.css" />
        <title>Site Concours Equitation</title>
    </head>
 
        <body>
        <div id="bloc_page">
            <?php include("entete.php"); ?>
            <?php include("banniere.php"); ?>
            
            
            <section>
                <article>
                    <h1>Les résultats du tounoi : affichés par note</h1>
                    <?php
                    try
                    {
                        // On se connecte à MySQL pour la BDD
                        $bdd = new PDO('mysql:host=localhost;dbname=concours_equitation;charset=utf8', 'root', '');
                    }
                    catch(Exception $e)
                    {
                        // En cas d'erreur, on affiche un message et on arrête tout
                            die('Erreur : '.$e->getMessage());
                    }

                    // Si tout va bien, on peut continuer

                    // On récupère tout le contenu de la table tournoi
                    $reponse = $bdd->query('SELECT * FROM tournoi ORDER BY note DESC'); //ordonne les résultats par ordre décroissants

                    // On affiche chaque entrée une à une
                    while ($donnees = $reponse->fetch())
                    {
                    ?>
                        <p>
                        Le cavalier : <?php echo $donnees['cavalier']; ?> et le cheval : <?php echo $donnees['cheval']; ?> ont obtenu une note de <strong><?php echo $donnees['note']; ?> </strong><br />
                        
                        <em>Photo du cheval</em> : <?php echo $donnees['cheval']; ?> <br />
                        <img src="<?php echo $donnees['photo']; ?>" alt="Photo de cheval de concours" class="ico_cheval" title="<?php echo $donnees['cheval']; ?> monté par <?php echo $donnees['cavalier']; ?>"/>
                       </p>


                        <?php
                        // L'administrateur est connecté, il a acces au formulaire
                        if ($_SESSION['prenom'] == 'autorise')
                        {
                            ?>
                              <!-- formulaire transmet à la page cible "site_modifier.php" pour modifier -->

                                <form action="site_modifier.php" method="post" enctype="multipart/form-data"> 
                                <p>

                                    <label for="cavalier">Cavalier</label> : <input type="text" name="cavalier" id="cavalier" value="<?php echo $donnees['cavalier']; ?>" /><br />

                           
                                    <label for="note">Note</label> : <select name="note">;
                                    <?php //affiche toutes les notes de 1 à 100 dans la liste déroulante
                                    for($i=1; $i<=100; $i++){
                                         echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                    ?>
                                    </select><br />

                                    <label for="cheval">Cheval</label> :  <input type="text" name="cheval" id="cheval" value="<?php echo $donnees['cheval']; ?>" /><br />

                                    <input type="hidden" name="id" value="<?php echo $donnees['id']; ?>" />

                                    <input type="submit" value="Modifier" /> <!-- bouton de validation -->
                                </p>
                                </form>


                            <!-- formulaire transmet à la page cible "site_supprimer.php" pour supprimer -->

                                <form action="site_supprimer.php" method="post" enctype="multipart/form-data"> 
                                <p>
                                    <input type="hidden" name="id" value="<?php echo $donnees['id']; ?>" />

                                    <input type="submit" value="Supprimer" /> <!-- bouton de validation -->
                                </p>
                                </form>

                            <?php
                        }
                        // Le visiteur n'est pas autorisé à voir le formulaire
                        else
                        {
                            // N'affiche pas le formulaire
                            ?>
                            <p>Veuillez vous connecter pour modifier ou supprimer une inscription</p>
                            <?php
                        }
                        ?>

                     
                    <?php
                    }

                    $reponse->closeCursor(); // Termine le traitement de la requête

                    ?>

                </article>
                <aside>

                    <?php
                    // L'administrateur est connecté, il a acces au formulaire
                    if ($_SESSION['prenom'] == 'autorise')
                    {
                        ?>
                        <!-- formulaire transmet à la page cible "site_modifier.php" -->

                        <form action="site_creer.php" method="post" enctype="multipart/form-data"> 
                        <p>

                            <label for="cavalier">Cavalier</label> : <input type="text" name="cavalier" id="cavalier" /><br />

                               
                                <label for="note">Note</label> : <select name="note">;
                                <?php //affiche toutes les notes de 1 à 100 dans la liste déroulante
                                for($i=1; $i<=100; $i++){
                                     echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                                ?>
                                </select><br />

                            <label for="cheval">Cheval</label> :  <input type="text" name="cheval" id="cheval" /><br />

                            <p class="help-block">Vous pouvez agrandir la fenêtre</p>
                            Formulaire d'envoi de fichier (jpg) :<br />
                            <input type="file" name="photo" /><br />

                            <input type="submit" value="Ajouter" /> <!-- bouton de validation -->
                        </p>
                        </form>

                        <?php
                    }
                    // Le visiteur n'est pas autorisé à voir le formulaire
                    else
                    {
                        // N'affiche pas le formulaire
                        ?>
                        <p>Veuillez vous connecter pour accéder aux inscriptions</p>
                        <?php
                    }
                    ?>
                </aside>
            </section>
            
            <?php include("pied_de_page.php"); ?>
        </div>
    </body>

</html>