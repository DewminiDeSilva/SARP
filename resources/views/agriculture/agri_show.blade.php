<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agriculture Details</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }
        .right-column {
            flex: 0 0 80%;
            padding: 20px;
        }
        .left-column {
            flex: 0 0 20%;
            border-right: 1px solid #dee2e6;
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
    .list-group-item {
        font-size: 15px;
        background-color: #f8f9fa;
        border-color: #dee2e6;
    }

    h5.text-success {
        margin-top: 20px;
        font-weight: bold;
        color: #1e7e34;
    }

    /* Override li:hover globally if needed */
    .right-column li:hover {
        background-color: transparent !important;
        color: inherit !important;
        text-decoration: none !important;
        cursor: default !important;
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

    <!-- Sidebar Toggle Button -->
    <button id="sidebarToggle" class="btn btn-secondary mr-2">
        <i class="fas fa-bars"></i>
    </button>


    <a href="{{ route('agriculture.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>

    </div>

    <div class="container mt-5">
        <h2>Agriculture Details for Beneficiary: {{ $beneficiary->name_with_initials }}</h2>

        <div class="mb-3">
        <h5>Crop Category: <span class="text-success">{{ $cropCategory }}</span></h5>
        <h5>Crop Name: <span class="text-success">{{ $cropName }}</span></h5>
    </div>

        @if($agricultureData->isEmpty())
        <p>No agriculture data found for this beneficiary.</p>
    @endif

    @foreach ($agricultureData as $data)
    <div class="card mb-4">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-4"><strong>Planting Date:</strong> {{ $data->planting_date }}</div>
                <div class="col-md-4"><strong>Total Acres:</strong> {{ $data->total_acres }}</div>
                <div class="col-md-4"><strong>Total Livestock Area:</strong> {{ $data->total_livestock_area }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-4"><strong>Total Cost:</strong> Rs. {{ $data->total_cost }}</div>
                <div class="col-md-4"><strong>GN Division:</strong> {{ $data->gn_division_name }}</div>
            </div>

           <h5 class="text-success mt-4">Farmer Contributions</h5>
<div class="table-responsive mb-3">
    <table class="table table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Value (Rs.)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data->farmerContributions as $item)
            <tr>
                <td>{{ $item->date }}</td>
                <td>{{ $item->farmer_contribution }}</td>
                <td>{{ number_format($item->cost, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


          <h5 class="text-success mt-4">Promoter Contributions</h5>
<div class="table-responsive mb-3">
    <table class="table table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Value (Rs.)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data->promoterContributions as $item)
            <tr>
                <td>{{ $item->date }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ number_format($item->cost, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


         <h5 class="text-success mt-4">Grant Details</h5>
<div class="table-responsive mb-3">
    <table class="table table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Value (Rs.)</th>
                <th>Issued By</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data->grantDetails as $item)
            <tr>
                <td>{{ $item->date }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ number_format($item->value, 2) }}</td>
                <td>{{ $item->grant_issued_by }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

         <h5 class="text-success mt-4">Credit Details</h5>
<div class="table-responsive mb-3">
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th>Bank</th>
                <td>{{ $data->creditDetail->bank_name }}</td>
            </tr>
            <tr>
                <th>Branch</th>
                <td>{{ $data->creditDetail->branch }}</td>
            </tr>
            <tr>
                <th>Account No</th>
                <td>{{ $data->creditDetail->account_number }}</td>
            </tr>
            <tr>
                <th>Amount</th>
                <td>Rs. {{ number_format($data->creditDetail->credit_amount, 2) }}</td>
            </tr>
            <tr>
                <th>Interest Rate</th>
                <td>{{ $data->creditDetail->interest_rate }}%</td>
            </tr>
            <tr>
                <th>Number of Installments</th>
                <td>{{ $data->creditDetail->number_of_installments }}</td>
            </tr>
            <tr>
                <th>Credit Issue Date</th>
                <td>{{ $data->creditDetail->credit_issue_date }}</td>
            </tr>
            <tr>
                <th>Loan Installment Date</th>
                <td>{{ $data->creditDetail->loan_installment_date }}</td>
            </tr>
            <tr>
                <th>Installment Due Date</th>
                <td>{{ $data->creditDetail->installment_due_date }}</td>
            </tr>
            <tr>
                <th>Balance Date</th>
                <td>{{ $data->creditDetail->credit_balance_on_date }}</td>
            </tr>
            <tr>
                <th>Credit Balance</th>
                <td>Rs. {{ number_format($data->creditDetail->credit_balance, 2) }}</td>
            </tr>
        </tbody>
    </table>
</div>


          <h5 class="text-success mt-4">Credit Payments</h5>
<div class="table-responsive mb-3">
    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>Payment Date</th>
                <th>Installment Payment (Rs.)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data->creditDetail->payments as $payment)
            <tr>
                <td>{{ $payment->payment_date }}</td>
                <td>Rs. {{ number_format($payment->installment_payment, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('agriculture.edit', $data->id) }}" class="btn btn-warning me-2"><i class="fas fa-edit"></i> Edit</a>
                <form action="{{ route('agriculture.destroy', $data->id) }}" method="POST" onsubmit="return confirmDelete(this)">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                </form>
            </div>

        </div>
    </div>
    @endforeach
</div>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.left-column');
        const content = document.querySelector('.right-column');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function () {
            // Toggle the 'hidden' class on the sidebar
            sidebar.classList.toggle('hidden');

            // Adjust the width of the content
            if (sidebar.classList.contains('hidden')) {
                content.style.flex = '0 0 100%'; // Expand to full width
                content.style.padding = '20px'; // Optional: Adjust padding for better visuals
            } else {
                content.style.flex = '0 0 80%'; // Default width
                content.style.padding = '20px'; // Reset padding
            }
        });
    });
</script>

</body>
</html>
