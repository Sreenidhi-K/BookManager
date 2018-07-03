<?php
session_start();
require_once "gapi/vendor/autoload.php";
$gClient = new Google_Client();
$gClient->setClientId("391432738746-m0ommjv3v04ue9gbgb9hct1smnl23k5d.apps.googleusercontent.com");
$gClient->setClientSecret("FuYz4YRiGlxoggG5y_umo2PN");
$gClient->setApplicationName("Book Manager");
$gClient->setRedirectUri("http://localhost/bookshelf.php");
$gClient->addScope("https://www.googleapis.com/auth/books");

?>