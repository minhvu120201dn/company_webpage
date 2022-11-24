<?php
session_start();
include "../utils.php";

$conn = connect_to_database();

$requirements = ["name", "brand", "category", "description", "price", "quantity"];
if (all_requirements_are_set($requirements)) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
$name = validate($_POST["name"]);
$brand = validate($_POST["brand"]);
$category = validate($_POST["category"]);
// $image = $_FILES["image"]["name"];
$description = validate($_POST["description"]);
$price = validate($_POST["price"]);
$quantity = validate($_POST["quantity"]);

if (empty($name)) {
    header("Location: ../index.php?page=products&add_product&error=Name is required");
    exit();
}
else if (empty($brand)) {
    header("Location: ../index.php?page=products&add_product&&error=Brand is required");
    exit();
}
else if (empty($category)) {
    header("Location: ../index.php?page=products&add_product&&error=Category is required");
    exit();
}
else if (empty($price)) {
    header("Location: ../index.php?page=products&add_product&&error=Price is required");
    exit();
}
else if (empty($quantity)) {
    header("Location: ../index.php?page=products&add_product&&error=Quantity is required");
    exit();
}

if (isset($_FILES["image"])) {
    $img_file = $_FILES["image"];

    // File properties
    $file_name = $img_file["name"];
    $file_tmp = $img_file["tmp_name"];
    $file_size = $img_file["size"];
    $file_error = $img_file["error"];

    // Work out the file extension
    $file_ext = explode(".", $file_name);
    $file_ext = strtolower(end($file_ext));
    
    $allowed = array("jpg", "jpeg", "png");

    if (in_array($file_ext, $allowed)) {
        if ($file_error === 0) {
            if ($file_size <= 2097152) {
                $file_name_new = uniqid('', true).'.'.$file_ext;
                $imgfile_destination = "uploads/".$file_name_new;

                if (!move_uploaded_file($file_tmp, "../".$imgfile_destination)) {
                    // unset($imgfile_destination);
                    header("Location: ../index.php?page=products&add_product&&error=File upload failed ".$imgfile_destination);
                    exit();
                }
            }
        }
    }
    else {
        header("Location: ../index.php?page=products&add_product&&error=Only JPG, JPEG and PNG files are allowed");
        exit();
    }
}
else {
    header("Location: ../index.php?page=products&add_product&&error=Image is required");
    exit();
}

$name = "'".$name."'";
$brand = "'".$brand."'";
$category = "'".$category."'";
$description = "'".$description."'";
if (isset($imgfile_destination)) {
    $imgfile_destination = "'".$imgfile_destination."'";
}
else {
    $imgfile_destination = "NULL";
}

$sql = "INSERT INTO products(name, category, brand, img, description, price, quantity) VALUES ($name, $category, $brand, $imgfile_destination, $description, $price, $quantity)";

if (!mysqli_query($conn, $sql)) {
    header("Location: ../index.php?page=products&add_product&&error=".$sql.$conn->error);
    exit();
}
else {
    header("Location: ../index.php");
    exit();
}
?>