// // import { NepaliFunctions } from "./nepali-date-functions.js";
// document.addEventListener('DOMContentLoaded', function () {


//     const todaysDate = NepaliFunctions.BS.GetCurrentDate();
//     const daysInMonth = NepaliFunctions.BS.GetDaysInMonth(todaysDate.year, todaysDate.month);
//     console.log(daysInMonth);
//     const bsYear = NepaliFunctions.BS.GetCurrentYear();//for the first day
//     const bsMonth = NepaliFunctions.BS.GetCurrentMonth();//for the first day
//     const firstDay = NepaliFunctions.BS2AD(`${bsYear}-${bsMonth}-1`);
//     const jsDate = new Date(firstDay);
//     const startDay = jsDate.getDay(); // 0=Sunday, 1=Monday, ..., 6=Saturday
//     console.log(startDay);
//     console.log(bsYear);
//     console.log(bsMonth);
//     console.log(firstDay);
//     //tithi ko lagi
//     const tithi = jsDate.getDate(); // Example tithi calculation
//     const month = jsDate.getMonth() + 1; // Example month calculation
//     const year = jsDate.getFullYear();
//     const NoOfDaysInTithiMonth = NepaliFunctions.AD.GetDaysInMonth(year, month);
//     console.log(NoOfDaysInTithiMonth);
//     console.log(`Tithi: ${tithi}, Month: ${month} , Year: ${year}`);
//     // for (let i = 0; i < 42; i++) {
//     //     const cell = document.getElementById(`#${i}`);

//     // }
//     let bsDate = `${tithi}`;
//     const cells = document.querySelectorAll('.calendar-dates li');
//     cells.forEach(cell => cell.innerHTML = ''); // Clear previous content
//     let cellIndex = startDay;
//     for (let day = 1; day <= daysInMonth; day++) {
//         const cell = cells[cellIndex];

//         cell.innerHTML = `
//             <span class="nep">${NepaliFunctions.ConvertToUnicode(day)}</span>
//             <span class="eng">${bsDate}</span>
//         `;
//         cellIndex++;
//         bsDate++;
//         //vako month vanda dher date vayo vani feri 1 bata suru garne
//         if (bsDate > NoOfDaysInTithiMonth) {
//             bsDate = 1;
//         }
//     }

//     const calendar = document.querySelector('.calendar');
//     calendar.style.visibility = 'visible';



// });
//scalable ra reusable banauna ko lagi function
const todayBS = NepaliFunctions.BS.GetCurrentDate();

