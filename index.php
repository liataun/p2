<?php
require 'helpers.php';
require 'Form.php';
require 'logic.php';
?>

<!doctype html>
<html lang='en'>
<head>
    <title>Citation Crafting Configurator</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <!-- Trying out Boostrap. -->
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'
          rel='stylesheet'
          integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T'
          crossorigin='anonymous'>
    <link href='styles/looks.css' rel='stylesheet'>
</head>

<body class='p-5'>
<h1>APA References</h1>
<p>
    This site attempts to use the information you provide to create an APA style reference entry.
    Features are limited to single authors and organizations with all information available. Books
    published before 1000 A.D. will not be accepted.
</p>
<?= sanitize($notSet = "<h1>this is html sanitized</h1>") ?>
<h3>Book Citation Form</h3>
<form method='get' action='citation.php'>

    <div class="form-group">
        <label for='authorType'>Author Type</label>
        <select class='form-control' name='authorType'>
            <option value='single'>Single Author</option>
            <option value='organization'>Organization As Author</option>
        </select>
    </div>

    <div class="form-group">
        <label for='authorLast'>Enter author last name or organization name.</label>
        <input type=text' class='form-control' name='authorLast' value='<?= sanitize($authorLast ?? 'John') ?>'>
    </div>

    <div class="form-group">
        <label for='authorInitials' id='authorInitialsLabel'>Enter author initials.</label>
        <input type=text' class='form-control' aria-describedby='authorInitialsLabel authorInitialsInfo'
               name='authorInitials' value='<?= sanitize($authorInitials ?? 'Snow') ?>'>
        <small class='form-text text-muted' id='authorInitialsInfo'>
            Required, unless Author Type is 'Organization As Author'.
        </small>
    </div>

    <div class="form-group">
        <label for='year' id='yearLabel'>Enter year of publication.</label>
        <input type='number' class='form-control' aria-describedby='yearLabel yearInfo'
               name='year' value='<?= sanitize($year ?? 2018) ?>'>
        <small class='form-text text-muted' id='yearInfo'>Four digit year ex. 2019.</small>
    </div>

    <div class="form-group">
        <label for='city'>Enter publication city.</label>
        <input type='text' class='form-control' name='city' value='<?= sanitize($city ?? 'Winterfell') ?>'>
    </div>

    <div class="form-group">
        <label for='publisher'>Enter publisher name.</label>
        <input type='text' class='form-control' name='publisher' value='<?= sanitize($publisher ?? 'The North') ?>'>
    </div>

    <div class="form-group">
        <label for='publisher'>Include in-text citation?</label>
        <input type='checkbox' class='form-check' name='intext'
            <?php if (isset($intext) and $intext) echo 'checked' ?>>
    </div>

    <input type='submit' class='btn btn-primary' name='cite' value='Generate Citation'>
    <?php if ($hasErrors): ?>
        <div class='alert alert-danger' id='errors'>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif ?>
    <?php if ($citation): ?>
        <?= $citation ?>
    <?php endif ?>
</form>
</body>
</html>