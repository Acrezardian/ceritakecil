
<?php
// Konfigurasi koneksi database
$servername = "localhost"; // Ganti sesuai dengan nama server Anda
$username = "root"; // Ganti sesuai dengan username database Anda
$password = ""; // Ganti sesuai dengan password database Anda
$dbname = "ceritakecil"; // Nama database

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Menyiapkan query untuk menyimpan data
    $sql = "INSERT INTO pengguna (username, email, password) VALUES ('$username', '$email', '$password')";

    // Menjalankan query dan memeriksa apakah berhasil disimpan
    if ($conn->query($sql) === TRUE) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
