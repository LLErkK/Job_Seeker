<?
class JobSeekerController{
    public function showJobSeeekerDashboard(){
        require_once __DIR__ . '/../views/job_seeker/dashboard.php';
    }
    public function showProfile() {
        
        $userId = $_SESSION['user_id'];
    
        require_once __DIR__ . '/../models/profile.php';
        $profileModel = new Profile();
    
        // Ambil data profil dari database
        $profile = $profileModel->getProfileByUserId($userId);
    
        // Pastikan variabel $profile dikirim ke view
        require_once __DIR__ . '/../views/job_seeker/profile.php';
    }
    

    public function updateProfile($data){
        global $pdo;
        $userId = $_SESSION['user_id'];
        require_once __DIR__ . '/../models/profile.php';
        $profileModel = new Profile();
        
        // Upload Foto
        // Upload Foto
        $photoName = null;
        if (!empty($_FILES['photo']['name'])) {
            $photoName = $this->uploadPhoto($_FILES['photo']);
            if (!$photoName) {
                header('Location: /job_seeker/profile?error=invalid_photo');
                exit();
            }
        } else {
            $photoName = $data['current_photo'] ?? null; // Pertahankan foto lama jika tidak ada foto baru
        }

        //kalau kosong makan nilainya kan null

        $umur = !empty($data['umur']) ? $data['umur'] : null; 
        $gender = !empty($data['gender']) ? $data['gender'] : null;
        $alamat = !empty($data['alamat']) ? $data['alamat'] : null;
        $riwayatPendidikan = !empty($data['riwayat_pendidikan']) ? $data['riwayat_pendidikan'] : null;
        $riwayatPekerjaan = !empty($data['riwayat_pekerjaan']) ? $data['riwayat_pekerjaan'] : null;
        $deskripsi = !empty($data['deskripsi']) ? $data['deskripsi'] : null;



        $result = 
        $profileModel->updateProfile(
            $userId, 
            $data['name'], 
            $umur, 
            $gender, 
            $alamat, 
            $riwayatPendidikan, 
            $riwayatPekerjaan, 
            $deskripsi,
            $photoName
        );
        if ($result) {
            header('Location: /job_seeker/profile?success=1');
        } else {
            header('Location: /job_seeker/profile?error=1');
        }
        exit();
    }
    private function uploadPhoto($file) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $uploadDir = __DIR__ . '/../../public/uploads/profile_photos/';
        
        // Validasi jika tidak ada file yang diunggah
        if (empty($file['name'])) {
            return null;
        }
    
        // Validasi file
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($extension, $allowedExtensions)) {
            return false;
        }
    
        // Cek error upload
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return false;
        }
    
        // Cek ukuran file (misalnya, maksimum 5MB)
        $maxFileSize = 5 * 1024 * 1024; // 5MB
        if ($file['size'] > $maxFileSize) {
            return false;
        }
    
        // Buat nama file unik
        $newFileName = uniqid() . '.' . $extension;
    
        // Pastikan folder tujuan ada
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
    
        // Pindahkan file
        if (move_uploaded_file($file['tmp_name'], $uploadDir . $newFileName)) {
            return $newFileName;
        }
        
        return false;
    }
    

    public function deleteProfile(){
        global $pdo;
        $userId = $_SESSION['user_id']; // Mendapatkan ID pengguna dari sesi
        require_once __DIR__ . '/../models/User.php';
        $userModel = new User($pdo);

        // Memanggil fungsi deleteUserAndProfile untuk menghapus profil dan data pengguna
        $result = $userModel->deleteUserAndProfile($userId);

        if ($result) {
            session_destroy(); // Hapus sesi setelah pengguna dihapus
            header('Location: /register?account_deleted=1'); // Redirect ke halaman registrasi dengan pesan sukses
        } else {
            header('Location: /job_seeker/profile?error=1'); // Redirect ke profil dengan error jika penghapusan gagal
        }
        exit();
    }

    public function deletePhoto() {
        $userId = $_SESSION['user_id'];
        require_once __DIR__ . '/../models/profile.php';
        $profileModel = new Profile();
    
        // Hapus file fisik
        $profile = $profileModel->getProfileByUserId($userId);
        if (!empty($profile['photo'])) {
            $filePath = __DIR__ . '/../../public/uploads/profile_photos/' . $profile['photo'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    
        // Update database (set photo NULL)
        $profileModel->updatePhoto($userId, null);
    
        header('Location: /job_seeker/profile?photo_deleted=1');
        exit();
    }
    public function viewApplications(){
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            require_once __DIR__ . '/../models/JobApllication.php';
            $jobApplicationModel = new JobApllication();
            // Ambil aplikasi berdasarkan user id
            $applications = $jobApplicationModel->getApplicationsByUser($userId);

            // Tampilkan halaman dengan data aplikasi
            require_once '../app/views/job_seeker/view_applications.php';
        } else {
            echo "Please login first to view your applications.";
        }
    }
}