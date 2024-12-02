<?php include __DIR__ . '/layouts/header.php'; ?>
<body class="min-h-screen bg-gradient-to-r from-green-100 via-white to-blue-100">
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">Available Jobs</h1>

        <!-- Filter Form -->
        <form action="/job_seeker/jobs" method="GET" class="flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-4 mb-8">
            <label for="job_type" class="text-lg font-semibold text-gray-700">Filter by Job Type:</label>
            <select name="job_type" id="job_type" class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500">
                <option value="intern" <?= isset($_GET['job_type']) && $_GET['job_type'] == 'intern' ? 'selected' : '' ?>>Intern</option>
                <option value="full-time" <?= isset($_GET['job_type']) && $_GET['job_type'] == 'full-time' ? 'selected' : '' ?>>Full-time</option>
            </select>
            <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-md shadow hover:bg-blue-600 transition duration-300">
                Filter
            </button>
        </form>

        <!-- Job Listings -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (!empty($jobs)): ?>
                <?
                    foreach ($jobs as $job): ?>
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 border border-black capitalize">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center capitalize"><?= htmlspecialchars($job['title']) ?></h3>
                        <p class="mb-2"><strong class="text-gray-800">Description: </strong> <?= htmlspecialchars($job['description']) ?></p>
                        <p class="mb-2"><strong class="text-gray-800">Company Name: </strong><?= htmlspecialchars($job['company_name']) ?></p>
                        <p class="mb-2"><strong class="text-gray-800">Type: </strong><?= htmlspecialchars($job['job_type']) ?></p>
                        <p class="mb-2"><strong class="text-gray-800">Location:</strong> <?= htmlspecialchars($job['location']) ?></p>
                        <p class="mb-4"><strong class="text-gray-800">Salary:</strong> <?= htmlspecialchars($job['salary']) ?></p>

                        <form action="/job_seeker/apply" method="POST">
                            <input type="hidden" name="job_id" value="<?= $job['id'] ?>">
                            <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600 transition duration-300">
                                Apply for this Job
                            </button>
                        </form>
                    </div>

                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full text-center">
                    <p class="text-xl text-gray-600">No jobs available for the selected filter.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Back Button -->
        <div class="mt-12 text-center">
            <a href="/job_seeker" class="inline-block bg-blue-500 text-white py-3 px-8 rounded-md hover:bg-blue-600 transition duration-300">
                Back to Dashboard
            </a>
        </div>

    </div>
  
<?php include __DIR__ . '/layouts/footer.php'; ?>