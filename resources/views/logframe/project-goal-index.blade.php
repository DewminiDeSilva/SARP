@php
  // inputs expected from controller: $years, $meta, $yearTargets, $yearResults
  $running = 0;
  $cumulative = [];
  foreach ($years as $y) {
    $running += ($yearResults[$y] ?? 0);
    $cumulative[$y] = $running;
  }
  $nl2br = fn($t) => str_replace("\n", '<br>', e($t));
  $delta = function($target, $result){
    $diff = ($result - $target);
    $pct = $target != 0 ? ($diff / max(1e-9, $target)) * 100 : ($result != 0 ? 100 : 0);
    return ['diff' => $diff, 'pct' => $pct];
  };
@endphp

@extends('layouts.blank')

@section('content')
<style>
/* ====== Inline CSS (no frameworks) ====== */
:root{
  --bg:#f5f7fb; --card:#fff; --line:#e5e7eb; --muted:#6b7280; --text:#1f2937; --accent:#2563eb; --accent-2:#1d4ed8;
  --success:#16a34a; --success-soft:#dcfce7; --warning:#d97706; --warning-soft:#fff7ed; --danger:#dc2626; --danger-soft:#fee2e2;
}
.logframe-wrap{max-width:100%;margin:0 auto;padding:16px;background:linear-gradient(180deg, #f8fafc 0%, #f5f7fb 100%);} 
.card{background:var(--card);border:1px solid var(--line);border-radius:16px;box-shadow:0 1px 2px rgba(0,0,0,.05);}
.h1{font-size:28px;font-weight:800;color:var(--text);} 
.btn{display:inline-flex;align-items:center;gap:.5rem;padding:.6rem 1rem;border-radius:12px;border:1px solid var(--line);text-decoration:none;color:var(--text);background:#fff;font-size:15px;} 
.btn-primary{background:var(--accent);color:#fff;border-color:var(--accent);}
.btn-primary:hover{background:var(--accent-2);}
.btn:hover{background:#f9fafb;}
.btn.active{background:#eef2ff;border-color:#c7d2fe;}

.table-wrap{position:relative;overflow:auto;}
table{border-collapse:separate;border-spacing:0;width:100%;min-width:1100px;}
th,td{border-top:1px solid var(--line);padding:.85rem .9rem;vertical-align:top;color:var(--text);font-size:16px;}
thead th{position:sticky;top:0;background:#f9fafb;z-index:20;font-weight:600;color:#374151;}
/* 3x zoom mode for extra-large display */
.logframe-wrap.zoom3x .h1{font-size:72px;}
.logframe-wrap.zoom3x th, .logframe-wrap.zoom3x td{font-size:48px;padding:1.2rem 1.25rem;}
.logframe-wrap.zoom3x .btn{font-size:45px;padding:1rem 1.25rem;}
.logframe-wrap.zoom3x .badge, .logframe-wrap.zoom3x .legend, .logframe-wrap.zoom3x .status{font-size:42px;}
.logframe-wrap.zoom3x .delta{font-size:42px;}
.logframe-wrap.zoom3x .progress{height:12px;}
.logframe-wrap.zoom3x .legend .dot{width:1.1rem;height:1.1rem;}

/* 1.5x zoom mode */
.logframe-wrap.zoom15x .h1{font-size:42px;}
.logframe-wrap.zoom15x th, .logframe-wrap.zoom15x td{font-size:24px;padding:1rem 1.1rem;}
.logframe-wrap.zoom15x .btn{font-size:22px;padding:.85rem 1.1rem;}
.logframe-wrap.zoom15x .badge, .logframe-wrap.zoom15x .legend, .logframe-wrap.zoom15x .status{font-size:21px;}
.logframe-wrap.zoom15x .delta{font-size:21px;}
.logframe-wrap.zoom15x .progress{height:9px;}
.logframe-wrap.zoom15x .legend .dot{width:.95rem;height:.95rem;}

/* Emphasis mode */
.logframe-wrap.emph .h1{font-weight:900;}
.logframe-wrap.emph td.desc{font-weight:800;}
.logframe-wrap.emph td.desc{background:linear-gradient(180deg,#fff, #f8fafc);} 
tbody tr:nth-child(2n){background:#f8fafc;}
tbody tr:hover{background:#eff6ff;}
td:first-child, th:first-child{position:sticky;left:0;background:#fff;z-index:10;border-right:1px solid var(--line);max-width:380px;}
th[colspan]{text-align:center;}
.badge{display:inline-flex;border:1px solid var(--line);border-radius:999px;padding:.15rem .6rem;font-size:14px;color:#374151;background:#fff;}
.status{margin:12px 0;padding:.6rem .9rem;border:1px solid #bbf7d0;background:#f0fdf4;color:#166534;border-radius:12px;}
.legend{display:flex;gap:.5rem;flex-wrap:wrap;align-items:center;font-size:14px;color:var(--muted);} 
.legend .dot{width:.75rem;height:.75rem;border-radius:999px;display:inline-block;margin-right:.35rem;border:1px solid var(--line);} 
.legend .ok{background:var(--success-soft);border-color:var(--success);} 
.legend .warn{background:var(--warning-soft);border-color:var(--warning);} 
.legend .bad{background:var(--danger-soft);border-color:var(--danger);} 
.legend .muted{background:#eef2ff;border-color:#c7d2fe;} 

.delta{display:inline-flex;align-items:center;gap:.35rem;font-weight:600;border-radius:10px;padding:.15rem .45rem;border:1px solid transparent;}
.delta.up{color:var(--success);background:var(--success-soft);border-color:rgba(22,163,74,.25);} 
.delta.down{color:var(--danger);background:var(--danger-soft);border-color:rgba(220,38,38,.25);} 
.delta.flat{color:#374151;background:#f3f4f6;border-color:#e5e7eb;} 
.cell-target{text-align:center;}
.cell-result{text-align:center;font-weight:600;}
.cell-result.ok{background:var(--success-soft);} 
.cell-result.warn{background:var(--warning-soft);} 
.cell-result.bad{background:var(--danger-soft);} 
.cell-cum{text-align:center;font-weight:700;background:linear-gradient(180deg,#fafafa 0%,#ffffff 100%);} 
.progress{height:6px;border-radius:999px;background:#e5e7eb;overflow:hidden;margin-top:.35rem;} 
.progress > span{display:block;height:100%;background:var(--accent);}

/* header polish */
thead th{background:linear-gradient(180deg,#f9fafb 0%, #eef2ff 100%);}
@media (max-width:640px){
  th,td{padding:.5rem;}
}
</style>

<div class="logframe-wrap">
  @if(session('status'))
    <div class="status">{{ session('status') }}</div>
  @endif

  <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px;">
    <div class="h1">Project Goal — Logframe</div>
    <div style="display:flex;gap:.5rem;">
      <a class="btn" href="{{ route('dashboard') }}">Home</a>
      <a class="btn" href="{{ route('logframe.project-goal.index') }}">Refresh</a>
      <a class="btn btn-primary" href="{{ route('logframe.project-goal.create') }}">Create / Edit</a>
    </div>
  </div>

  <div class="card table-wrap">
    <div style="display:flex;justify-content:space-between;align-items:center;padding:.75rem .75rem .25rem .75rem;flex-wrap:wrap;gap:.5rem;">
      <div style="display:flex;align-items:center;gap:.5rem;flex-wrap:wrap;">
        <span class="badge">Show Years:</span>
        @foreach($years as $y)
          <label class="btn" style="gap:.35rem;padding:.35rem .6rem;">
            <input type="checkbox" class="yr-toggle" data-year-idx="{{ $loop->index }}" value="{{ $y }}" style="accent-color: var(--accent);">
            <span>{{ $y }}</span>
          </label>
        @endforeach
        <button id="yr-all" class="btn" type="button">All</button>
        <button id="yr-none" class="btn" type="button">None</button>
        <button id="yr-latest" class="btn btn-primary" type="button">Latest</button>
      </div>
      <div style="display:flex;align-items:center;gap:.4rem;flex-wrap:wrap;">
        <span class="badge">Text Size</span>
        <button id="zoom-1x" class="btn active" type="button">1x</button>
        <button id="zoom-15x" class="btn" type="button">1.5x</button>
        <button id="zoom-3x" class="btn" type="button">3x</button>
        <button id="toggle-emph" class="btn" type="button">Emphasis</button>
      </div>
      <div class="legend">
        <span><i class="dot ok"></i>Better than target</span>
        <span><i class="dot warn"></i>Close to target (±10%)</span>
        <span><i class="dot bad"></i>Below target</span>
        <span><i class="dot muted"></i>Cumulative</span>
      </div>
    </div>
    <table>
      <thead>
        <tr>
          <th rowspan="2">Results Hierarchy</th>
          <th rowspan="2">Indicators: Name</th>
          <th rowspan="2">Baseline</th>
          <th rowspan="2">Mid-Term</th>
          <th rowspan="2">End Target</th>
          <th rowspan="2">Source</th>
          <th rowspan="2">Frequency</th>
          <th rowspan="2">Responsibility</th>
          <th rowspan="2">Assumptions</th>
          @foreach($years as $y)
            <th class="year-group year-col" data-year-idx="{{ $loop->index }}">Project Yr ({{ $y }})</th>
          @endforeach
        </tr>
        {{-- collapsed: removed per-year subheaders; stacked inside body cells --}}
      </thead>
      <tbody>
        <tr>
          <td class="desc">
            <strong>Project Goal</strong>
            <div style="margin-top:8px;display:flex;gap:4px;">
              <button class="btn" style="padding:2px 6px;font-size:12px;" onclick="editSection('goal', 1)">Edit</button>
              <button class="btn btn-primary" style="padding:2px 6px;font-size:12px;" onclick="addSection('goal')">Add</button>
            </div>
          </td>
          <td class="desc"><strong>Contribute to smallholder poverty reduction, food security and nutrition in target Dry Zone districts</strong></td>
          <td style="text-align:center;">{{ $meta['baseline'] }}</td>
          <td style="text-align:center;">{{ $meta['mid_term'] }}</td>
          <td style="text-align:center;font-weight:600;">{{ $meta['end_target'] }}</td>
          <td style="text-align:center;"><span class="badge">{{ $meta['source'] }}</span></td>
          <td style="text-align:center;">{{ $meta['frequency'] }}</td>
          <td style="text-align:center;">{{ $meta['responsibility'] }}</td>
          <td>{{ $meta['assumptions'] ?: '—' }}</td>

          @foreach($years as $y)
            @php
              $t = (int)($yearTargets[$y] ?? 0);
              $r = (int)($yearResults[$y] ?? 0);
              $d = $delta($t, $r);
              $absPct = abs($d['pct']);
              $flag = $r >= $t ? 'ok' : ($absPct <= 10 ? 'warn' : 'bad');
              $arrow = $r > $t ? 'up' : ($r < $t ? 'down' : 'flat');
              $pctDisp = $t != 0 ? number_format($d['pct'], 1) . '%' : '—';
              $progress = $t > 0 ? max(0, min(100, round(($r / max(1e-9, $t)) * 100))) : 0;
            @endphp
            <td class="year-col" data-year-idx="{{ $loop->index }}">
              <div style="display:flex;flex-direction:column;gap:.25rem;align-items:stretch;">
                <div class="cell-target" style="text-align:center;">Target: {{ $t }}</div>
                <div class="cell-result {{ $flag }}" style="text-align:center;">Result: {{ $r }}</div>
                <div class="delta {{ $arrow }}" title="Result vs Target: {{ $r }} vs {{ $t }} ({{ $pctDisp }})">
                  @if($arrow === 'up') ▲ @elseif($arrow === 'down') ▼ @else ▬ @endif
                  <span>{{ $pctDisp }}</span>
                </div>
                <div class="progress"><span style="width: {{ $progress }}%"></span></div>
                <div class="cell-cum" style="text-align:center;">Cumulative: {{ $cumulative[$y] }}</div>
              </div>
            </td>
          @endforeach
        </tr>
      </tbody>
    </table>
  </div>
  <script>
  (function(){
    const years = @json(array_values($years));
    const checkboxes = Array.from(document.querySelectorAll('.yr-toggle'));
    const btnAll = document.getElementById('yr-all');
    const btnNone = document.getElementById('yr-none');
    const btnLatest = document.getElementById('yr-latest');
    const wrap = document.querySelector('.logframe-wrap');
    const z1 = document.getElementById('zoom-1x');
    const z15 = document.getElementById('zoom-15x');
    const z3 = document.getElementById('zoom-3x');
    const emph = document.getElementById('toggle-emph');

    const render = () => {
      const visible = new Set(
        checkboxes.filter(cb => cb.checked).map(cb => Number(cb.getAttribute('data-year-idx')))
      );
      document.querySelectorAll('[data-year-idx]').forEach(el => {
        const i = Number(el.getAttribute('data-year-idx'));
        el.style.display = visible.size === 0 ? 'none' : (visible.has(i) ? '' : 'none');
      });
    };

    checkboxes.forEach(cb => cb.addEventListener('change', render));
    btnAll?.addEventListener('click', () => { checkboxes.forEach(cb => cb.checked = true); render(); });
    btnNone?.addEventListener('click', () => { checkboxes.forEach(cb => cb.checked = false); render(); });
    btnLatest?.addEventListener('click', () => {
      checkboxes.forEach((cb, i) => cb.checked = (i === checkboxes.length - 1));
      render();
    });

    const setActive = (btn) => {
      [z1,z15,z3].forEach(b => b?.classList.remove('active'));
      btn?.classList.add('active');
    };
    z1?.addEventListener('click', () => { wrap.classList.remove('zoom15x','zoom3x'); setActive(z1); });
    z15?.addEventListener('click', () => { wrap.classList.add('zoom15x'); wrap.classList.remove('zoom3x'); setActive(z15); });
    z3?.addEventListener('click', () => { wrap.classList.add('zoom3x'); wrap.classList.remove('zoom15x'); setActive(z3); });
    emph?.addEventListener('click', () => { wrap.classList.toggle('emph'); emph.classList.toggle('active'); });

    // Default: show latest year only
    checkboxes.forEach((cb, i) => cb.checked = (i === checkboxes.length - 1));
    render();
  })();

  // Edit and Add section functions
  function editSection(type, id) {
    alert(`Edit ${type} ${id} - This will open an edit form for the selected section.`);
    // TODO: Implement edit functionality
    // Example: window.location.href = `/logframe/project-goal/${type}/edit/${id}`;
  }

  function addSection(type) {
    alert(`Add new ${type} - This will open a form to add a new ${type} section.`);
    // TODO: Implement add functionality
    // Example: window.location.href = `/logframe/project-goal/${type}/create`;
  }
  </script>
</div>
@endsection




