<!doctype html>
<html lang="en">
<?php view("components/head.php"); ?>
<body>
<?php view("components/nav.php"); ?>
<div class="container">
    <h1 class="mt-3"><?= $header ?></h1>
    <?php if(isset($_SESSION['user']) ?? false): ?>
        <h2>Hello, <?= $_SESSION["user"]["name"] ?? "" ?></h2>
        <a href="/profile">Go to your profile</a>
    <?php else: ?>
        <a href="/register">Log in</a>
    <?php endif; ?>
</div>
</body>
</html>