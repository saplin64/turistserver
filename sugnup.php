<?php
require_once('db.php');
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_2 = $_POST['password-2'];
    $email = $_POST['email'];
    $err = array();
    if(empty($username)) {
        $err[] = 'Поле логин незаполненно!';
    }
    elseif(empty($email)) {
        $err[] = 'Поле E-mail незаполненно!';
    }
    elseif(empty($password)) {
        $err[] = 'Поле пароль незаполненно!';
    }
    elseif($password != $password_2) {
        $err[] = 'Неправельно заполнен повторный пароль';
    }
    if(empty($err)) {
        $sql_select = "SELECT * FROM users WHERE login = '$username' OR email = '$email' ";
        $stmt = $conn->query($sql_select);
        $stmt->execute();
        $data = $stmt->fetchAll();
        if(count($data) == 0) {
            $sql_insert = "INSERT INTO users (login, password, email) VALUES (?,?,?)";
            $stmt = $conn->prepare($sql_insert);
            $stmt->bindValue(1, $username);
            $stmt->bindValue(2, $password);
            $stmt->bindValue(3, $email);
            $stmt->execute();
            echo '<div style= "color: blue; text-align: center;">Вы зарегистрированны!</div><hr>';
        }
        else {
            echo '<div style = "color: red; text-align: center;">Пользователь с таким логином или E-mail уже существует!</div><hr>';
        }
    }
    else {
        echo '<div style = "color: red; text-align: center;">'.array_shift($err).'</div><hr>';
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/sug.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <title>Регистрация</title>
  </head>
  <body>
    <div class="container">
      <a href="/index.php"><img src="img/user.png"></a>
      <form class="" action="sugnup.php" method="post">
        <div class="dws-input">
          <input type="text" name="username" placeholder="Придумайте логин" required>
          <input type="text" name="email" placeholder="Ваш E-mail..." required>
          <input type="password" name="password" placeholder="Придумайте пароль" required>
          <input type="password" name="password-2" placeholder="Введите пароль еще раз" required>
        </div>
        <input class="dws-submit" type="submit" name="submit" value="Регистрация">
      </form>
    </div>
  </body>
</html>
