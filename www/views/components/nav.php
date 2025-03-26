<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Home</a>
        <div class="d-flex">
            <?php if (!isset($_SESSION['user'])): ?>
                <a href="/login" class="nav-link me-4">Login</a>
                <a href="/register" class="nav-link">Register</a>
            <?php else: ?>
                <form action="/logout" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger" type="submit">Log out</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</nav>