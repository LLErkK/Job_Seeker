<?
require_once __DIR__ . '/../models/Job.php';
require_once __DIR__ . '/../models/JobApllication.php';
class JobController{
    public function showRandomJob(){
        global $pdo;
        if($_SESSION['user_id']==null){
            header("Location: /login");
        }
        
        $jobModel = new Job($pdo);
        $jobs = $jobModel->getRandomJobs();
        // $jobs = $jobModel->getRandomJobsByType($jobType);
        include __DIR__ . '/../views/job_seeker/view_jobs.php';
    }
    //untuk filter ketika request POST
    public function viewFilterJobs(){
        global $pdo;
        if($_SESSION['user_id']==null){
            header("Location: /login");
        }
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
                echo "
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Job Application Alert</title>
                    <!-- Tailwind CSS CDN -->
                    <script src='https://cdn.tailwindcss.com'></script>
                </head>
                <body class='flex items-center justify-center min-h-screen bg-gray-100'>
                    <div class='fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50'>
                        <div class='bg-white rounded-lg shadow-lg p-8 max-w-md w-full'>
                            <h2 class='text-2xl font-bold text-red-600 mb-4'>Alert</h2>
                            <p class='text-gray-700 mb-6'>You have already applied for this job.</p>
            
                            <!-- Tombol kembali -->
                            <div class='flex justify-end'>
                                <button onclick='window.history.back();' class='bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300'>
                                    Go Back
                                </button>
                            </div>
                        </div>
                    </div>
                </body>
                ";
            } else {
                // Jika belum melamar, proses aplikasi
                $success = $jobApplicationModel->applyForJob($jobId, $userId);

                if ($success) {
                    header("Location: /job_seeker/jobs");
                } else {
                    echo "Failed to submit application.";
                }
            }
        } else {
            echo "You must be logged in to apply.";
        }
    }

}