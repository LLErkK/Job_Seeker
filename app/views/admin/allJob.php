<!-- views/employer/jobList.php -->

<? include __DIR__ . '/layouts/header.php'; ?>
<h1>Create Job</h1>
<form action="/admin/create-job" method="POST">
    <label for="company_name">Nama Perusahaan</label>
    <input type="text" name="company_name" id="company_name" required><br><br>


    <label for="title">Job Title:</label>
    <input type="text" name="title" id="title" required><br><br>

    <label for="description">Job Description:</label>
    <textarea name="description" id="description" required></textarea><br><br>
    
    <label for="Type">Tipe Pekerjaan</label>
    <select name="job_type" id="job_type" required>
        <option value="intern">Intern</option>
        <option value="full-time">Full Time</option>
    </select><br><br>

    <label for="requirements">Job Requirements:</label>
    <textarea name="requirements" id="requirements" required></textarea><br><br>

    <label for="salary">Salary:</label>
    <input type="number" name="salary" id="salary" required><br><br>

    <label for="location">Location:</label>
    <input type="text" name="location" id="location" required><br><br>

    <label for="deadline">Application Deadline:</label>
    <input type="date" name="deadline" id="deadline" required><br><br>
    <label for="status">Job Status:</label>
    <select name="status" id="status" required>
        <option value="open">Open</option>
        <option value="closed">Closed</option>
    </select><br><br>

    <button type="submit">Create Job Posting</button>
</form>
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
                        <a href="/admin/update-job/<?= $job['id'] ?>">Update</a> |
                        <a href="/admin/delete-job/<?= $job['id'] ?>" onclick="return confirm('Are you sure you want to delete this job?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php include __DIR__ . '/layouts/footer.php'; ?>
