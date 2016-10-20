<?php
session_start(); // On démarre la session AVANT toute chose

require_once 'lib/idiorm.php';
require_once 'lib/paris.php';

ORM::configure('mysql:host=localhost;dbname=concours_equitation');
ORM::configure('username', 'root');
ORM::configure('password', '');

class User extends Model {
 public static $_tache = 'minichat';
}
?>
