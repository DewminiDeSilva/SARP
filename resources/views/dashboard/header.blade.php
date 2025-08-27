<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.5/dist/cdn.min.js" defer></script>

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
    <img src="{{ Auth::user()->profile_image }}" alt="Profile Image" class="profile-img">
        <!-- <img src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : asset('assets/images/default_profile.png') }}"
             alt="Profile Image"
             class="profile-img"> -->
        <span id="profile-trigger">{{ Auth::user()->name }}<i class="arrow"></i></span>


        <div id="profile-dropdown" class="profile-dropdown">
            <a href="{{ route('profile.edit') }}">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="border: none; background: none; color: white; width: 100%; text-align: left; padding: 10px; cursor: pointer;">Log Out</button>
            </form>
        </div>
    </div>

</div>



<style>
    .fixed-header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background: linear-gradient(to bottom, #527076ff, #a1b1bdff);
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

    .logo-container {
            display: flex;
            align-items: center;
            font-family: 'Noto Sans', sans-serif;
            font-size: 1.8rem;
            font-weight: bold;
            text-align: center;
        }

    .fixed-header .profile {
        position: relative;
        display: flex;
        align-items: center;
        cursor: pointer;
    }


</style>







<script>
    document.addEventListener("DOMContentLoaded", function () {
        const profileMenu = document.getElementById("profile-dropdown");
        const profileTrigger = document.getElementById("profile-trigger");

        profileTrigger.addEventListener("click", function () {
            profileMenu.classList.toggle("show");
        });

        document.addEventListener("click", function (event) {
            if (!profileTrigger.contains(event.target) && !profileMenu.contains(event.target)) {
                profileMenu.classList.remove("show");
            }
        });
    });
</script>


    <style>
        .fixed-header .profile img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .profile-dropdown {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background:rgb(65, 125, 43);
            color: white;
            border-radius: 6px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            width: 150px;
            text-align: left;
            padding: 5px 0;
        }

        .profile-dropdown.show {
            display: block;
        }

        .profile-dropdown a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: white;
        }

        .profile-dropdown a:hover {
            background:rgb(36, 162, 38);
        }

        .profile span {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .profile .arrow {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-left: 2px solid black;
            border-bottom: 2px solid black;
            transform: rotate(-45deg);
            margin-left: 6px;
            transition: transform 0.3s ease;
        }

        /* Rotate Arrow when Dropdown is Open */
        .profile-dropdown.show + .arrow {
            transform: rotate(135deg);
        }

    </style>



</body>
</html>
