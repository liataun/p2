<?php
session_start();

$hasErrors = false;

/*
 * collect information needed after redirect from form submission
 * 'errors', 'hasErrors', 'citation',
 * 'authorType', 'authorLast', 'authorInitials', 'year',
 * 'city', 'publisher', 'intext'
*/
if (isset($_SESSION['results'])) {
    $results = $_SESSION['results'];
    extract($results);
}

session_unset();