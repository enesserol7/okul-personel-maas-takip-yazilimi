<!DOCTYPE html>
<!--
Item Name: Elisyam - Web App & Admin Dashboard Template
Version: 1.5
Author: SAEROX

** A license must be purchased in order to legally use this template for your project **
-->
<html lang="tr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Elisyam - Error 404</title>
        <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url("assets/"); ?>img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url("assets/"); ?>img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url("assets/"); ?>img/favicon-16x16.png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url("assets/"); ?>vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url("assets/"); ?>vendors/css/base/elisyam-1.5.min.css">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body class="bg-error-01">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="<?php echo base_url("assets/"); ?>img/logo.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <!-- Begin Container -->
        <div class="container-fluid h-100 error-01">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12">
                    <!-- Begin Container -->
                    <div class="error-container mx-auto text-center">
                        <h1>404</h1>
                        <h2>Sayfa Bulunamadı! </h2>
                        <p>Sorun Devam Ederse Lütfen Bizimle İletişime Geçiniz...</p>
                        <a href="<?php echo base_url(); ?>" class="btn btn-shadow">
                            Geri Dön
                        </a>
                        <a href="https://netbilisimhizmetleri.net/#contact" target="_blank" class="btn btn-shadow">
                            İletişim
                        </a>
                    </div> 
                    <!-- End Container -->
                </div>
                <!-- End Col -->
            </div> 
            <!-- End Row -->
        </div>
        <!-- End Container -->
        <!-- Begin Vendor Js -->
        <script src="<?php echo base_url("assets/"); ?>vendors/js/base/jquery.min.js"></script>
        <script src="<?php echo base_url("assets/"); ?>vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="<?php echo base_url("assets/"); ?>vendors/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
    </body>
</html>