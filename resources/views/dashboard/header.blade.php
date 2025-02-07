<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
.profile {
    display: flex;
    align-items: center;
    font-size: 1rem;
    gap: 10px;
}

.profile img {
    height: 40px;
    width: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.profile-btn, .logout-btn {
    background-color: white;
    color: black;
    border: 1px solid #333;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 0.9rem;
    text-decoration: none;
}

.profile-btn:hover, .logout-btn:hover {
    background-color: #ddd;
}

</style>

    <title>header</title>

</head>
<body>

<div class="fixed-header">
    <div class="left-section">
        <img src="{{ asset('assets/images/name ministry png.png') }}" alt="Ministry Logo" class="ministry-logo custom-ministry-logo">
        <img src="{{ asset('assets/images/ifad.png') }}" alt="IFAD Logo" class="ifad-logo">
        <img src="{{ asset('assets/images/sarp2.png') }}" alt="SHARP Logo" class="sharp-logo">
    </div>
    <div class="logo-container">
        <h1>Management Information System</h1>
    </div>
    <div class="profile">
    <img src="{{ asset('assets/images/LinkedIn_Profile_Photo.jpg') }}" alt="Profile">

    <!-- Display Logged-in User Name -->
    <span>{{ Auth::user()->name ?? 'Guest' }}</span>

    <!-- Profile Button -->
    <a href="{{ route('profile.edit') }}" class="profile-btn">Profile</a>

    <!-- Sign Out Button (Form) -->
    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button type="submit" class="logout-btn">Sign Out</button>
    </form>
</div>

</div>

<style>
    .fixed-header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background: linear-gradient(to bottom, rgb(76, 167, 88), #a8d5ba);
        color: black;
        z-index: 1000;
        padding: 10px 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
    }

    .fixed-header .logo-container {
        display: flex;
        align-items: center;
        font-family: 'Noto Sans', sans-serif;
        font-size: 1.8rem;
        margin: 0;
        color: black;
        font-weight: bold;
        text-align: center;
    }

    .fixed-header img {
        height: 40px;
        margin-right: 10px;
    }

    .fixed-header h1 {
        font-size: 1.5rem;
        margin: 0;
        color: black;
    }

    .fixed-header .profile {
        display: flex;
        align-items: center;
        font-size: 1rem;
    }

    .fixed-header .profile img {
        height: 40px;
        width: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }
</style>







</body>
</html>
