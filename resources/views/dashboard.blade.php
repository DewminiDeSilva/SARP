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
    .card-value-label {
  color: #757990;
  font-size: 1rem;
  font-weight: 600;
  margin-top: 11px;
  margin-bottom: 0;
  letter-spacing: 0.02em;
}
.card-value-amount {
  font-size: 2.35rem;
  font-weight: 800;
  margin: 0 0 17px 0;
  line-height: 1;
  letter-spacing: 0.3px;
  font-family: 'Inter', Arial, sans-serif;
}
.card-baseline { color: #316aff; }
.card-midterm { color: #ad43ff; }
.card-endtarget { color: #18b475; }

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
      
      /* Responsive charts grid for beneficiary module */
      .chart-container[style*="grid-template-columns: 1fr 1fr"] {
        grid-template-columns: 1fr !important;
        gap: 1rem !important;
      }

      /* FFS Charts Responsive */
      .ffs-chart-container {
        padding: 1.5rem;
      }

      .ffs-chart-wrapper {
        height: 250px !important;
      }

      .ffs-center-number {
        font-size: 2rem;
      }

      .ffs-center-label {
        font-size: 0.75rem;
      }

      /* FFS Charts Grid Responsive */
      .ffs-chart-container[style*="grid-template-columns: 1fr 1fr"] {
        grid-template-columns: 1fr !important;
        gap: 1rem !important;
      }
    }

    /* FFS Chart Styles */
    .ffs-chart-container {
      background: white;
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
      border: 2px solid #8b5cf6;
      padding: 2rem;
      position: relative;
      overflow: hidden;
    }

    .ffs-chart-container::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, #8b5cf6, #a855f7, #c084fc);
    }

    .ffs-chart-title {
      text-align: center;
      margin-bottom: 2rem;
      color: #1f2937;
      font-size: 1.25rem;
      font-weight: 600;
      letter-spacing: -0.025em;
    }

    .ffs-chart-wrapper {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 300px;
    }

    .ffs-chart-center {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      pointer-events: none;
      z-index: 10;
    }

    .ffs-center-number {
      font-size: 2.5rem;
      font-weight: 700;
      color: #1f2937;
      line-height: 1;
      margin-bottom: 0.25rem;
    }

    .ffs-center-label {
      font-size: 0.875rem;
      color: #6b7280;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    /* FFS Chart Legend Styles */
    .ffs-chart-container .chartjs-legend {
      margin-top: 1.5rem;
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 1rem;
    }

    .ffs-chart-container .chartjs-legend ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 1rem;
    }

    .ffs-chart-container .chartjs-legend li {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.875rem;
      font-weight: 500;
      color: #374151;
    }

    .ffs-chart-container .chartjs-legend li span {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      display: inline-block;
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
    <a href="{{ route('logframe.tanks.index') }}" class="home-btn" style="background:#2563eb;">Logframe</a>
  </div>
      <!-- Data Cards -->
      <div class="cards-grid">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">1.A Estimated corresponding Total Number of Household members</h3>
            <div class="card-badge">1.A</div>
          </div>
          
          <!-- Baseline, Mid-Term, End Target Squares -->
          <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--spacing-sm); margin-bottom: var(--spacing-lg);">
            <div style="background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: var(--spacing-md); text-align: center; box-shadow: var(--shadow-sm);">
              <p class="card-value-label" style="margin-bottom: 8px; font-weight: 600;">Baseline</p>
              <div class="card-value-amount" style="font-size: 1.75rem; font-weight: 700; color: #316aff; margin: 0;">{{ isset($householdMembers) ? number_format($householdMembers->baseline) : '—' }}</div>
              <p style="font-size: 0.65rem; color: var(--text-muted); margin-top: 8px; margin-bottom: 0;">Initial Value</p>
            </div>
            <div style="background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: var(--spacing-md); text-align: center; box-shadow: var(--shadow-sm);">
              <p class="card-value-label" style="margin-bottom: 8px; font-weight: 600;">Mid-Term</p>
              <div class="card-value-amount" style="font-size: 1.75rem; font-weight: 700; color: #ad43ff; margin: 0;">{{ isset($householdMembers) ? number_format($householdMembers->mid_term) : '—' }}</div>
              <p style="font-size: 0.65rem; color: var(--text-muted); margin-top: 8px; margin-bottom: 0;">Mid-Term Target</p>
            </div>
            <div style="background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: var(--spacing-md); text-align: center; box-shadow: var(--shadow-sm);">
              <p class="card-value-label" style="margin-bottom: 8px; font-weight: 600;">End Target</p>
              <div class="card-value-amount" style="font-size: 1.75rem; font-weight: 700; color: #18b475; margin: 0;">{{ isset($householdMembers) ? number_format($householdMembers->end_target) : '—' }}</div>
              <p style="font-size: 0.65rem; color: var(--text-muted); margin-top: 8px; margin-bottom: 0;">Final Target</p>
            </div>
          </div>
          
          <!-- Cumulative and Result Squares -->
          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--spacing-sm); margin-top: var(--spacing-lg);">
            <div style="background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: var(--spacing-md); text-align: center; box-shadow: var(--shadow-sm);">
              <p class="card-value-label" style="margin-bottom: 8px; font-weight: 600;">1. Cumulative</p>
              <div class="card-value-amount" style="font-size: 1.75rem; font-weight: 700; color: var(--primary-color); margin: 0;">{{ isset($householdMembers) && isset($householdMembers->cumulative) ? number_format($householdMembers->cumulative) : '—' }}</div>
              @if(isset($householdMembers) && isset($householdMembers->last_updated_date))
                <p style="font-size: 0.65rem; color: var(--text-muted); margin-top: 8px; margin-bottom: 0;">Last Updated: {{ $householdMembers->last_updated_date }}</p>
              @else
                <p style="font-size: 0.65rem; color: var(--text-muted); margin-top: 8px; margin-bottom: 0;">No update date</p>
              @endif
            </div>
            <div style="background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: var(--spacing-md); text-align: center; box-shadow: var(--shadow-sm);">
              <p class="card-value-label" style="margin-bottom: 8px; font-weight: 600;">2. Result ({{ date('Y') }})</p>
              <div class="card-value-amount" style="font-size: 1.75rem; font-weight: 700; color: var(--success-color); margin: 0;">{{ isset($householdMembers) && isset($householdMembers->current_year_result) ? number_format($householdMembers->current_year_result) : '—' }}</div>
              <p style="font-size: 0.65rem; color: var(--text-muted); margin-top: 8px; margin-bottom: 0;">This Year Value</p>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">1.B Corresponding Number of households reached</h3>
            <div class="card-badge" style="background:#fbbc05;">1.B</div>
          </div>
          
          <!-- Baseline, Mid-Term, End Target Squares -->
          <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--spacing-sm); margin-bottom: var(--spacing-lg);">
            <div style="background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: var(--spacing-md); text-align: center; box-shadow: var(--shadow-sm);">
              <p class="card-value-label" style="margin-bottom: 8px; font-weight: 600;">Baseline</p>
              <div class="card-value-amount" style="font-size: 1.75rem; font-weight: 700; color: #316aff; margin: 0;">{{ isset($householdsReached) ? number_format($householdsReached->baseline) : '—' }}</div>
              <p style="font-size: 0.65rem; color: var(--text-muted); margin-top: 8px; margin-bottom: 0;">Initial Value</p>
            </div>
            <div style="background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: var(--spacing-md); text-align: center; box-shadow: var(--shadow-sm);">
              <p class="card-value-label" style="margin-bottom: 8px; font-weight: 600;">Mid-Term</p>
              <div class="card-value-amount" style="font-size: 1.75rem; font-weight: 700; color: #ad43ff; margin: 0;">{{ isset($householdsReached) ? number_format($householdsReached->mid_term) : '—' }}</div>
              <p style="font-size: 0.65rem; color: var(--text-muted); margin-top: 8px; margin-bottom: 0;">Mid-Term Target</p>
            </div>
            <div style="background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: var(--spacing-md); text-align: center; box-shadow: var(--shadow-sm);">
              <p class="card-value-label" style="margin-bottom: 8px; font-weight: 600;">End Target</p>
              <div class="card-value-amount" style="font-size: 1.75rem; font-weight: 700; color: #18b475; margin: 0;">{{ isset($householdsReached) ? number_format($householdsReached->end_target) : '—' }}</div>
              <p style="font-size: 0.65rem; color: var(--text-muted); margin-top: 8px; margin-bottom: 0;">Final Target</p>
            </div>
          </div>
          
          <!-- Cumulative and Result Squares -->
          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--spacing-sm); margin-top: var(--spacing-lg);">
            <div style="background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: var(--spacing-md); text-align: center; box-shadow: var(--shadow-sm);">
              <p class="card-value-label" style="margin-bottom: 8px; font-weight: 600;">1. Cumulative</p>
              <div class="card-value-amount" style="font-size: 1.75rem; font-weight: 700; color: var(--primary-color); margin: 0;">{{ isset($householdsReached) && isset($householdsReached->cumulative) ? number_format($householdsReached->cumulative) : '—' }}</div>
              @if(isset($householdsReached) && isset($householdsReached->last_updated_date))
                <p style="font-size: 0.65rem; color: var(--text-muted); margin-top: 8px; margin-bottom: 0;">Last Updated: {{ $householdsReached->last_updated_date }}</p>
              @else
                <p style="font-size: 0.65rem; color: var(--text-muted); margin-top: 8px; margin-bottom: 0;">No update date</p>
              @endif
            </div>
            <div style="background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: var(--spacing-md); text-align: center; box-shadow: var(--shadow-sm);">
              <p class="card-value-label" style="margin-bottom: 8px; font-weight: 600;">2. Result ({{ date('Y') }})</p>
              <div class="card-value-amount" style="font-size: 1.75rem; font-weight: 700; color: var(--success-color); margin: 0;">{{ isset($householdsReached) && isset($householdsReached->current_year_result) ? number_format($householdsReached->current_year_result) : '—' }}</div>
              <p style="font-size: 0.65rem; color: var(--text-muted); margin-top: 8px; margin-bottom: 0;">This Year Value</p>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Persons Receiving Services Promoted or Supported by the Project</h3>
            <div class="card-badge" style="background:#18b475;"><i class="fas fa-hand-holding-heart"></i></div>
          </div>
          
          <!-- Baseline, Mid-Term, End Target Squares -->
          <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--spacing-sm); margin-bottom: var(--spacing-lg);">
            <div style="background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: var(--spacing-md); text-align: center; box-shadow: var(--shadow-sm);">
              <p class="card-value-label" style="margin-bottom: 8px; font-weight: 600;">Baseline</p>
              <div class="card-value-amount" style="font-size: 1.75rem; font-weight: 700; color: #316aff; margin: 0;">{{ isset($personsReceivingServices) ? number_format($personsReceivingServices->baseline) : '—' }}</div>
              <p style="font-size: 0.65rem; color: var(--text-muted); margin-top: 8px; margin-bottom: 0;">Initial Value</p>
            </div>
            <div style="background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: var(--spacing-md); text-align: center; box-shadow: var(--shadow-sm);">
              <p class="card-value-label" style="margin-bottom: 8px; font-weight: 600;">Mid-Term</p>
              <div class="card-value-amount" style="font-size: 1.75rem; font-weight: 700; color: #ad43ff; margin: 0;">{{ isset($personsReceivingServices) ? number_format($personsReceivingServices->mid_term) : '—' }}</div>
              <p style="font-size: 0.65rem; color: var(--text-muted); margin-top: 8px; margin-bottom: 0;">Mid-Term Target</p>
            </div>
            <div style="background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: var(--spacing-md); text-align: center; box-shadow: var(--shadow-sm);">
              <p class="card-value-label" style="margin-bottom: 8px; font-weight: 600;">End Target</p>
              <div class="card-value-amount" style="font-size: 1.75rem; font-weight: 700; color: #18b475; margin: 0;">{{ isset($personsReceivingServices) ? number_format($personsReceivingServices->end_target) : '—' }}</div>
              <p style="font-size: 0.65rem; color: var(--text-muted); margin-top: 8px; margin-bottom: 0;">Final Target</p>
            </div>
          </div>
          
          <!-- Cumulative and Result Squares -->
          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--spacing-sm); margin-top: var(--spacing-lg);">
            <div style="background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: var(--spacing-md); text-align: center; box-shadow: var(--shadow-sm);">
              <p class="card-value-label" style="margin-bottom: 8px; font-weight: 600;">1. Cumulative</p>
              <div class="card-value-amount" style="font-size: 1.75rem; font-weight: 700; color: var(--primary-color); margin: 0;">{{ isset($personsReceivingServices) && isset($personsReceivingServices->cumulative) ? number_format($personsReceivingServices->cumulative) : '—' }}</div>
              @if(isset($personsReceivingServices) && isset($personsReceivingServices->last_updated_date))
                <p style="font-size: 0.65rem; color: var(--text-muted); margin-top: 8px; margin-bottom: 0;">Last Updated: {{ $personsReceivingServices->last_updated_date }}</p>
              @else
                <p style="font-size: 0.65rem; color: var(--text-muted); margin-top: 8px; margin-bottom: 0;">No update date</p>
              @endif
            </div>
            <div style="background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: var(--spacing-md); text-align: center; box-shadow: var(--shadow-sm);">
              <p class="card-value-label" style="margin-bottom: 8px; font-weight: 600;">2. Result ({{ date('Y') }})</p>
              <div class="card-value-amount" style="font-size: 1.75rem; font-weight: 700; color: var(--success-color); margin: 0;">{{ isset($personsReceivingServices) && isset($personsReceivingServices->current_year_result) ? number_format($personsReceivingServices->current_year_result) : '—' }}</div>
              <p style="font-size: 0.65rem; color: var(--text-muted); margin-top: 8px; margin-bottom: 0;">This Year Value</p>
            </div>
          </div>
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
  <option value="beneficiary">Beneficiary</option>
  <option value="tank_rehabilitation">Tank Rehabilitation</option>
  <option value="infrastructure">Infrastructure Development</option>
  <option value="social_inclusion_and_gender">Social Inclusion & Gender</option>
  <option value="resilience_projects">Resilience Projects</option>
  <option value="youth_enterprises">Youth Enterprises</option>
  <option value="4p_agri_business">4P Agri Business Projects</option>
  <option value="agro_enterprise">Agro Enterprise</option>
  <option value="nrm">Natural Resource Management (NRM)</option>
  <option value="ffs">Farmer Field Schools (FFS)</option>
  <option value="nutrition_training">Nutrition Training Program</option>
  <option value="project_documents">Project Documents</option>
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

      <!-- Beneficiary Summary Section -->
      <div class="chart-section" id="beneficiary-summary-section" style="display: none;">
        <h2 class="chart-title">Beneficiary Summary</h2>
        <p class="chart-subtitle">Comprehensive overview of beneficiary data and demographics</p>
        
        <!-- Beneficiary KPI Cards -->
        <div class="cards-grid" style="margin-bottom: 2rem;">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Beneficiaries</h3>
              <div class="card-badge">
                <i class="fas fa-users"></i>
              </div>
            </div>
            <p class="card-value">{{ $beneficiaryStats['total_beneficiaries'] ?? 0 }}</p>
            <p class="card-subtitle">Registered beneficiaries</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Male Beneficiaries</h3>
              <div class="card-badge" style="background: #3b82f6;">
                <i class="fas fa-male"></i>
              </div>
            </div>
            <p class="card-value">{{ $beneficiaryStats['male_count'] ?? 0 }}</p>
            <p class="card-subtitle">{{ $beneficiaryStats['total_beneficiaries'] > 0 ? round(($beneficiaryStats['male_count'] / $beneficiaryStats['total_beneficiaries']) * 100, 1) : 0 }}% of total</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Female Beneficiaries</h3>
              <div class="card-badge" style="background: #ec4899;">
                <i class="fas fa-female"></i>
              </div>
            </div>
            <p class="card-value">{{ $beneficiaryStats['female_count'] ?? 0 }}</p>
            <p class="card-subtitle">{{ $beneficiaryStats['total_beneficiaries'] > 0 ? round(($beneficiaryStats['female_count'] / $beneficiaryStats['total_beneficiaries']) * 100, 1) : 0 }}% of total</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Youth (Under 30)</h3>
              <div class="card-badge" style="background: #10b981;">
                <i class="fas fa-child"></i>
              </div>
            </div>
            <p class="card-value">{{ $beneficiaryStats['youth_count'] ?? 0 }}</p>
            <p class="card-subtitle">Young beneficiaries</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Household Members</h3>
              <div class="card-badge" style="background: #8b5cf6;">
                <i class="fas fa-home"></i>
              </div>
            </div>
            <p class="card-value">{{ number_format($beneficiaryStats['total_household_members'] ?? 0) }}</p>
            <p class="card-subtitle">Including family members</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Average Family Size</h3>
              <div class="card-badge" style="background: #f59e0b;">
                <i class="fas fa-chart-bar"></i>
              </div>
            </div>
            <p class="card-value">{{ $beneficiaryStats['avg_family_size'] ?? 0 }}</p>
            <p class="card-subtitle">Members per household</p>
          </div>
        </div>

        <!-- Charts Section -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 2rem;">
          <!-- Gender Distribution Chart -->
          <div class="chart-container" style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); border: 1px solid #f1f5f9; border-top: 4px solid #3b82f6; padding: 1.5rem;">
            <h3 style="text-align: center; margin-bottom: 1.5rem; color: #1f2937; font-size: 1.25rem; font-weight: 600;">Gender Distribution</h3>
            <div class="chart-wrap" style="position: relative; display: flex; justify-content: center; align-items: center;">
              <canvas id="beneficiaryGenderChart"></canvas>
              <div id="beneficiary-gender-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                <div style="font-size: 2rem; font-weight: 700; color: #1f2937; line-height: 1;">{{ number_format($beneficiaryStats['total_beneficiaries'] ?? 0) }}</div>
                <div style="font-size: 0.875rem; color: #6b7280; font-weight: 500; margin-top: 0.25rem;">Total Beneficiaries</div>
              </div>
            </div>

            <div class="chart-legend" style="margin-top: 1.5rem;">
              <div class="legend-item" style="display: flex; align-items: center; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid #f3f4f6;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                  <div style="width: 12px; height: 12px; border-radius: 50%; background: #3b82f6;"></div>
                  <span style="color: #374151; font-weight: 500;">Male</span>
                </div>
                <span style="color: #6b7280; font-weight: 600;">{{ number_format($beneficiaryStats['male_count'] ?? 0) }}</span>
              </div>
              <div class="legend-item" style="display: flex; align-items: center; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid #f3f4f6;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                  <div style="width: 12px; height: 12px; border-radius: 50%; background: #ec4899;"></div>
                  <span style="color: #374151; font-weight: 500;">Female</span>
                </div>
                <span style="color: #6b7280; font-weight: 600;">{{ number_format($beneficiaryStats['female_count'] ?? 0) }}</span>
              </div>
              @if(($beneficiaryStats['other_gender_count'] ?? 0) > 0)
              <div class="legend-item" style="display: flex; align-items: center; justify-content: space-between; padding: 0.5rem 0;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                  <div style="width: 12px; height: 12px; border-radius: 50%; background: #6b7280;"></div>
                  <span style="color: #374151; font-weight: 500;">Other</span>
                </div>
                <span style="color: #6b7280; font-weight: 600;">{{ number_format($beneficiaryStats['other_gender_count'] ?? 0) }}</span>
              </div>
              @endif
            </div>
          </div>

          <!-- Project Type Distribution Chart -->
          <div class="chart-container" style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); border: 1px solid #f1f5f9; border-top: 4px solid #10b981; padding: 1.5rem;">
            <h3 style="text-align: center; margin-bottom: 1.5rem; color: #1f2937; font-size: 1.25rem; font-weight: 600;">Project Type Distribution</h3>
            <div class="chart-wrap" style="position: relative; display: flex; justify-content: center; align-items: center;">
              <canvas id="beneficiaryProjectTypeChart"></canvas>
              <div id="beneficiary-project-type-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                <div style="font-size: 2rem; font-weight: 700; color: #1f2937; line-height: 1;">{{ number_format($projectTypeStats['total_projects'] ?? 0) }}</div>
                <div style="font-size: 0.875rem; color: #6b7280; font-weight: 500; margin-top: 0.25rem;">Total Projects</div>
              </div>
            </div>

            <div class="chart-legend" style="margin-top: 1.5rem;">
              <div class="legend-item" style="display: flex; align-items: center; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid #f3f4f6;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                  <div style="width: 12px; height: 12px; border-radius: 50%; background: #3b82f6;"></div>
                  <span style="color: #374151; font-weight: 500;">Youth Enterprises</span>
                </div>
                <span style="color: #6b7280; font-weight: 600;">{{ number_format($projectTypeStats['youth_count'] ?? 0) }}</span>
              </div>
              <div class="legend-item" style="display: flex; align-items: center; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid #f3f4f6;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                  <div style="width: 12px; height: 12px; border-radius: 50%; background: #10b981;"></div>
                  <span style="color: #374151; font-weight: 500;">Resilience Projects</span>
                </div>
                <span style="color: #6b7280; font-weight: 600;">{{ number_format($projectTypeStats['resilience_count'] ?? 0) }}</span>
              </div>
              <div class="legend-item" style="display: flex; align-items: center; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid #f3f4f6;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                  <div style="width: 12px; height: 12px; border-radius: 50%; background: #f59e0b;"></div>
                  <span style="color: #374151; font-weight: 500;">4P Projects</span>
                </div>
                <span style="color: #6b7280; font-weight: 600;">{{ number_format($projectTypeStats['four_p_count'] ?? 0) }}</span>
              </div>
              <div class="legend-item" style="display: flex; align-items: center; justify-content: space-between; padding: 0.5rem 0;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                  <div style="width: 12px; height: 12px; border-radius: 50%; background: #ec4899;"></div>
                  <span style="color: #374151; font-weight: 500;">Nutrition Programs</span>
                </div>
                <span style="color: #6b7280; font-weight: 600;">{{ number_format($projectTypeStats['nutrition_count'] ?? 0) }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Project Type Summary Section -->
      <div class="chart-section" id="project-type-summary-section" style="display: none;">
        <h2 class="chart-title">Project Type Distribution</h2>
        <p class="chart-subtitle">Overview of different project types and their distribution</p>
        
        <!-- Project Type KPI Cards -->
        <div class="cards-grid" style="margin-bottom: 2rem;">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Resilience Projects</h3>
              <div class="card-badge" style="background: #10b981;">
                <i class="fas fa-shield-alt"></i>
              </div>
            </div>
            <p class="card-value">{{ $projectTypeStats['resilience_count'] ?? 0 }}</p>
            <p class="card-subtitle">Climate resilience initiatives</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Youth Enterprises</h3>
              <div class="card-badge" style="background: #3b82f6;">
                <i class="fas fa-rocket"></i>
              </div>
            </div>
            <p class="card-value">{{ $projectTypeStats['youth_count'] ?? 0 }}</p>
            <p class="card-subtitle">Youth-led business ventures</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">4P Projects</h3>
              <div class="card-badge" style="background: #f59e0b;">
                <i class="fas fa-handshake"></i>
              </div>
            </div>
            <p class="card-value">{{ $projectTypeStats['four_p_count'] ?? 0 }}</p>
            <p class="card-subtitle">Public-private partnerships</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Nutrition Programs</h3>
              <div class="card-badge" style="background: #ec4899;">
                <i class="fas fa-apple-alt"></i>
              </div>
            </div>
            <p class="card-value">{{ $projectTypeStats['nutrition_count'] ?? 0 }}</p>
            <p class="card-subtitle">Nutritional improvement programs</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Projects</h3>
              <div class="card-badge" style="background: #8b5cf6;">
                <i class="fas fa-project-diagram"></i>
              </div>
            </div>
            <p class="card-value">{{ $projectTypeStats['total_projects'] ?? 0 }}</p>
            <p class="card-subtitle">All project types combined</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Youth Proposals</h3>
              <div class="card-badge" style="background: #06b6d4;">
                <i class="fas fa-file-alt"></i>
              </div>
            </div>
            <p class="card-value">{{ $projectTypeStats['youth_proposal_count'] ?? 0 }}</p>
            <p class="card-subtitle">Submitted proposals</p>
          </div>
        </div>

        <!-- Project Type Distribution Chart -->
        <div class="chart-container">
          <div class="chart-wrap">
            <canvas id="projectTypeChart"></canvas>
            <div id="project-type-center">
              <div class="big">{{ $projectTypeStats['total_projects'] ?? 0 }}</div>
              <div class="small">Total Projects</div>
            </div>
          </div>

          <div class="chart-legend">
            <ul class="legend-list">
              <li class="legend-item">
                <div class="legend-left">
                  <span class="legend-swatch" style="background: #10b981;"></span>
                  <span class="legend-label">Resilience Projects</span>
                </div>
                <span class="legend-value">{{ $projectTypeStats['resilience_count'] ?? 0 }}</span>
              </li>
              <li class="legend-item">
                <div class="legend-left">
                  <span class="legend-swatch" style="background: #3b82f6;"></span>
                  <span class="legend-label">Youth Enterprises</span>
                </div>
                <span class="legend-value">{{ $projectTypeStats['youth_count'] ?? 0 }}</span>
              </li>
              <li class="legend-item">
                <div class="legend-left">
                  <span class="legend-swatch" style="background: #f59e0b;"></span>
                  <span class="legend-label">4P Projects</span>
                </div>
                <span class="legend-value">{{ $projectTypeStats['four_p_count'] ?? 0 }}</span>
              </li>
              <li class="legend-item">
                <div class="legend-left">
                  <span class="legend-swatch" style="background: #ec4899;"></span>
                  <span class="legend-label">Nutrition Programs</span>
                </div>
                <span class="legend-value">{{ $projectTypeStats['nutrition_count'] ?? 0 }}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Resilience Projects Summary Section -->
      <div class="chart-section" id="resilience-summary-section" style="display: none;">
        <h2 class="chart-title">Resilience Projects - Agriculture & Livestock</h2>
        <p class="chart-subtitle">Farmers and distributions</p>

        <div class="cards-grid" style="margin-bottom: 2rem;">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Farmers (Agriculture)</h3>
              <div class="card-badge"><i class="fas fa-user"></i></div>
            </div>
            <p class="card-value">{{ $resilienceStats['total_farmers_agri'] ?? 0 }}</p>
            <p class="card-subtitle">Beneficiaries with any agriculture record</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Farmers (Livestock)</h3>
              <div class="card-badge" style="background:#3b82f6;"><i class="fas fa-paw"></i></div>
            </div>
            <p class="card-value">{{ $resilienceStats['total_farmers_livestock'] ?? 0 }}</p>
            <p class="card-subtitle">Beneficiaries with any livestock record</p>
          </div>
        </div>

        <div class="chart-container" style="margin-top: 1rem; flex-direction: column; gap: 2rem;">
          <!-- Agri vs Livestock total farmers comparison -->
          <div class="chart-container" style="width: 100%; gap: 1.5rem; align-items: stretch;">
            <div class="chart-wrap" style="width: 100%; height: 260px; max-width: 520px;">
              <canvas id="resilienceAgriVsLivestockBar"></canvas>
            </div>
            <div class="d-flex flex-column" style="gap: 0.75rem;">
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cropCountModal">View Crop-wise Counts</button>
            </div>
          </div>

          <div class="chart-wrap" style="width: 100%; height: 280px; max-width: 1000px;">
            <canvas id="resilienceCropTypeBar"></canvas>
          </div>

          <div class="chart-container" style="gap: 2rem;">
            <div class="chart-wrap">
              <canvas id="resilienceCategoryDonut"></canvas>
            </div>
            <div class="chart-wrap">
              <canvas id="resilienceFocusDonut"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Crop Count Modal -->
      <div class="modal fade" id="cropCountModal" tabindex="-1" role="dialog" aria-labelledby="cropCountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="cropCountModalLabel">Summary of Beneficiaries by Crop Name</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0">
                  <thead class="thead-light">
                    <tr>
                      <th>Crop Name</th>
                      <th style="width: 140px;" class="text-right">Count</th>
                    </tr>
                  </thead>
                  <tbody id="cropCountTableBody"></tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Infrastructure Summary Section -->
      <div class="chart-section" id="infrastructure-summary-section" style="display: none;">
        <h2 class="chart-title">Infrastructure Summary</h2>
        <p class="chart-subtitle">Totals, pipeline by status, and progress distribution</p>

        <div class="cards-grid" style="margin-bottom: 2rem;">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Infrastructures</h3>
              <div class="card-badge"><i class="fas fa-industry"></i></div>
            </div>
            <p class="card-value">{{ $infrastructureStats['total'] ?? 0 }}</p>
            <p class="card-subtitle">All infrastructure records</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Average Progress %</h3>
              <div class="card-badge" style="background:#3b82f6;"><i class="fas fa-percentage"></i></div>
            </div>
            <p class="card-value">{{ $infrastructureStats['avg_progress'] ?? 0 }}%</p>
            <p class="card-subtitle">From infrastructure_progress</p>
            <div class="card-progress">
              <div class="progress-bar-horizontal">
                <div class="progress-fill-horizontal" style="width: {{ $infrastructureStats['avg_progress'] ?? 0 }}%"></div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Pipeline by Status</h3>
              <div class="card-badge" style="background:#f59e0b;"><i class="fas fa-stream"></i></div>
            </div>
            <p class="card-subtitle">Identified / Started / On Going / Finished</p>
            <canvas id="infrastructureStatusChart"></canvas>
          </div>
        </div>

        <div class="chart-container" style="margin-top: 1rem;">
          <div class="chart-wrap" style="width: 100%; height: 260px;">
            <canvas id="infrastructureProgressHistogram"></canvas>
          </div>
        </div>
      </div>

      <!-- Social Inclusion & Gender Section -->
      <div class="chart-section" id="social-inclusion-section" style="display: none;">
        <h2 class="chart-title">Social Inclusion & Gender</h2>
        <p class="chart-subtitle">Community Development, Services, Organizations, Trainings, Grievances</p>

        <div class="cards-grid" style="margin-bottom: 2rem;">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Community Development Forum</h3>
              <div class="card-badge"><i class="fas fa-users"></i></div>
            </div>
            <p class="card-value">{{ $socialInclusionStats['cdf'] ?? 0 }}</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Agrarian Services Center</h3>
              <div class="card-badge" style="background:#3b82f6;"><i class="fas fa-tractor"></i></div>
            </div>
            <p class="card-value">{{ $socialInclusionStats['asc'] ?? 0 }}</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Farmer Organization</h3>
              <div class="card-badge" style="background:#10b981;"><i class="fas fa-seedling"></i></div>
            </div>
            <p class="card-value">{{ $socialInclusionStats['farmer_organization'] ?? 0 }}</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Training Program Details</h3>
              <div class="card-badge" style="background:#f59e0b;"><i class="fas fa-chalkboard-teacher"></i></div>
            </div>
            <p class="card-value">{{ $socialInclusionStats['training'] ?? 0 }}</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Grievances</h3>
              <div class="card-badge" style="background:#ef4444;"><i class="fas fa-exclamation-circle"></i></div>
            </div>
            <p class="card-value">{{ $socialInclusionStats['grievances'] ?? 0 }}</p>
          </div>
        </div>

        <div class="chart-wrap" style="width: 100%; height: 280px; max-width: 1000px;">
          <canvas id="socialInclusionBar"></canvas>
        </div>
      </div>

      <!-- Module Summary Section (Default) -->
      <div class="chart-section" id="module-summary-section">
        <h2 class="chart-title">Module Summary</h2>
        <div class="text-center">
          <p class="text-muted">Select a module from the dropdown above to view its summary</p>
        </div>
      </div>

      <!-- 4P Agri Business Projects (EOI) Section -->
      <div class="chart-section" id="fourp-summary-section" style="display: none;">
        <h2 class="chart-title">4P Agri Business Development Projects</h2>
        <p class="chart-subtitle">Expressions of Interest status overview</p>

        <div class="cards-grid" style="margin-bottom: 2rem;">
          <div class="card">
            <div class="card-header"><h3 class="card-title">Total EOIs Received</h3><div class="card-badge"><i class="fas fa-inbox"></i></div></div>
            <p class="card-value">{{ $fourPStats['total'] ?? 0 }}</p>
          </div>
          <div class="card">
            <div class="card-header"><h3 class="card-title">Rejected EOIs</h3><div class="card-badge" style="background:#ef4444"><i class="fas fa-times"></i></div></div>
            <p class="card-value">{{ $fourPStats['rejected'] ?? 0 }}</p>
          </div>
          <div class="card">
            <div class="card-header"><h3 class="card-title">BPEC Approved</h3><div class="card-badge" style="background:#3b82f6"><i class="fas fa-stamp"></i></div></div>
            <p class="card-value">{{ $fourPStats['bpec_approved'] ?? 0 }}</p>
          </div>
          <div class="card">
            <div class="card-header"><h3 class="card-title">Agreement Signed</h3><div class="card-badge" style="background:#10b981"><i class="fas fa-file-signature"></i></div></div>
            <p class="card-value">{{ $fourPStats['agreement_signed'] ?? 0 }}</p>
          </div>
          <div class="card">
            <div class="card-header"><h3 class="card-title">IFAD Approved</h3><div class="card-badge" style="background:#8b5cf6"><i class="fas fa-check"></i></div></div>
            <p class="card-value">{{ $fourPStats['ifad_approved'] ?? 0 }}</p>
          </div>
          <div class="card">
            <div class="card-header"><h3 class="card-title">NSC Approved</h3><div class="card-badge" style="background:#f59e0b"><i class="fas fa-thumbs-up"></i></div></div>
            <p class="card-value">{{ $fourPStats['nsc_approved'] ?? 0 }}</p>
          </div>
        </div>

        <div class="chart-container">
          <div class="chart-wrap" style="width: 100%; height: 280px; max-width: 720px;">
            <canvas id="fourPStatusBar"></canvas>
          </div>
          <div class="chart-wrap" style="width: 220px; height: 220px;">
            <canvas id="fourPStatusDonut"></canvas>
          </div>
        </div>
      </div>

      <!-- Agro Enterprise Summary Section -->
      <div class="chart-section" id="agro-enterprise-summary-section" style="display: none;">
        <h2 class="chart-title">Agro Enterprise Dashboard</h2>
        <p class="chart-subtitle">Comprehensive overview of agro enterprises, shareholders, assets, and agro forests</p>

        <!-- Agro Enterprise KPI Cards -->
        <div class="cards-grid" style="margin-bottom: 2rem;">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Enterprises</h3>
              <div class="card-badge">
                <i class="fas fa-building"></i>
              </div>
            </div>
            <p class="card-value">{{ $agroEnterpriseStats['total_enterprises'] ?? 0 }}</p>
            <p class="card-subtitle">Registered agro enterprises</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Shareholders</h3>
              <div class="card-badge" style="background: #3b82f6;">
                <i class="fas fa-users"></i>
              </div>
            </div>
            <p class="card-value">{{ $agroEnterpriseStats['total_shareholders'] ?? 0 }}</p>
            <p class="card-subtitle">Enterprise stakeholders</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Assets</h3>
              <div class="card-badge" style="background: #10b981;">
                <i class="fas fa-chart-line"></i>
              </div>
            </div>
            <p class="card-value">{{ $agroEnterpriseStats['total_assets'] ?? 0 }}</p>
            <p class="card-subtitle">Enterprise assets</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Asset Value</h3>
              <div class="card-badge" style="background: #f59e0b;">
                <i class="fas fa-dollar-sign"></i>
              </div>
            </div>
            <p class="card-value">{{ number_format($agroEnterpriseStats['total_asset_value'] ?? 0, 2) }}</p>
            <p class="card-subtitle">Combined asset value</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Agro Forests</h3>
              <div class="card-badge" style="background: #8b5cf6;">
                <i class="fas fa-tree"></i>
              </div>
            </div>
            <p class="card-value">{{ $agroEnterpriseStats['total_agro_forests'] ?? 0 }}</p>
            <p class="card-subtitle">Forest projects</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Hectares</h3>
              <div class="card-badge" style="background: #06b6d4;">
                <i class="fas fa-map"></i>
              </div>
            </div>
            <p class="card-value">{{ number_format($agroEnterpriseStats['agro_forest_stats']['total_hectares'] ?? 0, 1) }} ha</p>
            <p class="card-subtitle">Forest coverage</p>
          </div>
        </div>

        <!-- Financial Summary Cards -->
        <div class="cards-grid" style="margin-bottom: 2rem;">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Share Capital</h3>
              <div class="card-badge" style="background: #10b981;">
                <i class="fas fa-coins"></i>
              </div>
            </div>
            <p class="card-value">{{ number_format($agroEnterpriseStats['shareholder_stats']['total_share_capital'] ?? 0, 2) }}</p>
            <p class="card-subtitle">Shareholder investments</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Forest Establishment Cost</h3>
              <div class="card-badge" style="background: #8b5cf6;">
                <i class="fas fa-seedling"></i>
              </div>
            </div>
            <p class="card-value">{{ number_format($agroEnterpriseStats['agro_forest_stats']['total_establishment_cost'] ?? 0, 2) }}</p>
            <p class="card-subtitle">Forest development investment</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Combined Enterprise Value</h3>
              <div class="card-badge" style="background: #f59e0b;">
                <i class="fas fa-chart-pie"></i>
              </div>
            </div>
            <p class="card-value">{{ number_format($agroEnterpriseStats['financial_summary']['combined_enterprise_value'] ?? 0, 2) }}</p>
            <p class="card-subtitle">Total portfolio value</p>
          </div>
        </div>

        <!-- Performance Indicators -->
        <div class="cards-grid" style="margin-bottom: 2rem;">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Asset Utilization Rate</h3>
              <div class="card-badge" style="background: #3b82f6;">
                <i class="fas fa-percentage"></i>
              </div>
            </div>
            <p class="card-value">{{ $agroEnterpriseStats['performance_indicators']['asset_utilization_rate'] ?? 0 }}%</p>
            <p class="card-subtitle">Enterprises with assets</p>
            <div class="card-progress">
              <div class="progress-bar-horizontal">
                <div class="progress-fill-horizontal" style="width: {{ $agroEnterpriseStats['performance_indicators']['asset_utilization_rate'] ?? 0 }}%"></div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Shareholder Participation</h3>
              <div class="card-badge" style="background: #10b981;">
                <i class="fas fa-handshake"></i>
              </div>
            </div>
            <p class="card-value">{{ $agroEnterpriseStats['performance_indicators']['shareholder_participation_rate'] ?? 0 }}%</p>
            <p class="card-subtitle">Enterprises with shareholders</p>
            <div class="card-progress">
              <div class="progress-bar-horizontal">
                <div class="progress-fill-horizontal" style="width: {{ $agroEnterpriseStats['performance_indicators']['shareholder_participation_rate'] ?? 0 }}%"></div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Business Plan Coverage</h3>
              <div class="card-badge" style="background: #8b5cf6;">
                <i class="fas fa-file-alt"></i>
              </div>
            </div>
            <p class="card-value">{{ $agroEnterpriseStats['performance_indicators']['enterprises_with_business_plans'] ?? 0 }}</p>
            <p class="card-subtitle">Enterprises with business plans</p>
          </div>
        </div>

        <!-- Charts Section -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 2rem;">
          <!-- Business Nature Distribution Chart -->
          <div class="chart-container" style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); border: 1px solid #f1f5f9; border-top: 4px solid #3b82f6; padding: 1.5rem;">
            <h3 style="text-align: center; margin-bottom: 1.5rem; color: #1f2937; font-size: 1.25rem; font-weight: 600;">Business Nature Distribution</h3>
            <div class="chart-wrap" style="position: relative; display: flex; justify-content: center; align-items: center;">
              <canvas id="businessNatureChart"></canvas>
              <div id="business-nature-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                <div style="font-size: 2rem; font-weight: 700; color: #1f2937; line-height: 1;">{{ $agroEnterpriseStats['total_enterprises'] ?? 0 }}</div>
                <div style="font-size: 0.875rem; color: #6b7280; font-weight: 500; margin-top: 0.25rem;">Total Enterprises</div>
              </div>
            </div>
          </div>

          <!-- Shareholder Gender Distribution Chart -->
          <div class="chart-container" style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); border: 1px solid #f1f5f9; border-top: 4px solid #10b981; padding: 1.5rem;">
            <h3 style="text-align: center; margin-bottom: 1.5rem; color: #1f2937; font-size: 1.25rem; font-weight: 600;">Shareholder Gender Distribution</h3>
            <div class="chart-wrap" style="position: relative; display: flex; justify-content: center; align-items: center;">
              <canvas id="shareholderGenderChart"></canvas>
              <div id="shareholder-gender-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                <div style="font-size: 2rem; font-weight: 700; color: #1f2937; line-height: 1;">{{ $agroEnterpriseStats['total_shareholders'] ?? 0 }}</div>
                <div style="font-size: 0.875rem; color: #6b7280; font-weight: 500; margin-top: 0.25rem;">Total Shareholders</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Asset Distribution and Species Distribution -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 2rem;">
          <!-- Asset Distribution Chart -->
          <div class="chart-container" style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); border: 1px solid #f1f5f9; border-top: 4px solid #f59e0b; padding: 1.5rem;">
            <h3 style="text-align: center; margin-bottom: 1.5rem; color: #1f2937; font-size: 1.25rem; font-weight: 600;">Top Asset Types by Value</h3>
            <div class="chart-wrap" style="width: 100%; height: 300px;">
              <canvas id="assetDistributionChart"></canvas>
            </div>
          </div>

          <!-- Species Distribution Chart -->
          <div class="chart-container" style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); border: 1px solid #f1f5f9; border-top: 4px solid #8b5cf6; padding: 1.5rem;">
            <h3 style="text-align: center; margin-bottom: 1.5rem; color: #1f2937; font-size: 1.25rem; font-weight: 600;">Top Species by Plant Count</h3>
            <div class="chart-wrap" style="width: 100%; height: 300px;">
              <canvas id="speciesDistributionChart"></canvas>
            </div>
          </div>
        </div>

        <!-- Geographic Distribution -->
        <div style="margin-top: 2rem;">
          <div class="chart-container" style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); border: 1px solid #f1f5f9; border-top: 4px solid #06b6d4; padding: 1.5rem;">
            <h3 style="text-align: center; margin-bottom: 1.5rem; color: #1f2937; font-size: 1.25rem; font-weight: 600;">Province Distribution of Agro Forests</h3>
            <div class="chart-wrap" style="width: 100%; height: 400px;">
              <canvas id="provinceDistributionChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- NRM (Natural Resources Management) Summary Section -->
      <div class="chart-section" id="nrm-summary-section" style="display: none;">
        <h2 class="chart-title">Natural Resources Management Dashboard</h2>
        <p class="chart-subtitle">Comprehensive overview of NRM training programs, participants, and nutrient-rich home gardens</p>

        <!-- NRM KPI Cards -->
        <div class="cards-grid" style="margin-bottom: 2rem;">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Training Programs</h3>
              <div class="card-badge">
                <i class="fas fa-graduation-cap"></i>
              </div>
            </div>
            <p class="card-value">{{ $nrmStats['total_training_programs'] ?? 0 }}</p>
            <p class="card-subtitle">NRM training programs conducted</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Participants</h3>
              <div class="card-badge" style="background: #3b82f6;">
                <i class="fas fa-users"></i>
              </div>
            </div>
            <p class="card-value">{{ $nrmStats['total_participants'] ?? 0 }}</p>
            <p class="card-subtitle">Training participants</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Nutrient Home Gardens</h3>
              <div class="card-badge" style="background: #10b981;">
                <i class="fas fa-seedling"></i>
              </div>
            </div>
            <p class="card-value">{{ $nrmStats['total_nutrient_home_gardens'] ?? 0 }}</p>
            <p class="card-subtitle">Home garden projects</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Garden Area</h3>
              <div class="card-badge" style="background: #f59e0b;">
                <i class="fas fa-map"></i>
              </div>
            </div>
            <p class="card-value">{{ number_format($nrmStats['total_garden_area'] ?? 0, 1) }} acres</p>
            <p class="card-subtitle">Total cultivated area</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Youth Participants</h3>
              <div class="card-badge" style="background: #8b5cf6;">
                <i class="fas fa-child"></i>
              </div>
            </div>
            <p class="card-value">{{ $nrmStats['youth_participants'] ?? 0 }}</p>
            <p class="card-subtitle">Young participants</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Average Age</h3>
              <div class="card-badge" style="background: #06b6d4;">
                <i class="fas fa-chart-bar"></i>
              </div>
            </div>
            <p class="card-value">{{ $nrmStats['avg_participant_age'] ?? 0 }} years</p>
            <p class="card-subtitle">Average participant age</p>
          </div>
        </div>

        <!-- Financial Summary Cards -->
        <div class="cards-grid" style="margin-bottom: 2rem;">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Training Cost</h3>
              <div class="card-badge" style="background: #10b981;">
                <i class="fas fa-dollar-sign"></i>
              </div>
            </div>
            <p class="card-value">{{ number_format($nrmStats['total_training_cost'] ?? 0, 2) }}</p>
            <p class="card-subtitle">Training program investment</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Resource Person Payments</h3>
              <div class="card-badge" style="background: #8b5cf6;">
                <i class="fas fa-chalkboard-teacher"></i>
              </div>
            </div>
            <p class="card-value">{{ number_format($nrmStats['total_resource_person_payment'] ?? 0, 2) }}</p>
            <p class="card-subtitle">Instructor payments</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Garden Cost</h3>
              <div class="card-badge" style="background: #f59e0b;">
                <i class="fas fa-seedling"></i>
              </div>
            </div>
            <p class="card-value">{{ number_format($nrmStats['total_garden_cost'] ?? 0, 2) }}</p>
            <p class="card-subtitle">Home garden investment</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Credit Utilization</h3>
              <div class="card-badge" style="background: #3b82f6;">
                <i class="fas fa-percentage"></i>
              </div>
            </div>
            <p class="card-value">{{ $nrmStats['credit_utilization_rate'] ?? 0 }}%</p>
            <p class="card-subtitle">Credit usage rate</p>
            <div class="card-progress">
              <div class="progress-bar-horizontal">
                <div class="progress-fill-horizontal" style="width: {{ $nrmStats['credit_utilization_rate'] ?? 0 }}%"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Performance Indicators -->
        <div class="cards-grid" style="margin-bottom: 2rem;">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Avg Participants/Program</h3>
              <div class="card-badge" style="background: #3b82f6;">
                <i class="fas fa-users"></i>
              </div>
            </div>
            <p class="card-value">{{ $nrmStats['avg_participants_per_program'] ?? 0 }}</p>
            <p class="card-subtitle">Average attendance</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Cost per Participant</h3>
              <div class="card-badge" style="background: #10b981;">
                <i class="fas fa-dollar-sign"></i>
              </div>
            </div>
            <p class="card-value">{{ number_format($nrmStats['avg_cost_per_participant'] ?? 0, 2) }}</p>
            <p class="card-subtitle">Training cost efficiency</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Geographic Coverage</h3>
              <div class="card-badge" style="background: #8b5cf6;">
                <i class="fas fa-map-marked-alt"></i>
              </div>
            </div>
            <p class="card-value">{{ $nrmStats['performance_indicators']['geographic_coverage_score'] ?? 0 }}%</p>
            <p class="card-subtitle">Province coverage</p>
            <div class="card-progress">
              <div class="progress-bar-horizontal">
                <div class="progress-fill-horizontal" style="width: {{ $nrmStats['performance_indicators']['geographic_coverage_score'] ?? 0 }}%"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Charts Section -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 2rem;">
          <!-- Participant Gender Distribution Chart -->
          <div class="chart-container" style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); border: 1px solid #f1f5f9; border-top: 4px solid #3b82f6; padding: 1.5rem;">
            <h3 style="text-align: center; margin-bottom: 1.5rem; color: #1f2937; font-size: 1.25rem; font-weight: 600;">Participant Gender Distribution</h3>
            <div class="chart-wrap" style="position: relative; display: flex; justify-content: center; align-items: center;">
              <canvas id="nrmParticipantGenderChart"></canvas>
              <div id="nrm-participant-gender-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                <div style="font-size: 2rem; font-weight: 700; color: #1f2937; line-height: 1;">{{ $nrmStats['total_participants'] ?? 0 }}</div>
                <div style="font-size: 0.875rem; color: #6b7280; font-weight: 500; margin-top: 0.25rem;">Total Participants</div>
              </div>
            </div>
          </div>

          <!-- Crop Distribution Chart -->
          <div class="chart-container" style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); border: 1px solid #f1f5f9; border-top: 4px solid #10b981; padding: 1.5rem;">
            <h3 style="text-align: center; margin-bottom: 1.5rem; color: #1f2937; font-size: 1.25rem; font-weight: 600;">Training Crop Distribution</h3>
            <div class="chart-wrap" style="position: relative; display: flex; justify-content: center; align-items: center;">
              <canvas id="nrmCropDistributionChart"></canvas>
              <div id="nrm-crop-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                <div style="font-size: 2rem; font-weight: 700; color: #1f2937; line-height: 1;">{{ $nrmStats['total_training_programs'] ?? 0 }}</div>
                <div style="font-size: 0.875rem; color: #6b7280; font-weight: 500; margin-top: 0.25rem;">Training Programs</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Province Distribution and Production Focus -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 2rem;">
          <!-- Province Distribution Chart -->
          <div class="chart-container" style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); border: 1px solid #f1f5f9; border-top: 4px solid #f59e0b; padding: 1.5rem;">
            <h3 style="text-align: center; margin-bottom: 1.5rem; color: #1f2937; font-size: 1.25rem; font-weight: 600;">Province Distribution</h3>
            <div class="chart-wrap" style="width: 100%; height: 300px;">
              <canvas id="nrmProvinceDistributionChart"></canvas>
            </div>
          </div>

          <!-- Production Focus Chart -->
          <div class="chart-container" style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); border: 1px solid #f1f5f9; border-top: 4px solid #8b5cf6; padding: 1.5rem;">
            <h3 style="text-align: center; margin-bottom: 1.5rem; color: #1f2937; font-size: 1.25rem; font-weight: 600;">Production Focus Distribution</h3>
            <div class="chart-wrap" style="width: 100%; height: 300px;">
              <canvas id="nrmProductionFocusChart"></canvas>
            </div>
          </div>
        </div>

        <!-- Resource Person Analysis -->
        <div style="margin-top: 2rem;">
          <div class="chart-container" style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); border: 1px solid #f1f5f9; border-top: 4px solid #06b6d4; padding: 1.5rem;">
            <h3 style="text-align: center; margin-bottom: 1.5rem; color: #1f2937; font-size: 1.25rem; font-weight: 600;">Top Resource Persons by Program Count</h3>
            <div class="chart-wrap" style="width: 100%; height: 400px;">
              <canvas id="nrmResourcePersonChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

      <!-- FFS (Farmer Field Schools) Summary Section -->
      <div class="chart-section" id="ffs-summary-section" style="display: none;">
        <h2 class="chart-title">Farmer Field Schools Dashboard</h2>
        <p class="chart-subtitle">Comprehensive overview of FFS training programs, participants, and performance metrics</p>

        <!-- FFS KPI Cards -->
        <div class="cards-grid" style="margin-bottom: 2rem;">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Training Programs</h3>
              <div class="card-badge">
                <i class="fas fa-graduation-cap"></i>
              </div>
            </div>
            <p class="card-value">{{ $ffsStats['total_training_programs'] ?? 0 }}</p>
            <p class="card-subtitle">FFS training programs conducted</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Participants</h3>
              <div class="card-badge" style="background: #3b82f6;">
                <i class="fas fa-users"></i>
              </div>
            </div>
            <p class="card-value">{{ $ffsStats['total_participants'] ?? 0 }}</p>
            <p class="card-subtitle">Training participants</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Unique Programs</h3>
              <div class="card-badge" style="background: #10b981;">
                <i class="fas fa-list-ol"></i>
              </div>
            </div>
            <p class="card-value">{{ $ffsStats['unique_program_numbers'] ?? 0 }}</p>
            <p class="card-subtitle">Distinct program numbers</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Youth Participants</h3>
              <div class="card-badge" style="background: #8b5cf6;">
                <i class="fas fa-child"></i>
              </div>
            </div>
            <p class="card-value">{{ $ffsStats['demographics_summary']['youth_participants'] ?? 0 }}</p>
            <p class="card-subtitle">Young participants</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Average Age</h3>
              <div class="card-badge" style="background: #06b6d4;">
                <i class="fas fa-chart-bar"></i>
              </div>
            </div>
            <p class="card-value">{{ $ffsStats['demographics_summary']['avg_participant_age'] ?? 0 }} years</p>
            <p class="card-subtitle">Average participant age</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Avg Participants/Program</h3>
              <div class="card-badge" style="background: #f59e0b;">
                <i class="fas fa-users"></i>
              </div>
            </div>
            <p class="card-value">{{ $ffsStats['avg_participants_per_program'] ?? 0 }}</p>
            <p class="card-subtitle">Average attendance</p>
          </div>
        </div>

        <!-- Financial Summary Cards -->
        <div class="cards-grid" style="margin-bottom: 2rem;">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Program Cost</h3>
              <div class="card-badge" style="background: #10b981;">
                <i class="fas fa-dollar-sign"></i>
              </div>
            </div>
            <p class="card-value">{{ number_format($ffsStats['financial_summary']['total_program_cost'] ?? 0, 2) }}</p>
            <p class="card-subtitle">Training program investment</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Resource Person Payments</h3>
              <div class="card-badge" style="background: #8b5cf6;">
                <i class="fas fa-chalkboard-teacher"></i>
              </div>
            </div>
            <p class="card-value">{{ number_format($ffsStats['financial_summary']['total_resource_person_payment'] ?? 0, 2) }}</p>
            <p class="card-subtitle">Instructor payments</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Training Cost</h3>
              <div class="card-badge" style="background: #f59e0b;">
                <i class="fas fa-calculator"></i>
              </div>
            </div>
            <p class="card-value">{{ number_format($ffsStats['financial_summary']['total_training_cost'] ?? 0, 2) }}</p>
            <p class="card-subtitle">Combined investment</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Cost per Participant</h3>
              <div class="card-badge" style="background: #3b82f6;">
                <i class="fas fa-percentage"></i>
              </div>
            </div>
            <p class="card-value">{{ number_format($ffsStats['financial_summary']['avg_cost_per_participant'] ?? 0, 2) }}</p>
            <p class="card-subtitle">Training cost efficiency</p>
          </div>
        </div>

        <!-- Performance Indicators -->
        <div class="cards-grid" style="margin-bottom: 2rem;">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Geographic Coverage</h3>
              <div class="card-badge" style="background: #8b5cf6;">
                <i class="fas fa-map-marked-alt"></i>
              </div>
            </div>
            <p class="card-value">{{ $ffsStats['performance_indicators']['geographic_coverage_score'] ?? 0 }}%</p>
            <p class="card-subtitle">Province coverage</p>
            <div class="card-progress">
              <div class="progress-bar-horizontal">
                <div class="progress-fill-horizontal" style="width: {{ $ffsStats['performance_indicators']['geographic_coverage_score'] ?? 0 }}%"></div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Contact Coverage</h3>
              <div class="card-badge" style="background: #10b981;">
                <i class="fas fa-phone"></i>
              </div>
            </div>
            <p class="card-value">{{ $ffsStats['performance_indicators']['contact_coverage_rate'] ?? 0 }}%</p>
            <p class="card-subtitle">Participants with contact info</p>
            <div class="card-progress">
              <div class="progress-bar-horizontal">
                <div class="progress-fill-horizontal" style="width: {{ $ffsStats['performance_indicators']['contact_coverage_rate'] ?? 0 }}%"></div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Cost Efficiency</h3>
              <div class="card-badge" style="background: #f59e0b;">
                <i class="fas fa-chart-line"></i>
              </div>
            </div>
            <p class="card-value">{{ $ffsStats['performance_indicators']['cost_efficiency_score'] ?? 0 }}%</p>
            <p class="card-subtitle">Training efficiency score</p>
            <div class="card-progress">
              <div class="progress-bar-horizontal">
                <div class="progress-fill-horizontal" style="width: {{ $ffsStats['performance_indicators']['cost_efficiency_score'] ?? 0 }}%"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Charts Section -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 2rem;">
          <!-- Participant Gender Distribution Chart -->
          <div class="ffs-chart-container">
            <h3 class="ffs-chart-title">Participant Gender Distribution</h3>
            <div class="ffs-chart-wrapper">
              <canvas id="ffsParticipantGenderChart"></canvas>
              <div id="ffs-participant-gender-center" class="ffs-chart-center">
                <div class="ffs-center-number">{{ $ffsStats['total_participants'] ?? 0 }}</div>
                <div class="ffs-center-label">Total Participants</div>
              </div>
            </div>
          </div>

          <!-- Crop Distribution Chart -->
          <div class="ffs-chart-container">
            <h3 class="ffs-chart-title">Training Crop Distribution</h3>
            <div class="ffs-chart-wrapper">
              <canvas id="ffsCropDistributionChart"></canvas>
              <div id="ffs-crop-center" class="ffs-chart-center">
                <div class="ffs-center-number">{{ $ffsStats['total_training_programs'] ?? 0 }}</div>
                <div class="ffs-center-label">Training Programs</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Province Distribution and Designation Analysis -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 2rem;">
          <!-- Province Distribution Chart -->
          <div class="ffs-chart-container">
            <h3 class="ffs-chart-title">Province Distribution</h3>
            <div class="ffs-chart-wrapper" style="height: 400px;">
              <canvas id="ffsProvinceChart"></canvas>
            </div>
          </div>

          <!-- Designation Distribution Chart -->
          <div class="ffs-chart-container">
            <h3 class="ffs-chart-title">Participant Designation Distribution</h3>
            <div class="ffs-chart-wrapper" style="height: 400px;">
              <canvas id="ffsDesignationChart"></canvas>
            </div>
          </div>
        </div>

        <!-- Top Resource Persons and Venue Analysis -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 2rem;">
          <!-- Top Resource Persons Chart -->
          <div class="ffs-chart-container">
            <h3 class="ffs-chart-title">Top Resource Persons by Program Count</h3>
            <div class="ffs-chart-wrapper" style="height: 400px;">
              <canvas id="ffsResourcePersonChart"></canvas>
            </div>
          </div>

          <!-- Venue Distribution Chart -->
          <div class="ffs-chart-container">
            <h3 class="ffs-chart-title">Training Venue Distribution</h3>
            <div class="ffs-chart-wrapper" style="height: 400px;">
              <canvas id="ffsVenueChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Nutrition Training Program Summary Section -->
      <div class="chart-section" id="nutrition-summary-section" style="display: none;">
        <h2 class="chart-title">Nutrition Training Program Dashboard</h2>
        <p class="chart-subtitle">Comprehensive overview of nutrition training programs, trainees, and performance metrics</p>

        <!-- Nutrition KPI Cards -->
        <div class="cards-grid" style="margin-bottom: 2rem;">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Training Programs</h3>
              <div class="card-badge">
                <i class="fas fa-apple-alt"></i>
              </div>
            </div>
            <p class="card-value">{{ $nutritionStats['total_nutrition_programs'] ?? 0 }}</p>
            <p class="card-subtitle">Nutrition training programs conducted</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Trainees</h3>
              <div class="card-badge" style="background: #3b82f6;">
                <i class="fas fa-users"></i>
              </div>
            </div>
            <p class="card-value">{{ $nutritionStats['total_trainees'] ?? 0 }}</p>
            <p class="card-subtitle">Training participants</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Program Types</h3>
              <div class="card-badge" style="background: #10b981;">
                <i class="fas fa-list-ol"></i>
              </div>
            </div>
            <p class="card-value">{{ $nutritionStats['unique_program_types'] ?? 0 }}</p>
            <p class="card-subtitle">Distinct program types</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Youth Trainees</h3>
              <div class="card-badge" style="background: #8b5cf6;">
                <i class="fas fa-child"></i>
              </div>
            </div>
            <p class="card-value">{{ $nutritionStats['demographics_summary']['youth_trainees'] ?? 0 }}</p>
            <p class="card-subtitle">Young participants (18-29)</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Average Age</h3>
              <div class="card-badge" style="background: #06b6d4;">
                <i class="fas fa-chart-bar"></i>
              </div>
            </div>
            <p class="card-value">{{ $nutritionStats['demographics_summary']['avg_trainee_age'] ?? 0 }} years</p>
            <p class="card-subtitle">Average participant age</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Avg Trainees/Program</h3>
              <div class="card-badge" style="background: #f59e0b;">
                <i class="fas fa-users"></i>
              </div>
            </div>
            <p class="card-value">{{ $nutritionStats['avg_trainees_per_program'] ?? 0 }}</p>
            <p class="card-subtitle">Average attendance</p>
          </div>
        </div>

        <!-- Financial Summary Cards -->
        <div class="cards-grid" style="margin-bottom: 2rem;">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Program Cost</h3>
              <div class="card-badge" style="background: #10b981;">
                <i class="fas fa-dollar-sign"></i>
              </div>
            </div>
            <p class="card-value">{{ number_format($nutritionStats['financial_summary']['total_program_cost'] ?? 0, 2) }}</p>
            <p class="card-subtitle">Training program investment</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Cost per Program</h3>
              <div class="card-badge" style="background: #8b5cf6;">
                <i class="fas fa-calculator"></i>
              </div>
            </div>
            <p class="card-value">{{ number_format($nutritionStats['financial_summary']['avg_cost_per_program'] ?? 0, 2) }}</p>
            <p class="card-subtitle">Average program cost</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Cost per Trainee</h3>
              <div class="card-badge" style="background: #f59e0b;">
                <i class="fas fa-percentage"></i>
              </div>
            </div>
            <p class="card-value">{{ number_format($nutritionStats['financial_summary']['avg_cost_per_trainee'] ?? 0, 2) }}</p>
            <p class="card-subtitle">Training cost efficiency</p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Contact Coverage</h3>
              <div class="card-badge" style="background: #3b82f6;">
                <i class="fas fa-phone"></i>
              </div>
            </div>
            <p class="card-value">{{ $nutritionStats['performance_indicators']['contact_coverage_rate'] ?? 0 }}%</p>
            <p class="card-subtitle">Trainees with contact info</p>
            <div class="card-progress">
              <div class="progress-bar-horizontal">
                <div class="progress-fill-horizontal" style="width: {{ $nutritionStats['performance_indicators']['contact_coverage_rate'] ?? 0 }}%"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Performance Indicators -->
        <div class="cards-grid" style="margin-bottom: 2rem;">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Geographic Coverage</h3>
              <div class="card-badge" style="background: #8b5cf6;">
                <i class="fas fa-map-marked-alt"></i>
              </div>
            </div>
            <p class="card-value">{{ $nutritionStats['performance_indicators']['geographic_coverage_score'] ?? 0 }}%</p>
            <p class="card-subtitle">Province coverage</p>
            <div class="card-progress">
              <div class="progress-bar-horizontal">
                <div class="progress-fill-horizontal" style="width: {{ $nutritionStats['performance_indicators']['geographic_coverage_score'] ?? 0 }}%"></div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Cost Efficiency</h3>
              <div class="card-badge" style="background: #f59e0b;">
                <i class="fas fa-chart-line"></i>
              </div>
            </div>
            <p class="card-value">{{ $nutritionStats['performance_indicators']['cost_efficiency_score'] ?? 0 }}%</p>
            <p class="card-subtitle">Training efficiency score</p>
            <div class="card-progress">
              <div class="progress-bar-horizontal">
                <div class="progress-fill-horizontal" style="width: {{ $nutritionStats['performance_indicators']['cost_efficiency_score'] ?? 0 }}%"></div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Remarks Coverage</h3>
              <div class="card-badge" style="background: #10b981;">
                <i class="fas fa-sticky-note"></i>
              </div>
            </div>
            <p class="card-value">{{ $nutritionStats['performance_indicators']['remarks_coverage_rate'] ?? 0 }}%</p>
            <p class="card-subtitle">Trainees with special remarks</p>
            <div class="card-progress">
              <div class="progress-bar-horizontal">
                <div class="progress-fill-horizontal" style="width: {{ $nutritionStats['performance_indicators']['remarks_coverage_rate'] ?? 0 }}%"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Charts Section -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 2rem;">
          <!-- Trainee Gender Distribution Chart -->
          <div class="ffs-chart-container">
            <h3 class="ffs-chart-title">Trainee Gender Distribution</h3>
            <div class="ffs-chart-wrapper">
              <canvas id="nutritionTraineeGenderChart"></canvas>
              <div id="nutrition-trainee-gender-center" class="ffs-chart-center">
                <div class="ffs-center-number">{{ $nutritionStats['total_trainees'] ?? 0 }}</div>
                <div class="ffs-center-label">Total Trainees</div>
              </div>
            </div>
          </div>

          <!-- Program Type Distribution Chart -->
          <div class="ffs-chart-container">
            <h3 class="ffs-chart-title">Program Type Distribution</h3>
            <div class="ffs-chart-wrapper">
              <canvas id="nutritionProgramTypeChart"></canvas>
              <div id="nutrition-program-type-center" class="ffs-chart-center">
                <div class="ffs-center-number">{{ $nutritionStats['total_nutrition_programs'] ?? 0 }}</div>
                <div class="ffs-center-label">Training Programs</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Province Distribution and Education Analysis -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 2rem;">
          <!-- Province Distribution Chart -->
          <div class="ffs-chart-container">
            <h3 class="ffs-chart-title">Province Distribution</h3>
            <div class="ffs-chart-wrapper" style="height: 400px;">
              <canvas id="nutritionProvinceChart"></canvas>
            </div>
          </div>

          <!-- Education Level Distribution Chart -->
          <div class="ffs-chart-container">
            <h3 class="ffs-chart-title">Education Level Distribution</h3>
            <div class="ffs-chart-wrapper" style="height: 400px;">
              <canvas id="nutritionEducationChart"></canvas>
            </div>
          </div>
        </div>

        <!-- Top Conductors and Income Analysis -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 2rem;">
          <!-- Top Conductors Chart -->
          <div class="ffs-chart-container">
            <h3 class="ffs-chart-title">Top Program Conductors</h3>
            <div class="ffs-chart-wrapper" style="height: 400px;">
              <canvas id="nutritionConductorChart"></canvas>
            </div>
          </div>

          <!-- Income Level Distribution Chart -->
          <div class="ffs-chart-container">
            <h3 class="ffs-chart-title">Income Level Distribution</h3>
            <div class="ffs-chart-wrapper" style="height: 400px;">
              <canvas id="nutritionIncomeChart"></canvas>
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

      // Beneficiary Gender Chart
      const beneficiaryGenderData = {
        male: Number(@json($beneficiaryStats['male_count'] ?? 0)),
        female: Number(@json($beneficiaryStats['female_count'] ?? 0)),
        other: Number(@json($beneficiaryStats['other_gender_count'] ?? 0))
      };

      const beneficiaryGenderLabels = [];
      const beneficiaryGenderValues = [];
      const beneficiaryGenderColors = [];

      if (beneficiaryGenderData.male > 0) {
        beneficiaryGenderLabels.push('Male');
        beneficiaryGenderValues.push(beneficiaryGenderData.male);
        beneficiaryGenderColors.push('#3b82f6');
      }
      if (beneficiaryGenderData.female > 0) {
        beneficiaryGenderLabels.push('Female');
        beneficiaryGenderValues.push(beneficiaryGenderData.female);
        beneficiaryGenderColors.push('#ec4899');
      }
      if (beneficiaryGenderData.other > 0) {
        beneficiaryGenderLabels.push('Other');
        beneficiaryGenderValues.push(beneficiaryGenderData.other);
        beneficiaryGenderColors.push('#6b7280');
      }

      // Create beneficiary gender chart
      const beneficiaryGenderCtx = document.getElementById('beneficiaryGenderChart');
      const beneficiaryGenderCenterEl = document.getElementById('beneficiary-gender-center');
      let beneficiaryGenderChart = null;

      function createBeneficiaryGenderChart() {
        if (beneficiaryGenderChart) {
          beneficiaryGenderChart.destroy();
        }

        const totalBeneficiaries = beneficiaryGenderData.male + beneficiaryGenderData.female + beneficiaryGenderData.other;
        
        function setBeneficiaryGenderCenter(title, count, pct) {
          if (pct === null) {
            beneficiaryGenderCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title}</div>`;
          } else {
            beneficiaryGenderCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title} · ${pct.toFixed(1)}%</div>`;
          }
        }

        setBeneficiaryGenderCenter('Total Beneficiaries', totalBeneficiaries, null);

        const chartData = beneficiaryGenderValues.length > 0 ? beneficiaryGenderValues : [1];
        const chartLabels = beneficiaryGenderValues.length > 0 ? beneficiaryGenderLabels : ['No data'];
        const chartColors = beneficiaryGenderValues.length > 0 ? beneficiaryGenderColors : ['#e5e7eb'];

        beneficiaryGenderChart = new Chart(beneficiaryGenderCtx, {
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
              tooltip: { enabled: beneficiaryGenderValues.length > 0 } 
            },
            onClick(evt, items) {
              if (!items.length) { 
                setBeneficiaryGenderCenter('Total Beneficiaries', totalBeneficiaries, null); 
                return; 
              }
              const idx = items[0].index;
              const val = this.data.datasets[0].data[idx] || 0;
              const pct = totalBeneficiaries ? (val/totalBeneficiaries*100) : 0;
              setBeneficiaryGenderCenter(this.data.labels[idx], val, pct);
            }
          }
        });
      }

      // Beneficiary Project Type Chart (for beneficiary module)
      const beneficiaryProjectTypeData = {
        resilience: Number(@json($projectTypeStats['resilience_count'] ?? 0)),
        youth: Number(@json($projectTypeStats['youth_count'] ?? 0)),
        fourP: Number(@json($projectTypeStats['four_p_count'] ?? 0)),
        nutrition: Number(@json($projectTypeStats['nutrition_count'] ?? 0))
      };

      const beneficiaryProjectTypeLabels = [];
      const beneficiaryProjectTypeValues = [];
      const beneficiaryProjectTypeColors = [];

      if (beneficiaryProjectTypeData.resilience > 0) {
        beneficiaryProjectTypeLabels.push('Resilience Projects');
        beneficiaryProjectTypeValues.push(beneficiaryProjectTypeData.resilience);
        beneficiaryProjectTypeColors.push('#10b981');
      }
      if (beneficiaryProjectTypeData.youth > 0) {
        beneficiaryProjectTypeLabels.push('Youth Enterprises');
        beneficiaryProjectTypeValues.push(beneficiaryProjectTypeData.youth);
        beneficiaryProjectTypeColors.push('#3b82f6');
      }
      if (beneficiaryProjectTypeData.fourP > 0) {
        beneficiaryProjectTypeLabels.push('4P Projects');
        beneficiaryProjectTypeValues.push(beneficiaryProjectTypeData.fourP);
        beneficiaryProjectTypeColors.push('#f59e0b');
      }
      if (beneficiaryProjectTypeData.nutrition > 0) {
        beneficiaryProjectTypeLabels.push('Nutrition Programs');
        beneficiaryProjectTypeValues.push(beneficiaryProjectTypeData.nutrition);
        beneficiaryProjectTypeColors.push('#ec4899');
      }

      // Create beneficiary project type chart
      const beneficiaryProjectTypeCtx = document.getElementById('beneficiaryProjectTypeChart');
      const beneficiaryProjectTypeCenterEl = document.getElementById('beneficiary-project-type-center');
      let beneficiaryProjectTypeChart = null;

      function createBeneficiaryProjectTypeChart() {
        if (beneficiaryProjectTypeChart) {
          beneficiaryProjectTypeChart.destroy();
        }

        const totalProjects = beneficiaryProjectTypeData.resilience + beneficiaryProjectTypeData.youth + beneficiaryProjectTypeData.fourP + beneficiaryProjectTypeData.nutrition;
        
        function setBeneficiaryProjectTypeCenter(title, count, pct) {
          if (pct === null) {
            beneficiaryProjectTypeCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title}</div>`;
          } else {
            beneficiaryProjectTypeCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title} · ${pct.toFixed(1)}%</div>`;
          }
        }

        setBeneficiaryProjectTypeCenter('Total Projects', totalProjects, null);

        const chartData = beneficiaryProjectTypeValues.length > 0 ? beneficiaryProjectTypeValues : [1];
        const chartLabels = beneficiaryProjectTypeValues.length > 0 ? beneficiaryProjectTypeLabels : ['No data'];
        const chartColors = beneficiaryProjectTypeValues.length > 0 ? beneficiaryProjectTypeColors : ['#e5e7eb'];

        beneficiaryProjectTypeChart = new Chart(beneficiaryProjectTypeCtx, {
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
              tooltip: { enabled: beneficiaryProjectTypeValues.length > 0 } 
            },
            onClick(evt, items) {
              if (!items.length) { 
                setBeneficiaryProjectTypeCenter('Total Projects', totalProjects, null); 
                return; 
              }
              const idx = items[0].index;
              const val = this.data.datasets[0].data[idx] || 0;
              const pct = totalProjects ? (val/totalProjects*100) : 0;
              setBeneficiaryProjectTypeCenter(this.data.labels[idx], val, pct);
            }
          }
        });
      }

      // Project Type Chart
      const projectTypeData = {
        resilience: Number(@json($projectTypeStats['resilience_count'] ?? 0)),
        youth: Number(@json($projectTypeStats['youth_count'] ?? 0)),
        fourP: Number(@json($projectTypeStats['four_p_count'] ?? 0)),
        nutrition: Number(@json($projectTypeStats['nutrition_count'] ?? 0))
      };

      const projectTypeLabels = [];
      const projectTypeValues = [];
      const projectTypeColors = [];

      if (projectTypeData.resilience > 0) {
        projectTypeLabels.push('Resilience Projects');
        projectTypeValues.push(projectTypeData.resilience);
        projectTypeColors.push('#10b981');
      }
      if (projectTypeData.youth > 0) {
        projectTypeLabels.push('Youth Enterprises');
        projectTypeValues.push(projectTypeData.youth);
        projectTypeColors.push('#3b82f6');
      }
      if (projectTypeData.fourP > 0) {
        projectTypeLabels.push('4P Projects');
        projectTypeValues.push(projectTypeData.fourP);
        projectTypeColors.push('#f59e0b');
      }
      if (projectTypeData.nutrition > 0) {
        projectTypeLabels.push('Nutrition Programs');
        projectTypeValues.push(projectTypeData.nutrition);
        projectTypeColors.push('#ec4899');
      }

      // Create project type chart
      const projectTypeCtx = document.getElementById('projectTypeChart');
      const projectTypeCenterEl = document.getElementById('project-type-center');
      let projectTypeChart = null;

      function createProjectTypeChart() {
        if (projectTypeChart) {
          projectTypeChart.destroy();
        }

        const totalProjects = projectTypeData.resilience + projectTypeData.youth + projectTypeData.fourP + projectTypeData.nutrition;
        
        function setProjectTypeCenter(title, count, pct) {
          if (pct === null) {
            projectTypeCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title}</div>`;
          } else {
            projectTypeCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title} · ${pct.toFixed(1)}%</div>`;
          }
        }

        setProjectTypeCenter('Total Projects', totalProjects, null);

        const chartData = projectTypeValues.length > 0 ? projectTypeValues : [1];
        const chartLabels = projectTypeValues.length > 0 ? projectTypeLabels : ['No data'];
        const chartColors = projectTypeValues.length > 0 ? projectTypeColors : ['#e5e7eb'];

        projectTypeChart = new Chart(projectTypeCtx, {
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
              tooltip: { enabled: projectTypeValues.length > 0 } 
            },
            onClick(evt, items) {
              if (!items.length) { 
                setProjectTypeCenter('Total Projects', totalProjects, null); 
                return; 
              }
              const idx = items[0].index;
              const val = this.data.datasets[0].data[idx] || 0;
              const pct = totalProjects ? (val/totalProjects*100) : 0;
              setProjectTypeCenter(this.data.labels[idx], val, pct);
            }
          }
        });
      }

      // Module selection functionality
      const moduleSelect = document.getElementById('module_id');
      const tankSelectionCard = document.getElementById('tank-selection-card');
      const tankChartSection = document.getElementById('tank-chart-section');
      const tankKpiSection = document.getElementById('tank-kpi-section');
      const moduleSummarySection = document.getElementById('module-summary-section');
      const beneficiarySummarySection = document.getElementById('beneficiary-summary-section');
      const projectTypeSummarySection = document.getElementById('project-type-summary-section');
      const infrastructureSummarySection = document.getElementById('infrastructure-summary-section');
      const resilienceSummarySection = document.getElementById('resilience-summary-section');
      const socialInclusionSection = document.getElementById('social-inclusion-section');
      const fourPSummarySection = document.getElementById('fourp-summary-section');
      const agroEnterpriseSection = document.getElementById('agro-enterprise-summary-section');
      const nrmSummarySection = document.getElementById('nrm-summary-section');
      const ffsSummarySection = document.getElementById('ffs-summary-section');
      const nutritionSummarySection = document.getElementById('nutrition-summary-section');
      // Youth section
      const youthSection = document.createElement('div');
      youthSection.className = 'chart-section';
      youthSection.id = 'youth-section';
      youthSection.style.display = 'none';
      youthSection.innerHTML = `
        <h2 class="chart-title">Agreement Dashboard</h2>
        <p class="chart-subtitle">Contract signing status overview</p>
        
        <div style="display: flex; gap: 2rem; align-items: center; margin: 2rem 0;">
          <div style="flex: 1; max-width: 400px;">
            <div style="position: relative; width: 100%; height: 300px;">
              <canvas id="youthAgreementDonut"></canvas>
              <div id="youthDonutCenter" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; pointer-events: none;">
                <div style="font-size: 2rem; font-weight: bold; color: #1f2937;">TOTAL</div>
                <div id="youthTotalCount" style="font-size: 3rem; font-weight: bold; color: #1f2937; margin: 0.5rem 0;">${Number(@json($youthStats['total'] ?? 0))}</div>
                <div id="youthCompletionPercent" style="font-size: 1.2rem; color: #10b981; font-weight: 600;">0% Complete</div>
              </div>
            </div>
          </div>
          
          <div style="flex: 1; display: flex; flex-direction: column; gap: 1rem;">
            <div style="background: white; border-radius: 12px; padding: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); border-left: 4px solid #10b981;">
              <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                <div style="width: 40px; height: 40px; background: #10b981; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                  <i class="fas fa-check" style="color: white; font-size: 1.2rem;"></i>
                </div>
                <h3 style="margin: 0; font-size: 1.1rem; font-weight: 600; color: #1f2937;">Agreement Signed</h3>
              </div>
              <div id="youthSignedCount" style="font-size: 2.5rem; font-weight: bold; color: #1f2937; margin: 0.5rem 0;">${Number(@json($youthStats['signed'] ?? 0))}</div>
              <div id="youthSignedPercent" style="font-size: 1rem; color: #10b981; font-weight: 600; margin-bottom: 0.5rem;">0.0%</div>
              <p style="margin: 0; color: #6b7280; font-size: 0.9rem;">Successfully completed contracts</p>
            </div>
            
            <div style="background: white; border-radius: 12px; padding: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); border-left: 4px solid #ef4444;">
              <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                <div style="width: 40px; height: 40px; background: #ef4444; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                  <i class="fas fa-hourglass-half" style="color: white; font-size: 1.2rem;"></i>
                </div>
                <h3 style="margin: 0; font-size: 1.1rem; font-weight: 600; color: #1f2937;">Pending Signature</h3>
              </div>
              <div id="youthPendingCount" style="font-size: 2.5rem; font-weight: bold; color: #1f2937; margin: 0.5rem 0;">${Number(@json($youthStats['not_signed'] ?? 0))}</div>
              <div id="youthPendingPercent" style="font-size: 1rem; color: #ef4444; font-weight: 600; margin-bottom: 0.5rem;">0.0%</div>
              <p style="margin: 0; color: #6b7280; font-size: 0.9rem;">Awaiting completion</p>
            </div>
          </div>
        </div>
      `;
      document.querySelector('.right-column').appendChild(youthSection);

      // Initially hide all sections and show module summary
      tankChartSection.style.display = 'none';
      tankKpiSection.style.display = 'none';
      beneficiarySummarySection.style.display = 'none';
      projectTypeSummarySection.style.display = 'none';
      moduleSummarySection.style.display = 'block';
      infrastructureSummarySection.style.display = 'none';
      resilienceSummarySection.style.display = 'none';
      socialInclusionSection.style.display = 'none';
      fourPSummarySection.style.display = 'none';
      youthSection.style.display = 'none';
      agroEnterpriseSection.style.display = 'none';
      nrmSummarySection.style.display = 'none';
      ffsSummarySection.style.display = 'none';
      nutritionSummarySection.style.display = 'none';
      moduleSelect.addEventListener('change', function() {
        const selectedModule = this.value;
        
        if (selectedModule === 'tank_rehabilitation') {
          // Show tank rehabilitation specific content
          tankSelectionCard.style.display = 'block';
          tankChartSection.style.display = 'block';
          tankKpiSection.style.display = 'block';
          beneficiarySummarySection.style.display = 'none';
          projectTypeSummarySection.style.display = 'none';
          moduleSummarySection.style.display = 'none';
        } else if (selectedModule === 'infrastructure') {
          tankSelectionCard.style.display = 'none';
          tankChartSection.style.display = 'none';
          tankKpiSection.style.display = 'none';
          beneficiarySummarySection.style.display = 'none';
          projectTypeSummarySection.style.display = 'none';
          moduleSummarySection.style.display = 'none';
          infrastructureSummarySection.style.display = 'block';
          resilienceSummarySection.style.display = 'none';
          socialInclusionSection.style.display = 'none';
          youthSection.style.display = 'none';

          setTimeout(() => { createInfrastructureCharts(); }, 100);
        } else if (selectedModule === 'beneficiary') {
          // Show beneficiary specific content
          tankSelectionCard.style.display = 'none';
          tankChartSection.style.display = 'none';
          tankKpiSection.style.display = 'none';
          beneficiarySummarySection.style.display = 'block';
          projectTypeSummarySection.style.display = 'none';
          moduleSummarySection.style.display = 'none';
          infrastructureSummarySection.style.display = 'none';
          resilienceSummarySection.style.display = 'none';
          socialInclusionSection.style.display = 'none';
          youthSection.style.display = 'none';
          
          // Create both beneficiary charts when showing the section
          setTimeout(() => {
            createBeneficiaryGenderChart();
            createBeneficiaryProjectTypeChart();
          }, 100);
        } else if (selectedModule === 'project_types') {
          // Show project type specific content
          tankSelectionCard.style.display = 'none';
          tankChartSection.style.display = 'none';
          tankKpiSection.style.display = 'none';
          beneficiarySummarySection.style.display = 'none';
          projectTypeSummarySection.style.display = 'block';
          moduleSummarySection.style.display = 'none';
          infrastructureSummarySection.style.display = 'none';
          resilienceSummarySection.style.display = 'none';
          socialInclusionSection.style.display = 'none';
          youthSection.style.display = 'none';
          
          // Create the project type chart when showing the section
          setTimeout(() => {
            createProjectTypeChart();
          }, 100);
        } else if (selectedModule === 'resilience_projects') {
          tankSelectionCard.style.display = 'none';
          tankChartSection.style.display = 'none';
          tankKpiSection.style.display = 'none';
          beneficiarySummarySection.style.display = 'none';
          projectTypeSummarySection.style.display = 'none';
          infrastructureSummarySection.style.display = 'none';
          moduleSummarySection.style.display = 'none';
          resilienceSummarySection.style.display = 'block';
          socialInclusionSection.style.display = 'none';
          youthSection.style.display = 'none';

          setTimeout(() => { createResilienceCharts(); }, 100);
        } else if (selectedModule === 'social_inclusion_and_gender') {
          tankSelectionCard.style.display = 'none';
          tankChartSection.style.display = 'none';
          tankKpiSection.style.display = 'none';
          beneficiarySummarySection.style.display = 'none';
          projectTypeSummarySection.style.display = 'none';
          infrastructureSummarySection.style.display = 'none';
          moduleSummarySection.style.display = 'none';
          resilienceSummarySection.style.display = 'none';
          socialInclusionSection.style.display = 'block';

          setTimeout(() => { createSocialInclusionChart(); }, 100);
        } else if (selectedModule === 'youth_enterprises') {
          tankSelectionCard.style.display = 'none';
          tankChartSection.style.display = 'none';
          tankKpiSection.style.display = 'none';
          beneficiarySummarySection.style.display = 'none';
          projectTypeSummarySection.style.display = 'none';
          infrastructureSummarySection.style.display = 'none';
          moduleSummarySection.style.display = 'none';
          resilienceSummarySection.style.display = 'none';
          socialInclusionSection.style.display = 'none';
          youthSection.style.display = 'block';

          setTimeout(() => { createYouthChart(); }, 100);
        } else if (selectedModule === '4p_agri_business') {
          tankSelectionCard.style.display = 'none';
          tankChartSection.style.display = 'none';
          tankKpiSection.style.display = 'none';
          beneficiarySummarySection.style.display = 'none';
          projectTypeSummarySection.style.display = 'none';
          infrastructureSummarySection.style.display = 'none';
          moduleSummarySection.style.display = 'none';
          resilienceSummarySection.style.display = 'none';
          socialInclusionSection.style.display = 'none';
          youthSection.style.display = 'none';
          fourPSummarySection.style.display = 'block';

          setTimeout(() => { createFourPCharts(); }, 100);
        } else if (selectedModule === 'agro_enterprise') {
          tankSelectionCard.style.display = 'none';
          tankChartSection.style.display = 'none';
          tankKpiSection.style.display = 'none';
          beneficiarySummarySection.style.display = 'none';
          projectTypeSummarySection.style.display = 'none';
          infrastructureSummarySection.style.display = 'none';
          moduleSummarySection.style.display = 'none';
          resilienceSummarySection.style.display = 'none';
          socialInclusionSection.style.display = 'none';
          youthSection.style.display = 'none';
          fourPSummarySection.style.display = 'none';
          ffsSummarySection.style.display = 'none';
          nrmSummarySection.style.display = 'none';
          agroEnterpriseSection.style.display = 'block';
          
          setTimeout(() => { createAgroEnterpriseCharts(); }, 100);
        } else if (selectedModule === 'nrm') {
          tankSelectionCard.style.display = 'none';
          tankChartSection.style.display = 'none';
          tankKpiSection.style.display = 'none';
          beneficiarySummarySection.style.display = 'none';
          projectTypeSummarySection.style.display = 'none';
          infrastructureSummarySection.style.display = 'none';
          moduleSummarySection.style.display = 'none';
          resilienceSummarySection.style.display = 'none';
          socialInclusionSection.style.display = 'none';
          youthSection.style.display = 'none';
          fourPSummarySection.style.display = 'none';
          agroEnterpriseSection.style.display = 'none';
          ffsSummarySection.style.display = 'none';
          nrmSummarySection.style.display = 'block';

          setTimeout(() => { createNRMCharts(); }, 100);
        } else if (selectedModule === 'ffs') {
          tankSelectionCard.style.display = 'none';
          tankChartSection.style.display = 'none';
          tankKpiSection.style.display = 'none';
          beneficiarySummarySection.style.display = 'none';
          projectTypeSummarySection.style.display = 'none';
          infrastructureSummarySection.style.display = 'none';
          moduleSummarySection.style.display = 'none';
          resilienceSummarySection.style.display = 'none';
          socialInclusionSection.style.display = 'none';
          youthSection.style.display = 'none';
          fourPSummarySection.style.display = 'none';
          agroEnterpriseSection.style.display = 'none';
          nrmSummarySection.style.display = 'none';
          ffsSummarySection.style.display = 'block';

          setTimeout(() => { createFFSCharts(); }, 100);
        } else if (selectedModule === 'nutrition_training') {
          tankSelectionCard.style.display = 'none';
          tankChartSection.style.display = 'none';
          tankKpiSection.style.display = 'none';
          beneficiarySummarySection.style.display = 'none';
          projectTypeSummarySection.style.display = 'none';
          infrastructureSummarySection.style.display = 'none';
          moduleSummarySection.style.display = 'none';
          resilienceSummarySection.style.display = 'none';
          socialInclusionSection.style.display = 'none';
          youthSection.style.display = 'none';
          fourPSummarySection.style.display = 'none';
          agroEnterpriseSection.style.display = 'none';
          nrmSummarySection.style.display = 'none';
          ffsSummarySection.style.display = 'none';
          nutritionSummarySection.style.display = 'none';
          nutritionSummarySection.style.display = 'block';

          setTimeout(() => { createNutritionCharts(); }, 100);
        } else if (selectedModule) {
          // Show module summary for other modules
          tankSelectionCard.style.display = 'none';
          tankChartSection.style.display = 'none';
          tankKpiSection.style.display = 'none';
          beneficiarySummarySection.style.display = 'none';
          projectTypeSummarySection.style.display = 'none';
          moduleSummarySection.style.display = 'block';
          infrastructureSummarySection.style.display = 'none';
          resilienceSummarySection.style.display = 'none';
          socialInclusionSection.style.display = 'none';
          youthSection.style.display = 'none';
          fourPSummarySection.style.display = 'none';
          agroEnterpriseSection.style.display = 'none';
          nrmSummarySection.style.display = 'none';
          ffsSummarySection.style.display = 'none';
          nutritionSummarySection.style.display = 'none';
          
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
          beneficiarySummarySection.style.display = 'none';
          projectTypeSummarySection.style.display = 'none';
          moduleSummarySection.style.display = 'block';
          moduleSummarySection.querySelector('.chart-title').textContent = 'Module Summary';
          moduleSummarySection.querySelector('.text-muted').textContent = 'Select a module from the dropdown above to view its summary';
          infrastructureSummarySection.style.display = 'none';
          resilienceSummarySection.style.display = 'none';
          socialInclusionSection.style.display = 'none';
          youthSection.style.display = 'none';
          fourPSummarySection.style.display = 'none';
          agroEnterpriseSection.style.display = 'none';
          nrmSummarySection.style.display = 'none';
          ffsSummarySection.style.display = 'none';
          nutritionSummarySection.style.display = 'none';
        }
      });

      function createInfrastructureCharts(){
        const statusCtx = document.getElementById('infrastructureStatusChart');
        const histCtx = document.getElementById('infrastructureProgressHistogram');
        if (!statusCtx || !histCtx) return;

        const infra = @json($infrastructureStats ?? []);
        const statusCounts = infra.status_counts || {identified:0, started:0, on_going:0, finished:0};

        new Chart(statusCtx, {
          type: 'bar',
          data: {
            labels: ['Identified','Started','On Going','Finished'],
            datasets: [{
              data: [statusCounts.identified||0, statusCounts.started||0, statusCounts.on_going||0, statusCounts.finished||0],
              backgroundColor: ['#6b7280','#3b82f6','#f59e0b','#10b981']
            }]
          },
          options: { plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, precision: 0 } } }
        });

        const buckets = (infra.progress_buckets || {b0_25:0,b26_50:0,b51_75:0,b76_99:0,b100:0});
        new Chart(histCtx, {
          type: 'bar',
          data: {
            labels: ['0–25','26–50','51–75','76–99','100'],
            datasets: [{
              data: [buckets.b0_25||0,buckets.b26_50||0,buckets.b51_75||0,buckets.b76_99||0,buckets.b100||0],
              backgroundColor: '#60a5fa'
            }]
          },
          options: { plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, precision: 0 } } }
        });
      }

      function createResilienceCharts(){
        const stats = @json($resilienceStats ?? []);
        if (!stats) return;

        // Agri vs Livestock bar
        const agLivCtx = document.getElementById('resilienceAgriVsLivestockBar');
        if (agLivCtx) {
          new Chart(agLivCtx, {
            type: 'bar',
            data: {
              labels: ['Agriculture','Livestock'],
              datasets: [{
                data: [stats.total_farmers_agri||0, stats.total_farmers_livestock||0],
                backgroundColor: ['#10b981','#3b82f6']
              }]
            },
            options: { plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, precision: 0 } } }
          });
        }

        // Bar: Farmers by Crop Type
        const cropLabels = Object.keys(stats.farmers_by_crop || {});
        const cropValues = Object.values(stats.farmers_by_crop || {});
        const cropCtx = document.getElementById('resilienceCropTypeBar');
        if (cropCtx) {
          new Chart(cropCtx, {
            type: 'bar',
            data: {
              labels: cropLabels.length ? cropLabels : ['No data'],
              datasets: [{
                data: cropValues.length ? cropValues : [0],
                backgroundColor: '#60a5fa'
              }]
            },
            options: { plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, precision: 0 } } }
          });
        }

        // Donut: Farmers by Crop Category
        const catLabels = Object.keys(stats.farmers_by_category || {});
        const catValues = Object.values(stats.farmers_by_category || {});
        const catCtx = document.getElementById('resilienceCategoryDonut');
        if (catCtx) {
          new Chart(catCtx, {
            type: 'doughnut',
            data: {
              labels: catLabels.length ? catLabels : ['No data'],
              datasets: [{
                data: catValues.length ? catValues : [1],
                backgroundColor: ['#10b981','#3b82f6','#f59e0b','#ef4444','#8b5cf6','#06b6d4','#ec4899','#84cc16']
              }]
            },
            options: { plugins: { legend: { display: true } }, cutout: '60%' }
          });
        }

        // Donut: Production Focus
        const focus = stats.production_focus || {};
        const fLabels = ['subsistence','commercial','mixed'];
        const fValues = [focus.subsistence||0, focus.commercial||0, focus.mixed||0];
        const fCtx = document.getElementById('resilienceFocusDonut');
        if (fCtx) {
          new Chart(fCtx, {
            type: 'doughnut',
            data: {
              labels: fLabels,
              datasets: [{
                data: fValues,
                backgroundColor: ['#22c55e','#f59e0b','#3b82f6']
              }]
            },
            options: { plugins: { legend: { display: true } }, cutout: '60%' }
          });
        }

        // Populate modal table with crop counts (sorted desc)
        const tbody = document.getElementById('cropCountTableBody');
        if (tbody) {
          tbody.innerHTML = '';
          const entries = Object.entries(stats.farmers_by_crop || {}).sort((a,b)=> (b[1]||0)-(a[1]||0));
          if (!entries.length) {
            tbody.innerHTML = '<tr><td colspan="2" class="text-center text-muted">No data</td></tr>';
          } else {
            entries.forEach(([name,count])=>{
              const tr = document.createElement('tr');
              const td1 = document.createElement('td');
              const td2 = document.createElement('td');
              td1.textContent = name ? name : '-';
              td2.textContent = Number(count||0).toLocaleString();
              td2.className = 'text-right';
              tr.appendChild(td1);
              tr.appendChild(td2);
              tbody.appendChild(tr);
            });
          }
        }
      }

      function createYouthChart(){
        const ctx = document.getElementById('youthAgreementDonut');
        if (!ctx) return;
        const ys = @json($youthStats ?? []);
        const total = (ys.total||0);
        const signed = (ys.signed||0);
        const notSigned = (ys.not_signed||0);
        
        // Calculate percentages
        const signedPercent = total > 0 ? ((signed / total) * 100).toFixed(1) : 0;
        const notSignedPercent = total > 0 ? ((notSigned / total) * 100).toFixed(1) : 0;
        
        // Update center text
        document.getElementById('youthTotalCount').textContent = total;
        document.getElementById('youthCompletionPercent').textContent = signedPercent + '% Complete';
        
        // Update card percentages
        document.getElementById('youthSignedPercent').textContent = signedPercent + '%';
        document.getElementById('youthPendingPercent').textContent = notSignedPercent + '%';
        
        new Chart(ctx, {
          type: 'doughnut',
          data: { 
            labels: ['Agreement Signed','Pending Signature'], 
            datasets: [{ 
              data: [signed, notSigned], 
              backgroundColor: ['#10b981','#ef4444'], 
              borderColor: '#ffffff', 
              borderWidth: 4,
              hoverBorderWidth: 6
            }] 
          },
          options: { 
            cutout: '70%', 
            plugins: { 
              legend: { 
                display: false 
              } 
            },
            responsive: true,
            maintainAspectRatio: false
          }
        });
      }

      function createSocialInclusionChart(){
        const ctx = document.getElementById('socialInclusionBar');
        if (!ctx) return;
        const s = @json($socialInclusionStats ?? []);
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['CDF','ASC','Farmer Org','Training','Grievances'],
            datasets: [{
              data: [s.cdf||0, s.asc||0, s.farmer_organization||0, s.training||0, s.grievances||0],
              backgroundColor: ['#3b82f6','#10b981','#f59e0b','#8b5cf6','#ef4444']
            }]
          },
          options: { plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, precision: 0 } } }
        });
      }

      function createFourPCharts(){
        const s = @json($fourPStats ?? []);
        const barCtx = document.getElementById('fourPStatusBar');
        const donutCtx = document.getElementById('fourPStatusDonut');
        if (barCtx) {
          new Chart(barCtx, {
            type: 'bar',
            data: {
              labels: ['Total','Rejected','BPEC Approved','Agreement Signed','IFAD Approved','NSC Approved'],
              datasets: [{
                data: [s.total||0, s.rejected||0, s.bpec_approved||0, s.agreement_signed||0, s.ifad_approved||0, s.nsc_approved||0],
                backgroundColor: ['#6366f1','#ef4444','#3b82f6','#10b981','#8b5cf6','#f59e0b']
              }]
            },
            options: { plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, precision: 0 } } }
          });
        }
        if (donutCtx) {
          new Chart(donutCtx, {
            type: 'doughnut',
            data: {
              labels: ['Rejected','BPEC','Signed','IFAD','NSC'],
              datasets: [{
                data: [s.rejected||0, s.bpec_approved||0, s.agreement_signed||0, s.ifad_approved||0, s.nsc_approved||0],
                backgroundColor: ['#ef4444','#3b82f6','#10b981','#8b5cf6','#f59e0b']
              }]
            },
            options: { plugins: { legend: { display: true } }, cutout: '60%' }
          });
        }
      }

      function createAgroEnterpriseCharts(){
        const stats = @json($agroEnterpriseStats ?? []);
        if (!stats) return;

        // Business Nature Chart
        const businessNatureCtx = document.getElementById('businessNatureChart');
        const businessNatureCenterEl = document.getElementById('business-nature-center');
        let businessNatureChart = null;

        if (businessNatureCtx) {
          const businessNatureData = stats.business_nature || {};
          const businessLabels = Object.keys(businessNatureData);
          const businessValues = Object.values(businessNatureData);
          const businessColors = ['#3b82f6', '#10b981', '#f59e0b', '#8b5cf6', '#06b6d4', '#ec4899', '#84cc16', '#f97316'];

          function createBusinessNatureChart() {
            if (businessNatureChart) {
              businessNatureChart.destroy();
            }

            const totalEnterprises = stats.total_enterprises || 0;
            
            function setBusinessNatureCenter(title, count, pct) {
              if (pct === null) {
                businessNatureCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title}</div>`;
              } else {
                businessNatureCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title} · ${pct.toFixed(1)}%</div>`;
              }
            }

            setBusinessNatureCenter('Total Enterprises', totalEnterprises, null);

            const chartData = businessValues.length > 0 ? businessValues : [1];
            const chartLabels = businessValues.length > 0 ? businessLabels : ['No data'];
            const chartColors = businessValues.length > 0 ? businessColors.slice(0, businessValues.length) : ['#e5e7eb'];

            businessNatureChart = new Chart(businessNatureCtx, {
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
                  tooltip: { enabled: businessValues.length > 0 } 
                },
                onClick(evt, items) {
                  if (!items.length) { 
                    setBusinessNatureCenter('Total Enterprises', totalEnterprises, null); 
                    return; 
                  }
                  const idx = items[0].index;
                  const val = this.data.datasets[0].data[idx] || 0;
                  const pct = totalEnterprises ? (val/totalEnterprises*100) : 0;
                  setBusinessNatureCenter(this.data.labels[idx], val, pct);
                }
              }
            });
          }

          createBusinessNatureChart();
        }

        // Shareholder Gender Chart
        const shareholderGenderCtx = document.getElementById('shareholderGenderChart');
        const shareholderGenderCenterEl = document.getElementById('shareholder-gender-center');
        let shareholderGenderChart = null;

        if (shareholderGenderCtx) {
          const shareholderGenderData = stats.shareholder_gender || {};
          const genderLabels = [];
          const genderValues = [];
          const genderColors = [];

          if (shareholderGenderData.male > 0) {
            genderLabels.push('Male');
            genderValues.push(shareholderGenderData.male);
            genderColors.push('#3b82f6');
          }
          if (shareholderGenderData.female > 0) {
            genderLabels.push('Female');
            genderValues.push(shareholderGenderData.female);
            genderColors.push('#ec4899');
          }
          if (shareholderGenderData.other > 0) {
            genderLabels.push('Other');
            genderValues.push(shareholderGenderData.other);
            genderColors.push('#6b7280');
          }

          function createShareholderGenderChart() {
            if (shareholderGenderChart) {
              shareholderGenderChart.destroy();
            }

            const totalShareholders = stats.total_shareholders || 0;
            
            function setShareholderGenderCenter(title, count, pct) {
              if (pct === null) {
                shareholderGenderCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title}</div>`;
              } else {
                shareholderGenderCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title} · ${pct.toFixed(1)}%</div>`;
              }
            }

            setShareholderGenderCenter('Total Shareholders', totalShareholders, null);

            const chartData = genderValues.length > 0 ? genderValues : [1];
            const chartLabels = genderValues.length > 0 ? genderLabels : ['No data'];
            const chartColors = genderValues.length > 0 ? genderColors : ['#e5e7eb'];

            shareholderGenderChart = new Chart(shareholderGenderCtx, {
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
                  tooltip: { enabled: genderValues.length > 0 } 
                },
                onClick(evt, items) {
                  if (!items.length) { 
                    setShareholderGenderCenter('Total Shareholders', totalShareholders, null); 
                    return; 
                  }
                  const idx = items[0].index;
                  const val = this.data.datasets[0].data[idx] || 0;
                  const pct = totalShareholders ? (val/totalShareholders*100) : 0;
                  setShareholderGenderCenter(this.data.labels[idx], val, pct);
                }
              }
            });
          }

          createShareholderGenderChart();
        }

        // Asset Distribution Chart
        const assetDistributionCtx = document.getElementById('assetDistributionChart');
        if (assetDistributionCtx) {
          const assetData = stats.asset_distribution || [];
          const topAssets = assetData.slice(0, 10); // Top 10 assets
          
          const assetLabels = topAssets.map(asset => asset.name);
          const assetValues = topAssets.map(asset => asset.total_value);

          new Chart(assetDistributionCtx, {
            type: 'bar',
            data: {
              labels: assetLabels.length > 0 ? assetLabels : ['No data'],
              datasets: [{
                data: assetValues.length > 0 ? assetValues : [0],
                backgroundColor: '#f59e0b',
                borderColor: '#d97706',
                borderWidth: 1
              }]
            },
            options: {
              plugins: { 
                legend: { display: false },
                tooltip: {
                  callbacks: {
                    label: function(context) {
                      return context.parsed.y.toLocaleString('en-US', {
                        style: 'currency',
                        currency: 'USD'
                      });
                    }
                  }
                }
              },
              scales: { 
                y: { 
                  beginAtZero: true,
                  ticks: {
                    callback: function(value) {
                      return '$' + value.toLocaleString();
                    }
                  }
                },
                x: {
                  ticks: {
                    maxRotation: 45,
                    minRotation: 45
                  }
                }
              }
            }
          });
        }

        // Species Distribution Chart
        const speciesDistributionCtx = document.getElementById('speciesDistributionChart');
        if (speciesDistributionCtx) {
          const speciesData = stats.species_distribution || [];
          const topSpecies = speciesData.slice(0, 10); // Top 10 species
          
          const speciesLabels = topSpecies.map(species => species.name);
          const speciesValues = topSpecies.map(species => species.total_plants);

          new Chart(speciesDistributionCtx, {
            type: 'bar',
            data: {
              labels: speciesLabels.length > 0 ? speciesLabels : ['No data'],
              datasets: [{
                data: speciesValues.length > 0 ? speciesValues : [0],
                backgroundColor: '#8b5cf6',
                borderColor: '#7c3aed',
                borderWidth: 1
              }]
            },
            options: {
              plugins: { 
                legend: { display: false },
                tooltip: {
                  callbacks: {
                    label: function(context) {
                      return context.parsed.y.toLocaleString() + ' plants';
                    }
                  }
                }
              },
              scales: { 
                y: { 
                  beginAtZero: true,
                  ticks: {
                    callback: function(value) {
                      return value.toLocaleString();
                    }
                  }
                },
                x: {
                  ticks: {
                    maxRotation: 45,
                    minRotation: 45
                  }
                }
              }
            }
          });
        }

        // Province Distribution Chart
        const provinceDistributionCtx = document.getElementById('provinceDistributionChart');
        if (provinceDistributionCtx) {
          const provinceData = stats.province_distribution || [];
          
          const provinceLabels = provinceData.map(province => province.name);
          const provinceValues = provinceData.map(province => province.total_hectares);

          new Chart(provinceDistributionCtx, {
            type: 'bar',
            data: {
              labels: provinceLabels.length > 0 ? provinceLabels : ['No data'],
              datasets: [{
                data: provinceValues.length > 0 ? provinceValues : [0],
                backgroundColor: '#06b6d4',
                borderColor: '#0891b2',
                borderWidth: 1
              }]
            },
            options: {
              plugins: { 
                legend: { display: false },
                tooltip: {
                  callbacks: {
                    label: function(context) {
                      return context.parsed.y.toLocaleString() + ' hectares';
                    }
                  }
                }
              },
              scales: { 
                y: { 
                  beginAtZero: true,
                  ticks: {
                    callback: function(value) {
                      return value.toLocaleString() + ' ha';
                    }
                  }
                },
                x: {
                  ticks: {
                    maxRotation: 45,
                    minRotation: 45
                  }
                }
              }
            }
          });
        }
      }

      function createNRMCharts(){
        const stats = @json($nrmStats ?? []);
        if (!stats) return;

        // NRM Participant Gender Chart
        const nrmParticipantGenderCtx = document.getElementById('nrmParticipantGenderChart');
        const nrmParticipantGenderCenterEl = document.getElementById('nrm-participant-gender-center');
        let nrmParticipantGenderChart = null;

        if (nrmParticipantGenderCtx) {
          const participantGenderData = stats.participant_gender || {};
          const genderLabels = [];
          const genderValues = [];
          const genderColors = [];

          if (participantGenderData.male > 0) {
            genderLabels.push('Male');
            genderValues.push(participantGenderData.male);
            genderColors.push('#3b82f6');
          }
          if (participantGenderData.female > 0) {
            genderLabels.push('Female');
            genderValues.push(participantGenderData.female);
            genderColors.push('#ec4899');
          }

          function createNRMParticipantGenderChart() {
            if (nrmParticipantGenderChart) {
              nrmParticipantGenderChart.destroy();
            }

            const totalParticipants = stats.total_participants || 0;
            
            function setNRMParticipantGenderCenter(title, count, pct) {
              if (pct === null) {
                nrmParticipantGenderCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title}</div>`;
              } else {
                nrmParticipantGenderCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title} · ${pct.toFixed(1)}%</div>`;
              }
            }

            setNRMParticipantGenderCenter('Total Participants', totalParticipants, null);

            const chartData = genderValues.length > 0 ? genderValues : [1];
            const chartLabels = genderValues.length > 0 ? genderLabels : ['No data'];
            const chartColors = genderValues.length > 0 ? genderColors : ['#e5e7eb'];

            nrmParticipantGenderChart = new Chart(nrmParticipantGenderCtx, {
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
                  tooltip: { enabled: genderValues.length > 0 } 
                },
                onClick(evt, items) {
                  if (!items.length) { 
                    setNRMParticipantGenderCenter('Total Participants', totalParticipants, null); 
                    return; 
                  }
                  const idx = items[0].index;
                  const val = this.data.datasets[0].data[idx] || 0;
                  const pct = totalParticipants ? (val/totalParticipants*100) : 0;
                  setNRMParticipantGenderCenter(this.data.labels[idx], val, pct);
                }
              }
            });
          }

          createNRMParticipantGenderChart();
        }

        // NRM Crop Distribution Chart
        const nrmCropDistributionCtx = document.getElementById('nrmCropDistributionChart');
        const nrmCropCenterEl = document.getElementById('nrm-crop-center');
        let nrmCropDistributionChart = null;

        if (nrmCropDistributionCtx) {
          const cropData = stats.crop_distribution || {};
          const cropLabels = Object.keys(cropData);
          const cropValues = Object.values(cropData);
          const cropColors = ['#10b981', '#3b82f6', '#f59e0b', '#8b5cf6', '#06b6d4', '#ec4899', '#84cc16', '#f97316'];

          function createNRMCropDistributionChart() {
            if (nrmCropDistributionChart) {
              nrmCropDistributionChart.destroy();
            }

            const totalPrograms = stats.total_training_programs || 0;
            
            function setNRMCropCenter(title, count, pct) {
              if (pct === null) {
                nrmCropCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title}</div>`;
              } else {
                nrmCropCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title} · ${pct.toFixed(1)}%</div>`;
              }
            }

            setNRMCropCenter('Training Programs', totalPrograms, null);

            const chartData = cropValues.length > 0 ? cropValues : [1];
            const chartLabels = cropValues.length > 0 ? cropLabels : ['No data'];
            const chartColors = cropValues.length > 0 ? cropColors.slice(0, cropValues.length) : ['#e5e7eb'];

            nrmCropDistributionChart = new Chart(nrmCropDistributionCtx, {
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
                  tooltip: { enabled: cropValues.length > 0 } 
                },
                onClick(evt, items) {
                  if (!items.length) { 
                    setNRMCropCenter('Training Programs', totalPrograms, null); 
                    return; 
                  }
                  const idx = items[0].index;
                  const val = this.data.datasets[0].data[idx] || 0;
                  const pct = totalPrograms ? (val/totalPrograms*100) : 0;
                  setNRMCropCenter(this.data.labels[idx], val, pct);
                }
              }
            });
          }

          createNRMCropDistributionChart();
        }

        // NRM Province Distribution Chart
        const nrmProvinceDistributionCtx = document.getElementById('nrmProvinceDistributionChart');
        if (nrmProvinceDistributionCtx) {
          const provinceData = stats.province_distribution || {};
          const provinceLabels = Object.keys(provinceData);
          const provinceValues = Object.values(provinceData);

          new Chart(nrmProvinceDistributionCtx, {
            type: 'bar',
            data: {
              labels: provinceLabels.length > 0 ? provinceLabels : ['No data'],
              datasets: [{
                data: provinceValues.length > 0 ? provinceValues : [0],
                backgroundColor: '#f59e0b',
                borderColor: '#d97706',
                borderWidth: 1
              }]
            },
            options: {
              plugins: { 
                legend: { display: false },
                tooltip: {
                  callbacks: {
                    label: function(context) {
                      return context.parsed.y + ' programs';
                    }
                  }
                }
              },
              scales: { 
                y: { 
                  beginAtZero: true,
                  ticks: {
                    precision: 0
                  }
                },
                x: {
                  ticks: {
                    maxRotation: 45,
                    minRotation: 45
                  }
                }
              }
            }
          });
        }

        // NRM Production Focus Chart
        const nrmProductionFocusCtx = document.getElementById('nrmProductionFocusChart');
        if (nrmProductionFocusCtx) {
          const productionData = stats.production_focus || {};
          const productionLabels = Object.keys(productionData);
          const productionValues = Object.values(productionData);

          new Chart(nrmProductionFocusCtx, {
            type: 'bar',
            data: {
              labels: productionLabels.length > 0 ? productionLabels : ['No data'],
              datasets: [{
                data: productionValues.length > 0 ? productionValues : [0],
                backgroundColor: '#8b5cf6',
                borderColor: '#7c3aed',
                borderWidth: 1
              }]
            },
            options: {
              plugins: { 
                legend: { display: false },
                tooltip: {
                  callbacks: {
                    label: function(context) {
                      return context.parsed.y + ' gardens';
                    }
                  }
                }
              },
              scales: { 
                y: { 
                  beginAtZero: true,
                  ticks: {
                    precision: 0
                  }
                },
                x: {
                  ticks: {
                    maxRotation: 45,
                    minRotation: 45
                  }
                }
              }
            }
          });
        }

        // NRM Resource Person Chart
        const nrmResourcePersonCtx = document.getElementById('nrmResourcePersonChart');
        if (nrmResourcePersonCtx) {
          const resourceData = stats.top_resource_persons || {};
          const resourceLabels = Object.keys(resourceData);
          const resourceValues = Object.values(resourceData);

          new Chart(nrmResourcePersonCtx, {
            type: 'bar',
            data: {
              labels: resourceLabels.length > 0 ? resourceLabels : ['No data'],
              datasets: [{
                data: resourceValues.length > 0 ? resourceValues : [0],
                backgroundColor: '#06b6d4',
                borderColor: '#0891b2',
                borderWidth: 1
              }]
            },
            options: {
              plugins: { 
                legend: { display: false },
                tooltip: {
                  callbacks: {
                    label: function(context) {
                      return context.parsed.y + ' programs';
                    }
                  }
                }
              },
              scales: { 
                y: { 
                  beginAtZero: true,
                  ticks: {
                    precision: 0
                  }
                },
                x: {
                  ticks: {
                    maxRotation: 45,
                    minRotation: 45
                  }
                }
              }
            }
          });
        }
      }

      function createFFSCharts(){
        const stats = @json($ffsStats ?? []);
        if (!stats) return;

        // FFS Participant Gender Chart
        const ffsParticipantGenderCtx = document.getElementById('ffsParticipantGenderChart');
        const ffsParticipantGenderCenterEl = document.getElementById('ffs-participant-gender-center');
        let ffsParticipantGenderChart = null;

        if (ffsParticipantGenderCtx) {
          const participantGenderData = stats.demographics_summary || {};
          const genderLabels = [];
          const genderValues = [];
          const genderColors = [];

          if (participantGenderData.male_participants > 0) {
            genderLabels.push('Male');
            genderValues.push(participantGenderData.male_participants);
            genderColors.push('#3b82f6');
          }
          if (participantGenderData.female_participants > 0) {
            genderLabels.push('Female');
            genderValues.push(participantGenderData.female_participants);
            genderColors.push('#ec4899');
          }

          function createFFSParticipantGenderChart() {
            if (ffsParticipantGenderChart) {
              ffsParticipantGenderChart.destroy();
            }

            const totalParticipants = stats.total_participants || 0;
            
            function setFFSParticipantGenderCenter(title, count, pct) {
              if (pct === null) {
                ffsParticipantGenderCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title}</div>`;
              } else {
                ffsParticipantGenderCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title} · ${pct.toFixed(1)}%</div>`;
              }
            }

            setFFSParticipantGenderCenter('Total Participants', totalParticipants, null);

            const chartData = genderValues.length > 0 ? genderValues : [1];
            const chartLabels = genderValues.length > 0 ? genderLabels : ['No data'];
            const chartColors = genderValues.length > 0 ? genderColors : ['#e5e7eb'];

            ffsParticipantGenderChart = new Chart(ffsParticipantGenderCtx, {
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
                  legend: { 
                    display: true,
                    position: 'bottom',
                    labels: {
                      usePointStyle: true,
                      padding: 20,
                      font: {
                        size: 12,
                        weight: '500'
                      }
                    }
                  }, 
                  tooltip: { 
                    enabled: genderValues.length > 0,
                    callbacks: {
                      label: function(context) {
                        const label = context.label || '';
                        const value = context.parsed;
                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                        const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                        return `${label}: ${value} (${percentage}%)`;
                      }
                    }
                  } 
                },
                onClick(evt, items) {
                  if (!items.length) { 
                    setFFSParticipantGenderCenter('Total Participants', totalParticipants, null); 
                    return; 
                  }
                  const idx = items[0].index;
                  const val = this.data.datasets[0].data[idx] || 0;
                  const pct = totalParticipants ? (val/totalParticipants*100) : 0;
                  setFFSParticipantGenderCenter(this.data.labels[idx], val, pct);
                }
              }
            });
          }

          createFFSParticipantGenderChart();
        }

        // FFS Crop Distribution Chart
        const ffsCropDistributionCtx = document.getElementById('ffsCropDistributionChart');
        const ffsCropCenterEl = document.getElementById('ffs-crop-center');
        let ffsCropDistributionChart = null;

        if (ffsCropDistributionCtx) {
          const cropData = stats.crop_distribution || {};
          const cropLabels = [];
          const cropValues = [];
          const cropColors = ['#10b981', '#3b82f6', '#f59e0b', '#8b5cf6', '#ec4899', '#06b6d4', '#ef4444'];

          Object.entries(cropData).forEach(([crop, count], index) => {
            if (count > 0) {
              cropLabels.push(crop);
              cropValues.push(count);
              cropColors.push(cropColors[index % cropColors.length]);
            }
          });

          function createFFSCropDistributionChart() {
            if (ffsCropDistributionChart) {
              ffsCropDistributionChart.destroy();
            }

            const totalPrograms = stats.total_training_programs || 0;
            
            function setFFSCropCenter(title, count, pct) {
              if (pct === null) {
                ffsCropCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title}</div>`;
              } else {
                ffsCropCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title} · ${pct.toFixed(1)}%</div>`;
              }
            }

            setFFSCropCenter('Training Programs', totalPrograms, null);

            const chartData = cropValues.length > 0 ? cropValues : [1];
            const chartLabels = cropValues.length > 0 ? cropLabels : ['No data'];
            const chartColors = cropValues.length > 0 ? cropColors.slice(0, cropValues.length) : ['#e5e7eb'];

            ffsCropDistributionChart = new Chart(ffsCropDistributionCtx, {
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
                  legend: { 
                    display: true,
                    position: 'bottom',
                    labels: {
                      usePointStyle: true,
                      padding: 20,
                      font: {
                        size: 12,
                        weight: '500'
                      }
                    }
                  }, 
                  tooltip: { 
                    enabled: cropValues.length > 0,
                    callbacks: {
                      label: function(context) {
                        const label = context.label || '';
                        const value = context.parsed;
                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                        const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                        return `${label}: ${value} programs (${percentage}%)`;
                      }
                    }
                  } 
                },
                onClick(evt, items) {
                  if (!items.length) { 
                    setFFSCropCenter('Training Programs', totalPrograms, null); 
                    return; 
                  }
                  const idx = items[0].index;
                  const val = this.data.datasets[0].data[idx] || 0;
                  const pct = totalPrograms ? (val/totalPrograms*100) : 0;
                  setFFSCropCenter(this.data.labels[idx], val, pct);
                }
              }
            });
          }

          createFFSCropDistributionChart();
        }

        // FFS Province Chart
        const ffsProvinceCtx = document.getElementById('ffsProvinceChart');
        if (ffsProvinceCtx) {
          const provinceData = stats.province_distribution || {};
          const provinceLabels = Object.keys(provinceData);
          const provinceValues = Object.values(provinceData);

          new Chart(ffsProvinceCtx, {
            type: 'bar',
            data: {
              labels: provinceLabels,
              datasets: [{
                label: 'Training Programs',
                data: provinceValues,
                backgroundColor: '#3b82f6',
                borderColor: '#1d4ed8',
                borderWidth: 1
              }]
            },
            options: {
              plugins: { 
                legend: { 
                  display: true,
                  position: 'top',
                  labels: {
                    usePointStyle: true,
                    padding: 20,
                    font: {
                      size: 12,
                      weight: '500'
                    }
                  }
                },
                tooltip: {
                  callbacks: {
                    label: function(context) {
                      return `${context.dataset.label}: ${context.parsed.y} programs`;
                    }
                  }
                }
              },
              scales: { 
                y: { 
                  beginAtZero: true,
                  ticks: {
                    precision: 0
                  }
                },
                x: {
                  ticks: {
                    maxRotation: 45,
                    minRotation: 45
                  }
                }
              }
            }
          });
        }

        // FFS Designation Chart
        const ffsDesignationCtx = document.getElementById('ffsDesignationChart');
        if (ffsDesignationCtx) {
          const designationData = stats.designation_distribution || {};
          const designationLabels = Object.keys(designationData);
          const designationValues = Object.values(designationData);

          new Chart(ffsDesignationCtx, {
            type: 'bar',
            data: {
              labels: designationLabels,
              datasets: [{
                label: 'Participants',
                data: designationValues,
                backgroundColor: '#8b5cf6',
                borderColor: '#7c3aed',
                borderWidth: 1
              }]
            },
            options: {
              plugins: { 
                legend: { 
                  display: true,
                  position: 'top',
                  labels: {
                    usePointStyle: true,
                    padding: 20,
                    font: {
                      size: 12,
                      weight: '500'
                    }
                  }
                },
                tooltip: {
                  callbacks: {
                    label: function(context) {
                      return `${context.dataset.label}: ${context.parsed.y} participants`;
                    }
                  }
                }
              },
              scales: { 
                y: { 
                  beginAtZero: true,
                  ticks: {
                    precision: 0
                  }
                },
                x: {
                  ticks: {
                    maxRotation: 45,
                    minRotation: 45
                  }
                }
              }
            }
          });
        }

        // FFS Resource Person Chart
        const ffsResourcePersonCtx = document.getElementById('ffsResourcePersonChart');
        if (ffsResourcePersonCtx) {
          const resourcePersonData = stats.top_resource_persons || {};
          const resourcePersonLabels = Object.keys(resourcePersonData);
          const resourcePersonValues = Object.values(resourcePersonData);

          new Chart(ffsResourcePersonCtx, {
            type: 'bar',
            data: {
              labels: resourcePersonLabels,
              datasets: [{
                label: 'Programs Conducted',
                data: resourcePersonValues,
                backgroundColor: '#06b6d4',
                borderColor: '#0891b2',
                borderWidth: 1
              }]
            },
            options: {
              plugins: { 
                legend: { 
                  display: true,
                  position: 'top',
                  labels: {
                    usePointStyle: true,
                    padding: 20,
                    font: {
                      size: 12,
                      weight: '500'
                    }
                  }
                },
                tooltip: {
                  callbacks: {
                    label: function(context) {
                      return `${context.dataset.label}: ${context.parsed.y} programs`;
                    }
                  }
                }
              },
              scales: { 
                y: { 
                  beginAtZero: true,
                  ticks: {
                    precision: 0
                  }
                },
                x: {
                  ticks: {
                    maxRotation: 45,
                    minRotation: 45
                  }
                }
              }
            }
          });
        }

        // FFS Venue Chart
        const ffsVenueCtx = document.getElementById('ffsVenueChart');
        if (ffsVenueCtx) {
          const venueData = stats.venue_distribution || {};
          const venueLabels = Object.keys(venueData);
          const venueValues = Object.values(venueData);

          new Chart(ffsVenueCtx, {
            type: 'bar',
            data: {
              labels: venueLabels,
              datasets: [{
                label: 'Training Programs',
                data: venueValues,
                backgroundColor: '#ec4899',
                borderColor: '#db2777',
                borderWidth: 1
              }]
            },
            options: {
              plugins: { 
                legend: { 
                  display: true,
                  position: 'top',
                  labels: {
                    usePointStyle: true,
                    padding: 20,
                    font: {
                      size: 12,
                      weight: '500'
                    }
                  }
                },
                tooltip: {
                  callbacks: {
                    label: function(context) {
                      return `${context.dataset.label}: ${context.parsed.y} programs`;
                    }
                  }
                }
              },
              scales: { 
                y: { 
                  beginAtZero: true,
                  ticks: {
                    precision: 0
                  }
                },
                x: {
                  ticks: {
                    maxRotation: 45,
                    minRotation: 45
                  }
                }
              }
            }
          });
        }
      }

      function createNutritionCharts(){
        const stats = @json($nutritionStats ?? []);
        if (!stats) return;

        // Nutrition Trainee Gender Chart
        const nutritionTraineeGenderCtx = document.getElementById('nutritionTraineeGenderChart');
        const nutritionTraineeGenderCenterEl = document.getElementById('nutrition-trainee-gender-center');
        let nutritionTraineeGenderChart = null;

        if (nutritionTraineeGenderCtx) {
          const traineeGenderData = stats.demographics_summary || {};
          const genderLabels = [];
          const genderValues = [];
          const genderColors = [];

          if (traineeGenderData.male_trainees > 0) {
            genderLabels.push('Male');
            genderValues.push(traineeGenderData.male_trainees);
            genderColors.push('#3b82f6');
          }
          if (traineeGenderData.female_trainees > 0) {
            genderLabels.push('Female');
            genderValues.push(traineeGenderData.female_trainees);
            genderColors.push('#ec4899');
          }

          function createNutritionTraineeGenderChart() {
            if (nutritionTraineeGenderChart) {
              nutritionTraineeGenderChart.destroy();
            }

            const totalTrainees = stats.total_trainees || 0;
            
            function setNutritionTraineeGenderCenter(title, count, pct) {
              if (pct === null) {
                nutritionTraineeGenderCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title}</div>`;
              } else {
                nutritionTraineeGenderCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title} · ${pct.toFixed(1)}%</div>`;
              }
            }

            setNutritionTraineeGenderCenter('Total Trainees', totalTrainees, null);

            const chartData = genderValues.length > 0 ? genderValues : [1];
            const chartLabels = genderValues.length > 0 ? genderLabels : ['No data'];
            const chartColors = genderValues.length > 0 ? genderColors : ['#e5e7eb'];

            nutritionTraineeGenderChart = new Chart(nutritionTraineeGenderCtx, {
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
                  legend: { 
                    display: true,
                    position: 'bottom',
                    labels: {
                      usePointStyle: true,
                      padding: 20,
                      font: {
                        size: 12,
                        weight: '500'
                      }
                    }
                  }, 
                  tooltip: { 
                    enabled: genderValues.length > 0,
                    callbacks: {
                      label: function(context) {
                        const label = context.label || '';
                        const value = context.parsed;
                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                        const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                        return `${label}: ${value} (${percentage}%)`;
                      }
                    }
                  } 
                },
                onClick(evt, items) {
                  if (!items.length) { 
                    setNutritionTraineeGenderCenter('Total Trainees', totalTrainees, null); 
                    return; 
                  }
                  const idx = items[0].index;
                  const val = this.data.datasets[0].data[idx] || 0;
                  const pct = totalTrainees ? (val/totalTrainees*100) : 0;
                  setNutritionTraineeGenderCenter(this.data.labels[idx], val, pct);
                }
              }
            });
          }

          createNutritionTraineeGenderChart();
        }

        // Nutrition Program Type Chart
        const nutritionProgramTypeCtx = document.getElementById('nutritionProgramTypeChart');
        const nutritionProgramTypeCenterEl = document.getElementById('nutrition-program-type-center');
        let nutritionProgramTypeChart = null;

        if (nutritionProgramTypeCtx) {
          const programTypeData = stats.program_type_distribution || {};
          const programTypeLabels = [];
          const programTypeValues = [];
          const programTypeColors = ['#10b981', '#3b82f6', '#f59e0b', '#8b5cf6', '#ec4899', '#06b6d4', '#ef4444'];

          Object.entries(programTypeData).forEach(([type, count], index) => {
            if (count > 0) {
              programTypeLabels.push(type);
              programTypeValues.push(count);
              programTypeColors.push(programTypeColors[index % programTypeColors.length]);
            }
          });

          function createNutritionProgramTypeChart() {
            if (nutritionProgramTypeChart) {
              nutritionProgramTypeChart.destroy();
            }

            const totalPrograms = stats.total_nutrition_programs || 0;
            
            function setNutritionProgramTypeCenter(title, count, pct) {
              if (pct === null) {
                nutritionProgramTypeCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title}</div>`;
              } else {
                nutritionProgramTypeCenterEl.innerHTML = `<div class="big">${count}</div><div class="small">${title} · ${pct.toFixed(1)}%</div>`;
              }
            }

            setNutritionProgramTypeCenter('Training Programs', totalPrograms, null);

            const chartData = programTypeValues.length > 0 ? programTypeValues : [1];
            const chartLabels = programTypeValues.length > 0 ? programTypeLabels : ['No data'];
            const chartColors = programTypeValues.length > 0 ? programTypeColors.slice(0, programTypeValues.length) : ['#e5e7eb'];

            nutritionProgramTypeChart = new Chart(nutritionProgramTypeCtx, {
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
                  legend: { 
                    display: true,
                    position: 'bottom',
                    labels: {
                      usePointStyle: true,
                      padding: 20,
                      font: {
                        size: 12,
                        weight: '500'
                      }
                    }
                  }, 
                  tooltip: { 
                    enabled: programTypeValues.length > 0,
                    callbacks: {
                      label: function(context) {
                        const label = context.label || '';
                        const value = context.parsed;
                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                        const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                        return `${label}: ${value} programs (${percentage}%)`;
                      }
                    }
                  } 
                },
                onClick(evt, items) {
                  if (!items.length) { 
                    setNutritionProgramTypeCenter('Training Programs', totalPrograms, null); 
                    return; 
                  }
                  const idx = items[0].index;
                  const val = this.data.datasets[0].data[idx] || 0;
                  const pct = totalPrograms ? (val/totalPrograms*100) : 0;
                  setNutritionProgramTypeCenter(this.data.labels[idx], val, pct);
                }
              }
            });
          }

          createNutritionProgramTypeChart();
        }

        // Nutrition Province Chart
        const nutritionProvinceCtx = document.getElementById('nutritionProvinceChart');
        if (nutritionProvinceCtx) {
          const provinceData = stats.province_distribution || {};
          const provinceLabels = Object.keys(provinceData);
          const provinceValues = Object.values(provinceData);

          new Chart(nutritionProvinceCtx, {
            type: 'bar',
            data: {
              labels: provinceLabels,
              datasets: [{
                label: 'Training Programs',
                data: provinceValues,
                backgroundColor: '#3b82f6',
                borderColor: '#1d4ed8',
                borderWidth: 1
              }]
            },
            options: {
              plugins: { 
                legend: { 
                  display: true,
                  position: 'top',
                  labels: {
                    usePointStyle: true,
                    padding: 20,
                    font: {
                      size: 12,
                      weight: '500'
                    }
                  }
                },
                tooltip: {
                  callbacks: {
                    label: function(context) {
                      return `${context.dataset.label}: ${context.parsed.y} programs`;
                    }
                  }
                }
              },
              scales: { 
                y: { 
                  beginAtZero: true,
                  ticks: {
                    precision: 0
                  }
                },
                x: {
                  ticks: {
                    maxRotation: 45,
                    minRotation: 45
                  }
                }
              }
            }
          });
        }

        // Nutrition Education Chart
        const nutritionEducationCtx = document.getElementById('nutritionEducationChart');
        if (nutritionEducationCtx) {
          const educationData = stats.education_distribution || {};
          const educationLabels = Object.keys(educationData);
          const educationValues = Object.values(educationData);

          new Chart(nutritionEducationCtx, {
            type: 'bar',
            data: {
              labels: educationLabels,
              datasets: [{
                label: 'Trainees',
                data: educationValues,
                backgroundColor: '#8b5cf6',
                borderColor: '#7c3aed',
                borderWidth: 1
              }]
            },
            options: {
              plugins: { 
                legend: { 
                  display: true,
                  position: 'top',
                  labels: {
                    usePointStyle: true,
                    padding: 20,
                    font: {
                      size: 12,
                      weight: '500'
                    }
                  }
                },
                tooltip: {
                  callbacks: {
                    label: function(context) {
                      return `${context.dataset.label}: ${context.parsed.y} trainees`;
                    }
                  }
                }
              },
              scales: { 
                y: { 
                  beginAtZero: true,
                  ticks: {
                    precision: 0
                  }
                },
                x: {
                  ticks: {
                    maxRotation: 45,
                    minRotation: 45
                  }
                }
              }
            }
          });
        }

        // Nutrition Conductor Chart
        const nutritionConductorCtx = document.getElementById('nutritionConductorChart');
        if (nutritionConductorCtx) {
          const conductorData = stats.top_conductors || {};
          const conductorLabels = Object.keys(conductorData);
          const conductorValues = Object.values(conductorData);

          new Chart(nutritionConductorCtx, {
            type: 'bar',
            data: {
              labels: conductorLabels,
              datasets: [{
                label: 'Programs Conducted',
                data: conductorValues,
                backgroundColor: '#06b6d4',
                borderColor: '#0891b2',
                borderWidth: 1
              }]
            },
            options: {
              plugins: { 
                legend: { 
                  display: true,
                  position: 'top',
                  labels: {
                    usePointStyle: true,
                    padding: 20,
                    font: {
                      size: 12,
                      weight: '500'
                    }
                  }
                },
                tooltip: {
                  callbacks: {
                    label: function(context) {
                      return `${context.dataset.label}: ${context.parsed.y} programs`;
                    }
                  }
                }
              },
              scales: { 
                y: { 
                  beginAtZero: true,
                  ticks: {
                    precision: 0
                  }
                },
                x: {
                  ticks: {
                    maxRotation: 45,
                    minRotation: 45
                  }
                }
              }
            }
          });
        }

        // Nutrition Income Chart
        const nutritionIncomeCtx = document.getElementById('nutritionIncomeChart');
        if (nutritionIncomeCtx) {
          const incomeData = stats.income_distribution || {};
          const incomeLabels = Object.keys(incomeData);
          const incomeValues = Object.values(incomeData);

          new Chart(nutritionIncomeCtx, {
            type: 'bar',
            data: {
              labels: incomeLabels,
              datasets: [{
                label: 'Trainees',
                data: incomeValues,
                backgroundColor: '#ec4899',
                borderColor: '#db2777',
                borderWidth: 1
              }]
            },
            options: {
              plugins: { 
                legend: { 
                  display: true,
                  position: 'top',
                  labels: {
                    usePointStyle: true,
                    padding: 20,
                    font: {
                      size: 12,
                      weight: '500'
                    }
                  }
                },
                tooltip: {
                  callbacks: {
                    label: function(context) {
                      return `${context.dataset.label}: ${context.parsed.y} trainees`;
                    }
                  }
                }
              },
              scales: { 
                y: { 
                  beginAtZero: true,
                  ticks: {
                    precision: 0
                  }
                },
                x: {
                  ticks: {
                    maxRotation: 45,
                    minRotation: 45
                  }
                }
              }
            }
          });
        }
      }
    })();
  </script>
</body>
</html>
