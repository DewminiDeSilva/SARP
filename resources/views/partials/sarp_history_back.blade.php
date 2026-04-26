{{--
  One-step Back: uses browser history when the user arrived from the same origin; otherwise follows $fallback.
  Pass: fallback (URL), optional linkClass (default: btn-back), optional label (default: Back), optional labelHtml (raw inner HTML, e.g. icons), optional showArrowImage (default: true).
--}}
@php
    $sarpBackFallback = $fallback ?? route('dashboard');
    $sarpBackClass = $linkClass ?? 'btn-back';
    $sarpBackLabel = $label ?? 'Back';
    $sarpBackShowImg = $showArrowImage ?? true;
    $sarpBackLabelHtml = $labelHtml ?? null;
@endphp
<a href="{{ $sarpBackFallback }}" class="{{ $sarpBackClass }} js-sarp-one-step-back">
    @if ($sarpBackShowImg)
        <img src="{{ asset('assets/images/backarrow.png') }}" alt=""><span class="btn-text">{{ $sarpBackLabel }}</span>
    @elseif ($sarpBackLabelHtml !== null && $sarpBackLabelHtml !== '')
        {!! $sarpBackLabelHtml !!}
    @else
        {{ $sarpBackLabel }}
    @endif
</a>
@once
<script>
(function () {
    function bindSarpBack() {
        document.querySelectorAll('a.js-sarp-one-step-back').forEach(function (a) {
            if (a.dataset.sarpBackBound) {
                return;
            }
            a.dataset.sarpBackBound = '1';
            a.addEventListener('click', function (e) {
                var origin = window.location.origin;
                if (document.referrer && document.referrer.indexOf(origin) === 0 && window.history.length > 1) {
                    e.preventDefault();
                    history.back();
                }
            });
        });
    }
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', bindSarpBack);
    } else {
        bindSarpBack();
    }
})();
</script>
@endonce
