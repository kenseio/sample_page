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
   $name = $_POST["name"] ;
   $account_num = $_POST["account_num"] ;

   //INSERT処理
   $sql = "INSERT INTO users (card_num, name, account_num) ";
   $sql .= "VALUES (:card_num, :name, :account_num)";
   $stmt = $conn->prepare($sql);
   $stmt->bindParam(':card_num', $card_num, PDO::PARAM_STR);
   $stmt->bindValue(':name', $name, PDO::PARAM_STR);
   $stmt->bindValue(':account_num', $account_num, PDO::PARAM_STR);
   $stmt->execute();

   //コミット実行
   $conn->commit();

   //HTML表示
   // print '<html><title>test</title></html>';
   $htmlstr = <<< EOD
     <html lang="ja" dir="ltr">
       <head>
         <meta charset="utf-8">
         <title>登録完了</title>
       </head>
       <body>
         <h1>登録完了</h1>
         <h2>登録した内容</h2>
         <dl class="card_num">
           <dt>カード番号</dt>
           <dd>{$card_num}</dd>
         </dl>
         <dl class="name">
           <dt>名前</dt>
           <dd>{$name}</dd>
         </dl>
         <dl class="account_num">
           <dt>口座番号</dt>
           <dd>{$account_num}</dd>
         </dl>
         <form class="return" action="register.php" method="get">
           <input type="submit" name="toregister" value="登録へもどる">
         </form>
         <form class="return" action="index.php" method="get">
           <input type="submit" name="totop" value="TOPへもどる">
         </form>
       </body>
     </html>
EOD;

 echo $htmlstr;

 }catch (ErrorException $ex){
   echo($ex->getMessage());

 }catch (PDOException $ex){
   echo($ex->getMessage());
 }
