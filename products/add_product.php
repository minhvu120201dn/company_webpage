<main class="container-sm p-5 my-5 border">
    <form action="products/add_product_processing.php" method="post" enctype="multipart/form-data">
        <h2 class="text-primary">Product</h1>
        <div class="mb-3">
            <label class="form-label">Name <label style="color:red">*</label></label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label class="form-label">Brand <label style="color:red">*</label></label>
                <input type="text" class="form-control" name="brand">
            </div>
            <div class="col">
                <label class="form-label">Category <label style="color:red">*</label></label>
                <select class="form-select" name="category">
                    <option selected></option>
                    <option value="Medicine">Medicine</option>
                    <option value="Technology">Technology</option>
                    <option value="Clothes">Clothes</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5"></textarea>
        </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label class="form-label">Price <label style="color:red">*</label></label>
                <div class="input-group">
                    <div class="input-group-text">$</div>
                    <input type="number" step="0.01" class="form-control" name="price">
                </div>
            </div>
            <div class="col">
                <label class="form-label">Quantity <label style="color:red">*</label></label>
                <input type="number" step="1" class="form-control" name="quantity">
            </div>
        </div>
        <?php
        if (isset($_GET["error"])) {
            ?><p class="error-submit" style="color:red;"><?php echo $_GET["error"];?></p><?php
        }
        ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>