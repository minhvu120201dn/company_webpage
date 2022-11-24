<header>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="?page=home" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap" ></use></svg> -->
            <img src="https://seeklogo.com/images/B/business-company-logo-C561B48365-seeklogo.com.png" height="55px"></img>
            <span class="fs-4">Example company web page</span>
        </a>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?page=home">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Products
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="?page=products">All</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="?page=products&category=medicine">Medicine</a></li>
                                <li><a class="dropdown-item" href="?page=products&category=technology">Technology</a></li>
                                <li><a class="dropdown-item" href="?page=products&category=clothes">Clothes</a></li>
                            </ul>
                        </li>
                    <?php
                    if (isset($_SESSION["email"])) {?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"><?php echo $_SESSION["first_name"]." ".$_SESSION["middle_name"]." ".$_SESSION["last_name"];?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?page=logout">Logout</a>
                        </li>
                    <?php }
                    else {?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?page=login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?page=register">Register</a>
                        </li>
                    </ul>
                    <?php }?>
                </div>
            </div>
        </nav>
        </header>
    </div>
</header>