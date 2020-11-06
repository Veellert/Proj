<?php
require 'dbconf.php';
$id = $_GET['id'];
$sql = 'UPDATE `tasks` SET `done` = 1 WHERE `id` = ?';
$query = $pdo->prepare($sql);
$query->execute([$id]);
header('Location: ./index.php');
