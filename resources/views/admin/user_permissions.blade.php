<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assign Permissions</title>

    <!-- Bootstrap CSS (optional, or replace with your framework CSS) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- If you're using Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light text-dark">

    <div class="container py-5">
        <h2 class="mb-4">Assign Permissions to: {{ $user->name }}</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.assign.permissions', $user->id) }}">
            @csrf

            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Module</th>
                            @foreach ($actions as $action)
                                <th>{{ ucfirst($action) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($modules as $module)
                            <tr>
                                <td class="text-start">{{ ucfirst(str_replace('_', ' ', $module)) }}</td>
                                @foreach ($actions as $action)
                                    <td>
                                        <input type="checkbox" name="permissions[]"
                                               value="{{ $module }}|{{ $action }}"
                                               {{ $user->hasPermission($module, $action) ? 'checked' : '' }}>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <button type="submit" class="btn btn-primary">Save Permissions</button>
        </form>
    </div>

</body>
</html>
