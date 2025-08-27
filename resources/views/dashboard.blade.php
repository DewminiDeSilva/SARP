<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>EOI Beneficiaries</title>

  <!-- Bootstrap + Font Awesome -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <style>
    /* Modern Flat Design Variables */
    :root {
      --primary-color: #2563eb;
      --secondary-color: #10b981;
      --accent-color: #f59e0b;
      --danger-color: #ef4444;
      --success-color: #10b981;
      --warning-color: #f59e0b;
      --info-color: #3b82f6;
      
      --bg-color: #f8fafc;
      --panel-color: #ffffff;
      --text-primary: #1e293b;
      --text-secondary: #64748b;
      --text-muted: #94a3b8;
      
      --border-color: #e2e8f0;
      --border-light: #f1f5f9;
      
      --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
      
      --radius-sm: 6px;
      --radius-md: 8px;
      --radius-lg: 12px;
      --radius-xl: 16px;
      
      --spacing-xs: 4px;
      --spacing-sm: 8px;
      --spacing-md: 16px;
      --spacing-lg: 24px;
      --spacing-xl: 32px;
      
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    /* Home Button Styles */
    .home-button-container {
      margin-bottom: var(--spacing-lg);
    }

    .home-btn {
      background: #059669;
      color: white;
      padding: 10px 20px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: 500;
      transition: background-color 0.3s ease;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      display: inline-block;
    }

    .home-btn:hover {
      background: #059669;
      color: white;
      text-decoration: none;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    * {
      box-sizing: border-box;
    }

    body {
      background: var(--bg-color);
      color: var(--text-primary);
      font-family: 'Inter', sans-serif;
      font-weight: 400;
      line-height: 1.6;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    /* Main Content Area */
    .main-content-area {
      margin-top: 100px;
      margin-left: 0;
      padding: var(--spacing-xl);
      background: var(--bg-color);
      min-height: calc(100vh - 100px);
    }

    .right-column {
      width: 100%;
    }

    /* Cards Grid */
    .cards-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: var(--spacing-md);
      margin-bottom: var(--spacing-lg);
    }

    .card {
      background: var(--panel-color);
      border-radius: var(--radius-md);
      padding: var(--spacing-lg);
      border: 1px solid var(--border-color);
      box-shadow: var(--shadow-sm);
      transition: all 0.2s ease;
      min-height: 120px;
    }

    .card:hover {
      box-shadow: var(--shadow-md);
      transform: translateY(-2px);
    }

    .card-header {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: var(--spacing-md);
    }

    .card-title {
      font-size: 0.8rem;
      font-weight: 500;
      color: var(--text-secondary);
      line-height: 1.3;
      margin: 0 0 var(--spacing-xs) 0;
    }

    .card-badge {
      background: var(--success-color);
      color: white;
      padding: var(--spacing-xs);
      border-radius: 50%;
      font-size: 0.7rem;
      font-weight: 600;
      min-width: 20px;
      height: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .card-value {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--text-primary);
      margin: 0;
    }

    /* Wide Card */
    .card-wide {
      grid-column: span 2;
    }

    /* Chart Card */
    .card-chart {
      grid-column: span 4;
      text-align: center;
    }

    .form-group {
      margin-bottom: var(--spacing-md);
    }

    .form-label {
      display: block;
      font-size: 0.875rem;
      font-weight: 500;
      color: var(--text-secondary);
      margin-bottom: var(--spacing-sm);
    }

    .form-select {
      width: 100%;
      padding: var(--spacing-md);
      border: 1px solid var(--border-color);
      border-radius: var(--radius-md);
      background: var(--panel-color);
      font-size: 0.875rem;
      color: var(--text-primary);
      transition: border-color 0.2s ease;
    }

    .form-select:focus {
      outline: none;
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .btn {
      padding: var(--spacing-sm) var(--spacing-md);
      border: none;
      border-radius: var(--radius-md);
      font-size: 0.875rem;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.2s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: var(--spacing-xs);
    }

    .btn-primary {
      background: var(--primary-color);
      color: white;
    }

    .btn-primary:hover {
      background: #1d4ed8;
      transform: translateY(-1px);
    }

    .btn-secondary {
      background: var(--text-secondary);
      color: white;
    }

    .btn-secondary:hover {
      background: #475569;
    }

    .btn-success {
      background: var(--success-color);
      color: white;
    }

    .btn-success:hover {
      background: #059669;
    }

    .btn-outline {
      background: transparent;
      border: 1px solid var(--border-color);
      color: var(--text-secondary);
    }

    .btn-outline:hover {
      background: var(--border-light);
      color: var(--text-primary);
    }

    .btn-sm {
      padding: var(--spacing-xs) var(--spacing-sm);
      font-size: 0.75rem;
    }

    /* Chart Section */
    .chart-section {
      background: var(--panel-color);
      border-radius: var(--radius-md);
      padding: var(--spacing-lg);
      border: 1px solid var(--border-color);
      box-shadow: var(--shadow-sm);
      margin-top: var(--spacing-lg);
      max-width: 800px;
      margin-left: auto;
      margin-right: auto;
    }

    .chart-title {
      font-size: 1rem;
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: var(--spacing-md);
      text-align: center;
    }

    .chart-container {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: var(--spacing-lg);
      flex-wrap: wrap;
    }

    .chart-wrap {
      width: 200px;
      height: 200px;
      position: relative;
      flex-shrink: 0;
    }

    .chart-wrap canvas {
      width: 100% !important;
      height: 100% !important;
    }

    #donut-center {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      pointer-events: none;
    }

    #donut-center .big {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--text-primary);
      line-height: 1;
    }

    #donut-center .small {
      font-size: 0.75rem;
      color: var(--text-secondary);
      margin-top: var(--spacing-xs);
    }

    .chart-legend {
      flex: 1;
      min-width: 200px;
    }

    .legend-list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      gap: var(--spacing-sm);
    }

    .legend-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: var(--spacing-xs) var(--spacing-sm);
      background: var(--border-light);
      border-radius: var(--radius-sm);
      border: 1px solid var(--border-color);
      margin-bottom: var(--spacing-xs);
    }

    .legend-left {
      display: flex;
      align-items: center;
      gap: var(--spacing-sm);
    }

    .legend-swatch {
      width: 12px;
      height: 12px;
      border-radius: var(--radius-sm);
      flex-shrink: 0;
    }

    .legend-label {
      font-weight: 500;
      color: var(--text-primary);
    }

    .legend-value {
      font-weight: 600;
      color: var(--text-primary);
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
      .cards-grid {
        grid-template-columns: repeat(2, 1fr);
      }
      
      .card-wide {
        grid-column: span 1;
      }
    }

    @media (max-width: 768px) {
      .main-content-area {
        margin-left: 0;
        padding: var(--spacing-md);
      }
      
      .right-column {
        width: 100%;
      }
      
      .cards-grid {
        grid-template-columns: 1fr;
      }
      
      .chart-container {
        flex-direction: column;
        align-items: center;
      }
      
      .chart-wrap {
        width: 250px;
        height: 250px;
      }
    }

    /* Utility Classes */
    .d-flex {
      display: flex;
    }

    .flex-column {
      flex-direction: column;
    }

    .align-items-center {
      align-items: center;
    }

    .justify-content-between {
      justify-content: space-between;
    }

    .gap-2 {
      gap: var(--spacing-sm);
    }

    .gap-3 {
      gap: var(--spacing-md);
    }

    .text-center {
      text-align: center;
    }

    .mb-0 {
      margin-bottom: 0;
    }

    .mt-3 {
      margin-top: var(--spacing-md);
    }
  </style>
