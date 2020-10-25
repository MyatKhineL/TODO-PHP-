<?php
require_once "config.php";

$pdostatement = $pdo->prepare("DELETE FROM doto WHERE id=".$_GET['id']);
$pdostatement->execute();

header("location:index.php");
?>