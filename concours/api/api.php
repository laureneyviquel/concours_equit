<?php

// check si on a bien du GET
if(!isset($_GET) || empty($_GET)){
  die('il faut envoyer des données post !');
}

// ici, ajoutez le code pour require IdiORM, Paris, etc

// selon le verbe d'action, on require le bon fichier
switch($_GET['action']){
  case 'creer':
    require_once('api_creer.php');
    break;
  case 'consulter':
    require_once('api_consulter.php');
    break;
  case 'index':
    require_once('api_index.php');
    break;
  case 'modifier':
    require_once('api_modifier.php');
    break;
  case 'supprimer':
    require_once('api_supprimer.php');
    break;
  default:
    die('le verbe d\'action n\'est pas valide !');
}
