<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form action="/register" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <label for="role">Register as:</label>
        <select name="role" id="role" required>
            <option value="job_seeker">Job Seeker</option>
            <option value="employer">Employer</option>
            <option value="admin">Admin</option>
            <!-- <option value="admin">Admin</option> -->
        </select><br><br>

        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="/login">Login here</a>.</p>
</body>
</html>
