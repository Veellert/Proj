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
    <form action="addtodo.php" method="GET" class="frame">
      <input class="form-control" type="text" name="list" id ="list" placeholder="Введите текст заметки..." value=''><br>
      <button class="btn btn-danger" type="submit" name="send"> Добавить </button>
    </form>
    <?php
        require 'dbconf.php';
        echo '<ul>';
        $query = $pdo->query('SELECT * FROM `tasks`');
        while($tmp = $query->fetch(PDO::FETCH_OBJ))
        {
          if($tmp->done == 0)
          {
            echo '
            <li>
            <b>'.$tmp->id.') </b>
            <b>'.$tmp->task.'</b>
            <br>
            <a href="./del.php?id='.$tmp->id.'"><br><button class="btn btn-danger"> Удалить</button></a>
            <a href="./donetodo.php?id='.$tmp->id.'"><button class="btn btn-success"> Выполнить</button></a>
            <a href="./redbox.php?id='.$tmp->id.'"><button class="btn btn-primary"> Редактировать</button></a>
            </li>
            ';
          }
          else
          {
            echo '
            <li>
            <b>'.$tmp->id.') </b>
            <b>'.$tmp->task.'</b>
            <br>
            <a href="./del.php?id='.$tmp->id.'"><br><button class="btn btn-danger"> Удалить</button></a>
            <button class="btn btn-outline-secondary" disabled> Сделано</button>
            <a href="./redbox.php?id='.$tmp->id.'"><button class="btn btn-primary"> Редактировать</button></a>
            </li>
            ';
          }
        }
        echo '</ul>';
    ?>
    </div>
</body>
</html>
