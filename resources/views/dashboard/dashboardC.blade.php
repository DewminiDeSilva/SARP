<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .sidebar {
    height: 100vh;
    overflow-y: auto;
    position: fixed;   /* if not already */
}

        .imgsize {
            height: 50%;
            width: 50%;
        }

        .logoframe {
            border: 2px solid #ccc; /* Frame border */
            border-radius: 15px; /* Rounded corners */
            background-color: #f9f9f9; /* Background color */
            padding: 20px; /* Padding inside the frame */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Box shadow */
            margin: 20px auto; /* Center align with margin */
            max-width: 80%; /* Adjust width as needed */
            text-align: center; /* Center align text */
        }

        .logoframe:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3), 0 0 10px rgba(255, 255, 255, 0.9); /* Emboss effect */
            transform: translateY(-5px); /* Slight upward movement */
        }

        ul {
    list-style-type: none; /* Remove default list styling */
    padding: 0; /* Remove default padding */
}

li {
    margin: 10px 0; /* Space between list items */
    padding: 10px; /* Add padding for the frame */
    border-radius: 5px; /* Rounded corners */
    transition: background-color 0.3s ease, border-color 0.3s ease; /* Smooth transition */
    background-color: #b3e5fc; /* Light blue background color */
}

li a {
    color: #000000; /* Black text color for better contrast */
    text-decoration: none; /* Remove underline from links */
    display: block; /* Make the link fill the list item */
}

li:hover {
    border-color: #1C6008; /* Change frame border color on hover */
    background-color: #81d4fa; /* Slightly darker light blue on hover */
    cursor: pointer; /* Change cursor to pointer on hover */
}

li.active,
li.active:hover {
    background-color: transparent !important; /* Remove background when clicked/active */
    border: 1px solid #b3e5fc; /* Optional: subtle border */
}

.container {
            margin-top: 80px; /* Adjust based on header height */
        }

li.active {
    background-color: #4fc3f7 !important;
    border-left: 5px solid #1C6008;
    font-weight: bold;

    
}


    </style>

    <title>Sidebar with Dashboard</title>


    <link rel="stylesheet" href="{{ asset('assets/css/dashboardC.css')}} ">
</head>
<body>
<div class="container">



    <div class="sidebar" id="sidebar">
    <!-- <h2>Management Information System</h2> -->

        <div class="logoframe" style="cursor: pointer;">
        <div class="img">
            <img src="{{ asset('assets/images/sarp2.png') }}" alt="SARP Logo" class="logo" style="border-radius: 15px; top: 10px" class= "imgsize">
        </div>

        <h5 style="text-align: center; font-weight: bold; color: #094511">Smallholder Agribusiness & Resilience Project</h5>
    </div>



        @php
    // top level active checks
    $isDashboard   = request()->is('dashboard');
    $isLogframe    = request()->is('logframe*');
    $isBeneForm    = request()->is('bene');
    $isStaff       = request()->is('staff_profile*');
    $isGallery     = request()->is('gallery*');

    // group checks (submenu open)
    $isBeneficiary = request()->is('beneficiary*');
    $isTank        = request()->is('tank_rehabilitation*');
    $isInfra       = request()->is('infrastructure*');

    $isSocial      = request()->is('cdf*') || request()->is('asc_registration*') || request()->is('farmerorganization*') || request()->is('training*') || request()->is('grievances*');

    $isResilience  = request()->is('agri*') || request()->is('agriculture*') || request()->is('agriculture-training*') || request()->is('lstock*') || request()->is('livestocks*') || request()->is('livestock-training*') || request()->is('beneficiaries/list*') || request()->is('nutrient-home*') || request()->is('fingerling*');

    $isYouth       = request()->is('youth-proposals*') || request()->is('youth-proposal*');

    $is4P          = request()->is('expressions*');

    $isAgroEnt     = request()->is('agro*');

    $isNRM         = request()->is('nrmtraining*');
    $isFFS         = request()->is('ffs-training*');
    $isNutrition   = request()->is('nutrition*');

    $isAgroForest  = request()->is('agro-forest*');

    $isDocs        = request()->is('awpb*') || request()->is('costtab*') || request()->is('projectdesignreport*') || request()->is('progress*');
@endphp

