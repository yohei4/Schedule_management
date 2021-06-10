class Calendar {
    constructor(string, date = null){
        this.string = string;
        //今日
        this.today = new Date();
        //現在見ているカレンダーの日付を取得するために使う
        this.getDate;
        //class内に入ってくる日付
        this.setDate = date;
        // 月末だとずれる可能性があるため、1日固定で取得
        this.showDate = this.isset(date) ? new Date(this.today.getFullYear(), this.today.getMonth(), 1) : this.setDate;
        //週の配列
        this.week = ["日", "月", "火", "水", "木", "金", "土"];
        //週の英語の配列
        this.week_en = ["sun", "mon", "tue", "wed", "thu", "fri", "sat"];
        //表示するカレンダーを取得
        this.calendar = document.querySelector('#calendar');
    }

    // 前の月表示
    todayBtn(){
        this.getDate = this.showDate = new Date();
        this.showProcess(this.showDate, this.string);
    }

    // 前の月表示
    prev(){
        if(this.string === "month") {
            this.showDate.setMonth(this.showDate.getMonth() - 1);
        }
        if(this.string === "year") {
            this.showDate.setFullYear(this.showDate.getFullYear() - 1);
        }
        this.getDate = this.showDate;
        this.showProcess(this.showDate, this.string);
    }

    // 次の月表示
    next(){
        if(this.string === "month") {
            this.showDate.setMonth(this.showDate.getMonth() + 1);
        }
        if(this.string === "year") {
            this.showDate.setFullYear(this.showDate.getFullYear() + 1);
        }
        this.getDate = this.showDate;
        this.showProcess(this.showDate, this.string);
    }
    
    // カレンダー表示
    showProcess(date = this.today, string = this.string) {
        let year = date.getFullYear();
        let month = date.getMonth();
        let id = document.querySelector('.calendar-view>div');
        //id名を変更
        id.setAttribute('id', string);
        let h1 = document.querySelector('.calendar-title>h1');
        let calendar = '<div class="' + string + '-container">';
        if(string === "month") {
            h1.innerHTML = year + "年" + (month + 1) + "月";
            calendar += this.createProcess(year, month, string);
            this.calendar.innerHTML = calendar;
        }
        if(string === "year") {
            h1.innerHTML = year + "年";
            for(let i = 0; i < 12; i++) {
                month = i;
                calendar += this.createProcess(year, month, string);
            }
            this.calendar.innerHTML = calendar;
        }
    }
    // カレンダー作成
    createProcess(year, month, string) {
        if (string === "month") {
            // 曜日
            let calendar = '<table id="' + (month + 1) + '" class="month-table" cellSpacing="0">';
            calendar += this.createMonth(year, month);
            return calendar;
        }
        if (string === "year") {
            // 曜日
            let calendar = `<table id="${month + 1}" class="month-table">`;
            calendar += '<caption class="month">' + (month + 1) + '月</caption>';
            calendar += this.createMonth(year, month);
            return calendar;
        }
    }

    createMonth(year, month){
        let calendar = '<thead>';
        calendar += '<tr class="day-of-the-weeks">';
        for (let i = 0; i < this.week.length; i++) {
            calendar += "<th>" + this.week[i] + "</th>";
        }
        calendar += "</tr>";
        calendar += "</thead>";
        let count = 0;
        const startDayOfWeek = new Date(year, month, 1).getDay();
        const endDate = new Date(year, month + 1, 0).getDate();
        const lastMonthEndDate = new Date(year, month, 0).getDate();
        const row = 6;
        // 1行ずつ設定
        for (let i = 0; i < row; i++) {
            calendar += '<tr class="week">';
            // 1colum単位で設定
            for (var j = 0; j < this.week.length; j++) {
                if (i == 0 && j < startDayOfWeek) {
                    // 1行目で1日まで先月の日付を設定
                    let dayOfWeek = new Date(year, month - 1, lastMonthEndDate - startDayOfWeek + j + 1).getDay();
                    calendar += '<td class="disabled ' + this.week_en[dayOfWeek] + '">' + '<p class="day">' + (lastMonthEndDate - startDayOfWeek + j + 1) + '</p>' + '</td>';
                } else if (count >= endDate) {
                    // 最終行で最終日以降、翌月の日付を設定
                    count++;
                    let dayOfWeek = new Date(year, month + 1, count - endDate).getDay();
                    calendar += '<td class="disabled ' + this.week_en[dayOfWeek] + '">' + '<p class="day">' + (count - endDate) + '</p>' + '</td>';
                } else {
                    // 当月の日付を曜日に照らし合わせて設定
                    count++;
                    if(year == this.today.getFullYear()
                    && month == (this.today.getMonth())
                    && count == this.today.getDate()){
                        let dayOfWeek = new Date(year, month, count).getDay();
                        calendar += '<td class="' + this.week_en[dayOfWeek] + '">' + '<p class="today day">' + count + '</p>' + '</td>';
                    } else {
                        let dayOfWeek = new Date(year, month, count).getDay();
                        calendar += '<td class="' + this.week_en[dayOfWeek] + '">' + '<p class="day">' + count + '</p>' + '</td>';
                    }
                }
            }
            calendar += "</tr>";
        }
        return calendar;
    }
    //今現在開いているカレンダーの日付を取得
    getViewDate() {
        return this.getDate;
    }
    //現在見ているカレンダーのモードを取得
    getMode() {
        return this.string;
    }
    //null判定
    isset(data) {
        if(data !== null) {
            return false;
        }
        else {
            return true;
        }
    }
}