<?php require_once('db.php'); ?>


<?php

$userID = $_SESSION['logged_id'];

$sql_select_insurantID = "SELECT insurant_id FROM insurant WHERE user_id = '$userID'";
$stmt = $conn->query($sql_select_insurantID);
$stmt->execute();
$insurants = $stmt->fetchAll();
foreach ($insurants as $insurant) {
  $insurantID .= $insurant['insurant_id'];
}

$sql_select_dogovor = "SELECT * FROM contract WHERE insurant_id = '$insurantID'";
$stmt = $conn->query($sql_select_dogovor);
$stmt->execute();
$dogovors = $stmt->fetchAll();


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Мои заказы</title>
    <link rel="stylesheet" href="/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div style="clear: both"><br></div>
    <ul class="menu-main">
      <li><a href="myDogovor.php" class="">Личный кабинет</a></li>
      <li><a href="services.php" class="">Услуги</a></li>
      <li><a href="kontacti.php" class="">Обратная связь</a></li>
      <li><a href="ad.php">О нас</a></li>
    </ul>
    <div class="container" style="margin-top: 50px; height: 400px; background-color: rgba(144, 53, 101, 0.21);">
      <?php if (!empty($dogovors)) : ?>
     <h1 align="center">Мои заказы</h1>
     <br>
     <div class="table-responsive">
      <table id="" class="table table-bordered table-striped" style="width: 1500px;">
       <thead>
        <tr>
         <th style='text-align: center;'>ID</th>
         <th>ID Страховщика</th>
         <th>ID Страхователя</th>
         <th>ID Застрахованного</th>
         <th>Дата начало</th>
         <th>Дата окончания</th>
         <th>Страховой случай</th>
         <th>Страховая сумма</th>
         <th>Дата заключения</th>
        </tr>
        <?php foreach ($dogovors as $dogovor): ?>
          <?php echo "<td style='text-align: center; padding: 15px 5px'>".$dogovor['contract_id']."</td>"; ?>
          <?php echo "<td style='text-align: center; padding: 15px 5px'>".$dogovor['insurer_id']."</td>"; ?>
          <?php echo "<td style='text-align: center; padding: 15px 5px'>".$dogovor['insurant_id']."</td>"; ?>
          <?php echo "<td style='text-align: center; padding: 15px 5px'>".$dogovor['insured_id']."</td>"; ?>
          <?php echo "<td style='text-align: center; padding: 15px 5px'>".$dogovor['start_date']."</td>"; ?>
          <?php echo "<td style='text-align: center; padding: 15px 5px'>".$dogovor['end_date']."</td>"; ?>
          <?php echo "<td style='text-align: center; padding: 15px 5px'>".$dogovor['insuranceEvent']."</td>"; ?>
          <?php echo "<td style='text-align: center; padding: 15px 5px'>".$dogovor['insuranceAmount']."</td>"; ?>
          <?php echo "<td style='text-align: center; padding: 15px 5px'>".$dogovor['insurancePeriod']."</td></tr>"; ?>
        <?php endforeach; ?>
       </thead>
      </table>
    </div>
    <?php else : ?>
      <?php echo '<h1 style="margin: o auto;">У вас нет заказов!</h1>' ?>
      <?php endif; ?>
   </div>
  </body>
</html>
