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
        cell.classList.remove('disabled', 'today', 'saturday', 'holiday');
        cell.classList.add('calendar-cell');
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
        // cell.className = "";

        if (!isCurrentMonth) {
            cell.classList.add('disabled');
        }
        if (isSaturday) {
            cell.classList.add('saturday');
        }
        if (isToday) {
            cell.classList.add('today');
        }
        cell.dataset.bsDate = `${bs.year}-${String(bs.month).padStart(2, '0')}-${String(bs.day).padStart(2, '0')}`;
        cell.innerHTML = ` <span class = "event"></span>
        <span class="nep">${NepaliFunctions.ConvertToUnicode(bs.day)}</span>
            <span class="eng">${adDate.getDate()}</span>
            <span class='tithi'></span>
           
            `;
    }
}
function renderCalendarEvents(events) {
    const todayBs = NepaliFunctions.BS.GetCurrentDate();
    document.querySelectorAll('.calendar-dates li').forEach(cell => {
        const bsDate = cell.dataset.bsDate;
        if (!bsDate || !events[bsDate]) return;
        const eventData = events[bsDate];
        const adObj = NepaliFunctions.BS2AD(bsDate);
        if (eventData?.tithi) {
            let tithiSpan = cell.querySelector('.tithi');
            tithiSpan.innerText = eventData.tithi;
        }
        const eventSpan = cell.querySelector('.event');
        if (eventData?.title) {
            eventSpan.innerText = eventData.title;
        }

        if (eventData?.is_holiday) {
            cell.classList.add('saturday');
        }

    });
}

let _upcomingEventsCache = {
    bsYear: null,
    fromMonth: null,
    events: null,
};

function getTodayBsString() {
    const today = NepaliFunctions.BS.GetCurrentDate();
    return `${today.year}-${String(today.month).padStart(2, '0')}-${String(today.day).padStart(2, '0')}`;
}

async function fetchEventsFromTodayToYearEnd() {
    const today = NepaliFunctions.BS.GetCurrentDate();
    const bsYear = today.year;
    const startMonth = today.month;

    if (
        _upcomingEventsCache.events &&
        _upcomingEventsCache.bsYear === bsYear &&
        _upcomingEventsCache.fromMonth === startMonth
    ) {
        return _upcomingEventsCache.events;
    }

    const monthPromises = [];
    for (let month = startMonth; month <= 12; month++) {
        monthPromises.push(fetchCalendarData(bsYear, month));
    }

    const results = await Promise.all(monthPromises);
    const merged = {};
    results.forEach(monthEvents => {
        Object.assign(merged, monthEvents || {});
    });

    _upcomingEventsCache = {
        bsYear,
        fromMonth: startMonth,
        events: merged,
    };

    return merged;
}

