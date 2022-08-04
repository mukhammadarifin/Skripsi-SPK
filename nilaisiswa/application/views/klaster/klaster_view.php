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
  <!--close-top-Header-menu-->

  <div id="sidebar">
    <ul>
      <li class="active"><a href="<?php echo site_url('User') ?>"><i class="icon icon-home"></i> <span>Home</span></a> </li>
      <li><a href="<?php echo site_url('User/nilai') ?>"><i class="icon icon-file"></i><span>Daftar Nilai Siswa</span></a></li>
      <li><a href="<?php echo site_url('Klaster') ?>"><i class="icon icon-signal"></i><span>Pengelompokan</span></a></li>
      <li><a href="<?php echo site_url('User/pengujian') ?>"><i class="icon icon-cog"></i><span>Pengujian</span></a></li>
    </ul>
  </div>

  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="<?php echo site_url('User') ?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
    <div class="container-fluid">
      <h3>Pengelompokan Nilai Siswa</h3>
      <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
            <h5>Pengelompokan Nilai</h5>
          </div>
          <div class="widget-content">
            <div class="row-fluid">
              <div class="widget-content nopadding">
                <?php echo form_open('Klaster/iterasi_klaster', array(
                  'class' => 'form-horizontal'
                ));
                ?>
                <div class="control-group">
                  <label class="control-label">Tahun :</label>
                  <div class="controls">
                    <select name="tahun" id="inputTahun" class="span11" required="required">
                      <?php foreach ($tahun as $key) { ?>
                        <?php if ($key->tahun == $key->tahun) : ?>
                          <option value="<?php echo $key->tahun ?>"><?php echo $key->tahun ?></option>
                        <?php endif ?>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Jumlah Klaster: </label>
                  <div class="controls">
                    <input type="text" name="jumlah" id="inputJumlah" class="span11" required="required" value="3">
                    <input type="hidden" name="hidden" class="form-control" value="Tahun">
                  </div>
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-success">Kelompokkan</button>
                </div>
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="widget-box">
          <div class="widget-content nopadding">
            <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
              <h5>Hasil Pengelompokan Sebelumnya Pada Tahun <?php echo $thn ?></h5>
            </div>
            <div style="overflow-x: auto;">
              <a style="align-content: right" class="btn btn-default" href="<?php echo site_url('Klaster/cetak/' . $thn) ?>">Cetak Excel</a>
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Siswa</th>
                    <th>Nama Kelas</th>
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
                    <th>Klaster</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1 ?>
                  <?php foreach ($hasil as $key) { ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $key->nama_siswa ?></td>
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
                      <td><?php echo $key->tahun ?></td>
                      <td><?php $key->c;
                          $str = ['c1', 'c2', 'c3'];
                          $rplc = [
                            'Adaptif',
                            'Normatif',
                            'Produktif'
                          ];
                          echo str_replace($str, $rplc, $key->c); ?></td>
                      <?php $no++ ?>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
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