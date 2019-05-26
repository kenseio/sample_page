<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>登録</title>
  </head>
  <body>
    <h1>登録用画面</h1>
    <h2>入力エリア</h2>
    <div class="input_area">
      <form action="registered.php" method="post" id="input_form">
        <dl class="card_num">
          <dt>カード番号</dt>
          <dd><input type="text" name="card_num" value=""></dd>
        </dl>
        <dl class="name">
          <dt>名前</dt>
          <dd><input type="text" name="name" value=""></dd>
        </dl>
        <dl class="account_num">
          <dt>口座番号</dt>
          <dd><input type="text" name="account_num" value=""></dd>
        </dl>
        <input type="hidden" name="eventID" value="save">
        <input type="submit" name="submit" value="登録">
      </form>
      <form class="return" action="index.php" method="get">
        <input type="submit" name="totop" value="TOPへもどる">
      </form>
    </div>
  </body>
</html>
