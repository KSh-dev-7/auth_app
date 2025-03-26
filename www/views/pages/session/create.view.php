<!doctype html>
<html lang="en">
<?php view("components/head.php"); ?>
<body>
<?php view("components/nav.php"); ?>
<div class="container">
    <h1 class="mt-3"><?= $header ?></h1>
    <form action="/login" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email">
            <?php if(hasValidationError("email")): ?>
                <small class="text-danger">
                    <?= getValidationError("email") ?>
                </small>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <?php if(hasValidationError("password")): ?>
                <small class="text-danger">
                    <?= getValidationError("password") ?>
                </small>
            <?php endif; ?>
        </div>
        <?php if(hasValidationError("login")): ?>
            <p class="text-danger">
                <?= getValidationError("login") ?>
            </p>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Log in</button>
    </form>
</div>
</body>
</html>