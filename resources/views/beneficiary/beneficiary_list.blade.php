<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livestock Beneficiary List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-green: #126926;
            --border-color: #dee2e6;
        }
/* Pagination - same as beneficiary index and other modules */
        .pagination .page-item { margin: 0; }
        .pagination .page-link { padding: 5px 10px; }
        .page-item { background-color: white; padding: 0; }
        .pagination:hover { border-color: #fff; background-color: #fff; }
        .page-item:hover { border-color: #fff; background-color: #fff; cursor: pointer; }
        .page-link { color: #28a745; }
        .page-item.active .page-link { z-index: 3; color: #fff; background-color: #126926; border-color: #126926; }

        .frame { display: flex; flex-direction: row; justify-content: space-between; width: 100%; }
        .left-column { flex: 0 0 20%; border-right: 1px solid var(--border-color); }
        .right-column { flex: 0 0 80%; padding: 20px; transition: flex 0.3s ease, padding 0.3s ease; }
        .left-column.hidden { display: none; }
        .sidebar { transition: transform 0.3s ease; }
        .sidebar.hidden { transform: translateX(-100%); }
        #sidebarToggle {
            background-color: #126926; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer;
        }
        #sidebarToggle:hover { background-color: #0a4818; }
        .btninline { display: inline-flex; gap: 5px; }
        /* Keep header title large (same as other modules) */
        .fixed-header h1, .fixed-header .header-mis-title { font-size: 2.85rem !important; }
        @media (max-width: 1200px) { .fixed-header h1, .fixed-header .header-mis-title { font-size: 2.2rem !important; } }
        @media (max-width: 768px) { .fixed-header h1, .fixed-header .header-mis-title { font-size: 1.6rem !important; } }
        /* Back button - same as other modules */
        .btn-back {
            display: inline-flex; align-items: center; justify-content: center; color: #fff; border: none;
            padding: 10px 50px; border-radius: 4px; text-decoration: none; font-size: 14px;
            transition: background-color 0.3s ease; cursor: pointer; position: relative; overflow: hidden;
        }
        .btn-back img { width: 45px; height: auto; margin-right: 5px; transition: transform 0.3s ease; z-index: 1; }
        .btn-back .btn-text { opacity: 0; visibility: hidden; position: absolute; right: 25px; background-color: #1e8e1e; color: #fff; padding: 4px 8px; border-radius: 4px; transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease; z-index: 0; }
        .btn-back:hover .btn-text { opacity: 1; visibility: visible; transform: translateX(-5px); padding: 10px 20px; border-radius: 20px; }
        .btn-back:hover img { transform: translateX(-50px); }
        /* Page header - same as beneficiary index */
        .page-header-section {
            position: relative; text-align: center; margin-bottom: 40px; padding: 50px 30px; border-radius: 20px; overflow: hidden;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #1e3c72 100%);
            box-shadow: 0 10px 40px rgba(30, 60, 114, 0.4), 0 0 0 1px rgba(255, 255, 255, 0.1) inset;
        }
        .page-header-section::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 0%, transparent 50%), radial-gradient(circle at 80% 80%, rgba(255,255,255,0.08) 0%, transparent 50%);
            pointer-events: none;
        }
        .page-header-section::after {
            content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 4px;
            background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.3) 20%, rgba(255,255,255,0.5) 50%, rgba(255,255,255,0.3) 80%, transparent 100%);
        }
        .header-content { position: relative; z-index: 2; }
        .header-icon-wrapper { margin-bottom: 20px; display: inline-block; }
        .header-main-icon {
            font-size: 64px; color: #fff; text-shadow: 0 4px 15px rgba(0,0,0,0.3);
            background: linear-gradient(135deg, #ffffff 0%, #e0e7ff 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
        }
        .header-title { margin: 0; padding: 0; }
        .title-text {
            display: inline-block; color: #fff; font-size: 42px; font-weight: 800; letter-spacing: 2px; text-transform: uppercase;
            background: linear-gradient(135deg, #ffffff 0%, #e0e7ff 50%, #ffffff 100%); background-size: 200% auto;
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
        }
        .header-subtitle { color: rgba(255,255,255,0.95); font-size: 18px; margin-top: 15px; margin-bottom: 0; font-weight: 400; }
        .header-decoration { display: flex; align-items: center; justify-content: center; gap: 15px; margin-top: 25px; }
        .decoration-line { width: 60px; height: 2px; background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.6) 50%, transparent 100%); }
        .decoration-dot { width: 8px; height: 8px; background: #fff; border-radius: 50%; }
        @media (max-width: 768px) { .header-main-icon { font-size: 48px; } .title-text { font-size: 28px; } .header-subtitle { font-size: 16px; } }
        /* Summary cards - same gradient style as other modules */
        .summary-card { animation: fadeInUp 0.6s ease-out; }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        /* Table - same as other modules */
        .table-container { background: #fff; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); padding: 20px; margin-top: 20px; overflow-x: auto; }
        .table-module { width: 100%; border-collapse: separate; border-spacing: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .table-module thead { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; position: sticky; top: 0; z-index: 10; }
        .table-module thead th { padding: 18px 16px; text-align: left; font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; border: none; }
        .table-module tbody tr { transition: all 0.3s ease; border-bottom: 1px solid #f0f0f0; }
        .table-module tbody tr:nth-child(even) { background: #fafbfc; }
        .table-module tbody tr:nth-child(odd) { background: #fff; }
        .table-module tbody tr:hover { background: linear-gradient(90deg, #e8ecff 0%, #f5f7ff 100%) !important; box-shadow: 0 4px 12px rgba(102,126,234,0.15); border-left: 4px solid #667eea; }
        .table-module tbody td { padding: 16px; color: #2d3748; font-size: 14px; vertical-align: middle; border: none; }
        .table-responsive { border-radius: 12px; overflow: hidden; }
        .btn-green { background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%); color: #fff; border: none; }
        .btn-green:hover { background: linear-gradient(135deg, #218838 0%, #145c32 100%); color: #fff; }
        .btn-blue { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; border: none; }
        .btn-blue:hover { background: linear-gradient(135deg, #5568d3 0%, #6a3d8f 100%); color: #fff; }
        .btn { padding: 8px 16px; border-radius: 8px; font-weight: 600; transition: all 0.3s ease; }
        .btn:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.15); }
        @media (max-width: 768px) { .frame { flex-direction: column; } .left-column, .right-column { flex: 0 0 100%; } }
    </style>
</head>
<body>
@include('dashboard.header')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<div class="frame" style="padding-top: 110px;">
    <div class="left-column">
        @include('dashboard.dashboardC')
    </div>
    <div class="right-column">
        <div class="d-flex align-items-center mb-3">
            <button id="sidebarToggle" class="btn btn-secondary me-2"><i class="fas fa-bars"></i></button>
            <a href="{{ route('beneficiary.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div>

        <div class="container-fluid">
            <!-- Page header - same as other modules -->
            <div class="page-header-section">
                <div class="header-content">
                    <div class="header-icon-wrapper">
                        <i class="fas fa-paw header-main-icon"></i>
                    </div>
                    <h1 class="header-title"><span class="title-text">Livestock List</span></h1>
                    <p class="header-subtitle">Beneficiaries with livestock – view and manage</p>
                    <div class="header-decoration">
                        <div class="decoration-line"></div>
                        <div class="decoration-dot"></div>
                        <div class="decoration-line"></div>
                    </div>
                </div>
            </div>

            <!-- Summary cards - same style as beneficiary index -->
            <div class="row justify-content-center mb-4">
                <div class="col-md-4 mb-4">
                    <div class="summary-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 15px; padding: 30px; text-align: center; box-shadow: 0 8px 25px rgba(102,126,234,0.3); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <div style="color: #fff; font-size: 18px; font-weight: 600; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px;">
                            <i class="fas fa-paw" style="margin-right: 8px; font-size: 24px;"></i>Livestock Statistics
                        </div>
                        <div style="color: #fff; font-size: 48px; font-weight: 700; margin: 20px 0;">{{ $totalLivestocks }}</div>
                        <p style="color: rgba(255,255,255,0.9); font-size: 14px; margin: 0;">Total Livestocks Registered</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="summary-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); border-radius: 15px; padding: 30px; text-align: center; box-shadow: 0 8px 25px rgba(79,172,254,0.3); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <div style="color: #fff; font-size: 18px; font-weight: 600; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px;">
                            <i class="fas fa-user-friends" style="margin-right: 8px; font-size: 24px;"></i>Beneficiary Statistics
                        </div>
                        <div style="color: #fff; font-size: 48px; font-weight: 700; margin: 20px 0;">{{ $totalBeneficiaries }}</div>
                        <p style="color: rgba(255,255,255,0.9); font-size: 14px; margin: 0;">Total Beneficiaries Doing Livestock</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="summary-card" style="background: linear-gradient(135deg, #30cfd0 0%, #330867 100%); border-radius: 15px; padding: 30px; text-align: center; box-shadow: 0 8px 25px rgba(48,207,208,0.3); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <div style="color: #fff; font-size: 18px; font-weight: 600; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px;">
                            <i class="fas fa-map-marked-alt" style="margin-right: 8px; font-size: 24px;"></i>Division Statistics
                        </div>
                        <div style="color: #fff; font-size: 48px; font-weight: 700; margin: 20px 0;">{{ $totalGnDivisions }}</div>
                        <p style="color: rgba(255,255,255,0.9); font-size: 14px; margin: 0;">Total GN Divisions Involved</p>
                    </div>
                </div>
            </div>

            <form method="GET" action="{{ route('beneficiary.searchLivestock') }}" class="mb-4">
                <div class="input-group" style="max-width: 400px;">
                    <input type="text" class="form-control" name="search" placeholder="Search beneficiaries..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-success"><i class="fas fa-search me-1"></i>Search</button>
                </div>
            </form>

            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-module">
                        <thead>
                            <tr>
                                <th scope="col">NIC</th>
                                <th scope="col">Name with Initials</th>
                                <th scope="col">Address</th>
                                <th scope="col">Date Of Birth</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Age</th>
                                <th scope="col">Phone</th>
                                <th scope="col">GN Division</th>
                                <th>Livestock Type</th>
                                <th>Production Focus</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($beneficiaries as $beneficiary)
                            <tr>
                                <td>{{ $beneficiary->nic }}</td>
                                <td>{{ $beneficiary->name_with_initials }}</td>
                                <td>{{ $beneficiary->address }}</td>
                                <td>{{ $beneficiary->dob }}</td>
                                <td>{{ $beneficiary->gender }}</td>
                                <td>{{ $beneficiary->age }}</td>
                                <td>{{ $beneficiary->phone }}</td>
                                <td>{{ $beneficiary->gn_division_name }}</td>
                                <td>{{ $beneficiary->livestock_type ?? 'N/A' }}</td>
                                <td>{{ $beneficiary->production_focus ?? 'N/A' }}</td>
                                <td class="btninline">
                                    @if($beneficiary->id)
                                    @if(auth()->user()->hasPermission('livestocks', 'add'))
                                        <a href="{{ route('livestocks.create', ['beneficiary_id' => $beneficiary->id]) }}" class="btn btn-green btn-sm">Add Livestock</a>
                                    @endif
                                    @if(auth()->user()->hasPermission('livestocks', 'view'))
                                        <a href="{{ route('livestocks.list', ['beneficiary_id' => $beneficiary->id]) }}" class="btn btn-blue btn-sm">View Livestock</a>
                                    @endif
                                    @else
                                        <span class="text-muted">No ID available</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation" class="mt-3">
                        <ul class="pagination">
                            <li class="page-item {{ $beneficiaries->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $beneficiaries->previousPageUrl() }}">Previous</a>
                            </li>
                            @php
                                $currentPage = $beneficiaries->currentPage();
                                $lastPage = $beneficiaries->lastPage();
                                $startPage = max($currentPage - 2, 1);
                                $endPage = min($currentPage + 2, $lastPage);
                            @endphp
                            @if ($startPage > 1)
                                <li class="page-item"><a class="page-link" href="{{ $beneficiaries->url(1) }}">1</a></li>
                                @if ($startPage > 2) <li class="page-item disabled"><span class="page-link">...</span></li> @endif
                            @endif
                            @for ($i = $startPage; $i <= $endPage; $i++)
                                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}"><a class="page-link" href="{{ $beneficiaries->url($i) }}">{{ $i }}</a></li>
                            @endfor
                            @if ($endPage < $lastPage)
                                @if ($endPage < $lastPage - 1) <li class="page-item disabled"><span class="page-link">...</span></li> @endif
                                <li class="page-item"><a class="page-link" href="{{ $beneficiaries->url($lastPage) }}">{{ $lastPage }}</a></li>
                            @endif
                            <li class="page-item {{ $beneficiaries->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $beneficiaries->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </nav>
                    @php
                        $perPage = $beneficiaries->perPage();
                        $total = $beneficiaries->total();
                        $startingNumber = ($currentPage - 1) * $perPage + 1;
                        $endingNumber = min($total, $currentPage * $perPage);
                    @endphp
                    <p class="text-muted small mb-0 mt-2">Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success') || session('error'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
        Swal.fire({ icon: 'success', title: 'Success', text: '{{ session('success') }}', confirmButtonColor: '#126926' });
        @endif
        @if(session('error'))
        Swal.fire({ icon: 'error', title: 'Error', text: '{{ session('error') }}', confirmButtonColor: '#126926' });
        @endif
    });
</script>
@endif

<script>
document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.querySelector('.left-column');
    const content = document.querySelector('.right-column');
    const toggleButton = document.getElementById('sidebarToggle');
    if (toggleButton && sidebar && content) {
        toggleButton.addEventListener('click', function () {
            sidebar.classList.toggle('hidden');
            content.style.flex = sidebar.classList.contains('hidden') ? '0 0 100%' : '0 0 80%';
            content.style.padding = '20px';
        });
    }
});
</script>
</body>
</html>
