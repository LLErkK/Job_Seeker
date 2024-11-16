<!-- views/employer/updateJobForm.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Job</title>
</head>
<body>
    <header>
        <h1>Update Job</h1>
        <nav>
            <a href="/admin/jobs">Back to Job List</a> |
            <a href="/logout">Logout</a>
        </nav>
    </header>
    <hr>

    <form action="/admin/update-job/<?= $job['id'] ?>" method="POST">
        <label for="company_name">Nama Perusahaan</label>
        <input type="text" name="company_name" id="company_name" value="<?= htmlspecialchars($job['company_name'])?>"><br><br>

        <label for="title">Job Title:</label><br>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($job['title']) ?>" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required><?= htmlspecialchars($job['description']) ?></textarea><br><br>

        <label for="job_type">Job Type:</label><br>
        <select id="job_type" name="job_type">
            <option value="full-time" <?= $job['job_type'] == 'full-time' ? 'selected' : '' ?>>Full-time</option>
            <option value="intern" <?= $job['job_type'] == 'intern' ? 'selected' : '' ?>>Intern</option>
        </select><br><br>

        <label for="status">Status:</label><br>
        <select id="status" name="status">
            <option value="open" <?= $job['status'] == 'open' ? 'selected' : '' ?>>Open</option>
            <option value="closed" <?= $job['status'] == 'closed' ? 'selected' : '' ?>>Closed</option>
            <option value="pending" <?= $job['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
        </select><br><br>

        <label for="salary">Salary:</label><br>
        <input type="number" id="salary" name="salary" value="<?= htmlspecialchars($job['salary']) ?>" required><br><br>

        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" value="<?= htmlspecialchars($job['location']) ?>" required><br><br>

        <label for="deadline">Deadline:</label><br>
        <input type="date" id="deadline" name="deadline" value="<?= htmlspecialchars($job['deadline']) ?>" required><br><br>

        <button type="submit">Update Job</button>
    </form>
</body>
</html>
