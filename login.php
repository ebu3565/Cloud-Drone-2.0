<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}
?>

<?php
session_start();
include 'db_connect.php'; // Your DB connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_number'] = $user['phone'];

        header("Location: index.php");
    } else {
        echo "Invalid login!";
    }
}
?>
