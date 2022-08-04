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
    <h1><a href="<?php echo site_url('Admin') ?>">Admin</a></h1>
  </div>

  <?php
  foreach ($nilaisiswa as $data) {
    $tahun[] = $data->tahun;
    $PAI[] = (float) $data->PAI;
    $PAK[] = (float) $data->PAK;
    $PPKn[] = (float) $data->PPKn;
    $BI[] = (float) $data->BI;
    $M[] = (float) $data->M;
    $SI[] = (float) $data->SI;
    $Bing[] = (float) $data->Bing;
    $SB[] = (float) $data->SB;
    $PJOK[] = (float) $data->PJOK;
    $F[] = (float) $data->F;
    $K[] = (float) $data->K;
    $SKD[] = (float) $data->SKD;
    $SK[] = (float) $data->SK;
    $KJD[] = (float) $data->KJD;
    $PD[] = (float) $data->PD;
    $DDG[] = (float) $data->DDG;
    $BD[] = (float) $data->BD;
    $nama_kelas = $data->nama_kelas;
  }
  ?>
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
      <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Manajemen Data</span></a>
        <ul>
          <li><a href="<?php echo site_url('Admin/kelola_admin') ?>">Data Admin</a></li>
          <li><a href="<?php echo site_url('Admin/kelola_user') ?>">Data User</a></li>
          <li><a href="<?php echo site_url('Admin/kelola_nilai') ?>">Daftar Nilai Siswa</a></li>
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
      <h3>Grafik Data Nilai Di <?php echo $nama_kelas ?></h3>
      <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
            <h5>Filter Grafik</h5>
          </div>

          <div class="widget-content">
            <div class="row-fluid">
              <div class="widget-content nopadding">
                <?php
                echo form_open('Admin/filter_grafik', array('class' => 'form-horizontal'));
                ?>
                <div class="control-group">
                  <label class="control-label">Kelas :</label>

                  <div class="controls">
                    <select name="kelas" id="inputTahun" class="span11" required="required">
                      <?php
                      foreach ($kelas as $key) {
                      ?>
                        <option value="<?php echo $key->id_kelas ?>"><?php echo $key->nama_kelas ?></option>
                      <?php } ?>
                    </select>
                    <input type="hidden" name="hidden" class="form-control" value="Tahun">
                  </div>
                </div>

                <div class="form-actions">
                  <button type="submit" class="btn btn-success">Filter</button>
                </div>

                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
            <h5>Grafik Data Nilai Normatif di Kelas <?php echo $nama_kelas ?></h5>
          </div>
          <div class="widget-content">
            <div class="row-fluid">
              <div class="container-fluid">
                <h5>Grafik Data Nilai Pendidikan Agama Islam dan Budi Pekerti</h5>
                <canvas id="canvas" width="1250" height="280"></canvas>
                <h5>Grafik Data Pendidikan Agama Katholik dan Budi Pekerti</h5>
                <canvas id="canvas2" width="1250" height="280"></canvas>
                <h5>Grafik Data Pendidikan Pancasila dan Kewarganegaraan</h5>
                <canvas id="canvas3" width="1250" height="280"></canvas>
                <h5>Grafik Data Bahasa Indonesia</h5>
                <canvas id="canvas4" width="1250" height="280"></canvas>
                <h5>Grafik Data Sejarah Indonesia</h5>
                <canvas id="canvas6" width="1250" height="280"></canvas>
                <h5>Grafik Data Seni Budaya di kelas</h5>
                <canvas id="canvas8" width="1250" height="280"></canvas>
                <h5>Grafik Data Pendidikan Jasmani, Olahraga, dan Kesehatan di kelas</h5>
                <canvas id="canvas9" width="1250" height="280"></canvas>
                <h5>Grafik Muatan Lokal Bahasa Daerah</h5>
                <canvas id="canvas17" width="1250" height="280"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
            <h5>Grafik Data Nilai Adaptif di Kelas <?php echo $nama_kelas ?></h5>
          </div>
          <div class="widget-content">
            <div class="row-fluid">
              <div class="container-fluid">
                <h5>Grafik Data Matematika (Umum)</h5>
                <canvas id="canvas5" width="1250" height="280"></canvas>
                <h5>Grafik Data Bahasa Inggris</h5>
                <canvas id="canvas7" width="1250" height="280"></canvas>
                <h5>Grafik Data FISIKA</h5>
                <canvas id="canvas10" width="1250" height="280"></canvas>
                <h5>Grafik Data Kimia</h5>
                <canvas id="canvas11" width="1250" height="280"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
            <h5>Grafik Data Nilai Produktif di kelas <?php echo $nama_kelas ?></h5>
          </div>
          <div class="widget-content">
            <div class="row-fluid">
              <div class="container-fluid">
                <h5>Grafik Data Simulasi dan Komunikasi Digital</h5>
                <canvas id="canvas12" width="1250" height="280"></canvas>
                <h5>Grafik Data Sistem Komputer</h5>
                <canvas id="canvas13" width="1250" height="280"></canvas>
                <h5>Grafik Data Komputer dan Jaringan Dasar</h5>
                <canvas id="canvas14" width="1250" height="280"></canvas>
                <h5>Grafik Data Pemrograman Dasar di kelas</h5>
                <canvas id="canvas15" width="1250" height="280"></canvas>
                <h5>Grafik Data Dasar Desain Grafis</h5>
                <canvas id="canvas16" width="1250" height="280"></canvas>
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

    <script type="text/javascript" src="<?php echo base_url() . 'assets/chartjs/chart.min.js' ?>"></script>

    <script>
      var lineChartData = {
        labels: <?php echo json_encode($tahun); ?>,
        datasets: [{
          fillColor: "#49cced",
          strokeColor: "#2e363f",
          pointColor: "#2e363f",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "#49cced",
          data: <?php echo json_encode($PAI); ?>
        }]

      }
      var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
    </script>

    <script>
      var lineChartData = {
        labels: <?php echo json_encode($tahun); ?>,
        datasets: [{
          fillColor: "#49cced",
          strokeColor: "#2e363f",
          pointColor: "#2e363f",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "#49cced",
          data: <?php echo json_encode($PAK); ?>
        }]

      }
      var myLine = new Chart(document.getElementById("canvas2").getContext("2d")).Line(lineChartData);
    </script>

    <script>
      var lineChartData = {
        labels: <?php echo json_encode($tahun); ?>,
        datasets: [{
          fillColor: "#49cced",
          strokeColor: "#2e363f",
          pointColor: "#2e363f",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "#49cced",
          data: <?php echo json_encode($PPKn); ?>
        }]

      }
      var myLine = new Chart(document.getElementById("canvas3").getContext("2d")).Line(lineChartData);
    </script>

    <script>
      var lineChartData = {
        labels: <?php echo json_encode($tahun); ?>,
        datasets: [{
          fillColor: "#49cced",
          strokeColor: "#2e363f",
          pointColor: "#2e363f",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "#49cced",
          data: <?php echo json_encode($BI); ?>
        }]

      }
      var myLine = new Chart(document.getElementById("canvas4").getContext("2d")).Line(lineChartData);
    </script>

    <script>
      var lineChartData = {
        labels: <?php echo json_encode($tahun); ?>,
        datasets: [{
          fillColor: "#49cced",
          strokeColor: "#2e363f",
          pointColor: "#2e363f",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "#49cced",
          data: <?php echo json_encode($M); ?>
        }]

      }
      var myLine = new Chart(document.getElementById("canvas5").getContext("2d")).Line(lineChartData);
    </script>

    <script>
      var lineChartData = {
        labels: <?php echo json_encode($tahun); ?>,
        datasets: [{
          fillColor: "#49cced",
          strokeColor: "#2e363f",
          pointColor: "#2e363f",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "#49cced",
          data: <?php echo json_encode($SI); ?>
        }]

      }
      var myLine = new Chart(document.getElementById("canvas6").getContext("2d")).Line(lineChartData);
    </script>

    <script>
      var lineChartData = {
        labels: <?php echo json_encode($tahun); ?>,
        datasets: [{
          fillColor: "#49cced",
          strokeColor: "#2e363f",
          pointColor: "#2e363f",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "#49cced",
          data: <?php echo json_encode($Bing); ?>
        }]

      }
      var myLine = new Chart(document.getElementById("canvas7").getContext("2d")).Line(lineChartData);
    </script>

    <script>
      var lineChartData = {
        labels: <?php echo json_encode($tahun); ?>,
        datasets: [{
          fillColor: "#49cced",
          strokeColor: "#2e363f",
          pointColor: "#2e363f",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "#49cced",
          data: <?php echo json_encode($SB); ?>
        }]

      }
      var myLine = new Chart(document.getElementById("canvas8").getContext("2d")).Line(lineChartData);
    </script>

    <script>
      var lineChartData = {
        labels: <?php echo json_encode($tahun); ?>,
        datasets: [{
          fillColor: "#49cced",
          strokeColor: "#2e363f",
          pointColor: "#2e363f",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "#49cced",
          data: <?php echo json_encode($PJOK); ?>
        }]

      }
      var myLine = new Chart(document.getElementById("canvas9").getContext("2d")).Line(lineChartData);
    </script>

    <script>
      var lineChartData = {
        labels: <?php echo json_encode($tahun); ?>,
        datasets: [{
          fillColor: "#49cced",
          strokeColor: "#2e363f",
          pointColor: "#2e363f",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "#49cced",
          data: <?php echo json_encode($F); ?>
        }]

      }
      var myLine = new Chart(document.getElementById("canvas10").getContext("2d")).Line(lineChartData);
    </script>

    <script>
      var lineChartData = {
        labels: <?php echo json_encode($tahun); ?>,
        datasets: [{
          fillColor: "#49cced",
          strokeColor: "#2e363f",
          pointColor: "#2e363f",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "#49cced",
          data: <?php echo json_encode($K); ?>
        }]

      }
      var myLine = new Chart(document.getElementById("canvas11").getContext("2d")).Line(lineChartData);
    </script>

    <script>
      var lineChartData = {
        labels: <?php echo json_encode($tahun); ?>,
        datasets: [{
          fillColor: "#49cced",
          strokeColor: "#2e363f",
          pointColor: "#2e363f",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "#49cced",
          data: <?php echo json_encode($SKD); ?>
        }]

      }
      var myLine = new Chart(document.getElementById("canvas12").getContext("2d")).Line(lineChartData);
    </script>

    <script>
      var lineChartData = {
        labels: <?php echo json_encode($tahun); ?>,
        datasets: [{
          fillColor: "#49cced",
          strokeColor: "#2e363f",
          pointColor: "#2e363f",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "#49cced",
          data: <?php echo json_encode($SK); ?>
        }]

      }
      var myLine = new Chart(document.getElementById("canvas13").getContext("2d")).Line(lineChartData);
    </script>

    <script>
      var lineChartData = {
        labels: <?php echo json_encode($tahun); ?>,
        datasets: [{
          fillColor: "#49cced",
          strokeColor: "#2e363f",
          pointColor: "#2e363f",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "#49cced",
          data: <?php echo json_encode($KJD); ?>
        }]

      }
      var myLine = new Chart(document.getElementById("canvas14").getContext("2d")).Line(lineChartData);
    </script>

    <script>
      var lineChartData = {
        labels: <?php echo json_encode($tahun); ?>,
        datasets: [{
          fillColor: "#49cced",
          strokeColor: "#2e363f",
          pointColor: "#2e363f",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "#49cced",
          data: <?php echo json_encode($PD); ?>
        }]

      }
      var myLine = new Chart(document.getElementById("canvas15").getContext("2d")).Line(lineChartData);
    </script>

    <script>
      var lineChartData = {
        labels: <?php echo json_encode($tahun); ?>,
        datasets: [{
          fillColor: "#49cced",
          strokeColor: "#2e363f",
          pointColor: "#2e363f",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "#49cced",
          data: <?php echo json_encode($DDG); ?>
        }]

      }
      var myLine = new Chart(document.getElementById("canvas16").getContext("2d")).Line(lineChartData);
    </script>

    <script>
      var lineChartData = {
        labels: <?php echo json_encode($tahun); ?>,
        datasets: [{
          fillColor: "#49cced",
          strokeColor: "#2e363f",
          pointColor: "#2e363f",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "#49cced",
          data: <?php echo json_encode($BD); ?>
        }]

      }
      var myLine = new Chart(document.getElementById("canvas17").getContext("2d")).Line(lineChartData);
    </script>
</body>

</html>