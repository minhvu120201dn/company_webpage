<main class="container-sm p-5 my-5 border form-signin">
    <form action="register/register_processing.php" method="post">
        <h2 class="text-primary">Register</h1>
        <div class="row g-3 mb-3">
            <div class="col">
                <label class="form-label">First name <label style="color:red">*</label></label>
                <input type="text" class="form-control" name="first-name">
            </div>
            <div class="col">
                <label class="form-label">Middle name</label>
                <input type="text" class="form-control" name="middle-name">
            </div>
            <div class="col">
                <label class="form-label">Last name <label style="color:red">*</label></label>
                <input type="text" class="form-control" name="last-name">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Email address <label style="color:red">*</label></label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password <label style="color:red">*</label></label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm password <label style="color:red">*</label></label>
            <input type="password" class="form-control" name="confirm-password">
        </div>
        <?php
        if (isset($_GET["error"])) {
            ?><p class="error-submit" style="color:red;"><?php echo $_GET["error"];?></p><?php
        }
        ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>