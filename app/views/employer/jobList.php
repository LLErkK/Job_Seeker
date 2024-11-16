<!-- views/employer/jobList.php -->

<? include __DIR__ . '/layouts/header.php'; ?>

    <h2>Job List</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Job Title</th>
                <th>Job Type</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobs as $job): ?>
                <tr>
                    <td><?= htmlspecialchars($job['title']) ?></td>
                    <td><?= htmlspecialchars($job['job_type']) ?></td>
                    <td><?= htmlspecialchars($job['description']) ?></td>
                    <td>
                        <a href="/employer/update-job/<?= $job['id'] ?>">Update</a> |
                        <a href="/employer/delete-job/<?= $job['id'] ?>" onclick="return confirm('Are you sure you want to delete this job?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php include __DIR__ . '/layouts/footer.php'; ?>
