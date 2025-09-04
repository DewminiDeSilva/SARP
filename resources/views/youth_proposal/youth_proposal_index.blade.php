<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youth Proposals</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }

        .left-column {
            flex: 0 0 20%;
            border-right: 1px solid #dee2e6;
        }

        .right-column {
            flex: 0 0 80%;
            padding: 20px;
            transition: flex 0.3s ease, padding 0.3s ease;
        }

        .sidebar {
            transition: transform 0.3s ease;
        }

        .left-column.hidden {
            display: none;
        }

        #sidebarToggle {
            background-color: #126926;
        }

        #sidebarToggle:hover {
            background-color: #0a4818;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            border: none;
            padding: 10px 50px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            position: relative;
            overflow: hidden;
        }

        .btn-back img {
            width: 45px;
            margin-right: 5px;
            transition: transform 0.3s ease;
        }

        .btn-back .btn-text {
            opacity: 0;
            visibility: hidden;
            position: absolute;
            right: 25px;
            background-color: #1e8e1e;
            color: #fff;
            padding: 4px 8px;
            border-radius: 4px;
            transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
            z-index: 0;
        }

        .btn-back:hover .btn-text {
            opacity: 1;
            visibility: visible;
            transform: translateX(-5px);
            padding: 10px 20px;
            border-radius: 20px;
        }

        .btn-back:hover img {
            transform: translateX(-50px);
        }

        .submitbtton {
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }

        .submitbtton:active,
        .submitbtton:hover {
            background-color: #145c32;
            border-color: #145c32;
            color: #fff;
        }

        .custom-button, .edit-button, .view-button {
            width: 60px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid transparent;
            transition: border 0.3s ease, background-color 0.3s ease;
        }

        .custom-button {
            color: red;
            background-color: #f5c6cb;
        }

        .custom-button:hover {
            border-color: red;
        }

        .edit-button {
            color: orange;
            background-color: #ffeeba;
        }

        .edit-button:hover {
            border-color: orange;
        }

        .view-button {
            color: white;
            background-color: #60C267;
        }

        .view-button:hover {
            border-color: green;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        td {
            vertical-align: middle;
            white-space: nowrap;
        }

        .pagination .page-link {
            padding: 5px 10px; /* Adjust padding to control button size */
        }

        .page-item {
            background-color: white;
            padding: 0px;
        }

        .pagination:hover {
            border-color: #fff;
            background-color: #fff;
        }

        .page-item:hover {
            border-color: #fff;
            background-color: #fff;
            cursor: pointer;
        }

        .page-link {
            color : #28a745;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #126926;
            border-color: #126926;
        }
    </style>
    
    <style>
        /* Badge style for EOI status */
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            font-size: 0.9rem;
            border-radius: 10px;
            color: white;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .status-badge:hover {
            transform: scale(1.05);
        }

        .badge-evaluation-completed {
            background-color: #28a745;
        }
        .badge-other {
            background-color: #6c757d;
        }

        .status-select {
            appearance: none;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            padding: 5px 10px;
            font-size: 0.9rem;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            width: 150px;
        }
        .status-select:hover {
            background-color: #f1f1f1;
            border-color: #28a745;
        }

        /* Compact table row height */
        .table td, .table th {
            padding-top: 6px !important;
            padding-left: 20px !important;
            padding-bottom: 6px !important;
            font-size: 1rem;
        }
        /* Center all table cell content */
        .table td, .table th {
            
            vertical-align: middle !important;
        }
        .locked-status {
            background-color: #198754 !important; /* Bootstrap success */
            opacity: 0.85;
            cursor: not-allowed !important;
        }
        .locked-status i {
            font-size: 0.85rem;
            margin-left: 6px;
        }
        .status-select {
            appearance: none;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            padding: 6px 12px;
            font-size: 0.95rem;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            text-align: center;
        }
        
        .highlight-row {
            background-color: #fff8dc !important; /* Light yellow (same as the Youth highlight) */
        }
        
        
    </style>

    <style>
      .delete-button{
          color:#fff;
          background-color:#ff4b5b; /* danger */
          border:2px solid transparent;
          width:60px;height:40px;
          display:flex;align-items:center;justify-content:center;
          transition:border .3s ease, background-color .3s ease;
      }
      .delete-button:hover{ border-color:#b3000c; }

              /* Force icon colors */
        .edit-button i {
            color: orange; /* green */
        }
        .delete-button i {
            color: rgba(255, 255, 255, 1); /* red */
        }
        
        .edit-button:hover i {
            color: orange; /* stay green on hover */
        }
        .delete-button:hover i {
            color: rgba(255, 255, 255, 1); /* stay red on hover */
        }

    </style>

</head>

<body>

@include('dashboard.header')

<div class="frame" style="padding-top: 70px;">

    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>

    <div class="right-column" style="padding:58px;">

        <div class="d-flex align-items-center mb-3">
            <button id="sidebarToggle" class="btn btn-secondary mr-2">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <div class="container-fluid">

            <div class="center-heading text-center">
                <h2 style="font-size: 2.4rem; color: green;">Youth Proposals</h2>
            </div>
            
            <!-- Summary Cards -->
            <div class="row text-center mb-5 mt-5">
                <div class="col-md-4">
                    <div class="card border-success shadow-sm">
                        <div class="card-header bg-success text-white font-weight-bold">
                            Total Organizations
                        </div>
                        <div class="card-body">
                            <h2 class="card-title font-weight-bold">{{ $totalOrganizations }}</h2>
                            <p class="card-text">All submitted youth proposals</p>
                        </div>
                    </div>
                </div>
            
                <div class="col-md-4">
                    <div class="card border-success shadow-sm">
                        <div class="card-header bg-success text-white font-weight-bold">
                            Agreement Signed
                        </div>
                        <div class="card-body">
                            <h2 class="card-title font-weight-bold">{{ $agreementSignedCount }}</h2>
                            <p class="card-text">Proposals with signed agreements</p>
                        </div>
                    </div>
                </div>
            
                <div class="col-md-4">
                    <div class="card border-success shadow-sm">
                        <div class="card-header bg-success text-white font-weight-bold">
                            Not Agreement Signed
                        </div>
                        <div class="card-body">
                            <h2 class="card-title font-weight-bold">{{ $notAgreementSignedCount }}</h2>
                            <p class="card-text">Pending signature or approval</p>
                        </div>
                    </div>
                </div>
            </div>

           
            <div class="mb-3 d-flex justify-content-between align-items-center">

            
                <a href="{{ route('youth-proposals.create') }}" class="btn btn-success">Submit New</a>

                <a href="{{ route('youth-proposal.agreementSigned') }}" class="btn btn-success ml-auto">
                    <i class="fas fa-file-signature"></i> View Agreement Signed Proposals
                </a>

            </div>

            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Organization Name</th>
                            <th>Contact Person</th>
                            <th>Mobile Phone</th>
                            <th>Market Problem</th>
                            <th>Business Title</th>
                            <th style="width:308px;" >Status</th> 
                            <th>Actions</th>                           
                        </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($proposals as $youth_proposal)

                    <tr @if($youth_proposal->status === 'Agreement Signed') class="highlight-row" @endif>

                        <td>{{ $youth_proposal->id }}</td>
                        <td>{{ $youth_proposal->organization_name }}</td>
                        <td>{{ $youth_proposal->contact_person }}</td>
                        <td>{{ $youth_proposal->mobile_phone }}</td>
                        <td>{{ Str::limit($youth_proposal->market_problem, 50) }}</td>
                        <td>{{ $youth_proposal->business_title }}</td>

                        <!-- ✅ Status Column -->
                        <td class="text-center">
                            @php
                                $status = $youth_proposal->status;
                                $badgeClass = match($status) {
                                    'Evaluation Completed' => 'badge-success',
                                    'Internal Review Committee Approved' => 'badge-warning',
                                    'Business Proposal Submitted' => 'badge-info',
                                    'BPEC Evaluation' => 'badge-secondary',
                                    'BPEC Approved' => 'badge-primary',
                                    'NSC Approved' => 'badge-dark',
                                    'IFAD Approved' => 'badge-light text-dark',
                                    'Agreement Signed' => 'badge-success',
                                    default => 'badge-secondary'
                                };
                            @endphp
                            
                            <div id="status-{{ $youth_proposal->id }}" data-current-status="{{ $status }}">
                                <span class="badge {{ $badgeClass }} status-badge {{ $status === 'Agreement Signed' ? 'locked-status' : '' }}"
                                    style="cursor:pointer;" onclick="toggleDropdown({{ $youth_proposal->id }})">
                                    {{ $status ?? 'Select Status' }}
                                    @if($status === 'Agreement Signed')
                                        <i class="fas fa-lock ml-2"></i>
                                    @endif
                                </span>
                            </div>
                            
                            <!-- Hidden Form for Submission -->
                            <form id="status-form-{{ $youth_proposal->id }}" action="{{ route('youth-proposals.updateStatus', $youth_proposal->id) }}" method="POST" style="display:none;">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" id="status-input-{{ $youth_proposal->id }}">
                            </form>
                        </td>
                            
                            
                        <td class="text-center align-middle">
                            <div class="d-flex justify-content-center align-items-center" style="gap: 6px;">
                                <a href="{{ route('youth-proposals.show', $youth_proposal->id) }}" class="btn btn-sm view-button" title="View">
                                    <img src="{{ asset('assets/images/view.png') }}" alt="View Icon" style="width: 16px; height: 16px;">
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('youth-proposals.edit', $youth_proposal->id) }}" class="btn btn-sm edit-button" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>

                                {{-- Delete --}}
                                <form id="delete-form" method="POST" style="display:none;">
                                  @csrf
                                  @method('DELETE')
                                </form>

                                <button type="button"
                                        class="btn btn-sm delete-button"
                                        title="Delete"
                                        data-id="{{ $youth_proposal->id }}"
                                        data-status="{{ $youth_proposal->status }}">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </div>
                        </td>

                            
                    </tr>
                    @endforeach
                    </tbody>

                </table>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $proposals->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $proposals->previousPageUrl() }}" tabindex="-1">Previous</a>
                    </li>

                    @php
                        $currentPage = $proposals->currentPage();
                        $lastPage = $proposals->lastPage();
                        $startPage = max($currentPage - 2, 1);
                        $endPage = min($currentPage + 2, $lastPage);
                    @endphp

                    @if ($startPage > 1)
                        <li class="page-item"><a class="page-link" href="{{ $proposals->url(1) }}">1</a></li>
                        @if ($startPage > 2)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                    @endif

                    @for ($i = $startPage; $i <= $endPage; $i++)
                        <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                            <a class="page-link" href="{{ $proposals->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    @if ($endPage < $lastPage)
                        @if ($endPage < $lastPage - 1)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                        <li class="page-item"><a class="page-link" href="{{ $proposals->url($lastPage) }}">{{ $lastPage }}</a></li>
                    @endif

                    <li class="page-item {{ $proposals->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $proposals->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </nav>

            @php
                $currentPage = $proposals->currentPage();
                $perPage = $proposals->perPage();
                $total = $proposals->total();
                $startingNumber = ($currentPage - 1) * $perPage + 1;
                $endingNumber = min($total, $currentPage * $perPage);
            @endphp


            <div class="d-flex justify-content-between align-items-center mb-3">
                <div id="tableInfo" class="text-right">
                    <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>


