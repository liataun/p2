<?php
require 'Form.php';

use DWA\Form;

session_start();
$form = new Form($_GET);

//Run validations
//Pick correct set based on Select element
if ($form->isSubmitted()) {
    if ($form->get('authorType') == 'organization') {
        $errors = $form->validate(
            [
                'authorType' => 'required',
                'authorLast' => 'required',
                'authorInitials' => 'maxLength:0',
                'year' => 'required|digit|minLength:4|maxLength:4',
                'city' => 'required',
                'publisher' => 'required',
                'userEmail' => 'required|email',
            ]
        );
    } else {
        $errors = $form->validate(
            [
                'authorType' => 'required',
                'authorLast' => 'required',
                'authorInitials' => 'required',
                'year' => 'required|digit|minLength:4|maxLength:4',
                'city' => 'required',
                'publisher' => 'required',
                'userEmail' => 'required|email',
            ]
        );
    }
}

//setup values submitted by user to return to our index page
$authorType = $form->get('authorType') ?? null;
$authorLast = $form->get('authorLast') ?? null;
$authorInitials = $form->get('authorInitials') ?? null;
$title = $form->get('title') ?? null;
$year = $form->get('year') ?? null;
$city = $form->get('city') ?? null;
$publisher = $form->get('publisher') ?? null;
$intext = $form->get('intext') ?? null;
$userEmail = $form->get('userEmail') ?? null;

//compose our result citation string
if (!$form->hasErrors) {
    //Would like to avoid inserting the html here in the logic.
    //Not sure how currently. Consider for future refactoring.
    $citation = '<p class=\'text-success\'>' . $authorLast;
    if ($authorType == 'single') {
        $citation .= ', ' . $authorInitials . ' ';
    } else {
        $citation .= '. ';
    }
    $citation .= '(' . $year . "). <span id='italics2'>" . $title . '.</span> ' . $city . ': ' . $publisher . '.';

    if ($intext) {
        $citation .= '</p><p>' . $authorLast . ' (' . $year . ')';
    }
    $citation .= '</p>';
}

//Store results in the session
$_SESSION['results'] = [
    'errors' => $errors,
    'hasErrors' => $form->hasErrors,
    'citation' => $citation,
    'authorType' => $authorType,
    'authorLast' => $authorLast,
    'authorInitials' => $authorInitials,
    'title' => $title,
    'year' => $year,
    'city' => $city,
    'publisher' => $publisher,
    'intext' => $intext,
    'userEmail' => $userEmail,
];

//Redirect back form
header('Location: index.php');