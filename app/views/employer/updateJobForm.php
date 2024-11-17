<?php include __DIR__ . '/layouts/header.php'; ?>

<div class="container mx-auto p-6 flex justify-center">
    <!-- Card Update Job -->
    <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-8">
        <!-- Judul Halaman -->
        <h1 class="text-2xl font-bold text-purple-600 mb-6 text-center">Update Job Posting</h1>

        <!-- Form Update Job -->
        <form action="/employer/update-job/<?= $job['id'] ?>" method="POST" class="space-y-5">
            <!-- Job Title -->
            <div>
                <label for="title" class="block text-gray-700 font-semibold mb-1">Job Title:</label>
                <input type="text" id="title" name="title" value="<?= htmlspecialchars($job['title']) ?>" required 
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Job Description -->
            <div>
                <label for="description" class="block text-gray-700 font-semibold mb-1">Description:</label>
                <textarea id="description" name="description" required
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 h-28"><?= htmlspecialchars($job['description']) ?></textarea>
            </div>

            <!-- Job Type -->
            <div>
                <label for="job_type" class="block text-gray-700 font-semibold mb-1">Job Type:</label>
                <select id="job_type" name="job_type" 
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="full-time" <?= $job['job_type'] == 'full-time' ? 'selected' : '' ?>>Full-time</option>
                    <option value="intern" <?= $job['job_type'] == 'intern' ? 'selected' : '' ?>>Intern</option>
                </select>
            </div>

            <!-- Job Status -->
            <div>
                <label for="status" class="block text-gray-700 font-semibold mb-1">Status:</label>
                <select id="status" name="status" 
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="open" <?= $job['status'] == 'open' ? 'selected' : '' ?>>Open</option>
                    <option value="closed" <?= $job['status'] == 'closed' ? 'selected' : '' ?>>Closed</option>
                    <option value="pending" <?= $job['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                </select>
            </div>

            <!-- Salary -->
            <div>
                <label for="salary" class="block text-gray-700 font-semibold mb-1">Salary:</label>
                <input type="number" id="salary" name="salary" value="<?= htmlspecialchars($job['salary']) ?>" required 
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Location -->
            <div>
                <label for="location" class="block text-gray-700 font-semibold mb-1">Location:</label>
                <input type="text" id="location" name="location" value="<?= htmlspecialchars($job['location']) ?>" required 
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Deadline -->
            <div>
                <label for="deadline" class="block text-gray-700 font-semibold mb-1">Application Deadline:</label>
                <input type="date" id="deadline" name="deadline" value="<?= htmlspecialchars($job['deadline']) ?>" required 
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Tombol Submit -->
            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transition duration-300">
                    Update Job
                </button>
            </div>
        </form>

        <!-- Link Kembali -->
        <div class="mt-6 text-center">
            <a href="/employer/jobs" class="text-blue-500 hover:underline">Back to Job List</a>
        </div>
    </div>
</div>

<?php include __DIR__ . '/layouts/footer.php'; ?>
