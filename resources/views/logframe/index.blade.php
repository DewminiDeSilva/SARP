@extends('layouts.blank')

@section('content')
<style>
/* ====== Logframe Navigation Styles ====== */
:root{
  --bg:#f5f7fb; --card:#fff; --line:#e5e7eb; --muted:#6b7280; --text:#1f2937; --accent:#2563eb; --accent-2:#1d4ed8;
  --success:#16a34a; --success-soft:#dcfce7; --warning:#d97706; --warning-soft:#fff7ed; --danger:#dc2626; --danger-soft:#fee2e2;
}

.logframe-nav{max-width:100%;margin:0 auto;padding:16px;background:linear-gradient(180deg, #f8fafc 0%, #f5f7fb 100%);}
.card{background:var(--card);border:1px solid var(--line);border-radius:16px;box-shadow:0 1px 2px rgba(0,0,0,.05);padding:20px;margin-bottom:16px;}

.h1{font-size:28px;font-weight:800;color:var(--text);margin-bottom:20px;}

/* Navigation Tree Styles */
.nav-tree{list-style:none;padding:0;margin:0;}
.nav-tree li{margin:0;padding:0;}
.nav-item{display:block;padding:12px 16px;margin:4px 0;border-radius:8px;text-decoration:none;color:var(--text);transition:all 0.2s;border-left:4px solid transparent;}
.nav-item:hover{background:#f3f4f6;border-left-color:var(--accent);}
.nav-item.active{background:#eef2ff;border-left-color:var(--accent);color:var(--accent-2);font-weight:600;}

.nav-level-1{font-weight:700;font-size:16px;color:var(--text);}
.nav-level-2{font-weight:600;font-size:15px;color:var(--muted);margin-left:20px;}
.nav-level-3{font-weight:500;font-size:14px;color:var(--muted);margin-left:40px;}

.toggle-btn{background:none;border:none;color:var(--muted);cursor:pointer;padding:4px 8px;border-radius:4px;margin-right:8px;}
.toggle-btn:hover{background:#f3f4f6;color:var(--text);}

.content-area{min-height:400px;background:var(--card);border:1px solid var(--line);border-radius:16px;padding:20px;}

.btn{display:inline-flex;align-items:center;gap:.5rem;padding:.6rem 1rem;border-radius:12px;border:1px solid var(--line);text-decoration:none;color:var(--text);background:#fff;font-size:15px;cursor:pointer;}
.btn-primary{background:var(--accent);color:#fff;border-color:var(--accent);}
.btn:hover{background:#f9fafb;}
.btn-primary:hover{background:var(--accent-2);}

/* Responsive */
@media (max-width:768px){
  .nav-level-2{margin-left:10px;}
  .nav-level-3{margin-left:20px;}
}
</style>

<div class="logframe-nav">
  <div class="h1">Smallholder Agribusiness and Resilience Project - Logical Framework</div>
  
  
  <div style="display:grid;grid-template-columns:1fr 2fr;gap:20px;">
    <!-- Navigation Tree -->
    <div class="card">
      <h3 style="margin-top:0;color:var(--text);">Logframe Structure</h3>
      <ul class="nav-tree">
        <!-- Project Goal -->
        <li>
          <a href="#" class="nav-item nav-level-1" onclick="showContent('project-goal', this)">
            <span class="toggle-btn">▼</span>Project Goal
          </a>
          <div style="font-size:12px;color:var(--muted);margin-left:32px;margin-top:-8px;margin-bottom:8px;">
            Contribute to smallholder poverty reduction, food security and nutrition in target Dry Zone districts
          </div>
        </li>

        <!-- Development Objective -->
        <li>
          <a href="#" class="nav-item nav-level-1" onclick="showContent('dev-objective', this)">
            <span class="toggle-btn">▼</span>Development Objective
          </a>
          <div style="font-size:12px;color:var(--muted);margin-left:32px;margin-top:-8px;margin-bottom:8px;">
            Build resilience and market participation of rural households in geographical areas affected by climate change
          </div>
        </li>

        <!-- Outcomes -->
        <li>
          <a href="#" class="nav-item nav-level-1" onclick="showContent('outcomes', this)">
            <span class="toggle-btn">▼</span>Outcomes
          </a>
          <ul style="list-style:none;padding:0;margin:0;">
            <li>
              <a href="#" class="nav-item nav-level-2" onclick="showContent('outcome-1', this)">
                Climate resilient and value chain capacity built
              </a>
            </li>
            <li>
              <a href="#" class="nav-item nav-level-2" onclick="showContent('outcome-2', this)">
                Climate resilient climate change and value chain investments made
              </a>
            </li>
          </ul>
        </li>


        <!-- Outputs -->
        <li>
          <a href="#" class="nav-item nav-level-1" onclick="showContent('outputs', this)">
            <span class="toggle-btn">▼</span>Outputs
          </a>
          <ul style="list-style:none;padding:0;margin:0;">
            <li>
              <a href="#" class="nav-item nav-level-2" onclick="showContent('output-1', this)">
                Output 1: Service providers and producers' groups created and capacitated for better land and water management
              </a>
            </li>
            <li>
              <a href="#" class="nav-item nav-level-2" onclick="showContent('output-2', this)">
                Output 2: Farmers especially women and youth trained in business and marketing
              </a>
            </li>
            <li>
              <a href="#" class="nav-item nav-level-2" onclick="showContent('output-3', this)">
                Output 3: Advocacy and Policy meetings conducted
              </a>
            </li>
            <li>
              <a href="#" class="nav-item nav-level-2" onclick="showContent('output-4', this)" style="background:#eef2ff;color:var(--accent-2);font-weight:600;">
                Output 4: Minor irrigation tanks and water harvesting infrastructure constructed or rehabilitated
              </a>
            </li>
            <li>
              <a href="#" class="nav-item nav-level-2" onclick="showContent('output-5', this)">
                Output 5: Beneficiaries with access to market infrastructure and business services
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>

    <!-- Content Area -->
    <div class="card">
      <div id="content-area" class="content-area">
        <div style="text-align:center;color:var(--muted);padding:40px;">
          <h3>Select a logframe component from the navigation</h3>
          <p>Click on any item in the left panel to view its indicators and details</p>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function showContent(component, el) {
  // Remove active class from all nav items
  document.querySelectorAll('.nav-item').forEach(item => {
    item.classList.remove('active');
  });
  
  // Add active class to clicked item (support explicit element argument)
  const activeSource = el || (window.event ? window.event.target : null);
  if (activeSource) {
    const navItem = activeSource.closest('.nav-item');
    if (navItem) navItem.classList.add('active');
  }
  
  const contentArea = document.getElementById('content-area');
  
  // Show different content based on component
  switch(component) {
    case 'project-goal':
      contentArea.innerHTML = `
        <h3>Project Goal Indicators</h3>
        <p><strong>Goal:</strong> Contribute to smallholder poverty reduction, food security and nutrition in target Dry Zone districts</p>
        <div style="margin-top:20px;">
          <a href="{{ route('logframe.tanks.index') }}" class="btn btn-primary">View Tank Indicators</a>
        </div>
      `;
      break;
      
    case 'dev-objective':
      contentArea.innerHTML = `
        <h3>Development Objective Indicators</h3>
        <p><strong>Objective:</strong> Build resilience and market participation of rural households in geographical areas affected by climate change</p>
        <div style="margin-top:20px;">
          <a href="{{ route('logframe.tanks.index') }}" class="btn btn-primary">View Tank Indicators</a>
        </div>
      `;
      break;
      
    case 'outcome-1':
      contentArea.innerHTML = `
        <h3>Outcome 1: Climate-resilient and value-chain capacity built</h3>
        <div class="card" style="padding:12px;margin-top:12px;">
          <div style="font-weight:700;margin-bottom:8px;">Indicators</div>
          <table style="width:100%;border-collapse:separate;border-spacing:0;">
            <thead>
              <tr>
                <th style="text-align:left;">Indicator</th>
                <th style="text-align:left;">Description</th>
                <th style="text-align:center;white-space:nowrap;">Value</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="font-weight:600;">No. of producer organizations with capacity to manage group enterprises in a financially profitable and sustainable way</td>
                <td>
                  <div>Number of POs - Number</div>
                </td>
                <td style="text-align:center;">0</td>
              </tr>
            </tbody>
          </table>
        </div>
      `;
      break;
      
    case 'outcome-2':
      contentArea.innerHTML = `
        <h3>Outcome 2: Climate resilient climate change and value chain investments made</h3>
        <p>This outcome focuses on making investments in climate resilience and value chain development.</p>
        <div style="margin-top:20px;">
          <a href="{{ route('logframe.tanks.index') }}" class="btn btn-primary">View Related Indicators</a>
        </div>
      `;
      break;
      
    case 'output-1':
      contentArea.innerHTML = `
        <h3>Output 1: Service providers and producers' groups created and capacitated for better land and water management</h3>
        <p><strong>Description:</strong> This output focuses on creating and building capacity of service providers and producer groups for improved land and water management practices.</p>
        <div style="background:#f8fafc;padding:12px;border-radius:8px;margin:16px 0;">
          <strong>Key Activities:</strong>
          <ul style="margin:8px 0;padding-left:20px;">
            <li>Establish service provider groups</li>
            <li>Train producers' groups in land management</li>
            <li>Build capacity for water management</li>
            <li>Provide technical support and guidance</li>
          </ul>
        </div>
        <div style="margin-top:20px;">
          <a href="#" class="btn btn-primary">View Indicators</a>
          <a href="#" class="btn">Edit Indicators</a>
        </div>
      `;
      break;
      
    case 'output-2':
      contentArea.innerHTML = `
        <h3>Output 2: Farmers especially women and youth trained in business and marketing</h3>
        <p><strong>Description:</strong> This output focuses on training farmers, with special emphasis on women and youth, in business and marketing skills.</p>
        <div style="background:#f8fafc;padding:12px;border-radius:8px;margin:16px 0;">
          <strong>Key Activities:</strong>
          <ul style="margin:8px 0;padding-left:20px;">
            <li>Business skills training for farmers</li>
            <li>Marketing training and support</li>
            <li>Women and youth focused programs</li>
            <li>Entrepreneurship development</li>
          </ul>
        </div>
        <div style="margin-top:20px;">
          <a href="#" class="btn btn-primary">View Indicators</a>
          <a href="#" class="btn">Edit Indicators</a>
        </div>
      `;
      break;
      
    case 'output-3':
      contentArea.innerHTML = `
        <h3>Output 3: Advocacy and Policy meetings conducted</h3>
        <p><strong>Description:</strong> This output focuses on conducting advocacy and policy meetings to influence policy and decision-making.</p>
        <div style="background:#f8fafc;padding:12px;border-radius:8px;margin:16px 0;">
          <strong>Key Activities:</strong>
          <ul style="margin:8px 0;padding-left:20px;">
            <li>Policy advocacy meetings</li>
            <li>Stakeholder consultations</li>
            <li>Policy brief development</li>
            <li>Government engagement</li>
          </ul>
        </div>
        <div style="margin-top:20px;">
          <a href="#" class="btn btn-primary">View Indicators</a>
          <a href="#" class="btn">Edit Indicators</a>
        </div>
      `;
      break;
      
    case 'output-4':
      contentArea.innerHTML = `
        <h3>Output 4: Minor irrigation tanks and water harvesting infrastructure constructed or rehabilitated</h3>
        <p><strong>Description:</strong> This is the tank rehabilitation output that we've been working on. It focuses on constructing and rehabilitating minor irrigation tanks and water harvesting infrastructure.</p>
        <div style="background:#eef2ff;padding:12px;border-radius:8px;margin:16px 0;border-left:4px solid var(--accent);">
          <strong>Key Activities:</strong>
          <ul style="margin:8px 0;padding-left:20px;">
            <li>Construction of new irrigation tanks</li>
            <li>Rehabilitation of existing tanks</li>
            <li>Water harvesting infrastructure development</li>
            <li>Community capacity building</li>
          </ul>
        </div>
        <div style="margin-top:20px;">
          <a href="{{ route('logframe.tanks.index') }}" class="btn btn-primary">View Tank Indicators</a>
          <a href="{{ route('logframe.tanks.create') }}" class="btn">Edit Indicators</a>
        </div>
      `;
      break;
      
    case 'output-5':
      contentArea.innerHTML = `
        <h3>Output 5: Beneficiaries with access to market infrastructure and business services</h3>
        <p><strong>Description:</strong> This output focuses on providing beneficiaries with access to market infrastructure and business services.</p>
        <div style="background:#f8fafc;padding:12px;border-radius:8px;margin:16px 0;">
          <strong>Key Activities:</strong>
          <ul style="margin:8px 0;padding-left:20px;">
            <li>Market infrastructure development</li>
            <li>Business service provision</li>
            <li>Market linkage facilitation</li>
            <li>Access to financial services</li>
          </ul>
        </div>
        <div style="margin-top:20px;">
          <a href="#" class="btn btn-primary">View Indicators</a>
          <a href="#" class="btn">Edit Indicators</a>
        </div>
      `;
      break;
      
    default:
      contentArea.innerHTML = `
        <h3>${component.replace('-', ' ').toUpperCase()}</h3>
        <p>Content for ${component} will be displayed here.</p>
        <div style="margin-top:20px;">
          <a href="{{ route('logframe.tanks.index') }}" class="btn btn-primary">View Indicators</a>
        </div>
      `;
  }
}

// Initialize with Outcome 1 active and first indicator visible
document.addEventListener('DOMContentLoaded', function() {
  const outcomeLink = document.querySelector('[onclick*="outcome-1"]');
  if (outcomeLink) {
    showContent('outcome-1', outcomeLink);
  }
});
</script>
@endsection
