<?php
require_once __DIR__ . '/incs/header.tpl.php';
?>
    <div class="container mt-5 col-md-6 offset-md-3">
        <div class="row">
            <div>
                <?php if (isset($_SESSION['errors'])) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error!
                        <?php
                        echo $_SESSION['errors'];
                        unset($_SESSION['errors']);
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Success!
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <form action="">

            <div class="form-floating">
                <input type="email" class="form-control" id="email" placeholder="example@mail.com">
                <label for="email">Email</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="password" placeholder="Password">
                <label for="password">Password</label>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Login</button>
        </form>

    </div>

<?php
require_once __DIR__ . '/incs/footer.tpl.php';
?>