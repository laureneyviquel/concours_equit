<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Minichat</title>
    <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="lib/bootstrap/js/jquery.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/bootstrap/js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style_bootstrap.css" />
  </head>

  <body>
    <div class="container">
      <div class="">
        <div class="row">
          <h1>Hello !<br /></h1>
          <p>voici le nouveau chat</p><br /><br />


          <div id="messages">

          </div><br />
          <button id="rafraichir" class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh"></span> Rafraichir la page</button><br /><br />

          <label>Votre prénom ici</label>
          <input type="text" id="auteur"/><br />
          <label>Votre message ici.</label>
          <textarea id="texte" rows="8" cols="45"></textarea><br /><br />

          <button id="envoyer" class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-send"></span> Envoyer votre message</button><br /><br />


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
                  boutonDetail(message);
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
                    effacer();
                  },
                  error: function() {
                    alert('La requête n\'a pas abouti');
                  }
                });

              });

              function ajouterMessage(message){
                var s = '';
                s += '<article class="message">';
                s += '<b><span class="glyphicon glyphicon-user"></span>'+' '+message.auteur+'</b> a dit '+message.texte;
                s += '</article>';
                $('#messages').append(s);
              };

              function boutonSupprimer(message){
                var s = '';
                s += '<span class="supprimer btn btn-danger" onclick="supprimerMessage('+message.id+')" >';
                s += '<span class="glyphicon glyphicon-trash"></span>';
                s += ' supprimer';
                s += '</span>';
                $('#messages').append(s);
              };

              function boutonDetail(message){
                var s = '';
                s += '<span class="supprimer btn btn-warning" onclick="detailMessage('+message.id+')" >';
                s += '<span class="glyphicon glyphicon-edit"></span>';
                s += ' detail';
                s += '</span>';
                $('#messages').append(s);
              };


              //raffraichit la page quand on clique sur le bouton rafraichir
              $( "#rafraichir" ).click(function() {
                  raffraichir();
              });

            });
            // au clic sur supprimer
            function supprimerMessage(identifiant) {
              console.log('id du message à supprimer'+identifiant);
              $.ajax({
                type: 'GET',
                url: 'api/api.php?action=supprimer&identifiant='+identifiant,
                timeout: 3000,
                success: function(data) {
                  // si la suppression du message s'est bien passée,
                  // on arrive dans cette fonction
                  // on regarde ce qu'il y a dans data
                  console.log(data);
                  raffraichir();
                },
                error: function() {
                  alert('La requête n\'a pas abouti');
                }
              });

            };

            // au clic sur detail
            function detailMessage(identifiant) {
              console.log('id du message à detailler'+identifiant);
              $.ajax({
                type: 'GET',
                url: 'api/api.php?action=consulter&identifiant='+identifiant,
                timeout: 3000,
                success: function(data) {
                  // si la suppression du message s'est bien passée,
                  // on arrive dans cette fonction
                  // on regarde ce qu'il y a dans data
                  console.log(data);
                  alert(data);
                },
                error: function() {
                  alert('La requête n\'a pas abouti');
                }
              });

            };

            //vide les champs quand on envoie un message
            function effacer () {
              $(':input')
               .not(':button, :submit, :reset, :hidden')
               .val('')
               .removeAttr('checked')
               .removeAttr('selected');
            }

            function raffraichir () {
              location.reload();
            }



            </script>
          </div>
          <div class="row">
         <p>Si tu veux retourner à la page d'acceuil, <a href="site03.php">clique ici</a></p>
         </div>
        </div>
      </div>
  </body>
</html>