<!-- Keep this INCLUDE exactly once, before any code that uses Swal -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  // Sidebar toggle
  document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.querySelector('.left-column');
    const content = document.querySelector('.right-column');
    const toggleButton = document.getElementById('sidebarToggle');

    if (toggleButton) {
      toggleButton.addEventListener('click', function () {
        sidebar.classList.toggle('d-none');
        content.style.flex = sidebar.classList.contains('d-none') ? '0 0 100%' : '0 0 80%';
      });
    }
  });

  // --- Status handlers (GLOBAL so inline onclick works) ---
  window.toggleDropdown = function (eoiId) {
    const statusSpan = document.querySelector('#status-' + eoiId + ' .status-badge');
    if (!statusSpan) return;

    const currentStatus = (statusSpan.innerText || '').trim();
    if (currentStatus === 'Agreement Signed') {
      Swal.fire({
        icon: 'info',
        title: 'Status Locked',
        text: 'This proposal has already been marked as "Agreement Signed" and cannot be modified.',
        confirmButtonColor: '#126926'
      });
      return;
    }

    const statusDiv = document.getElementById('status-' + eoiId);
    if (!statusDiv) return;

    statusDiv.innerHTML = `
      <div class="d-flex justify-content-center">
        <select class="form-control form-control-sm status-select text-center"
                onchange="submitStatus(this, ${eoiId})" style="width: 180px;">
          <option value="">-- Select Status --</option>
          <option value="Evaluation Completed">Evaluation Completed</option>
          <option value="Internal Review Committee Approved">Internal Review Committee Approved</option>
          <option value="Business Proposal Submitted">Business Proposal Submitted</option>
          <option value="BPEC Evaluation">BPEC Evaluation</option>
          <option value="BPEC Approved">BPEC Approved</option>
          <option value="NSC Approved">NSC Approved</option>
          <option value="IFAD Approved">IFAD Approved</option>
          <option value="Agreement Signed">Agreement Signed</option>
          <option value="Clear">Clear Status</option>
        </select>
      </div>`;
  };

  window.submitStatus = function (select, eoiId) {
    const selectedValue = select.value;
    if (!selectedValue) return;

    const form  = document.getElementById('status-form-' + eoiId);
    const input = document.getElementById('status-input-' + eoiId);
    if (!form || !input) return;

    if (selectedValue === 'Agreement Signed') {
      Swal.fire({
        title: 'Are you sure?',
        text: 'Once marked as "Agreement Signed", the status cannot be changed later.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, mark as signed',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#126926',
        cancelButtonColor: '#d33'
      }).then(function (result) {
        if (result.isConfirmed) {
          input.value = selectedValue;
          form.submit();
        } else {
          window.revertToOriginalBadge(eoiId);
        }
      });
    } else {
      input.value = selectedValue === 'Clear' ? '' : selectedValue;
      form.submit();
    }
  };

  window.revertToOriginalBadge = function (eoiId) {
    const container = document.getElementById('status-' + eoiId);
    if (!container) return;

    const currentStatus = container.getAttribute('data-current-status') || '';
    let badgeClass = 'badge-secondary';
    switch (currentStatus) {
      case 'Evaluation Completed': badgeClass = 'badge-success'; break;
      case 'Internal Review Committee Approved': badgeClass = 'badge-warning'; break;
      case 'Business Proposal Submitted': badgeClass = 'badge-info'; break;
      case 'BPEC Evaluation': badgeClass = 'badge-secondary'; break;
      case 'BPEC Approved': badgeClass = 'badge-primary'; break;
      case 'NSC Approved': badgeClass = 'badge-dark'; break;
      case 'IFAD Approved': badgeClass = 'badge-light text-dark'; break;
      case 'Agreement Signed': badgeClass = 'badge-success'; break;
    }
    var lockIcon = currentStatus === 'Agreement Signed' ? '<i class="fas fa-lock ml-2"></i>' : '';
    container.innerHTML =
      '<span class="badge ' + badgeClass + ' status-badge ' + (currentStatus === 'Agreement Signed' ? 'locked-status' : '') +
      '" style="cursor:pointer;" onclick="toggleDropdown(' + eoiId + ')">' +
      (currentStatus || 'Select Status') + ' ' + lockIcon + '</span>';
  };
