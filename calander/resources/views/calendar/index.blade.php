{{-- <div class="calendar-section"> --}}

<div class="grid-container">

    <div class='items'>
        <div class="module">
            <h2><span><a href="#upcomingDays" class="headderNew">Upcoming Days</a></span></h2>
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
            <h3>Date Converter</h3>
            <input type="radio" id="nepaliToEnglish" name="conversionType" value="nepaliToEnglish" checked>
            <label for="nepaliToEnglish">नेपाली मिति देखि अङ्ग्रेजी </label>
            <br>
            <input type="radio" id="englishToNepali" name="conversionType" value="englishToNepali">
            <label for="englishToNepali">अङ्ग्रेजी मिति देखि नेपाली</label>
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
                    <li onclick="openPopUp('0')" class="calendar-cell"">
                        <span style=display:none;></span>
                        <span class="event">---</span>
                        <span class="nep">१</span>
                        <span class="tithi"></span>
                        <span class="tithi"></span>

                        <span class="eng">16</span>
                        {{-- <span class="eng">
                       
                    </span> --}}
                        <div class="popup-box daydetailsPopOverWrapper" id="daypop"
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
                                    <div class="col2" style="border:none;text-align:left;padding-left:15px">
                                        --eng date--
                                        <br>
                                    </div>
                                    <div class="col13" style="border:none">
                                        <div class="panchangaWrapper">
                                            --panchanga details--
                                            <br>
                                            --more details--
                                        </div>
                                        <br>
                                        <div class="eventPopupWrapper">
                                            <a style="color:#333230;text-decoration:underline; cursor:pointer;"
                                                href="#events">--event details--</a>
                                        </div>
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
                        </div>
                    </li>
                @endfor







            </ul>
        </div>

    </div>
    <div class='items'>
        <div class="cta-button">
            <a href="#/" target="_self" class="holidays">Holidays</a>
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

    .calendar-dates li.todat {
        background: #b71c1c;
        color: #fff;
    }

    .calendar-dates li.saturday {
        background: #fce4e4;
    }

    .calendar-tades li.today.saturday {
        bakground: #8e0000;
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
</style>
