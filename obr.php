<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Обратная связь</title>
    <link rel="stylesheet" href="css/main.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="css/aside.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="css/form.css" type="text/css" charset="utf-8">
  </head>
  <body>
      <div style="clear: both"><br></div>
    <ul class="menu-main">
          <li><a href="myDogovor.php" class="">Личный кабинет</a></li>
          <li><a href="services.php" class="">Услуги</a></li>
          <li><a href="kontacti.php" class="">Обратная связь</a></li>
          <li><a href="ad.php">О нас</a></li>
    </ul>
      <div id="content" style="margin-left: 350px;">
      <div id="main">
        <div id="news">
           <h2 class="">Обратная связь</h2>
           <div style="clear: both"><br></div>
            <div class="block">
              Чтобы отправить нам ваше сообщение, просто заполните форму и отправьте нам
              <form>
                <div>
                  <input type="text" id="name" placeholder="Ваше имя"
                  onclick="$(this).css ('border-color', '#ccc')" style="background-color: white; border: 1px solid #c4c4c4; color: black;">
                  <br>
                  <input type="email" id="email" placeholder="Email.."
                  onclick="$(this).css ('border-color', '#ccc')">
                </div>
                <div>
                  <textarea id="message" placeholder="Введите само сообщение"
                  onclick="$(this).css ('border-color', '#ccc')"></textarea>
                </div>
                <input type="button" id="send" class="btn" value="Отправить">
              </form>
            </div>
          </div>
        </div>
            <div style="clear: both"><br></div>
    </div>
  </body>
</html>
