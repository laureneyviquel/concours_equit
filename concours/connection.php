<?php include("include.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Connexion</title>
        <meta charset="utf-8" />
        <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="lib/bootstrap/css/tuto.css" rel="stylesheet">
        <style type="text/css">
            .col-lg-2 { line-height: 100px; }
            .col-lg-5 { line-height: 200px; }
            .col-lg-12 { line-height: 80px; }
          body { background-color:#DDD; }
          [class*="col"] { margin-bottom: 20px; }
          img { width: 100%; }
          .well {
            background-color:#CCC;
            padding: 20px;
          }
            @media (min-width: 768px) {
          .container {
            width: 750px;
          }
          }
          @media (min-width: 992px) {
            .container {
              width: 970px;
            }
          }
          @media (min-width: 1200px) {
            .container {
              width: 1170px;
            }
          }
          </style>
    </head>
    <body id="connection">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
            <h1>Connexion</h1>
        </div>
        <div class="col-sm-12">
        <p>Veuillez entrer le mot de passe pour obtenir le droit d'inscrire, de modifier et de supprimer les résultats en concours des cavaliers et de leur monture :</p>

        </div>
        <div class="col-sm-12">
        <?php
        // Le mot de passe n'a pas été envoyé ou n'est pas bon
        if (!isset($_POST['mot_de_passe']) OR $_POST['mot_de_passe'] != "admin")
        {
            ?>
            <!-- Afficher le formulaire de saisie du mot de passe -->
        <form action="connection.php" method="post" class="form-inline">
            <div class="input-group col-lg-4">
                <input type="password" name="mot_de_passe" class="form-control">
                <?php
                $_SESSION['prenom'] = 'mot_de_passe';
                ?>
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit">Valider</button>
                </span>
            </div>
        </form>
        <?php
        }
        // Le mot de passe a été envoyé et il est bon
        else
        {
            ?>
            <!-- Afficher les codes secrets-->
            <div class="col-sm-12">Vous etes connecté </div>
            <?php
            $_SESSION['prenom'] = 'autorise';
            ?>
            <?php
        }
        ?>

<!--
        <div class="col-lg-4">
          <form class="form-inline well">
            <div class="form-group">
              <label class="sr-only" for="text">Saisie</label>
              <input id="text" type="password" name="mot_de_passe" class="form-control" placeholder="Mot de passe ici">
              <?php
               // $_SESSION['prenom'] = 'mot_de_passe';
                ?>
            </div>
            <button type="submit" class="btn btn-primary pull-right"><span class = "glyphicon glyphicon-user" ></span> Connexion</button>
            <div class="alert alert-block alert-danger" style="display:none">
              <h4>Erreur !</h4>
              Votre mot de passe n'est pas valide !
            </div>
          </form>
        </div>
        <script src="bootstrap/js/jquery-3.1.1.js"></script>
        <script>
          $(function(){
            $("form").on("submit", function() {
              if(!isset($_POST['mot_de_passe']) OR $_POST['mot_de_passe'] != "admin") {
                $("div.form-group").addClass("has-error");
                $("div.alert").show("slow").delay(4000).hide("slow");
                return false;
              }
               // Le mot de passe a été envoyé et il est bon
                else
                {

                    //Vous etes connecté
                    <?php
                   // $_SESSION['prenom'] = 'autorise';
                    ?>

                }

            });
          });
        </script>
-->
        </div>
         <div class="col-sm-12">
        <p>Si tu veux lire la liste des cavaliers déjà inscrit, <a href="site03.php">clique ici</a> pour revenir à la page précédente site.php.</p>
        </div>
      </div>
      </div>


    </body>
</html>
