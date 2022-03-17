	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"> -->
	<link rel="stylesheet" href="<?php echo site_url('assets/css/csx/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?php echo site_url('assets/css/csx/atlantis.css')?>">
			<div class="content">
				<div class="page-inner">
					<h4 class="page-title">Account Setting</h4>
					<div class="row">
						<div class="col-md-8">
							<div class="card card-with-nav">
								<div class="card-header">
									<div class="row row-nav-line">
										<ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
											<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Password</a> </li>
											<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Profile</a> </li>
											<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#document" role="tab" aria-selected="false">Document</a> </li>
										</ul>
									</div>
								</div>
							<div class="card-body">
							<div class="tab-content">
								<!-- <form> -->
								<div id="home" class="tab-pane fade show active">
									<div class="row mt-3 mb-1">
										<div class="col-md-12">
											<div class="form-group form-group-default">
												<label>Old Password</label>
												<input type="password" class="form-control" id="old_password" placeholder="masukan password lama" required>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group form-group-default">
												<label>New Password</label>
												<input type="hidden" disabled class="form-control" id="idPass" value="<?=$this->session->userdata('id')?>">
												<input type="password" class="form-control" id="password" placeholder="masukan password baru" required>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group form-group-default">
												<label>Re-Enter New Password</label>
												<input type="password" class="form-control" id="re_password" placeholder="masukan kembali password baru" required>
											</div>
										</div>
									</div>
									<div class="text-right mt-3 mb-3">
										<button class="btn btn-success" name="commit" id="editPass">Save</button>
										<button class="btn btn-danger" onclick="document.getElementById('password').value = ''">Reset</button>
									</div>
								</div>
								<!-- </form> -->
								<div id="profile" class="tab-pane fade">

								<?php 
									$email='';
									$tgl='';
									$gender='';
									$hp='';
									$alamat='';
									$about='';
									foreach ($user_profil as $r){
										$email .= $r->email;
										$tgl .= $r->tgl_lahir;  
										$gender .= $r->gender;
										$hp .= $r->no_hp;
										$alamat .= $r->alamat;
										$about .= $r->tentang_saya;
									}

								?>		
									<div class="row mt-3">
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Nama</label>
												<input type="text" class="form-control" name="p_nama" id="p_nama" value="<?=$this->session->userdata('nama')?>" readonly>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Email</label>
												<input type="email" class="form-control" name="p_email" id="p_email" placeholder="Email" value="<?=$email?>">
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Tgl Lahir</label>
												<input type="text" class="form-control tgl" id="datepicker" name="datepicker" placeholder="Tanggal Lahir" value="<?=$tgl?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Gender</label>
												<select class="form-control" id="p_gender" nama="p_gender">
													<option value="pria" <?php if ($gender=='pria') echo "selected";?>>Pria</option>
													<option value="wanita" <?php if ($gender=='wanita') echo "selected";?>>Wanita</option>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>No HP</label>
												<input type="text" class="form-control" name="p_hp" id="p_hp" placeholder="No Hp" value="<?=$hp?>">
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-md-12">
											<div class="form-group form-group-default">
												<label>Alamat</label>
												<input type="text" class="form-control" name="p_alamat" id="p_alamat" placeholder="Alamat" value="<?=$alamat?>">
											</div>
										</div>
									</div>
									<div class="row mt-3 mb-1">
										<div class="col-md-12">
											<div class="form-group form-group-default">
												<label>Tentang Saya</label>
												<textarea class="form-control" name="p_about" id="p_about" placeholder="About Me" rows="3"><?=$about?></textarea>
											</div>
										</div>
									</div>
									
									<div class="text-right mt-3 mb-3">
										<button class="btn btn-success" id="editProfil">Save</button>
										<!-- <button class="btn btn-danger">Reset</button> -->
									</div>
								</div>
								<!-- Document -->
								
								<div id="document" class="tab-pane fade">
									<!-- <form> -->
									<div class="row mt-3 mb-1">
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleFormControlFile1">Transkrip</label>
												<input type="file" class="form-control-file" id="transkrip" name="files[]" multiple="multiple" accept=".pdf">
												<!-- <input type="text" class="form-control" value="<?=$transkrip?>" readonly> -->
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleFormControlFile1">#</label>
												<div id="show_transkrip"></div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleFormControlFile1">Sertifikat</label>
												<input type="file" class="form-control-file" name="files[]" multiple="multiple" id="sertifikat" accept=".pdf">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleFormControlFile1">#</label>
												<div id="show_sertifikat"></div>
											</div>
										</div>
									</div>
									  <progress id="progressBarInsertEks" value="0" max="100" style="width:100%; display: none;"></progress>
	                                  <h3 id="statusInsertEks"></h3>
	                                  <p id="loaded_n_totalInsertEks"></p>
									<div class="text-right mt-3 mb-3">
										<button class="btn btn-success" name="commit2" id="editDocument">Save</button>
									</div>

								<!-- </form> -->
								</div>
								</div>
							</div>

							</div>
						</div>
						<div class="col-md-4">
							<div class="card card-profile">
								<div class="card-header" style="background-image: url('<?=base_url("assets/img/blogpost.jpg")?>')">
									<div class="profile-picture">
										<div class="avatar avatar-xl">
											<img src="<?=base_url('assets/img/profile.jpg')?>" alt="..." class="avatar-img rounded-circle">
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="user-profile text-center">
										<div class="name"><?=$this->session->userdata('nama')?></div>
										<div class="job">Frontend Developer</div>
										<div class="desc">A man who hates loneliness</div>
										<div class="social-media">
											<a class="btn btn-info btn-twitter btn-sm btn-link" href="#"> 
												<span class="btn-label just-icon"><i class="flaticon-twitter"></i> </span>
											</a>
											<a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
												<span class="btn-label just-icon"><i class="flaticon-google-plus"></i> </span> 
											</a>
											<a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#"> 
												<span class="btn-label just-icon"><i class="flaticon-facebook"></i> </span> 
											</a>
											<a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
												<span class="btn-label just-icon"><i class="flaticon-dribbble"></i> </span> 
											</a>
										</div>
										<div class="view-profile">
											<a href="#" class="btn btn-secondary btn-block">View Full Profile</a>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<div class="row user-stats text-center">
										<div class="col">
											<div class="number">125</div>
											<div class="title">Post</div>
										</div>
										<div class="col">
											<div class="number">25K</div>
											<div class="title">Followers</div>
										</div>
										<div class="col">
											<div class="number">134</div>
											<div class="title">Following</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<script src="<?php echo site_url('assets/js/core/jquery.3.2.1.min.js')?>"></script>
			<script src="<?php echo site_url('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')?>"></script>
			<!-- Moment JS -->
			<script src="<?php echo site_url('assets/js/plugin/moment/moment.min.js')?>"></script><!-- DateTimePicker -->
			<script src="<?php echo site_url('assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js')?>"></script>
			<script type="text/javascript">
				$('#datepicker').datetimepicker({
					format: 'YYYY-MM-DD',
				});
				//Validated Password
				function validatePassword() {
				var pass1 = document.getElementById("password").value;
				var pass2 = document.getElementById("re_password").value;
				pass1 != pass2 ? 
					$.notify({
					icon: 'flaticon-add-user',
					title: 'Fail',
					message: 'New Password dont Match, coba lagi!',
					},{
						type: 'warning',
						placement: {
							from: "top",
							align: "center"
						},
						time: 1000,
					}) 
				:		
					updatepass();
				}
				document.getElementsByName("commit")[0].onclick = validatePassword;
				//Update Password
				function updatepass(){
			        // $('#editPass').on('click',function(){
			            var id = $('#idPass').val();
			            var pass = $('#password').val();
			            var old_pass = $('#old_password').val();

			            $.ajax({
			                type : "POST",
			                url  : "<?php echo base_url('user/update_password2')?>",
			                dataType : "JSON",
			                data : {id:id , pass:pass, old_pass:old_pass, <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
			                success: function(data){
			                    if (data=='gagal') {
			                    	$.notify({
									icon: 'flaticon-add-user',
									title: 'Fail',
									message: 'Old Password dont Match, coba lagi!',
									},{
										type: 'danger',
										placement: {
											from: "top",
											align: "center"
										},
										time: 1000,
									});

			                    }else{
			                    	$('#old_password').val("");
				                    $('#password').val("");
				                    $('#re_password').val("");
			                    	$.notify({
									icon: 'flaticon-add-user',
									title: 'Success',
									message: 'Berhasil mengganti password!',
									},{
										type: 'info',
										placement: {
											from: "top",
											align: "center"
										},
										time: 1000,
									});
			                    }
			                    
			                }
			            });
			            return false;
			        // });
			    }

			        //Update Profil
			        $('#editProfil').on('click',function(){
			            var id 		= $('#idPass').val();
			            var email 	= $('#p_email').val();
			            var tgl 	= $('#datepicker').val();
			            var gender 	= $('#p_gender').val();
			            var hp 		= $('#p_hp').val();
			            var alamat 	= $('#p_alamat').val();
			            var about 	= $('#p_about').val();
			            $.ajax({
			                type : "POST",
			                url  : "<?php echo base_url('user/update_profil')?>",
			                dataType : "JSON",
			                data : {id:id, email:email, tgl:tgl, gender:gender, hp:hp, alamat:alamat, about:about, <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
			                success: function(data){
			                    $('#password').val("");
			                    $.notify({
									icon: 'flaticon-add-user',
									title: 'Success',
									message: 'Berhasil update profil!',
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

			        // Upload Document
				  $('#editDocument').on('click',function(){ 
				  	if ($('#transkrip').val()=='' || $('#sertifikat').val()=='') {
				  		$.notify({
						icon: 'flaticon-list',
						title: 'Warning',
						message: 'No file chosen!',
						},{
							type: 'warning',
							placement: {
								from: "top",
								align: "center"
							},
							time: 1000,
						})
				  	}else {
				  		edit_document();
				  	}
				  	
				  });

				  function edit_document(){
				    // e.preventDefault()
				    document.getElementById("progressBarInsertEks").style.display = "block";

				    var id     = $('#idPass').val();
				    var file1  = $('#transkrip').get(0).files[0];
				    var file2  = $('#sertifikat').get(0).files[0];

				        var formData = new FormData();
				        formData.append('id', id);
				        formData.append('transkrip', file1);
				        formData.append('sertifikat', file2);
				        formData.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
				        var ajax = $.ajax({
				            method: 'POST',
				            url:"<?php echo base_url(); ?>user/insert_berkas",
				            data: formData,
				            xhr: function() {
				                var myXhr = $.ajaxSettings.xhr();
				                if(myXhr.upload){
				                    myXhr.upload.addEventListener('progress',progress, false);
				                }
				                return myXhr;
				            },
				            dataType: 'json',
				            contentType: false,
				            processData: false,
				        });
				        ajax.done(function(jqXHR){
				        	$('#transkrip').val('');
				        	$('#sertifikat').val('');
				        	// console.log(jqXHR);
				        	tampil_data();
				            if(jqXHR==true) {
				            	  $.notify({
									icon: 'flaticon-add-user',
									title: 'Success',
									message: 'Berhasil upload berkas!',
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
				    }

				    function progress(e){

				      if(e.lengthComputable){
				          var max = e.total;
				          var current = e.loaded;

				          var Percentage = (current * 100)/max;
				          document.getElementById("progressBarInsertEks").value = Math.round(Percentage);
				          document.getElementById("statusInsertEks").innerHTML = Math.round(Percentage)+"% uploaded... please wait";
				          $('#statusInsertEks').show();
				          $('#loaded_n_totalInsertEks').show();
				          if(Percentage >= 100)
				          {
				             $('#progressBarInsertEks').hide();
				             $('#statusInsertEks').hide();
				             $('#loaded_n_totalInsertEks').hide();
				          }
				      }  
				   }

				   $(document).ready(function() {
				   	tampil_data();
				   });

				   function tampil_data(){
		            $.ajax({
		                type  : 'GET',
		                url   : '<?php echo base_url()?>user/get_data_berkas',
		                async : true,
		                dataType : 'json',
		                success : function(data){
		                    var html = '';
		                    var html2 = '';
		                    for(i=0; i<data.length; i++){
		                        html += '<input type="text" class="form-control" value="'+data[i].transkrip+'" readonly>';
		                        html2 +='<input type="text" class="form-control" value="'+data[i].sertifikat+'" readonly>';
		                    }
		                    $('#show_transkrip').html(html);
		                    $('#show_sertifikat').html(html2);
		                    

		                }
		 
		            });
		        }
			</script>