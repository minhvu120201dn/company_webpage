<?php
function connect_to_database() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "company";
    return new mysqli($servername, $username, $password, $db_name);
}

function all_requirements_are_set($requirements) {
    foreach ($requirements as $requirement) {
        if (!isset($_POST[$requirement])) {
            return false;
        }
    }
    return true;
}
?>