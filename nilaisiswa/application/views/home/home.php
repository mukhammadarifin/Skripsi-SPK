<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pemilihan Bidang Studi Perguruan Tinggi</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url() ?>https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    </div>
    <!--close-Header-part--> 

    <!--top-Header-messaages-->
    <div class="btn-group rightzero"> <a class="top_message tip-left" title="Manage Files"><i class="icon-file"></i></a> <a class="top_message tip-bottom" title="Manage Users"><i class="icon-user"></i></a> <a class="top_message tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a> <a class="top_message tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a> </div>
    <!--close-top-Header-messaages--> 

    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
      <ul class="nav">
        <li class=""><a title="" href="<?php echo site_url('Login') ?>"><i class="icon icon-share-alt"></i> <span class="text">LOGIN</span></a></li>
        <li class=""><a title="" href="<?php echo site_url('Login/register') ?>"><i class="icon icon-align-justify"></i> <span class="text">REGISTER</span></a></li>
      </ul>
    </div>
    <!--close-top-Header-menu-->

    <div id="sidebar"></div>
    <div id="content">
      <div id="content-header">
        <div id="breadcrumb"> <a href="<?php echo site_url('Home') ?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
      </div>
      <div class="container-fluid">
          <h3>Selamat Datang di Sistem Pendukung Keputusan Pemilihan Bidang Studi Perguruan Tinggi</h3>
        <div class="row-fluid">
          <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
              <h5>Filter Grafik</h5>
            </div>
            <div class="widget-content">
              <div class="row-fluid">
                <div class="widget-content nopadding">
                  <?php echo form_open('Home/filter_grafik',array(
                          'class' => 'form-horizontal'
                      )); ?>
                    <div class="control-group">
                      <label class="control-label">Kelas :</label>
                      <div class="controls">
                        <select name="kelas" id="inputTahun" class="span11" required="required">
                          <?php foreach ($kelas as $key) { ?>
                              <option value="<?php echo $key->id_kelas ?>"><?php echo $key->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                        <input type="hidden" name="hidden"class="form-control" value="Tahun">
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