function renderUpcomingDays(events) {
    const upcomingList = document.querySelector('.upcomming-days');
    if (!upcomingList) return;

    upcomingList.innerHTML = '';

    const todayBsStr = getTodayBsString();
    const items = Object.keys(events || {})
        .filter((bsDate) => bsDate >= todayBsStr)
        .map((bsDate) => ({ bsDate, event: events[bsDate] }))
        .filter(({ event }) => typeof event?.title === 'string' && event.title.trim().length > 0)
        .sort((a, b) => a.bsDate.localeCompare(b.bsDate));

    items.forEach(({ bsDate, event }) => {
        const [year, month, day] = bsDate.split('-').map(Number);
        const li = document.createElement('li');
        li.className = 'clearfix';
        li.innerHTML = `
            <div class="date">
                <span>${NepaliFunctions.ConvertToUnicode(day)}</span>
                ${NepaliFunctions.BS.GetMonthInUnicode(month - 1)}
            </div>
            <div class="info">
                <span>
                    <a href="#date">${event.title}</a>
                </span>
            </div>
        `;
        upcomingList.appendChild(li);
    });

    if (!upcomingList.children.length) {
        upcomingList.innerHTML = '<li class="clearfix"><div class="info"><span>No upcoming events.</span></div></li>';
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
    async function syncUI() {
        renderCalendar(currentYear, currentMonth);
        dropdownsCalendar(currentYear, currentMonth);
        updateCalendarHeader(currentYear, currentMonth);

        // Bind holidays dropdown immediately (before async fetch completes)
        renderHolidaysCard({});
        const events = await fetchCalendarData(currentYear, currentMonth);
        renderCalendarEvents(events);
        renderHolidaysCard(events);

        // Upcoming Days: today -> end of current BS year
        const upcomingEvents = await fetchEventsFromTodayToYearEnd();
        renderUpcomingDays(upcomingEvents);
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
async function fetchCalendarData(bsYear, bsMonth) {
    try {
        const response = await fetch(`/calendar/data/${bsYear}/${bsMonth}`);
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error fetching calendar data:', error);
        return {};
    }
}

document.querySelector('.calendar-dates').addEventListener('click', e => {
    const cell = e.target.closest('.calendar-cell');
    if (!cell || !cell.dataset.bsDate) return;
    openCalendarPopup(cell);
})

// function openCalendarPopup(cell) {
//     const popup = document.getElementById('calendarPopup');

//     popup.querySelector('#popup-title').innerText = cell.dataset.bsDate;

//     const rect = cell.getBoundingClientRect();

//     popup.style.top = window.scrollY + rect.bottom + 8 + 'px';
//     popup.style.left = window.scrollX + rect.left + 'px';

//     popup.style.display = 'block';
//     // if (isMobileView()) {
//     //     positionPopupMobile();

//     // }
//     alert('Popup opened for ' + cell.dataset.bsDate);

// }
// function positionPopUpDesktop(cell) {
//     const popup = document.getElementById('calendarPopup');

//     const rect = cell.getBoundingClientRect();

//     popup.style.top =
//         rect.top + window.scrollY - popup.offsetHeight - 10 + 'px';
//     popup.style.left =
//         rect.left + window.scrollX + rect.width / 2 - popup.offsetWidth / 2 + 'px';
// }
// function isMobileView() {
//     return window.innerWidth <= 768;
// }
// function positionPopupMobile() {
//     const popup = document.getElementById('calendarPopup');

//     popup.classList.add('mobile');
//     popup.style.position = 'fixed';
//     popup.style.left = '0';
//     popup.style.bottom = '0';
//     popup.style.width = '100%';
//     popup.style.display = 'block';
// }

//language ko lagi
// window.i18n = {
//     holidays: @json(__('site.holidays')),
//     holidaysIn: @json(__('site.holidays_in')),
//     noUpcommingHolidays: @json(__('site.no_upcoming_holidays')),
// }

//end


function openCalendarPopup(cell) {
    const popup = document.getElementById('calendarPopup');
    popup.querySelector('#popup-title').innerText = cell.dataset.bsDate;

    // get cell position relative to viewport
    const rect = cell.getBoundingClientRect();

    // Ensure popup is measurable (offsetWidth/offsetHeight are 0 when display:none)
    const previousVisibility = popup.style.visibility;
    popup.style.display = 'block';
    popup.style.visibility = 'hidden';
    popup.style.top = '0px';
    popup.style.left = '0px';

    const popupWidth = popup.offsetWidth;
    const popupHeight = popup.offsetHeight;

    const margin = 8;
    const viewportWidth = document.documentElement.clientWidth || window.innerWidth;

    // Position relative to the viewport for consistent behavior regardless of offsetParent
    popup.style.position = 'fixed';

    // Desired position in *viewport* coordinates
    const desiredViewportTopAbove = rect.top - popupHeight - margin;
    const desiredViewportTopBelow = rect.bottom + margin;
    const hasRoomAbove = desiredViewportTopAbove >= margin;
    const viewportTop = hasRoomAbove ? desiredViewportTopAbove : desiredViewportTopBelow;

    const desiredViewportLeftCentered = rect.left + rect.width / 2 - popupWidth / 2;
    const minViewportLeft = margin;
    const maxViewportLeft = viewportWidth - popupWidth - margin;
    const viewportLeft = Math.max(minViewportLeft, Math.min(desiredViewportLeftCentered, maxViewportLeft));

    popup.style.top = `${viewportTop}px`;
    popup.style.left = `${viewportLeft}px`;
    popup.style.visibility = previousVisibility || '';
    popup.style.display = 'block';

    // Simple click-outside-to-close (managed from within this function only)
    if (popup._outsideClickHandler) {
        document.removeEventListener('click', popup._outsideClickHandler, true);
    }
    popup._outsideClickHandler = function (e) {
        const clickedInsidePopup = popup.contains(e.target);
        const clickedOnCell = cell.contains(e.target);
        if (!clickedInsidePopup && !clickedOnCell) {
            popup.style.display = 'none';
            document.removeEventListener('click', popup._outsideClickHandler, true);
            popup._outsideClickHandler = null;
        }
    };
    // Defer binding to avoid immediately closing on the opening click event
    setTimeout(() => {
        document.addEventListener('click', popup._outsideClickHandler, true);
    }, 0);
}
function renderHolidaysCard(events) {
    const holidaysBtn = document.getElementById('holidays');
    const holidaysCard = document.querySelector('.holidayscard');

    if (!holidaysBtn || !holidaysCard) return;

    // Always keep the latest payload available for the click handler
    holidaysBtn._holidayEvents = events || {};

    const holidaysList = document.getElementById('holidaysList');
    const holidaysTitle = document.getElementById('holidaysTitle');
    if (!holidaysList) return;

    // Bind only once; syncUI calls this function repeatedly.
    if (holidaysBtn._holidaysBound) return;
    holidaysBtn._holidaysBound = true;

    function closeHolidaysCard() {
        holidaysCard.style.display = 'none';
        if (holidaysBtn._holidaysOutsideHandler) {
            document.removeEventListener('click', holidaysBtn._holidaysOutsideHandler, true);
            holidaysBtn._holidaysOutsideHandler = null;
        }
    }

    function bindOutsideToClose() {
        if (holidaysBtn._holidaysOutsideHandler) return;
        holidaysBtn._holidaysOutsideHandler = function (ev) {
            const clickedOnBtn = holidaysBtn.contains(ev.target);
            const clickedInCard = holidaysCard.contains(ev.target);
            if (!clickedOnBtn && !clickedInCard) {
                closeHolidaysCard();
            }
        };
        // Defer binding so the opening click doesn't immediately close it
        setTimeout(() => {
            document.addEventListener('click', holidaysBtn._holidaysOutsideHandler, true);
        }, 0);
    }

    // Start hidden
    closeHolidaysCard();

    holidaysBtn.addEventListener('click', function (e) {
        e.preventDefault();

        const isVisible = window.getComputedStyle(holidaysCard).display !== 'none';
        if (isVisible) {
            closeHolidaysCard();
            return;
        }

        holidaysCard.style.display = 'block';
        bindOutsideToClose();

        holidaysList.innerHTML = '';

        const todayBs = NepaliFunctions.BS.GetCurrentDate();
        const currentEvents = holidaysBtn._holidayEvents || {};

        const holidayItems = Object.keys(currentEvents)
            .map((bsDate) => ({ bsDate, event: currentEvents[bsDate] }))
            .filter(({ event }) => {
                const isHoliday = event && (event.is_holiday === true || event.is_holiday === 1 || event.is_holiday === '1');
                return isHoliday;
            })
            .filter(({ bsDate }) => {
                const [year, month, day] = bsDate.split('-').map(Number);
                const isPast = year < todayBs.year ||
                    (year === todayBs.year && month < todayBs.month) ||
                    (year === todayBs.year && month === todayBs.month && day < todayBs.day);
                return !isPast;
            })
            .sort((a, b) => a.bsDate.localeCompare(b.bsDate));

        if (holidayItems.length) {
            const [y, m] = holidayItems[0].bsDate.split('-').map(Number);
            if (holidaysTitle) {
                holidaysTitle.textContent = `Holidays in ${NepaliFunctions.BS.GetMonthInUnicode(m - 1)} ${NepaliFunctions.ConvertToUnicode(y)}`;
            }
        } else if (holidaysTitle) {
            holidaysTitle.textContent = 'Holidays';
        }

        holidayItems.forEach(({ bsDate, event }) => {
            const [year, month, day] = bsDate.split('-').map(Number);

            // Prefer DB ad_date if present; else convert from BS
            const adDateRaw = event && event.ad_date ? event.ad_date : NepaliFunctions.BS2AD(bsDate);
            const adDate = adDateRaw ? new Date(adDateRaw) : null;
            const adText = adDate && !isNaN(adDate.getTime())
                ? adDate.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })
                : '';

            // Title fallback order: title, holiday_title, name
            const titleText = (event && (event.title || event.holiday_title || event.name)) || '';

            const li = document.createElement('li');
            const dateSpan = document.createElement('span');
            dateSpan.className = 'date';
            dateSpan.textContent = `${NepaliFunctions.ConvertToUnicode(day)} ${NepaliFunctions.BS.GetMonthInUnicode(month - 1)} ${NepaliFunctions.ConvertToUnicode(year)}${adText ? ' | ' + adText : ''}`;

            const nameSpan = document.createElement('span');
            nameSpan.className = 'holiday-name';
            nameSpan.textContent = titleText;

            li.appendChild(dateSpan);
            li.appendChild(nameSpan);
            holidaysList.appendChild(li);
        });

        if (!holidaysList.children.length) {
            holidaysList.innerHTML = '<li><span class="date">No upcoming holidays.</span></li>';
        }
    });
}