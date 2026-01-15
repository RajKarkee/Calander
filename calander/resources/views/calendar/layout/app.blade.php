<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar</title>
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app/nepalidate/date.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app/index.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Mukta', sans-serif;
        }

        .nav {
            width: 100%;
            min-height: 72px;
            background-color: #ffffff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 40px;
            border-bottom: 1px solid #e0e0e0;
            box-shadow: 0 2px 4px rgba(243, 235, 235, 0.05);
            position: relative;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 1001;
        }

        .logo-icon {
            width: clamp(36px, 5vw, 45px);
            height: clamp(36px, 5vw, 45px);
            flex: 0 0 auto;

            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            color: white;
            font-weight: 700;
            font-size: clamp(10px, 1.2vw, 12px);
            text-align: center;
            line-height: 1.2;
            padding: 4px;
            overflow: hidden;
        }

        /* When using an uploaded logo image, allow a wider logo without distortion */
        .logo-icon.logo-icon--image {
            width: auto;
            height: clamp(34px, 5vw, 44px);
            padding: 0;
            background: transparent;
            overflow: visible;
        }

        .logo-icon.logo-icon--image .site-logo {
            height: 100%;
            width: auto;
            max-width: clamp(120px, 18vw, 220px);
            object-fit: contain;
            display: block;
        }

        .logo-text {
            font-size: clamp(16px, 2.2vw, 20px);
            font-weight: 700;

            text-decoration: none;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .nav-center {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .nav-links {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 25px;
            margin: 0;
        }

        .nav-links li {
            display: inline-block;
        }

        .nav-links li a {
            color: #1a1a1a;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            transition: color 0.3s ease;
            /* white-space: nowrap; */
            border-bottom: 2px solid transparent;
            transition: border-color 0.2s ease-in-out;
        }

        .nav-links li a:hover {
            color: #dc2626;
            border-bottom-color: currentColor;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 40px;
            z-index: 1001;
        }

        .language-btn {
            background-color: transparent;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 600;
            color: #1a1a1a;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .language-btn:hover {
            background-color: #f3f4f6;
            border-color: #9ca3af;
        }

        .user-icon {
            width: 40px;
            height: 40px;
            background-color: #e5e7eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .user-icon:hover {
            background-color: #d1d5db;
        }

        .user-icon svg {
            width: 24px;
            height: 24px;
            fill: #6b7280;
        }

        /* Hamburger Menu */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 5px;
            z-index: 1001;
        }

        .hamburger span {
            width: 28px;
            height: 3px;
            background-color: #1a1a1a;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg) translate(8px, 8px);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg) translate(8px, -8px);
        }

        .container-fluid {
            width: 100%;
            padding: 0;
            margin: 0;
        }

        .date-banner {

            color: white;
            padding: 40px 20px;
            position: relative;
            overflow: hidden;
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .date-banner::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at top right, rgba(255, 255, 255, 0.1) 0%, transparent 60%);
            pointer-events: none;
        }

        .date-content {
            position: relative;
            z-index: 1;
            max-width: 1400px;
            margin: 0 auto;
            flex: 0 0 25%;
            min-width: 0;
        }

        .ads-slider {
            position: relative;
            z-index: 1;
            max-width: 1400px;
            margin: 0 auto;
            flex: 0 0 75%;
            text-align: center;
            min-width: 0;
            opacity: 0;
            transition: opacity 180ms ease-in-out;
        }

        .ads-slider.is-ready {
            opacity: 1;
        }

        /* Hide slider until full page load + slick init */
        .ads-slider {
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .ads-slider.is-ready {
            opacity: 1;
        }

        .ads-slider .ad-item {
            display: none;
        }

        .ads-slider.slick-initialized .ad-item {
            display: block;
        }

        .ads-slider .ad-item {
            width: 100%;
        }

        .ads-slider .ad-item img {
            width: 100%;
            height: clamp(90px, 18vw, 160px);
            object-fit: cover;
            display: block;
            border-radius: 10px;
        }

        .ads-slider .slick-slide {
            padding: 0 10px;
        }

        .ads-slider .slick-list {
            margin: 0 -10px;
        }

        @media (max-width: 992px) {
            .date-banner {
                padding: 28px 16px;
            }

            .date-content {
                flex: 0 0 35%;
            }

            .ads-slider {
                flex: 0 0 65%;
            }
        }

        @media (max-width: 768px) {
            .nav {
                padding: 0 16px;
            }

            .date-banner {
                flex-direction: column;
                align-items: stretch;
            }

            .date-content,
            .ads-slider {
                flex: 0 0 auto;
                width: 100%;
                max-width: none;
            }

            .ads-slider .ad-item img {
                height: clamp(120px, 35vw, 180px);
            }
        }

        .nepali-date {
            font-size: 2.0em;


            line-height: 1.2;
        }

        .english-day {
            font-size: 2.0em;
            margin-top: -10px;

            /* margin-bottom: 12px; */
            opacity: 0.95;
        }

        .nepali-tithi {
            font-size: 1.3rem;
            /* font-weight: 500; */
            /* margin-bottom: 6px; */
            opacity: 0.9;
        }

        .paksya-info {
            font-size: 1.3rem;


            opacity: 0.85;
        }

        .day-time {
            font-size: 14px;


            opacity: 0.8;
        }

        .english-date {
            font-size: 14px;

            opacity: 0.75;
        }

        .calendar-nav {
            background-color: #f9fafb;
            padding: 10px 30px;
            border-bottom: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            z-index: 999999999999999;
        }

        .calendar-nav-content {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 16px;
        }

        .calendar-title {
            font-size: 18px;
            font-weight: 600;
            color: #6b7280;
            flex: 0 0 auto;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-icon {
            width: 20px;
            height: 20px;
            fill: #6b7280;
        }

        .search-input {
            border: 1px solid #d1d5db;
            border-radius: 6px;
            padding: 8px 16px;
            font-size: 14px;
            outline: none;
            width: 250px;
            transition: border-color 0.3s ease;
        }

        .search-input:focus {
            border-color: #dc2626;
        }

        .search-input::placeholder {
            color: #9ca3af;
        }

        /* Tablet Styles (768px - 1199px) */
        @media (max-width: 1199px) {
            .nav {
                padding: 0 30px;
            }

            .nav-links {
                gap: 25px;
            }

            .nav-links li a {
                font-size: 14px;
            }

            .logo-text {
                font-size: 18px;
            }

            .logo-icon {
                width: 40px;
                height: 40px;
                font-size: 11px;
            }
        }

        @media (max-width: 1024px) {
            .nav-links {
                gap: 20px;
            }

            .nav-links li a {
                font-size: 13px;
            }
        }

        /* Mobile and Small Tablet Styles (below 992px) */
        @media (max-width: 991px) {
            .nav {
                padding: 16px 20px;
            }

            .hamburger {
                display: flex;
                order: 2;
            }

            .logo {
                order: 1;
            }

            .nav-right {
                order: 3;
            }

            .nav-center {
                position: fixed;
                top: 72px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 72px);
                background-color: #ffffff;
                flex-direction: column;
                justify-content: flex-start;
                padding: 30px 20px;
                transition: left 0.3s ease;
                overflow-y: auto;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .nav-center.active {
                left: 0;
            }

            .nav-links {
                flex-direction: column;
                gap: 0;
                width: 100%;
                align-items: flex-start;
            }

            .nav-links li {
                width: 100%;
                border-bottom: 1px solid #f3f4f6;
            }

            .nav-links li a {
                display: block;
                padding: 18px 16px;
                font-size: 16px;
                width: 100%;
            }

            .nav-links li a:hover {
                background-color: #f9fafb;
            }

            .language-btn {
                padding: 6px 12px;
                font-size: 13px;
            }

            .user-icon {
                width: 36px;
                height: 36px;
            }

            .user-icon svg {
                width: 20px;
                height: 20px;
            }
        }

        /* Small Mobile Styles (below 576px) */
        @media (max-width: 575px) {
            .nav {
                padding: 12px 16px;
            }

            .logo {
                gap: 8px;
            }

            .logo-icon {
                width: 36px;
                height: 36px;
                font-size: 10px;
            }

            .logo-icon.logo-icon--image {
                height: 34px;
            }

            .logo-icon .site-logo {
                max-width: 140px;
            }

            .logo-text {
                font-size: 16px;
            }

            .nav-right {
                gap: 12px;
            }

            .language-btn {
                padding: 6px 10px;
                font-size: 12px;
            }

            .user-icon {
                width: 32px;
                height: 32px;
            }

            .user-icon svg {
                width: 18px;
                height: 18px;
            }

            .hamburger span {
                width: 24px;
                height: 2.5px;
            }

            .nav-links li a {
                font-size: 15px;
                padding: 16px 12px;
            }
        }



        /* Extra Small Mobile (below 375px) */
        @media (max-width: 374px) {
            .logo-text {
                display: none;
            }

            .nav-right {
                gap: 8px;
            }

            .language-btn {
                padding: 5px 8px;
                font-size: 11px;
            }
        }
    </style> --}}
