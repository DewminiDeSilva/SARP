
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POC WCS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
</head>

<body>
{{-- 2nd side bar code --}}
<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div class="bg-gray-200 font-sans">
    <div class="flex flex-col sm:flex-row sm:justify-around">
        <div class="w-full sm:w-64 h-screen bg-white">
            <div class="flex items-center justify-center mt-10">
                <img class="h-6" src="https://premium-tailwindcomponents.netlify.app/assets/svg/tailwindcomponent-dark.svg">
            </div>

            <nav class="mt-10">
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex justify-between items-center py-3 px-6 text-gray-600 cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                        <span class="flex items-center">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>

                            <span class="mx-4 font-medium">Dashboard</span>
                        </span>

                        <span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </button>

                    <div x-show="open" class="bg-gray-100">
                        <a class="py-2 px-16 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="#">Manage Accounts</a>
                        <a class="py-2 px-16 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="#">Manage Tickets</a>
                    </div>
                </div>

                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex justify-between items-center py-3 px-6 text-gray-600 cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                        <span class="flex items-center">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>

                            <span class="mx-4 font-medium">Dashboard</span>
                        </span>

                        <span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </button>

                    <div x-show="open" class="bg-gray-100">
                        <a class="py-2 px-16 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="#">Manage Accounts</a>
                        <a class="py-2 px-16 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="#">Manage Tickets</a>
                    </div>
                </div>

                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex justify-between items-center py-3 px-6 text-gray-600 cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                        <span class="flex items-center">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>

                            <span class="mx-4 font-medium">Dashboard</span>
                        </span>

                        <span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </button>

                    <div x-show="open" class="bg-gray-100">
                        <a class="py-2 px-16 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="#">Manage Accounts</a>
                        <a class="py-2 px-16 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="#">Manage Tickets</a>
                    </div>
                </div>

                <!-- Other menu items -->

            </nav>


        </div>
    </div>
</div>
<div class="left-column">
            @include('dashboard.dashboardC')
        </div>
<div>
    <h1>Dashboard</h1>
    <p>Dashboard content goes hereLorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nisl nisi, condimentum lobortis rutrum ut, accumsan nec lacus. Ut sem neque, egestas quis metus nec, consequat vulputate quam. Suspendisse vel auctor augue, non dictum elit. Pellentesque suscipit arcu at lacus vulputate maximus. Donec fermentum porta dui eu accumsan. Praesent pharetra pulvinar metus eu semper. Nunc venenatis nunc turpis, id sodales lectus bibendum nec. Nam nisl mauris, tristique sit amet nisi et, porttitor bibendum nisl. In ullamcorper nec dolor ac convallis. Quisque varius tellus diam, at hendrerit lectus faucibus sit amet. Ut sit amet mauris elementum risus dictum pulvinar ac id ligula. Aenean cursus eu erat a gravida. Proin in ultricies tellus.

        Donec augue nunc, hendrerit et pulvinar eget, tempor at ipsum. Praesent vel risus id elit sagittis blandit. Vivamus in leo in purus sagittis aliquam. Donec et diam a risus faucibus tempus id et ipsum. Integer fringilla nisi eu mi lobortis tincidunt. Fusce in tortor et risus fringilla iaculis. Ut dictum nulla libero, in vehicula orci tempus in. Maecenas pharetra condimentum leo. Vivamus nec bibendum risus. Sed sit amet arcu congue, sollicitudin nibh ut, luctus nisi. Morbi vitae ultrices felis. Integer in mauris dapibus, sodales urna id, sagittis nisl. Donec augue eros, luctus at leo eget, posuere rutrum quam.

        In ligula leo, euismod id consequat et, blandit vitae magna. Donec ac ultricies libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tincidunt lorem lectus, ac porttitor urna tempor in. Fusce sagittis fringilla venenatis. Maecenas lobortis varius leo gravida efficitur. Suspendisse non felis sem. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer ac purus et nisl dignissim semper et vel sem.

        Praesent neque tortor, dictum vel commodo quis, imperdiet eu ex. Morbi consequat malesuada fermentum. Ut non vehicula justo. Aenean sed ligula pharetra, gravida est eget, sodales tortor. Vestibulum sagittis sit amet urna quis mattis. Suspendisse ac ex malesuada metus tristique mollis nec hendrerit ligula. Vivamus et aliquam enim, eget congue justo. Etiam tempus mattis fringilla. Mauris rutrum ultricies mauris, vel semper velit. Mauris mattis commodo orci, blandit faucibus turpis suscipit quis.

        Duis cursus hendrerit rhoncus. Ut nisi est, posuere a erat non, convallis egestas neque. Ut est sem, efficitur eget nibh quis, feugiat bibendum diam. Aliquam a arcu et sem vulputate interdum vitae eu turpis. Praesent quis quam interdum, iaculis sem nec, faucibus felis. Vivamus volutpat metus leo, eget consequat sapien consectetur sed. Pellentesque malesuada magna at felis tincidunt efficitur. Nam ultricies purus arcu, at porta massa aliquet eu.</p>
</body>


</body>
</html>
