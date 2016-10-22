<?php

// ici on aura un truc du style
// $tache = Tache::find($_GET['id']);
// $tache->setX($_GET['X'])
// $tache->setY($_GET['Y'])
// $tache->setZ($_GET['Z'])
// $tache->save()

$person = ORM::for_table('tournoi')->find_one($_GET['id']);
// The following two forms are equivalent
$person->set('cavalier', $_GET['cavalier']);
$person->note = $_GET['note'];
$person->set('cheval', $_GET['cheval']);
$person->set('id', $_GET['id']);
// Syncronise the object with the database
$person->save();

// et on retourne le json de $tache !
// NB : il faut appeler la méthode toArray de Paris, sinon ça chie
echo json_encode($tache->toArray());
// fin des bails
die();
