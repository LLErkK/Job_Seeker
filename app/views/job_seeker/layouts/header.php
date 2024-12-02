<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Seeker Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class=" min-h-screen flex flex-col">
    <!-- Header Section -->
    <header class="fixed top-0 left-0 w-full bg-gradient-to-r from-blue-600 to-indigo-700 py-4 shadow-lg">
        <div class="container mx-auto p-4 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-white">Welcome, Job Seeker!</h1>
            </div>
            <nav class="flex space-x-4">
                <a href="/job_seeker/profile" class="text-white hover:bg-blue-500 px-3 py-2 rounded-md transition duration-300 ease-in-out">
                    My Profile
                </a>
                <a href="/job_seeker/jobs" class="text-white hover:bg-blue-500 px-3 py-2 rounded-md transition duration-300 ease-in-out">
                    View Jobs
                </a>
                <a href="/job_seeker/applications" class="text-white hover:bg-blue-500 px-3 py-2 rounded-md transition duration-300 ease-in-out">
                    My Applications
                </a>
                <a href="/logout" class="text-white hover:bg-red-500 px-3 py-2 rounded-md transition duration-300 ease-in-out">
                    Logout
                </a>
            </nav>
        </div>
    </header>