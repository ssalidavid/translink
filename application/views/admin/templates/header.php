<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Saving Management System">
  <meta name="author" content="Davcode Tech">
  <meta name="keyword" content="E-Library Management System which boots Students Learning much Easy!">
  <title><?php echo $title ;?></title>
  <!-- Bootstrap CSS -->
  <link href="<?=base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?=base_url(); ?>assets/admin/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <link rel="shortcut icon"  type=" image/png" href="<?=base_url(); ?>assets/images/1.jpg">
  <!-- font icon -->
  <link href="<?=base_url(); ?>assets/admin/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="<?=base_url(); ?>assets/admin/css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="<?=base_url(); ?>assets/admin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="<?=base_url(); ?>assets/admin/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="<?=base_url(); ?>assets/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="<?=base_url(); ?>assets/admin/css/owl.carousel.css" type="text/css">
  <link href="<?=base_url(); ?>assets/admin/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/css/fullcalendar.css'); ?>">
  <link href="<?=base_url(); ?>assets/admin/css/widgets.css" rel="stylesheet">
  <link href="<?=base_url(); ?>assets/admin/css/style.css" rel="stylesheet">
  <link href="<?=base_url(); ?>assets/admin/css/style-responsive.css" rel="stylesheet" />
  <link href="<?=base_url(); ?>assets/admin/css/xcharts.min.css" rel=" stylesheet">
  <link href="<?=base_url(); ?>assets/admin/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <!-- Sweet Alert -->
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/bootstrap/swal2/sweetalert.css'); ?>">
  <!-- Custom font-awesome -->
  <link href="<?=base_url(); ?>assets/admin/fonts/font-awesome.css " rel="stylesheet" />
  <link rel="stylesheet" href="<?=base_url(); ?>assets/bootstrap/css/jquery-ui-timepicker-addon.css">
  <link rel="stylesheet" href="<?=base_url(); ?>assets/bootstrap/css/jquery-ui.css">
  <!-- jquery -->
  <script src="<?=base_url(); ?>assets/datatables/jquery-3.3.1.min.js"></script>
  <!-- javascript link for sidebar,scrolbar,toggle -->
  <script src="<?=base_url(); ?>assets/admin/js/scripts.js"></script>
  <!-- data table link start -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/buttons.dataTables.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/buttons.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap4.min.css" />
  <script src="<?=base_url('assets/bootstrap/popper/popper.min.js'); ?>"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <style type="text/css">
    h3{
      font-family: 'Coda';
    }
    div.dt-buttons {  
      position: relative;
      float: right;
    }
    #table_filter{
      line-height: 26px;
      margin-right:15px;
      margin-top: -1.12em;
    }
    .wrapper{
      width: 100%;
      margin: 0 auto;
    }
    .page-header h2{
      margin-top: 0;
    }
    table tr td:last-child a{
      margin-right: 15px;
    }
    label {
      display: block;
      width: 50%;
    }
    #table_length{
      margin-top: -1.12em;
      margin: -12px;
    }
    #footer{
      margin-top: 14em;
      padding: 20px;
      color: #444;
      border-top: 1px solid #d2d6de;
    }
    .panel-heading h1{
      padding-top: 5px;
      font-size: 26px !important;
    }
    .dark-bg {
      color: #fff;
      background-color: #046f5eed;
    }
    #bg-trans{
      background-image: linear-gradient(rgba(0,0,0,0.9),rgba(0,0,0,0.8)), 
      url(<?php echo base_url('assets/images/password-changes.png'); ?>);
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      padding: 30px;
      height: 500px;
      margin: 15px !important;
    }
    #img-admin{
      background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), 
      url(<?php echo base_url('assets/images/admin.jpg'); ?>);
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      width: 500px;
      height: 320px;
    }
  </style>
  <script>
    function previewImage() {
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("imglink").files[0]);
      oFReader.onload = function (oFREvent) {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
      };
    };
    var baseURL = "<?=base_url(); ?>";
    var systemLogo = "<?=base_url('uploads/logo/'.$this->systemdata->sphoto); ?>";
    var systemName = "<?=$this->systemdata->sname; ?>";
    var currentDate = "<?=date('l, d F, Y'); ?>"; 
  </script>
