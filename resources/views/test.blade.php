<!-- resources/views/officers/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Officer Action</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
        
    </style>
</head>
<body>
<div class="frame">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">
        <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
            <form class="form-horizontal" action="{{ route('officer.store', $grievance->id) }}" method="POST">
                <div class="col-md-12">
                    <h2 class="mb-4">Officer Actions Registration</h2>
                </div>
                @csrf
                <div class="row">
                    <div class="col-6 form-group">
                        <label for="name">Officer Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="col-6 form-group">
                        <label for="designation">Designation</label>
                        <input type="text" name="designation" id="designation" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="institution">Institution</label>
                    <input type="text" name="institution" id="institution" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="actions_taken">Actions Taken</label>
                    <textarea name="actions_taken" id="actions_taken" class="form-control" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="action_taken_date">Action Taken Date</label>
                    <input type="date" name="action_taken_date" id="action_taken_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="sign_off_date">Sign-off Date</label>
                    <input type="date" name="sign_off_date" id="sign_off_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="Pending">Pending</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" name="button" class="btn btn-success mt-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
