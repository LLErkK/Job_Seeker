<?
class Histori{

    private $pdo;
    public function __construct($pdo){
        $this->pdo = $pdo;

    }

    public function getAllHistory() {
        try {
            $query = "SELECT * FROM histori";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle exception or log it
            error_log('Database error: ' . $e->getMessage());
            return [];
        }
    }
    

    public function createHistory($nama_perusahaan, $action ,$judul) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO histori (nama_perusahaan, action,judul) VALUES (:nama_perusahaan, :action, :judul)");
            $stmt->bindParam(':nama_perusahaan', $nama_perusahaan);
            $stmt->bindParam(':action', $action);
            $stmt->bindParam(':judul',$judul);
    
            if ($stmt->execute()) {
                return true; // Successfully inserted
            } else {
                return false; // Insert failed
            }
        } catch (PDOException $e) {
            // Log the error or handle it in a way that's appropriate for your application
            error_log('Database error: ' . $e->getMessage());
            return false; // Return false on error
        }
    }
    
}