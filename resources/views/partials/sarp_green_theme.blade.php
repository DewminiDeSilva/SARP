{{-- SARP MIS unified green theme (include after Bootstrap in <head>) --}}
<style>
    :root {
        --sarp-green-dark: #0a4818;
        --sarp-green-primary: #126926;
        --sarp-green-action: #198754;
        --sarp-green-bright: #28a745;
        --sarp-green-soft: #60c267;
        --sarp-green-pale: #d4edda;
        --sarp-green-border: #c3e6cb;
        --sarp-green-hover-text: #145c32;
    }

    /* Sidebar layout (shared module pages) */
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
    .left-column.hidden {
        display: none;
    }

    /* Menu toggle — always green, not Bootstrap gray */
    #sidebarToggle,
    button#sidebarToggle {
        background-color: var(--sarp-green-primary) !important;
        color: #fff !important;
        border: none !important;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }
    #sidebarToggle:hover,
    button#sidebarToggle:hover {
        background-color: var(--sarp-green-dark) !important;
    }

    /* Back control */
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
        background-color: var(--sarp-green-primary);
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
        background-color: var(--sarp-green-action);
    }
    .btn-back:hover img {
        transform: translateX(-50px);
    }

    .sarp-page-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--sarp-green-primary) !important;
    }

    /* Tables */
    .table-sarp-green thead th,
    .table-sarp-green thead.thead-light th {
        background-color: var(--sarp-green-primary) !important;
        color: #fff !important;
        border-color: var(--sarp-green-dark) !important;
        vertical-align: middle;
    }
    .table-sarp-green.table-bordered thead th {
        border-color: rgba(255, 255, 255, 0.25) !important;
    }
    .table-sarp-green td {
        vertical-align: middle;
    }

    .sarp-table-nowrap td {
        white-space: nowrap;
    }

    /* Action / icon buttons */
    .view-button {
        color: #fff !important;
        background-color: var(--sarp-green-soft) !important;
        border-color: var(--sarp-green-bright) !important;
    }
    .view-button:hover {
        background-color: var(--sarp-green-action) !important;
        border-color: var(--sarp-green-primary) !important;
    }

    .btn-sarp-primary {
        background-color: var(--sarp-green-primary);
        border-color: var(--sarp-green-primary);
        color: #fff;
    }
    .btn-sarp-primary:hover {
        background-color: var(--sarp-green-dark);
        border-color: var(--sarp-green-dark);
        color: #fff;
    }
    .btn-sarp-outline {
        color: var(--sarp-green-primary);
        border-color: var(--sarp-green-bright);
        background: #fff;
    }
    .btn-sarp-outline:hover {
        background: var(--sarp-green-pale);
        color: var(--sarp-green-dark);
        border-color: var(--sarp-green-primary);
    }

    /* Match Bootstrap success to theme */
    .btn-success {
        background-color: var(--sarp-green-action) !important;
        border-color: var(--sarp-green-action) !important;
    }
    .btn-success:hover {
        background-color: var(--sarp-green-primary) !important;
        border-color: var(--sarp-green-primary) !important;
    }

    .alert-sarp-muted {
        background: var(--sarp-green-pale);
        border: 1px solid var(--sarp-green-border);
        color: var(--sarp-green-dark);
    }

    /* Pagination */
    .pagination .page-item {
        margin: 0 2px;
    }
    .pagination .page-link {
        color: var(--sarp-green-bright);
        padding: 5px 10px;
    }
    .page-item {
        background-color: #fff;
    }
    .page-item.active .page-link {
        z-index: 3;
        color: #fff !important;
        background-color: var(--sarp-green-primary) !important;
        border-color: var(--sarp-green-primary) !important;
    }

    /* Primary form submit used on many blades */
    .submitbtton {
        color: #fff !important;
        background-color: var(--sarp-green-action) !important;
        border-color: var(--sarp-green-action) !important;
    }
    .submitbtton:hover,
    .submitbtton:active {
        background-color: var(--sarp-green-dark) !important;
        border-color: var(--sarp-green-dark) !important;
        color: #fff !important;
    }
</style>
