<!-- resources/views/employer/view_applications.php -->
<? include __DIR__ . '/layouts/header.php';?>
<h2>Job Listings and Applications</h2>

<?php foreach ($jobs as $job): ?>
    <h3>Job Title: <?= htmlspecialchars($job['title']) ?></h3>
    <p><strong>Description:</strong> <?= htmlspecialchars($job['description']) ?></p>
    <p><strong>Location:</strong> <?= htmlspecialchars($job['location']) ?></p>
    <p><strong>Job Type:</strong> <?= htmlspecialchars($job['job_type']) ?></p>
    <p><strong>Status:</strong> <?= htmlspecialchars($job['status']??'Belum Ada Yang Apply') ?></p>
    <hr>

    <h4>Applicants:</h4>
    <?php if (!empty($job['applications'])): ?>
        <ul>
            <?php foreach ($job['applications'] as $application): ?>
                <li>
                    <strong>Applicant:</strong> 
                        <a href="/employer/profile/<?= urlencode($application['id']) ?>">
                            <?= htmlspecialchars($application['applicant_name']) ?>
                        </a><br>
                    <strong>Application Date:</strong> <?= htmlspecialchars($application['application_date']) ?><br>
                    <form action="/employer/update-application-status" method="POST">
                        <input type="hidden" name="application_id" value="<?= $application['id'] ?>">
                        <select name="status">
                            <option value="pending" <?= $application['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="accepted" <?= $application['status'] == 'accepted' ? 'selected' : '' ?>>Accepted</option>
                            <option value="rejected" <?= $application['status'] == 'rejected' ? 'selected' : '' ?>>Rejected</option>
                        </select>
                        <button type="submit">Update Status</button>
                    </form>
                </li>

            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No applications for this job.</p>
    <?php endif; ?>
    <hr>
<?php endforeach; ?>

    <p><a href="/employer/jobs">Back to Job Listings</a></p>
    <?php include __DIR__ . '/layouts/footer.php'; ?>
