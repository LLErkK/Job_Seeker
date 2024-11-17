<?php

// Login Form Route (GET)
if ($_SERVER['REQUEST_URI'] == '/login' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once '../app/controllers/AuthController.php';
    $authController = new AuthController();
    $authController->showLoginForm();
    exit();
}

// Login Action Route (POST)
if ($_SERVER['REQUEST_URI'] == '/login' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../app/controllers/AuthController.php';
    $authController = new AuthController();
    $authController->login($_POST);
}

// Route Register Menampilkan Halaman
if ($_SERVER['REQUEST_URI'] == '/register' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once '../app/controllers/AuthController.php';
    $authController = new AuthController();
    $authController->showRegisterForm();
    exit();
}

// Route Register Post atau Mendaftar
if ($_SERVER['REQUEST_URI'] == '/register' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../app/controllers/AuthController.php';
    $authController = new AuthController();
    $authController->register($_POST);
    exit();
}

// Logout Route
if ($_SERVER['REQUEST_URI'] == '/logout') {
    require_once '../app/controllers/AuthController.php';
    $authController = new AuthController();
    $authController->logout();
}

// ROUTE UNTUK EMPLOYER

// Route Menampilkan Create Job
if ($_SERVER['REQUEST_URI'] == '/employer/create-job' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once '../app/controllers/EmployerController.php';
    $employerController = new EmployerController();
    $employerController->showCreateJob();
    exit();
}

// Route Membuat Job
if ($_SERVER['REQUEST_URI'] == '/employer/create-job' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../app/controllers/EmployerController.php';
    $employerController = new EmployerController();
    $employerController->createJob($_POST);
    exit();
}

// Route Menampilkan Job Applications
if ($_SERVER['REQUEST_URI'] == '/employer/applications' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once '../app/controllers/EmployerController.php';
    $employerController = new EmployerController();
    $employerController->viewApplications();
    exit();
}

// Mengupdate Status Aplikasi
if ($_SERVER['REQUEST_URI'] == '/employer/update-application-status' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../app/controllers/EmployerController.php';
    $employerController = new EmployerController();
    $employerController->updateApplicationStatus($_POST);
    exit();
}
//menampilkan semua job yang dibuat
if($_SERVER['REQUEST_URI']=='/employer/jobs' && $_SERVER['REQUEST_METHOD']=='GET'){
    require_once '../app/controllers/EmployerController.php';
    $employerController = new EmployerController();
    $employerController->showJobList();
    exit();
}
//menampilkan halaman update job
// Check if the request URI starts with '/employer/update-job/' and method is GET
if (strpos($_SERVER['REQUEST_URI'], '/employer/update-job/') === 0 && $_SERVER['REQUEST_METHOD'] == 'GET') {
    // Extract the jobId from the URL
    $uriParts = explode('/', $_SERVER['REQUEST_URI']);  // Split the URL by '/' to get the parts
    $jobId = isset($uriParts[3]) ? $uriParts[3] : null;  // The jobId should be at position 3 (0 is the root, 1 is 'employer', 2 is 'update-job', 3 is the jobId)

    if ($jobId) {
        // Include the controller and instantiate it
        require_once '../app/controllers/EmployerController.php';
        $employerController = new EmployerController();

        // Call the method to show the update form with the jobId
        $employerController->showUpdateJobForm($jobId);
    } else {
        // Handle the case when jobId is not provided or is invalid
        echo "Invalid Job ID.";
    }

    exit(); // Stop further execution after handling this request
}
//route mengupdate job
if (strpos($_SERVER['REQUEST_URI'], '/employer/update-job/') === 0 && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Extract the jobId from the URL
    $uriParts = explode('/', $_SERVER['REQUEST_URI']);  // Split the URL by '/' to get the parts
    $jobId = isset($uriParts[3]) ? $uriParts[3] : null;  // The jobId should be at position 3 (0 is the root, 1 is 'employer', 2 is 'update-job', 3 is the jobId)

    if ($jobId) {
        // Include the controller and instantiate it
        require_once '../app/controllers/EmployerController.php';
        $employerController = new EmployerController();

        // Call the method to show the update form with the jobId
        $employerController->updateJob($jobId,$_POST);
    } else {
        // Handle the case when jobId is not provided or is invalid
        echo "Invalid Job ID.";
    }

    exit(); // Stop further execution after handling this request
}

