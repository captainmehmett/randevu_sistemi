<?php
class Auth {
    private $db;
    private $conn;

    public function __construct($db) {
        $this->db = $db;
        $this->conn = $db->connect();
    }

    public function login($tc_no, $password) {
        try {
            $query = "SELECT id, password FROM users WHERE tc_no = :tc_no";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":tc_no", $tc_no);
            $stmt->execute();

            if($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if(password_verify($password, $row['password'])) {
                    $_SESSION['user_id'] = $row['id'];
                    return true;
                }
            }
            return false;
        } catch(PDOException $e) {
            return false;
        }
    }

    public function register($data) {
        try {
            $query = "INSERT INTO users (tc_no, first_name, last_name, password, gender, birth_date) 
                     VALUES (:tc_no, :first_name, :last_name, :password, :gender, :birth_date)";
            
            $stmt = $this->conn->prepare($query);
            
            // Şifreyi hashle
            $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
            
            $stmt->bindParam(":tc_no", $data['tc_no']);
            $stmt->bindParam(":first_name", $data['first_name']);
            $stmt->bindParam(":last_name", $data['last_name']);
            $stmt->bindParam(":password", $hashed_password);
            $stmt->bindParam(":gender", $data['gender']);
            $stmt->bindParam(":birth_date", $data['birth_date']);

            return $stmt->execute();
        } catch(PDOException $e) {
            return false;
        }
    }
}