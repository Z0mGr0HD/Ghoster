<?php

if($_POST['Sprache'] == "German" || $_SESSION['sprache'] == "German" ) {
include_once '../language/german.php';
$_SESSION['sprache'] = "German";
}elseif ($_POST['Sprache'] == "English" || $_SESSION['sprache'] == "English") {
    $_SESSION['sprache'] = "English";
    include_once '../language/english.php';
}

