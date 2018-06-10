<?php

if($_POST['Sprache'] == "Deutsch" || $_SESSION['sprache'] == "Deutsch" ) {
include_once '../language/german.php';
$_SESSION['sprache'] = "Deutsch";
}elseif ($_POST['Sprache'] == "English" || $_SESSION['sprache'] == "English") {
    $_SESSION['sprache'] = "English";
    include_once '../language/english.php';
}

