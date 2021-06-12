window.addEventListener('DOMContentLoaded', function(){

    const calendarBtnList = document.querySelectorAll(".btn-wrapper>button");

    const prev = document.querySelector('.prev-btn');
    const next = document.querySelector('.next-btn');
    const today = document.querySelector('.today-btn');
    let getDate = null;
    let calendar = new Calendar('year');

    if(getDate === null) {
        calendar.showProcess();
    };

    calendarBtnList.forEach(el => {
        el.addEventListener('click', function() {
            const val = el.value;
            history.pushState('','', val);
            console.log(getDate);
            calendar = new Calendar(val, getDate);
            calendar.showProcess();
            getDate = calendar.getShowDate();
        })
    });

    prev.addEventListener('click', () => {
        calendar.prev();
        getDate = calendar.getShowDate();
    });

    next.addEventListener('click', () => {
        calendar.next();
        getDate = calendar.getShowDate();
    });

    today.addEventListener('click', () => {
        calendar.todayBtn();   
        getDate = calendar.getShowDate();
    })
});