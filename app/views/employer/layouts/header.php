<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex flex-col min-h-screen bg-gradient-to-br from-blue-100 via-purple-200 to-pink-100 text-gray-800">

    <!-- Header dengan gradasi -->
    <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white p-6 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Judul -->
            <h1 class="text-3xl font-bold">Welcome to Job Portal</h1>
            
            <!-- Navigasi -->
            <nav class="space-x-4">
                <a href="/employer/jobs" class="hover:text-yellow-300 transition duration-300">Manage My Job List</a>
                <a href="/employer/create-job" class="hover:text-yellow-300 transition duration-300">Create a Job</a>
                <a href="/employer/applications" class="hover:text-yellow-300 transition duration-300">Check Applications</a>
                <a href="/logout" class="hover:text-red-300 transition duration-300">Logout</a>
            </nav>
        </div>
    </header>
    
    <!-- Garis pembatas -->
    <hr class="my-6 border-t-2 border-gray-300">

    


