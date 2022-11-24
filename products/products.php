<?php
if ($_SESSION["is_admin"] && isset($_GET["add_product"])) {
    include "add_product.php";
}
else {
    include "show_products.php";
}
?>