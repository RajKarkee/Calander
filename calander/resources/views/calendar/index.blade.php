{{-- <div class="calendar-section"> --}}

<div class="grid-container">

    <div class='items'>
        <div class="module">
            <h2><span><a href="#upcomingDays" class="headderNew">{{ __('site.Upcoming Days') }}</a></span></h2>
            <ul class="upcomming-days scroll" tableindex="0" style="outline: none;">
                <li class ="clearfix">
                    <div class="date">
                        <span>५</span>
                        पुष
                    </div>
                    <div class="info">
                        <span>
                            <a href="#date">तोल ल्होसार</a>
                        </span>
                        आज
                    </div>
                </li>
                <li class ="clearfix">
                    <div class="date">
                        <span>५</span>
                        पुष
                    </div>
                    <div class="info">
                        <span>
                            <a href="#date">तोल ल्होसार</a>
                        </span>
                        आज
                    </div>
                </li>
                <li class ="clearfix">
                    <div class="date">
                        <span>५</span>
                        "पुष"
                    </div>
                    <div class="info">
                        <span>
                            <a href="#date">तोल ल्होसार</a>
                        </span>
                        "आज "
                    </div>
                </li>
                <li class ="clearfix">
                    <div class="date">
                        <span>५</span>
                        "पुष"
                    </div>
                    <div class="info">
                        <span>
                            <a href="#date">तोल ल्होसार</a>
                        </span>
                        "आज "
                    </div>
                </li>
                <li class ="clearfix">
                    <div class="date">
                        <span>५</span>
                        "पुष"
                    </div>
                    <div class="info">
                        <span>
                            <a href="#date">तोल ल्होसार</a>
                        </span>
                        आज
                    </div>
                </li>
                <li class ="clearfix">
                    <div class="date">
                        <span>५</span>
                        पुष
                    </div>
                    <div class="info">
                        <span>
                            <a href="#date">तोल ल्होसार</a>
                        </span>
                        "आज "
                    </div>
                </li>
                <li class ="clearfix">
                    <div class="date">
                        <span>५</span>
                        "पुष"
                    </div>
                    <div class="info">
                        <span>
                            <a href="#date">तोल ल्होसार</a>
                        </span>
                        "आज "
                    </div>
                </li>
                <li class ="clearfix">
                    <div class="date">
                        <span>५</span>
                        "पुष"
                    </div>
                    <div class="info">
                        <span>
                            <a href="#date">तोल ल्होसार</a>
                        </span>
                        "आज "
                    </div>
                </li>
                <li class ="clearfix">
                    <div class="date">
                        <span>५</span>
                        "पुष"
                    </div>
                    <div class="info">
                        <span>
                            <a href="#date">तोल ल्होसार</a>
                        </span>
                        "आज "
                    </div>
                </li>
                <li class ="clearfix">
                    <div class="date">
                        <span>५</span>
                        "पुष"
                    </div>
                    <div class="info">
                        <span>
                            <a href="#date">तोल ल्होसार</a>
                        </span>
                        "आज "
                    </div>
                </li>
            </ul>
        </div>
        <div class="dateConverter">
            <h3>{{ __('site.Date') }} {{ __('site.Converter') }}</h3>
            <input type="radio" id="nepaliToEnglish" name="conversionType" value="nepaliToEnglish" checked>
            <label for="nepaliToEnglish">{{ __('site.Nepali to English') }} </label>
            <br>
            <input type="radio" id="englishToNepali" name="conversionType" value="englishToNepali">
            <label for="englishToNepali">{{ __('site.English to Nepali') }}</label>
            <br>

            <div class="converter-inputs">
                <div id="nepali-date-conversion" class="input-group nepali-date">
                    <label for="nepaliDateInput">नेपाली मिति</label>
                    <input type="text" id="nepali-datepicker" placeholder="Select Nepali Date"
                        style="padding:10px;font-size:16px;">
                </div>
                <div id="english-date-conversion" class="input-group english-date" style="display:none;">
                    <label for="englishDateInput">अङ्ग्रेजी मिति</label>
                    {{-- <input type="date" id="englishDateInput" placeholder="YYYY-MM-DD"> --}}
                    <input type="date" id="english-datepicker" placeholder="Select English Date"
                        style="padding:10px;font-size:16px;">
                </div>
                <button id="convertBtn">Convert</button>
                <div class="result" id='dateConversionResult'></div>
            </div>
        </div>
    </div>
    <div class='items'>
        <div class="calendar-header">
            <!-- Left controls -->
            <div class="calendar-left">
                <button class="btn today-btn" id="todayBtn">आज</button>

                <button id="calendarView" class="icon-btn">☷</button>
                <button id="menuView" class="icon-btn">≡</button>
            </div>

            <!-- Center controls -->
            <div class="calendar-center">
                <button id="prevMonth" class="nav-btn">‹‹</button>

                <select id="selectYear">

                </select>

                <select id="selectMonth">

                </select>

                <button id="nextMonth" class="nav-btn">››</button>
            </div>

            <!-- Right info -->
            <div class="calendar-right">
                <span class="eng-date">२०८२ पुष | Dec/Jan 2025–2026</span>
            </div>
        </div>

        <div class="calendar" id="calendar" style="visibility:hidden;">
            <ul class="calendar-days">
                <li><span class="np">आइतवार</span><span class="en">Sunday</span></li>
                <li><span class="np">सोमवार</span><span class="en">Monday</span></li>
                <li><span class="np">मंगलवार</span><span class="en">Tuesday</span></li>
                <li><span class="np">बुधवार</span><span class="en">Wednesday</span></li>
                <li><span class="np">बिहिवार</span><span class="en">Thursday</span></li>
                <li><span class="np">शुक्रवार</span><span class="en">Friday</span></li>
                <li><span class="np">शनिबार</span><span class="en">Saturday</span></li>
            </ul>
            <ul class="responsive calendar-days">
                <li><span class="np">आइत</span><span class="en">Sun</span></li>
                <li><span class="np">सोम</span><span class="en">Mon</span></li>
                <li><span class="np">मंगल</span><span class="en">Tue</span></li>
                <li><span class="np">बुध</span><span class="en">Wed</span></li>
                <li><span class="np">बिहि</span><span class="en">Thu</span></li>
                <li><span class="np">शुक्र</span><span class="en">Fri</span></li>
                <li><span class="np">शनि</span><span class="en">Sat</span></li>
            </ul>
            <ul class="calendar-dates">
                @for ($i = 0; $i < 42; $i++)
                    <li class="calendar-cell">
                        {{-- <li onclick="openCalendarPopup(this )" class="calendar-cell"> {{-- <span style=display:none;></span> --}}
                        <span class="event">---</span>
                        <span class="nep">१</span>
                        <span class="tithi"></span>
                        <span class="tithi"></span>

                        <span class="eng">16</span>
                        {{-- <span class="eng">
                       
                    </span> --}}
                        {{-- <div class="popup-box daydetailsPopOverWrapper" id="daypop"
                            style="opacity:1;overflow:hidden;display:hidden;">
                            <span class="arrow"></span>
                            <span class="popup-close closeButon">
                                <img src="{{ asset('partials/objects/close.png') }}">
                            </span>
                            <div class="daydetailsPopOver">
                                <div class="dayDetails">
                                    <div class="col1">
                                        <span style="font-weight:900"> --date-- </span>

                                    </div>
                                                    <h3 id="holidaysTitle">Holidays</h3>
                                                    <ul id="holidaysList"></ul>
                                        <h3 class="viewDetails"><a href="/details" style="color:049ffc;"
                                                href="/date/2082-09-02" onclick="viewevents('2082-09-02');">View
                                                Details</a></h3>
                                        <br>
                                    </div>
                                </div>
                                <div class="notes" style="background: #fff2df" id="2025-12-18-calenderNotesWrapper">
                                    <h3
                                        style="text-align: left;padding-left:10px;font-sizr:14px;font-weight:900;padding-top:10px">
                                        मेरो नोट </h3>
                                    <span id="2025-12-17-nepDay"></span>
                                    <div style="font-size:15px; text-align:left;padding-left:10px"
                                        id="2025-12-17-icon">
                                        You dont have notes on this day. You can take notes on birthdays, meetings,
                                        things
                                        to remember, bills to pay, and more. You must be logged in to add a note on
                                        this
                                        day.
                                    </div>
                                    <textarea style="display:none;" id="2025-12-17-noteTextArea"></textarea>
                                    <h5 class="viewNotes" id="edit">
                                        <a onclick="editNotes('2025-12-17','2082-09-02')" id="2025-12-17-editpopOver"
                                            style="cursor:pointer;color:#049ffc">
                                            Add / Edit Note</a>
                                    </h5>
                                </div>
                            </div>
                        </div> --}}
                    </li>
                @endfor







            </ul>
            <div class="popup-box" id="calendarPopup">
                <div class="popup-header">
                    <span id="popup-title"></span>
                    <button class="popup-close">&times;</button>
                </div>

                <div class="popup-body">
                    <div class="panchangaWrapper"></div>

                    <div class="eventPopupWrapper"></div>

                    <div class="notes">
                        <h4>मेरो नोट</h4>
                        <div class="notes-content"></div>
                        <a class="edit-note">Add / Edit Note</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class='items'>
        <div class="cta-button">
            <a href="#/" target="_self" class="holidays" id="holidays">{{ __('site.holidays') }}</a>

            <div class="holidayscard">
                <h3 id="holidaysTitle">{{ __('site.holidays') }}</h3>
                <ul id="holidaysList"></ul>
            </div>
        </div>


    </div>
</div>
<style>
    button {
        border: none;
    }



    .calendar-dates li.disabled {
        opacity: 0.4;
        pointer-events: none;
    }

    .calendar-dates li.today {
        background: #b71c1c;
        color: #fff;
    }

    .calendar-dates li.saturday {
        background: #dc3545;
        color: #fff;
    }

    .calendar-dates li.saturday span {
        color: #dc3545 !important;
    }

    .calendar-dates li.today.saturday {
        background: #8e0000;
        color: #fff;
    }

    .calendar-dates li.saturday:hover span {
        color: #fff !important;


    }

    .calendar-dates li.holiday {
        background: #fce4e4;
    }

    .calendar-dates li.today.holiday {

        background: #8e0000;
        color: #fff;
    }

    .daydetailsPopOverWrapper {
        position: absolute;
        top: 110%;
        left: 50%;
        transform: translateX(-50%);
        width: 320px;
        background: #fff;
        border: 1px solid #ddd;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        z-index: 99;
        display: none;
    }

    .cta-button a {
        padding: 8px 10px;
        font-family: GilroyBold, sans-serif;
        font-size: 12px;
        outline: none;
        border: none;
        cursor: pointer;
        border-radius: 6px;
        justify-content: space-between;
        display: flex;
        align-items: center;
        text-transform: uppercase;

    }

    .cta-button {
        position: relative;
        width: 100%;
    }

    .holidays {
        background: #fce4ec;
        color: #b71d1d !important;
    }

    /* .calendar-dates li:hover .daydetailsPopOverWrapper {
        display: block;
  

        .daydetailsPopOverWrapper .arrow {
            position: absolute;
            top: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-bottom: 8px solid #fff;
        }

        @media (max-width: 768px) {
            .calendar ul.calendar-dates {
                grid-template-columns: repeat(7, minmax(44px, 1fr));
            }

            .calendar-dates .nep {
                font-size: 22px;
            }

            .calendar ul.calendar-dates li {
                height: 80px;
            }
        }

        */
    /* popup styles */

    .popup-box {
        position: absolute;
        display: none;
        width: 300px;
        background: #fff;
        border-radius: 6px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
        z-index: 1000;
    }

    .popup-header {
        display: flex;
        justify-content: space-between;
        padding: 10px 12px;
        border-bottom: 1px solid #eee;
    }

    .popup-body {
        padding: 12px;
    }

    /* holidays card */
    .holidayscard {
        margin-top: 10px;
        padding: 14px;
        background: #ffffff;
        border: 1px solid #f0e6e8;
        border-radius: 10px;
        box-shadow: 0 12px 30px rgba(183, 29, 29, 0.08);
        max-width: 380px;
        min-width: 260px;
        display: none;
        position: absolute;
        top: calc(100% + 8px);
        right: 0;
        z-index: 2000;
        overflow: hidden;
        overflow-y: auto;
        max-height: 360px;
    }

    .holidayscard h3 {
        margin: 0 0 12px;
        font-size: 15px;
        font-weight: 800;
        color: #b71d1d;
        padding: 6px 8px;
        background: #fff1f3;
        border-radius: 6px;
    }

    .holidayscard ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .holidayscard li {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 6px;
        padding: 10px 8px;
        border-top: 1px solid #f4e9ea;
        white-space: normal;
        line-height: 1.3;
        word-break: break-word;
    }

    .holidayscard li:first-child {
        border-top: none;
        padding-top: 0;
    }

    .holidayscard li:last-child {
        padding-bottom: 0;
    }

    .holidayscard .date {
        font-size: 13px;
        color: #4a4a48;
        line-height: 1.25;
        width: 100%;
        display: block;
        margin-bottom: 4px;
    }

    .holidayscard .holiday-name {
        font-size: 14px;
        font-weight: 800;
        color: #b71d1d;
        width: 100%;
        display: block;
        margin-top: 2px;
    }

    /* small screens: make the card full width under the button */
    @media (max-width: 720px) {
        .cta-button a {
            padding: 6px 8px;
            font-size: 11px;
        }

        .holidayscard {
            left: 8px;
            right: 8px;
            width: auto;
            max-width: calc(100vw - 32px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
            position: fixed;
            top: auto;
            bottom: 12px;
            transform: none;
            padding: 10px;
            max-height: 55vh;
        }

        .holidayscard h3 {
            font-size: 13px;
            margin-bottom: 10px;
        }

        .holidayscard li {
            flex-direction: column;
            gap: 6px;
            padding: 8px 6px;
        }

        .holidayscard .date {
            flex: none;
            font-size: 12px;
        }

        .holidayscard .holiday-name {
            text-align: left;
            font-size: 13px;
        }
    }

    .holidayscard .empty {
        text-align: center;
        color: #777;
        padding: 12px 0;
    }

    /* .popup-box.mobile {
        height: 70vh;
        border-radius: 16px 16px 0 0;
    } */
</style>
