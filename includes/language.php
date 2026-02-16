<?php
session_start();

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
    setcookie('lang', $_GET['lang'], time() + 3600*24*30); // cookie pendant 1 mois
}

if (!isset($_SESSION['lang'])) {
    if (isset($_COOKIE['lang'])) {
        $_SESSION['lang'] = $_COOKIE['lang'];
    } else {
        $browser_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        if (in_array($browser_lang, ['fr', 'en', 'ru'])) {
            $_SESSION['lang'] = $browser_lang;
        } else {
            $_SESSION['lang'] = 'fr';
        }
    }
}

$lang_file = __DIR__ . '/../languages/' . $_SESSION['lang'] . '.php';
if (file_exists($lang_file)) {
    include($lang_file);
} else {
    include(__DIR__ . '/../languages/fr.php');
}
?>