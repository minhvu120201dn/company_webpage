<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <?php
            if ($_SESSION["is_admin"]) {?>
                <a type="button" class="btn btn-info" href="?page=products&add_product">+Add</a>
            <?php }
            ?>
        </div>
        <div class="col-sm-6">
            <form class="d-flex" action="products/search_products_processing.php" method="get">
                <input class="form-control me-2" type="search" placeholder="<?php if (isset($_GET["search-name"])) echo $_GET["search-name"]; ?>" aria-label="Search" name="search-name">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            include "utils.php";
            $conn = connect_to_database();
            if (!isset($_GET["category"]) && !isset($_GET["search-name"])) {
                $sql = "SELECT * FROM products";
            }
            else if (isset($_GET["category"]) && isset($_GET["search-name"])) {
                $category = $_GET["category"];
                $name = $_GET["search-name"];
                $sql = "SELECT * FROM products WHERE category = '$category' AND name LIKE '$name'";
            }
            else if (isset($_GET["category"]) && !isset($_GET["search-name"])) {
                $category = $_GET["category"];
                $sql = "SELECT * FROM products WHERE category = '$category'";
            }
            else {
                $name = $_GET["search-name"];
                $sql = "SELECT * FROM products WHERE name LIKE '%$name%'";
            }

            $products = mysqli_query($conn, $sql);
            foreach ($products as $product) {?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="<?php echo $product["img"] ?>" width="100%" height="100%"></img>
                        <div class="card-body">
                            <p class="card-text">                                    
                                <b><?php echo $product["name"] ?></b></br>
                                <i><?php echo $product["brand"] ?></i></br>
                                <?php echo $product["description"] ?>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <?php
                                    if ($_SESSION["is_admin"]) {?>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
</div>