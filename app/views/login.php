<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-100 to-blue-300">
    <!-- Background Text -->
    <div class="absolute inset-0 flex items-center justify-center overflow-hidden">
        <p class="text-8xl font-bold text-gray-200 opacity-10 select-none">
            JOB SEEKER
        </p>
    </div>

    <!-- Login Form -->
    <div class="relative w-full max-w-md p-8 space-y-6 bg-white shadow-lg rounded-lg border border-gray-300">
        <h2 class="text-3xl font-bold text-center text-gray-800">Login</h2>
        <form action="/login" method="POST" class="space-y-4">
            <!-- Input Email -->
            <div>
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" name="email" id="email" required
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-200 ease-in-out"
                    placeholder="Enter your email">
            </div>

            <!-- Input Password -->
            <div>
                <label for="password" class="block text-gray-700">Password:</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-200 ease-in-out"
                    placeholder="Enter your password">
            </div>

            <!-- Button Login -->
            <button type="submit"
                class="w-full py-2 mt-4 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none transition duration-200 ease-in-out shadow hover:shadow-lg">
                Login
            </button>
        </form>

        <!-- Link to the registration page -->
        <p class="text-sm text-center text-gray-600">
            Don't have an account? 
            <a href="/register" class="text-blue-600 hover:underline font-semibold">Register here</a>.
        </p>
    </div>
</body>
</html>