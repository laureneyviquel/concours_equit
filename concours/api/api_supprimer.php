<?php

//$message = ORM::for_table('minichat')->create();
$message = Message::for_table('minichat')->find_one($_GET['identifiant']);
$message->delete();
// Syncronise the object with the database
$message->save();


// et on retourne le json de $message !
// NB : il faut appeler la méthode asArray de Paris, sinon ça chie
echo json_encode($message->asArray());
