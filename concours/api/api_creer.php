<?php

// ici on aura un truc du style
// $message = Tache::create();
// $message->setX($_GET['X'])
// $message->setY($_GET['Y'])
// $message->setZ($_GET['Z'])
// $message->save()

//$message = ORM::for_table('minichat')->create();
$message = Message::create();
$message->auteur = ($_GET['auteur']);
$message->texte = ($_GET['message']);
$message->save();



// et on retourne le json de $message !
// NB : il faut appeler la méthode asArray de Paris, sinon ça chie
echo json_encode($message->asArray());
