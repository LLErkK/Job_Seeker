<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col ">
    <!-- Header Admin -->
    <header class="bg-blue-700 text-white p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Admin Page</h1>
            <nav class="space-x-4">
                <a href="/admin/jobs" class="hover:text-blue-200">Manage Jobs</a>
                <a href="/admin/history" class="hover:text-blue-200">Riwayat Lowongan</a>
                <a href="/logout" class="hover:text-red-300">Logout</a>
            </nav>
        </div>
    </header>