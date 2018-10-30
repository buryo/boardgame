<?php require_once __DIR__ . '/partials/header.php' ?>
<?php require_once __DIR__ . '/partials/nav.php' ?>

    <div class="container-fluid">
    <div class="row">
    <div class="col-10 offset-1">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-3">Welkom</h1>
                <p class="lead">ADSD 2018 2019</p>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-10 offset-1">
        <h1>Voeg een speler toe</h1>
        <form method="post" action="/add_player" class="form-inline">
            <input type="text" class="form-control mb-2 mr-sm-2" name="nickname" placeholder="nickname">
            <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                </div>
                <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <button type="submit" class="btn btn-outline-primary mb-2">Submit</button>
        </form>
    </div>

    <div class="col-10 offset-1 table-responsive">
        <br>
    <h4>Gebruikers</h4>
        <br>
<?php if (!empty($players)): ?>
    <table class="table table-responsive table-hover">
    <tr>
        <th>#</th>
        <th>Naam</th>
        <th>Achternaam</th>
        <th>Email</th>
        <th>Geboortedatum</th>
        <th></th>
        <th>Actie</th>
    </tr>

    <tbody>
    <?php $i = 1;
    foreach ($players as $player) { ?>
        <tr>
            <th><?php echo $i++ ?></th>
            <td><?php echo(ucfirst($player['fname'])); ?></td>
            <td><?php echo(ucfirst($player['lname'])); ?></td>
            <td><?php echo(ucfirst($player['email'])); ?></td>
            <td><?php echo($player['birthday']); ?></td>
            <td></td>
            <td>
                <button><a href="<?= ('/players/update/' . $player['id']); ?>"><i class='fas fa-edit'></i></a></button>
                <button><a href="<?= ('/players/delete/' . $player['id']); ?>"><i class='far fa-trash-alt'></i></a>
                </button>
            </td>
        </tr>
    <?php } ?>
    <?php else: ?>
        <h4>Er zijn nog geen gebruikers!</h4>
    <?php endif ?>
    </tbody>
    </table>
    </div>
    <hr>
    <div class="col-10 offset-1">

    </div><!-- End div - class Player-->
    </div> <!-- End div row -->
    </div> <!-- End container -->

    <?php require_once __DIR__ . '/partials/footer.php' ?>