<?php
require 'helpers.php';
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Citation Craft</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <!-- Trying out Boostrap. -->
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'
          rel='stylesheet'
          integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T'
          crossorigin='anonymous'>
    <link href='/styles/looks.css' rel='stylesheet'>
</head>

<body>
<h1>Getting this started!</h1>
<div class='container'>
    Initial idea is to create citations from inputs. We'll see if I stick with that or switch once I get further in setup.
    <?= $notSet ?>
    <form method='post' action='info.php'>
        <input type='text' name='getInfo'>
    </form>
</div>
</body>
</html>