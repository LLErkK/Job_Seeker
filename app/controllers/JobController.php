<?
require_once __DIR__ . '/../models/Job.php';
require_once __DIR__ . '/../models/JobApllication.php';
class JobController{
    public function showRandomJob(){
        global $pdo;
        
        $jobModel = new Job($pdo);
        $jobs = $jobModel->getRandomJobs();
        // $jobs = $jobModel->getRandomJobsByType($jobType);
        include __DIR__ . '/../views/job_seeker/view_jobs.php';
    }
    //untuk filter ketika request POST
    public function viewFilterJobs(){
        global $pdo;

        // Ambil job_type dari parameter GET
        $jobType = isset($_GET['job_type']) ? $_GET['job_type'] : '';
        
        // Pastikan jobType sudah terisi
        if ($jobType) {
            $jobModel = new Job($pdo);
            $jobs = $jobModel->getRandomJobsByType($jobType);  // Ambil pekerjaan berdasarkan tipe
            // Tampilkan pekerjaan yang sudah difilter
            include __DIR__ . '/../views/job_seeker/view_jobs.php';
        } else {
            // Jika job_type kosong, kembalikan ke halaman pekerjaan acak
            $this->showRandomJob();
        }
    }

    // app/controllers/JobController.php
    public function applyForJob($data) {
        if (isset($_SESSION['user_id']) && isset($data['job_id'])) {
            $userId = $_SESSION['user_id'];
            $jobId = $data['job_id'];
            require_once __DIR__ . '/../models/JobApllication.php';
            $jobApplicationModel = new JobApllication();

            // Periksa apakah job seeker sudah melamar untuk pekerjaan ini
            $alreadyApplied = $jobApplicationModel->checkIfApplied($userId, $jobId);

            if ($alreadyApplied) {
                // Jika sudah melamar, beri pesan error
                echo "You have already applied for this job.";
            } else {
                // Jika belum melamar, proses aplikasi
                $success = $jobApplicationModel->applyForJob($jobId, $userId);

                if ($success) {
                    echo "Application submitted successfully!";
                } else {
                    echo "Failed to submit application.";
                }
            }
        } else {
            echo "You must be logged in to apply.";
        }
    }

}