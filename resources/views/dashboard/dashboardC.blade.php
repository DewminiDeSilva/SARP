<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
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
    background-color: #0b6d1f; /* Background color */
}

li a {
    color: #FFFFFF; /* Text color */
    text-decoration: none; /* Remove underline from links */
    display: block; /* Make the link fill the list item */
}

li:hover {
    border-color: #1C6008; /* Change frame border color on hover */
    background-color: #1C6008; /* Change background color on hover */
    cursor: pointer; /* Change cursor to pointer on hover */
}

.container {
            margin-top: 80px; /* Adjust based on header height */
        }



    </style>

    <title>Sidebar with Dashboard</title>


    <link rel="stylesheet" href="{{ asset('assets/css/dashboardC.css')}} ">
</head>
<body>
<div class="container">



    <div class="sidebar" id="sidebar">
    <h2>Management Information System</h2>
        <div class="logoframe" style="cursor: pointer;">
        <div class="img">
            <img src="{{ asset('assets/images/sarp2.png') }}" alt="SARP Logo" class="logo" style="border-radius: 15px; top: 10px" class= "imgsize">
        </div>

        <h5 style="text-align: center; font-weight: bold; color: #094511">Smallholder Agribusiness & Resilience Project</h5>
    </div>



        <ul>
            <li><a href="/dashboard" style="color: #FFFFFF">Dashboard</a></li>
            <li><a href="/bene" style="color: #FFFFFF">Beneficiary Application Form</a></li>
            <li><a href="/staff_profile" style="color: #FFFFFF">Staff Profile</a></li>
            <li><a href="/gallery" style="color: #FFFFFF">Gallery</a></li>
            <li class="submenu">
                <a href="#" style="color: #FFFFFF">Beneficiary</a>
                <ul class="nested">
                    <li href="/beneficiary/create"><a href="/beneficiary/create" style="color: #FFFFFF">Beneficiary Registration</a></li>
                    <li href="/beneficiary"><a href="/beneficiary" style="color: #FFFFFF">Beneficiary Profile</a></li>
                    <!-- <li class="submenu">
                        <a href="#" style="color: #FFFFFF">Family Member</a>
                        <ul class="nested-n">
                            <li href="/family/create/12"><a href="/family/create/12" style="color: #FFFFFF">Family Member Registration</a></li>
                            <li href="/family"><a href="/family" style="color: #FFFFFF">Family Member Details</a></li>
                        </ul>
                    </li> -->
                </ul>
            </li>
            <li class="submenu">
                <a href="#" style="color: #FFFFFF">Tank Rehabilitation</a>
                <ul class="nested">
                    <li href="/tank_rehabilitation/create"><a href="/tank_rehabilitation/create" style="color: #FFFFFF">Tank Rehabilitation Registation</a></li>
                    <li href="/tank_rehabilitation"><a href="/tank_rehabilitation" style="color: #FFFFFF">Tank Rehabilitation Details</a></li>
                </ul>
            </li>

            <li class="submenu">
                <a href="#" style="color: #FFFFFF">Infrastructure Development</a>
                <ul class="nested">
                    <li href="/infrastructure/create"><a href="/infrastructure/create" style="color: #FFFFFF">Infrastructure Development</a></li>
                    <li href="/infrastructure"><a href="/infrastructure" style="color: #FFFFFF">Infrastructure Development Details</a></li>
                </ul>
            </li>


            <li class="submenu">
                <a href="#" style="color: #FFFFFF">Social Inclusion and Gender</a>
                <ul class="nested">
                    <li href="cdf"><a href="/cdf" style="color: #FFFFFF">Community Development Forum</a></li>
                    <li href="/asc_registration"><a href="/asc_registration" style="color: #FFFFFF">Agrarian Services Center</a></li>
                    <li href="/farmerorganization"><a href="/farmerorganization" style="color: #FFFFFF">Farmer Organization Information</a></li>
                    <li href="/training"><a href="/training" style="color: #FFFFFF">Training Program Details</a></li>



                    <li class="submenu">
                        <a href="#" style="color: #FFFFFF">Grievances</a>
                        <ul class="nested">
                            <li href="/grievances/create"><a href="/grievances/create" style="color: #FFFFFF">Grievances Registration</a></li>
                            <li href="/grievances"><a href="/grievances" style="color: #FFFFFF">Grievances Information</a></li>
                        </ul>
                    </li>


                </ul>
            </li>

            <li class="submenu">
                <a href="#" style="color: #FFFFFF">Agriculture and Livestock</a>
                <ul class="nested">
                <li class="submenu">
                        <a href="#" style="color: #FFFFFF">Agriculture</a>
                        <ul class="nested">
                            <li href="/agri"><a href="/agri" style="color: #FFFFFF">Agriculture Registration</a></li>
                            <li href="/agriculture"><a href="/agriculture" style="color: #FFFFFF">Agriculture List</a></li>
                        </ul>
                    </li>

                        <li class="submenu">
                        <a href="#" style="color: #FFFFFF">Livestock</a>
                        <ul class="nested">
                            <li href="/livestock"><a href="/lstock" style="color: #FFFFFF">Livestock Registration</a></li>
                            <li href="/beneficiaries/list"><a href="/beneficiaries/list" style="color: #FFFFFF">Livestock List</a></li>
                            <li href="/fingerling"><a href="/fingerling" style="color: #FFFFFF">Stocking Details Fingerlings</a></li>
                        </ul>
                    </li>

                </ul>
            </li>

            <li class="submenu">
                <a href="#" style="color: #FFFFFF">Agro Enterprice</a>
                <ul class="nested">
                    <li href="/agro/create"><a href="/agro/create" style="color: #FFFFFF">Agro Enterprice Register</a></li>
                    <li href="/agro"><a href="/agro" style="color: #FFFFFF">Agro Enterprice Details</a></li>
                </ul>
            </li>

            <li class="submenu">
                <a href="#" style="color: #FFFFFF">Natural Resource Managment</a>
                <ul class="nested">
                    <li href="/nrmtraining"><a href="/nrmtraining" style="color: #FFFFFF">Training Program Details</a></li>

                </ul>
            </li>
            <li class="submenu">
                <a href="#" style="color: #FFFFFF">Farmer Field Schools</a>
                <ul class="nested">
                    <li href="/ffs-training"><a href="/ffs-training" style="color: #FFFFFF">FFS Training Program Details</a></li>

                </ul>
            </li>

            <li class="submenu">
                <a href="#" style="color: #FFFFFF">Nutrition Training Program</a>
                <ul class="nested">
                    <li href="/training"><a href="/nutrition" style="color: #FFFFFF">Nutrition Training Program Details</a></li>

                </ul>
            </li>

        </ul>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var submenuLinks = document.querySelectorAll('.submenu > a');

        submenuLinks.forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                var submenu = this.nextElementSibling;
                if (submenu && submenu.tagName === 'UL') {
                    if (submenu.classList.contains('show')) {
                        submenu.classList.remove('show');
                        this.classList.remove('active');
                    } else {
                        submenu.classList.add('show');
                        this.classList.add('active');
                    }
                }
            });
        });

        // Function to handle nested submenus
        var nestedSubmenuLinks = document.querySelectorAll('.submenu ul li.nested-n > a');

        nestedSubmenuLinks.forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                var nestedSubmenu = this.nextElementSibling;
                if (nestedSubmenu && nestedSubmenu.tagName === 'UL') {
                    if (nestedSubmenu.classList.contains('show')) {
                        nestedSubmenu.classList.remove('show');
                        this.classList.remove('active');
                    } else {
                        nestedSubmenu.classList.add('show');
                        this.classList.add('active');
                    }
                }
            });
        });
    });
</script>
</body>
</html>
