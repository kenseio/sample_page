<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>検索</title>
  </head>
  <body>
    <h1>検索用画面</h1>
    <h2>検索条件</h2>
    <div class="input_area">
      <form action="member.php" method="post" id="input_form">
        <dl class="card_num">
          <dt>カード番号</dt>
          <dd><input type="text" name="card_num" value=""></dd>
        </dl>
        <input type="hidden" name="eventID" value="save">
        <input type="submit" name="submit" value="検索">
      </form>
      <form class="return" action="index.php" method="get">
        <input type="submit" name="totop" value="TOPへもどる">
      </form>
    </div>
  </body>
</html>
