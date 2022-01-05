<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon"  type=" image/png" href="<?=base_url(); ?>assets/images/sitm logo.png">
    <link rel="stylesheet" href="<?=base_url('assets/bootstrap/css/style.css'); ?>">
    <link rel="stylesheet" href="<?=base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?=base_url('assets/bootstrap/css/mdb.min.css'); ?>">
    <script type="text/javascript" src="<?=base_url('assets/bootstrap/js/jquery-3.3.1.min.js'); ?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/bootstrap/js/popper.min.js'); ?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?=base_url('asset/bootstrap/js/mdb.min.js'); ?>"></script>
    <title>NAYOSI-MS</title>
    <style>
    body{
        font-family: 'Coda';
        width: 100%;
        margin: 0px;
        padding: 0px;
        outline: 0px;
        overflow-x: hidden;
        background-image: linear-gradient(rgba(0,0,0,1),rgba(0,0,0,0.2)), url(<?=base_url('assets/images/bg.jpg'); ?>); 
        background-size:cover;
    }
    .gallery{
        filter: grayscale(0);
        transition: 1s;
    }
    .gallery:hover{
        transform: scale(1.1);
        background-color: forestgreen;
        transition-duration: 1s;
        transition-property: all;
    }
    h2{
        color:#00e676;
        font-weight: bolder;
    }
    h4,h5{
        color:#e0e0e0;
        /*font-weight: bolder;*/
    }
    .heading {
        margin-top: 10px;
        padding-bottom: 10px;
        font-family: 'Coda';
        font-size: 32px;
        color: #009755;
    }
    .heading1 {
        margin-top: 10px;
        padding-bottom: 10px;
        font-family: 'Coda';
        font-size: 22px;
    }
    .green-text {
        color: #4CAF50 !important;
    }
</style>
</head>
<body>
    <header class="container-fluid animated slideInUp">
        <div class="row justify-content-between mt-2">
            <div class="col-lg-3 text-center mt-2">
                <img src="<?php echo base_url('assets/images/sitm logo.png'); ?>" alt="sitm logo" class="m-3" style="height:100px; width:100px;">
            </div>
            <div class="col-lg-6">
                <div class="row d-block text-center mt-2">
                    <div class="col-auto">
                    <div class="h4 .text-capitalize  text-success text-center ">NAYOSI MANAGEMENT SYSTEM(NMS)</div>
                    </div>
                    <div class="col-auto mt-3">
                        <h5 class="text-white text-center">WE CHANGE YOUR MIND SET FROM FAILURE TO SUCCESS!</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </header>
    <main class="container mt-3">
        <div class="row justify-content-between container animated slideInUp" style="margin-top: 30px;">
            <div class="col-1"></div>
            <div class="col-10 text-white">
                <p class="h4 lead text-justify"> 
                    Nayosi Investment International Limit which is an Investment Platform with a Variety of  
                    iusers accounts. All available for free but to boots your Savings.
                    We are grateful to offer such a fast and easier way of saving and saving with us i promise
                    you will regrate it and we hope you utilize everything,
                    we have offered to you through this platform. <br>
                    <p class="text-center h4 lead">Login and get started....</p>
                </p>
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row container animated slideInUp">
            <div class="col text-center ml-5 mb-5">
            </div>
            <div class="col text-center ml-5 mb-5">
                <a href="<?=base_url('admin/login');?>" class="text-white">
                    <img src="<?=base_url('assets/images/admin.jpg'); ?>" class="center-block img-circle img-responsive gallery"  style="opacity: 20%; border-radius:250px;height:300px; width:300px;">
                </a>
            </div>
            <div class="col text-center ml-5 mb-5">
            </div>
        </div>
    </main>
    <footer class="footer navbar-fixed-bottom">
        <div class="container text-center">
            <div class="row" style="color:#e0e0e0;">
                <div class="col-md-5">
                        <a href="#"  style="color:#e0e0e0;">
                            NMS
                        </a> | 
                        <a href="#"  style="color:#e0e0e0;">
                            <span class="glyphiconz glyphicon-phonez"></span>+256-785294797
                        </a> | 
                        <a href="mailto:admin@saipaliinfotech.com"  style="color:#e0e0e0;">
                            admin@nayosi.com
                        </a>
                </div>
                <div class="col-md-5">
                    <p class="text-center pull-left">
                        Copyright &copy; <?= date('Y'); ?>. 
                            <a href="http://www.saipaliinfotech.com"  style="color:#e0e0e0;">
                               a
                            </a> 
                        All Rights Reserved.
                    </p>
                </div>
                <div class="col-md-2">
                    <p class="pull-right">
                        NMS | Version: 1.0
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>