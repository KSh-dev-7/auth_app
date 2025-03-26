<!doctype html>
<html lang="en">
<?php view("components/head.php"); ?>
<body>
<?php view("components/nav.php"); ?>
<div class="container">
    <h1 class="mt-3"><?= $header ?></h1>
    <form action="/register" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= old('name')?>">
            <?php if(hasValidationError("name")): ?>
                <small class="text-danger">
                    <?= getValidationError("name") ?>
                </small>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= old('email')?>">
            <?php if(hasValidationError("email")): ?>
                <small class="text-danger">
                    <?= getValidationError("email") ?>
                </small>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Avatar</label>
            <input type="file" class="form-control" id="avatar" name="avatar">
            <?php if(hasValidationError("avatar")): ?>
                <small class="text-danger">
                    <?= getValidationError("avatar") ?>
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
        <div class="mb-3">
            <label for="password_confirm" class="form-label">Password confirmation</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>