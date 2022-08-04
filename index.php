<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/Asset 1.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
</head>
<body>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="layout-demo-wrapper" id="loading" style="margin-top: 25%;">
                <div class="spinner-grow text-secondary spinner-border-lg" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        <div class="container-xxl" id="authentication">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">
                <!-- Register -->
                    <div class="card">
                        <div class="card-body">
                            <div class="app-brand justify-content-center" style="display: initial;">
                                <h4 class="mb-2">Welcome to MedStock! 👋</h4>
                                <p class="mb-4">Please sign-in to your account</p>
                                <?php 
                                session_start();
                                if ($_SESSION['errors']!="") {
                                    echo"<div class=\"alert alert-warning\" role=\"alert\">$_SESSION[errors]!</div>";
                                }
                                ?>
                                <form id="formAuthentication" class="mb-3" action="check.php" method="POST">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" required class="form-control" id="username" name="username" placeholder="Enter your username" autofocus="">
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" required name="password" placeholder="············" aria-describedby="password">
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                                    </div>
                                </form>
                            </div> 
                        </div>
                    </div>
                <!-- /Register -->
                </div>
            </div>
        </div>
    </div>
    <script>
        
        var authentication=document.getElementById("authentication");
        authentication.style.display='none';
        var loading=document.getElementById("loading");
        setTimeout(function() {
        loading.style.display='none';
        }, 3000);
        setTimeout(function() {
        authentication.style.display='block';
        }, 3000);
    </script>
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>
</html>