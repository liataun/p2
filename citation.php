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
    }
    else {
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
    $citation = '<h1>It worked</h1>';
    if ($form->get('intext')) {
        $citation .= '<p>in text citation here</p>';
    }
}

//Store results in the session
$_SESSION['results'] = [
    'errors' => $errors,
    'hasErrors' => $form->hasErrors,
    'citation' => $citation,
    'authorType' => $form->get('authorType') ?? null,
    'authorLast' => $form->get('authorLast') ?? null,
    'authorInitials' => $form->get('authorInitials') ?? null,
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