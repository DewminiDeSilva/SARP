<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Fingerling Details</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
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
        }
        .card-custom {
            background-color: #fcfcfc; /* Very light grey */
            margin-bottom: 20px;
        }
        .remove-stock-btn {
            background-color: #dc3545;
            border-color: #dc3545;
            font-size: 0.875rem;
            padding: 0.375rem 0.75rem;
        }
        .remove-stock-btn:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        #add-stock {
            background-color: #28a745; /* Green background */
            color: white; /* White text */
        }
        #add-stock:hover {
            background-color: #218838; /* Darker green when hovered */
        }
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
</head>
<body>
<div class="frame">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">
        <a href="{{ route('fingerling.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>
        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">Fingerling Stock Registration</h2>
        </div>
        <br>
        <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
            <form class="form-horizontal" action="{{ route('fingerling.store') }}" method="POST">
                @csrf
                <input type="hidden" name="tank_id" value="{{ $tank->id }}">
                
                <div class="form-group">
                    <label for="tank_name">Tank Name</label>
                    <input type="text" name="tank_name" id="tank_name" class="form-control" value="{{ $tank->tank_name }}" readonly>
                </div>


               <!-- Stocking Details Section -->
                <div class="card mb-4 mt-5 card-custom">
                    <div class="card-header bg-success text-white">
                        Stocking Details
                    </div>
                    <div class="card-body">
                        <div id="stocking-details-container">
                            <!-- First Row -->
                            <div class="row stock-group align-items-center">
                                <div class="col-md-4 form-group">
                                    <label>Stocking Date</label>
                                    <input type="date" name="stocking_details[0][stocking_date]" class="form-control" required>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Variety</label>
                                    <input type="text" name="stocking_details[0][variety]" class="form-control" required>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Stock Number</label>
                                    <input type="number" name="stocking_details[0][stock_number]" class="form-control" required>
                                </div>
                                <div class="col-md-1 d-flex align-items-center">
                                    <!-- No remove button for first row -->
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start mt-3">
                            <button type="button" id="add-more-stocking" class="btn btn-success">Add More Stocking Details</button>
                        </div>
                    </div>
                </div>





                <!-- Harvest Details -->
                <!-- Harvest Details Section -->
<div class="card mb-5 card-custom">
    <div class="card-header bg-success text-white">
        Harvest Details
    </div>
    <div class="card-body">
        <div id="harvest-details-container">
            <!-- First Row -->
            <div class="row harvest-group align-items-center">
                <div class="col-md-4 form-group">
                    <label>Harvest Date</label>
                    <input type="date" name="harvest_details[0][harvest_date]" class="form-control">
                </div>
                <div class="col-md-4 form-group">
                    <label>Variety</label>
                    <input type="text" name="harvest_details[0][variety]" class="form-control">
                </div>
                <div class="col-md-3 form-group">
                    <label>Harvest (kg)</label>
                    <input type="number" name="harvest_details[0][variety_harvest_kg]" class="form-control">
                </div>
                <div class="col-md-1 d-flex align-items-center">
                    <!-- No remove button for first row -->
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-start mt-3">
            <button type="button" id="add-more-harvest" class="btn btn-success">Add More Harvest Details</button>
        </div>

        <div class="form-group mt-4">
            <label for="amount_cumulative_kg">Total Harvest (kg)</label>
            <input type="number" name="amount_cumulative_kg" id="amount_cumulative_kg" class="form-control" readonly>
        </div>
    </div>
</div>


        <div class="form-group">
            <label for="community_distribution_kg">Community Distribution (kg)</label>
            <input type="number" name="community_distribution_kg" id="community_distribution_kg" class="form-control">
        </div>

        <div class="form-group">
            <label for="wholesale_quantity_kg">Wholesale Quantity (kg)</label>
            <input type="number" name="wholesale_quantity_kg" id="wholesale_quantity_kg" class="form-control">
        </div>

        <div class="form-group">
            <label for="total_income_rs">Total Income (Rs.)</label>
            <input type="number" name="total_income_rs" id="total_income_rs" class="form-control">
        </div>


        <div class="form-group">
            <label for="no_of_families_benefited">No. of Families Benefited</label>
            <input type="number" name="no_of_families_benefited" id="no_of_families_benefited" class="form-control">
        </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success mt-3">Submit</button>
                </div>
                
            </form>
        </div>
    </div>
