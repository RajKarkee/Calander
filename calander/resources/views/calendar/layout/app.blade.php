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
    <script src="{{ asset('js/ads-slider.js') }}"></script>
    <script src="{{ asset('js/news-slider.js') }}"></script>
    @stack('scripts')
    {{-- <script>
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
    </script> --}}
    <script>
        const App = {

            lang: '{{ app()->getLocale() }}',

            init() {
                this.cacheDom();
                this.initClock();
                this.loadTodayInfo();
                this.initSlider();
                this.bindLanguageSwitcher();
            },

            cacheDom() {
                this.$adsSlider = $('.ads-slider');
                this.$nepaliDate = $('#nepaliDate');
                this.$englishDay = $('#englishDay');
                this.$englishDate = $('#engDateValue');
                this.$eventTitle = $('#eventTitle');
                this.$tithiValue = $('#tithiValue');
                this.$dayTime = $('#dayTime');
                this.$langBtns = $('[data-lang]');
            },

            initClock() {
                const update = () => {
                    const now = new Date(
                        new Date().toLocaleString('en-US', {
                            timeZone: 'Asia/Kathmandu'
                        })
                    );

                    const h24 = now.getHours();
                    const h = h24 % 12 || 12;
                    const m = String(now.getMinutes()).padStart(2, '0');
                    const s = String(now.getSeconds()).padStart(2, '0');
                    const ap = h24 >= 12 ? 'PM' : 'AM';

                    let period = 'राति';
                    if (h24 >= 5 && h24 < 12) period = 'बिहान';
                    else if (h24 < 17) period = 'दिउँसो';
                    else if (h24 < 21) period = 'साँझ';

                    this.$dayTime.text(`${period} ${h}:${m}:${s} ${ap}`);
                };

                update();
                setInterval(update, 1000);
            },


            async loadTodayInfo() {
                try {
                    if (typeof NepaliFunctions === 'undefined') return;

                    const today = NepaliFunctions.BS.GetCurrentDate();
                    const {
                        year,
                        month,
                        day
                    } = today;

                    const bsDate = `${year}-${String(month).padStart(2,'0')}-${String(day).padStart(2,'0')}`;

                    // Nepali date
                    const nepMonth = NepaliFunctions.BS.GetMonthInUnicode(month - 1);
                    const nepYear = NepaliFunctions.ConvertToUnicode(year);
                    const nepDay = NepaliFunctions.ConvertToUnicode(day);

                    this.$nepaliDate.text(`${nepDay} ${nepMonth} ${nepYear}`);

                    // AD date
                    const adDate = new Date(NepaliFunctions.BS2AD(bsDate));

                    const nepDays = ['आइतबार', 'सोमबार', 'मंगलबार', 'बुधबार', 'बिहिबार', 'शुक्रबार', 'शनिबार'];

                    this.$englishDay.text(
                        this.lang === 'np' ?
                        nepDays[adDate.getDay()] :
                        adDate.toLocaleDateString('en-US', {
                            weekday: 'long'
                        })
                    );

                    this.$englishDate.text(
                        adDate.toLocaleDateString('en-US', {
                            year: 'numeric',
                            month: 'short',
                            day: 'numeric'
                        })
                    );

                    // Fetch event
                    const res = await fetch(`/calendar/data/${year}/${month}`);
                    const data = await res.json();

                    if (data && data[bsDate]) {
                        this.$eventTitle.text(data[bsDate].title || '-');
                        this.$tithiValue.text(data[bsDate].tithi || '-');
                    } else {
                        this.$eventTitle.text('-');
                        this.$tithiValue.text('-');
                    }

                } catch (e) {
                    console.error('Today info error:', e);
                }
            },





            bindLanguageSwitcher() {
                this.$langBtns.on('click', (e) => {
                    e.preventDefault();
                    const newLang = $(e.currentTarget).data('lang');

                    if (!newLang || newLang === this.lang) return;

                    window.location.href = `/lang/${newLang}`;
                });
            }
        };

        $(document).ready(() => App.init());
    </script>




</body>

</html>
