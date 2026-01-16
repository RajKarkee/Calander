// News slider functionality
$(document).ready(function () {
    const $sliderTrack = $('#sliderTrack');
    const $nextBtn = $('#nextBtn');
    const $prevBtn = $('#prevBtn');

    if (!$sliderTrack.length || !$nextBtn.length || !$prevBtn.length) {
        console.warn('News slider elements not found');
        return;
    }

    const $originalSlides = $('.slide-item').clone();
    $sliderTrack.append($originalSlides);

    const $slides = $('.slide-item');
    let currentPosition = 0;
    const slideWidth = 295;
    const originalSlidesCount = $originalSlides.length;
    const totalWidth = originalSlidesCount * slideWidth;

    function slideNext() {
        currentPosition += slideWidth;
        $sliderTrack.css('transform', `translateX(-${currentPosition}px)`);

        if (currentPosition >= totalWidth) {
            setTimeout(function () {
                $sliderTrack.css('transition', 'none');
                currentPosition = 0;
                $sliderTrack.css('transform', 'translateX(0)');

                setTimeout(function () {
                    $sliderTrack.css('transition', 'transform 0.5s ease');
                }, 50);
            }, 500);
        }
    }

    function slidePrev() {
        if (currentPosition <= 0) {
            $sliderTrack.css('transition', 'none');
            currentPosition = totalWidth;
            $sliderTrack.css('transform', `translateX(-${currentPosition}px)`);

            setTimeout(function () {
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

    $(document).on('keydown', function (e) {
        if (e.key === 'ArrowLeft') {
            slidePrev();
        } else if (e.key === 'ArrowRight') {
            slideNext();
        }
    });

    let touchStartX = 0;
    let touchEndX = 0;

    $sliderTrack.on('touchstart', function (e) {
        touchStartX = e.touches[0].clientX;
    });

    $sliderTrack.on('touchmove', function (e) {
        touchEndX = e.touches[0].clientX;
    });

    $sliderTrack.on('touchend', function () {
        if (touchStartX - touchEndX > 50) {
            slideNext();
        }
        if (touchEndX - touchStartX > 50) {
            slidePrev();
        }
    });
});
