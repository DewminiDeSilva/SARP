<!-- In resources/views/livestock/livestock_by_gn_division.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livestock by GN Division</title>
</head>
<body>
@include('dashboard.header')
<div style="padding-top: 70px;">
    <h2>Livestock in {{ $gn_division_name }}</h2>
    <table>
        <thead>
            <tr>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Total Acres Cultivated</th>
                <th>Total Farmers</th>
                <th>Farmer Contribution</th>
                <th>Total Cost</th>
                <th>Inputs</th>
                <th>Production</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($livestock as $item)
            <tr>
                <td>{{ $item->category }}</td>
                <td>{{ $item->subcategory }}</td>
                <td>{{ $item->total_acres_cultivated }}</td>
                <td>{{ $item->total_farmers }}</td>
                <td>{{ $item->farmer_contribution }}</td>
                <td>{{ $item->total_cost }}</td>
                <td>{{ $item->inputs }}</td>
                <td>{{ $item->production }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="8">No livestock data found for this GN Division.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
