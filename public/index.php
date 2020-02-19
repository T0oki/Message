<?php
require (__DIR__. DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
use App\Message;


if (isset($_GET['p'])) {
    if (isset($_POST['nick'], $_POST['message'])) {
        Message::poste($_POST['nick'], $_POST['message']);
    } else { echo "ERROR_PARAMS"; }
    die;
} elseif (isset($_GET['g'])) {
    Message::get();
    die;
} elseif (isset($_GET['f'])) {
    include("form.html");
    die;
} else {
    include("main.html");
    die;
}