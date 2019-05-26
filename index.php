<?php
require_once('db.php');

  if (isset($_POST['submit'])) {
    $login = $_POST['username'];
    $password = $_POST['password'];
    if (!empty($login) && !empty($password)) {
      $sql_select = "SELECT * FROM users WHERE login = '$login'";
      $stmt = $conn->query($sql_select);
      $stmt->execute(array(
        'user_id' => $user['user_id'],
        'login' => $user['login'],
        'password' => $user['password']
      ));
      $data = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($password == $data['password']) {
          $_SESSION['logged_id'] = $data['user_id'];
          $_SESSION['logged_user'] = $data['login'];
      }
      else {
        echo '<div style = "color: red; text-align: center;">Неправельный логин или пароль!</div><hr>';
      }
    }
    else {
      echo '<div style = "color: red; text-align: center;">Поля заполнены не правельно!</div><hr>';
    }
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <title>Авторизация</title>
  </head>
  <body>

    <div class="container">
      <?php if (empty($_SESSION['logged_user'])) : ?>
      <img src="img/lock.png">
      <form class="" action="index.php" method="post">
        <div class="dws-input">
          <input type="text" name="username" placeholder="Введите логин">
        </div>
        <div class="dws-input">
          <input type="password" name="password" placeholder="Введите пароль" >
        </div>
        <input class="dws-submit" type="submit" name="submit" value="Войти">
        <br>
        <a href="\sugnup.php">Регистрация</a>
      </form>

    <?php elseif($_SESSION['logged_user'] == 'ADMIN' || $_SESSION['logged_user'] == 'admin') : ?>

      <div style="padding: 10px;">
        <h1 style="color: white;">Добро пожаловать, <span style="color: #eec30a;"><?php echo $_SESSION['logged_user']; ?></span></h1>


      </div>

      <hr>

      <div style="padding: 45px;font-size: 2.1em;">
        <p><a href="\table-bd.php" style="color: #ee7e0a;">Панель администратора</a></p>
        <p><a href="\exit.php" style="color: #f0f0f0;">Выйти</a></p>
      </div>


    <?php else : ?>
      <div style="padding: 10px;">
        <h1 style="color: white;">Добро пожаловать, <span style="color: #eec30a;"><?php echo $_SESSION['logged_user']; ?></span></h1>
      </div>

      <hr>

      <div style="padding: 45px;font-size: 2.1em;">
        <p><a href="\main.php" style="color: rgba(#2a5870, 0.59);">Главная</a></p>
        <p><a href="\exit.php" style="color: #f0f0f0;">Выйти</a></p>
      </div>
    <?php endif; ?>

    </div>
  </body>
</html>
