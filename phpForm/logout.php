<?php
session_start();

// Hapus sesi
session_unset();
session_destroy();

header('Location: login.php'); // Redirect ke halaman login setelah logout
exit();
?>