</div>



<script>
    $(document).ready(function () {
    let stockingIndex = 1;
    let harvestIndex = 1;

    // Add more stocking rows
    $('#add-more-stocking').click(function () {
        const html = `
            <div class="row stock-group align-items-center mt-3">
                <div class="col-md-4 form-group">
                    <input type="date" name="stocking_details[${stockingIndex}][stocking_date]" class="form-control" required>
                </div>
                <div class="col-md-4 form-group">
                    <input type="text" name="stocking_details[${stockingIndex}][variety]" class="form-control" required>
                </div>
                <div class="col-md-3 form-group">
                    <input type="number" name="stocking_details[${stockingIndex}][stock_number]" class="form-control" required>
                </div>
                <div class="col-md-1 d-flex align-items-center">
                    <button type="button" class="btn btn-danger remove-stock-btn">Remove</button>
                </div>
            </div>
        `;
        $('#stocking-details-container').append(html);
        stockingIndex++;
    });

    // Remove stocking row
    $(document).on('click', '.remove-stock-btn', function () {
        $(this).closest('.stock-group').remove();
    });

    // Add more harvest rows
    $('#add-more-harvest').click(function () {
        const html = `
            <div class="row harvest-group align-items-center mt-3">
                <div class="col-md-4 form-group">
                    <input type="date" name="harvest_details[${harvestIndex}][harvest_date]" class="form-control" required>
                </div>
                <div class="col-md-4 form-group">
                    <input type="text" name="harvest_details[${harvestIndex}][variety]" class="form-control" required>
                </div>
                <div class="col-md-3 form-group">
                    <input type="number" name="harvest_details[${harvestIndex}][variety_harvest_kg]" class="form-control" required>
                </div>
                <div class="col-md-1 d-flex align-items-center">
                    <button type="button" class="btn btn-danger remove-harvest-btn">Remove</button>
                </div>
            </div>
        `;
        $('#harvest-details-container').append(html);
        harvestIndex++;
    });

    // Remove harvest row
    $(document).on('click', '.remove-harvest-btn', function () {
        $(this).closest('.harvest-group').remove();
    });
});



</script>

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

<script>
    function updateCumulativeAmount() {
        let total = 0;
        $('input[name*="[variety_harvest_kg]"]').each(function () {
            const val = parseFloat($(this).val());
            if (!isNaN(val)) total += val;
        });
        $('#amount_cumulative_kg').val(total.toFixed(2));
    }

    $(document).ready(function () {
        // Initial update on page load
        updateCumulativeAmount();

        // Update on input
        $(document).on('input', 'input[name*="[variety_harvest_kg]"]', function () {
            updateCumulativeAmount();
        });

        // Also update after adding harvest rows
        $('#add-more-harvest').click(function () {
            setTimeout(updateCumulativeAmount, 100); // slight delay to ensure DOM renders
        });

        // Optional: Update after removing harvest
        $(document).on('click', '.remove-harvest-btn', function () {
            setTimeout(updateCumulativeAmount, 50);
        });
    });
</script>

<script>
  $(function(){
    const frm = $('form.form-horizontal');

    frm.on('submit', function(e){
      e.preventDefault();
      Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to submit these fingerling details?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, submit it!',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#28a745',  // theme green
        cancelButtonColor:  '#dc3545'   // theme red
      }).then((result) => {
        if (result.isConfirmed) {
          frm.off('submit');
          frm.submit();
        }
      });
    });
  });
</script>


</body>
</html>
