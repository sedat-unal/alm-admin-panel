<?php
session_start();
ob_start();
include("settings/functions.php"); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Almila Ambalaj Admin Paneli</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./assets/media/image/favicon.png"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="./vendors/bundle.css" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="./assets/css/app.min.css" type="text/css">
</head>
<body class="form-membership">

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<div class="form-wrapper" style="margin-top: 8%;">

    <!-- logo -->
    <div id="logo">
        <img src="./assets/media/image/alm-logo.png" alt="image" style="width: 200px;height: 100px;">
    </div>
    <!-- ./ logo -->

    <h5>Giriş Yap</h5>
    <?php
    if ($_POST) {
        include "settings/connection.php";

        //get post data
        $username = $_POST["username"];
        $password = $_POST["password"];

        //control post data if empty ?
        if (empty($username) || empty($password)) {
            echo fail("Lütfen tüm alanları doldurunuz.");
        }

        //the post datas username control db if exist
        $checkUser = $connectDb->prepare("SELECT * FROM yoneticiler WHERE yonetici_kadi = :kullaniciAdi");
        $checkUser->execute(array(":kullaniciAdi" => $username));
        //if exist
        if ($checkUser->rowCount()) {
            //the usernames admin control post data password to my mysql db password
            $checkUserPassword = $connectDb->prepare("SELECT yonetici_sifre FROM yoneticiler WHERE yonetici_kadi = :kullaniciAdi");
            $checkUserPassword->execute(array(":kullaniciAdi" => $username));
            $userPasswordFetch = $checkUserPassword->fetch(PDO::FETCH_ASSOC);
            //if true
            if (sha1(md5($password)) == $userPasswordFetch["yonetici_sifre"]) {
                $getUserAdmin = $connectDb->prepare("SELECT * FROM yoneticiler WHERE yonetici_kadi = :kullaniciAdi");
                $getUserAdmin->execute(array(":kullaniciAdi" => $username));
                if ($getUserAdmin->rowCount()) {
                    $userRow = $getUserAdmin->fetch(PDO::FETCH_ASSOC);
                    $_SESSION == true;
                    $_SESSION["userName"] = $userRow["yonetici_kadi"];
                    $_SESSION["userMail"] = $userRow["yonetici_mail"];
                    //update login device ip to last login ip
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $updateIP = $connectDb->prepare("UPDATE yoneticiler SET yonetici_lastLogin = :ip WHERE yonetici_id = :id");
                    $updateIP->execute(array(":ip" => $ip, ":id" => $userRow["yonetici_id"]));
                    if ($updateIP) {
                        echo success("Başarıyla giriş yapıldı. Yönlendiriliyorsunuz..");
                        header("refresh:2;url=index.php");
                    }
                }

            } else {
                echo fail("Girilen şifre hatalı. Lütfen tekrar deneyiniz.");
            }
            $userPasswordFetch = $checkUserPassword->fetch(PDO::FETCH_ASSOC);
        } else {
            echo fail("Böyle bir yönetici bulunmuyor. Lütfen bilgileri kontrol ediniz.");
        }

    }

    ?>

    <!-- form -->
    <form name="login" method="post">
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Kullanıcı adı veya mail adresiniz"
                   required autofocus>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Şifreniz" required>
        </div>
        <div class="form-group d-flex justify-content-between">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" checked="" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Beni hatırla</label>
            </div>
            <a href="./demos/default/recovery-password.html">Parolamı unuttum</a>
        </div>
        <button class="btn btn-primary btn-block">Giriş Yap</button>
        <hr>
    </form>
    <!-- ./ form -->


</div>

<!-- Plugin scripts -->
<script src="./vendors/bundle.js"></script>

<!-- App scripts -->
<script src="./assets/js/app.min.js"></script>
</body>
</html>
