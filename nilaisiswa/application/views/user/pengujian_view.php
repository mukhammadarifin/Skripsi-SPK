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
    <style>
        #chartbox1 {
            float: left;
            display: block;
            width: 400px;
            height: 450px;
            margin-left: 6cm;
            text-align: center;
        }

        #chartbox2 {
            float: inherit;
            display: block;
            width: 400px;
            height: 450px;
            margin-left: 27cm;
            text-align: center;
        }
    </style>
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
                    <div class="widget-content nopadding">
                        <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
                            <h5>Hasil Pengelompokan Sebelumnya Pada Tahun <?php echo $thn ?></h5>
                        </div>
                        <div style="overflow-x: auto;">
                            <a style="align-content: right" class="btn btn-default" href="<?php echo site_url('User/form') ?>">Upload Data Hasil Pengujian</a>
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Siswa</th>
                                        <th>Nama Kelas</th>
                                        <th>Klaster Sistem</th>
                                        <th>Klaster Manual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    <?php foreach ($hasil as $k => $key) { ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $key->nama_siswa ?></td>
                                            <td><?php echo $key->nama_kelas ?></td>
                                            <td><?php echo substr($key->c, -1); ?></td>
                                            <td><?php if (isset($cluspeng[$k]->cp)) {
                                                    echo $cluspeng[$k]->cp;
                                                } else {
                                                    $name = 0;
                                                }
                                                ?></td>
                                            <?php $no++ ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </br>
                            <table class="table table-bordered">
                                <thead></thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>Jumlah Klaster 1</td>
                                        <td>Jumlah Klaster 2</td>
                                        <td>Jumlah Klaster 3</td>
                                    </tr>
                                    <tr>
                                        <td>Hasil Sistem</td>
                                        <td><?php echo $dataif1->cc1; ?></td>
                                        <td><?php echo $dataif1->cc2; ?></td>
                                        <td><?php echo $dataif1->cc3; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Hasil Manual</td>
                                        <td><?php echo $dataif2->ccp1; ?></td>
                                        <td><?php echo $dataif2->ccp2; ?></td>
                                        <td><?php echo $dataif2->ccp3; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            </br>

                            <div id="container">
                                <div id="chartbox1">
                                    <h5>Grafik Hasil Pengelompokan Sebelumnya Pada Tahun <?php echo $thn ?> Melalui Sistem</h5>
                                    <canvas id="myChart1"></canvas>
                                </div>
                                <div id="chartbox2">
                                    <h5>Grafik Hasil Pengelompokan Manual Pada Tahun <?php echo $thn ?> Melalui Excel</h5>
                                    <canvas id="myChart2"></canvas>
                                </div>
                            </div>
                            <div class="row">

                            </div>

                            </br>
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
    <script src="<?php echo base_url() ?>https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        //deklarasi chartjs untuk membuat grafik 2d di id mychart 
        var ctx = document.getElementById('myChart1').getContext('2d');

        var myChart = new Chart(ctx, {
            //chart akan ditampilkan sebagai bar chart
            type: 'pie',
            data: {
                //membuat label chart
                labels: ["Cluster 1", "Cluster 2", "Cluster 3"],
                datasets: [{
                    label: '# of Votes',
                    //isi chart
                    data: [<?php echo $dataif1->cc1; ?>,
                        <?php echo $dataif1->cc2; ?>,
                        <?php echo $dataif1->cc3; ?>
                    ],
                    //membuat warna pada bar chart
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <script>
        //deklarasi chartjs untuk membuat grafik 2d di id mychart 
        var ctx = document.getElementById('myChart2').getContext('2d');

        var myChart = new Chart(ctx, {
            //chart akan ditampilkan sebagai bar chart
            type: 'pie',
            data: {
                //membuat label chart
                labels: ["Cluster 1", "Cluster 2", "Cluster 3"],
                datasets: [{
                    label: '# of Votes',
                    //isi chart
                    data: [<?php echo $dataif2->ccp1; ?>,
                        <?php echo $dataif2->ccp2; ?>,
                        <?php echo $dataif2->ccp3; ?>
                    ],
                    //membuat warna pada bar chart
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#master').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked', false);
                }
            });

            $('.delete_all').on('click', function(e) {

                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });

                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {

                    var check = confirm("Are you sure you want to delete this row?");
                    if (check == true) {

                        var join_selected_values = allVals.join(",");

                        $.ajax({
                            url: $(this).data('url'),
                            type: 'POST',
                            data: 'ids=' + join_selected_values,
                            success: function(data) {
                                console.log(data);
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert("Item Deleted successfully.");
                            },
                            error: function(data) {
                                alert(data.responseText);
                            }
                        });

                        $.each(allVals, function(index, value) {
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                    }
                }
            });
        });
    </script>

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