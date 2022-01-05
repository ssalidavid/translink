<style type="text/css">
	
	.modal-content,.modal-body{
        color: #000;
        width: 800px;
	}
	.modal-body{
		background-color: #1bd2be;
	}
	.img-center{
		height: 180px; 
		width: 180px;
	}
	.modal-header,.modal-footer{
		 width: 800px;
	}
	input[type="file"],input[type="text"],input[type="date"],
	select[name="sex"],select[name="role"],select[name="status"]{
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
		                <h1 class="text-infos py-4 pl-3tea py-2">USERS INFORMATION
		                </h1> 
		            </header>
	              	<div class="panel-body">
	               		<div class="table-responsive">
	               		   <table id="table" class="table table-striped table-bordered table-hover" 
	               		       width="100%">
	               				<thead>
	               					<tr>
	               						<th class="text-center"><input type="checkbox" id="check-all"></th>
	               						<th>S.NO</th>
	               						<th>Name</th>
	               						<th>Member ID</th>
	               						<th>Status</th>
	               						<th>Phone</th>
	               						<th>Photo</th>
	               						<th>Actions</th>
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
	                    <h3 class="modal-title text-primary"></h3>
	                </div>
	                <div class="modal-body card-body bg-info">
	                    <form action="#" id="form">
	                    	<input type="hidden" name="uid">
	                    	<div class="row">
	                    		<div class="col-md-8">
	                    			<div class="row">
	                    				<div class="col-md-6">
	                    					<div class="form-group">
		                						<label class="control-label col-md-12">Member Name</label>
				                                <div class="col-md-12">
				                                    <input name="user_name" placeholder="Member Name" class="form-control" type="text" required>
				                                    <span class="help-block text-danger"></span>
				                                </div>
		                					</div>
	                    				</div>
	                    				<div class="col-md-6">
		                				    <div class="form-group">
                    						    <label class="control-label col-md-12">Member ID</label>
				                                <div class="col-md-12">
				                                	<input type="text" name="umember_id" class="form-control" placeholder="Member ID">
				                                    <span class="help-block text-danger"></span>
				                                </div>
		                                    </div>
	                    				</div>
	                    			</div>
	                    			<div class="row">
	                    				<div class="col-md-6">
	                    					<div class="form-group">
	                    						<label class="control-label col-md-12">Phone Number</label>
				                                <div class="col-md-12">
				                                  <input type="text" name="uphone" class="form-control" placeholder="Phone Number">
				                                  <span class="help-block text-danger"></span>
				                                </div>
	                    					</div>
	                    				</div>
	                    				<div class="col-md-6">
	                    					<div class="form-group">
		                						<label class="control-label col-md-12">Status</label>
				                                <div class="col-md-12">
				                                    <select class="form-control" name="status" required>
				                                		<option value="">Select Status</option>
				                                    	<option value="active">Active</option>
				                                    	<option value="inactive">Inactive</option>
				                                	</select>
				                                    <span class="help-block text-danger"></span>
				                                </div>
		                					</div>
	                    				</div>
	                    			</div>
	                    			<div class="row">
	                    				<div class="col-md-6">
	                    					<div class="form-group">
		                						<label class="control-label col-md-12">Role</label>
				                                <div class="col-md-12">
				                                    <select class="form-control" name="role">
					                                		<option value="">Select Role Name</option>
					                                		<?php foreach ($roles as $row) :?>
														      <option value="<?php echo $row->role_id;?>">
														      	<?php echo $row->name;?>
														      </option>
											      			<?php endforeach ?>
					                                  </select>
				                                    <span class="help-block text-danger"></span>
				                                </div>
		                					</div>
	                    				</div>
	                    				<div class="col-md-6">
	                    					<div class="form-group">
	                    						<label class="control-label col-md-12">Registered Date</label>
					                            <div class="col-md-12">
					                                <input name="registered_date" placeholder="Registered Date" class="form-control" type="text" required readonly>
					                                <span class="help-block text-danger"></span>
					                            </div>
	                    					</div>
	                    				</div>
	                    			</div>
	                    		</div>
	                    		<div class="col-md-4">
	                    			<div id="photo_preview" class="form-group">
	                                    <label class="control-label col-md-12">Photo Preview</label>
	                                    <div class="col-md-12">
	                                        <img src="<?=base_url('uploads/users/nophoto.jpg'); ?>" style="height: 120px; width: auto;" class="img-center img-thumbnail" id="view_photo">
	                                    </div>
	                                </div>

	                                <div class="form-group">
	                                    <label id="photo_preview_label" class="control-label col-md-12">Browse Photo Preview</label>
	                                    <div class="col-md-12">
	                                        <input class="form-control" type="file" name="photo" id="photo" accept=".jpg, .jpeg, .png" onchange="previewImage();">
	                                        <span class="help-block text-danger"></span>
	                                    </div>
	                                </div>
	                    		</div>
	                    	</div>
	                    </form>
	                </div>
	                <div class="modal-footer card-footer">
	                    <div class="form-data mt-2 d-flex">
	                       <button type="button" id="btnSave" onclick="save_user()" class="btn btn-primary"></button>
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
	                    <h3 class="modal-title text-primary"></h3>
	                </div>
	                <div class="modal-body card-body bg-info">
	                        <form action="#" id="viewform">
	                    	<input type="hidden" name="uid">
	                    	<div class="row">
	                    		<div class="col-md-8">
	                    			<div class="row">
	                    				<div class="col-md-6">
	                    					<div class="form-group">
		                						<label class="control-label col-md-12">Member Name</label>
				                                <div class="col-md-12">
				                                    <input name="vuser_name" placeholder="Member Name" class="form-control" type="text" readonly>
				                                </div>
		                					</div>
	                    				</div>
	                    				<div class="col-md-6">
		                				    <div class="form-group">
                    						    <label class="control-label col-md-12">Member ID</label>
				                                <div class="col-md-12">
				                                	<input type="text" name="vumember_id" class="form-control" placeholder="Member ID" readonly>
				                                </div>
		                                    </div>
	                    				</div>
	                    			</div>
	                    			<div class="row">
	                    				<div class="col-md-6">
	                    					<div class="form-group">
	                    						<label class="control-label col-md-12">Phone Number</label>
				                                <div class="col-md-12">
				                                  <input type="text" name="vuphone" class="form-control" placeholder="Phone Number" readonly>
				                                </div>
	                    					</div>
	                    				</div>
	                    				<div class="col-md-6">
	                    					<div class="form-group">
		                						<label class="control-label col-md-12">Status</label>
				                                <div class="col-md-12">
				                                	<input type="text" name="vstatus" class="form-control" placeholder="Status" readonly>
				                                </div>
		                					</div>
	                    				</div>
	                    			</div>
	                    			<div class="row">
	                    				<div class="col-md-6">
	                    					<div class="form-group">
		                						<label class="control-label col-md-12">Role</label>
				                                <div class="col-md-12">
				                                    <select class="form-control" name="vrole" readonly>
				                                		<option value="">Select Role Name</option>
				                                		<?php foreach ($roles as $row) :?>
													      <option value="<?php echo $row->role_id;?>">
													      	<?php echo $row->name;?>
													      </option>
										      			<?php endforeach ?>
				                                  </select>
				                                </div>
		                					</div>
	                    				</div>
	                    				<div class="col-md-6">
	                    					<div class="form-group">
	                    						<label class="control-label col-md-12">Registered Date</label>
					                            <div class="col-md-12">
					                                <input name="vregistered_date" placeholder="Registered Date" class="form-control" type="text" required readonly>
					                            </div>
	                    					</div>
	                    				</div>
	                    			</div>
	                    		</div>
	                    		<div class="col-md-4">
	                    			<div id="vphoto_preview" class="form-group">
	                                    <label class="control-label col-md-12">Photo Preview</label>
	                                    <div class="col-md-12">
	                                        <img src="<?=base_url('uploads/users/nophoto.jpg'); ?>" style="height: 120px; width: auto;" class="img-center img-thumbnail" id="view_photo">
	                                    </div>
	                                </div>

	                                <div class="form-group">
	                                    <label class="control-label col-md-12">Registered Time</label>
	                                    <div class="col-md-12">
	                                        <input class="form-control" type="text" name="vtime" readonly>
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
	    <!-- send password bootstrap modal -->
		<div id="create_modal_form" class="modal fade" role="dialog">
	        <div class="modal-dialog modal-md">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <button aria-hidden="true" data-dismiss="modal" class="close text-white" type="button">&times;</button>
	                    <h3 class="modal-title text-primary"></h3>
	                </div>
	                <div class="modal-body card-body bg-info">
                        <form action="#" id="send_form">
                    		<input type="hidden" name="uid">
                    		<input type="hidden" name="vname">
                    		<input type="hidden" name="vphone">
	                    	<div class="row">
                				<div class="col-md-6">
                				    <div class="form-group">
            						    <label class="control-label col-md-12">Member ID</label>
		                                <div class="col-md-12">
		                                	<input type="text" name="vmember_id" class="form-control" placeholder="Member ID" readonly>
		                                </div>
                                    </div>
                				</div>
                				<div class="col-md-6">
                					<div class="form-group">
                						<label class="control-label col-md-12">Password</label>
		                                <div class="col-md-12">
		                                    <input name="vpassword" placeholder="Password" class="form-control" type="password" readonly>
		                                </div>
                					</div>
                				</div>
                			</div>
	                    </form>
	                </div>
	                <div class="modal-footer card-footer">
	                    <div class="form-data mt-2 d-flex">
	                    	<button type="button" id="Save" onclick="send_password()" class="btn btn-primary"><i class="fa fa-key"></i> Send Password</button>
	                       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- js and ajax -->
	      <script type="text/javascript">
		    var save_method; //for save method string
		    var table;
		    var base_url = '<?php echo base_url(); ?>';
		    $(document).ready(function (){
		    	$('#usersNav').css('background-color','teal');
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
		                    text: '<i class="fa fa-trash"></i> Bulk Delete',
		                    className: "btn btn-danger",
		                    titleAttr: 'Bulk Delete',
		                    action: function () {
		                        bulk_delete();
		                    }
		                },
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
		                    filename: 'User Informatio',
		                    extension: '.xlsx',
		                    exportOptions: {
		                        columns: [1,2,3,4,5]
		                    },
		                },
		                {
		                    extend: 'csv',
		                    className: 'btn btn-primary',
		                    titleAttr: 'Export CSV Data',
		                    text: '<i class="fa fa-bars"></i>',
		                    filename: 'User Informatio',
		                    extension: '.csv',
		                    exportOptions: {
		                        columns: [1,2,3,4,5]
		                    },
		                },
		                {
		                    extend: 'print',
		                    title: "<h3 class='text-center'><?=$this->systemdata->sname; ?></h3><h4 class='text-center'>User Informatio</h4><h5 class='text-center'>Printed On <?php echo date('l, d F, Y'); ?></h5>",
		                    exportOptions: {
		                        columns: [1,2,3,4,5]
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
		                    filename: 'User Information'
		                },
		            ],
		            responsive: true,
		            // Load data for the table's content from an Ajax source
		            "ajax": {
		                "url": "<?php echo base_url('admin/users/generate_user');?>",
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

	        function previewuserProfileImage() {
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

		    function add_user(){
		        save_method = 'add';
		        $('#form')[0].reset(); // reset form on modals
		        $('.form-group').removeClass('has-error'); // clear error user		        $('.help-block').empty(); // clear error string
		        $('#modal_form').modal('show'); // show bootstrap modal
		        $('.modal-title').text('Add New User'); 
		        $('#btnSave').text('Add');
		    }

		    function update_user(id) {
		        save_method = 'update';
		        $('#form')[0].reset(); // reset form a modal
		        $('.form-group').removeClass('has-error'); // clear error user
		        $('.help-block').empty(); // clear error string
		        //Ajax Load data from ajax
		        $.ajax({
		             url: "<?php echo base_url('admin/users/get_records_user_by_id');?>/" + id,
		             type: "GET",
		             dataType: "JSON",
		             success: function (data){
		             	$('[name="uid"]').val(data.id);
		                $('[name="role"]').val(data.role);
		                $('[name="status"]').val(data.status);
		                $('[name="user_name"]').val(data.name);
		                $('[name="uphone"]').val(data.phone);
		                $('[name="umember_id"]').val(data.member_id);
		                $('#modal_form').modal('show'); 
		                $('[name="registered_date"]').val(data.jdate+' '+data.created_at);
		                $('.modal-title').text("Update " +data.name+ " Records"); 
		                $('#btnSave').text('Update');
		                $('#photo_preview').show();
		                if(data.photo){
		                    $('#photo_preview_label').text('Change Photo Preview');
		                    $('#photo_preview div').html('<img id="view_photo" src="'+base_url+'uploads/users/'+data.photo+'" class="img-fluid" style="width:auto; height: 120px;">'); // show photo
		                }else{
		                    $('#photo_preview_label').text('Upload Photo Preview'); 
		                    $('#photo_preview div').html('<img src="<?=base_url('uploads/users/nophoto.jpg'); ?>" class="img-fluid thumbnail" alt="Book Preview" style="width:auto; height: 120px;">');
		                }
		            },
		            error: function (jqXHR, textStatus, errorThrown)
		            {
		                swal("Error Occured!", "User Record couldnot be displayed Now!", "error");
		            }
		        });
		    }

		    function save_user(){
		        if (save_method == 'add') {
		            $('#btnSave').text('adding...');
		        }else{
		            $('#btnSave').text('updating...');
		        }
		       
		        $('#btnSave').attr('disabled', true); //set button disable 
		        var url;
		        if (save_method == 'add') {
		            url = "<?php echo base_url('admin/users/add_new_users');?>";
		        } else {
		            url = "<?php echo base_url('admin/users/update_user_records_by_id');?>";
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
		                        swal("User Added!", "New User has been added Successfully!", "success");
		                    } else {

		                        swal("User Updated!", "User Records Updated Successfully!", "success");
		                    }
		                }else if(data === 'user_name_exists'){
		                    swal("Sorry, User Name Exist!", "User already Taken!", "error");
		                    
		                }else if(data === 'contact_exists'){
		                	swal("Sorry, Number Exist!", "Phone nuber is already taken, Try another Please!", "error");
		                }else if(data === 'member_id_exists'){
		                	swal("Sorry,Email Exist!", "This Email Address already Exist,Please try with another name!", "error");
		                } else if (data === "access_denied") {
		                    if (save_method == 'add') {
		                        swal("Access Denied!", "You're not Authorized to create any new User!", "error");
		                    } else {
		                        swal("Access Denied!", "You're not Authorized to update any User!", "error");
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
		                    swal("Error Occured!", "New User Records couldn't be Added!", "error");
		                    $('#btnSave').text('Add'); //change button text
		                    $('#btnSave').attr('disabled', false); //set button enable  
		                }else{
		                    swal("Error Occured!", "User Records couldn't be Update!", "error");
		                    $('#btnSave').text('Update'); //change button text
		                    $('#btnSave').attr('disabled', false); //set button enable  
		                }
		            }
		        });
		    }

		    function view_user(user_id) {
		    	//Ajax Load data from ajax
		        $.ajax({
		            url: "<?php echo base_url('admin/users/get_records_user_by_id') ?>/" + user_id,
		            type: "GET",
		            dataType: "JSON",
		            success: function (data){
		            	$('[name="uid"]').val(data.id);
		                $('[name="vrole"]').val(data.role);
		                $('[name="vstatus"]').val(data.status);
		                $('[name="vuser_name"]').val(data.name);
		                $('[name="vuphone"]').val(data.phone);
		                $('[name="vumember_id"]').val(data.member_id);
		                $('#view_modal_form').modal('show'); 
		                $('[name="vregistered_date"]').val(data.jdate);
		                $('[name="vtime"]').val(data.created_at);
		                $('.modal-title').text("View " +data.name+ " Records");
		                $('#photo_preview').show();
		                if(data.photo){
		                    $('#vphoto_preview div').html('<img id="view_photo" src="'+base_url+'uploads/users/'+data.photo+'" class="img-fluid" style="width:auto; height: 120px;">'); // show photo
		                }else{
		                    $('#vphoto_preview div').html('<img src="<?=base_url('uploads/users/nophoto.jpg'); ?>" class="img-fluid thumbnail" alt="Book Preview" style="width:auto; height: 120px;">');
		                }
		            },
		            error: function (jqXHR, textStatus, errorThrown)
		            {
		                swal("Error Occured!", "User Records couldnot be viewed Now!", "error");
		            }
		        });
		    }

		    function view_password(id){
		        save_method = 'send_password';
		        $('#send_form')[0].reset(); // reset form on modals
		        $('.form-group').removeClass('has-error'); // clear error class
		        $('.help-block').empty(); // clear error string

		        $.ajax({
		            url: "<?php echo base_url('admin/users/get_records_user_by_id') ?>/" + id,
		            type: "GET",
		            dataType: "JSON",
		            success: function (data)
		            {
		                $('[name="vphone"]').val(data.phone);
		                $('[name="vname"]').val(data.name);
		                $('[name="vpassword"]').val(data.password);
		                $('[name="vmember_id"]').val(data.member_id);
		                $('#create_modal_form').modal('show'); 
		                $('.modal-title').text("Send Password to "+data.name+" on "+data.phone); 
		            },
		            error: function (jqXHR, textStatus, errorThrown)
		            {
		                swal("Error Occured!", "Send User Password couldn't be sent now!", "error");
		            }
		        });
		    }

		    function send_password(){
		        $('#Save').text('sending...'); 
		        $('#Save').attr('disabled',true);
		        var url;
		        if(save_method == 'send_password') {
		            url = "<?php echo site_url('admin/users/send_password_via_sms')?>";
		        }
		        // ajax adding data to database
		        $.ajax({
		            url : url,
		            type: "POST",
		            data: $('#send_form').serialize(),
		            dataType: "JSON",
		            success: function(data)
		            {

		                if(data.status) //if success close modal and reload ajax table
		                {
		                    $('#create_modal_form').modal('hide');
		                    reload_table();
		                    if (save_method == 'send_password') {
		                        swal("Message Sent!", "Login Details has been sent successfully!", "success");
		                    }
		                }else if (data === "not_sent") {
		                	swal("Message Not Sent","Login Credential was not sent may be due to Internet!","error");
		                }
		                else
		                {
		                    for (var i = 0; i < data.inputerror.length; i++) 
		                    {
		                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
		                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
		                    }
		                }
		                $('#Save').text('Send Password'); 
		                $('#Save').attr('disabled',false); 

		            },
		            error: function (jqXHR, textStatus, errorThrown)
		            {
		                swal("Sorry!", "Check your Internet Connection!", "error");
		                $('#Save').text('Send Password'); 
		                $('#Save').attr('disabled',false); 

		            }
		        });
		    }

		    function delete_user(userid,user_name){
		        swal({
		            title: "Are you sure?",
		            text: "Your will not be able to recover "+user_name+" Records!",
		            type: "warning",
		            showCancelButton: true,
		            confirmButtonClass: "btn-danger",
		            confirmButtonText: "Yes, delete!",
		            cancelButtonText: "No, cancel",
		            closeOnConfirm: false
		        },
		        function(){
		            $.ajax({
		                url: "<?php echo base_url('admin/users/delete_user_record') ?>/" + userid,
		                type: "POST",
		                dataType: "JSON",
		                success: function (data)
		                {
		                    if (data.status) {
		                        swal("User Deleted!",user_name+" Records deleted successfully!", "success");
		                        //if success reload ajax table
		                        reload_table();
		                    }else if (data === "admin_role") {
		                    	swal("Admin Role!","Admin Role is Not allowed to be Deleted!","error");
		                    } else{
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
		                        url: "<?php echo site_url('admin/users/bulk_user_delete');?>",
		                        dataType: "JSON",
		                        success: function (data){
		                            if (data.status)
		                            {
		                                swal("User Deleted!", "Selected User Records deleted successfully!", "success");
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
		                    swal("Cancelled!", "Selected User Records are NOT deleted!", "error");
		                }
		            });
		        } else
		        {
		            swal("Sorry!", "Atleast select one record to complete this process!", "error");
		        }
		    }

		    function previewImage() {
		        var oFReader = new FileReader();
		        oFReader.readAsDataURL(document.getElementById("photo").files[0]);
		        oFReader.onload = function (oFREvent) {
		            document.getElementById("view_photo").src = oFREvent.target.result;
		        };
		    };
		</script>
