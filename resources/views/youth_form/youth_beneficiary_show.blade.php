<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youth Data Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .frame { display: flex; flex-direction: row; justify-content: space-between; width: 100%; }
        .right-column { flex: 0 0 80%; padding: 20px; }
        .left-column { flex: 0 0 20%; border-right: 1px solid #dee2e6; }
        .btn-back { display: inline-flex; align-items: center; color: #fff; border: none; padding: 10px 50px; border-radius: 4px; text-decoration: none; font-size: 14px; cursor: pointer; background-color: #126926; }
        .btn-back img { width: 45px; height: auto; margin-right: 5px; }
        #sidebarToggle { background-color: #126926; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; }
        .left-column.hidden { display: none; }
        h5.text-success { margin-top: 20px; font-weight: bold; color: #1e7e34; }
    </style>
</head>
<body>
@include('dashboard.header')
<div class="frame" style="padding-top: 70px;">
    <div class="left-column">@include('dashboard.dashboardC') @csrf</div>
    <div class="right-column">
        <div class="d-flex align-items-center mb-3">
            <button id="sidebarToggle" class="btn btn-secondary mr-2"><i class="fas fa-bars"></i></button>
            <a href="{{ route('youth-proposals.beneficiaries', $beneficiary->youth_proposal_id) }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div>
        <div class="container mt-5">
            <h2>Youth Data for Beneficiary: {{ $beneficiary->name_with_initials }}</h2>
            @if ($youthData->isEmpty())
                <p>No youth data found for this beneficiary.</p>
            @else
                @foreach ($youthData as $data)
                    <div class="mb-3">
                        <h5>Youth Category: <span class="text-success">{{ $data->youth_category ?? 'N/A' }}</span></h5>
                        <h5>Youth Business Title: <span class="text-success">{{ $data->youth_business_title ?? 'N/A' }}</span></h5>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-md-4"><strong>Youth Starting Date:</strong> {{ $data->planting_date }}</div>
                                <div class="col-md-4"><strong>Youth Total Acres:</strong> {{ $data->total_acres }}</div>
                                <div class="col-md-4"><strong>Youth Total Livestock Area:</strong> {{ $data->total_livestock_area }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4"><strong>Youth Total Cost:</strong> Rs. {{ number_format($data->total_cost ?? 0, 2) }}</div>
                                <div class="col-md-4"><strong>GN Division:</strong> {{ $data->gn_division_name }}</div>
                            </div>
                            <h5 class="text-success mt-4">Farmer Contributions</h5>
                            <div class="table-responsive mb-3">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-success">
                                        <tr><th>Date</th><th>Description</th><th>Value (Rs.)</th></tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data->farmerContributions as $item)
                                            <tr><td>{{ $item->date }}</td><td>{{ $item->farmer_contribution }}</td><td>{{ number_format($item->cost ?? 0, 2) }}</td></tr>
                                        @empty
                                            <tr><td colspan="3">No records.</td></tr>
                                        @endforelse
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
                                        @forelse ($data->promoterContributions as $item)
                                            <tr><td>{{ $item->date }}</td><td>{{ $item->description }}</td><td>{{ number_format($item->cost ?? 0, 2) }}</td></tr>
                                        @empty
                                            <tr><td colspan="3">No records.</td></tr>
                                        @endforelse
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
                                        @forelse ($data->grantDetails as $item)
                                            <tr><td>{{ $item->date }}</td><td>{{ $item->description }}</td><td>{{ number_format($item->value ?? 0, 2) }}</td><td>{{ $item->grant_issued_by }}</td></tr>
                                        @empty
                                            <tr><td colspan="4">No records.</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            @if($data->creditDetail)
                                <h5 class="text-success mt-4">Credit Details</h5>
                                <div class="table-responsive mb-3">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr><th>Bank</th><td>{{ $data->creditDetail->bank_name ?? '-' }}</td></tr>
                                            <tr><th>Branch</th><td>{{ $data->creditDetail->branch ?? '-' }}</td></tr>
                                            <tr><th>Account No</th><td>{{ $data->creditDetail->account_number ?? '-' }}</td></tr>
                                            <tr><th>Amount</th><td>Rs. {{ number_format($data->creditDetail->credit_amount ?? 0, 2) }}</td></tr>
                                            <tr><th>Credit Balance On Date</th><td>{{ $data->creditDetail->credit_balance_on_date ?? '-' }}</td></tr>
                                            <tr><th>Credit Balance</th><td>Rs. {{ number_format($data->creditDetail->credit_balance ?? 0, 2) }}</td></tr>
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
                                            @forelse ($data->creditDetail->creditPayments ?? [] as $payment)
                                                <tr><td>{{ $payment->payment_date }}</td><td>Rs. {{ number_format($payment->installment_payment ?? 0, 2) }}</td></tr>
                                            @empty
                                                <tr><td colspan="2">No payment records.</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            @endif
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
                                                    <td>Rs. {{ number_format($product->total_income ?? 0, 2) }}</td>
                                                    <td>Rs. {{ number_format($product->profit ?? 0, 2) }}</td>
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
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var sidebar = document.querySelector('.left-column');
        var content = document.querySelector('.right-column');
        var toggleButton = document.getElementById('sidebarToggle');
        if (toggleButton) {
            toggleButton.addEventListener('click', function () {
                sidebar.classList.toggle('hidden');
                content.style.flex = sidebar.classList.contains('hidden') ? '0 0 100%' : '0 0 80%';
            });
        }
    });
</script>
</body>
</html>
