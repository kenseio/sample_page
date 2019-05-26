<?php

 try{
   //DBコネクションを取得する
   $dsn = 'mysql:host=localhost;dbname=test;charset=utf8';
   $dbid = 'root';
   $dbpw = 'VO8vJmecXSaN';
   $conn = new PDO($dsn, $dbid, $dbpw,
           array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

   //トランザクションを開始する
   $conn->beginTransaction();

   //パラメータ値
   $card_num = $_POST["card_num"] ;

   //SELECT処理 from users
   $sql = "SELECT card_num, name, account_num FROM users ";
   $sql .= "WHERE card_num = :card_num;";
   $stmt = $conn->prepare($sql);
   $stmt->bindParam(':card_num', $card_num, PDO::PARAM_STR);
   $stmt->execute();

   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $card_num = $row["card_num"];
    $name = $row["name"];
    $account_num = $row["account_num"];
  }

  //SELECT処理 from comments
  $sql = "SELECT comment FROM comments ";
  $sql .= "WHERE card_num = :card_num;";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':card_num', $card_num, PDO::PARAM_STR);
  $stmt->execute();

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   $comment .= $row["comment"] . "</br>";
 }

 echo $htmlstr;

 }catch (ErrorException $ex){
   echo($ex->getMessage());

 }catch (PDOException $ex){
   echo($ex->getMessage());
 }
?>
 <html lang="ja" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>会員照会</title>
   </head>
   <body>
     <h1>会員照会</h1>
     <h2>会員の情報</h2>
     <dl class="card_num">
       <dt>カード番号</dt>
       <dd><?php echo $card_num ?></dd>
     </dl>
     <dl class="name">
       <dt>名前</dt>
       <dd><?php echo $name ?></dd>
     </dl>
     <dl class="account_num">
       <dt>口座番号</dt>
       <dd><?php echo $account_num ?></dd>
     </dl>
     <dl class="account_num">
       <dt>コメント</dt>
       <dd><?php echo $comment ?></dd>
     </dl>
    <h3>新規コメント登録</h3>
    <form class="comment" action="commented.php" method="post">
      <input type="text" name="comment" value="" size=50 required>
      <input type="hidden" name="card_num" value=<?php echo $card_num ?>>
      <input type="submit" name="submit" value="コメント登録">
    </form>
    <form class="return" action="search.php" method="get">
      <input type="submit" name="tosearch" value="検索へもどる">
    </form>
    <form class="return" action="index.php" method="get">
      <input type="submit" name="totop" value="TOPへもどる">
    </form>
   </body>
 </html>
