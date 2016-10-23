<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Minichat</title>
    <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="lib/bootstrap/js/jquery.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/bootstrap/js/jquery.min.js"></script>
    <script src="lib/bootstrap/fronts/glyphicons-halflings-regular.woff"></script>
    <link rel="stylesheet" href="css/style_bootstrap.css" />
  </head>

  <body>
    <div class="container">
      <div class="">
        <div class="row">
          <h1>Hello !<br /></h1>
          <p>voici le nouveau chat</p>


          <div id="messages">

          </div>

          <label>Votre prénom ici</label>
          <input type="text" id="auteur"/><br />
          <label>Votre message ici.</label>
          <textarea id="texte" rows="8" cols="45"></textarea><br />

          <button id="envoyer">Envoyer votre message</button><br />


          <script>
            $(function() {
              // de base on télécharge tous les messages
              $.get('api/api.php?action=index', function(data){ // raccourci par rapport à $.ajax({ ... })
                // on check que c'est bien conforme
                console.log(data);
                // conversion en objets javscript
                var messages = $.parseJSON(data);
                // check que c'est bien conforme
                console.log(messages);
                // maintenant, pour chaque message, on l'ajoute à la div#messages :)
                for(var i=0 ; i<messages.length ; i++){
                  var message = messages[i];
                  ajouterMessage(message);
                  boutonSupprimer(message);
                }
              })
              // au clic sur envoyer
              $('#envoyer').click(function() {
                // on récupère le nom de l'auteur
                var auteur = $("#auteur").val();
                // on récupère le contenu du message
                var message = $('#texte').val();
                console.log('Envoi du message '+auteur+' : '+message);

                $.ajax({
                  type: 'GET',
                  url: 'api/api.php?action=creer&auteur='+auteur+'&message='+message,
                  timeout: 3000,
                  success: function(data) {
                    // si l'ajout du message s'est bien passé,
                    // on arrive dans cette fonction
                    // on regarde ce qu'il y a dans data
                    console.log(data);
                    // normalement c'est un JSON, donc on le convertit
                    var message = $.parseJSON(data);
                    // puis on l'ajoute à la liste des messages :)
                    ajouterMessage(message);

                  },
                  error: function() {
                    alert('La requête n\'a pas abouti');
                  }
                });

              });

              // au clic sur supprimer
              $('.supprimer').click(function() {
                console.log('click sur supprimer');
                // on récupère l'id du message
                var identifiant = $('id').val();
                console.log('id du message supprimer'+identifiant);

                $.ajax({
                  type: 'GET',
                  url: 'api/api.php?action=supprimer&identifiant='+identifiant,
                  timeout: 3000,
                  success: function(data) {
                    // si l'ajout du message s'est bien passé,
                    // on arrive dans cette fonction
                    // on regarde ce qu'il y a dans data
                    console.log(data);
                  },
                  error: function() {
                    alert('La requête n\'a pas abouti');
                  }
                });

              });

              function ajouterMessage(message){
                $('#messages').append('<article class="message"><b>'+message.auteur+'</b> a dit '+message.texte+'</article>');
              }

              function boutonSupprimer(message){
                //$('#messages').append('<input type="hidden" name="id" value= '+message.identifiant+' />');
                $('#messages').append('<input  class="supprimer btn btn-danger" type="submit" value= '+message.identifiant+' />');
                //$('#messages').append('<button class="supprimer" type="submit"><span class="glyphicon glyphicon-trash"></span> Supprimer</button>');
              }




            });
            </script>
          </div>
          <div class="row">
         <p>Si tu veux retourner à la page d'acceuil, <a href="site03.php">clique ici</a></p>
         </div>
        </div>
      </div>
  </body>
</html>
