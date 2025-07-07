<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agriculture Form</title>
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- CSRF Token for AJAX -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .custom-border {
            border: 2px solid green;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .dropdown-label {
            font-weight: bold;
        }
        .bold-label {
            font-weight: bold;
        }
        .color-label {
            color: green;
        }
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

        <div class="center-heading text-center">
            <h1 style="font-size: 2.5rem; color: green;">Cultivation Data of {{ $beneficiary->name_with_initials }}</h1>
        </div>
    </br>
        <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
        <form action="{{ route('agriculture.store') }}" method="POST">
            @csrf
           
<div class="row mt-3">
  <div class="col-md-4">
    <label for="cropCategory" class="form-label bold-label">Crop Category</label>
    <input type="text" class="form-control" id="cropCategory" name="crop_category" value="{{ $cropCategory }}" readonly>
  </div>


 <div class="col-md-4">
    <label for="cropName" class="form-label bold-label">Crop Name</label>
    <input type="text" class="form-control" id="cropName" name="crop_name" value="{{ $cropName }}" readonly>
  </div>


<!-- Planting Date -->

  <div class="col-md-4">
    <label for="plantingDate" class="form-label bold-label">Planting Date</label>
    <input type="date" class="form-control" id="plantingDate" name="planting_date">
  </div>
</div>

<!-- Total Acres & Total Livestock Area & Total Cost -->
<div class="row mt-3">
  <div class="col-md-4">
    <label for="totalAcres" class="form-label bold-label">Total Acres</label>
    <input type="number" class="form-control" id="totalAcres" name="total_acres" step="0.01" min="0">
  </div>
  <div class="col-md-4">
    <label for="totalLivestockArea" class="form-label bold-label">Total Livestock Area</label>
    <input type="number" class="form-control" name="total_livestock_area" step="0.01" min="0">
  </div>
  <div class="col-md-4">
    <label for="totalCost" class="form-label bold-label">Total Cost</label>
    <input type="number" class="form-control" name="total_cost" step="0.01" min="0">
  </div>
</div>
<!-- Farmer Contribution Section -->
<div class="mt-4">
  <h5>Farmer Contributions</h5>
  <div id="farmer-fields">
    <div class="row farmer-group mb-2">
      <div class="col-md-3">
         <label>Contribution Date</label>
        <input type="date" name="farmer_date[]" class="form-control" placeholder="Date">
      </div>
      <div class="col-md-5">
        <label>Contribution Description</label>
        <input type="text" name="farmer_contribution[]" class="form-control" placeholder="Contribution Description">
      </div>
      <div class="col-md-3">
          <label>Cost (Rs.)</label>
        <input type="number" step="0.01" name="cost[]" class="form-control" placeholder="Cost">
      </div>
    </div>
  </div>
  <button type="button" class="btn btn-sm btn-success mt-2" id="add-farmer">Add More</button>
</div>

<!-- Promoter Contribution Section -->
<div class="mt-4">
  <h5>Promoter Contributions</h5>
  <div id="promoter-fields">
    
    <div class="row promoter-group mb-2">
        
      <div class="col-md-3">
        <label>Contribution Date</label>
        <input type="date" name="promoter_date[]" class="form-control" placeholder="Date">
    </div>
      <div class="col-md-5">
         <label>Contribution Description</label>
        <input type="text" name="promoter_description[]" class="form-control" placeholder="Description">
    </div>
      <div class="col-md-3">
        <label>Cost (Rs.)</label>
        <input type="number" step="0.01" name="promoter_cost[]" class="form-control" placeholder="Cost">
    </div>
    </div>
  </div>
  <button type="button" class="btn btn-sm btn-success mt-2" id="add-promoter">Add More</button>
</div>

<!-- Grant Details Section -->
<div class="mt-4">
  <h5>Grant Details</h5>
  <div id="grant-fields">
    <div class="row grant-group mb-2">
      <div class="col-md-2">
        <label>Grant Date</label>
        <input type="date" name="grant_date[]" class="form-control" placeholder="Date">
    </div>
      <div class="col-md-4">
         <label>Grant Description</label>
        <input type="text" name="grant_description[]" class="form-control" placeholder="Description">
    </div>
      <div class="col-md-2">
         <label>Value</label>
        <input type="number" step="0.01" name="grant_value[]" class="form-control" placeholder="Value">
    </div>
      <div class="col-md-4">
         <label>Issued by</label>
        <input type="text" name="grant_issued_by[]" class="form-control" placeholder="Issued By">
    </div>
    </div>
  </div>
  <button type="button" class="btn btn-sm btn-success mt-2" id="add-grant">Add More</button>
</div>

<!-- Credit Detail (Single Entry) -->
<div class="mt-4">
  <h5>Credit Details</h5>
  <div class="row">
    <div class="col-md-4">
         <label>Bank Name</label>
        <input type="text" name="bank_name" class="form-control" placeholder="Bank Name">
    </div>
    <div class="col-md-4">
         <label>Branch</label>
        <input type="text" name="branch" class="form-control" placeholder="Branch">
    </div>
    <div class="col-md-4">
         <label>Account Number</label>
        <input type="text" name="account_number" class="form-control" placeholder="Account Number">
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-md-3">
            <label>Interest Rate (%)</label>
        <input type="number" step="0.01" name="interest_rate" class="form-control" placeholder="Interest Rate %">
    </div>
    <div class="col-md-3">
            <label>Credit Issue Date</label>
        <input type="date" name="credit_issue_date" class="form-control" placeholder="Issue Date">
    </div>
    <div class="col-md-3">
        <label>Loan Installment Date</label>
    <input type="date" name="loan_installment_date" class="form-control" placeholder="Installment Date">
</div>
    <div class="col-md-3">
        <label>Credit Amount (Rs.)</label>
        <input type="number" step="0.01" name="credit_amount" class="form-control" placeholder="Credit Amount">
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-md-3">
        <label>Number of Installments</label>
        <input type="number" name="number_of_installments" class="form-control" placeholder="no of Installments"></div>
    <div class="col-md-3">
        <label>Installment Due Date</label>
        <input type="date" name="installment_due_date" class="form-control" placeholder="Due Date"></div>
    <div class="col-md-3">
        <label>Credit Balance On Date</label>
        <input type="date" name="credit_balance_on_date" class="form-control" placeholder="Balance On Date"></div>
    <div class="col-md-3">
        <label>Credit Balance</label>
        <input type="number" step="0.01" name="credit_balance" class="form-control" placeholder="Credit Balance"></div>
  </div>
</div>

<!-- Credit Payments Section -->
<div class="mt-4">
  <h5>Credit Payments</h5>
  <div id="credit-payment-fields">
    <div class="row credit-payment-group mb-2">
      <div class="col-md-6">
         <label>Payment Date</label>
        <input type="date" name="payment_date[]" class="form-control" placeholder="Payment Date"></div>
      <div class="col-md-6">
            <label>Installment Payment (Rs.)</label>
        <input type="number" step="0.01" name="installment_payment[]" class="form-control" placeholder="Installment Payment"></div>
    </div>
  </div>
  <button type="button" class="btn btn-sm btn-success mt-2" id="add-credit-payment">Add More</button>
</div>




            <!-- GN Division Name -->
            <input type="hidden" id="gnDivisionName" name="gn_division_name">

            <!-- Submit Button -->
            <div class="row mt-4">
                <div class="col text-center">
                    <input type="hidden" name="beneficiary_id" value="{{ $beneficiaryId ?? '' }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <!-- jQuery Script for CSRF Token in AJAX -->
    <script>
        $('#categoryDropdown').change(function () {
    var selectedCategory = $(this).val();
    var cropNameDropdown = $('#cropName');

    // Clear previous options
    cropNameDropdown.empty().append($('<option>', {
        value: '',
        text: 'Select Crop Name'
    }));

    // Make AJAX call to fetch crops based on selected category
    if (selectedCategory) {
        $.ajax({
            url: '/get-crops/' + selectedCategory,
            method: 'GET',
            success: function (data) {
                console.log(data);  // Check the response in the browser console

                data.forEach(function (crop) {
                    var cropName = '';

                    // Dynamically set the crop name based on category
                    switch (selectedCategory) {
                        case 'vegetables':
                            cropName = crop.crop_name;
                            break;
                        case 'fruits':
                            cropName = crop.fruit_name;
                            break;
                        case 'home_garden':
                            cropName = crop.homegarden_name;
                            break;
                            case 'others':
                            cropName = crop.crop_name;
                            break;

                        default:
                            cropName = crop.name;
                    }

                    // Append the crop name to the dropdown
                    cropNameDropdown.append($('<option>', {
                        value: cropName,
                        text: cropName
                    }));
                });
            },
            error: function () {
                alert('Error fetching crops');
            }
        });
    }
});


        // Function to fetch the GN Division Name
        function fetchGnDivisionName(beneficiaryId) {
            if (beneficiaryId) {
                $.ajax({
                    url: '/get-gn-division-name/' + beneficiaryId,
                    method: 'GET',
                    success: function (data) {
                        $('#gnDivisionName').val(data.gn_division_name);
                    },
                    error: function () {
                        alert('Error fetching GN Division Name');
                    }
                });
            }
        }
        $(document).ready(function () {
    var beneficiaryId = $('input[name="beneficiary_id"]').val();
    fetchGnDivisionName(beneficiaryId);  // This should run on page load
    console.log("Fetching GN division for Beneficiary ID:", beneficiaryId);
});
    </script>

    <script>
    // Add farmer contribution fields dynamically
    document.getElementById('add-contribution').addEventListener('click', function () {
         var contributionFields = document.getElementById('contribution-fields');
         var newContributionGroup = document.createElement('div');
         newContributionGroup.className = 'row contribution-group mt-3';
         newContributionGroup.innerHTML = `
             <div class="col-5 form-group">
                 <label for="farmer_contribution[]">Farmer Contribution</label>
                 <input type="text" name="farmer_contribution[]" class="form-control" required>
             </div>
             <div class="col-5 form-group">
                 <label for="cost[]">Cost</label>
                 <input type="number" step="0.01" name="cost[]" class="form-control" required>
             </div>
             <div class="col-2">
                 <button type="button" class="btn btn-danger remove-contribution-btn">Remove</button>
             </div>
         `;
         contributionFields.appendChild(newContributionGroup);
     });

    // Remove contribution fields dynamically
    $(document).on('click', '.remove-contribution-btn', function() {
        $(this).closest('.contribution-group').remove();
    });

    // Add product details dynamically
    document.getElementById('add-product').addEventListener('click', function () {
         var productFields = document.getElementById('product-fields');
         var newProductGroup = document.createElement('div');
         newProductGroup.className = 'row product-group mt-3';
         newProductGroup.innerHTML = `
             <div class="col-4 form-group">
                 <label for="product_name[]">Product Name</label>
                 <input type="text" name="product_name[]" class="form-control" required>
             </div>
             <div class="col-3 form-group">
                 <label for="total_production[]">Total Production (kg)</label>
                 <input type="number" step="0.01" name="total_production[]" class="form-control" required>
             </div>
             <div class="col-3 form-group">
                 <label for="total_income[]">Total Income</label>
                 <input type="number" step="0.01" name="total_income[]" class="form-control" required>
             </div>
             <div class="col-2 form-group">
                 <label for="profit[]">Profit</label>
                 <input type="number" step="0.01" name="profit[]" class="form-control" required>
             </div>
             <div class="col-2">
                 <button type="button" class="btn btn-danger remove-product-btn">Remove</button>
             </div>
         `;
         productFields.appendChild(newProductGroup);
     });

    // Remove product fields dynamically
    $(document).on('click', '.remove-product-btn', function() {
        $(this).closest('.product-group').remove();
    });

    $('form').on('submit', function(e) {
    e.preventDefault(); // Prevent form submission temporarily
    console.log($(this).serialize()); // Log the serialized form data
    $(this).unbind('submit').submit(); // Re-enable form submission
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
<!-- JavaScript to handle dynamic Add More buttons -->
<script>
    $(document).on('click', '#add-farmer', function () {
  $('#farmer-fields').append(`
    <div class="row farmer-group mb-2">
      <div class="col-md-3"><input type="date" name="farmer_date[]" class="form-control" placeholder="Date"></div>
      <div class="col-md-5"><input type="text" name="farmer_contribution[]" class="form-control" placeholder="Contribution Description"></div>
      <div class="col-md-3"><input type="number" step="0.01" name="cost[]" class="form-control" placeholder="Cost"></div>
      <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-farmer">X</button></div>
    </div>`);
});

$(document).on('click', '.remove-farmer', function () {
  $(this).closest('.farmer-group').remove();
});

  $(document).on('click', '#add-promoter', function () {
    $('#promoter-fields').append(`
      <div class="row promoter-group mb-2">
        <div class="col-md-3"><input type="date" name="promoter_date[]" class="form-control"></div>
        <div class="col-md-5"><input type="text" name="promoter_description[]" class="form-control"></div>
        <div class="col-md-3"><input type="number" step="0.01" name="promoter_cost[]" class="form-control"></div>
        <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-promoter">X</button></div>
      </div>`);
  });
  $(document).on('click', '.remove-promoter', function () {
    $(this).closest('.promoter-group').remove();
  });

  $(document).on('click', '#add-grant', function () {
    $('#grant-fields').append(`
      <div class="row grant-group mb-2">
        <div class="col-md-2"><input type="date" name="grant_date[]" class="form-control"></div>
        <div class="col-md-4"><input type="text" name="grant_description[]" class="form-control"></div>
        <div class="col-md-2"><input type="number" step="0.01" name="grant_value[]" class="form-control"></div>
        <div class="col-md-3"><input type="text" name="grant_issued_by[]" class="form-control"></div>
        <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-grant">X</button></div>
      </div>`);
  });
  $(document).on('click', '.remove-grant', function () {
    $(this).closest('.grant-group').remove();
  });

  $(document).on('click', '#add-credit-payment', function () {
    $('#credit-payment-fields').append(`
      <div class="row credit-payment-group mb-2">
        <div class="col-md-6"><input type="date" name="payment_date[]" class="form-control"></div>
        <div class="col-md-5"><input type="number" step="0.01" name="installment_payment[]" class="form-control"></div>
        <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-credit-payment">X</button></div>
      </div>`);
  });
  $(document).on('click', '.remove-credit-payment', function () {
    $(this).closest('.credit-payment-group').remove();
  });
</script>

</body>
</html>
