<?php

require_once CONFIG . '/boot.php';

require INCLUDES . '/header.php';


if (check_auth()) {
    header('Location: index.php');
    exit;
}
?>

<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h1 class="text-center mb-4">Login</h1>

            <?php flash() ?>

            <div class="card shadow">
                <div class="card-body p-4">
                    <form method="post" action="do_login.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-primary">Login</button>
                            <a class="btn btn-outline-primary" href="index.php">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
