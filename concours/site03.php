<?php include("include.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Site Concours Equitation</title>
    <meta charset="utf-8" />
    <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="lib/bootstrap/css/tuto.css" rel="stylesheet">
    <script src="lib/bootstrap/js/jquery.js"></script>
    <script src="lib/bootstrap/js/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>

  <!-- Un peu de style pour la visualisation -->
    <link rel="stylesheet" href="image/style_bootstrap.css" />
    <style type="text/css">
    .col-lg-2 { line-height: 100px; }
    .col-lg-5 { line-height: 200px; }
    .col-lg-12 { line-height: 80px; }
</style>
<style type="text/css">
  body { padding-top: 70px; }
</style>

  </head>
  <body>
    <div class="container">
      <header class="row">
        <div class="col-sm-12">
          <?php include("entete.php"); ?>
        </div>
      </header>
      <div class="row">
        <aside class="col-md-2">
                              <?php
                    // L'administrateur est connecté, il a acces au formulaire
                    if ($_SESSION['prenom'] == 'autorise')
                    {
                        ?>
                        <!-- formulaire transmet à la page cible "site_modifier.php" -->

                        <form action="site_creer.php" method="post" enctype="multipart/form-data" class="well">
                        <p>

                            <label for="cavalier" >Cavalier</label> : <input type="text" name="cavalier" id="cavalier" class="form-control"/><br />


                                <label for="note">Note</label> : <select name="note">;
                                <?php //affiche toutes les notes de 1 à 100 dans la liste déroulante
                                for($i=1; $i<=100; $i++){
                                     echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                                ?>
                                </select><br />

                            <label for="cheval">Cheval</label> :  <input type="text" name="cheval" id="cheval" class="form-control"/><br />

                            <p class="help-block">Formulaire d'envoi de fichier (jpg) </p>
                            <input type="file" name="photo" /><br />

                            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Ajouter</button> <!-- bouton de validation -->
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
        <section class="col-md-9 col-md-offset-1">
          <h1>Les résultats du tounoi : affichés par note</h1>
          <div class="row">


                <?php

                $people = User::order_by_desc('note')->find_many();
                foreach ($people as $one) {

                ?>
                <article class="col-lg-4 col-xs-6">
                          Le cavalier : <?php echo $one->cavalier ?> et le cheval : <?php echo $one->cheval ?> ont obtenu une note de <strong><?php echo $one->note?> </strong><br />
                </article>

                <article class="col-lg-4 col-sm-6">
                          <em>Photo du cheval</em> : <?php echo $one->cheval ?> <br />
                <img src="<?php echo $one->photo?>" alt="Photo de cheval de concours" class="img-thumbnail" title="<?php echo $one->cheval?> monté par <?php echo $one->cavalier ?>"/>
                </article>

                <?php


                        // L'administrateur est connecté, il a acces au formulaire
                        if ($_SESSION['prenom'] == 'autorise')
                        {
                            ?>
                              <!-- formulaire transmet à la page cible "site_modifier.php" pour modifier -->

                                <form action="site_modifier.php" method="post" enctype="multipart/form-data">
                                <article class="col-lg-3 col-md-8">
                                  <label for="cavalier">Cavalier</label> : <input type="text" name="cavalier" id="cavalier" value="<?php echo $one ->cavalier; ?>" class="form-control"/><br />


                                    <label for="note">Note</label> : <select name="note">;
                                    <?php //affiche toutes les notes de 1 à 100 dans la liste déroulante
                                    for($i=1; $i<=100; $i++){
                                         echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                    ?>
                                    </select><br />

                                    <label for="cheval">Cheval</label> :  <input type="text" name="cheval" id="cheval" value="<?php echo $one->cheval?>" class="form-control"/><br />

                                    <input type="hidden" name="id" value="<?php echo $one->id ?>" class="form-control"/>

                                    <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-wrench"></span> Modifier</button> <!-- bouton de validation -->
                                </article>
                                </form>


                            <!-- formulaire transmet à la page cible "site_supprimer.php" pour supprimer -->

                                <form action="site_supprimer.php" method="post" enctype="multipart/form-data">
                                <article class="col-lg-1 col-md-4">
                                  <input type="hidden" name="id" value="<?php echo $one->id?>" />

                                    <br>
                                    <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span> Supprimer</button>
                                     <!-- bouton de validation -->
                                </article>
                                </form>

                            <?php
                        }

                        // Le visiteur n'est pas autorisé à voir le formulaire
                        else
                        {
                            // N'affiche pas le formulaire
                            ?>
                            <article class="col-lg-4 col-md-12">
                              Veuillez vous connecter pour modifier ou supprimer une inscription
                            </article>
                            <?php
                        }
                        ?>

                     <article class="col-lg-12 col-md-12">
                        <!-- blanc -->
                    </article>
                    <?php
                    }

                    ?>
          </div>
        </section>
      </div>

      <footer class="row">
        <div class="col-sm-12">
          <?php include("pied_de_page.php"); ?>
        </div>
      </footer>
    </div>

  </body>
</html>
