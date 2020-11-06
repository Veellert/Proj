<?php
require 'dbconf.php';
$id = $_GET['id'];
$task = $_GET['task'];
$sql = "UPDATE `tasks` SET `task` = '$task' WHERE `id` = ?";
$query = $pdo->prepare($sql);
$query->execute([$id]);
header('Location: ./index.php');
