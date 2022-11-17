<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "company";
$conn = new mysqli($servername, $username, $password, $db_name);

if (isset($_POST["email"]) && isset($_POST["password"])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
$email = validate($_POST["email"]);
$password = validate($_POST["password"]);

if (empty($email)) {
    header("Location: ../index.php?page=login&error=Email is required");
    exit();
}
else if (empty($password)) {
    header("Location: ../index.php?page=login&error=Password is required");
    exit();
}

$sql = "SELECT * FROM clients WHERE Email='$email' AND Password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) { // Successfully logged in
    $row = mysqli_fetch_assoc($result);
    $_SESSION["first_name"] = $row["first_name"];
    $_SESSION["middle_name"] = $row["middle_name"];
    $_SESSION["last_name"] = $row["last_name"];
    $_SESSION["email"] = $row["email"];
    header("Location: ../index.php?page=home");
    exit();
}
else {
    header("Location: ../index.php?page=login&error=Your email and password do not match");
    exit();
}
?>