</head>

<body>
    <nav class="nav">
        <!-- Logo Section -->
        <div class="logo">
            <div class="logo-icon {{ setting('logo_image') ? 'logo-icon--image' : '' }}">
                @if (setting('logo_image'))
                    <img src="{{ getLogo() }}" alt="Site Logo" class="site-logo" loading="eager" decoding="async">
                @endif
            </div>
            <a href="/" class="logo-text"
                style="color:{{ setting('logo_color') }}">{{ setting('site_name') ?? 'null' }}</a>
        </div>

        <!-- Hamburger Menu Icon -->
        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- Navigation Links -->
        <div class="nav-center" id="navCenter">
            <ul class="nav-links">
                <li><a href="#">{{ __('site.home') }}</a></li>
                <li><a href="#">Mart</a></li>
                <li><a href="#">Gifts</a></li>
                <li><a href="#">Recharge</a></li>
                <li><a href="#">Health</a></li>
                <li><a href="#">Jyotish</a></li>
                <li><a href="#">Rashifal</a></li>
                <li><a href="#">Podcasts</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Gold/Silver</a></li>
                <li><a href="#">Forex</a></li>
                <li><a href="#">Converter</a></li>
            </ul>
        </div>
        @include('calendar.layout.partials.message')
        <!-- Right Section with Language Button and User Icon -->
        <div class="nav-right">
            @if (app()->getLocale() === 'en')
                <a href="{{ route('lang.switch', ['locale' => 'np']) }}" class="language-btn">NP</a>
            @else
                <a href="{{ route('lang.switch', ['locale' => 'en']) }}" class="language-btn">EN</a>
            @endif

            <div class="user-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                </svg>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">
            @include('calendar.layout.partials.date')
        </div>
        @include('calendar.layout.partials.search-nav')
        <div class="container-fluid pt-0">
            @include('calendar.layout.partials.slider')
            @include('calendar.index')
        </div>
        <div class="nepali">
            <input type="text" id="nepali-datepicker" placeholder="Select Nepali Date"
                style="padding:10px;font-size:16px;">
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/nepali.datepicker.min.js') }}"></script>
    <script src="{{ asset('js/date.js') }}"></script>
    <script src="https://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v5.0.6.min.js"
        type="text/javascript"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    @stack('scripts')
    <script>
        window.onload = function() {
            var input = document.getElementById("nepali-datepicker");
            input.nepaliDatePicker();
        }


        const engMonths = [
            'Baisakh', 'Jestha', 'Ashadh', 'Shrawan', 'Bhadra', 'Ashwin',
            'Kartik', 'Mangsir', 'Poush', 'Magh', 'Falgun', 'Chaitra'
        ];



        const nepMonths = [
            'बैशाख', 'जेष्ठ', 'आषाढ', 'श्रावण', 'भाद्र', 'आश्विन',
            'कार्तिक', 'मंसिर', 'पौष', 'माघ', 'फाल्गुन', 'चैत्र'
        ];

        function getEnglishMonthName(monthIndex) {
            if (!Number.isFinite(monthIndex)) return '';
            return engMonths[monthIndex] || '';
        }

        function getNepaliMonthName(monthIndex) {
            if (!Number.isFinite(monthIndex)) return '';
            return nepMonths[monthIndex] || '';
        }

        function getNepaliDayName(day) {
            const nepaliDays = [
                'आइतबार', 'सोमबार', 'मङ्गलबार', 'बुधबार', 'बिहिबार', 'शुक्रबार', 'शनिबार'
            ];
            return nepaliDays[day] || '';
        }

        function getEnglishDayName(day) {
            const englishDays = [
                'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
            ];
            return englishDays[day] || '';
        }

        function englishToNepaliNumber(englishNumber) {
            const nepaliDigits = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'];
            return englishNumber.toString().split('').map(digit => nepaliDigits[parseInt(digit)]).join('');
        }

        function updatedNepaliClock() {
            const now = new Date();
            const nepaliTime = new Date(
                now.toLocaleString('en-US', {
                    timeZone: 'Asia/Kathmandu'
                })
            );
            let year = nepaliTime.getFullYear();
            const month = nepaliTime.getMonth();
            const date = nepaliTime.getDate().toString().padStart(2, '0');
            const day = nepaliTime.getDay();
            // document.getElementById('nepaliDate').innerText = `${date} ${getNepaliMonthName(
        //     month
        // )} ${year},`;

            var dateConvert = convert(`${year}${month}${date}`);
            const [nepYear, nepMonth, nepDay] = dateConvert.split('-');
            let nepaliMonth = getNepaliMonthName(parseInt(nepMonth) - 1);
            let englishMonth = getEnglishMonthName(parseInt(nepMonth) - 1);
            console.log(nepaliMonth);
            // document.getElementById('nepaliDateFull').innerText = `${nepDay} ${nepaliMonth} ${nepYear}`;
            // console.log(nepYear, nepMonth, nepDay);
            // console.log(getNepaliMonthName(nepMonth));
            // console.log(day);
            document.getElementById('englishDay').innerText = getEnglishDayName(day);
            let hours = nepaliTime.getHours();
            const minutes = nepaliTime.getMinutes().toString().padStart(2, '0');
            const seconds = nepaliTime.getSeconds().toString().padStart(2, '0');
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12 || 12;
            let period, className;
            if (hours >= 5 && nepaliTime.getHours() < 12) {
                period = 'बिहान';
                className = 'morning';
            } else if (nepaliTime.getHours() >= 12 && nepaliTime.getHours() < 17) {
                period = 'दिउँसो';
                className = 'afternoon';
            } else if (nepaliTime.getHours() >= 17 && nepaliTime.getHours() < 21) {
                period = 'साँझ';
                className = 'evening';
            } else {
                period = 'राति';
                className = 'night';
            }
            const timeString = `${hours}:${minutes}:${seconds} ${ampm}`;

            document.getElementById('dayTime').innerText = `${period} ${timeString}`;
            return {};
        }
        try {
            updatedNepaliClock();
            setInterval(updatedNepaliClock, 1000);
        } catch (e) {
            console.error('Failed to start Nepali clock', e);
        }



        function convert(dateConvert) {

            // let reversed = '';
            // for (let i = dateConvert.length - 1; i >= 0; i--) {
            //     reversed += dateConvert[i];
            // }
            let month;
            let day;
            let year;

            year = parseInt(dateConvert.slice(0, 4));
            month = parseInt(dateConvert.slice(4, 6)) + 1;
            day = parseInt(dateConvert.slice(6, 8));

            day = day + 16;


            if (day > 30) {
                day = day - 30;
                month = month + 1;
            }
            month = month + 8;
            if (month > 12) {
                month = month - 12;
                year = year + 1;
            }
            year = year + 56;
            day = String(day).padStart(2, '0');
            month = String(month).padStart(2, '0');
            return (`${year}-${month}-${day}`);


        }


        const hamburger = document.getElementById('hamburger');
        const navCenter = document.getElementById('navCenter');

        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('active');
            navCenter.classList.toggle('active');
        });

        // Close menu when clicking on a link (for better mobile UX)
        const navLinks = document.querySelectorAll('.nav-links li a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                hamburger.classList.remove('active');
                navCenter.classList.remove('active');
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            const isClickInsideNav = navCenter.contains(event.target);
            const isClickOnHamburger = hamburger.contains(event.target);

            if (!isClickInsideNav && !isClickOnHamburger && navCenter.classList.contains('active')) {
                hamburger.classList.remove('active');
                navCenter.classList.remove('active');
            }
        });
        $(document).ready(function() {
            const $sliderTrack = $('#sliderTrack');
            const $prevBtn = $('#prevBtn');
            const $nextBtn = $('#nextBtn');

            // Clone all slides and append to create infinite loop
            const $originalSlides = $('.slide-item').clone();
            $sliderTrack.append($originalSlides);

            const $slides = $('.slide-item');
            let currentPosition = 0;
            const slideWidth = 295; // 280px width + 15px gap
            const originalSlidesCount = $originalSlides.length;
            const totalWidth = originalSlidesCount * slideWidth;

            function slideNext() {
                currentPosition += slideWidth;
                $sliderTrack.css('transform', `translateX(-${currentPosition}px)`);

                // Reset to beginning when we've scrolled past all original slides
                if (currentPosition >= totalWidth) {
                    setTimeout(function() {
                        $sliderTrack.css('transition', 'none');
                        currentPosition = 0;
                        $sliderTrack.css('transform', `translateX(0)`);

                        // Re-enable transition after a brief moment
                        setTimeout(function() {
                            $sliderTrack.css('transition', 'transform 0.5s ease');
                        }, 50);
                    }, 500);
                }
            }

            function slidePrev() {
                // If at the beginning, jump to the end (of original slides)
                if (currentPosition <= 0) {
                    $sliderTrack.css('transition', 'none');
                    currentPosition = totalWidth;
                    $sliderTrack.css('transform', `translateX(-${currentPosition}px)`);

                    setTimeout(function() {
                        $sliderTrack.css('transition', 'transform 0.5s ease');
                        currentPosition -= slideWidth;
                        $sliderTrack.css('transform', `translateX(-${currentPosition}px)`);
                    }, 50);
                } else {
                    currentPosition -= slideWidth;
                    $sliderTrack.css('transform', `translateX(-${currentPosition}px)`);
                }
            }

            $nextBtn.on('click', slideNext);
            $prevBtn.on('click', slidePrev);

            // Keyboard navigation
            $(document).on('keydown', function(e) {
                if (e.key === 'ArrowLeft') {
                    slidePrev();
                } else if (e.key === 'ArrowRight') {
                    slideNext();
                }
            });


            let touchStartX = 0;
            let touchEndX = 0;

            $sliderTrack.on('touchstart', function(e) {
                touchStartX = e.touches[0].clientX;
            });

            $sliderTrack.on('touchmove', function(e) {
                touchEndX = e.touches[0].clientX;
            });

            $sliderTrack.on('touchend', function() {
                if (touchStartX - touchEndX > 50) {
                    slideNext();
                }
                if (touchEndX - touchStartX > 50) {
                    slidePrev();
                }
            });


        });
    </script>
</body>

</html>