</script>

{{-- Flash (success/cleared) with back/forward guard + session forget --}}
@if(session('success'))
<script>
  window.addEventListener('pageshow', function (e) {
    try {
      if (e && e.persisted) return;
      var navEntries = (window.performance && performance.getEntriesByType) ? performance.getEntriesByType('navigation') : null;
      var nav = (navEntries && navEntries.length) ? navEntries[0] : null;
      if (nav && nav.type === 'back_forward') return;

      Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: @json(session('success')),
        timer: 2000,
        showConfirmButton: false,
        confirmButtonColor: '#126926'
      }).then(function () {
        if (window.history && window.history.replaceState) {
          window.history.replaceState(null, null, window.location.href);
        }
      });
    } catch (err) {
      console.warn('Flash block error:', err);
    }
  });
</script>
@php(session()->forget('success'))
@endif

@if(session('cleared'))
<script>
  window.addEventListener('pageshow', function (e) {
    try {
      if (e && e.persisted) return;
      var navEntries = (window.performance && performance.getEntriesByType) ? performance.getEntriesByType('navigation') : null;
      var nav = (navEntries && navEntries.length) ? navEntries[0] : null;
      if (nav && nav.type === 'back_forward') return;

      Swal.fire({
        icon: 'success',
        title: 'Cleared!',
        text: @json(session('cleared')),
        timer: 2000,
        showConfirmButton: false,
        confirmButtonColor: '#126926'
      }).then(function () {
        if (window.history && window.history.replaceState) {
          window.history.replaceState(null, null, window.location.href);
        }
      });
    } catch (err) {
      console.warn('Flash block error:', err);
    }
  });
