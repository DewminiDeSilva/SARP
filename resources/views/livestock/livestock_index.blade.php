<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livestock Details</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --accent-color: #3498db;
            --light-gray: #f8f9fa;
            --border-color: #dee2e6;
            --header-bg: #f3f4f6;  /* Light gray header background */
        }

        body {
            background-color: var(--light-gray);
            color: var(--primary-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        h2 {
            color: var(--primary-color);
            border-bottom: 3px solid var(--accent-color);
            padding-bottom: 1rem;
            margin-bottom: 2rem;
            font-weight: 600;
        }

        .table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            overflow: hidden;
        }

        .table thead th {
            background-color: var(--header-bg) !important;
            color: #444;
            font-weight: 600;
            padding: 1rem;
            border-right: 1px solid #dee2e6;
            border-bottom: 2px solid #dee2e6;
            position: relative;
        }

        /* Add sort indicator space */
        
        .table thead th:last-child {
            border-right: none;
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-right: 1px solid #dee2e6;
            background-color: white;
        }

        .table tbody td:last-child {
            border-right: none;
        }

        .table tbody tr:hover td {
            background-color: #f8f9fa;
            transition: background-color 0.3s ease;
        }

        /* Alternating row colors */
        .table tbody tr:nth-child(even) td {
            background-color: #fafafa;
        }

        /* Detail box styling */
        .detail-box {
            background-color: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 8px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .detail-box:last-child {
            margin-bottom: 0;
        }

        /* Button Styling */
        .btn {
            border-radius: 5px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            margin: 2px;
        }

        .btn-warning {
            background-color: #f1c40f;
            border-color: #f1c40f;
            color: var(--primary-color);
        }

        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        /* Empty state styling */
        .empty-state {
            text-align: center;
            padding: 1rem;
            color: #666;
            background-color: #f8f9fa;
            border-radius: 6px;
            font-style: italic;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .table thead {
                display: none;
            }

            .table tbody td {
                display: block;
                padding: 0.5rem;
                border-right: none;
                border-bottom: 1px solid #dee2e6;
            }

            .table tbody td::before {
                content: attr(data-label);
                font-weight: bold;
                display: block;
                margin-bottom: 0.5rem;
                color: #444;
            }

            .table tbody tr {
                border-bottom: 2px solid #dee2e6;
            }

            .btn {
                display: block;
                width: 100%;
                margin-bottom: 0.5rem;
            }
        }
    </style>
</head>
<body>

    
    <!-- Rest of the HTML remains the same as in the previous version -->
    <div class="container">
        <h2>Livestock Details for Beneficiary: <span>{{ $beneficiary->name_with_initials }}</span></h2>

        <table class="table">
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
                    <td data-label="Livestock Type">{{ $livestock->livestock_type ?? 'N/A' }}</td>
                    <td data-label="Production Focus">{{ $livestock->production_focus ?? 'N/A' }}</td>
                    <td data-label="Commencement Date">{{ $livestock->livestock_commencement_date ?? 'N/A' }}</td>
                    <td data-label="Total Area">{{ $livestock->total_livestock_area ?? 'N/A' }}</td>
                    <td data-label="Total Acres">{{ $livestock->total_number_of_acres ?? 'N/A' }}</td>
                    <td data-label="Total Cost">{{ $livestock->total_cost ?? 'N/A' }}</td>
                    <td data-label="Inputs">{{ $livestock->inputs ?? 'N/A' }}</td>
                    
                    <td data-label="Farmer Contributions">
                        @if($livestock->liveContributions->isNotEmpty())
                            @foreach($livestock->liveContributions as $contribution)
                                <div class="detail-box">
                                    <strong>Contribution:</strong> {{ $contribution->contribution_type }}<br>
                                    <strong>Cost:</strong> {{ $contribution->cost }}
                                </div>
                            @endforeach
                        @else
                            <div class="empty-state">No farmer contributions available</div>
                        @endif
                    </td>

                    <td data-label="Product Details">
                        @if($livestock->liveProducts->isNotEmpty())
                            @foreach($livestock->liveProducts as $product)
                                <div class="detail-box">
                                    <strong>Product:</strong> {{ $product->product_name }}<br>
                                    <strong>Total Production:</strong> {{ $product->total_production }} kg<br>
                                    <strong>Total Income:</strong> {{ $product->total_income }}<br>
                                    <strong>Profit:</strong> {{ $product->profit }}
                                </div>
                            @endforeach
                        @else
                            <div class="empty-state">No products available</div>
                        @endif
                    </td>

                    <td data-label="Actions">
                        <a href="{{ route('livestocks.edit', ['beneficiary_id' => $beneficiary->id, 'livestock' => $livestock->id]) }}" 
                           class="btn btn-warning">Edit</a>
                        <form action="{{ route('livestocks.destroy', ['beneficiary_id' => $beneficiary->id, 'livestock_id' => $livestock->id]) }}" 
                              method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" 
                                    onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if($livestocks->isEmpty())
            <div class="empty-state">
                <p>No livestock data found for this beneficiary.</p>
            </div>
        @endif
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>