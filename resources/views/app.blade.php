<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/js/app.js')
    @routes

    @inertiaHead
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

 <script src="https://unpkg.com/heroicons@2.1.1/24/outline/heroicons.js"></script>

</head>
<body class="antialiased overflow-x-hidden  text-gray-900 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-500">
    @inertia
</body>
</html>

