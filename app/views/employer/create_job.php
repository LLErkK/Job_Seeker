<?php 

include __DIR__ . '/layouts/header.php'; ?>

<h1>Create Job Posting</h1>

<form action="/employer/create-job" method="POST">
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
    <input type="text" name="salary" id="salary" required><br><br>

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

<p><a href="/employer/jobs">Back to job listings</a></p>

<?php include __DIR__ . '/layouts/footer.php'; ?>
