<!-- resources/views/job_seeker/view_jobs.php -->
<?php include __DIR__ . '/layouts/header.php' ?>
<body>
    <h1>Available Jobs</h1>

    <!-- Filter Form -->
    <form action="/job_seeker/jobs" method="GET">
        <label for="job_type">Filter by Job Type:</label>
        <select name="job_type" id="job_type">
            <option value="">All</option>
            <option value="intern" <?= isset($_GET['job_type']) && $_GET['job_type'] == 'intern' ? 'selected' : '' ?>>Intern</option>
            <option value="full-time" <?= isset($_GET['job_type']) && $_GET['job_type'] == 'full-time' ? 'selected' : '' ?>>Full-time</option>
        </select>
        <button type="submit">Filter</button>
    </form>

    <ul>
        <?php if (!empty($jobs)): ?>
            <?php foreach ($jobs as $job): ?>
                <li>
                    <h3><?= htmlspecialchars($job['title']) ?></h3>
                    <p><?= htmlspecialchars($job['description']) ?></p>
                    <p><strong>Location:</strong> <?= htmlspecialchars($job['location']) ?></p>
                    <p><strong>Salary:</strong> <?= htmlspecialchars($job['salary']) ?></p>
                    <form action="/job_seeker/apply" method="POST">
                        <input type="hidden" name="job_id" value="<?= $job['id'] ?>">
                        <button type="submit">Apply for this Job</button>
                    </form>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No jobs available for the selected filter.</p>
        <?php endif; ?>
    </ul>
    <p><a href="/job_seeker">Back to Dashboard</a></p>
    <?php include __DIR__ . '/layouts/footer.php' ?>
</body>
