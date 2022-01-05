<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title ;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=on">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-rest.css" media="screen" title="no title" charset="utf-8">
    <link rel="shortcut icon"  type=" image/png" href="<?php echo base_url(); ?>assets/images/sitm logo.png">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/mdb.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/font-awsome/css/font-awesome.css" media="screen" title="no title" charset="utf-8">
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery-3.3.1.min.js" charset="utf-8"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/popper/popper.min.js" charset="utf-8"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js" charset="utf-8"></script>
    <style>
        body{
            background-image: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.5)), url('<?php echo base_url(); ?>assets/images/bg.jpg');
        }
    </style>
</head>
<body>
    <section>
        <div class="row animated slideInUp ">
            <div class="col-lg-4 col-md-3 col-sm-2 "></div>
            <div class="col-lg-4 col-md-6 col-sm-8 ">
                <div class="box">
                    <form class="form-border bg-white  mt-5" >
                        <div class="row animated">
                            <div class="col-12">
                                <div class="pt-4 h4 text-capitalize text-success text-center ">
                                    <?=strtoupper($this->systemdata->sname); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-body px-3 pb-3 pt-2  ">
                            <div class="row justify-content-center pt-4 pb-4">
                                <center>
                                    <img src="<?php echo base_url('assets/images/image-1.png'); ?>" class="pb-2" alt="" />
                                    <div class="h3 text-success lead">Nayosi Investment International Limited</div>
                                    <div class="h4 text-dark lead"><?php echo $login_name ?></div>
                                </center>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12 pt-2 inputBox">
                                    <input type="email"  class="form-control" id="nm" name="" required="">
                                    <label for="nm" style="margin-left:40px;">Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12 pt-2 inputBox">
                                    <input type="password"  class="form-control" id="ps" name="" required="" >
                                    <label for="ps" style="margin-left:40px;">Password</label>
                                </div>
                            </div>
                        <div>
                        <input type="checkbox" class="checkbox" name="" id="ck">
                        <label for="ck" class="remember-label ">Remember me</label>
                        <div class="row loginbtn">
                            <div class="form-group col-lg-12 pt-1">
                                <input type="submit"  class="form-control btn-success"   value="Login">
                            </div>
                            <a href="<?=base_url('admin/dashboard') ?>">admin panel</a>
                        </div>            
                    </form> 
                </div>               
            </div>
            <div class="col-lg-4 col-md-3 col-sm-2 "></div>
        </div>
    </section>
</body>
</html>