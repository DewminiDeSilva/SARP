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
    /* Professional Dashboard Design Variables */
    :root {
      --primary-color: #5C3E9E;
      --secondary-color: #4CAF50;
      --accent-color: #FF9800;
      --danger-color: #ea4335;
      --success-color: #4CAF50;
      --warning-color: #fbbc05;
      --info-color: #2196F3;
      --purple-color: #9C27B0;
      --teal-color: #00BCD4;
      
      --bg-color: #F0F2F8;
      --panel-color: #ffffff;
      --text-primary: #212529;
      --text-secondary: #6c757d;
      --text-muted: #adb5bd;
      
      --border-color: #e9ecef;
      --border-light: #f8f9fa;
      
      --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
      --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.07), 0 1px 3px rgba(0, 0, 0, 0.06);
      --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.05);
      --shadow-xl: 0 20px 25px rgba(0, 0, 0, 0.1), 0 10px 10px rgba(0, 0, 0, 0.04);
      
      --radius-sm: 8px;
      --radius-md: 12px;
      --radius-lg: 16px;
      --radius-xl: 20px;
      
      --spacing-xs: 6px;
      --spacing-sm: 12px;
      --spacing-md: 20px;
      --spacing-lg: 28px;
      --spacing-xl: 36px;
      --spacing-2xl: 48px;
      
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
      padding: var(--spacing-2xl);
      background: var(--bg-color);
      min-height: calc(100vh - 100px);
    }

    .right-column {
      width: 100%;
    }

    /* Cards Grid */
    .cards-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: var(--spacing-lg);
      margin-bottom: var(--spacing-xl);
    }

    /* KPI Cards Grid - 6 cards in 2x3 layout for better spacing */
    #tank-kpi-section .cards-grid {
      grid-template-columns: repeat(3, 1fr);
      grid-template-rows: repeat(2, auto);
      gap: var(--spacing-xl);
    }

    .card {
      background: var(--panel-color);
      border-radius: var(--radius-sm);
      padding: var(--spacing-xl);
      border: none;
      box-shadow: var(--shadow-sm);
      transition: all 0.3s ease;
      min-height: 180px;
      position: relative;
      overflow: hidden;
    }

    .card:hover {
      box-shadow: var(--shadow-lg);
      transform: translateY(-2px);
    }

    .card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 6px;
      background: var(--success-color);
    }

    /* Card-specific top border colors */
    .card:nth-child(1)::before { background: var(--success-color); }
    .card:nth-child(2)::before { background: var(--warning-color); }
    .card:nth-child(3)::before { background: var(--success-color); }
    .card:nth-child(4)::before { background: var(--info-color); }
    .card:nth-child(5)::before { background: var(--purple-color); }
    .card:nth-child(6)::before { background: var(--teal-color); }

    .card-header {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: var(--spacing-lg);
    }

    .card-title {
      font-size: 0.75rem;
      font-weight: 600;
      color: var(--text-secondary);
      line-height: 1.2;
      margin: 0 0 var(--spacing-sm) 0;
      text-transform: uppercase;
      letter-spacing: 0.8px;
    }

    .card-badge {
      background: var(--success-color);
      color: white;
      padding: var(--spacing-sm);
      border-radius: 50%;
      font-size: 1rem;
      font-weight: 600;
      min-width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      box-shadow: var(--shadow-sm);
    }

    /* Card-specific badge colors */
    .card:nth-child(1) .card-badge { background: var(--success-color); }
    .card:nth-child(2) .card-badge { background: var(--warning-color); }
    .card:nth-child(3) .card-badge { background: var(--success-color); }
    .card:nth-child(4) .card-badge { background: var(--info-color); }
    .card:nth-child(5) .card-badge { background: var(--purple-color); }
    .card:nth-child(6) .card-badge { background: var(--teal-color); }

    .card-value {
      font-size: 2.25rem;
      font-weight: 700;
      color: var(--text-primary);
      margin: 0 0 var(--spacing-sm) 0;
      line-height: 1.1;
    }

    .card-subtitle {
      font-size: 0.875rem;
      color: var(--text-secondary);
      margin: 0;
      font-weight: 500;
    }

    .card-progress {
      margin-top: var(--spacing-sm);
    }

    .progress-bar-horizontal {
      width: 100%;
      height: 6px;
      background: var(--border-light);
      border-radius: 3px;
      overflow: hidden;
      margin-bottom: var(--spacing-xs);
    }

    .progress-fill-horizontal {
      height: 100%;
      background: var(--info-color);
      border-radius: 3px;
      transition: width 0.3s ease;
    }

    .budget-details {
      font-size: 0.75rem;
      color: var(--text-secondary);
      margin-top: var(--spacing-sm);
      line-height: 1.4;
    }

    .data-unavailable {
      display: inline-block;
      background: var(--border-light);
      color: var(--text-muted);
      padding: var(--spacing-sm) var(--spacing-md);
      border-radius: var(--radius-sm);
      font-size: 0.75rem;
      font-weight: 500;
      margin-top: var(--spacing-sm);
      border: 1px solid var(--border-color);
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
      padding: var(--spacing-2xl);
      border: none;
      box-shadow: var(--shadow-md);
      margin-top: var(--spacing-2xl);
      max-width: 1200px;
      margin-left: auto;
      margin-right: auto;
    }

    .chart-title {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--primary-color);
      margin-bottom: var(--spacing-md);
      text-align: center;
      position: relative;
    }

    .chart-subtitle {
      font-size: 1rem;
      color: var(--text-secondary);
      text-align: center;
      margin-bottom: var(--spacing-xl);
      font-weight: 400;
    }

    .chart-container {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: var(--spacing-2xl);
      flex-wrap: wrap;
      margin-top: var(--spacing-lg);
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
      padding: var(--spacing-md);
      background: var(--panel-color);
      border-radius: var(--radius-sm);
      border: 1px solid var(--border-color);
      margin-bottom: var(--spacing-sm);
      box-shadow: var(--shadow-sm);
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
      
      #tank-kpi-section .cards-grid {
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(3, auto);
      }
      
      .card-wide {
        grid-column: span 1;
      }
    }

    @media (max-width: 768px) {
      .main-content-area {
        margin-left: 0;
        padding: var(--spacing-lg);
      }
      
      .right-column {
        width: 100%;
      }
      
      .cards-grid {
        grid-template-columns: 1fr;
      }
      
      #tank-kpi-section .cards-grid {
        grid-template-columns: 1fr;
        grid-template-rows: repeat(6, auto);
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

      <!-- Tank Rehabilitation KPI Cards Section -->
      <div class="chart-section" id="tank-kpi-section" style="display: none;">
        <h2 class="chart-title">Tank Rehabilitation KPIs</h2>
        <p class="chart-subtitle">Real-time monitoring and performance metrics</p>
        
        <div class="cards-grid">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Tanks</h3>
              <div class="card-badge">
                <i class="fas fa-water"></i>
              </div>
            </div>
            <p class="card-value">{{ $tankRehabKPIs['total_tanks'] ?? 0 }}</p>
            <p class="card-subtitle">Infrastructure projects</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Ongoing</h3>
              <div class="card-badge" style="background: #f59e0b;">
                <i class="fas fa-tools"></i>
              </div>
            </div>
            <p class="card-value">{{ $tankRehabKPIs['ongoing'] ?? 0 }}</p>
            <p class="card-subtitle">Active rehabilitation</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Completed</h3>
              <div class="card-badge" style="background: #10b981;">
                <i class="fas fa-check-circle"></i>
              </div>
            </div>
            <p class="card-value">{{ $tankRehabKPIs['completed'] ?? 0 }}</p>
            <p class="card-subtitle">Successfully finished</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Avg. Physical Progress %</h3>
              <div class="card-badge" style="background: #3b82f6;">
                <i class="fas fa-chart-line"></i>
              </div>
            </div>
            <p class="card-value">{{ $tankRehabKPIs['avg_physical_progress'] ?? 0 }}%</p>
            <p class="card-subtitle">Overall completion rate</p>
            <div class="card-progress">
              <div class="progress-bar-horizontal">
                <div class="progress-fill-horizontal" style="width: {{ $tankRehabKPIs['avg_physical_progress'] ?? 0 }}%"></div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Budget vs Spent (Utilization %)</h3>
              <div class="card-badge" style="background: #8b5cf6;">
                <i class="fas fa-coins"></i>
              </div>
            </div>
            <p class="card-value">{{ $tankRehabKPIs['budget_utilization'] ?? 0 }}%</p>
            <p class="card-subtitle">Efficient resource usage</p>
            <div class="budget-details">
              Budget: {{ number_format($tankRehabKPIs['total_budget'] ?? 0, 2) }} | 
              Spent: {{ number_format($tankRehabKPIs['total_spent'] ?? 0, 2) }}
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Irrigated Area (ha)</h3>
              <div class="card-badge" style="background: #059669;">
                <i class="fas fa-map"></i>
              </div>
            </div>
            <p class="card-value">{{ $tankRehabKPIs['irrigated_area'] ?? 0 }} ha</p>
            <p class="card-subtitle">Agricultural coverage</p>
            <div class="data-unavailable">Data not available</div>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Capacity Restored (MCM)</h3>
              <div class="card-badge" style="background: #0891b2;">
                <i class="fas fa-tint"></i>
              </div>
            </div>
            <p class="card-value">{{ $tankRehabKPIs['capacity_restored'] ?? 0 }} MCM</p>
            <p class="card-subtitle">Water storage capacity</p>
            <div class="data-unavailable">Data not available</div>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Beneficiary HHs</h3>
              <div class="card-badge" style="background: #dc2626;">
                <i class="fas fa-users"></i>
              </div>
            </div>
            <p class="card-value">{{ number_format($tankRehabKPIs['beneficiary_hhs'] ?? 0) }}</p>
            <p class="card-subtitle">Households served</p>
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
              <div class="big">{{ $tankRehabKPIs['total_tanks'] ?? 0 }}</div>
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
                <span class="legend-value">{{ $tankRehabKPIs['completed'] ?? 0 }}</span>
              </li>
              <li class="legend-item">
                <div class="legend-left">
                  <span class="legend-swatch" style="background: #f59e0b;"></span>
                  <span class="legend-label">Ongoing</span>
                </div>
                <span class="legend-value">{{ $tankRehabKPIs['ongoing'] ?? 0 }}</span>
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
      // Use tank rehabilitation specific data instead of general tank data
      const completed = Number(@json($tankRehabKPIs['completed'] ?? 0));
      const ongoing   = Number(@json($tankRehabKPIs['ongoing'] ?? 0));
      const started   = Number(@json($startedCount ?? 0));
      const total     = Number(@json($tankRehabKPIs['total_tanks'] ?? 0));

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
      const tankKpiSection = document.getElementById('tank-kpi-section');
      const moduleSummarySection = document.getElementById('module-summary-section');

      // Initially hide tank chart and show module summary
      tankChartSection.style.display = 'none';
      tankKpiSection.style.display = 'none';
      moduleSummarySection.style.display = 'block';

      moduleSelect.addEventListener('change', function() {
        const selectedModule = this.value;
        
        if (selectedModule === 'tank_rehabilitation') {
          // Show tank rehabilitation specific content
          tankSelectionCard.style.display = 'block';
          tankChartSection.style.display = 'block';
          tankKpiSection.style.display = 'block';
          moduleSummarySection.style.display = 'none';
        } else if (selectedModule) {
          // Show module summary for other modules
          tankSelectionCard.style.display = 'none';
          tankChartSection.style.display = 'none';
          tankKpiSection.style.display = 'none';
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
          tankKpiSection.style.display = 'none';
          moduleSummarySection.style.display = 'block';
          moduleSummarySection.querySelector('.chart-title').textContent = 'Module Summary';
          moduleSummarySection.querySelector('.text-muted').textContent = 'Select a module from the dropdown above to view its summary';
        }
      });
    })();
  </script>
</body>
</html>
