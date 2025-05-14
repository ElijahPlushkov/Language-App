<?php

require CONFIG . '/boot.php';

require APPLICATION . '/includes/header.php';


?>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <?php if ($user) : ?>
                <div class="card shadow-sm mb-4">
                    <div class="card-body text-center">
                        <h1 class="card-title mb-4">Greetings, <?=htmlspecialchars($user['username'])?>!</h1>
                        <div class="d-grid gap-3 d-md-flex justify-content-md-center">
                            <a href="create_deck" class="btn btn-dark me-md-2">Decks</a>
                            <form method="post" action="do_logout.php">
                                <button type="submit" class="btn btn-primary">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>

            <?php else : ?>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Registration</h1>

                        <?php flash(); ?>

                        <form method="post" action="do_register.php">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Register</button>
                                <br>
                                <a class="btn btn-outline-primary" href="login">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>