</head>
<body>
  <!-- container section start -->
  <section id="container" style="font-family: 'Coda';">
    <header class="header dark-bg">
      <!--logo start-->
      <a href="home" class="logo" style="color: #fff; padding-right: 5px;"><span> Pantaleo SMS</span></a>
      <!--logo end-->
      <div class="toggle-nav" style="margin-left:0px;">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" 
          data-placement="bottom"><i class="icon_menu"></i>
        </div>
      </div>
      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="profile-ava">
                  <?php if ($this->userdata['photo'] == '') : ?>
                    <img src="<?=base_url('uploads/users/nophoto.jpg');?>" style="width: 30px;height: 30px;">
                    <?php else : ?>
                      <img alt="" src="<?=base_url('uploads/users/'.$this->userdata['photo']);?>" style="width: 30px;height: 30px;">
                    <?php endif; ?>
                </span>
                <span class="username"><?=$this->userdata['name']; ?></span>
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu extended logout">
                <div class="log-arrow-up"></div>
                <li class="eborder-top">
                  <!-- <a data-toggle="modal" data-target="editprofile"><i class="icon_profile"></i> My Profile</a> -->
                  <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal"><i class="icon_profile"></i> My Profile</a>
                </li>
              <li>
                <a href="<?=base_url('logout'); ?>"><i class="icon_key_alt"></i> Log Out</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" >
          <li class="sub-menu " id="logo">
            <center>
              <img class="img-center " src="<?=base_url('uploads/logo/'.$this->systemdata->sphoto); ?>" style="height:100px;width:auto;" />
            </center>
          </li>
          <!-- dashboard nav -->
          <li id="dashboardNav">
            <a class="" href="<?=base_url('admin/dashboard'); ?>">
              <i class="icon_house_alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <!-- ceck for permisson -->
          <?php if ($this->userdata['role'] == 1) : ?>
             <li id="roleNav">
              <a href="<?//=base_url('admin/roles'); ?>">
                <i class="fa fa-bank"></i>
                <span>Roles</span>
              </a>
            </li>
            <li id="memberNav" class="sub-menu">
              <a class="" href="<?=base_url('admin/member');?>">
                <i class="fa fa-sitemap"></i>
                <span>Members</span>
              </a>
            </li>
            <li id="accountsNav" class="sub-menu">
              <a class="" href="<?=base_url('admin/accounts'); ?>">
                <i class="fa fa-dollar"></i>
                <span>Members Account</span>
              </a>
            </li>
           <!--  <li id="reportNav" class="sub-menu">
              <a href="javascript:;" class="">
                <i class="fa fa-money"></i>
                <span>Transactions</span>
                <span class="menu-arrow arrow_carrot-right"></span>
              </a>
              <ul class="sub">
                
                <li id="depositsNav" class="sub-menu">
                  <a class="" href="<?=base_url('admin/deposit'); ?>">
                    <i class="fa fa-euro"></i>
                    <span>Deposits</span>
                  </a>
                </li>
               
                <li id="withdrawNav" class="sub-menu">
                  <a class="" href="<?=base_url('admin/withdraw'); ?>">
                    <i class="fa fa-gbp"></i>
                    <span>Withdraw</span>
                  </a>
                </li>
              </ul>
            </li> -->
            <!-- users nav -->
            <li id="usersNav">
              <a  href="<?php echo base_url('admin/users');?>">
                <i class="fa fa-user"></i>
                <span>Users</span>
              </a>
            </li>  
            <!-- settings nav -->
            <li id="settingsNav">
              <a class="" href="<?=base_url('admin/settings'); ?>">
                <i class="fa fa-cog"></i>
                <span>Settings</span>
              </a>
            </li>
          </ul>
        <?php endif; ?>
          <!-- sidebar menu end-->
        </div>
      </aside>
      <!--sidebar end-->
      <!-- update profile modal -->
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
              <h4 class="modal-title text-primary">Profile Name : <?=$this->userdata['name']; ?></h4>
            </div>
            <div class="modal-body bg-info">
              <form role="form" id="update_image">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <center>
                        <label for="imglink" class="control-label col-md-12 h4">Update Profile Picture</label>
                        <?php if ($this->userdata['photo'] == '') : ?>
                          <img class="img-center img-thumbnail" id="uploadPreview" src="<?=base_url('uploads/users/nophoto.jpg');?>" style="width: 100px;height: 100px;">
                          <?php else : ?>
                            <img class="img-center img-thumbnail" id="uploadPreview" alt="" src="<?=base_url('uploads/users/'.$this->userdata['photo']);?>" style="width: 100px;height: 100px;">
                          <?php endif; ?>
                        </center>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 p-2">
                      <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="uname" placeholder="Name" value="<?=$this->userdata['name']; ?>">
                      </div>
                    </div>
                    <div class="col-md-6 p-2">
                      <div class="form-group">
                        <label for="">Role Name</label>
                        <?php if ($this->userdata['role'] == 1) : ?>
                          <select name="urole" class="form-control">
                            <option value="">Select Role</option>
                            <?php foreach ($uroles as $row) : ?>
                              <option value="<?php echo $row['role']; ?>" <?php if ($row['role'] == $this->userdata['role']) { echo "selected";} ?>><?=$row['name']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        <?php else: ?>
                          <select name="urole" class="form-control">
                            <?php foreach ($uroles as $row) :
                              if ($row['role'] == $this->userdata['role']): ?>
                                <option value="<?php echo $row['role']; ?>" <?php if ($row['role'] == $this->userdata['role']) { echo "selected";} ?>><?=$row['name']; ?></option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 p-2">
                      <div class="form-group">
                        <label for="">Member ID</label>
                        <input type="text" name="umember_id" class="form-control" placeholder="Login Member ID" 
                        value="<?=$this->userdata['member_id']; ?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 p-2">
                      <div class="form-group">
                        <label for="">Browse Profile Photo</label>
                        <input type="file" name="imglink" id="imglink" accept=".jpg, .jpeg, .png" onchange="previewImage();" class="text-center m-2 form-control" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 p-2">
                      <div class="form-data">
                        <button type="button" class="btn btn-info btn-sm mt-3" id="update" onclick="update_profile()"><i class="icon_profile"></i> Update Profile</button>
                      </div>
                    </div>
                  </div>
                </form>
                <br>
                <form action="#" id="updatepass">
                  <div class="row mt-3">
                    <div class="col-md-6 p-2 mt-3">
                      <div class="form-group">
                        <label for="" class="mt-3">New Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="New Password">
                        <span class="help-block text-danger"></span>
                      </div>
                    </div>
                    <div class="col-md-6 p-2">
                      <div class="form-group">
                        <label for="" class="mt-3">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                        <span class="help-block text-danger"></span>
                      </div>
                    </div>
                  </div> 
                </div>
                <div class="modal-footer">
                  <div class="form-data mt-2 d-flex" align="right">
                    <button type="button" id="change" name="submit" class="btn btn-info" onclick="update_password()"><i class="fa fa-key"></i> Change Password</button>
                    <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <script type="text/javascript">
          $(document).ready(function() {
            $("input").change(function () {
              $(this).parent().parent().removeClass('has-error');
              $(this).next().empty();
            });
            $("select").change(function () {
              $(this).parent().parent().removeClass('has-error');
              $(this).next().empty();
            });
          });

        // function to show system logo preview
        function previewImage() {
          var oFReader = new FileReader();
          oFReader.readAsDataURL(document.getElementById("imglink").files[0]);
          oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
          };
        };

        function update_profile(){
            $('#update').text('updating...'); //change button text
            $('#update').attr('disabled', true); //set button disable 
            var url;
            url = "<?php echo base_url('admin/dashboard/update_profile') ?>";

            var formData = new FormData($('#update_image')[0]);
            $.ajax({
              url: url,
              type: "POST",
              data: formData,
              contentType: false,
              processData: false,
              dataType: "JSON",
              success: function (data)
              {
                    if (data.status) //if success close modal and reload ajax table
                    {
                      $('#myModal').modal('hide');
                      swal("Profile Updated!", "Your Profile has been Updated Successfully!", "success");
                          //window.location.reload();
                          setInterval(function() {
                            window.location.reload();
                          }, 3100);
                        } else
                        {
                          for (var i = 0; i < data.inputerror.length; i++)
                          {
                            $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                            $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                          }
                        }
                    $('#update').text('Update'); //change button text
                    $('#update').attr('disabled', false); //set button enable 
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                    swal("Sorry!", "Your Profile couldn't be Updated. Try again!", "error");
                    $('#update').text('Update'); //change button text
                    $('#update').attr('disabled', false); //set button enable 

                  }
                });
          }

          function update_password(){
              $('#change').text('changing...'); //change button text
              $('#change').attr('disabled',true); //set button disable 
              var url;

              url = "<?php echo base_url('admin/dashboard/update_account_password')?>";
              // ajax adding data to database
              var formData = new FormData($('#updatepass')[0]);
              $.ajax({
                  url : url,
                  type: "POST",
                  data: formData,
                  contentType: false,
                  processData: false,
                  dataType: "JSON",
                  success: function(data)
                  {

                      if(data.status) //if success close modal and reload ajax table
                      {
                        $('#myModal').modal('hide');
                        swal("Password Updated!", "Your Password is changed successfully!", "success");
                        //Reset the input and textarea boxes after sending SMS
                        $('#updatepass')[0].reset();
                      }else if (data === "password_mismatch") {
                        swal("Password Missmatch","Confirm Password Missmatch. Please Try Again","error");
                        $('#password').val('');
                        $('#confirm_password').val('');
                      }else if (data === "password_short") {
                        swal("Password Length is Short!","Password Must be 8 character long!","error");
                        $('#password').val('');
                        $('#confirm_password').val('');
                      }else if (data === "not_sent") {
                        swal("Message Not Sent","New Login Credential was not sent may be due to Internet!","error");
                      }
                      else
                      {
                          for (var i = 0; i < data.inputerror.length; i++) 
                          {
                              $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                              $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                          }
                      }
                      $('#change').text('Change Password'); //change button text
                      $('#change').attr('disabled',false); //set button enable 
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                      swal("Error Occured!", "Sorry, error has Occured. Please Try again!", "error");
                      //Reset the input and textarea boxes after sending SMS
                      //$('#updatepass')[0].reset();
                      $('#change').text('Change Password'); //change button text
                      $('#change').attr('disabled',false); //set button enable 

                  }
              });
          }
        </script>