<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/profile.php';
class AuthController {
    
    public function showLoginForm(){
        require_once __DIR__ . '/../views/login.php';
    }
    public function showRegisterForm(){
        require_once __DIR__ . '/../views/register.php';
    }
    public function register($data) {
        global $pdo;
    
    // Pastikan array key ada di POST
    $email = isset($data['email']) ? $data['email'] : null;  // Cek apakah email ada
    $username = isset($data['username']) ? $data['username'] : null;
    $password = isset($data['password']) ? $data['password'] : null;
    $role = isset($data['role']) ? $data['role'] : null;

    // Cek apakah email, username, password, dan role ada
    if (!$email || !$username || !$password || !$role) {
        echo "Please fill in all fields.";
        return;
    }

    if (!in_array($role, ['job_seeker', 'admin', 'employer'])) {
        echo "Invalid role selected.";
        return;
    }

    // Validasi apakah username sudah digunakan
    $userModel = new User($pdo);
    $profileModel = new Profile();
    if ($userModel->findByUsername($username)) {
        echo "Username is already taken.";
        return;
    }
    if ($userModel->findByEmail($email)) {
        echo "Email is already used.";
        return;
    }

    // Buat user baru
    $success = $userModel->createUser($username, $password, $role, $email);
    //buat profile untuk user baru
    //bagaimana dapat id dari user
    $id = $userModel->getIdbyUsername($username);
    $success2 = $profileModel->create($id);
    if ($success) {
        echo "Registration successful. Please <a href='/login'>login</a>.";
    } else {
        echo "Registration failed. Please try again.";
    }
    }
    public function login($data) {
        global $pdo;
        $email = $data['email'];
        $password = $data['password'];
        
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            
            switch ($user['role']) {
                case 'admin':
                    header('Location: /admin/dashboard');
                    break;
                case 'job_seeker':
                    header('Location: /job_seeker/dashboard');
                    break;
                case 'employer':
                    header('Location: /employer/dashboard');
                    break;
            }
            exit();
        } else {

            header('Location: /login?error=invalid_credentials');
            exit();
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /login');
        exit();
    }

    public function showLandingPage(){
        global $pdo;
        require_once __DIR__ . '/../models/Job.php';
        $jobModel = new Job($pdo);
        $jobs = $jobModel->getRandomJobs();
        require_once __DIR__ . '/../views/landing.php';
    }
}
?>
