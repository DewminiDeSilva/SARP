@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/logframe-tanks.css') }}">
@endpush

@section('content')

<div class="wrap">
  <div class="h1" style="margin-bottom:12px;">Tank Logframe — Create / Edit</div>

  <form method="POST" action="{{ route('logframe.tanks.store') }}" class="grid" style="gap:16px;">
    @csrf

    <!-- Meta -->
    <div class="card" style="padding:16px;">
      <div class="grid meta">
        <div class="field">
          <label>Baseline</label>
          <input type="number" min="0" name="baseline" value="{{ old('baseline', $meta['baseline'] ?? 0) }}">
        </div>
        <div class="field">
          <label>Mid-Term</label>
          <input type="number" min="0" name="mid_term" value="{{ old('mid_term', $meta['mid_term'] ?? 120) }}">
        </div>
        <div class="field">
          <label>End Target</label>
          <input type="number" min="0" name="end_target" value="{{ old('end_target', $meta['end_target'] ?? 260) }}">
        </div>

        <div class="field">
          <label>Source</label>
          <input type="text" name="source" value="{{ old('source', $meta['source'] ?? 'MIS') }}">
        </div>
        <div class="field">
          <label>Frequency</label>
          <input type="text" name="frequency" value="{{ old('frequency', $meta['frequency'] ?? 'Monthly') }}">
        </div>
        <div class="field">
          <label>Responsibility</label>
          <input type="text" name="responsibility" value="{{ old('responsibility', $meta['responsibility'] ?? 'PMU') }}">
        </div>

        <div class="field" style="grid-column:1 / -1;">
          <label>Assumptions</label>
          <textarea rows="2" name="assumptions">{{ old('assumptions', $meta['assumptions'] ?? '') }}</textarea>
        </div>
      </div>
    </div>

    <!-- Per-year -->
    <div class="card" style="padding:16px;">
      <div style="font-weight:600;margin-bottom:8px;">Per-Year Targets & Results</div>
      <div class="year-grid">
        @foreach($years as $y)
          @php $existing = $data->get($y) ?? null; @endphp
          <div class="box">
            <div style="font-size:13px;font-weight:700;margin-bottom:8px;">Year {{ $y }}</div>
            <div>
              <div style="display:flex;align-items:center;gap:8px;">
                <label style="font-size:12px;">Year Target</label>
                <input type="number" min="0" name="year_target[{{ $y }}]" value="{{ old("year_target.$y", $existing?->year_target ?? 0) }}" style="max-width:110px;">
              </div>
              <div style="display:flex;align-items:center;gap:8px;margin-top:8px;">
                <label style="font-size:12px;">Year Result</label>
                <input type="number" min="0" name="year_result[{{ $y }}]" value="{{ old("year_result.$y", $existing?->year_result ?? 0) }}" style="max-width:110px;">
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <div class="btns" style="display:flex;justify-content:center;gap:8px;">
      <button type="submit" class="btn btn-primary">Save</button>
      <a href="{{ route('logframe.tanks.index') }}" class="btn">Cancel</a>
    </div>
  </form>
</div>
@endsection
