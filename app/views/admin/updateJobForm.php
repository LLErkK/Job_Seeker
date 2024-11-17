<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Job</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center">
    <!-- Header -->
    <header class="w-full bg-blue-600 text-white py-4 mb-6 shadow">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-2xl font-bold">Update Job</h1>
            <nav>
                <a href="/admin/jobs" class="text-white hover:underline mr-4">Back to Job List</a>
                <a href="/logout" class="text-white hover:underline">Logout</a>
            </nav>
        </div>
    </header>

    <!-- Update Job Form -->
    <div class="w-full max-w-lg bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-xl font-bold text-blue-700 mb-6 text-center">Edit Job Details</h2>
        <form action="/admin/update-job/<?= $job['id'] ?>" method="POST" class="space-y-4">
            
            <!-- Nama Perusahaan -->
            <div>
                <label for="company_name" class="block text-gray-700 font-semibold">Nama Perusahaan:</label>
                <input type="text" name="company_name" id="company_name" value="<?= htmlspecialchars($job['company_name']) ?>" required
                    class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Job Title -->
            <div>
                <label for="title" class="block text-gray-700 font-semibold">Job Title:</label>
                <input type="text" id="title" name="title" value="<?= htmlspecialchars($job['title']) ?>" required
                    class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Job Description -->
            <div>
                <label for="description" class="block text-gray-700 font-semibold">Description:</label>
                <textarea id="description" name="description" required
                    class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 h-24"><?= htmlspecialchars($job['description']) ?></textarea>
            </div>

            <!-- Job Type -->
            <div>
                <label for="job_type" class="block text-gray-700 font-semibold">Job Type:</label>
                <select id="job_type" name="job_type"
                    class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
                    <option value="full-time" <?= $job['job_type'] == 'full-time' ? 'selected' : '' ?>>Full-time</option>
                    <option value="intern" <?= $job['job_type'] == 'intern' ? 'selected' : '' ?>>Intern</option>
                </select>
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-gray-700 font-semibold">Status:</label>
                <select id="status" name="status"
                    class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
                    <option value="open" <?= $job['status'] == 'open' ? 'selected' : '' ?>>Open</option>
                    <option value="closed" <?= $job['status'] == 'closed' ? 'selected' : '' ?>>Closed</option>
                    <option value="pending" <?= $job['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                </select>
            </div>

            <!-- Salary -->
            <div>
                <label for="salary" class="block text-gray-700 font-semibold">Salary:</label>
                <input type="number" id="salary" name="salary" value="<?= htmlspecialchars($job['salary']) ?>" required
                    class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Location -->
            <div>
                <label for="location" class="block text-gray-700 font-semibold">Location:</label>
                <input type="text" id="location" name="location" value="<?= htmlspecialchars($job['location']) ?>" required
                    class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Deadline -->
            <div>
                <label for="deadline" class="block text-gray-700 font-semibold">Deadline:</label>
                <input type="date" id="deadline" name="deadline" value="<?= htmlspecialchars($job['deadline']) ?>" required
                    class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition duration-300">
                Update Job
            </button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="w-full bg-blue-700 text-white text-center py-4 mt-10">
        <p>&copy; 2024 Job Portal. All rights reserved.</p>
    </footer>
</body>

</html>
