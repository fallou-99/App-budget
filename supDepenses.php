<?php
include ('database.php');

$id = $_GET['id'];

$req = $connexion->prepare('DELETE FROM depenses WHERE id=?');

$req->execute(array($id));
header('location:index.php');



?>