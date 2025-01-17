<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agriculture Details</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
</head>
<body>
@include('dashboard.header')
<div class="frame" style="padding-top: 70px;">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">
    <a href="{{ route('agriculture.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>
    <div class="container mt-5">
        <h2>Agriculture Details for Beneficiary: {{ $beneficiary->name_with_initials }}</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Crop Name</th>
                    <th>Crop Variety</th>
                    <th>Farmer Contributions</th>
                    <th>Planting Date</th>
                    <th>Total Acres Cultivated</th>

                    <th>Product Details</th> <!-- New column for product details -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agricultureData as $data)
                <tr>
                    <td>{{ $data->category ?? 'N/A' }}</td>
                    <td>{{ $data->crop_name ?? 'N/A' }}</td>
                    <td>{{ $data->crop_variety ?? 'N/A' }}</td>

                    <!-- Farmer Contributions and Costs -->
                    <td>
                        @if($data->farmerContributions->isNotEmpty())
                            @foreach($data->farmerContributions as $contribution)
                                <div style="border-bottom: 1px solid #dee2e6; padding: 5px;">
                                    Contribution: {{ $contribution->farmer_contribution }} - Cost: {{ $contribution->cost }}
                                </div>
                            @endforeach
                        @else
                            <div>No farmer contributions available</div>
                        @endif
                    </td>

                    <td>{{ $data->planting_date ?? 'N/A' }}</td>
                    <td>{{ $data->total_acres ?? 'N/A' }}</td>

                    <!-- New section for product details (total production, income, and profit) -->
                    <td>
                        @if($data->agriculturProducts->isNotEmpty())
                            @foreach($data->agriculturProducts as $product)
                                <div style="border-bottom: 1px solid #dee2e6; padding: 5px;">
                                    Product: {{ $product->product_name }} <br>
                                    Total Production: {{ $product->total_production }} kg <br>
                                    Total Income: {{ $product->total_income }} <br>
                                    Profit: {{ $product->profit }}
                                </div>
                            @endforeach
                        @else
                            <div>No products available</div>
                        @endif
                    </td>

                    <td>
                        <!-- Edit button -->
                        <a href="{{ route('agriculture.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <!-- Delete form -->
                        <form action="{{ route('agriculture.destroy', $data->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if($agricultureData->isEmpty())
            <p>No agriculture data found for this beneficiary.</p>
        @endif
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
