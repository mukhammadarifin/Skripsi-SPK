<!DOCTYPE html>
<html lang="en">

<head>
	<title>Pemilihan Bidang Studi Perguruan Tinggi</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/uniform.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/select2.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/maruti-style.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/maruti-media.css" class="skin-color" />
</head>

<body>
	<!--Header-part-->
	<div id="header">
		<h2><a href="<?php echo site_url('Home') ?>">Pemilihan Bidang Studi Perguruan Tinggi</a></h2>
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


	<div id="sidebar">
		<ul>
			<li class="active"><a href="<?php echo site_url('User') ?>"><i class="icon icon-home"></i> <span>Home</span></a> </li>
			<li><a href="<?php echo site_url('User/nilai                                                                                                                             ') ?>"><i class="icon icon-file"></i><span>Daftar Nilai Siswa</span></a></li>
			<li><a href="<?php echo site_url('Klaster') ?>"><i class="icon icon-signal"></i><span>Pengelompokan</span></a></li>
			<li><a href="<?php echo site_url('User/pengujian') ?>"><i class="icon icon-cog"></i><span>Pengujian</span></a></li>
		</ul>
	</div>
	<div id="content">
		<div id="content-header">
			<div id="breadcrumb"> <a href="<?php echo site_url('User') ?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
		</div>
		<div class="container-fluid">
			<h3>Pengelompokan Nilai Tahun <?php echo $thn ?> Iterasi Ke-<?php echo $this->uri->segment(5) + 1 ?></h3>
			<?php $it = $iterasi + 1 ?>
			<a style="align-content: right" class="btn btn-default" href="<?php echo site_url('Klaster/iterasi_lanjut/' . $thn . '/' . $jml . '/' . $it) ?>">Lanjutkan Iterasi</a>
			<div class="row-fluid">

				<div class="widget-box">
					<div class="widget-content nopadding">
						<div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
							<h5>Hasil Iterasi Awal</h5>
						</div>
						<div class="jumbotron">
							<div class="container">
								<p>Dikarenakan hasil selisih antara Medoids dengan Non-Medoids di bawah 0, maka hasil dari Non-Medoids dijadikan sebagai Medoids. Dan dibentuk perhitungan untuk Non-Medoids baru.</p>
								<h4>
									Hasil Medoids : <?php foreach ($hasil_iterasi as $key) {
														echo $medoids = $key->total_non_medoids;
													} ?>
								</h4>
							</div>
						</div>
					</div>
				</div>

				<div class="widget-box">
					<div class="widget-content nopadding">
						<div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
							<h5>Centroid Non-Medoids</h5>
						</div>
						<div style="overflow-x: auto;">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Centroid ke-</th>
										<th>Nama Siswa</th>
										<th>Kelas</th>
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
									</tr>
								</thead>
								<tbody>
									<?php $no = 1 ?>
									<?php foreach ($nilai_rand as $m1) { ?>
										<tr>
											<td><?php echo $no ?></td>
											<td><?php echo $m1->nama_siswa ?></td>
											<td><?php echo $m1->nama_kelas ?></td>
											<td><?php echo $m1->PAI ?></td>
											<td><?php echo $m1->PAK ?></td>
											<td><?php echo $m1->PPKn ?></td>
											<td><?php echo $m1->BI ?></td>
											<td><?php echo $m1->M ?></td>
											<td><?php echo $m1->SI ?></td>
											<td><?php echo $m1->Bing ?></td>
											<td><?php echo $m1->SB ?></td>
											<td><?php echo $m1->PJOK ?></td>
											<td><?php echo $m1->F ?></td>
											<td><?php echo $m1->K ?></td>
											<td><?php echo $m1->SKD ?></td>
											<td><?php echo $m1->SK ?></td>
											<td><?php echo $m1->KJD ?></td>
											<td><?php echo $m1->PD ?></td>
											<td><?php echo $m1->DDG ?></td>
											<td><?php echo $m1->BD ?></td>
											<td><?php echo $m1->tahun ?></td>
											<?php $no++ ?>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="widget-box">
					<div class="widget-content nopadding">
						<div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
							<h5>Iterasi Non-Medoids</h5>
						</div>
						<div style="overflow-x: auto;">
							<table class="table table-bordered data-table">
								<thead>
									<tr>
										<th rowspan="2">No.</th>
										<th rowspan="2">Pendidikan Agama Islam dan Budi Pekerti</th>
										<th rowspan="2">Pendidikan Agama Katholik dan Budi Pekerti</th>
										<th rowspan="2">Pendidikan Pancasila dan Kewarganegaraan</th>
										<th rowspan="2">Bahasa Indonesia</th>
										<th rowspan="2">Matematika Umum</th>
										<th rowspan="2">Sejarah Indonesia</th>
										<th rowspan="2">Bahasa Inggris</th>
										<th rowspan="2">Seni Budaya</th>
										<th rowspan="2">Pendidikan Jasmani, Olahraga, dan Kesehatan</th>
										<th rowspan="2">FISIKA</th>
										<th rowspan="2">Kimia</th>
										<th rowspan="2">Simulasi dan Komunikasi Digital</th>
										<th rowspan="2">Sistem Komputer</th>
										<th rowspan="2">Komputer dan Jaringan Dasar</th>
										<th rowspan="2">Pemrograman Dasar</th>
										<th rowspan="2">Dasar Desain Grafis</th>
										<th rowspan="2">Muatan Lokal Bahasa Daerah</th>
										<th rowspan="2">Tahun</th>
										<?php $c = 1 ?>
										<?php foreach ($nilai_rand as $m) { ?>
											<th colspan="17">Centroid <?php echo $c;
																		$c++ ?></th>
										<?php } ?>
										<?php $d = 1 ?>
										<?php foreach ($nilai_rand as $m) { ?>
											<th rowspan="2">C<?php echo $d;
																$d++ ?></th>
										<?php } ?>
									</tr>
									<tr>
										<?php foreach ($nilai_rand as $m1) { ?>
											<th><?php $c_PAI[] = $m1->PAI;
												echo $m1->PAI ?></th>
											<th><?php $c_PAK[] = $m1->PAK;
												echo $m1->PAK ?></th>
											<th><?php $c_PPKn[] = $m1->PPKn;
												echo $m1->PPKn ?></th>
											<th><?php $c_BI[] = $m1->BI;
												echo $m1->BI ?></th>
											<th><?php $c_M[] = $m1->M;
												echo $m1->M ?></th>
											<th><?php $c_SI[] = $m1->SI;
												echo $m1->SI ?></th>
											<th><?php $c_Bing[] = $m1->Bing;
												echo $m1->Bing ?></th>
											<th><?php $c_SB[] = $m1->SB;
												echo $m1->SB ?></th>
											<th><?php $c_PJOK[] = $m1->PJOK;
												echo $m1->PJOK ?></th>
											<th><?php $c_F[] = $m1->F;
												echo $m1->F ?></th>
											<th><?php $c_K[] = $m1->K;
												echo $m1->K ?></th>
											<th><?php $c_SKD[] = $m1->SKD;
												echo $m1->SKD ?></th>
											<th><?php $c_SK[] = $m1->SK;
												echo $m1->SK ?></th>
											<th><?php $c_KJD[] = $m1->KJD;
												echo $m1->KJD ?></th>
											<th><?php $c_PD[] = $m1->PD;
												echo $m1->PD ?></th>
											<th><?php $c_DDG[] = $m1->DDG;
												echo $m1->DDG ?></th>
											<th><?php $c_BD[] = $m1->BD;
												echo $m1->BD ?></th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									$tc0 = 0;
									// $tc = 0 
									?>
									<?php foreach ($nilai as $key) { ?>
										<tr>
											<td><?php echo $no ?></td>
											<td><?php echo $key->PAI ?></td>
											<td><?php echo $key->PAK ?></td>
											<td><?php echo $key->PPKn ?></td>
											<td><?php echo $key->BI ?></td>
											<td><?php echo $key->M ?></td>
											<td><?php echo $key->SI ?></td>
											<td><?php echo $key->Bing ?></td>
											<td><?php echo $key->SB ?></td>
											<td><?php echo $key->PJOK ?></td>
											<td><?php echo $key->F ?></td>
											<td><?php echo $key->K ?></td>
											<td><?php echo $key->SKD ?></td>
											<td><?php echo $key->SK ?></td>
											<td><?php echo $key->KJD ?></td>
											<td><?php echo $key->PD ?></td>
											<td><?php echo $key->DDG ?></td>
											<td><?php echo $key->BD ?></td>
											<td><?php echo $key->tahun ?></td>
											<?php $no++ ?>
											<?php $e = 0;
											// $tc = array(); 
											?>
											<?php foreach ($nilai_rand as $k) { ?>
												<td colspan="17">
													<?php
													$hm[$e] = sqrt(pow(($key->PAI - $c_PAI[$e]), 2) + pow(($key->PAK - $c_PAK[$e]), 2) + pow(($key->PPKn - $c_PPKn[$e]), 2) + pow(($key->BI - $c_BI[$e]), 2) + pow(($key->M - $c_M[$e]), 2) + pow(($key->SI - $c_SI[$e]), 2) + pow(($key->Bing - $c_Bing[$e]), 2) + pow(($key->SB - $c_SB[$e]), 2) + pow(($key->PJOK - $c_PJOK[$e]), 2) + pow(($key->F - $c_F[$e]), 2) + pow(($key->K - $c_K[$e]), 2) + pow(($key->SKD - $c_SKD[$e]), 2) + pow(($key->SK - $c_SK[$e]), 2) + pow(($key->KJD - $c_KJD[$e]), 2) + pow(($key->PD - $c_PD[$e]), 2) + pow(($key->DDG - $c_DDG[$e]), 2) + pow(($key->BD - $c_BD[$e]), 2));
													echo $hm[$e];
													$hc[$e] = $hm[$e];
													// $tc[$e] = array_sum($hc[$e]);
													?>
												</td>
												<?php $e++ ?>
											<?php } ?>
											<?php for ($i = 0; $i < COUNT($hc); $i++) { ?>
												<?php if ($hc[$i] == MIN($hc)) { ?>
													<td bgcolor='#FFFF00'>1</td>
												<?php
													$cm = $i + 1;
													$q = "insert into centroid_temp(jenis,iterasi,c) values('NM','" . $it . "','c" . $cm . "')";
													$this->db->query($q);
												} else {
													echo "<td>0</td>";
												}
												?>
											<?php } ?>
											<?php
											for ($j = 0; $j < COUNT($hc); $j++) {
												// if ($j == 0) {
												$tc0 = $tc0 + $hc[$j];
												$ttc[] = $tc0;
												// }
												// else{

												// }
											}
											// echo "<td>".$tc0."</td>";
											?>
										</tr>
									<?php } ?>
									<tr align="center">
										<td colspan="6"><b>TOTAL</b></td>
										<td colspan="12"><b><?php echo $ttc[70] ?></b></td>
										<!-- <td colspan="12"><b><?php echo $ttc[70] . '/' . end($ttc) ?></b></td> -->
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="widget-box">
					<div class="widget-content nopadding">
						<div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
							<h5>Selisih antara Non-Medoids dengan Medoids</h5>
						</div>
						<div class="jumbotron">
							<div class="container">
								<h4>
									Total Medoids : <?php echo $medoids ?><br><br>
									Total Non Medoids : <?php echo $ttc[70] ?><br><br>
									Selisih : <?php echo $selisih = $ttc[70] - $medoids ?><br><br>
									<?php $n = "insert into hasil_iterasi(iterasi,total_medoids,total_non_medoids,selisih) values('" . $it . "','" . $medoids . "','" . $ttc[6] . "','" . $selisih . "')";
									$this->db->query($n); ?>
								</h4>
							</div>
						</div>
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
		function goPage(newURL) {

			// if url is empty, skip the menu dividers and reset the menu selection to default
			if (newURL != "") {

				// if url is "-", it is this page -- reset the menu:
				if (newURL == "-") {
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