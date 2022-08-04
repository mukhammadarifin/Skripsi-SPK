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
      <h3>Kelola Data Admin</h3>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title">
              <span class="icon"><i class="icon-th"></i></span>
              <h5>Kelola Data Admin</h5>
            </div>
            <div class="widget-content nopadding">
              <a class="btn btn-default" href="<?php echo site_url('Admin/tambah_admin') ?>">Tambah Admin</a>
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1 ?>
                  <?php foreach ($admin as $key) { ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $key->username ?></td>
                      <td><?php echo $key->nama ?></td>
                      <td><?php echo $key->email ?></td>
                      <td><?php if ($key->level == 1) {
                            echo "Admin";
                          } else {
                            echo "User";
                          } ?></td>
                      <td>
                        <a class="btn btn-primary" href="<?php echo site_url('Admin/edit_admin/' . $key->id_user) ?>">Edit</a>
                        <a class="btn btn-danger" href="<?php echo site_url('Admin/delete_admin/' . $key->id_user) ?>">Delete</a>
                      </td>
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