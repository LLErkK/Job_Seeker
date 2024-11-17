<?php include __DIR__ . '/layouts/header.php'; ?>

<div class="container mx-auto p-8">
    <!-- Heading -->
    <h2 class="text-4xl font-semibold text-purple-700 mb-10 text-center">JOB LIST</h2>

    <!-- Tabel Daftar Pekerjaan -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
                    <th class="py-4 px-6 text-left border-b">Job Title</th>
                    <th class="py-4 px-6 text-left border-b">Job Type</th>
                    <th class="py-4 px-6 text-left border-b">Description</th>
                    <th class="py-4 px-6 text-left border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($jobs)): ?>
                    <?php foreach ($jobs as $job): ?>
                        <tr class="hover:bg-gray-100 transition-colors duration-200 border-b">
                            <td class="py-4 px-6"><?= htmlspecialchars($job['title']) ?></td>
                            <td class="py-4 px-6"><?= htmlspecialchars($job['job_type']) ?></td>
                            <td class="py-4 px-6 truncate max-w-xs"><?= htmlspecialchars($job['description']) ?></td>
                            <td class="py-4 px-6 flex space-x-4">
                                <!-- Tombol Update -->
                                <a href="/employer/update-job/<?= $job['id'] ?>" 
                                   class="bg-yellow-500 text-white py-2 px-4 rounded-md hover:bg-yellow-600 flex items-center space-x-1 transition duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Update</span>
                                </a>

                                <!-- Tombol Delete -->
                                <a href="/employer/delete-job/<?= $job['id'] ?>" 
                                   onclick="return confirm('Are you sure you want to delete this job?')" 
                                   class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 flex items-center space-x-1 transition duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    <span>Delete</span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="py-6 text-center text-gray-500">
                            No jobs available.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Tombol Kembali ke Dashboard -->
    <div class="mt-10 text-center">
        <a href="/employer" class="bg-blue-500 text-white py-3 px-6 rounded-md hover:bg-blue-600 transition duration-300">
            Back to Dashboard
        </a>
    </div>
</div>

<?php include __DIR__ . '/layouts/footer.php'; ?>
