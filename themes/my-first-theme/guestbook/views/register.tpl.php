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


        </div>
    </div>

    <form method="post">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" id="name" placeholder="name"
                   value="<?= old('name') ?>">
            <label for="name">Name</label>
        </div>

        <div class="form-floating">
            <input type="email" class="form-control" name="email" id="email" placeholder="example@mail.com"
                   value="<?= old('email') ?>">
            <label for="email">Email</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <label for="password">Password</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Register</button>
    </form>

</div>

<?php
require_once __DIR__ . '/incs/footer.tpl.php';
?>