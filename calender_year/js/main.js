window.addEventListener('DOMContentLoaded', function(){
    //カレンダーの変更ボタン
    const monthBtn = document.querySelector("#month_btn");
    const yearBtn = document.querySelector("#year_btn");

    //インスタンス生成
    let calendarMonth = new Calendar(monthBtn.value);
    let calendarYear = new Calendar(yearBtn.value);

    //初期ページ
    calendarMonth.showProcess();
    const mode = calendarYear.getMode();

    //ページネーションのボタン
    const prevBtn = document.querySelector(".prev-btn");
    const nextBtn = document.querySelector(".next-btn");
    const todayBtn = document.querySelector(".today-btn");
    

    yearBtn.addEventListener('click', function() {
        calendarYear.showProcess();
        const mode = calendarYear.getMode();
        prevBtn.addEventListener('click', function(){
            calendarYear.prev();
        });
        nextBtn.addEventListener('click', function(){
            calendarYear.next();
        });
        todayBtn.addEventListener('click', function(){
            calendarYear.todayBtn();
        });
    });

    prevBtn.addEventListener('click', function(){
        calendarMonth.prev();
        const getDate = calendarMonth.getViewDate();
        console.log(getDate);
    });
    nextBtn.addEventListener('click', function(){
        calendarMonth.next();
        const getDate = calendarMonth.getViewDate();
        console.log(getDate);
    });
    todayBtn.addEventListener('click', function(){
        calendarMonth.todayBtn();
        const getDate = calendarMonth.getViewDate();
        console.log(getDate);
    });
});








// const week = ["日", "月", "火", "水", "木", "金", "土"];
// const week_en = ["sun", "mon", "tue", "wed", "thu", "fri", "sat"];
// const today = new Date();
// const newDay = new Date(today.getFullYear(), today.getMonth(), today.getDate());
// console.log(today);
// console.log(newDay);
// const month = document.querySelector("#month_btn");
// const year = document.querySelector("#year_btn");

// // 月末だとずれる可能性があるため、1日固定で取得
// var showDate = new Date(today.getFullYear(), today.getMonth());
// console.log(showDate);
// // 初期表示
// window.onload = function () {
//     showProcess(today, "year");
// };

// // 前の月表示
// function todayBtn(){
//     showDate = new Date();
//     showProcess(today, "month");
// }

// // 前の月表示
// function prev(){
//     showDate.setMonth(showDate.getMonth() - 1);
//     showProcess(showDate, "month");
// }

// // 次の月表示
// function next(){
//     showDate.setMonth(showDate.getMonth() + 1);
//     showProcess(showDate, "month");
// }

// // カレンダー表示
// function showProcess(date, string) {
//     const year = date.getFullYear();
//     let month = date.getMonth();
//     let id = document.querySelector('.calendar-view>div');
//     //id名を変更
//     id.setAttribute('id', string);
//     let h1 = document.querySelector('.calendar-title>h1');
//     const calendarView = document.querySelector('#calendar');
//     if(string === "month") {
//         h1.innerHTML = year + "年" + (month + 1) + "月";
//         const calendar = createProcess(year, month, string);
//         calendarView.innerHTML = calendar;
//     }
//     if(string === "year") {
//         h1.innerHTML = year + "年";
//         let calendar = '<div class="' + string + '-container">';
//         for(let i = 0; i < 12; i++) {
//             month = i;
//             calendar += createProcess(year, month, string);
//         }
//         calendarView.innerHTML = calendar;
//     }
// }

