<?
require_once __DIR__ . '/../models/Job.php';
require_once __DIR__ . '/../models/JobApllication.php';
class EmployerController{

    public function viewApplications(){
        if (isset($_SESSION['user_id'])) {
            global $pdo;
            $jobModel = new Job($pdo);
            $employer_id = $_SESSION['user_id'];
            $jobs = $jobModel->getJobsWithApplications($employer_id);
            require_once __DIR__ . '/../views/employer/view_applications.php';
        } else {
            echo "You need to be logged in.";
        }

    }
    public function showEmployerDashboard(){
        require_once __DIR__ . '/../views/employer/dashboard.php';
    }
    public function showCreateJob(){
        if($_SESSION['role']!='employer'){
            header("Location: /login");
            exit();
        }
        require_once __DIR__ . '/../views/employer/create_job.php';
    }

    public function createJob($data) {
        global $pdo;
        // Ambil data dari $data atau $_POST jika tidak ada data
        $title = isset($data['title']) ? htmlspecialchars($data['title']) : '';
        $description = isset($data['description']) ? htmlspecialchars($data['description']) : '';
        $job_type = isset($data['job_type']) ? htmlspecialchars($data['job_type']) : '';
        $requirements = isset($data['requirements']) ? htmlspecialchars($data['requirements']) : '';
        $salary = isset($data['salary']) ? htmlspecialchars($data['salary']) : '';
        $location = isset($data['location']) ? htmlspecialchars($data['location']) : '';
        $deadline = isset($data['deadline']) ? htmlspecialchars($data['deadline']) : '';
        $company_name = $_SESSION['username'];  // Nama perusahaan dari session
        $status = isset($data['status']) ? htmlspecialchars($data['status']) : '';
        $employer_id = $_SESSION['user_id'];  // ID employer dari session
    
        // Validasi data
        if (empty($title) || empty($description) || empty($requirements) || empty($salary) || empty($location) || empty($deadline) || empty($company_name) || empty($status)|| empty($job_type)) {
            echo "All fields are required.";
            return;
        }
    
        // Membuat instance model Job dan memanggil metode untuk membuat job
        require_once '../app/models/Job.php';  // Pastikan model ini ada
        $jobModel = new Job($pdo);  // Pastikan $pdo adalah instance dari koneksi database
    
        // Menggunakan metode model untuk menyimpan job
        $success = $jobModel->createJob($title, $description,$job_type, $requirements, $salary, $location, $deadline, $company_name, $status, $employer_id);
    
        // Cek apakah berhasil
        if ($success) {
            echo "Job posting created successfully.";
            header("Location: /employer/jobs");  // Redirect ke halaman daftar lowongan pekerjaan
            exit();
        } else {
            echo "Failed to create job posting.";
        }
    }

    public function showJobList(){
        global $pdo;
        $employerId = $_SESSION['user_id'];
        $jobModel = new Job($pdo);
        $jobs = $jobModel->getJobsByEmployerId($employerId);

        require_once __DIR__ . '/../views/employer/jobList.php';
    }

    public function updateApplicationStatus($data) {
        if (isset($data['application_id']) && isset($data['status'])) {
            $jobApplicationModel = new JobApllication();
            $success = $jobApplicationModel->updateApplicationStatus($data['application_id'], $data['status']);
            if ($success) {
                header("Location: /employer/applications");
                exit();
            } else {
                echo "Failed to update application status.";
            }
        }
    }

    //show halaman update job
    public function showUpdateJobForm($jobId){
        // Ensure the user is logged in and has an employer ID in the session
        if (!isset($_SESSION['user_id'])) {
            // Handle the case where the user is not logged in
            echo "You must be logged in to access this page.";
            return;
        }
    
        global $pdo;
        $employerId = $_SESSION['user_id'];
        $jobModel = new Job($pdo);
    
        // Fetch the job by jobId and employerId
        $job = $jobModel->getJobByIdAndEmployer($jobId, $employerId);
    
        if ($job) {
            // Pass the job data to the view
            require_once __DIR__ . '/../views/employer/updateJobForm.php';
        } else {
            // If no job is found, show an error message
            echo "Job not found or you don't have permission to edit this job.";
        }
    }
    
    public function updateJob($jobId, $data){
        // Membuat objek model job
        // Melakukan query Update berdasarkan id($jobId)
        global $pdo;
        $employerId = $_SESSION['user_id'];
        $jobModel = new Job($pdo);
    
        // Mengambil data dari parameter $data
        $title = $data['title'];
        $description = $data['description'];
        $job_type = $data['job_type'];
        $status = $data['status']; // Menggunakan 'status' daripada 'requirements'
        $salary = $data['salary'];
        $location = $data['location'];
        $deadline = $data['deadline']; // Memperbaiki 'deaddline' menjadi 'deadline'
    
        // Panggil method untuk update job berdasarkan jobId
        $jobModel->updateJobById($jobId, $title, $description, $job_type, $status, $salary, $location, $deadline);
        echo "Job Berhasil DiUpdate";
        header("Location: /employer/jobs");  // Redirect ke halaman daftar lowongan pekerjaan
        exit();
    }

    public function deleteJob($jobId) {
        global $pdo;
        
        // Ensure the employer is logged in
        if (!isset($_SESSION['user_id'])) {
            echo "You must be logged in to delete jobs.";
            return;
        }

        $employerId = $_SESSION['user_id'];
        $jobModel = new Job($pdo);

        // Check if the job belongs to the logged-in employer
        $job = $jobModel->getJobByIdAndEmployer($jobId, $employerId);

        if ($job) {
            // Delete the job from the database
            $jobModel->deleteJobById($jobId);
            
            // Redirect back to the job list after successful deletion
            header("Location: /employer/jobs");
            exit();
        } else {
            // If the job is not found or the employer doesn't own the job
            echo "Job not found or you do not have permission to delete this job.";
        }
    }

    public function showProfileByUserId($userId) {
        require_once __DIR__ . '/../models/profile.php';
        $profileModel = new Profile();
    
        
        $profile = $profileModel->getProfileByUserId($userId);
    
        if ($profile) {
            require_once __DIR__ . '/../views/profile.php';
        } else {
            echo "Tidak ada Profile yang sesuai untuk user_id: " . $userId;
        }
    }
    

    public function getUserIdByApplicationId($id){
        $applicationModel = new JobApllication();
        
        $userId = $applicationModel->getUserIdById($id);
        return $userId;

    }
    
    
    
    

}