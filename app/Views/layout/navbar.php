<nav class="navbar navbar-expand-xl bg-primary" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="/">Sistem Penyimpanan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto"> <!-- Add ms-auto to align items to the right -->

                <li class="nav-item">
                    <?php $isLoggedIn = session()->get('username'); ?>
                    <?= $isLoggedIn ? '<a class="btn btn-danger" href="/logout">Sign Out</a>' : '<a class="btn btn-success" href="/login">Login</a>'; ?>
                </li>

            </ul>
        </div>
    </div>
</nav>