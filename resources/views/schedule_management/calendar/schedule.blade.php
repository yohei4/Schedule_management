<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/calendar/schedule/schedule.css">
  <title>スケジュール入力</title>
</head>
<body>
  <div id="container">
    <form action="{{ route('home') }}" id="submit" method="POST">
    @csrf
      <div class="modal">
          <input class="title" type="text" name="title" style="border:none" placeholder="新規イベント名">
          <input class="place" type="text" name="place" style="border:none" placeholder="場所を追加">

      @if($errors->has('title'))
        <p class="error">※{{ $errors->first('title') }}</p>
      @endif
      @if($errors->has('place'))
        <p class="error">※{{ $errors->first('place') }}</p>
      @endif

          <div class="underline"></div>
          <div class="center">
            <p class="endday"><span>終日：</span>
            <input type="hidden" name="checkbox" value="0">
              <input type="checkbox" name="checkbox" value="1" onclick="checkdiv(this,'checkBox')">
              <input type="date" name="endday" value="2021-01-01">
            </p>
            <div id="checkBox">
              <p>開始：
                <input type="datetime-local" name="start" value="2021-01-01T10:00">
                </p>
                <p>終了：
                  <input type="datetime-local" name="end" value="2021-01-01T10:00">
                </p>
            </div>
          </div>
          <div class="btn">
            <button type="submit" form="submit">登録</button>
          </div>
          <div class="underline"></div>
      </div>
    </form>
  </div>

<script src="./js/schedule.js"></script>


</body>
</html>