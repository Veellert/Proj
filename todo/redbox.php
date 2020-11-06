<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Туду лист</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
    <h1>ToDo:</h1>
    <?php
        require 'dbconf.php';
        echo '<ul>';
        $id = $_GET['id'];
        $query = $pdo->prepare("SELECT * FROM `tasks` WHERE `id` = ?");
        $query->execute([$id]);
        while($tmp = $query->fetch(PDO::FETCH_ASSOC))
        {
        echo '<li><b>'.$tmp->task.'</b>
          <a href="./del.php?id='.$tmp->id.'"><br><button class="btn btn-danger"> Удалить</button></a>
          <a href="./donetodo.php?id='.$tmp->id.'"><button class="btn btn-success"> Выполнить</button></a>
          <a href="./redbox.php?id='.$tmp->id.'"><button class="btn btn-primary"> Редактировать</button></a>
        </li>';
      }
        echo '</ul>';
    ?>
  </div>
</body>
</html>
