<?php

// check si on a bien du GET
if(!isset($_GET) || empty($_GET)){
  die('il faut envoyer des données GET !');
}

// ici, ajoutez le code pour require IdiORM, Paris, etc
 include("include_minichat.php");

// selon le verbe d'action, on require le bon fichier
switch($_GET['action']){
  case 'creer':
    require_once('api_creer.php');
    break;
  case 'consulter':
    require_once('api_consulter.php'); //retourne 1 message
    break;
  case 'index':
    require_once('api_index.php'); //retourne tous les messages du chat
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
