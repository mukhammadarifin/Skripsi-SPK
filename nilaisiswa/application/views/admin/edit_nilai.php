<!DOCTYPE html>
<html lang="en">
<head>
<title>Pemilihan Bidang Studi Perguruan Tinggi</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url() ?>https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/fullcalendar.css" />
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
      <h3>Edit Daftar Nilai Siswa</h3>
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
          <h5>Edit Daftar Nilai Siswa</h5>
        </div>
        <div class="widget-content">
          <div class="row-fluid">
            <div class="widget-content nopadding">
              <?php echo form_open('Admin/edit_nilai/'.$this->uri->segment(3),array(
                      'class' => 'form-horizontal'
                  )); ?>
              <?php echo validation_errors() ?>
              <?php foreach ($nilai as $key) { ?>
                <div class="container">
                  <div class="control-group">
                    <label class="control-label">Kelas :</label>
                    <div class="controls">
                      <select name="fk_kelas" id="inputFk_kelas" class="span8">
                        <option value="<?php echo $key->id_kelas ?>">--- <?php echo $key->id_kelas ?>. <?php echo $key->nama_kelas ?> ---</option>
                        <?php foreach ($kelas as $val) { ?>
                          <option value="<?php echo $val->id_kelas ?>"><?php echo $val->id_kelas ?>. <?php echo $val->nama_kelas ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                
                <div class="control-group">
                  <label class="control-label">Pendidikan Agama Islam dan Budi Pekerti :</label>
                  <div class="controls">
                    <input type="number" class="span8" name="PAI" id="PAI" placeholder="please fill" value="<?php echo $key->PAI ?>" required>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Pendidikan Agama Katholik dan Budi Pekerti :</label>
                  <div class="controls">
                    <input type="number" class="span8" name="PAK" id="PAK" placeholder="please fill" value="<?php echo $key->PAK ?>" required>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Pendidikan Pancasila dan Kewarganegaraan :</label>
                  <div class="controls">
                    <input type="number" class="span8" name="PPKn" id="PPKn" placeholder="please fill" value="<?php echo $key->PPKn ?>" required>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Bahasa Indonesia :</label>
                  <div class="controls">
                    <input type="number" class="span8" name="BI" id="BI" placeholder="please fill" value="<?php echo $key->BI ?>" required>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Matematika (Umum) :</label>
                  <div class="controls">
                    <input type="number" class="span8" name="M" id="M" placeholder="please fill" value="<?php echo $key->M ?>" required>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Sejarah Indonesia :</label>
                  <div class="controls">
                    <input type="number" class="span8" name="SI" id="SI" placeholder="please fill" value="<?php echo $key->SI ?>" required>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Bahasa Inggris :</label>
                  <div class="controls">
                    <input type="number" class="span8" name="Bing" id="Bing" placeholder="please fill" value="<?php echo $key->Bing ?>" required>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Seni Budaya :</label>
                  <div class="controls">
                    <input type="number" class="span8" name="SB" id="SB" placeholder="please fill" value="<?php echo $key->SB ?>" required>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Pendidikan Jasmani, Olahraga, dan Kesehatan :</label>
                  <div class="controls">
                    <input type="number" class="span8" name="PJOK" id="PJOK" placeholder="please fill" value="<?php echo $key->PJOK ?>" required>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">FISIKA :</label>
                  <div class="controls">
                    <input type="number" class="span8" name="F" id="F" placeholder="please fill" value="<?php echo $key->F ?>" required>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Kimia :</label>
                  <div class="controls">
                    <input type="number" class="span8" name="K" id="K" placeholder="please fill" value="<?php echo $key->K ?>" required>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Simulasi dan Komunikasi Digital :</label>
                  <div class="controls">
                    <input type="number" class="span8" name="SKD" id="SKD" placeholder="please fill" value="<?php echo $key->SKD ?>" required>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Sistem Komputer :</label>
                  <div class="controls">
                    <input type="number" class="span8" name="SK" id="SK" placeholder="please fill" value="<?php echo $key->SK ?>" required>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Komputer dan Jaringan Dasar :</label>
                  <div class="controls">
                    <input type="number" class="span8" name="KJD" id="KJD" placeholder="please fill" value="<?php echo $key->KJD ?>" required>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Pemrograman Dasar :</label>
                  <div class="controls">
                    <input type="number" class="span8" name="PD" id="PD" placeholder="please fill" value="<?php echo $key->PD ?>" required>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Dasar Desain Grafis :</label>
                  <div class="controls">
                    <input type="number" class="span8" name="DDG" id="DDG" placeholder="please fill" value="<?php echo $key->DDG ?>" required>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Muatan Lokal Bahasa Daerah :</label>
                  <div class="controls">
                    <input type="number" class="span8" name="BD" id="BD" placeholder="please fill" value="<?php echo $key->BD ?>" required>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Tahun :</label>
                  <div class="controls">
                    <select name="tahun" id="tahun" class="span8">
		                <option value="<?php echo $key->tahun ?>">--- <?php echo $key->tahun ?> ---</option>
		                <?php foreach ($tahun as $val) { ?>
		                    <option value="<?php echo $val->tahun ?>"><?php echo $val->tahun ?></option>
		                <?php } ?>
		            </select>
                  </div>
                </div>
              <?php } ?>
                <div class="form-actions">
                  <button type="submit" class="btn btn-success">Update</button>
                  <a href="<?php echo site_url('Admin/kelola_nilai') ?>" class="btn btn-primary" role="button" aria-pressed="true">Kembali</a>
                </div>
                
              <?php echo form_close(); ?>
            </div>
            </div>
          </div>
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
<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/jquery.flot.min.js"></script> 
<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/jquery.flot.resize.min.js"></script> 
<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/jquery.peity.min.js"></script> 
<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/fullcalendar.min.js"></script> 
<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/maruti.js"></script> 
<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/maruti.dashboard.js"></script> 
<script src="<?php echo base_url() ?>assets/template-admin/HTML/js/maruti.chat.js"></script> 
 

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
