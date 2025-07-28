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
    
    <!-- <style>
        /* Reuse your styles here (same as original EOI index) */
        .frame { display: flex; flex-direction: row; justify-content: space-between; width: 100%; }
        .left-column { flex: 0 0 20%; border-right: 1px solid #dee2e6; }
        .right-column { flex: 0 0 80%; padding: 20px; transition: flex 0.3s ease, padding 0.3s ease; }
        .left-column.hidden { display: none; }
        #sidebarToggle { background-color: #126926; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; }
        #sidebarToggle:hover { background-color: #0a4818; }
        .view-button { color: white; background-color: #60C267; }
        .view-button:hover { border-color: green; }
        td { vertical-align: middle; white-space: nowrap; }
        .pagination .page-link { padding: 5px 10px; }
        .page-link { color: #28a745; }
        .page-item.active .page-link { color: #fff; background-color: #126926; border-color: #126926; }
    </style> -->

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
            transition: background-color 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .btn-back img {
            width: 45px;
            height: auto;
            margin-right: 5px;
            transition: transform 0.3s ease;
            background: none;
            position: relative;
            z-index: 1;
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
        .pagination .page-item {
            margin: 0 0px;
        }
        .pagination .page-link {
            padding: 5px 10px;
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
        .sidebar {
        transition: transform 0.3s ease; /* Smooth toggle animation */
    }

    .sidebar.hidden {
        transform: translateX(-100%); /* Move sidebar out of view */
    }

    #sidebarToggle {
        background-color: #126926; /* Match the back button color */
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    #sidebarToggle:hover {
        background-color: #0a4818; /* Darken the hover color */
    }


    .left-column.hidden {
    display: none; /* Hide the sidebar */
    }
    .right-column {
        transition: flex 0.3s ease, padding 0.3s ease; /* Smooth transition for width and padding */
    }
    .view-button { color: white; background-color: #60C267; }
        .view-button:hover { border-color: green; }
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

            <a href="{{ route('youth-proposals.index') }}" class="btn-back">
           <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div>


            <div class="center-heading text-center mt-4">
                <h1 style="font-size: 2.5rem; color: green;">Agreement Signed Youth Proposals</h1>
            </div>

            <div class="table-responsive mt-5">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 30px;">ID</th>
                            <th style="width: 320px;">Organization Name</th>
                            <th style="width: 220px;">Contact Person</th>
                            <th style="width: 200px;">Mobile Phone</th>
                            <th style="width: 260px;">Business Title</th>
                            <th style="width: 220px;">Status</th>
                            <th style="width: 170px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($signedProposals as $proposal)
                        <tr>
                            <td>{{ $proposal->id }}</td>
                            <td>{{ $proposal->organization_name }}</td>
                            <td>{{ $proposal->contact_person }}</td>
                            <td>{{ $proposal->mobile_phone }}</td>
                            <td>{{ $proposal->business_title }}</td>
                            <td>{{ $proposal->status }}</td>
                            <td>
                                <div style="display: flex; gap: 6px;">
                                    <a href="{{ route('youth-proposals.show', $proposal->id) }}" class="btn btn-sm view-button" title="View Proposal">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('youth-proposals.beneficiaries', $proposal->id) }}" class="btn btn-sm view-button" title="View Beneficiaries">
                                        <i class="fas fa-users"></i> View Beneficiaries
                                    </a>
                                </div>
                            </td>


                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No proposals found with status 'Agreement Signed'.</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        Showing {{ $signedProposals->firstItem() ?? 0 }} to {{ $signedProposals->lastItem() ?? 0 }} of {{ $signedProposals->total() }} entries
                    </div>
                    <div>
                        {{ $signedProposals->links() }}
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
