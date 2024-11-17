
    <?php include __DIR__ . '/layouts/header.php'; ?>

    <!-- Form Create Job -->
<div class="flex flex-col items-center">
    <div class="w-full max-w-lg bg-white rounded-lg shadow-lg p-6 mt-10 ">
        <h1 class="text-xl font-bold text-center text-blue-700 mb-6">Create Job</h1>
        <form action="/admin/create-job" method="POST" class="space-y-4">
            <div>
                <label for="company_name" class="block text-gray-700 font-semibold">Nama Perusahaan:</label>
                <input type="text" name="company_name" id="company_name" required
                    class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="title" class="block text-gray-700 font-semibold">Job Title:</label>
                <input type="text" name="title" id="title" required
                    class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-semibold">Job Description:</label>
                <textarea name="description" id="description" required
                    class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 h-20"></textarea>
            </div>

            <div>
                <label for="job_type" class="block text-gray-700 font-semibold">Tipe Pekerjaan:</label>
                <select name="job_type" id="job_type" required
                    class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
                    <option value="intern">Intern</option>
                    <option value="full-time">Full Time</option>
                </select>
            </div>

            <div>
                <label for="salary" class="block text-gray-700 font-semibold">Salary:</label>
                <input type="number" name="salary" id="salary" required
                    class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition duration-300">
                Create Job
            </button>
        </form>
    </div>

    <!-- Job List -->
    <div class="w-full max-w-3xl bg-white rounded-lg shadow-lg p-6 mt-10">
        <h2 class="text-xl font-bold text-blue-700 text-center mb-6">Job List</h2>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-3 border-b">Job Title</th>
                    <th class="p-3 border-b">Job Type</th>
                    <th class="p-3 border-b">Description</th>
                    <th class="p-3 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jobs as $job): ?>
                    <tr class="hover:bg-gray-100 transition duration-200">
                        <td class="p-2 border-b text-sm"><?= htmlspecialchars($job['title']) ?></td>
                        <td class="p-2 border-b text-sm"><?= htmlspecialchars($job['job_type']) ?></td>
                        <td class="p-2 border-b text-sm truncate"><?= htmlspecialchars($job['description']) ?></td>
                        <td class="p-2 border-b text-sm">
                            <a href="/admin/update-job/<?= $job['id'] ?>" class="text-blue-500 hover:underline">Update</a> |
                            <a href="/admin/delete-job/<?= $job['id'] ?>" class="text-red-500 hover:underline"
                                onclick="return confirm('Are you sure you want to delete this job?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<br>
    <!-- Footer -->
<?include __DIR__ . '/../admin/layouts/footer.php'?>
