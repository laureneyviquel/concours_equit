<?php

// ici on aura un truc du style
// $tache = Tache::create();
// $tache->setX($_GET['X'])
// $tache->setY($_GET['Y'])
// $tache->setZ($_GET['Z'])
// $tache->save()

$tache = ORM::for_table('minichat')->create();
$tache->auteur($_GET['auteur']);
$tache->texte($_GET['texte']);
$tache->save();

/*
$inscription = ORM::for_table('tournoi')->create();
// SHOULD BE MORE ERROR CHECKING HERE!
// Set the properties of the object
$inscription->cavalier = $_POST['cavalier'];
$inscription->note = $_POST['note'];
$inscription->cheval = $_POST['cheval'];
$inscription->photo = $chemin_photo;
// Save the object to the database
$inscription->save();
*/


// et on retourne le json de $tache !
// NB : il faut appeler la méthode toArray de Paris, sinon ça chie
echo json_encode($tache->toArray());
// fin des bails
die();
