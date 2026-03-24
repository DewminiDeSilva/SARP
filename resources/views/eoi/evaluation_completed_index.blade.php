<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EOIs - Evaluation Completed</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    @include('partials.sarp_green_theme')

    <style>
    .entries-container {
        display: flex;
        align-items: center;
    }
    .entries-container label {
        margin-bottom: 0;
    }
    .entries-container select {
        display: inline-block;
        width: auto;
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

            <button type="button" id="sidebarToggle" class="btn mr-2">
                <i class="fas fa-bars"></i>
            </button>

            <a href="{{ route('expressions.index') }}" class="btn-back">
           <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div>


            <div class="center-heading text-center">
                <h1 class="sarp-page-title">Agreement Sign EOIs</h1>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-sarp-green sarp-table-nowrap">
                    <thead>
                        <tr>
                            <th>EOI ID</th>
                            <th>Organization Name</th>
                            <th>Contact Person</th>
                            <th>Mobile Phone</th>
                            <th>Business Title</th>
                            <th>Status</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($completedExpressions as $expression)
                        <tr>
                            <td>{{ $expression->eoi_code }}</td>
                            <td>{{ $expression->organization_name }}</td>
                            <td>{{ $expression->contact_person }}</td>
                            <td>{{ $expression->mobile_phone }}</td>
                            <td>{{ $expression->business_title }}</td>
                            <td>{{ $expression->status }}</td>
                            <td>
                                <a href="{{ route('expressions.show', $expression->id) }}" class="btn btn-sm view-button" title="View">
                                    <img src="{{ asset('assets/images/view.png') }}" alt="View Icon" style="width: 16px; height: 16px;">
                                </a>
                                <a href="{{ route('eoi.beneficiaries', $expression->id) }}" class="btn btn-sm btn-sarp-primary ml-1" title="View Beneficiaries">
                                View Beneficiaries
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No EOIs found with status 'Evaluation Completed'.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        Showing {{ $completedExpressions->firstItem() ?? 0 }} to {{ $completedExpressions->lastItem() ?? 0 }} of {{ $completedExpressions->total() }} entries
                    </div>
                    <div>
                        {{ $completedExpressions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sidebar toggle script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.left-column');
        const content = document.querySelector('.right-column');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function () {
            sidebar.classList.toggle('hidden');
            content.style.flex = sidebar.classList.contains('hidden') ? '0 0 100%' : '0 0 80%';
            content.style.padding = '20px';
        });
    });
</script>

</body>
</html>
