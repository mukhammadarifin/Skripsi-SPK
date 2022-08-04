<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pemilihan Bidang Studi Perguruan Tinggi</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url() ?>https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">  
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/uniform.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/select2.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/maruti-style.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/maruti-media.css" class="skin-color" />
		<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
		<script>
			$(document).ready(function(){
				// Sembunyikan alert validasi kosong
				$("#kosong").hide();
			});
		</script>
	</head>

	<body>
		<!--Header-part-->
		<div id="header">
			<h1><a href="<?php echo site_url('Admin') ?>">Admin</a></h1>
		</div>
		<!--close-Header-part--> 

		<!--top-Header-messaages-->
		<div class="btn-group rightzero"> <a class="top_message tip-left" title="Manage Files"><i class="icon-file"></i></a> <a class="top_message tip-bottom" title="Manage Users"><i class="icon-user"></i></a> <a class="top_message tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a> <a class="top_message tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a> </div>
		<!--close-top-Header-messaages--> 

		<!--top-Header-menu-->
		<div id="user-nav" class="navbar navbar-inverse">
			<ul class="nav">
				<li class=""><a title="" href="<?php echo site_url('Login/logout') ?>"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
			</ul>
		</div>
		<!--close-top-Header-menu-->

		<div id="sidebar">
			<ul>
				<li class="active"><a href="<?php echo site_url('Admin') ?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
				<li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Master</span></a>
					<ul>
						<li><a href="<?php echo site_url('Admin/kelola_admin') ?>">Data Admin</a></li>
						<li><a href="<?php echo site_url('Admin/kelola_user') ?>">Data User</a></li>
						<li><a href="<?php echo site_url('Admin/kelola_kelas') ?>">Data Kelas</a></li>
					</ul>
				</li>
			</ul>
		</div>

		<div id="content">
			<div id="content-header">
				<div id="breadcrumb"> <a href="<?php echo site_url('Admin') ?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
			</div>
			<div class="container-fluid">
				<h3>Form Import Excel Data Nilai Siswa</h3>
				<div class="row-fluid">
					<div class="widget-box">
						<div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
							<h5>Form Import Excel</h5>
						</div>
						<div class="widget-content">
							<div class="row-fluid">
								<div class="widget-content nopadding">
									<?php echo form_open_multipart('Admin/form',array(
										'class' => 'form-horizontal')); 
									?>
									<div class="control-group">
										<label class="control-label">Download Format :</label>
										<div class="controls">
											<a class="btn btn-default" href="<?php echo base_url("excel/format.xlsx"); ?>">Download Format</a>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">File Excel :</label>
										<div class="controls">
											<input class="span11" type="file" name="file">
										</div>
									</div>

									<div class="form-actions">
										<input class="btn btn-success" type="submit" name="preview" value="Preview">
										<a href="<?php echo site_url('Admin/kelola_nilai') ?>" class="btn btn-primary" role="button" aria-pressed="true">Kembali</a>
									</div>
									<?php echo form_close(); ?>
								</div>
							</div>
						</div>
					</div>
			
					<div class="widget-box">
						<div class="widget-content nopadding">
							<div class="widget-title">
								<span class="icon"><i class="icon-tasks"></i></span>
								<h5>Preview</h5>
							</div>
							<?php
								if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
									if(isset($upload_error)){ // Jika proses upload gagal
										echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
										die; // stop skrip
									}
						
									// Buat sebuah tag form untuk proses import data ke database
									echo "<form method='post' action='".base_url("index.php/Admin/import")."'>";
						
									// Buat sebuah div untuk alert validasi kosong
									echo "<div style='color: red;' id='kosong'>
									Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
									</div>";
						
									echo "<table border='1' cellpadding='7'>
									<tr>
										<th colspan='20'>Preview Data</th>
									</tr>
									<tr>
										<th>ID Kelas</th>
										<th>Nama Siswa</th>
										<th>Pendidikan Agama Islam dan Budi Pekerti</th>
										<th>Pendidikan Agama Katholik dan Budi Pekerti</th>
										<th>Pendidikan Pancasila dan Kewarganegaraan</th>
										<th>Bahasa Indonesia</th>
										<th>Matematika Umum</th>
										<th>Sejarah Indonesia</th>
										<th>Bahasa Inggris</th>
										<th>Seni Budaya</th>
										<th>Pendidikan Jasmani, Olahraga, dan Kesehatan</th>
										<th>FISIKA</th>
										<th>Kimia</th>
										<th>Simulasi dan Komunikasi Digital</th>
										<th>Sistem Komputer</th>
										<th>Komputer dan Jaringan Dasar</th>
										<th>Pemrograman Dasar</th>
										<th>Dasar Desain Grafis</th>
										<th>Muatan Lokal Bahasa Daerah</th>
										<th>Tahun</th>
									</tr>";
						
									$numrow = 1;
									$kosong = 0;
						
									// Lakukan perulangan dari data yang ada di excel
									// $sheet adalah variabel yang dikirim dari controller
									foreach($sheet as $row){ 
										// Ambil data pada excel sesuai Kolom
										$fk_kelas = $row['A'];
										$nama_siswa = $row['B']; 
										$PAI = $row['C']; 
										$PAK = $row['D']; 
										$PPKn = $row['E']; 
										$BI = $row['F']; 
										$M = $row['G']; 
										$SI = $row['H']; 
										$Bing = $row['I']; 
										$SB = $row['J']; 
										$PJOK = $row['K']; 
										$F = $row['L']; 
										$K = $row['M']; 
										$SKD = $row['N']; 
										$SK = $row['O']; 
										$KJD = $row['P']; 
										$PD = $row['Q']; 
										$DDG = $row['R']; 
										$BD = $row['S']; 
										$tahun = $row['T']; 
							
										// Cek jika semua data tidak diisi
										if(empty($fk_kelas) && empty($nama_siswa) && empty($PAI) && empty($PAK) && empty($PPKn) && empty($BI) && empty($M) && empty($SI) && empty($Bing) && empty($SB) && empty($PJOK) && empty($F) && empty($K) && empty($tahun) && empty($SKD) && empty($SK) && empty($KJD) && empty($PD) && empty($DDG) && empty($BD) && empty($tahun))
											continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
										
										// Cek $numrow apakah lebih dari 1
										// Artinya karena baris pertama adalah nama-nama kolom
										// Jadi dilewat saja, tidak usah diimport
										if($numrow > 1){
											// Validasi apakah semua data telah diisi
											$fk_kelas_td = ( ! empty($fk_kelas))? "" : " style='background: #E07171;'";
											$nama_siswa_td = ( ! empty($nama_siswa))? "" : " style='background: #E07171;'";
											$PAI_td = ( ! empty($PAI))? "" : " style='background: #E07171;'";
											$PAK_td = ( ! empty($PAK))? "" : " style='background: #E07171;'";
											$PPKn_td = ( ! empty($PPKn))? "" : " style='background: #E07171;'";
											$BI_td = ( ! empty($BI))? "" : " style='background: #E07171;'";
											$M_td = ( ! empty($M))? "" : " style='background: #E07171;'";
											$SI_td = ( ! empty($SI))? "" : " style='background: #E07171;'";
											$Bing_td = ( ! empty($Bing))? "" : " style='background: #E07171;'";
											$SB_td = ( ! empty($SB))? "" : " style='background: #E07171;'";
											$PJOK_td = ( ! empty($PJOK))? "" : " style='background: #E07171;'";
											$F_td = ( ! empty($F))? "" : " style='background: #E07171;'";
											$K_td = ( ! empty($K))? "" : " style='background: #E07171;'";
											$SKD_td = ( ! empty($SKD))? "" : " style='background: #E07171;'";
											$SK_td = ( ! empty($SK))? "" : " style='background: #E07171;'";
											$KJD_td = ( ! empty($KJD))? "" : " style='background: #E07171;'";
											$PD_td = ( ! empty($PD))? "" : " style='background: #E07171;'";
											$DDG_td = ( ! empty($DDG))? "" : " style='background: #E07171;'";
											$BD_td = ( ! empty($BD))? "" : " style='background: #E07171;'";
											$tahun_td = ( ! empty($tahun))? "" : " style='background: #E07171;'";
								
											// Jika salah satu data ada yang kosong
											if(empty($fk_kelas) or empty($nama_siswa) or empty($PAI) or empty($PAK) or empty($PPKn) or empty($BI) or empty($M) or empty($SI) or empty($Bing) or empty($SB) or empty($PJOK) or empty($F) or empty($K) or empty($tahun) or empty($SKD) or empty($SK) or empty($KJD) or empty($PD) or empty($DDG) or empty($BD) or empty($tahun)){
												$kosong++; // Tambah 1 variabel $kosong
											}
								
											echo "<tr>";
											echo "<td".$fk_kelas_td.">".$fk_kelas."</td>";
											echo "<td".$nama_siswa_td.">".$nama_siswa."</td>";
											echo "<td".$PAI_td.">".$PAI."</td>";
											echo "<td".$PAK_td.">".$PAK."</td>";
											echo "<td".$PPKn_td.">".$PPKn."</td>";
											echo "<td".$BI_td.">".$BI."</td>";
											echo "<td".$M_td.">".$M."</td>";
											echo "<td".$SI_td.">".$SI."</td>";
											echo "<td".$Bing_td.">".$Bing."</td>";
											echo "<td".$SB_td.">".$SB."</td>";
											echo "<td".$PJOK_td.">".$PJOK."</td>";
											echo "<td".$F_td.">".$F."</td>";
											echo "<td".$K_td.">".$K."</td>";
											echo "<td".$SKD_td.">".$SKD."</td>";
											echo "<td".$SK_td.">".$SK."</td>";
											echo "<td".$KJD_td.">".$KJD."</td>";
											echo "<td".$PD_td.">".$PD."</td>";
											echo "<td".$DDG_td.">".$DDG."</td>";
											echo "<td".$BD_td.">".$BD."</td>";
											echo "<td".$tahun_td.">".$tahun."</td>";
											echo "</tr>";
										}
										$numrow++; // Tambah 1 setiap kali looping
									}
									echo "</table>";
						
								// Cek apakah variabel kosong lebih dari 0
								// Jika lebih dari 0, berarti ada data yang masih kosong
								// if($kosong > 0){
							?>	
								<!-- <script>
								$(document).ready(function(){
									// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
									$("#jumlah_kosong").html('<?php echo $kosong; ?>');
									
									$("#kosong").show(); // Munculkan alert validasi kosong
								});
								</script> -->
							<?php
								// }else{ // Jika semua data sudah diisi
									echo "<hr>";
									
									// Buat sebuah tombol untuk mengimport data ke database
									echo "<button class='btn btn-success' type='submit' name='import'>Import</button>";
									echo "<a class='btn btn-danger pull-right' href='".base_url("index.php/Admin/kelola_nilai")."'>Cancel</a>";
								// }
						
								echo "</form>";
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row-fluid">
			<div id="footer" class="span12"> 2022 &copy; Mukhammad Arifin</div>
		</div>

		<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/excanvas.min.js"></script> 
		<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/jquery.min.js"></script> 
		<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/jquery.ui.custom.js"></script> 
		<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/bootstrap.min.js"></script> 
		<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/jquery.uniform.js"></script> 
		<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/select2.min.js"></script> 
		<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/jquery.dataTables.min.js"></script> 
		<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/maruti.js"></script> 
		<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/maruti.tables.js"></script>
		

		<script type="text/javascript">
			// This function is called from the pop-up menus to transfer to
			// a different page. Ignore if the value returned is a null string:
			function goPage (newURL) {

				// if url is empty, skip the menu dividers and reset the menu selection to default
				if (newURL != "") {
				
					// if url is "-", it is this page -- reset the menu:
					if (newURL == "-" ) {
						resetMenu();            
					} 
					// else, send page to designated URL            
					else {  
						document.location.href = newURL;
					}
				}
			}

			// resets the menu selection upon entry to this page:
			function resetMenu() {
			document.gomenu.selector.selectedIndex = 2;
			}
		</script>
	</body>
</html>