//calendar render garne function
function renderCalendar(bsYear, bsMonth) {

    // const daysInMonth = NepaliFunctions.BS.GetDaysInMonth(bsYear, bsMonth);

    // //suru ko din ko lagi
    // const firstDay = NepaliFunctions.BS2AD(`${bsYear}-${bsMonth}-1`);
    // const jsDate = new Date(firstDay);
    // const startDay = jsDate.getDay(); // 0=Sunday, 1=Monday, ..., 6=Saturday

    // //english date ko lagi
    // let engDay = jsDate.getDate();
    // const engMonth = jsDate.getMonth() + 1;
    // const engYear = jsDate.getFullYear();
    // const engMonthDays = NepaliFunctions.AD.GetDaysInMonth(engYear, engMonth);

    // //ya bata calander update hunxa

    // const cells = document.querySelectorAll('.calendar-dates li');
    // cells.forEach(cell => cell.innerHTML = '');
    // let index = startDay;
    // for (let day = 1; day <= daysInMonth; day++) {
    //     if (!cells[index]) break;
    //     const isToday =
    //         bsYear === todayBS.year &&
    //         bsMonth === todayBS.month &&
    //         day === todayBS.day;
    //     // if (isToday) {

    //     //     cells[index].style.backgroundColor = '#2e7d32';
    //     // }
    //     cells[index].innerHTML = `

    //         <span class="nep ${isToday ? 'today' : ''}">${NepaliFunctions.ConvertToUnicode(day)}</span>
    //         <span class="eng">${engDay}</span>
    //         `;
    //     engDay++;
    //     if (engDay > engMonthDays) {
    //         engDay = 1;
    //     }
    //     index++;
    // }

    const cells = document.querySelectorAll('.calendar-dates li');
    cells.forEach(cell => {
        cell.className = '';
        cell.innerHTML = '';
    });
    const daysInMonth = NepaliFunctions.BS.GetDaysInMonth(bsYear, bsMonth);
    const firstAdDate = NepaliFunctions.BS2AD(`${bsYear}-${bsMonth}-1`);
    const firstJsDate = new Date(firstAdDate);
    const startDay = firstJsDate.getDay();

    //map garna lai sub gareko 
    const gridStartAdDate = new Date(firstJsDate);
    gridStartAdDate.setDate(firstJsDate.getDate() - startDay);


    const today = NepaliFunctions.BS.GetCurrentDate();

    let engDay = firstJsDate.getDate();
    const engMonth = firstJsDate.getMonth() + 1;
    const engYear = firstJsDate.getFullYear();
    const engMonthDays = NepaliFunctions.AD.GetDaysInMonth(engYear, engMonth);

    //paila ko days haru disabled garne
    let prevYear = bsYear;
    let prevMonth = bsMonth - 1;
    if (prevMonth < 1) {
        prevMonth = 12;
        prevYear--;
    }
    let nextyear = bsYear;
    let nextMonth = bsMonth + 1;
    if (nextMonth > 12) {
        nextMonth = 1;
        nextyear++;
    }
    const prevMonthDays = NepaliFunctions.BS.GetDaysInMonth(prevYear, prevMonth);

    // let prevDay = prevMonthDays - startDay + 1;
    // for (let i = 0; i < startDay; i++) {
    //     const cell = cells[i];
    //     const isSaturday = i % 7 === 6;

    //     cell.classList.add('disabled');
    //     if (isSaturday) {
    //         cell.classList.add('saturday');
    //     }
    //     cell.innerHTML = `
    //     <span class="nep">${NepaliFunctions.ConvertToUnicode(prevDay)}</span>
    //     <span class="eng">${engDay}</span>
    //     `;
    //     engDay++;
    //     prevDay++;
    //     if (engDay > engMonthDays) {
    //         engDay = 1;
    //     }
    // }


    // let index = startDay;
    // for (let day = 1; day <= daysInMonth; day++) {
    //     const cell = cells[index];

    //     const isSaturday = index % 7 === 6;

    //     const isToday =
    //         bsYear === today.year &&
    //         bsMonth === today.month &&
    //         day === today.day;

    //     cell.innerHTML = `
    //     <span class="nep">${NepaliFunctions.ConvertToUnicode(day)}</span>
    //     <span class="eng">${engDay}</span>
    //     `;
    //     if (isSaturday) {
    //         cell.classList.add('saturday');
    //     }
    //     if (isToday) {
    //         cell.classList.add('today');
    //     }

    //     engDay++;
    //     if (engDay > engMonthDays) {
    //         engDay = 1;
    //     }
    //     index++;
    // }
    // let nextDay = 1;
    // for (let i = index; i < 42; i++) {
    //     const cell = cells[i];
    //     const isSaturday = i % 7 === 6;
    //     cells[i].classList.add('disabled');
    //     if (isSaturday) {
    //         cells[i].classList.add('saturday');
    //     }
    //     cell.innerHTML = `
    //     <span class="nep">${NepaliFunctions.ConvertToUnicode(nextDay)}</span>
    //     <span class="eng">${engDay}</span>
    //     `;
    //     engDay++;
    //     nextDay++;

    //     if (engDay > engMonthDays) {
    //         engDay = 1;
    //     }
    // }
    for (let i = 0; i < 42; i++) {
        const cell = cells[i];

        const adDate = new Date(gridStartAdDate);
        adDate.setDate(gridStartAdDate.getDate() + i);
        const adObj = {
            year: adDate.getFullYear(),
            month: adDate.getMonth() + 1,
            day: adDate.getDate()
        }

        const bs = NepaliFunctions.AD2BS(adObj);
        if (!bs) {
            cell.className = 'disabled';
            cell.innerHTML = '';
            continue;
        }

        const isCurrentMonth = bs.year === bsYear && bs.month === bsMonth;
        const isToday =
            bs.year === today.year &&
            bs.month === today.month &&
            bs.day === today.day;
        const isSaturday = i % 7 === 6;
        cell.className = "";
        if (!isCurrentMonth) {
            cell.classList.add('disabled');
        }
        if (isSaturday) {
            cell.classList.add('saturday');
        }
        if (isToday) {
            cell.classList.add('today');
        }
        cell.innerHTML = `<span class="nep">${NepaliFunctions.ConvertToUnicode(bs.day)}</span>
            <span class="eng">${adDate.getDate()}</span>`;
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const today = NepaliFunctions.BS.GetCurrentDate();
    let currentYear = today.year;
    let currentMonth = today.month;
    // dropdownsCalendar(currentYear, currentMonth);
    // renderCalendar(currentYear, currentMonth);
    syncUI();

    document.getElementById('selectYear').addEventListener('change', (e) => {
        currentYear = parseInt(e.target.value, 10);
        syncUI();
    });
    document.getElementById('selectMonth').addEventListener('change', (e) => {
        currentMonth = parseInt(e.target.value, 10);
        syncUI();
    });


    const calendar = document.querySelector('.calendar');



    calendar.style.visibility = 'visible';
    document.getElementById('prevMonth').addEventListener('click', () => {
        currentMonth--;
        if (currentMonth < 1) {
            currentMonth = 12;
            currentYear--;
        }
        syncUI();

    });

    document.getElementById('nextMonth').addEventListener('click', () => {
        currentMonth++;
        if (currentMonth > 12) {
            currentMonth = 1;
            currentYear++;
        }
        syncUI();
    });
    function syncUI() {
        renderCalendar(currentYear, currentMonth);
        dropdownsCalendar(currentYear, currentMonth);
        updateCalendarHeader(currentYear, currentMonth);
    }

});
const nepaliMonthNames = NepaliFunctions.BS.GetMonthsInUnicode();
//dropdowns ko lagi
function dropdownsCalendar(currentYear, currentMonth) {
    const yearSelect = document.getElementById('selectYear');
    const monthSelect = document.getElementById('selectMonth');
    yearSelect.innerHTML = '';
    monthSelect.innerHTML = '';

    nepaliMonthNames.forEach((month, index) => {
        const option = document.createElement('option');
        option.value = index + 1;
        option.textContent = month;
        if (currentMonth === index + 1) {
            option.selected = true;
        }
        monthSelect.appendChild(option);
    });
    for (let year = 2000; year <= 2090; year++) {
        const option = document.createElement('option');
        option.value = year;
        option.textContent = NepaliFunctions.ConvertToUnicode(year);
        if (currentYear === year) {
            option.selected = true;
        }
        yearSelect.appendChild(option);
    }


}
// const engMonths = [
//     'Baisakh', 'Jestha', 'Ashadh', 'Shrawan', 'Bhadra', 'Ashwin',
//     'Kartik', 'Mangsir', 'Poush', 'Magh', 'Falgun', 'Chaitra'
// ];

