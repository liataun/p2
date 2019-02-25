<?php
require('Form.php');

use DWA\Form;

session_start();
$form = new Form($_GET);

//Run validations

if ($form->isSubmitted()) {
    if (!$form->get('intext')) {
        $errors = $form->validate(
            [
                'authorType' => 'required',
                'authorLast' => 'required',
                'year' => 'required|digit|minLength:4|maxLength:4',
                'city' => 'required',
                'publisher' => 'required',
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
            ]
        );
    }
}

if (!$form->hasErrors) {
    $authorType = $form->get('authorType') ?? null;
    $authorLast = $form->get('authorLast') ?? null;
    $authorInitials = $form->get('authorInitials') ?? null;
    $year = $form->get('year') ?? null;
    $title = $form->get('title') ?? null;
    $city = $form->get('city') ?? null;
    $publisher = $form->get('publisher') ?? null;

    $citation = '<p class=\'text-success\'>'.$authorLast;
    if ($authorType = 'single') {
        $citation .= ', ' . $authorInitials;
    }
    $citation .= '('.$year.") . <span id='italics'>".$title.'.</span> '.$city.': '.$publisher.'.';

    if ($form->get('intext')) {
        $citation .= '</p><p>'.$authorLast.' ('.$year.')';
    }
    $citation .= '</p>';
}

//Store results in the session
$_SESSION['results'] = [
    'errors' => $errors,
    'hasErrors' => $form->hasErrors,
    'citation' => $citation,
    'authorType' => $form->get('authorType') ?? null,
    'authorLast' => $form->get('authorLast') ?? null,
    'authorInitials' => $form->get('authorInitials') ?? null,
    'title' => $form->get('title') ?? null,
    'year' => $form->get('year') ?? null,
    'city' => $form->get('city') ?? null,
    'publisher' => $form->get('publisher') ?? null,
    'intext' => $form->get('intext') ?? null,
];

//Redirect back form
header('Location: index.php');

/*
#tertiary operator
$action = (!isset($_POST['action'])) ? 'default' : $_POST['action'];
$prefix = ($total > 0) ? '+' : '-';


#Null Coalescing Operator
$action = $_POST['action'] ?? 'default';

#or for display file
<input type='text' name='searchTerm' value='<?= $searchTerm ?? '' ?>'>

*/