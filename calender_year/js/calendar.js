class calendar {
    constructor(string){
        this.string = string;
        //今日
        this.today = new Date();
        // 月末だとずれる可能性があるため、1日固定で取得
        this.showDate = new Date(today.getFullYear(), today.getMonth(), 1);
        //週の配列
        this.week = ["日", "月", "火", "水", "木", "金", "土"];
        //週の英語の配列
        this.week_en = ["sun", "mon", "tue", "wed", "thu", "fri", "sat"];
    }

    // 前の月表示
    todayBtn(){
        this.showDate = new Date();
        this.showProcess(today, this.string);
    }

    // 前の月表示
    prev(){
        this.showDate.setMonth(showDate.getMonth() - 1);
        this.showProcess(showDate, this.string);
    }

    // 次の月表示
    next(){
        this.showDate.setMonth(showDate.getMonth() + 1);
        this.showProcess(showDate, this.string);
    }
    // カレンダー表示
    showProcess(date, string) {
        const year = date.getFullYear();
        let month = date.getMonth();
        let id = document.querySelector('.calendar-view>div');
        //id名を変更
        id.setAttribute('id', string);
        let h1 = document.querySelector('.calendar-title>h1');
        const calendarView = document.querySelector('#calendar');
        if(string === "month") {
            h1.innerHTML = year + "年" + (month + 1) + "月";
            const calendar = createProcess(year, month, string);
            calendarView.innerHTML = calendar;
        }
        if(string === "year") {
            h1.innerHTML = year + "年";
            let calendar = '<div class="' + string + '-container">';
            for(let i = 0; i < 12; i++) {
                month = i;
                calendar += createProcess(year, month, string);
            }
            calendarView.innerHTML = calendar;
        }
    }
    // カレンダー作成
    createProcess(year, month, string) {
        if (string === "month") {
                // 曜日
            var calendar = '<div class="' + string + '-container">';
            calendar += '<table id="' + (month + 1) + '" class="month-table" cellSpacing=0>';
            calendar += '<thead>';
            calendar += '<tr class="day-of-the-weeks">';
        for (var i = 0; i < week.length; i++) {
            calendar += "<th>" + week[i] + "</th>";
        }
            calendar += "</tr>";
            calendar += "</thead>";
            var count = 0;
            var startDayOfWeek = new Date(year, month, 1).getDay();
            var endDate = new Date(year, month + 1, 0).getDate();
            var lastMonthEndDate = new Date(year, month, 0).getDate();
            var row = 6;
        // 1行ずつ設定
        for (var i = 0; i < row; i++) {
            calendar += '<tr class="week">';
            // 1colum単位で設定
            for (var j = 0; j < week.length; j++) {
                if (i == 0 && j < startDayOfWeek) {
                    // 1行目で1日まで先月の日付を設定
                    let dayOfWeek = new Date(year, month - 1, lastMonthEndDate - startDayOfWeek + j + 1).getDay();
                    calendar += '<td class="disabled ' + week_en[dayOfWeek] + '">' + '<p class="day">' + (lastMonthEndDate - startDayOfWeek + j + 1) + '</p>' + '</td>';
                } else if (count >= endDate) {
                    // 最終行で最終日以降、翌月の日付を設定
                    count++;
                    dayOfWeek = new Date(year, month + 1, count - endDate).getDay();
                    calendar += '<td class="disabled ' + week_en[dayOfWeek] + '">' + '<p class="day">' + (count - endDate) + '</p>' + '</td>';
                } else {
                    // 当月の日付を曜日に照らし合わせて設定
                    count++;
                    if(year == today.getFullYear()
                    && month == (today.getMonth())
                    && count == today.getDate()){
                        dayOfWeek = new Date(year, month, count).getDay();
                        calendar += '<td class="' + week_en[dayOfWeek] + '">' + '<p class="today day">' + count + '</p>' + '</td>';
                    } else {
                        dayOfWeek = new Date(year, month, count).getDay();
                        calendar += '<td class="' + week_en[dayOfWeek] + '">' + '<p class="day">' + count + '</p>' + '</td>';
                    }
                }
            }
            calendar += "</tr>";
        }
        return calendar;
        }
        if (string === "year") {
        // 曜日
            var calendar = `<table id="${month + 1}" class="month-table">`;
            calendar += '<caption class="month">' + (month + 1) + '月</caption>';
            calendar += '<thead>';
            calendar += '<tr class="day-of-the-weeks">';
            for (var j = 0; j < week.length; j++) {
                calendar += "<th>" + week[j] + "</th>";
            }
                calendar += "</tr>";
                calendar += "</thead>";
                var count = 0;
                var startDayOfWeek = new Date(year, month, 1).getDay();
                var endDate = new Date(year, month + 1, 0).getDate();
                var lastMonthEndDate = new Date(year, month, 0).getDate();
                var row = 6;
            // 1行ずつ設定
            for (var j = 0; j < row; j++) {
                calendar += '<tr class="week">';
                // 1colum単位で設定
                for (var k = 0; k < week.length; k++) {
                    if (j == 0 && k < startDayOfWeek) {
                        // 1行目で1日まで先月の日付を設定
                        let dayOfWeek = new Date(year, month - 1, lastMonthEndDate - startDayOfWeek + k + 1).getDay();
                        calendar += '<td class="disabled ' + week_en[dayOfWeek] + '">' + '<p class="day">' + (lastMonthEndDate - startDayOfWeek + k + 1) + '</p>' + '</td>';
                    } else if (count >= endDate) {
                        // 最終行で最終日以降、翌月の日付を設定
                        count++;
                        dayOfWeek = new Date(year, month + 1, count - endDate).getDay();
                        calendar += '<td class="disabled ' + week_en[dayOfWeek] + '">' + '<p class="day">' + (count - endDate) + '</p>' + '</td>';
                    } else {
                        // 当月の日付を曜日に照らし合わせて設定
                        count++;
                        if(year == today.getFullYear()
                        && month == (today.getMonth())
                        && count == today.getDate()){
                            dayOfWeek = new Date(year, month, count).getDay();
                            calendar += '<td class="' + week_en[dayOfWeek] + '">' + '<p class="today day">' + count + '</p>' + '</td>';
                        } else {
                            dayOfWeek = new Date(year, month, count).getDay();
                            calendar += '<td class="' + week_en[dayOfWeek] + '">' + '<p class="day">' + count + '</p>' + '</td>';
                        }
                    }
                }
            calendar += "</tr>";
        }
        return calendar;
        }
}
}