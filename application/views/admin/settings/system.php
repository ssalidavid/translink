<section id="main-content">
	<section class="wrapper">
		<br><br><br><br>
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						<h1 class="text-infos py-4  pl-3tea py-2">SYSTEM SETTINGS INFORMATION</h1> 
					</header>
					<ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#systembasic_info">System Basic Information</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#background_img">Background Photo</a>
                        </li>
                    </ul>
                    <div class="panel-body">
	                    <div class="tab-content">
	                        <div id="systembasic_info" class="tab-pane active">
	                            <!--settings content start-->
	                            <div class="row">
	                                <div class="col-lg-12" >
	                                    <form action="#" id="settings_form">
		                                    <div class="row">
		                                        <div class="col-lg-12">
		                                        	<br><br>
		                                        	<!-- showing the preview of system logo -->
		                                            <center>
		                                                <img src="<?=base_url('uploads/logo/'.$this->systemdata->sphoto); ?>" style="height: 100px; width: auto;" class="img-center img-thumbnail" id="viewSystemLogo">
		                                            </center>
		                                        </div>
		                                    </div><br><br>
		                                    <div class="row">
		                                        <div class="col-lg-12">
		                                            <p>Below you should enter your system information details. All fields required!</p>
		                                        </div>
		                                    </div><br>
		                                    <div class="row">
		                                        <div class="col-md-6">
		                                            <div class="form-group">
		                                                <label class="control-label col-md-12">Business Name</label>
		                                                <div class="col-md-12">
		                                                    <input name="sname" placeholder="Business Name" class="form-control" type="text"
		                                                    value="<?=$this->systemdata->sname; ?>">
		                                                    <span class="help-block text-danger"></span>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="col-md-6">
		                                            <div class="form-group">
		                                                <label class="control-label col-md-12">System Slogan</label>
		                                                <div class="col-md-12">
		                                                    <input name="smotto" placeholder="System Slogan" class="form-control" type="text" 
		                                                    value="<?=$this->systemdata->smotto; ?>">
		                                                    <span class="help-block text-danger"></span>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="row">
		                                        <div class="col-md-6">
		                                            <div class="form-group">
		                                                <label class="control-label col-md-12">System Name</label>
		                                                <div class="col-md-12">
		                                                    <input name="spname" placeholder="System Name" class="form-control" type="text"
		                                                    value="<?=$this->systemdata->spname; ?>">
		                                                    <span class="help-block text-danger"></span>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="col-md-6">
		                                            <div class="form-group">
		                                                <label class="control-label col-md-12">Website URL Name</label>
		                                                <div class="col-md-12">
		                                                    <input name="swurl" placeholder="www.example.com" class="form-control" type="url"
		                                                    value="<?=$this->systemdata->swurl ?>">
		                                                    <span class="help-block text-danger"></span>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="row">
		                                        <div class="col-md-6">
		                                            <div class="form-group">
		                                                <label class="control-label col-md-12">Email Address</label>
		                                                <div class="col-md-12">
		                                                    <input name="semail" placeholder="Email Address" class="form-control" type="email" 
		                                                    value="<?=$this->systemdata->semail ?>">
		                                                    <span class="help-block text-danger"></span>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="col-md-6">
		                                            <div class="form-group">
		                                                <label class="control-label col-md-12">Address Name</label>
		                                                <div class="col-md-12">
		                                                    <input name="saddress" placeholder="System Address" class="form-control" type="text" value="<?=$this->systemdata->saddress; ?>">
		                                                    <span class="help-block text-danger"></span>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="row">
		                                        <div class="col-md-6">
		                                            <div class="form-group">
		                                                <label class="control-label col-md-12">Telephone Number</label>
		                                                <div class="col-md-12">
		                                                    <input name="sphone" placeholder="Telephone Number" class="form-control" type="text" 
		                                                    value="<?=$this->systemdata->sphone; ?>">
		                                                    <span class="help-block text-danger"></span>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="col-md-6">
		                                            <div class="form-group">
		                                                <label class="control-label col-md-12">
		                                                    System logo
		                                                </label>
		                                                <div class="col-md-12">
		                                                    <input class="form-control" type="file" name="logo" id="systemLogo" accept=".jpg, .jpeg, .png" onchange="previewImage();">
		                                                    <span class="help-block text-danger"></span>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="row">
		                                        <div class="col-md-6">
		                                            <div class="form-group">
		                                                <div class="row">
		                                                	<div class="col-md-12">
		                                                        <label class="control-label col-md-12">How much is the minimun Amount for the deposit?</label>
		                                                        <div class="col-md-12">
		                                                            <input name="min_deposit_amount" class="form-control" type="number" value="<?=$this->systemdata->min_deposit_amount; ?>" min="0" placeholder="How much is the minimun Amount for the deposit?">
		                                                            <span class="help-block text-danger"></span>
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="col-md-6">
		                                            <div class="form-group">
		                                                <div class="row">
		                                                    <div class="col-md-12">
		                                                        <label class="control-label col-md-12">How much is the Maximun Amount dor the deposit?</label>
		                                                        <div class="col-md-12">
		                                                            <input name="max_deposit_amount" class="form-control" type="number" value="<?=$this->systemdata->max_deposit_amount; ?>" placeholder="How much is the Maximun Amount dor the deposit?" min="0">
		                                                            <span class="help-block text-danger"></span>
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="row">
		                                        <div class="col-md-6">
		                                            <div class="form-group">
		                                                <div class="row">
		                                                	<div class="col-md-12">
		                                                        <label class="control-label col-md-12">How much is the minimun Amount for the withdrawing?</label>
		                                                        <div class="col-md-12">
		                                                            <input name="min_withdraw_amount" class="form-control" type="number" value="<?=$this->systemdata->min_withdraw_amount; ?>" min="0" placeholder="How much is the minimun Amount for the withdrawing?">
		                                                            <span class="help-block text-danger"></span>
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="col-md-6">
		                                            <div class="form-group">
		                                                <div class="row">
		                                                    <div class="col-md-12">
		                                                        <label class="control-label col-md-12">How much is the Maximun Amount dor the withdrawing?</label>
		                                                        <div class="col-md-12">
		                                                            <input name="max_withdraw_amount" class="form-control" type="number" value="<?=$this->systemdata->max_withdraw_amount; ?>" placeholder="How much is the Maximun Amount dor the withdrawing?" min="0">
		                                                            <span class="help-block text-danger"></span>
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="row">
		                                        <div class="col-md-6">
		                                            <div class="form-group">
		                                                <div class="col-md-12">
		                                                    <button type="button" id="update" class="btn btn-primary" onclick="update_settings()">Update</button>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="col-md-6"></div>
		                                    </div>
		                                </form>
	                                </div>
	                            </div>
	                        </div>
	                        <div id="background_img" class="tab-pane">
	                            <div class="row">
	                                <div class="col-lg-12" >
	                                    <form action="" id="background_logo_form">
	                                        <div class="row">
	                                            <div class="col-lg-12">
                                                    <div><br><br>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <input class="form-control" type="file" name="backgroundImg" id="backgroundImg" accept=".jpg, .jpeg, .png" onchange="previewBackgroundImage();">
                                                                <span class="help-block text-danger"></span>
                                                            </div>
                                                            <div class="col-lg-6" align="left">
                                                                <button type="button" id="btnupdate" onclick="update()" class="btn btn-primary">Upload</button>
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <center>
                                                        	<img src="<?=base_url('uploads/logo/'.$this->systemdata->sbackgphoto); ?>" style="" class="img-center img-responsive img-thumbnail" id="viewBackgroundImg">
                                                        </center>
                                                    </div>
	                                            </div>
	                                        </div>
	                                    </form>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
				</section>
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
		        $("textarea").change(function(){
		        $(this).parent().parent().removeClass('has-error');
		        $(this).next().empty();
		        });
		    });

		    // get DatePicker
		    // $(document).on('focus', '.getDatePicker', function () {
		    //     $(this).datepicker({
		    //         changeMonth: true,
		    //         changeYear: true,
		    //         dateFormat: "yy-mm-dd",
		    //         yearRange: "2012:2050"
		    //     });
		    // });

		    // function to show system logo preview
	        function previewImage() {
	            var oFReader = new FileReader();
	            oFReader.readAsDataURL(document.getElementById("systemLogo").files[0]);
	            oFReader.onload = function (oFREvent) {
	                document.getElementById("viewSystemLogo").src = oFREvent.target.result;
	            };
	        };
	        // function to show background preview
	        function previewBackgroundImage() {
	            var oFReader = new FileReader();
	            oFReader.readAsDataURL(document.getElementById("backgroundImg").files[0]);
	            oFReader.onload = function (oFREvent) {
	                document.getElementById("viewBackgroundImg").src = oFREvent.target.result;
	            };
	        };

		    function update_settings(){
		        $('#update').text('updating...'); //change button text
		        $('#update').attr('disabled', true); //set button disable 
		        var url;
		            url = "<?php echo base_url('admin/settings/update_settings') ?>";

		        var formData = new FormData($('#settings_form')[0]);
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
	                        swal("System Updated!", "System Settings Updated successfully!", "success");
	                        //window.location.reload();
	                        setInterval(function() {
	                          window.location.reload();
	                        }, 3100);
		                }else if (data === "access_denied") {
		                    swal("Access Denied!","You're not Authorized to Update any System Settings!","error");
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
		                swal("Sorry!", "System Settings couldn't be Updated. Try again!", "error");
		                $('#update').text('Update'); //change button text
		                $('#update').attr('disabled', false); //set button enable 

		            }
		        });
		    }

		    function update(){
		        $('#btnupdate').text('updating...'); //change button text
		        $('#btnupdate').attr('disabled', true); //set button disable 
		        var url;
		            url = "<?php echo base_url('admin/settings/update_backgound_photo') ?>";

		        var formData = new FormData($('#background_logo_form')[0]);
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
		                        swal("System Updated!", "Background Logo Updated successfully!", "success");
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
		                $('#btnupdate').text('Update'); //change button text
		                $('#btnupdate').attr('disabled', false); //set button enable 
		            },
		            error: function (jqXHR, textStatus, errorThrown)
		            {
		                swal("Sorry!", "System Settings couldn't be Updated. Try again!", "error");
		                $('#btnupdate').text('Update'); //change button text
		                $('#btnupdate').attr('disabled', false); //set button enable 

		            }
		        });
		    }
		    $('#settingsNav').addClass('active');
		</script>