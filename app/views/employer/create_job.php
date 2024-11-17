<?php include __DIR__ . '/layouts/header.php'; ?>

<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold text-center text-purple-600 mb-6">Create Job Posting</h1>

    <form action="/employer/create-job" method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto space-y-4">
        <!-- Job Title -->
        <div>
            <label for="title" class="block text-gray-700 font-semibold mb-2">Job Title:</label>
            <input type="text" name="title" id="title" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Job Description -->
        <div>
            <label for="description" class="block text-gray-700 font-semibold mb-2">Job Description:</label>
            <textarea name="description" id="description" rows="4" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
        </div>

        <!-- Job Type -->
        <div>
            <label for="job_type" class="block text-gray-700 font-semibold mb-2">Job Type:</label>
            <select name="job_type" id="job_type" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="intern">Intern</option>
                <option value="full-time">Full Time</option>
            </select>
        </div>

        <!-- Job Requirements -->
        <div>
            <label for="requirements" class="block text-gray-700 font-semibold mb-2">Job Requirements:</label>
            <textarea name="requirements" id="requirements" rows="4" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
        </div>

        <!-- Salary -->
        <div>
            <label for="salary" class="block text-gray-700 font-semibold mb-2">Salary:</label>
            <input type="text" name="salary" id="salary" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Location -->
        <div>
            <label for="location" class="block text-gray-700 font-semibold mb-2">Location:</label>
            <input type="text" name="location" id="location" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Application Deadline -->
        <div>
            <label for="deadline" class="block text-gray-700 font-semibold mb-2">Application Deadline:</label>
            <input type="date" name="deadline" id="deadline" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Job Status -->
        <div>
            <label for="status" class="block text-gray-700 font-semibold mb-2">Job Status:</label>
            <select name="status" id="status" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="open">Open</option>
                <option value="closed">Closed</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600 transition duration-300 w-full">Create Job Posting</button>
        </div>
    </form>

    <!-- Back to Job Listings -->
    <div class="text-center mt-8">
        <a href="/employer/jobs" class="text-blue-500 hover:text-blue-700">Back to job listings</a>
    </div>
</div>

<?php include __DIR__ . '/layouts/footer.php'; ?>
