<div class="date-banner" style="background-color: {{ setting('logo_color') }}">
    <div class="date-content">

        <div class="nepali-date" id="nepaliDate">
            <!-- Today's Nepali date will be loaded here -->
        </div>

        <div class="english-day" id="englishDay">

        </div>

        <div class="today-event" id="todayEvent">
            <strong></strong> <span id="eventTitle">-</span>
        </div>

        <div class="nepali-tithi" id="nepaliTithi">
            <strong></strong> <span id="tithiValue">-</span>
        </div>

        <div class="day-time" id="dayTime">
            <!-- Current time will be displayed here -->
        </div>

        <div class="english-date" id="englishDate">
            <strong></strong> <span id="engDateValue">-</span>
        </div>
    </div>

    <div class="ads-slider">
        @foreach (getSliders() as $index => $slider)
            <div class="ad-item">
                <img src="{{ asset('storage/' . $slider) }}" alt="slider{{ $loop->iteration }}" loading="lazy"
                    decoding="async" class="img-fluid">
            </div>
        @endforeach
    </div>

</div>
