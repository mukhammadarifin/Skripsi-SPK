<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Data Nilai Siswa-".$thn.".xls"); ?>
			<table border="1">
				<thead>
					<tr>
						<td colspan="25"><center><h4>Data Nilai Siswa Tahun <?php echo $thn ?></h4></center></td>
					</tr>
					<tr>
						<th>No.</th>
                        <th colspan="6">Nama Siswa</th>
                        <th>Nama Kelas</th>
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
					</tr>
				</thead>
				<tbody>
					<?php $no = 1 ?>
						<?php foreach ($nilai as $key) { ?>
							<tr>
							<td><?php echo $no ?></td>
							<td colspan="6"><?php echo $key->nama_siswa ?></td>
							<td><?php echo $key->nama_kelas ?></td>
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
							<?php $no++ ?>
							</tr>
						<?php } ?>
				</tbody>
			</table>