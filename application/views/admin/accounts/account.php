<style type="text/css">
	
	.modal-content,.modal-body{
        color: #000;
        width: 800px;
	}
	.modal-body{
		background-color: #1bd2be;
	}
	.img-center{
		/*background-color: #fff;*/
		height: 180px; 
		width: 180px;
	}
	.modal-header,.modal-footer{
		 width: 800px;
	}
	input[type="file"],input[type="text"],input[type="date"],select[name="department"],
	select[name="sex"],select[name="emp_type"],select[name="designation"]{
		/*padding: 20px;*/
		height: 40px;
		border-radius: 0;
	}

</style>
<section id="main-content">
	<section class="wrapper">
		<br><br><br><br>
		<div class="row">
          	<div class="col-lg-12" >
	            <section class="panel">
		            <header class="panel-heading bg-info">
		                <h1 class="text-infos py-4 pl-3tea py-2">MEMBERS ACCOUNT INFORMATION
		                </h1> 
		            </header>
	              	<div class="panel-body">
	               		<div class="table-responsive">
	               		   <table id="table" class="table table-striped table-bordered table-hover" 
	               		       width="100%">
	               				<thead>
	               					<tr>
	               						<th>S.No</th>
	               						<th>Name</th>
	               						<th>Member ID</th>
	               						<th>Phone</th>
	               						<th>Account No.</th>
	               						<th>Account Balance</th>
	               						<th>Photo</th>
	               						<th class="text-center">Actions</th>
	               					</tr>
	               				</thead>
	               				<tbody>
	               					
	               				</tbody>
	               			</table>
	               		</div>
	              	 </div>
	            </section>
          	</div>
        </div>
        <!-- add and update popup modal -->
       <div id="modal_form" class="modal fade" role="dialog">
	        <div class="modal-dialog modal-lg">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <button aria-hidden="true" data-dismiss="modal" class="close text-white" type="button">&times;</button>
	                    <h3 class="modal-title text-success"></h3>
	                </div>
	                <div class="modal-body card-body bg-info">
	                    <form action="#" id="form">
	                    	<input type="hidden" name="Mid">
		                	<div class="row mt-3">
		                		<div class="col-md-12">
		                			<div class="row">
		                				<div class="col-md-4">
		                					<div class="form-group">
		                						<label class="control-label col-md-12">Member Name</label>
				                                <div class="col-md-12">
				                                    <input name="member_name" placeholder="Member name" class="form-control" type="text" required>
				                                    <span class="help-block text-danger"></span>
				                                </div>
		                					</div>
		                					<div class="form-group">
		                						<label class="control-label col-md-12">Member ID</label>
				                                <div class="col-md-12">
				                                    <input name="member_id" placeholder="member id" class="form-control" type="text" required>
				                                    <span class="help-block text-danger"></span>
				                                </div>
		                					</div>
		                					<div class="form-group">
		                						<label class="control-label col-md-12">Next of Kin Name</label>
				                                <div class="col-md-12">
				                                	<input type="text" name="nok_name" class="form-control" placeholder="next of kin name">
				                                    <span class="help-block text-danger"></span>
				                                </div>
		                					</div>
		                					<div class="form-group">
		                						<label class="control-label col-md-12">Gender</label>
				                                <div class="col-md-12">
				                                    <select class="form-control" name="sex">
				                                    	<option value="">select your Gender</option>
				                                    	<option value="Male">Male</option>
				                                    	<option value="Female">Female</option>
				                                    </select>
				                                    <span class="help-block text-danger"></span>
				                                </div>
		                					</div>
	                    					<div class="form-group">
	                    						<label class="control-label col-md-12">Next of kin Contact</label>
				                                <div class="col-md-12">
				                                	<input type="text" name="nok_contact" class="form-control" placeholder="next of kin contact">
				                                    <span class="help-block text-danger"></span>
				                                </div>
	                    					</div>
		                				</div>
		                				<div class="col-md-4">
		                    					<div class="form-group">
		                    						<label class="control-label col-md-12">Phone Number</label>
					                                <div class="col-md-12">
					                                  <input type="text" name="contact" class="form-control" placeholder="phone number">
					                                  <span class="help-block text-danger"></span>
					                                </div>
		                    					</div>
		                    					<div class="form-group">
		                    						<label class="control-label col-md-12">Date of Birth</label>
						                            <div class="col-md-12">
						                                <input name="birthday" placeholder="member birthday" class="form-control" type="date" required>
						                                <span class="help-block text-danger"></span>
						                            </div>
		                    					</div>
		                    					<div class="form-group">
		                    						<label class="control-label col-md-12">Nationality</label>
					                                <div class="col-md-12">
					                                  <input type="text" name="nationality" class="form-control" placeholder="Staff Nationality">
					                                  <span class="help-block text-danger"></span>
					                                </div>
		                    					</div>
		                    					<div class="form-group">
		                    					   <label class="control-label col-md-12">Username</label>
					                               <div class="col-md-12">
					                                  <input type="text" name="username" class="form-control" placeholder="Username">
					                                  <span class="help-block text-danger"></span>
					                               </div>
		                    					</div>
		                    					<div class="form-group">
		                    						  <label class="control-label col-md-12">Address</label>
						                                <div class="col-md-12">
						                                	<input type="text" name="address" class="form-control" placeholder="member address">
						                                    <span class="help-block text-danger"></span>
						                                </div>
			                                    </div>		                					</div>
		                					<div class="col-md-4">
		                    					<div class="form-group">
		                    						<label class="control-label col-md-12">Designation</label>
					                                <div class="col-md-12">
					                                	<select class="form-control" name="designation">
					                                		<option value="">Select Designation</option>
					                                		<?php foreach ($roles as $row) :?>
														      <option value="<?php echo $row->role_id;?>">
														      	<?php echo $row->name;?>
														      </option>
											      			<?php endforeach ?>
					                                  </select>
					                                    <span class="help-block text-danger"></span>
					                                </div>
		                    					</div>
		                    					<div class="form-group">
		                    						 <label class="control-label col-md-12">Join Date</label>
					                                <div class="col-md-12">
					                                    <input  type="text" name="join_date" placeholder="Join Date" class="form-control" readonly value="<?php echo date('Y-m-d'); ?>">
					                                    <span class="help-block text-danger"></span>
					                                </div>
		                    					</div>
		                    					<!-- Users profile picture -->
					                    		<div class="form-group" id="show_profile">
					                               <label class="control-label col-md-12 pt-2">Profile Photo</label>
					                                <div class="col-md-12 mb-3">
			                                            <img src="<?=base_url('uploads/users/nophoto.jpg'); ?>" class="img-center" id="viewUserProfile">
					                                </div>
					                            </div>
					                    	    <div class="form-group">
					                                <label class="control-label col-md-12">Profile Picture</label>
					                                <div class="col-md-12">
					                                   <input  type="file" name="photo" onchange="previewImage();" class="form-control" accept=".jpg, .jpeg, .png" required id="UserProfile">
					                                    <span class="help-block text-danger"></span>
					                                </div>
					                          </div>
                				   			</div>
		                			    </div>
		                			</div>
		                		</div>
	                    </form>
	                </div>
	                <div class="modal-footer card-footer">
	                    <div class="form-data mt-2 d-flex">
	                    	<button type="button" id="btnSave" onclick="save_member()" class="btn btn-primary"></button>
	                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
       <!-- view pop up modal -->
       <div id="view_modal_form" class="modal fade" role="dialog">
	        <div class="modal-dialog modal-lg">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <button aria-hidden="true" data-dismiss="modal" class="close text-white" type="button">&times;</button>
	                    <h3 class="modal-title text-success"></h3>
	                </div>
	                <div class="modal-body card-body bg-info">
	                    <form action="#" id="form">
		                	<div class="row mt-3">
		                		<div class="col-md-12">
		                			<div class="row">
		                				<div class="col-md-4">
		                					<div class="form-group">
		                						<label class="control-label col-md-12">Member Name</label>
				                                <div class="col-md-12">
				                                    <input name="member_name" placeholder="Member name" class="form-control" type="text" readonly>
				                                    <span class="help-block text-danger"></span>
				                                </div>
		                					</div>
		                					<div class="form-group">
		                						<label class="control-label col-md-12">Member ID</label>
				                                <div class="col-md-12">
				                                    <input name="member_id" placeholder="member id" class="form-control" type="text" readonly>
				                                    <span class="help-block text-danger"></span>
				                                </div>
		                					</div>
		                					<div class="form-group">
		                						<label class="control-label col-md-12">Next of Kin Name</label>
				                                <div class="col-md-12">
				                                	<input type="text" name="nok_name" class="form-control" placeholder="next of kin name" readonly>
				                                    <span class="help-block text-danger"></span>
				                                </div>
		                					</div>
		                					<div class="form-group">
		                						<label class="control-label col-md-12">Gender</label>
				                                <div class="col-md-12">
				                                    <select class="form-control" name="sex" readonly>
				                                    	<option value="">select your Gender</option>
				                                    	<option value="Male">Male</option>
				                                    	<option value="Female">Female</option>
				                                    </select>
				                                    <span class="help-block text-danger"></span>
				                                </div>
		                					</div>
	                    					<div class="form-group">
	                    						<label class="control-label col-md-12">Next of kin Contact</label>
				                                <div class="col-md-12">
				                                	<input type="text" name="nok_contact" class="form-control" placeholder="next of kin contact" readonly>
				                                    <span class="help-block text-danger"></span>
				                                </div>
	                    					</div>
		                				</div>
		                				<div class="col-md-4">
		                    					<div class="form-group">
		                    						<label class="control-label col-md-12">Phone Number</label>
					                                <div class="col-md-12">
					                                  <input type="text" name="contact" class="form-control" placeholder="phone number" value="+256 " readonly>
					                                  <span class="help-block text-danger"></span>
					                                </div>
		                    					</div>
		                    					<div class="form-group">
		                    						<label class="control-label col-md-12">Date of Birth</label>
						                            <div class="col-md-12">
						                                <input name="birthday" placeholder="member birthday" class="form-control" type="date" readonly>
						                                <span class="help-block text-danger"></span>
						                            </div>
		                    					</div>
		                    					<div class="form-group">
		                    						<label class="control-label col-md-12">Nationality</label>
					                                <div class="col-md-12">
					                                  <input type="text" name="nationality" class="form-control" placeholder="Staff Nationality" readonly>
					                                  <span class="help-block text-danger"></span>
					                                </div>
		                    					</div>
		                    					<div class="form-group">
		                    					   <label class="control-label col-md-12">Username</label>
					                               <div class="col-md-12">
					                                  <input type="text" name="username" class="form-control" readonly>
					                                  <span class="help-block text-danger"></span>
					                               </div>
		                    					</div>
		                    					<div class="form-group">
		                    						  <label class="control-label col-md-12">Address</label>
						                                <div class="col-md-12">
						                                	<input type="text" name="address" class="form-control" placeholder="member address" readonly>
						                                    <span class="help-block text-danger"></span>
						                                </div>
			                                    </div>		                					</div>
		                					<div class="col-md-4">
		                    					<div class="form-group">
		                    						<label class="control-label col-md-12">Designation</label>
					                                <div class="col-md-12">
					                                	<select class="form-control" name="designation" readonly>
					                                		<option value="">Select Designation</option>
					                                		<?php foreach ($roles as $row) :?>
														      <option value="<?php echo $row->role_id;?>">
														      	<?php echo $row->name;?>
														      </option>
											      			<?php endforeach ?>
					                                  </select>
					                                    <span class="help-block text-danger"></span>
					                                </div>
		                    					</div>
		                    					<div class="form-group">
		                    						 <label class="control-label col-md-12">Join Date</label>
					                                <div class="col-md-12">
					                                    <input  type="text" name="join_date" placeholder="Join Date" class="form-control" readonly value="<?php echo date('Y-m-d'); ?>">
					                                    <span class="help-block text-danger"></span>
					                                </div>
		                    					</div>
		                    					<!-- Users profile picture -->
					                    		<div class="form-group" id="show_profile">
					                               <label class="control-label col-md-12 pt-2">Profile Photo</label>
					                                <div class="col-md-12 mb-3">
			                                            <img src="<?=base_url('uploads/users/nophoto.jpg'); ?>" class="img-center" id="viewUserProfile">
					                                </div>
					                            </div>
					                    	    <div class="form-group">
					                                <label class="control-label col-md-12">Profile Picture</label>
					                                <div class="col-md-12">
					                                   <input  type="file" name="photo" onchange="previewImage();" class="form-control" accept=".jpg, .jpeg, .png" readonly id="UserProfile">
					                                    <span class="help-block text-danger"></span>
					                                </div>
					                          </div>
                				   			</div>
		                			    </div>
		                			</div>
		                		</div>
	                    </form>
	                </div>
	                <div class="modal-footer card-footer">
	                    <div class="form-data mt-2 d-flex">
	                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <script type="text/javascript">
		    var save_method; //for save method string
		    var table;
		    var base_url = '<?php echo base_url(); ?>';
		    $(document).ready(function (){
		    	$('#accountsNav').addClass('active');
		        $('#table').DataTable({
		            "processing": true,
		            "serverSide": true, 
		            "order": [], 
		            'lengthChange': true,
		            "pageLength" : 25,
		            "language": {
		                processing: "<img src='<?php echo base_url(); ?>assets/images/6.gif' height=30px width=30px>"
		            },
		            dom: 'lBfrtip',
		            buttons: [
		                {
		                    text: '<i class="fa fa-refresh"></i>',
		                    className: "btn btn-primary",
		                    titleAttr: 'Reload Table Data',
		                    action: function () {
		                        reload_table()
		                    }
		                },
		                {
		                    extend: 'excel',
		                    className: 'btn btn-success',
		                    titleAttr: 'Export Excel Data',
		                    text: '<i class="fa fa-file-excel-o"></i>',
		                    filename: 'Member Information',
		                    extension: '.xlsx',
		                    exportOptions: {
		                        columns: [0,1,2,3,4,5]
		                    },
		                },
		                {
		                    extend: 'csv',
		                    className: 'btn btn-primary',
		                    titleAttr: 'Export CSV Data',
		                    text: '<i class="fa fa-bars"></i>',
		                    filename: 'Member Information',
		                    extension: '.csv',
		                    exportOptions: {
		                        columns: [0,1,2,3,4,5]
		                    },
		                },
		                {
		                    extend: 'print',
		                    title: "<h3 class='text-center'><?=$this->systemdata->sname; ?></h3><h4 class='text-center'>Member Information</h4><h5 class='text-center'>Printed On <?php echo date('l, d F, Y'); ?></h5>",
		                    exportOptions: {
		                        columns: [0,1,2,3,4,5]
		                    },

		                    customize: function (win) {
		                        $(win.document.body)
		                        .css('font-size', '10pt')
		                        .prepend(
	                             '<img src="<?php echo base_url('uploads/logo/'.$this->systemdata->sphoto); ?>" style="position:absolute; top:0; left:0;width:100px;height:100px;" />'
	                            );
		                        $(win.document.body).find('table')
		                        .addClass('compact')
		                        .css('font-size', 'inherit');
		                    },

		                    className: 'btn btn-success',
		                    titleAttr: 'Print Table Data',
		                    text: '<i class="fa fa-print"></i>',
		                    filename: 'Member Information'
		                },
		            ],
		            responsive: true,
		            // Load data for the table's content from an Ajax source
		            "ajax": {
		                "url": "<?php echo base_url('admin/accounts/generate_member');?>",
		                "type": "POST"
		            },

		            //Set column definition initialisation properties.
		            "columnDefs": [
		                {"targets": [0], "orderable": false},{"targets": [1], "orderable": false},
		                {"targets": [7], "orderable": false},
		            ],

		        });

		        //set input/textarea/select event when change value, remove program error and remove text help block 
		        $("input").change(function () {
		            $(this).parent().parent().removeClass('has-error');
		            $(this).next().empty();
		        });

		        $("select").change(function(){
		            $(this).parent().parent().removeClass('has-error');
		            $(this).next().empty();
		        });

		        //check all
		        $("#check-all").click(function () {
		            $(".data-check").prop('checked', $(this).prop('checked'));
		        });

		    });
			
			function previewImage() {
	            var oFReader = new FileReader();
	            oFReader.readAsDataURL(document.getElementById("UserProfile").files[0]);
	            oFReader.onload = function (oFREvent) {
	            document.getElementById("viewUserProfile").src = oFREvent.target.result;
	            };
	        };

	        //previewuserProfileImage
	        function previewStaffProfileImage() {
	            var oFReader = new FileReader();
	            oFReader.readAsDataURL(document.getElementById("UserProfile").files[0]);
	            oFReader.onload = function (oFREvent) {
	            document.getElementById("viewUserProfile").src = oFREvent.target.result;
	            };
	        };


			function reload_table(){
		        $('#table').DataTable().ajax.reload();
		        /* This is to uncheck the column header check box */
		        $('input[type=checkbox]').each(function ()
		        {
		            this.checked = false;
		        });
		    }

		    function add_member(){
		        save_method = 'add';
		        $('#form')[0].reset(); // reset form on modals
		        $('.form-group').removeClass('has-error'); // clear error program
		        $('.help-block').empty(); // clear error string
		        $('#modal_form').modal('show'); // show bootstrap modal
		        $('.modal-title').text('Add New Member'); 
		        $('#btnSave').text('Add');
		    }

		    function update_member(id) {
		        save_method = 'update';
		        $('#form')[0].reset(); // reset form on modals
		        $('.form-group').removeClass('has-error'); // clear error program
		        $('.help-block').empty(); // clear error string
		        //Ajax Load data from ajax
		        $.ajax({
		             url: "<?php echo base_url('admin/accounts/get_records_by_member_id');?>/" + id,
		             type: "GET",
		             dataType: "JSON",
		             success: function (data){
		                $('[name="Mid"]').val(data.id);
		                $('[name="member_id"]').val(data.member_id);
		                $('[name="member_name"]').val(data.name);
		                $('[name="birthday"]').val(data.birthday);
		                $('[name="sex"]').val(data.sex);
		                $('[name="address"]').val(data.address);
		                $('[name="contact"]').val(data.phone);
		                $('[name="nok_name"]').val(data.nok_name);
		                $('[name="nationality"]').val(data.nationality);
		                $('[name="nok_contact"]').val(data.nok_contact);
		                $('[name="username"]').val(data.username);
		                $('#modal_form').modal('show'); 
		                $('[name="designation"]').val(data.designation);
		                $('[name="join_date"]').val(data.join_date);
		                $('.modal-title').text("Update " +data.name+ " Records"); 
		                $('#btnSave').text('Update');
		                // show-profile photo
		                if (data.photo){
		                  $('#show_profile div').html('<img src="'+base_url+'uploads/members/'+data.photo+'" class="img-center" style="width:100px;height:100px">');
		                }else{
		                	$('#show_profile div').html('<img src="'+base_url+'/updoads/users/nophoto.jpg" class="img-center">');
		                }
		            },
		            error: function (jqXHR, textStatus, errorThrown)
		            {
		                swal("Error Occured!", "Role Record couldnot be displayed Now!", "error");
		            }
		        });
		    }

		    function save_member(){
		        if (save_method == 'add') {
		            $('#btnSave').text('adding...');
		        }else{
		            $('#btnSave').text('updating...');
		        }
		       
		        $('#btnSave').attr('disabled', true); //set button disable 
		        var url;
		        if (save_method == 'add') {
		            url = "<?php echo base_url('admin/accounts/add_new_member');?>";
		        } else {
		            url = "<?php echo base_url('admin/accounts/update_member_records');?>";
		        }
		        // ajax adding data to database
		        var formData = new FormData($('#form')[0]);
		        $.ajax({
		            url: url,
		            type: "POST",
		            data: formData,
		            contentType: false,
		            processData: false,
		            dataType: "JSON",
		            success: function (data)
		            {

		                if (data.status)
		                {
		                    $('#modal_form').modal('hide');
		                    //refresh all the table
		                    reload_table();
		                    if (save_method == 'add') {
		                        swal("Member Added!", "New Member has been added Successfully!", "success");
		                    } else {

		                        swal("Member Updated!", "Member Records Updated Successfully!", "success");
		                    }
		                }else if(data === 'member_id_exists'){
		                    swal("Sorry, Member ID Exist!", "New Member ID already Taken!", "error");
		                    
		                }else if(data === 'contact_exists'){
		                	swal("Sorry, Number Exist!", "Phone nuber is already taken, Try another Please!", "error");
		                }else if(data === 'username_exist'){
		                	swal("Sorry, Username Exist!", "Username already taken.  Try Ahain!", "error");
		                } else if (data === "access_denied") {
		                    if (save_method == 'add') {
		                        swal("Access Denied!", "You're not Authorized to create any new Member!", "error");
		                    } else {
		                        swal("Access Denied!", "You're not Authorized to update any Member!", "error");
		                    }
		                } else
		                {
		                    for (var i = 0; i < data.inputerror.length; i++)
		                    {
		                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group faculty and add has-error faculty
		                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block faculty set text error string
		                    }
		                }

		                if (save_method == 'add') {
		                    $('#btnSave').text('Add');
		                    $('#btnSave').attr('disabled', false); //set button enable 
		                }else{
		                    $('#btnSave').text('Update');
		                    $('#btnSave').attr('disabled', false); //set button enable 
		                }
		            },
		            error: function (jqXHR, textStatus, errorThrown)
		            {
		                if (save_method == 'add') {
		                    swal("Error Occured!", "New Member Records couldn't be Added!", "error");
		                    $('#btnSave').text('Add'); //change button text
		                    $('#btnSave').attr('disabled', false); //set button enable  
		                }else{
		                    swal("Error Occured!", "Member Records couldn't be Update!", "error");
		                    $('#btnSave').text('Update'); //change button text
		                    $('#btnSave').attr('disabled', false); //set button enable  
		                }
		            }
		        });
		    }

		    function view_member(member_id) {
		    	//Ajax Load data from ajax
		        $.ajax({
		            url: "<?php echo base_url('admin/accounts/get_records_by_member_id') ?>/" + member_id,
		            type: "GET",
		            dataType: "JSON",
		            success: function (data){
		            	 $('[name="Mid"]').val(data.id);
		                $('[name="member_id"]').val(data.member_id);
		                $('[name="member_name"]').val(data.name);
		                $('[name="birthday"]').val(data.birthday);
		                $('[name="sex"]').val(data.sex);
		                $('[name="address"]').val(data.address);
		                $('[name="contact"]').val(data.phone);
		                $('[name="nok_name"]').val(data.nok_name);
		                $('[name="nationality"]').val(data.nationality);
		                $('[name="roleid"]').val(data.roleid);
		                $('[name="nok_contact"]').val(data.nok_contact);
		                $('[name="username"]').val(data.username);
		                $('#view_modal_form').modal('show'); 
		                $('[name="designation"]').val(data.designation);
		                $('[name="join_date"]').val(data.join_date);
		                $('.modal-title').text("View " +data.name+ " Records"); 
		                // show-profile photo
		                if (data.photo){
		                  $('#show_profile div').html('<img src="'+base_url+'uploads/members/'+data.photo+'" class="img-center" style="width:100px;height:100px">');
		                }else{
		                	$('#show_profile div').html('<img src="'+base_url+'/updoads/users/nophoto.jpg" class="img-center">');
		                }
		            },
		            error: function (jqXHR, textStatus, errorThrown)
		            {
		                swal("Error Occured!", "Member Records couldnot be viewed Now!", "error");
		            }
		        });
		    }

		    function delete_member(memberid,member_name){
		        swal({
		            title: "Are you sure?",
		            text: "Your will not be able to recover "+member_name+" Records!",
		            type: "warning",
		            showCancelButton: true,
		            confirmButtonClass: "btn-danger",
		            confirmButtonText: "Yes, delete!",
		            cancelButtonText: "No, cancel",
		            closeOnConfirm: false
		        },
		        function(){
		            $.ajax({
		                url: "<?php echo base_url('admin/accounts/delete_member_record') ?>/" + memberid,
		                type: "POST",
		                dataType: "JSON",
		                success: function (data)
		                {
		                    if (data.status) {
		                        swal("Member Deleted!",member_name+" Records deleted successfully!", "success");
		                        //if success reload ajax table
		                        reload_table();
		                    }else{
		                        swal("Access Denied!", "You're not Authorized to delete any Record!", "error");
		                    }
		                },
		                error: function (jqXHR, textStatus, errorThrown){
		                  swal("Error Occured!", "Sorry, An error has Occured. Please Try Again!", "error");
		                }
		            });
		        });
		    }

		    function bulk_delete(){
		        var list_id = [];
		        $(".data-check:checked").each(function () {
		            list_id.push(this.value);
		        });
		        if (list_id.length > 0)
		        {
		            swal({
		                title: 'Are you sure, delete ' + list_id.length + ' record(s)?',
		                text: "You will not be able to recover selected record(s)!",
		                type: "warning",
		                showCancelButton: true,
		                confirmButtonClass: "btn-danger",
		                confirmButtonText: "Yes, delete",
		                cancelButtonText: "No, cancel",
		                closeOnConfirm: false,
		                closeOnCancel: false
		            },
		            function (isConfirm) {
		                if (isConfirm) {
		                    $.ajax({
		                        type: "POST",
		                        data: {id: list_id},
		                        url: "<?php echo site_url('admin/accounts/bulk_member_delete');?>",
		                        dataType: "JSON",
		                        success: function (data){
		                            if (data.status)
		                            {
		                                swal("Member  Deleted!", "Selected Member Records deleted successfully!", "success");
		                                //if success reload ajax table
		                                reload_table();
		                            } else
		                            {
		                               swal("Access Denied!", "You're not Authorized to delete any Record!", "error");
		                            }
		                        },
		                        error: function (jqXHR, textStatus, errorThrown)
		                        {
		                            swal("Error Occured!", "Sorry, An error has Occured. Please Try Again!", "error");
		                        }
		                    });
		                } else {
		                    swal("Cancelled!", "Selected Member Records are NOT deleted!", "error");
		                }
		            });
		        } else
		        {
		            swal("Sorry!", "Atleast select one record to complete this process!", "error");
		        }
		    }
		</script>
