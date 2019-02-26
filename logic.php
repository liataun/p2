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

/*
 * Setup variable so that we can set selected on the element on first load
 * and still retrieve user value after returning from submission
 * only allow valid selection values
*/
if (isset($authorType) and ($authorType == 'single' or $authorType == 'organization')) {
    $selected = $authorType;
} else {
    $selected = 'single';
}

session_unset();