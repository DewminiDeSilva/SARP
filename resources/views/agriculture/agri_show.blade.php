<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agriculture Details</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Agriculture Details for Beneficiary: {{ $beneficiary->first_name }} {{ $beneficiary->last_name }}</h2>

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
