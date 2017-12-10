<?php
session_start();
function returntime()
{
    if ($_SESSION['t']['hours'] < 00) {
        $_SESSION['t']['hours'] = $_SESSION['t']['hours'] + 24;
    }
    if ($_SESSION['t']['hours'] < 10) {
        $h = "0" . $_SESSION['t']['hours'];
    } else {
        $h = $_SESSION['t']['hours'];
    }
    if ($_SESSION['t']['minutes'] < 10) {
        $m = "0" . $_SESSION['t']['minutes'];
    } else {
        $m = $_SESSION['t']['minutes'];
    }
    if ($_SESSION['t']['seconds'] < 10) {
        $s = "0" . $_SESSION['t']['seconds'];
    } else {
        $s = $_SESSION['t']['seconds'];
    }

    echo $h . ":" . $m . ":" . $s;
}

function just_time() {
    $_SESSION['t'] = getdate();
    $_SESSION['t']['hours'] = $_SESSION['t']['hours'] + $_SESSION['chas_pos'];
    $_SESSION['t']['hours'] = $_SESSION['t']['hours']%24;
    returntime();
}
if ($_POST['type'] === 'just_time') {
    just_time();
} else if ($_POST['type'] === 'plus_one')
{
$_SESSION['chas_pos'] = $_SESSION['chas_pos']+1;
$_SESSION['chas_pos'] = $_SESSION['chas_pos']%24;
just_time();
} else if ($_POST['type'] === 'minus_one') {
    $_SESSION['chas_pos'] = $_SESSION['chas_pos'] - 1;
    $_SESSION['chas_pos'] = $_SESSION['chas_pos']%24;
    just_time();
}
?>