<!doctype html>
<html lang="en">
<?php view("components/head.php"); ?>
<body>
<?php view("components/nav.php"); ?>
<div class="container mt-4">
    <h1>
        Hello <?= $_SESSION["user"]["name"] ?? "" ?>
    </h1>
    <img class="w-25 mt-3" src="<?php echo $avatarPath ?? 'https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ='?>
        " alt="avatar">
</div>
</body>
</html>