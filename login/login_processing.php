<?php
session_start();
include "../utils.php";

$conn = connect_to_database();

$requirements = ["email", "password"];
if (all_requirements_are_set($requirements)) {
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

$sql = "SELECT * FROM users WHERE Email='$email'/* AND Password='$password'*/";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) { // Successfully logged in
    $row = mysqli_fetch_assoc($result);

    $password_hash = $row["password"];
    if (!password_verify($password, $password_hash)) {
        header("Location: ../index.php?page=login&error=Your email and password do not match");
        exit();
    }

    $_SESSION["first_name"] = $row["first_name"];
    $_SESSION["middle_name"] = $row["middle_name"];
    $_SESSION["last_name"] = $row["last_name"];
    $_SESSION["is_admin"] = $row["is_admin"];
    $_SESSION["email"] = $row["email"];

    header("Location: ../index.php");
    setcookie("email", $email, time()+60*60*24*30);
    setcookie("password", $password, time()+60*60*24*30);
    exit();
}
else {
    header("Location: ../index.php?page=login&error=Your email and password do not match");
    exit();
}
?>