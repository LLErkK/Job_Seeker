<!-- resources/views/job_seeker/view_applications.php -->
<?php include __DIR__ . '/layouts/header.php'; ?>
<h1>Your Job Applications</h1>

<?php if (!empty($applications)): ?>
    <table border="1">
        <thead>
            <tr>
                <th>Job Title</th>
                <th>Location</th>
                <th>Salary</th>
                <th>Job Status</th>
                <th>Application Date</th>
                <th>Application Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($applications as $application): ?>
                <tr>
                    <td><?= htmlspecialchars($application['title']) ?></td>
                    <td><?= htmlspecialchars($application['location']) ?></td>
                    <td><?= htmlspecialchars($application['salary']) ?></td>
                    <td><?= htmlspecialchars($application['job_status']) ?></td>
                    <td><?= htmlspecialchars($application['application_date']) ?></td>
                    <td><?= htmlspecialchars($application['status']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>You haven't applied for any jobs yet.</p>
<?php endif; ?>

<p><a href="/job_seeker">Back to Dashboard</a></p>

<?php include __DIR__ . '/layouts/footer.php'; ?>
