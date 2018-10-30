<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">AvdL</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo($_SERVER['REQUEST_URI'] == '/' ? 'active' : ''); ?>">
                <a class="nav-link" href="/">Home</a>
            </li>

            <li class="nav-item <?php echo($_SERVER['REQUEST_URI'] == '/games' ? 'active' : ''); ?>">
                <a class="nav-link" href="/games">Spellen</a>
            </li>

            <li class="nav-item <?php echo($_SERVER['REQUEST_URI'] == '/players' ? 'active' : ''); ?>">
                <a class="nav-link" href="/players">Spelers</a>
            </li>

            <li class="nav-item <?php echo($_SERVER['REQUEST_URI'] == '/battles' ? 'active' : ''); ?>">
                <a class="nav-link" href="/battles">Battles</a>
            </li>

            <li class="nav-item <?php echo($_SERVER['REQUEST_URI'] == '/scores' ? 'active' : ''); ?>">
                <a class="nav-link" href="/scores">Scores</a>
            </li>
        </ul>
    </div>
</nav>
<div class="row mt-4 mb-4">
    <div class="col">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-info">
                <?php echo($_SESSION['message']);
                unset($_SESSION['message']); ?>
            </div>
        <?php } ?>
    </div>
</div>