//delete job dengan id tertentu
// Check if the request URI matches the route '/employer/delete-job/{jobId}' and method is GET
if (strpos($_SERVER['REQUEST_URI'], '/employer/delete-job/') === 0 && $_SERVER['REQUEST_METHOD'] == 'GET') {
    // Extract the jobId from the URL
    $uriParts = explode('/', $_SERVER['REQUEST_URI']);
    $jobId = isset($uriParts[3]) ? $uriParts[3] : null;

    if ($jobId) {
        // Include the controller and instantiate it
        require_once '../app/controllers/EmployerController.php';
        $employerController = new EmployerController();

        // Call the method to delete the job with the jobId
        $employerController->deleteJob($jobId);
    } else {
        // Handle the case when jobId is not provided or invalid
        echo "Invalid Job ID.";
    }

    exit(); // Stop further execution after handling this request
}
//router menampilkan profile applier
if (strpos($_SERVER['REQUEST_URI'], '/employer/profile/') === 0 && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $uriParts = explode('/', $_SERVER['REQUEST_URI']);
    $id = isset($uriParts[3]) ? $uriParts[3] : null;

    if ($id) {
        require_once '../app/controllers/EmployerController.php';
        $employerController = new EmployerController();

        // Dapatkan user_id dari job applications
        $user_id = $employerController->getUserIdByApplicationId($id);
        

        if ($user_id) {
            $employerController->showProfileByUserId($user_id);
        } else {
            die("User ID not found for application ID: " . $id);
        }
    } else {
        echo "Invalid Job ID.";
    }
    exit();
}




// ROUTE UNTUK JOB SEEKER

// Melihat Random Job atau Pekerjaan Berdasarkan Job Type
if ($_SERVER['REQUEST_URI'] == '/job_seeker/jobs' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once '../app/controllers/JobController.php';
    $jobController = new JobController();

    if (isset($_GET['job_type']) && !empty($_GET['job_type'])) {
        $jobController->viewFilterJobs();
    } else {
        $jobController->showRandomJob();
    }
    exit();
}

// Melihat Pekerjaan Berdasarkan Filter (Intern)
if ($_SERVER['REQUEST_URI'] == '/job_seeker/jobs?job_type=intern' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once '../app/controllers/JobController.php';
    $_GET['job_type'] = 'intern';
    $jobController = new JobController();
    $jobController->viewFilterJobs();
    exit();
}

// Melihat Pekerjaan Berdasarkan Filter (Full-time)
if ($_SERVER['REQUEST_URI'] == '/job_seeker/jobs?job_type=full-time' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once '../app/controllers/JobController.php';
    $_GET['job_type'] = 'full-time';
    $jobController = new JobController();
    $jobController->viewFilterJobs();
    exit();
}

// Route Untuk Melamar Pekerjaan
if ($_SERVER['REQUEST_URI'] == '/job_seeker/apply' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../app/controllers/JobController.php';
    $jobController = new JobController();
    $jobController->applyForJob($_POST);
    exit();
}

// Route Lihat Halaman Profil
if ($_SERVER['REQUEST_URI'] == '/job_seeker/profile' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once '../app/controllers/JobSeekerController.php';
    $jobSeekerController = new JobSeekerController();
    $jobSeekerController->showProfile();
    exit();
}

// Route Update Profil Job Seeker
if ($_SERVER['REQUEST_URI'] == '/job_seeker/update-profile' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../app/controllers/JobSeekerController.php';
    $jobSeekerController = new JobSeekerController();
    $jobSeekerController->updateProfile($_POST);
    exit();
}

// Route Delete Profil Job Seeker
if ($_SERVER['REQUEST_URI'] == '/job_seeker/delete-profile' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../app/controllers/JobSeekerController.php';
    $jobSeekerController = new JobSeekerController();
    $jobSeekerController->deleteProfile();
    exit();
}

// Route Menampilkan Semua Lamaran dan Statusnya
if ($_SERVER['REQUEST_URI'] == '/job_seeker/applications' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once '../app/controllers/JobSeekerController.php';
    $jobSeekerController = new JobSeekerController();
    $jobSeekerController->viewApplications();
    exit();
}

