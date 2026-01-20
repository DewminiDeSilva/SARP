<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EOI Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="left-column">@include('dashboard.dashboardC') @csrf</div>
    <div class="right-column">
    <div class="d-flex align-items-center mb-3">
        <button id="sidebarToggle" class="btn btn-secondary mr-2"><i class="fas fa-bars"></i></button>
        <a href="{{ route('expressions.evaluation_completed') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>
    </div>

    <div class="container mt-5">
        <h2>EOI Details for Beneficiary: {{ $beneficiary->name_with_initials }}</h2>

        @if ($eoiData->isEmpty())
            <p>No EOI details found for this beneficiary.</p>
        @else
            @foreach ($eoiData as $data)
                <div class="mb-3">
                    <h5>Type of Project: <span class="text-success">{{ ucfirst($beneficiary->project_type ?? 'N/A') }}</span></h5>
                    <h5>4P Project - Business Concept Title: <span class="text-success">{{ $beneficiary->input2 ?? $beneficiary->eoi_business_title ?? 'N/A' }}</span></h5>
                    <h5>4P Project Category: <span class="text-success">{{ $beneficiary->input3 ?? $beneficiary->eoi_category ?? 'N/A' }}</span></h5>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('eoi_form.edit', $data->id) }}" class="btn btn-warning me-2">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('eoi_form.destroy', $data->id) }}" method="POST" class="delete-form d-inline" onsubmit="return confirmDelete(this)">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
                <br>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-4"><strong>EOI Planting Date:</strong> {{ $data->planting_date }}</div>
                            <div class="col-md-4"><strong>Total Acres:</strong> {{ $data->total_acres }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4"><strong>Total Cost:</strong> Rs. {{ number_format($data->total_cost, 2) }}</div>
                            <div class="col-md-4"><strong>GN Division:</strong> {{ $data->gn_division_name }}</div>
                        </div>

                        <h5 class="text-success mt-4">Farmer Contributions</h5>
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered table-striped">
                                <thead class="table-success">
                                    <tr><th>Date</th><th>Description</th><th>Value (Rs.)</th></tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->farmerContributions as $item)
                                    <tr><td>{{ $item->date }}</td><td>{{ $item->farmer_contribution }}</td><td>{{ number_format($item->cost, 2) }}</td></tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <h5 class="text-success mt-4">Promoter Contributions</h5>
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered table-striped">
                                <thead class="table-success">
                                    <tr><th>Date</th><th>Description</th><th>Value (Rs.)</th></tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->promoterContributions as $item)
                                    <tr><td>{{ $item->date }}</td><td>{{ $item->description }}</td><td>{{ number_format($item->cost, 2) }}</td></tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <h5 class="text-success mt-4">Grant Details</h5>
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered table-striped">
                                <thead class="table-success">
                                    <tr><th>Date</th><th>Description</th><th>Value (Rs.)</th><th>Issued By</th></tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->grantDetails as $item)
                                    <tr><td>{{ $item->date }}</td><td>{{ $item->description }}</td><td>{{ number_format($item->value, 2) }}</td><td>{{ $item->grant_issued_by }}</td></tr>
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
                <td>{{ $data->creditDetail->bank_name ?? 'No data available' }}</td>
            </tr>
            <tr>
                <th>Branch</th>
                <td>{{ $data->creditDetail->branch ?? 'No data available' }}</td>
            </tr>
            <tr>
                <th>Account No</th>
                <td>{{ $data->creditDetail->account_number ?? 'No data available' }}</td>
            </tr>
            <tr>
                <th>Amount</th>
               <td>
    @if($data->creditDetail && $data->creditDetail->credit_amount !== null)
        Rs. {{ number_format($data->creditDetail->credit_amount, 2) }}
    @else
        No data available
    @endif
</td>
            </tr>
            <tr>
                <th>Interest Rate</th>
                <td>{{ $data->creditDetail->interest_rate ?? 'No data available' }}%</td>
            </tr>
            <tr>
                <th>Number of Installments</th>
                <td>{{ $data->creditDetail->number_of_installments ?? 'No data available' }}</td>
            </tr>
            <tr>
                <th>Credit Issue Date</th>
                <td>{{ $data->creditDetail->credit_issue_date ?? 'No data available' }}</td>
            </tr>
            <tr>
                <th>Loan Installment Date</th>
                <td>{{ $data->creditDetail->loan_installment_date ?? 'No data available' }}</td>
            </tr>
            <tr>
                <th>Installment Due Date</th>
                <td>{{ $data->creditDetail->installment_due_date ?? 'No data available' }}</td>
            </tr>
        </tbody>
    </table>
</div>

                        
                        @php
                        $systemDate = \Carbon\Carbon::now()->format('Y-m-d');
                        @endphp
                        <h5 class="text-success mt-4">Credit Balance On</h5>
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr><th>Balance Date</th><th>Credit Balance</th></tr>
                                    <tr>
                                        <td>{{ $systemDate }}</td>
                                        <td>Rs. {{ number_format($data->creditDetail->credit_balance ?? 0, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h5 class="text-success mt-4">Credit Payments</h5>
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered table-striped">
                                <thead class="table-light">
                                    <tr><th>Payment Date</th><th>Installment Payment (Rs.)</th></tr>
                                </thead>
                                <tbody>
                                  @if ($data->creditDetail && $data->creditDetail->payments && count($data->creditDetail->payments) > 0)
    @foreach ($data->creditDetail->payments as $payment)
        <tr>
            <td>{{ $payment->payment_date }}</td>
            <td>Rs. {{ number_format($payment->installment_payment, 2) }}</td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="2">No payment records available.</td>
    </tr>
@endif

                                </tbody>
                            </table>
                        </div>

                        @if ($data->agricultureProducts && $data->agricultureProducts->count())
                            <h5 class="text-success mt-4">Agriculture Products</h5>
                            <div class="table-responsive mb-3">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-light">
                                        <tr><th>Product Name</th><th>Total Production</th><th>Total Income (Rs.)</th><th>Profit (Rs.)</th><th>Buyer Details</th></tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data->agricultureProducts as $product)
                                        <tr>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->total_production }}</td>
                                            <td>Rs. {{ number_format($product->total_income, 2) }}</td>
                                            <td>Rs. {{ number_format($product->profit, 2) }}</td>
                                            <td>{{ $product->buyer_details ?? '-' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.left-column');
        const content = document.querySelector('.right-column');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function () {
            sidebar.classList.toggle('hidden');
            content.style.flex = sidebar.classList.contains('hidden') ? '0 0 100%' : '0 0 80%';
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(form) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "This action will permanently delete the record.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
        return false;
    }
</script>
</body>
</html>
