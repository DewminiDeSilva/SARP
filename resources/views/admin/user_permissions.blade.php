<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assign Permissions — {{ $user->name }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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
        /*padding: 20px;*/
        border-right: 1px solid #dee2e6;
    }

    .right-column {
        flex: 0 0 80%;
        padding: 20px;
    }

    </style>

    <style>
    .btn-back {
        display: inline-flex;
        align-items: center;
        justify-content: center; /* Center content horizontally */
        /*background-color: #26CF23; /* Button background color */
        color: #fff; /* Text color */
        border: none; /* Remove default border */
        padding: 10px 50px; /* Adjust padding */
        border-radius: 4px; /* Rounded corners */
        text-decoration: none; /* Remove underline */
        font-size: 14px; /* Font size */
        transition: background-color 0.3s ease; /* Smooth transition */
        cursor: pointer; /* Pointer cursor on hover */
        position: relative; /* Position relative for text positioning */
        overflow: hidden; /* Hide overflow to create a smooth effect */
    }

    .btn-back img {
        width: 45px; /* Adjust the size of the arrow image */
        height: auto;
        margin-right: 5px; /* Space between the image and text */
        transition: transform 0.3s ease; /* Smooth transition for image */
        background: none; /* Ensure no background on the image */
        position: relative; /* Position relative for smooth animation */
        z-index: 1; /* Ensure image is on top */
    }

    .btn-back .btn-text {
        opacity: 0; /* Hide text initially */
        visibility: hidden; /* Hide text initially */
        position: absolute; /* Position absolutely within the button */
        right: 25px; /* Adjust right position to fit the button */
        background-color: #1e8e1e; /* Background color for text on hover */
        color: #fff; /* Text color */
        padding: 4px 8px; /* Padding around text */
        border-radius: 4px; /* Rounded corners for text background */
        transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease; /* Smooth transition */
        z-index: 0; /* Ensure text is beneath the image */
    }

    .btn-back:hover .btn-text {
        opacity: 1; /* Show text on hover */
        visibility: visible; /* Show text on hover */
        transform: translateX(-5px); /* Move text to the right on hover */
        padding: 10px 20px; /* Adjust padding */
        border-radius: 20px; /* Rounded corners */
    }

    .btn-back:hover img {
        transform: translateX(-50px); /* Move image to the left on hover */
    }

    .btn-back:hover {
        /*background-color: #1e8e1e; /* Dark green on hover */

    }
</style>

<style>
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

</style>

<style>
        /* Fixed Header */
        .fixed-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(to bottom,rgb(76, 167, 88), #a8d5ba); /* Vertical gradient */
            color: black; /* Text color */
            z-index: 1000; /* Ensures header stays above other elements */
            padding: 10px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional shadow for depth */
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom-left-radius: 20px; /* Adjust this value for more/less curve */
            border-bottom-right-radius: 20px; /* Adjust this value for more/less curve */
        }

        /* Logo and Text */
        .fixed-header .logo-container {
            display: flex;
            align-items: center;
            font-family: 'Noto Sans', sans-serif; /* Apply Noto Sans font */
            font-size: 1.8rem; /* Adjust the font size */
            margin: 0;
            color: black; /* Text color */
            font-weight: bold; /* Ensure the title stands out */
            text-align: center;
        }

        .fixed-header img {
            height: 40px;
            margin-right: 10px;
        }

        /* Profile Section */
        .fixed-header .profile {
            display: flex;
            align-items: center;
            font-size: 1rem;
        }

        .fixed-header .profile img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Padding to prevent overlap */
        .content {
            margin-top: 80px; /* Adjust based on header height */
        }

        .left-section {
            display: flex;
            align-items: center;
            gap: 15px; /* Add space between the logos */
        }

        .ministry-logo, .ifad-logo, .sharp-logo {
            height: 50px; /* Ensure all logos are of the same height */
            max-width: 70px; /* Limit the width to ensure proportions are maintained */
        }

        /* Custom width for the Ministry logo */
        .custom-ministry-logo {
            max-width: 120px; /* Adjust the width as needed */
        }
    </style>

<style>
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

</style>

<style>
/* Style checkboxes to appear green when checked */
input[type="checkbox"] {
    accent-color: #1e8e1e; /* Green color */
    width: 18px;
    height: 18px;
    cursor: pointer;
}

/* Optional: Add a green border around unchecked checkboxes */
input[type="checkbox"]:not(:checked) {
    border: 2px solid #1e8e1e;
    background-color: white;
    width: 18px;
    height: 18px;
}
</style>

<style>

/* General checkbox styling */
table td input[type="checkbox"] {
    width: 20px;
    height: 20px;
    cursor: pointer;
}

