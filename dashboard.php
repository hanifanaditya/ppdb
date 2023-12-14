<?php include "header.php"; ?>
            <!-- Main Content -->
            <div class="main-content col-md-10 ms-auto">
                <div class="title">
                    <h2>Dashboard</h2>
                </div>
                <!-- get data statik -->
                <?php
                    $daftar = new MDaftar();

                    // total
                    $total = $daftar->All();

                    // jumlah per jurusan
                    $total_jurusan = $daftar->select("SELECT j.nama_jurusan,count(d.id_jurusan) as total FROM tb_daftar as d RIGHT JOIN tb_jurusan as j ON d.id_jurusan = j.id_jurusan GROUP BY j.id_jurusan");
                ?>
                <!-- end data statistik -->
                <div class="info">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box card mb-3">
                                <div class="row no-gutters">
                                    <div class="icon col-sm-3 col-md-4 bg-aqua">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="col-sm-9 col-md-8">
                                        <div class="content">
                                            <h5>Total</h5>
                                            <h1><?= count($total) ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php foreach($total_jurusan as $rsTotal){ ?>
                        <div class="col-md-6">
                            <div class="info-box card mb-3">
                                <div class="row no-gutters">
                                    <div class="icon col-sm-3 col-md-3 bg-red">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="col-9 col-md-9">
                                        <div class="content">
                                            <h5><?= $rsTotal["nama_jurusan"] ?></h5>
                                            <h1><?= $rsTotal["total"] ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>                                              
                    </div>
                </div>
            </div>
            <!-- End Main Content -->
<?php include "footer.php"; ?>