<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livestock Details</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Livestock Details for Beneficiary: {{ $beneficiary->first_name }} {{ $beneficiary->last_name }}</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Livestock Type</th>
                    <th>Production Focus</th>
                    <th>Commencement Date</th>
                    <th>Total Livestock Area</th>
                    <th>Total Number of Acres</th>
                    <th>Total Cost</th>
                    <th>Inputs</th>
                    <th>Farmer Contributions</th>
                    <th>Product Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livestocks as $livestock)
                <tr>
                    <td>{{ $livestock->livestock_type ?? 'N/A' }}</td>
                    <td>{{ $livestock->production_focus ?? 'N/A' }}</td>
                    <td>{{ $livestock->livestock_commencement_date ?? 'N/A' }}</td>
                    <td>{{ $livestock->total_livestock_area ?? 'N/A' }}</td>
                    <td>{{ $livestock->total_number_of_acres ?? 'N/A' }}</td>
                    <td>{{ $livestock->total_cost ?? 'N/A' }}</td>
                    <td>{{ $livestock->inputs ?? 'N/A' }}</td>
                    
                    <!-- Farmer Contributions and Costs -->
                    <td>
                        @if($livestock->liveContributions->isNotEmpty())
                            @foreach($livestock->liveContributions as $contribution)
                                <div style="border-bottom: 1px solid #dee2e6; padding: 5px;">
                                    Contribution: {{ $contribution->contribution_type }} - Cost: {{ $contribution->cost }}
                                </div>
                            @endforeach
                        @else
                            <div>No farmer contributions available</div>
                        @endif
                    </td>

                    <!-- Product Details -->
                    <td>
                        @if($livestock->liveProducts->isNotEmpty())
                            @foreach($livestock->liveProducts as $product)
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

                    <!-- Actions (Edit/Delete) -->
                    <td>
                        <!-- Edit button -->
                        <a href="{{ route('livestocks.edit', ['beneficiary_id' => $beneficiary->id, 'livestock' => $livestock->id]) }}" class="btn btn-sm btn-warning">Edit</a>


                        <!-- Delete form -->
                        
                        <form action="{{ route('livestocks.destroy', ['beneficiary_id' => $beneficiary->id, 'livestock_id' => $livestock->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>
                        </form>
                        
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if($livestocks->isEmpty())
            <p>No livestock data found for this beneficiary.</p>
        @endif
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
