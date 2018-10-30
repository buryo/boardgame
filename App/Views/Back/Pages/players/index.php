
<?php require_once __DIR__ . '/../../partials/header.php' ?>
<?php require_once __DIR__ . '/../../partials/nav.php' ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1 table-responsive">
            <h4>Spelers</h4>
            <?php if (!empty($players)): ?>
            <table class="table table-responsive table-hover">
                <tr>
                    <th>#</th>
                    <th>Nickname</th>
                    <th>Email</th>
                    <th>Geregistereed</th>
                    <th>Status</th>
                    <th>Punten</th>
                </tr>

                <tbody>
                <?php $i = 1; foreach ($players as $player) { ?>
                    <tr>
                        <th><?php echo $i++ ?></th>
                        <td><?php echo(ucfirst($player['nickname'])); ?></td>
                        <td><?php echo(ucfirst($player['email'])); ?></td>
                        <td><?php echo ($player['registered'] == 1 ? "ja" : "<a href='/players/email/". $player['id'] ."'>Verstuur email</a>") ?></td>
                        <td><?php echo (($player['gamestatus'] == 1 ? "beschikbaar" : "aan het spelen")) ?></td>
                        <td><?php echo(ucfirst($player['points'])); ?></td>
                    </tr>
                <?php } ?>
                <?php else: ?>
                    <p>Er zijn nog geen spelers</p>
                <?php endif ?>
                </tbody>
            </table>
        </div>
    </div> <!-- End container -->

<?php require_once __DIR__ . '/../../partials/footer.php' ?>
