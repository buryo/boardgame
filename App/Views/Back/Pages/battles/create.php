<?php require_once __DIR__ . '/../../partials/header.php' ?>
<?php require_once __DIR__ . '/../../partials/nav.php' ?>

<div id="main">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h2>Battle starten</h2>
            </div>

            <div class="col text-right">
                <a href="/battles" class="btn btn-outline-primary">Battles</a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method='post' action='/battles/create'>
                            <div class="form-group">
                                <label for="gameName">Game</label>
                                <input type="hidden" name="gameId" value="<?php echo($game['id']); ?>">
                                <input type='text' class="form-control" id="game" name="type"
                                       value='<?php echo($game['name']); ?>' disabled>
                            </div>

                            <!-- Players -->
                            <div class="row form-group">
                                <div class="col">
                                    <label for="speler1">Speler 1</label>
                                    <select class="form-control" name="player1" required>
                                        <?php foreach ($players as $player) { ?>
                                            <option value="<?php echo($player['id']); ?>"><?php echo($player['nickname']); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="speler2">Speler 2</label>
                                    <select class="form-control" name="player2" required>
                                        <?php foreach ($players as $player) { ?>
                                            <option value="<?php echo($player['id']); ?>"><?php echo($player['nickname']); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="speler3">Speler 3</label>
                                    <select class="form-control" name="player3" required>
                                        <?php foreach ($players as $player) { ?>
                                            <option value="<?php echo($player['id']); ?>"><?php echo($player['nickname']); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="speler4">Speler 4</label>
                                    <select class="form-control" name="player4" required>
                                        <?php foreach ($players as $player) { ?>
                                            <option value="<?php echo($player['id']); ?>"><?php echo($player['nickname']); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!-- end players-->

                            <!--        Scores      -->
                            <div class="row form-group">
                                <div class="col">
                                    <label for="speler4">Punten</label>
                                    <input type="text" class="form-control" name="player1Point">
                                </div>
                                <div class="col">
                                    <label for="speler4">Punten</label>
                                    <input type="text" class="form-control" name="player2Point">
                                </div>
                                <div class="col">
                                    <label for="speler4">Punten</label>
                                    <input type="text" class="form-control" name="player3Point">
                                </div>
                                <div class="col">
                                    <label for="speler4">Punten</label>
                                    <input type="text" class="form-control" name="player4Point">
                                </div>
                            </div>
                            <!-- end scores-->

                            <div class="form-group row">
                                <div class="col ">
                                    <button type="submit" class="btn btn-success float-right">Battle starten!</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../../partials/footer.php' ?>
