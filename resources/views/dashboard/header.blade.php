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
    gap: 12px;
    position: relative;
}

.profile img {
    height: 60px; /* 1.5x from original 40px */
    width: 60px; /* 1.5x from original 40px */
    border-radius: 50%;
    margin-right: 10px;
    object-fit: cover; /* Ensure image fills circle properly */
    object-position: center; /* Center the image */
    border: 3px solid #fff; /* White border for better visibility */
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow */
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
    <div>
        <h1>Monitoring Information System</h1>
    </div>
    <div class="profile">
        <img src="{{ Auth::user()->profile_image }}" alt="Profile Image" class="profile-img">
        <div class="profile-info">
            <div id="profile-trigger" class="profile-trigger">
                <div class="profile-name">{{ Auth::user()->name }}</div>
                <div class="profile-designation">{{ optional(Auth::user()->staffProfile)->designation ?? (Auth::user()->role ?? 'User') }}</div>
                <i class="arrow"></i>
            </div>
        </div>

        <div id="profile-dropdown" class="profile-dropdown">
            <a href="{{ route('profile.edit') }}">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-button">Log Out</button>
            </form>
        </div>
    </div>

</div>



<style>
    /* Enhanced Fixed Header with Beautiful Design */
    .fixed-header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #1e3c72 100%);
        color: #ffffff;
        z-index: 1000;
        padding: 18px 40px;
        box-shadow: 
            0 8px 32px rgba(0, 0, 0, 0.2),
            0 0 0 1px rgba(255, 255, 255, 0.1) inset,
            0 2px 0 rgba(255, 255, 255, 0.1) inset;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 3px solid rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: visible;
        z-index: 99999 !important;
        
    }
    




    /* Animated Background Pattern */
    .fixed-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.08) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.06) 0%, transparent 50%);
        pointer-events: none;
        z-index: 0;
    }

    .fixed-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, 
            transparent 0%, 
            rgba(255, 255, 255, 0.4) 20%, 
            rgba(255, 255, 255, 0.6) 50%, 
            rgba(255, 255, 255, 0.4) 80%, 
            transparent 100%);
        z-index: 1;
    }
