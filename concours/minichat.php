<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Minichat</title>
    <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="lib/bootstrap/js/jquery.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style_bootstrap.css" />
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h1>Hello !<br /></h1>
          <p>voici le nouveau chat</p>


          <article id="messages"></article><br />
          

          <textarea id="auteur">Votre nom ici</textarea><br />
          <textarea id="texte" rows="8" cols="45">Votre message ici.</textarea><br />

          <button id="envoyer">Envoyer votre message</button><br />

          <script src="jquery.js"></script>
          <script>
            $(function() {
              $('#envoyer').click(function() {
                $.ajax({
                  type: 'GET',
                  url: 'api/api.php?action=creer&auteur=auteur&texte=texte',
                  timeout: 3000,
                  success: function(data) {
                    //alert(data);
                  },
                  error: function() {
                    alert('La requête n\'a pas abouti'); }
                });
              });
            });
            </script>
          </div>
          <div class="col-sm-12">
         <p>Si tu veux retourner à la page d'acceuil, <a href="site03.php">clique ici</a></p>
         </div>
        </div>
      </div>
  </body>
</html>
