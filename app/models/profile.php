<?
class Profile{
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function create($user_id){
        $stmt = $this->pdo->prepare("INSERT INTO profile(user_id) VALUES (:user_id)");
        $stmt->bindParam(':user_id', $user_id);
        return $stmt->execute();
    }

    public function updateProfile($user_id, $name, $umur, $gender, $alamat, $riwayat_pendidikan, $riwayat_pekerjaan, $deskripsi, $photoName) {
        // Cek apakah photoName tidak kosong, jika kosong jangan update kolom photo
        $query = "UPDATE profile SET 
                    name = :name,
                    umur = :umur,
                    gender = :gender,
                    alamat = :alamat,
                    riwayat_pendidikan = :riwayat_pendidikan,
                    riwayat_pekerjaan = :riwayat_pekerjaan,
                    deskripsi = :deskripsi";
    
        if ($photoName !== null) {
            $query .= ", photo = :photo";
        }
        $query .= " WHERE user_id = :user_id";
    
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':umur', $umur);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':riwayat_pendidikan', $riwayat_pendidikan);
        $stmt->bindParam(':riwayat_pekerjaan', $riwayat_pekerjaan);
        $stmt->bindParam(':deskripsi', $deskripsi);
    
        if ($photoName !== null) {
            $stmt->bindParam(':photo', $photoName);
        }
        $stmt->bindParam(':user_id', $user_id);
    
        return $stmt->execute();
    }
    

    public function getProfileByUserId($userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM profile WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function getProfileByUsername($username) {
        $stmt = $this->pdo->prepare("SELECT * FROM profile WHERE name = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePhoto($user_id, $photo) {
        $stmt = $this->pdo->prepare("UPDATE profile SET photo = :photo WHERE user_id = :user_id");
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':user_id', $user_id);
        return $stmt->execute();
    }
    
    
}