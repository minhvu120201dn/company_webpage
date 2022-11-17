<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "company";
$conn = new mysqli($servername, $username, $password, $db_name);

if (isset($_POST["first-name"]) &&isset($_POST["middle-name"]) && isset($_POST["last-name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm-password"])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function secured_password($password) {
        if (strlen($password) < 8) return false;
        $contain_letter = false;
        $contain_digit = false;
        foreach (str_split($password) as $char) {
            if (is_numeric($char)) $contain_digit = true;
            else $contain_letter = true;
        }
        return $contain_letter && $contain_digit;
    }
}
$first_name = validate($_POST["first-name"]);
$middle_name = validate($_POST["middle-name"]);
$last_name = validate($_POST["last-name"]);
$email = validate($_POST["email"]);
$password = validate($_POST["password"]);
$confirm_password = validate($_POST["confirm-password"]);

if (empty($first_name)) {
    header("Location: ../index.php?page=register&error=First name is required");
    exit();
}
else if (empty($last_name)) {
    header("Location: ../index.php?page=register&error=Last name is required");
    exit();
}
else if (empty($email)) {
    header("Location: ../index.php?page=register&error=Email is required");
    exit();
}
else if (empty($password)) {
    header("Location: ../index.php?page=register&error=Password is required");
    exit();
}
else if (!secured_password($password)) {
    header("Location: ../index.php?page=register&error=Password is not secured enough. Your password must have at least 8 characters, and there must be at least one letter and one digit");
    exit();
}
else if ($password != $confirm_password) {
    header("Location: ../index.php?page=register&error=Password does not match");
    exit();
}

$sql = "INSERT INTO clients (first_name, middle_name, last_name, email, password) VALUES ('$first_name', '$middle_name', '$last_name', '$email', '$password')";
if(!mysqli_query($conn, $sql)) {
    header("Location: ../index.php?page=register&error=This email address has already been used");
    exit();
}
else {
    $_SESSION["first_name"] = $first_name;
    $_SESSION["middle_name"] = $middle_name;
    $_SESSION["last_name"] = $last_name;
    $_SESSION["email"] = $email;
    header("Location: ../index.php");
    exit();
}
?>