</head>
<body>

  @include('dashboard.header')

 

  <div class="main-content-area">
     
    @csrf

    <div class="right-column">
      <!-- Home Button Container -->
  <div class="home-button-container">
    <a href="{{ route('beneficiary.index') }}" class="home-btn">Home</a>
  </div>
      <!-- Data Cards -->
      <div class="cards-grid">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">1.A Estimated corresponding Total Number of Household members</h3>
            <div class="card-badge">1.A</div>
          </div>
          <p class="card-value">{{ $householdMembers ?? '—' }}</p>
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">1.B Corresponding Number of households reached</h3>
            <div class="card-badge">1.B</div>
          </div>
          <p class="card-value">{{ $householdsReached ?? '—' }}</p>
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Persons Receiving Services Promoted or Supported by the Project</h3>
            <div class="card-badge">
              <i class="fas fa-hand-holding-heart"></i>
            </div>
          </div>
          <p class="card-value">{{ $personsReceivingServices ?? '—' }}</p>
        </div>

        <!-- Tank Selection Card -->
        <div class="card card-wide" id="tank-selection-card" style="display: none;">
          <div class="card-header">
            <h3 class="card-title">Tank selection / Summary</h3>
            <div class="card-badge">Tanks</div>
          </div>
          
          <div class="form-group">
            <label for="tank_id" class="form-label">Select Tank</label>
            <select name="tank_id" id="tank_id" class="form-select">
              <option value="">-- Choose tank --</option>
              @foreach($tanks ?? collect() as $tank)
                <option value="{{ $tank->id }}">{{ $tank->tank_name }}</option>
              @endforeach
            </select>
          </div>

          
        </div>

        <!-- Quick Actions Card -->
        
          
          

        <!-- Module Selection Card -->
        <div class="card card-wide">
          <div class="card-header">
            <h3 class="card-title">Module Selection</h3>
            <div class="card-badge">Modules</div>
          </div>
          
          <div class="form-group">
            <label for="module_id" class="form-label">Select Module</label>
            <select name="module_id" id="module_id" class="form-select">
              <option value="">-- Choose module --</option>
              @foreach($modules ?? [] as $module)
                <option value="{{ $module }}">{{ $moduleLabels[$module] ?? ucfirst(str_replace('_', ' ', $module)) }}</option>
              @endforeach
            </select>
          </div>

          <div class="d-flex gap-3 mt-3">
            <button class="btn btn-outline btn-sm">View Module</button>
            <button class="btn btn-success btn-sm">Generate Report</button>
          </div>
        </div>
      </div>

      <!-- Chart Section -->
      <div class="chart-section" id="tank-chart-section">
        <h2 class="chart-title">Tank Status Summary</h2>
        
        <div class="chart-container">
          <div class="chart-wrap">
            <canvas id="tankDonut"></canvas>
            <div id="donut-center">
              <div class="big">{{ $totalTanks ?? 0 }}</div>
              <div class="small">Total Tanks</div>
            </div>
          </div>

          <div class="chart-legend">
            <ul class="legend-list">
              <li class="legend-item">
                <div class="legend-left">
                  <span class="legend-swatch" style="background: #ef4444;"></span>
                  <span class="legend-label">Completed</span>
                </div>
                <span class="legend-value">{{ $completedCount ?? 0 }}</span>
              </li>
              <li class="legend-item">
                <div class="legend-left">
                  <span class="legend-swatch" style="background: #f59e0b;"></span>
                  <span class="legend-label">Ongoing</span>
                </div>
                <span class="legend-value">{{ $ongoingCount ?? 0 }}</span>
              </li>
              <li class="legend-item">
                <div class="legend-left">
                  <span class="legend-swatch" style="background: #3b82f6;"></span>
                  <span class="legend-label">Started</span>
                </div>
                <span class="legend-value">{{ $startedCount ?? 0 }}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Module Summary Section (Default) -->
      <div class="chart-section" id="module-summary-section">
        <h2 class="chart-title">Module Summary</h2>
        <div class="text-center">
          <p class="text-muted">Select a module from the dropdown above to view its summary</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    (function(){
      const completed = Number(@json($completedCount ?? 0));
      const ongoing   = Number(@json($ongoingCount ?? 0));
      const started   = Number(@json($startedCount ?? 0));
      const total     = Number(@json($totalTanks ?? (completed + ongoing + started)));

      const data = [completed, ongoing, started];
      const labels = ['Completed','Ongoing','Started'];
      const colors = ['#ef4444','#f59e0b','#3b82f6'];

      const ctx = document.getElementById('tankDonut').getContext('2d');
      const centerEl = document.getElementById('donut-center');

      function setCenter(title, count, pct){
        if (pct === null) {
          centerEl.innerHTML = `<div class="big">${count}</div><div class="small">${title}</div>`;
        } else {
          centerEl.innerHTML = `<div class="big">${count}</div><div class="small">${title} · ${pct.toFixed(1)}%</div>`;
        }
      }

      setCenter('Total Tanks', total, null);

      const sum = data.reduce((s,x)=>s + Number(x), 0);
      const chartData = sum > 0 ? data : [1];
      const chartLabels = sum > 0 ? labels : ['No data'];
      const chartColors = sum > 0 ? colors : ['#e5e7eb'];

      const donut = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: chartLabels,
          datasets: [{ 
            data: chartData, 
            backgroundColor: chartColors, 
            borderColor: '#ffffff', 
            borderWidth: 3 
          }]
        },
        options: {
          cutout: '70%',
          plugins: { 
            legend: { display: false }, 
            tooltip: { enabled: sum > 0 } 
          },
          onClick(evt, items) {
            if (!items.length) { 
              setCenter('Total Tanks', total, null); 
              return; 
            }
            const idx = items[0].index;
            const val = this.data.datasets[0].data[idx] || 0;
            const pct = total ? (val/total*100) : 0;
            setCenter(this.data.labels[idx], val, pct);
          }
        }
      });

      // Module selection functionality
      const moduleSelect = document.getElementById('module_id');
      const tankSelectionCard = document.getElementById('tank-selection-card');
      const tankChartSection = document.getElementById('tank-chart-section');
      const moduleSummarySection = document.getElementById('module-summary-section');

      // Initially hide tank chart and show module summary
      tankChartSection.style.display = 'none';
      moduleSummarySection.style.display = 'block';

      moduleSelect.addEventListener('change', function() {
        const selectedModule = this.value;
        
        if (selectedModule === 'tank_rehabilitation') {
          // Show tank rehabilitation specific content
          tankSelectionCard.style.display = 'block';
          tankChartSection.style.display = 'block';
          moduleSummarySection.style.display = 'none';
        } else if (selectedModule) {
          // Show module summary for other modules
          tankSelectionCard.style.display = 'none';
          tankChartSection.style.display = 'none';
          moduleSummarySection.style.display = 'block';
          
          // Update module summary content
          const moduleLabels = @json($moduleLabels ?? []);
          const moduleName = moduleLabels[selectedModule] || selectedModule.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
          moduleSummarySection.querySelector('.chart-title').textContent = `${moduleName} Summary`;
          moduleSummarySection.querySelector('.text-muted').textContent = `Summary for ${moduleName} module will be displayed here.`;
        } else {
          // No module selected - show default state
          tankSelectionCard.style.display = 'none';
          tankChartSection.style.display = 'none';
          moduleSummarySection.style.display = 'block';
          moduleSummarySection.querySelector('.chart-title').textContent = 'Module Summary';
          moduleSummarySection.querySelector('.text-muted').textContent = 'Select a module from the dropdown above to view its summary';
        }
      });
    })();
  </script>
</body>
</html>
