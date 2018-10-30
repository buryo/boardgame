<?php require_once __DIR__ . '/../../partials/header.php' ?>
<?php require_once __DIR__ . '/../../partials/nav.php' ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1 table-responsive">
            <h4>Battles</h4>
            <?php if (isset($games)): ?>
            <table class="table table-responsive table-hover">
                <tr>
                    <th>#</th>
                    <th>Game</th>
                    <th>Aantal spelers</th>
                    <th>Actie</th>
                </tr>

                <tbody>
                <?php $i = 1; foreach ($games as $game) { ?>
                    <tr>
                        <th><?php echo $i++ ?></th>
                        <td><?php echo(ucfirst($game['name'])); ?></td>
                        <td><?php echo(ucfirst($game['numberOfPlayers'])); ?></td>
                        <td>
                            <button><a href="<?= ('/battles/create/' . $game['id']); ?>">Start</a></button>
                        </td>
                    </tr>
                <?php } ?>
                <?php else: ?>
                    <p>Je hebt nog geen games, wil je er één aanmaken?</p>
                    <div class="row">
                        <div class="col">
                            <a href="/games/create" class="btn btn-outline-primary">Game aanmaken</a>
                        </div>
                    </div>
                <?php endif ?>
                </tbody>
            </table>
        </div>
    </div> <!-- End container -->
    <?php require_once __DIR__ . '/../../partials/footer.php' ?>
