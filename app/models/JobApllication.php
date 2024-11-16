<?
class JobApllication{
    private $pdo;
    public function __construct(){
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getApplicationsForJob($job_id) {
        $query = "SELECT job_applications.*, users.username AS applicant_name 
                  FROM job_applications 
                  JOIN users ON job_applications.user_id = users.id 
                  WHERE job_applications.job_id = :job_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':job_id', $job_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateApplicationStatus($application_id, $status) {
        $query = "UPDATE job_applications SET status = :status WHERE id = :application_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':application_id', $application_id);
        return $stmt->execute();
    }
    public function applyForJob($job_id, $user_id){
        $query = "INSERT INTO job_applications (job_id, user_id, application_date) VALUES (:job_id, :user_id, NOW())";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':job_id', $job_id);
        $stmt->bindParam(':user_id', $user_id);
        return $stmt->execute();
    }
    public function checkIfApplied($user_id, $job_id) {
        $query = "SELECT COUNT(*) FROM job_applications WHERE user_id = :user_id AND job_id = :job_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':job_id', $job_id);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0; // Jika sudah melamar, kembalikan true
    }

    public function getApplicationsByUser($user_id) {
        // Ambil data aplikasi berdasarkan user_id
        $query = "SELECT job_applications.*, jobs.title, jobs.location, jobs.salary, jobs.status AS job_status
                  FROM job_applications 
                  JOIN jobs ON job_applications.job_id = jobs.id
                  WHERE job_applications.user_id = :user_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUserIdById($id){
        // Siapkan query untuk mengambil user_id berdasarkan id dari job_applications
        $query = "SELECT user_id FROM job_applications WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
        // Eksekusi query
        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Pastikan hasil tidak kosong sebelum mengakses 'user_id'
            if ($result && isset($result['user_id'])) {
                return $result['user_id'];
            }
        }
    
        // Jika tidak ditemukan, kembalikan null
        return null;
    }
}