<main class="container-sm p-5 my-5 border form-signin">
    <form action="login/login_processing.php" method="post">
        <h2 class="text-primary">Sign in</h1>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <?php
        if (isset($_GET["error"])) {
            ?><p class="error-submit" style="color:red;"><?php echo $_GET["error"];?></p><?php
        }
        ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>