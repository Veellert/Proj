<?php
  require 'dbconf.php';
  $id = $_GET['id'];
  $task = $_GET['task'];
  $query = $pdo->prepare('UPDATE `tasks` SET `task` = ? WHERE `id` = ?');
  $query->execute(array($task, $id));
  header('Location: ./index.php');
