<?
class AdminController{
    public function showAdminDashboard(){
        require_once __DIR__ . '/../views/admin/dashboard.php';
    }

    public function showAllJob(){
        require_once __DIR__ . '/../models/Job.php';
        global $pdo;
        if($_SESSION['user_id']==null){
            header("Location: /login");
        }
        $employerId = $_SESSION['user_id'];
        $jobModel = new Job($pdo);
        $jobs = $jobModel->getAllJob();
        require_once __DIR__ . '/../views/admin/allJob.php';
    }

    public function createAdminJob($data){
        global $pdo;
        // Ambil data dari $data atau $_POST jika tidak ada data
        $title = isset($data['title']) ? htmlspecialchars($data['title']) : '';
        $description = isset($data['description']) ? htmlspecialchars($data['description']) : '';
        $job_type = isset($data['job_type']) ? htmlspecialchars($data['job_type']) : '';
        $requirements = isset($data['requirements']) ? htmlspecialchars($data['requirements']) : '';
        $salary = isset($data['salary']) ? htmlspecialchars($data['salary']) : '';
        $location = isset($data['location']) ? htmlspecialchars($data['location']) : '';
        $deadline = isset($data['deadline']) ? htmlspecialchars($data['deadline']) : '';
        $company_name = $data['company_name'];  // Nama perusahaan dari session
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
            header("Location: /admin/jobs");  // Redirect ke halaman daftar lowongan pekerjaan
            exit();
        } else {
            echo "Failed to create job posting.";
        }
    }

    public function showUpdateJobForm($jobId){
        
        require_once __DIR__ . '/../models/Job.php';
        global $pdo;
        if($_SESSION['user_id']==null){
            header("Location: /login");
        }
        $jobModel = new Job($pdo);
    
        // Fetch the job by jobId and employerId
        $job = $jobModel->getJobById($jobId);
    
        if ($job) {
            // Pass the job data to the view
            require_once __DIR__ . '/../views/admin/updateJobForm.php';
        } else {
            // If no job is found, show an error message
            echo "Job not found or you don't have permission to edit this job.";
        }
    }
    public function updateJob($jobId, $data){
        // Membuat objek model job
        // Melakukan query Update berdasarkan id($jobId)
    
        global $pdo;
        require_once __DIR__ . '/../models/Job.php';
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
        $jobModel->updateJobById($jobId, $title, $description, $job_type, $status,
         $salary, $location, $deadline);
        echo "Job Berhasil DiUpdate";
        header("Location: /admin/jobs");  // Redirect ke halaman daftar lowongan pekerjaan
        exit();
    }
    public function deleteJob($jobId){
        global $pdo;
        require_once __DIR__ .'/../models/Job.php';
        $jobModel = new Job($pdo);
        $jobModel->deleteJobById($jobId);
    }
}