<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Company page</title>        
        <!--Bootstrap CSS--><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet">
    </head>
    <body>
        <?php
        session_start();
        include "header.php";
        if (isset($_GET["page"])) {
            include $_GET["page"]."/".$_GET["page"].".php";
        }
        else {
            include "home/home.php";
        }
        ?>
        <footer>
            <div class="row p-5 my-5 bg-primary text-white text-center">
            </div>
        </footer>
        <!--Bootstrap Bundle with Popper--><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>