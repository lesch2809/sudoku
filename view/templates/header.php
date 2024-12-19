<header>
    <nav>
        <a class="nav-left" href="home">Home</a>
        <a class="nav-left" href="solver">Solver</a>
        <a class="nav-left" href="generate">Generate</a>
        <?php if (isset($_SESSION["log_in_user"])) : ?>
            <a class="nav-left" href="logout">Logout</a>
        <?php endif ?>
    </nav>
</header>