// // カレンダー作成
// function createProcess(year, month, string) {
//     if (string === "month") {
//             // 曜日
//         var calendar = '<div class="' + string + '-container">';
//         calendar += '<table id="' + (month + 1) + '" class="month-table" cellSpacing=0>';
//         calendar += '<thead>';
//         calendar += '<tr class="day-of-the-weeks">';
//     for (var i = 0; i < week.length; i++) {
//         calendar += "<th>" + week[i] + "</th>";
//     }
//         calendar += "</tr>";
//         calendar += "</thead>";
//         var count = 0;
//         var startDayOfWeek = new Date(year, month, 1).getDay();
//         var endDate = new Date(year, month + 1, 0).getDate();
//         var lastMonthEndDate = new Date(year, month, 0).getDate();
//         var row = 6;
//     // 1行ずつ設定
//     for (var i = 0; i < row; i++) {
//         calendar += '<tr class="week">';
//         // 1colum単位で設定
//         for (var j = 0; j < week.length; j++) {
//             if (i == 0 && j < startDayOfWeek) {
//                 // 1行目で1日まで先月の日付を設定
//                 let dayOfWeek = new Date(year, month - 1, lastMonthEndDate - startDayOfWeek + j + 1).getDay();
//                 calendar += '<td class="disabled ' + week_en[dayOfWeek] + '">' + '<p class="day">' + (lastMonthEndDate - startDayOfWeek + j + 1) + '</p>' + '</td>';
//             } else if (count >= endDate) {
//                 // 最終行で最終日以降、翌月の日付を設定
//                 count++;
//                 dayOfWeek = new Date(year, month + 1, count - endDate).getDay();
//                 calendar += '<td class="disabled ' + week_en[dayOfWeek] + '">' + '<p class="day">' + (count - endDate) + '</p>' + '</td>';
//             } else {
//                 // 当月の日付を曜日に照らし合わせて設定
//                 count++;
//                 if(year == today.getFullYear()
//                 && month == (today.getMonth())
//                 && count == today.getDate()){
//                     dayOfWeek = new Date(year, month, count).getDay();
//                     calendar += '<td class="' + week_en[dayOfWeek] + '">' + '<p class="today day">' + count + '</p>' + '</td>';
//                 } else {
//                     dayOfWeek = new Date(year, month, count).getDay();
//                     calendar += '<td class="' + week_en[dayOfWeek] + '">' + '<p class="day">' + count + '</p>' + '</td>';
//                 }
//             }
//         }
//         calendar += "</tr>";
//     }
//     return calendar;
//     }
//     if (string === "year") {
//     // 曜日
//         var calendar = `<table id="${month + 1}" class="month-table">`;
//         calendar += '<caption class="month">' + (month + 1) + '月</caption>';
//         calendar += '<thead>';
//         calendar += '<tr class="day-of-the-weeks">';
//         for (var j = 0; j < week.length; j++) {
//             calendar += "<th>" + week[j] + "</th>";
//         }
//             calendar += "</tr>";
//             calendar += "</thead>";
//             var count = 0;
//             var startDayOfWeek = new Date(year, month, 1).getDay();
//             var endDate = new Date(year, month + 1, 0).getDate();
//             var lastMonthEndDate = new Date(year, month, 0).getDate();
//             var row = 6;
//         // 1行ずつ設定
//         for (var j = 0; j < row; j++) {
//             calendar += '<tr class="week">';
//             // 1colum単位で設定
//             for (var k = 0; k < week.length; k++) {
//                 if (j == 0 && k < startDayOfWeek) {
//                     // 1行目で1日まで先月の日付を設定
//                     let dayOfWeek = new Date(year, month - 1, lastMonthEndDate - startDayOfWeek + k + 1).getDay();
//                     calendar += '<td class="disabled ' + week_en[dayOfWeek] + '">' + '<p class="day">' + (lastMonthEndDate - startDayOfWeek + k + 1) + '</p>' + '</td>';
//                 } else if (count >= endDate) {
//                     // 最終行で最終日以降、翌月の日付を設定
//                     count++;
//                     dayOfWeek = new Date(year, month + 1, count - endDate).getDay();
//                     calendar += '<td class="disabled ' + week_en[dayOfWeek] + '">' + '<p class="day">' + (count - endDate) + '</p>' + '</td>';
//                 } else {
//                     // 当月の日付を曜日に照らし合わせて設定
//                     count++;
//                     if(year == today.getFullYear()
//                     && month == (today.getMonth())
//                     && count == today.getDate()){
//                         dayOfWeek = new Date(year, month, count).getDay();
//                         calendar += '<td class="' + week_en[dayOfWeek] + '">' + '<p class="today day">' + count + '</p>' + '</td>';
//                     } else {
//                         dayOfWeek = new Date(year, month, count).getDay();
//                         calendar += '<td class="' + week_en[dayOfWeek] + '">' + '<p class="day">' + count + '</p>' + '</td>';
//                     }
//                 }
//             }
//         calendar += "</tr>";
//     }
//     return calendar;
//     }
// }