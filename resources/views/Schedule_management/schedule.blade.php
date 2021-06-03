<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>スケジュール入力</title>
</head>
<body>
  <div id="container">
    <form action="home" id="submit" method="POST">
      <div class="modal">
          <input class="title" type="text" name="title" style="border:none" placeholder="新規イベント名">
          <input class="place" type="text" name="place" style="border:none" placeholder="場所を追加">
          <div class="underline"></div>
          <div class="center">
            <p class="endday"><span>終日：</span>
              <input type="checkbox" name="endday">
            </p>
            <p>開始：
              <input type="date" name="start" value="2021-01-01"><input type="time" value="10:00">
            </p>
            <p>終了：
              <input type="date" name="end" value="2021-01-01"><input type="time" value="10:00">
            </p>
          </div>
          <div class="btn">
            <button type="submit" form="submit">登録</button>
          </div>
          <div class="underline"></div>
      </div>
    </form>
  </div>
</body>
</html>