@php
    $headerExtra = $cardHeaderStyle ?? '';
@endphp
<div class="container mt-4">
    <div class="d-flex justify-content-center flex-wrap">
        <div class="card text-center" style="width: 14rem; margin: 0 10px 10px 0;">
            <div class="card-header" @if($headerExtra) style="{{ $headerExtra }}" @endif>Total Participants</div>
            <div class="card-body">
                <h5 class="card-title">{{ $totalParticipants ?? 0 }}</h5>
            </div>
        </div>
        <div class="card text-center" style="width: 14rem; margin: 0 10px 10px 0;">
            <div class="card-header" @if($headerExtra) style="{{ $headerExtra }}" @endif>Male</div>
            <div class="card-body">
                <h5 class="card-title">{{ $maleCount ?? 0 }}</h5>
            </div>
        </div>
        <div class="card text-center" style="width: 14rem; margin: 0 10px 10px 0;">
            <div class="card-header" @if($headerExtra) style="{{ $headerExtra }}" @endif>Female</div>
            <div class="card-body">
                <h5 class="card-title">{{ $femaleCount ?? 0 }}</h5>
            </div>
        </div>
        <div class="card text-center" style="width: 14rem; margin: 0 10px 10px 0;">
            <div class="card-header" @if($headerExtra) style="{{ $headerExtra }}" @endif>Youth (18-40)</div>
            <div class="card-body">
                <h5 class="card-title">{{ $youthCount ?? 0 }}</h5>
            </div>
        </div>
    </div>
</div>
