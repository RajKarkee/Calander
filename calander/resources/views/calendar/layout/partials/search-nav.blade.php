<div class="calendar-nav">
    <div class="calendar-nav-content">
        <div class="calendar-title">{{ __('site.Nepali') }} {{ __('site.Calendar') }} 2082</div>

        <div class="teleprompter-wrapper" data-teleprompter data-speed="90" aria-label="Announcements">
            @if (!$announcements->isEmpty())
                <div class="teleprompter-track" data-track>
                    <div class="teleprompter-content" data-content>
                        @foreach ($announcements as $a)
                            <span class="announcement-item">
                                <span class="type type-{{ $a->type }}">{{ strtoupper($a->type) }}:</span>
                                <span class="announcement-title">{{ $a->title }}</span>
                            </span>
                            <span class="announcement-sep"
                                aria-hidden="true">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>


{{-- <style>
    .teleprompter-wrapper {
        overflow: hidden;
        width: 100%;
    }

    .teleprompter-track {
        display: flex;
        flex-wrap: nowrap;
        /* force single row */
        white-space: nowrap;
        will-change: transform;
    }

    .teleprompter-content {
        display: flex;
        flex-wrap: nowrap;
        white-space: nowrap;
    }

    .announcement-item,
    .announcement-sep {
        flex-shrink: 0;
        /* CRITICAL */
        white-space: nowrap;
    }

    .teleprompter-wrapper:hover {
        cursor: pointer;
    }
</style> --}}

{{--
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const wrappers = document.querySelectorAll('[data-teleprompter]');
        wrappers.forEach(function(wrapper) {
            const track = wrapper.querySelector('[data-track]');
            const content = wrapper.querySelector('[data-content]');
            if (!track || !content) return;

            // Clone DOM nodes (no HTML string slicing/manipulation).
            const clone = content.cloneNode(true);
            clone.setAttribute('aria-hidden', 'true');
            track.appendChild(clone);

            let contentWidth = 0;
            let x = 0;
            let last = 0;

            // speed in px/sec (optional control via data-speed)
            const speed = Math.max(10, Number(wrapper.dataset.speed || 90));

            function measure() {
                // Prefer precise layout width; fall back to scrollWidth.
                contentWidth = (content.getBoundingClientRect && content.getBoundingClientRect()
                    .width) || content.scrollWidth || 0;
                // Start from the right edge (first character enters immediately from right boundary)
                x = Math.round(wrapper.clientWidth || 0);
            }

            function ensureMeasured(triesLeft) {
                measure();
                if (contentWidth > 0) return true;
                if (triesLeft <= 0) return false;
                setTimeout(function() {
                    ensureMeasured(triesLeft - 1);
                }, 50);
                return false;
            }

            // Give layout/fonts a moment if needed.
            ensureMeasured(10);

            function frame(now) {
                if (!last) last = now;
                const dt = Math.min(0.05, (now - last) / 1000);
                last = now;

                // If width is still not measurable, keep trying silently.
                if (!contentWidth) {
                    contentWidth = content.scrollWidth || 0;
                }

                x -= speed * dt;

                // Seamless wrap: ensure we wrap by exact content widths (handle large dt and floating-point drift).
                while (contentWidth > 0 && x <= -contentWidth) {
                    x += contentWidth;
                }

                // Round the transform to avoid sub-pixel rendering gaps/jitter.
                const tx = Math.round(x);
                track.style.transform = `translate3d(${tx}px, -50%, 0)`;
                requestAnimationFrame(frame);
            }

            requestAnimationFrame(frame);

            // Keep it correct on resize (mobile rotation etc.)
            if (window.ResizeObserver) {
                const ro = new ResizeObserver(function() {
                    measure();
                });
                ro.observe(wrapper);
            } else {
                window.addEventListener('resize', function() {
                    measure();
                });
            }
        });
    });
</script> --}}
<script>
    function TeleprompterMarquee(wrapper) {
        if (typeof wrapper === 'string') wrapper = document.querySelector(wrapper);
        if (!wrapper) return;

        const track = wrapper.querySelector('[data-track]');
        const content = wrapper.querySelector('[data-content]');
        if (!track || !content) return;

        // Interpret speed as pixels per second. Use a sensible default (slower).
        const rawSpeed = parseFloat(wrapper.dataset.speed || 30);
        const speed = isNaN(rawSpeed) ? 30 : rawSpeed;

        // Measure single content unit before cloning so we know the wrap width.
        const unitWidth = content.scrollWidth || 0;

        // Clone content until track is wide enough to scroll smoothly.
        let trackWidth = track.scrollWidth || 0;
        const minWidth = (wrapper.clientWidth || 0) * 2;
        while (trackWidth < minWidth) {
            const children = Array.from(content.querySelectorAll(':scope > *'));
            children.forEach(el => content.appendChild(el.cloneNode(true)));
            trackWidth = track.scrollWidth || 0;
        }

        const wrapWidth = unitWidth || (trackWidth / 2) || 1;

        // Start from the right edge so items enter from the right.
        let pos = wrapper.clientWidth || 0;
        let paused = false;

        wrapper.addEventListener('mouseenter', () => paused = true);
        wrapper.addEventListener('mouseleave', () => paused = false);

        let last = 0;

        function animate(now) {
            if (!last) last = now;
            const dt = Math.min(0.05, (now - last) / 1000);
            last = now;

            if (!paused) {
                pos -= speed * dt;

                // Wrap by the original unit width to create a seamless loop.
                while (pos <= -wrapWidth) pos += wrapWidth;

                track.style.transform = `translateX(${Math.round(pos)}px)`;
            }
            requestAnimationFrame(animate);
        }

        requestAnimationFrame(animate);
    }

    window.addEventListener('load', () => {
        document.querySelectorAll('[data-teleprompter]').forEach(el => {
            TeleprompterMarquee(el);
        });
    });
</script>
