<?php

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function findByUsername($username) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getIdbyUsername($username){
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE username = :username");
        $stmt->bindParam(':username',$username);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Periksa jika data ditemukan
        if ($row) {
            return $row['id'];
        } else {
            return null; // atau atur nilai default jika tidak ditemukan
        }
    }

    public function findByEmail($email){
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($username, $password, $role,$email) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password, role) 
        VALUES (:username,:email, :password, :role)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':role', $role);
        return $stmt->execute();
    }

    public function getAllUsers() {
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteUserAndProfile($userId){
        $this->pdo->beginTransaction(); // Memulai transaksi

        try {
            // Menghapus data dari tabel 'profile' terlebih dahulu
            $stmtProfile = $this->pdo->prepare("DELETE FROM profile WHERE user_id = :user_id");
            $stmtProfile->bindParam(':user_id', $userId);
            $stmtProfile->execute();
            // Menghapus foto profil jika ada
            // if (!empty($profile['photo'])) {
            //     $filePath = __DIR__ . '/../../public/uploads/profile_photos/' . $profile['photo'];
            //     if (file_exists($filePath)) {
            //     unlink($filePath); // Menghapus file foto dari server
            //     }
            // }

            // Menghapus data dari tabel 'users'
            $stmtUser = $this->pdo->prepare("DELETE FROM users WHERE id = :user_id");
            $stmtUser->bindParam(':user_id', $userId);
            $stmtUser->execute();

            $this->pdo->commit(); // Commit transaksi jika berhasil
            return true; // Penghapusan berhasil
        } catch (Exception $e) {
            $this->pdo->rollBack(); // Rollback transaksi jika terjadi error
            return false; // Penghapusan gagal
        }

        
    }
}
?>