function updateCalendarHeader(bsYear, bsMonth) {

    const daysInMonth = NepaliFunctions.BS.GetDaysInMonth(bsYear, bsMonth);

    const adStart = bsToAdDate(bsYear, bsMonth, 1);
    const adEnd = bsToAdDate(bsYear, bsMonth, daysInMonth);

    if (!adStart || !adEnd) {
        console.warn('Header AD conversion failed');
        return;
    }

    // BS header
    const nepMonth = NepaliFunctions.BS.GetMonthInUnicode(bsMonth - 1);
    const nepYear = NepaliFunctions.ConvertToUnicode(bsYear);

    // AD header
    const startMonth = adStart.toLocaleString('en-US', { month: 'short' });
    const endMonth = adEnd.toLocaleString('en-US', { month: 'short' });

    const startYear = adStart.getFullYear();
    const endYear = adEnd.getFullYear();

    const adText = startYear === endYear
        ? `${startMonth}/${endMonth} ${startYear}`
        : `${startMonth}/${endMonth} ${startYear}–${endYear}`;

    document.querySelector('.calendar-right .eng-date').textContent =
        `${nepYear} ${nepMonth} | ${adText}`;
}

function bsToAdDate(bsYear, bsMonth, bsDay) {
    const adDateStr = NepaliFunctions.BS2AD(`${bsYear}-${bsMonth}-${bsDay}`);
    return adDateStr ? new Date(adDateStr) : null;
}

