<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('{{ asset('assets/images/registration background.jpg') }}') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .container {
            margin-right: 75px;
            width: 70%;
            max-width: 1100px;
            display: flex;
            overflow: hidden;
        }

        .info-section .contact-details {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }


        .info-section {
            width: 40%;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        .info-section h1 {
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }

        .info-section p {
            margin-bottom: 10px;
            font-size: 14px;
            color: #555;
        }

        .info-section i {
            color:rgb(255, 255, 255);
            margin-right: 10px;
        }

        .form-section {
            width: 50%;
            padding: 40px;
            background:rgba(255, 255, 255, 0.63);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .form-section h2 {
            font-size: 28px;
            margin-bottom: 30px;
            color: #333;
            text-align: center;
        }

        .form-section form {
            display: flex;
            flex-direction: column;
        }

        .form-section label {
            margin-bottom: 10px;
            font-size: 16px;
            color: #555;
        }

        .hint {
            margin: 0;
            font-size: 14px;
            color: #888;
            font-style: italic;
        }

        .form-section input {
            margin-bottom: 20px;
            padding: 15px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
        }

        .form-section button {
            padding: 15px;
            background:rgb(7, 130, 7);
            color: #ffffff;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .form-section button:hover {
            background:rgb(40, 94, 14);
        }

        .form-section .footer-text {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            color: #555;
        }

        .form-section .footer-text a {
            color:rgb(8, 195, 8);
            text-decoration: none;
            font-weight: bold;
        }

        .form-section .footer-text a:hover {
            text-decoration: underline;
            color:rgb(20, 139, 24);
        }

        /* video.background-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        } */

        .main-header {
            position: absolute;
            top: 80px;
            left: 40px;
            color:rgb(19, 64, 3);
            font-size: 40px;
            line-height: 1.5;
            max-width: 50%;
            font-family: 'Lora', serif;
        }

        /* Additional styles for animation */
    /* @keyframes twoColorAnimation {
        0% {
            color:rgb(255, 255, 255);
        }
        50% {
            color:rgb(0, 0, 0);
        }
        100% {
            color:rgb(255, 255, 255);
        }
    } */


        .main-header .project-title {
            font-size: 50px;
            font-weight: bold;
            color:rgb(41, 132, 8);
            /* animation: twoColorAnimation 10s infinite alternate; */
        }

        .main-header p {
            /* animation: twoColorAnimation 10s infinite alternate; */
        }
    </style>
</head>
<body>
<!-- <video autoplay loop muted playsinline style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;">
<source src="{{ asset('assets/images/Register video.mp4') }}" type="video/mp4">

    Your browser does not support the video tag.
</video> -->

    <div style="position: absolute; top: 10px; left: 10px; display: flex; gap: 10px;">
        <img src="{{ asset('assets/images/name ministry png.png') }}" alt="Logo 1" style="height: 50px;">
        <img src="{{ asset('assets/images/ifad.png') }}" alt="Logo 2" style="height: 50px;">
        <img src="{{ asset('assets/images/sarp2.png') }}" alt="Logo 3" style="height: 50px;">
    </div>

    <div class="main-header">
        <p class="project-title">Smallholder Agribusiness & Resilience Project</p>
        <p>Welcome to SARP Management Information System</p>
    </div>
    <div class="container">
        <div class="info-section">
            <!-- <h1>Smallholder Agribusiness & Resilience Project</h1>
            <h1>Welcome to SARP Managment Information System</h1> -->
            <div style="position: absolute; bottom: 20px; left: 60px;">
                <div style="display: flex; flex-direction: column; gap: 5px;">
                    <div style="display: flex; justify-content: space-between; gap: 50px;">
                        <p style="color: white;"><i class="fas fa-phone"></i> +94 11 277 0986/+94112770998</p>
                        <p style="color: white; margin-right: 155px;"><i class="fas fa-globe"></i> https://www.sarp.lk</p>
                    </div>
                    <div style="display: flex; justify-content: space-between; gap: 50px;">
                        <p style="color: white;"><i class="fas fa-envelope"></i> Info@sarp.lk</p>
                        <p style="color: white; margin-right: 50px;"><i class="fas fa-map-marker-alt"></i> 2/2/1, Kandawatta Road, Pelawatta, </br>Battaramulla, Sri Lanka</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-section">
            <h2>Register</h2>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 mb-6 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required>

                <label for="email">Email <div class= "hint">*You must add your official email</div></label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>

                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>

                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>

                <button type="submit">Register</button>

                <p class="footer-text">Already have an account? <a href="{{ route('login') }}">Login now</a></p>
            </form>
        </div>
    </div>
</body>
</html>


