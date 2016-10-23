<?php

//$message = ORM::for_table('minichat')->create();
$message = Message::find_one($_GET['identifiant']);
$message->delete();
// Syncronise the object with the database
$message->save();


// et on retourne le json de $message !
// NB : il faut appeler la méthode asArray de Paris, sinon ça chie
// hehe, pourquoi à la suppression d'un message, tu voudrais retourner ce meme message ? :p
// on va plutot retourner un truc du style 'ok'
echo json_encode('ok');