function todayCard() {
    const today = NepaliFunctions.BS.GetCurrentDate();
    let currentYear = today.year;
    let currentMonth = today.month;

    const html = `<div class="today-card">
   <h3>आजको मिति</h3>
   <p class="nepali-date">नेपाली: ${NepaliFunctions.ConvertToUnicode(today.year)}-${NepaliFunctions.ConvertToUnicode(today.month)}-${NepaliFunctions.ConvertToUnicode(today.day)}</p>
   <p class="english-date">अंग्रेजी: ${new Date(NepaliFunctions.BS2AD(`${today.year}-${today.month}-${today.day}`)).toLocaleDateString('en-US')}</p>
</div>`;
    const todayBtn = document.getElementById('calendar').innerHTML = html;

}
$(document).ready(function () {
    $('#todayBtn').on('click', function () {

        goToToday();
    });
    $('#menuView').on('click', function () {
        todayCard();
    })

    $('#calendarView').on('click', function () {
        const today = NepaliFunctions.BS.GetCurrentDate();
        let currentYear = today.year;
        let currentMonth = today.month;
        renderCalendar(currentYear, currentMonth);
    });
});
function goToToday() {
    const today = NepaliFunctions.BS.GetCurrentDate();
    let currentYear = today.year;
    let currentMonth = today.month;
    renderCalendar(currentYear, currentMonth);
}
let conversionType = 'nepaliToEnglish';
document.querySelectorAll('input[name="conversionType"]').forEach((elem) => {
    elem.addEventListener('change', function () {
        conversionType = this.value;
        if (conversionType === 'nepaliToEnglish') {
            document.getElementById('nepali-date-conversion').style.display = 'block';
            document.getElementById('english-date-conversion').style.display = 'none';
        } else if (conversionType === 'englishToNepali') {
            document.getElementById('english-date-conversion').style.display = 'block';
            document.getElementById('nepali-date-conversion').style.display = 'none';
        }
        document.getElementById('dateConversionResult').textContent = '';
    });
});

document.getElementById('convertBtn').addEventListener('click', function () {
    let result = '';
    if (conversionType === 'nepaliToEnglish') {
        const nepDateInput = document.getElementById('nepali-datepicker').value;
        const adDate = NepaliFunctions.BS2AD(nepDateInput);
        console.log(adDate);
        console.log(nepDateInput);
        result = adDate ? adDate : 'Invalid Nepali date format';
    } else if (conversionType === 'englishToNepali') {
        const engDateInput = document.getElementById('english-datepicker').value;
        const adDateObj = new Date(engDateInput);
        if (isNaN(adDateObj.getTime())) {
            result = 'Invalid English date format';
        } else {
            const bsDate = NepaliFunctions.AD2BS(adDateObj);
            // result = bsDate ? `${NepaliFunctions.ConvertToUnicode(bsDate.year)}-${NepaliFunctions.ConvertToUnicode(bsDate.month)}-${NepaliFunctions.ConvertToUnicode(bsDate.day)}` : 'Invalid English date format';
            console.log(engDateInput);
            console.log(bsDate);
            console.log(result);
            const [ConYear, ConMonth, ConDay] = bsDate.split('-');
            console.log(ConDay);
            console.log(ConMonth);
            console.log(ConYear);
            result = bsDate ? `${NepaliFunctions.ConvertToUnicode(ConYear)}-${NepaliFunctions.ConvertToUnicode(ConMonth)}-${NepaliFunctions.ConvertToUnicode(ConDay)}` : 'Invalid English date format';
        }
    }
    document.getElementById('dateConversionResult').textContent = result;
});
