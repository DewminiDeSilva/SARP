<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expressions of Interest</title>

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
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
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
</style>

</head>
<body>

@include('dashboard.header')

<div class="frame" style="padding-top: 70px;">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">
        <div class="d-flex align-items-center mb-3">
            <button id="sidebarToggle" class="btn btn-secondary mr-2">
                <i class="fas fa-bars"></i>
            </button>

        </div>


        <div class="container-fluid">
            <div class="d-flex justify-content-between mb-3">
                <h2 style="color: green;">Expressions of Interest</h2>
<<<<<<< HEAD
                <a href="{{ route('expressions.evaluation-completed') }}" class="btn btn-success">View Completed Evaluations</a>
            </div>
           
            <div class="mb-3">
           
            <a href="{{ route('expressions.create') }}" class="btn submitbtton">+ Submit New</a>
=======
                @if(auth()->user()->hasPermission('expressions', 'add'))
                <a href="{{ route('expressions.create') }}" class="btn submitbtton">+ Submit New</a>
                @endif
>>>>>>> 082edc16197d236f6587164fdad4157ade96a531
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
        <th>Status</th> <!-- status column first -->
        <th>Actions</th> <!-- then actions -->
    </tr>
</thead>
                    <tbody>
                        @foreach($expressions as $expression)
                        <tr>
    <td>{{ $expression->id }}</td>
    <td>{{ $expression->organization_name }}</td>
    <td>{{ $expression->contact_person }}</td>
    <td>{{ $expression->mobile_phone }}</td>
    <td>{{ Str::limit($expression->market_problem, 50) }}</td>
    <td>{{ $expression->business_title }}</td>

<<<<<<< HEAD
    <!-- ✅ Status Column -->
    <!-- <td>
        <form action="{{ route('expressions.updateStatus', $expression->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <select name="status" onchange="this.form.submit()" class="form-control form-control-sm">
                <option value="Evaluation Completed" {{ $expression->status == 'Evaluation Completed' ? 'selected' : '' }}>Evaluation Completed</option>
                <option value="Internal Review Committee Approved" {{ $expression->status == 'Internal Review Committee Approved' ? 'selected' : '' }}>Internal Review Committee Approved</option>
                <option value="Business Proposal Submitted" {{ $expression->status == 'Business Proposal Submitted' ? 'selected' : '' }}>Business Proposal Submitted</option>
                <option value="BPEC Evaluation" {{ $expression->status == 'BPEC Evaluation' ? 'selected' : '' }}>BPEC Evaluation</option>
                <option value="BPEC Approved" {{ $expression->status == 'BPEC Approved' ? 'selected' : '' }}>BPEC Approved</option>
                <option value="NSC Approved" {{ $expression->status == 'NSC Approved' ? 'selected' : '' }}>NSC Approved</option>
                <option value="IFAD Approved" {{ $expression->status == 'IFAD Approved' ? 'selected' : '' }}>IFAD Approved</option>
                <option value="Agreement Signed" {{ $expression->status == 'Agreement Signed' ? 'selected' : '' }}>Agreement Signed</option>
            </select>
        </form>
    </td> -->
    <td class="text-center">
    @php
        $status = $expression->status;
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

    <div id="status-{{ $expression->id }}">
        <span class="badge {{ $badgeClass }} status-badge" style="cursor:pointer;" onclick="toggleDropdown({{ $expression->id }})">
            {{ $status ?? 'Select Status' }}
        </span>
    </div>

    <!-- Hidden Form for Submission -->
    <form id="status-form-{{ $expression->id }}" action="{{ route('expressions.updateStatus', $expression->id) }}" method="POST" style="display:none;">
        @csrf
        @method('PATCH')
        <input type="hidden" name="status" id="status-input-{{ $expression->id }}">
=======
<!-- Status Column (Only This Affected by 'expressions.edit' Permission) -->
@php
    $canEditStatus = auth()->user()->hasPermission('expressions', 'edit');
@endphp

<td>
    <form action="{{ route('expressions.updateStatus', $expression->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <select name="status"
                onchange="this.form.submit()"
                class="form-control form-control-sm"
                @if (!$canEditStatus) disabled @endif>
            <option value="Evaluation Completed" {{ $expression->status == 'Evaluation Completed' ? 'selected' : '' }}>Evaluation Completed</option>
            <option value="Internal Review Committee Approved" {{ $expression->status == 'Internal Review Committee Approved' ? 'selected' : '' }}>Internal Review Committee Approved</option>
            <option value="Business Proposal Submitted" {{ $expression->status == 'Business Proposal Submitted' ? 'selected' : '' }}>Business Proposal Submitted</option>
            <option value="BPEC Evaluation" {{ $expression->status == 'BPEC Evaluation' ? 'selected' : '' }}>BPEC Evaluation</option>
            <option value="BPEC Approved" {{ $expression->status == 'BPEC Approved' ? 'selected' : '' }}>BPEC Approved</option>
            <option value="NSC Approved" {{ $expression->status == 'NSC Approved' ? 'selected' : '' }}>NSC Approved</option>
            <option value="IFAD Approved" {{ $expression->status == 'IFAD Approved' ? 'selected' : '' }}>IFAD Approved</option>
            <option value="Agreement Signed" {{ $expression->status == 'Agreement Signed' ? 'selected' : '' }}>Agreement Signed</option>
        </select>
