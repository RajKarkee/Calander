
(function ($) {
    'use strict';

    const AdsSlider = {

        init() {
            if (!this.exists()) return;


            $(window).on('load', () => {
                this.build();
            });
        },

        exists() {
            return $('.ads-slider').length > 0;
        },

        build() {
            const $slider = $('.ads-slider');


            if ($slider.find('.ad-item').length === 0) {
                console.warn('[AdsSlider] No slides found');
                return;
            }


            if ($slider.hasClass('slick-initialized')) {
                $slider.slick('unslick');
            }

            try {
                $slider.slick({
                    infinite: true,
                    arrows: false,
                    dots: false,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    speed: 1000,
                    fade: true,
                    cssEase: 'linear',
                    pauseOnHover: false,
                    pauseOnFocus: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                });

                $slider.addClass('is-ready');
                console.log('[AdsSlider] Initialized');

            } catch (e) {
                console.error('[AdsSlider] Initialization failed:', e);
            }
        }
    };


    $(document).ready(() => AdsSlider.init());

})(jQuery);