.profile-dropdown { z-index: 100001; }
    /* Left Section - Logos */
    .fixed-header .left-section {
        display: flex;
        align-items: center;
        gap: 15px;
        position: relative;
        z-index: 2;
        background: rgba(255, 255, 255, 0.1);
        padding: 10px 20px;
        border-radius: 12px;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .fixed-header .left-section img {
        height: 65px;
        width: auto;
        margin-right: 0;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        transition: transform 0.3s ease;
    }

    .fixed-header .left-section img:hover {
        transform: scale(1.05);
    }

    /* Center Logo Container */
    .fixed-header .logo-container {
        display: flex;
        align-items: center;
        font-family: 'Segoe UI', 'Roboto', 'Arial', sans-serif;
        font-size: 2.4rem;
        margin: 0;
        color: #ffffff;
        font-weight: 800;
        text-align: center;
        position: relative;
        z-index: 2;
        text-shadow: 
            0 2px 4px rgba(0, 0, 0, 0.3),
            0 4px 8px rgba(0, 0, 0, 0.2);
        letter-spacing: 1px;
    }

    .fixed-header h1 {
        font-size: 2.4rem;
        margin: 0;
        color: #ffffff;
        background: linear-gradient(135deg, #ffffff 0%, #e0e7ff 50%, #ffffff 100%);
        background-size: 200% auto;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: textShimmer 4s linear infinite;
    }

    @keyframes textShimmer {
        0% {
            background-position: 0% center;
        }
        100% {
            background-position: 200% center;
        }
    }

    /* Profile Section */
    .fixed-header .profile {
        position: relative;
        display: flex;
        align-items: center;
        cursor: pointer;
        z-index: 2;
        background: rgba(255, 255, 255, 0.15);
        padding: 8px 15px;
        border-radius: 50px;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.2);
         position: relative; z-index: 100000;
    }

    .fixed-header .profile:hover {
        background: rgba(255, 255, 255, 0.25);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        transform: translateY(-2px);
    }

    .fixed-header .profile img {
        height: 55px;
        width: 55px;
        border-radius: 50%;
        margin-right: 12px;
        object-fit: cover;
        object-position: center;
        border: 3px solid rgba(255, 255, 255, 0.8);
        box-shadow: 
            0 4px 12px rgba(0, 0, 0, 0.3),
            0 0 0 2px rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
    }

    .fixed-header .profile:hover img {
        border-color: #ffffff;
        box-shadow: 
            0 6px 18px rgba(0, 0, 0, 0.4),
            0 0 0 3px rgba(255, 255, 255, 0.5);
        transform: scale(1.05);
    }

    .logo-container {
        display: flex;
        align-items: center;
        font-family: 'Segoe UI', 'Roboto', 'Arial', sans-serif;
        font-size: 2.4rem;
        font-weight: 800;
        text-align: center;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .fixed-header {
            padding: 15px 25px;
        }

        .fixed-header h1 {
            font-size: 1.8rem;
        }

        .fixed-header .left-section img {
            height: 50px;
        }
    }

    @media (max-width: 768px) {
        .fixed-header {
            padding: 12px 15px;
            flex-wrap: wrap;
        }

        .fixed-header .logo-container {
            font-size: 1.5rem;
            order: 3;
            width: 100%;
            margin-top: 10px;
        }

        .fixed-header h1 {
            font-size: 1.5rem;
        }

        .fixed-header .left-section {
            padding: 8px 15px;
        }

        .fixed-header .left-section img {
            height: 40px;
        }
    }


</style>
<!-- ADD this in your CSS (or inside <style>) -->
<style>
  :root { --header-height: 110px; }

  body{
    margin:0;
    padding-top: var(--header-height); /* pushes content below fixed header */
  }

  .fixed-header{
    position: fixed;
    top:0; left:0;
    width:100%;
    z-index: 99999; /* keep always on top */
    min-height: var(--header-height);
  }
</style>







<script>
    document.addEventListener("DOMContentLoaded", function () {
        const profileMenu = document.getElementById("profile-dropdown");
        const profileTrigger = document.getElementById("profile-trigger");

        profileTrigger.addEventListener("click", function (e) {
            e.stopPropagation();
            profileMenu.classList.toggle("show");
            profileTrigger.classList.toggle("active");
        });

        document.addEventListener("click", function (event) {
            if (!profileTrigger.contains(event.target) && !profileMenu.contains(event.target)) {
                profileMenu.classList.remove("show");
                profileTrigger.classList.remove("active");
            }
        });
    });
</script>


    <style>
        .fixed-header .profile img {
            height: 60px; /* 1.5x from original 40px */
            width: 60px; /* 1.5x from original 40px */
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover; /* Ensure image fills circle properly */
            object-position: center; /* Center the image */
            border: 3px solid #fff; /* White border for better visibility */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow */
        }

        .profile-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .profile-trigger {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            cursor: pointer;
            position: relative;
            padding-right: 20px; /* Space for arrow */
        }

        .profile-name {
            font-size: 1.1rem;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.3;
            margin-bottom: 3px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            letter-spacing: 0.3px;
        }

        .profile-designation {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.3;
            text-transform: capitalize;
            font-weight: 500;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        .profile .arrow {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%) rotate(-45deg);
            width: 8px;
            height: 8px;
            border-left: 2px solid rgba(255, 255, 255, 0.9);
            border-bottom: 2px solid rgba(255, 255, 255, 0.9);
            transition: transform 0.3s ease;
            margin-left: 8px;
            pointer-events: none;
            filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.2));
        }

        /* Rotate Arrow when Dropdown is Open */
        .profile-trigger.active .arrow {
            transform: translateY(-50%) rotate(135deg);
        }

        .profile-dropdown {
            display: none;
            position: absolute;
            right: 0;
            top: calc(100% + 15px);
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: #ffffff;
            border-radius: 12px;
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.1) inset;
            width: 200px;
            text-align: left;
            padding: 10px 0;
            z-index: 1001;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: dropdownFadeIn 0.3s ease-out;
        }

        @keyframes dropdownFadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .profile-dropdown.show {
            display: block;
        }

        .profile-dropdown a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 20px;
            text-decoration: none;
            color: #ffffff;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.95rem;
            border-left: 3px solid transparent;
        }

        .profile-dropdown a::before {
            content: '👤';
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        .profile-dropdown a:hover {
            background: rgba(255, 255, 255, 0.15);
            padding-left: 25px;
            border-left-color: rgba(255, 255, 255, 0.5);
            color: #ffffff;
        }

        .profile-dropdown .logout-button {
            border: none;
            background: none;
            color: #ffffff;
            width: 100%;
            text-align: left;
            padding: 14px 20px;
            cursor: pointer;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 12px;
            border-left: 3px solid transparent;
        }

        .profile-dropdown .logout-button::before {
            content: '🚪';
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        .profile-dropdown .logout-button:hover {
            background: rgba(220, 53, 69, 0.3);
            padding-left: 25px;
            border-left-color: #dc3545;
            color: #ffffff;
        }

    </style>



</body>
</html>
