<?php

// ici on aura un truc du style
// $tache = Tache::create();
// $tache->setX($_GET['X'])
// $tache->setY($_GET['Y'])
// $tache->setZ($_GET['Z'])
// $tache->save()

// et on retourne le json de $tache !
// NB : il faut appeler la méthode toArray de Paris, sinon ça chie
echo json_encode($tache->toArray());
// fin des bails
die();