<ul>
    {{-- Admin --}}
    @if(auth()->user() && auth()->user()->role == 'admin')
        <li class="{{ request()->is('admin/users') ? 'active' : '' }}">
            <a href="/admin/users" style="color:#FFFFFF">User Management</a>
        </li>
    @endif

    {{-- Single links --}}
    <li class="{{ $isDashboard ? 'active' : '' }}">
        <a href="/dashboard" style="color:#FFFFFF">Dashboard</a>
    </li>

    <li class="{{ $isLogframe ? 'active' : '' }}">
        <a href="/logframe/tanks" style="color:#FFFFFF">Log frame</a>
    </li>

    <li class="{{ $isBeneForm ? 'active' : '' }}">
        <a href="/bene" style="color:#FFFFFF">Beneficiary Application Form</a>
    </li>

    <li class="{{ $isStaff ? 'active' : '' }}">
        <a href="/staff_profile" style="color:#FFFFFF">Staff Profile</a>
    </li>

    <li class="{{ $isGallery ? 'active' : '' }}">
        <a href="/gallery" style="color:#FFFFFF">Gallery</a>
    </li>

    {{-- Beneficiary --}}
    <li class="submenu {{ $isBeneficiary ? 'open' : '' }}">
        <a href="#" class="{{ $isBeneficiary ? 'active' : '' }}" style="color:#FFFFFF">Beneficiary</a>
        <ul class="nested {{ $isBeneficiary ? 'show' : '' }}">
            <li class="{{ request()->is('beneficiary/create') ? 'active' : '' }}">
                <a href="/beneficiary/create" style="color:#FFFFFF">Beneficiary Registration</a>
            </li>
            <li class="{{ request()->is('beneficiary') ? 'active' : '' }}">
                <a href="/beneficiary" style="color:#FFFFFF">Beneficiary Profile</a>
            </li>
        </ul>
    </li>

    {{-- Tank Rehabilitation --}}
    <li class="submenu {{ $isTank ? 'open' : '' }}">
        <a href="#" class="{{ $isTank ? 'active' : '' }}" style="color:#FFFFFF">Tank Rehabilitation</a>
        <ul class="nested {{ $isTank ? 'show' : '' }}">
            <li class="{{ request()->is('tank_rehabilitation/create') ? 'active' : '' }}">
                <a href="/tank_rehabilitation/create" style="color:#FFFFFF">Tank Rehabilitation Registration</a>
            </li>
            <li class="{{ request()->is('tank_rehabilitation') ? 'active' : '' }}">
                <a href="/tank_rehabilitation" style="color:#FFFFFF">Tank Rehabilitation Details</a>
            </li>
        </ul>
    </li>

    {{-- Infrastructure Development --}}
    <li class="submenu {{ $isInfra ? 'open' : '' }}">
        <a href="#" class="{{ $isInfra ? 'active' : '' }}" style="color:#FFFFFF">Infrastructure Development</a>
        <ul class="nested {{ $isInfra ? 'show' : '' }}">
            <li class="{{ request()->is('infrastructure/create') ? 'active' : '' }}">
                <a href="/infrastructure/create" style="color:#FFFFFF">Infrastructure Development</a>
            </li>
            <li class="{{ request()->is('infrastructure') ? 'active' : '' }}">
                <a href="/infrastructure" style="color:#FFFFFF">Infrastructure Development Details</a>
            </li>
        </ul>
    </li>

    {{-- Social Inclusion & Gender --}}
    <li class="submenu {{ $isSocial ? 'open' : '' }}">
        <a href="#" class="{{ $isSocial ? 'active' : '' }}" style="color:#FFFFFF">Social Inclusion and Gender</a>
        <ul class="nested {{ $isSocial ? 'show' : '' }}">
            <li class="{{ request()->is('cdf') ? 'active' : '' }}">
                <a href="/cdf" style="color:#FFFFFF">Community Development Forum</a>
            </li>
            <li class="{{ request()->is('asc_registration') ? 'active' : '' }}">
                <a href="/asc_registration" style="color:#FFFFFF">Agrarian Services Center</a>
            </li>
            <li class="{{ request()->is('farmerorganization') ? 'active' : '' }}">
                <a href="/farmerorganization" style="color:#FFFFFF">Farmer Organization Information</a>
            </li>
            <li class="{{ request()->is('training') ? 'active' : '' }}">
                <a href="/training" style="color:#FFFFFF">Training Program Details</a>
            </li>

            {{-- Grievances inside Social --}}
            @php $isGriev = request()->is('grievances*'); @endphp
            <li class="submenu {{ $isGriev ? 'open' : '' }}">
                <a href="#" class="{{ $isGriev ? 'active' : '' }}" style="color:#FFFFFF">Grievances</a>
                <ul class="nested {{ $isGriev ? 'show' : '' }}">
                    <li class="{{ request()->is('grievances/create') ? 'active' : '' }}">
                        <a href="/grievances/create" style="color:#FFFFFF">Grievances Registration</a>
                    </li>
                    <li class="{{ request()->is('grievances') ? 'active' : '' }}">
                        <a href="/grievances" style="color:#FFFFFF">Grievances Information</a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>

    {{-- Resilience Projects --}}
    <li class="submenu {{ $isResilience ? 'open' : '' }}">
        <a href="#" class="{{ $isResilience ? 'active' : '' }}" style="color:#FFFFFF">Resilience Projects</a>
        <ul class="nested {{ $isResilience ? 'show' : '' }}">

            {{-- Agriculture --}}
            @php $isAgri = request()->is('agri*') || request()->is('agriculture*') || request()->is('agriculture-training*'); @endphp
            <li class="submenu {{ $isAgri ? 'open' : '' }}">
                <a href="#" class="{{ $isAgri ? 'active' : '' }}" style="color:#FFFFFF">Agriculture</a>
                <ul class="nested {{ $isAgri ? 'show' : '' }}">
                    <li class="{{ request()->is('agri') ? 'active' : '' }}">
                        <a href="/agri" style="color:#FFFFFF">Agriculture Registration</a>
                    </li>
                    <li class="{{ request()->is('agriculture') && !request()->is('agriculture-training*') ? 'active' : '' }}">
                        <a href="/agriculture" style="color:#FFFFFF">Agriculture List</a>
                    </li>
                    <li class="{{ request()->is('agriculture-training*') ? 'active' : '' }}">
                        <a href="{{ route('agriculture-training.index') }}" style="color:#FFFFFF">Training Program</a>
                    </li>
                </ul>
            </li>

            {{-- Livestock --}}
            @php $isLive = request()->is('lstock*') || request()->is('livestocks*') || request()->is('livestock-training*') || request()->is('beneficiaries/list*'); @endphp
            <li class="submenu {{ $isLive ? 'open' : '' }}">
                <a href="#" class="{{ $isLive ? 'active' : '' }}" style="color:#FFFFFF">Livestock</a>
                <ul class="nested {{ $isLive ? 'show' : '' }}">
                    <li class="{{ request()->is('lstock') ? 'active' : '' }}">
                        <a href="/lstock" style="color:#FFFFFF">Livestock Registration</a>
                    </li>
                    <li class="{{ request()->is('beneficiaries/list') ? 'active' : '' }}">
                        <a href="/beneficiaries/list" style="color:#FFFFFF">Livestock List</a>
                    </li>
                    <li class="{{ request()->is('livestock-training*') ? 'active' : '' }}">
                        <a href="{{ route('livestock-training.index') }}" style="color:#FFFFFF">Training Program</a>
                    </li>
                </ul>
            </li>

            <li class="{{ request()->is('nutrient-home') ? 'active' : '' }}">
                <a href="/nutrient-home" style="color:#FFFFFF">Nutrient Rich Home Garden</a>
            </li>

            <li class="{{ request()->is('fingerling*') ? 'active' : '' }}">
                <a href="/fingerling" style="color:#FFFFFF">Fingerlings Stocking Details</a>
            </li>

        </ul>
    </li>

    {{-- Youth Enterprises --}}
    <li class="submenu {{ $isYouth ? 'open' : '' }}">
        <a href="#" class="{{ $isYouth ? 'active' : '' }}" style="color:#FFFFFF">Youth Enterprises</a>
        <ul class="nested {{ $isYouth ? 'show' : '' }}">
            <li class="{{ request()->is('youth-proposals') ? 'active' : '' }}">
                <a href="/youth-proposals" style="color:#FFFFFF">Youth Proposals</a>
            </li>
            <li class="{{ request()->is('youth-proposal/agreement-signed') ? 'active' : '' }}">
                <a href="/youth-proposal/agreement-signed" style="color:#FFFFFF">Youth Projects</a>
            </li>
        </ul>
    </li>

    {{-- 4P --}}
    <li class="submenu {{ $is4P ? 'open' : '' }}">
        <a href="#" class="{{ $is4P ? 'active' : '' }}" style="color:#FFFFFF">4p Agri Business Development Projects</a>
        <ul class="nested {{ $is4P ? 'show' : '' }}">
            <li class="{{ request()->is('expressions') ? 'active' : '' }}">
                <a href="/expressions" style="color:#FFFFFF">Expression Of Interest (EOI)</a>
            </li>
            <li class="{{ request()->is('expressions/evaluation-completed') ? 'active' : '' }}">
                <a href="/expressions/evaluation-completed" style="color:#FFFFFF">Registration of 4P Project</a>
            </li>
        </ul>
    </li>

    {{-- Agro Enterprise --}}
    <li class="submenu {{ $isAgroEnt ? 'open' : '' }}">
        <a href="#" class="{{ $isAgroEnt ? 'active' : '' }}" style="color:#FFFFFF">Agro Enterprice</a>
        <ul class="nested {{ $isAgroEnt ? 'show' : '' }}">
            <li class="{{ request()->is('agro/create') ? 'active' : '' }}">
                <a href="/agro/create" style="color:#FFFFFF">Agro Enterprice Register</a>
            </li>
            <li class="{{ request()->is('agro') ? 'active' : '' }}">
                <a href="/agro" style="color:#FFFFFF">Agro Enterprice Details</a>
            </li>
        </ul>
    </li>

    {{-- NRM --}}
    <li class="submenu {{ $isNRM ? 'open' : '' }}">
        <a href="#" class="{{ $isNRM ? 'active' : '' }}" style="color:#FFFFFF">Natural Resource Management (NRM)</a>
        <ul class="nested {{ $isNRM ? 'show' : '' }}">
            <li class="{{ request()->is('nrmtraining') ? 'active' : '' }}">
                <a href="/nrmtraining" style="color:#FFFFFF">Training Program Details</a>
            </li>
        </ul>
    </li>

    {{-- FFS --}}
    <li class="submenu {{ $isFFS ? 'open' : '' }}">
        <a href="#" class="{{ $isFFS ? 'active' : '' }}" style="color:#FFFFFF">Farmer Field Schools (FFS)</a>
        <ul class="nested {{ $isFFS ? 'show' : '' }}">
            <li class="{{ request()->is('ffs-training') ? 'active' : '' }}">
                <a href="/ffs-training" style="color:#FFFFFF">FFS Training Program Details</a>
            </li>
        </ul>
    </li>

    {{-- Nutrition --}}
    <li class="submenu {{ $isNutrition ? 'open' : '' }}">
        <a href="#" class="{{ $isNutrition ? 'active' : '' }}" style="color:#FFFFFF">Nutrition Training Program</a>
        <ul class="nested {{ $isNutrition ? 'show' : '' }}">
            <li class="{{ request()->is('nutrition') ? 'active' : '' }}">
                <a href="/nutrition" style="color:#FFFFFF">Nutrition Training Program Details</a>
            </li>
        </ul>
    </li>

    {{-- Agro Forest --}}
    <li class="submenu {{ $isAgroForest ? 'open' : '' }}">
        <a href="#" class="{{ $isAgroForest ? 'active' : '' }}" style="color:#FFFFFF">Agro Forest</a>
        <ul class="nested {{ $isAgroForest ? 'show' : '' }}">
            <li class="{{ request()->is('agro-forest') ? 'active' : '' }}">
                <a href="/agro-forest" style="color:#FFFFFF">Agro forest Details</a>
            </li>
            <li class="{{ request()->is('agro-forest/create') ? 'active' : '' }}">
                <a href="/agro-forest/create" style="color:#FFFFFF">Agro forest Registration</a>
            </li>
        </ul>
    </li>

    {{-- Project Documents --}}
    <li class="submenu {{ $isDocs ? 'open' : '' }}">
        <a href="#" class="{{ $isDocs ? 'active' : '' }}" style="color:#FFFFFF">Project Documents</a>
        <ul class="nested {{ $isDocs ? 'show' : '' }}">
            <li class="{{ request()->is('awpb') ? 'active' : '' }}">
                <a href="/awpb" style="color:#FFFFFF">Annual Work Plan and Budget (AWPB)</a>
            </li>
            <li class="{{ request()->is('costtab') ? 'active' : '' }}">
                <a href="/costtab" style="color:#FFFFFF">Cost TAB</a>
            </li>
            <li class="{{ request()->is('projectdesignreport') ? 'active' : '' }}">
                <a href="/projectdesignreport" style="color:#FFFFFF">Project Design Report</a>
            </li>
            <li class="{{ request()->is('progress') ? 'active' : '' }}">
                <a href="/progress" style="color:#FFFFFF">Progress Report</a>
            </li>
        </ul>
    </li>

</ul>

    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.submenu > a').forEach(function (link) {
        link.addEventListener('click', function (e) {

            // Only prevent default if it is a toggle link
            if (this.getAttribute('href') === '#') {
                e.preventDefault();
            } else {
                return;
            }

            var submenu = this.nextElementSibling;
            if (submenu && submenu.tagName === 'UL') {
                submenu.classList.toggle('show');
                this.classList.toggle('active');
            }
        });
    });
});
</script>


</body>
</html>