>>>>>>> 082edc16197d236f6587164fdad4157ade96a531
    </form>
</td>


    <!-- ✅ Action Buttons -->
    <td>
        <div class="action-buttons">
            @if(auth()->user()->hasPermission('expressions', 'view'))
            <a href="{{ route('expressions.show', $expression->id) }}" class="btn btn-sm view-button" title="View">
                <img src="{{ asset('assets/images/view.png') }}" alt="View Icon" style="width: 16px; height: 16px;">
            </a>
            @endif
            @if(auth()->user()->hasPermission('expressions', 'edit'))
            <a href="{{ route('expressions.edit', $expression->id) }}" class="btn btn-sm edit-button" title="Edit">
                <img src="{{ asset('assets/images/edit2.png') }}" alt="Edit Icon" style="width: 16px; height: 16px;">
            </a>
            @endif
            @if(auth()->user()->hasPermission('expressions', 'delete'))
            <form action="{{ route('expressions.destroy', $expression->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm custom-button" title="Delete" onclick="return confirm('Are you sure?')">
                    <img src="{{ asset('assets/images/delete.png') }}" alt="Delete Icon" style="width: 16px; height: 16px;">
                </button>
            </form>
            @endif
        </div>
    </td>
</tr>

                        @endforeach
                    </tbody>
                </table>

                <nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item {{ $expressions->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $expressions->previousPageUrl() }}" tabindex="-1">Previous</a>
        </li>

        @php
            $currentPage = $expressions->currentPage();
            $lastPage = $expressions->lastPage();
            $startPage = max($currentPage - 2, 1);
            $endPage = min($currentPage + 2, $lastPage);
        @endphp

        @if ($startPage > 1)
            <li class="page-item"><a class="page-link" href="{{ $expressions->url(1) }}">1</a></li>
            @if ($startPage > 2)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif
        @endif

        @for ($i = $startPage; $i <= $endPage; $i++)
            <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                <a class="page-link" href="{{ $expressions->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        @if ($endPage < $lastPage)
            @if ($endPage < $lastPage - 1)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif
            <li class="page-item"><a class="page-link" href="{{ $expressions->url($lastPage) }}">{{ $lastPage }}</a></li>
        @endif

        <li class="page-item {{ $expressions->hasMorePages() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $expressions->nextPageUrl() }}">Next</a>
        </li>
    </ul>
</nav>
@php
    $currentPage = $expressions->currentPage();
    $perPage = $expressions->perPage();
    $total = $expressions->total();
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

<!-- JS for sidebar toggle -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.left-column');
        const content = document.querySelector('.right-column');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function () {
            sidebar.classList.toggle('hidden');
            if (sidebar.classList.contains('hidden')) {
                content.style.flex = '0 0 100%';
                content.style.padding = '20px';
            } else {
                content.style.flex = '0 0 80%';
                content.style.padding = '20px';
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function toggleDropdown(eoiId) {
    const statusDiv = document.getElementById('status-' + eoiId);

    statusDiv.innerHTML = `
        <select class="form-control form-control-sm" onchange="submitStatus(this, ${eoiId})">
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
    `;
}

function submitStatus(select, eoiId) {
    const value = select.value;
    const form = document.getElementById('status-form-' + eoiId);
    const input = document.getElementById('status-input-' + eoiId);

    if (value === 'Clear') {
        input.value = '';
    } else {
        input.value = value;
    }
 // Add a fade-out effect BEFORE submitting
 const badgeContainer = document.getElementById('status-' + eoiId);
        badgeContainer.style.transition = "opacity 0.5s ease";
        badgeContainer.style.opacity = 0; 
    // Optional visual feedback
    // Swal.fire({
    //     icon: 'info',
    //     title: 'Updating...',
    //     text: `Setting status to "${value}"`,
    //     timer: 1000,
    //     showConfirmButton: false
    // });

    setTimeout(() => {
        form.submit();
    }, 800); // short delay for visual feedback
}
document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        @endif

        @if(session('cleared'))
            Swal.fire({
                icon: 'success',
                title: 'Cleared!',
                text: '{{ session('cleared') }}',
                timer: 2000,
                showConfirmButton: false
            });
        @endif

        // When page loads after update, fade-in effect
        document.querySelectorAll('[id^=status-]').forEach(function(div) {
            div.style.opacity = 0;
            div.style.transition = "opacity 0.5s ease";
            setTimeout(() => {
                div.style.opacity = 1;
            }, 100);
        });
    });
</script>

</body>
</html>
