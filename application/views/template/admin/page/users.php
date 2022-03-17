<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Users</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Settings</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Users</a>
							</li>
						</ul>
					</div>
					<div class="row">

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Add User</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Add User
										</button>
									</div>
								</div>
								<div class="card-body">
									<!-- Modal AddData-->
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														New</span> 
														<span class="fw-light">
															User
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<!-- <p class="small">Create a new row using this form, make sure you fill them all</p> -->
													<form>
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Name</label>
																	<input id="addName" name="addName" type="text" class="form-control" placeholder="nama" required>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Role</label>
																		<select name="addRole" id="addRole" class="form-control" required>
							                                                <option >-Pilih-</option>
							                                                <option value="1">Admin</option>
							                                                <option value="2">Dosen</option>
							                                                <option value="3">Mahasiswa/i</option>
							                                             </select>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Username</label>
																	<input id="addUsername" name="addUsername" type="text" class="form-control" placeholder="username" required>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Password</label>
																	<input id="addPassword" name="addPassword" type="password" class="form-control" autocomplete="off" required>
																</div>
															</div>
															<!-- <div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Position</label>
																	<input id="addPosition" type="text" class="form-control" placeholder="fill position">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Office</label>
																	<input id="addOffice" type="text" class="form-control" placeholder="fill office">
																</div>
															</div> -->
														</div>
													</form>
												</div>
												<div class="modal-footer no-bd">
													<button type="button" id="addRowButton" class="btn btn-primary">Add</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
									<!-- Modal EditData -->
									<div class="modal fade" id="editRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Edit</span> 
														<span class="fw-light">
															User
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<!-- <p class="small">Create a new row using this form, make sure you fill them all</p> -->
													<form>
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Name</label>
																	<input id="editId" name="editId" type="hidden" class="form-control" readonly>
																	<input id="editName" name="editName" type="text" class="form-control" placeholder="nama" required>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Role</label>
																		<select name="editRole" id="editRole" class="form-control" required>
							                                                <option disabled>-Pilih-</option>
							                                                <option value="1">Admin</option>
							                                                <option value="2">Dosen</option>
							                                                <option value="3">Mahasiswa/i</option>
							                                             </select>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Username</label>
																	<input id="editUsername" name="editUsername" type="text" class="form-control" placeholder="username" required>
																</div>
															</div>
														</div>
													</form>
												</div>
												<div class="modal-footer no-bd">
													<button type="button" id="editRowButton" class="btn btn-primary">Edit</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
									<!-- Modal Edit Password -->
									<div class="modal fade" id="editPassRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Edit</span> 
														<span class="fw-light">
															Password
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<!-- <p class="small">Create a new row using this form, make sure you fill them all</p> -->
													<form>
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>New Password</label>
																	<input id="editPassId" name="editPassId" type="hidden" class="form-control" readonly>
																	<input id="editPass" name="editPass" type="password" class="form-control" placeholder="password" required>
																</div>
															</div>
														</div>
													</form>
												</div>
												<div class="modal-footer no-bd">
													<button type="button" id="editPassRowButton" class="btn btn-primary">Edit</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>#</th>
					                                <th>Nama</th>
					                                <th>Username</th>
					                                <th>role</th>
					                                <th>Status</th>
					                                <th>Role ID</th>
					                                <th>Aktif</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody id="show_data">
												<!-- <?php //$i=1; foreach($user as $row): ?>
												<tr>
													<td><?=$i++?></td>
					                                <td><?php //echo $row->nama; ?></td>
					                                <td><?php //echo $row->username; ?></td>
					                                <td><?php //echo $row->role; ?></td>
					                                <td><?php //echo $row->status; ?></td>
					                                <td><?php //echo $row->role_id; ?></td>
					                                <td><?php //echo $row->aktif; ?></td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>

															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</button>
														</div>
													</td>
												</tr>
												<?php //endforeach; ?> -->
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script src="<?php echo site_url('assets/js/core/jquery.3.2.1.min.js')?>"></script>
			<script src="<?php echo site_url('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')?>"></script>
			<script type="text/javascript">
				$(document).ready(function() {
					tampil_data();
					function tampil_data(){
		            $.ajax({
		                type  : 'GET',
		                url   : '<?php echo base_url()?>user/show_user',
		                async : true,
		                dataType : 'json',
		                success : function(data){
		                    var html = '';
		                    var i;
		                    for(i=0; i<data.length; i++){
		                    // var link = '<?php //echo base_url()?>menu/menu/roleAccess/'+data[i].id;
		                        html += '<tr>'+
		                                '<td>'+(i+1)+'</td>'+
		                                '<td>'+data[i].nama+'</td>'+
		                                '<td>'+data[i].username+'</td>'+
		                                '<td>'+data[i].role+'</td>'+
		                                '<td>'+data[i].status+'</td>'+
		                                '<td>'+data[i].role_id+'</td>'+
		                                '<td>'+data[i].aktif+'</td>'+
		                                '<td>'+
		                                    // '<a href="'+link+'" class="btn btn-primary btn-xs"><i class="fa fa-wrench"></i></a>'+' '+
		                                    '<div class="btn btn-group"><a href="javascript:;" data-toggle="tooltip" class="btn btn-link btn-primary btn-xs item_edit" data-original-title="Edit Task" data="'+data[i].id+'"><i class="fa fa-edit"></i></a>'+
		                                    '<a href="javascript:;" data-toggle="tooltip" class="btn btn-link btn-warning btn-xs item_edit_pass" data-original-title="Edit Task" data="'+data[i].id+'"><i class="fa fa-key"></i></a>'+' '+
		                                    '<a href="javascript:;" data-toggle="tooltip" class="btn btn-link btn-danger btn-xs item_hapus" data-original-title="Remove" data="'+data[i].id+'"><i class="fa fa-times"></i></a></div>'+
		                                '</td>'+
		                                '</tr>';
		                    }
		                    $('#show_data').html(html);
		                    $('#add-row').dataTable({
		                        "searching": false,
		                        "paging":   false,
		                        "bLengthChange": false,
		                        // "info":     false,
		                        "ordering": false,
		                    });
		                    $.fn.dataTable.ext.errMode = 'none';

		                }
		 
		            });
		        }
				// Add Row
					// $('#add-row').DataTable({
					// 	"pageLength": 5,
					// });

					// var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

					// $('#addRowButton').click(function() {
					// 	$('#add-row').dataTable().fnAddData([
					// 		$("#addName").val(),
					// 		$("#addPosition").val(),
					// 		$("#addOffice").val(),
					// 		action
					// 		]);
					// 	$('#addRowModal').modal('hide');

					// });
					$('#addRowButton').click(function(){
		            var name=$('#addName').val();
		            var role=$('#addRole').val();
		            var username=$('#addUsername').val();
		            var password=$('#addPassword').val();
		            
		            $.ajax({
		                type : "POST",
		                url  : "<?php echo base_url('user/simpan_user')?>",
		                dataType : "JSON",
		                data : {nama:name, username:username, password:password, role:role, <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
		                success: function(data){
		                	if (data=='gagal') {
		                		$('#addRowModal').modal('hide');
		                		$.notify({
									icon: 'flaticon-add-user',
									title: 'Gagal',
									message: 'Username sudah terdaftar!',
								},{
									type: 'danger',
									placement: {
										from: "top",
										align: "right"
									},
									time: 1000,
								});
		                	}else{
		                		$('#addPassword').val("");$('#addName').val("");$('#addUsername').val("");$('#addRole').val("");
			                    $('#addRowModal').modal('hide');
			                    tampil_data();
			                    $.notify({
									icon: 'flaticon-add-user',
									title: 'Success',
									message: 'Berhasil menambah data!',
								},{
									type: 'info',
									placement: {
										from: "top",
										align: "right"
									},
									time: 1000,
								});
		                	}
		                }
		            });
		            return false;
		       		});

		       		//GET HAPUS
			        $(document).on('click', '.item_hapus', function(){
			          var id = $(this).attr('data');
			          swal({
			              title: "Kamu Yakin?",
			              text: "Data akan terhapus.",
			              icon: "warning",
			              buttons: true,
			              dangerMode: true,
			            })
			            .then((willDelete) => {
			              if (willDelete) {
			                  $.ajax({
			                      url : "<?php echo base_url(); ?>user/hapus_user",
			                      method :"POST",
			                      data : {id:id, <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
			                      success : function(data){
			                          
			                          swal("Data berhasil dihapus!", {
			                          icon: "success",
			                          });
			                              tampil_data();
			                      },
			            
			                    })
			                  
			              } else {
			                swal("Hapus dibatalkan!");
			              }
			            });
			        });
			        //GET UPDATE
			        $('#show_data').on('click','.item_edit',function(){
			            var id=$(this).attr('data');
			            $.ajax({
			                type : "GET",
			                url  : "<?php echo base_url('user/get_user')?>",
			                dataType : "JSON",
			                data : {id:id},
			                success: function(data){
			                    $.each(data,function(id, menu){
			                        $('#editRowModal').modal('show');
			                        $('[name="editId"]').val(data.id);
			                        $('[name="editName"]').val(data.nama);
			                        // $('[name="editRole"]').val(data.role);
			                        $('[name="editRole"]').val(data.role_id).selected = 'selected';
			                        // $("#editRole option[value='1']").prop('selected',true);
			                        $('[name="editUsername"]').val(data.username);
			                    });
			                }
			            });
			            return false;
			        });
			        //Update User
			        $('#editRowButton').on('click',function(){
			            var id = $('#editId').val();
			            var name = $('#editName').val();
			            var role = $('#editRole').val();
			            var username = $('#editUsername').val();
			            $.ajax({
			                type : "POST",
			                url  : "<?php echo base_url('user/update_user')?>",
			                dataType : "JSON",
			                data : {id:id , name:name, username:username, role:role, <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
			                success: function(data){
			                    $('[name="editId"]').val("");
			                    $('[name="editName"]').val("");
			                    $('[name="editRole"]').val("");
			                    $('[name="editUsername"]').val("");
			                    $('#editRowModal').modal('hide');
			                    tampil_data();
			                    $.notify({
									icon: 'flaticon-add-user',
									title: 'Success',
									message: 'Berhasil melakukan perubahan data!',
								},{
									type: 'info',
									placement: {
										from: "top",
										align: "right"
									},
									time: 1000,
								});
			                }
			            });
			            return false;
			        });
			        //GET UPDATE Pass
			        $('#show_data').on('click','.item_edit_pass',function(){
			            var id=$(this).attr('data');
			            $.ajax({
			                type : "GET",
			                url  : "<?php echo base_url('user/get_user')?>",
			                dataType : "JSON",
			                data : {id:id},
			                success: function(data){
			                    $.each(data,function(id, menu){
			                        $('#editPassRowModal').modal('show');
			                        $('[name="editPassId"]').val(data.id);
			                    });
			                }
			            });
			            return false;
			        });
			        //Update Password
			        $('#editPassRowButton').on('click',function(){
			            var id = $('#editPassId').val();
			            var pass = $('#editPass').val();
			            $.ajax({
			                type : "POST",
			                url  : "<?php echo base_url('user/update_password')?>",
			                dataType : "JSON",
			                data : {id:id , pass:pass, <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
			                success: function(data){
			                    $('[name="editId"]').val("");
			                    $('[name="editPass"]').val("");
			                    $('#editPassRowModal').modal('hide');
			                    tampil_data();
			                    $.notify({
									icon: 'flaticon-add-user',
									title: 'Success',
									message: 'Berhasil mengganti password!',
								},{
									type: 'info',
									placement: {
										from: "top",
										align: "right"
									},
									time: 1000,
								});
			                }
			            });
			            return false;
			        });

				});
			</script>