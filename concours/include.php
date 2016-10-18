<?php
session_start(); // On démarre la session AVANT toute chose

require_once 'idiorm.php';
require_once 'paris.php';

ORM::configure('mysql:host=fdb3.biz.nf;dbname=2212083_concour');
ORM::configure('username', '2212083_concour');
ORM::configure('password', 'Chev@l96');

class User extends Model {
 public static $_table = 'tournoi';
}
?>