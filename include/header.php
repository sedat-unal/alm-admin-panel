<?php
session_start();
ob_start();
if ($_SESSION == false)
{
    header("location:login.php");
}
include("settings/functions.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$settingsRow["settings_title"]?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./assets/media/image/favicon.png"/>

    <!-- Main css -->
    <link rel="stylesheet" href="./vendors/bundle.css" type="text/css">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- App css -->
    <link rel="stylesheet" href="./assets/css/app.min.css" type="text/css">

    <!-- Slick slide -->
    <link rel="stylesheet" href="./vendors/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="./vendors/slick/slick-theme.css" type="text/css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
