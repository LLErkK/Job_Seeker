<?php include __DIR__ . '/layouts/header.php'; ?>

<div class="container mx-auto p-8">
    <h2 class="text-3xl font-bold text-center text-purple-600 mb-8">Job Listings and Applications</h2>

    <?php foreach ($jobs as $job): ?>
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8 capitalize">
            <!-- Job Details -->
            <h3 class="text-2xl font-semibold text-blue-600 mb-4 text-center"><?= htmlspecialchars(ucwords(strtolower($job['title']))) ?></h3>
            <p class="mb-2"><strong>Description:</strong> <?= htmlspecialchars($job['description']) ?></p>
            <p class="mb-2"><strong>Location:</strong> <?= htmlspecialchars($job['location']) ?></p>
            <p class="mb-2"><strong>Job Type:</strong> <?= htmlspecialchars($job['job_type']) ?></p>
            <p class="mb-4"><strong>Status:</strong> <?= htmlspecialchars($job['status'] ?? 'No Applicants Yet') ?></p>
            <hr class="my-6">

            <!-- Applicants Section -->
            <h4 class="text-xl font-semibold text-gray-700 mb-4">Applicants:</h4>
            
            <?php if (!empty($job['applications'])): ?>
                <ul class="space-y-6">
                    <?php foreach ($job['applications'] as $application): ?>
                        <li class="bg-gray-50 p-4 rounded-lg border border-gray-200 shadow-sm">
                            <p>
                                <strong>Applicant:</strong> 
                                <a href="/employer/profile/<?= urlencode($application['id']) ?>" class="text-blue-500 hover:underline">
                                    <?= htmlspecialchars($application['applicant_name']) ?>
                                </a>
                            </p>
                            <p><strong>Application Date:</strong> <?= htmlspecialchars($application['application_date']) ?></p>

                            <!-- Application Status Form -->
                            <form action="/employer/update-application-status" method="POST" class="mt-4">
                                <input type="hidden" name="application_id" value="<?= $application['id'] ?>">
                                <label for="status" class="block text-gray-700 font-semibold mb-2">Update Status:</label>
                                <div class="flex items-center space-x-4">
                                    <select name="status" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="pending" <?= $application['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                                        <option value="accepted" <?= $application['status'] == 'accepted' ? 'selected' : '' ?>>Accepted</option>
                                        <option value="rejected" <?= $application['status'] == 'rejected' ? 'selected' : '' ?>>Rejected</option>
                                    </select>
                                    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transition duration-300">Update</button>
                                </div>
                            </form>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p class="text-gray-500">No applications for this job.</p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

    <div class="text-center mt-8">
        <a href="/employer/jobs" class="text-blue-500 hover:text-blue-700 font-semibold">Back to Job Listings</a>
    </div>
</div>

<?php include __DIR__ . '/layouts/footer.php'; ?>