//Route untuk admin
//menampilkan manage job'
if($_SERVER['REQUEST_URI']=='/admin/jobs' && $_SERVER['REQUEST_METHOD']=='GET'){
    require_once '../app/controllers/AdminController.php';
    $adminController = new AdminController();
    $adminController->showAllJob();
    exit();
}
if($_SERVER['REQUEST_URI']=='/admin/create-job' && $_SERVER['REQUEST_METHOD']=='POST'){
    require_once '../app/controllers/AdminController.php';
    $adminController = new AdminController();
    $adminController->createAdminJob($_POST);
    exit();
}
//menampilkan halaman update job
// Check if the request URI starts with '/employer/update-job/' and method is GET
if (strpos($_SERVER['REQUEST_URI'], '/admin/update-job/') === 0 && $_SERVER['REQUEST_METHOD'] == 'GET') {
    // Extract the jobId from the URL
    $uriParts = explode('/', $_SERVER['REQUEST_URI']);  // Split the URL by '/' to get the parts
    $jobId = isset($uriParts[3]) ? $uriParts[3] : null;  // The jobId should be at position 3 (0 is the root, 1 is 'employer', 2 is 'update-job', 3 is the jobId)

    if ($jobId) {
        // Include the controller and instantiate it
        require_once '../app/controllers/AdminController.php';
        $adminController = new AdminController();

        // Call the method to show the update form with the jobId
        $adminController->showUpdateJobForm($jobId);
    } else {
        // Handle the case when jobId is not provided or is invalid
        echo "Invalid Job ID.";
    }

    exit(); // Stop further execution after handling this request
}
//update job
if (strpos($_SERVER['REQUEST_URI'], '/admin/update-job/') === 0 && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Extract the jobId from the URL
    $uriParts = explode('/', $_SERVER['REQUEST_URI']);  // Split the URL by '/' to get the parts
    $jobId = isset($uriParts[3]) ? $uriParts[3] : null;  // The jobId should be at position 3 (0 is the root, 1 is 'employer', 2 is 'update-job', 3 is the jobId)

    if ($jobId) {
        // Include the controller and instantiate it
        require_once '../app/controllers/AdminController.php';
        $adminController = new AdminController();

        // Call the method to show the update form with the jobId
        $adminController->updateJob($jobId, $_POST);
    } else {
        // Handle the case when jobId is not provided or is invalid
        echo "Invalid Job ID.";
    }

    exit(); // Stop further execution after handling this request
}
//delete job by admin
if (strpos($_SERVER['REQUEST_URI'], '/admin/delete-job/') === 0 && $_SERVER['REQUEST_METHOD'] == 'GET') {
    // Extract the jobId from the URL
    $uriParts = explode('/', $_SERVER['REQUEST_URI']);
    $jobId = isset($uriParts[3]) ? $uriParts[3] : null;

    if ($jobId) {
        // Include the controller and instantiate it
        require_once '../app/controllers/EmployerController.php';
        $adminController = new AdminController();

        // Call the method to delete the job with the jobId
        $adminController->deleteJob($jobId);
    } else {
        // Handle the case when jobId is not provided or invalid
        echo "Invalid Job ID.";
    }

    exit(); // Stop further execution after handling this request
}
// Role-based Authorization
if (isset($_SESSION['role'])) {
    switch ($_SESSION['role']) {
        case 'admin':
            require_once '../app/controllers/AdminController.php';
            $adminController = new AdminController();
            $adminController->showAdminDashboard();
            break;

        case 'job_seeker':
            require_once '../app/controllers/JobSeekerController.php';
            $jobSeekerController = new JobSeekerController();
            $jobSeekerController->showJobSeeekerDashboard();
            break;

        case 'employer':
            require_once '../app/controllers/EmployerController.php';
            $employerController = new EmployerController();
            $employerController->showEmployerDashboard();
            break;
    }
    exit();
} else {
    // header('Location: /login');
    // exit();
    require_once '../app/controllers/AuthController.php';
    $authController = new AuthController();
    $authController->showLandingPage();
    exit();
}
