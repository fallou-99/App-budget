<?php
include ('database.php');

$id = $_GET['id'];

$req = $connexion->prepare('DELETE FROM revenus WHERE id_revenus=?');

$req->execute(array($id));
header('location:index.php');



?>