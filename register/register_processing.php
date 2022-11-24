<?php
session_start();
include "../utils.php";

$conn = connect_to_database();

$requirements = ["first-name", "middle-name", "last-name", "email", "password", "confirm-password"];
if (all_requirements_are_set($requirements)) {
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

$is_admin = 0;
$password_hash = password_hash($password, PASSWORD_DEFAULT);
if (empty($middle_name)) {
    $sql = "INSERT INTO users (first_name, middle_name, last_name, is_admin, email, password) VALUES ('$first_name', NULL, '$last_name', $is_admin, '$email', '$password_hash')";
}
else {
    $sql = "INSERT INTO users (first_name, middle_name, last_name, is_admin, email, password) VALUES ('$first_name', '$middle_name', '$last_name', $is_admin, '$email', '$password_hash')";
}

if(!mysqli_query($conn, $sql)) {
    header("Location: ../index.php?page=register&error=This email address has already been used");
    exit();
}
else {
    $_SESSION["first_name"] = $first_name;
    $_SESSION["middle_name"] = $middle_name;
    $_SESSION["last_name"] = $last_name;
    $_SESSION["is_admin"] = $is_admin;
    $_SESSION["email"] = $email;
    header("Location: ../index.php");
    exit();
}
?>