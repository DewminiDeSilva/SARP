<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your CSS -->
</head>
<body>
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6">Register</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 mb-6 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="bg-white p-6 rounded shadow-md">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required
                       class="w-full border-gray-300 rounded p-2 focus:outline-none focus:ring">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                       class="w-full border-gray-300 rounded p-2 focus:outline-none focus:ring">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold">Password</label>
                <input id="password" type="password" name="password" required
                       class="w-full border-gray-300 rounded p-2 focus:outline-none focus:ring">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 font-bold">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="w-full border-gray-300 rounded p-2 focus:outline-none focus:ring">
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
                    Register
                </button>
            </div>
        </form>
    </div>
</body>
</html>
