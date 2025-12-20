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
    </div>
    <div class='items'>
        <div class="column9">
            <div class="calander" id="calendarContainer">
                <div class="current_date">
                    <div class="dropdown">
                        <form action="#" method="GET" name="search_form" onsubmit="return false;">
                            <a href ="#" class="prev icon-flipped newArrow arrowLeft">Prev</a>
                            <select name="year" id="selectYear" class="calanderSelect SelectYear timeSelect"
                                onchange="changetime();"
                                style="background-image:url('../images/icon/down.png');background-repeat:no-repeat;background-position-x:92%;background-position-y:7px;border-radius:2px;padding-left:10px;cursor:pointer;padding-right:2rem;border:none;color:#555555;padding-top:3px;height:33px;">
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                            </select>
                            <select name="month" id="selectMonth" class="calanderSelect SelectMonth timeSelect"
                                style="background-image:url('../images/icon/down.png');background-repeat:no-repeat;background-position-x:92%;background-position-y:7px;border-radius:2px;padding-left:10px;cursor:pointer;padding-right:2rem;border:none;color:#555555;padding-top:3px;height:33px;">
                                <option value="1">Baisakh</option>
                                <option value="2">Jestha</option>
                                <option value="3">Ashadh</option>
                                <option value="4">Shrawan</option>
                                <option value="5">Bhadra</option>
                                <option value="6">Ashwin</option>
                                <option value="7">Kartik</option>
                                <option value="8">Mangsir</option>
                                <option value="9">Poush</option>
                                <option value="10">Magh</option>
                                <option value="11">Falgun</option>
                                <option value="12">Chaitra</option>
                            </select>
                    </div>
                </div>
            </div>
            <div class='items'> Item 3 </div>
        </div>




        <style>
            .column9 {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .current_date {
                position: relative;
                padding-bottom: 20px;
                padding-top: 0px;
                width: 820px;

            }

            .current_date .dropdown {
                font-size: 12px;
                position: absolute;
                top 0;
                left: 34%;
                text-align: center;
                witdth: 350px;
                margin-left: -105px;
            }
        </style>
