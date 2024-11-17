<?php include __DIR__ . '/layouts/header.php'; ?>
    <div class="container mx-auto p-8 flex flex-col items-center">
        <h1 class="text-4xl font-bold mb-8 text-center text-gray-800">Your Job Applications</h1>

        <?php if (!empty($applications)): ?>
            <div class="overflow-x-auto bg-white shadow-xl rounded-lg border border-gray-200">
                <table class="min-w-full bg-white rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-blue-600 text-white text-left">
                            <th class="py-4 px-6">Job Title</th>
                            <th class="py-4 px-6">Location</th>
                            <th class="py-4 px-6">Salary</th>
                            <th class="py-4 px-6">Job Status</th>
                            <th class="py-4 px-6">Application Date</th>
                            <th class="py-4 px-6">Application Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($applications as $application): ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-300">
                                <td class="py-4 px-6"><?= htmlspecialchars($application['title']) ?></td>
                                <td class="py-4 px-6"><?= htmlspecialchars($application['location']) ?></td>
                                <td class="py-4 px-6"><?= htmlspecialchars($application['salary']) ?></td>
                                <td class="py-4 px-6"><?= htmlspecialchars($application['job_status']) ?></td>
                                <td class="py-4 px-6"><?= htmlspecialchars($application['application_date']) ?></td>
                                <td class="py-4 px-6">
                                    <?php if ($application['status'] === 'accepted'): ?>
                                        <span class="inline-block bg-green-100 text-green-800 py-1 px-3 rounded-full text-sm">Accepted</span>
                                    <?php elseif ($application['status'] === 'rejected'): ?>
                                        <span class="inline-block bg-red-100 text-red-800 py-1 px-3 rounded-full text-sm">Rejected</span>
                                    <?php else: ?>
                                        <span class="inline-block bg-yellow-100 text-yellow-800 py-1 px-3 rounded-full text-sm">Pending</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="flex items-center justify-center h-64">
                <p class="text-center text-gray-500 text-xl">You haven't applied for any jobs yet.</p>
            </div>
        <?php endif; ?>

        <div class="mt-10 text-center">
            <a href="/job_seeker" class="inline-block bg-blue-500 text-white px-5 py-3 rounded-lg shadow hover:bg-blue-600 transition duration-300">
                Back to Dashboard
            </a>
        </div>
    </div>

<?php include __DIR__ . '/layouts/footer.php'; ?>