/* Column 2 = View */
table td:nth-child(2) input[type="checkbox"] {
    accent-color: #1e8e1e; /* Green */
}

/* Column 3 = Add */
table td:nth-child(3) input[type="checkbox"] {
    accent-color: #1e60d3; /* Blue */
}

/* Column 4 = Edit */
table td:nth-child(4) input[type="checkbox"] {
    accent-color: #17a2b8; /* Red */
}

/* Column 5 = Delete */
table td:nth-child(5) input[type="checkbox"] {
    accent-color: #c0392b; /* Orange */
}

/* Column 6 = Upload CSV */
table td:nth-child(6) input[type="checkbox"] {
    accent-color: #8e44ad; /* Purple */
}

    </style>

<style>
    .sarp-perm {
        font-family: 'Inter', system-ui, sans-serif;
        --sarp-green: #126926;
        --sarp-green-light: #ecfdf5;
        --sarp-border: rgba(15, 23, 42, 0.08);
    }
    .sarp-perm-hero {
        background: linear-gradient(135deg, #0f3d2a 0%, #126926 42%, #0d9488 100%);
        border-radius: 16px;
        padding: 1.5rem 1.75rem;
        margin-bottom: 1.25rem;
        color: #fff;
        box-shadow: 0 12px 40px rgba(18, 105, 38, 0.28);
    }
    .sarp-perm-hero h1 {
        font-size: 1.35rem;
        font-weight: 700;
        margin: 0 0 0.35rem;
        letter-spacing: -0.02em;
    }
    .sarp-perm-hero p {
        margin: 0;
        opacity: 0.92;
        font-size: 0.9rem;
    }
    .sarp-perm-user-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(255, 255, 255, 0.15);
        padding: 0.35rem 0.85rem;
        border-radius: 999px;
        font-weight: 600;
        font-size: 0.95rem;
        margin-top: 0.75rem;
    }
    .sarp-perm-toolbar {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        align-items: center;
        margin-bottom: 1rem;
        padding: 0.85rem 1rem;
        background: linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%);
        border: 1px solid var(--sarp-border);
        border-radius: 12px;
    }
    .sarp-perm-toolbar .btn {
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.8125rem;
        padding: 0.45rem 0.9rem;
    }
    .sarp-perm-toolbar .btn-sarp-primary {
        background: linear-gradient(135deg, #15803d, var(--sarp-green));
        border: none;
        color: #fff;
    }
    .sarp-perm-toolbar .btn-sarp-primary:hover {
        filter: brightness(1.06);
        color: #fff;
    }
    .sarp-perm-toolbar .btn-outline-secondary {
        border-color: #cbd5e1;
    }
    .sarp-perm-toolbar-hint {
        font-size: 0.78rem;
        color: #64748b;
        margin-left: auto;
        max-width: 22rem;
    }
    .sarp-perm-card {
        background: #fff;
        border-radius: 14px;
        border: 1px solid var(--sarp-border);
        box-shadow: 0 4px 24px rgba(15, 23, 42, 0.06);
        overflow: hidden;
    }
    .sarp-perm-table-wrap {
        max-height: min(70vh, 900px);
        overflow: auto;
    }
    .sarp-perm-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        font-size: 0.8125rem;
    }
    .sarp-perm-table thead th {
        position: sticky;
        top: 0;
        z-index: 3;
        background: linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%);
        border-bottom: 2px solid #e2e8f0;
        padding: 0.5rem 0.35rem;
        font-weight: 700;
        font-size: 0.7rem;
        color: #475569;
        white-space: nowrap;
        vertical-align: middle;
    }
    .sarp-perm-th-col {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.25rem;
    }
    .sarp-perm-th-col span {
        font-size: 0.68rem;
    }
    .sarp-perm-table tbody tr:nth-child(even) {
        background: #fafbfc;
    }
    .sarp-perm-table tbody tr:hover {
        background: var(--sarp-green-light);
    }
    .sarp-perm-table td {
        padding: 0.45rem 0.4rem;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }
    .sarp-perm-table td.sarp-perm-module-cell {
        position: sticky;
        left: 2.75rem;
        z-index: 2;
        background: inherit;
        text-align: left;
        font-weight: 600;
        color: #0f172a;
        min-width: 11rem;
        max-width: 16rem;
        padding-left: 0.65rem;
        border-right: 1px solid #e2e8f0;
        box-shadow: 4px 0 12px rgba(15, 23, 42, 0.04);
    }
    .sarp-perm-table thead th.sarp-perm-corner {
        position: sticky;
        left: 0;
        z-index: 5;
        background: linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%);
        width: 2.75rem;
        min-width: 2.75rem;
        max-width: 2.75rem;
    }
    .sarp-perm-table thead th.sarp-perm-module-head {
        position: sticky;
        left: 2.75rem;
        z-index: 5;
        background: linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%);
        text-align: left;
        padding-left: 0.75rem;
        text-transform: none;
        letter-spacing: normal;
        font-size: 0.8rem;
    }
    .sarp-perm-table tbody td.sarp-perm-row-master {
        position: sticky;
        left: 0;
        z-index: 2;
        background: inherit;
        border-right: 1px solid #e2e8f0;
        width: 2.75rem;
        min-width: 2.75rem;
        max-width: 2.75rem;
    }
    .sarp-perm-table tbody tr:nth-child(even) td.sarp-perm-row-master,
    .sarp-perm-table tbody tr:nth-child(even) td.sarp-perm-module-cell {
        background: #fafbfc;
    }
    .sarp-perm-table tbody tr:hover td.sarp-perm-row-master,
    .sarp-perm-table tbody tr:hover td.sarp-perm-module-cell {
        background: var(--sarp-green-light);
    }
    .sarp-perm-cb {
        width: 1.15rem;
        height: 1.15rem;
        cursor: pointer;
        accent-color: var(--sarp-green);
        border-radius: 4px;
    }
    .sarp-perm-cb[data-action="view"] { accent-color: #16a34a; }
    .sarp-perm-cb[data-action="add"] { accent-color: #2563eb; }
    .sarp-perm-cb[data-action="edit"] { accent-color: #0891b2; }
    .sarp-perm-cb[data-action="delete"] { accent-color: #dc2626; }
    .sarp-perm-cb[data-action="upload_csv"] { accent-color: #7c3aed; }
    .sarp-perm-save {
        margin-top: 1.25rem;
        padding: 0.6rem 1.5rem;
        border-radius: 10px;
        font-weight: 600;
        background: linear-gradient(135deg, #15803d, var(--sarp-green));
        border: none;
        color: #fff;
        box-shadow: 0 4px 14px rgba(18, 105, 38, 0.35);
    }
    .sarp-perm-save:hover {
        filter: brightness(1.05);
        color: #fff;
    }
    @media (max-width: 992px) {
        .sarp-perm-toolbar-hint { margin-left: 0; width: 100%; }
    }
</style>

</head>
<body class="bg-light text-dark sarp-perm">

@include('dashboard.header')

<div class="frame" style="padding-top: 70px;">


<div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">

    <div class="d-flex align-items-center mb-3">

    <!-- Sidebar Toggle Button -->
    <button id="sidebarToggle" class="btn btn-secondary mr-2">
        <i class="fas fa-bars"></i>
    </button>


    <a href="{{  route('admin.admin.users') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>
    </div>

    <div class="container-fluid px-2 px-md-3 pb-5">
        <div class="sarp-perm-hero">
            <h1><i class="fas fa-user-shield me-2"></i>Assign permissions</h1>
            <p>Grant View, Add, Edit, Delete, and Upload CSV per module. Use row or column shortcuts to select many at once.</p>
            <div class="sarp-perm-user-badge">
                <i class="fas fa-user"></i>
                <span>{{ $user->name }}</span>
                @if($user->email)
                    <span class="opacity-75 fw-normal">· {{ $user->email }}</span>
                @endif
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-3 mb-3">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.assign.permissions', $user->id) }}" id="permForm">
            @csrf

            <div class="sarp-perm-toolbar">
                <button type="button" class="btn btn-sarp-primary" id="permSelectAll" title="Check every permission">
                    <i class="fas fa-check-double me-1"></i> Select all
                </button>
                <button type="button" class="btn btn-outline-secondary" id="permClearAll" title="Uncheck every permission">
                    <i class="fas fa-times me-1"></i> Clear all
                </button>
                <span class="sarp-perm-toolbar-hint">
                    <i class="fas fa-info-circle text-success me-1"></i>
                    <strong>Row</strong> = all actions for that module. <strong>Column</strong> = that action for every module.
                </span>
            </div>

            <div class="sarp-perm-card">
                <div class="sarp-perm-table-wrap">
                    <table class="sarp-perm-table table-bordered mb-0 text-center">
                        <thead>
                            <tr>
                                <th class="sarp-perm-corner"><span class="visually-hidden">Row</span></th>
                                <th class="sarp-perm-module-head">Module</th>
                                @foreach ($actions as $action)
                                    <th>
                                        <div class="sarp-perm-th-col">
                                            <input type="checkbox" class="sarp-perm-cb perm-col-select" data-action="{{ $action }}" title="Select all: {{ str_replace('_', ' ', $action) }}" aria-label="Select all {{ $action }} for every module">
                                            @if($action === 'view')<i class="fas fa-eye text-success" style="font-size:0.75rem;"></i>
                                            @elseif($action === 'add')<i class="fas fa-plus-circle text-primary" style="font-size:0.75rem;"></i>
                                            @elseif($action === 'edit')<i class="fas fa-pen text-info" style="font-size:0.75rem;"></i>
                                            @elseif($action === 'delete')<i class="fas fa-trash-alt text-danger" style="font-size:0.75rem;"></i>
                                            @else<i class="fas fa-file-upload" style="font-size:0.75rem;color:#7c3aed;"></i>
                                            @endif
                                            <span>{{ str_replace('_', ' ', ucfirst($action)) }}</span>
                                        </div>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modules as $module)
                                <tr data-module="{{ e($module) }}">
                                    <td class="sarp-perm-row-master">
                                        <input type="checkbox" class="sarp-perm-cb perm-row-select" title="All permissions for this module" aria-label="Select all permissions for {{ $moduleLabels[$module] ?? $module }}">
                                    </td>
                                    <td class="sarp-perm-module-cell">
                                        {{ $moduleLabels[$module] ?? ucfirst(str_replace('_', ' ', $module)) }}
                                    </td>
                                    @foreach ($actions as $action)
                                        <td>
                                            <input type="checkbox" name="permissions[]"
                                                   class="sarp-perm-cb perm-cb"
                                                   data-module="{{ e($module) }}"
                                                   data-action="{{ $action }}"
                                                   value="{{ $module }}|{{ $action }}"
                                                   {{ $user->hasPermission($module, $action) ? 'checked' : '' }}>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <button type="submit" class="btn sarp-perm-save">
                <i class="fas fa-save me-2"></i>Save permissions
            </button>
        </form>
    </div>

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

        const allPerm = () => document.querySelectorAll('#permForm .perm-cb');

        function syncRowBox(tr) {
            const boxes = tr.querySelectorAll('.perm-cb');
            const rowBox = tr.querySelector('.perm-row-select');
            if (!rowBox || !boxes.length) return;
            const n = [...boxes].filter(b => b.checked).length;
            rowBox.checked = n === boxes.length;
            rowBox.indeterminate = n > 0 && n < boxes.length;
        }

        function syncColBox(action) {
            const colBoxes = document.querySelectorAll('#permForm .perm-cb[data-action="' + action + '"]');
            const headBox = document.querySelector('#permForm .perm-col-select[data-action="' + action + '"]');
            if (!headBox || !colBoxes.length) return;
            const n = [...colBoxes].filter(b => b.checked).length;
            headBox.checked = n === colBoxes.length;
            headBox.indeterminate = n > 0 && n < colBoxes.length;
        }

        document.querySelectorAll('#permForm tr[data-module]').forEach(tr => {
            syncRowBox(tr);
        });
        @foreach ($actions as $action)
        syncColBox('{{ $action }}');
        @endforeach

        document.querySelectorAll('#permForm .perm-row-select').forEach(cb => {
            cb.addEventListener('change', function () {
                const tr = this.closest('tr');
                const on = this.checked;
                tr.querySelectorAll('.perm-cb').forEach(c => { c.checked = on; });
                this.indeterminate = false;
                @foreach ($actions as $action)
                syncColBox('{{ $action }}');
                @endforeach
            });
        });

        document.querySelectorAll('#permForm .perm-col-select').forEach(cb => {
            cb.addEventListener('change', function () {
                const action = this.dataset.action;
                const on = this.checked;
                document.querySelectorAll('#permForm .perm-cb[data-action="' + action + '"]').forEach(c => { c.checked = on; });
                this.indeterminate = false;
                document.querySelectorAll('#permForm tr[data-module]').forEach(tr => syncRowBox(tr));
            });
        });

        document.querySelectorAll('#permForm .perm-cb').forEach(cb => {
            cb.addEventListener('change', function () {
                const tr = this.closest('tr');
                syncRowBox(tr);
                syncColBox(this.dataset.action);
            });
        });

        document.getElementById('permSelectAll').addEventListener('click', function () {
            allPerm().forEach(c => { c.checked = true; });
            document.querySelectorAll('#permForm .perm-row-select').forEach(b => { b.checked = true; b.indeterminate = false; });
            document.querySelectorAll('#permForm .perm-col-select').forEach(b => { b.checked = true; b.indeterminate = false; });
        });

        document.getElementById('permClearAll').addEventListener('click', function () {
            allPerm().forEach(c => { c.checked = false; });
            document.querySelectorAll('#permForm .perm-row-select').forEach(b => { b.checked = false; b.indeterminate = false; });
            document.querySelectorAll('#permForm .perm-col-select').forEach(b => { b.checked = false; b.indeterminate = false; });
        });
    });
</script>

</body>
</html>
