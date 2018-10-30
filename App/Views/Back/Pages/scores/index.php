
<?php require_once __DIR__ . '/../../partials/header.php' ?>
<?php require_once __DIR__ . '/../../partials/nav.php' ?>
<?php use Carbon\Carbon; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1 table-responsive">
            <h4>Gespeelde spellen</h4>
            <?php if (!empty($scores)): ?>
            <table class="table table-responsive table-hover">
                <tr>
                    <th>#</th>
                    <th>Speldatum</th>
                    <th>Spelnaam</th>
                    <th>Winnaar</th>
                    <th>Totale score</th>
                </tr>

                <tbody>
                <?php $i = 1; foreach ($scores as $score) { ?>
                    <tr>
                        <th><?php echo $i++ ?></th>
                        <td><?php echo $score['name']; ?></td>
                        <td><?php echo Carbon::parse($score['dtPlayed'])->toFormattedDateString(); ?></td>
                        <td><?php echo ucfirst($score['nickname']); ?></td>
                        <td><?php echo $score['totalScore']; ?></td>
                    </tr>
                <?php } ?>
                <?php else: ?>
                    <p>Er zijn nog geen spellen gespeeld</p>
                <?php endif ?>
                </tbody>
            </table>
        </div>
    </div> <!-- End container -->
<br>
    <div class="row">
        <div class="col-10 offset-1 table-responsive">
            <h4>Meest gespeelde spellen</h4>
            <?php if (!empty($games)): ?>
            <table class="table table-responsive table-hover">
                <tr>
                    <th>#</th>
                    <th>Spelnaam</th>
                    <th>Aantal keer gespeeld</th>
                </tr>

                <tbody>
                <?php $i = 1; foreach ($games as $game) { ?>
                    <tr>
                        <th><?php echo $i++ ?></th>
                        <td><?php echo $game['name']; ?></td>
                        <td><?php echo $game['count']; ?></td>
                    </tr>
                <?php } ?>
                <?php else: ?>
                    <p>Er zijn nog geen spellen gespeeld</p>
                <?php endif ?>
                </tbody>
            </table>
        </div>
    </div> <!-- End container -->
</div>

<?php require_once __DIR__ . '/../../partials/footer.php' ?>
