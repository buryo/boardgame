<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css"
      integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
<link rel="stylesheet" href="/css/style.css">

<div class="container">
    <p>Leuk dat je je hebt aangemeld, vul hier je gegevens in om je account compleet te maken</p>

    <form action="/players/email" method="post">
        <input type="hidden" value="<?= $player['id'] ?>">
        <input type="text" class="form-control col-md-3" name="nickname" value="<?= $player['nickname']?>" readonly><br>
        <input type="text" class="form-control col-md-3" name="email" value="<?= $player['email']?>" readonly><br>
        <input type="text" class="form-control col-md-3" name="fname" placeholder="first name"><br>
        <input type="text" class="form-control col-md-3" name="lname" placeholder="last name"><br>
        <input type="text" class="form-control col-md-3" name="birthday" placeholder="geboortedatum"><br>
        <button type="submit" class="btn btn-outline-primary mb-2">Verstuur</button>
    </form>
</div>