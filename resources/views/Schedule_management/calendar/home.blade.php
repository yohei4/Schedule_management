<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カレンダー(年)</title>
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/calendar/style.css">
</head>

<body>
    <div class="wrapper">
        <aside id="side-bar">
            <div id="group-name">
                <h2>グループ名</h2>
                <div class="arrow"></div>
            </div>
            <ul id="menu">
                <li class="menu-item"><button>カレンダー</button></li>
                <li class="menu-item"><button>グループ一覧</button></li>
                <li class="menu-item"><button>{{ Auth::user()->name }}</button></li>
            </ul>
        </aside>
        <main id="calendar-main">
            <div id="header-outer">
                <div id="header">
                    <div id="new_event__btn">
                        <P>新規イベントの作成</P>
                        <div class="plus-icon"></div>
                    </div>
                    <div id="calendar-change__btn__border">
                        <div class="btn-wrapper">
                            <button id="day_btn" class="calendar-change__btn" value="day">日</button>
                            <button id="week_btn" class="calendar-change__btn" value="week">週</button>
                            <button id="month_btn" class="calendar-change__btn" value="month">月</button>
                            <button id="year_btn" class="calendar-change__btn" value="year">年</button>
                        </div>
                    </div>
                    <div id="search">
                        <div class="search-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <form id="search-form" action="" method="GET">
                            <input class="search-text" type="search" placeholder="検索">
                        </form>
                    </div>
                </div>
            </div>
            <div class="calendar-view">
                <div>
                    <div id="calendar-header">
                        <div class="calendar-title">
                            <h1></h1>
                        </div>
                        <div id="calendar-pagination">
                            <ul class="pagination">
                                <li class="prev-btn"><button><a href="#">&lt;</a></button></li>
                                <li class="today-btn"><button><a href="#">今日</a></button></li>
                                <li class="next-btn"><button><a href="#">&gt;</a></button></li>
                            </ul>
                        </div>
                    </div>
                    <div id="calendar" class="calendar-main"></div>
                </div>
            </div>
        </main>
    </div>
    <script src="./js/Calendar.js"></script>
    <script src="./js/main.js"></script>
</body>
</html>