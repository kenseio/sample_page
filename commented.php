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
   $comment = $_POST["comment"] ;

   //INSERT処理
   $sql = "INSERT INTO comments (card_num, comment) ";
   $sql .= "VALUES (:card_num, :comment)";
   $stmt = $conn->prepare($sql);
   $stmt->bindParam(':card_num', $card_num, PDO::PARAM_STR);
   $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
   $stmt->execute();

   //コミット実行
   $conn->commit();

 }catch (ErrorException $ex){
   echo($ex->getMessage());

 }catch (PDOException $ex){
   echo($ex->getMessage());
 }
 ?>

 <!DOCTYPE html>
 <html lang="ja" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>コメント登録完了</title>
   </head>
   <body>
     <h1>コメント登録完了</h1>
     <h2>登録したコメント</h2>
       <dl class="card_num">
         <dt>カード番号</dt>
         <dd><?php echo $card_num ?></dd>
       </dl>
       <dl class="comment">
         <dt>コメント</dt>
         <dd><?php echo $comment?></dd>
       </dl>
      <form class="return" action="search.php" method="get">
        <input type="submit" name="tosearch" value="検索へもどる">
      </form>
     <form class="return" action="index.php" method="get">
       <input type="submit" name="totop" value="TOPへもどる">
     </form>
   </body>
 </html>
