<?php
require_once("database.php");
class user {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function register($username, $nama, $email, $no_hp, $password) {

        // Contoh: Anda dapat menyimpan data pengguna ke dalam tabel 'users'
        $query = "INSERT INTO users (username, name, email, phone_number, password, group_id) 
        VALUES ('$username', '$nama', '$email', '$no_hp', '$password', 3)";
        $stmt = $this->db->connection->prepare($query);

        if ($stmt->execute()) {
            header('location: login.php');
        } else {
            return false;
        }
    }
    public function login($email, $password) {
        $email = $_POST['email'];
        $password = $_POST['pass'];
        // Contoh: Anda dapat mengambil data pengguna dari tabel 'users' berdasarkan username
        $query = "SELECT * FROM users WHERE email = '$email'";
        $stmt = $this->db->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result(); 
        if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Login berhasil, simpan informasi pengguna dalam sesi
        $_SESSION['username'] = $row['username'];
        header('Location: dashboard.php'); // Redirect ke halaman dashboard
        exit();
    }
}

        // Login gagal
        return false;
    }

    public function isLoggedIn() {
        return isset($_SESSION['username']);

    }

    public function logout() {
        session_destroy();
    }

    // Anda dapat menambahkan metode lain seperti cek status login, dsb.
}
?>