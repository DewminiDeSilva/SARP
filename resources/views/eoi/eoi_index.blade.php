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
            <a href="{{ route('beneficiary.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div>

        <div class="container-fluid">
            <div class="d-flex justify-content-between mb-3">
                <h2 style="color: green;">Expressions of Interest</h2>
                <a href="{{ route('expressions.create') }}" class="btn submitbtton">+ Submit New</a>
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
                            <th>Actions</th>
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
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('expressions.show', $expression->id) }}" class="btn btn-sm view-button" title="View">
                                        <img src="{{ asset('assets/images/view.png') }}" alt="View Icon" style="width: 16px; height: 16px;">
                                    </a>
                                    <a href="{{ route('expressions.edit', $expression->id) }}" class="btn btn-sm edit-button" title="Edit">
                                        <img src="{{ asset('assets/images/edit2.png') }}" alt="Edit Icon" style="width: 16px; height: 16px;">
                                    </a>
                                    <form action="{{ route('expressions.destroy', $expression->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm custom-button" title="Delete" onclick="return confirm('Are you sure?')">
                                            <img src="{{ asset('assets/images/delete.png') }}" alt="Delete Icon" style="width: 16px; height: 16px;">
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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

</body>
</html>
