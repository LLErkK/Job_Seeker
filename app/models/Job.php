<?
class Job{
    private $pdo;
    public function __construct($pdo){
        $this->pdo = $pdo;

    }

    public function createJob($title, $description,$job_type, $requirements, $salary, $location, $deadline, $company_name, $status, $employer_id) {
        $stmt = $this->pdo->prepare("INSERT INTO jobs (title, description,job_type, requirements, salary, location, deadline, company_name, status, employer_id) 
                                     VALUES (:title, :description,:job_type, :requirements, :salary, :location, :deadline, :company_name, :status, :employer_id)");
        
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':job_type',$job_type);
        $stmt->bindParam(':requirements', $requirements);
        $stmt->bindParam(':salary', $salary);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':deadline', $deadline);
        $stmt->bindParam(':company_name', $company_name);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':employer_id', $employer_id);

        return $stmt->execute();
    }

    public function getRandomJobs($limit = 10){
        $query = "SELECT * FROM jobs ORDER BY RAND() LIMIT :limit";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':limit',$limit,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getJobsByEmployerId($employer_id){
        $query = "SELECT * FROM jobs WHERE employer_id = :employer_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':employer_id', $employer_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateJobById($id, $title, $description, $job_type, $status, $salary, $location, $deadline) {
        // SQL query untuk melakukan update job berdasarkan id
        $query = "UPDATE jobs 
                  SET title = :title, 
                      description = :description, 
                      job_type = :job_type, 
                      status = :status, 
                      salary = :salary, 
                      location = :location, 
                      deadline = :deadline 
                  WHERE id = :id ";
    
        // Menyiapkan statement SQL
        $stmt = $this->pdo->prepare($query);
    
        // Bind parameter untuk menghindari SQL injection
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':job_type', $job_type);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':salary', $salary);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':deadline', $deadline);
        $stmt->bindParam(':id', $id);
        
    
        // Eksekusi query dan cek apakah update berhasil
        if ($stmt->execute()) {
            return true; // Update berhasil
        } else {
            return false; // Update gagal
        }
    }
    

    public function getJobsWithApplications($employer_id) {
        $query = "SELECT jobs.*, 
                         job_applications.id AS application_id,
                         job_applications.user_id,
                         job_applications.application_date,
                         job_applications.status,
                         users.username AS applicant_name
                  FROM jobs 
                  LEFT JOIN job_applications ON jobs.id = job_applications.job_id 
                  LEFT JOIN users ON job_applications.user_id = users.id
                  WHERE jobs.employer_id = :employer_id";
        
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':employer_id', $employer_id);
        $stmt->execute();
        $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Mengelompokkan data aplikasi berdasarkan pekerjaan
        $groupedJobs = [];
        foreach ($jobs as $job) {
            $job_id = $job['id'];
            if (!isset($groupedJobs[$job_id])) {
                $groupedJobs[$job_id] = [
                    'id' => $job['id'],
                    'title' => $job['title'],
                    'description' => $job['description'],
                    'location' => $job['location'],
                    'job_type' => $job['job_type'],
                    'status' => $job['status'],
                    'applications' => []
                ];
            }
    
            if (!empty($job['application_id'])) {
                $groupedJobs[$job_id]['applications'][] = [
                    'id' => $job['application_id'],
                    'applicant_name' => $job['applicant_name'],
                    'application_date' => $job['application_date'],
                    'status' => $job['status']
                ];
            }
        }
    
        return $groupedJobs;
    }

    public function getRandomJobsByType($jobType = '') {
        $query = "SELECT * FROM jobs";

        // Jika ada filter job_type, tambahkan WHERE clause
        if ($jobType) {
            $query .= " WHERE job_type = :job_type";
        }

        $stmt = $this->pdo->prepare($query);

        // Jika job_type diberikan, bind param
        if ($jobType) {
            $stmt->bindParam(':job_type', $jobType);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getJobByIdAndEmployer($jobId, $employerId) {
        $stmt = $this->pdo->prepare("SELECT * FROM jobs WHERE id = :jobId AND employer_id = :employerId");
        $stmt->execute([':jobId' => $jobId, ':employerId' => $employerId]);

        return $stmt->fetch(PDO::FETCH_ASSOC); // Return job data if found, otherwise null
    }
    public function deleteJobById($jobId) {
        $stmt = $this->pdo->prepare("DELETE FROM jobs WHERE id = :jobId");
        $stmt->execute([':jobId' => $jobId]);

        return $stmt->rowCount();  
    }

    public function getAllJob(){
        $query = "SELECT * FROM jobs";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getJobById($id){
        $stmt = $this->pdo->prepare("SELECT * FROM jobs WHERE id = :jobId");
        $stmt->execute([':jobId' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
}