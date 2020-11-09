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
    <form action="red.php" method="GET">
      <?php
      require 'dbconf.php';
      $id = $_GET['id'];
      $query = $pdo->prepare('SELECT * FROM `tasks` WHERE `id` = ?');
      $query->execute([$id]);
      $tmp = $query->fetch(PDO::FETCH_OBJ);
        echo '
          <b>'.$tmp->id.'</b>
          <br><br>
          <input class="form-control" type="hidden" name="id" value='.$tmp->id.'>
          <input class="form-control" type="text" name="task" id ="list" value='.$tmp->task.'><br>
          <button class="btn btn-danger" type="submit" name="send"> Сохранить </button>';
      ?>
    </form>
  </div>
</body>
</html>
