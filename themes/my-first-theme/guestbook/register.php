<?php

require_once __DIR__ . '/incs/db.php';
/** @var PDO $db */

?>
<?php
require_once __DIR__ . '/views/incs/header.tpl.php';
?>
<div class="container mt-5 col-md-6 offset-md-3">
    <div class="row">
        <div>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Error!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
            </div>


        </div>
    </div>

    <form action="">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" placeholder="name">
            <label for="name">Name</label>
        </div>

        <div class="form-floating">
            <input type="email" class="form-control" id="email" placeholder="example@mail.com">
            <label for="email">Email</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" id="password" placeholder="Password">
            <label for="password">Password</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Register</button>
    </form>

</div>

<?php
require_once __DIR__ . '/views/incs/footer.tpl.php';
?>