</script>
@php(session()->forget('cleared'))
@endif

<script>
  // Fade-in rows (optional)
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[id^=status-]').forEach(function (div) {
      div.style.opacity = 0;
      div.style.transition = 'opacity 0.5s ease';
      setTimeout(function () { div.style.opacity = 1; }, 100);
    });
  });

  // Delete confirmation
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-button').forEach(function (btn) {
      btn.addEventListener('click', function () {
        const id = this.dataset.id;
        const status = (this.dataset.status || '').trim();

        if (status === 'Agreement Signed') {
          Swal.fire({
            icon: 'info',
            title: 'Deletion disabled',
            text: 'This proposal is marked as "Agreement Signed" and cannot be deleted.',
            confirmButtonColor: '#126926'
          });
          return;
        }

        Swal.fire({
          title: 'Delete this proposal?',
          text: 'This action cannot be undone.',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete',
          cancelButtonText: 'Cancel',
          confirmButtonColor: '#d33',
          cancelButtonColor: '#6c757d'
        }).then(function (result) {
          if (result.isConfirmed) {
            const form = document.getElementById('delete-form');
            if (!form) return;
            form.action = "{{ url('youth-proposals') }}/" + id; // RESTful destroy route
            form.submit();
          }
        });
      });
    });
  });
</script>


</body>
</html>
